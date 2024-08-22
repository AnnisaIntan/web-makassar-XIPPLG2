<h1>Editor Web Makassar</h1>
<div class="button">
  <?php
    echo "<button><a href='index.php?page=ceo_tambah'>Tambah Data</a></button>";
  ?>
</div>

<table>
    <tr class="kepala">
      <td width="10%">No</td>
      <td width="20%">Nama</td>
      <td width="20%">Jabatan</td>
      <td width="20%">Biodata</td>
      <td width="10%">Foto</td>
      <td width="20%">Aksi</td>
    </tr>
    <?php
        include "../config/koneksi.php";
        $nomor=1;
        $tampil_profil = mysqli_query ($koneksi,"SELECT * FROM tb_profil 
        ORDER BY nama");
        while ($hasil=mysqli_fetch_array($tampil_profil))
        {
          echo "<tr>";
          echo "<td>$nomor</td>";
          echo "<td>$hasil[nama]</td>";
          echo "<td>$hasil[jabatan]</td>";
          echo "<td class='kecil'>$hasil[biodata]</td>";
          echo "<td><img src='$hasil[foto_editor]' class='gambar'></td>";
          echo "<td align='center'>
          <a href='index.php?page=ceo_tambah&nama=$hasil[nama]'><button>Edit</button></a> <br>
          <a href='ceo_proses.php?status=hapus&nama=$hasil[nama]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button>Hapus</button></a>
          </td>";
          echo "<tr>";
          $nomor++;
        }
    ?>
</table>

<link rel="stylesheet" href="styles.css">