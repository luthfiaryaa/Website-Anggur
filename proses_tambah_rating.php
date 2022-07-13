<?php
//include koneksi database
include('koneksi.php');

//get data dari form


$id_user                   = $_POST['id_user'];
$id_penyakit       = $_POST['id_penyakit'];
$rating        = $_POST['rating'];


$query = "INSERT INTO tbl_rating (id, id_penyakit, rating) VALUES ('$id_user', '$id_penyakit', '$rating')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: cf.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>