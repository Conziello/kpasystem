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


function postjournal($journalno,$ledger1,$action1,$result1,$ledger2,$action2,$result2,$amount,$desc,$refno,$date,$username,$unibcode){

	if($journalno==0){
		$question =mysql_query("SELECT * FROM journals order by id desc limit 0,1");
		$ans=mysql_fetch_array($question);
		$journalno=stripslashes($ans['rcptno'])+1;
	}

	//insert into journals
	$stamp=preg_replace('~/~', '', $date);
	$resultz = mysql_query("insert into journals values('0','".$journalno."','".$desc."','".$refno."','".$amount."','".$date."','".$stamp."','".$username."',1,'".$unibcode."')");	
	

	
	$resultb = mysql_query("select * from ledgers where ledgerid='".$ledger1."'");
	$rowb=mysql_fetch_array($resultb);
	$ledger1bal=stripslashes($rowb['bal']);
	$ledger1name=stripslashes($rowb['name']);
	if($result1=='Add'){$ledger1bal=$ledger1bal+$amount;}else{$ledger1bal=$ledger1bal-$amount;}
	
	
	$resultb = mysql_query("select * from ledgers where ledgerid='".$ledger2."'");
	$rowb=mysql_fetch_array($resultb);
	$ledger2bal=stripslashes($rowb['bal']);
	$ledger2name=stripslashes($rowb['name']);
	if($result2=='Add'){$ledger2bal=$ledger2bal+$amount;}else{$ledger2bal=$ledger2bal-$amount;}


	$resultx = mysql_query("insert into ledgerentries values('0','".$journalno."','".$action1."','".$ledger1."','".$ledger1name."','".$amount."','".$desc."','".$refno."','".$ledger1bal."','".$date."','".$stamp."',1,'".$unibcode."')");	
	$resultx = mysql_query("insert into ledgerentries values('0','".$journalno."','".$action2."','".$ledger2."','".$ledger2name."','".$amount."','".$desc."','".$refno."','".$ledger2bal."','".$date."','".$stamp."',1,'".$unibcode."')");	
	
	$resulty = mysql_query("update ledgers set bal='".$ledger1bal."' where ledgerid='".$ledger1."'");
	$resulty = mysql_query("update ledgers set bal='".$ledger2bal."' where ledgerid='".$ledger2."'");

	
}



function postnotice($message){

		$resultg =mysql_query("SELECT * FROM messages where message='".$message."'");
		$num_resultsg = mysql_num_rows($resultg);
		if($num_resultsg==0){	
				
				$resultd =mysql_query("SELECT * FROM users");
			$num_resultsd = mysql_num_rows($resultd);	
			for ($d=0; $d <$num_resultsd; $d++) {
			$rowd=mysql_fetch_array($resultd);
			$user=stripslashes($rowd['name']);
			$resulte = mysql_query("insert into messages values('','".$user."','System','".$message."','','".date('d/m/Y-h:i A')."','".date('Ymd')."',0)");
			}

		}
}

