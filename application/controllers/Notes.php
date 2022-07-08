<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ERROR);
class Notes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Notes_model', 'notes');
    }

    /*
        Get all notes
    */
    public function index() {
        $data['notes'] = $this->notes->get_all();
        $this->load->view('templates/header');
        $this->load->view('notes/index', $data);
        $this->load->view('templates/footer');
    }

    /*
        Get single note
    */
    public function show($id) {
        $data['notes'] = $this->notes->get($id);
        // $data['title'] = $data['notes']->title;
        $this->load->view('templates/header');
        $this->load->view('notes/show', $data);
        $this->load->view('templates/footer');
    }

    /*
        Create a note
    */
    public function create() {
        $data['title'] = "Create Note";
        $this->load->view('templates/header');
        $this->load->view('notes/create',$data);
        $this->load->view('templates/footer');     
    }
    
    /*
        Save the submitted note
    */
    public function store() {
        $post = $this->input->post();
        $message = '';

        if (!$post['title'] || $post['title'] == '') {
            $message = 'Title field is empty. Please enter a valid title.';

            echo json_encode([
                'res' => 'error',
                'message' => $message
            ]);
            die();
        } 
        
        if (!$post['text'] || $post['text'] == '') {
            $message = 'Text field is empty. Please enter valid text.';

            echo json_encode([
                'res' => 'error',
                'message' => $message
            ]);
            die();
        }

        $note = $this->notes->store($post);

        if ($note) {

            $message = 'Note created successfully! Redirecting you to your new note...';
            // redirect(base_url('notes/'.$note->id));
            echo json_encode([
                'res' => 'success',
                'message' => $message,
                'note_id' => $note
            ]);
            die();

        } 
    }
    
    /*
        Edit a note
    */
    public function edit($id) {
        $data['notes'] = $this->notes->get($id);
        $data['title'] = "Edit Notes";
        $this->load->view('templates/header');
        $this->load->view('notes/edit', $data);
        $this->load->view('templates/footer');     
    }
    
    /*
        Update the submitted note
    */
    public function update() {
        $put = $this->input->post();
        $id = $this->input->get();
        $id = $id['id'];
        $message = '';

        $data = [
            'id' => $id,
            'title' => $put['title'],
            'text' => $put['text']
        ];

        if (!$put['title'] || $put['title'] == '') {
            $message = 'Title field is empty. Please enter a valid title.';

            echo json_encode([
                'res' => 'error',
                'message' => $message
            ]);
            die();
        } 
        
        if (!$put['text'] || $put['text'] == '') {
            $message = 'Text field is empty. Please enter valid text.';

            echo json_encode([
                'res' => 'error',
                'message' => $message
            ]);
            die();
        }

        $note = $this->notes->update($data);

        if ($note) {

            $message = 'Note updated successfully! Redirecting you to your note...';
            echo json_encode([
                'res' => 'success',
                'message' => $message,
                'note_id' => $id
            ]);
            die();

        }
    }
    
    /*
        Delete a note
    */
    public function delete() {
        $id = $this->input->post();
        $id = $id['id'];
        $deleted = $this->notes->delete($id);

        if ($deleted) {
            echo json_encode([
                'res' => 'success'
            ]);
            die();
        } else {
            echo json_encode([
                'res' => 'error',
                'error' => $deleted
            ]);
            die();
        }
    }
}

?>