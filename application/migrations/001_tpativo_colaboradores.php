<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tpativo_colaboradores extends CI_Migration {

public function up() {
// Verificando se o campo já existe
if (! $this->db->field_exists('tp_ativo', 'colaboradores')) {
// Criando o campo.
$this->load->dbforge(); // DB Forge, para manipular o banco

$campos = array(
'tp_ativo' => array(
'type' => 'int'
)
);

$this->dbforge->add_column('colaboradores', $campos);
}
}
}