function postnoticeuser($message,$user){

		$resultg =mysql_query("SELECT * FROM messages where message='".$message."'");
		$num_resultsg = mysql_num_rows($resultg);
		if($num_resultsg==0){	
			$resulte = mysql_query("insert into messages values('','".$user."','System','".$message."','','".date('d/m/Y-h:i A')."','".date('Ymd')."',0)");
		}
}

							
							$tstamp=date('Ymd');
							

							//RENT ESCALATIONS

							//CHECK FOR RENT ESCALATIONS
							$twoweeks=$tstamp;
							$s = new DateTime($twoweeks);
							$s->modify('+2weeks');
							$twoweeks= $s->format('Ymd');

							//get all escalations that have expired
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from escalations where status=1 and end<='".$twoweeks."'");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $tid=stripslashes($row['tid']);
							  $old=stripslashes($row['id']);
							  $bname=stripslashes($row['tname']);

							  $resultx =mysql_query("select * from escalations where tid='".$tid."' and start<='".$twoweeks."' and '".$twoweeks."'<end limit 0,1");
							  $rowx=mysql_fetch_array($resultx);
							  $amount=stripslashes($rowx['amount']);
							  $new=stripslashes($rowx['id']);
							  $end=stripslashes($rowx['end']);

							  $resultx =mysql_query("select * from houses where tenantid='".$tid."' and status=1 limit 0,1");
							  $rowx=mysql_fetch_array($resultx);
							  $rid=stripslashes($rowx['rid']);
							  $rno=stripslashes($rowx['roomno']);
							  $rid=stripslashes($rowx['rid']);
							  $hid=stripslashes($rowx['houseid']);
							  $hname=stripslashes($rowx['housename']);
								
							  $resultg = mysql_query("update tenants set monrent='".$amount."',escalation_expiry_stamp='".$end."' where tid='".$tid."'");	
							  $resulth = mysql_query("update houses set rent='".$amount."' where rid='".$rid."'");	
							  $resulti = mysql_query("insert into housetrack values('','".$rid."','".$rno."','".$hid."','".$hname."','Rent Escalation','".$amount."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							  $resultj = mysql_query("update escalations set status=0 where id='".$old."'");
							  $resultk = mysql_query("update escalations set status=1 where id='".$new."'");	

							  $message='The rent for tenant: '.$bname.'-'.$rno.' has escalated to '.$amount.'. Be notified.';
							  postnotice($message);

							}

						
							//POST PENALTIES						

							$tstamp=date('Ymd');
							$mon=$month= date('m_Y');
							
							$resultc = mysql_query("select * from tenants where penstatus=1 and  penmonth!='".$month."'  and  penwaivermonth!='".$month."'");
							$num_resultsc = mysql_num_rows($resultc);

							for ($c=0; $c <$num_resultsc; $c++) {
							$rowc=mysql_fetch_array($resultc);
						      $value=stripslashes($rowc['pendate']);
						      $penpercent=stripslashes($rowc['penpercent']);
							  $tid=stripslashes($rowc['tid']);
	                          $bname=stripslashes($rowc['bname']);
	                          $phone=stripslashes($rowc['phone']);
	                          $email=stripslashes($rowc['email']);
	                          $hid=stripslashes($rowc['hid']);
	                          $hname=stripslashes($rowc['hname']);
	                          $rid=stripslashes($rowc['rid']);
	                          $rno=$roomno=stripslashes($rowc['roomno']);
	                          $bal=stripslashes($rowc['bal']);
	                          $monrent=stripslashes($rowc['monrent']);
                   			  $expstamp=date('Ym').$value;

							if($tstamp>=$expstamp){
							
							 //get all rent invoices which have not been paid
							 $result =mysql_query("select * from invoices where actid=1 and tid='".$tid."' and invbal>0");
                   			 $num_results = mysql_num_rows($result);

                   			 for ($i=0; $i <$num_results; $i++) {
	                          $row=mysql_fetch_array($result);
	                          $code=stripslashes($row['id']);
	                          $invbal=stripslashes($row['invbal']);

	                          $ratio=round(($invbal/$monrent),2);
	                          //if ratio is bigger than 20%
	                          if($ratio>0.2){

								//penalty amount
	                          $amount=$penpercent*$invbal/100;

							  $phonearr=explode('/',($phone));
	                          $emailarr=explode('/',($email));
	                          

	                          $invamount=$amount;
			                  $nbal=$bal+$invamount;

	                          //post invoice
								//get receipt number
								$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
								$rowx=mysql_fetch_array($resultx);
								$invno=stripslashes($rowx['invno'])+1;

								$vat=round((($amount/1.16)*0.16),2);
							

								//insert invoice
								$desc='LATE RENT PAYMENT PENALTY INVOICE FOR '.$mon;
								$resulte = mysql_query("insert into receipts values('0','','".$invno."','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2)");
								$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','4','Penalties','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
								$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");	
								

								//post journal entries
								$amount=$amount-$vat;
								$journalno=0;$cid=680;$did=628;$refno=$tid;$date=date('Y/m/d');
								$description='Penalties Income-'.$bname.'-'.$rno;
								postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
								
								if($vat!=0){
									$amount=$vat;
									$journalno=0;$cid=614;$did=628;$refno=$tid;$date=date('Y/m/d');
									$description='Rent Income VAT-'.$bname.'-'.$rno;
									postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
								}

								//into notices

								foreach ($phonearr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partneship.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


								//into email

								foreach ($emailarr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partneship.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into emails values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


	                         	}//end if larger than 20%

	                        }//end for loop-invoices


	                        

	                        //update tenant has been penalised
	                        $resultg = mysql_query("update tenants set penmonth='".$month."' where tid='".$tid."'");	
							

	                       }//end 2nd if

	                      }//end for loop tenants

                       if($num_resultsc>0){
                       	 $resultz = mysql_query("insert into penalties values('0','".$mon."')");
                        //send invoices via email

                         $message='The penalties for month of '.$month.' have been posted.';
						 postnotice($message);

						}


                         $result =mysql_query("select * from emails where status=0 and type='Invoice'");
               			 $num_results = mysql_num_rows($result);
                      	 for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          $refno=stripslashes($row['refno']);
                          echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
                          $resulty = mysql_query("update emails set status=1 where id='".$code."'");
                     	 }	

	                     	
								
					

						
						echo "<script>$('#autodiv').css({'width' : '20%'});$('#autospan').html('20%');</script>";
					



							//POST MONTHLY Rent

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
								
									 $result =mysql_query("select * from tenants where status=1 and invoice_status!='".$month."' and invoice_expiry_stamp<='".$tstamp."'");
		                   			 $num_results = mysql_num_rows($result);
			                      	 for ($i=0; $i <$num_results; $i++) {
			                          $row=mysql_fetch_array($result);
			                          $code=stripslashes($row['id']);
			                          $tid=stripslashes($row['tid']);
			                          $bname=stripslashes($row['bname']);
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

										$vat=round((($amount/1.16)*0.16),2);
									

										//insert invoice
										$desc='RENT INVOICE FOR '.$mon;
										$resulte = mysql_query("insert into receipts values('0','','".$invno."','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2)");
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
											$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Rent for Month of '.$mon.'. Thank you for your partneship.';
											if(strlen($val)>5){
											$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
											}

										}


										//into email

										foreach ($emailarr as $key => $val) {
											$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($invamount)).' being Rent for Month of '.$mon.'. Thank you for your partneship.';
											if(strlen($val)>5){
											$resulte = mysql_query("insert into emails values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
											}

										}


			                         }

			                        $resultz = mysql_query("insert into rentauto values('0','".$mon."')");
			                        $message='The rent for month of '.$month.' has been posted.';
							 		postnotice($message);
			                        //send invoices via email
									 $result =mysql_query("select * from emails where status=0 and type='Invoice'");
		                   			 $num_results = mysql_num_rows($result);
			                      	 for ($i=0; $i <$num_results; $i++) {
			                          $row=mysql_fetch_array($result);
			                          $code=stripslashes($row['id']);
			                          $refno=stripslashes($row['refno']);
			                          echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
			                          $resulty = mysql_query("update emails set status=1 where id='".$code."'");
			                     	 }

								}//end 2nd if
								
							}//end 1st if

							echo "<script>$('#autodiv').css({'width' : '35%'});$('#autospan').html('35%');</script>";


							
							
														
						echo "<script>$('#autodiv').css({'width' : '40%'});$('#autospan').html('40%');</script>";
