<?php
    if(!defined('INDEX')) die("");

    $halaman = array("Dashboard","Pegawai","pegawai tambah", "pegawai insert", "pegawai edit",
    "pegawai update", "pegawai hapus", "jabatan", "jabatan tambah", "jabatan insert",
    "jabatan edit", "jabatan update", "jabatan hapus");

    if(isset($_GET['hal'])) $hal = $_GET['hal'];
    else $hal = "dashboard";

    foreach($halaman as $h){
        if($hal == $h){
            include "content/$h.php";
            break;
        }
    }
?>