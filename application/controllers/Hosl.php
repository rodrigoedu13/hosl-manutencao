<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hosl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
   

    public function index() {

        $this->load->view('template/header');
        $this->load->view('hosl/dashboard');
        $this->load->view('template/footer');
    }

}
