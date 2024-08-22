<?php
include "../config/koneksi.php";

$minuman_info = array('nama_minuman' => '', 'sejarah_minuman' => '', 'bahan_bahan' => '', 'langkah_langkah' => '', 'foto_minuman' => '');

if (isset($_GET['id_minuman'])) {
    $minuman_id = $_GET['id_minuman'];
    $minuman_ambil = mysqli_query($koneksi, "SELECT * FROM tb_minuman WHERE id_minuman='$minuman_id'")
        or die(mysqli_error($koneksi));
    $minuman_info = mysqli_fetch_array($minuman_ambil);
}
?>

<div class="modal" id="minuman-modal">
    <div class="modal-container">
        <span class="close-icon" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <?php if (!empty($minuman_info['foto_minuman'])): ?>
                <img src="<?php echo $minuman_info['foto_minuman']; ?>" alt="Foto minuman">
            <?php else: ?>
                <p>Tidak ada foto minuman tersedia</p>
            <?php endif; ?>

            <div>
                <h3>Detail Minuman</h3>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $minuman_info['nama_minuman']; ?></td>
                    </tr>
                    <tr>
                        <td>Sejarah</td>
                        <td>:</td>
                        <td><?php echo $minuman_info['sejarah_minuman']; ?></td>
                    </tr>
                    <tr>
                        <td>Bahan-Bahan</td>
                        <td>:</td>
                        <td>
                            <ul>
                                <?php 
                                $bahan_bahan = explode("\n", $minuman_info['bahan_bahan']);
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
                                $langkah_langkah = explode("\n", $minuman_info['langkah_langkah']);
                                foreach ($langkah_langkah as $langkah) {
                                    echo "<li>$langkah</li>";
                                }
                                ?>
                            </ol>
                        </td>
                    </tr>
                </table>
                <br>
                <a href="minuman1.php" class='button-6' role='button'>Kembali</a>
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