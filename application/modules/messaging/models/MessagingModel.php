<?php

class MessagingModel extends CI_Model
{
    
    public function __construct()
    {
        parent :: __construct();
    }

    public function search_user($data)
    {
        $this->db->select('user_id, firstname, lastname, username, profile_pic');
        $this->db->from('users');
        $this->db->like('firstname', $data['search']);
        $this->db->or_like('lastname', $data['search']);
        $this->db->or_like('username', $data['search']);
        // $this->db->not_like('firstname', $data['firstname']);
        // $this->db->not_like('lastname', $data['lastname']);
        // $this->db->not_like('username', $data['username']);

        $query = $this->db->get();
        if($query->num_rows() == 0)
        {
            return FALSE;
        }

        return $query->result();
    }
}