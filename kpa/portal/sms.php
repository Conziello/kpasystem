<?php include('db_fns.php');
function sendsms($message,$phone){
$headers = array(); 
$headers[] = "ApiKey:7cd87f8eab58479097905f665bf2c199"; 
$headers[] = "Content-type:application/json";
$json = '{"message":"'.$message.'","recipients":"'.$phone.'"}';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.sematime.com/v1/1469692995855/messages");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$output = curl_exec($ch);
curl_close($ch);
}


//send messages
 $result =mysql_query("select * from notices where status=0");
 $num_results = mysql_num_rows($result);
 for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $code=stripslashes($row['id']);
  $phone=stripslashes($row['phone']);
  $message=stripslashes($row['message']);
  sendsms($message,$phone);
  $resulty = mysql_query("update notices set status=1 where id='".$code."'");

 }



?>