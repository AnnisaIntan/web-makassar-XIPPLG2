<?php
    include "../config/koneksi.php";

    $status = isset($_POST['status']) ? $_POST['status'] : '';

    switch($status){
        case 'tambah';
        $id_pengelola = $_POST['id_pengelola'];
        $nama_pengelola = $_POST['nama_pengelola'];
        $password = md5($_POST['password']);
        //foto
        $pengelola_foto = $_FILES['foto_pengelola']['tmp_name'];
        $simpan_foto = "../foto/" . $_FILES['foto_pengelola']['name'];
        move_uploaded_file($pengelola_foto, $simpan_foto);

        $pengelola_tambah = mysqli_query($koneksi, "INSERT INTO tb_pengelola (id_pengelola, nama_pengelola, password, foto_pengelola) VALUES 
        ('$id_pengelola', '$nama_pengelola', '$password', '$simpan_foto')");

        if($pengelola_tambah==true){
            echo "<script>alert ('Tambah Data Pengelola Berhasil')</script>";
        } else{
            echo "<script>alert ('Tambah Data Pengelola Gagal')</script>";
        }
    break;

    case 'edit';
        $id_pengelola = $_POST['id_pengelola'];
        $nama_pengelola = $_POST['nama_pengelola'];
        $password = md5($_POST['password']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        $existing_foto_pengelola = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_pengelola FROM tb_pengelola WHERE id_pengelola = '$id_pengelola'"))['foto_pengelola'];

        if ($centang == '1') {
            $pengelola_foto = $_FILES['foto_pengelola']['tmp_name'];
            $simpan_foto = "../foto/" . $_FILES['foto_pengelola']['name'];
            move_uploaded_file($pengelola_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_pengelola;
        }

        $pengelola_edit = mysqli_query($koneksi,"UPDATE tb_pengelola SET
        nama_pengelola='$nama_pengelola',
        password = '$password',
        foto_pengelola = '$simpan_foto'
        WHERE id_pengelola='$id_pengelola'");

        if($pengelola_edit) {
            echo "<script>alert('Edit Data Pengelola Berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Pengelola Gagal')</script>";
        }
    break;

    default;
        $id_pengelola = $_GET['id_pengelola'];
        $pengelola_hapus = mysqli_query($koneksi, "DELETE FROM tb_pengelola WHERE id_pengelola = '$id_pengelola'");
        if($pengelola_hapus==true){
            echo "<script>alert ('Hapus Data Pengelola Berhasil')</script>";
        } else{
            echo "<script>alert ('Hapus Data Pengelola Gagal')</script>";
        }
    break;
    }
?>
<meta http-equiv="refresh" content="0; index.php?page=pengelola_tampil">