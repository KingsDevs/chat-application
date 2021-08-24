<?php

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth/AuthModel');
    }

    public function login_get()
    {
        $this->templates->show($this->title.' | Login','auth/login_page');
    }

    public function signup_get()
    {
        $this->templates->show($this->title.' | Signup', 'auth/signup_page');
    }

    public function signup()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha');
        $this->form_validation->set_rules('username', 'Username', array(
            'trim','required','min_length[3]','alpha_numeric', 'is_unique[users.username]'), array('is_unique'=>'Username is already taken!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[8]|matches[password]', array('matches'=>'Passwords do not match'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->signup_get();
        }
        else
        {
            $data = array(
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
            );

            $result = $this->AuthModel->insert_user($data);
            if($result)
            {
                $this->session->set_flashdata('status', 'You successfuly registered!');
                redirect(site_url('login'));
            }
            else
            {
                $this->session->set_flashdata('status', 'Something went wrong!');
                redirect(site_url('register'));
            }
        }
    }
}