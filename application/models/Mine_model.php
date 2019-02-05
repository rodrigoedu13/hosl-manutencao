<?php

class Mine_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    

    public function getChamados($table, $fields, $where = '', $perpage, $start = 0, $one = false, $array = 'array', $usuario)
    {
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->join('users', 'chamados.usuarios_cd_usuario = users.id', 'left');
        $this->db->join('unidades', 'unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores', 'setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('colaboradores', 'colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador','left');
        $this->db->where('usuarios_cd_usuario', $usuario);
        $this->db->limit($perpage, $start);
        $this->db->order_by('cd_chamado', 'desc');
        if ($where) {
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function count($table,$id) {
        $this->db->where('usuarios_cd_usuario',$id);
        return $this->db->count_all_results($table);
    }
    
    function insert($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

}
