<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chamados extends CI_Controller {

    public function __construct() {
        parent::__construct();

//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }

        $this->load->model('chamados_model');
    }

    public function index() {
        $this->data['results'] = $this->chamados_model->getChamados();
        $this->load->view('template/header');
        $this->load->view('chamados/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->model('unidades_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->load->view('template/header');
        $this->load->view('chamados/criar', $this->data);
        $this->load->view('template/footer');
    }

    public function add() {
        $data = array(
            'ds_colaborador' => $this->input->post('nomeColaborador'),
            'tp_ativo' => $this->input->post('tpAtivo'),
            'dt_cadastro' => date('Y-m-d')
        );

        $this->colaboradores_model->insert('colaboradores', $data);
        $this->session->set_flashdata('success', 'Registro inserido com sucesso');
        redirect(site_url('colaboradores'));
    }

    public function excluir() {

        $id = $this->input->post('id');

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'colaboradores');
        }

        $this->colaboradores_model->delete('colaboradores', 'cd_colaborador', $id);
        $this->session->set_flashdata('success', 'Registro excluido com sucesso!');
        redirect(site_url() . 'colaboradores');
    }

    public function editar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'colaboradores');
        }

        $this->data['results'] = $this->colaboradores_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('colaboradores/editar', $this->data);
        $this->load->view('template/footer');
    }

    public function editarColaborador() {

        $data = array(
            'ds_colaborador' => $this->input->post('nomeColaborador'),
            'tp_ativo' => $this->input->post('tpAtivo')
        );

        if ($this->colaboradores_model->edit('colaboradores', $data, 'cd_colaborador', $this->input->post('id')) == TRUE) {
            $this->session->set_flashdata('success', 'Registro editado com sucesso!');
            redirect(base_url() . 'colaboradores');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
        }
    }

}
