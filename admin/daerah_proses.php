<?php
include "../config/koneksi.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota']; 
        $asal_sejarah = $_POST['asal_sejarah'];

        $monumen_foto = $_FILES['foto_monumen']['tmp_name'];
        $simpan_foto_monumen = "../foto/" . $_FILES['foto_monumen']['name'];
        move_uploaded_file($monumen_foto, $simpan_foto_monumen);

        $bajuadat_foto = $_FILES['foto_bajuadat']['tmp_name'];
        $simpan_foto_bajuadat = "../foto/" . $_FILES['foto_bajuadat']['name'];
        move_uploaded_file($bajuadat_foto, $simpan_foto_bajuadat);

        $daerah_tambah = mysqli_query($koneksi, "INSERT INTO tb_daerah (provinsi, kota, asal_sejarah, foto_monumen, foto_bajuadat) VALUES 
        ('$provinsi', '$kota', '$asal_sejarah', '$simpan_foto_monumen', '$simpan_foto_bajuadat')");

        if($daerah_tambah) {
            echo "<script>alert('Tambah Data Daerah Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Daerah Gagal')</script>";
        }
        break;
        
    case 'edit':
        $id_daerah = $_POST['id_daerah'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $asal_sejarah = $_POST['asal_sejarah'];
        $centang_monumen = isset($_POST['centang_monumen']) ? $_POST['centang_monumen'] : '';
        $centang_bajuadat = isset($_POST['centang_bajuadat']) ? $_POST['centang_bajuadat'] : '';
    
        // Fetch existing photo paths
        $result = mysqli_query($koneksi, "SELECT foto_monumen, foto_bajuadat FROM tb_daerah WHERE id_daerah = '$id_daerah'");
        if ($row = mysqli_fetch_assoc($result)) {
            $existing_foto_monumen = $row['foto_monumen'];
            $existing_foto_bajuadat = $row['foto_bajuadat'];
        } else {
            // Handle if no record found, though in a proper flow this should not happen.
            echo "<script>alert('Data Daerah tidak ditemukan')</script>";
            break;
        }
    
        // Handle foto_monumen update
        $simpan_foto_monumen = $existing_foto_monumen;
        if ($centang_monumen == '1' && !empty($_FILES['foto_monumen']['name'])) {
            $foto_monumen = $_FILES['foto_monumen']['tmp_name'];
            $simpan_foto_monumen = "../foto/" . $_FILES['foto_monumen']['name'];
            move_uploaded_file($foto_monumen, $simpan_foto_monumen);
        }
    
        // Handle foto_bajuadat update
        $simpan_foto_bajuadat = $existing_foto_bajuadat;
        if ($centang_bajuadat == '1' && !empty($_FILES['foto_bajuadat']['name'])) {
            $foto_bajuadat = $_FILES['foto_bajuadat']['tmp_name'];
            $simpan_foto_bajuadat = "../foto/" . $_FILES['foto_bajuadat']['name'];
            move_uploaded_file($foto_bajuadat, $simpan_foto_bajuadat);
        }
    
        // Update the database
        $daerah_edit = mysqli_query($koneksi, "UPDATE tb_daerah SET 
            provinsi = '$provinsi',
            kota = '$kota',
            asal_sejarah = '$asal_sejarah',
            foto_monumen = '$simpan_foto_monumen',
            foto_bajuadat = '$simpan_foto_bajuadat'
            WHERE id_daerah = '$id_daerah'");
    
        if ($daerah_edit) {
            echo "<script>alert ('Edit Data Daerah Berhasil')</script>";
        } else {
            echo "<script>alert ('Edit Data Daerah Gagal: " . mysqli_error($koneksi) . "')</script>";
        }
        break;        

    default:
        $id_daerah = $_GET['id_daerah'];
        $daerah_hapus = mysqli_query($koneksi, "DELETE FROM tb_daerah WHERE id_daerah = '$id_daerah'");
        if($daerah_hapus) {
            echo "<script>alert('Hapus Data Daerah Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Daerah Gagal')</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=daerah_tampil">