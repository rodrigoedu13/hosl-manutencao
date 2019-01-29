<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hosl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('hosl_model', '', true);
    }

    public function index() {
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect('hosl/login');
        }
        $this->load->view('template/header');
        $this->load->view('template/footer');
    }

    public function login() {

        $this->load->view('hosl/login');
//        $this->output->enable_profiler(TRUE);
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect('hosl/login');
    }

    public function validarLogin() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Usuário', 'required|xss_clean|trim');
        $this->form_validation->set_rules('senha', 'Senha', 'required|xss_clean|trim');

        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('error', 'Verifique os campos!.');
            redirect('hosl');
        } else {

            $login = $this->input->post('login');
            $senha = $this->input->post('senha');


            $retorno = $this->hosl_model->check_credentials($login);
            

            if ($retorno == TRUE) {
                
                $senha_enc = $retorno->senha;
                $this->load->library('encryption');
                $this->encryption->initialize(array('driver' => 'mcrypt'));
                $senha_dec = $this->encryption->decrypt($senha_enc);

                if ($senha == $senha_dec) {
                    $dados_session = array(
                        'id' => $retorno->cd_usuario,
                        'nome' => $retorno->ds_nome,
                        'logado' => TRUE
                    );
                    $this->session->set_userdata($dados_session);
                    redirect(site_url('hosl'));
                } else {
                    $this->session->set_flashdata('error', 'Usuário e senha incorreto!.');
                    redirect(site_url('hosl'));
                }
            } else {
                $this->session->set_flashdata('error', 'Usuário e senha incorreto!.');
                redirect(site_url('hosl'));
            }
        }
    }

}
