<?php 
    require 'functions.php';
    $bukuu = query("SELECT * FROM bukuu");

    if(isset($_POST["cari"])){
        $bukuu = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Perpustakaan</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navigasi Bar -->
    <?php include('nav.php')?>

    <!-- Header -->
    <Header>
        <div class="hero" id="home">
            <div class="content">
                <h1>Mari Membaca <span>Buku,</span> Karena <span>Buku</span> jembatan Ilmu.</h1>
                <p>
                Di balik sampulnya, buku menyimpan banyak informasi yang mungkin belum diketahui oleh orang-orang. Keberadaan buku mungkin sudah ada sejak berabad-abad lalu, tapi hal ini tak membuatnya lenyap dimakan waktu.
                </p>
                <a href="tambah.php" class="cta">Tambah Buku</a>
            </div>
        </div>
    </Header>

    <!-- Section -->
    <main>
        <section id="about" class="about">
            <h2><span>Tentang</span> Kami</h2>

            <div class="row">
                <div class="about-img">
                    <img src="img/about.jpg" alt="Tentang Kami">
                </div>

                <div class="content">
                    <h3>Visi dan Misi Kami:</h3>
                    <p>
                        "Menjadi pusat pengetahuan yang dinamis dan inovatif, menyediakan akses luas terhadap informasi untuk meningkatkan kehidupan dan pembelajaran masyarakat."
                    </p>
                    <p>
                        Menyediakan akses terbuka dan bebas hambatan ke koleksi informasi yang beragam untuk semua lapisan masyarakat,
                        Mengembangkan dan memelihara koleksi yang beragam, mencakup berbagai format dan topik, untuk memenuhi kebutuhan beragam pengguna.
                    </p>
                </div>
            </div>
        </section>

        <section id="buku" class="buku">
            <h2><span>Koleksi</span> Buku</h2>
            <p>Berikut ini adalah daftar buku-buku populer di koleksi kami, buku koleksi disini kami inputkan dari berbagai sumber, seperti donasi, dan memesan dari penerbit</p>
        </section>

        <section class="list-buku">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Kode Buku</th>
                    <th>Nama Buku</th>
                    <th>Nama Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Ubah</th>
                </tr>

                <?php $i=1;?>
                <?php foreach($bukuu as $row):?>
                <tr>
                    <td>
                        <?= $i;?>
                    </td>
                    <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
                    <td><?= $row["kode_buku"];?></td>
                    <td><?= $row["nama_buku"];?></td>
                    <td><?= $row["nama_penulis"];?></td>
                    <td><?= $row["tahun_terbit"];?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"];?>">Edit</a> | 
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Delete</a>
                    </td>
                </tr>

                <?php $i++?>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
    
    
    <footer>
        <?php include('footer.php')?>
    </footer>
</body>
</html>