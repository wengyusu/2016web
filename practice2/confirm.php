<?php
$username=$password="";
if(isset($_POST['username'])){
	$username=filter($_POST['username']);
}
if(isset($_POST['password'])){
	$password=filter($_POST['password']);
}

$con = mysqli_connect("localhost", "prac", "7eca7d4a87c133c4", "practice");
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
 $sql = "SELECT * FROM user WHERE username= '$username' and password='$password'";
 $res = mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
if($row){
	header("Location:index.php");
}
else{
	echo "failed";
}

function filter($data){
	$data=str_replace(' ', '', $data);
	return $data;
}
?>