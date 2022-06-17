<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);
class Main extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->library('session');
	$this->load->model('hello');

    }

	public function index(){
		if(empty($this->session->userdata('user')) OR empty($this->session->userdata('appTitle'))){
			redirect(base_url()."main/login");
		}else{
			if($this->session->userdata('appTitle') != APP_TITLE){
				redirect(base_url()."main/login");
			}else{
				$user= $this->session->userdata('user');
					redirect(base_url()."admin");
			}
		}
	}

	public function login(){
		print_r(hello);
		$data = $this->hello->getAll();
		echo '</pre>';print_r($data);echo '</pre>'; 
	}
}
