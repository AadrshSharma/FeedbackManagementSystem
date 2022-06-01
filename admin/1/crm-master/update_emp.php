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
				<a href="home.php">Home</a>
			</li>
			<li class="nav-item">
				<a href="employee.php" class="nav-link">Add Employee</a>
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
		<h3 class="text-center">Edit Employee</h3>
				<?php
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM employee where e_id = '$id'");
				$row = mysqli_fetch_array($sql);			
				?>
		<form method="POST">
			<div class="form-group">
				<label for="e_name"></label>
				<input type="text" name="e_name" required="" class="form-control" value="<?php echo $row['e_name'] ?>">
			</div>
			<div class="form-group">
				<label for="e_contact"></label>
				<input type="text" name="e_contact" required="" class="form-control" value="<?php echo $row['e_contact'] ?>">
			</div>
			<div class="form-group">
				<label for="e_email"></label>
				<input type="email" name="email" required="" class="form-control" value="<?php echo $row['e_mail'] ?>">
			</div>
			<div class="form-group">
				<label for="e_region"></label>
				<input type="text" name="e_region" required="" class="form-control" value="<?php echo $row['e_region'] ?>">
			</div>
			<button type="submit" class="btn btn-success">UPDATE</button>
		</form>
	</div>
</div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$e_name = mysqli_real_escape_string($con,$_POST['e_name']);
	$e_contact = mysqli_real_escape_string($con,$_POST['e_contact']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$e_region = mysqli_real_escape_string($con,$_POST['e_region']);
	$sql = mysqli_query($con,"
		UPDATE employee SET e_name='$e_name',e_contact = '$e_contact',e_mail = '$email',e_region = '$e_region' where e_id = '$id'");
	if($sql){
		header("location:editemp.php");
	}else{
		echo "Something Wrong".mysqli_error($con);
	}
}



?>