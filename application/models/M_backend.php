<?php

class M_backend extends CI_Model {

	public function akun_pasien($id)
	{
		return $this->db->get_where('user',$id)->result_array();
	}

	public function antrian($id)
	{
		return $this->db->query("SELECT id_pasien,no_antrian FROM keluhan WHERE no_antrian='$id'")->result_array();
	}

	public function admin_total_pasien()
	{
		return $this->db->query("SELECT COUNT(id_pasien) as pasien from pasien WHERE DAY(tgl_periksa)=DAY(CURRENT_DATE)")->result_array();
	}

	public function total_pasien_diperiksa()
	{
		return $this->db->query("SELECT COUNT(id_pasien) as pasien_diperiksa from pasien WHERE DAY(tgl_periksa)=DAY(CURRENT_DATE) AND status_pasien='Sudah Diperiksa'")->result_array();
	}

	public function total_pasien_belum_diperiksa()
	{
		return $this->db->query("SELECT COUNT(id_pasien) as pasien_blm from pasien WHERE DAY(tgl_periksa)=DAY(CURRENT_DATE) AND status_pasien='Belum Diperiksa'")->result_array();
	}

	public function admin_total_umum()
	{
		return $this->db->query("SELECT COUNT(id_pasien) as pasien_umum from pasien WHERE DAY(tgl_periksa)=DAY(CURRENT_DATE) AND poli='Umum'")->result_array();
	}

	public function admin_total_gigi()
	{
		return $this->db->query("SELECT COUNT(id_pasien) as pasien_gigi from pasien WHERE DAY(tgl_periksa)=DAY(CURRENT_DATE) AND poli='Gigi'")->result_array();
	}

	public function total_dokter_masuk()
	{
		return $this->db->query("SELECT COUNT(nip) as dokter_masuk from dokter WHERE status='Masuk'")->result_array();
	}

	public function total_dokter_tidak_masuk()
	{
		return $this->db->query("SELECT COUNT(nip) as dokter_tidak_masuk from dokter WHERE status='Tidak Masuk'")->result_array();
	}

	public function dokter_khusus($id)
	{
		return $this->db->get_where('dokter',$id)->result_array();
	}

	public function list_pasien()
	{
		return $this->db->get('pasien')->result_array();
	}

	public function list_pasien_khusus($id)
	{
		return $this->db->get_where('pasien', array('id_pasien'=> $id))->result_array();
	}

	public function pasien_diperiksa($id)
	{
		$query = "UPDATE pasien
				SET status_pasien = 'Sudah Diperiksa'
				WHERE id_pasien = '$id'";

		$this->db->query($query);
		return $this->db->query("SELECT pasien.id_pasien,pasien.tgl_periksa,pasien.nama,pasien.tgl_lahir,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,pasien.status_pasien,keluhan.no_antrian FROM pasien JOIN keluhan ON keluhan.id_pasien=pasien.id_pasien AND pasien.id_pasien='$id'")->result_array();
	}

	public function list_dokter()
	{
		return $this->db->query("SELECT dokter.nip,dokter.nama,dokter.tgl_lahir,dokter.tgl_registrasi,dokter.alamat,dokter.poli,dokter.status,user.username,user.password,user.id_user FROM dokter JOIN user ON dokter.id_user=user.id_user GROUP BY nama ASC")->result_array();
	}

	public function data_pribadi_dokter()
	{
		$id_user = $_SESSION['id_user'];
		return $this->db->query("SELECT dokter.nip,dokter.nama,dokter.tgl_lahir,dokter.alamat,dokter.poli,dokter.status,user.username,user.password,dokter.id_user FROM dokter JOIN user on dokter.id_user=user.id_user AND dokter.id_user='$id_user'")->result_array();
	}

	public function ambil_data_dokter($id)
	{
		return $this->db->query("SELECT dokter.nip,dokter.nama,dokter.tgl_lahir,dokter.alamat,dokter.poli,dokter.status,user.username,user.password,dokter.id_user FROM dokter JOIN user on dokter.id_user=user.id_user AND dokter.id_user='$id'")->result_array();
	}

