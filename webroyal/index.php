<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) or empty($_SESSION['password'])){
        echo "<p align='center'> Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
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
        <script src="js/jquery-3.4.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#provinsi').change(function(){
                    var provinsi_id = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: 'content/kota.php',
                        data: 'prov_id='+provinsi_id,
                        success: function(response){
                            $('#kota').html(response);
                        }
                    });
                })
            });
        </script>
    </head>
    <body>
        <header>
            Aplikasi Manajemen kiriman
        </header>
        <div class="container">
            <aside>
                <ul class="menu">
                    <li><a href="?hal=dashboard" class="aktif">Dashboard</a></li>
                    <li><a href="?hal=kiriman">Data kiriman</a></li>
                    <li><a href="?hal=jabatan">Data Ongkos kirim</a></li>
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