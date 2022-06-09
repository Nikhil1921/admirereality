<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('login');
        }
    }

    private $name = "features";
    private $table = "features";
    private $icon = 'fa-percent';
    private $redirect = 'panel/features';

    public $validate = [
            [
                'field' => 'feature',
                'label' => 'Feature Name',
                'rules' => 'required|callback_features_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
    ];

    public function features_check($str)
    {   
        $id = $this->uri->segment(4);
        $man = $this->main->count($this->table, array('feature' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('menu_check', 'The %s is already in use');
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

            $this->template->load('panel/template','panel/features/index', $data);
        }else{
            error_404();
        }
    }

    public function get()
    {
        if (access($this->name,'list')) {
            $fetch_data = $this->main->make_datatables('panel/FeaturesModel');
    		$sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = ucwords($row->feature);
                
                $sub_array[] = '<div class="table_form">
                <a class="btn btn-success" href="'.base_url('panel/').'features/view/'.$row->id.'"><i class="fa fa-eye "></i></a>
                <a class="btn btn-primary" href="'.base_url('panel/').'features/update/'.$row->id.'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'features/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>
                ';

                $data[] = $sub_array;  
                $sr++;
        	}

        	$output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $this->main->all($this->table),  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/FeaturesModel'),  
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

            $data['feature'] = $this->main->get($this->table, 'feature', ['id'=>$id]);
            
            $this->template->load('panel/template','panel/features/view', $data);
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
                $this->template->load('panel/template','panel/features/add', $data);
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
            $data['feature'] = $this->main->get($this->table, 'id,feature', ['id'=>$id]);

            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/features/edit', $data);
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
            $id = $this->main->update($id, ['is_delete'=>1], $this->table);
            flashMsg(
                    $id, ucwords($this->name).' Deleted Successfully.', ucwords($this->name).' Not Deleted, Please Try Again.', $this->redirect
                    );
        }else{
            error_404();
        }
    }
}