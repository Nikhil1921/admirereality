<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('login');
        }
    }

    private $name = "role";
    private $table = "role";
    private $icon = 'fa-percent';
    private $redirect = 'panel/role';

    public $validate = [
            [
                'field' => 'role',
                'label' => 'Role Name',
                'rules' => 'required|callback_role_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'navigation[]',
                'label' => 'Navigation',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ]
    ];

    public function role_check($str)
    {   
        $id = $this->uri->segment(4);
        $man = $this->main->count($this->table, array('role' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('role_check', 'The %s is already in use');
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

            $this->template->load('panel/template','panel/role/index', $data);
        }else{
            error_404();
        }
    }

    public function get()
    {
        if (access($this->name,'list')) {
            $fetch_data = $this->main->make_datatables('panel/RoleModel');
    		$sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = ucwords($row->role);
                
                foreach (json_decode($row->navigation) as $k => $v) {
                    $nav[] = ucwords($this->main->check('menu',['id'=>$k], 'menu'));
                }
                $sub_array[] = implode(', ', $nav);
                unset($nav);
                
                $sub_array[] = '<div class="table_form">
                <a class="btn btn-primary" href="'.base_url('panel/').'role/update/'.$row->id.'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'role/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>
                ';

                $data[] = $sub_array;  
                $sr++;
        	}

        	$output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $this->main->all($this->table),  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/RoleModel'),  
                "data"              =>     $data  
            );  

            echo json_encode($output);
        }else{
            error_404();
        }
	}

    public function add()
    {   
        if (access($this->name,'add')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['op'] = $this->main->getall('operations', 'id, type');
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/role/add', $data);
            }else{
                    $post = $this->input->post();
                    $post['navigation'] = json_encode($post['navigation']);
                    $id = $this->main->add($post, $this->table);
                    
                    flashMsg(
                    $id, ucwords($this->name).' Added Successfully.', ucwords($this->name).' Not Added, Please Try Again.', $this->redirect
                    );
                }
        }else{
            error_404();
        }
    }

    public function get_sub_menu()
    {   
        if (access($this->name,'add')) {
            $post['menu_id'] = $this->input->post('id');
            $nav = $this->main->getall('sub_menu', 'id, sub_menu',$post,'',"priority ASC");
            echo json_encode($nav);
        }else{
            error_404();
        }
    }

    public function update($id)
    {   
        if (access($this->name,'update')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['role'] = $this->main->get($this->table, 'id,role,navigation', ['id'=>$id]);
            
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/role/edit', $data);
            }else{

                $post = $this->input->post();  
                $post['navigation'] = json_encode($post['navigation']);
                
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