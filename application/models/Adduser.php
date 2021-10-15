<?php
class Adduser extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }
    
    public function add_user($uniqID){
        $data = array(
            'u_lastname' => $this->input->post('lastname'),
            'u_firstname' => $this->input->post('firstname'),
            'u_campus' => $this->input->post('campus'),
            'u_promo' => $this->input->post('promo'),
            'u_photo' => $uniqID
        );

        return $this->db->insert('manu_users', $data);
    }

}