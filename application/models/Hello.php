<?php defined('BASEPATH') OR exit ('No direct script access allowed!');
class Hello extends CI_Model {
private $_table = "m_parameter";
	public function getAll(){
        return $this->db->get($this->_table)->result();
    }
}
