<?php 
include "top.php";
//include "dbconfigure.php";
?>

<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel=stylesheet type = text/css href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
        <title>E Feedback System</title>
</head>

<body>

<div class = "container" style = "margin-top : 30px ;">			
				<h1 class = text-center style = "font-family : 'Monotype Corsiva' ; color : purple ;"><b>ADD Student List File</b></h1>
				
<form method="post" enctype = multipart/form-data>

<div class=col-xs-3>

</div>

<div class="form-group col-xs-6" style = "background-color :#570061 ; color : white ; border-radius: 10px;">
<label>Select File <span style = "color : red">*</span></label>
<input type="file" name = myfile class="form-control" required>




<input type="submit" name="submit"  value="submit" class = "btn btn-danger" class="form-control"/>
</div>
</form>
</div>

<div class=col-xs-3>

</div>

<?php
require_once "Classes/PHPExcel.php";
///////////////////////

if(isset($_POST['submit']))
{
$name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$size = $_FILES['myfile']['size'];
$type = $_FILES['myfile']['type'];

if(!empty($name))
{
$location = "excel/";
if(move_uploaded_file($tmp_name,$location.$name))
{
echo "<center><div class='text-center'>File Uploaded Successfully</div></center>";

////////////////////////////
$tmpfname = $location.$name;

//$username = $_POST['username'];
//$date = $_POST['date'];
//$time = $_POST['time'];
//$remark = $_POST['remark'];

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		//$lastRow = $worksheetData[0]['totalRows'];;
		$lastRow = $lastRow = $worksheet->getHighestDataRow();;
	

		for ($row = 3; $row <= $lastRow; $row++) {
			 
			 $enrollmentno = $worksheet->getCell('C'.$row)->getValue();
			 
			 $password = $worksheet->getCell('D'.$row)->getValue();
			$sem = $worksheet->getCell('E'.$row)->getValue();
			 $branch = $worksheet->getCell('F'.$row)->getValue();
			 $contact = $worksheet->getCell('G'.$row)->getValue();
			 $attendance = $worksheet->getCell('H'.$row)->getValue();
			 
	
			if($enrollmentno==null)
			{
			break;
			}
			else
			{
		
$query = "INSERT INTO student(enrollmentno,password,sem,branch,contact,attendance) values('$enrollmentno','$password','$sem','$branch','$contact','$attendance') ON DUPLICATE KEY UPDATE enrollmentno = VALUES(enrollmentno),password = VALUES(password),sem = VALUES(sem),branch = VALUES(branch),contact = VALUES(contact),attendance = VALUES(attendance)";				
			
my_iud($query); 

			 }
		}
		
echo "<center><div class='text-center'>Record Saved</div></center>";

}
else
{
echo "<center><div class='text-center'>Their was an error</div></center>";
}
}
else
{
echo "<center><div class='text-center'>Please Choose a file To Upload</div></center>";
}
}

///////////////////////



	
?>

</body>
</html>