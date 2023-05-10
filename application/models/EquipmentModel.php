<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class EquipmentModel extends CI_Model 
{
    public function manage_equipment($data)
    {   
        $type = $data['type'];
        $action = $data['action'];
        $name = $data['name'];
        $quantity = $data['quantity'];
        if($action == "Add")
        {
            //Add equipment to Equipment table
            $sql = "INSERT INTO Equipment (category,Equipment_name,Total_qty,Available_qty) VALUES (?,?,?,?)";
            $query = $this->db->query($sql,array($type,$name,$quantity,$quantity));
            if($query)
                return true;
            else
                return false;
        }
        if($action == 'Allocate')
        {   
            $assignee = $data['assignee'];
            //get equipment id from Equipment table
            $sql = "SELECT Equipment_id FROM Equipment WHERE Equipment_name = ?";
            $query = $this->db->query($sql,$name);
            $result=$query->row_array();
            //if equipment does not exist in Equipment table, return error
            if(!$result)
                return false;
            $equip_id = $result['Equipment_id'];

            // Update Equipment_allocation table
            $sql = "INSERT INTO Equipment_allocation (Equipment_id,Squad_id,Qty_asigned) VALUES (?,?,?)";
            $query = $this->db->query($sql,array($equip_id,$assignee,$quantity));
            if(query)
                return true;
            else
                return false;
        }
        if($action == 'De-allocate')
        {
            //delete equipment from Equipment_allocation table

            //get equipment id from Equipment table
            $sql = "SELECT Equipment_id FROM Equipment WHERE Equipment_name = ?";
            $query = $this->db->query($sql,$name);
            $result=$query->row_array();
            //if equipment does not exist in Equipment table, return error
            if(!$result)
                return false;
            $equip_id = $result['Equipment_id'];
            $sql = "DELETE FROM Equipment_allocation WHERE Equipment_id = ?";
            $query = $this->db->query($sql,array($equip_id));
            if($query)
                return true;
            else
                return false;
        }
    }
}