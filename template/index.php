<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) or empty($_SESSION['password'])){
        echo "<p align='center'> Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='2' url='login.php'>";
    }else{
        define('INDEX', true);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            Aplikasi Manajemen pegawai
        </header>
        <div class="container">                                       
            <aside>
                <ul class="menu">
                    <li><a href="?hal=dashboard" class="aktif">Dashboard</a></li>
                    <li><a href="?hal=pegawai">Data pegawai</a></li>
                    <li><a href="?hal=jabatan">Data Jabatan</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            </aside>
            <section class="main">
                <?php include "konten.php"; ?>
            </section>
        </div>
        <footer>
            Copyright &copy; Firmansyah
        </footer>
    </body>
</html>
<?php
    }
?>