<?php

function cek_ganjil_genap_prima($bilangan) {
    if ($bilangan < 2) {
        return "Bilangan ganjil";
    }

    $is_prima = true;

    if ($bilangan == 2){
        return "Bilangan genap sekaligus bilangan prima";
    }
    if ($bilangan % 2 == 0) {
        return "Bilangan genap";
    } else {
        for ($i = 2; $i <= sqrt($bilangan); $i++) {
            if ($bilangan % $i == 0) {
                $is_prima = false;
                break;
            }
        }
        if ($is_prima) {
            return "Bilangan ganjil sekaligus bilangan prima";
        } else {
            return "Bilangan ganjil, tapi bukan prima";
        }
    }
}

for ($i = 1; $i <= 30; $i++) {
    $bilangan = $i;
    $hasil = cek_ganjil_genap_prima($bilangan);
    if ($bilangan == 1 && $hasil == "Bilangan ganjil sekaligus bilangan prima") {
        echo "$bilangan adalah ganjil dan merupakan bilangan prima<br>";
    } else {
        echo "$bilangan adalah $hasil<br>";
    }
}

?>