	public function ambil_resep($data)
	{
		return $this->db->query("SELECT keluhan.no_antrian,pasien.nama,pasien.tgl_lahir,pasien.tgl_periksa,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,riwayat.resep_obat FROM keluhan JOIN pasien ON pasien.id_pasien=keluhan.id_pasien JOIN riwayat ON riwayat.id_pasien=pasien.id_pasien AND pasien.id_pasien='$data'")->result_array();
	}

	public function ambil_data_akun_pasien($id)
	{
		$result = $this->db->get_where('user', array('id_user'=> $id));
		return $result->result_array();
	}

	public function riwayat_admin()
	{
		return $this->db->query("SELECT pasien.id_pasien,pasien.nama,pasien.tgl_lahir,pasien.tgl_periksa,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,riwayat.resep_obat,dokter.nama AS nama_dokter,dokter.nip FROM pasien JOIN riwayat ON riwayat.id_pasien=pasien.id_pasien JOIN dokter ON riwayat.nip=dokter.nip GROUP BY pasien.tgl_periksa ASC")->result_array();
	}

	public function riwayat_pasien()
	{
		$id_user = $_SESSION['id_user'];

		return $this->db->query("SELECT pasien.id_pasien,pasien.nama,pasien.tgl_lahir,pasien.tgl_periksa,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,riwayat.resep_obat,dokter.nama AS nama_dokter FROM pasien JOIN riwayat ON riwayat.id_pasien=pasien.id_pasien JOIN dokter ON riwayat.nip=dokter.nip AND pasien.id_user='$id_user' GROUP BY pasien.tgl_periksa ASC")->result_array();
	}

	public function riwayat_dokter()
	{
		$id_user = $_SESSION['id_user'];
		$data['dokter'] = $this->db->query("SELECT * FROM dokter WHERE id_user='$id_user'")->result_array();
		foreach ($data['dokter'] as $data) {
			$nip = $data['nip'];
		}
		return $this->db->query("SELECT pasien.id_pasien,pasien.nama,pasien.tgl_lahir,pasien.tgl_periksa,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,riwayat.resep_obat FROM pasien JOIN riwayat ON riwayat.id_pasien=pasien.id_pasien AND riwayat.nip='$nip' GROUP BY pasien.tgl_periksa ASC")->result_array();

	}

	public function check_out_aksi($nip)
	{
		$data = array(
        'status' => 'Tidak Masuk'
		);

		$this->db->where('nip', $nip);
		$this->db->update('dokter', $data);
		return $this->db->affected_rows();
	}

	public function check_in_aksi($nip)
	{
		$data = array(
        'status' => 'Masuk'
		);

		$this->db->where('nip', $nip);
		$this->db->update('dokter', $data);
		return $this->db->affected_rows();
	}

	public function update_pasien_aksi($post)
	{
		$query = "UPDATE pasien
				SET nama = ?,
					tgl_lahir = ?,
					alamat = ?,
					umur = ?,
					jenis_kelamin = ?,
					keluhan = ?,
					alergi_obat = ?,
					poli = ?
				WHERE id_pasien = ?";
		$query1 = "UPDATE keluhan
				SET keluhan = ?,
					poli = ?
				WHERE id_pasien = ?";

		$this->db->query($query1,array($post['keluhan'],$post['poli'],$post['id_pasien']));
		$this->db->query($query,array($post['nama'],$post['tgl_lahir'],$post['alamat'],$post['umur'],$post['jenis_kelamin'],$post['keluhan'],$post['alergi_obat'],$post['poli'],$post['id_pasien']));
		return $this->db->affected_rows();
	}

