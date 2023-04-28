<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        // user_login();
    }
    public function index()
    {
        $this->load->view("dashboard_view.php");
    }
}