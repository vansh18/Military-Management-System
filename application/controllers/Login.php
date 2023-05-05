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
	public function test()
	{
		print_r($_SESSION);
		// Returns-
		// Array ( [__ci_last_regenerate] => 1683043047 [status] => loggedin [userid] => 7 [user_info] => 
		// Array ( [User_id] => 7 [User_name] => John Wick [Rank_id] => 1 [DOB] => 1964-09-02 [Age] => 59 
		// [Joining_date] => 1985-04-10 [Retirement_date] => 2022-04-29 [Cur_Status] => retired 
		// [Contact] => 8909876545 [Blood_group] => O+ [post] => New York Continental [rank] => Brigadier ) )
	}
}
