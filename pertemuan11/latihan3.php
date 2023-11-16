<?php
$mahasiswa = [
    ["jono", "12345", "Sistem informasi", "joni@gmail.com"],
    ["Budi", "12346", "Sistem informasi", "budi@gmail.com"],
    ["angga", "12347", "Sistem informasi", "angga@gmail.com"],
    ["rio", "12348", "Sistem informasi", "rio@gmail.com"],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
<ul>
   <li><?= $mhs[0] ?></li>
   <li><?= $mhs[1] ?></li>
   <li><?= $mhs[2] ?></li>
   <li><?= $mhs[3] ?></li>
<</ul>
<?php endforeach; ?>
    
</body>

 </html>
