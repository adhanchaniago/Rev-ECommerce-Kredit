<?php  
// fungsi untuk pengecekan tampilan form
// jika form detail data yang dipilih
if ($_GET['form']=='detail') { 
	$query = mysqli_query($mysqli, "SELECT
									tbl_pembayaran_angsuran.id_pembayaran,
									tbl_pembayaran_angsuran.tgl_bayar,
									tbl_pembayaran_angsuran.jumlah_bayar,
									tbl_pembayaran_angsuran.status_pembayaran,
									tbl_angsuran.cicilan_ke,
									tbl_angsuran.batas_bayar,
									tbl_pembayaran_angsuran.bukti_pembayaran
								From
									tbl_pembayaran_angsuran Inner Join
									tbl_angsuran On tbl_angsuran.id_angsuran = tbl_pembayaran_angsuran.id_angsuran
                                    WHERE tbl_pembayaran_angsuran.id_pembayaran='$_GET[id]'")
                                    or die('Ada kesalahan pada query tampil data konfirmasi: '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
// NEW
	$id_bayar          = $data['id_pembayaran'];
	$tgl               = $data['tgl_bayar'];
	$bukti_bayar       = $data['bukti_pembayaran'];
	$jumlah_bayar      = $darta['jumlah_bayar'];
	$status_bayar      = $data['status_pembayaran'];
	$status_angsuran   = $data['cicilan_ke'];
// NEW
	$exp               = explode('-',$tgl);
	$tanggal_bayar     = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	
	$id_transaksi      = $data['id_transaksi'];
	
	$tgl               = substr($data['tanggal_transaksi'],0,10);
	$exp               = explode('-',$tgl);
	$tanggal_transaksi = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	
	$total_bayar       = $data['total_bayar'];
	
	$rekening_asal     = $data['rekening_asal'];
	$no_rekening_asal  = $data['no_rekening_asal'];
	$pemilik_rekening  = $data['pemilik_rekening'];
	$rekening_tujuan   = $data['rekening_tujuan'];
	$jumlah_bayar      = $data['jumlah_bayar'];
	$id_konsumen       = $data['id_konsumen'];
	$nama_konsumen     = $data['nama_konsumen'];
?>
 	<!-- tampilkan form detail data -->
	<div class="page-content">

<?php

	if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "Konfirmasi Diterima"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Konfirmasi Pembayaran Angsuran Diterima</strong>
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "kategori barang berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Konfirmasi Pembayaran Angsuran ditolak </strong>
		<br>
	</div>
<?php
}
?>



		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Detail Pembayaran Angsuran
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<div class="row">
					<div class="col-xs-12 col-sm-4 center">
						<span class="profile-picture">
							<img class="editable img-responsive" alt="Bukti Pembayaran" id="avatar2" src="../images/konfirmasi/<?php echo $bukti_bayar; ?>" width="365" />
						</span>
					</div><!-- /.col -->

					<div class="col-xs-12 col-sm-8">
						<div style="font-size:14px" class="profile-user-info">
						

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Total Pembayaran Angsuran </div>

								<div class="profile-info-value">
									<span>Rp. <?php echo format_rupiah_nol($jumlah_bayar); ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>


						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name">Status Angsuran  </div>

								<div class="profile-info-value">
									<span><?php echo "Angsuran Ke-". $status_angsuran; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Jumlah Pembayaran </div>

								<div class="profile-info-value">
									<span>Rp. <?php echo format_rupiah_nol($jumlah_bayar); ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>

						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Status </div>

								<div class="profile-info-value">
									<span><?php echo $status_bayar; ?></span>
								</div>
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				
				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">


						<?php if($status_bayar != 'Belum Dikonfirmasi'){ ?>
						
						<a style="width:100px" href="?module=konfirmasi" class="btn">Kembali</a>
						<?php }else{ ?>
						<a style="width:100px" href="?module=konfirmasi" class="btn">Kembali</a>
						<a style="width:100px" href="modules/konfirmasi/proses.php?act=terima&id=<?= $id_bayar ?>" class="btn btn-primary">Diterima</a>
						<a style="width:100px" href="modules/konfirmasi/proses.php?act=tolak&id=<?= $id_bayar ?>" class="btn btn-danger">Ditolak</a>

						<?php } ?>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>