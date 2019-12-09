<?php  


// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else { ?>
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <i style="margin-right:6px" class="fa fa-shopping-cart"></i>
                        Transaksi Berhasil Diterima
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Transaksi Berhasil Diterima</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-ok-circle"></i> Selamat!</strong> Anda telah berhasil melakukan proses pemesanan. <br>
                        Selanjutnya kami dari admin akan meninjau transaksi anda terlebih dahulu.</strong>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <?php  
                        $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi
                                                        WHERE id_konsumen='$_SESSION[id_konsumen]' AND status='Belum Disetujui' ORDER BY id_transaksi DESC LIMIT 1")
                                                        or die('Ada kesalahan pada query total bayar: '.mysqli_error($mysqli));
                              
                        $data = mysqli_fetch_assoc($query);
                        $total_bayar = $data['total_bayar'];    
                        $lama_angsuran = $data['lama_angsuran'];
                        $besar_angsuran = $data['besar_angsuran'];
                        $data_pembayaran = array(); // variabel untuk menampung tanggal sebanyak lama angsuran

                        // tanggal batas waktu per bulan
                        // tanggal angsuran pertama atau tanggal sekarang
                        $tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d'))));


                        $data_pembayaran[] = $tgl_bayar_angsuran_per_bulan;

                        for($x = 1; $x < $lama_angsuran; $x++)
                        {
                            // tambahkan tanggal angsuran tadi 1 bulan kedepan
                            $tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime($tgl_bayar_angsuran_per_bulan)));
                            $data_pembayaran[] = $tgl_bayar_angsuran_per_bulan;
                        }


                        ?>
                            <h4>Total yang harus dibayar : Rp. <?php echo format_rupiah_nol($total_bayar); ?></h4>
                            <h4>Besar angsuran yang harus dibayarkan: Rp. <?php echo format_rupiah_nol($besar_angsuran); ?></h4>
                            <h4>Lama angsuran Anda: <?php echo format_rupiah_nol($lama_angsuran); ?> Bulan</h4>
                            <h4>Simulasi Pembayaran Angsuran : </h4>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah yang harus di bayar</th>
                                    <th>Tanggal jatuh tempo</th>
                                </tr>
                                <?php
                                    foreach ($data_pembayaran as $no => $pembayaran) {
                                ?>
                                    <tr>
                                        <td><?=$no+1?></td>
                                        <td><?="Angsuran Ke-".($no+1)?></td>
                                        <td>Rp. <?= format_rupiah_nol($besar_angsuran)?></td>
                                        <td><?= TanggalIndo($pembayaran)?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div> <!-- /.panel -->

                   <!--  <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Rekening Pembayaran</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <strong>BCA</strong><br>
                                            Nomor rekening: <strong>54740101345678</strong> <br>
                                            Atas Nama: <strong>Toko HP</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <strong>BNI</strong> <br>
                                            Nomor rekening: <strong>576598786444</strong> <br>
                                            Atas Nama: <strong>Toko HP</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --> <!-- /.panel -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

