      <html>
      <head>
      	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
      </head>
      <body>
<div class="container" style="margin-top:300px;width:600px;">
<h3>Admin Login</h3>
<form action="" method="POST">
  <div>
    <label for="exampleInputName2">Username:</label>
    <input type="text" class="form-control" id="password" name="username">
  </div>
  <div>
    <label for="exampleInputName2">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button class="btn btn-default">Sign in</button>
  </form>
</div>
      </body>
      </html>
<?php
session_start();
$user='admintest';
$key='toonaive';
if(!isset($_POST['password'])){
	$password='';
}

else{
	$password=$_POST['password'];
}
if(!isset($_POST['username'])){
  $username='';
}
else{
  $username=$_POST['username'];
}
if($password==$key && $username==$user){
  $_SESSION['logged']=1;
	header("Location:vcode.php");
}
