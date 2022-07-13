<?php
include 'koneksi.php';
$id_diagnosa = $_GET["id_diagnosa"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_diagnosa WHERE id_diagnosa='$id_diagnosa'";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='detailpenyakit.php';</script>";
    }