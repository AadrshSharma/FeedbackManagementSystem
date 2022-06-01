<?php 
ob_start();
?>
<html>
<head>
<?php
include "top.php";

$un = $_SESSION['sun'];
$pwd = $_SESSION['spwd'];
$query = "select branch,sem from tg where tgname='$un' and password='$pwd'";
$rs = my_select($query);
$row = mysqli_fetch_array($rs);
$branch = $row['branch'];
?>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css1/bootstrap.css" media="all" />
<script src = js1/bootstrap.min.js></script>
<script src = js1/jquery-3.2.1.min.js></script>
</head>
<body>




				<div class="container" style = "margin-left : 210px">
  <h2 class = text-center>ADD Student</h2>
<form method="post">

<div class="form-group col-xs-4">




<label>Enrollment Number</label>
<input type="text" name="enrollmentno"  id="enrollmentno" class="form-control" >


<label>Password</label>
<input type="password" name="password" id="password" class="form-control" >



<label>Sem</label>
<input type="text" name="sem" id="sem" class="form-control" >

<label>Branch</label>
<input type="text" name="branch" id="branch" class="form-control" value="<?php echo $branch; ?>">

<label>Contact</label>
<input type="text" name="contact" id="contact" class="form-control" >

<label>Attendance</label>
<input type="text" name="attendance" id="attendance" class="form-control" >



<input type="submit" class="btn btn-default" name="save"  value="Save"/>

</div>
</form>
</div>

<?php

//include "dbconfigure.php" ;
if(isset($_POST["save"]))
{

$enrollmentno=$_POST['enrollmentno'];
$password=$_POST['password'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$contact=$_POST['contact'];
$attendance=$_POST['attendance'];



$query="insert into student(enrollmentno,password,sem,branch,contact,attendance) values('$enrollmentno','$password','$sem','$branch','$contact','$attendance')";
$n = my_iud($query);
header("location:viewstudent.php");
}





?>





	
			</body>
</html>


</div>
<!--<?php  include "bottom.php "?>-->
</body>
</html>