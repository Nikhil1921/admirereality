<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class CommercialModel extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public $table = "commercial as cp";
    public $tab = 'cp';
    public $join = array('state' => 'states as s','city' => 'cities as c');
    public $select_column = array('cp.id','cp.address','s.name as state','c.city as city','cp.price','cp.title','cp.uploaded','cp.pincode','cp.featured','cp.multi_image','cp.area','cp.parking');
    public $search_column = array('cp.address','s.name as state','c.name as city','cp.price'); 
    public $order_column = array(null,'cp.title','cp.address','cp.uploaded',null); 
    public $order = array('cp.id' => 'DESC');

    public function make_query()
    {  
        $this->db->select($this->select_column)
                    ->from($this->table)
                    ->where(array('cp.is_delete' => 0));

        foreach ($this->join as $i => $t) {
            $this->db->join($t, $t.'.id = '.$this->tab.'.'.$i);
        }
        if (isset($_GET['state'])) {
            $this->db->where(array('s.name' => $_GET['state']));
        }

        if (isset($_GET['city'])) {
            $this->db->like('c.city', $_GET['city']);
        }

        if (isset($_GET['type'])) {
            $this->db->where(array('cp.type' => $_GET['type']));
        }

        if (isset($_GET['parking'])) {
            $this->db->where(array('cp.parking' => $_GET['parking']));
        }

        /*$i = 0;
        foreach ($this->search_column as $item) 
        {
            if(isset($_GET['q']))
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_GET['q']);
                }
                else
                {
                    $this->db->or_like($item, $_GET['q']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }*/
         
        if(isset($_GET['sort'])) 
        {   
            $sort = $_GET['sort'];
            if ($sort == 'latest_desc') {
                $sort = str_replace('latest','id', $sort);
            }
            
            $o = explode('_', $sort);
            $this->db->order_by($o[0], $o[1]);
        } 
        else
        {
            $this->db->order_by('cp.title','ASC');
        }
    }          

    public function properties($limit = '', $start = '')
    {  
       $this->make_query();  
       $this->db->limit($limit, $start);
       $query = $this->db->get(); 
       return $query->result_array();
    }

    public function get_filtered_data(){
       $this->make_query();  
       $query = $this->db->get();  

       return $query->num_rows();  
    } 
}