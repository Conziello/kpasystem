<?php session_start();
$server='localhost';

 	 function connecthr(){
     	$hrdb=$_SESSION['database'].'hr';
     	$hrconn = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
		mysql_select_db($hrdb,$hrconn);
     }

     function connectlocal(){
	     	if(isset($_SESSION['database'])){
		 	 $database=$_SESSION['database'];
		 	  $db = mysql_connect('localhost', 'root', '') or die(mysql_error());
	    	  mysql_select_db($database,$db);

			 }else{
			  echo"<script>window.location.href = \"index.php\";</script>";
			 }

     }

     connectlocal();

	
	 
	
 ?>
