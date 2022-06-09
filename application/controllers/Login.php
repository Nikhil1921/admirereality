<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $name = 'login';
	private $table = 'users';
	private $redirect = 'dashboard';
	public $validate = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => "%s is Required",
                    'is_unique' => "%s is Already in use.",
                ],
            ],
            [
                'field' => 'mobile',
                'label' => 'Mobile',
                'rules' => 'required|is_unique[users.mobile]',
                'errors' => [
                    'required' => "%s is Required",
                    'is_unique' => "%s is Already in use.",
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
            [
                'field' => 'password',
                'label' => 'Password',
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
                    'matches' => "%s must match with Password",
                ],
            ]
    ];

    public function __construct()
	{
		parent::__construct();
		if (strpos($this->agent->referrer(),"property") && empty($this->session->userdata('id'))) {
			$this->session->set_userdata('redirect',$this->agent->referrer());
		}
	}
	
	public function index()
	{
		$data['name'] = $this->name;

		if (!empty($this->session->userdata('role'))) {
			if ($this->session->userdata('role') == 'buyer') {
				return redirect($this->agent->referrer());
			}else{
				return redirect('panel');
			}
        }
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => "%s is Required"));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => "%s is Required"));
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('auth/template', 'auth/login', $data);
		}
		else
		{
			$select = 'u.id, u.name, u.email, u.mobile, u.image, r.role';
			$post = $this->input->post();
			$post['password'] = my_crypt($post['password']);
			$join = ['role'=>'role as r'];
			$user = $this->fmain->get($this->table.' as u', $select, $post, $join);
			
			if ($user) {
	        	$this->session->set_userdata($user);
	        	if ($user['role'] == 'buyer') {
	        		if ($this->session->userdata('redirect')) {
	        			$redirect = $this->session->userdata('redirect');

	        			$this->session->unset_userdata('redirect');
	        			return redirect($redirect);
	        		}else{
	        			return redirect();	
	        		}
	        	}else{
	        		return redirect('panel');	
	        	}
	        	
			}else{
				$data['error'] = "Mobile or Password do not match";
				$this->template->load('auth/template', 'auth/login', $data);
			}
		}
	}

	public function signup()
	{
		$data['name'] = "sign up";

		if (!empty($this->session->userdata('role'))) {
            return redirect($this->redirect);
        }
		$this->form_validation->set_rules('mobile','Mobile','required|is_unique[users.mobile]',array('required'=>'The %s is required','is_unique' => "%s is Already in use.",));
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('auth/template', 'auth/signup', $data);
		}
		else
		{
			$mob = $this->input->post('mobile');
			/*$otp = rand(1000,9999);*/
			$otp = 1234;
			$mobile = $this->fmain->check('otp',['mobile'=>$mob], 'id');
			
			if ($mobile) {
				$user = $this->fmain->update(['id'=>$mobile],['otp'=>$otp], 'otp');
			}else{
				$user = $this->fmain->add(['mobile'=>$mob, 'otp'=>$otp], 'otp');	
			}
			
			if ($user) {
				$this->session->set_userdata(['mobile'=>$mob]);
	        	return redirect('check-otp');
			}else{
				error_404();
			}
		}
	}

	/*public function send_otp()
	{
		if (!$this->input->is_ajax_request()) {
		   $data['name'] = "page not found";
		   $this->template->load('auth/template','auth/error_404', $data);
		}else{
			$mob = $this->input->post('mobile');
			$otp = rand(1000,9999);
			
			$mobile = $this->fmain->check('otp',['mobile'=>$mob], 'id');
			
			if ($mobile) {
				$user = $this->fmain->update(['id'=>$mobile],['otp'=>$otp], 'otp');
			}else{
				$user = $this->fmain->add(['mobile'=>$mob, 'otp'=>$otp], 'otp');	
			}
			if ($user) {
				$this->session->set_userdata(['mobile'=>$mob]);
	        	return redirect('check-otp');
			}else{
				error_404();
			}
		}
	}*/

	public function complete_signup()
	{	
		if (empty($this->session->userdata('mobile'))) {
		    error_404();
		}else{
			$data['name'] = 'complete signup';
			$this->form_validation->set_rules($this->validate);
			$role = $this->db->where_in('role', ['builder','buyer']);
            $data['role'] = $this->main->getall('role', 'id,role','','','','','', $role);
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('auth/template', 'auth/complete', $data);
			}
			else
			{
				$post = $this->input->post();
				unset($post['c_password']);
				$post['password'] = my_crypt($post['password'], 'e');
				
				$user = $this->fmain->add($post,$this->table);
				if ($user) {
					$select = 'u.id, u.name, u.email, u.mobile, u.image, r.role';
					$join = ['role'=>'role as r'];
					$user = $this->fmain->get($this->table.' as u', $select, ['u.id'=>$user], $join);
			
		        	$this->session->set_userdata($user);

					if ($this->session->userdata('role') != 'buyer') {
						
						return redirect('panel');
					}else{
						
						if ($this->session->userdata('redirect')) {
		        			$redirect = $this->session->userdata('redirect');
		        			$this->session->unset_userdata('redirect');
		        			return redirect($redirect);
		        		}else{
		        			
		        			return redirect();	
		        		}
					}
				}else{
					$data['error'] = "Something not going good. Try again.";
					$this->template->load('auth/template', 'auth/complete', $data);
				}
			}
		}
	}

	public function forgot()
	{
		$data['name'] = "forgot password";

		if (!empty($this->session->userdata('role'))) {
            return redirect($this->redirect);
        }
		$this->form_validation->set_rules('mobile','Mobile Number','required',array('required'=>'The %s is required'));
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('auth/template', 'auth/forgot', $data);
		}
		else
		{
			$mob = $this->input->post('mobile');
			/*$otp = rand(1000,9999);*/
			$otp = 1234;
			$check = $this->fmain->check($this->table,['mobile'=>$mob], 'id');
			if ($check) {
				$mobile = $this->fmain->check('otp',['mobile'=>$mob], 'id');
			
				if ($mobile) {
					$user = $this->fmain->update(['id'=>$mobile],['otp'=>$otp], 'otp');
				}else{
					$user = $this->fmain->add(['mobile'=>$mob, 'otp'=>$otp], 'otp');	
				}
				
				if ($user) {
					$this->session->set_userdata(['mobile'=>$mob,'forgot_url'=>'new-password']);
		        	return redirect('check-otp');
				}else{
					error_404();
				}	
			}else{
				$data['error'] = "Number not Registered";
				$this->template->load('auth/template', 'auth/forgot', $data);		
			}
		}
	}

	public function check_otp()
	{	
		if (empty($this->session->userdata('mobile'))) {
		    $data['name'] = "page not found";
			$this->template->load('auth/template','auth/error_404', $data);
		}else{
			$data['name'] = 'verify otp';
			$this->form_validation->set_rules('otp', 'OTP', 'required',array('required'=>'The %s is required'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('auth/template', 'auth/check_otp', $data);
			}
			else
			{
				$post = $this->input->post();
				$post['mobile'] = $this->session->userdata('mobile');
				$user = $this->fmain->check('otp',$post,'id');
				
				if ($user) {
					$this->fmain->delete($post, 'otp');
					if ($this->session->userdata('forgot_url')) {
						$redirect = $this->session->userdata('forgot_url');
						$this->session->unset_userdata('forgot_url');
						return redirect($redirect);
					}else{
						return redirect('complete-signup');	
					}
				}else{
					$data['error'] = "Invalid OTP!";
					$this->template->load('auth/template', 'auth/check_otp', $data);
				}
			}
		}
	}

	public function new_password()
	{	
		if (empty($this->session->userdata('mobile'))) {
		    error_404();
		}else{
			$data['name'] = 'new password';
			$this->form_validation->set_rules('password', 'Password', 'required',array('required'=>'The %s is required'));
			$this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]',array('required'=>'The %s is required','matches' => "%s must match with Password",));
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('auth/template', 'auth/new_password', $data);
			}
			else
			{
				$post = $this->input->post();
				unset($post['c_password']);
				$post['password'] = my_crypt($post['password'], 'e');
				$where = ['mobile'=>$this->session->userdata('mobile')];
				
				$user = $this->fmain->update($where,$post, $this->table);

				if ($user) {
					$select = 'u.id, u.name, u.email, u.mobile, u.image, r.role';
					$join = ['role'=>'role as r'];
					$user = $this->fmain->get($this->table.' as u', $select, ['u.mobile'=>$this->session->userdata('mobile')], $join);
			
		        	$this->session->set_userdata($user);

					if ($this->session->userdata('role') != 'buyer') {
						return redirect('panel');
					}else{
						if ($this->session->userdata('redirect')) {
		        			$redirect = $this->session->userdata('redirect');
		        			$this->session->unset_userdata('redirect');
		        			return redirect($redirect);
		        		}else{
		        			return redirect();	
		        		}
					}
				}else{
					$data['error'] = "Something not going good. Try again.";
					$this->template->load('auth/template', 'auth/new_password', $data);
				}
			}
		}
	}

	public function logout()
	{
		if (!empty($this->session->userdata('role'))) {
            session_destroy();
        }
		
		return redirect('login');
	}
}