<?php
class GoldenBook_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }
    
    public function get_goldenBooks($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->order_by('b_id', 'DESC');
            $this->db->select('*');
            $this->db->from('golden_book');
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('goldenBook', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_book(){
        $data = array(
            'b_name'    => $this->input->post('name'),
            'b_content' => $this->input->post('content')
        );
        return $this->db->insert('golden_book', $data);
    }

    public function delete_book(int $id) {
        $this->db->delete('golden_book', array('b_id' => $id));
    }

}
