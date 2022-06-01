<?php
$dbserver="localhost";	//localhost
$dbuser="root";
$dbpwd="";
$dbname="efeedback";
$con=mysqli_connect("localhost","root","","efeedback") or die("connection failed");


function my_iud($query)//insert , update , delete
{
$con=mysqli_connect("localhost","root","","efeedback") or die("connection failed");

mysqli_query($con,$query);
$n=mysqli_affected_rows($con);
mysqli_close($con);
return $n;
}


function my_select($query)
{
$con=mysqli_connect("localhost","root","","efeedback") or die("connection failed");

$rs=mysqli_query($con,$query);
mysqli_close($con);
return $rs;
}

//to be used when sql query returns a single value
function my_one($query)
{
$con=mysqli_connect("localhost","root","","efeedback") or die("connection failed");

$rs=mysqli_query($con,$query);
$row=mysqli_fetch_array($rs);

mysqli_close($con);
return $row[0];
}


function verifyuser()
{
$u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from student where enrollmentno='$u' and password='$p'";
$n=my_one($query);
if($n==1)
{
return true;
}
else
{
return false;
}
}


function fetchusername()
{
$u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from student where enrollmentno='$u' and password='$p'";
$n=my_one($query);
if($n==1)
{
return $u;
}
else
{
return false;
}
}



function fetchrole()
{
$u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from siteuser where username='$u' and pwd='$p'";
$n=my_one($query);
if($n==1)
{
$query="select role from siteuser where username='$u' and pwd='$p'";
$role=my_one($query);
return $role;

}
else
{
return false;
}
}

function feedbackornot($s,$f)
{
$querya = "select * from feedback where studentid='$s' and facultyname='$f'";
$rsa = my_select($querya);
$i = 0;
while($resulta = mysqli_fetch_array($rsa))
{
$i++;
}
return $i;
}
?>