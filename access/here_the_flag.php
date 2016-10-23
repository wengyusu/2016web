<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
	$pos = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone');
    // echo $pos2;
    // var_dump($pos1);
	if($pos === False){
		print $_SERVER['HTTP_USER_AGENT'];
		print "</br>Only Windows Phone can access.";
		exit();
	}
    if(preg_match("/index\.php/",$_SERVER['HTTP_REFERER']) == 0)
    {
        print $_SERVER['HTTP_REFERER'];
        print "</br><h2>Are you from the index page?</h2>";
        exit();
    }
    if (preg_match("/127\.0\.0\.1/i", $_SERVER['HTTP_X_FORWARDED_FOR'])==0)
    {
        print "Only allow local access :)";
        exit();
    }
    if($_COOKIE["user"] == "admin")
    {

        echo 'CNSS{HTTP_HEADER_IS_VERY_IMPORTANT}';
    }
    else
    {
        echo 'Only admin can visit';
    }
?>