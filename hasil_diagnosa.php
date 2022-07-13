<?php
include('koneksi.php');
?>
<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
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
    <a href="" class="brand-link">
      <img src="../img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="span1"><b>SISTEM PAKAR</b></span>
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
            <h1>DETAIL DIAGNOSA</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  
                  <div class="form-group"  method="POST">
            <br><label class="control-label col-sm-2">ID PENYAKIT :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM tbl_penyakit where id_penyakit='".$_GET['id_penyakit']."'";
                       $sql = mysqli_query ($conn,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='id_penyakit' readonly value='".$data['id_penyakit']."'><br>";
                    }
                ?>
         </div>
        </div>  
        <div class="form-group"  method="POST">
            <br><label class="control-label col-sm-2">NAMA HAMA DAN PENYAKIT :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM tbl_penyakit where id_penyakit='".$_GET['id_penyakit']."'";
                       $sql = mysqli_query ($conn,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='nama_penyakit' readonly value='".$data['nama_penyakit']."'><br>";
                    }
                ?>
         </div>
        </div>
        <div class="form-group"  method="POST">
            <br><label class="control-label col-sm-2">Gejala :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM tbl_penyakit p, tbl_diagnosa d, tbl_gejala g where p.id_penyakit='".$_GET['id_penyakit']."'and p.id_penyakit=d.id_penyakit and g.id_gejala=d.id_gejala";
                       $sql = mysqli_query ($conn,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='id_penyakit' readonly value='".$data['keterangan']."'><br>";
                    }
                ?>
         </div>
        </div>
        <div class="form-group"  method="POST">
            <br><label class="control-label col-sm-2">SOLUSI :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM tbl_penyakit where id_penyakit='".$_GET['id_penyakit']."'";
                       $sql = mysqli_query ($conn,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='pencegahan' readonly value='".$data['pencegahan']."'><br>";
                    }
                ?>
         </div>
       </div>
       <div class="form-group"  method="POST">
            <br><label class="control-label col-sm-2">GAMBAR :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM tbl_penyakit where id_penyakit='".$_GET['id_penyakit']."'";
                       $sql = mysqli_query ($conn,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<img src=\"../admin/gambar/".$data['gambar']."\" 
                                 style='width: 500px;height: 500px'><br>";
                    }
                ?>
         </div>
       </div>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">

    </div>
    <div class="float-center d-none d-sm-block">
      <?php echo $_SESSION['username']; ?>
    </div>
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="https://www.instagram.com/satriyagrapefarm/">@SATRIYA GRAPE FARM</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
</body>
</html>
