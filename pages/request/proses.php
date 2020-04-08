<?php
// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if (isset($_POST['daftar'])) {
	// ambil data hasil submit dari form
	$nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
	$id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
	$harga         = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
	$ket         = mysqli_real_escape_string($mysqli, trim($_POST['ket']));




	define('ROOT', 'http://localhost/hp/');

	$query = mysqli_query($mysqli, "INSERT INTO `tbl_request`(	`id_konsumen`, 
																`request_nama`, 
																`request_harga`, 
																`request_ket`) VALUES (
																'$id_konsumen',
																'$nama',
																'$harga',
																'$ket'
																)")
		or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

	// cek query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil simpan data
		header("location: ../../main.php?page=request&alert=2");
	}
}
