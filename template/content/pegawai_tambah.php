<?php
    if(!defined('INDEX')) die("");
?>
<h2 class="judul">Tambah pegawai</h2>
<form action="?hal=pegawai_insert" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="foto">Foto</label>
        <div class="input">
            <input type="file" name="foto" id="foto">
        </div>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <div class="input"><input type="text" name="nama" id="nama"></div>
    </div>
    <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <input type="radio" name="jk" id="jk" value="L">Laki-Laki
        <input type="radio" name="jk" id="jk" value="P">Perempuan
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <div class="input"><input type="date" name="tanggal" id="tanggal"></div>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <div class="input"><select name="jabatan" id="jabatan">
            <option value=""> -Pilih Jabatan- </option>
<?php
    $queryjabatan = mysqli_query($con, "SELECT * FROM jabatan");
    while($j = mysqli_fetch_array($queryjabatan)){
        echo "<option value='$j[id_jabatan]'>$j[nama_jabatan]</option>";
    }
?>
        </select></div>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <div class="input"><textarea name="keterangan" id="keterangan" rows="5" width="100%"></textarea></div>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>
</form>