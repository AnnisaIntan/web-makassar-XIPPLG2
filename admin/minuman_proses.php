<?php
include "../config/koneksi.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $id_minuman = $_POST['id_minuman'];
        $nama_minuman = $_POST['nama_minuman'];
        $sejarah_minuman = $_POST['sejarah_minuman'];
        $bahan_bahan = $_POST['bahan_bahan'];
        $langkah_langkah = $_POST['langkah_langkah'];
    
        $minuman_foto = $_FILES['foto']['tmp_name'];
        $simpan_foto = "../foto/" . $_FILES['foto']['name'];
        move_uploaded_file($minuman_foto, $simpan_foto);
    
        $minuman_tambah = mysqli_query($koneksi, "INSERT INTO tb_minuman (id_minuman, nama_minuman, sejarah_minuman, bahan_bahan, langkah_langkah, foto_minuman) VALUES 
        ('$id_minuman', '$nama_minuman', '$sejarah_minuman', '$bahan_bahan', '$langkah_langkah', '$simpan_foto')");
    
        if($minuman_tambah) {
            echo "<script>alert('Tambah Data Minuman Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Minuman Gagal')</script>";
        }
        break;
    
    case 'edit':
        $id_minuman = $_POST['id_minuman'];
        $nama_minuman = $_POST['nama_minuman'];
        $sejarah_minuman = $_POST['sejarah_minuman'];
        $bahan_bahan = $_POST['bahan_bahan'];
        $langkah_langkah = $_POST['langkah_langkah'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        $existing_foto_minuman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_minuman FROM tb_minuman WHERE id_minuman = '$id_minuman'"))['foto_minuman'];

        if ($centang == '1') {
            $minuman_foto = $_FILES['foto']['tmp_name'];
            $simpan_foto = "../foto/" . $_FILES['foto']['name'];
            move_uploaded_file($minuman_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_minuman;
        }

        $minuman_edit = mysqli_query($koneksi,"UPDATE tb_minuman SET
        nama_minuman='$nama_minuman',
        sejarah_minuman = '$sejarah_minuman',
        bahan_bahan = '$bahan_bahan', 
        langkah_langkah = '$langkah_langkah',
        foto_minuman = '$simpan_foto'
        WHERE id_minuman='$id_minuman'");

        if($minuman_edit) {
            echo "<script>alert('Edit Data Minuman Berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Minuman Gagal')</script>";
        }
        break;

    default:
        $id_minuman = $_GET['id_minuman'];
        $minuman_hapus = mysqli_query($koneksi, "DELETE FROM tb_minuman WHERE id_minuman = '$id_minuman'");
        if($minuman_hapus) {
            echo "<script>alert('Hapus Data Minuman Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Minuman Gagal')</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=minuman_tampil">