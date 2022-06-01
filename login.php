<?php
/*
on anonymous page, any one can visit
strangers(anonymous) are also allowed
*/
@session_start();
include "dbconfigure.php";
$msg="";
if(verifyuser())
{
$un=fetchusername();
$msg="Welcome $un , <br /><a href='signout.php'>Signout</a>";
}
else
{
$msg="Welcome Guest ,";
$msg.="<br/>Existing user <a href='signin.php'>Signin</a>";
$msg.="<br/>New user <a href='signup.php'>Signup</a>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content = "IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="css/bootstrap.min.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script type = text/javascript src="js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        
        <title>E Feedback System</title>
    </head>
    <body>
   
        
        
        
        
        
       <div class="container" style = "margin-top : 100px">
			<form method='post'>
                            
				
							<center><h1 style = "font-family : 'Monotype Corsiva' ; color : #E6120E">Student Login</h1></center>
						<div class="form-group">
							<label>EnrollmentNo.</label>
					
            <input type="text"   class="form-control" placeholder="User Name" name="username">
					</div>	
						<div class="form-group">
							<label>Password</label>
						
           <input type="password" class="form-control" placeholder="Password" name="pwd">
		   </div>	
<div class="form-group form-check">						
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="rem"  value='yes'>Remember Me
</label>
</div>
							
							
							
							
							
					
<div class="form-group">
<input type="submit" class="btn btn-primary" name="login"  value="login" style = "width : 200px">
</div>



			</div>	
			</form>
		</div> 
    </body>
</html>



<?php
if(isset($_REQUEST['login']))
{
$username=$_REQUEST['username'];
$pwd=$_REQUEST['pwd'];
//syntax to fetch value of checkbox
if(isset($_REQUEST['rem']))
$remember='yes';
else
$remember='no';
//echo "<br/>$username,$pwd,$remember";

//1. check if user is valid or not
$query="select count(*) from student where enrollmentno='$username' and password='$pwd'";
include_once "dbconfigure.php";
$ans=my_one($query);
if($ans==1)
{
//2. save username and pwd to session variables
$_SESSION['sun']=$username;
$_SESSION['spwd']=$pwd;

//3. if remember is yes, save them to cookies too
if($remember=='yes')
{
setcookie('cun',$username,time()+60*60*24*7);
setcookie('cpwd',$pwd,time()+60*60*24*7);
}


//echo "<br/>You are a valid user and your role is $ans";
//$targetpage=$ans."_home.php";
header("Location:student_home.php");

}
else
{
header("Location:loginerror.php");
}


}

if(isset($_REQUEST['signup']))
{
header("Location:signup.php");
}
?>
		

