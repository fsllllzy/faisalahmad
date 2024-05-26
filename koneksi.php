<?php
	error_reporting(0);
	$timezone = "Asia/Jakarta";
	date_default_timezone_set($timezone);
	ob_start();
	session_start();
	set_time_limit(0);
	$koneksi = mysqli_connect("localhost","root","","cf_pakar_diabetes");
	if ($koneksi->connect_error){
		die("Koneksi database gagal: " . $conn->connect_error);
	}
?>