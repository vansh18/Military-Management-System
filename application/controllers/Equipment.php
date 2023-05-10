<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_login();
        $this->load->model('EquipmentModel');
        $this->load->model('DashboardModel');
    }
    public function index()
    {
        if($_SESSION['user_info']['Rank_id'] == 6)
        {
            echo 'You are not authorized to access this page. You will be redirected to dashboard in 2 seconds.';
            header("refresh:2;url=".base_url()."dashboard");
        }
        else
        {
            $res = $this->DashboardModel->get_subgroup($_SESSION['userid'],$_SESSION['user_info']['Rank_id'],$_SESSION['user_info']['post']);
            $this->load->view("equipment_view.php",array('sub_list' => $res));
        }
    }
    public function manage_equipment()
    {
        $data = $_POST;
        if($this->EquipmentModel->manage_equipment($data))
        {
            if($data['action'] == 'Add')
                $message = 'Equipment added successfully';
            else if($data['action'] == 'Allocate')
                $message = 'Equipment allocated successfully';
            else if($data['action'] == 'De-allocate')
                $message = 'Equipment de-allocated successfully';
            echo(json_encode(array(
                'status'=> 200,
                'message'=> $message
            )));
        }
        else
        {
            if($data['action'] == 'Add')
                $message = 'Equipment addition failed';
            else if($data['action'] == 'Allocate')
                $message = 'Equipment does not exist in the inventory';
            else if($data['action'] == 'De-allocate')
                $message = 'Equipment de-allocation failed';
            echo(json_encode(array(
                'status'=> 500,
                'message'=> $message
            )));
        }
    }
}