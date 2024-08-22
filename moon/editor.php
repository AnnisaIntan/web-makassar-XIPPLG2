<?php
include_once("../config/koneksi.php");
include_once("header.php");
?>

<h1>Profil Kami</h1>

<div class="bodyIsi">
    <div class="card-container">
        <?php
        $tampil_profil = mysqli_query($koneksi, "SELECT * FROM tb_profil ORDER BY nama");
        while ($hasil = mysqli_fetch_assoc($tampil_profil)) {
        ?>
            <div class="card" onclick="showDetail(<?php echo $hasil['nama']; ?>)">
                <img src='<?php echo $hasil["foto_editor"]; ?>' alt='Foto'>
                <h2 style="text-align: center;"><?php echo $hasil["nama"]; ?></h2>
                <h3 style="text-align: center;"><?php echo $hasil["jabatan"]; ?></h3>
                <hr style="margin: 1rem 0;">
                <p><?php echo $hasil["biodata"]; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<link rel="stylesheet" href="./css/display.css">

<?php include_once("footer.php"); ?>