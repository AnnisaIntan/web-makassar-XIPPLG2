-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2024 pada 06.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_makassar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daerah`
--

CREATE TABLE `tb_daerah` (
  `id_daerah` int(11) NOT NULL,
  `provinsi` longtext NOT NULL,
  `kota` longtext NOT NULL,
  `asal_sejarah` longtext NOT NULL,
  `foto_monumen` text NOT NULL,
  `foto_bajuadat` text NOT NULL,
  `nama_monumen` text NOT NULL,
  `nama_bajuadat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_daerah`
--

INSERT INTO `tb_daerah` (`id_daerah`, `provinsi`, `kota`, `asal_sejarah`, `foto_monumen`, `foto_bajuadat`, `nama_monumen`, `nama_bajuadat`) VALUES
(1, 'Sulawesi Selatan', 'Makassar', 'Makassar, yang sekarang merupakan ibu kota dan kota terbesar di provinsi Sulawesi Selatan, Indonesia, memiliki sejarah yang panjang dan kaya sebagai salah satu pusat perdagangan utama di Indonesia. Asal usul kota ini berkembang dari sebuah pelabuhan kecil menjadi kota besar yang penuh dengan dinamika sejarah, budaya, dan ekonomi.\r\n\r\nZaman Pra-Sejarah dan Kerajaan-Kerajaan Awal\r\nSejarah awal Makassar tidak banyak didokumentasikan, tetapi wilayah ini dikenal sudah dihuni sejak zaman prasejarah. Penemuan arkeologis menunjukkan keberadaan komunitas-komunitas awal yang berinteraksi dengan wilayah lain melalui perdagangan laut.\r\n\r\nKerajaan Gowa dan Tallo\r\nPada awal abad ke-14, Makassar menjadi lebih terkenal dengan berkembangnya kerajaan Gowa dan Tallo. Kerajaan-kerajaan ini berperan penting dalam perdagangan di kawasan tersebut. Pada abad ke-16 dan ke-17, Makassar berkembang menjadi salah satu pelabuhan perdagangan terpenting di Asia Tenggara, berkat posisinya yang strategis untuk jalur perdagangan rempah-rempah.\r\n\r\nPengaruh Kolonial\r\nPada tahun 1667, setelah konflik panjang dengan kolonialis Belanda, Makassar jatuh ke tangan VOC (Vereenigde Oostindische Compagnie atau Perusahaan Hindia Timur Belanda) melalui Perjanjian Bongaya. Penjajahan Belanda membawa perubahan besar dalam struktur politik dan ekonomi di Makassar. Belanda mengontrol perdagangan dan kegiatan ekonomi lainnya, yang membatasi peran serta masyarakat lokal dalam perdagangan internasional.\r\n\r\nEra Modern\r\nSetelah Indonesia merdeka pada tahun 1945, Makassar menjadi bagian dari Republik Indonesia dan terus berkembang sebagai pusat perdagangan dan pelayanan. Pada masa Orde Baru di bawah kepemimpinan Presiden Soeharto, Makassar mengalami modernisasi infrastruktur dan peningkatan ekonomi yang signifikan.\r\n\r\nMakassar Hari Ini\r\nSaat ini, Makassar adalah salah satu kota metropolitan terbesar di Indonesia Timur dengan peran penting dalam perdagangan, pendidikan, dan pariwisata. Kota ini juga merupakan gerbang utama ke wilayah Indonesia Timur lainnya dan terus berkembang sebagai pusat pertumbuhan baru di Indonesia. Sejarah Makassar yang beragam dan penuh warna ini menunjukkan bagaimana pengaruh lokal dan asing telah membentuk identitas kota yang unik, menjadikannya sebagai salah satu kota yang penting dan dinamis di Indonesia.\r\n', '../foto/monumen.png', '../foto/baju.png', 'Monumen', 'Baju Bodo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `foto` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `nama`, `foto`, `keterangan`) VALUES
(4, 'Batik Lontara', '../foto/foto.png', 'Batik Lontara adalah salah satu jenis batik khas daerah Makassar yang memiliki motif-motif tradisional khas Sulawesi Selatan. Batik ini sering menggambarkan kekayaan budaya dan sejarah lokal, seperti motif-motif yang terinspirasi dari seni ukir tradisional Makassar.'),
(5, 'Aksara Lontara', '../foto/foto (1).png', 'Aksara Lontara adalah sistem tulisan tradisional yang digunakan di wilayah Sulawesi Selatan, termasuk Makassar. Aksara ini memiliki bentuk huruf yang unik dan telah digunakan sejak zaman kerajaan di Sulawesi Selatan. Aksara Lontara digunakan untuk menulis berbagai dokumen sejarah, naskah religius, dan budaya.'),
(6, 'Pantai Losari', '../foto/foto (2).png', 'Pantai Losari adalah salah satu ikon wisata pantai di Makassar yang terkenal dengan panorama matahari terbenamnya yang memukau. Pantai ini juga dikenal dengan jajaran kapal phinisi yang berlabuh di dermaga, serta aneka kuliner khas Makassar yang dapat dinikmati di sepanjang pantai.'),
(7, 'Masjid 99 Kubah', '../foto/foto (3).png', 'Masjid 99 Kubah, atau lebih dikenal sebagai Masjid Agung Trans Studio, adalah salah satu masjid megah di Makassar yang terkenal dengan arsitektur uniknya yang memiliki 99 kubah kecil. Masjid ini merupakan salah satu landmark penting di Makassar dan menjadi tujuan wisata religi serta fotografi.'),
(8, 'Rempah dari Makassar', '../foto/foto (4).png', 'Makassar terkenal dengan rempah-rempahnya yang kaya, seperti cengkih, lada hitam, dan lain-lain. Rempah-rempah ini memiliki peran penting dalam sejarah perdagangan dan kekayaan budaya Makassar, serta memberikan cita rasa khas pada masakan tradisional Sulawesi Selatan.'),
(9, 'Kapal Phinisi', '../foto/foto (5).png', 'Kapal Phinisi adalah kapal tradisional Indonesia yang berasal dari Sulawesi Selatan, termasuk Makassar. Kapal ini terkenal dengan desain layar tanjungnya yang indah dan kecepatan yang tinggi. Kapal Phinisi digunakan sebagai kapal perdagangan tradisional, serta menjadi simbol budaya dan identitas maritim Indonesia.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `sejarah_makanan` longtext NOT NULL,
  `bahan_bahan` longtext NOT NULL,
  `langkah_langkah` longtext NOT NULL,
  `foto_makanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_makanan`
--

INSERT INTO `tb_makanan` (`id_makanan`, `nama_makanan`, `sejarah_makanan`, `bahan_bahan`, `langkah_langkah`, `foto_makanan`) VALUES
(1, 'Pisang Epe', 'Pisang epe terkenal sebagai jajanan tradisional khas kota Makassar, Sulawesi Selatan. Kudapan itu mudah sekali ditemukan karena penjualnya sangat banyak, terutama di sepanjang Pantai Losari. Di sanalah pusat Pedagang Kaki Lima (PKL) menjajakan pisang epe.Pisang epe atau epek dalam KBBI, terbuat dari pisang kepok mengkal yang dibakar di atas tungku kecil atau anglo, lalu disirami saus gula merah. Dalam bahasa Makassar, epek berarti jepit. Nama itu sesuai dengan proses pembuatannya yang dijepit menggunakan dua papan kayu sebelum dibakar. Dengan demikian, pisang epe dapat dikatakan sebagai pisang bakar yang dijepit.Alat penjepit pisang epe biasanya terbuat dari dua bilah papan kayu berbentuk persegi yang disatukan dengan engsel, sehingga bisa menjepit. Kedua gagangnya terbuat dari bahan tahan panas.Pisang epe mulai populer di kalangan masyarakat pada 1970-an, ketika pantai Losari baru menjadi ikon kota Makassar dan banyak PKL bermunculan. Pemerintah pun terus mempercantik kawasan itu, hingga berkembang menjadi pusat aktivitas warga sekaligus tempat menikmati matahari terbenam. Malam hari begitu indah sambil memandang gugusan Kepulauan Sangkarang atau Spermonde. Seiring waktu, Makassar pun identik dengan pantai Losari dan pisang epe.Tidak ada catatan sejarah yang mengungkap waktu pertama kali masyarakat Makassar mengenal dan mengolah pisang epe sebagai kuliner tradisional. Namun, Direktorat Jenderal Kekayaan Intelektual Kemenkumham RI menulis, pisang epe diduga menjadi santapan para bangsawan Kerajaan Gowa Tallo pada abad ke-16—19.Kemudian, berdasarkan karakteristik pisang epe yang autentik hanya berbahan dasar pisang dan saus gula merah, dipastikan camilan itu asli dari Makassar.', 'Pisang Kepok Kuning  \r\n2 sdm Margarin \r\n200gr Gula Merah \r\nAir \r\n½ sdt Garam \r\n1 sdm Tepung Maizena \r\nMargarin/Blueband', 'Kupas pisang kepok, alasi dengan plastik dan tekan dengan piring hingga agak pipih.\r\nPanggang pisang di atas bara api sambil olesi dengan mentega hingga kecokelatan dan kering.\r\nTaburi sedikit gula pasir permukaannya dan masak hingga gula leleh lalu angkat.\r\nLalu membuat saus\r\nRebus semua bahan hingga gula larut. Didihkan beberapa saat.\r\nAngkat lalu saring dan dinginkan.', '../foto/jajan.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_minuman`
--

