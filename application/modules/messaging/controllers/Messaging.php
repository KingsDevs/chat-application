<?php

class Messaging extends MY_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('messaging/MessagingModel');
    }

    public function messaging_get()
    {
        $this->templates->show('Messages', 'messaging/messaging_page');
    }

    public function search_user()
    {
        if($this->input->is_ajax_request())
        {
            $data = array(
                'search'=>$this->input->get(),
                'firstname'=>$this->session->userdata('userdata')['firstname'],
                'lastname'=>$this->session->userdata('userdata')['lastname'],
                'username'=>$this->session->userdata('userdata')['username'],
            );
            //echo json_encode($data);

            $searched_users = $this->MessagingModel->search_user($data['search']);
            echo json_encode($searched_users);
            
        }
        
    }


    public function add_contact()
    {
        if($this->input->is_ajax_request())
        {
            $data = $this->input->post();
            echo json_encode($data);
        }
    }

    public function test()
    {
        $data = "w";
        $searched_users = $this->MessagingModel->search_user($data);
        print_r($searched_users);
    }
}