<h1>Daerah Makassar</h1>
<div class="button">
  <?php
    echo "<button><a href='index.php?page=daerah_tambah'>Tambah Data</a></button>";
  ?>
</div>

<table>
    <tr class="kepala">
      <td width="10%">Nomor</td>
      <td width="10%">Provinsi</td>
      <td width="10%">Kota</td> 
      <td width="30%">Sejarah</td>
      <td width="10%">Monumen</td>
      <td width="10%">Baju Adat</td>
      <td width="20%">Aksi</td>
    </tr>
    <?php
        include "../config/koneksi.php";
        $nomor=1;
        $tampil_daerah = mysqli_query ($koneksi,"SELECT * FROM tb_daerah 
        ORDER BY id_daerah");
        while ($hasil=mysqli_fetch_array($tampil_daerah))
        {
          echo "<tr>";
          echo "<td>$nomor</td>";
          echo "<td>$hasil[provinsi]</td>";
          echo "<td>$hasil[kota]</td>";
          echo "<td class='kecil'>$hasil[asal_sejarah]</td>";
          echo "<td><img src='$hasil[foto_monumen]' class='gambar'></td>";
          echo "<td><img src='$hasil[foto_bajuadat]' class='gambar'></td>";
          echo "<td align='center'>
          <a href='index.php?page=daerah_tambah&id_daerah=$hasil[id_daerah]'><button>Edit</button></a> <br>
          <a href='daerah_proses.php?status=hapus&id_daerah=$hasil[id_daerah]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button>Hapus</button></a>
          </td>";
          echo "<tr>";
          $nomor++;
        }
    ?>
</table>

<link rel="stylesheet" href="styles.css">