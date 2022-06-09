<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
        var $template_data = array();
        
        public function set($name, $value)
        {
            $this->template_data[$name] = $value;
        }
    
        public function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
        {               
            $this->CI =& get_instance();

            /*$redirect = current_url();
            
            if (strrpos($redirect, 'http://')  === 0) {
                $redirect = str_replace('http://', 'https://', $redirect);
                return redirect($redirect);
            }*/

            if (!empty($this->CI->session->userdata('role'))) {
                
                if ($this->CI->session->userdata('role') == 'super admin') {
                    $m = $this->CI->main->getall('menu', 'id','','',"priority ASC");
                    foreach ($m as $k => $v) {
                        $s = $this->CI->db->select('id')->where('menu_id',$v['id'])->from('sub_menu')->order_by('priority','ASC')->get()->result_array();
                        foreach ($s as $key => $va) {
                            $menu[$v['id']][$key] =  $va['id'];
                        }
                    }
                }else{
                    $menu = (array) json_decode($this->CI->main->check('role', array('role'=>$_SESSION['role']), 'navigation'));
                }
                $me = [];

                foreach ($menu as $k => $v) {
                    $me[$this->CI->main->check('menu', array('id'=>$k), 'menu')] = $v;
                }

                foreach ($me as $k => $v) {
                    foreach ($v as $key => $va) {
                        $me[$k][$key] = $this->CI->main->get('sub_menu','sub_menu,url,icon', array('id'=>$va));
                    }
                }
                
                $view_data['navigation'] = $me;
            }
            $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
            return $this->CI->load->view($template, $this->template_data, $return);
        }
}