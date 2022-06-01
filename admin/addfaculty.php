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
  <h2 class = text-center>ADD Faculty</h2>
<form method="post">


<div class="form-group col-xs-12">
<label >Faculty Name</label>
<input type="text" name="fname" id="fname" class="form-control" >

<label >Subject Name</label>
<input type="text" name="subjectname" id="subjectname" class="form-control" >


<label >Subject Code</label>
<input type="text" name="subjectcode" id="subjectcode" class="form-control" >

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




<input type="submit" class="btn btn-default" name="save"  value="Save"/>

</div>
</form>
</div>

<?php

//include "dbconfigure.php" ;
if(isset($_POST["save"]))
{
$fname=$_POST['fname'];
$subjectname=$_POST['subjectname'];
$subjectcode=$_POST['subjectcode'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];



$query="insert into faculty(fname,subjectname,subjectcode,sem,branch) values('$fname','$subjectname','$subjectcode','$sem','$branch')";
$n = my_iud($query);
header("location:viewfaculty.php");
//echo "<script>alert('SuccessFully saved')</script>";

}








?>





	
			</body>
</html>


</div>
<!--<?php  include "bottom.php "?>-->
</body>
</html>