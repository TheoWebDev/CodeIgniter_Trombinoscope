<?php
class User extends CI_Model {

    /**
     * Connect to the database
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * Return all the users / apply the filters
     * 
     * @param string $filter1 First filter (campus)
     * @param string $filter2 Second filter (promo)
     * 
     * @return array $query
     */
    public function getUsers(string $filter1 = NULL, string $filter2 = NULL) {

        if ($filter1 == NULL && $filter2 == NULL) {
            $this->db->select('u_id, u_lastname, u_firstname, u_campus, u_promo, u_photo');
            $this->db->order_by('u_id', 'DESC');
            $query = $this->db->get('manu_users');
            return $query->result();
        }

        if ($filter1 != NULL && $filter2 != NULL) {
            $this->db->select('u_id, u_lastname, u_firstname, u_campus, u_promo, u_photo');
            $this->db->where('u_campus', $filter1);
            $this->db->where('u_promo', $filter2);
            $this->db->order_by('u_id', 'DESC');
            $query = $this->db->get('manu_users');
            return $query->result();
        }

        if ($filter1 != NULL || $filter2 != NULL) {
            $this->db->select('u_id, u_lastname, u_firstname, u_campus, u_promo, u_photo');
            $this->db->where('u_campus', $filter1);
            $this->db->or_where('u_promo', $filter1);
            $this->db->or_where('u_campus', $filter2);
            $this->db->or_where('u_promo', $filter2);
            $this->db->order_by('u_id', 'DESC');
            $query = $this->db->get('manu_users');
            return $query->result();
        }
    }

    /**
     * Return all the campus
     * 
     * @param string $campus
     * 
     * @return void
     */
    public function getCampus() {
        $this->db->select('u_campus');
        $this->db->group_by('u_campus');
        $query = $this->db->get('manu_users');
        return $query->result();
    }

    /**
     * Return all the promos
     * 
     * @param string $promo
     * 
     * @return void
     */
    public function getPromo() {
        $this->db->select('u_promo');
        $this->db->group_by('u_promo');
        $query = $this->db->get('manu_users');
        return $query->result();
    }

    public function create_user(){
        $slug = url_title($this->input->post('avatar'));
        $data = array(
            'u_lastname' => $this->input->post('lastname'),
            'u_firstname' => $this->input->post('firstname'),
            'u_campus' => $this->input->post('campus'),
            'u_promo' => $this->input->post('promo'),
            'u_photo' => $this->input->post('photo'),
        );

        return $this->db->insert('manu_users', $data);
    }

    /**
     * Delete the user with the param id
     * 
     * @param int $id
     * 
     * @return void
     */
    public function deleteUser(int $id) {
        $this->db->delete('manu_users', array('u_id' => $id));
        // $this->db->unlink('manu_users', array('u_photo' => $id), 'public/img/uploaded');
    }
}