<?php
include "../config/koneksi.php";

$daerah_edit = array('provinsi' => '', 'kota' => '', 'asal_sejarah' => '', 'foto_monumen' => '', 'foto_bajuadat' => '');

if (isset($_GET['id_daerah'])) {
    $id_daerah = $_GET['id_daerah'];
    $daerah_ambil = mysqli_query($koneksi, "SELECT * FROM tb_daerah WHERE id_daerah='$id_daerah'")
        or die(mysqli_error($koneksi));
    $daerah_edit = mysqli_fetch_array($daerah_ambil);
} else {
    $daerah_edit = array();
}
?>

<div class="container">
<form action="daerah_proses.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($daerah_edit['id_daerah'])): ?>
        <input type="hidden" name="status" value="edit">
        <input type="hidden" name="id_daerah" value="<?= $daerah_edit['id_daerah']; ?>">
    <?php else: ?>
        <input type="hidden" name="status" value="tambah">
    <?php endif; ?>

    <table align="center">
        <tr>
            <td colspan="3" align="center">
                <h3>Data Daerah</h3>
            </td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="provinsi" value="<?= @$daerah_edit['provinsi']; ?>"></td>
        </tr>
        <tr>
            <td>Kota</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="kota" value="<?= @$daerah_edit['kota']; ?>"></td>
        </tr>
        <tr>
            <td>Sejarah</td>
            <td>:</td>
            <td><textarea name="asal_sejarah"><?php echo @$daerah_edit['asal_sejarah']; ?></textarea></td>
        </tr>
        <tr>
            <td>Foto Monumen</td>
            <td>:</td>
            <td>  
                <?php if (!empty($daerah_edit['foto_monumen'])): ?>
                    <img src="<?php echo $daerah_edit['foto_monumen']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang_monumen" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_monumen">
                <?php else: ?>
                    <input type="file" name="foto_monumen">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Foto Baju Adat</td>
            <td>:</td>
            <td> 
                <?php if (!empty($daerah_edit['foto_bajuadat'])): ?>
                    <img src="<?php echo $daerah_edit['foto_bajuadat']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang_bajuadat" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_bajuadat">
                <?php else: ?>
                    <input type="file" name="foto_bajuadat">
                <?php endif; ?>
            </td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=daerah_tampil'">
            </td>
        </tr>
    </table>
</form>
</div>