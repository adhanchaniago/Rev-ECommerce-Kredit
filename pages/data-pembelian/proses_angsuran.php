<?php
include "../../config/database.php";
include "../../config/helper.php";

$id_angsuran     = $_POST['id_angsuran'];
$tgl_bayar       = $_POST['tgl_bayar'];
$jumlah_bayar    = $_POST['jumlah_bayar'];
$foto_bukti     = fileUpload($_FILES['bukti_pembayaran'], "../../images/konfirmasi/");



$tambah_angsuran = $mysqli->query("INSERT INTO tbl_pembayaran_angsuran (id_angsuran, tgl_bayar, jumlah_bayar, bukti_pembayaran) VALUES ('$id_angsuran','$tgl_bayar','$jumlah_bayar','$foto_bukti') ");


if($tambah_angsuran){
    header("location: ../../main.php?page=pembelian&form=view&alert=7");
}else{
 echo "Gagal bg";
}

?>