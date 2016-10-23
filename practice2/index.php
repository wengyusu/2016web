<html>
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Just inject it</title>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">登陆</div>
	<form class="form-horizontal panel-body" name="input" action="confirm.php" method="post">
  <div class="rows">
  <div class="form-group">
    <label class="col-md-4 control-label">Username</label>
    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="Username"  name="username">
    </div>
</div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Password</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default" name="submit">Sign in</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>
