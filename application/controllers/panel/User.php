<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('panel/login');
        }
    }

    private $name = "user";
    private $table = "users";
    private $icon = 'fa-users';
    private $redirect = 'panel/user';

    public $validate = [
            [
                'field' => 'name',
                'label' => 'User Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'email',
                'label' => 'User E-Mail',
                'rules' => 'required|valid_email|callback_email_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'mobile',
                'label' => 'User Mobile',
                'rules' => 'required|callback_mobile_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'password',
                'label' => 'User Password',
                'rules' => 'callback_password_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'c_password',
                'label' => 'Confirm Password',
                'rules' => 'callback_password_check|matches[password]',
                'errors' => [
                    'required' => "%s is Required",
                    'matches' => "%s must match with User Password",
                ],
            ],

            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
    ];

    public function mobile_check($str)
    {   

        $id = $this->uri->segment(4);
        $man = $this->main->count($this->table, array('mobile' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function email_check($str)
    {   
        $id = $this->uri->segment(4);
        $man = $this->main->count($this->table, array('email' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function password_check($str)
    {   
        $id = $this->uri->segment(4);

        if (empty($id) && $str == '') {
            $this->form_validation->set_message('password_check', 'The %s is Required');
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

            $this->template->load('panel/template','panel/user/index', $data);
        }else{
        $this->load->view('panel/error_404');
        }
    }

    public function get()
    {
        if (access($this->name,'list')) { 
            $fetch_data = $this->main->make_datatables('panel/UsersModel');
    		$sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = $row->name;  
                $sub_array[] = $row->email;  
                 
                $sub_array[] = $row->mobile;
                $sub_array[] = $row->role;
                
                foreach (json_decode($row->navigation) as $k => $v) {
                    $nav[] = ucwords($this->main->check('menu',['id'=>$k], 'menu'));
                }
                $sub_array[] = implode(', ', $nav);
                unset($nav);

                $sub_array[] = '
                <div class="table_form">
                <a class="btn btn-success" href="'.base_url('panel/').'user/view/'.$row->id.'"><i class="fa fa-eye "></i></a>
                <a class="btn btn-primary" href="'.base_url('panel/').'user/update/'.$row->id.'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'user/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>';  

                $data[] = $sub_array;
                $sr++;
        	}
            
            if ($this->session->userdata('role') === 'super admin') {
                $admin = $this->main->count($this->table, array('role' => 1));
            }else{
                $admin = $this->main->count($this->table, array('role' => 1));
                $admin = $admin + $this->main->count($this->table, array('role' => 2));
            }
            
            $recordsTotal = $this->main->all($this->table) - $admin;

        	$output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $recordsTotal,  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/UsersModel'),
                "data"              =>     $data  
            );  

            echo json_encode($output);
        }else{
            $this->load->view('panel/error_404');
        }
	}

	public function add()
    {   
        if (access($this->name,'add')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $role = $this->db->where_not_in('role', ['super admin','admin','builder','user']);
            $data['role'] = $this->main->getall('role', 'id,role','','','', $role);
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/user/add', $data);
            }else{
                if (empty($_FILES['image']['name'])) {
                    $data['error'] = '<small class="help-block has-error">* Please Select Image for user</small>';
                    $this->template->load('panel/template','panel/user/add', $data);
                    }else{
                        $post = $this->input->post();
                        
                        $config['upload_path']= "./assets/img/users/";
                        $config['allowed_types']='jpg|jpeg';
                        $this->upload->initialize($config);
                        $image = $_FILES['image']['name'];
                        $extn = explode(".", strtolower($_FILES['image']['name']));
                        $image = $post['name'].'.'.$extn[1];
                        $_FILES['image']['name'] = $image;
                        
                        if (!$this->upload->do_upload("image")) {
                            $this->template->load('panel/template','panel/user/add', $data);
                        }else{
                            $data = $this->upload->data();
                            $post['image'] = $data["file_name"];
                            
                            $post['password'] = my_crypt($post["password"]);
                            unset($post['c_password']);

                            $id = $this->main->add($post, $this->table);
                            flashMsg(
                                $id, ucwords($this->name).' Added Successfully.', ucwords($this->name).' Not Added, Please Try Again.', $this->redirect
                            );
                        }
                    }
                }
        }else{
            error_404();
        }
    }

    public function view($id)
    {
        if (access($this->name, 'add')) { 
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $select = 'u.name, u.email, u.mobile, u.image, r.role';
            
            $join = ['role'=>'role as r'];
            $data['user'] = $this->fmain->get($this->table.' as u', $select, ['u.id'=>$id], $join);
            
            $this->template->load('panel/template','panel/user/view', $data);
        }else{
            error_404();
        }
    }

    public function update($id)
    {
        if (access($this->name, 'update')) { 
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['user'] = $this->main->get($this->table, 'id,name,email,image,mobile,role', ['id'=>$id]);
            $role = $this->db->where_not_in('role', ['super admin','admin','builder','user']);
            $data['role'] = $this->main->getall('role', 'id,role','','','', $role);

            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/user/edit', $data);
            }else{

                $post = $this->input->post();  
                unset($post['c_password']);  
                $post['password'] = my_crypt($post['password']);
                if (empty($_FILES['image']['name'])) {
                    $id = $this->main->update($id, $post, $this->table);
                    flashMsg(
                            $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect
                        );
                }else{
                    $config['upload_path']= "./assets/img/users/";
                    $config['allowed_types']='jpg|jpeg';

                    $this->upload->initialize($config);
                    $image = $_FILES['image']['name'];
                    $extn = explode(".", strtolower($_FILES['image']['name']));
                    $image = $post['name'].'.'.$extn[1];
                    $_FILES['image']['name'] = $image; 
                    
                    if (!$this->upload->do_upload("image")) {
                        $this->template->load('panel/template','panel/user/edit', $data);
                    }else{
                        $data = $this->upload->data();
                        $image_path = "./assets/img/users/".$post['image'];
                        unlink($image_path);
                        $post['image'] = $data["file_name"];
                        
                        $id = $this->main->update($id, $post, $this->table);
                        flashMsg(
                            $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect
                        );
                    }
                }
            }   
        }else{
            error_404();
        }
    }

    public function delete()
    {
        if (access($this->name, 'delete')) { 
            $id = $this->input->post('id');
            $id = $this->main->update($id, array('is_delete' => 1) ,$this->table);
            
            flashMsg(
                    $id, ucwords($this->name).' Deleted Successfully.', ucwords($this->name).' Not Deleted, Please Try Again.', $this->redirect
                );
        }else{
            error_404();
        }
    }
}