<?php
    include "../config/koneksi.php";
    //untuk menampilkan data yang dipilih kedalam textbox
    if (isset($_GET['id_pengelola'])){
        //mengambil data sesuai yang diklik oleh user
        $pengelola_ambil = mysqli_query($koneksi, "SELECT * FROM tb_pengelola WHERE id_pengelola='$_GET[id_pengelola]'")
        or die (mysqli_error());
        $pengelola_edit = mysqli_fetch_array($pengelola_ambil);
    }
?>

<form action="pengelola_proses.php" method="post"  enctype="multipart/form-data">
    <?php
        if(isset($_GET['id_pengelola']))
        {
            echo"<input type='hidden' name='status' value='edit'>";
        } else{
            echo"<input type='hidden' name='status' value='tambah'>";
        }
    ?>
    <table align="center">
        <tr><td><br><br></td></tr>
        <tr>
            <td colspan="3" align="center">
                <H3>Data Pengelola</H3>
            </td>
        </tr>
        <tr>
            <td>Id/Username</td>
            <td> : </td>
            <td><input type="text" maxlength="50" size="50" name="id_pengelola" value="<?php echo @$pengelola_edit['id_pengelola'];?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> : </td>
            <td><input type="text" maxlength="50" size="50" name="nama_pengelola" value="<?php echo @$pengelola_edit['nama_pengelola'];?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> : </td>
            <td><input type="password" maxlength="11" size="11" name="password" value="<?php echo @$pengelola_edit['password'];?>"></td>
        </tr>
        
        <tr>
            <td>Foto</td>
            <td> : </td>
            <td>
                <?php if (!empty($pengelola_edit['foto_pengelola'])): ?>
                    <img src="<?= $pengelola_edit['foto_pengelola']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_pengelola">
                <?php else: ?>
                    <input type="file" name="foto_pengelola">
                <?php endif; ?>
            </td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL" onclick="window.location.href='index.php?page=pengelola'">
            </td>
        </tr>
    </table>
</form>