<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('login');
        }
    }

    private $name = "operation";
    private $table = "operations";
    private $icon = 'fa-percent';
    private $redirect = 'panel/operation';

    public $validate = [
            [
                'field' => 'type',
                'label' => 'Operation',
                'rules' => 'required|callback_type_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
    ];

    public function type_check($str)
    {   
        $id = $this->uri->segment(4);
        $man = $this->main->count('operations', array('type' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('type_check', 'The %s is already in use');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function index()
    {
        if (access($this->name,'index')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;

            $this->template->load('panel/template','panel/operation/index', $data);
        }else{
            error_404();
        }
    }

    public function get()
    {
        if (access($this->name,'list')) {
            $fetch_data = $this->main->make_datatables('panel/OperationModel');
    		$sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = ucwords($row->type);
                
                $sub_array[] = '<div class="table_form">
                <a class="btn btn-success" href="'.base_url('panel/').'operation/view/'.$row->id.'"><i class="fa fa-eye "></i></a>
                <a class="btn btn-primary" href="'.base_url('panel/').'operation/update/'.$row->id.'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'operation/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>
                ';

                $data[] = $sub_array;  
                $sr++;
        	}

        	$output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $this->main->all($this->table),  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/OperationModel'),  
                "data"              =>     $data  
            );  

            echo json_encode($output);
        }else{
            error_404();
        }
	}

    public function view($id)
    {
        if (access($this->name,'view')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;

            $data['op'] = $this->main->get($this->table, 'type', ['id'=>$id]);
            
            $this->template->load('panel/template','panel/operation/view', $data);
        }else{
            error_404();
        }
    }

    public function add()
    {   
        if (access($this->name,'add')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/operation/add', $data);
            }else{
                    $post = $this->input->post();
                    $id = $this->main->add($post, $this->table);
                    
                    flashMsg(
                    $id, ucwords($this->name).' Added Successfully.', ucwords($this->name).' Not Added, Please Try Again.', $this->redirect
                    );
                }
        }else{
            error_404();
        }
    }

    public function update($id)
    {   
        if (access($this->name,'update')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['op'] = $this->main->get($this->table, 'id,type', ['id'=>$id]);

            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/operation/edit', $data);
            }else{

                $post = $this->input->post();  
                
                $id = $this->main->update($id, $post, $this->table);
                flashMsg(
                    $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect
                    );
            }
        }else{
            error_404();
        }
    }

    public function delete()
    {
        if (access($this->name,'delete')) {
            $id = $this->input->post('id');
            // $id = $this->main->delete($id, $this->table);
            
            flashMsg(
                    $id, ucwords($this->name).' Deleted Successfully.', ucwords($this->name).' Not Deleted, Please Try Again.', $this->redirect
                    );
        }else{
            error_404();
        }
    }
}