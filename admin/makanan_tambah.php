<?php
include "../config/koneksi.php";

if (isset($_GET['id_makanan'])) {
    $id_makanan = $_GET['id_makanan'];
    $makanan_ambil = mysqli_query($koneksi, "SELECT * FROM tb_makanan WHERE id_makanan='$id_makanan'")
        or die(mysqli_error($koneksi));
    $makanan_edit = mysqli_fetch_array($makanan_ambil);
} else {
    $makanan_edit = array();
}
?>

<div class="container">
<form action="makanan_proses.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($makanan_edit['id_makanan'])): ?>
        <input type="hidden" name="status" value="edit">
        <input type="hidden" name="id_makanan" value="<?= $makanan_edit['id_makanan']; ?>">
    <?php else: ?>
        <input type="hidden" name="status" value="tambah">
    <?php endif; ?>

    <table align="center">
        <tr>
            <td colspan="3" align="center">
                <h3>Data Makanan</h3>
            </td>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama_makanan" value="<?= @$makanan_edit['nama_makanan']; ?>"></td>
        </tr>
        <tr>
            <td>Sejarah Makanan</td>
            <td>:</td>
            <td><textarea name="sejarah_makanan"><?php echo @$makanan_edit['sejarah_makanan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Bahan Makanan</td>
            <td>:</td>
            <td><textarea name="bahan_bahan" cols="50" rows="5"><?php echo @$makanan_edit['bahan_bahan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Langkah Langkah</td>
            <td> : </td>
            <td><textarea name="langkah_langkah" cols="50" rows="5"><?php echo @$makanan_edit['langkah_langkah'];?></textarea></td>
        </tr>
        <tr>
            <td>Foto Makanan</td>
            <td>:</td>
            <td>
                <?php if (!empty($makanan_edit['foto_makanan'])): ?>
                    <img src="<?= $makanan_edit['foto_makanan']; ?>" width="100" height="100"><br>
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
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=makanan_tampil'">
            </td>
        </tr>
    </table>
</form>
</div>