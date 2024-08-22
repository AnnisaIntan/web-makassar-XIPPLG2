<?php
include_once("../config/koneksi.php");

$galeri_info = array('nama' => '', 'keterangan' => '', 'foto' => '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $galeri_ambil = mysqli_query($koneksi, "SELECT * FROM tb_galeri WHERE id='$id'")
        or die(mysqli_error($koneksi));
    $galeri_info = mysqli_fetch_array($galeri_ambil);
}
?>

<div class="modal" id="galeri-modal">
    <div class="modal-container">
        <span class="close-icon" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <?php if (!empty($galeri_info['foto'])): ?>
                <img src="<?php echo $galeri_info['foto']; ?>" alt="Foto">
            <?php else: ?>
                <p>Tidak ada foto tersedia</p>
            <?php endif; ?>

            <div>
                <h3>Detail</h3>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $galeri_info['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?php echo $galeri_info['keterangan']; ?></td>
                    </tr>
                </table>
                <br>
                <a href="galeri1.php" class='button-6' role='button'>Kembali</a>
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