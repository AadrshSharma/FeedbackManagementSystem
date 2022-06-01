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
				<a href="solve_complaint.php" class="nav-link" style="background-color: #2D7495;color: white;">Solve Complaint</a>
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
		<h3 class="text-center">Solution !!!</h3>
				<?php
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT complaint  FROM complaint WHERE customer_id = '$id'");
				$row = mysqli_num_rows($sql);
				while($row = mysqli_fetch_array($sql)){
					?>
		<form method="post" action="add_solution.php">
			<div class="form-group">
				<input type="text" name="id" class="form-control" readonly="" value="<?php echo $id;  ?>">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="10" name="solution" placeholder="Solution....."></textarea>
			</div>
			<button type="submit" class="btn btn-dark">Add Solution</button>
		</form>
		<?php }; ?>
	</div>
</div>
</body>
</html>



