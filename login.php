<html>
<head>
<title>login page</title>

<style type="text/css">

#main-wrapper{
width:300px;
height:250px;
margin: 0 auto;
background:#ecf0f1;
padding:5px;
}
.avatar{
width:150px;
text-align:center;
}
.q{
	font-size: 13;
	color: #b3b3b3;	
}
.p{

	font-size: 12;
	color: #b3b3b3;
text-align:center;

}
.myform{

	width:200px;
	margin: 0 auto;
}
#login_btn
{
	font-family: "";
	width:200px; 
	height:35px;
background:#feb236;}

.inputvalues{
width:200px;
height: 30px;
margin:0 auto;
paddling:5px;
}
</style>
</head>

<body style="background-color:#ff7b25">
<br><br><br><br>
<div id="main-wrapper">
<?php
session_start();

require_once("connect.php");
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$q="select * from user where username='$username' and password='$password'";
	$r=mysqli_query($con,$q);
	if(mysqli_num_rows($r)>0)
	{

       $_SESSION['username']=$username;
       header("location:index.php");
	}
	else
	{
		echo "Incorect ";
	}
}

?>


<center>
<!--	<h2><b>Login Forms</b></h2></center>
<center><img src="q1.png" class="avatar"/></center>
<br><br>  -->
<br><br><br>
<form class ="myform"  method="post">
<input type="text"  name="username" class="inputvalues" placeholder="Username" required>
	<br><br>
<input type="password" name="password" class="inputvalues" placeholder="Password" required>
<br><br>
<input type="submit" id="login_btn" name="login" value="LOGIN"/>
<br>
<p class="p">Can't login?  &nbsp <a href="register.php">Create an account</p></a>
</form>
</div>
</body>
</html>
