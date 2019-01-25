<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_unidades_cd_unidade_chamados extends CI_Migration {

public function up() {
// Verificando se o campo já existe
if (! $this->db->field_exists('unidades_cd_unidade', 'chamados')) {
// Criando o campo.
$this->load->dbforge(); // DB Forge, para manipular o banco

$campos = array(
'unidades_cd_unidade' => array(
'type' => 'int',
'constraint' => 11
)
);

$this->dbforge->add_column('chamados', $campos);
}
}
}
