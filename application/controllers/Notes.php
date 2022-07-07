<?
defined('BASEPATH') OR exit('No direct script access allowed');
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
        $this->load->view('layout/header');
        $this->load->view('notes/index', $data);
        $this->load->view('layout/footer');
    }
}