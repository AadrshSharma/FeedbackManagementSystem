<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content = "IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="css/bootstrap.min.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script type = text/javascript src="js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<?php
/*
on authentic page, only valid users of website can visit
strangers(anonymous) are not allowed
*/
@session_start();
include_once "dbconfigure.php";
$msg="";
if(verifyuser())
{
if(fetchrole()=='customer')
	{
	$un=fetchusername();
	$msg="Welcome $un , <br /><a href='signout.php'>Signout</a>";
	}
	else
	{
header("Location:loginerror.php");
	}
}
else
{
header("Location:loginerror.php");
}
?>

<body>
<?php    include "navigationbar2.php"; ?>
<div style = "margin-top : 80px">
<?php
echo $msg;

?>
</div>	
<div class = container>
<?php 
$query = "select * from siteuser where username='$un'";
$rs = my_select($query);
echo "<div class='table-responsive'>";
echo "<table class='table table-hover table-borderless'>";
while($column=mysqli_fetch_array($rs))
{
echo "<tr><th>UserName</th> <td>$column[0]</td></tr>";
echo "<tr><th>Date of Birth</th> <td>$column[2]</td></tr>";
echo "<tr><th>City</th> <td>$column[3]</td></tr>";
echo "<tr><th>Address</th> <td>$column[4]</td></tr>";
echo "<tr><th>Email ID</th> <td>$column[5]</td></tr>";
echo "<tr><th>Contact Number</th> <td>$column[6]</td></tr>";
}
echo "</table>";
echo '<form method = post><input type = submit value = "Edit Profile" class="btn btn-primary" name="edit"></form>';
?>

</div>
<?php  //include "bottom.php"; ?>
<?php
if(isset($_POST['edit']))
{
header("Location:editprofile.php");
}
?>
</body>
</html>