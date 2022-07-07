<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }

    /*
        Get all the notes from the database
    */
    public function get_all() {
        $notes = $this->db->get("notes")->result();
        return $notes;
    }
 
    /*
        Store the note in the database
    */
    public function store() {    
        $data = [
            'title' => $this->input->post('title'),
            'text'  => $this->input->post('text')
        ];
 
        $result = $this->db->insert('notes', $data);
        return $result;
    }
 
    /*
        Get an specific note from the database
    */
    public function get($id) {
        $note = $this->db->get_where('notes', ['id' => $id ])->row();
        return $note;
    }
 
 
    /*
        Update or Modify a note in the database
    */
    public function update($id) {
        $data = [
            'title'        => $this->input->post('title'),
            'text' => $this->input->post('text')
        ];
 
        $result = $this->db->where('id',$id)->update('notes',$data);
        return $result;              
    }
 
    /*
        Destroy or Remove a note in the database
    */
    public function delete($id) {
        $result = $this->db->delete('notes', array('id' => $id));
        return $result;
    }
}

?>