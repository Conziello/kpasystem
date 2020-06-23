<?php
ini_set('max_execution_time', 0);

$db = mysql_connect('localhost', 'localhost', 'admin@123+',true) or die(mysql_error());
mysql_select_db('mwanzo',$db);

$time=$_GET['TransTime'];

$domain = $_SERVER['HTTP_HOST'];

$url = $domain . $_SERVER['REQUEST_URI'];
// echo $url;

$query_array = mysql_real_escape_string($url);

//print_r($query_array);

$resulta = mysql_query("insert into smsin values('0','".$query_array."')");

echo 0;





?>