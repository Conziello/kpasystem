<?php 
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

	<?php include('db_fns.php');
						

					$arr=array();
					$invno=751;
					$resultc = mysql_query("SELECT * FROM  receipts where drcr='dr'");
					$num_resultsc = mysql_num_rows($resultc);
					for ($c=0; $c <$num_resultsc; $c++) {
					$rowc=mysql_fetch_array($resultc);
					$old=stripslashes($rowc['invno']);
					$invno+=1;
					$result = mysql_query("update receipts set invno='".$invno."' where invno='".$old."'");
					$result = mysql_query("update invoices set invno='".$invno."' where invno='".$old."'");
					
				}

				
?>

	<?php include('db_fns.php');
						

					$arr=array();
					$invno=751;
					$resultc = mysql_query("SELECT * FROM  receipts where drcr='dr' and month='08_2016'");
					$num_resultsc = mysql_num_rows($resultc);
					for ($c=0; $c <$num_resultsc; $c++) {
					$rowc=mysql_fetch_array($resultc);
					$tid=stripslashes($rowc['tid']);
					$message='Your Acc '.strtoupper(stripslashes($rowc['hname'])).'-['.strtoupper(stripslashes($rowc['rno'])).'] '.strtoupper(stripslashes($rowc['tname'])).' has been debited '.number_format(floatval($rowc['amount'])).' KShs. Please pay rent via PAYBILL Now or Cheque addressed to '.strtoupper(stripslashes($rowc['hname'])).'.';
					$resultx = mysql_query("SELECT * FROM  tenants where tid='".$tid."' limit 0,1");
					$rowx=mysql_fetch_array($resultx);
					$phone=stripslashes($rowx['phone']);
					$phonearr=explode('/',($phone));
					$phone=$phonearr[0];
					$phone=preg_replace('~ ~', '', $phone);

					$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".stripslashes($rowc['tname'])."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".stripslashes($rowc['invno'])."')");
									
					
					}

				
?>

	<?php include('db_fns.php');
						

					$arr=array();
					$invno=615;
					$resultc = mysql_query("SELECT * FROM  receipts where drcr='dr'");
					$num_resultsc = mysql_num_rows($resultc);
					for ($c=0; $c <$num_resultsc; $c++) {
					$rowc=mysql_fetch_array($resultc);
					$old=stripslashes($rowc['invno']);
					$invno+=1;
					$result = mysql_query("update receipts set invno='".$invno."' where invno='".$old."'");
					$result = mysql_query("update invoices set invno='".$invno."' where invno='".$old."'");
					
				}

				
?>


				







