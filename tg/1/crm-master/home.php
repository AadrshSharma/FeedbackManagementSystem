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
</head>
<body>
<div class="row">
	<div class="col-sm-3">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a href="#" class="nav-link"   style="background-color: #2D7495;color: white;">Create Plan</a>
			</li>
			<li class="nav-item">
				<a href="employee.php" class="nav-link">Employee</a>
			</li>
			<li class="nav-item">
				<a href="add_customer.php" class="nav-link">Customer</a>
			</li>
			<li class="nav-item">
				<a href="add_complaint.php" class="nav-link">Complaints</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
		</ul>
	</div>
	<div class="col-sm-9">
		<h3 class="text-center">Create Plan</h3>
		<form method="POST">
			<div class="form-group">
				<label for="p_name"></label>
				<input type="text" name="p_name" required="" placeholder="Enter Plan Name" class="form-control">
			</div>
			<div class="form-group">
				<label for="p_speed"></label>
				<input type="text" name="p_speed" required="" placeholder="Enter Speed Limits" class="form-control">
			</div>
			<div class="form-group">
				<label for="p_cost"></label>
				<input type="text" name="p_cost" required="" placeholder="Enter Cost" class="form-control">
			</div>
			<div class="form-group">
				<label for="p_duration"></label>
				<input type="text" name="p_duration" required="" placeholder="Enter Duration in Days" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Create</button>
		</form>
	</div>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$p_name = mysqli_real_escape_string($con,$_POST['p_name']);
	$p_speed = mysqli_real_escape_string($con,$_POST['p_speed']);
	$p_cost = mysqli_real_escape_string($con,$_POST['p_cost']);
	$p_duration = mysqli_real_escape_string($con,$_POST['p_duration']);
	$sql = mysqli_query($con,"INSERT INTO plan(p_name,p_speed,p_cost,p_duration)VALUES('$p_name','$p_speed','$p_cost','$p_duration')");
	if($sql){
		echo "<h2 style='margin:3% 0% 0% 15%;color:green;'>Plan Successfully Added...</h2>";
	}else{
		echo "Error: ".mysqli_error($con);
		echo "<script type='text/javascript'>alert('Something Wrong');</script>";
	}
}

?>