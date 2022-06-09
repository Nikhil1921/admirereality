<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class UsersModel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "users as u";
    public $tab = 'u';
    public $join = array('role' => 'role as r');
	public $select_column = array('u.id', 'u.name', 'u.email', 'u.image', 'u.mobile','r.role','r.navigation');
	public $search_column = array('u.id', 'u.name', 'u.email', 'u.image', 'u.mobile'); 
    public $order_column = array(null, 'u.name', 'u.email','u.mobile','r.role', null, null); 
	public $order = array('u.id' => 'DESC');

	public function make_query()  
	{  
        $this->db->select($this->select_column)
                    ->from($this->table)
                    ->where(array('r.role !=' => 'super admin','u.is_delete' => 0));
        
        if ($this->session->userdata('role') != 'super admin') {
            $this->db->where(array('r.role !=' => 'admin'));
        }
        
        foreach ($this->join as $i => $t) {
            $this->db->join($t, $t.'.id = '.$this->tab.'.'.$i) ;    
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