<?php
class Hosl_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function check_credentials($login)
    {
        $this->db->where('cd_usuario', $login);
        $this->db->where('situacao', 1);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }
    
    
}