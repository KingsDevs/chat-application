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

    public function add_contact($data)
    {
        $insert_request = $this->db->insert('add_contact_request', $data);
        if($insert_request)
        {
            $this->db->select('user_id, firstname, lastname, username, profile_pic');
            $this->db->from('users');
            $this->db->where('user_id', $data['reciever_id']);
            $this->db->limit(1);

            $query = $this->db->get();
            return $query->row();
        }

        return FALSE;
    }

    private function check_request_numrow($sender_id, $reciever_id)
    {
        $this->db->select('request_id');
        $this->db->from('add_contact_request');
        $this->db->where('sender_id', $sender_id);
        $this->db->where('reciever_id', $reciever_id);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return TRUE;
        } 
        
        return FALSE;

    }
}