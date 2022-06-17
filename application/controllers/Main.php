<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->library('session');
		$this->load->model('hello');
    }

	public function index(){
		print_r(hello);
		$data = $this->hello->getAll();
		echo '</pre>';print_r($data);echo '</pre>'; 
		$this->load->view('main');
	}
}
