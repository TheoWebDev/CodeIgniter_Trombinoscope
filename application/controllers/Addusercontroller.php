<!-- Nommer la classe comme le nom du controleur !!! -->

<?php

class Addusercontroller extends CI_Controller {

        public function index()
        {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('pages/adduser', array('error' => ' ' ));
                $this->load->view('templates/footer');
        }

        public function myform()
        
        {       
                $this->form_validation->set_rules('firstname', 'Firstname', 'required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'required');
                $this->form_validation->set_rules('campus', 'Campus', 'required');
                $this->form_validation->set_rules('promo', 'Promo', 'required');

                if($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header');
                        $this->load->view('templates/navbar');
                        $this->load->view('pages/adduser', array('error' => ' ' ));
                        $this->load->view('templates/footer');
                }
                else
                {
                        $config['upload_path']          = 'public/img/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['max_size']             = 1000;
                        $config['max_width']            = 3000;
                        $config['max_height']           = 3000;

                        $config['file_name'] = $imgUniqId = uniqid();
        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
        
                        if ( ! $this->upload->do_upload('photo'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                                $this->load->view('templates/header');
                                $this->load->view('templates/navbar');
                                $this->load->view('pages/adduser', $error);
                                $this->load->view('templates/footer');
                        }
                        else
                        {
                                $data = array('upload_data' => $this->upload->data());
                                $this->load->model('Adduser');
                                $this->Adduser->add_user($imgUniqId);
                                $this->load->view('templates/header');
                                $this->load->view('templates/navbar');
                                $this->load->view('pages/formsuccess');
                                $this->load->view('templates/footer');
                        }

                        
                }
        }


        public function home()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if(is_file($config['./uploads/'])){
                        chmod($config['./uploads/'], 777);
                }

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}