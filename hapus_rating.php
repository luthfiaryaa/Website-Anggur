<?php
include 'koneksi.php';
$nama_penyakit = $_GET["nama_penyakit"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_rating WHERE nama_penyakit='$nama_penyakit' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='cf.php';</script>";
    }