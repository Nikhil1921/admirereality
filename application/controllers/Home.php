<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ResidentialModel','residential');
		$this->load->model('CommercialModel','commercial');
	}

	public $name = "Home";

	public function index()
	{	
		$data['name'] = $this->name;
		$data['cities'] = $this->fmain->getall('cities', 'city', '','','','','','state_id');
		
		$data['states'] = $this->fmain->getall('states', 'name');
		
		$this->template->load('template','home', $data);
	}

	public function get_featured()
	{
		if (!$this->input->is_ajax_request()) {
		   error_404();
		}else{
			$city = $this->input->post('city');

			$join = array('state' => 'states as s','city' => 'cities as c');
			$prop_feat = $this->fmain->getall('residential as u', 'u.id,price, u.title, u.multi_image,u.address,u.room,u.bathroom,u.garage,u.area,c.city,u.pincode,s.name as state', ['u.featured'=>1,'c.city'=>$city],'id',$join,6);
			$echo = "";

			if (!$prop_feat) {
				$join = array('state' => 'states as s','city' => 'cities as c');
				$prop_feat = $this->fmain->getall('residential as u', 'u.id,price, u.title, u.multi_image,u.address,u.room,u.bathroom,u.garage,u.area,c.city,u.pincode,s.name as state', 'u.featured = 1','',$join,6);
			}

			foreach ($prop_feat as $k => $v) {
				$echo .= '<div class="col-lg-4 col-md-6">
			                <div class="property-box">
			                    <div class="property-thumbnail">
			                        <a href="'.base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) .'" class="property-img">
			                            <div class="tag">Featured</div>
			                            <div class="price-box"><span>'.$v['price'] .'</span> per sqft</div>
			                            <img class="d-block w-100" src="'.asset().'img/properties/residential/'.explode(',', $v['multi_image'])[0] .'" alt="properties">
			                        </a>
			                    </div>
			                    <div class="detail">
			                        <h1 class="title">
			                        <a href="'.base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) .'">'.ucwords($v['title']) .'</a>
			                        </h1>
			                        <div class="location">
			                            <a href="'.base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) .'">
			                                <i class="flaticon-pin"></i>'.ucwords($v['address'].', '.$v['city'].', '.$v['state'].' - '.$v['pincode']) .'
			                            </a>
			                        </div>
			                        <ul class="facilities-list clearfix">
			                            <li>
			                                <i class="flaticon-bed"></i> '.$v['room'] .' Beds
			                            </li>
			                            <li>
			                                <i class="flaticon-bathroom"></i> '.$v['bathroom'] .' Baths
			                            </li>
			                            <li>
			                                <i class="flaticon-ui"></i> Sq Ft:'.$v['area'] .'
			                            </li>
			                            <li>
			                                <i class="flaticon-car"></i> '.$v['garage'] .' Garage
			                            </li>
			                        </ul>
			                    </div>
			                </div>
			            </div>';
			}
			
			echo $echo;
		}
	}

	public function about()
	{
		$data['name'] = 'about us';
		$data['sub_banner'] = 'about us';
		$this->template->load('template','about', $data);
	}

	public function gallery()
	{
		$data['name'] = 'gallery';
		$data['sub_banner'] = 'gallery';
		$this->template->load('template','gallery', $data);
	}

	public function contact()
	{
		$data['name'] = 'contact us';
		$data['sub_banner'] = 'contact us';
		$this->template->load('template','contact', $data);
	}

	public function commercial_properties()
	{
		$data['name'] = 'commercial properties';
		$data['sub_banner'] = 'commercial properties';
		$base_url = base_url('commercial-properties');
		$i = 0;
		$url = $this->input->get();
		unset($url['per_page']);
		foreach ($url as $k => $v) {
			if ($i !== 0) {
				$base_url .= "&".$k."=" . strtolower(urlencode($v));
			}else{

				$base_url .= "?".$k."=" . strtolower(urlencode($v));
			}
			$i++;
		}
		
		$config = [ "base_url"	=> $base_url,
					"total_rows"=> $this->commercial->get_filtered_data(),
					"per_page"	=> 6,
					"enable_query_strings"=>TRUE,
					"page_query_string" => TRUE,
					  ];
		
		$this->pagination->initialize($config);
        $page = (!empty($this->input->get('per_page'))) ? $this->input->get('per_page') : 0;
        
        $data['props'] = $this->commercial->properties($config["per_page"], $page);
		$this->template->load('template','commercial_properties', $data);
	}

	public function residential_properties()
	{
		$data['name'] = 'residential properties';
		$data['sub_banner'] = 'residential properties';
		$base_url = base_url('residential-properties');
		$i = 0;
		$url = $this->input->get();
		unset($url['per_page']);
		foreach ($url as $k => $v) {
			if ($i !== 0) {
				$base_url .= "&".$k."=" . strtolower(urlencode($v));
			}else{

				$base_url .= "?".$k."=" . strtolower(urlencode($v));
			}
			$i++;
		}
		
		$config = [ "base_url"	=> $base_url,
					"total_rows"=> $this->residential->get_filtered_data(),
					"per_page"	=> 6,
					"enable_query_strings"=>TRUE,
					"page_query_string" => TRUE,
					  ];
		
		$this->pagination->initialize($config);
        $page = (!empty($this->input->get('per_page'))) ? $this->input->get('per_page') : 0;
        
        $data['props'] = $this->residential->properties($config["per_page"], $page);
        
		$this->template->load('template','residential_properties', $data);
	}

	public function residential_property($title,$id)
	{
		$id = my_crypt($id,'d');
		$data['name'] = 'property details';
		$data['sub_banner'] = 'property details';
		$join = ['city'=>'cities as c', 'state'=>'states as s','builder'=>'users as b'];
		$data['property'] = $this->fmain->get('residential as u','u.id,u.price, u.title, u.multi_image,u.address,u.room,u.details,u.bathroom,u.garage,u.area,u.features,u.plan_image,u.type,u.pincode,s.name as state,c.city,b.name as builder,u.area,u.b_area,c_area,b.email,b.mobile',['u.id'=>$id],$join);
		$data['recent'] = $this->fmain->getall('residential','id,price, title, multi_image,uploaded','','id','',3);
		
		$this->template->load('template','residential_details', $data);
	}

	public function commercial_property($title,$id)
	{
		$id = my_crypt($id,'d');
		$data['name'] = 'property details';
		$data['sub_banner'] = 'property details';
		$join = ['city'=>'cities as c', 'state'=>'states as s','builder'=>'users as b'];
		$data['property'] = $this->fmain->get('commercial as u','u.id,u.price, u.title, u.multi_image,u.address,u.details,u.parking,u.area,u.features,u.plan_image,u.type,u.pincode,s.name as state,c.city,b.name as builder,u.area,u.b_area,c_area,b.email,b.mobile',['u.id'=>$id],$join);
		$data['recent'] = $this->fmain->getall('commercial','id,price, title, multi_image,uploaded','','id','',3);
		
		$this->template->load('template','commercial_details', $data);
	}

	public function get_city()
    {
        $select = $this->input->post('select');
        $name = $this->input->post('name');
        $id = $this->fmain->check('states',['name'=>$name],'id');
        $cities = $this->main->getall('cities', 'city', array('state_id'=>$id));
        $output = '<option  value="">Select City</option>';
        foreach ($cities as $key => $city) {
            $output .= '<option value="'.$city['city'].'">'.ucfirst($city['city']).'</option>';
        }
        echo $output;
    }

	public function error_404()
	{
		error_404();
	}	
}