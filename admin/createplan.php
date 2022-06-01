<html>
<head>
<?php
include "top.php";
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css1/bootstrap.css" media="all" />
<script src = js1/bootstrap.min.js></script>
<script src = js1/jquery-3.2.1.min.js></script>
</head>
<body>




				<div class="container">
  <h2 class = text-center>Create Plan</h2>
<form method="post">


<div class="form-group col-xs-4">
<label >Plan Name</label>
<input type="text" name="planname" id="planname" class="form-control" >
</div>

<div class="form-group col-xs-4">
<label>Speed Limit</label>
<input type="text" name="speedlimit" id="speedlimit" class="form-control" >
</div>

<div class="form-group col-xs-4">
<label>Cost</label>
<input type="text" name="cost" id="cost" class="form-control" >
</div>

<div class="form-group col-xs-4">
<label>Duration</label>
<input type="text" name="duration"  id="duration" class="form-control" >
</div>

<input type="submit" class="btn btn-default" name="save"  value="Save"/>
<input type="submit" class="btn btn-default" name="search"  id = "search" value="Search">

</form>
</div>

<?php

//include "dbconfigure.php" ;
if(isset($_POST["save"]))
{

$planname=$_POST['planname'];
$speedlimit=$_POST['speedlimit'];
$cost=$_POST['cost'];
$duration=$_POST['duration'];

//validation
if($planname=="" || $speedlimit=="" || $cost=="" || $duration=="" )
{
echo '<script>alert("Please fill all the required fields")</script>';
}
else
{
$query="insert into plan(planname,speedlimit,cost,duration) values('$planname','$speedlimit','$cost','$duration')";
$n = my_iud($query);
echo "<script>alert('SuccessFully saved')</script>";
}
}






$results_per_page = 2;

$query = "select * from plan";
$rs = my_select($query);
$number_of_results = mysql_num_rows($rs);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_REQUEST['page'])) {
  $page = 1;
} else {
  $page = $_REQUEST['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$query = 'select * from plan LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$rs = my_select($query);

if(isset($_REQUEST['search']) || isset($_REQUEST['page']))
{
echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<th>Plan ID</th>";
echo "<th>Name</th>";
echo "<th>Speed Limit</th>";
echo "<th>Cost</th>";
echo "<th>Duration</th>";
echo "</tr>";
while($column=mysqli_fetch_array($rs))
{

echo "<tr>";
echo "<td>$column[0]</td>";
echo "<td>$column[1]</td>";
echo "<td>$column[2]</td>";
echo "<td>$column[3]</td>";
echo "<td>$column[4]</td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="createplan.php?page=' . $page . '">' . $page . '</a> ';
}

}

?>





	
			</body>
</html>


</div>
<!--<?php  include "bottom.php "?>-->
</body>
</html>