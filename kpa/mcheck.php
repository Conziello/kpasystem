<?php //include('db_fns.php');
ini_set('max_execution_time', 0);

$db = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
mysql_select_db('mwanzop',$db);



$_POST= json_decode(file_get_contents('php://input'), true);
$refno=$_POST['BillRefNumber'];

$result =mysql_query("select * from tenants where tid='".$refno."'");
if(mysql_num_rows($result)==0){
$myObj->ResultCode = 1;
$myObj->ResultDesc = "Rejected";
}else{
$myObj->ResultCode = 0;
$myObj->ResultDesc = "Accepted";
}

$myJSON = json_encode($myObj);


$resulta = mysql_query("insert into smsin values('0','".$myJSON."')");


?>