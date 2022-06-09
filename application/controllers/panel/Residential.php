<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Residential extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('role'))) {
            return redirect('panel/login');
        }
    }

    private $name = "residential";
    private $table = "residential";
    private $icon = 'fa-apartment';
    private $redirect = 'panel/residential';

    public $validate = [
            [
                'field' => 'title',
                'label' => 'Property Title',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'price',
                'label' => 'Property Price',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'area',
                'label' => 'Super Buildup Area',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'b_area',
                'label' => 'Buildup Area',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'c_area',
                'label' => 'Carpet Area',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'room',
                'label' => 'Rooms',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'bathroom',
                'label' => 'Bathroom',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'garage',
                'label' => 'Garage',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'state',
                'label' => 'State',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'pincode',
                'label' => 'Pin Code',
                'rules' => 'required|exact_length[6]',
                'errors' => [
                    'required' => "%s is Required",
                    'exact_length' => "%s is Not Valid",
                ],
            ],
            [
                'field' => 'details',
                'label' => 'Detailed Information',
                'rules' => 'required',
                'errors' => [
                    'required' => "%s is Required",
                ],
            ],
            [
                'field' => 'features[]',
                'label' => 'Feature',
                'rules' => 'required',
                'errors' => [
                    'required' => "Select at Least One %s",
                ],
            ]
    ];
    
    public function index()
    {   
        if (access($this->name,'index')) {
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $this->template->load('panel/template','panel/residential/index', $data);
        }else{
        error_404();
        }
    }

    public function get()
    {
        if (access($this->name,'list')) {
            $fetch_data = $this->main->make_datatables('panel/ResidentialModel');
            $sr = $_POST['start'] + 1;
            $data = array();  

            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = $sr;
                $sub_array[] = ucwords($row->title);
                $sub_array[] = $row->address.'<br>'.$row->city.'<br>'.$row->state.'-'.$row->pincode;
                $sub_array[] = date("d-m-Y", strtotime($row->uploaded));

                if ($this->session->userdata('role') != 'builder') {
                    if ($row->featured == 0) {
                    $sub_array[] = '<a onclick="return confirm(\'Are You Sure ?\')" href="'.base_url('panel/residential/featured/').$row->id.'/1" class="text-danger"><i class="fa fa-square-o fa-lg"></i></a><br>';
                    }else{
                        $sub_array[] = '<a onclick="return confirm(\'Are You Sure ?\')" href="'.base_url('panel/residential/featured/').$row->id.'/0" class="text-success"><i class="fa fa-check-square-o fa-lg"></i></a>';
                    }
                }

                $sub_array[] = '<div class="table_form">
                <a class="btn btn-success" href="'.base_url('panel/').'residential/view?id='.my_crypt($row->id,'e').'"><i class="fa fa-eye "></i></a>
                <a class="btn btn-primary" href="'.base_url('panel/').'residential/update?id='.my_crypt($row->id,'e').'"><i class="fa fa-pencil-square-o "></i></a>
                <form action="'.base_url('panel/').'residential/delete" method="POST"><input type="hidden" name="id" value="'.$row->id.'"><button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                </form></div>
                ';

                $data[] = $sub_array;  
                $sr++;
            }

            $output = array(  
                "draw"              =>     intval($_POST["draw"]),  
                "recordsTotal"      =>     $this->main->all($this->table),  
                "recordsFiltered"   =>     $this->main->get_filtered_data('panel/ResidentialModel'),  
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

            
            $data['states'] = $this->main->getall('states', 'id,name','','','name ASC');
            $data['features'] = $this->main->getall('features', 'id,feature');
            if ($this->session->userdata('role') !== 'builder'):
            $select = 'users.id, users.name';
            $join = ['role'=>'role as r'];
            $data['builders'] = $this->main->getall('users', $select, ['r.role'=>'builder'],$join);
            $this->form_validation->set_rules('builder','Builder', 'required', ['required' => "%s is Required"]);
            endif;
            
            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/residential/add', $data);
            }else{
                    if (empty($_FILES['plan_image']['name'])) {
                    $data['error'] = '<span class="text-danger">* Please Select Image for Floor Plan</span>';
                    $this->template->load('panel/template','panel/residential/add', $data);
                    }else{
                        $post = $this->input->post();
                        
                        $config['upload_path']= "./assets/img/plan/";
                        $config['allowed_types']='jpg|jpeg';

                        $this->upload->initialize($config);
                        $image = $_FILES['plan_image']['name'];
                        $extn = explode(".", strtolower($_FILES['plan_image']['name']));
                        $image = $post['title'].'.'.$extn[1];
                        $_FILES['plan_image']['name'] = $image;
                        
                        if (!$this->upload->do_upload("plan_image")) {
                           $this->template->load('panel/template','panel/residential/add', $data);
                        }else{
                            $data = $this->upload->data();

                            $post['plan_image'] = $data["file_name"];
                            $post['features'] = implode(',', $post['features']);
                            if ($this->session->userdata('role') == 'builder') {
                                $post['builder'] = $this->session->userdata('id');
                            }
                            
                            $id = $this->main->add($post, $this->table);
                            $this->session->set_flashdata('resi_id',$id);
                            flashMsg(
                                $id, ucwords($this->name).' Added Successfully. Upload Product Images.', ucwords($this->name).' Not Added, Please Try Again.', $this->redirect.'/uploadImages'
                            );
                        }
                    }
                }
        }else{
            error_404();
        }
    }
    
    public function uploadImages()
    {   
        if (access($this->name, 'add')) { 
            (empty($this->session->flashdata('resi_id'))) ? redirect($this->redirect) : '';
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $id = $this->session->flashdata('resi_id');
            $data['images'] = $this->main->check($this->table, ['id'=>$id], 'multi_image');
            
            $this->template->load('panel/template','panel/residential/upload', $data);
        }else{
            error_404();
        }
    }

    public function imageUpload($id)
    {   
        if (access($this->name, 'add')) { 
            $config['upload_path']= "./assets/img/properties/residential/"; 
            $config['allowed_types']='jpg|jpeg';
            
            $multi_image = $this->main->check($this->table, ['id'=>$id], 'multi_image');
            $image_name = $this->main->check($this->table, ['id'=>$id], 'title');
            
            $this->upload->initialize($config);
            $image = $_FILES['file']['name'];
            $extn = explode(".", strtolower($_FILES['file']['name']));
            $image = $image_name.'.'.$extn[1];
            $_FILES['file']['name'] = $image;
            if ($this->upload->do_upload("file")) {
                $data = $this->upload->data();

                $image_upload = $data["file_name"];
                
                if ($multi_image === '') {
                    $this->main->update($id, ['multi_image'=>$image_upload], $this->table);
                }else{
                    $multi_image = explode(',', $multi_image);
                    array_push($multi_image, $image_upload);
                    $multi_image = implode(',', $multi_image);
                    $this->main->update($id, ['multi_image'=>$multi_image], $this->table);
                }
            }
        }else{
            error_404();
        }
    }

    public function removeImage($img,$id)
    {   
        if (access($this->name, 'update')) { 
            $multi_image = $this->main->check($this->table, ['id'=>$id], 'multi_image');
            $image_path = "./assets/img/properties/residential/".$img;
            unlink($image_path);
            
            $multi_image = explode(',', $multi_image);
            $i = array_search($img, $multi_image);
            unset($multi_image[$i]);
            $multi_image = implode(',', $multi_image);
            
            $this->main->update($id, ['multi_image'=>$multi_image], $this->table);
        }else{
            error_404();
        }
    }

    public function get_city()
    {
        if (access($this->name, 'add')) { 
            $select = $this->input->post('select');
            $id = $this->input->post('id');
            $cities = $this->main->getall('cities', 'id,city', array('state_id'=>$id));
            
            $output = '<option  value="">Select City</option>';
            foreach ($cities as $key => $city) {
                $output .= '<option value="'.$city['id'].'">'.ucfirst($city['city']).'</option>';
            }
            echo $output;
        }else{
            error_404();
        }
    }

    public function view()
    {
        if (access($this->name, 'add') && !empty($this->input->get('id'))) { 
            $id = my_crypt($this->input->get('id'),'d');
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['states'] = $this->main->getall('states', 'id,name','','','name ASC');
            $data['features'] = $this->main->getall('features', 'id,feature');
            if ($this->session->userdata('role') !== 'builder'):
            $select = 'users.id, users.name';
            $join = ['role'=>'role as r'];
            $data['builders'] = $this->main->getall('users', $select, ['r.role'=>'builder'],$join);
            $this->form_validation->set_rules('builder','Builder', 'required', ['required' => "%s is Required"]);
            endif;
            $data['property'] = $this->fmain->get($this->table, 'title, price, area, type, room, bathroom, garage, address, state, city, pincode, details, features, builder, plan_image, multi_image,c_area,b_area',['id'=>$id]);
            $this->template->load('panel/template','panel/residential/view', $data);
        }else{
            error_404();
        }
    }

    public function update()
    {
        if (access($this->name, 'update') && !empty($this->input->get('id'))) { 
            $id = my_crypt($this->input->get('id'),'d');
            $data['name'] = $this->name;
            $data['icon'] = $this->icon;
            $data['states'] = $this->main->getall('states', 'id,name','','','name ASC');
            $data['features'] = $this->main->getall('features', 'id,feature');
            if ($this->session->userdata('role') !== 'builder'):
            $select = 'users.id, users.name';
            $join = ['role'=>'role as r'];
            $data['builders'] = $this->main->getall('users', $select, ['r.role'=>'builder'],$join);
            $this->form_validation->set_rules('builder','Builder', 'required', ['required' => "%s is Required"]);
            endif;
            $data['property'] = $this->fmain->get($this->table, 'id,title, price, area, type, room, bathroom, garage, address, state, city, pincode, details, features, builder, plan_image, multi_image,c_area,b_area',['id'=>$id]);

            $this->form_validation->set_rules($this->validate);
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('panel/template','panel/residential/edit', $data);
            }else{
                $post = $this->input->post();
                $post['features'] = implode(',', $post['features']);
                
                if (empty($_FILES['plan_image']['name'])) {
                    $this->session->set_flashdata('resi_id',$id);
                    $id = $this->main->update($id, $post, $this->table);
                    flashMsg(
                            $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect.'/uploadImages'
                        );
                }else{
                    $config['upload_path']= "./assets/img/plan/";
                    $config['allowed_types']='jpg|jpeg';

                    $this->upload->initialize($config);
                    $image = $_FILES['plan_image']['name'];
                    $extn = explode(".", strtolower($_FILES['plan_image']['name']));
                    $image = $post['title'].'.'.$extn[1];
                    $_FILES['plan_image']['name'] = $image;
                    
                    if (!$this->upload->do_upload("plan_image")) {
                           $this->template->load('panel/template','panel/residential/add', $data);
                        }else{
                        $image_path = "./assets/img/plan/".$post['plan_image'];
                        unlink($image_path);
                        $data = $this->upload->data();

                        $post['plan_image'] = $data["file_name"];
                        $this->session->set_flashdata('resi_id',$id);
                        $id = $this->main->update($id, $post, $this->table);
                        
                        flashMsg(
                            $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect.'/uploadImages'
                        );
                    }
                }
            }   
        }else{
            error_404();
        }
    }

    public function featured($id, $status)
    {
        if (access($this->name, 'update')) { 
            $post['featured'] = $status;
            $id = $this->main->update($id, $post, $this->table);
            flashMsg(
                $id, ucwords($this->name).' Updated Successfully.', ucwords($this->name).' Not Updated, Please Try Again.', $this->redirect
            );
        }else{
            error_404();
        }
    }

    public function delete()
    {
        if (access($this->name, 'delete') && !empty($this->input->post('id'))) { 
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