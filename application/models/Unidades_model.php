<?php
class Unidades_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
      
    function getUnidades(){
        $this->db->order_by('cd_unidade');
        $query = $this->db->get('unidades');
        return $query->result();
    }
    function getById($id){
        $this->db->where('cd_unidade',$id);
        $this->db->limit(1);
        return $this->db->get('unidades')->row();
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
    
    function getUnidadesDropdown(){
        $this->db->select('cd_unidade,ds_unidade');
        $results = $this->db->get('unidades')->result();
        $list = array();
        foreach ($results as $result) {
            $list[$result->cd_unidade] = $result->ds_unidade;
        }
        return $list;
    }
    
}