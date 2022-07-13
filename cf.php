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
  <link rel="stylesheet" href="../css/body.css">

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
      <div id="logout" class="btn btn-dark"><a style="color: white;" href="logout.php">Logout</a></div>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
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
                  <p>Diagnosa</p>
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
            <h1>Rating Penyakit</h1>
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
                <left><a href="rating_penyakit.php" class="btn btn-primary">+ &nbsp; Rating Penyakit</a><left>
                <br/>
              
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Penyakit</th>
                    <th>Nama user</th>
                    <th>Rating</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                 
                  
                  <?php 
                      include('koneksi.php');
                      $sql="SELECT a.user_id, b.username, a.nama_penyakit, a.rating FROM tbl_rating a JOIN users b ON a.user_id = b.user_id";
                      $query = mysqli_query($conn, $sql);
                      $no = 1;
                      while($row = mysqli_fetch_array($query)){
                  ?>



                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_penyakit'] ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['rating'] ?></td>
                      <td><a href="hapus_rating.php?nama_penyakit=<?php echo $row['nama_penyakit']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn-sm btn-outline-danger">Hapus</a>
          </td>
                      
              
          </td>
                  </tr>

                  
                  <?php
                          $no++;
                  }
                  ?>


                </tbody>
                </table>
               <a href="proses.php">Proses</a>


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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
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
