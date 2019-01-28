<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosl extends CI_Controller {

	public function index()
	{
            if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('hosl/login');
        }
		$this->load->view('template/header');
		$this->load->view('template/footer');
	}
        
        public function login(){
        
        $this->load->view('hosl/login');
        
        }
        
        public function sair(){
        $this->session->sess_destroy();
        redirect('hosl/login');
        }
        
        public function verificarLogin(){
        
        header('Access-Control-Allow-Origin: '.base_url());
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cd_usuario','Usuário','required|trim');
        $this->form_validation->set_rules('senha','Senha','required|trim');
        if ($this->form_validation->run() == false) {
            $json = array('result' => false, 'message' => validation_errors());
            echo json_encode($json);
        }
        else {
            $login = $this->input->post('login');
            $password = $this->input->post('senha');
            $this->load->model('hosl_model');
            $user = $this->Hosl_model->check_credentials($login);
            if($user){
                $this->load->library('encryption');
                $this->encryption->initialize(array('driver' => 'mcrypt'));
                $password_stored =  $this->encryption->decrypt($user->senha);
                if($password == $password_stored){
                    $session_data = array('nome' => $user->cd_nome, 'id' => $user->cd_usuario, 'logado' => TRUE);
                    $this->session->set_userdata($session_data);
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    $json = array('result' => false, 'message' => 'Os dados de acesso estão incorretos.');
                    echo json_encode($json);
                }
            }
            else{
                $json = array('result' => false, 'message' => 'Usuário não encontrado, verifique se suas credenciais estão corretass.');
                echo json_encode($json);
            }
        }
        die();
    }
}
