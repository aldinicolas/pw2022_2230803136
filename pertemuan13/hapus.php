<?php

$id = $_GET["id"];
require 'functions.php';

if( hapus($id) > 0 ){
    echo "
    <script>
    alert('data berhasil di hapus!');
    document.location.href ='index.php';
    </script>
";
}else{
    echo "
    <script>
    alert('data berhasil di hapus!');
    document.location.href ='index.php';
    </script>
";
}


?>