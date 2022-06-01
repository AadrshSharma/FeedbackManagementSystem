<?php 
ob_start();
?>
<html>
<head>
<?php
include "top.php";
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css1/bootstrap.css" media="all" />
<script src = js1/bootstrap.min.js></script>
<script src = js1/jquery-3.2.1.min.js></script>
</head>
<body>


				<div class="container" style = "margin-left : 210px">
  <h2 class = text-center>ADD TG</h2>
<form method="post">


<div class="form-group col-xs-12">
<label >TG Name</label>
<input type="text" name="tgname" id="tgname" class="form-control" >

<label >Password</label>
<input type="password" name="password" id="password" class="form-control" >

<label>Sem</label>
<select name = sem>
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
</select>


<label>Department</label>
<select name = branch>
<option value = "CS">CS</option>
<option value = "EC">EC</option>
<option value = "EX">EX</option>
<option value = "ME">ME</option>
<option value = "CE">CE</option>
<option value = "IT">IT</option>
</select>



<label>Course</label>
<select name = course>
<option value = "BE">BE</option>
<option value = "Diploma">Diploma</option>
</select>



<br>
<label>Contact</label>
<input type="text" name="contact"  id="contact" class="form-control" >


<input type="submit" class="btn btn-default" name="save"  value="Save"/>
<input type="submit" class="btn btn-default" name="search"  id = "search" value="Search">
</div>
</form>
</div>

<?php

//include "dbconfigure.php" ;
if(isset($_POST["save"]))
{

$tgname=$_POST['tgname'];
$password=$_POST['password'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$course=$_POST['course'];
$contact=$_POST['contact'];



$query="insert into tg(tgname,password,sem,branch,course,contact) values('$tgname','$password','$sem','$branch','$course','$contact')";
$n = my_iud($query);
header("location:viewtg.php");
//echo "<script>alert('SuccessFully saved')</script>";

}








?>





	
			</body>
</html>


</div>
<!--<?php  include "bottom.php "?>-->
</body>
</html>