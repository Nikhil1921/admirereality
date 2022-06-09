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
    public $select_column = array('cp.id','cp.address','s.name as state','c.city','cp.price','cp.title','cp.uploaded','cp.pincode','cp.featured');
    public $search_column = array('cp.title','cp.address','s.name','c.city','cp.price'); 
    public $order_column = array(null,'cp.title','cp.address','cp.uploaded',null); 
    public $order = array('cp.id' => 'DESC');

    public function make_query()  
    {  
        $this->db->select($this->select_column)
                    ->from($this->table)
                    ->where(array('cp.is_delete' => 0));
        
        if ($this->session->userdata('role') == 'builder') {
            $this->db->where(array('cp.builder' => $this->session->userdata('id')));
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