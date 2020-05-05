<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
	}

	public function list_pasien(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_pasien');
	}

	public function list_dokter(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_dokter');
	}

	public function riwayat_periksa(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_riwayat');
	}
}