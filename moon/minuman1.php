<?php
include_once("../config/koneksi.php");
include_once("header.php");
?>

<h1>Minuman Khas Makassar</h1>

<div class="bodyIsi">
    <div class="card-container">
        <?php
        include "../config/koneksi.php";
        $tampil_minuman = mysqli_query($koneksi, "SELECT * FROM tb_minuman ORDER BY id_minuman");
        while ($hasil = mysqli_fetch_assoc($tampil_minuman)) {
        ?>
            <div class="card" onclick="showDetail(<?php echo $hasil['id_minuman']; ?>)">
                <img src='<?php echo $hasil["foto_minuman"]; ?>' alt='Foto minuman'>
                <h2><?php echo $hasil["nama_minuman"]; ?></h2>
                <p><?php echo substr($hasil["sejarah_minuman"], 0, 100); ?>...</p>
                <div class="actions">
                    <button onclick="event.stopPropagation(); showDetail(<?php echo $hasil['id_minuman']; ?>)">Detail</button>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()"></span>
        <div id="modalBody"></div>
    </div>
</div>

<script>
    function showDetail(id) {
        var modal = document.getElementById("detailModal");
        var modalBody = document.getElementById("modalBody");

        fetch('minuman2.php?id_minuman=' + id)
            .then(response => response.text())
            .then(data => {
                modalBody.innerHTML = data;
                modal.style.display = "flex";
            });
    }

    function closeModal() {
        var modal = document.getElementById("detailModal");
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById("detailModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<link rel="stylesheet" href="./css/display.css">

<?php include_once("footer.php"); ?>