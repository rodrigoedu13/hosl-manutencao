<?php
class Status_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
      
    function getStatus(){
        $this->db->order_by('cd_status');
        $query = $this->db->get('status');
        return $query->result();
    }
    
    function getChamadosByStatus($id){
        $this->db->where('status_cd_status',$id);
        $this->db->limit(1);
        return $this->db->get('chamados')->row();
    }
    
    function getById($id){
        $this->db->where('cd_status',$id);
        $this->db->limit(1);
        return $this->db->get('status')->row();
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
    
    function getStatusDropdown(){
        $this->db->select('cd_status,ds_status');
        $results = $this->db->get('status')->result();
        $list = array();
        foreach ($results as $result) {
            $list[$result->cd_status] = $result->ds_status;
        }
        return $list;
    }
    
}