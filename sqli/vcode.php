<?php
	session_start();
	if(!isset($_SESSION['vcode'])){
		$_SESSION['vcode']=rand(1000,9999);
	}
	if(!isset($_SESSION['vlogged'])){
		$_SESSION['vlogged']=0;
	}
	if(!isset($_SESSION['logged'])){
		$_SESSION['logged']=0;
	}
	if(!isset($_POST['vcode'])){
		$_POST['vcode']="";
	}
	if($_SESSION['logged']!=1){
		echo "Permission Denied!";
		exit();
	}
	if($_POST['vcode']==$_SESSION['vcode']){
		$_SESSION['vlogged']=1;
	}

	if($_SESSION['vlogged']!=1){
		display();
	}
	else{
		echo 'CNSS{S0LMAP_WITH_TAMPER}';
		$_SESSION['vlogged']=0;
	}

function display(){
	 $html='
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validation</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container" style="margin-top:300px;width:600px;">
	<form role="form" action="" method="POST">
	<label class="alert alert-info" role="alert">4位验证码已发送至手机</label>
	<div class="form-group">
    <label for="exampleInputName2">验证码</label>
      <input type="text" class="form-control" placeholder="验证码" name="vcode">
      </div>
      <button class="btn btn-default">Go</button>
</form>
</div>
</body>
</html>';
echo $html;

}

