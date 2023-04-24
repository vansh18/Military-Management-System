<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//Model for runing chatbot using python script (currently not in use)
class LoginModel extends CI_Model
{
    public function validate_creds($userid,$password)
    {
        $this->db->select('password,user_id');
        $this->db->from('login_details');
        $this->db->where('userid',$userid);
        $query=$this->db->get();
        $result=$query->row_array();
        if($result['password']==$password)
        {
            return true;
        }
        else
            return false;
    }
}
?>