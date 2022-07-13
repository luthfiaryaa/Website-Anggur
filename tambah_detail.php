<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEM PAKAR</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gejala.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Gejala</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penyakit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="detailpenyakit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detail Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="diagnosa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diagnosis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cf.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rating</p>
                </a>
              </li>
              
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
        

        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
       
        <div class="container-fluid" style="width: 30%;">
          <center>
          <h1>Tambah Gejala dan Penyakit</h1>
      <form method="POST" class="form-group" >
      <section class="base">
        <div>
          <label>Pilih Penyakit</label>
          <select name="id_penyakit" id="id_penyakit" class="form-control">
                            <option disabled selected> Pilih </option>
                            <?php 
                            include('koneksi.php');
                            $select="SELECT * FROM tbl_penyakit";
                            $sql=mysqli_query($conn,$select);
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?=$data['id_penyakit']?>"><?=$data['nama_penyakit']?></option> 
                            <?php
                            }
                            ?>
                            </select>
        </div>
        <div>
          <label>Pilih Gejala</label>
          <select name="id_gejala" id="id_gejala" class="form-control">
                            <option disabled selected> Pilih </option>
                            <?php 
                            include('koneksi.php');
                            $select="SELECT * FROM tbl_gejala";
                            $sql=mysqli_query($conn,$select);
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?=$data['id_gejala']?>"><?=$data['keterangan']?></option> 
                            <?php
                            }
                            ?>
                            </select>
        </div>
        <div style="margin-top: 20px;">
          <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </section>
      </form>
      <?php
//include koneksi database
include('koneksi.php');

if (isset($_POST['submit'])) {
$id_penyakit       = $_POST['id_penyakit'];
$id_gejala         = $_POST['id_gejala'];

//cek dulu jika ada gambar produk jalankan coding ini
if (!is_null($id_penyakit) && !is_null($id_gejala)) {
    $cek = "SELECT * FROM tbl_diagnosa WHERE id_penyakit='$id_penyakit' AND id_gejala='$id_gejala' ";
    $run = mysqli_query($conn,$cek);
    $cekk = mysqli_fetch_assoc($run);
    if (!is_null($cekk)) {
      echo "<script>alert('Data Sudah Ada!')</script>";
    }
    else{
          $sql = "INSERT INTO tbl_diagnosa(id_penyakit,id_gejala) VALUES ('$id_penyakit','$id_gejala') ";
        if ($result = $conn -> query($sql)) {
          echo "<script>alert('Data Berhasil Ditambahkan')</script>"; 
        }
        else{
          echo "<script>alert('Data Gagal Ditambahkan')</script>"; 
        }
    }
  
  }
}



?>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
</center>
</div>


  </body>
</html>