<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class DashboardModel extends CI_Model {

    public function get_batallions_info() {
        try {
            // sql query to get battalions name and id as well as commanding officer id, name is in batallions table and id is in brigade table and commanding officer name is in users table
            $sql = " SELECT Batallion.Batallion_name,Batallion.Batallion_id,Users.user_id,Users.name
            FROM  Batallion INNER JOIN Brigade ON Batallion.Batallion_id=Brigade.Batallion1 OR Batallion.Batallion_id=Brigade.Batallion2 OR Batallion.Batallion_id=Brigade.Batallion3 OR Batallion.Batallion_id=Brigade.Batallion4
            INNER JOIN Users ON Users.user_id=Brigade.Brigade_commander
            WHERE Brigade.Brigade_commander = ? ";
            $query = $this->db->query ( $sql, $_SESSION ['userid'] );
            $result = $query->result_array ();
            return $result;
        } catch ( Exception $e ) {
            return false;
        }
            
    }
    public function add_operation($data) {
        if ($this->db->insert ( 'Operations', $data ))
            return true;
        else
            return false;
    }
}