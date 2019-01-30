<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hosl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('ion_auth');
    }
    
    public function sair(){

        $this->ion_auth->logout();
        
    }

    public function index() {

        $this->load->view('template/header');
        $this->load->view('template/footer');
    }

}
