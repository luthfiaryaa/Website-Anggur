<?php
include 'koneksi.php';
$id_gejala = $_GET["id_gejala"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_gejala WHERE id_gejala='$id_gejala' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='gejala.php';</script>";
    }