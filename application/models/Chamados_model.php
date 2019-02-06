<?php

class Chamados_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($sort = 'cd_chamado', $order ='desc', $limit = null, $offset = null) {
        $this->db->join('unidades', 'unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores', 'setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('users', 'chamados.usuarios_cd_usuario = users.id', 'left');
        $this->db->join('colaboradores', 'colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador','left');
        $this->db->where_not_in('status_cd_status',5);
        $this->db->order_by('cd_chamado','desc');
        if ($limit){
        $this->db->limit($limit, $offset);
        $query = $this->db->get('chamados');
        
        }
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function getFinalizados($sort = 'cd_chamado', $order ='desc', $limit = null, $offset = null) {
        $this->db->join('unidades', 'unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores', 'setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('colaboradores', 'colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador');
        $this->db->where('status_cd_status',5);
        $this->db->order_by('cd_chamado','desc');
        if ($limit){
        $this->db->limit($limit, $offset);
        $query = $this->db->get('chamados');
        
        }
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function getChamados() {
        $this->db->join('unidades', 'unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores', 'setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('colaboradores', 'colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador');
        $this->db->order_by('cd_chamado', 'desc');
        $query = $this->db->get('chamados');
        return $query->result();
    }

    function getById($id) {
        $this->db->join('unidades', 'unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores', 'setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('colaboradores', 'colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador','left');
        $this->db->join('status', 'status.cd_status = chamados.status_cd_status','left');
        $this->db->where('cd_chamado', $id);
        $this->db->limit(1);
        return $this->db->get('chamados')->row();
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

    function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    function count($table) {
        return $this->db->count_all($table);
    }

}
