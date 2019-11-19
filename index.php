<!DOCTYPE html>
<html lang="en">
<head>
  <title>ChatApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body style="background:aqua;">

   <div class="container " >  
  <div class="row "  >
<div class="well " style="width: 640px;">

<div class="panel panel-default " style="width: 600px;">
<div class="panel-heading" align="center" style="background: lightblue;" >

<?php
include("connect.php");
session_start();
if(isset($_SESSION['username']))
{
echo 'Hello, '.$_SESSION['username'];
}
else
{
  header("location:login.php");
}
?>
      
<button type="button" style="float: right; padding:0 9px" class="btn btn-info"><a href="logout.php" style="text-decoration: none; " >Logout</a></button>
       </div>
</div>
<div id="message_area " >
<?php
$q1="select *from message";
$r1=mysqli_query($con,$q1);
while ($row=mysqli_fetch_assoc($r1)) {
  
  $message=$row['message'];
  $username=$row['username'];

  
  echo '<h4 style="color:red;">'.$username.'</h4>';
  echo '<p>'.$message.'</p>';
  echo '<hr>';
}

if (isset($_POST['submit'])) {
  $message=$_POST['message'];
  $q=" INSERT INTO message (id,message,username) values('','$message', '{$_SESSION['username']} ' )";
  if(mysqli_query($con,$q)){
    echo '<h4 style="color:red">'.$_SESSION['username'].'<h4>';
    echo '<p>'.$message.'</p>';
 } 
}

?>
</div><br>
<form method="post">
 <div class="botto" style="width:600px;height: 40px;">
 <input type="text" class="form-control" style="width: 545px;height: 35px; display: inline;" name="message"  placeholder="type here">

<button style="width: 49px; display: inline;height: 40px; background:lightgreen; " class="btn btn-default btnclass="form-control-circle" type="submit" value="Message" name="submit"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i>     
</button>

</div></form>

</div>
</div>
</div>

</body>
</html>
