<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<?php 
    session_start();
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Rating Penyakit</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Rating Penyakit</h1>
      <center>
      <form method="POST" action="proses_tambah_rating.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama User</label>
          <input type="text" name="id" readonly="" autofocus="" required="" value=" <?php echo $_SESSION['username']; ?>" />
        <div>
         <select class="form-control" name="user_id" hidden="">
                        <?php
                        include "koneksi.php";
                        $aa = $_SESSION['username'];
                        //Perintah sql untuk menampilkan semua data pada tabel 
                        $query="SELECT user_id, username FROM users WHERE username = '$aa'";

                        $result=mysqli_query($conn, $query);                     
                        while ($row = mysqli_fetch_array($result)) {
                        
                        $ket="";
                        if (isset($_GET['users'])) {
                            $users = trim($_GET['users']);

                            if ($users==$row['user_id'])
                            {
                                $ket="selected";
                            }
                        }
                        ?>
                        <option <?php echo $ket; ?> value="<?php echo $row['user_id'];?>"><?php echo $row['user_id'];?></option>
                        <?php } ?>
                </select>
        </div>
        <div>
          <label>Nama Penyakit</label>
         <select class="form-control" name="nama_penyakit">
                        <?php
                        include "koneksi.php";
                        //Perintah sql untuk menampilkan semua data pada tabel 
                        $query="select * from tbl_penyakit";

                        $result=mysqli_query($conn, $query);
                        $no=0;
                        while ($row = mysqli_fetch_array($result)) {
                        $no++;

                        $ket="";
                        if (isset($_GET['tbl_penyakit'])) {
                            $tbl_penyakit = trim($_GET['tbl_penyakit']);

                            if ($tbl_penyakit==$row['nama_penyakit'])
                            {
                                $ket="selected";
                            }
                        }
                        ?>
                        <option <?php echo $ket; ?> value="<?php echo $row['nama_penyakit'];?>"><?php echo $row['nama_penyakit'];?></option>
                        <?php } ?>
                </select>
        </div>
        <div>
          <label>Rating</label>
         <input type="text" name="rating" placeholder="Masukkan 1 - 5" />
        </div>
        <div>
         <button type="submit">Simpan</button>
        </div>
        </section>
      </form>
  </body>
</html>