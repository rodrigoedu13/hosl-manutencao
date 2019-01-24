<?php

class Migration extends CI_Controller {

/**
* Método construtor
*/
public function __construct() {
parent::__construct();
}

public function index() {
$this->load->library('migration');

if ($this->migration->current()) {
echo "Migração bem sucedida!";
}
else {
echo $this->migration->error_string();
}
}
}
