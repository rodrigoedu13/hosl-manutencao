<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades extends CI_Controller {

    public function __construct() {
        parent::__construct();

//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }

        $this->load->model('unidades_model');
    }

    public function index() {
        $this->data['results'] = $this->unidades_model->getUnidades();
        $this->load->view('template/header');
        $this->load->view('unidades/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->view('template/header');
        $this->load->view('unidades/criar');
        $this->load->view('template/footer');
    }

    public function add() {
        $data = array(
            'ds_unidade' => $this->input->post('nomeUnidade')   
        );

        $this->unidades_model->insert('unidades', $data);
        $this->session->set_flashdata('success', 'Registro inserido com sucesso');
        redirect(site_url('unidades'));
    }

    public function excluir() {

        $id = $this->input->post('id');

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'unidades');
        }

        $this->unidades_model->delete('unidades', 'cd_unidade', $id);
        $this->session->set_flashdata('success', 'Registro excluido com sucesso!');
        redirect(site_url() . 'unidades');
    }

    public function editar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'unidades');
        }

        $this->data['results'] = $this->unidades_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('unidades/editar', $this->data);
        $this->load->view('template/footer');
    }

    public function editarUnidade() {

        $data = array(
            'ds_unidade' => $this->input->post('nomeUnidade')
            
        );

        if ($this->unidades_model->edit('unidades', $data, 'cd_unidade', $this->input->post('id')) == TRUE) {
            $this->session->set_flashdata('success', 'Registro editado com sucesso!');
            redirect(base_url() . 'unidades');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
        }
    }

}
