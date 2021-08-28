<?php

class MessagingModel extends CI_Model
{
    
    public function __construct()
    {
        parent :: __construct();
    }

    public function search_user($data)
    {
        $this->db->select('firstname, lastname, username, profile_pic');
        $this->db->from('users');
        $this->db->like('firstname', $data);
        $this->db->or_like('lastname', $data);
        $this->db->or_like('username', $data);

        $query = $this->db->get();
        if($query->num_rows() == 0)
        {
            return FALSE;
        }

        return $query->row();
    }
}