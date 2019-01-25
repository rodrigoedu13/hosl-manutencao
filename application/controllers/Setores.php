<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setores extends CI_Controller {

    public function __construct() {
        parent::__construct();

//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }

        $this->load->model('setores_model');
    }

    public function index() {
        $this->data['results'] = $this->setores_model->getSetores();
        $this->load->view('template/header');
        $this->load->view('setores/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->model('unidades_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->load->view('template/header');
        $this->load->view('setores/criar', $this->data);
        $this->load->view('template/footer');
    }

    public function add() {
        $data = array(
            'ds_setor' => $this->input->post('nomeSetor'),
            'unidades_cd_unidade' => $this->input->post('nomeUnidade'),
            'tp_ativo' => '1'
        );

        $this->setores_model->insert('setores', $data);
        $this->session->set_flashdata('success', 'Registro inserido com sucesso');
        redirect(site_url('setores'));
    }

    public function excluir() {

        $id = $this->input->post('id');

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'unidades');
        }

        $this->setores_model->delete('setores', 'cd_setor', $id);
        $this->session->set_flashdata('success', 'Registro excluido com sucesso!');
        redirect(site_url() . 'setores');
    }

    public function editar() {
        $this->load->model('unidades_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'unidades');
        }

        $this->data['results'] = $this->setores_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('setores/editar', $this->data);
        $this->load->view('template/footer');
    }

    public function editarSetor() {

        $data = array(
            'ds_setor' => $this->input->post('nomeSetor'),
            'unidades_cd_unidade' => $this->input->post('nomeUnidade'),
            'tp_ativo' => $this->input->post('tpAtivo')
            
        );

        if ($this->setores_model->edit('setores', $data, 'cd_setor', $this->input->post('id')) == TRUE) {
            $this->session->set_flashdata('success', 'Registro editado com sucesso!');
            redirect(base_url() . 'setores');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
        }
    }

}
