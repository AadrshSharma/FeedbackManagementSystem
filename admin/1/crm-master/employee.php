<?php
require("connect.php");
session_start();
if($_SESSION['name']){

}else{
	header("index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form{width: 90%;margin: auto;}
	</style>
</head>
<body>
<div class="row">
	<div class="col-sm-3">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a href="home.php">Home</a>
			</li>
			<li class="nav-item">
				<a href="employee.php" class="nav-link" style="background-color: #2D7495;color: white;">Add Employee</a>
			</li>
			<li class="nav-item">
				<a href="viewemp.php" class="nav-link">View Employee</a>
			</li>
			<li class="nav-item">
				<a href="editemp.php" class="nav-link">Edit Employee</a>
			</li>
			<li class="nav-item">
				<a href="deleteemp.php" class="nav-link">Delete Employee</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
		</ul>
	</div>
	<div class="col-sm-9">
		<h3 class="text-center">Add Employee</h3>
		<form method="POST">
			<div class="form-group">
				<label for="e_name"></label>
				<input type="text" name="e_name" required="" placeholder="Enter Employee Name" class="form-control">
			</div>
			<div class="form-group">
				<label for="e_contact"></label>
				<input type="number" name="e_contact" required="" placeholder="Enter Contact" class="form-control">
			</div>
			<div class="form-group">
				<label for="e_email"></label>
				<input type="email" name="email" required="" placeholder="Enter Email Id" class="form-control">
			</div>
			<div class="form-group">
				<label for="e_region"></label>
				<input type="text" name="e_region" required="" placeholder="Enter region" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">ADD</button>
		</form>
	</div>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$e_name = mysqli_real_escape_string($con,$_POST['e_name']);
	$e_contact = mysqli_real_escape_string($con,$_POST['e_contact']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$e_region = mysqli_real_escape_string($con,$_POST['e_region']);
	$sql = mysqli_query($con,"INSERT INTO employee(e_name,e_contact,e_mail,e_region)VALUES('$e_name','$e_contact','$email','$e_region')");
	if($sql){
		echo "<h2 style='margin:3% 0% 0% 15%;color:green;'>Successfully Added...</h2>";
	}else{
		echo "Error: ".mysqli_error($con);
		echo "<script type='text/javascript'>alert('Something Wrong');</script>";
	}
}

?>