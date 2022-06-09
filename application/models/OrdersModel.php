<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class OrdersModel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "orders as o";
    public $tab = 'o';
    public $join = array();
    public $select_column = array('o.id','o.order_no','o.name','o.mobile','o.pay_type','o.order_date','o.del_date','o.status','o.pay_status','o.details','o.ship_address','o.payment_id','o.total');
    public $search_column = array('o.id','o.order_no','o.pay_type','o.order_date','o.del_date','o.status','o.pay_status','o.details','o.ship_address','o.payment_id');

	public function make_query()
	{  
        $this->db->select($this->select_column)
                    ->from($this->table)
                    ->where(array('o.is_delete' => 0));

        foreach ($this->join as $i => $t) {
            $this->db->join($t, $t.'.id = '.$this->tab.'.'.$i);
        }
        
        $i = 0;
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
        }
         
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
            $this->db->order_by('o.id','DESC');
        }
	}          

    public function orders($limit = '', $start = '')
    {  
       $this->make_query();  
       $this->db->limit($limit, $start);
       $query = $this->db->get(); 
       return $query->result_array();
    }

    public function product($prod)
    {  
       $this->make_query();

       $this->db->like('o.name', $prod);
       $query = $this->db->get(); 
       return $query->row_array();
    }  

    public function get_filtered_data(){
       $this->make_query();  
       $query = $this->db->get();  

       return $query->num_rows();  
    } 
}