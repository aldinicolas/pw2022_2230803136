<?php 
require 'functions.php';
    if(isset($_POST["submit"])){
        //cek apakah data berhasil ditambahkan
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data buku</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navigasi Bar -->
    <?php include('nav.php')?>

    <header>
        <div class="content1">
            <p class="judul">Admin Perpustakaan</p>
            <p class="sub_judul">Penambahan koleksi buku</p>
        </div>
    </header>

    <main>
        <div class="tambah">
            <h1>Tambah data buku</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Kode Buku</td> 
                        <td>
                            <label for="kode_buku"></label>
                            <input type="text" name="kode_buku" id="kode_buku" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Nama Buku</td> 
                        <td>
                            <label for="nama_buku"></label>
                            <input type="text" name="nama_buku" id="nama_buku" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Nama Penulis</td> 
                        <td>
                            <label for="nama_penulis"></label>
                            <input type="text" name="nama_penulis" id="nama_penulis" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Tahun Terbit</td> 
                        <td>
                            <label for="tahun_terbit"></label>
                            <input type="text" name="tahun_terbit" id="tahun_terbit" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Gambar</td> 
                        <td>
                            <label for="gambar"></label>
                            <input type="file" name="gambar" id="gambar" required>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="submit" class="input-button">Tambahkan</button>
            </form>
        </div>
    </main>

    <footer>
        <?php include('footer.php')?>
    </footer>
</body>
</html>




           