<?php 
//koneksi
$conn = mysqli_connect("localhost","root","","tabelbuku");

function query($query){
    global $conn;
   $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $kodebuku = htmlspecialchars($data["kode_buku"]);
    $namabuku = htmlspecialchars($data["nama_buku"]);
    $namapenulis = htmlspecialchars($data["nama_penulis"]);
    $tahunterbit = htmlspecialchars($data["tahun_terbit"]);
    
    //upload gambar
    $gambar = upload();
        if(!$gambar){
            return false;
        }

    $query = "INSERT INTO bukuu VALUES ('','$kodebuku','$namabuku','$namapenulis','$tahunterbit','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload(){
    $namaFile = $_FILES['gambar']["name"];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


if($error === 4){
    echo"
    <script>
    alert('pilih gambar terlebih dahulu');
    </script>
    ";
    return false;
    
}

    
    //cek apakah yang di upload adalah gambar
   $ekstensiGambarValid = ['jpg','jpeg','png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));
   if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo"
    <script>
    alert('yang anda upload bukan gambar bro');
    </script>
    ";
   
    }

    //cek apakah ukuran file terlalu besar
   if($ukuranFile > 2000000){
    echo"
    <script>
    alert('ukuran file anda terlalu besar');
    </script>
    ";
   
    }

    //generate nama file random
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekan, gambar siap di upload
   move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
   return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM bukuu WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    
    $id = $data["id"];
    $kodebuku = htmlspecialchars($data["kode_buku"]);
    $namabuku = htmlspecialchars($data["nama_buku"]);
    $namapenulis = htmlspecialchars($data["nama_penulis"]);
    $tahunterbit = htmlspecialchars($data["tahun_terbit"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4 ){
        $gambar =$gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE bukuu SET
    kode_buku = '$kodebuku',
    nama_buku = '$namabuku',
    nama_penulis = '$namapenulis',
    tahun_terbit = '$tahunterbit',
    gambar = '$gambar'       
    WHERE id = $id
   ";


   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM bukuu WHERE
    kode_buku LIKE '%$keyword%' OR
    nama_buku LIKE '%$keyword%' OR
    nama_penulis LIKE '%$keyword%' OR
    tahun_terbit LIKE '%$keyword%' 
    ";
    return query($query);
}
?>