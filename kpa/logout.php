<?php 
date_default_timezone_set('Africa/Nairobi');  
if(isset($_SESSION['valid_user'])){
require_once('db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
$old_user = $_SESSION['valid_user'];
$resulta = mysql_query("DELETE from logintable where username='".$_SESSION['valid_user']."'");  
$resultb = mysql_query("insert into log values('','".$_SESSION['valid_user']." logs out of system-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$_SESSION['valid_user']."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
unset($_SESSION['database']);
$result_dest = session_destroy(); 

    if (!empty($old_user)) {
              if ($result_dest)  {
              // if they were logged in and are now logged out
              echo"<script>window.location.href = \"index.php\";</script>";
                } else {// they were logged in and could not be logged out
                  echo"<script>window.location.href = \"index.php\";</script>";
                  }
        } else {// if they weren't logged in but came to this page somehow
              echo"<script>window.location.href = \"index.php\";</script>";
        }
}else{

    echo"<script>window.location.href = \"index.php\";</script>";
}


     
	 ?>
        