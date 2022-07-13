<?php 
    session_start();
    ?>

<?php
    $host     = "localhost";
    $database = "sistempakar";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Get All Product Name Unique
    $sql = "SELECT distinct nama_penyakit from tbl_rating order by nama_penyakit asc";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $products[] = $row["nama_penyakit"];
        }
    }
    
    //index proposed x,y (x=id user, y = id product / product_name)
    //Inisiasi Matrix User + Product
    $array_of_users_products = [];
    $total_users = 0;
    if (count($products) > 0){
        // output data of each row
        foreach($products as $product){
            $total = 0;
            $sql = "SELECT * from users";
            $result = $conn->query($sql);
            //Num of Users = $result->num_rows
            if ($result->num_rows > 0) {
                $total_users = $result->num_rows;
                while($row = $result->fetch_assoc()) {
                    $sql_user_products = "SELECT * from tbl_rating where user_id=".$row['user_id']." AND nama_penyakit='".$product."'";
                    $result_user_products = $conn->query($sql_user_products);
                    if ($result_user_products->num_rows > 0) {
                        while($row_user_products = $result_user_products->fetch_assoc()) {
                            $array_of_users_products[$product][$row['username']] = $row_user_products['rating'];
                            $total += $row_user_products['rating'];
                        }
                    }else
                        $array_of_users_products[$product][$row['username']] = 0;
                }

                $array_of_users_products[$product]['total'] = $total;
                $array_of_users_products[$product]['average'] = $array_of_users_products[$product]['total'] / count($products);
            }
        }
    }
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
  <link rel="stylesheet" href="css/body.css">

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
      <img src="img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <h1><b>HASIL PERHITUNGAN RATING</b></h1>
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
    
               
                   
          <?php
          foreach($array_of_users_products as $key => $row){
          foreach($row as $key1 => $datauser){
          ?>
                    
                    <?php }
                    break;

                } ?>  
               <?php 
               foreach($array_of_users_products as $key => $row){
               ?>
                
               <?php
                foreach($row as $column){
             
                ?>
                 

                <?php
             }
             ?>
             <?php
           }
                ?>                      
                





                <?php
                  $array_of_users_products_normalize = [];
                  foreach($array_of_users_products as $user => $user_products){
                      foreach($user_products as $product => $user_product){
                          if ($product == "total" || $product == "average")
                              continue;
                          $array_of_users_products_normalize[$user][$product] = $user_product - $user_products['average'];
                      }
                  }
                  ?>

                <?php
                foreach($array_of_users_products_normalize as $key => $row){
                                    foreach($row as $key1 => $datauser){
                                      
                                    ?>
                                    
                                    <?php
                                    }
                                    break;
                                }
                ?>  
                  
               <?php 
        foreach($array_of_users_products_normalize as $key => $row){
               ?> 
               <?php
            foreach($row as $column){
             
                ?>
                <?php
             }
             ?>
             <?php
           }
                ?>                 
                 





                <?php    
                $array_of_users_products_square_and_square_roots = [];
                foreach($array_of_users_products_normalize as $product => $user_products){
                    $sum = 0;
                    foreach($user_products as $user => $user_product){
                        if ($product == "total" || $product == "average")
                            continue;
                        $array_of_users_products_square_and_square_roots[$product][$user] = pow($array_of_users_products_normalize[$product][$user],2);
                        $sum += pow($array_of_users_products_normalize[$product][$user],2);
                    }
                    $array_of_users_products_square_and_square_roots[$product]['sum'] = $sum;
                    $array_of_users_products_square_and_square_roots[$product]['square_root'] = sqrt($sum);
                }
                ?>

               
                <?php
                foreach($array_of_users_products_square_and_square_roots as $key => $row){
                                      foreach($row as $key1 => $datauser){

                                    ?>
                                    <?php
                                                       }
                    break;
                }
 
                ?>  
                  </tr>
                  </thead>
                    <tbody>
                         <?php 
        foreach($array_of_users_products_square_and_square_roots as $key => $row){
                         ?>
                         <?php
                      foreach($row as $column){
                       
                          ?>
                          <?php
                       }
                       ?>
                       <?php
                     }
                          ?>                 
                




                <?php
                $array_of_users_products_similarity = [];
                $array_of_users_products_similarity_abs = [];
                    foreach($products as $product){
                        $sum = 0;
                        foreach($products as $key_product => $product2){
                            $similarity = 0;
                            if($product == $product2){
                                $similarity = 1;
                            }
                            
                            else{
                                foreach($array_of_users_products_normalize as $key => $data){
                                    foreach($data as $key2 => $data2){
                                        $similarity += $array_of_users_products_normalize[$product][$key2] * $array_of_users_products_normalize[$product2][$key2];
                                    }
                                    break;
                                }
                                
                                $pembagi_1 = $array_of_users_products_square_and_square_roots[$product]['square_root'];
                                $pembagi_2 = $array_of_users_products_square_and_square_roots[$product2]['square_root'];

                                $similarity = ($similarity / ($pembagi_1 * $pembagi_2));
                            }
                            $array_of_users_products_similarity[$product][$product2] = $similarity;
                            $array_of_users_products_similarity_abs[$product][$product2] = abs($similarity);
                            $sum += abs($similarity);
                        }
                        $array_of_users_products_similarity_abs[$product]['sum'] = $sum;
                    }
                ?>

                <?php
                foreach($array_of_users_products as $key => $row){                                  
                                    ?>
                                    <?php
                                    }                                
                                    ?>
                         <?php 
        foreach($array_of_users_products_similarity as $key => $row){
                         ?> 
                         <?php
                      foreach($row as $column){
                       
                          ?>
                          <?php
                       }
                       ?>
                       <?php
                     }
                          ?>                 
                          





                <?php
                foreach($array_of_users_products as $key => $row){
                                    ?>
                                    <?php
                                    }                                
                ?>
                <?php 
        foreach($array_of_users_products_similarity_abs as $key => $row){
                         ?>
                         <?php
                      foreach($row as $column){
                       
                          ?>
                          <?php
                       }
                       ?>
                       <?php
                     }
                          ?>                 
                          



                <?php
                $array_of_prediction = [];
                $array_of_prediction_abs = [];
                $list_users = [];
                foreach($array_of_users_products as $key => $row){
                foreach($row as $key_user => $user){
                    if($key_user == "total" || $key_user == "average")
                        continue;
                    $list_users[] = $key_user;
                }
                break;
                }
    //user
    foreach($list_users as $user){
        
        //item
        foreach($array_of_users_products as $key => $row){
            $total_abs = 0;
            $total_prediction = $row['average'];
            $total_sum = 0;
            $total_bottom = 0;
            foreach($array_of_users_products as $key_1 => $row){
                $total_sum += $array_of_users_products_normalize[$key_1][$user] * $array_of_users_products_similarity[$key][$key_1];
                $total_bottom += $array_of_users_products_similarity_abs[$key][$key_1];
            }
            
            $total_bottom = ($total_bottom == 0 ) ? 1 : $total_bottom;
            $array_of_prediction[$key][$user] = $total_prediction + ($total_sum/$total_bottom);
            $array_of_prediction_abs[$key][$user] = ($total_prediction + ($total_sum/$total_bottom));
            $total_abs += $total_prediction + ($total_sum/$total_bottom);
          
            if (isset($array_of_prediction_abs[$key]['total']))
                $array_of_prediction_abs[$key]['total'] += $total_abs;
            else
                $array_of_prediction_abs[$key]['total'] = $total_abs;
        }
       
    }
                ?>

                <?php
                foreach($array_of_users_products as $key => $row) {
                    foreach($row as $key1 => $datauser){
                        if($key1 == "total" || $key1 == "average")
                            continue;                                    
                          ?>
                          <?php
                                    }
                    break;
                }                                
                ?>
                <?php 
    foreach($array_of_prediction_abs as $key => $row){
                         ?>
                         <?php
        foreach($row as $key_column => $column){
                      if($key_column == "total")
                      continue;
                          ?>
                          <?php
                       }
                       ?>
                       <?php
                     }
                          ?>






                <?php
                $array_of_mae = [];
                foreach($array_of_prediction as $key => $predict){
                    $abs = 0;
                foreach($predict as $data_predict => $pred){
                    $abs += abs($pred-$array_of_users_products[$key][$data_predict]);
                }
                $array_of_mae[$key] = ($abs/ (count($list_users) == 0 ? 1 : count($list_users)));
                }
    
                ?>

                
                  
                 <table id="normalisasi" class="table table-bordered table-hover">   
                 </table>        
                <?php
                foreach($array_of_mae as $key => $row){
                          ?>

                          
                                    <?php
                                    }
                ?>   
                           



                <?php    
                arsort($array_of_mae);

                ?>

                  <table id="normalisasi" class="table table-bordered table-hover">
                 
                  <thead>
                  <tr>
                    <th style="text-align: center;">Nama Penyakit</th>
                  </tr>
                  </thead>
                    <tbody>
                         
                <?php
    $average = 0;
    foreach($array_of_mae as $key => $row){
                          ?>

                          <tr>
            <?php echo "<td style='text-align: center';><a href='solusi.php?id=$key'>".$key."</td>"; ?>

                                    
                          </tr>
                                    <?php

                                      $average += $row;
                                    }

                 $conn->close();
                ?>   
                           </tbody>
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
    var t = $('#pemetaan').DataTable( {
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
  $(document).ready(function() {
    var t = $('#normalisasi').DataTable( {
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
