<?php
    if(!defined('INDEX')) die("");

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $tipefile = $_FILES['foto']['type'];
    $ukuranfile = $_FILES['foto']['size'];

    $error = "";
    if($foto == ""){
        $query = mysqli_query($con,"UPDATE kiriman SET
                    nama_kiriman = '$_POST[nama]',
                    jenis_kelamin = '$_POST[jk]',
                    tgl_lahir = '$_POST[tanggal]',
                    id_jabatan = '$_POST[jabatan]',
                    keterangan = '$_POST[keterangan]'
                    WHERE id_kiriman='$_POST[id]'
                    ");
    }else{
        if($tipefile != "image/jpeg" and $tipefile!="image/jpg" and $tipefile!="image/png"){
            $error = "Tipe file tidak didukung!";
        }elseif($ukuranfile>=1000000){
            $error = "Ukuran File terlalu besar (lebih dari 1mb)!";
        }else{
            $query = mysqli_query($con,"SELECT * FROM kiriman WHERE id_kiriman='$_POST[id]'");
            $data = mysqli_fetch_array($query);
            if(file_exists("images/$data[foto]")) unlink("images/$data[foto]");

            move_uploaded_file($lokasi, "images/".$foto);
            $query = mysqli_query($con,"UPDATE kiriman SET
                    foto = '$foto',
                    nama_kiriman = '$_POST[nama]',
                    jenis_kelamin = '$_POST[jk]',
                    tgl_lahir = '$_POST[tanggal]',
                    id_jabatan = '$_POST[jabatan]',
                    keterangan = '$_POST[keterangan]'
                    WHERE id_kiriman='$_POST[id]'
                    ");
        }
    }
    if($error != ""){
        echo $error;
        echo "<meta http-equiv='refresh' content='2; url=?hal=kiriman_tambah'>";
    }elseif($query){
        echo "Data Berhasil disimpan!";
        echo "<meta http-equiv='refresh' content='1; url=?hal=kiriman'>";
    }else{
        echo "tidak dapat menyimpan data! <br>";
        echo mysqli_error();
    }
?>