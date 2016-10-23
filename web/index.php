      <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Files Upload</title>
  <script src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>

  </head>
<!-- Search engine cannot find -->

  <body>
  <div class="container">
<div class="panel panel-default" style="margin:300 auto;width:600px;">
  <div class="panel-body">
    <form role="form" action = "" enctype="multipart/form-data" method="POST">
      <div class="form-group col-md-offset-4 ">
        <label for="exampleInputFile">File input(不超过200K)</label>
        <input type="file" name="file" id="file"><br>
      </div>
    <button type="submit" class="col-md-offset-4 btn btn-info">提交</button>
    </form>
    </div>
    </div>


<?php
session_start();
$_SESSION['logged']=1;
if($_SESSION['logged']==0){
  header("Location:login.php");
}
else{
   if(@isset($_FILES["file"])){


  // 允许上传的图片后缀
  $allowedExts = array("gif", "jpeg", "jpg", "png","wind");
  $temp = explode(".", $_FILES["file"]["name"]);
  // echo $_FILES["file"]["size"];
  $extension = substr(strrchr($_FILES["file"]["name"],"."),1);
  // echo $extension;   // 获取文件后缀名
  if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "application/octet-stream")
  || ($_FILES["file"]["type"] == "image/png"))
  && ($_FILES["file"]["size"] < 2048000)   // 小于 2M
  && in_array($extension, $allowedExts))
  {
    if ($_FILES["file"]["error"] > 0)
    {
      echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
      echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
      echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
      echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
      
      // 判断当期目录下的 upload 目录是否存在该文件
      // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
      if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " 文件已经存在。 ";
      }
      else
      {
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
  else
  {
    echo '<script>alert("非法的文件格式");</script>';
  }
   }
 }
 ?>
 </div>
   </body>
  </html>