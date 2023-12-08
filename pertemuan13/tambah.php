<?php
require 'functions.php';
// cek apakah tombol submit sudah di tentukan atau belum
if( isset($_POST["submit"]) ) {
    

    //cek apakah data berhasil di tambahkan atau tidak
   if( tambah($_POST) > 0 ) {
    echo "
         <script>
         alert('data berhasil di tambahkan!');
         document.location.href ='index.php';
         </script>
    ";
   }else {
    echo "
    <script>
    alert('data gagal di tambahkan!');
    document.location.href ='index.php';
    </script>
";
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data mahasiswa</title>
</head>

<body>
<h1>Tambah data mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
        <label for="nama">nama : </label>
            <input type="text" name="nama" id="nama" required> 
        </li>
        <li>
        <label for="nim">nim : </label>
            <input type="text" name="nim" id="nim" required>
        </li>
        <li>
        <label for="email">email : </label>
            <input type="text" name="email" id="email" required>
        </li>
        <li>
        <label for="jurusan">jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required>
        </li>
        <li>
        <label for="gambar">gambar : </label>
            <input type="file" name="gambar" id="gambar" required>
        </li>      
            <button type="submit" name="submit">Tambah Data!</button>
        
    </ul>


</form>

</body>
</html>




           