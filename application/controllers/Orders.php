<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Orders extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct ();
        user_login ();
    }

    public function index() 
    {
        // if Rank_id is 6, block access
        if ($_SESSION ['user_info'] ['Rank_id'] == 6) 
        {
            echo 'You are not authorized to access this page. You will be redirected to dashboard in 2 seconds.';
            header ( "refresh:2;url=" . base_url () . "dashboard" );
        } 
        else 
        {
            $this->load->model ( 'OrdersModel' );
            $rank = $_SESSION ['user_info'] ['Rank_id'];
            $userid = $_SESSION ['user_info'] ['User_id'];
            $post = $_SESSION ['user_info'] ['post'];
            $subordinates = $this->OrdersModel->get_subordinates ( $rank, $userid, $post );
            $this->load->view ( 'orders_view.php', array (
                'subordinates' => $subordinates,
                'rank' => $rank
            ) );
        }
    }
    public function add_subgrp()
    {
        $data = $_POST;
        $this->load->model('OrdersModel');
        if($this->OrdersModel->add_subgrp($data))
        {
            echo(json_encode(array(
                'status'=> 200,
                'message'=> 'Subgroup added successfully'
            )));
        }
        else
        {
            echo(json_encode(array(
                'status'=> 500,
                'message'=> 'Subgroup addition failed'
            )));
        }
    }
    public function remove_subgrp()
    {
        $data = $_POST;
        $this->load->model('OrdersModel');
        if($this->OrdersModel->remove_subgrp($data))
        {
            echo(json_encode(array(
                'status'=> 200,
                'message'=> 'Subgroup removed successfully'
            )));
        }
        else
        {
            echo(json_encode(array(
                'status'=> 500,
                'message'=> 'Subgroup removal failed'
            )));
        }
    }
}