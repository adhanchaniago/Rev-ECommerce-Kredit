<?php

/*
  buatMenu($nama_halaman, $judul_halaman, $icon)
  contoh : 
  echo buatMenu('?module=beranda', 'Beranda', 'menu-icon fa fa-home')
  Untuk menambahkan menu dengan link ?module=beranda dengan tulisan 'Beranda' dan icon menu-icon fa fa-home
*/
function buatMenu($nama_halaman, $judul_halaman, $icon, $link)
{
  $menu = $_GET["module"] == $nama_halaman ? "active open hover highlight" : "hover";
  return "<li class='".$menu."'>
    <a href='".$link."'>
        <i class='".$icon."'></i>
        <span class='menu-text'> ".$judul_halaman." </span>
    </a>
    <b class='arrow'></b>
  </li>";
}


/*
  buatSubMenu($judul_halaman, $daftar_menu = array())
  membuat submenu
  contoh: 
  echo buatSubMenu('Transaksi',
                      array(
                        array('beranda', 'Beranda', 'menu-icon fa fa-home'),
                        array('beranda', 'Beranda', 'menu-icon fa fa-home'),
                        array('beranda', 'Beranda', 'menu-icon fa fa-home'),
                      )
                    );
*/ 
function buatSubMenu($judul_halaman, $icon, $daftar_menu = array())
{
  $sub_menu = "";
  $ketemu = 0;
  $class = "";
  foreach($daftar_menu as $menu)
  {
    $sub_menu .= buatMenu($menu[0], $menu[1], $menu[2],$menu[3]);
    if($menu[0] == $_GET['module'])
    {
      $ketemu++;
    }
  }
  
  $class = $ketemu > 0 ? "active open hover highlight" : "hover highlight";
  
  return "<li class='".$class."'>
              <a href='javascript:void(0);' class='dropdown-toggle'>
                  <i class='".$icon."'></i>
                  <span class='menu-text'> ".$judul_halaman." </span>
      
                  <b class='arrow fa fa-angle-down'></b>
              </a>
      
              <b class='arrow'></b>
              <ul class='submenu'>
                ".$sub_menu."
              </ul>
          </li>";
}


?>
