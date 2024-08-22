<?php
include('../config/koneksi.php');
include('header.php');
?>

<!-- CSS Daerah -->
<link rel="stylesheet" href="css/daerah.css" />

<!-- Daerah -->
<div class="bodyDaerah">
    <section class="daerah">
        <h1>Sejarah Makassar</h1>

        <div class="daerah-container">
            <?php
            include "../config/koneksi.php";
            $tampil_daerah = mysqli_query($koneksi, "SELECT * FROM tb_daerah ORDER BY id_daerah");
            while ($hasil = mysqli_fetch_array($tampil_daerah)) {
                echo "<div class='daerah'>";
                echo "<h2>$hasil[kota] - $hasil[provinsi]</h2>";
                echo "<div class='sejarah'<p><ul type='none'>";
                $asal_sejarah = explode("\n", $hasil['asal_sejarah']);
                foreach ($asal_sejarah as $sejarah) {
                    $sejarah = str_replace('. ', "<br/>", $sejarah);
                    echo "<li>$sejarah</li>";
                }
                echo "</ul></p></div>";
                echo "<h4 style='color: #113946;'>Galeri</h4>";
                echo "<div class='dokum'>";
                echo "<figure class='image-container'>";
                echo "<img src='{$hasil['foto_monumen']}' alt='Foto Monumen' class='gambar'>";
                echo "<figcaption>{$hasil['nama_monumen']}</figcaption>";
                echo "</figure>";
                echo "<figure class='image-container'>";
                echo "<img src='{$hasil['foto_bajuadat']}' alt='Foto Baju Adat' class='gambar'>";
                echo "<figcaption>{$hasil['nama_bajuadat']}</figcaption>";
                echo "</figure>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</div>

<?php include('footer.php'); ?>