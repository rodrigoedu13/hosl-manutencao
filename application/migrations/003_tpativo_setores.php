<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tpativo_setores extends CI_Migration {

public function up() {
// Verificando se o campo já existe
if (! $this->db->field_exists('tp_ativo', 'setores')) {
// Criando o campo.
$this->load->dbforge(); // DB Forge, para manipular o banco

$campos = array(
'tp_ativo' => array(
'type' => 'int',
'constraint' => 11
)
);

$this->dbforge->add_column('setores', $campos);
}
}
}
