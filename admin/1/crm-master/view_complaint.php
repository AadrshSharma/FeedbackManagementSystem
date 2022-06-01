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
				<a href="view_complaint.php" class="nav-link" style="background-color: #2D7495;color: white;">View Complaints</a>
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
		<h3 class="text-center">View Complaint</h3>
		<table class="table table-bordered table-hover text-center">
			<thead class="thead-dark">
				<th>Customer_ID</th>
				<th>Customer_Name</th>
				<th>Complaint</th>
				<th>Date</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($con,'SELECT customer.c_name,complaint.customer_id,complaint.complaint,complaint.com_date,complaint.com_solution FROM complaint	INNER JOIN customer on complaint.customer_id = customer.c_id');
				$row = mysqli_num_rows($sql);
				while($row = mysqli_fetch_array($sql)){
					echo '
						<tr>
						  <td>'.$row['customer_id'].'</td>
						  <td>'.$row['c_name'].'</td>
						  <td>'.$row['complaint'].'</td>
						  <td>'.$row['com_date'].'</td>
						  <td>'.$row['com_solution'].'</td>
						</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>




