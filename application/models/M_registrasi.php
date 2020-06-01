<?php

class M_registrasi extends CI_Model {

	public function registrasi_pasien($data)
	{
		$username = $data['username'];
		if ($this->db->query("SELECT * FROM user WHERE username = '$username'")->result() != NULL){
			echo '<script language="javascript">alert("Registrasi Gagal, Username Sudah Digunakan"); window.location.href="'. base_url('admin/registrasi_pasien') .'";</script>';
		}
		else{
			$id_user = rand(1000,9999);
			$query = "INSERT INTO user (id_user, username, password, nama, role) VALUES ('U$id_user',?,md5(?),?,'pasien')";
			$this->db->query($query,array($data['username'],$data['password'],$data['nama']));
			return $this->db->affected_rows();
		}
	}

	public function registrasi_dokter($data)
	{
		$username = $data['username'];
		if ($this->db->query("SELECT * FROM user WHERE username = '$username'")->result() != NULL){
			echo '<script language="javascript">alert("Registrasi Gagal Dokter, Username Sudah Digunakan"); window.location.href="'. base_url('admin/registrasi_dokter') .'";</script>';
		}
		else{
			$nip = rand(10000,99999);
			$id_user = rand(1000,9999);

			$query1 = "INSERT INTO user (id_user, username, password, nama, role) VALUES ('U$id_user',?,md5(?),?,'dokter')";
			$query2 = "INSERT INTO dokter (nip, id_user, nama, tgl_lahir, tgl_registrasi, alamat, poli, status) VALUES ('$nip','U$id_user',?,?,CURDATE(),?,?,?)";

			$this->db->query($query1,array($data['username'],$data['password'],$data['nama']));
			$this->db->query($query2,array($data['nama'],$data['tgl_lahir'],$data['alamat'],$data['poli'],$data['status']));
			return $this->db->affected_rows();
		}
	}

	public function input_poli_umum($data)
	{
		$id_pasien = rand(1000,9999);
		$id_user = $_SESSION['id_user'];

		$query1 = "INSERT INTO pasien (id_pasien, id_user, tgl_periksa, nama, tgl_lahir, alamat, umur, jenis_kelamin, keluhan, alergi_obat,poli,status_pasien) VALUES ('P$id_pasien','$id_user',?,?,?,?,?,?,?,?,'Umum','Belum Diperiksa')";
		$query2 = "INSERT INTO keluhan (id_keluhan, id_pasien, no_antrian , keluhan, poli) VALUES (0,'P$id_pasien',?,?,'Umum')";

		$this->db->query($query1,array($data['tgl_periksa'],$data['nama'],$data['tgl_lahir'],$data['alamat'],$data['umur'],$data['jenis_kelamin'],$data['keluhan'],$data['alergi_obat']));
		$this->db->query($query2,array($data['no_antrian'],$data['keluhan']));
		return $this->db->affected_rows();
	}

	public function input_poli_gigi($data)
	{
		$id_pasien = rand(1000,9999);
		$id_user = $_SESSION['id_user'];

		$query1 = "INSERT INTO pasien (id_pasien, id_user, tgl_periksa, nama, tgl_lahir, alamat, umur, jenis_kelamin, keluhan, alergi_obat,poli,status_pasien) VALUES ('P$id_pasien','$id_user',?,?,?,?,?,?,?,?,'Gigi','Belum Diperiksa')";
		$query2 = "INSERT INTO keluhan (id_keluhan, id_pasien, no_antrian, keluhan, poli) VALUES (0,'P$id_pasien',?,?,'Gigi')";

		$this->db->query($query1,array($data['tgl_periksa'],$data['nama'],$data['tgl_lahir'],$data['alamat'],$data['umur'],$data['jenis_kelamin'],$data['keluhan'],$data['alergi_obat']));
		$this->db->query($query2,array($data['no_antrian'],$data['keluhan']));
		return $this->db->affected_rows();
		
	}
}
