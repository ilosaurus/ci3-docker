<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        header('Content-Type: application/json');
  }

  function login(){
	 $data= $this->input->post();
	 if(!empty($data['username']) and !empty($data['password'])) {
		   $pass= $this->gmodel->encrypt_decrypt("encrypt",$data["password"]);
		   $user= $this->db->get_where("m_users",["username"=>$data["username"],"password"=>$pass])->row();
		   if(!empty($user)){
			   $this->session->user    = $user;
			   $this->session->appTitle= APP_TITLE;
			  echo json_encode(array(
		         "status"=>true,
		         "msg"	=> 'Berhasil login!',
		         )
		       );
		   }else{
			   echo json_encode(array(
 		         "status"=>false,
 		         "msg"	=> 'Username atau Password salah!',
 		         )
 		       );
		   }
	  }else{
		  if(!empty($data['username'])){
			  echo json_encode(array(
		         "status"=>false,
		         "msg"	=> 'Field Password harus di isi!',
		         )
		       );
		  }else{
			  if(empty($data['username']) and empty($data['password'])){
				  echo json_encode(array(
			         "status"=>false,
			         "msg"	=> 'Field Username & Password harus di isi!',
			         )
			       );
			  }else{
				  echo json_encode(array(
			         "status"=>false,
			         "msg"	=> 'Field Username harus di isi!',
			         )
			       );
			  }
		  }
	  }
  }
}
?>
