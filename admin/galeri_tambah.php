<?php
include "../config/koneksi.php";

$galeri_edit = array('nama' => '', 'foto' => '', 'keterangan' => '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $galeri_ambil = mysqli_query($koneksi, "SELECT * FROM tb_galeri WHERE id='$id'")
        or die(mysqli_error($koneksi));
    $galeri_edit = mysqli_fetch_array($galeri_ambil);
} else {
    $galeri_edit = array();
}
?>

<div class="container">
<form action="galeri_proses.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($galeri_edit['id'])): ?>
        <input type="hidden" name="status" value="edit">
        <input type="hidden" name="id" value="<?= $galeri_edit['id']; ?>">
    <?php else: ?>
        <input type="hidden" name="status" value="tambah">
    <?php endif; ?>

    <table align="center">
        <tr>
            <td colspan="3" align="center">
                <h3>Data galeri</h3>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama" value="<?= @$galeri_edit['nama']; ?>"></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td> 
                <?php if (!empty($galeri_edit['foto'])): ?>
                    <img src="<?php echo $galeri_edit['foto']; ?>" width="100" height="100"><br>
                    <input type="file" name="foto"><br>
                    <input type="checkbox" name="centang_galeri" value="1"> Centang jika ingin ganti foto
                <?php else: ?>
                    <input type="file" name="foto">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><textarea type="text" name="keterangan" value="<?= @$galeri_edit['keterangan']; ?>"></textarea></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=galeri_tampil'">
            </td>
        </tr>
    </table>
</form>
</div>