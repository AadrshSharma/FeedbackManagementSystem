<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

</head>
<body>
<?php include "navigationbar2.php" ?>
<div>
<?php
/*
on authentic page, only valid users of website can visit
strangers(anonymous) are not allowed
*/
@session_start();
$eno =  $_SESSION['sun'];
include_once "dbconfigure.php";
$msg="";
if(verifyuser())
{

	
}
else
{
header("Location:loginerror.php");
}
?>



<div class = container style = "margin-top : 100px">
<h2 class = text-center>Edit Profile</h2>
<?php 
$query = "select * from student where enrollmentno='$eno'";
$rs = my_select($query);
echo "<div class='table-responsive'>";
echo "<table class='table table-hover table-borderless'>";
while($column=mysqli_fetch_array($rs))
{
echo '<form method = post>';
echo "<tr><th>Enrollment Number</th> <td><input type = text name = 'enrollmentno' value = $column[0] readonly></td></tr>";
echo "<tr><th>Password</th> <td><input type = text name = 'pwd' value = $column[1] ></td></tr>";
echo "<tr><th>Sem</th> <td><input type = text name = 'sem' value = $column[2] readonly></td></tr>";
echo "<tr><th>Branch</th> <td><input type = text name = 'branch' value = $column[3] readonly></td></tr>";
echo "<tr><th>Contact</th> <td><input type = text name = 'contact' value = $column[4]></td></tr>";

}
echo "</table>";
echo '<input type = submit value = "Submit" class="btn btn-primary" name="edit"></form>';
?>

</div>
<?php  //include "bottom.php"; ?>
<?php
if(isset($_POST['edit']))
{
$enrollmentno = $_POST['enrollmentno'];
$pwd = $_POST['pwd'];
$contact = $_POST['contact'];

$query = "update student set password='$pwd',contact='$contact' where enrollmentno='$enrollmentno'";
my_iud($query);
header("Location:student_home.php");
}
?>










</body>
</html>