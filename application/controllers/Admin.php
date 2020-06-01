<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_registrasi');
		$this->load->model('M_backend');
		$this->load->helper('authlogin');
		admin();
	}
 
	public function index(){
		$data['admin1'] = $this->M_backend->admin_total_pasien();
		$data['admin2'] = $this->M_backend->admin_total_umum();
		$data['admin3'] = $this->M_backend->admin_total_gigi();
		$data['admin4'] = $this->M_backend->total_dokter_masuk();
		$data['admin5'] = $this->M_backend->total_dokter_tidak_masuk();
		$data['admin6'] = $this->M_backend->total_pasien_diperiksa();
		$data['admin7'] = $this->M_backend->total_pasien_belum_diperiksa();
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_dashboard',$data);
	}

	public function list_pasien(){
		$data['admin'] = $this->M_backend->list_pasien();
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_pasien',$data);
	}

	public function list_dokter(){
		$data['dokter'] = $this->M_backend->list_dokter();
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_dokter', $data);
	}

	public function riwayat_periksa(){
		$data['admin'] = $this->M_backend->riwayat_admin();
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/vadmin_riwayat',$data);
	}

	public function registrasi_pasien(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_registrasi_pasien');
	}

	public function registrasi_dokter(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_registrasi_dokter');
	}

	public function pengaturan_admin(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_pengaturan_admin');
	}

	public function proses_registrasi_dokter(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_registrasi->registrasi_dokter($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Registrasi Berhasil"); window.location.href="'. base_url('admin/list_dokter') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Registrasi Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/registrasi_dokter') .'";</script>';
			}
		}
	}

	public function proses_setting_admin(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->setting_admin($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Pengaturan Berhasil"); window.location.href="'. base_url('admin') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Pengaturan Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/pengaturan_admin') .'";</script>';
			}
		}
	}

	public function proses_registrasi_akun_pasien(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_registrasi->registrasi_pasien($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Registrasi Berhasil"); window.location.href="'. base_url('admin/list_akun_pasien') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Registrasi Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/registrasi_pasien') .'";</script>';
			}
		}
	}

	public function list_akun_pasien(){
		$where = array('role' => 'pasien');
		$data['akun'] = $this->M_backend->akun_pasien($where);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_list_akun_pasien', $data);
	}

	public function edit_akun_pasien($id){
		$data['akun'] = $this->M_backend->ambil_data_akun_pasien($id);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_update_akun_pasien',$data);
	}

	public function edit_dokter($id){
		$data['dokter'] = $this->M_backend->ambil_data_dokter($id);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_update_dokter',$data);
	}

	public function proses_edit_dokter(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->update_dokter_aksi($data);
			if ($result >= 0) {
				echo '<script language="javascript">alert("Data Dokter Berhasil Di Update"); window.location.href="'. base_url('admin/list_dokter') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Update Data Dokter Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_dokter') .'";</script>';
			}
		}
	}

	public function edit_pasien($id){
		$data['pasien'] = $this->M_backend->list_pasien_khusus($id);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/v_update_pasien',$data);
	}

	public function proses_update_pasien(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->update_pasien_aksi($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Akun Pasien Berhasil Di Update"); window.location.href="'. base_url('admin/list_pasien') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Update Akun Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_pasien') .'";</script>';
			}
		}
	}

	public function proses_update_akun_pasien(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->M_backend->update_akun_pasien_aksi($data);
			if ($result > 0) {
				echo '<script language="javascript">alert("Akun Pasien Berhasil Di Update"); window.location.href="'. base_url('admin/list_akun_pasien') .'";</script>';
			}
			else{
				echo '<script language="javascript">alert("Update Akun Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_akun_pasien') .'";</script>';
			}
		}
	}

	public function hapus_akun_pasien($id){
		$where = $id;
		$result = $this->M_backend->hapus_akun_pasien_aksi($where);
		if ($result > 0) {
			echo '<script language="javascript">alert("Akun Pasien Berhasil Di Hapus"); window.location.href="'. base_url('admin/list_akun_pasien') .'";</script>';
		}
		else{
			echo '<script language="javascript">alert("Hapus Akun Gagal, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_akun_pasien') .'";</script>';
		}
	}

	public function hapus_dokter($id,$nip){
		$where = $id;
		$result = $this->M_backend->hapus_dokter_aksi($where,$nip);
		if ($result > 0) {
			echo '<script language="javascript">alert("Data Dokter Berhasil Di Hapus"); window.location.href="'. base_url('admin/list_dokter') .'";</script>';
		}
		else{
			echo '<script language="javascript">alert("Data Dokter Gagal Di Hapus, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_dokter') .'";</script>';
		}
	}

	public function hapus_pasien($id){
		$result = $this->M_backend->hapus_pasien_aksi($id);
		if ($result > 0) {
			echo '<script language="javascript">alert("Data Pasien Berhasil Di Hapus"); window.location.href="'. base_url('admin/list_pasien') .'";</script>';
		}
		else{
			echo '<script language="javascript">alert("Data Pasien Gagal Di Hapus, Silakan Coba Lagi"); window.location.href="'. base_url('admin/list_pasien') .'";</script>';
		}
	}
}