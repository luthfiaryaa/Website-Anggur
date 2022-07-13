<?php
include 'koneksi.php';
$id_penyakit = $_GET["id_penyakit"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_penyakit WHERE id_penyakit='$id_penyakit' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='penyakit.php';</script>";
    }