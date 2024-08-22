<?php
include "../config/koneksi.php";

$ceo_edit = array('nama' => '', 'jabatan' => '', 'biodata' => '', 'foto_editor' => '');

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $ceo_ambil = mysqli_query($koneksi, "SELECT * FROM tb_profil WHERE nama='$nama'")
        or die(mysqli_error($koneksi));
    $ceo_edit = mysqli_fetch_array($ceo_ambil);
} else {
    $ceo_edit = array();
}
?>

<div class="container">
<form action="ceo_proses.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($ceo_edit['nama'])): ?>
        <input type="hidden" name="status" value="edit">
        <input type="hidden" name="nama" value="<?= $ceo_edit['nama']; ?>">
    <?php else: ?>
        <input type="hidden" name="status" value="tambah">
    <?php endif; ?>

    <table align="center">
        <tr>
            <td colspan="3" align="center">
                <h3>Data Editor</h3>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama" value="<?= @$ceo_edit['nama']; ?>"></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="jabatan" value="<?= @$ceo_edit['jabatan']; ?>"></td>
        </tr>
        <tr>
            <td>Biodata</td>
            <td>:</td>
            <td><textarea name="biodata"><?php echo @$ceo_edit['biodata']; ?></textarea></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td> 
                <?php if (!empty($ceo_edit['foto_editor'])): ?>
                    <img src="<?php echo $ceo_edit['foto_editor']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang_ceo" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_editor">
                <?php else: ?>
                    <input type="file" name="foto_editor">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=ceo_tampil'">
            </td>
        </tr>
    </table>
</form>
</div>