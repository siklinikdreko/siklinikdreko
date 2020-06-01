<?php

class Dokter extends CI_Controller{
	
	
	function __construct(){
		parent::__construct();
		$this->load->helper('authlogin');
		$this->load->model('M_backend');
		dokter();
	}

	public function index(){
		$data['dokter'] = $this->M_backend->data_pribadi_dokter();
		$this->load->view('tempdokter/header_dokter');
		$this->load->view('tempdokter/footer_dokter');
		$this->load->view('tempdokter/sidebar_dokter');
		$this->load->view('dokter/vdokter',$data);
	}

	public function pasien(){
		$data = $this->M_backend->cek_presensi();
		$datap['pasien'] = $this->M_backend->cek_pasien();
		$this->load->view('tempdokter/header_dokter');
		$this->load->view('tempdokter/footer_dokter');
		$this->load->view('tempdokter/sidebar_dokter');
		$this->load->view('dokter/vdokter_pasien',$datap);
	}

	public function riwayat_pasien(){
		$data['pasien'] = $this->M_backend->riwayat_dokter();
		$this->load->view('tempdokter/header_dokter');
		$this->load->view('tempdokter/footer_dokter');
		$this->load->view('tempdokter/sidebar_dokter');
		$this->load->view('dokter/vdokter_riwayat',$data);
	}

	public function periksa_pasien($id){
		$data['pasien'] = $this->M_backend->pasien_diperiksa($id);
		$this->load->view('tempdokter/header_dokter');
		$this->load->view('tempdokter/footer_dokter');
		$this->load->view('tempdokter/sidebar_dokter');
		$this->load->view('dokter/v_daftar_keluhan',$data);
	}

	public function buat_resep(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$id_pasien = $data['id_pasien'];
			$result = $this->M_backend->input_resep($data);
			if ($result > 0) {
				$datap['pasien'] = $this->M_backend->ambil_resep($id_pasien);
				$this->load->view('dokter/v_cetak_resep',$datap);
			}
			else{
				echo '<script language="javascript">alert("Cetak Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('dokter/periksa_pasien/$id_pasien') .'";</script>';
			}
		}
	}

	public function pengaturan_dokter(){
		$this->load->view('tempdokter/header_dokter');
		$this->load->view('tempdokter/footer_dokter');
		$this->load->view('tempdokter/sidebar_dokter');
		$this->load->view('dokter/v_pengaturan_dokter');
	}

	public function check_out($nip){
		$result = $this->M_backend->check_out_aksi($nip);
		if ($result > 0) {
			echo '<script language="javascript">alert("Check Out Berhasil"); window.location.href="'. base_url('dokter') .'";</script>';
		}
		else{
			echo '<script language="javascript">alert("Check Out Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('dokter') .'";</script>';
		}
	}

	public function check_in($nip){
		$result = $this->M_backend->check_in_aksi($nip);
		if ($result > 0) {
			echo '<script language="javascript">alert("Check In Berhasil"); window.location.href="'. base_url('dokter') .'";</script>';
		}
		else{
			echo '<script language="javascript">alert("Check In Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('dokter') .'";</script>';
		}
	}

	public function proses_setting_dokter(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->setting_dokter($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Pengaturan Berhasil"); window.location.href="'. base_url('dokter') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Pengaturan Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('dokter/pengaturan_dokter') .'";</script>';
			}
		}
	}

}