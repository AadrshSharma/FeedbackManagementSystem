<?php


include "dbconfigure.php";
@session_start();
$u = $_SESSION['sun'];

$id=$_GET['id'];


$query = "delete from tg where id=$id";
$n = my_iud($query);
//echo "$n record removed";  
header("Location:viewtg.php");
?>