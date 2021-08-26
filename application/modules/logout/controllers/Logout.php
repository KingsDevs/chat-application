<?php 

class Logout extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function logout_user()
    {
        $this->session->unset_userdata('userdata');
        $this->session->set_flashdata('status_reg', 'You have logged out!');
        redirect(site_url('login'));
    }
}