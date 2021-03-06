<?php
class Colaboradores_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
      
    function getColaboradores(){
        $this->db->order_by('cd_colaborador');
        $query = $this->db->get('colaboradores');
        return $query->result();
    }
    function getById($id){
        $this->db->where('cd_colaborador',$id);
        $this->db->limit(1);
        return $this->db->get('colaboradores')->row();
    }
    
    function getColaboradorByOs($id){
        $this->db->where('colaboradores_cd_colaborador',$id);
        $this->db->limit(1);
        return $this->db->get('chamados')->row();
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
    
    function getColaboradoresDropdown(){
        $this->db->select('cd_colaborador,ds_colaborador');
        $this->db->where('tp_ativo','1');
        $results = $this->db->get('colaboradores')->result();
        $list = array();
        foreach ($results as $result) {
            $list[$result->cd_colaborador] = $result->ds_colaborador;
        }
        return $list;
    }
    
}