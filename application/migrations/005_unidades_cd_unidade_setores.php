<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_unidades_cd_unidade_setores extends CI_Migration {

    public function up() {
// Verificando se o campo já existe
        if (!$this->db->field_exists('unidades_cd_unidade', 'setores')) {
// Criando o campo.
            $this->load->dbforge(); // DB Forge, para manipular o banco

            $campos = array(
                'unidades_cd_unidade' => array(
                    'type' => 'int',
                    'constraint' => 11,
                    'null' => false
                )
            );

            $this->dbforge->add_column('setores', $campos);
        }
    }

    public function down() {
        $this->dbforge->drop_column('empresas_cd_empresa');
    }

}
