<?php
	include 'koneksi.php';
	$id_pertanyaan=$_GET['id_pertanyaan'];
	$sql2="DELETE FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'";
    $koneksi->query($sql2);
    $url='Location: pertanyaan_daftar.php?token='.md5('hapus');        
	header($url);
?>