<?php session_start();
$server='127.0.0.1';
	
	 if(isset($_SESSION['database'])){
	 	 $database=$_SESSION['database'];
	 	  $db = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
    	  mysql_select_db($database,$db);

	 }else{
	  echo"<script>window.location.href = \"index.php\";</script>";
	 }
	
 ?>
