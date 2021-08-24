<?php

class Templates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show($title ,$content, $val="")
    {
        $data['content'] = $content;
        $data['title'] = $title;
        $data['data'] = $val;
        $this->load->view('templates/template_view', $data);
    }
}