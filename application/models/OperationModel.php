<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OperationModel extends CI_Model
{
    public function add_operation($data)
    {
        if($this->db->insert('Operations',$data))
            return true;
        else
            return false;

    }
    public function get_batallions()
    {
        try {
            $this->db->select('Batallion1,Batallion2,Batallion3,Batallion4');
            $this->db->from('Brigade');
            $this->db->where('Brigade_commander',$_SESSION['user_info']['User_id']);
            $query=$this->db->get();
            $result=$query->result_array();
            return $result;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
?>