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

				 $result =mysql_query("select * from tenant");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $tid=stripslashes($row['tid']);
							  $tenant=stripslashes($row['tname']);
							  $idno=stripslashes($row['idno']);
							  $phone=stripslashes($row['Telephone']);
							  $propid=stripslashes($row['propid']);
							  $property=stripslashes($row['property']);
							  $unitid=stripslashes($row['unitid']);
							  $unit=stripslashes($row['unit']);
							  $unittype=stripslashes($row['type']);
							  $rent=stripslashes($row['rent']);
							  $bal=stripslashes($row['bal']);
							  $payable_expiry=date('Ym').'05';
							  $finalend='20201231';
							  $btype='Monthly';
							  $escint=2.5;
							  $depayable=$depaid=$debal=0;
							  $escalation_expiry_stamp='20190630';
							  $lease_stamp_expiry=$deposit_stamp_expiry=$handover_stamp_expiry='20161231';
							  $penpercent=10;
							  $pendate='05';
							  $penstatus=1;
							  $waivermonth='';
							  $rescom='Residential';
							  $vatstatus=0;


							 $resultc = mysql_query("INSERT INTO tenants (id, tid, lof, bname, address, phone, email, dname, dphone, date, stamp, status, rid, roomno, hid, hname, monrent, payable_expiry,bal, contract_expiry_stamp, billing_type, escalation_type, invoice_expiry_stamp, total_deposit, paid_deposit, bal_deposit, deposit_status, escalation_expiry_stamp, lease_stamp_expiry, handover_stamp_expiry, deposit_stamp_expiry, penpercent, pendate, penstatus, penmonth, penwaivermonth, rescom, vat) 
									VALUES ('0','".$tid."','0','".$tenant."','THIKA','".$phone."','-','".$tenant."','".$phone."','".date('d/m/Y')."','".date('Ymd')."',1,'".$unitid."','".$unit."','".$propid."','".$property."','".$rent."','".$payable_expiry."','".$bal."','".$finalend."','".$btype."','".$escint."','".$payable_expiry."','".$depayable."','".$depaid."','".$debal."',0,'".$escalation_expiry_stamp."','".$lease_stamp_expiry."','".$handover_stamp_expiry."','".$deposit_stamp_expiry."','".$penpercent."','".$pendate."','".$penstatus."',0,'".$waivermonth."','".$rescom."','".$vatstatus."')");
							
								 
								 
						}


							$result =mysql_query("select * from properties");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  
							 
							   	 $resultb= mysql_query("insert into mainhouses values('','FLAT','','".stripslashes($row['name'])."','".stripslashes($row['Units'])."','".stripslashes($row['Location'])."','".stripslashes($row['owner'])."','',1,0,'','','','".stripslashes($row['commision'])."')")  or die (mysql_error());
							
								
								 
								 
						}

						 	$result =mysql_query("select * from units");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  
							 
							   $resultb = mysql_query("insert into houses values('".stripslashes($row['unitid'])."','".stripslashes($row['propid'])."','".stripslashes($row['property'])."','FLAT','".stripslashes($row['unit'])."','".stripslashes($row['description'])."','GROUND FLOOR','','".date('d/m/Y')."','','','".stripslashes($row['rent'])."','".date('Ymd')."','".stripslashes($row['status'])."','0','0','".stripslashes($row['rescom'])."','".stripslashes($row['water'])."','".stripslashes($row['elec'])."','','','','')");
							
								
								 
								 
						}


							


				
?>


				







