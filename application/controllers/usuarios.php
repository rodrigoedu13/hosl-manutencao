<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }

        $this->load->model('usuarios_model');
    }

    public function index() {
        $this->data['results'] = $this->usuarios_model->getUsuarios();
        $this->load->view('template/header');
        $this->load->view('usuarios/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->view('template/header');
        $this->load->view('usuarios/criar');
        $this->load->view('template/footer');
    }

    public function add() {

        if (($this->input->post('senha')) != ($this->input->post('confSenha'))) {
            $this->session->set_flashdata('error', 'Senhas diferentes');
            redirect(site_url('usuarios/criar'));
        } else {


            $data = array(
                'cd_usuario' => $this->input->post('codUsuario'),
                'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
                'ds_nome' => $this->input->post('nomeUsuario'),
                'sn_ativo' => 1,
                'dt_criacao' => date('Y-m-d')
            );

            $this->usuarios_model->insert('usuarios', $data);
            $this->session->set_flashdata('success', 'Registro inserido com sucesso');
            redirect(site_url('usuarios'));
        }
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
