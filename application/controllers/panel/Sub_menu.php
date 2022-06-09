<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('panel/login');
        }
    }

    private $name = "sub-menu";
    private $table = "sub_menu";
    private $icon = 'fa-navicon';
    private $redirect = 'panel/sub-menu';

    public $validate = [
            [
                'field' => 'sub_menu',
                'label' => 'Sub Menu Name',
                'rules' => 'required|callback_sub_menu_check',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'menu_id',
                'label' => 'Menu Name',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'icon',
                'label' => 'Sub Menu Icon',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'permissions[]',
                'label' => 'Permission',
                'rules' => 'required',
                'errors' => [
                    'required' => "Select at least one %s",
                ],
            ],
            [
                'field' => 'url',
                'label' => 'Url',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ]
    ];
    
    public function sub_menu_check($str)
    {   
        $id = $this->uri->segment(4);
        $man = $this->main->count($this->table, array('sub_menu' => $str));

        if ($man && empty($id)) {
            $this->form_validation->set_message('sub_menu_check', 'The %s is already in use');
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

            $this->template->load('panel/template','panel/sub_menu/index', $data);
        }else{
            $this->load->view('panel/error_404');
        }
    }

    public function get()
    {
        if (access($this->name,'list')) {
            $fetch_data = $this->main->make_datatables('panel/SubMenuModel');
    		$sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = ucwords($row->sub_menu);
                $sub_array[] = ucwords($row->menu);
                
                $option = '<option value="">Select</option>';
                for($i=1; $i <= $this->main->all($this->table); $i++)
                    {
                        $option .= '<option value="'.$i.'">'.$i.'</option>';
                    }
                $sub_array[] = '<form action="'.base_url('panel/sub_menu/priority').'" method="POST"><select name="priority" class="form-control priority">'.$option.'</select><input type="hidden" name="id" value="'.$row->id.'">';

                $sub_array[] = '<div class="table_form">
                <a class="btn btn-success" href="'.base_url('panel/').'sub-menu/view/'.$row->id.'"><i class="fa fa-eye "></i></a>
                <a class="btn btn-primary" href="'.base_url('panel/').'sub-menu/update/'.$row->id.'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'sub-menu/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>
                ';

                $data[] = $sub_array;  
                $sr++;
        	}

        	$output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $this->main->all($this->table),  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/SubMenuModel'),  
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
            $data['menu'] = $this->main->getall('menu', 'id, menu');
            $data['op'] = $this->main->getall('operations', 'id, type');
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/sub_menu/add', $data);
            }else{
                    $post = $this->input->post();
                    $post['permissions'] = implode(',', $post["permissions"]);

                    $post['priority'] = $this->main->all($this->table) + 1;
                    
                    $id = $this->main->add($post, $this->table);
                    
                    flashMsg(
                    $id, ucwords($this->name).' Added Successfully.', ucwords($this->name).' Not Added, Please Try Again.', $this->redirect
                    );
                }
        }else{
            error_404();
        }
    }

    public function view($id)
    {   
        if (access($this->name,'view')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['op'] = $this->main->getall('operations', 'id, type');
            $join = ['menu_id' => 'menu as m'];
            $data['sub_menu'] = $this->main->get($this->table.' as u', 'm.menu,u.sub_menu, u.url, u.icon, u.permissions', ['u.id'=>$id], $join);
            
            $this->template->load('panel/template','panel/sub_menu/view', $data);
        }else{
            error_404();
        }
    }

    public function update($id)
    {   
        if (access($this->name,'update')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['menu'] = $this->main->getall('menu', 'id, menu');
            $data['op'] = $this->main->getall('operations', 'id, type');
            
            $data['sub_menu'] = $this->main->get($this->table, 'id,sub_menu, url, icon, permissions, menu_id', ['id'=>$id]);

            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/sub_menu/edit', $data);
            }else{

                $post = $this->input->post();  
                $post['permissions'] = implode(',', $post["permissions"]);
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

    public function priority()
    {   
        if (access($this->name,'update')) {
            $post = $this->input->post();
            
            $id = $post['id'];
            unset($post['id']);
            $id = $this->main->update($id, $post, $this->table);

            flashMsg(
                    $id, ucwords($this->name).' Changed Successfully.', ucwords($this->name).' Not Changed, Please Try Again.', $this->redirect
                    );
        }else{
            $this->load->view('panel/error_404');
        }
    }
}