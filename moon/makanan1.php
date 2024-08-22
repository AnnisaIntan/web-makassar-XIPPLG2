<?php
include_once("../config/koneksi.php");
?>
<?php include_once("header.php") ?>

<h1>Makanan Khas Makassar</h1>

<div class="bodyIsi">
    <div class="card-container">
        <?php
        include "../config/koneksi.php";
        $tampil_makanan = mysqli_query($koneksi, "SELECT * FROM tb_makanan ORDER BY id_makanan");
        while ($hasil = mysqli_fetch_assoc($tampil_makanan)) {
        ?>
            <div class="card" onclick="showDetail(<?php echo $hasil['id_makanan']; ?>)">
                <img src='<?php echo $hasil["foto_makanan"]; ?>' alt='Foto Makanan'>
                <h2><?php echo $hasil["nama_makanan"]; ?></h2>
                <p><?php echo substr($hasil["sejarah_makanan"], 0, 100); ?>...</p>
                <div class="actions">
                    <button onclick="event.stopPropagation(); showDetail(<?php echo $hasil['id_makanan']; ?>)">Detail</button>
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

        fetch('makanan2.php?id_makanan=' + id)
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

<?php include_once("footer.php") ?>