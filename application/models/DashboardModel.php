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
    public function get_subgroup($userid,$rank)
    {
        // function to get the subgroup of the user
        $sub = array();
        // return squad info if user is a platoon commander or squad member, each squad has its own table with 2 members, get squad if from platoon table
        if($rank == 5)
        {
            $squads = array('Anti_Tank','Medical','Sniper','Assault','Signals','Infantry');
            foreach ( $squads as $squad ) {
                $field = $squad.'_id';
                $sql = "SELECT squad_id,squad_mem1,squad_mem2 FROM $squad WHERE squad_id = (SELECT $field FROM Platoon 
                WHERE NCO = ?)";
                $query = $this->db->query ( $sql, array($userid) );
                $result = $query->row_array ();
                if(isset($result['squad_mem1']))
                {
                    $sub[$field]['id'] = array($result['squad_mem1'],$result['squad_mem2']);
                    // get names from Users table
                    $sql = "SELECT User_name FROM Users WHERE User_id in(?,?)";
                    $query = $this->db->query ( $sql, array($result['squad_mem1'],$result['squad_mem2']) );
                    $result2 = $query->result_array ();
                    $sub[$field]['names'] = array($result2[0]['User_name'],$result2[1]['User_name']);
                    $sub[$field]['squad_id'] = $result['squad_id'];
                }
            }
        }
        else
        {
            $subgroup = '';
            $mygroup = '';
            $my_leader = '';
            $sub_leader = '';
            if($_SESSION['user_info']['Rank_id'] == 1)
            {
                $subgroup =  'Batallion';
                $mygroup = 'Brigade';
                $my_leader = 'Brigade_commander';
                $sub_leader = 'Commanding_officer';
                $sub_rank = 'Col. ';
            }
            else if ($_SESSION['user_info']['Rank_id'] == 2 || $_SESSION['user_info']['Rank_id'] == 3)
            {
                $subgroup =  'Company';
                $mygroup = 'Batallion';
                $my_leader = 'Commanding_officer';
                $sub_leader = 'Company_Commander';
                $sub_rank = 'Maj. ';
            }
            else if ($_SESSION['user_info']['Rank_id'] == 4)
            {
                $subgroup =  'Platoon';
                $mygroup = 'Company';
                $my_leader = 'Company_Commander';
                $sub_leader = 'NCO';
                $sub_rank = 'Hav. ';
            }
            // query to get all subgroup ids
            $sql = "SELECT $subgroup"."1, $subgroup"."2, $subgroup"."3, $subgroup"."4 FROM $mygroup WHERE $my_leader = ?";
            $query = $this->db->query ( $sql, array($_SESSION['userid']) );
            $subgrp = $query->row_array();
            foreach($subgrp as $key => $value)
            {
                // query to get subgroup leader name
                if(isset($subgrp[$key]))
                {
                    // select subgroup leader name and id from users table and subgroup name from subgroup table
                    $sql = "SELECT $subgroup"."_id,$subgroup"."_name,concat('$sub_rank',Users.User_name) as User_name,Users.User_id FROM Users
                     INNER JOIN $subgroup ON Users.User_id = $subgroup.$sub_leader 
                     WHERE $subgroup"."_id = ?";
                    $query = $this->db->query ( $sql, $value);
                    $result = $query->row_array();
                    if(isset($result['User_id']))
                    {
                        $arr = array();
                        $arr['id'] = $result['User_id'];
                        $arr['name'] = $result['User_name'];
                        array_push($sub,$result);
                    }
                    
                }
            }
        }
        return $sub;
    }
}