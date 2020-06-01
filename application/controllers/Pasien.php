<?php 
 
class Pasien extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_registrasi');
		$this->load->model('M_backend');
		$this->load->helper('authlogin');
		pasien();
	}
 
	public function index(){
		$this->load->view('pasien/v_pasien');
	}

	public function pengaturan_pasien(){
		$this->load->view('pasien/v_pengaturan_pasien');
	}

	public function poli_umum(){
		$this->load->view('pasien/v_poli_umum');
	}

	public function poli_gigi(){
		$this->load->view('pasien/v_poli_gigi');
	}

	public function riwayat_periksa(){
		$data['pasien'] = $this->M_backend->riwayat_pasien();
		$this->load->view('pasien/v_pasien_riwayat',$data);
	}

	public function keluhan_poli_umum(){
		if ($this->input->post()) {
			$no = rand(100,999);
			$antrian = "M$no";
			$data = $this->input->post();
			$data = array_merge($data, array('no_antrian'=>$antrian));
			$result = $this->M_registrasi->input_poli_umum($data);
			$antri['pasien'] = $antrian;
			if ($result > 0) {
				echo '<script language="javascript">alert("Data Berhasil Di Masukkan");</script>';
				$this->load->view('pasien/v_antrian_pasien',$antri);
			}
			else{
				echo '<script language="javascript">alert("Input Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('pasien/poli_umum') .'";</script>';
			}
		}
	}

	public function keluhan_poli_gigi(){
		if ($this->input->post()) {
			$no = rand(100,999);
			$antrian = "G$no";
			$data = $this->input->post();
			$data = array_merge($data, array('no_antrian'=>$antrian));
			$result = $this->M_registrasi->input_poli_gigi($data);
			$antri['pasien'] = $antrian;
			if ($result > 0) {
				echo '<script language="javascript">alert("Data Berhasil Di Masukkan");</script>';
				$this->load->view('pasien/v_antrian_pasien',$antri);
			}
			else{
				echo '<script language="javascript">alert("Input Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('pasien/poli_gigi') .'";</script>';
			}
		}
	}

	public function proses_setting_pasien(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->setting_pasien($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Pengaturan Berhasil"); window.location.href="'. base_url('pasien') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Pengaturan Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('pasien/pengaturan_pasien') .'";</script>';
			}
		}
	}

}