<?php
//include koneksi database
include('koneksi.php');

//get data dari form


$nama            = $_POST['nama'];
$username        = $_POST['username'];
$password        = $_POST['password'];


$query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    
      echo "<script>alert('Berhasil')</script>";
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>