<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i style="margin-right:6px" class="fa fa-shopping-cart"></i>
                    Request Produk
                </h3>
                <ol class="breadcrumb">
                    <li><a href="?page=home">Beranda</a>
                    </li>
                    <li class="active">Request Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                // fungsi untuk menampilkan pesan
                // jika alert = "" (kosong)
                // tampilkan pesan "" (kosong) 
                if (empty($_GET['alert'])) {
                    echo "";
                }
                // jika alert = 1
                // tampilkan pesan Gagal "email sudah terdaftar"
                elseif ($_GET['alert'] == 1) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> email sudah terdaftar.
                    </div>
                <?php
                }
                // jika alert = 2
                // tampilkan pesan Sukses "pendaftaran Anda berhasil, silahkan login melalui menu Login"
                elseif ($_GET['alert'] == 2) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> Request Produk Anda berhasil, mohon tunggu konfirmasi Admin
                    </div>
                <?php
                }
                ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- tampilan form hubungi kami -->
                        <form class="form-horizontal" method="POST" action="pages/request/proses.php">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="id_konsumen" value="<?php echo $_SESSION['id_konsumen'] ?>">
                                    <input type="text" class="form-control" name="nama" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Harga Produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="harga" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="ket" rows="3" required></textarea>
                                </div>
                            </div>


                            <hr />
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input style="width:150px" type="submit" class="btn btn-primary btn-lg btn-submit" name="daftar" value="Daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->