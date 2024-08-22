<div align="center">
    <p>Salamaki Ka Battuanta di Web Tau'na Makassar</p>
    <h1><?php echo $_SESSION['nama_pengelola']; ?></h1>
    <img src=<?php echo $_SESSION['foto_pengelola'];?> width="125" style="border-radius:105px; -moz-border-radius: 75px;" >
</div>

<ul type='square'>
    <li><a href="index.php?page=pengelola_tampil">Pengelola</a></li>
    <li><a href="index.php?page=ceo_tampil">Editor</a></li>
    <li><a href="index.php?page=daerah_tampil">Daerah</a></li>
    <li><a href="index.php?page=makanan_tampil">Makanan</a></li>
    <li><a href="index.php?page=minuman_tampil">Minuman</a></li>
    <li><a href="index.php?page=galeri_tampil">Galeri</a></li>
</ul>
<ul type='none'>
    <li><a href="logout.php"><button type="submit">Keluar Web</button></a></li>
</ul>


<style>
* {
    text-decoration: none;  
    color: #430A5D;
}
p {
    padding: 0 1rem;
}

button {
  margin-top: 3rem;
  background-color: #8C6A5D;
  color: #430A5D;
  border-radius: 50px;
  border: none;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>