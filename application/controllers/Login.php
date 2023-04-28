<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
    { 
        parent::__construct(); 
		$this->load->model('LoginModel');
    }
	public function index()
	{
		$this->load->view("login_view.php");
	}
	public function validate_user()
	{
		if(isset($_POST['userid']) && isset($_POST['password']))
		{
			$userid = $_POST['userid'];
			$password = $_POST['password'];
			$response=array();
			if($this->LoginModel->validate_creds($userid,$password))
			{
				$response['status'] = 200;
				$response['msg'] = 'login successful';
			}
			else
			{
				$response['status'] = 401;
				$response['msg'] = 'invalid login';
			}
			echo json_encode($response);
		}
	}
}
