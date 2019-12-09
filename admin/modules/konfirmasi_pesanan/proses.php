<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

 $update_status = $mysqli->query("UPDATE tbl_transaksi SET status = '$_POST[status]' where id_transaksi ='$_POST[id_transaksi]'");


 if($_POST['status'] === 'Disetujui'){
    $data_transaksi = $mysqli->query("SELECT * From tbl_transaksi WHERE id_transaksi='$_POST[id_transaksi]'")->fetch_assoc();



$total_bayar = $data_transaksi['total_bayar']; // total bayar transaksi
$lama_angsuran = $data_transaksi['lama_angsuran'];// bulan, pembeli menentukan sendiri
$besar_angsuran = $total_bayar/$lama_angsuran; // besar angsuran perbulan
$id_transaksi = $data_transaksi['id_transaksi'];;

// tanggal batas waktu per bulan
$tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d'))));

for($x = 1; $x <= $lama_angsuran; $x++)
{
// tambah data angsuran perbulan
        $mysqli->query("INSERT INTO tbl_angsuran (id_transaksi, cicilan_ke, batas_bayar, jumlah_bayar) VALUES ('$id_transaksi', '$x', '$tgl_bayar_angsuran_per_bulan', '$besar_angsuran')");

// tambahkan tanggal angsuran tadi 1 bulan kedepan
$tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime($tgl_bayar_angsuran_per_bulan)));
}

 }


 if($update_status){
    header("location: ../../main.php?module=konfirmasi_pesanan&alert=1");
 }else{
     header("location: ../../main.php?module=konfirmasi_pesanan&alert=2");
 }



?>