<?php
    if(!defined('INDEX')) die("");
?>

<h2 class="judul">Data kiriman</h2>
<a class="tombol" href="?hal=kiriman_tambah">Tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jabatan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = mysqli_query($con, "SELECT * FROM kiriman LEFT JOIN jabatan ON kiriman.id_jabatan=jabatan.id_jabatan ORDER BY kiriman.id_kiriman DESC");
    $no  = 0;
    while($data = mysqli_fetch_array($query)){
        $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <td><img src="images/<?= $data['foto']?>" width="100"></td>
        <td><?= $data['nama_kiriman'] ?></td>
        <td><?= $data['jenis_kelamin'] ?></td>
        <td><?= $data['tgl_lahir'] ?></td>
        <td><?= $data['nama_jabatan'] ?></td>
        <td><?= $data['keterangan'] ?></td>
        <td>
        
            <a href="?hal=kiriman_edit&id=<?= $data['id_kiriman']?>" class="tombol edit">Edit</a>
            <a href="?hal=kiriman_hapus&id=<?= $data['id_kiriman'] ?>&foto=<?= $data['foto'] ?>" class="tombol hapus">hapus</a>
        </td>
    </tr>
    </tbody>
<?php
    }
?>
</table>