<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    public function validate_creds($userid,$password)
    {
        $this->db->select('password,user_id');
        $this->db->from('login_details');
        $this->db->where('user_id',$userid);
        $query=$this->db->get();
        $result=$query->row_array();
        if(isset($result['password']) && $result['password']==$password)
        {
            return true;
        }
        else
            return false;
    }
    public function create_session($userid)
    {
        $_SESSION['status'] = 'loggedin';
        $_SESSION['userid'] = $userid;
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where('user_id',$userid);
        $query=$this->db->get();
        $result=$query->row_array();
        $_SESSION['user_info'] = $result;
        $this->db->select('Rank_name');
        $this->db->from("Ranks");
        $this->db->where("Rank_id",$result['Rank_id']);
        $query=$this->db->get();
        $rank=$query->row_array();
        $_SESSION['user_info']['rank'] = $rank['Rank_name'];
        // add rank to session variables
    }
    public function destroy_session()
    {
        session_unset();
        session_destroy();
    }
    public function call_proc()
    {
        $query = "CALL demote(?)";
        if($this->db->query($query,8))
            echo 'yay';
        else    
            echo'nay';
    }
}
?>