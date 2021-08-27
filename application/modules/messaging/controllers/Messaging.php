<?php

class Messaging extends MY_Controller
{
    public function __construct()
    {
        parent :: __construct();
    }

    public function messaging_get()
    {
        $this->templates->show('Messages', 'messaging/messaging_page');
    }

    public function search_user()
    {
        if($this->input->is_ajax_request())
        {
            echo 'True';
        }
        else
        {
            echo "yaw";
        }
    }
}