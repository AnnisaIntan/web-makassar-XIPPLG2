<?php
include "../config/koneksi.php";

if (isset($_GET['id_minuman'])) {
    $id_minuman = $_GET['id_minuman'];
    $minuman_ambil = mysqli_query($koneksi, "SELECT * FROM tb_minuman WHERE id_minuman='$id_minuman'")
        or die(mysqli_error($koneksi));
    $minuman_edit = mysqli_fetch_array($minuman_ambil);
} else {
    $minuman_edit = array();
}
?>

<div class="container">
<form action="minuman_proses.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($minuman_edit['id_minuman'])): ?>
        <input type="hidden" name="status" value="edit">
        <input type="hidden" name="id_minuman" value="<?= $minuman_edit['id_minuman']; ?>">
    <?php else: ?>
        <input type="hidden" name="status" value="tambah">
    <?php endif; ?>

    <table align="center">
        <tr>
            <td colspan="3" align="center">
                <h3>Data Minuman</h3>
            </td>
        </tr>
        <tr>
            <td>Nama Minuman</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama_minuman" value="<?= @$minuman_edit['nama_minuman']; ?>"></td>
        </tr>
        <tr>
            <td>Sejarah Minuman</td>
            <td>:</td>
            <td><textarea name="sejarah_minuman"><?php echo @$minuman_edit['sejarah_minuman']; ?></textarea></td>
        </tr>
        <tr>
            <td>Bahan Minuman</td>
            <td>:</td>
            <td><textarea name="bahan_bahan"><?php echo @$minuman_edit['bahan_bahan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Langkah-Langkah</td>
            <td>:</td>
            <td><textarea name="langkah_langkah"><?php echo @$minuman_edit['langkah_langkah']; ?></textarea></td>
        </tr>
        <tr>
            <td>Foto Minuman</td>
            <td>:</td>
            <td>
                <?php if (!empty($minuman_edit['foto_minuman'])): ?>
                    <img src="<?= $minuman_edit['foto_minuman']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto">
                <?php else: ?>
                    <input type="file" name="foto">
                <?php endif; ?>
            </td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=minuman_tampil'">
            </td>
        </tr>
    </table>
</form>
</div>