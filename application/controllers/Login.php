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
		if(!isset($_SESSION['userid']))
			$this->load->view("login_view.php");
		else	
			redirect(""); //redirects to dashboard if user is already logged in
	}
	public function validate_user()
	{
		if(isset($_POST['userid']))
		{
			$userid = $_POST['userid'];
			$password = $_POST['password'];
			$response=array();
			if($this->LoginModel->validate_creds($userid,$password))
			{
				$response['status'] = 200;
				$response['msg'] = 'login successful';
				$this->LoginModel->create_session($userid);
			}
			else
			{
				$response['status'] = 401;
				$response['msg'] = 'invalid login';
			}
			echo json_encode($response);
		}
		else
			echo 'Invalid';
	}
	public function user_logout()
	{
		$this->LoginModel->destroy_session();
		redirect('login');
	}
}
