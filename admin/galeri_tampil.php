<h1>Galeri Makassar</h1>
<div class="button">
  <?php
    echo "<button><a href='index.php?page=galeri_tambah'>Tambah Data</a></button>";
  ?>
</div>

<table>
    <tr class="kepala">
    <td width="10%">No</td>
    <td width="20%">Nama</td>
    <td width="30%">Foto</td>
    <td width="20%">Keterangan</td>
        <td width="20%" colspan="2">Aksi</td>
    </tr>
    <?php
        include "../config/koneksi.php";
        $nomor=1;
        $tampil_galeri = mysqli_query ($koneksi,"SELECT * FROM tb_galeri 
        ORDER BY id");
        while ($hasil=mysqli_fetch_array($tampil_galeri))
        {
          echo "<tr>";
          echo "<td>$nomor</td>";
          echo "<td>$hasil[nama]</td>";
          echo "<td><img src='$hasil[foto]' class='gambar'></td>";
          echo "<td>$hasil[keterangan]</td>";
          echo "<td align='center'>
          <a href='index.php?page=galeri_tambah&id=$hasil[id]'><button>Edit</button></a> <br>
          <a href='galeri_proses.php?status=hapus&id=$hasil[id]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button>Hapus</button></a>
          </td>";
          echo "<tr>";
          $nomor++;
        }
    ?>
</table>

<link rel="stylesheet" href="styles.css">