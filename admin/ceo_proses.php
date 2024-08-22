<?php
include "../config/koneksi.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $biodata = $_POST['biodata'];

        $ceo_foto = $_FILES['foto_editor']['tmp_name'];
        $simpan_foto_editor = "../foto/" . $_FILES['foto_editor']['name'];
        move_uploaded_file($ceo_foto, $simpan_foto_editor);

        $ceo_tambah = mysqli_query($koneksi, "INSERT INTO tb_profil (nama, jabatan, biodata, foto_editor) VALUES 
        ( '$nama', '$jabatan', '$biodata', '$simpan_foto_editor')");

        if($ceo_tambah) {
            echo "<script>alert('Tambah Data Editor Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Editor Gagal')</script>";
        }
        break;
        
    case 'edit':
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $biodata = $_POST['biodata'];

        $centang_ceo = isset($_POST['centang_ceo']) ? $_POST['centang_ceo'] : '';
    
        $existing_foto_editor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_editor FROM tb_profil WHERE nama = '$nama'"))['foto_editor'];
    
        $simpan_foto_editor = $existing_foto_editor;
        if ($centang_ceo == '1' && !empty($_FILES['foto_editor']['name'])) {
            $foto_editor = $_FILES['foto_editor']['tmp_name'];
            $simpan_foto_editor = "../foto/" . $_FILES['foto_editor']['name'];
            move_uploaded_file($foto_editor, $simpan_foto_editor);
        } else {
            $simpan_foto = $existing_foto_editor;
        }

        $ceo_edit = mysqli_query($koneksi,"UPDATE tb_profil SET 
        jabatan = '$jabatan',
        biodata = '$biodata',
        foto_editor = '$simpan_foto_editor'
        WHERE nama ='$nama'");
        
        if ($ceo_edit) {
            echo "<script>alert ('Edit Data Editor Berhasil')</script>";
        } else {
            echo "<script>alert ('Edit Data Editor Gagal: " . mysqli_error($koneksi) . "')</script>";
        }
        break;

    default:
        $nama = $_GET['nama'];
        $ceo_hapus = mysqli_query($koneksi, "DELETE FROM tb_profil WHERE nama = '$nama'");
        if($ceo_hapus) {
            echo "<script>alert('Hapus Data Editor Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Editor Gagal')</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=ceo_tampil">