<h1>Pengelola / Admin Web</h1>
<div class="button">
  <?php
    echo "<button><a href='index.php?page=pengelola_tambah'>Tambah Data</a></button>";
  ?>
</div>

<table>
    <tr class="kepala">
      <td width="5%">No.</td>
      <td width="20%">Id/Username</td>
      <td width="20%">Nama</td>
      <td width="20%">Foto</td>
      <td width="15%" colspan="2">Aksi</td>
    </tr>
    <?php
        include "../config/koneksi.php";
        $no=1;
        $tampil_pengelola = mysqli_query ($koneksi,"SELECT * FROM tb_pengelola 
        ORDER BY id_pengelola");
        while ($hasil=mysqli_fetch_array($tampil_pengelola))
        {
          echo "<tr>";
          echo "<td>$no</td>";
          echo "<td>$hasil[id_pengelola]</td>";
          echo "<td>$hasil[nama_pengelola]</td>";
          echo "<td><img src='$hasil[foto_pengelola]' class='gambar' td>";
          echo "<td align='center'>
          <a href='index.php?page=pengelola_tambah&id_pengelola=$hasil[id_pengelola]'><button class='button-6' role='button'>Edit</button></a> <br>
          <a href='pengelola_proses.php?status=hapus&id_pengelola=$hasil[id_pengelola]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button class='button-6' role='button'>Hapus</button></a>
          </td>";
          echo "<tr>";
          $no++;
        }
    ?>
</table>

<link rel="stylesheet" href="styles.css">