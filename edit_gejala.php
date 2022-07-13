 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_gejala'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_gejala = ($_GET["id_gejala"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tbl_gejala WHERE id_gejala='$id_gejala'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='gejala.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='gejala.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>GEJALA</title>
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
        <h1>Edit gejala <?php echo $data['id_gejala']; ?></h1>
      <center>
      <form method="POST" action="proses_edit_gejala.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_gejala" value="<?php echo $data['id_gejala']; ?>"  hidden />
        <div>
          <label>id</label>
          <input type="text" readonly value="<?php echo $data['id_gejala']; ?>" name="id_gejala" value="<?php echo $data['id_gejala']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>bagian</label>
         <input type="text" name="bagian" value="<?php echo $data['bagian']; ?>" />
        </div>
        <div>
          <label>keterangan</label>
         <input type="text" name="keterangan" required=""value="<?php echo $data['keterangan']; ?>" />
        </div>
        
        <div>
          <label>Gambar</label>
          <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>