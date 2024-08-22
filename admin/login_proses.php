<?php
    session_start();
    include"../config/koneksi.php";
    $id_pengelola = $_POST['id_pengelola'];
    $password = md5($_POST['password']);
    $login = mysqli_query($koneksi,"SELECT * FROM tb_pengelola WHERE id_pengelola = '$id_pengelola' AND password = '$password'");
    $jumlah_login = mysqli_num_rows($login);
    if($jumlah_login == 0){
        echo "<script>alert('Login Gagal')</script>";
    } else{
        $data_login = mysqli_fetch_array($login);
        $_SESSION["id_pengelola"] = $data_login["id_pengelola"];
        $_SESSION["nama_pengelola"] = $data_login["nama_pengelola"];
        $_SESSION["foto_pengelola"] = $data_login["foto_pengelola"];
        echo "<script>alert('Login Berhasil')</script>";
    }
?>
<meta http-equiv="refresh" content="0; URL=index.php">