 <html>
<head>
<?php
include "navigationbar2.php";
session_start();
$u = $_SESSION['sun'];
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel=stylesheet type = text/css href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
  $(document).ready(function () {
$('#myTable123').DataTable();
$('.dataTables_length').addClass('bs-select');
});

  </script>
</head>
<body>




				<div class="container">
				    <div class=row>
				        <div class="col-sm-12">
  <h2 class = text-center style = "font-family : 'Monotype Corsiva' ; color : #E6120E">Add Feedback</h2>



</div>
    
</div>
</div>
<?php
include "dbconfigure.php" ;




$query1 = "select sem from student where enrollmentno='$u'";
$rs1 = my_select($query1);
$result = mysqli_fetch_array($rs1);
//echo $result[0];
$query = "select * from faculty where sem='$result[0]'";
$rs = my_select($query);

echo "<div class = container>";
 
echo "<div class = row>";
echo "<div class = col-sm-12>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover table-sm' style = 'overflow: scroll' id=myTable123>";
echo "<thead style = 'background-color : green ; color : white' >";
echo "<tr>";

echo "<th>Faculty Name</th>";
echo "<th>Subject Name</th>";
echo "<th>Subject Code</th>";
echo "<th>Sem</th>";
echo "<th>Branch</th>";
echo "<th>Feedback</th>";
echo "</tr>";
echo "</thead>";

echo '<tbody id="myTable">';
while($column=mysqli_fetch_array($rs))
{
echo "<tr class='table-warning'>";
echo "<td>$column[1]</td>";
echo "<td>$column[2]</td>";
echo "<td>$column[3]</td>";
echo "<td>$column[4]</td>";
echo "<td>$column[5]</td>";

if(feedbackornot($u,$column[1])==1)
{
echo '<td><a href="#" class="btn btn-success">
													Feedback Already Sent
													</a></td>';
}
else
{																					
echo '<td><a href="givefeedback.php?fid='.$column[0].'&id='.$u.'" class="btn btn-primary">
													Give Feedback
													</a></td>';
																}


																
												
echo "</tr>";

}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";






?>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>




<!--<?php  //include "bottom.php "?>-->
</body>
</html>