<?php
//include koneksi database
include('koneksi.php');

//get data dari form


$user_id                   = $_POST['user_id'];
$nama_penyakit       = $_POST['nama_penyakit'];
$rating        = $_POST['rating'];


$query = "INSERT INTO tbl_rating (user_id, nama_penyakit, rating) VALUES ('$user_id', '$nama_penyakit', '$rating')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: cf.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>