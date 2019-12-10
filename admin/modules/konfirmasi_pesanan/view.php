<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-retweet"></i> Data Konfirmasi Pesanan
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "kategori barang berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Pesanan Berhasil Disetuji</strong>
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
		<strong><i class="ace-icon fa fa-times-circle"></i> Pesanan ditolak </strong>
		<br>
	</div>
<?php
}
?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Konfirmasi Pesanan
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Pesanan</th>
									<th>Konsumen</th>
									<th>Jumlah</th>
                                    <th>Total Pesanan</th>
                                    <th>Status</th>
                                    <th>Lama Angsuran</th>
									<th>Besar Angsuran</th>
									<th>Ubah status</th>
								</tr>
							</thead>

							<tbody>
							<?php
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT
							    tbl_konsumen.nama_konsumen,
							    SUM(tbl_transaksi_detail.jumlah_beli) AS jumlah_beli,
							    tbl_transaksi.*
							From
							    tbl_konsumen Inner Join
							    tbl_transaksi On tbl_konsumen.id_konsumen = tbl_transaksi.id_konsumen Inner Join
							    tbl_transaksi_detail On tbl_transaksi.id_transaksi = tbl_transaksi_detail.id_transaksi
							Where
							    tbl_transaksi.status = 'Belum Disetujui'")
                                                            or die('Ada kesalahan pada query konfirmasi: '.mysqli_error($mysqli));
                      
                            while ($data = mysqli_fetch_assoc($query)) { 
                            ?>
                            	<tr>
									<td width="40" class="center"><?php echo $no; ?></td>
									<td width="100" class="center"><?php echo TanggalIndo($data['tanggal_transaksi']); ?></td>
									<td width="150"><?php echo $data['nama_konsumen']; ?></td>
									<td width="70" class="center"><?php echo $data['jumlah_beli']; ?> barang</td>
									<td width="100" align="right"><?php echo rupiah($data['total_bayar']); ?></td>
									<td width="150"><?php echo $data['status']; ?></td>
									<td width="150"><?php echo $data['lama_angsuran']; ?></td>
									<td width="150"><?php echo rupiah($data['besar_angsuran']) ?></td>

									<td width="150" class="center">
										<form method="POST" action="modules/konfirmasi_pesanan/proses.php">
							<input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">
											<select name="status">
												<option name="Disetujui"> Disetujui</option>
												<option name="Ditolak"> Ditolak</option>
											</select>
											<button type="submit" class="btn btn-info">Ubah</button>
										</form>
									</td>
								</tr>
							<?php
                            	$no++;
                            } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->