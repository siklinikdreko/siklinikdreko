<?php 
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_registrasi');
	}
 
	function index(){
		if ($this->session->userdata("role") == 'admin') {
			echo "admin";
		}
		elseif ($this->session->userdata("role") == 'dokter') {
			echo "dokter";
		}
		elseif ($this->session->userdata("role") == 'pasien') {
			echo "pasien";
		}
	}

	function registrasi(){
		$this->load->view('v_registrasi_pasien');
	}

	function proses_registrasi(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_registrasi->registrasi_pasien($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Registrasi Berhasil"); window.location.href="'. base_url() .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Registrasi Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('auth/registrasi') .'";</script>';
			}
		}
	}
}