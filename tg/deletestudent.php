<?php


include "dbconfigure.php";
@session_start();
$u = $_SESSION['sun'];

$id=$_GET['id'];


$query = "delete from student where enrollmentno='$id'";
$n = my_iud($query);
//echo "$n record removed";  
header("Location:viewstudent.php");
?>