	public function update_dokter_aksi($post)
	{
		$data['dokter'] = $this->M_backend->ambil_data_dokter($post['id_user'],$post['nip']);
		foreach ($data['dokter'] as $data) {
			$password = $data['password'];
		}

		if ($password == $post['password']) {
			$query = "UPDATE dokter
				SET nama = ?,
					tgl_lahir = ?,
					alamat = ?,
					poli = ?,
					status = ?
				WHERE nip = ?";
			$query1 = "UPDATE user
				SET username = ?,
					password = ?,
					nama = ?
				WHERE id_user = ?";

			$this->db->query($query1,array($post['username'],$post['password'],$post['nama'],$post['id_user']));
			$this->db->query($query,array($post['nama'],$post['tgl_lahir'],$post['alamat'],$post['poli'],$post['status'],$post['nip']));
		}
		elseif ($password != $post['password']) {
			$query = "UPDATE dokter
				SET nama = ?,
					tgl_lahir = ?,
					alamat = ?,
					poli = ?,
					status = ?
				WHERE nip = ?";
			$query1 = "UPDATE user
				SET username = ?,
					password = md5(?),
					nama = ?
				WHERE id_user = ?";

			$this->db->query($query1,array($post['username'],$post['password'],$post['nama'],$post['id_user']));
			$this->db->query($query,array($post['nama'],$post['tgl_lahir'],$post['alamat'],$post['poli'],$post['status'],$post['nip']));
		}
		return $this->db->affected_rows();
	}

	public function input_resep($post)
	{
		$id_riwayat = rand(1000,9999);
		$id_user = $_SESSION['id_user'];
		$data['dokter'] = $this->db->query("SELECT * FROM dokter WHERE id_user='$id_user'")->result_array();
		foreach ($data['dokter'] as $data) {
			$nip = $data['nip'];
		}
		$query = "INSERT INTO riwayat (id_riwayat, nip, id_pasien, keluhan, alergi_obat, resep_obat, tgl_periksa) VALUES ('R$id_riwayat','$nip',?,?,?,?,?)";

		$this->db->query($query,array($post['id_pasien'],$post['keluhan'],$post['alergi_obat'],$post['resep_obat'],$post['tgl_periksa']));
		return $this->db->affected_rows();
	}

	public function update_akun_pasien_aksi($data)
	{
		$query = "UPDATE user
				SET username = ?,
					password = md5(?),
					nama = ?
				WHERE id_user = ?";

		$this->db->query($query,array($data['username'],$data['password'],$data['nama'],$data['id_user']));

		return $this->db->affected_rows();
	}

	public function hapus_dokter_aksi($id,$nip)
	{
		$this->db->delete('dokter', array('nip' => $nip));
		$this->db->delete('user', array('id_user' => $id));
		return $this->db->affected_rows();
	}

	public function hapus_pasien_aksi($id)
	{
		$this->db->delete('keluhan', array('id_pasien' => $id));
		$this->db->delete('pasien', array('id_pasien' => $id));
		return $this->db->affected_rows();
	}

	public function hapus_akun_pasien_aksi($data)
	{
		$this->db->delete('user', array('id_user' => $data));
		return $this->db->affected_rows();
	}

	public function setting_admin($postdata)
	{
		$id_user = $_SESSION['id_user'];
		$cekusername = $postdata['username'];
		$data['admin'] = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result_array();
		foreach ($data['admin'] as $data) {
			$username = $data['username'];
			$password = $data['password'];
		}

		if ($username != $postdata['username0'] && $password != md5($postdata['password0'])) {
			echo '<script language="javascript">alert("Username dan Password Lama Salah, Silakan Coba Lagi"); window.location.href="'. base_url('admin/pengaturan_admin') .'";</script>';
		}
		elseif ($this->db->query("SELECT * FROM user WHERE username = '$cekusername'")->result() != NULL && $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result() == NULL){
			echo '<script language="javascript">alert("Username Sudah Digunakan, Silakan Coba Lagi"); window.location.href="'. base_url('admin/pengaturan_admin') .'";</script>';
		}
		elseif ($username == $postdata['username0'] && $password == md5($postdata['password0'])) {
			$query = "UPDATE user
				SET username = ?,
					password = md5(?)
				WHERE role = 'admin'";

			$this->db->query($query,array($postdata['username'],$postdata['password']));

			return $this->db->affected_rows();
		}
	}

