<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-retweet"></i> Data Konfirmasi Pembayaran Angsuran
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
		<strong><i class="ace-icon fa fa-check-circle"></i> Pembayaran Angsuran diterima </strong>
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
		<strong><i class="ace-icon fa fa-times-circle"></i> Pembayaran Angsuran ditolak </strong>
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
						Data Konfirmasi Pembayaran
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Pembayaran</th>
									<th>Jumlah Pembayar</th>
									<th>Status Pembayaran</th>
									<th>Pembayaran </th>
								
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT
							tbl_pembayaran_angsuran.id_pembayaran,
							tbl_pembayaran_angsuran.tgl_bayar,
							tbl_pembayaran_angsuran.jumlah_bayar,
							tbl_pembayaran_angsuran.status_pembayaran,
							tbl_angsuran.cicilan_ke
						From
							tbl_pembayaran_angsuran Inner Join
							tbl_angsuran On tbl_angsuran.id_angsuran = tbl_pembayaran_angsuran.id_angsuran
                                                            WHERE tbl_pembayaran_angsuran.status_pembayaran='Belum Dikonfirmasi'
                                                            ORDER BY tbl_pembayaran_angsuran.id_pembayaran DESC")
                                                            or die('Ada kesalahan pada query konfirmasi: '.mysqli_error($mysqli));
                      
                            while ($data = mysqli_fetch_assoc($query)) { 
								
                      
                            ?>
								<tr>
									<td width="40" class="center"><?php echo $no; ?></td>
									<td width="100" class="center"><?php echo TanggalIndo($data['tgl_bayar']); ?></td>
									<td width="150" align="center"><?php echo rupiah($data['jumlah_bayar']) ; ?></td>
									<td width="70" class="center"><?php echo $data['status_pembayaran']; ?></td>
									<td width="100" align="center"><?php echo "Pembayaran Ke-".$data['cicilan_ke']; ?>
									</td>				
									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title=""
												class=""
												href="?module=form_konfirmasi&form=detail&id=<?php echo $data['id_pembayaran']; ?>">
												<i class="ace-icon fa fa-search-plus bigger-130">Detail</i>
											</a>
										</div>
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