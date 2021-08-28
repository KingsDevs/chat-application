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
            $data = $this->input->post();

            // $searched_users['searched_users'] = $this->MessagingModel->search_user($data);
            // if($searched_users['searched_users'] !== FALSE)
            // {
            //     echo $this->load->view('messaging/searched_users', $searched_users);
            // }
            echo json_encode($data);
            
        }
        
    }
}