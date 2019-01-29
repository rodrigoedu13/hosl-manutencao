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
        $this->data['results'] = $this->usuarios_model->getUsuario();
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
        $this->load->library('encryption');
        $this->encryption->initialize(array('driver' => 'mcrypt'));

        $senha = $this->input->post('senha');
        $confsenha = $this->input->post('confSenha');

        if ($senha != $confsenha) {
            $this->session->set_flashdata('error', 'Senhas diferentes!');
            redirect('usuarios/criar');
        } else {

            $dados_usuario = array(
                'cd_usuario' => $this->input->post('codUsuario'),
                'senha' => $this->encryption->encrypt($this->input->post('senha')),
                'ds_nome' => $this->input->post('nomeUsuario'),
                'sn_ativo' => '1',
                'dt_criacao' => date('Y-m-d')
            );

            if ($this->usuarios_model->getById($dados_usuario['cd_usuario']) == TRUE) {
                $this->session->set_flashdata('error', 'Este usuário Já existe no sistema!');
            } else {

                $status = $this->usuarios_model->insert('usuarios', $dados_usuario);
                if (!$status) {
                    $this->session->set_flashdata('error', 'Não foi possível cadastrar esse usuário!');
                } else {
                    $this->session->set_flashdata('success', 'Usuário Cadastrado!');
                }
            }
        }
        redirect('usuarios');
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
