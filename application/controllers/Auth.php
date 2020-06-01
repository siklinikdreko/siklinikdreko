<?php 
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	function index(){
		if ($this->session->userdata("role") == 'admin') {
			redirect('admin');
		}
		elseif ($this->session->userdata("role") == 'dokter') {
			redirect('dokter');
		}
		elseif ($this->session->userdata("role") == 'pasien') {
			redirect('pasien');
		}
		else{
			echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
		}
	}
}