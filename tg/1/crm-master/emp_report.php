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
				<a href="add_complaint.php" class="nav-link">Add Complaint</a>
			</li>
			<li class="nav-item">
				<a href="solve_complaint.php" class="nav-link">Solve Complaint</a>
			</li>
			<li class="nav-item">
				<a href="view_complaint.php" class="nav-link">View Complaints</a>
			</li>
			<li class="nav-item">
				<a href="emp_report.php" class="nav-link" style="background-color: #2D7495;color: white;">View Employee Report</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
		</ul>
	</div>
    <div class="col-sm-9">
		<h3 class="text-center">Employee Report</h3>
		<?php include_once("report.php"); ?>
	</div>
</div>
</body>
</html>



