<?php
class Chamados_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
      
    function getChamados(){
        $this->db->join('unidades','unidades.cd_unidade = chamados.unidades_cd_unidade');
        $this->db->join('setores','setores.cd_setor = chamados.setores_cd_setor');
        $this->db->join('colaboradores','colaboradores.cd_colaborador = chamados.colaboradores_cd_colaborador');
        $this->db->order_by('cd_chamado', 'desc');
        $query = $this->db->get('chamados');
        return $query->result();
    }
    function getById($id){
        $this->db->join('unidades','unidades.cd_unidade = setores.unidades_cd_unidade');
        $this->db->where('cd_setor',$id);
        $this->db->limit(1);
        return $this->db->get('setores')->row();
    }
    
    function insert($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }
    function count($table) {
        return $this->db->count_all($table);
    }
    
    
    
}