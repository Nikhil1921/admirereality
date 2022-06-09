<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class SubMenuModel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

    public $table = "sub_menu as sm";
	public $tab = 'sm';
    public $join = array('menu_id' => 'menu as m');
	public $select_column = array('sm.id','sm.sub_menu','m.menu','sm.priority');
	public $search_column = array('m.menu'); 
    public $order_column = array(null,'sm.sub_menu','m.menu','sm.priority',null);
	public $order = array('sm.priority' => 'ASC');

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table);

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