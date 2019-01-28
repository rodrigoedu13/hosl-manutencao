<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chamados extends CI_Controller {

    public function __construct() {
        parent::__construct();

//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }
        

$this->output->enable_profiler(TRUE);


        $this->load->model('chamados_model');
    }

    public function index() {
        $this->gerenciar();
//        $this->data['results'] = $this->chamados_model->getChamados();
//        $this->load->view('template/header');
//        $this->load->view('chamados/lista', $this->data);
//        $this->load->view('template/footer');
    }
    
    public function gerenciar(){
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'chamados/gerenciar/';
        $config['total_rows'] = $this->chamados_model->count('chamados');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<nav aria-label="Page navigation" <ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
         $this->pagination->initialize($config);
         
         
         
        $this->data['results'] = $this->chamados_model->get('','', $config['per_page'], $this->uri->segment(3));
        $this->load->view('template/header');
        $this->load->view('chamados/lista', $this->data);
        $this->load->view('template/footer');
    }

    public function criar() {
        $this->load->model('unidades_model');
        $this->load->model('colaboradores_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->data['colaboradores'] = $this->colaboradores_model->getColaboradoresDropdown();
        $this->load->view('template/header');
        $this->load->view('chamados/criar', $this->data);
        $this->load->view('template/footer');
    }

    public function add() {
        $datasolicitacao = implode('-', array_reverse(explode('/', $this->input->post('dataSolicitacao'))));
        $dataresolucao = implode('-', array_reverse(explode('/', $this->input->post('dataResolucao'))));
        $data = array(
            'dt_solicitacao' => $datasolicitacao,
            'dt_resolucao' => $dataresolucao,
            'ds_descricao_chamado' => $this->input->post('descChamado'),
            'ds_observacao' => $this->input->post('descObs'),
            'ds_nome_solicitante' => $this->input->post('nomeSolicitante'),
            'colaboradores_cd_colaborador' => $this->input->post('responsavel'),
            'unidades_cd_unidade' => $this->input->post('unidade'),
            'setores_cd_setor' => $this->input->post('setor'),
            'tp_status' => $this->input->post('status'),
            'tp_prioridade' => $this->input->post('prioridade'),
        );

        $this->chamados_model->insert('chamados', $data);
        $this->session->set_flashdata('success', 'Registro inserido com sucesso');
        redirect(site_url('chamados'));
    }

    public function excluir() {

        $id = $this->input->post('id');

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'chamados');
        }

        $this->chamados_model->delete('chamados', 'cd_chamado', $id);
        $this->session->set_flashdata('success', 'Registro excluido com sucesso!');
        redirect(site_url() . 'chamados');
    }

    public function editar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir registro.');
            redirect(site_url() . 'chamados');
        }
        
        $this->load->model('unidades_model');
        $this->load->model('colaboradores_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->data['colaboradores'] = $this->colaboradores_model->getColaboradoresDropdown();
        $this->data['results'] = $this->chamados_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('chamados/editar', $this->data);
        $this->load->view('template/footer');
    }

    public function editarChamado() {
        $datasolicitacao = implode('-', array_reverse(explode('/', $this->input->post('dataSolicitacao'))));
        $dataresolucao = implode('-', array_reverse(explode('/', $this->input->post('dataResolucao'))));

        $data = array(
            'dt_solicitacao' => $datasolicitacao,
            'dt_resolucao' => $dataresolucao,
            'ds_descricao_chamado' => $this->input->post('descChamado'),
            'ds_observacao' => $this->input->post('descObs'),
            'ds_nome_solicitante' => $this->input->post('nomeSolicitante'),
            'colaboradores_cd_colaborador' => $this->input->post('responsavel'),
            'unidades_cd_unidade' => $this->input->post('unidade'),
            'setores_cd_setor' => $this->input->post('setor'),
            'tp_status' => $this->input->post('status'),
            'tp_prioridade' => $this->input->post('prioridade'),
        );

        if ($this->chamados_model->edit('chamados', $data, 'cd_chamado', $this->input->post('id')) == TRUE) {
            $this->session->set_flashdata('success', 'Registro editado com sucesso!');
            redirect(base_url() . 'chamados');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
        }
    }
    
    function buscaSetorbyUnidade(){
        $this->load->model('setores_model');
        $id = $this->input->post('id_unidade');
        $option = "<option value = ' '>Selecione o setor...</option>";
        $setor = $this->setores_model->getSetoresbyUnidade($id);
        foreach ($setor->result() as $linha) {
            $option .= "<option value='$linha->cd_setor'>$linha->ds_setor</option>";
        }

        echo $option;
    }

}
