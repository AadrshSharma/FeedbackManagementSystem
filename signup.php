<?php 
include "navigationbar1.php";
?>

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
        
        <title>Book Reselling</title>
</head>

<body>

<div class = "container" style = "margin-top : 100px">			
				<h1 class = text-center style = "font-family : 'Monotype Corsiva' ; color : #E6120E">SignUp</h1>
				
<form method="post">

<div class="form-group col-xs-4">
<label>Enter your Name <span style = "color : red">*</span></label>
<input type="text" name="username" class="form-control" required>

<label>Enter your password <span style = "color : red">*</span></label>
<input type="password" name="pwd" class="form-control" required>


<label>Date of Birth</label>
<input type="date" name="date" class="form-control">

<label>City <span style = "color : red">*</span></label>
<input type="text" name="city" class="form-control" required>


<label>Address</label>

<textarea name="address" class="form-control"></textarea>


<label>Email ID <span style = "color : red">*</span></label>
<input type = email name="emailadd" class="form-control" required>

<label>Contact Number <span style = "color : red">*</span></label>
<input type="text" name="smsno" class="form-control" required>

<input type="submit" name="save"  value="save" class = "btn btn-primary" class="form-control"/>
</div>
</form>
</div>
<?php

include "dbconfigure.php" ;
if(isset($_POST["save"]))
{
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$dob=$_POST['dob'];
$city=$_POST['city'];
$address=$_POST['address'];
$emailadd=$_POST['emailadd'];
$smsno=$_POST['smsno'];
$role="customer";
$query="insert into siteuser values('$username','$pwd','$dob','$city','$address','$emailadd','$smsno','$role')";
$n = my_iud($query);
echo "<br/>$n record saved" ;
}

?>


	
			</body>
</html>

