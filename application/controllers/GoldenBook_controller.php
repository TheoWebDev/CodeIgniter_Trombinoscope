<?php
class GoldenBook_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('goldenBook_model');
            $this->load->helper('url_helper');
    }

    public function view($page = 'index') {
        if (!file_exists(APPPATH . 'views/goldenBook/' . $page . '.php')) {
            // 404 Error
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->helper('url');

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('goldenBook/' . $page);
        $this->load->view('templates/footer');
    }

    public function index() {
        $this->load->model('goldenBook_model');
        $data['goldenBooks'] = $this->goldenBook_model->get_goldenBooks();
        $data['title'] = 'Livre d\'or';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('goldenBook/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->model('goldenBook_model');
        $data['title'] = 'Ajouter un commentaire';

        $this->form_validation->set_rules('name', 'Nom', 'required');
        $this->form_validation->set_rules('content', 'Commentaire', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('goldenBook/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->goldenBook_model->create_book();
            redirect('goldenBook');
        }
    }
}