CREATE TABLE `tb_minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` text NOT NULL,
  `sejarah_minuman` text NOT NULL,
  `bahan_bahan` text NOT NULL,
  `langkah_langkah` text NOT NULL,
  `foto_minuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_minuman`
--

INSERT INTO `tb_minuman` (`id_minuman`, `nama_minuman`, `sejarah_minuman`, `bahan_bahan`, `langkah_langkah`, `foto_minuman`) VALUES
(1, 'Es Pisang Ijo', 'Di Pulau Sulawesi hidup seorang raja yang dikenal kejam dan tanpa kenal belas kasih. Sehingga tidak satu pun warga yang berani melawan perintahnya. Hingga pada suatu hari, salah seorang juru masak kerajaan bernama Ijo melakukan kesalahan yakni, menyajikan makanan yang kurang cocok dengan lidah sang raja.\r\n\r\nMelihat hal itu, sang raja marah besar terhadap Ijo hingga pada akhirnya mengancam akan menghukum mati juru masak itu di depan rakyatnya. Karena takut, Ijo akhirnya mencoba segala cara agar lepas dari hukuman mengerikan itu. Cara tersebut dilakukan Ijo dengan menawarkan sebuah resep olahan pisang terlezat kepada raja.\r\n\r\nUntungnya, tawaran tersebut diterima sang raja. Ijo langsung membuat kudapan pisang yang dibalut dengan adonan tepung berwarna hijau yang disajikan bersama kuah fla kental dan gurih. Raja pun ternyata sangat menyukai olahan pisang tersebut.\r\n\r\nAkhirnya, Ijo selamat dari hukuman mati tersebut. Bahkan, ia mendapat penghormatan dengan memberikan nama pisang ijo oleh sang raja. Hingga kini, minuman yang berasal dari Kota Daeng Makassar, Sulawesi Selatan ini sudah tersebar di beberapa kota di Indonesia.', '1,3 liter Air\r\n100 gr Tepung Beras\r\nDaun Pandan\r\n125 gr Tepung Terigu\r\n50 gr Gula Pasir\r\n2 Sachet Santan Instan (65 ml)\r\n¼ sdt Garam \r\nPasta Pandan\r\n1 sdm Minyak \r\nEs Batu\r\nDaun Pandan\r\nSusu Frisian Flag Cocopandan', 'Kukus pisang raja sampai matang. Angkat dan sisihkan. \r\nHaluskan daun pandan dan daun suji bersama 50 mililiter air dengan blender. \r\nSaring airnya, sisihkan. \r\nKulit pisang ijo: campur tepung beras, tepung sagu, tepung terigu, santan, gula pasir, dan air daun pandan daun suji. \r\nAduk, uleni adonan sampai rata dan licin. \r\nTipiskan adonan kulit, taruh pisang raja kukus di atasnya. \r\nGulung hingga seluruh bagian pisang terbungkus. \r\nKukus kembali sampai adonan kulit berwarna hijau tua. \r\nAngkat, potong setelah dingin. Sisihkan. \r\nSaus: campur daun pandan dan 100 mililiter air, blender sampai halus. \r\nSaring. Campur air pandan, gula pasir, dan tepung beras. \r\nJerang di atas api kecil sambil aduk sampai kental. \r\nAngkat. Siapkan mangkuk. Masukkan pisang ijo. \r\nBeri es serut, sirup, dan saus.\r\nLalu Sajikan', '../foto/es.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `id_pengelola` varchar(20) NOT NULL,
  `nama_pengelola` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `foto_pengelola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_pengelola`, `nama_pengelola`, `password`, `foto_pengelola`) VALUES
