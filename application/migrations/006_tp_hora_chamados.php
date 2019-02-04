<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tp_hora_chamados extends CI_Migration {

    public function up() {
// Verificando se o campo já existe
        if (!$this->db->field_exists('tp_hora', 'chamados')) {
// Criando o campo.
            $this->load->dbforge(); // DB Forge, para manipular o banco

            $campos = array(
                    'tp_hora' => array(
                    'type' => 'time',
                    'null' => false
                )
            );

            $this->dbforge->add_column('chamados', $campos);
        }
    }

    public function down() {
        
    }

}
