<?php 
ob_start();
$sid=$_GET['id'];
?>
<html>
<head>
<?php
include "navigationbar2.php";
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css1/bootstrap.css" media="all" />
<script src = js1/bootstrap.min.js></script>
<script src = js1/jquery-3.2.1.min.js></script>
</head>
<body>

<?php 
include "dbconfigure.php";
$fid = $_GET['fid'];
$fquery = "select * from faculty where id='$fid'";
$frs = my_select($fquery);
$frow=mysqli_fetch_array($frs);

$sid = $_GET['id'];
$squery = "select * from student where enrollmentno='$sid'";
$srs = my_select($squery);
$srow=mysqli_fetch_array($srs);
?>


				<div class="container" style = "margin-left : 210px ; margin-top : 50px">
  <h2 class = text-center>Give Feedback</h2>
<form method="post">


<div class="form-group col-xs-12">
<label>Faculty Name</label>
<input type="text" name="fname" id="fname" value="<?php echo $frow[1] ?>" class="form-control" readonly>

<label>Subject Code</label>
<input type="text" name="subjectcode" id="subjectcode" value= "<?php echo $frow[2] ?>" class="form-control" readonly>

<br>
<label>Behavior</label>
<select name = grade1 >
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
</select>


<br>
<label>Punctuality</label>
<select name = grade2 >
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
</select>



<br>
<label>Subject knowledge</label>
<select name = grade3>
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
</select>
<br>
<label>Way of Teaching</label>
<select name = grade4>
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
</select>
<br>
<input type="submit" class="btn btn-primary" name="submit"  value="Submit"/>

</div>
</form>
</div>

<?php

//include "dbconfigure.php" ;
if(isset($_POST["submit"]))
{

$fname=$_POST['fname'];
$subjectcode=$_POST['subjectcode'];
$grade1=$_POST['grade1'];
$grade2=$_POST['grade2'];
$grade3=$_POST['grade3'];
$grade4=$_POST['grade4'];

$total = $grade1 + $grade2 + $grade3 + $grade4;
$date = date("d-m-y");

$query="insert into feedback(feedbackgrade,facultyname,subjectid,fdate,studentid) values('$total','$fname','$subjectcode','$date','$sid')";
$n = my_iud($query);
header("location:addfeedback.php");
//echo "<script>alert('SuccessFully saved')</script>";
}








?>





	
			</body>
</html>


</div>
<!--<?php  include "bottom.php "?>-->
</body>
</html>