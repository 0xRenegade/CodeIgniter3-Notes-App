<?
defined('BASEPATH') OR exit('No direct script access allowed');
class Notes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Notes_model', 'note');
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
        $data['title'] = $data['notes']->{'title'};
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
        $this->form_validation->set_rules('title', 'Note Title', 'required');
        $this->form_validation->set_rules('text', 'Note Text', 'required');
    
        if (!$this->form_validation->run()) {

            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('notes/create'));

        } else {

            $this->project->store();
            $this->session->set_flashdata('success', "Saved Successfully!");
            redirect(base_url('notes'));

        } 
    }
    
    /*
        Edit a note
    */
    public function edit($id) {
        $data['notes'] = $this->project->get($id);
        $data['title'] = "Edit Notes";
        $this->load->view('templates/header');
        $this->load->view('notes/edit', $data);
        $this->load->view('templates/footer');     
    }
    
    /*
        Update the submitted note
    */
    public function update($id) {
        $this->form_validation->set_rules('title', 'Note Title', 'required');
        $this->form_validation->set_rules('text', 'Note Text', 'required');
    
        if (!$this->form_validation->run()) {

            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('notes/edit/' . $id));
            
        } else {

            $this->project->update($id);
            $this->session->set_flashdata('success', "Updated Successfully!");
            redirect(base_url('notes'));
            
        } 
    }
    
    /*
        Delete a note
    */
    public function delete($id) {
        $item = $this->project->delete($id);
        $this->session->set_flashdata('success', "Deleted Successfully!");
        redirect(base_url('notes'));
    }
}