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
}