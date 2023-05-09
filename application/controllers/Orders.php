<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Orders extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct ();
        user_login ();
        $this->load->model ( 'OrdersModel' );
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
            
            $this->load->model ( 'DashboardModel' );
            $rank = $_SESSION ['user_info'] ['Rank_id'];
            $userid = $_SESSION ['user_info'] ['User_id'];
            $post = $_SESSION ['user_info'] ['post'];
            $subordinates = $this->OrdersModel->get_idle_subordinates ( $rank, $userid, $post );
            $subs = $this->DashboardModel->get_subgroup ( $userid, $rank );
            $this->load->view ( 'orders_view.php', array (
                'subordinates' => $subordinates,
                'rank' => $rank,
                'subs' => $subs
            ) );
        }
    }
    public function add_subgrp()
    {
        $data = $_POST;
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
    public function custom_order()
    {
        $data = $_POST;
        if($this->OrdersModel->custom_order($data))
        {
            echo(json_encode(array(
                'status'=> 200,
                'message'=> 'Order added successfully'
            )));
        }
        else
        {
            echo(json_encode(array(
                'status'=> 500,
                'message'=> 'Order addition failed'
            )));
        }
    }
    public function send_orders_status()
    {
        //Change the status of order ids received to 0
        $data = $_POST;
        if($this->OrdersModel->change_orders_status($data))
        {
            echo(json_encode(array(
                'status'=> 200,
                'message'=> 'Order status changed successfully'
            )));
        }
        else
        {
            echo(json_encode(array(
                'status'=> 500,
                'message'=> 'Order status change failed'
            )));
        }
    }
}