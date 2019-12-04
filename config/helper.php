<?php

/*
  menuAktif($nama_halaman, $judul_halaman, $icon)
  contoh : menuAktif('beranda', 'Beranda', 'menu-icon fa fa-home')
  Untuk menambahkan menu dengan link ?module=beranda dengan tulisan 'Beranda' dan icon menu-icon fa fa-home
*/
function buatMenu($nama_halaman, $judul_halaman, $icon)
{
  $menu = $_GET["module"] == $nama_halaman ? "active open hover highlight" : "hover";
  echo "<li class='".$menu".'>
    <a href='?module=".$nama_halaman."'>
        <i class='".$icon."'></i>
        <span class='menu-text'> ".$judul_halaman." </span>
    </a>
    <b class='arrow'></b>
  </li>";
}

?>
