<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('hello');
    }

	public function index(){
		$data['data'] = $this->hello->getAll();
		$this->load->view('hello', $data);
	}
}
