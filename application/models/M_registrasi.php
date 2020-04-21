<?php

class M_registrasi extends CI_Model {

	public function registrasi_pasien($data)
	{
		$query = "INSERT INTO user (id_user, username, password, nama, role) VALUES (0,?,md5(?),?,'pasien')";

		$this->db->query($query,array($data['username'],$data['password'],$data['nama']));

		return $this->db->affected_rows();
	}
}
