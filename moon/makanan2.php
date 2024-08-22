<?php
include "../config/koneksi.php";

$makanan_info = array('nama_makanan' => '', 'sejarah_makanan' => '', 'bahan_bahan' => '', 'langkah_langkah' => '', 'foto_makanan' => '');

if (isset($_GET['id_makanan'])) {
    $makanan_id = $_GET['id_makanan'];
    $makanan_ambil = mysqli_query($koneksi, "SELECT * FROM tb_makanan WHERE id_makanan='$makanan_id'")
        or die(mysqli_error($koneksi));
    $makanan_info = mysqli_fetch_array($makanan_ambil);
}
?>

<div class="modal" id="makanan-modal">
    <div class="modal-container">
        <span class="close-icon" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <?php if (!empty($makanan_info['foto_makanan'])): ?>
                <img src="<?php echo $makanan_info['foto_makanan']; ?>" alt="Foto Makanan">
            <?php else: ?>
                <p>Tidak ada foto makanan tersedia</p>
            <?php endif; ?>

            <div>
                <h3>Detail Makanan</h3>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $makanan_info['nama_makanan']; ?></td>
                    </tr>
                    <tr>
                        <td>Sejarah</td>
                        <td>:</td>
                        <td><?php echo $makanan_info['sejarah_makanan']; ?></td>
                    </tr>
                    <tr>
                        <td>Bahan-Bahan</td>
                        <td>:</td>
                        <td>
                            <ul>
                                <?php 
                                $bahan_bahan = explode("\n", $makanan_info['bahan_bahan']);
                                foreach ($bahan_bahan as $bahan) {
                                    echo "<li>$bahan</li>";
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Langkah-Langkah</td>
                        <td>:</td>
                        <td>
                            <ol>
                                <?php 
                                $langkah_langkah = explode("\n", $makanan_info['langkah_langkah']);
                                foreach ($langkah_langkah as $langkah) {
                                    echo "<li>$langkah</li>";
                                }
                                ?>
                            </ol>
                        </td>
                    </tr>
                </table>
                <br>
                <a href="makanan1.php" class='button-6' role='button'>Kembali</a>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="./css/modal.css">

<script>
function closeModal() {
    var modal = document.querySelector(".modal");
    modal.style.display = "none";
}
</script>
