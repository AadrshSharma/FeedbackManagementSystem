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
				<a href="editemp.php" class="nav-link"  style="background-color: #2D7495;color: white;">Edit Employee</a>
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
		<table class="table table-bordered table-hover text-center">
			<thead class="thead-dark">
				<th>Emp_id</th>
				<th>Emp_name</th>
				<th>Emp_contact</th>
				<th>Emp_email</th>
				<th>Emp_Region</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($con,"SELECT * FROM employee");
				while($row = mysqli_fetch_array($sql)){
					echo '
						<tr>
						  <td>'.$row['e_id'].'</td>
						  <td>'.$row['e_name'].'</td>
						  <td>'.$row['e_contact'].'</td>
						  <td>'.$row['e_mail'].'</td>
						  <td>'.$row['e_region'].'</td>
						  <td><a href="update_emp.php?id='.$row['e_id'].'">Edit</a></td>
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