//SEND EMAILS

							 $result =mysql_query("select * from emails where status=0");
                   			 $num_results = mysql_num_rows($result);
	                      	 for ($i=0; $i <$num_results; $i++) {
	                          $row=mysql_fetch_array($result);
	                          $code=stripslashes($row['id']);
	                          $refno=stripslashes($row['refno']);
	                          $type=stripslashes($row['type']);
	                          $message=stripslashes($row['message']);
	                          $date=stripslashes($row['date']);
	                          $cusemail=stripslashes($row['email']);
	                          $names='Customer';


								$mail = new PHPMailer;

								//$mail->SMTPDebug = 3;                               // Enable verbose debug output

								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = 'princemunene@gmail.com';                 // SMTP username
								$mail->Password = 'enenum123-';                           // SMTP password
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                                    // TCP port to connect to

								$mail->setFrom($comemail, 'Q-Kodi Property Management System');
								$mail->addAddress($cusemail, $names);     // Add a recipient
								//$mail->addAddress('ellen@example.com');               // Name is optional
								$mail->addReplyTo($comemail, $comname);
								//$mail->addCC('cc@example.com');
								//$mail->addBCC('bcc@example.com');

								// Optional name
								$mail->isHTML(true);                                

								$mail->Subject = $comname.'-EMAIL UPDATE';
								$mail->Body    = '<table border="0" cellpadding="0" cellspacing="0" width="100%">    
								        <tr>
								            <td style="padding: 10px 0 30px 0;">
								                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
								                    <tr>
								                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
								                           <b style="color:#fff">'.$comname.'</b>
								                            <img src="http://qet.co.ke/'.$logo.'" alt="Logo" width="124" height="50" style="display: block;" />
								                        </td>
								                    </tr>
								                    <tr>
								                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
								                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
								                                <tr>
								                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
								                                        <b>Greetings!</b>
								                                    </td>
								                                </tr>
								                                <tr>
								                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
								                                       '.$message.'
								                                       <br/><br/>
								                                       Best Regards,<br/>
								                                       '.$comname.' Team
								                                    </td>
								                                </tr>
								                                <tr>
								                                    <td>
								                                        
								                                    </td>
								                                </tr>
								                            </table>
								                        </td>
								                    </tr>
								                    <tr>
								                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
								                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
								                                <tr>
								                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
								                                        &reg; '.$comname.' '.date('Y').'<br/>
								                                     </td>
								                                    </tr>
								                            </table>
								                        </td>
								                    </tr>
								                </table>
								            </td>
								        </tr>
								    </table>';
								$mail->AltBody = 'Mail from '.$comname;

								/*
								if(!$mail->send()) {
									$resulty = mysql_query("update emails set status=1 where id='".$code."'");
								}
								*/



	                          
	                     	 }

	                     	 echo "<script>$('#autodiv').css({'width' : '45%'});$('#autospan').html('45%');</script>";

							//SEND SMS

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

							 echo "<script>$('#autodiv').css({'width' : '50%'});$('#autospan').html('50%');</script>";


								//CHECK FOR NOTIFICATIONS-LEASE UPLOAD,HANDOVER,CONTRACT EXPIRY

							 
							 //1.LEASE UPLOAD
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from tenants where  status=1 and lease_status=0 and '".$tstamp."'>=lease_stamp_expiry");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $tid=stripslashes($row['tid']);
							  $bname=stripslashes($row['bname']);
							  $rno=stripslashes($row['roomno']);
							  $expiry=stamptodate(stripslashes($row['lease_stamp_expiry']));
							  $message='The lease upload period for tenant: '.$bname.'-'.$rno.' elapsed on '.$expiry.'. Kindly Upload the lease.';
								postnotice($message);
								}


							echo "<script>$('#autodiv').css({'width' : '55%'});$('#autospan').html('55%');</script>";

							//2.TENANT CHECKIN
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from tenants where  status=1 and handover_status=0 and '".$tstamp."'>=handover_stamp_expiry");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $tid=stripslashes($row['tid']);
							  $bname=stripslashes($row['bname']);
							  $rno=stripslashes($row['roomno']);
							  $expiry=stamptodate(stripslashes($row['handover_stamp_expiry']));
							  $message='The tenant checkin(unit handover) period for tenant: '.$bname.'-'.$rno.' elapsed on '.$expiry.'. Kindly check the tenant in.';
								postnotice($message);
							}

							echo "<script>$('#autodiv').css({'width' : '60%'});$('#autospan').html('65%');</script>";

							//3.CONTRACT EXPIRY
							 $tstamp=date('Ymd');
							 $s = new DateTime($tstamp);
							 $s->modify('+3month');
							 $next= $s->format('Ymd');

							 $result =mysql_query("select * from tenants where status=1  and '".$next."'>=contract_expiry_stamp");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $tid=stripslashes($row['tid']);
							  $bname=stripslashes($row['bname']);
							  $rno=stripslashes($row['roomno']);
							  $contract_expiry_stamp=stripslashes($row['contract_expiry_stamp']);
							  $expiry=stamptodate(stripslashes($row['contract_expiry_stamp']));
							  $message='The lease term for tenant: '.$bname.'-'.$rno.' will expire on '.$expiry.'. Kindly make the necessary arrangements.';
							  postnotice($message);

							  if($tstamp>$contract_expiry_stamp){

							  	$resultg = mysql_query("update tenants set status=0 where tid='".$tid."'");	
							  	 $message='The lease term for tenant: '.$bname.'-'.$rno.' has expired; and  record inactivated. Be aware.';
							  	 postnotice($message);

							  }
							 	
							}

							echo "<script>$('#autodiv').css({'width' : '70%'});$('#autospan').html('70%');</script>";

							//4.DEPOSITS STAMP EXPIRY
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from tenants where  status=1 and deposit_status=0 and '".$tstamp."'>=deposit_stamp_expiry");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $tid=stripslashes($row['tid']);
							  $bname=stripslashes($row['bname']);
							  $rno=stripslashes($row['roomno']);
							  $expiry=stamptodate(stripslashes($row['deposit_stamp_expiry']));
							  $message='The tenant: '.$bname.'-'.$rno.' was supposed to have paid their next deposit installment by '.$expiry.'. Kindly notify them.';
							  postnotice($message);
							}

							echo "<script>$('#autodiv').css({'width' : '75%'});$('#autospan').html('75%');</script>";

							
							//UPDATE SOI,SHOP APP,LOF
							$result =mysql_query("select * from variables where id=3");
                   			$row=mysql_fetch_array($result);
                   			$senddays=stripslashes($row['value']);

                   			
							//1.SOI
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from interests where  status=1");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $name=stripslashes($row['name']);
							  $bname=stripslashes($row['bname']);
							 
							  $sms_expiry=stripslashes($row['sms_expiry']);
							  $expstamp=stripslashes($row['expstamp']);
							  $openstamp=stripslashes($row['stamp']);
							  $phone=stripslashes($row['phone']);

								  $diffdays=0;

								  if($sms_expiry!=''){

								  	$date1=substr($sms_expiry,0,4).'-'.substr($sms_expiry,4,2).'-'.substr($sms_expiry,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }else{

								  	$date1=substr($openstamp,0,4).'-'.substr($openstamp,4,2).'-'.substr($openstamp,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }

								  

								  if($diffdays>$senddays){

								  	//send sms
								   $message='Hallo '.$name.'. We noticed you made an enquiry but have not yet returned to do the application.Kindly let us know if you are still interested in the space.';
								   $resulte = mysql_query("insert into notices values('0','SOI Reminder','".$message."','".$bname."','".$phone."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','0')");
								   $resultg = mysql_query("update interests set sms_expiry='".$tstamp."' where id='".$code."'");			
								 
								  }

								  //check if it has expired

								   if($tstamp>$expstamp){

								  		$resultg = mysql_query("update interests set status=0 where id='".$code."'");	
							  			$message='The prospect entry for '.$name.'-'.$bname.' has expired; and  record archived. Be aware.';
							  			postnotice($message);
									 
								 }



							  
							}

							//2.SHOP APPLICATION
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from shopapps where  status=1");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $name=stripslashes($row['dname1']);
							  $bname=stripslashes($row['bname']);
							  
							  $sms_expiry=stripslashes($row['sms_expiry']);
							  $expstamp=stripslashes($row['expstamp']);
							  $openstamp=stripslashes($row['stamp']);
							  $phone=stripslashes($row['phone']);

								  $diffdays=0;

								  if($sms_expiry!=''){

								  	$date1=substr($sms_expiry,0,4).'-'.substr($sms_expiry,4,2).'-'.substr($sms_expiry,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }else{

								  	$date1=substr($openstamp,0,4).'-'.substr($openstamp,4,2).'-'.substr($openstamp,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }

								  

								  if($diffdays>$senddays){

								  	//send sms
								   $message='Hallo '.$name.'. We noticed you made a shop application but have not yet returned for the letter of offer.Kindly let us know if you are still interested in the space.';
								   $resulte = mysql_query("insert into notices values('0','SHOP APPLICATION Reminder','".$message."','".$bname."','".$phone."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','0')");
								   $resultg = mysql_query("update shopapps set sms_expiry='".$tstamp."' where id='".$code."'");			
								 
								  }

								  //check if it has expired

								   if($tstamp>$expstamp){

								  		$resultg = mysql_query("update shopapps set status=0 where id='".$code."'");	
							  			$message='The Shop Application entry for '.$name.'-'.$bname.' has expired; and  record archived. Be aware.';
							  			postnotice($message);
									 
								 }



							  
							}


							//3.LETTER OF OFFER
							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from lof where  status=1");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $bname=stripslashes($row['bname']);
							  
							  $sms_expiry=stripslashes($row['sms_expiry']);
							  $expstamp=stripslashes($row['stampexp']);
							  $openstamp=stripslashes($row['stamp']);
							  $sap=stripslashes($row['sap']);

							     $resultx =mysql_query("select * from shopapps where id='".$sap."'");
							 	 $rowx=mysql_fetch_array($resultx);
							     $phone=stripslashes($rowx['phone']);

								  $diffdays=0;

								  if($sms_expiry!=''){

								  	$date1=substr($sms_expiry,0,4).'-'.substr($sms_expiry,4,2).'-'.substr($sms_expiry,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }else{

								  	$date1=substr($openstamp,0,4).'-'.substr($openstamp,4,2).'-'.substr($openstamp,6,2);
								  	$date2=substr($tstamp,0,4).'-'.substr($tstamp,4,2).'-'.substr($tstamp,6,2);
								  	$diffdays=daysdifference($date1,$date2);

								  }

								  

								  if($diffdays>$senddays){

								  	//send sms
								   $message='Hallo '.$bname.'. We noticed that you have not yet returned your letter of offer after signing.Kindly let us know if you are still interested in the space.';
								   $resulte = mysql_query("insert into notices values('0','LOF Reminder','".$message."','".$bname."','".$phone."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','0')");
								   $resultg = mysql_query("update lof set sms_expiry='".$tstamp."' where id='".$code."'");			
								 
								  }

								  //check if it has expired

								   if($tstamp>$expstamp){

								  		$resultg = mysql_query("update shopapps set status=0 where id='".$code."'");	
							  			$message='The Letter of Offer entry for '.$bname.' has expired; and  record archived. Be aware.';
							  			postnotice($message);
									 
								 }



							  
							}

							echo "<script>$('#autodiv').css({'width' : '80%'});$('#autospan').html('80%');</script>";

//DOCUMENTS REGISTER

							 $tstamp=date('Ymd');
							 $result =mysql_query("select * from docsregistry where  status=1");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $sender=stripslashes($row['sendername']);
							  $senddate=stripslashes($row['senddate']);
							  $message='Some documents have been sent by '.$sender.' on '.$senddate.'. Kindly receive them.';
								postnotice($message);
							}


//CALENDAR EVENTS
							 $tstamp=date('Ymd');
							 $s = new DateTime($tstamp);
							 //same date
							 $s->modify('+0days');
							 $tomorrow= $s->format('Ymd');
							 $tomorrow=$tomorrow.'1200';
							 $expirystamp=date('Ymd').'1200';

							 $result =mysql_query("select * from events where status=1 and  '".$tomorrow."'>startstamp and username='".$username."'");
							 $num_results = mysql_num_rows($result);
							 for ($i=0; $i <$num_results; $i++) {
							  $row=mysql_fetch_array($result);
							  $code=stripslashes($row['id']);
							  $endstamp=stripslashes($row['endstamp']);
							  $startdate=stripslashes($row['startdate']);
							  $starttime=stripslashes($row['starttime']);
							  $event=stripslashes($row['name']);
							  $message='A new event named: '.$event.' is coming up on '.$startdate.' at '.$starttime.'. Be notified.';
							  postnoticeuser($message,$username);
							  //if expired
							  if($expirystamp>$endstamp){

								  		$resultg = mysql_query("update events set status=0 where id='".$code."'");	
							  			
								 }

							}		


//LEDGER ENTRIES

					
			            //6.update ledger balances
			           

			            $resultd =mysql_query("select * from ledgerstatus");
			            $num_resultsd = mysql_num_rows($resultd);
			            for ($d=0; $d <$num_resultsd; $d++) {
			                $rowd=mysql_fetch_array($resultd);
			                $lid=stripslashes($rowd['lid']);
			                $expstamp=stripslashes($rowd['stamp']);


				                $resultc =mysql_query("select * from ledgers where ledgerid='".$lid."' limit 0,1");
				                $rowc=mysql_fetch_array($resultc);
				                $type=stripslashes($rowc['type']);

			                    $resultx =mysql_query("select * from ledgerentries  where stamp<='".$expstamp."' and lid=".$lid." order by stamp desc,transid desc limit 0,1");
			                    $rowx=mysql_fetch_array($resultx);
			                    $bal=stripslashes($rowx['bal']);
			                    
			                    $result = mysql_query("SELECT * FROM  ledgerentries where lid=".$lid."  and stamp>'".$expstamp."' order by stamp asc,transid asc");
			                    $num_results = mysql_num_rows($result);
			                    for ($i=0; $i <$num_results; $i++) {
					                    $row=mysql_fetch_array($result);
					                    $trans=stripslashes($row['type']);
					                    $amount=stripslashes($row['amount']);
					                    $transid=stripslashes($row['transid']);
					                    if(($type=='Expense'||$type=='Asset')&&$trans=='Debit'){
					                        $bal+=$amount;
					                    }else if(($type=='Expense'||$type=='Asset')&&$trans=='Credit'){
					                        $bal-=$amount;
					                    }else if(($type=='Liability'||$type=='Revenue'||$type=='Equity')&&$trans=='Credit'){
					                        $bal+=$amount;
					                    }else if(($type=='Liability'||$type=='Revenue'||$type=='Equity')&&$trans=='Debit'){
					                        $bal-=$amount;
					                    }


			                    	$resultn = mysql_query("update ledgerentries set bal='".$bal."' where  transid='".$transid."'");

			                    }//end ledger entries for loop

			                      $result = mysql_query("DELETE from ledgerstatus where lid='".$lid."'");
			                }//end ledger status

			             echo "<script>$('#autodiv').css({'width' : '90%'});$('#autospan').html('90%');</script>";

//DATABASE BACKUP	

								$database=$_SESSION['database'];

									
									$tables = array();
										$result = mysql_query('SHOW TABLES');
										while($row = mysql_fetch_row($result))
										{
											$tables[] = $row[0];
										}
									
									
									//cycle through each table and format the data
									$return=NULL;
									foreach($tables as $table)
									{
										$result = mysql_query('SELECT * FROM '.$table);
										$num_fields = mysql_num_fields($result);
										$return.= 'DROP TABLE '.$table.';';
										$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
										$return.= "\n\n".$row2[1].";\n\n";
										
										for ($i = 0; $i < $num_fields; $i++) 
										{
											while($row = mysql_fetch_row($result))
											{
												$return.= 'INSERT INTO '.$table.' VALUES(';
												for($j=0; $j<$num_fields; $j++) 
												{
													$row[$j] = addslashes($row[$j]);
													$row[$j]=preg_replace('~\n~', '\\n', $row[$j]);
													if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
													if ($j<($num_fields-1)) { $return.= ','; }
												}
												$return.= ");\n";
											}
										}
										$return.="\n\n\n";
									}
									
									//save the file
									$handle = fopen('backup/'.$database.'_'.date('Ymd').'.sql','w+');
									fwrite($handle,$return);
									fclose($handle);	

					 echo "<script>$('#autodiv').css({'width' : '100%'});$('#autospan').html('100%');</script>";             
		












//end update
							
$resultz = mysql_query("insert into backup values('0','".date('d/m/Y')."')");
echo "<script>setTimeout(function() {cancelmodal();},1000);</script>";

?>




				
				



				




