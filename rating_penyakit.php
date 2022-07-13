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
          <label>ID User</label>
          <input type="text" name="id" readonly="" autofocus="" required="" value=" <?php echo $_SESSION['username']; ?>" />
        </div>
        <div>
          <label>Nama Penyakit</label>
         <select class="form-control" name="id_penyakit">
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

                            if ($tbl_penyakit==$row['id_penyakit'])
                            {
                                $ket="selected";
                            }
                        }
                        ?>
                        <option <?php echo $ket; ?> value="<?php echo $row['id_penyakit'];?>"><?php echo $row['nama_penyakit'];?></option>
                        <?php } ?>
                </select>
        </div>
        <div>
          <label>Rating</label>
         <input type="text" name="rating" />
        </div>
        <div>
         <button type="submit">Simpan</button>
        </div>
        </section>
      </form>
  </body>
</html>