<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_status extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                        'cd_status' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'auto_increment' => FALSE
                        ),
                        'ds_status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        )
                ));
                $this->dbforge->add_key('cd_status', TRUE);
                $this->dbforge->create_table('status');
    }

    public function down() {
        
    }

}
