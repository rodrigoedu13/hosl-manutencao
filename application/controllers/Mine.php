<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
        $this->load->model('mine_model');
    
    }
   

    public function index() {
        $this->gerenciarMeusChamados();
    }
    
    public function gerenciarMeusChamados(){
        $user = $this->ion_auth->user()->row();
        $usuario = $user->id;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'mine/gerenciarMeusChamados';
        $config['total_rows'] = $this->mine_model->count('chamados',$usuario);
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
         
         
        
        $this->data['results'] = $this->mine_model->getChamados('chamados','*','', $config['per_page'], $this->uri->segment(3),'','',$usuario);
        $this->load->view('template/header');
        $this->load->view('mine/meus_chamados', $this->data);
        $this->load->view('template/footer');
    }
    
    public function criar() {
        $this->data['usuario'] = $this->ion_auth->user()->row();
        $this->load->model('unidades_model');
        $this->load->model('colaboradores_model');
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->data['colaboradores'] = $this->colaboradores_model->getColaboradoresDropdown();
        $this->load->view('template/header');
        $this->load->view('mine/criar', $this->data);
        $this->load->view('template/footer');
    }
    
    public function add() {
        $datasolicitacao = implode('-', array_reverse(explode('/', $this->input->post('dataSolicitacao'))));
        
        $data = array(
            'dt_solicitacao' => $datasolicitacao,
            'tp_hora' => $this->input->post('horaSolicitacao'),
            'ds_descricao_chamado' => $this->input->post('descChamado'),
            'ds_observacao' => $this->input->post('descObs'),
            'usuarios_cd_usuario' => $this->input->post('id'),
            'unidades_cd_unidade' => $this->input->post('unidade'),
            'setores_cd_setor' => $this->input->post('setor'),
            'status_cd_status' => 1,
            'tp_prioridade' => $this->input->post('prioridade'),
        );

        $this->mine_model->insert('chamados', $data);
        $this->session->set_flashdata('success', 'Registro inserido com sucesso');
        redirect(site_url('mine'));
    }
    
    public function editar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar editar registro.');
            redirect(site_url() . 'mine');
        }
        $this->load->model('unidades_model');
        $this->load->model('colaboradores_model');
        $this->load->model('chamados_model');
        $this->data['usuario'] = $this->ion_auth->user()->row();
        $this->data['unidades'] = $this->unidades_model->getUnidadesDropdown();
        $this->data['colaboradores'] = $this->colaboradores_model->getColaboradoresDropdown();
        $this->data['results'] = $this->chamados_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('mine/editar', $this->data);
        $this->load->view('template/footer');
    }
    
    public function visualizar() {

        $id = $this->uri->segment(3);

        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar encontrar registro.');
            redirect(site_url() . 'mine');
        }
        
        $this->load->model('chamados_model');
        $this->data['usuario'] = $this->ion_auth->user()->row();
        $this->data['results'] = $this->chamados_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('mine/visualizar', $this->data);
        $this->load->view('template/footer');
    }

}
