<?php include('db_fns.php');
include('functions.php'); 
require 'PHPMailerAutoload.php';
$username=$_SESSION['valid_user'];

$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel='Tel: '.stripslashes($row['Tel']);
$Add='P.O BOX '.stripslashes($row['Address']);
$web='Web: '.stripslashes($row['Website']);
$comemail='Email: '.stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);

?>
<script src="custom/custom.js"></script>
<?php 

//POST MONTHLY Rent

							$tstamp=date('Ymd');
							$invstamp=$tstamp;
							$s = new DateTime($invstamp);
							$s->modify('+1month');
							$mon=$month= $s->format('m_Y');
							//GET POSTING DATE
							$result =mysql_query("select * from variables where id=1");
                   			$row=mysql_fetch_array($result);
                   			$value=stripslashes($row['value']);
                   			$expstamp=date('Ym').$value;

							if($tstamp>=$expstamp){

								$resultc = mysql_query("select * from rentauto where month='".$month."'");
								if(mysql_num_rows($resultc)==0){
								
									 $result =mysql_query("select * from tenants where status=1 and invoice_status!='".$month."' and invoice_expiry_stamp<='".$tstamp."' and activation!=1");
		                   			 $num_results = mysql_num_rows($result);
			                      	 for ($i=0; $i <$num_results; $i++) {
			                          $row=mysql_fetch_array($result);
			                          $code=stripslashes($row['id']);
			                          $tid=stripslashes($row['tid']);
			                          $bname=stripslashes($row['bname']);
			                          $vatstatus=stripslashes($row['vat']);
			                          $amount=$rent=stripslashes($row['monrent']);
			                          $phone=stripslashes($row['phone']);
			                          $email=stripslashes($row['email']);
			                          $hid=stripslashes($row['hid']);
			                          $hname=stripslashes($row['hname']);
			                          $rid=stripslashes($row['rid']);
			                          $billing_type=stripslashes($row['billing_type']);
			                          $bal=stripslashes($row['bal']);
			                          $rno=$roomno=stripslashes($row['roomno']);
			                          $phonearr=explode('/',($phone));
			                          $emailarr=explode('/',($email));
			                          

			                         

			                          if($billing_type=='Monthly'){
			                          	$invstamp=date('Ym').'25';
										$s = new DateTime($invstamp);
										$s->modify('+1month');
										$invoice_expiry_stamp= $s->format('Ymd');
										$amount=$rent;
			                          }

			                           if($billing_type=='Quartely'){
			                          	$invstamp=date('Ym').'25';
										$s = new DateTime($invstamp);
										$s->modify('+3month');
										$invoice_expiry_stamp= $s->format('Ymd');
										$amount=$rent*3;
			                          }

			                           if($billing_type=='Yearly'){
			                          	$invstamp=date('Ym').'25';
										$s = new DateTime($invstamp);
										$s->modify('+1year');
										$invoice_expiry_stamp= $s->format('Ymd');
										$amount=$rent*12;
			                          }

			                           $invamount=$amount;
			                           $nbal=$bal+$invamount;

			                          	
										

				                        //post invoice
										//get receipt number
										$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$invno=stripslashes($rowx['invno'])+1;

										$resultb = mysql_query("select * from activities where id='1' limit 0,1");
										$rowb=mysql_fetch_array($resultb);
										$vatper=stripslashes($rowb['vat'])/100;

										if($vatstatus==1){$vat=round((($amount/(1+$vatper))*$vatper),2);}else{$vat=0;}

										

										//insert invoice
										$desc='RENT INVOICE FOR '.$mon;
										$resulte = mysql_query("insert into receipts values('0','','".$invno."','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2)");
										$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','1','Rent','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
										$resultg = mysql_query("update tenants set bal='".$nbal."',invoice_status='".$mon."',invoice_expiry_stamp='".$invoice_expiry_stamp."' where tid='".$tid."'");	
										

										//post journal entries
										$amount=$amount-$vat;
										$journalno=0;$cid=635;$did=628;$refno=$tid;$date=date('Y/m/d');
										$description='Rent Income-'.$bname.'-'.$rno;
										postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
										
										if($vat!=0){
											$amount=$vat;
											$journalno=0;$cid=614;$did=628;$refno=$tid;$date=date('Y/m/d');
											$description='Rent Income VAT-'.$bname.'-'.$rno;
											postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
										}


										//into notices

										foreach ($phonearr as $key => $val) {
											$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Rent for Month of '.$mon.'. Thank you for your partnership.';
											if(strlen($val)>5){
											$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
											}

										}


										//into email

										foreach ($emailarr as $key => $val) {
											$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Rent for Month of '.$mon.'. Thank you for your partnership.';
											if(strlen($val)>5){
											$resulte = mysql_query("insert into emails values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
											}

										}


			                         }

			                        $resultz = mysql_query("insert into rentauto values('0','".$mon."')");
			                        $message='The rent for month of '.$month.' has been posted.';
							 		//postnotice($message);
			                        //send invoices via email
									 $result =mysql_query("select * from emails where status=0 and type='Invoice'");
		                   			 $num_results = mysql_num_rows($result);
			                      	 for ($i=0; $i <$num_results; $i++) {
			                          $row=mysql_fetch_array($result);
			                          $code=stripslashes($row['id']);
			                          $refno=stripslashes($row['refno']);
			                         // echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
			                          $resulty = mysql_query("update emails set status=1 where id='".$code."'");
			                     	 }

								}//end 2nd if
								
							}//end 1st if

?>