('intannn', 'Annisa Intan ', '81dc9bdb52d04dc20036dbd8313ed055', '../foto/user.png'),
('salmaaa', 'Salma Novita', '81dc9bdb52d04dc20036dbd8313ed055', '../foto/user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `nama` varchar(15) NOT NULL,
  `jabatan` text NOT NULL,
  `biodata` text NOT NULL,
  `foto_editor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`nama`, `jabatan`, `biodata`, `foto_editor`) VALUES
('Annisa Intan', 'Anggota', 'Halo, kenalin aku Annisa. Dari jurusan pengembangan gim. Aku bercita-cita ingin menjadi Game Developer yang bisa memberikan manfaat pada semuanya!! Salam kenal ya!', '../foto/image.png'),
('Salma Novita', 'Ketua Kelompok', 'Halo, kenalin aku Salma. Dari jurusan pengembangan gim. Aku bercita-cita ingin menjadi Fullstack Developer yang bisa memberikan manfaat pada semuanya!! Salam kenal ya!', '../foto/image (1).png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_daerah`
--
ALTER TABLE `tb_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indeks untuk tabel `tb_minuman`
--
ALTER TABLE `tb_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indeks untuk tabel `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_daerah`
--
ALTER TABLE `tb_daerah`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_makanan`
--
ALTER TABLE `tb_makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_minuman`
--
ALTER TABLE `tb_minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
