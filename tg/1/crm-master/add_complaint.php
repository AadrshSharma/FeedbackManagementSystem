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
				<a href="home.php" class="nav-link">Home</a>
			</li>
			<li class="nav-item">
				<a href="add_complaint.php" class="nav-link" style="background-color: #2D7495;color: white;">Add Complaint</a>
			</li>
			<li class="nav-item">
				<a href="solve_complaint.php" class="nav-link">Solve Complaint</a>
			</li>
			<li class="nav-item">
				<a href="view_complaint.php" class="nav-link">View Complaints</a>
			</li>
			<li class="nav-item">
				<a href="emp_report.php" class="nav-link">View Employee Report</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
		</ul>
	</div>
	<div class="col-sm-9">
		<h3 class="text-center">Add Complaint</h3>
		<form method="POST">
			<div class="form-group">
				<select name="cm_id" class="form-control" required="">
					<option>Select Customer Id</option>
					<?php
						$sql = mysqli_query($con,"SELECT c_id from customer");
						while($row = mysqli_fetch_array($sql)){
							echo '<option value="'.$row['c_id'].'">'.$row['c_id'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="p_name"></label>
				<textarea class="form-control" rows="8" name="cm_name" placeholder="Write your Complaint..." required=""></textarea>
			</div>
			<div class="form-group">
				<input type="date" name="cm_date" required="" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Add Complaint</button>
		</form>
	</div>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$cm_id = $_POST['cm_id'];
	$cm_name = mysqli_real_escape_string($con,$_POST['cm_name']);
	$cm_date = mysqli_real_escape_string($con,$_POST['cm_date']);
	$solution = "Unsolverd";
	$sql = mysqli_query($con,"INSERT INTO complaint(customer_id,complaint,com_date,com_solution)VALUES('$cm_id','$cm_name','$cm_date','$solution')");
	if($sql){
		echo "<h2 style='margin:3% 0% 0% 15%;color:green;'>Complaint Successfully Added...</h2>";
	}else{
		echo "Error: ".mysqli_error($con);
		echo "<script type='text/javascript'>alert('Something Wrong');</script>";
	}
}

?>