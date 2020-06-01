<?php

function admin(){

	if (isset($_SESSION['role']) != 'admin') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
	elseif ($_SESSION['role'] == 'dokter' || $_SESSION['role'] == 'pasien') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
}

function dokter(){
	if (isset($_SESSION['role']) != 'dokter') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
	elseif ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'pasien') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
}

function pasien(){
	if (isset($_SESSION['role']) != 'pasien') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
	elseif ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'dokter') {
		echo '<script language="javascript">alert("Anda Harus Login"); window.location.href="'. base_url() .'";</script>';
	}
}

?>