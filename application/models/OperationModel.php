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

    public function get_operations_brig($userid)
    {
        // get bridage id from brigade table
        $sql = "SELECT Brigade_id FROM Brigade WHERE Brigade_commander = ?";
        $query = $this->db->query($sql,$userid);
        $result=$query->row_array();
        $brigade_id = $result['Brigade_id'];
        // get operations under brigade
        // get batallion id from brigade table, then use batallion id to get operation from operations table, also get batallion name from batallion table
        // order by most recent operation first and limit to 7
        try {
            $sql = "SELECT * FROM Operations WHERE Batallion_id = (SELECT Batallion1 FROM Brigade WHERE Brigade_id = ?) 
                    OR Batallion_id = (SELECT Batallion2 FROM Brigade WHERE Brigade_id = ?)
                    OR Batallion_id = (SELECT Batallion3 FROM Brigade WHERE Brigade_id = ?)
                    OR Batallion_id = (SELECT Batallion4 FROM Brigade WHERE Brigade_id = ?)
                    ORDER BY start_date DESC
                    LIMIT 7
                    ";
            $query = $this->db->query($sql,array($brigade_id,$brigade_id,$brigade_id,$brigade_id));
            $result=$query->result_array();
            foreach($result as $k => $res)
            {
                $sql = "SELECT Batallion_name FROM Batallion WHERE Batallion_id = ?";
                $query = $this->db->query($sql,$res['Batallion_id']);
                $result2=$query->row_array();
                $res['Batallion_name'] = $result2['Batallion_name'];
                $result[$k] = $res;
            }
            return $result;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    public function get_operations_bat($userid)
    {
        // get batallion id from batallion table
        $sql = "SELECT Batallion_id FROM Batallion WHERE Commanding_officer = ?";
        $query = $this->db->query($sql,$userid);
        $result=$query->row_array();
        $batallion_id = $result['Batallion_id'];
        // get operations under batallion
        // get batallion id from batallion table, then use batallion id to get operation from operations table, also get batallion name from batallion table
        // order by most recent operation first and limit to 7
        try {
            $sql = "SELECT * FROM Operations WHERE Batallion_id = ? ORDER BY start_date DESC LIMIT 7";
            $query = $this->db->query($sql,$batallion_id);
            $result=$query->result_array();
            foreach($result as $k => $res)
            {
                $sql = "SELECT Batallion_name FROM Batallion WHERE Batallion_id = ?";
                $query = $this->db->query($sql,$res['Batallion_id']);
                $result2=$query->row_array();
                $res['Batallion_name'] = $result2['Batallion_name'];
                $result[$k] = $res;
            }
            return $result;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
?>