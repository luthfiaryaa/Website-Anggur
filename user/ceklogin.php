<?php
include ('koneksi.php');
session_start();
if(isset($_POST['login']))  
{  
    
$username = $_POST['username'];
$password = $_POST['password'];
  
    $check_user="select * from users WHERE username='$username'AND password='$password'";  
  
    $run=mysqli_query($conn, $check_user);  

    if(mysqli_num_rows($run))  
    {  
        
        echo "<script>window.open('dashboard.php','_self')</script>";  
        $_SESSION['username']    = $username;            
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";
      echo "<script>window.open('login.php','_self')</script>";    
    }  
}  
?>  
