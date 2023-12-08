<?php
require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah di tentukan atau belum
if( isset($_POST["submit"]) ) {
    

    //cek apakah data berhasil di ubah atau tidak
   if( ubah($_POST) > 0 ) {
    echo "
         <script>
         alert('data berhasil di ubah!');
         document.location.href ='index.php';
         </script>
    ";
   }else {
    echo "
    <script>
    alert('data gagal di ubah!');
    document.location.href ='index.php';
    </script>
";
   }

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>ubah data mahasiswa</title>
</head>

<body>
<h1>ubah data mahasiswa</h1>

<form action="" method="post" enctype="/form-data">
    <input type="hidden" name="id" value="<?=$mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?=$mhs["gambar"]; ?>">

    <ul>  

        <li>
           <label for="nama">nama :</label>
           <input type="text" name="nama" id="nama" required value=" <?= $mhs["nama"]; ?>">
    </li>
        <li>
       <label for="nim">nim : </label>
            <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
        </li>
        <li>
        <label for="email">email : </label>
            <input type="text" name="email" id="email"required value="<?= $mhs["email"]; ?>">
        </li>
        <li>
        <label for="jurusan">jurusan : </label>
            <input type="text" name="jurusan" id="jurusan"required value="<?= $mhs["jurusan"]; ?>">
        </li>
        <li>
        <label for="gambar">gambar : </label><br>
        <img src="img/<?= $mhs['gambar']; ?>" width="50"><br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">ubah Data!</button>
        </li>
    </ul>


</form>

</body>
</html>





