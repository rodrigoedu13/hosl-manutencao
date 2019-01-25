<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_exclui_empresas extends CI_Migration {

 public function up()
        {
                $this->dbforge->add_field(array(
                        'cd_unidade' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'ds_unidade' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                ));
                $this->dbforge->add_key('cd_unidade', TRUE);
                $this->dbforge->create_table('unidades');
                
        }

        public function down()
        {
                $this->dbforge->drop_table('empresas');
        }
}
