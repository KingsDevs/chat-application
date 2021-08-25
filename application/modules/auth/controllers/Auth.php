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

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->login_get();
        }
        else
        {
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
            );

            $result = $this->AuthModel->login_user($data);

            if($result === FALSE)
            {
                $this->session->set_flashdata('status', 'Wrong Username or Password');
                redirect(site_url('login'));
            }
            else
            {
                $userdata = array(
                    'user_id' => $result->user_id,
                    'username' => $result->username,
                    'firstname' => $result->firstname,
                    'lastname' => $result->lastname,
                    'profile_pic' =>$result->profile_pic,
                    'created_at' => $result->created_at,
                );

                $this->session->set_userdata('userdata', $userdata);
                print_r($userdata);
            }

        }
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
        $this->form_validation->set_rules('profile_pic', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->signup_get();
        }
        else
        {
            $config['upload_path']          = './assets/uploads/profile';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['encrypt_name']           = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profile_pic'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->templates->show($this->title.' | Signup', 'auth/signup_page', $error);
            }
            else
            {
                $profile_pic_data = array('upload_data' => $this->upload->data());
                $data = array(
                    'firstname'=>$this->input->post('firstname'),
                    'lastname'=>$this->input->post('lastname'),
                    'username'=>$this->input->post('username'),
                    'password'=>$this->input->post('password'),
                    'profile_pic'=>$profile_pic_data['upload_data']['file_name'],
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
                    redirect(site_url('signup'));
                }

            }

            
        }
    }





}