<?php session_start();
date_default_timezone_set('Africa/Nairobi');  
if(isset($_GET['username'])){
$username = $_GET['username'];
}
if(isset($_GET['passwd'])){
$password = $_GET['passwd'];}

if(isset($_GET['property'])){
$database = $_GET['property'];}



$db = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
if(!$db){echo'<script>swal("Error", "Incorrect Database Code!", "error");</script>';}
mysql_select_db($database,$db);
$_SESSION['database']=$database;

$result = mysql_query("select * from tenants where  (kpano='".$username."' OR eno='".$username."') and password = sha1('".$password."')");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$status=stripslashes($row['status']);
if($num_results>0&&$status==1){
$username=stripslashes($row['kpano']);
$_SESSION['valid_user']=$username;
$result = mysql_query("insert into log values('','".$username." logs into system','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	echo 0;
}

else if($num_results>0&&$status!=1){
echo'<i class="icon-key"></i> 
<script>swal("Error", "Your membership is Inactive.Kindly contact the Admin for Renewal!", "error");</script>';
}

else {echo'<i class="icon-key"></i> 
<script>swal("Error", "Incorrect Login Credentials!", "error");</script>';
}
     


?>
        