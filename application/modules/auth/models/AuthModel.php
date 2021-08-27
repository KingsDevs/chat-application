<?php

class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }

    public function insert_user($data)
    {
        // $data['firstname'] = $this->encrypt->encode($data['firstname']);
        // $data['lastname'] = $this->encrypt->encode($data['lastname']);

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $this->db->insert('users', $data);
    }

    public function check_username($username)
    {
        $username = $this->encrypt->encode($username);

        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username' , $username);
        $this->db->limit(1);

        $query = $this->db->get();

        $rows = $query->num_rows();
        if($rows === 0)
        {
            return TRUE;
        }
        
        return FALSE;
        
    }

    public function login_user($data)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username' , $data['username']);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            if(password_verify($data['password'], $query->row()->password))
            {
                $data = $query->row();
                // $data->firstname = $this->encrypt->decode($data->firstname);
                // $data->lastname = $this->encrypt->decode($data->lastname);
                return $data;
            }
            else
            {
                return FALSE;
            }
        } 
        else
        {
            return FALSE;
        }
    }
}