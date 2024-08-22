<?php
include "../config/koneksi.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $nama = $_POST['nama'];
        
        $galeri_foto = $_FILES['foto']['tmp_name'];
        $simpan_foto = "../foto/" . $_FILES['foto']['name'];
        move_uploaded_file($galeri_foto, $simpan_foto);
        
        $keterangan = $_POST['keterangan'];

        $galeri_tambah = mysqli_query($koneksi, "INSERT INTO tb_galeri (nama, foto, keterangan) VALUES 
        ('$nama', '$simpan_foto', '$keterangan')");

        if($galeri_tambah) {
            echo "<script>alert('Tambah Data Galeri Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Galeri Gagal')</script>";
        }
        break;
        
    case 'edit':
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        
        $centang_galeri = isset($_POST['centang_galeri']) ? $_POST['centang_galeri'] : '';
        
        $existing_foto = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM tb_galeri WHERE id = '$id'"))['foto'];
        
        if ($centang_galeri == '1' && !empty($_FILES['foto']['name'])) {
            $foto = $_FILES['foto']['tmp_name'];
            $simpan_foto = "../foto/" . $_FILES['foto']['name'];
            move_uploaded_file($foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto;
        }

        $keterangan = $_POST['keterangan'];
        
        $galeri_edit = mysqli_query($koneksi,"UPDATE tb_galeri SET 
        id = '$id',
        nama = '$nama',
        foto = '$simpan_foto',
        keterangan = '$keterangan'
        WHERE id ='$id'");
    
        if ($galeri_edit) {
            echo "<script>alert ('Edit Data Galeri Berhasil')</script>";
        } else {
            echo "<script>alert ('Edit Data Galeri Gagal: " . mysqli_error($koneksi) . "')</script>";
        }
        break;

    default:
        $id = $_GET['id'];
        $galeri_hapus = mysqli_query($koneksi, "DELETE FROM tb_galeri WHERE id = '$id'");
        if($galeri_hapus) {
            echo "<script>alert('Hapus Data Galeri Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Galeri Gagal')</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=galeri_tampil">
