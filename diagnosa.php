<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 20px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 550px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 1000px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  
</style>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <h1 style="margin-left: 500px">DIAGNOSA</h1>
          </div>

          <form id="form1" name="form1" method="post" action=" ">

<table>
  <tbody>                    
      <?php     
      echo  "<br><label>AKAR</label><br>";
      $sql="SELECT * FROM tbl_gejala WHERE bagian='Akar'";
      $query= mysqli_query($conn, $sql);
                while($hasil=mysqli_fetch_array($query)){  
          ?>
          <tr>
          <input type='checkbox' style="margin-left: 20px;" value='<?php echo $hasil['id_gejala']?>' name='gejala[]'></tr>
          <img onclick="myFunc(this)" src="gambar/<?php echo $hasil['gambar']; ?>" alt="<?php echo $hasil['keterangan']; ?>" style="max-width:180px;margin-left: 50px; margin-bottom:20px"></tr>

          <?php
      } ?>
      </tbody>
</table>

<table>
  <tbody>
      <?php     
      echo  "<br><label>DAUN</label><br>";
      $sql="SELECT * FROM tbl_gejala WHERE bagian='Daun'";
      $query= mysqli_query($conn, $sql);
                while($hasil=mysqli_fetch_array($query)){  
          ?>
          <tr>
            
          <input type='checkbox' style="margin-left: 20px;" value='<?php echo $hasil['id_gejala']?>' name='gejala[]'>
          <img onclick="myFunc(this)" src="gambar/<?php echo $hasil['gambar']; ?>" alt="<?php echo $hasil['keterangan']; ?>" style="max-width:180px; margin-left: 50px; margin-bottom: 20px;">

        </tr>

          <?php
      } ?>
      </tbody>
</table>
          
<table>
  <tbody>
      <?php     
      echo  "<br><label>BATANG</label><br>";
      $sql="SELECT * FROM tbl_gejala WHERE bagian='Batang'";
      $query= mysqli_query($conn, $sql);
                while($hasil=mysqli_fetch_array($query)){  
          ?>
          <tr>
            
          <input type='checkbox' style="margin-left: 20px;" value='<?php echo $hasil['id_gejala']?>' name='gejala[]'>
          <img onclick="myFunc(this)" src="gambar/<?php echo $hasil['gambar']; ?>" alt="<?php echo $hasil['keterangan']; ?>" style="max-width:180px; margin-left: 50px; margin-bottom: 20px;">

        </tr>

          <?php
      } ?>
      </tbody>
</table>

<table>
  <tbody>
      <?php     
      echo  "<br><label>BUAH</label><br>";
      $sql="SELECT * FROM tbl_gejala WHERE bagian='Buah'";
      $query= mysqli_query($conn, $sql);
                while($hasil=mysqli_fetch_array($query)){  
          ?>
          <tr>
            
          <input type='checkbox' style="margin-left: 20px;" value='<?php echo $hasil['id_gejala']?>' name='gejala[]'>
          <img onclick="myFunc(this)" src="gambar/<?php echo $hasil['gambar']; ?>" alt="<?php echo $hasil['keterangan']; ?>" style="max-width:180px; margin-left: 50px; margin-bottom: 20px;">

        </tr>

          <?php
      } ?>
      </tbody>
</table>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close" onclick="modal.style.display = 'none'">&times;</span>
  <img class="modal-content" id="img">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("img");
var captionText = document.getElementById("caption");   


function myFunc(el){
   var ImgSrc = el.src;
   var altText = el.alt;
   modal.style.display = "block";
  modalImg.src = ImgSrc;
  captionText.innerHTML = altText;
}

window.onclick = function(event){
   if (event.target == modal){
      modal.style.display = 'none';
   }

}
</script>

      <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK PENYAKIT</button><br><br>

      <div class="panel panel-info">
                <div class="panel-heading">HASIL DIAGNOSA</div>
                <div class="panel-body">
            <div class="box-body table-responsive">
                <table id="example2" class="da">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PENYAKIT</th>
                            <th>Nama Penyakit</th>
                            <th>Pencegahan</th>
                            <th>Gambar</th>
                            <th>Detail</th>
                        </tr>

                    </thead>
                    <tbody>
                      
                      <?php      
        if(isset($_POST['submit'])){
            if (!isset($_POST['gejala'])) {
                echo "<script type='text/javascript'>alert('Silahkan Pilih Gejala');window.location.href ='diagnosa.php';</script>";
            }
            $gejala = $_POST['gejala'];
            $jumlah_dipilih = count($gejala);
           for($x=0;$x<$jumlah_dipilih;$x++){
                       $tampil ="select DISTINCT p.id_penyakit, p.nama_penyakit, p.pencegahan , p.gambar from tbl_diagnosa d, tbl_penyakit p, tbl_gejala g where d.id_penyakit=p.id_penyakit and d.id_gejala=g.id_gejala and d.id_gejala='$gejala[$x]' group by nama_penyakit";
;
                       $result = mysqli_query($conn, $tampil);
                       $hasil  = mysqli_fetch_array($result);   
                    
                    }
               echo "
                           <tr>  
                           <td>".$x."</td>
                                 <td>".$hasil['id_penyakit']."</td>
                                 <td>".$hasil['nama_penyakit']."</td>  
                                 <td>".$hasil['pencegahan']."</td> 
                                 <td><img src=\"../admin/gambar/".$hasil['gambar']."\" 
                                 style='width: 80px;'></td> 
                                 <td style='text-align: center;'><a href=\"hasil_diagnosa.php?id_penyakit=".$hasil['id_penyakit']."\">
                                 <i class='fa fa-search'></i></a></td>
                           </tr>   
                               
                               ";
        
      }
    
                ?>
                    </tbody>
         
              </table>

      

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

             
              
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
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
