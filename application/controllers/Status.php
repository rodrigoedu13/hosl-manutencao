<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $this->load->model('status_model');
    }

    public function index() {
        $this->data['results'] = $this->status_model->getStatus();
        $this->load->view('template/header');
        $this->load->view('status/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->view('template/header');
        $this->load->view('status/criar');
        $this->load->view('template/footer');
    }

    public function add() {
        
        $id = $this->input->post('codStatus');
        $data = array(
            'cd_status' => $this->input->post('codStatus'),
            'ds_status' => strtoupper($this->input->post('descStatus'))
        );

        if ($this->status_model->getById($id) == true) {
            $this->session->set_flashdata('error', 'Registro duplicado');
            redirect(site_url('status'));
        } else {
            $this->status_model->insert('status', $data);
            $this->session->set_flashdata('success', 'Registro inserido com sucesso');
            redirect(site_url('status'));
        }
    }

    public function excluir() {

        $id = $this->input->post('id');

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'status');
        }

        if ($this->status_model->getChamadosByStatus($id) == TRUE) {
            $this->session->set_flashdata('error', 'Não é possível excluir, existe chamado aberto com esse status!');
            redirect(site_url() . 'status');
        } else {
            $this->status_model->delete('status', 'cd_status', $id);
            $this->session->set_flashdata('success', 'Registro excluido com sucesso!');
            redirect(site_url() . 'status');
        }
    }

    public function editar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'colaboradores');
        }

        $this->data['results'] = $this->status_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('status/editar', $this->data);
        $this->load->view('template/footer');
    }

    public function editarStatus() {

        $data = array(
            'cd_status' => $this->input->post('codStatus'),
            'ds_status' => strtoupper($this->input->post('descStatus'))
        );

        if ($this->status_model->edit('status', $data, 'cd_status', $this->input->post('id')) == TRUE) {
            $this->session->set_flashdata('success', 'Registro editado com sucesso!');
            redirect(base_url() . 'status');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
        }
    }

}
