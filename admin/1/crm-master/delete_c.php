<?php
require("connect.php");
session_start();
if($_SESSION['name']){

}else{
	header("index.php");
}
$id = $_GET['id'];
$sql = mysqli_query($con,"DELETE FROM customer where c_id = '$id'");
if($sql){
	header("location:delete_customer.php");
}else{
	echo "Something Wrong...";
}
?>