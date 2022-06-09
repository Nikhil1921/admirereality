<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('login');
        }
    }

	private $name = 'dashboard';
    private $table = "users as u";
    private $redirect = "panel";

    public $validate = [
            [
                'field' => 'password',
                'label' => 'New Password',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'c_password',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => "%s is Required",
                    'matches' => "%s must match with User Password",
                ],
            ]
    ];
	
	public function index()
	{
        if (access($this->name,'index')) {
    		$data['name'] = $this->name;
    		$this->template->load('panel/template', 'panel/index', $data);
        }else{
            error_404();
        }
	}

	public function profile()
	{
		$data['name'] = "profile";
		$id = $this->session->userdata('id');
		$data['user'] = $this->main->get($this->table, 'id,name,image,email,mobile,', ['id'=>$id]);

        $method = $this->input->server('REQUEST_METHOD');
        
        switch ($method) {
            case 'POST':
                $this->form_validation->set_rules('name','Your Name', 'required', ['required' => "%s is Required"]);
                if ($this->form_validation->run() == FALSE) {
                    $this->template->load('panel/template', 'panel/profile', $data);    
                }else{
                    $select = 'u.id, u.name, u.email, u.mobile, u.image, r.role';
                    $join = ['role'=>'role as r'];
                                
                    $user = $this->main->get($this->table, $select, ['u.id'=>$id],$join);
                    $this->session->set_userdata($user);
                    $post = $this->input->post();
                    $id = $this->main->update($id, $post, $this->table);
                    
                    flashMsg(
                            $id, 'Profile Updated Successfully.', 'Profile Not Updated, Please Try Again.', $this->redirect
                        );
                    }
                break;
            default:
                $this->template->load('panel/template', 'panel/profile', $data);
                break;
        } 
	}

    public function change_password()
    {   
        if (access('my-profile','update')) {
            $data['name'] = "profile";
            $id = $this->session->userdata('id');
            $data['user'] = $this->main->get($this->table, 'id,name,image,email,mobile,', ['id'=>$id]);

            $method = $this->input->server('REQUEST_METHOD');
            
            switch ($method) {
                case 'POST':
                    $this->form_validation->set_rules($this->validate);
                    if ($this->form_validation->run() == FALSE) {
                        $this->template->load('panel/template', 'panel/profile', $data);    
                    }else{
                        $post = $this->input->post();
                        $post['password'] = my_crypt($post['password']);
                        unset($post['c_password']);
                        
                        $id = $this->main->update($id, $post, $this->table);
                        flashMsg(
                                $id, 'Profile Updated Successfully.', 'Profile Not Updated, Please Try Again.', 'panel'
                            );
                        }
                    break;
                default:
                    $this->template->load('panel/template', 'panel/profile', $data);
                    break;
            } 
        }else{
            error_404();
        }
    }

    public function change_image()
    {   
        if (access('my-profile','update') && $this->input->server('REQUEST_METHOD') == "POST") {
            $data['name'] = "profile";
            $id = $this->session->userdata('id');
            $data['user'] = $this->main->get($this->table, 'id,name,image,email,mobile,', ['id'=>$id]);
            
            $config['upload_path']= "./assets/img/users/";
            $config['allowed_types']='jpg|jpeg';
            $this->upload->initialize($config);
            $image = $_FILES['image']['name'];
            $extn = explode(".", strtolower($_FILES['image']['name']));
            $image = $data['user']['name'].'.'.$extn[1];
            $_FILES['image']['name'] = $image;
            
            if (!$this->upload->do_upload("image")) {
                $this->template->load('panel/template', 'panel/profile', $data);
            }else{
                if ($data['user']['image']) {
                    $image_path = "./assets/img/users/".$data['user']['image'];
                    unlink($image_path);
                }
                $data = $this->upload->data();
                
                $post['image'] = $data["file_name"];
                $this->session->set_userdata($post);
                $id = $this->main->update($id, $post, $this->table);
                flashMsg(
                    $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect
                );
            }
        }else{
            error_404();
        }
    }
	public function error_404()
	{
		error_404();
	}
}