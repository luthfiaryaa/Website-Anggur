<?php  
session_start();//session starts here  
  
?>
<script language="javascript">
function validasi(){
 var user= document.getElementById('username').value;
 var pass= document.getElementById('password').value;
 if(user.replace(/^\s+|\s+$/g, '')==''){
  alert('Username harus diisi');
  return false;
 } 
 if(pass.replace(/^\s+|\s+$/g, '')==''){
  alert('Password harus diisi');
  return false;
 }
 return true;
}
</script>  
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistem Pakar</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        
        <div class="login-form">
            <form action="ceklogin.php" method="post">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input  name="username" id="username"  type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input name="password"  id="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input type="submit" onClick="return validasi()" name="login" class="button" value="Sign In">
                </div>
            </div>
        </form>
            <form action="pdaftar.php" method="POST">
            <div class="sign-up-htm">
                <div class="group">
                    <label for="user" class="label">Nama</label>
                    <input id="user" name="nama" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" name="username" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="password" type="password" class="input" data-type="password">
                </div>
               
                <div class="group">
                    <input type="submit" name= "daftar" class="button" value="Sign Up">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Sudah Punya Akun?</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- partial -->
  
</body>
</html>
