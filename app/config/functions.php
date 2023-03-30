<?php

// Function format rupiah
function rupiah($angka)
{
    if ($angka == 0) {
        return "Rp. 0";
    }

    $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

// Function format rupiah without Rp.
function rupiahFormat($angka)
{
    if ($angka == 0) {
        return "0";
    }

    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
