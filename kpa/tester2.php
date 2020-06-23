<?php include('db_fns.php');
include('functions.php'); 
$username=$_SESSION['valid_user'];

								
								/*
	                      		 $result =mysql_query("select * from tenants_copy");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $tid=stripslashes($row['tid']);

		                            $resulta =mysql_query("select * from contracts_copy where  tid='".$tid."' order by id desc limit 0,1");
		                   			$rowa=mysql_fetch_array($resulta);

		                   				$rent=0;$rescom='';
		                   				$resultb = mysql_query("select * from houses WHERE tenantid=".$tid." and status=1");
										$num_resultsb = mysql_num_rows($resultb);
										for ($b=0; $b <$num_resultsb; $b++) {
											$rowb=mysql_fetch_array($resultb);
											$rent+=stripslashes($rowb['rent']);
											$rescom=stripslashes($rowb['rescom']);
												
										}

										if($rescom=='commercial'){$vatstatus=1;}else{$vatstatus=0;}
										$checkout_date=$checkout_stamp=$checkout_details='';
										if(stripslashes($rowa['enddate'])!=''){
											$checkout_date=stripslashes($rowa['enddate']);
											$checkout_stamp=stampreverse($rowa['enddate']);
											$checkout_details=stripslashes($rowa['checkoutdetails']);
										}
				                    
		                          		$resultc = mysql_query("INSERT INTO tenants (id, tid, lof, bname, address, phone, email, dname, dphone, date, stamp, status, rid, roomno, hid, hname, monrent, payable_expiry, bal, contract_expiry_stamp, billing_type, escalation_type, invoice_status, invoice_expiry_stamp, total_deposit, paid_deposit, bal_deposit, deposit_status, escalation_expiry_stamp, lease_stamp_expiry, handover_stamp_expiry, deposit_stamp_expiry, penpercent, pendate, penstatus, penmonth, penwaivermonth, rescom, vat, checkout_date, checkout_stamp, checkout_details) VALUES ('0','".stripslashes($row['tid'])."','0','".stripslashes($row['name'])."','".stripslashes($row['postal'])."','".stripslashes($row['mobile'])."','".stripslashes($row['email'])."','','','".stripslashes($row['date'])."','".stripslashes($row['stamp'])."','".stripslashes($row['status'])."','".stripslashes($rowa['roomid'])."','".stripslashes($row['roomno'])."','".stripslashes($rowa['houseid'])."','".stripslashes($rowa['housename'])."','".$rent."','".date('Ym')."05','".stripslashes($row['bal'])."','".stripslashes($rowa['stampexp'])."','Monthly','2.5',1,'20171025','".stripslashes($row['deposits'])."','".stripslashes($row['deposits'])."','0',0,'20190630','20160630','20160630','20160630','20','12','1',0,'','".$rescom."','".$vatstatus."','".$checkout_date."','".$checkout_stamp."','".$checkout_details."')");
							
								}

								 $resultk = mysql_query("update tenants set rescom='residential' where rescom=''");	

								*/
								 
								 
								 /*
								 $result =mysql_query("select * from receipts_copy where description not like '%DEPOSIT%'");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $oldrcptno=stripslashes($row['rcptno']);
		                          $drcr=stripslashes($row['drcr']);
		                          $description=stripslashes($row['description']);
		                          $tid=stripslashes($row['tid']);
		                          $amount=stripslashes($row['amount']);
		                          $hid=stripslashes($row['hid']);

		                          	if (strpos($description, 'OTHERS') !== false) {
									    $actid=9;$actname='Others';$actlid=674;
									}
									else if (strpos($description, 'RENT') !== false) {
									    $actid=1;$actname='Rent';$actlid=635;
									}
									else if (strpos($description, 'DEPOSIT') !== false) {
									    $actid=12;$actname='Deposit';$actlid=627;
									}
									else if (strpos($description, 'WATER') !== false) {
									    $actid=2;$actname='Water';$actlid=671;
									}
									else if (strpos($description, 'PENALT') !== false) {
									    $actid=4;$actname='Penalties';$actlid=680;
									}


		                          if($drcr=='dr'){
		                          	//invoices

		                          	$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$invno=stripslashes($rowx['invno'])+1;

		                          	$resultf = mysql_query("insert into invoices values('0','".$invno."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['rno'])."','".stripslashes($row['tid'])."','".stripslashes($row['tname'])."','".stripslashes($row['month'])."','".$actid."','".$actname."','".stripslashes($row['amount'])."','0','".stripslashes($row['amount'])."','1','".stripslashes($row['description'])."','".stamptodate($row['stamp'])."','".stripslashes($row['stamp'])."',1,'".$username."','0')");
									$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".stamptodate($row['stamp'])."','".stripslashes($row['month'])."','".stripslashes($row['tid'])."','".stripslashes($row['tname'])."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['rno'])."','".stripslashes($row['amount'])."','','".stripslashes($row['description'])."','','".stripslashes($row['bal'])."','".date('Ymd')."','dr',1,2)");
									$resultg = mysql_query("update tenants set bal='".stripslashes($row['bal'])."' where tid='".$tid."'");
									$resultg = mysql_query("update waterinvoices set rcptno='".$invno."' where rcptno='".$oldrcptno."'");		
							

									$journalno=0;$cid=$actlid;$did=628;$refno=$tid;$date=stripslashes($row['date']);
									$description=$actname.' Income-'.stripslashes($row['tname']).'-'.stripslashes($row['rno']);
									postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);



		                          }

		                          if($drcr=='cr'){

		                          	//get receipt number
									$resultx =mysql_query("select * from receipts where drcr='cr' order by serial desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$rcptno=stripslashes($rowx['rcptno'])+1;

									$lid=626;
									$lname='Bank A/cs';

		                          	$resultf = mysql_query("insert into receipt values('0','".$rcptno."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['rno'])."','".stripslashes($row['tid'])."','".stripslashes($row['tname'])."','".stripslashes($row['month'])."','".$actid."','".$actname."','".stripslashes($row['amount'])."','".stripslashes($row['description'])."','".stamptodate($row['stamp'])."','".stripslashes($row['stamp'])."',1,'".$username."','','".$lid."','".$lname."','0')");
									$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','','','".stamptodate($row['stamp'])."','".stripslashes($row['month'])."','".stripslashes($row['tid'])."','".stripslashes($row['tname'])."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['rno'])."','".stripslashes($row['amount'])."','".$lid."','".stripslashes($row['description'])."','','".stripslashes($row['bal'])."','".date('Ymd')."','cr',1,2)");
									$resultg = mysql_query("update tenants set bal='".stripslashes($row['bal'])."' where tid='".$tid."'");	
							

									//post journal entries
									$journalno=0;$cid=628;$did=$lid;$refno=0;$date=stripslashes($row['date']);
									$description='Bills Payment-'.stripslashes($row['tname']).'-'.stripslashes($row['rno']);
									postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
			
							
		                          	
		                          }




		                      	}
								
								
								
								*/
		                      	

		                      	/*
		                      	
		                      	 $result =mysql_query("select * from tenants");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $tid=stripslashes($row['tid']);


		                           $tot=0;
		                           $resulta =mysql_query("select * from receipts where drcr='cr' and tid='".$tid."'");
                   			 	   $num_resultsa = mysql_num_rows($resulta);

		                   			 for ($a=0; $a <$num_resultsa; $a++) {
			                          $rowa=mysql_fetch_array($resulta);
			                          $tot+=stripslashes($rowa['amount']);


			                      	}


			                      	$resulta =mysql_query("select * from invoices where  tid='".$tid."' order by id");
                   			 	  	 $num_resultsa = mysql_num_rows($resulta);

		                   			 for ($a=0; $a <$num_resultsa; $a++) {
			                          $rowa=mysql_fetch_array($resulta);
			                          $toid=stripslashes($rowa['id']);
			                          $invbal=stripslashes($rowa['invbal']);
			                          $paid=stripslashes($rowa['paid']);
			                          $status=stripslashes($rowa['invstatus']);

			                          		if($tot!=0){
					                          if($tot>=$invbal){$amount=$invbal;}
					                          if($tot<$invbal){$amount=$tot;}

				                          	  $invbal=$invbal-$amount;
				                          	  $tot=$tot-$amount;
				                          	  $paid=$paid+$amount;

				                          	  if($invbal<=0){$status=0;}

				                          	 $resultg = mysql_query("update invoices set paid='".$paid."',invbal='".$invbal."',invstatus='".$status."' where id='".$toid."'");	
														


				                      	  }


			                      	}




		                      	}

		                      	*/

		                      	/*

		                      	 $result =mysql_query("select * from tenants where status=1");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $tid=stripslashes($row['tid']);


		                           $bal=0;
		                           $resulta =mysql_query("select * from receipts where tid='".$tid."' order by serial desc limit 0,1");
                   			 	   $rowa=mysql_fetch_array($resulta);
			                       $bal=stripslashes($rowa['bal']);


			                      	
				                          	 $resultg = mysql_query("update tenants set bal='".$bal."' where tid='".$tid."'");	
														


		                      	}

		                      	*/

		                      	/*

		                      	 $result =mysql_query("select * from houses");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $rid=stripslashes($row['rid']);


		                           $wc=0;
		                           $resulta =mysql_query("select * from waterinvoices where rid='".$rid."' order by id desc limit 0,1");
                   			 	   $rowa=mysql_fetch_array($resulta);
			                       $wc=stripslashes($rowa['wc']);


			                      	
				                          	 $resultg = mysql_query("update houses set waterprevious='".$wc."' where rid='".$rid."'");	
														


		                      	}

		                      	*/

		                      	/*

		                      	$resultc = mysql_query("select * from tenants where status=1 and bal>500 and tid=181");
								$num_resultsc = mysql_num_rows($resultc); 
								echo $num_resultsc;
	     						 for ($i=0; $i <$num_resultsc; $i++) {
									$row=mysql_fetch_array($resultc);
									$tid=stripslashes($row['tid']);
									$phone=stripslashes($row['phone']);	
									$bname=stripslashes($row['bname']);	
									$pendate=stripslashes($row['pendate']);	
									$bal=stripslashes($row['bal']);
									$message='Hello '.$bname.'. You have a pending balance of KShs. '.number_format(floatval($bal)).'. Kindly pay by the '.$pendate.'th to avoid being penalized. Thank you for your partnership.';
									sendsms($message,$phone);												
								}

								*/

								//import data

								/*
								$resultc = mysql_query("select * from landlord_mwanzo");
								$num_resultsc = mysql_num_rows($resultc); 
								for ($i=0; $i <$num_resultsc; $i++) {
									$row=mysql_fetch_array($resultc);
									$resultb= mysql_query("insert into mainhouses values('".$row['Landlord No']."','FLAT','0','".$row['Landlord Name']."','','','".$row['Landlord Name']."','".$row['Landlord Phone No']."',1,0,'','".$row['Plot Number']."','','".$row['Commission Charged (%)']."','".date('d/m/Y')."','".date('Ymd')."','".$row['FieldPerson No']."','".$row['FieldPerson Name']."','','','','','','','','','','','','".$row['Bank Name And Branch']."','','','".$row['Bank Account Number']."','1','','','','')")  or die (mysql_error());
																		
								}
								*/

								

								/*

								
								$resultc = mysql_query("select * from tenants_mwanzo");
								$num_resultsc = mysql_num_rows($resultc); 
								echo $num_resultsc;
								for ($i=0; $i <$num_resultsc; $i++) {
									$row=mysql_fetch_array($resultc);

									$resultb = mysql_query("INSERT INTO tenants (id, tid, bname, idno, phone, hid, hname, roomno) VALUES ('0','".$row['Tenant No']."','".$row['Tenant Name']."','".$row['Tenant ID No']."','".$row['Phone No']."','".$row['Landload No']."','".$row['Landload Name']."','".$row['House No']."')")  or die (mysql_error());
							
								}

								*/

								
								/*
								
								$arr=array();
								$resultc = mysql_query("select * from houses_mwanzo order by AutoIndex desc");
								$num_resultsc = mysql_num_rows($resultc); 
								for ($i=0; $i <$num_resultsc; $i++) {
									$row=mysql_fetch_array($resultc);

									  $arr[$row['Landlord  No'].'-'.$row['House Unit No']]='1-'.$row['AutoIndex'];
									  $result = mysql_query("insert into hidroomno values('".$row['Landlord  No'].'-'.$row['House Unit No']."','".$row['AutoIndex']."',1)");
							
									
								}

								foreach ($arr as $key => $val) {


									echo $key.'<br/>';

								}
								
								*/

								
								
								/*
								$resultc = mysql_query("select * from hidroomno");
								$num_resultsc = mysql_num_rows($resultc); 
								for ($i=0; $i <$num_resultsc; $i++) {
									$row=mysql_fetch_array($resultc);
									$auto=$row['name'];

								    $resulta =mysql_query("select * from houses_mwanzo where AutoIndex='".$auto."' limit 0,1");
                   			 	    $rowa=mysql_fetch_array($resulta);
			                        $paymonth=stripslashes($rowa['Pay Month']);
			                        $payyear=stripslashes($rowa['Pay Year']);
			                        $tno=$rowa['Tenant No'];
			                        $tname=$rowa['Tenant Name'];
			                        $rno=$rowa['House Unit No'];
			                        $rent=$rowa['Rent Amount'];
			                        $deposit=$rowa['Total Deposits Payments'];

			                        

			                        $resultx =mysql_query("select * from houses order by rid desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$rid=stripslashes($rowx['rid'])+1;


			                        $resultb = mysql_query("insert into houses values('".$rid."','".$rowa['Landlord  No']."','".$rowa['Landlord Name']."','FLAT','".$rowa['House Unit No']."','".$rowa['House Unit Type']."','','','".date('d/m/Y')."','','','".$rowa['Rent Amount']."','".date('Ymd')."','0','','','','','','','','','','','','Active')");
									if($tname=='NOT FOR RENT'){
										$resultk = mysql_query("update houses set housestatus='NOT FOR RENT',status=1 where rid='".$rid."'");
									}
									//if active
			                        if(($paymonth=='February'&&$payyear==2018)&&$tname!='VACANT'){

			                        	$resultk = mysql_query("update houses set tenantid='".$tno."',tenant='".$tname."',status=1 where rid='".$rid."'");

			                        	$resultx =mysql_query("select * from tenantstatement_mwanzo where TenantNo='".$tno."' order by AutoIndex desc limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$bal=stripslashes($rowx['Balance']);

										$resultm = mysql_query("update tenants set date='".date('d/m/Y')."',stamp='".date('Ymd')."',status=1,rid='".$rid."',roomno='".$rno."',monrent='".$rent."',payable_expiry='20180105',bal='".$bal."',total_deposit='".$deposit."',paid_deposit='".$deposit."',bal_deposit=0,escalation_expiry_stamp='20221231',contract_expiry_stamp='20221231',billing_type='Monthly',escalation_type=1,invoice_expiry_stamp='20180228',invoice_status=1,penpercent=10,pendate='05',penstatus=1,rescom='Residential' where tid='".$tno."'");


			                        }


									
								}

								*/

								/*

								$result =mysql_query("select * from tenants where (bal>0 or bal<0)");
                   			 	 $num_results = mysql_num_rows($result);

	                   			 for ($i=0; $i <$num_results; $i++) {
		                          $row=mysql_fetch_array($result);
		                          $tid=stripslashes($row['tid']);
		                          $amount=stripslashes($row['bal']);
		                          $hid=stripslashes($row['hid']);

		                          

		                          	$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$invno=stripslashes($rowx['invno'])+1;

		                          	$resultf = mysql_query("insert into invoices values('0','".$invno."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['roomno'])."','".stripslashes($row['tid'])."','".stripslashes($row['bname'])."','02_2018','10','Balance B/F','".$amount."','0','".$amount."','1','Balance Brought Forward on System Migration','28/02/2018','20180228',1,'".$username."','0')");
									$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','28/02/2018','02_2018','".stripslashes($row['tid'])."','".stripslashes($row['bname'])."','".stripslashes($row['hid'])."','".stripslashes($row['hname'])."','".stripslashes($row['rid'])."','".stripslashes($row['roomno'])."','".$amount."','','Balance Brought Forward on System Migration','','".$amount."','20180228','dr',1,2,'".$username."')");
									

									$journalno=0;$cid=677;$did=628;$refno=$tid;$date='2018/02/28';
									$description='Balance Brought Forward on System Migration-'.stripslashes($row['bname']).'-'.stripslashes($row['roomno']);
									postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);





		                      	}

		                      	*/

		                    $tstamp=date('Ymd');
							$mon=$month= date('m_Y');
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

			                          //check if tenant has been invoiced

			                          $resultx =mysql_query("select * from invoices where actid=1 and mon='".$mon."'  and tid='".$tid."' limit 0,1");
									  $num_resultsx = mysql_num_rows($resultx);
									  if($num_resultsx==0){

									  	
					                          if($billing_type=='Monthly'){
					                          	$invstamp=date('Ym').'01';
												$s = new DateTime($invstamp);
												$s->modify('+1month');
												$invoice_expiry_stamp= $s->format('Ymd');
												$amount=$rent;
					                          }

					                           if($billing_type=='Quartely'){
					                          	$invstamp=date('Ym').'01';
												$s = new DateTime($invstamp);
												$s->modify('+3month');
												$invoice_expiry_stamp= $s->format('Ymd');
												$amount=$rent*3;
					                          }

					                           if($billing_type=='Yearly'){
					                          	$invstamp=date('Ym').'01';
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

												
												//$vat=0;
												//insert invoice
												$desc='RENT INVOICE FOR '.$mon;
												$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."')");
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


										}//end num_resultsx for loop


			                         }//end tenants for loop

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
			                          //echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
			                          $resulty = mysql_query("update emails set status=1 where id='".$code."'");
			                     	 }

								}//end 2nd if
								
							}//end 1st if

		                      	

								
								
								



							
		                      	

		                      	

		                      	


		                          

		                      