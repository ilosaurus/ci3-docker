<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("libraries/autoload.php");
use GroceryCrud\Core\GroceryCrud;

class Admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
	   $this->load->helper(array('form', 'url'));

	 if(empty($this->session->userdata("user"))){
		redirect(base_url()."main/login");
	 }

	 if($this->session->userdata("user")->level != 'Admin') {
		redirect(base_url()."main/login");
	 }

	 $database = include('database.php'); //config database Grocery
	 $config = include('config.php'); //config library Grocery
	 $this->crud = new GroceryCrud($config, $database); //initialize Grocery
	 /* start Grocery global configuration */
	 $this->crud->unsetDeleteMultiple();
	 $this->crud->unsetPrint();
	 $this->crud->setSkin('bootstrap-v4');

	 $this->crud->displayAs("namaPelanggan","Nama Pelanggan");
	 $this->crud->displayAs("noTelepon","No Telepon");
	 $this->crud->displayAs("noTelepon2","No Telepon Lainnya");
  }

  public function index(){
	  redirect(base_url()."admin/dashboard");
  }

  public function dashboard(){
 	 $var                    = array();
 	 $var['gcrud']           = 0;
 	 $var['var_module']      = "dashboard";
 	 $var['var_title']       = "Dashboard";
 	 $var['var_custom_css']  = "none";
 	 $var['var_custom_js']   = "none";
 	 $var['var_breadcrumb']  = array(array("url" => "#","title" => "<strong>Dashboard</strong>"));
 	 $var['var_other']       = array();
 	 $var['css_files']       = "";
 	 $var['js_files']        = "";
 	 $var['output']          = "";

 	 $this->load->view('main', $var);
  }

	public function user()
  {
	 $this->crud->setTable('m_users');
	 $this->crud->setSubject('User');
	 $this->crud->requiredFields(['nama','username','password','level']);
	 $this->crud->setRule('nama', 'lengthBetween', ['3','50']);
	 $this->crud->setRule('username', 'lengthBetween', ['4','10']);
	 $this->crud->setRule('password', 'lengthBetween', ['8','64']);
	 $this->crud->fieldType('password','password');

	 $this->crud->callbackEditForm(function ($data) {
			 $data['password'] 					 = $this->gmodel->encrypt_decrypt('decrypt',$data['password']);
			 return $data;
	 });

	 $this->crud->callbackBeforeInsert(function ($stateParameters) {
			 $stateParameters->data['password'] = $this->gmodel->encrypt_decrypt('encrypt',$stateParameters->data['password']);
			 return $stateParameters;
	 });

	 $this->crud->callbackBeforeUpdate(function ($stateParameters) {
		 $stateParameters->data['password'] = $this->gmodel->encrypt_decrypt('encrypt',$stateParameters->data['password']);
		 return $stateParameters;
	 });


	 $output = $this->crud->render();

	 if ($output->isJSONResponse) {
		header('Content-Type: application/json; charset=utf-8');
		echo $output->output;
		exit;
	 }

	 $var                    = array();
	 $var['gcrud']           = 1;
	 $var['var_module']      = "";
	 $var['var_title']       = "Data Master";
	 $var['var_custom_css']  = "none";
	 $var['var_custom_js']   = "none";
	 $var['var_breadcrumb']  = array(array("url" => base_url()."general/dataMaster","title" => "Data Master"),array("url" => "#","title" => "<strong>Pegawai</strong>"));
	 $var['var_other']       = array();
	 $var['css_files']       = $output->css_files;
	 $var['js_files']        = $output->js_files;
	 $var['output']          = $output->output;

	 $this->load->view('main', $var);
  }

  public function parameter()
  {
	 $this->crud->setTable('m_parameter');
	 $this->crud->unsetAdd();
	 $this->crud->unsetDelete();
	 $this->crud->setSubject('Parameter');
	 $this->crud->requiredFields(['kodeParameter','parameter','nilai']);
	 $this->crud->setRule('kodeParameter', 'lengthBetween', ['1','3']);
	 $this->crud->setRule('parameter', 'lengthBetween', ['5','32']);
	 $output = $this->crud->render();

	 if ($output->isJSONResponse) {
		header('Content-Type: application/json; charset=utf-8');
		echo $output->output;
		exit;
	 }

	 $var                    = array();
	 $var['gcrud']           = 1;
	 $var['var_module']      = "";
	 $var['var_title']       = "Data Master";
	 $var['var_custom_css']  = "none";
	 $var['var_custom_js']   = "none";
	 $var['var_breadcrumb']  = array(array("url" => base_url()."general/dataMaster","title" => "Data Master"),array("url" => "#","title" => "<strong>Parameter</strong>"));
	 $var['var_other']       = array();
	 $var['css_files']       = $output->css_files;
	 $var['js_files']        = $output->js_files;
	 $var['output']          = $output->output;

	 $this->load->view('main', $var);
  }

}
?>
