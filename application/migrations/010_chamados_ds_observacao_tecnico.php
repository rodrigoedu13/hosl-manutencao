<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_chamados_ds_observacao_tecnico extends CI_Migration {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $fields = array(
            'dt_previsao' => array('type' => 'DATETIME', 'null' => TRUE),
            'ds_observacao_tecnico' => array('type' => 'TEXT', 'null' => TRUE)
        );
        $this->dbforge->add_column('table_name', $fields);
    }

    public function down() {
        
    }

}
