<?php
function user_login()
{
    $ci =& get_instance();		
    if(!($ci->session->userdata('status')=='loggedin'))
    {
        redirect('login');
    }
}
?>