<?php
ini_set('max_execution_time', 0);

$db = mysql_connect('localhost', 'qetcoke_qet', 'qet@123+',true) or die(mysql_error());
mysql_select_db('qetcoke_property',$db);



$domain = $_SERVER['HTTP_HOST'];

$url = $domain . $_SERVER['REQUEST_URI'];
// echo $url;

$query_array = mysql_real_escape_string($url);

print_r($query_array);

$resulta = mysql_query("insert into smsin values('0','".$query_array."')");





?>