<?php
include "../config/koneksi.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $id_makanan = $_POST['id_makanan'];
        $nama_makanan = $_POST['nama_makanan'];
        $sejarah_makanan = $_POST['sejarah_makanan'];
        $bahan_bahan = $_POST['bahan_bahan'];
        $langkah_langkah = $_POST['langkah_langkah'];

        $makanan_foto = $_FILES['foto']['tmp_name'];
        $simpan_foto = "../foto/" . $_FILES['foto']['name'];
        move_uploaded_file($makanan_foto, $simpan_foto);

        $makanan_tambah = mysqli_query($koneksi, "INSERT INTO tb_makanan (id_makanan, nama_makanan, sejarah_makanan, bahan_bahan, langkah_langkah, foto_makanan) VALUES 
        ('$id_makanan', '$nama_makanan', '$sejarah_makanan', '$bahan_bahan', '$langkah_langkah', '$simpan_foto')");

        if($makanan_tambah) {
            echo "<script>alert('Tambah Data Makanan Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Makanan Gagal')</script>";
        }
        break;

    case 'edit':
        $id_makanan = $_POST['id_makanan'];
        $nama_makanan = $_POST['nama_makanan'];
        $sejarah_makanan = $_POST['sejarah_makanan'];
        $bahan_bahan = $_POST['bahan_bahan'];
        $langkah_langkah = $_POST['langkah_langkah'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        $existing_foto_makanan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_makanan FROM tb_makanan WHERE id_makanan = '$id_makanan'"))['foto_makanan'];

        if ($centang == '1') {
            $makanan_foto = $_FILES['foto']['tmp_name'];
            $simpan_foto = "../foto/" . $_FILES['foto']['name'];
            move_uploaded_file($makanan_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_makanan;
        }

        $makanan_edit = mysqli_query($koneksi,"UPDATE tb_makanan SET
        nama_makanan='$nama_makanan',
        sejarah_makanan = '$sejarah_makanan',
        bahan_bahan = '$bahan_bahan', 
        langkah_langkah = '$langkah_langkah',
        foto_makanan = '$simpan_foto'
        WHERE id_makanan='$id_makanan'");

        if($makanan_edit) {
            echo "<script>alert('Edit Data Makanan Berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Makanan Gagal')</script>";
        }
        break;

    default:
        $id_makanan = $_GET['id_makanan'];
        $makanan_hapus = mysqli_query($koneksi, "DELETE FROM tb_makanan WHERE id_makanan = '$id_makanan'");
        if($makanan_hapus) {
            echo "<script>alert('Hapus Data Makanan Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Makanan Gagal')</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=makanan_tampil">