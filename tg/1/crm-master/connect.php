<?php

$con = new mysqli("localhost","root","","crm");
if(!$con){
	die("Error".mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  	.col-sm-3{background-color: #DADCDC;width: 100%;height: 600px;padding: 20px 0px 20px 30px; text-align: center;}
    .col-sm-3 ul{margin-top: 14%;}
  	.col-sm-3 ul li a{color: #2D7495; padding-top: 5%;font-size: 25px;}
  	.col-sm-3 ul li a:hover{background-color: #EFEEE9;color: red;}
  	.col-sm-9{background-color: #2D7495;}
  	.col-sm-9 form{width: 90%;margin-right: 10%;}
    h3{color: white;padding: 10px 0px 10px 0px;font-size: 40px;width: 95%;margin-right: 5%;
      background-image: linear-gradient(to right, #2D7495,black,#2D7495); }
    .col-sm-9 table{width: 95%;margin-right: 5%;color: white;}
    .col-sm-9 table a{color: #41CB3E;}
  </style>
</head>
<body></body></html>