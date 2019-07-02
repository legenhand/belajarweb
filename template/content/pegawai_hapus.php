<?php
    if(!defined('INDEX')) die("");

    if(file_exists("images/$_GET[foto]")) unlink("images/$_GET[foto]");
    $query = mysqli_query($con, "DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'");

    if($query){
        echo "Data berhasil dihapus!";
        echo "<meta http-equiv='refresh' content='1; url=?hal=pegawai'>";
    }else{
        echo "tidak dapat menghapus data!";
        echo mysqli_error;
    }
?>