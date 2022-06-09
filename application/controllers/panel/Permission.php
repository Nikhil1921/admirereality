<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('login');
        }
    }

    private $name = "permission";
    private $table = "access";
    private $icon = 'fa-cogs';
    private $redirect = 'panel/permission';
    
    public function index()
    {   
        if (access($this->name,'index')) { 
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            if ($this->session->userdata('role') === 'super admin') {
                $ignore = array('super admin');    
            }else{
                $ignore = array('super admin', 'admin');
            }
            
            $not_in = $this->db->where_not_in('role', $ignore);
            $data['roles'] = $this->main->getall('role', 'id,role','','','', $not_in);
            
            $this->template->load('panel/template','panel/permission/index', $data);
        }else{
            error_404();
        }
    }

    public function create($id)
    {
        if (access($this->name,'add')) { 
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['role'] = $this->main->check('role',['id'=> $id],'role');
            $data['access'] = $this->main->getall('access', 'role,menu,operation',array('role'=>$data['role']));
            $data['access'] = json_encode($data['access']);
            $data['id'] = $id;
            $menu = (array) json_decode($this->main->check('role', array('id'=>$id), 'navigation'));
            $me = [];
            foreach ($menu as $k => $v) {
                $me[$this->main->check('menu', array('id'=>$k), 'menu')] = $v;
            }

            foreach ($me as $k => $v) {
                foreach ($v as $key => $va) {
                    $me[$k][$key] = $this->main->get('sub_menu','sub_menu,url', array('id'=>$va));
                }
            }
            $data['menu'] = $me;
            
            $this->template->load('panel/template','panel/permission/create', $data);
        }else{
            error_404();
        }
    }

    public function add($per)
    {    
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            if (access($this->name,'add')) {
                $post = $this->input->post();

                $ids = $this->main->getall($this->table, 'id', array('role' => $post['role'], 'menu' => $post['menu']));
                
                foreach ($ids as $k => $id) {
                    $this->main->delete($id['id'], $this->table);
                }
                
                if (isset($post['operation'])) {
                    foreach ($post['operation'] as $k => $v) {
                        $access[$k]['role'] = $post['role'];
                        $access[$k]['menu'] = $post['menu'];
                        
                        $access[$k]['operation'] = $v;
                    }
                    
                    foreach ($access as $k => $v) {
                        $this->main->add($v, $this->table);
                    }
                }
                $this->create($per);
            }else{
                error_404();
            }
        }else{
            error_404();
        }
    }
}