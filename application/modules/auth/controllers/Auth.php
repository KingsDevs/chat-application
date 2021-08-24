<?php

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_get()
    {
        $this->templates->show($this->title.' | Login','auth/login_page');
    }
}