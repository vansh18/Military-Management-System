<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        user_login();
        $this->load->model('OperationModel');
    }
    public function index()
    {
        // $bat = $this->OperationModel->get_batallions();
        $this->load->model('DashboardModel');
        $res = $this->DashboardModel->get_subgroup($_SESSION['userid'],$_SESSION['user_info']['Rank_id'],$_SESSION['user_info']['post']);
        $ops = $this->OperationModel->get_operations($_SESSION['userid']);
        $this->load->view("dashboard_view.php",array('sub_list' => $res,'ops' => $ops));
    }
    public function profile()
    {
        $this->load->view("profile_view.php");
    }
    public function test_proc()
    {
        
    }
    public function create_operation()
    {
        //allow access only if Rank_id is 1 or redirect after 2 seconds
        if($_SESSION['user_info']['Rank_id']!=1)
        {
            echo 'You are not authorized to access this page. You will be redirected to dashboard in 2 seconds.';
            header("refresh:2;url=".base_url()."index.php/Dashboard");
        }
        else 
        {
            // get all batallions under the user's brigade
            $bat = $this->OperationModel->get_batallions();
            $this->load->view("create_operation_view.php",array('battalion_list' => $bat));
        }
    }
    public function add_operation()
    {
        //function to receive data from create_operation_view.php and add it to database
        $data = $_POST;
        if($_SESSION['user_info']['Rank_id'] != 1)
            return false;
        if($this->OperationModel->add_operation($data))
        {
            echo(json_encode(array(
                'status'=> 200,
                'message'=> 'Operation added successfully'
            )));
        }
        else
        {
            echo(json_encode(array(
                'status'=> 500,
                'message'=> 'Battalion is already part of an operation'
            )));
        }
    }

    public function recent_operations()
    {
        $ops = $this->OperationModel->get_operations($_SESSION['userid']);
        $this->load->view('recent_operations_view.php',array('ops' => $ops));
    }
}