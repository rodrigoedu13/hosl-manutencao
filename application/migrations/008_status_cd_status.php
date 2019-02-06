<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_status_cd_status extends CI_Migration {

    public function up() {
        if (!$this->db->field_exists('status_cd_status', 'chamados')) {
// Criando o campo.
            $this->load->dbforge(); // DB Forge, para manipular o banco

            $campos = array(
                    'status_cd_status' => array(
                    'type' => 'int',
                    'constraint' => 11,
                    'null' => false
                )
            );

            $this->dbforge->add_column('chamados', $campos);
        }
    }

    public function down() {
        $this->dbforge->drop_column('tp_status');
    }

}
