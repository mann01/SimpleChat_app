<!DOCTYPE html>
<html>
<head>
	<title> ChatApp</title>

</head>
<body>
<?php
require_once("connect.php");

if(isset($_POST['register']))
{
  $firstname=$_POST['firstname'];

  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
if($firstname!=""&& $firstname!="" && $username!="" && $password!="")
{
  
$q="INSERT INTO user(id,firstname,lastname,username,password) VALUES('','$firstname','$lastname','$username','$password')";
if(mysqli_query($con,$q))
{

header("location:login.php");
//directly head to login when succe registered
}
else{
  echo $q;
}

}
else
echo "plse Enter details";
}
?>
	<div id="main">
		<h2 align="center">Register</h2>
  
  <form method="post" align="center">
  First name:<br>
  <input type="text" name="firstname" placeholder="Enter name">
  <br>
  Last name:<br>
  <input type="text" name="lastname" placeholder= "Last name">
  <br><br>
  User name:<br>
  <input type="text" name="username" placeholder="Enter user">
  <br>
  
  Password:<br>
  <input type="password" name="password" placeholder="password ">
  <br>
  <input type="submit" name="register" value="Register">
</form>
	</div>


</body>
</html>