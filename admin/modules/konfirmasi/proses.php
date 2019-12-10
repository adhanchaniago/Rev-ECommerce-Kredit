<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk update
else {

if($_GET['act'] == 'terima'){
    $id_pembayaran= $_GET['id'];
    $status = 'Dikonfirmasi';
    $konfirmasi = $mysqli->query("UPDATE  tbl_pembayaran_angsuran SET status_pembayaran = '$status'");
    if($konfirmasi){
        header("location: ../../main.php?module=form_konfirmasi&form=detail&id=1&alert=1");
    }else{
        echo "GAGAL";
    }


}



if($_GET['act'] == 'tolak'){
    $id_pembayaran= $_GET['id'];
    $status = 'Ditolak';
    $konfirmasi = $mysqli->query("UPDATE  tbl_pembayaran_angsuran SET status_pembayaran = '$status'");
    if($konfirmasi){
        header("location: ../../main.php?module=form_konfirmasi&form=detail&id=1&alert=2");
    }else{
        echo "GAGAL";
    }

}

   
}       
?>