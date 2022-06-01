<?php
require("connect.php");
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  if($name == 'admin' && $password == "1234"){
    $_SESSION['name'] = $name;
    header("location:home.php");
  }else{
    echo "Try again !!!";
  }
}

?>