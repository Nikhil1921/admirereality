<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class ResidentialModel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "residential as r";
    public $tab = 'r';
    public $join = array('state' => 'states as s','city' => 'cities as c');
	public $select_column = array('r.id','r.address','s.name as state','c.city as city','r.price','r.title','r.uploaded','r.pincode','r.featured');
	public $search_column = array('r.address','s.name','c.city','r.price','r.title'); 
    public $order_column = array(null,'r.title','r.address','r.uploaded',null); 
	public $order = array('r.id' => 'DESC');

	public function make_query()
	{  
        $this->db->select($this->select_column)
                    ->from($this->table)
                    ->where(array('r.is_delete' => 0));
        
        if ($this->session->userdata('role') == 'builder') {
            $this->db->where(array('r.builder' => $this->session->userdata('id')));
        }
        
        foreach ($this->join as $i => $t) {
            $this->db->join($t, $t.'.id = '.$this->tab.'.'.$i);    
        }

        $i = 0;

        foreach ($this->search_column as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}           
}