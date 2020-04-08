<ul class="nav nav-list">
  <?php
  include "../config/helper.php";
  if ($_SESSION['level'] == 'pimpinan') {
  ?>
  <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    echo buatMenu('beranda', 'Beranda', 'menu-icon fa fa-home', 'main.php?module=beranda');


    // jika menu tentang dipilih, menu tentang aktif
    echo buatSubMenu(
      'Informasi',
      'menu-icon fa fa-info-circle',
      array(
        array('tentang', 'Tentang Kami', 'fa fa-caret-right', 'main.php?module=tentang'),
        array('cara_beli', ' Cara Pembelian', 'fa fa-caret-right', 'main.php?module=cara_beli'),

      )
    );


    // jika menu konsumen dipilih, menu konsumen aktif

    echo buatMenu('konsumen', 'Konsumen', 'menu-icon fa fa-user', 'main.php?module=konsumen');


    // jika menu barang dipilih, menu barang aktif fa-folder-o
    echo buatSubMenu(
      'Barang',
      'menu-icon fa fa-folder-o',
      array(
        array('barang', 'Data Barang', 'fa fa-caret-right', 'main.php?module=barang'),
        array('kategori', ' Kategori Barang', 'fa fa-caret-right', 'main.php?module=kategori'),

      )
    );


    // jika menu biaya kirim dipilih, menu biaya kirim aktif
    echo buatMenu('biaya_kirim', 'Biaya Kirim', 'menu-icon fa fa-truck', 'main.php?module=biaya_kirim');
    // jika menu pesanan dipilih, menu pesanan aktif
    echo buatSubMenu(
      'Transaksi',
      'menu-icon fa fa-shopping-cart',
      array(
        array('pesanan', 'Pesanan', 'fa fa-caret-right', 'main.php?module=pesanan'),
        array('konfirmasi_pesanan', 'Konfirmasi Pesanan', 'fa fa-caret-right', 'main.php?module=konfirmasi_pesanan'),
        array('konfirmasi', 'Konfirmasi Pembayaran', 'fa fa-caret-right', 'main.php?module=konfirmasi'),
      )
    );


    // jika menu komentar dipilih, menu komentar aktif
    echo buatMenu('admin', 'Admin', 'menu-icon fa fa-user', 'main.php?module=admin');



    // jika menu komentar dipilih, menu komentar aktif
    echo buatMenu('komentar', 'Komentar', 'menu-icon fa fa-comment', 'main.php?module=komentar');

    // jika menu Laporan perhari dipilih, menu Laporan perhari aktif
    echo buatSubMenu(
      'Laporan',
      'menu-icon fa fa-file-text-o',
      array(
        array('laporanperhari', 'Laporan Perhari', 'fa fa-caret-right', 'main.php?module=laporanperhari'),
        array('laporanperbulan', 'Laporan Perbulan', 'fa fa-caret-right', 'main.php?module=laporanperbulan'),
        array('laporanpertahun', 'Laporan Pertahun', 'fa fa-caret-right', 'main.php?module=laporanpertahun'),
        array('laporanpertahun', 'Laporan Pertahun', 'fa fa-caret-right', 'laporanproduk.php'),
      )
    );
    // jika menu password dipilih, menu password aktif
    echo buatMenu('password', 'Ubah Password', 'menu-icon fa fa-lock', '?module=password');
  } else {
  ?>
    <?php

    // fungsi untuk pengecekan menu aktif Admi-spot

    // jika menu beranda dipilih, menu beranda aktif
    echo buatMenu('beranda', 'Beranda', 'menu-icon fa fa-home', 'main.php?module=beranda');



    // jika menu konsumen dipilih, menu konsumen aktif


    // jika menu barang dipilih, menu barang aktif
    echo buatSubMenu(
      'Barang',
      'menu-icon fa fa-folder-o',
      array(
        array('barang', 'Data Barang', 'fa fa-caret-right', 'main.php?module=barang'),
        array('kategori', ' Kategori Barang', 'fa fa-caret-right', 'main.php?module=kategori'),

      )
    );

    // jika menu barang dipilih, menu barang aktif
    echo buatSubMenu(
      'Request',
      'menu-icon fa fa-folder-o',
      array(
        array('request', 'Data Request', 'fa fa-caret-right', 'main.php?module=barang'),

      )
    );





    echo buatMenu('biaya_kirim', 'Biaya Kirim', 'menu-icon fa fa-truck', 'main.php?module=biaya_kirim');


    echo buatSubMenu(
      'Transaksi',
      'menu-icon fa fa-shopping-cart',
      array(
        array('pesanan', 'Pesanan', 'fa fa-caret-right', 'main.php?module=pesanan'),
        array('konfirmasi_pesanan', 'Konfirmasi Pesanan', 'fa fa-caret-right', 'main.php?module=konfirmasi_pesanan'),
        array('konfirmasi', 'Konfirmasi Pembayaran', 'fa fa-caret-right', 'main.php?module=konfirmasi'),
      )
    );

    echo buatMenu('komentar', 'Komentar', 'menu-icon fa fa-comment', 'main.php?module=komentar');
    // jika menu komentar dipilih, menu komentar aktif


    // jika menu Laporan perhari dipilih, menu Laporan perhari aktif
    if ($_GET["module"] == "laporanperhari") { ?>

    <?php
    }
    // jika menu Laporan perbulan dipilih, menu laporan perbulan aktif
    elseif ($_GET["module"] == "laporanperbulan") { ?>

    <?php
    }
    // jika menu Laporan pertahun dipilih, menu laporan pertahun aktif
    elseif ($_GET["module"] == "laporanpertahun") { ?>

  <?php
    }


    // jika menu password dipilih, menu password aktif
    echo buatMenu('password', 'Ubah Password', 'menu-icon fa fa-lock', 'main.php?module=password');
  }
  ?>




  <li class="hover">
    <a data-toggle="modal" href="#logout">
      <i class="menu-icon fa fa-power-off"></i>
      <span class="menu-text"> Logout </span>
    </a>

    <b class="arrow"></b>
  </li>
</ul>