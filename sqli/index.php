<?php
function display($id=1){
	$id=str_replace(' ', '', $id);
	$id=str_replace("=", '', $id);
	$con = mysqli_connect("localhost", "article", "wysrday", "article");
	if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
mysqli_query($con,"SET NAMES utf8"); 
 $sql = "SELECT * FROM article WHERE id= '$id'";
 $res = mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
	// $res[1]='哲♂学'
	// $res[2]='FA♂Q'
	// $res[3]='ASS♂WE♂CAN'
	$html='<html>
	<head>
	<meta charset="utf-8">
		<script src="js/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
      </head>
      <body><h1>'
      .$row["text"].
      '</h1></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
      <footer style="margin-bottom:0; " align="center"><a href="admin.php">管理入口</a></footer>
      </body>
      </html>





	';
	echo $html;
}

if(!isset($_GET['id'])){
	$_GET['id']=1;
}
display($_GET['id']);


