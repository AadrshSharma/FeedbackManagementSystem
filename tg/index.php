<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css1/bootstrap.css" media="all" />
<script src = js1/bootstrap.min.js></script>
<script src = js1/jquery-3.2.1.min.js></script>
</head>
<body>
<div class = container>
<h2 class = text-center>TG Login</h2>
<form method = post>
<div class = col-sm-4></div>
<div class="form-group col-sm-4">
    <label>UserName</label>
    <input type="text" class="form-control" id="username" name = username>
  
 
    <label>Password</label>
    <input type="password" class="form-control" id="pwd" name = pwd>
  
  
  <div class="form-group"> 
    
      <div class="checkbox">
        <label><input type="checkbox" id = rem name = rem> Remember me</label>
      </div>
    
  </div>
 
  
    
      <button type="submit" class="btn btn-primary" id = login name = login>Submit</button>
    </div>
	
  </div>
  <div class = col-sm-4></div>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
if(isset($_POST['rem']))
{
$remember='yes';
}
else
{
$remember='no';
}
//1. check if user is valid or not
$query="select count(*) from tg where tgname='$username' and password='$pwd'";
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

header("Location:tg_home.php");

}
else
{
header("Location:loginerror.php");
}



}
echo "<br><br><br>";
include "footer.php";
?>