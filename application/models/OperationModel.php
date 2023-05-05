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
            // sql query to get battalions name and id, name is in batallions table and id is in brigade table
            $sql = " SELECT Batallion.Batallion_name,Batallion.Batallion_id 
            FROM Batallion INNER JOIN Brigade ON Batallion.Batallion_id=Brigade.Batallion1 OR Batallion.Batallion_id=Brigade.Batallion2 OR Batallion.Batallion_id=Brigade.Batallion3 OR Batallion.Batallion_id=Brigade.Batallion4
            WHERE Brigade.Brigade_commander = ? ";
            $query = $this->db->query($sql,$_SESSION['userid']);
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