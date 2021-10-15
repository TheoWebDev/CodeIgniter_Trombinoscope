<?php
class Pages extends CI_Controller {

    /**
     * Display the parameter view, home by default
     * 
     * @param $page Page view to display
     * 
     * @return void
     */
    public function view($page = 'home') {

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // 404 Error
            show_404();
        }

        $this->load->helper('url');

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/' . $page);
        $this->load->view('templates/footer');
    }

    /**
     * Display the trombi / filter the trombi
     * 
     * @return void
     */
    public function trombi() {
        $this->load->model('user');
        $nbFilter = 0;

        $data['users'] = $this->user->getUsers();

        // First filter
        if (isset($_GET['filter1']) && !empty($_GET['filter1'])) {
            $nbFilter++;

            // Syntax gestion
            $filter1 = htmlspecialchars($_GET['filter1']);

            $data['users'] = $this->user->getUsers($filter1);
        }

        // Second filter
        if (isset($_GET['filter2']) && !empty($_GET['filter2'])) {
            $nbFilter++;

            // Syntax gestion
            $filter2 = htmlspecialchars($_GET['filter2']);
            $filter2 = ucfirst($filter2);

            $data['users'] = $this->user->getUsers($filter2);
        }

        if ($nbFilter == 2) $data['users'] = $this->user->getUsers($filter1, $filter2);

        $data['campus'] = $this->user->getCampus();
        $data['promo']  = $this->user->getPromo();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/trombi', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Delete the user with the param id and redirect to a success page
     * 
     * @param int $id
     * 
     * @return void
     */
    public function delete_user(int $id) {
        $this->load->model('user');
        $this->user->deleteUser($id);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/deleteUserSuccess');
        $this->load->view('templates/footer');
    }

    public function delete_book(int $id) {
        $this->load->model('goldenbook_model');
        $this->goldenbook_model->delete_book($id);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/deleteSuccess');
        $this->load->view('templates/footer');
    }
}