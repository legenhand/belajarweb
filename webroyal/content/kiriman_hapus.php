<?php
    if(!defined('INDEX')) die("");

    if(file_exists("images/$_GET[foto]")) unlink("images/$_GET[foto]");
    $query = mysqli_query($con, "DELETE FROM kiriman WHERE id_kiriman='$_GET[id]'");

    if($query){
        echo "Data berhasil dihapus!";
        echo "<meta http-equiv='refresh' content='1; url=?hal=kiriman'>";
    }else{
        echo "tidak dapat menghapus data!";
        echo mysqli_error;
    }
?>