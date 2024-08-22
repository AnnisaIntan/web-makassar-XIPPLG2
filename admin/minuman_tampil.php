<h1>Minuman Khas Makassar</h1>
<div class="button">
  <?php
    echo "<button><a href='index.php?page=minuman_tambah'>Tambah Data</a></button>";
  ?>
</div>

<table>
    <tr class="kepala">
      <td width="10%">No</td>
      <td width="10%">Nama Minuman</td>
      <td width="20%">Sejarah Minuman</td>
      <td width="15%">Bahan Bahan</td>
      <td width="25%">Langkah Langkah</td>
      <td width="10%">Foto Minuman</td>
      <td width="10%">Aksi</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $nomor=1;
    $tampil_minuman = mysqli_query($koneksi, "SELECT * FROM tb_minuman ORDER BY id_minuman");
    while ($hasil = mysqli_fetch_assoc($tampil_minuman)) {
        echo "<tr>";
        echo "<td>$nomor</td>";
        echo "<td>$hasil[nama_minuman]</td>";
        echo "<td class='kecil'>$hasil[sejarah_minuman]</td>";
        echo "<td class='kecil'><ul>";
            $bahan_bahan = explode("\n", $hasil['bahan_bahan']);
            foreach ($bahan_bahan as $bahan) {
                $bahan = str_replace('. ', "<br/>", $bahan); 
                echo "<li>$bahan</li>"; 
            }
        echo "</ul></td>";
        echo "<td class='kecil'><ol>";
            $langkah_langkah = explode("\n", $hasil['langkah_langkah']); 
            foreach ($langkah_langkah as $langkah) {
                $langkah = str_replace('. ', "<br/>", $langkah); 
                echo "<li>$langkah</li>"; 
            }
        echo "</ol></td>";
        echo "<td><img src='$hasil[foto_minuman]' class='gambar'></td>";
        echo "<td align='center'>
        <a href='index.php?page=minuman_tambah&id_minuman=$hasil[id_minuman]'><button>Edit</button></a>
        <a href='minuman_proses.php?status=hapus&id_minuman=$hasil[id_minuman]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button>Hapus</button></a>
        </td>";
        echo "</tr>";
        $nomor++;
    }
    ?>
</table>

<link rel="stylesheet" href="styles.css">