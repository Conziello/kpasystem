<?php session_start();
date_default_timezone_set('Africa/Nairobi');  
if(isset($_GET['username'])){
$username = $_GET['username'];
}
if(isset($_GET['passwd'])){
$password = $_GET['passwd'];}

if(isset($_GET['property'])){
$property = $_GET['property'];}


$db = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db($property,$db);
$_SESSION['database']=$property;

$result = mysql_query("select * from users where name='".$username."' and status=1 and password = sha1('".$password."')");
$num_results = mysql_num_rows($result);
if($num_results>0){
$_SESSION['valid_user']=$username;
$result = mysql_query("insert into log values('','".$username." logs into system','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	echo 0;
}
else {echo'<i class="icon-key"></i> 
<script>swal("Error", "Incorrect Login Credentials!", "error");</script>';
}
     
	 ?>
        