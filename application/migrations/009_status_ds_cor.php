<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_status_ds_cor extends CI_Migration {

    public function up() {
        if (!$this->db->field_exists('ds_cor', 'status')) {
// Criando o campo.
            $this->load->dbforge(); // DB Forge, para manipular o banco

            $campos = array(
                    'ds_cor' => array(
                    'type' => 'varchar',
                    'constraint' => 20,
                    'null' => false
                )
            );

            $this->dbforge->add_column('status', $campos);
        }
    }

    public function down() {
       
    }

}