	public function cek_pasien()
	{
		$id_user = $_SESSION['id_user'];
		$data['dokter'] = $this->db->query("SELECT * FROM dokter WHERE id_user='$id_user'")->result_array();
		foreach ($data['dokter'] as $data) {
			$poli = $data['poli'];
		}
		if ($poli == 'Umum') {
			return $this->db->query("SELECT pasien.id_pasien,pasien.tgl_periksa,pasien.nama,pasien.tgl_lahir,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,pasien.status_pasien,keluhan.no_antrian FROM pasien JOIN keluhan ON keluhan.id_pasien=pasien.id_pasien AND pasien.poli='Umum' AND pasien.status_pasien='Belum Diperiksa' GROUP BY tgl_periksa ASC")->result_array();
		}
		elseif ($poli == 'Gigi') {
			return $this->db->query("SELECT pasien.id_pasien,pasien.tgl_periksa,pasien.nama,pasien.tgl_lahir,pasien.alamat,pasien.umur,pasien.jenis_kelamin,pasien.keluhan,pasien.alergi_obat,pasien.poli,pasien.status_pasien,keluhan.no_antrian FROM pasien JOIN keluhan ON keluhan.id_pasien=pasien.id_pasien AND pasien.poli='Gigi' AND pasien.status_pasien='Belum Diperiksa' GROUP BY tgl_periksa ASC")->result_array();
		}
	}

	public function cek_presensi()
	{
		$id_user = $_SESSION['id_user'];
		$data['dokter'] = $this->db->query("SELECT * FROM dokter WHERE id_user='$id_user'")->result_array();
		foreach ($data['dokter'] as $data) {
			$status = $data['status'];
		}
		if($status == 'Tidak Masuk') {
			echo '<script language="javascript">alert("Anda Harus Melakukan Check In"); window.location.href="'. base_url('dokter') .'";</script>';
		}
	}

	public function setting_dokter($postdata)
	{
		$id_user = $_SESSION['id_user'];
		$cekusername = $postdata['username'];
		$data['dokter'] = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result_array();
		foreach ($data['dokter'] as $data) {
			$username = $data['username'];
			$password = $data['password'];
		}

		if ($username != $postdata['username0'] && $password != md5($postdata['password0'])) {
			echo '<script language="javascript">alert("Username dan Password Lama Salah, Silakan Coba Lagi"); window.location.href="'. base_url('dokter/pengaturan_dokter') .'";</script>';
		}
		elseif ($this->db->query("SELECT * FROM user WHERE username = '$cekusername'")->result() != NULL && $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result() == NULL){
			echo '<script language="javascript">alert("Username Sudah Digunakan, Silakan Coba Lagi"); window.location.href="'. base_url('dokter/pengaturan_dokter') .'";</script>';
		}
		elseif ($username == $postdata['username0'] && $password == md5($postdata['password0'])) {
			$query = "UPDATE user
				SET username = ?,
					password = md5(?)
				WHERE id_user = '$id_user'";

			$this->db->query($query,array($postdata['username'],$postdata['password']));

			return $this->db->affected_rows();
		}
	}

	public function setting_pasien($postdata)
	{
		$id_user = $_SESSION['id_user'];
		$cekusername = $postdata['username'];
		$data['pasien'] = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result_array();
		foreach ($data['pasien'] as $data) {
			$username = $data['username'];
			$password = $data['password'];
		}

		if ($username != $postdata['username0'] && $password != md5($postdata['password0'])) {
			echo '<script language="javascript">alert("Username dan Password Lama Salah, Silakan Coba Lagi"); window.location.href="'. base_url('pasien/pengaturan_pasien') .'";</script>';
		}
		elseif ($this->db->query("SELECT * FROM user WHERE username = '$cekusername'")->result() != NULL && $this->db->query("SELECT * FROM user WHERE id_user='$id_user'")->result() == NULL){
			echo '<script language="javascript">alert("Username Sudah Digunakan, Silakan Coba Lagi"); window.location.href="'. base_url('pasien/pengaturan_pasien') .'";</script>';
		}
		elseif ($username == $postdata['username0'] && $password == md5($postdata['password0'])) {
			$query = "UPDATE user
				SET username = ?,
					password = md5(?)
				WHERE id_user = '$id_user'";

			$this->db->query($query,array($postdata['username'],$postdata['password']));

			return $this->db->affected_rows();
		}
	}

}
