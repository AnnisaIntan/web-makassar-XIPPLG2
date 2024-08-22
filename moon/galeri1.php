<?php
include_once("../config/koneksi.php");
include_once("header.php");
?>

<h1>Galeri-galeri</h1>

<div class="bodyIsi">
    <div class="card-container">
        <?php
        $tampil_galeri = mysqli_query($koneksi, "SELECT * FROM tb_galeri ORDER BY id");
        while ($hasil = mysqli_fetch_assoc($tampil_galeri)) {
        ?>
            <div class="card" onclick="showDetail(<?php echo $hasil['id']; ?>)">
                <img src='<?php echo $hasil["foto"]; ?>' alt='Foto'>
                <h2><?php echo $hasil["nama"]; ?></h2>
                <div class="actions">
                    <button onclick="event.stopPropagation(); showDetail(<?php echo $hasil['id']; ?>)">Detail</button>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalBody"></div>
    </div>
</div>

<script>
    function showDetail(id) {
        var modal = document.getElementById("detailModal");
        var modalBody = document.getElementById("modalBody");

        fetch('galeri2.php?id=' + id)
            .then(response => response.text())
            .then(data => {
                modalBody.innerHTML = data;
                modal.style.display = "flex";
            });
    }

    function closeModal() {
        var modal = document.querySelector(".modal");
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.querySelector(".modal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<link rel="stylesheet" href="./css/display.css">

<?php include_once("footer.php"); ?>