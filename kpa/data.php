<?php include('db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userbranch=stripslashes($row['branch']);
include('functions.php'); 
}
//else{echo"<script>window.location.href = \"index.php\";</script>";}
?>
<script src="custom/custom.js"></script>
<?php 



if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=$_POST['id'];
}

switch($id){
							
							//show of interest
							case 1:

							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);
							$a=$_GET['a'];
							$soi=$b=$_GET['b'];
							
							if($a==1){

									$result= mysql_query("insert into interests values('0','".$_GET['name']."','".$_GET['bname']."','".$_GET['phone']."','".$_GET['remarks']."','".date('d/m/Y')."','".date('Ymd')."','".$next."','".$username."','1','')");
									$resulta = mysql_query("insert into log values('0','".$username." inserts data into show of interest table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Entry has been saved!", "success");</script>';
									echo"<script>setTimeout(function() {interest();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Entry has not been saved!", "error");</script>';
									}

							}

							else if($a==2){

									$result = mysql_query("update interests set name='".$_GET['name']."',bname='".$_GET['bname']."',phone='".$_GET['phone']."',remarks='".$_GET['remarks']."',expstamp='".$next."' WHERE id='".$soi."'");
									$resulta = mysql_query("insert into log values('0','".$username." edits show of interest Entry.Record ID:".$soi."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Entry has been updated!", "success");</script>';
									echo"<script>setTimeout(function() {findinterest();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Entry has not been updated!", "error");</script>';
									}

							}

							else if($a==3){

								$result = mysql_query("update interests set status=0 WHERE id='".$soi."'");
								
							}

							


							break;


							//shop application
							case 2:

							$a=$_GET['a'];
							$sap=$b=$_GET['b'];
							$soi=$c=$_GET['c'];
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);

							if($a==1){

									$result= mysql_query("insert into shopapps values('0','".$_GET['bname']."','".$_GET['nature']."','".$_GET['period']."','".$_GET['address']."','".$_GET['email']."','".$_GET['phone']."','".$_GET['location']."','".$_GET['bankers']."','".$_GET['dname1']."','".$_GET['dphone1']."','".$_GET['dname2']."','".$_GET['dphone2']."','".$_GET['dname3']."','".$_GET['dphone3']."','".$_GET['rname1']."','".$_GET['rphone1']."','".$_GET['rcom1']."','".$_GET['rname2']."','".$_GET['rphone2']."','".$_GET['rcom2']."','".$_GET['spacedetails']."','".$_GET['spacespecial']."','".mysql_real_escape_string(trim($_GET['odetail']))."','".date('d/m/Y')."','".date('Ymd')."','".$next."',1,'".$username."','".$soi."','')");
									$resulta = mysql_query("insert into log values('0','".$username." inserts data into shop applications table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									$resultb = mysql_query("update interests set status=2 WHERE id='".$soi."'");
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Application has been saved!", "success");</script>';
									echo"<script>setTimeout(function() {shopapp();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Entry has not been saved!", "error");</script>';
									}

							}

							else if($a==2){

									$result = mysql_query("update shopapps set bname='".$_GET['bname']."',nature='".$_GET['nature']."',period='".$_GET['period']."',address='".$_GET['address']."',email='".$_GET['email']."',phone='".$_GET['phone']."',location='".$_GET['location']."',bankers='".$_GET['bankers']."',dname1='".$_GET['dname1']."',dphone1='".$_GET['dphone1']."',dname2='".$_GET['dname2']."',dphone2='".$_GET['dphone2']."',dname3='".$_GET['dname3']."',dphone3='".$_GET['dphone3']."',rname1='".$_GET['rname1']."',rphone1='".$_GET['rphone1']."',rcom1='".$_GET['rcom1']."',rname2='".$_GET['rname2']."',rphone2='".$_GET['rphone2']."',rcom2='".$_GET['rcom2']."',
										spacedetails='".$_GET['spacedetails']."',spacespecial='".$_GET['spacespecial']."',odetail='".mysql_real_escape_string(trim($_GET['odetail']))."',expstamp='".$next."' WHERE id='".$sap."'");
									$resulta = mysql_query("insert into log values('0','".$username." edits shop application Entry.Record ID:".$sap."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Entry has been updated!", "success");</script>';
									echo"<script>setTimeout(function() {findshop();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Entry has not been updated!", "error");</script>';
									}

							}

							else if($a==3){

								$result = mysql_query("update shopapps set status=0 WHERE id='".$sap."'");
								
							}

							


							break;

							//lof entry
							case 3:

							$sap=$_GET['sap'];
							$tname=$bname=$_GET['bname'];
							$address=$_GET['address'];
							$chequename=$_GET['chequename'];
							$depositinfo=$_GET['depositinfo'];
							$unit=$_GET['unit'];
							$rid=$_GET['rid'];
							$rno=$roomno=$_GET['roomno'];
							$location=$_GET['location'];
							$years=$_GET['years'];
							$mons=$_GET['months'];
        					$leasetam=$years*12+$mons;
							$leaseterm=$years.' Years '.$mons.' Months';
							$monrent=$rent=$_GET['monrent'];
							$payabledate=$_GET['payabledate'];
							$escper=$_GET['escper'];
							$escint=$_GET['escint'];
							$fitperiod=$_GET['fitperiod'];
							$lawyer=$_GET['lawyer'];
							$usage=$_GET['usage'];
							$utildep=$_GET['utildep'];
							$depmonths=$_GET['depmonths'];
							$servicecharge=$_GET['servicecharge'];
							$depmonthscurrent=$_GET['depmonthscurrent'];
							$commencedate=$date=$_GET['commencedate'];
							$escalation='';
							$esc=array(array());
							$invamount=$monrent;
							$monvar=12*$escint;

							$vatstatus=$_GET['vatstatus'];
							$rescom=$_GET['rescom'];
							//penalties
							$penstatus=$_GET['penstatus'];
							$pendate=$_GET['pendate'];
							$penpercent=$_GET['penpercent'];
							
							$resultx =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$hid=stripslashes($rowx['houseid']);
							$hname=stripslashes($rowx['housename']);




							
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);




							$st=$stamp=stampreverse($date);
							$months=$leasetam-$fitperiod;
					        $allperiod=$leasetam+$fitperiod;


					        //end date
					        $s = new DateTime($st);
					        $s->modify('+'.$allperiod.'month');
					        $s->modify('-1day');
					        $finalend= $s->format('Ymd');

					       
					         

					        //fit period
					        $s = new DateTime($stamp);
					        $s->modify('+'.$fitperiod.'month');
					        $end=$commence=$s->format('Ymd');
					        $end = new DateTime($end);
					        $end->modify('-1day');
					        $endfree= $end->format('Ymd');
					        //rent free
					        $rentfree='From '.$date.' to '.stamptodate($endfree).'-Rent Free';
					        $esc[0]=array(stampreverse($date),$endfree,0,1);
					        $escalation.=$rentfree;
					        //first year



					        $yearone=$oneyear=$commence;
					        $s = new DateTime($commence);
					        $s->modify('+'.$escint.'year');
					        $end=$commence=$s->format('Ymd');
					        $end = new DateTime($end);
					        $end->modify('-1day');
					        $endfree= $end->format('Ymd');

					        $oneyear='<br/>From '.stamptodate($oneyear).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
					        $escalation_expiry_stamp=$endfree;
					        $esc[1]=array($yearone,$endfree,$rent,0);
					        $escalation.=$oneyear;
					        $months-=$monvar;



					        
					        $xy=2;
					        while($months>0){

					        $rent=round(($rent*1.1),2);

					        $start=$commence;
					        $s = new DateTime($commence);
					        $s->modify('+'.$escint.'year');
					        $end=$commence=$s->format('Ymd');
					        $end = new DateTime($end);
					        $end->modify('-1day');
					        $endfree= $end->format('Ymd');
					        if($months<$monvar){
					          $endfree=$finalend;
					        }

					        $oneyear='<br/>From '.stamptodate($start).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
					        $esc[$xy]=array($start,$endfree,$rent,0);
					        $escalation.=$oneyear;
					        $months-=$monvar;
					        $xy++;

					        }


					         $aa=substr($payabledate,1,1);
					         if($aa==1){$bb='st';}else if($aa==2){$bb='nd';}if($aa==3){$bb='rd';}else{$bb='th';}
					         $pp=stampreverse($commencedate);
					         $pp=substr($pp, 0,6);
					         $payable_expiry=$pp.$payabledate;

					         $mon=getmonth($commencedate);





					         $totdep=$monrent*$depmonths;
					         $maindeposit=$totdep+$utildep;
					         $deppayable=$depmonthscurrent*$monrent;
					         $depandrent=$deppayable+$monrent;
					         $deppayabletot=$depandrent+$utildep;
					         $payment_breakdown='';
					         $payment_breakdown.='Security Deposit ('.$depmonthscurrent.' Month(s) Rent)&nbsp;&nbsp;KSh.'.number_format($deppayable);
					         $payment_breakdown.='<br/>First Month`s Rent (Including VAT)&nbsp;&nbsp;&nbsp;KSh.'.number_format($monrent);
					         $payment_breakdown.='<br/>Water and Electricity Deposit&nbsp;&nbsp;&nbsp;&nbsp;KSh.'.number_format($utildep);
					         $payment_breakdown.='<br/>Legal Fees Deposit (Including VAT)&nbsp;&nbsp;&nbsp;TBA';
					         $payment_breakdown.='<br/>Stamp Duty/Registration Fees &nbsp;&nbsp;&nbsp;&nbsp;TBA';
					         $payment_breakdown.='<br/>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KShs.'.number_format($deppayabletot);

							
					         //into lof
					        $resulty = mysql_query("select * from lof order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$lof=stripslashes($rowy['id'])+1;

							$resulta= mysql_query("insert into lof values('".$lof."','".$bname."','".$address."','".$rid."','".$roomno."','".$location."','".$leaseterm."','".$commencedate."','".stampreverse($commencedate)."','".stamptodate($finalend)."','".$finalend."','".$monrent."','".$payabledate.$bb."','".$commencedate."','".$escper."','".$escalation."','".$utildep."','".$servicecharge."','".$depmonths."','".$totdep."','".$depositinfo."','".$usage."','".$fitperiod."','".$lawyer."','".$chequename."','".$deppayabletot."','".$payment_breakdown."','".date('d/m/Y')."','".date('Ymd')."','".$username."',1,'".$next."','".$sap."','".$escint."','','".$penpercent."','".$pendate."','".$penstatus."','".$rescom."','".$vatstatus."','','','','','','','','','')");
							$resultb = mysql_query("update shopapps set status=2 WHERE id='".$sap."'");

							//insert into escalations
							$max=count($esc);
							for ($i = 0; $i < $max; $i++){
							$start = $esc[$i][0];
							$end = $esc[$i][1];
							$amount = $esc[$i][2];
							$status = $esc[$i][3];
							$resultd= mysql_query("insert into escalations values('0','".$lof."','','".$bname."','".$roomno."','".$start."','".$end."','".$amount."','".$status."')");
							}

							//register log
							$resulta = mysql_query("insert into log values('0','".$username." inserts data into letter of offers table.LOF:".$lof."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resulta){
							echo"<script>window.open('report.php?id=1&rcptno=".$lof."');</script>";
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Your Letter of Offer has been saved!", "success");</script>';
							echo"<script>setTimeout(function() {lof();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You LOF has not been saved!", "error");</script>';
							}


							


							break;

							case 3.1:
							//into tenants
							$lof=$param=$_GET['param'];

							$resultx =mysql_query("select * from lof where id='".$param."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$sap=stripslashes($rowx['sap']);
							$rid=stripslashes($rowx['rid']);
							$amount=stripslashes($rowx['rent']);
							$rno=stripslashes($rowx['roomno']);
							$bname=$tname=stripslashes($rowx['bname']);
							$maindeposit=stripslashes($rowx['depamount']);
							$utildep=stripslashes($rowx['utildep']);
							$totaldep=$maindeposit+$utildep;
							$commstamp=substr(stripslashes($rowx['commencestamp']),0,6);
							$payable=stripslashes($rowx['payabledate']);
							$payable_expiry=$commstamp.substr($payable,0,2);
							$mon=substr($payable_expiry,4,2).'_'.substr($payable_expiry,0,4);
							$penstatus=stripslashes($rowx['penstatus']);
							$penpercent=stripslashes($rowx['penpercent']);
							$pendate=stripslashes($rowx['pendate']);
							$rescom=stripslashes($rowx['rescom']);
							$vatstatus=stripslashes($rowx['vat']);

							$resultz =mysql_query("select * from shopapps where id='".$sap."' limit 0,1");
							$rowz=mysql_fetch_array($resultz);

							$resultm =mysql_query("select * from escalations where lof='".$lof."' and status=0 limit 0,1");
							$rowm=mysql_fetch_array($resultm);
							$escalation_expiry_stamp=stripslashes($rowm['end']);
							
							$resultw =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
							$roww=mysql_fetch_array($resultw);
							$hid=stripslashes($roww['houseid']);
							$hname=stripslashes($roww['housename']);

							
							$resulty = mysql_query("select * from tenants order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$tid=stripslashes($rowy['tid'])+1;

							//lease stamp-30days
							//handover stamp-30days

							$tstamp=date('Ymd');
							$s = new DateTime($tstamp);
							$s->modify('+1month');
							$deposit_stamp_expiry=$lease_stamp_expiry= $handover_stamp_expiry=$s->format('Ymd');


							$resultc = mysql_query("INSERT INTO tenants (id, tid, lof, bname, address, phone, email, dname, dphone, date, stamp, status, rid, roomno, hid, hname, monrent, payable_expiry, contract_expiry_stamp, billing_type, escalation_type, invoice_status, invoice_expiry_stamp, penpercent, pendate, penstatus, penmonth, penwaivermonth,rescom, vat) VALUES ('0','".$tid."','".$lof."','".stripslashes($rowz['bname'])."','".stripslashes($rowz['address'])."','".stripslashes($rowz['phone'])."','".stripslashes($rowz['email'])."','".stripslashes($rowz['dname1'])."','".stripslashes($rowz['dphone1'])."','".date('d/m/Y')."','".date('Ymd')."',1,'".stripslashes($roww['rid'])."','".stripslashes($roww['roomno'])."','".stripslashes($roww['houseid'])."','".stripslashes($roww['housename'])."','".stripslashes($rowx['rent'])."','".$payable_expiry."','".stripslashes($rowx['endstamp'])."','Monthly','".stripslashes($rowx['escalation_type'])."',1,'".$payable_expiry."','".$penpercent."','".$pendate."','".$penstatus."',0,0,'".$rescom."','".$vatstatus."')");
							$resulth = mysql_query("update houses set tenant='".stripslashes($rowx['bname'])."',tenantid='".$tid."',status=1 where rid='".$rid."'");
							$resultm = mysql_query("update escalations set tid='".$tid."' where lof='".$lof."'");
							$resultm = mysql_query("update lof set status=2 where id='".$lof."'");
							$resultg = mysql_query("update tenants set total_deposit='".$totaldep."',bal_deposit='".$totaldep."',deposit_status=0,escalation_expiry_stamp='".$escalation_expiry_stamp."',lease_stamp_expiry='".$lease_stamp_expiry."',handover_stamp_expiry='".$handover_stamp_expiry."',deposit_stamp_expiry='".$deposit_stamp_expiry."' where tid='".$tid."'");	
							
							$resultx = mysql_query("insert into housetrack values('','".stripslashes($roww['rid'])."','".stripslashes($roww['roomno'])."','".stripslashes($roww['houseid'])."','".stripslashes($roww['housename'])."','Tenant Checkin','".stripslashes($rowx['rent'])."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							

							/*
							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;

							//insert invoice
							$desc='RENT INVOICE FOR '.$mon;
							if($vatstatus==1){$vat=round((($amount/1.16)*0.16),2);}else{$vat=0;}
							$vat=0;
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$amount."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','1','Rent','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
							$resultg = mysql_query("update tenants set bal='".$amount."',total_deposit='".$maindeposit."',bal_deposit='".$maindeposit."',deposit_status=0,escalation_expiry_stamp='".$escalation_expiry_stamp."' where tid='".$tid."'");	
							

							//post journal entries
							$amount=stripslashes($rowx['rent']);
							$amount=$amount-$vat;

							//income
							$journalno=0;$cid=635;$did=628;$refno=$tid;$date=date('Y/m/d');
							$description='Rent Income-'.stripslashes($rowx['bname']).'-'.stripslashes($rowx['roomno']);
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,stripslashes($roww['houseid']));
							
							//vat
							$amount=$vat
							$journalno=0;$cid=614;$did=628;$refno=$tid;$date=date('Y/m/d');
							$description='Rental Income VAT-'.stripslashes($rowx['bname']).'-'.stripslashes($rowx['roomno']);
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,stripslashes($roww['houseid']));
							
							*/
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." creates new tenant.tenant name:".$tname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Tenant created!", "success");</script>';
							//into session
							$item=$tid.'-'.stripslashes($rowz['bname']).'-'.stripslashes($roww['roomno']);
							$max=count($_SESSION['tenants']);
							$_SESSION['tenants'].=',"'.$item.'"';
							echo"<script>setTimeout(function() {loftenant();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Tenant not created!", "error");</script>';
							}





							break;

							case 3.2:
							$lof=$param=$_GET['param'];
							$result = mysql_query("update lof set status=0 WHERE id='".$lof."'");
							break;


							case 4:

							$tid=$param=$_GET['param'];
							$amount=$paying=$_GET['paying'];
							$date=$_GET['date'];
							$nremark=date('d/m/Y').'-'.mysql_real_escape_string(trim($_GET['remarks']));
							$lid=$paymode=$_GET['paymode'];
							$refno=$_GET['refno'];
							

							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$paid_deposit=stripslashes($rowx['paid_deposit']);
							$bal_deposit=stripslashes($rowx['bal_deposit']);
							$bname=stripslashes($rowx['bname']);
							$hid=stripslashes($rowx['hid']);
							$rid=stripslashes($rowx['rid']);
							$rno=stripslashes($rowx['roomno']);
							$hname=stripslashes($rowx['hname']);
							$bal=stripslashes($rowx['bal']);
							$oremark=stripslashes($rowx['deposit_remarks']);
							$remarks=$oremark.'<br/>'.$nremark;

							$resultb = mysql_query("select * from ledgers where ledgerid='".$lid."'");
							$rowb=mysql_fetch_array($resultb);
							$lname=stripslashes($rowb['name']);

							$newbal=$bal_deposit-$paying;
							$newpaid=$paid_deposit+$paying;
							if($newbal<=0){$status=1;}else{$status=0;}

							
							$next=stampreverse($date);
							

							//get receipt number
							$result =mysql_query("select * from receipts where drcr='cr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$rcptno=stripslashes($row['rcptno'])+1;

							//insert receipt
							$mon=getmonth(date('d/m/Y'));
							$desc='DEPOSIT PAYMENT';
							$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','".$lid."','".$desc."','','".$bal."','".date('Ymd')."','cr',1,2,'".$username."','".date('Ymd')."')");
							$resultf = mysql_query("insert into receipt values('0','".$rcptno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','12','Deposit','".$amount."','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$refno."','".$lid."','".$lname."',0,'".date('Ymd')."')");
							$resultg = mysql_query("update tenants set paid_deposit='".$newpaid."',bal_deposit='".$newbal."',deposit_status='".$status."',deposit_stamp_expiry='".$next."',deposit_remarks='".$remarks."' where tid='".$tid."'");	
							

							//post journal entries
							$journalno=0;$cid=627;$did=$paymode;$refno=$refno;$date=date('Y/m/d');
							$description='Deposits Payment-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);

							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." receives deposit from tenant-".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resulte){
							echo"<script>window.open('report.php?id=2&rcptno=".$rcptno."');</script>";
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Deposit Payment Received!", "success");</script>';
							echo"<script>setTimeout(function() {deposits();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Deposit Payment not received!", "error");</script>';
							}


							


							break;

							case 5:


							$tid=$param=$_GET['param'];
							$remarks=$_GET['remarks'];
							$leaseno=$_GET['leaseno'];
							$password=$_GET['password'];

							$result =mysql_query("select * from users where name='".$username."' and password=sha1('".$password."')");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)==0){
							echo '<script>swal("Error", "Incorrect user password!", "error");</script>';
							exit;
							}

							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);

							$resultg = mysql_query("update tenants set leaseno='".$leaseno."',lease_upload_stamp='".date('Ymd')."',lease_status='1',lease_details='".$remarks."',lease_upload_by='".$username."' where tid='".$tid."'")    or die (mysql_error());
							

							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." Uploads lease for tenant no-".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Lease uploaded and details captured!", "success");</script>';
							echo"<script>setTimeout(function() {lease();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Lease not uploaded!", "error");</script>';
							}

							break;

							case 6:


							$tid=$param=$_GET['param'];
							$remarks=$_GET['remarks'];
							
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);

							$resultg = mysql_query("update tenants set handover_stamp='".date('Ymd')."',handover_status='1',handover_details='".$remarks."',handover_by='".$username."' where tid='".$tid."'")    or die (mysql_error());
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." hands over unit to tenant no-".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Unit Handover Completed!", "success");</script>';
							echo"<script>window.open('report.php?id=88&rcptno=".$tid."');</script>";
							echo"<script>setTimeout(function() {handover();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Unit Handover failed!", "error");</script>';
							}

							break;

							case 7:


							$person=$_GET['person'];
							$remarks=$_GET['remarks'];
							$documents=$_GET['documents'];
							
							
							$resultg = mysql_query("insert into docsregistry values('0','".$_GET['documents']."','".getuser($username)."','".date('d/m/Y')."','".date('H:i A')."','".$_GET['remarks']."','".$_GET['person']."','','','','','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							
							if($resultg){
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." sends document','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Documents Registration Successful!", "success");</script>';
							echo"<script>setTimeout(function() {senddocuments();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Documents Registration failed!", "error");</script>';
							}

							break;

							case 7.1:


							$date=$_GET['date'];
							$time=$_GET['time'];
							$received=$_GET['received'];
							$remarks=$_GET['remarks'];
							$did=$_GET['did'];
							
							$resultg = mysql_query("update docsregistry set receivedby='".$received."',receivedate='".$date."',receivetime='".$time."',receiveremarks='".$remarks."',status=2 where id='".$did."'")    or die (mysql_error());
							
							
							if($resultg){
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." receives document-id:".$did."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Document Received!", "success");</script>';
							echo"<script>setTimeout(function() {documents();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Document not received!", "error");</script>';
							}

							break;

							case 8:


							$tid=$param=$_GET['param'];
							$remarks=$_GET['remarks'];
							$vacate=$_GET['vacate'];
							$notice=$_GET['notice'];
							$unided=$_GET['unided'];
							$notded=$_GET['notded'];
							$othded=$_GET['othded'];
							$depayable=$_GET['depayable'];
							$tenbal=$_GET['tenbal'];
							$paymode=$_GET['paymode'];
							$refno=$_GET['refno'];
							$total=$unided+$notded+$othded;

							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$rno=stripslashes($rowx['roomno']);
							$rid=stripslashes($rowx['rid']);
							$hid=stripslashes($rowx['hid']);
							$hname=stripslashes($rowx['hname']);
							$rent=stripslashes($rowx['monrent']);
							
							$resultg = mysql_query("update tenants set status='0',unit_deductions='".$unided."',notice_deductions='".$notded."',other_deductions='".$othded."',total_deductions_on_checkout='".$total."',deposit_paid='".$depayable."' where tid='".$tid."'")    or die (mysql_error());
							$resulth = mysql_query("update houses set tenant='',tenantid='',status=0 where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$rno."','".$hid."','".$hname."','Tenant Checkout','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							

							//if kukalia deposit
							if($tenbal!=0){


								$resulty =mysql_query("select * from invoices where tid='".$tid."' and invbal!=0 order by id desc");
					              $num_resultsy = mysql_num_rows($resulty);
					               $xy=0;
					                for ($i=0; $i <$num_resultsy; $i++) {
					                $rowy=mysql_fetch_array($resulty);
					                $invbal=stripslashes($rowy['invbal']);
					                $paid=stripslashes($rowy['paid']);
					                $itcode=stripslashes($rowy['id']);
					                $paid=$paid+$invbal;

					                $resultb = mysql_query("update invoices set paid='".$paid."',invbal='0',invstatus=0 where id='".$itcode."'");
								 }


								 $resultg = mysql_query("update tenants set bal='0' where tid='".$tid."'");	


								 //post journal entries
								$journalno=0;$cid=628;$did=627;$refno=$refno;$date=date('Y/m/d');
								$description='Tenant Balance Clearing on Checkout-'.$bname.'-'.$rno;
								postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Minus',$tenbal,$description,$refno,$date,$username,$hid);

							}

							if($total!=0){
							//post journal entries
							$journalno=0;$cid=675;$did=627;$refno=$refno;$date=date('Y/m/d');
							$description='Deposits Deductions-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Minus',$total,$description,$refno,$date,$username,$hid);
							
							}

							
							if($depayable!=0){
							//post journal entries
							$journalno=0;$cid=$paymode;$did=627;$refno=$refno;$date=date('Y/m/d');
							$description='Deposits Return after Deductions-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$depayable,$description,$refno,$date,$username,$hid);
							}

							


							//register log
							$resulta = mysql_query("insert into log values('0','".$username." checks out  tenant no-".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Unit Checkout Completed!", "success");</script>';
							echo"<script>setTimeout(function() {checkout();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Unit Checkout failed!", "error");</script>';
							}

							break;

							case 9:

							$tid=$param=$_GET['param'];
							$bname=$_GET['bname'];
							$address=$_GET['address'];
							$phone=$_GET['phone'];
							$email=$_GET['email'];
							$eno=$_GET['eno'];
							$eyear=$_GET['eyear'];
							$idno=$_GET['idno'];
							$soi=$_GET['soi'];
							
							$pin=$_GET['pin'];
							$btype=$_GET['btype'];

							$currfacility=$_GET['currfacility'];
							$county=$_GET['county'];
							$subcounty=$_GET['subcounty'];
							

							//next of kin
							$gname=$_GET['gname'];
							$grship=$_GET['grship'];
							$gphone=$_GET['gphone'];
							$mgroup=$_GET['mgroup'];




							//escalations
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);


							
					       	$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$rid=stripslashes($rowx['rid']);
							$oldroomno=stripslashes($rowx['roomno']);
							$lof=stripslashes($rowx['lof']);

							$resultg = mysql_query("update tenants set bname='".$bname."',address='".$address."',phone='".$phone."',idno='".$idno."',pin='".$pin."',email='".$email."',eno='".$eno."',eyear='".$eyear."',billing_type='".$btype."',county='".$county."',subcounty='".$subcounty."',currfacility='".$currfacility."',gname='".$gname."',gphone='".$gphone."',grship='".$grship."',mgroup='".$mgroup."'   where tid='".$tid."'")    or die (mysql_error());
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." updates  member info.Mamber name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo '<script>swal("Success!", "Member Info Saved!", "success");</script>';
							updatetenants();
							echo"<script>window.open('report.php?id=89&rcptno=".$tid."');</script>";
							
							echo"<script>setTimeout(function() {edittenant();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Member Info not Saved!", "error");</script>';
							}


							break;



							case 10:
							$tid=$param=$_GET['param'];
							$vacdate=$_GET['date'];
							$desc=$_GET['remarks'];
							$stamp=date('Ymd');
							$date=date('d/m/Y');
							
							$result =mysql_query("select * from vacate order by id desc limit 0,1");
							$row=mysql_fetch_array($result);
							$rcptno=stripslashes($row['id'])+1;
							
							$resultf = mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$row=mysql_fetch_array($resultf);
							$hname=stripslashes($row['hname']);
							$phone=stripslashes($row['phone']);
							$bname=stripslashes($row['bname']);
							$rno=stripslashes($row['roomno']);
							
							$result = mysql_query("insert into vacate values('".$rcptno."','".stripslashes($row['rid'])."','".$param."','".stripslashes($row['bname'])."','".stripslashes($row['hname'])."','".stripslashes($row['roomno'])."','".$vacdate."','".$desc."','".$date."','".$stamp."',1)");
							if($result){

							//insert into events
							$vacationdate=''.$vacdate.' 08:00 AM - '.$vacdate.' 10:00 PM';

							$arr=explode(' ',$vacationdate);


							$s1=$arr[0];
							$s2=$arr[1];
							$s3=$arr[2];
							$s4=$arr[3];
							$s5=$arr[4];
							$s6=$arr[5];
							$s7=$arr[6];

							$startstamp=$s2.$s3;
							$startstamp=stampreverse($s1).backtime2($startstamp);

							$endstamp=$s6.$s7;
							$endstamp=stampreverse($s5).backtime2($endstamp);

							$resulta = mysql_query("insert into events values('0','Vacate Notice:".$bname."','".date('d/m/Y')."','".date('h:i A')."','".date('YmdHi')."','".date('Ymd')."','".$s1."','".$s2.$s3."','".$startstamp."','".$s5."','".$s6.$s7."','".$endstamp."','".$username."','1','','')");
							

							//send sms
							$message='Hello '.$bname.'. Your are hereby notified to have vacated from unit no: '.$rno.' at '.$hname.'  by '.$vacdate.'. Thank you.';
							sendsms($message,$phone);


							$resulta = mysql_query("insert into log values('0','".$username." generates vacate notice.Tenant id:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							echo '<script>swal("Success!", "Vacate notice generated!", "success");</script>';
							echo'<script>setTimeout(function() {vacate();},500);</script>';
							echo"<script>window.open('report.php?id=3&rcptno=".$rcptno."');</script>";
							}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Notice not generated!", "error");</script>';
									}
							break;

							case 11:


							$tid=$param=$_GET['param'];
							$remarks=$_GET['remarks'];
							$date=$_GET['date'];
							$finalend=stampreverse($date);

							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$details=stripslashes($rowx['extension_details']);
							$escint=stripslashes($rowx['escalation_type']);
							$bname=stripslashes($rowx['bname']);
							$roomno=stripslashes($rowx['roomno']);
							$end=stripslashes($rowx['contract_expiry_stamp']);
							$remarks=$details.'.'.date('d/m/Y').'-'.$remarks;
							$monvar=12*$escint;

							$resultx =mysql_query("select * from escalations where end<='".$end."' and tid='".$tid."' order by id desc limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$rent=stripslashes($rowx['amount']);


							//insert into escalations
							if($finalend>$end){

								$months=getdiffmonths($end,$finalend);
								 $commence = new DateTime($end);
						         $commence->modify('+1day');
						         $commence= $commence->format('Ymd');

							    $xy=0;
						        while($months>0){

							        $rent=round(($rent*1.1),2);
									$start=$commence;
							        $s = new DateTime($commence);
							        $s->modify('+'.$escint.'year');
							        $end=$commence=$s->format('Ymd');
							        $end = new DateTime($end);
							        $end->modify('-1day');
							        $endfree= $end->format('Ymd');
							        if($months<$monvar){
							          $endfree=$finalend;
							        }

							        $oneyear='<br/>From '.stamptodate($start).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
							        $esc[$xy]=array($start,$endfree,$rent,0);
							        $escalation.=$oneyear;
							        $months-=$monvar;
							        $xy++;

						        }

						        //insert into escalations
								$max=count($esc);
								for ($i = 0; $i < $max; $i++){
								$start = $esc[$i][0];
								$end = $esc[$i][1];
								$amount = $esc[$i][2];
								$status = $esc[$i][3];
								if($i==0){$escalation_expiry_stamp=$end;}
								$resultd= mysql_query("insert into escalations values('0','0','".$tid."','".$bname."','".$roomno."','".$start."','".$end."','".$amount."','".$status."')");
								}



					    	}

							

							


							
							
							$resultg = mysql_query("update tenants set extension_details='".$remarks."',contract_expiry_stamp='".$finalstamp."' where tid='".$tid."'")    or die (mysql_error());
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." extends tenant contract for tenant no-".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Tenant Contract Extended!", "success");</script>';
							echo"<script>setTimeout(function() {extendcontract();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Contract not extended!", "error");</script>';
							}

							break;

							case 12:


							$param=$_GET['param'];
							$start=stampreverse($_GET['start']);
							$end=stampreverse($_GET['end']);
							$amount=$_GET['amount'];
							$stamp=date('Ymd');


							$resultx =mysql_query("select * from escalations where id='".$param."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$tid=stripslashes($rowx['tid']);

							
							$resultg = mysql_query("update escalations set start='".$start."',end='".$end."',amount='".$amount."' where id='".$param."'")    or die (mysql_error());
							
							if($stamp<=$end&&$stamp>=$start){
								$resultg = mysql_query("update escalations set status=0 where tid='".$tid."'")    or die (mysql_error());
								$resultg = mysql_query("update escalations set status=1 where id='".$param."'")    or die (mysql_error());
								if($amount!=0){
										$resulth = mysql_query("update tenants set monrent='".$amount."' where tid='".$tid."'")    or die (mysql_error());
								
								}
							}
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." edits rent escalation schedule for tenant no-".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								}

							break;

							case 12.1:


							$start=stampreverse($_GET['start']);
							$end=stampreverse($_GET['end']);
							$amount=$_GET['amount'];
							$tid=$_GET['tid'];
							$stamp=date('Ymd');


							$resultx =mysql_query("select * from escalations order by id desc limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$param=stripslashes($rowx['id'])+1;

							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$tid=stripslashes($rowx['tid']);
							$lof=stripslashes($rowx['lof']);
							$bname=stripslashes($rowx['bname']);
							$roomno=stripslashes($rowx['roomno']);


							
							$resultg= mysql_query("insert into escalations values('0','0','".$tid."','".$bname."','".$roomno."','".$start."','".$end."','".$amount."','0')");


							if($stamp<=$end&&$stamp>=$start){

								$resultg = mysql_query("update escalations set status=0 where tid='".$tid."'")    or die (mysql_error());
								$resultg = mysql_query("update escalations set status=1 where id='".$param."'")    or die (mysql_error());
							}
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." creates rent escalation schedule for tenant no-".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo "<script>loadescalation('".$tid."')</script>";
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								}

							break;

							case 12.2:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from escalations where id='".$code."'");
							$resulta = mysql_query("insert into log values('','".$username." deletes escalation record.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							break;

							case 13:
							$a=$_GET['a'];
							$param=$hid=$_GET['b'];
							$name=$_GET['name'];
							if($a==1){
							$question =mysql_query("SELECT * FROM mainhouses order by houseid desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$hid=stripslashes($ans['houseid'])+1;

							$result= mysql_query("insert into mainhouses values('".$hid."','".$_GET['housetype']."','".$_GET['value']."','".$_GET['name']."','".$_GET['units']."','".$_GET['location']."','".$_GET['owner']."','".$_GET['phone']."',1,0,'".$_GET['address']."','".$_GET['plot']."','".$_GET['remarks']."','".$_GET['commision']."','".date('d/m/Y')."','".date('Ymd')."','".$_GET['fid']."','".$_GET['fname']."','".$_GET['water']."','".$_GET['commencedate']."','".stampreverse($_GET['commencedate'])."','".substr($_GET['paydate'],0,2)."','".stampreverse($_GET['paydate'])."','".$_GET['email']."','".$_GET['idno']."','".$_GET['pin']."','".$_GET['gname']."','".$_GET['grship']."','".$_GET['gphone']."','".$_GET['bankname']."','".$_GET['branchname']."','".$_GET['acname']."','".$_GET['acno']."','".$_GET['vatstatus']."','".$_GET['sid']."','".$_GET['sname']."','".$_GET['depositheldby']."','".$_GET['utilitiesby']."','".$_GET['carename']."','".$_GET['carephone']."','".$_GET['gemail']."','".$_GET['gidno']."')")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." inserts new property.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {addproperties();},500);</script>	';
							echo"<script>window.open('report.php?id=67&rcptno=".$hid."');</script>";
							}
							if($a==2){
							$result= mysql_query("update mainhouses set housetype='".$_GET['housetype']."',housevalue='".$_GET['value']."',housename='".$_GET['name']."',noofrooms='".$_GET['units']."',location='".$_GET['location']."',owner='".$_GET['owner']."',mobile='".$_GET['phone']."',postal='".$_GET['address']."',plot='".$_GET['plot']."',details='".$_GET['remarks']."',commision='".$_GET['commision']."',commencedate='".$_GET['commencedate']."',commencestamp='".stampreverse($_GET['commencedate'])."',paydate='".substr($_GET['paydate'],0,2)."',paystamp='".stampreverse($_GET['paydate'])."',fid='".$_GET['fid']."',fname='".$_GET['fname']."',water='".$_GET['water']."',email='".$_GET['email']."',idno='".$_GET['idno']."',pin='".$_GET['pin']."',gname='".$_GET['gname']."',grship='".$_GET['grship']."',gphone='".$_GET['gphone']."',bankname='".$_GET['bankname']."',branchname='".$_GET['branchname']."',acname='".$_GET['acname']."',acno='".$_GET['acno']."',vat='".$_GET['vatstatus']."',sid='".$_GET['sid']."',sname='".$_GET['sname']."',depositheldby='".$_GET['depositheldby']."',utilitiesby='".$_GET['utilitiesby']."',carename='".$_GET['carename']."',carephone='".$_GET['carephone']."',gemail='".$_GET['gemail']."',gidno='".$_GET['gidno']."' where houseid='".$hid."'")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." edits property.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {editproperties();},500);</script>	';
							echo"<script>window.open('report.php?id=67&rcptno=".$hid."');</script>";
							}
							
							if($result){
							$resultc = mysql_query("update company set Property='".$_GET['name']."',Plot='".$_GET['plot']."'");
							echo '<script>swal("Success!", "Property data updated!", "success");</script>';
							echo'<img src="img/tick.png" style="margin-top:0px;width:30px; height:30px">';
							}else{echo'<img src="img/delete.png" style="margin-top:0px;width:30px; height:30px">';
							echo '<script>swal("Error", "Property data not updated!", "error");</script>';
							}
							
							break;

							case 13.1:
							$param=$hid=$_GET['b'];
							$result= mysql_query("update mainhouses set status=0 where houseid='".$param."'")  or die (mysql_error());
							$result = mysql_query("DELETE from houses where houseid='".$param."'");
							$result= mysql_query("update tenants set status=0 where hid='".$param."'")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." archives property.Name:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {findproperties();},500);</script>	';
						

							break;

							case 13.2:
							$param=$hid=$_GET['b'];
							$result= mysql_query("update mainhouses set status=1 where houseid='".$param."'")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." restores property.Name:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {findproperties();},500);</script>	';
						

							break;

							case 13.3:
							$param=$tid=$_GET['b'];
							$result= mysql_query("update tenants set status=0 where tid='".$param."'")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." archives member.Name:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {checkout();},500);</script>	';
						

							break;


							case 14:
							$a=$_GET['a'];
							$param=$rid=$_GET['b'];
							$roomno=$name=$_GET['roomno'];
							$hid=$_GET['property'];
							$rent=$_GET['rent'];
							$elecmeterserial=$_GET['elecmeterserial'];
							$elecmaxload=$_GET['elecmaxload'];
							$housestatus=$_GET['housestatus'];
							

							


							$result =mysql_query("select * from mainhouses where houseid='".$hid."'");
                        	$row=mysql_fetch_array($result);
                            $hname=stripslashes($row['housename']);
                            $htype=stripslashes($row['housetype']);


							if($a==1){
							if($housestatus=='Active'){$status=0;}else{$status=1;}

							$result =mysql_query("select * from houses where houseid='".$hid."' and roomno='".$roomno."'");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)>0){
							echo '<script>swal("Error", "Unit with the same name already exists in the database!", "error");</script>';
							exit;
							}
							$question =mysql_query("SELECT * FROM houses order by rid desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rid=stripslashes($ans['rid'])+1;

							$result = mysql_query("insert into houses values('".$rid."','".$hid."','".$hname."','".$htype."','".$_GET['roomno']."','".$_GET['roomtype']."','".$_GET['location']."','','".date('d/m/Y')."','','".$_GET['tenant']."','".$_GET['rent']."','".date('Ymd')."','".$status."','".$_GET['elecprev']."','".$_GET['waterprev']."','".$_GET['rescom']."','".$_GET['watermeter']."','".$_GET['elecmeter']."','".$_GET['floorspace']."','".$_GET['remarks']."','".$_GET['elecmeterserial']."','".$_GET['elecmaxload']."','".$_GET['waterac']."','".$_GET['elecac']."','".$_GET['housestatus']."')");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Creation','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." inserts new unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#elecmeter').val('');$('#watermeter').val('');$('#elecprev').val('');$('#waterprev').val('');$('#roomno').val('').focus();$('#remarks').val('');</script>";
							}
							if($a==2){

							$result =mysql_query("select * from houses where houseid='".$hid."' and roomno='".$roomno."' and rid!='".$rid."'");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)>0){
							echo '<script>swal("Error", "Unit with the same name already exists in the database!", "error");</script>';
							exit;
							}
							
							$result = mysql_query("update houses set houseid='".$hid."',housename='".$hname."',housetype='".$htype."',roomno='".$_GET['roomno']."',roomtype='".$_GET['roomtype']."',location='".$_GET['location']."',rent='".$_GET['rent']."',rescom='".$_GET['rescom']."',elecprevious='".$_GET['elecprev']."',waterprevious='".$_GET['waterprev']."',watermeter='".$_GET['watermeter']."',elecmeter='".$_GET['elecmeter']."',floorspace='".$_GET['floorspace']."',details='".$_GET['remarks']."',elecmeterserial='".$_GET['elecmeterserial']."',elecmaxload='".$_GET['elecmaxload']."',waterac='".$_GET['waterac']."',elecac='".$_GET['elecac']."',housestatus='".$_GET['housestatus']."',tenant='".$_GET['tenant']."' where rid='".$rid."'");
							$resultg = mysql_query("update tenants set monrent='".$_GET['rent']."',roomno='".$_GET['roomno']."'   where rid='".$rid."' and status=1")    or die (mysql_error());
							if($housestatus=='Not for Rent'){$resultg = mysql_query("update houses set status='1' where rid='".$rid."'")    or die (mysql_error());}

							$result = mysql_query("DELETE from meters where rid='".$rid."'");


							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Information Editing','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." edits unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {findunits();},500);</script>	';
							}


							//update meters info
								$max=0;
								if(isset($_SESSION['meters'])){
								$max=count($_SESSION['meters']);
								}
								for ($i = 0; $i < $max; $i++){
										$metertype = $_SESSION['meters'][$i][0];
										$meterno = $_SESSION['meters'][$i][1];
										$meteracno = $_SESSION['meters'][$i][2];
										$curread = $_SESSION['meters'][$i][3];

										$resultx = mysql_query("insert into meters values('','".$rid."','".$metertype."','".$meterno."','".$meteracno."','".$curread."','')");
										if($metertype=='Water'){
											$resultg = mysql_query("update houses set watermeter='".$meterno."' where rid='".$rid."'");
										}else if($metertype=='Electricity'){
											$resultg = mysql_query("update houses set elecmeter='".$meterno."' where rid='".$rid."'");
										}
										

								}

								unset($_SESSION['meters']);
								echo"<script>$('#cartmeters').html('');</script>";
							
							break;

							case 14.1:
							$param=$rid=$_GET['code'];
							$result =mysql_query("select * from houses where rid='".$rid."' and status=0");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)==0){
							//echo '<script>swal("Error", "Unit has to be empty first for deletion", "error");</script>';
							//exit;
							}
							$result = mysql_query("DELETE from houses where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Deletion','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." deletes unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {findunits();},500);</script>';

							if($result){
							echo '<script>swal("Success!", "Unit data updated!", "success");</script>';
							echo'<img src="img/tick.png" style="margin-top:0px;width:30px; height:30px">';
							}else{echo'<img src="img/delete.png" style="margin-top:0px;width:30px; height:30px">';
							echo '<script>swal("Error", "Unit data not updated!", "error");</script>';
							}


							break;

							case 15:
							
							//get receipt no and insert into requests
							
							$locid = $_SESSION['cart'][0][7];
							
							$question =mysql_query("SELECT * FROM requests order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['rcptno'])+1;
							
									$max=count($_SESSION['cart']);
									for ($i = 0; $i < $max; $i++){
											$itcode = $_SESSION['cart'][$i][0];
											$itname = $_SESSION['cart'][$i][1];
											$itquat = $_SESSION['cart'][$i][2];
											$depid = $_SESSION['cart'][$i][3];
											$depname = $_SESSION['cart'][$i][4];
											$price = $_SESSION['cart'][$i][5];
											$total = $_SESSION['cart'][$i][6];
											$locid = $_SESSION['cart'][$i][7];
											$location = $_SESSION['cart'][$i][8];
											$notes = $_SESSION['cart'][$i][9];
											$vat = $_SESSION['cart'][$i][10];
											
											
											$resulta = mysql_query("insert into requests values('','".$rcptno."','".$itcode."','".$itname."','".$depid."','".$depname."','".$itquat."','".$price."','".$total."','".date('d/m/Y')."','".date('Ymd')."',1,'".$locid."','".$location."','".$notes."','".$vat."')");
											$resultb = mysql_query("update items set Price='".$price."' where ItemCode='".$itcode."'");	
							}
							
							//insert into stock track
							$resultd = mysql_query("insert into requesttrack values('','".$rcptno."','".$username."','".date('d/m/Y')."','".date('Ymd')."','REQUEST INITIATED BY ".$fullname."')");	
						
							
						
							if($resulta){
									unset($_SESSION['cart']);

									echo '<script>swal("Success!", "Requisition saved!", "success");</script>';
									echo"<script>window.open('report.php?id=4&rcptno=".$rcptno."');</script>";
									$resulta = mysql_query("insert into log values('0','".$username." makes a Requisition.Rcpt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									
									//insert into messages
									$arr=array();
									$resulta =mysql_query("select * from accesstbl where AccessCode='160'");
									$rowa=mysql_fetch_array($resulta);
									if(stripslashes($rowa['Admin'])=='YES'){$arr[]='Admin';}
									if(stripslashes($rowa['Accounts'])=='YES'){$arr[]='Accounts';}
									if(stripslashes($rowa['Procurement'])=='YES'){$arr[]='Procurement';}
									
									
										foreach ($arr as $key => $val) {
											$resultd =mysql_query("SELECT * FROM users WHERE position='".$val."'");
											$num_resultsd = mysql_num_rows($resultd);	
											for ($d=0; $d <$num_resultsd; $d++) {
											$rowd=mysql_fetch_array($resultd);
											$user=stripslashes($rowd['name']);
											$resulte = mysql_query("insert into messages values('','".$user."','System','Pending request for approval. Request No:".$rcptno."','','".date('d/m/Y-h:i A')."','".date('Ymd')."',0)");
											}
										}

										notificationscount($username);
									
									
										exit;
							}
							else{
								$result = mysql_query("DELETE from requests where rcptno='".$rcptno."'");
								echo '<script>swal("Error", "Requisition data not updated!", "error");</script>';
								
								}
							break;

							case 16:
							$resulta = mysql_query("update requests set qty='".$_GET['qty']."',price='".$_GET['price']."',total='".$_GET['total']."' where id='".$_GET['code']."'");
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." updates request info.ID:".$_GET['code']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="20" height="20"/>';
							exit;
							}
							else{echo'<img src="img/delete.png" style=""  width="20" height="20"/>';}
							
							break;
							
							case 17:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from requests where id='".$code."'");
							$resulta = mysql_query("insert into log values('','".$username." deletes request Info. ID:".$_GET['code']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
							break;

							case 18:
							$rcptno=$_GET['b'];
							$action=$_GET['action'];
							$status=$_GET['a'];
							$resulta = mysql_query("update requests set status='".$status."' where rcptno='".$rcptno."'");
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." ".$action."s requisition.Rcpt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo"<script>setTimeout(function() {approvereq();},500);</script>";	
									if($status==2){
									echo"<script>window.open('report.php?id=4&rcptno=".$rcptno."');</script>";
									$resulte = mysql_query("insert into requesttrack values('','".$rcptno."','".$username."','".date('d/m/Y')."','".date('Ymd')."','REQUEST APPROVED BY ".$fullname."')");
									}else{
										$resulte = mysql_query("insert into requesttrack values('','".$rcptno."','".$username."','".date('d/m/Y')."','".date('Ymd')."','REQUEST REJECTED BY ".$fullname."')");
									}
								
							exit;
							}
							else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
							break;


							case 19:
							$rcptno=$_GET['b'];
							$action=$_GET['action'];
							$status=$_GET['a'];
							$supid=$_GET['supid'];

						 	
							$resulta = mysql_query("update requests set status='".$status."' where rcptno='".$rcptno."'");
							if($status==4){

								$total=0;$vat=0;
							 	$resulta =mysql_query("select * from requests where rcptno='".$rcptno."'");
	                            $num_resultsa = mysql_num_rows($resulta); 
	                             for ($i=0; $i <$num_resultsa; $i++) {
		                            $rowa=mysql_fetch_array($resulta);
		                            $total+=preg_replace('~,~', '', stripslashes($rowa['total']));
		                            $vat+=preg_replace('~,~', '', stripslashes($rowa['vat']));
		                            $amount=preg_replace('~,~', '', stripslashes($rowa['total']));
		                            $notes=stripslashes($rowa['notes']);
		                            $hid=stripslashes($rowa['depid']);
		                            $code=stripslashes($rowa['itemcode']);

		                            $result =mysql_query("select * from items where ItemCode='".$code."'");
		                        	$row=mysql_fetch_array($result);
		                            $did=stripslashes($row['Lid']);
		                            
		                            //post journal entries
									$journalno=0;$cid=629;$did=$did;$refno=$rcptno;$date=date('Y/m/d');
									$description='Maintainance-'.$notes.'-'.$rcptno;
									postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);

								}

								$resulta =mysql_query("select * from suppliers where supid='".$supid."'");
								$rowa=mysql_fetch_array($resulta);
								$supname=stripslashes($rowa['supname']);  
								$bal=stripslashes($rowa['bal']);
								$sbal=$bal+$total;  
							
								//insert into supplierdebts
								$resultx = mysql_query("insert into supplierdebts values('','".$supid."','".$supname."','".$rcptno."','dr','".$total."','".date('d/m/Y')."','".date('Ymd')."',1,'SUPPLIER PURCHASES-REQUISITION NO:".$rcptno."','0','".$total."','".$sbal."','".$vat."')");
								$resulty = mysql_query("update suppliers set bal='".$sbal."' where supid='".$supid."'");

								

							}


							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." ".$action."s requisition for payment.Rcpt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo"<script>setTimeout(function() {closeout();},500);</script>";	
									if($status==2){
									$resulte = mysql_query("insert into requesttrack values('','".$rcptno."','".$username."','".date('d/m/Y')."','".date('Ymd')."','PAYMENT APPROVED BY ".$fullname."')");
									}else{
										$resulte = mysql_query("insert into requesttrack values('','".$rcptno."','".$username."','".date('d/m/Y')."','".date('Ymd')."','PAYMENT REJECTED BY ".$fullname."')");
									}
								
							exit;
							}
							else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
							break;

							case 20:
						
							$code=$_GET['code'];
							$name=$_GET['name'];
							$price=$_GET['price'];
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							
							$resulta = mysql_query("update items set ItemName='".$name."',Price='".$price."',Lid='".$lid."',Lname='".$lname."' where ItemCode='".$code."'");					
							
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." Updates Items Database.Code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
								exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
									
							break;
										
							case 21:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from items where ItemCode='".$code."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes Item from Items Database.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
								
							break;

							case 22:
							$name=$_GET['name'];
							$price=$_GET['price'];
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							$resulta = mysql_query("insert into items values('','".$name."','".$price."','','','".$lid."','".$lname."')");	
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." creates new item Items.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Success!", "Item Created!", "success");</script>';
							//echo"<script>setTimeout(function() {addreqitems();},500);</script>";	
								exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Error", "Item not created!", "error");</script>';}
							

							break;

							case 23:
							$fintot=$_GET['fintot'];
							//get receipt no and insert into requests
							$tid = $_SESSION['rent'][0][0];
							$result =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$row=mysql_fetch_array($result);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$rid=stripslashes($row['rid']);
							$rno=stripslashes($row['roomno']);
							$bname=stripslashes($row['bname']);
							$bal=stripslashes($row['bal']);
							$vatstatus=stripslashes($row['vat']);

							
							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;
							$invtot=0;$desc='';
							$max=count($_SESSION['rent']);
							for ($i = 0; $i < $max; $i++){
								$tid = $_SESSION['rent'][$i][0];
								$tname = $_SESSION['rent'][$i][1];
								$itquat = $_SESSION['rent'][$i][2];
								$actid = $_SESSION['rent'][$i][3];
								$actname = $_SESSION['rent'][$i][4];
								$price = $_SESSION['rent'][$i][5];
								$total = $_SESSION['rent'][$i][6];
								$roomno = $_SESSION['rent'][$i][7];
								$month = $_SESSION['rent'][$i][8];
								$notes = $_SESSION['rent'][$i][9];
								$statementstatus = $_SESSION['rent'][$i][10];
								$commstatus = $_SESSION['rent'][$i][11];

								$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
								$rowb=mysql_fetch_array($resultb);
								$actlid=stripslashes($rowb['lid']);
								$actlname=stripslashes($rowb['lname']);
								$vatper=stripslashes($rowb['vat'])/100;

								if($vatstatus==1){$vat=round((($total/(1+$vatper))*$vatper),2);}else{$vat=0;}
								$desc.=$notes.' ';

								//insert invoice
								if($fintot>=0){$desc.=$actname.'-INVOICE FOR '.$month.';';}else{$desc.=$actname.'-CREDIT NOTE:'.$month.';';}
								
								//$vat=0;
								$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$total."','0','".$total."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
								
								if($statementstatus==1){

									$resultg = mysql_query("insert into landtx values('0','".$month."','".$hid."','".$hname."','dr','".$actid."','".$actname."','".$desc."-Room No:".$rno."','".$total."','".date('d/m/Y')."','".date('Ymd')."','".$username."',1,'".$commstatus."')");
							
								}
								//post journal entries
								//income
								$amount=$total-$vat;
								$journalno=0;$cid=$actlid;$did=628;$refno=$tid;$date=date('Y/m/d');
								$description='Rent Income-'.$tname.'-'.$roomno;
								postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);


								if($vat!=0){
								$amount=$vat;
								$journalno=0;$cid=614;$did=628;$refno=$tid;$date=date('Y/m/d');
								$description='Rent Income Vat-'.$tname.'-'.$roomno;
								postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
								}


								$invtot+=$total;
							}

							$nbal=$bal+$invtot;
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$invtot."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");	
							
							
							
						
							if($resultf){
									unset($_SESSION['rent']);

									echo '<script>swal("Success!", "Invoice posted!", "success");</script>';
									echo"<script>window.open('report.php?id=5&rcptno=".$invno."');</script>";
									echo"<script>setTimeout(function() {invoicing();},500);</script>";	
									$resulta = mysql_query("insert into log values('0','".$username." invoices a tenant.Invoice No:".$invno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									}
							else{
								echo '<script>swal("Error", "Invoice not posted!", "error");</script>';
								
								}
							break;

							case 24:


							//check ledger lock
							$query =mysql_query("select * from ledgerlock where status=1");
							$count = mysql_num_rows($query);
							while($count>0){
								
							
							sleep(5);
							$query =mysql_query("select * from ledgerlock where status=1");
							$count = mysql_num_rows($query);
							}
							if($count==0){

							$resulte = mysql_query("update ledgerlock set status=1");

							$tid=$_GET['tid'];
							$fintot=$_GET['fintot'];
							$lid=$_GET['pid'];
							$lname=$_GET['pname'];
							$refno=$_GET['refno'];
							$date=$_GET['date'];
							$time=date('h:i A');
							$bankstamp=$stamp=stampreverse($date);
							$max=count($_SESSION['receive']);
							$smode='';

							checkaccdate($date);

							$resultc = mysql_query("select * from receipt where refno='".$refno."'");
							if(mysql_num_rows($resultc)>0&&$refno!=''&&$refno!='0'){
								$rowc=mysql_fetch_array($resultc);
								$rcptno=stripslashes($rowc['rcptno']);
								$olddate=stripslashes($rowc['date']);
								echo '<script>swal("Error", "This reference number already exists under Receipt No:'.$rcptno.', Entered on '.$olddate.'!", "error");</script>';
								echo"<script>setTimeout(function() {receipting();},500);</script>";	
								exit;
							}

							for ($i = 0; $i < $max; $i++){
								$paying = $_SESSION['receive'][$i][5];
								if($paying!=0&&$paying!=''){
								$paymonth=$month = $_SESSION['receive'][$i][6];
								}

							}

							$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);
							$bname=$names=$tname=stripslashes($row['bname']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$rid=stripslashes($row['rid']);
							$rno=stripslashes($row['roomno']);
							$phone=stripslashes($row['phone']);
							$pendate=stripslashes($row['pendate']);
							





							

							//get receipt number

							$rcptno=mysql_result(mysql_query("SELECT MAX(rcptno) from rcptnos"),0) + 1;
							$question = mysql_query("insert into rcptnos values('".$rcptno."')");


							
							

							//get receipt no and insert into journal
							$max=count($_SESSION['receive']);
							$description='Bills Payment:'.$tname.'-'.$tid.'-Ref No:'.$refno;$refno=$refno;
							$paying=0;
							$string='';$totgoods=0;$totalpay=0;
							for ($i = 0; $i < $max; $i++){

									$itcode = $_SESSION['receive'][$i][0];
									$itname = $_SESSION['receive'][$i][1];
									$tamount = $_SESSION['receive'][$i][2];
									$paid = $_SESSION['receive'][$i][3];
									$invbal = $_SESSION['receive'][$i][4];
									$actamount=$paying = $_SESSION['receive'][$i][5];
									$month = $_SESSION['receive'][$i][6];
									$tpaid=$paid+$paying;
									$invbal=$invbal-$paying;
									if($invbal<=0){$status=0;}else{$status=1;}

									if($paying!=0&&$paying!=''){

									$resultx = mysql_query("select * from invoices where id='".$itcode."' order by id desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$actid=stripslashes($rowx['actid']);
									$actname=stripslashes($rowx['actname']);
									$totalpay+=$paying;

									 //if rent payment
									 if($actid==1){
									 	
										//post credit notes
										$penaltydate=substr($month,3,4).substr($month,0,2).$pendate;
										$resultc = mysql_query("select * from invoices where tid='".$tid."' and actid=4 and mon='".$month."' and invamount!=0");
										if(mysql_num_rows($resultc)>0&&$bankstamp<=$penaltydate){

											
											$rowc=mysql_fetch_array($resultc);
											$invid=stripslashes($rowc['id']);

											//echo $invid.'-'.$bankstamp.'-'.$penaltydate.'<BR/>';

											postautocreditnote($invid,$date,$username);

										}

									}

									$paying = $_SESSION['receive'][$i][5];

									$resulta = mysql_query("insert into receipt values('0','".$rcptno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$actamount."','".$description."','".$date."','".$stamp."',1,'".$username."','".$refno."','".$lid."','".$lname."','".$itcode."','".date('Ymd')."')");
									$resultb = mysql_query("update invoices set paid='".$tpaid."',invbal='".$invbal."',invstatus='".$status."' where id='".$itcode."'");

										//if actid==deposit
										if($actid==12||$actid==17||$actid==18){

											$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
											$rowc=mysql_fetch_array($resultc);
											$deposit=stripslashes($rowc['paid_deposit']);
											$depaid=$deposit+$paying;
											$resultg = mysql_query("update tenants set paid_deposit='".$depaid."' where tid='".$tid."'");	


										}	

									
									}//end if
								
								
							}//end for


							$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);

							//insert into receipts
							$newbal=$prevbal-$totalpay;
							$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','','','".$date."','".$paymonth."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$totalpay."','".$lid."','".$description."','','".$newbal."','".$stamp."','cr',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'");	
							

							//post journal entries
							$journalno=0;$cid=628;$did=$lid;$refno=$refno;$date=datereverse($date);
							$description='Bills Payment-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$fintot,$description,$refno,$date,$username,$hid);


							if($resulte&&$resultg){
							unset($_SESSION['receive']);

							$message='Hello '.$bname.'. Your Account  has been credited KShs. '.number_format(floatval($fintot)).'. Your new balance is: '.number_format(floatval($newbal)).'. Thank you for your partnership.';
							$resulte = mysql_query("insert into notices values('0','Receipt','".$message."','".$bname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','".$rcptno."')");
							sendsms($message,$phone);
							$resulta = mysql_query("insert into log values('0','".$username." Receives payment from Tenant.Receipt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							$resulte = mysql_query("update ledgerlock set status=0");	
							echo"<script>window.open('report.php?id=6&rcptno=".$rcptno."');</script>";	
							echo"<script>$('#totitems').val('');$('#fintot').val('');$('#paymode').val('');$('#refno').val('');$('#prevbal').val('');$('#tenant').val('').focus().prop('disabled',false);</script>";
							echo"<script>setTimeout(function() {receipting();},500);</script>";
							echo '<script>swal("Success!", "Payment posted!", "success");</script>';
							
							exit;
							}
							else{
									echo '<script>swal("Error", "Payment not posted!", "error");</script>';
							}

							}//end if
									
							break;

							case 25:
							//get receipt no
							$date=datereverse($_GET['date']);
							$refno=$_GET['refno'];
							$desc=$_GET['notes'];
							$dramount=$_GET['dramount'];
							$stamp=preg_replace('~/~', '', $date);

							//check for date
							//checkaccdate($stamp);
							
							
							$question =mysql_query("SELECT * FROM journals order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['id'])+1;


							$max=count($_SESSION['journal']);
							for ($i = 0; $i < $max; $i++){
							$lid = $_SESSION['journal'][$i][0];
							$lname = $_SESSION['journal'][$i][1];
							$transtype = $_SESSION['journal'][$i][2];
							$tenfigure=$supfigure=$amount = $_SESSION['journal'][$i][3];
							$subid = $_SESSION['journal'][$i][4];
							$actid = $_SESSION['journal'][$i][5];

							

							
							$resulta = mysql_query("select * from ledgers where ledgerid=".$lid."");
							$row=mysql_fetch_array($resulta);
							$bal=stripslashes($row['bal']);
							$type=stripslashes($row['type']);


							//this is a debit	
							if($transtype=='Debit'){

								if($type=='Liability'||$type=='Revenue'||$type=='Equity'||$type=='Drawings'){
								$bal=$bal-$amount;
								}
								else{
								$bal=$bal+$amount;
								}

							}
							
							//this is a credit

							if($transtype=='Credit'){

								if($type=='Asset'||$type=='Expense'){
								$bal=$bal-$amount;
								}
								else{
								$bal=$bal+$amount;
								}

							}

							

							//check for subid-accounts receivables and suppliers
							if($lid==628){

								$subid=explode('-',($subid));
								$tid=$subid[0];$vat=0;
								$resulta =mysql_query("select * from tenants where tid='".$tid."'");
								$rowa=mysql_fetch_array($resulta);
								$bname=stripslashes($rowa['bname']);  
								$nbal=stripslashes($rowa['bal']);
								$rno=stripslashes($rowa['roomno']);
					            $rid=stripslashes($rowa['rid']);
					            $hid=stripslashes($rowa['hid']);
					            $hname=stripslashes($rowa['hname']);
					            $vatstatus=stripslashes($rowa['vat']);
					            $mon=getmonth(dateprint($date));

								$stype='dr';
								if($transtype=='Credit'){$tenfigure=$tenfigure*-1;}
								$nbal=$nbal+$tenfigure; 


								$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
								$rowb=mysql_fetch_array($resultb);
								$actlid=stripslashes($rowb['lid']);
								$actlname=stripslashes($rowb['lname']);
								$vatper=stripslashes($rowb['vat'])/100;

								
								if($vatstatus==1){$vat=round((($tenfigure/(1+$vatper))*$vatper),2);}else{$vat=0;}
								
								$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
								$rowx=mysql_fetch_array($resultx);
								$invno=stripslashes($rowx['invno'])+1;

								//$vat=0;
								//insert invoice
								$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".dateprint($date)."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$tenfigure."','','".$desc."','','".$nbal."','".$stamp."','dr',1,2,'".$username."','".date('Ymd')."')");
								$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','1','Rent','".$tenfigure."','".$tenfigure."','0','0','".$desc."','".dateprint($date)."','".$stamp."',1,'".$username."','".$vat."')");
								$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");	

							}

							if($lid==629){
								
								$subid=explode('-',($subid));
								$supid=$subid[0];
								$resulta =mysql_query("select * from suppliers where supid='".$supid."'");
								$rowa=mysql_fetch_array($resulta);
								$supname=stripslashes($rowa['supname']);  
								$sbal=stripslashes($rowa['bal']);
								$stype='dr';
								if($transtype=='Debit'){$supfigure=$supfigure*-1;$stype='cr';}
								$sbal=$sbal+$supfigure; 
								
								//insert into supplierdebts
								$resultx = mysql_query("insert into supplierdebts values('','".$supid."','".$supname."','".$rcptno."','".$stype."','".abs($supfigure)."','".date('d/m/Y')."','".date('Ymd')."',2,'".$desc."','".abs($supfigure)."','0','".$sbal."','')");
								$resulty = mysql_query("update suppliers set bal='".$sbal."' where supid='".$supid."'");
								
							}

							/*

							//staff advances
							if($lid==741){
								
								$subid=explode('-',($subid));
								$emp=$subid[0];
								$desc.='-'.$subid[1];

								connecthr();

								$resulta =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
								$rowa=mysql_fetch_array($resulta);
								$sbal=stripslashes($rowa['advance']);
								$debtfigure=$amount;
								if($transtype=='Credit'){$debtfigure=$debtfigure*-1;}
								$sbal=$sbal+$debtfigure;
								$resulte = mysql_query("update employee set advance='".$sbal."' where emp='".$emp."'");

								connectlocal();

								
								
							}
							*/

							//into ledger entries
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','".$bal."','".$date."','".$stamp."',1,'0')");	
							$resultc = mysql_query("update ledgers set bal='".$bal."' where ledgerid=".$lid."");
							updateledgerbalance($lid, $date, $stamp, $transtype, $amount);

								
							}//end for loop



							$resulta = mysql_query("insert into journals values('0','".$rcptno."','".$desc."','".$refno."','".$dramount."','".$date."','".$stamp."','".$username."',1,'0')");	
							
							if($resultb){

							unset($_SESSION['journal']);
							$resulta = mysql_query("insert into log values('0','".$username." makes a journal entry.Journal No.".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#refno').val('');$('#totitems').val('');$('#notes').val('');$('#dramount').val('');$('#cramount').val('');</script>";
							echo '<script>swal("Success!", "Entry posted!", "success");</script>';
										exit;
									}
									else{
										echo '<script>swal("Error", "Entry not posted!", "error");</script>';
									}
							
							break;


							
							case 26:
							$code=$_GET['code'];
							$cat=$_GET['subcat'];
							$ledcode=$_GET['ledgercode'];
							$name=$_GET['name'];


							$query =mysql_query("select * from ledgers where code='".$ledcode."' and ledgerid!='".$code."'");
							$count = mysql_num_rows($query);
							if($count>0){

								echo '<script>swal("Error", "There exists another Ledger Account with the same ledger code!", "error");</script>';
								exit;
								
							}

							$resulta =mysql_query("select * from ledgers  where ledgerid='".$cat."' limit 0,1");
							$rowa=mysql_fetch_array($resulta);
							$subcat=stripslashes($rowa['name']);
							$type=stripslashes($rowa['type']);
							$level=stripslashes($rowa['level'])+1;
							$address=stripslashes($rowa['address']).'-'.$code;

							$resultx = mysql_query("update ledgers set parent=1 where ledgerid='".$cat."'");	
							

							//if ledger is parent


							if($cat=='Asset'||$cat=='Liability'||$cat=='Equity'||$cat=='Revenue'||$cat=='Expense'){

								$subcat=$cat;
								$type=$cat;
								$level=1;
								$address=$code;

							}
							
							$result = mysql_query("update ledgers set type='".$type."',name='".$name."',code='".$ledcode."',subcat='".$subcat."',status=1,catid='".$cat."',level='".$level."',address='".$address."' where ledgerid='".$code."'") or die (mysql_error());
							$resulta = mysql_query("insert into log values('0','".$username." updates ledgers database.Ledger Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px;">';
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px;">';
									}
							break;


							case 27:
							$resultb = mysql_query("select * from ledgers  order by ledgerid desc");
							$rowb=mysql_fetch_array($resultb);
							$lid=stripslashes($rowb['ledgerid'])+1;


							$ledger=$_GET['ledger'];
							$cat=$_GET['cat'];
							$ledcode=$_GET['code'];
							$cur='ksh';


							$query =mysql_query("select * from ledgers where code='".$ledcode."'");
							$count = mysql_num_rows($query);
							if($count>0){
							echo '<script>swal("Error", "There exists another Ledger Account with the same ledger code!", "error");</script>';
							exit;
								
							}

							$resulta =mysql_query("select * from ledgers  where ledgerid='".$cat."' limit 0,1");
							$rowa=mysql_fetch_array($resulta);
							$subcat=stripslashes($rowa['name']);
							$type=stripslashes($rowa['type']);
							$level=stripslashes($rowa['level'])+1;
							$address=stripslashes($rowa['address']).'-'.$lid;

							//if ledger is parent


							if($cat=='Asset'||$cat=='Liability'||$cat=='Equity'||$cat=='Revenue'||$cat=='Expense'){

								$subcat=$cat;
								$type=$cat;
								$level=1;
								$address=$lid;

							}

							$resultx = mysql_query("update ledgers set parent=1 where ledgerid='".$cat."'");	


							
							$result= mysql_query("insert into ledgers values('0','".$lid."','".$ledger."','".$type."',0,1,'','MAIN','Other','".getordertype($type)."','".$cur."',0,'".$ledcode."','".$subcat."','".$cat."','".$level."',0,'".$address."')");
							$resulta = mysql_query("insert into log values('0','".$username." inserts data into ledgers database.Ledger name:".$_GET['ledger']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
							if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									//into session
									$item=$lid.'-'.$ledger;
									$max=count($_SESSION['ledgers']);
									$_SESSION['ledgers'].=',"'.$item.'"';
									//echo"<script>setTimeout(function() {ledgers();},500);</script>";
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										}
							
							break;		
							case 28:
							$code=$_GET['code'];
							$query =mysql_query("select * from ledgers where ledgerid='".$code."' and mandatory=1");
							$count = mysql_num_rows($query);
							if($count>0){
								echo '<script>swal("Error", "Cannot delete Default System Ledger Account!", "error");</script>';
							exit;
							}

							$query =mysql_query("select * from ledgers where catid='".$code."'");
							$count = mysql_num_rows($query);
							if($count>0){
								echo '<script>swal("Error", "The ledger cannot be deleted because it has other sub-accounts!", "error");</script>';
							exit;
							}


							$result = mysql_query("DELETE from ledgers where ledgerid=".$code."");
							$resulta = mysql_query("insert into log values('0','".$username." deletes data from ledger database.Legder Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;

							case 29:

							//get receipt no
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							$date=$_GET['date'];
							$refno=$_GET['refno'];
							$stamp=preg_replace('~/~', '', $date);

							
							
							$question =mysql_query("SELECT * FROM budgets order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$budget=stripslashes($ans['id'])+1;

							//get receipt no and insert into journal
							$journalno=0;


							$max=count($_SESSION['expense']);
							$total=0;
							for ($i = 0; $i < $max; $i++){
							$eid = $_SESSION['expense'][$i][0];
							$ename = $_SESSION['expense'][$i][1];
							$amount = $_SESSION['expense'][$i][2];
							$total+=$amount;
							$desc = $_SESSION['expense'][$i][3];
							$desc = mysql_real_escape_string(trim($desc));
							
							
								$resulta = mysql_query("insert into expenses values('0','".$budget."','".$eid."','".$ename."','".$desc."','".$amount."','',1,0,1,'".$stamp."','".$refno."')");	
								

								$journalno=0;$cid=$lid;$did=$eid;$refno=$refno;$journaldate=datereverse($date);
								$description=$desc.'-Ref No:'.$refno;
								postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$journaldate,$username,0);


							}

							$resultg = mysql_query("select * from ledgers where ledgerid=".$lid."");
							$row=mysql_fetch_array($resultg);
							$petbal=stripslashes($row['bal']);

							$resultb = mysql_query("insert into budgets values('".$budget."','".$date."','".$stamp."',1,'".$lid."','".$lname."','".$total."','','".$refno."','','".$petbal."','".$userbranch."')");	

							if($resulta){

							unset($_SESSION['expense']);
							$resulta = mysql_query("insert into log values('0','".$username." does expense accounting.Budget No.".$budget."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#refno').val('');$('#totitems').val('');$('#totprice').val('');$('#pettyaccbal').val('".number_format($petbal)."');</script>";
							echo '<script>swal("Success!", "Transactions posted!", "success");</script>';
										exit;
									}
									else{
										echo '<script>swal("Error", "Transactions not posted!", "error");</script>';
									}
							
							break;

							case 30:
							$dr=$_GET['dr'];
							$drname=$_GET['drname'];
							$desc=$_GET['desc'];
							$action=$_GET['action'];
							$amount=$_GET['amount'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');

							//get receipt no and insert into journal
							$journalno=0;
							
							if($action=='Cash Deposit'){
							
							//cash account	
							$result =mysql_query("select * from ledgers  where ledgerid=625");
							$row=mysql_fetch_array($result);
							$cr=stripslashes($row['ledgerid']);
							$crname=stripslashes($row['name']);
							$balc=stripslashes($row['bal']);
							
							//bank account	
							$resulta = mysql_query("select * from ledgers where ledgerid=".$dr."");
							$row=mysql_fetch_array($resulta);
							$bald=stripslashes($row['bal']);
							
							$balc=$balc-$amount;
							$bald=$bald+$amount;
							
						
							//post journal entries
								$description=$desc;$refno=0;
								postjournal($journalno,625,'Credit','Minus',$dr,'Debit','Add',$amount,$description,$refno,$date,$username,0);

		
							}
							
							if($action=='Cash Withdrawal'){
							
							//cash account	
							$result =mysql_query("select * from ledgers  where ledgerid=625");
							$row=mysql_fetch_array($result);
							$cr=stripslashes($row['ledgerid']);
							$crname=stripslashes($row['name']);
							$balc=stripslashes($row['bal']);
							
							//bank account	
							$resulta = mysql_query("select * from ledgers where ledgerid=".$dr."");
							$row=mysql_fetch_array($resulta);
							$bald=stripslashes($row['bal']);
							
							$balc=$balc+$amount;
							$bald=$bald-$amount;

							//post journal entries
							$description=$desc;$refno=0;
							postjournal($journalno,625,'Debit','Add',$dr,'Credit','Minus',$amount,$description,$refno,$date,$username,0);

							
								
							}
							
							$resulta = mysql_query("insert into log values('0','".$username." makes a bank ".$action.". Bank Account:".$drname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=" width:30px; height:30px; ">';
							echo '<script>swal("Success!", "Transaction posted!", "success");</script>';
							echo"<script>setTimeout(function() {bank();},500);</script>";
								
							
							break;

							case 31:
							$hid=$_GET['landlord'];
							$amount=$_GET['amount'];
							$desc=$_GET['desc'];
							$stamp=date('Ymd');
							$date=date('Y/m/d');
							
							
							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$hname=stripslashes($row['housename']);
							$bal=stripslashes($row['bal']);

							$nbal=$bal+$amount;

							$result = mysql_query("insert into housedebts values('','".$hid."','".$hname."','dr','".$amount."','".$desc."','".date('d/m/Y')."','".date('Ymd')."','".$nbal."',1)");
							$resultc = mysql_query("update mainhouses set bal='".$nbal."' where houseid='".$hid."'");
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." debits landlord account.House name:".$hname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							

							//update ledgers
							//629-a/p,635-rent

							$journalno=0;$cid=629;$did=635;$refno=$hid;$date=date('Y/m/d');
							$description='Debit Landlord-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Minus',$amount,$description,$refno,$date,$username,0);

							echo '<script>swal("Success!", "Transaction posted!", "success");</script>';
							echo'<script>setTimeout(function() {credland();},500);</script>	';
							
							}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Transaction not posted!", "error");</script>';
									}
							break;

							case 32:
							$hid=$_GET['landlord'];
							$amount=$_GET['amount'];
							$paymode=$_GET['paymode'];
							$desc=$_GET['desc'];
							$stamp=date('Ymd');
							$date=date('Y/m/d');
							
							
							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$hname=stripslashes($row['housename']);
							$bal=stripslashes($row['bal']);

							$nbal=$bal-$amount;

							$result = mysql_query("insert into housedebts values('','".$hid."','".$hname."','cr','".$amount."','".$desc."','".date('d/m/Y')."','".date('Ymd')."','".$nbal."',1)");
							$resultc = mysql_query("update mainhouses set bal='".$nbal."' where houseid='".$hid."'");
							
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." pays landlord account.House name:".$hname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							
							//update ledgers
							//629-a/p,635-rent

							$journalno=0;$cid=$paymode;$did=629;$refno=$hid;$date=date('Y/m/d');
							$description='Pay Landlord-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$amount,$description,$refno,$date,$username,0);

							echo'<script>setTimeout(function() {payland();},500);</script>	';
							echo '<script>swal("Success!", "Transaction posted!", "success");</script>';
							
							
							
								}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Transaction not posted!", "error");</script>';
									}
							break;

							case 33:
							
							$rid=$_GET['rid'];
							$resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
				            $rowy=mysql_fetch_array($resulty);
				            $rno=stripslashes($rowy['roomno']);
				            $tid=stripslashes($rowy['tenantid']);
				            $tname=stripslashes($rowy['tenant']);
				            $hid=stripslashes($rowy['houseid']);
				            $hname=stripslashes($rowy['housename']);


							$fromdep=$_GET['fromdep'];
							$mon=$_GET['mon'];
							$dateread=$_GET['dateread'];
							$mtrno=$_GET['mtrno'];
							
							$water=$_GET['water'];
							$sewer=$_GET['sewer'];
							$meter=$_GET['meter'];
							$service=$_GET['service'];
							$cons=$_GET['cons'];
							$amount=$_GET['sum'];
							$toilet=$_GET['toilet'];
							
							
							
							$desc='WATER BILL FOR '.$mon;
							$date=date('d/m/Y');
							$stamp=date('Ymd');


							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;


							
							
							$result =mysql_query("select * from tenants where tid='".$tid."' LIMIT 0,1");
							$row=mysql_fetch_array($result);
							$balb=stripslashes($row['bal']);
							$phone=stripslashes($row['phone']);
							$balb=$balb+$amount;

							$vat=0;
							
							$resulta = mysql_query("insert into receipts values('','','".$invno."','','','".$date."','".$mon."','".$tid."','".$tname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$balb."','".$stamp."','dr',1,3,'".$username."','".date('Ymd')."')");
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','2','Water','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
							$resultz = mysql_query("update tenants set bal='".$balb."' where tid='".$tid."'");	
									
							$resulty = mysql_query("insert into waterinvoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','".$_GET['dateread']."','".$_GET['mtrno']."','".$_GET['wp']."','".$_GET['wc']."','".$_GET['wd']."','".$_GET['water']."','".$_GET['sewer']."','".$_GET['service']."','".$_GET['meter']."','".$_GET['cons']."','".$_GET['toilet']."','".$amount."','".$date."','".$stamp."',1,'".$username."')");
							$resultg = mysql_query("update houses set waterprevious='".$_GET['wc']."' where rid='".$rid."'");

							//update ledgers
							$journalno=0;$cid=671;$did=628;$refno=$hid;$date=date('Y/m/d');
							$description='Water Billing-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);


							$message='Hello '.$tname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).', being the water bill for '.$mon.'. Your new balance is: '.number_format(floatval($balb)).'. Thank you for your partnership.';
							$resulte = mysql_query("insert into notices values('0','Receipt','".$message."','".$tname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','".$invno."')");
							

							
							if($resulta&&$resultz&&$resulty){
							$resulta = mysql_query("insert into log values('','".$username." posts water to account id:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							echo '<script>swal("Success!", "Invoice posted!", "success");</script>';
							echo"<script>window.open('report.php?id=7&rcptno=".$invno."');</script>";
							echo"<script>setTimeout(function() {water('".$mon."','".$dateread."');},1000);</script>";
							}
							else{
								echo'<img src="img/delete.png" width="30px" height="30px"/>';
								echo '<script>swal("Error", "Invoice not posted!", "error");</script>';
								}
							
			
							break;


							case 34:
							
							
							$rid=$_GET['rid'];
							$resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
				            $rowy=mysql_fetch_array($resulty);
				            $rno=stripslashes($rowy['roomno']);
				            $tid=stripslashes($rowy['tenantid']);
				            $tname=stripslashes($rowy['tenant']);
				            $hid=stripslashes($rowy['houseid']);
				            $hname=stripslashes($rowy['housename']);


							$fromdep=$_GET['fromdep'];
							$mon=$_GET['mon'];
							$dateread=$_GET['dateread'];
							$mtrno=$_GET['mtrno'];
							$amount=$_GET['total'];
							$fixed=$_GET['fixed'];
							$consumption=round($_GET['consumption'],3);
							$fuel=$_GET['fuel'];
							$forex=$_GET['forex'];
							$inflation=$_GET['inflation'];
							$arma=$_GET['arma'];
							$erc=$_GET['erc'];
							$rep=$_GET['rep'];
							$vat=$_GET['vat'];
							
							$desc='ELECTRICTY BILL FOR '.$mon;
							$date=date('d/m/Y');
							$stamp=date('Ymd');


							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;


							$result =mysql_query("select * from tenants where tid='".$tid."'");
							$row=mysql_fetch_array($result);
							$balb=stripslashes($row['bal']);
							$balb=$balb+$amount;

							
							$resulta = mysql_query("insert into receipts values('','','".$invno."','','','".$date."','".$mon."','".$tid."','".$tname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$balb."','".$stamp."','dr',1,4,'".$username."','".date('Ymd')."')");
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','3','Electricity','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
							$resultz = mysql_query("update tenants set bal='".$balb."' where tid='".$tid."'");	
								
							$resulty = mysql_query("insert into elecinvoices values('','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','".$_GET['dateread']."','".$_GET['mtrno']."','".$_GET['ep']."','".$_GET['ec']."','".$_GET['ed']."','".$_GET['fixed']."','".round($_GET['consumption'],3)."','".$_GET['fuel']."','".$_GET['forex']."','".$_GET['inflation']."','".$_GET['arma']."','".$_GET['erc']."','".$_GET['rep']."','".$_GET['vat']."','".$amount."','".$date."','".$stamp."',1,'".$username."')");
							$resultg = mysql_query("update houses set elecprevious='".$_GET['ec']."' where rid='".$rid."'");

							
							//update ledgers
							$amount=$amount-$vat;
							$journalno=0;$cid=672;$did=628;$refno=$hid;$date=date('Y/m/d');
							$description='Electricity Billing-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);

							if($vat!=0){
							$amount=$vat;
							$journalno=0;$cid=614;$did=628;$refno=$hid;$date=date('Y/m/d');
							$description='Electricity Bill VAT-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);
							}


							if($resulta&&$resultz&&$resulty){
							$resulta = mysql_query("insert into log values('','".$username." posts Electricity to account id:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							echo '<script>swal("Success!", "Invoice posted!", "success");</script>';
							echo"<script>window.open('report.php?id=8&rcptno=".$invno."');</script>";
							echo"<script>setTimeout(function() {electricity('".$mon."','".$dateread."');},1000);</script>";
							}
							else{
							echo'<img src="img/delete.png" width="30px" height="30px"/>';
							echo '<script>swal("Error", "Invoice not posted!", "error");</script>';
							}
							
			
							break;

							


							case 36:
							
							
							$hid=$_GET['hid'];
							$hname=$_GET['hname'];
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							$pid=$_GET['pid'];
							$pname=$_GET['pname'];
							$month=$_GET['month'];
							$billno=$_GET['billno'];
							$amount=$_GET['amount'];
							$refno=$_GET['refno'];
							$remarks=$_GET['remarks'];

							$desc='UTILITY PAYMENT FOR '.$month;
							$date=date('d/m/Y');
							$stamp=date('Ymd');

							$resulta = mysql_query("insert into utilities values('','".$lid."','".$lname."','".$pid."','".$pname."','".$hid."','".$hname."','".$billno."','".$month."','".$amount."','".$refno."','".$remarks."','".$date."','".$stamp."',1,'".$username."')");
							
							
							//update ledgers
							$journalno=0;$cid=$pid;$did=$lid;$refno=$hid;$date=date('Y/m/d');
							$description='Utility Bills Payment-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$amount,$description,$refno,$date,$username,0);


							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." does utility bill payament bill number:".$billno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							echo '<script>swal("Success!", "Payment posted!", "success");</script>';
							echo"<script>setTimeout(function() {utilpay();},1000);</script>";
							}
							else{
							echo'<img src="img/delete.png" width="30px" height="30px"/>';
							echo '<script>swal("Error", "Payment not posted!", "error");</script>';
							}
							
			
							break;

							case 37:
							
							$userid=$_GET['userid'];
							$opass=$_GET['opass'];
							$npass=$_GET['npass'];
							$cpass=$_GET['cpass'];
							$resultx =mysql_query("select * from users where userid=".$userid."");
							$row=mysql_fetch_array($resultx);
							$kpass=stripslashes($row['password']);
							$sopass=sha1($opass);
							
							if($sopass!=$kpass){
								echo '<script>swal("Error", "Your old password is wrong!", "error");</script>';
								
							exit;
							}
							if($cpass!=$npass){
							echo '<script>swal("Error", "Your New password does not match the confirmation detail!", "error");</script>';
							exit;
							}
							else if($opass==$npass){
							echo '<script>swal("Error", "Your old password cannot be the same as your new password!", "error");</script>';
							exit;
							}
							else if((strlen($npass) > 16) || (strlen($npass) < 6)){
							echo '<script>swal("Error", "Password length must be between 6 and 16 characters!", "error");</script>';
							exit;
							}
							else {
								$pass= sha1($npass);
								$result = mysql_query("update users set password='".$pass."' where userid=".$userid."");
							
								if($result){
									$resulta = mysql_query("insert into log values('','".$username." updates login details.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

									echo '<script>swal("Success!", "Credentials updated!", "success");</script>';		
									echo'<img src="img/tick.png" style=" width:30px; height:30px;">';
									echo"<script>setTimeout(function() {changelogin();},1000);</script>";
									
									}
								else{
									echo '<script>swal("Error", "Details not updated!", "error");</script>';
									echo'<img src="img/delete.png" style=" width:30px; height:30px;">';
									}
							}
							break;

							case 38:
							$cname=$_GET['cname'];
							$web=$_GET['web'];
							$loc=$_GET['loc'];
							$motto=$_GET['motto'];
							$email=$_GET['email'];
							$tel=$_GET['tel'];
							$add=$_GET['add'];
							$pin=$_GET['pin'];
							$etrno=$_GET['etrno'];

							$acno=$_GET['acno'];
							$bankname=$_GET['bankname'];
							$branchname=$_GET['branchname'];
							
							
							$resultc = mysql_query("update company set CompanyName='".$cname."',Tel='".$tel."',Address='".$add."',Website='".$web."',Email='".$email."',Description='".$loc."',Motto='".$motto."',Pin='".$pin."',EtrNo='".$etrno."',BankName='".$bankname."',BranchName='".$branchname."',AcNo='".$acno."'");
							
							if($resultc){
							$resulta = mysql_query("insert into log values('','".$username." updates company details.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<img src=\"img/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
							echo '<script>swal("Success!", "Details updated!", "success");</script>';
							echo"<script>setTimeout(function() {company();},1000);</script>";
							}
							else{
								echo"<img src=\"img/delete.png\" style=\"\"  width=\"30\" height=\"30\"/>";
								echo '<script>swal("Error", "Details not updated!", "error");</script>';

							} 
							
							break;

							case 39:
							$user=$_GET['user'];
							$pos=$_GET['pos'];
							$pass=$_GET['pass'];
							$name=$_GET['name'];
							$branch=$_GET['branch'];
							$dept=$_GET['dept'];
							$fid=$_GET['fid'];
							$pass=sha1($pass);
							
							$resultc = mysql_query("select * from users where name='".$name."'");
							if(mysql_num_rows($resultc)>0){
								echo '<script>swal("Error", "User name already exists!", "error");</script>';
									exit;
							}
					
							
							$result = mysql_query("insert into users values('0','".$user."','".$pos."','','".$pass."','".$dept."','".$name."','".$branch."','".$fid."',1)") or die (mysql_error());		
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." inserts new User into System.User NAME:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"img/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
								echo'<script>setTimeout(function() {adduser();},500);</script>';
								echo '<script>swal("Success!", "User Created!", "success");</script>';
							}
							else {
								echo"<img src=\"img/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
								echo '<script>swal("Error", "User not Created!", "error");</script>';
							}
							
							break;
							
							case 40:
							
							$user=strtoupper($_GET['user']);
							$pos=$_GET['pos'];
							$fname=$_GET['fname'];
							$branch=$_GET['branch'];
							$dept=$_GET['dept'];
							$fid=$_GET['fid'];

							$rec=$_GET['rec'];

							if($rec==1){
							$result = mysql_query("update users set status=1,password = sha1('password') where userid='".$user."'")  or die (mysql_error());
							}
							
							
							$result = mysql_query("update users set position='".$pos."',dept='".$dept."',fullname='".$fname."',branch='".$branch."',fid='".$fid."' where userid='".$user."'");
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username."  updates user data.User Id:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"img/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
							echo'<script>setTimeout(function() {adduser();},500);</script>';
							echo '<script>swal("Success!", "Details updated!", "success");</script>';
							}
							else {
							echo"<img src=\"img/delete.png\" style=\"\"  width=\"30\" height=\"30\"/>";
							echo '<script>swal("Error", "Details not updated!", "error");</script>';
							}
							
							break;

							case 41:
							$code=$_GET['user'];
							$result = mysql_query("update users set status=0 where userid='".$code."'");
							$resulta = mysql_query("insert into log values('0','".$username." deletes User from System.User Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px;">';
									echo'<script>setTimeout(function() {adduser();},500);</script>';
									echo '<script>swal("Success!", "User Deleted!", "success");</script>';
									}
									else{
									echo'<img src="img/delete.png" style="width:30px; height:30px;"></p>';
									echo '<script>swal("Error", "User not Deleted!", "error");</script>';
									}
							break;
							
							case 42:
							$categ=$_GET['categ'];
							$code=$_GET['code'];
							$rght=$_GET['rght'];
							
							
							$result = mysql_query("update accesstbl set ".$categ."='".$rght."' where AccessCode='".$code."'");
					
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." updates user rights .User Id:".$code.",type:".$categ."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							}
							
							break;

							case 43:
							$a=$_GET['a'];
							$user=$_GET['user'];
							if($a==1){$x='YES';}else{$x='NO';}
							$resultg = mysql_query("update accesstbl set ".$user."='".$x."'");
							break;
							
							case 44:
							$name=$_GET['vname'];
							$cat=$_GET['sysvar'];
							$groupid=$_GET['groupid'];


							$resultc = mysql_query("select * from ".$cat." where name='".$name."'");
							if(mysql_num_rows($resultc)>0){
								echo '<script>swal("Error", "Variable already exists!", "error");</script>';
								exit;
							}


							if($cat=='fieldperson'){
							$result = mysql_query("insert into ".$cat." values('0','".$name."','".$groupid."')");	
							}else{
							$result = mysql_query("insert into ".$cat." values('0','".$name."')");		
							}
							
					
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." inserts a new data into ".$cat." table.name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"img/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo'<script>setTimeout(function() {variables();},500);</script>';	
							echo '<script>swal("Success!", "Variable Created!", "success");</script>';
							}
							else {
								echo"<img src=\"img/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
								echo '<script>swal("Error", "Variable not Created!", "error");</script>';
							}
							
							break;
							case 45:
							$vname=$_GET['vname'];
							$sysvar=$_GET['sysvar'];
							$bid=$_GET['bid'];
							$groupid=$_GET['groupid'];

							if($sysvar=='fieldperson'){

								$result = mysql_query("update ".$sysvar." set name='".$vname."',groupid='".$groupid."' where id='".$bid."'");
							}else{
								$result = mysql_query("update ".$sysvar." set name='".$vname."' where id='".$bid."'");
							}
							
									
					
							if($result){
								
								$resulta = mysql_query("insert into log values('0','".$username." updates system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
								echo'<img src="img/tick.png" style=" width:30px; height:30px;">';
								echo'<script>setTimeout(function() {variables();},500);</script>';	
								echo '<script>swal("Success!", "Variable Updated!", "success");</script>';
								}
							else{
								echo'<img src="img/delete.png" style=" width:30px; height:30px;">';
								echo '<script>swal("Error", "Variable not Updated!", "error");</script>';
								}
							
							break;
							
							case 46:
							$sysvar=$_GET['sysvar'];
							$bid=$_GET['bid'];
							$vname=$_GET['vname'];
							$result = mysql_query("DELETE from ".$sysvar." where id='".$bid."'");
							if($result){
							
								$resulta = mysql_query("insert into log values('0','".$username." deletes system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								
								echo'<img src="img/tick.png" style=" width:30px; height:30px;">';
								echo'<script>setTimeout(function() {variables();},500);</script>';
								echo '<script>swal("Success!", "Variable Deleted!", "success");</script>';
											
								}
							else{
								echo'<img src="img/delete.png" style=" width:30px; height:30px;">';
								echo '<script>swal("Error", "Variable not Deleted!", "error");</script>';
								}
						
								break;

							case 48:
							
							//get receipt no and insert into requests
							
							$supid = $_SESSION['bill'][0][7];
							
							$question =mysql_query("SELECT * FROM purchases order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['rcptno'])+1;

							$question =mysql_query("SELECT * FROM journals order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$journalno=stripslashes($ans['rcptno'])+1;

							$fintot=0;$vatot=0;
									$max=count($_SESSION['bill']);
									for ($i = 0; $i < $max; $i++){
											$itcode = $_SESSION['bill'][$i][0];
											$itname = $_SESSION['bill'][$i][1];
											$itquat = $_SESSION['bill'][$i][2];
											$depid = $_SESSION['bill'][$i][3];
											$depname = $_SESSION['bill'][$i][4];
											$price = $_SESSION['bill'][$i][5];
											$total = $_SESSION['bill'][$i][6];
											$supid = $_SESSION['bill'][$i][7];
											$supname = $_SESSION['bill'][$i][8];
											$notes = $_SESSION['bill'][$i][9];
											$vat = $_SESSION['bill'][$i][10];
											$fintot+=$total;
											$vatot+=$vat;
											
											$resulta = mysql_query("insert into purchases values('','".$rcptno."','".$itcode."','".$itname."','".$depid."','".$depname."','".$itquat."','".$price."','".$total."','".date('d/m/Y')."','".date('Ymd')."',1,'".$supid."','".$supname."','".$notes."','".$vat."')");
											$resultb = mysql_query("update items set Price='".$price."' where ItemCode='".$itcode."'");

											$resulty =mysql_query("select * from items where ItemCode='".$itcode."' limit 0,1");
											$rowy=mysql_fetch_array($resulty);
											$lid=stripslashes($rowy['Lid']);  
									
											//post journal entries
											$amount=$total;
											$cid=629;$did=$lid;$refno=$rcptno;$date=date('Y/m/d');
											$description='Supplier Invoice-'.$notes.'-'.$rcptno;
											postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$depid);
										

								}


								$resulta =mysql_query("select * from suppliers where supid='".$supid."'");
								$rowa=mysql_fetch_array($resulta);
								$supname=stripslashes($rowa['supname']);  
								$bal=stripslashes($rowa['bal']);
								$sbal=$bal+$fintot;  
							
								//insert into supplierdebts
								$resultx = mysql_query("insert into supplierdebts values('','".$supid."','".$supname."','".$rcptno."','dr','".$fintot."','".date('d/m/Y')."','".date('Ymd')."',1,'SUPPLIER PURCHASES-INVOICE NO:".$rcptno."','0','".$fintot."','".$sbal."','".$vatot."')");
								$resulty = mysql_query("update suppliers set bal='".$sbal."' where supid='".$supid."'");

								
							
							
						
							if($resultx){
									unset($_SESSION['bill']);
									echo '<script>swal("Success!", "Invoice saved!", "success");</script>';
									echo"<script>window.open('report.php?id=46&rcptno=".$rcptno."');</script>";
									$resulta = mysql_query("insert into log values('0','".$username." posts Supplier Invoice.Invoice No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									
									
							}
							else{
								$result = mysql_query("DELETE from purchases where rcptno='".$rcptno."'");
								echo '<script>swal("Error", "Invoice data not updated!", "error");</script>';
								
								}
							break;


							case 49:
						
							$code=$_GET['code'];
							$sname=$_GET['sname'];
							$location=$_GET['location'];
							$cname=$_GET['cname'];
							$ctel=$_GET['ctel'];
							$notes=$_GET['notes'];
							$pin=$_GET['pin'];

							$resulta = mysql_query("update suppliers set supname='".$sname."',location='".$location."',contactperson='".$cname."',contacttel='".$ctel."',notes='".$notes."',pin='".$pin."' where supid='".$code."'");					
							
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." Updates suppliers Database.Code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
								exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
									
							break;
										
							case 50:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from suppliers where supid='".$code."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes supplier from suppliers Database.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
								
							break;

							case 51:
							$sname=$_GET['sname'];
							$location=$_GET['location'];
							$cname=$_GET['cname'];
							$ctel=$_GET['ctel'];
							$notes=$_GET['notes'];

							$resulta = mysql_query("insert into suppliers values('','".$sname."','".$location."','".$cname."','".$ctel."','".$notes."','0','".$pin."')");	
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." creates new Supplier.Name:".$sname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Success!", "Supplier Created!", "success");</script>';
							//echo"<script>setTimeout(function() {addsup();},500);</script>";	
								exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Error", "Supplier not created!", "error");</script>';}
							

							break;

							case 52:

							$supid=$_GET['supid'];
							$fintot=$_GET['fintot'];
							$lid=$_GET['pid'];
							$lname=$_GET['pname'];
							$refno=$_GET['refno'];
							$date=date('d/m/Y');
							$time=date('h:i A');
							$stamp=date('Ymd');
							$max=count($_SESSION['paysup']);
							$smode='';
							
							
							$resultc = mysql_query("select * from suppliers where supid='".$supid."'  limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);
							$supname=stripslashes($row['supname']);
							$newbal=$prevbal-$fintot;

							

							

							//get receipt no and insert into journal

							$description='Supplier Payment:'.$supname.'-'.$supid.'-Ref No:'.$refno;$refno=$refno;
							
							$string='';$totgoods=0;
							for ($i = 0; $i < $max; $i++){
									$code = $_SESSION['paysup'][$i][0];
									$invno = $_SESSION['paysup'][$i][1];
									$tamount = $_SESSION['paysup'][$i][2];
									$paid = $_SESSION['paysup'][$i][3];
									$invbal = $_SESSION['paysup'][$i][4];
									$paying = $_SESSION['paysup'][$i][5];
									$npaid=$tpaid=$paid+$paying;
									$invbal=$invbal-$paying;
									if($invbal<=0){$status=2;}else{$status=1;}

									if($paying!=0&&$paying!=''){
									


										$resulta = mysql_query("insert into supplierdebts values('0','".$supid."','".$supname."','".$invno."','cr','".$paying."','".date('d/m/Y')."','".date('Ymd')."',1,'Payment of Invoice-Inv No-".$invno."','".$npaid."','".$invbal."','".$newbal."','')");
										$resultb = mysql_query("update supplierdebts set InvBal='".$invbal."',Paid='".$npaid."' where TransNo='".$code."'");
										if($invbal==0){
										$resultc = mysql_query("update supplierdebts set Status=2 where TransNo='".$code."'");
										$resultc = mysql_query("update purchases set status=2 where rcptno='".$invno."'");
										}
						

									}//end if
								
								
							}//end for

							//update balance
							$result = mysql_query("update suppliers set bal='".$newbal."' where supid='".$supid."'");	
							$hid=111;
							//post journal entries
							$journalno=0;$cid=$lid;$did=629;$refno=$refno;$date=date('Y/m/d');
							$description='Supplier Debts Payment-'.$supname.'-'.$invno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$fintot,$description,$refno,$date,$username,$hid);


							if($resulta){
							unset($_SESSION['paysup']);
							$resulta = mysql_query("insert into log values('0','".$username." makes a payment to  Supplier.Supplier:".$supname.",Amount:".$fintot."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<script>$('#totitems').val('');$('#fintot').val('');$('#paymode').val('');$('#refno').val('');$('#prevbal').val('');$('#tenant').val('').focus().prop('disabled',false);</script>";
							//echo"<script>setTimeout(function() {paysup();},500);</script>";
							echo '<script>swal("Success!", "Payment posted!", "success");</script>';
							exit;
							}
							else{
									echo '<script>swal("Error", "Payment not posted!", "error");</script>';
							}
									
							break;

							case 53:
							$mon=$month=$_GET['month'];
							$tstamp=date('Ymd');
							$resultc = mysql_query("select * from rentauto where month='".$month."'");
							if(mysql_num_rows($resultc)>0){
								echo '<script>swal("Error", "Month has already been Invoiced!", "error");</script>';
								exit;
							}

							

							 $result =mysql_query("select * from tenants where status=1 and invoice_status!='".$month."' and invoice_expiry_stamp<='".$tstamp."'");
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
	                          $nbal=$bal+$amount;

	                         

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
								$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
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
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Rent for Month of '.$mon.'. Thank you for your partnership.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


								//into email

								foreach ($emailarr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Rent for Month of '.$mon.'. Thank you for your partnership.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into emails values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


	                         

	                        }

	                        $resultz = mysql_query("insert into rentauto values('0','".$mon."')");
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

								
	                        if($resultz){
							$resulta = mysql_query("insert into log values('0','".$username." invoices rent for multiple tenants.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Invoices posted!", "success");</script>';
							exit;
							}
							else{
								echo '<script>swal("Error", "Invoices not posted!", "error");</script>';
							}

					


							break;

							case 54:
							$task=$_GET['task'];
							$resulta = mysql_query("insert into todo values('0','".$task."','".date('d/m/Y')."','".date('Ymd')."','".date('h:i A')."','".date('YmdHi')."','".$username."','0')");	
							if($resulta){
								taskscount($username);
								$resulta = mysql_query("insert into log values('0','".$username." creates new task in to do list.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								 $result =mysql_query("select * from todo where status=0 and username='".$username."'");
							   		 $num_results = mysql_num_rows($result);
							     	 for ($i=0; $i <$num_results; $i++) {
							          $row=mysql_fetch_array($result);
							          $code=stripslashes($row['id']);
							         echo '<div class="vd_checkbox checkbox-done">
							          <input type="checkbox" id="checkbox-'.$code.'" value="1" name="todo'.$code.'">
							          <label for="checkbox-'.$code.'"> '.stripslashes($row['name']).' </label>
							          </div>';

							         }
							}

							break;

							case 55:
							$code=$_GET['code'];
							$status=$_GET['status'];
							$resulta = mysql_query("update todo set status=".$status." where id='".$code."'");
							taskscount($username);
							if($resulta){

								$resulta = mysql_query("insert into log values('0','".$username." checks todo task.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							}



							break;

							case 56:
							$mon=$month=$_GET['month'];
							$tstamp=date('Ymd');
							$resultc = mysql_query("select * from penalties where month='".$month."'");
							if(mysql_num_rows($resultc)>0){
								echo '<script>swal("Error", "Month has already been Invoiced for Penalties!", "error");</script>';
								exit;
							}

							
							 //get all rent invoices which have not been paid
							 $result =mysql_query("select * from invoices where actid=1 and invbal>0");
                   			 $num_results = mysql_num_rows($result);
	                      	 for ($i=0; $i <$num_results; $i++) {
	                          $row=mysql_fetch_array($result);
	                          $code=stripslashes($row['id']);
	                          $tid=stripslashes($row['tid']);
	                          $invbal=stripslashes($row['invbal']);

	                          $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
                   			  $rowx=mysql_fetch_array($resultx);
	                          $code=stripslashes($rowx['id']);
	                          $tid=stripslashes($rowx['tid']);
	                          $bname=stripslashes($rowx['bname']);
	                          $vatstatus=stripslashes($rowx['vat']);
	                          $phone=stripslashes($rowx['phone']);
	                          $email=stripslashes($rowx['email']);
	                          $hid=stripslashes($rowx['hid']);
	                          $hname=stripslashes($rowx['hname']);
	                          $rid=stripslashes($rowx['rid']);
	                          $rno=$roomno=stripslashes($rowx['roomno']);
	                          $bal=stripslashes($rowx['bal']);

	                          //penalty amount
	                          $amount=0.1*$invbal;



	                         
	                          $phonearr=explode('/',($phone));
	                          $emailarr=explode('/',($email));
	                          $nbal=$bal+$amount;

	                         

	                          
	                          	
								

		                        //post invoice
								//get receipt number
								$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
								$rowx=mysql_fetch_array($resultx);
								$invno=stripslashes($rowx['invno'])+1;

								$resultb = mysql_query("select * from activities where id='4' limit 0,1");
								$rowb=mysql_fetch_array($resultb);
								$vatper=stripslashes($rowb['vat'])/100;

								if($vatstatus==1){$vat=round((($amount/(1+$vatper))*$vatper),2);}else{$vat=0;}
							
								//$vat=0;
								//insert invoice
								$desc='LATE RENT PAYMENT PENALTY INVOICE FOR '.$mon;
								$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
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
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partnership.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


								//into email

								foreach ($emailarr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partnership.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into emails values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


	                         

	                        }

	                        $resultz = mysql_query("insert into penalties values('0','".$mon."')");
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

								
	                        if($resultz){
							$resulta = mysql_query("insert into log values('0','".$username." invoices penalties for multiple tenants.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Penalty Invoices posted!", "success");</script>';
							exit;
							}
							else{
								echo '<script>swal("Error", "Invoices not posted!", "error");</script>';
							}

							break;

							case 57:
							$code=$_GET['code'];
							 $resulty = mysql_query("update messages set status=1 where id='".$code."'");
							 notificationscount($username);

							break;

							case 58:
							$date=$_GET['date'];
							$name=$_GET['name'];
							$reminder=$_GET['reminder'];
							$arr=explode(' ',$date);

							$s1=$arr[0];
							$s2=$arr[1];
							$s3=$arr[2];
							$s4=$arr[3];
							$s5=$arr[4];
							$s6=$arr[5];
							$s7=$arr[6];

							$startstamp=$s2.$s3;
							$startstamp=stampreverse($s1).backtime2($startstamp);

							$endstamp=$s6.$s7;
							$endstamp=stampreverse($s5).backtime2($endstamp);

							$remstamp='';
							if($reminder!=''){
								 $now=date('YmdHi');
								 $commence = new DateTime($now);
						         $commence->modify('+'.$reminder);
						         $remstamp= $commence->format('YmdHi');
		
							}
 							
							$resulta = mysql_query("insert into events values('0','".$name."','".date('d/m/Y')."','".date('h:i A')."','".date('YmdHi')."','".date('Ymd')."','".$s1."','".$s2.$s3."','".$startstamp."','".$s5."','".$s6.$s7."','".$endstamp."','".$username."','1','".$reminder."','".$remstamp."')");
							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." creates new event','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#eventname').val('');$('#eventdate').val('');</script>";
							echo '<script>swal("Success!", "Event Created!", "success");</script>';

							exit;
							}
							else{
								echo '<script>swal("Error", "Event not Created!", "error");</script>';
							}

							break;

							case 59:

							

									$result = mysql_query("update waterrates set sewer='".$_GET['sewer']."',water='".$_GET['water']."',fixed='".$_GET['fixed']."'  WHERE id=1");
									$resulta = mysql_query("insert into log values('0','".$username." updates water rates','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "Rates updated!", "success");</script>';
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "Rates have not been updated!", "error");</script>';
									}

						
							break;

							case 60:

							

									$result = mysql_query("update elecrates set fixed='".$_GET['fixed']."',consumption='".$_GET['consumption']."',fuel='".$_GET['fuel']."',forex='".$_GET['forex']."',inflation='".$_GET['inflation']."',arma='".$_GET['arma']."',erc='".$_GET['erc']."',rep='".$_GET['rep']."',vat='".$_GET['vat']."'  WHERE id=1");
									$resulta = mysql_query("insert into log values('0','".$username." updates electricity rates','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "Rates updated!", "success");</script>';
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "Rates have not been updated!", "error");</script>';
									}

						
							break;

							  case 61:
        						$lof=$_GET['lof'];

        						$tname=$bname=$_GET['bname'];
								$address=$_GET['address'];
								$chequename=$_GET['chequename'];
								$rid=$_GET['rid'];
								$rno=$roomno=$_GET['roomno'];
								$location=$_GET['location'];

						        $commencedate=$date=$_GET['commencedate'];
						        $escper=$_GET['escper'];
						        $escint=$_GET['escint'];
						        $fitperiod=$_GET['fitperiod'];
						        $monrent=$rent=$_GET['monrent'];
						        $escalation='';
						        $years=$_GET['years'];
						        $mons=$_GET['months'];
						        $leasetam=$years*12+$mons;
						        $leaseterm=$years.' Years '.$mons.' Months';
						        $roomno=$_GET['roomno'];
						        $lawyer=$_GET['lawyer'];
						        $usage=$_GET['usage'];
						        $location=$_GET['location'];
						        $payabledate=$_GET['payabledate'];
						        $depmonths=$_GET['depmonths'];
						        $depmonthscurrent=$_GET['depmonthscurrent'];
						        $utildep=$_GET['utildep'];
						       	$servicecharge=$_GET['servicecharge'];
						       	$payment=$_GET['payment'];
						        $monvar=12*$escint;
						        $esc=array(array());

						        $vatstatus=$_GET['vatstatus'];
								$rescom=$_GET['rescom'];
								//penalties
								$penstatus=$_GET['penstatus'];
								$pendate=$_GET['pendate'];
								$penpercent=$_GET['penpercent'];

						        $resulty = mysql_query("select * from tenants where lof='".$lof."' order by id desc limit 0,1");
								$rowy=mysql_fetch_array($resulty);
								$tid=stripslashes($rowy['tid']);

						        
								
								$next=date('Y-m-d', strtotime('+1 month')) ;
								$next=preg_replace('~-~', '', $next);




								$st=$stamp=stampreverse($date);
								$months=$leasetam-$fitperiod;
						        $allperiod=$leasetam+$fitperiod;


						        //end date
						        $s = new DateTime($st);
						        $s->modify('+'.$allperiod.'month');
						        $s->modify('-1day');
						        $finalend= $s->format('Ymd');

						       
						         

						        //fit period
						        $s = new DateTime($stamp);
						        $s->modify('+'.$fitperiod.'month');
						        $end=$commence=$s->format('Ymd');
						        $end = new DateTime($end);
						        $end->modify('-1day');
						        $endfree= $end->format('Ymd');
						        //rent free
						        $rentfree='From '.$date.' to '.stamptodate($endfree).'-Rent Free';
						        $esc[0]=array(stampreverse($date),$endfree,0,1);
						        $escalation.=$rentfree;
						        //first year



						        $yearone=$oneyear=$commence;
						        $s = new DateTime($commence);
						        $s->modify('+'.$escint.'year');
						        $end=$commence=$s->format('Ymd');
						        $end = new DateTime($end);
						        $end->modify('-1day');
						        $endfree= $end->format('Ymd');

						        $oneyear='<br/>From '.stamptodate($oneyear).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
						        $escalation_expiry_stamp=$endfree;
						        $esc[1]=array($yearone,$endfree,$rent,0);
						        $escalation.=$oneyear;
						        $months-=$monvar;



						        
						        $xy=2;
						        while($months>0){

						        $rent=round(($rent*1.1),2);

						        $start=$commence;
						        $s = new DateTime($commence);
						        $s->modify('+'.$escint.'year');
						        $end=$commence=$s->format('Ymd');
						        $end = new DateTime($end);
						        $end->modify('-1day');
						        $endfree= $end->format('Ymd');
						        if($months<$monvar){
						          $endfree=$finalend;
						        }

						        $oneyear='<br/>From '.stamptodate($start).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
						        $esc[$xy]=array($start,$endfree,$rent,0);
						        $escalation.=$oneyear;
						        $months-=$monvar;
						        $xy++;

						        }


						         $aa=substr($payabledate,1,1);
						         if($aa==1){$bb='st';}else if($aa==2){$bb='nd';}if($aa==3){$bb='rd';}else{$bb='th';}
						         $pp=stampreverse($commencedate);
						         $pp=substr($pp, 0,6);
						         $payable_expiry=$pp.$payabledate;

						         $mon=getmonth($commencedate);





						         $totdep=$monrent*$depmonths;
						         $maindeposit=$totdep+$utildep;
						         $deppayable=$depmonthscurrent*$monrent;
						         $depandrent=$deppayable+$monrent;
						         $deppayabletot=$depandrent+$utildep;
						         $payment_breakdown='';
						         $payment_breakdown.='Security Deposit ('.$depmonthscurrent.' Month(s) Rent)&nbsp;&nbsp;KSh.'.number_format($deppayable);
						         $payment_breakdown.='<br/>First Month`s Rent (Including VAT)&nbsp;&nbsp;&nbsp;KSh.'.number_format($monrent);
						         $payment_breakdown.='<br/>Water and Electricity Deposit&nbsp;&nbsp;&nbsp;&nbsp;KSh.'.number_format($utildep);
						         $payment_breakdown.='<br/>Legal Fees Deposit (Including VAT)&nbsp;&nbsp;&nbsp;TBA';
						         $payment_breakdown.='<br/>Stamp Duty/Registration Fees &nbsp;&nbsp;&nbsp;&nbsp;TBA';
						         $payment_breakdown.='<br/>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KShs.'.number_format($deppayabletot);

						         
						        //update lof
						        
								$resultx = mysql_query("update lof set bname='".$bname."',address='".$address."',rid='".$rid."',roomno='".$roomno."',location='".$location."',leaseterm='".$leaseterm."',commencedate='".$commencedate."',commencestamp='".stampreverse($commencedate)."',enddate='".stamptodate($finalend)."',endstamp='".$finalend."',rent='".$monrent."',payabledate='".$payabledate.$bb."',firstmonthrentdate='".$commencedate."'
								,escalation='".$escper."',escalation_breakdown='".$escalation."',escalation_type='".$escint."',utildep='".$utildep."',servicecharge='".$servicecharge."',depmonths='".$depmonths."',depamount='".$totdep."',unitusage='".$usage."',fitout='".$fitperiod."',lawyer='".$lawyer."',chequeamount='".$deppayabletot."',payment_breakdown='".$payment."',penstatus='".$penstatus."',penpercent='".$penpercent."',pendate='".$pendate."',rescom='".$rescom."',vat='".$vatstatus."'  WHERE id='".$lof."'")    or die (mysql_error());
								//update tenants
								$resultg = mysql_query("update tenants set contract_expiry_stamp='".$finalend."'  where tid='".$tid."'");	
							
								//insert into escalations
								$max=count($esc);
								$result = mysql_query("DELETE from escalations where lof='".$lof."'");
								for ($i = 0; $i < $max; $i++){
								$start = $esc[$i][0];
								$end = $esc[$i][1];
								$amount = $esc[$i][2];
								$status = $esc[$i][3];
								$resultd= mysql_query("insert into escalations values('0','".$lof."','".$tid."','".$bname."','".$roomno."','".$start."','".$end."','".$amount."','".$status."')");
								}



						        //register log
								$resulta = mysql_query("insert into log values('0','".$username." updates letter of offer table.LOF:".$lof."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								
								if($resultx){
								echo'<img src="img/tick.png" style="width:30px; height:30px">';
								
								echo"<script>window.open('report.php?id=1&rcptno=".$lof."');</script>";
								
								echo '<script>swal("Success!", "Your Letter of Offer has been updated!", "success");</script>';
								echo"<script>setTimeout(function() {editlof();},500);</script>";
								
								}
								else{
									echo'<img src="img/delete.png" style="width:30px; height:30px">';
									echo '<script>swal("Error", "You LOF has not been updated!", "error");</script>';
								}


        					break;

        					case 62:
							$checksms=$_GET['checksms'];
							$checknotif=$_GET['checknotif'];
							$checkemail=$_GET['checkemail'];
							$message=$_GET['message'];
							$tid=$userid=0;


							$date=date('d/m/Y');
							$time=date('h:i A');
							$stamp=date('Ymd');
							$max=count($_SESSION['recipients']);
							$sms=$mail=$notif=array();
							
							foreach ($_SESSION['recipients'] as $key => $val) {
								$categ=substr($key,0,1);  $len=strlen($key); $len=$len-1;$param=substr($key,1,$len);
								if($categ==1){
									$tid=$param;
									$resultc = mysql_query("select * from tenants where tid='".$param."' order by id desc limit 0,1");
									$row=mysql_fetch_array($resultc);
									$tid=stripslashes($row['tid']);
									$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='1'.$tid;}
									$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='1'.$tid;}
										
	                          	}
	                          	if($categ==2){
	                          		$tid=$param;
									$resultc = mysql_query("select * from tenants where status=1");
									$num_resultsc = mysql_num_rows($resultc); 
             						 for ($i=0; $i <$num_resultsc; $i++) {
										$row=mysql_fetch_array($resultc);
										$tid=stripslashes($row['tid']);
										$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='1'.$tid;}
										$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='1'.$tid;}
									}
	                          	}

	                          	if($categ==3){
	                          		$tid=$param;
									$resultc = mysql_query("select * from tenants where hid='".$param."'");
									$num_resultsc = mysql_num_rows($resultc); 
             						 for ($i=0; $i <$num_resultsc; $i++) {
										$row=mysql_fetch_array($resultc);
										$tid=stripslashes($row['tid']);
										$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='1'.$tid;}
										$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='1'.$tid;}
									}
	                          	}

	                          	if($categ==4){
	                          		$userid=$param;
									$resultc = mysql_query("select * from users where userid='".$param."' limit 0,1");
									$row=mysql_fetch_array($resultc);
									$userid=stripslashes($row['userid']);
									$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='2'.$userid;}
									$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='2'.$userid;}
									$user=stripslashes($row['name']);$notif[$user]='2'.$userid;
	                          	}
	                          	if($categ==5){
	                          		$userid=$param;
									$resultc = mysql_query("select * from users");
									$num_resultsc = mysql_num_rows($resultc); 
             						 for ($i=0; $i <$num_resultsc; $i++) {
										$row=mysql_fetch_array($resultc);
										$userid=stripslashes($row['userid']);
										$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='2'.$userid;}
										$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='2'.$userid;}
										$user=stripslashes($row['name']);$notif[$user]='2'.$userid;
									}
	                          	}

	                          	if($categ==6){
	                          		$userid=$param;
	                          		$resultx =mysql_query("select * from dept where id='".$param."' limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$dept=stripslashes($rowx['name']);

									$resultc = mysql_query("select * from users where dept='".$dept."'");
									$num_resultsc = mysql_num_rows($resultc); 
             						 for ($i=0; $i <$num_resultsc; $i++) {
										$row=mysql_fetch_array($resultc);
										$userid=stripslashes($row['userid']);
										$phone=stripslashes($row['phone']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='2'.$userid;}
										$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='2'.$userid;}
										$user=stripslashes($row['name']);$notif[$user]='2'.$userid;
									}
	                          	}

	                          	if($categ==7){
	                          		$hid=$param;
									$resultc = mysql_query("select * from mainhouses where status=1");
									$num_resultsc = mysql_num_rows($resultc); 
             						 for ($i=0; $i <$num_resultsc; $i++) {
										$row=mysql_fetch_array($resultc);
										$hid=stripslashes($row['hid']);
										$phone=stripslashes($row['mobile']);$phonearr=explode('/',($phone));foreach ($phonearr as $key2 => $val2) {$sms[$val2]='1'.$hid;}
										$email=stripslashes($row['email']);$emailarr=explode('/',($email));foreach ($emailarr as $key2 => $val2) {$mail[$val2]='1'.$hid;}
									}
	                          	}

							}

							if($checksms==1){
								foreach ($sms as $key => $val) {
									$categ=substr($val,0,1);  $len=strlen($val); $len=$len-1;$param=substr($val,1,$len);
									if($categ==1){
										$resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$bname=stripslashes($rowx['bname']);
										$resulte = mysql_query("insert into notices values('0','Notification','".$message."','".$bname."','".$key."','".$param."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','')");
									}
									sendsms($message,$key);
								}		
							
							}

							if($checknotif==1){
								foreach ($notif as $key => $val) {
									$categ=substr($val,0,1);  $len=strlen($val); $len=$len-1;$param=substr($val,1,$len);
									if($categ==2){
										$resultx =mysql_query("select * from users where userid='".$param."' limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$user=stripslashes($rowx['name']);
										$resulte = mysql_query("insert into messages values('','".$user."','System','".$message."','','".date('d/m/Y-h:i A')."','".date('Ymd')."',0)");
									}
								}		
							
							}

							if($checkemail==1){
								foreach ($mail as $key => $val) {
									$categ=substr($val,0,1);  $len=strlen($val); $len=$len-1;$param=substr($val,1,$len);
									if($categ==1){
										$resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$names=$bname=stripslashes($rowx['bname']);
										$resulte = mysql_query("insert into emails values('0','Notification','".$message."','".$bname."','".$key."','".$param."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','')");
									
									}

									if($categ==2){
										$resultx =mysql_query("select * from users where userid='".$param."' limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$names=$user=stripslashes($rowx['fullname']);
										
									}

									sendemail($message,$key,$names);
								}		
							
							}

							$resulta = mysql_query("insert into log values('0','".$username." creates new Notification','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#recipdiv').html('');$('#textmessage').val('');</script>";
							echo '<script>swal("Success!", "Notification sent!", "success");</script>';
							$_SESSION['recipients']=array();


							break;

							case 62.1:
							$phone=$_GET['phone'];
							$message=$_GET['message'];
							
							sendsms($message,$phone);

							$resulta = mysql_query("insert into log values('0','".$username." creates new sms','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#phone2').val('');$('#message2').val('');</script>";
							echo '<script>swal("Success!", "SMS sent!", "success");</script>';


							break;

							case 62.2:
							$resultc = mysql_query("select * from tenants where status=1 and bal>500");
							$num_resultsc = mysql_num_rows($resultc); 
     						 for ($i=0; $i <$num_resultsc; $i++) {
								$row=mysql_fetch_array($resultc);
								$tid=stripslashes($row['tid']);
								$phone=stripslashes($row['phone']);	
								$bname=stripslashes($row['bname']);	
								$pendate=stripslashes($row['pendate']);	
								$bal=stripslashes($row['bal']);
								$message='Hello '.$bname.'. You have a pending balance of KShs. '.number_format(floatval($bal)).'. Kindly pay by the '.$pendate.'th to avoid being penalized. Thank you for your partnership.';
								$resulte = mysql_query("insert into notices values('0','Notification','".$message."','".$bname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','')");
								sendsms($message,$phone);												
							}


									
							
							

							$resulta = mysql_query("insert into log values('0','".$username." notifies tenants with balances','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							break;

							case 63:

							$bname=$_GET['bname'];
							$address=$_GET['address'];
							$phone=$_GET['phone'];
							$email=$_GET['email'];
							$eno=$_GET['eno'];
							$eyear=$_GET['eyear'];
							$idno=$_GET['idno'];
							$soi=$_GET['soi'];
							
							$pin=$_GET['pin'];
							$btype=$_GET['btype'];

							$currfacility=$_GET['currfacility'];
							$county=$_GET['county'];
							$subcounty=$_GET['subcounty'];
							

							//next of kin
							$gname=$_GET['gname'];
							$grship=$_GET['grship'];
							$gphone=$_GET['gphone'];
							$mgroup=$_GET['mgroup'];

							
							//check if phone number exists

							$resultx =mysql_query("select * from tenants where phone='".$phone."' or idno='".$idno."'");
							if(mysql_num_rows($resultx)>0){
							$rowx=mysql_fetch_array($resultx);
							$tenantname=stripslashes($rowx['bname']);
									echo '<script>swal("Error", "ID Number/Phone number already registered under '.$tenantname.'!Consult the System Admin", "error");</script>';
								
							}
							
							
							//escalations
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);

							$invoice_expiry_stamp=date('Y').'1231';



							$resulty = mysql_query("select * from tenants order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$tid=stripslashes($rowy['tid'])+1;

							$kpano='MKPACENT-'.sprintf("%04d",$tid);


							$pass=$string=generateRandomString();
							$password=sha1($kpano);

							$message='Hi '.$bname.',Welcome to the KPA Central Management Information System Member Web Portal. Click this link to redirect to the portal.http://197.248.117.186:24/kpa/portal/index.php .These are your login credentials:-Username: '.$kpano.' Password: '.$string;

							
							
							$resultc = mysql_query("INSERT INTO tenants (id, tid, bname, address, phone, email, idno, pin, date, stamp, status, eno, eyear,billing_type, invoice_status, invoice_expiry_stamp,  gname, grship, gphone, currfacility, county, subcounty,kpano,mgroup,password) VALUES ('0','".$tid."','".$bname."','".$address."','".$phone."','".$email."','".$idno."','".$pin."','".date('d/m/Y')."','".date('Ymd')."',1,'".$eno."','".$eyear."','".$btype."','1','".$invoice_expiry_stamp."','".$gname."','".$grship."','".$gphone."','".$currfacility."','".$county."','".$subcounty."','".$kpano."','".$mgroup."','".$password."')")    or die (mysql_error());
							$resultg = mysql_query("update tendocs set tid='".$tid."' where soi='".$soi."'");

							sendsms($message,$phone);


							//post membership invoice
							
							$actid=1;//membership
							$invtot=0;$str='';
							$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
							$rowb=mysql_fetch_array($resultb);
							$actname=stripslashes($rowb['name']);
							$actlid=stripslashes($rowb['lid']);
							$actlname=stripslashes($rowb['lname']);
							$vatper=stripslashes($rowb['vat'])/100;
							$total=$amount=stripslashes($rowb['amount']);
							$vat=0;
							$str.=$actname.',';


							$result =mysql_query("select * from tenants where  tid='".$tid."' limit 0,1");
							$row=mysql_fetch_array($result);
                            $tid=stripslashes($row['tid']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$rid=stripslashes($row['rid']);
							$roomno=$rno=stripslashes($row['roomno']);
							$tname=$bname=stripslashes($row['bname']);
							$bal=stripslashes($row['bal']);
							$vatstatus=stripslashes($row['vat']);

							//get receipt number
							$resultc =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$rowc=mysql_fetch_array($resultc);
							$invno=stripslashes($rowc['invno'])+1;

							$month=$year=date('Y');
							

							

							
							//insert invoice
							$desc='INVOICE FOR ANNUAL MEMBERSHIP FOR THE YEAR'.date('Y');
							//$vat=0;
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$total."','0','".$total."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
							

							//post journal entries
							//income
							$amount=$total-$vat;
							$journalno=0;$cid=$actlid;$did=628;$refno=$kpano;$date=date('Y/m/d');
							$description=$actname.' Income-'.$tname.'-'.$kpano;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);


							$nbal=$bal+$amount;
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");


							//end invoice member

							$message='Hello '.$bname.'. Welcome to KPA Central Branch. Your KPA Membership no is: '.$kpano.'. Your account has been debited KShs. '.number_format(floatval($amount)).' being the Annual Mmbership Fee.Your new balance is: '.number_format(floatval($nbal)).'. Thank you for your partnership.';

							$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','".$invno."')");
							sendsms($message,$phone);


							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." creates new member.Member name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Member created and Invoiced!Member No:'.$kpano.'", "success");</script>';
							
							updatetenants();

							echo"<script>window.open('report.php?id=89&rcptno=".$tid."');</script>";
							
							
							echo"<script>setTimeout(function() {newtenant();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Member not created!", "error");</script>';
							}


							break;


							case 64:

							$param=$_GET['param'];
							$resultd =mysql_query("select * from tendocs where id='".$param."' limit 0,1");
							$rowd=mysql_fetch_array($resultd);
							$link=stripslashes($rowd['link']);
							$base_directory = $link;
							if(unlink($base_directory)){
							}
							$result = mysql_query("DELETE from tendocs where id='".$param."'");
							$resulta = mysql_query("insert into log values('','".$username." deletes document.Name:".stripslashes($rowd['name'])."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			   				
									
							break;


							case 65:


							$bname=$_GET['bname'];
							$address=$_GET['address'];
							$phone=$_GET['phone'];
							$email=$_GET['email'];
							$dname=$_GET['dname'];
							$dphone=$_GET['dphone'];
							$details=$_GET['details'];
							$pin=$_GET['pin'];
							$roomno='';

							$rescom='Commercial';
							$vatstatus=1;

							$resulty = mysql_query("select * from tenants order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$tid=stripslashes($rowy['tid'])+1;

							$resultc = mysql_query("INSERT INTO tenants (id, tid, bname, address, phone, email, dname, dphone, details, date, stamp, status, activation, rescom, vat) VALUES ('0','".$tid."','".$bname."','".$address."','".$phone."','".$email."','".$dname."','".$dphone."','".$details."','".date('d/m/Y')."','".date('Ymd')."',1,1,'".$rescom."','".$vatstatus."')");
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." assigns open space to name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Activation Record saved!", "success");</script>';
							echo"<script>setTimeout(function() {activations();},500);</script>";	
							//into session
							$item=$tid.'-'.$bname.'-'.$roomno;
							$max=count($_SESSION['tenants']);
							$_SESSION['tenants'].=',"'.$item.'"';
							//echo"<script>setTimeout(function() {newtenant();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Activation Record not saved!", "error");</script>';
							}

							break;

							case 66:


							$tid=$_GET['param'];
							
							$resultc = mysql_query("update tenants set status=0 where tid='".$tid."'");	
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." closes open space. Tid:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Activation Record Removed!", "success");</script>';
							echo"<script>setTimeout(function() {removeactivation();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Activation Record not Removed!", "error");</script>';
							}

							break;



							case 67:

							$invoiceno=$_GET['invoiceno'];
							$fintot=$_GET['fintot'];
							$refno=$_GET['refno'];
							$date=$_GET['date'];
							$time=date('h:i A');
							$journaldate=datereverse($date);
							$stamp=stampreverse($date);
							$max=count($_SESSION['credit']);
							$smode='';

							checkaccdate($date);

							$resultc = mysql_query("select * from receipts where invno='".$invoiceno."'  limit 0,1");
							$row=mysql_fetch_array($resultc);
							$tid=stripslashes($row['tid']);
							$totamount=stripslashes($row['amount']);
							
							$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);
							$bname=$names=$tname=stripslashes($row['bname']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$vatstatus=stripslashes($row['vat']);
							$rid=stripslashes($row['rid']);
							$roomno=$rno=stripslashes($row['roomno']);
							

							//get receipt number
							$result =mysql_query("select * from receipts where drcr='cn' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$credno=stripslashes($row['credno'])+1;

							

							

							//get receipt no and insert into journal

							$details=$description='Credit Note:'.$tname.'-'.$tid.'-Details:'.$refno;$refno=$refno;
							
							$string='';$totgoods=0;$credtotal=0;
							for ($i = 0; $i < $max; $i++){
									$itcode = $_SESSION['credit'][$i][0];
									$itname = $_SESSION['credit'][$i][1];
									//invoice amount
									$invamount = $_SESSION['credit'][$i][2];
									$paid = $_SESSION['credit'][$i][3];
									$invbal = $_SESSION['credit'][$i][4];
									//credit amount
									$credamount = $_SESSION['credit'][$i][5];
									$month = $_SESSION['credit'][$i][6];
									$invamount=$invamount-$credamount;
									$invbal=$invbal-$credamount;
									if($invbal<=0){$status=0;}else{$status=1;}

									if($credamount!=0&&$credamount!=''){
										$resultx = mysql_query("select * from invoices where id='".$itcode."' order by id desc limit 0,1");
										$rowx=mysql_fetch_array($resultx);
										$actid=stripslashes($rowx['actid']);
										$actname=stripslashes($rowx['actname']);

										$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
										$rowb=mysql_fetch_array($resultb);
										$actlid=stripslashes($rowb['lid']);
										$actlname=stripslashes($rowb['lname']);
										$vatper=stripslashes($rowb['vat'])/100;

										if($vatstatus==1){
											$vat=round((($credamount/(1+$vatper))*$vatper),2);
											$newvat=round((($invamount/(1+$vatper))*$vatper),2);
										}else{$vat=0;$newvat=0;}

										//$vat=0;$newvat=0;
										$resulta = mysql_query("insert into creditnotes values('0','".$credno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$credamount."','".$description."','".$date."','".$stamp."',1,'".$username."','".$refno."','".$actlid."','".$actlname."','".$vat."')");
										$resultb = mysql_query("update invoices set invamount='".$invamount."',invbal='".$invbal."',invstatus='".$status."',vat='".$newvat."' where id='".$itcode."'");	

										
										//post journal entries
										//income
										$amount=$credamount-$vat;
										$journalno=0;$cid=628;$did=$actlid;$refno=$tid;
										$description=$actname.' Credit Note-'.$tname.'-'.$roomno;
										postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$amount,$description,$refno,$journaldate,$username,$hid);


										if($vat!=0){
										$amount=$vat;
										$journalno=0;$cid=628;$did=614;$refno=$tid;
										$description=$actname.' Credit Note (Vat)-'.$tname.'-'.$roomno;
										postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$amount,$description,$refno,$journaldate,$username,$hid);
										}


										$credtotal+=$credamount;

									}//end if
								
								
							}//end for

							//insert into receipts
							$newbal=$prevbal-$credtotal;

							$totamount=$totamount-$credtotal;
							


							$resulte = mysql_query("insert into receipts values('0','','','".$credno."','','".$date."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$credtotal."','','".$details."','','".$newbal."','".$stamp."','cn',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'");
							//$resulth = mysql_query("update receipts set amount='".$totamount."' where invno='".$invoiceno."'");	
							

							if($resulte&&$resultg){
							unset($_SESSION['credit']);
							$resulta = mysql_query("insert into log values('0','".$username." Issues Credit Note to Tenant.Credit Note No:".$credno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<script>window.open('report.php?id=55&rcptno=".$credno."');</script>";	
							echo"<script>$('#totitems').val('');$('#fintot').val('');$('#paymode').val('');$('#refno').val('');$('#prevbal').val('');$('#tenant').val('').focus().prop('disabled',false);</script>";
							echo"<script>setTimeout(function() {creditnote();},500);</script>";
							echo '<script>swal("Success!", "Credit Note posted!", "success");</script>';
							exit;
							}
							else{
									echo '<script>swal("Error", "Payment not posted!", "error");</script>';
							}
									
							break;

							case 68:
						
							$code=$_GET['code'];
							$name=$_GET['name'];
							$price=$_GET['price'];
							$vat=$_GET['vat'];
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							
							$resulta = mysql_query("update activities set name='".$name."',amount='".$price."',vat='".$vat."',lid='".$lid."',lname='".$lname."' where id='".$code."'");					
							
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." Updates Billabe Items Database.Code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
								exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
									
							break;
										
							case 69:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from activities where id='".$code."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes Item from Billable Items Database.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
								
							break;

							case 70:
							$name=$_GET['name'];
							$price=$_GET['price'];
							$lid=$_GET['lid'];
							$lname=$_GET['lname'];
							$vat=$_GET['vat'];

							$resulta = mysql_query("insert into activities values('','General','".$name."','".$price."','','1','','Service','".$lid."','".$lname."','".$vat."')");	
							if($resulta){
							$resulta = mysql_query("insert into log values('','".$username." creates new Billable Item.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							//into session
							$resultx =mysql_query("select * from activities order by id desc limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$item=stripslashes($rowx['id']).'-'.stripslashes($rowx['name']);

							$_SESSION['activities'].=',"'.$item.'"';
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Success!", "Item Created!", "success");</script>';
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							echo '<script>swal("Error", "Item not created!", "error");</script>';}
							

							break;


							case 71:
							$fintot=$_GET['fintot'];
							$mon=$month=$_GET['month'];
							$property=$_GET['property'];
							$date=$_GET['date'];
							//get receipt no and insert into requests
							$result =mysql_query("select * from tenants where  hid='".$property."' and status=1");
							$num_results = mysql_num_rows($result); 
                            for ($i=0; $i <$num_results; $i++) {
                            $row=mysql_fetch_array($result);
                            $tid=stripslashes($row['tid']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$rid=stripslashes($row['rid']);
							$roomno=$rno=stripslashes($row['roomno']);
							$tname=$bname=stripslashes($row['bname']);
							$bal=stripslashes($row['bal']);
							$vatstatus=stripslashes($row['vat']);

							//get receipt number
							$resultc =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$rowc=mysql_fetch_array($resultc);
							$invno=stripslashes($rowc['invno'])+1;
							$invtot=0;$str='';


							foreach ($_SESSION['multinv'] as $key => $val) {
							$actid=$key;
							$total=$val;

							 		$resultx =mysql_query("select * from invoices where actid='".$actid."' and mon='".$mon."'  and tid='".$tid."' limit 0,1");
									$num_resultsx = mysql_num_rows($resultx);
									if($num_resultsx==0){

							
							
											$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
											$rowb=mysql_fetch_array($resultb);
											$actname=stripslashes($rowb['name']);
											$actlid=stripslashes($rowb['lid']);
											$actlname=stripslashes($rowb['lname']);
											$vatper=stripslashes($rowb['vat'])/100;
											$str.=$actname.',';

											if($vatstatus==1){$vat=round((($total/(1+$vatper))*$vatper),2);}else{$vat=0;}

											//insert invoice
											if($total>=0){$desc=$str.'-INVOICE FOR '.$month;}else{$desc=$str.'-CREDIT NOTE:'.$month;}
											//$vat=0;
											$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$total."','0','".$total."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
											

											//post journal entries
											//income
											$amount=$total-$vat;
											$journalno=0;$cid=$actlid;$did=628;$refno=$tid;$date=date('Y/m/d');
											$description=$actname.' Income-'.$tname.'-'.$roomno;
											postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);


											if($vat!=0){
											$amount=$vat;
											$journalno=0;$cid=614;$did=628;$refno=$tid;$date=date('Y/m/d');
											$description='Rent Income Vat-'.$tname.'-'.$roomno;
											postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);
											}


											$invtot+=$total;

										}//end if	



							}//end for each

							
							if($invtot!=0){
							$nbal=$bal+$invtot;
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$invtot."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");

							}
						}//end tenant cycle
							
							
							
						
							if($resulte){
									unset($_SESSION['multinv']);

									echo '<script>swal("Success!", "Invoices posted!", "success");</script>';
									//echo"<script>window.open('report.php?id=5&rcptno=".$invno."');</script>";
									//echo"<script>setTimeout(function() {invoicing();},500);</script>";	
									$resulta = mysql_query("insert into log values('0','".$username." invoices multiple tenants.Property:".$property."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									}
							else{
								echo '<script>swal("Error", "Invoice not posted!", "error");</script>';
								
								}
							break;


							case 72:


							$tid=$param=$_GET['param'];
							$vacate=$_GET['vacate'];
							$notice=$_GET['notice'];
							

							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$rno=stripslashes($rowx['roomno']);
							$rid=stripslashes($rowx['rid']);
							$hid=stripslashes($rowx['hid']);
							$hname=stripslashes($rowx['hname']);
							$rent=stripslashes($rowx['monrent']);
							$bal=gettenantbalance($rowx['tid']);

							
							if($bal>0){
								echo '<script>swal("Error", "Tenant has a pending balance of '.number_format($bal).'.It has to be cleared first before check out.", "error");</script>';
								exit;
							}
							
							
							
							
							$resultg = mysql_query("update tenants set checkout_date='".date('d/m/Y')."',checkout_stamp='".date('Ymd')."',checkout_by='".$username."',checkout_notice_date='".$notice."',vacate_date='".$vacate."' where tid='".$tid."'")    or die (mysql_error());
							$resulth = mysql_query("update houses set tenant='',tenantid='',status=0 where tenantid='".$tid."'");
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." checks out  tenant no-".$param."-empty unit stage','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Unit Checkout Completed!", "success");</script>';
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Unit Checkout failed!", "error");</script>';
							}

							break;


							case 73:


							$tid=$param=$_GET['param'];
							$remarks=$_GET['remarks'];
							
							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$rno=stripslashes($rowx['roomno']);
							$rid=stripslashes($rowx['rid']);
							$hid=stripslashes($rowx['hid']);
							$hname=stripslashes($rowx['hname']);
							$rent=stripslashes($rowx['monrent']);

							$resultg = mysql_query("update tenants set checkout_details='".$remarks."' where tid='".$tid."'")    or die (mysql_error());
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." checks out  tenant no-".$param."-unit condition stage','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo"<script>window.open('report.php?id=88&rcptno=".$tid."');</script>";
							echo '<script>swal("Success!", "Unit Condition Details Updated!", "success");</script>';
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Unit Condition Details not Updated!", "error");</script>';
							}

							break;

							case 74:


							$tid=$param=$_GET['param'];
							$categ=$_GET['categ'];
							$remarks=$_GET['remarks'];
							$amount=$_GET['amount'];
							$paymode=$_GET['paymode'];
							
							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$rno=stripslashes($rowx['roomno']);
							$rid=stripslashes($rowx['rid']);
							$hid=stripslashes($rowx['hid']);
							$hname=stripslashes($rowx['hname']);
							$rent=stripslashes($rowx['monrent']);

							$resultg = mysql_query("insert into deductions values('0','".$tid."','".$bname."','".$rid."','".$rno."','".$hid."','".$hname."','".$categ."','".$amount."','".$remarks."','".date('d/m/Y')."','".date('Ymd')."','".$username."',1)");
							//post entries
							$journalno=0;$cid=$paymode;$did=714;$refno=$tid;$date=date('Y/m/d');
							$description='Tenant Deduction Expense-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$hid);

							//register log
							$resulta = mysql_query("insert into log values('0','".$username." checks out  tenant no-".$param."-deductions entry stage','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>deductiondetails('.$tid.');</script>';
							echo '<script>swal("Success!", "Deduction Captured!", "success");</script>';
							

							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Deduction not Captured!", "error");</script>';
							}

							break;

							case 75:


							$param=$_GET['param'];
							$categ=$_GET['categ'];
							$remarks=$_GET['remarks'];
							$amount=$_GET['amount'];
							
							$resultg = mysql_query("update deductions set categ='".$categ."',amount='".$amount."',description='".$remarks."' where id='".$param."'")    or die (mysql_error());
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." checks out  tenant no-".$param."-deductions entry stage','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							

							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
							}

							break;

							case 76:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from deductions where id='".$code."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes Item from Deductions Database.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
								
							break;

							case 77:

							$rcptno=$receiptno=$_GET['receiptno'];
							$fintot=$_GET['fintot'];
							$paymode=$_GET['paymode'];
							$refdesc=$refno=$_GET['refno'];
							$date=$_GET['date'];
							$time=date('h:i A');
							$journaldate=datereverse($date);
							$stamp=stampreverse($date);
							$max=count($_SESSION['refund']);
							$smode='';

							checkaccdate($date);

							$resultc = mysql_query("select * from receipts where rcptno='".$receiptno."'  limit 0,1");
							$row=mysql_fetch_array($resultc);
							$tid=stripslashes($row['tid']);
							$pmode=stripslashes($row['paymode']);
							$totamount=$amount=stripslashes($row['amount']);
							$tname=stripslashes($row['tname']);
							$roomno=$rno=stripslashes($row['rno']);
							$hid=stripslashes($row['hid']);
							$resultd = mysql_query("update receipt set refno='' where rcptno='".$rcptno."'");
							//if modes are different{}
							if($paymode!=$pmode){
								$resultb = mysql_query("select * from ledgers where ledgerid='".$paymode."'");
								$rowb=mysql_fetch_array($resultb);
								$lname=stripslashes($rowb['name']);
								$resultc = mysql_query("update receipts set paymode='".$paymode."' where rcptno='".$rcptno."'");
								$resultd = mysql_query("update receipt set lid='".$paymode."',lname='".$lname."' where rcptno='".$rcptno."'");		

								$journalno=0;$cid=$pmode;$did=$paymode;$refno=$tid;
								$description='Receipt Amount Posted to Wrong Account-'.$tname.'-'.$roomno;
								postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$journaldate,$username,$hid);

							}


							$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);
							$bname=$names=$tname=stripslashes($row['bname']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$vatstatus=stripslashes($row['vat']);
							$rid=stripslashes($row['rid']);
							$phone=stripslashes($row['phone']);
							$roomno=$rno=stripslashes($row['roomno']);
							$newbal=$prevbal+$fintot;

							//get receipt number
							$result =mysql_query("select * from receipts where drcr='rf' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$refundno=stripslashes($row['refundno'])+1;

							

						

								//get receipt no and insert into journal

								$details=$description='Refund Note:'.$tname.'-'.$tid.'-Details:'.$refno;$refno=$refno;
								
								$string='';$totgoods=0;$credtotal=0;
								for ($i = 0; $i < $max; $i++){
										$itcode = $_SESSION['refund'][$i][0];
										$itname = $_SESSION['refund'][$i][1];
										//invoice amount
										$invamount = $_SESSION['refund'][$i][2];
										$paid = $_SESSION['refund'][$i][3];
										$invbal = $_SESSION['refund'][$i][4];
										//credit amountr
										$credamount = $_SESSION['refund'][$i][5];
										$month = $_SESSION['refund'][$i][6];
										$invamount=$invamount-$credamount;
										$invbal=$invbal-$credamount;
										$status=1;

										if($credamount!=0&&$credamount!=''){
											$resultx = mysql_query("select * from receipt where id='".$itcode."' order by id desc limit 0,1");
											$rowx=mysql_fetch_array($resultx);
											$actid=stripslashes($rowx['actid']);
											$actname=stripslashes($rowx['actname']);
											$inventryno=stripslashes($rowx['inventryno']);

											$resultx = mysql_query("select * from invoices where id='".$inventryno."' order by id desc limit 0,1");
											$rowx=mysql_fetch_array($resultx);
											$xpaid=stripslashes($rowx['paid']);
											$xbal=stripslashes($rowx['invbal']);
											$ypaid=$xpaid-$credamount;
											$ybal=$xbal+$credamount;

											$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
											$rowb=mysql_fetch_array($resultb);
											$actlid=stripslashes($rowb['lid']);
											$actlname=stripslashes($rowb['lname']);
											$vatper=stripslashes($rowb['vat'])/100;
											$vat=0;$newvat=0;

											$resulta = mysql_query("insert into refunds values('0','".$refundno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$credamount."','".$description."','".$date."','".$stamp."',1,'".$username."','".$refno."','".$actlid."','".$actlname."','".$vat."')");
											$resultb = mysql_query("update receipt set amount='".$invamount."' where id='".$itcode."'");	
											$resultc = mysql_query("update invoices set paid='".$ypaid."',invbal='".$ybal."',invstatus=1 where id='".$inventryno."'");	


											//if actid==deposit
											if($actid==12||$actid==17||$actid==18){

												$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
												$rowc=mysql_fetch_array($resultc);
												$deposit=stripslashes($rowc['paid_deposit']);
												$depaid=$deposit-$credamount;
												$resultg = mysql_query("update tenants set paid_deposit='".$depaid."' where tid='".$tid."'");	


											}

	
											
											//post journal entries
											//income
											$amount=$credamount-$vat;
											$journalno=0;$did=628;$cid=$paymode;$refno=$tid;
											$description=$actname.' Refund Note-'.$tname.'-'.$roomno;
											postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$journaldate,$username,$hid);

											$credtotal+=$credamount;

										}//end if
									
									
								}//end for

							$totamount=$totamount-$credtotal;

							//insert into receipts
							$resulte = mysql_query("insert into receipts values('0','','','','".$refundno."','".$date."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$fintot."','','".$details."','','".$newbal."','".$stamp."','rf',1,2,'".$username."','".date('Ymd')."')");
							$resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'");	
							//$resulth = mysql_query("update receipts set amount='".$totamount."' where rcptno='".$rcptno."'");

							if($resulte&&$resultg){
							unset($_SESSION['refund']);
							$resulta = mysql_query("insert into log values('0','".$username." Issues Refund Note to Tenant.Refund Note No:".$refundno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							$message='Hello '.$bname.'. Your Account  has been debited KShs. '.number_format(floatval($credtotal)).'. Description: '.$refdesc.'.Your new balance is: '.number_format(floatval($newbal)).'. Thank you for your partnership.';
							$resulte = mysql_query("insert into notices values('0','Receipt','".$message."','".$bname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','1','','0','".$rcptno."')");
							sendsms($message,$phone);


							
							echo"<script>window.open('report.php?id=60&rcptno=".$refundno."');</script>";	
							echo"<script>$('#totitems').val('');$('#fintot').val('');$('#paymode').val('');$('#refno').val('');$('#prevbal').val('');$('#tenant').val('').focus().prop('disabled',false);</script>";
							echo"<script>setTimeout(function() {refunds();},500);</script>";
							
							echo '<script>swal("Success!", "Refund posted!", "success");</script>';
							exit;
							}
							else{
									echo '<script>swal("Error", "Refund posted!", "error");</script>';
							}
									
							break;


							case 78:
							$itcode=$_GET['itcode'];
							$itname=$_GET['itname'];
							$type=$_GET['type'];
							$amount=$_GET['amount'];
							$hid=$_GET['hid'];
							$desc=$_GET['desc'];
							$mon=$_GET['mon'];
							$commisionable=$_GET['commisionable'];
							$stamp=date('Ymd');
							$date=date('Y/m/d');


							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$hname=stripslashes($row['housename']);
							
							
							
							$result = mysql_query("insert into landtx values('','".$mon."','".$hid."','".$hname."','".$type."','".$itcode."','".$itname."','".$desc."','".$amount."','".date('d/m/Y')."','".date('Ymd')."','".$username."',1,'".$commisionable."')");
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." posts a landlord transaction.House name:".$hname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							echo"<script>$('#desc').val('');$('#amount').val('');$('#itemname').val('');</script>";
							
							
							echo '<script>swal("Success!", "Transaction posted!", "success");</script>';
							//echo'<script>setTimeout(function() {landstategen();},500);</script>	';
							
							}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Transaction not posted!", "error");</script>';
									}
							break;


							case 79:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from landtx where id='".$code."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes entry from landlord transactions.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';}
								
							break;

							case 80:
							$hid=$_GET['hid'];
							$mon=$_GET['mon'];
							$pid=$_GET['pid'];
							$pname=$_GET['pname'];
							$refno=$_GET['refno'];
							$date=$_GET['date'];
							$time=date('h:i A');
							$vat=$_GET['vat'];
							$net=$_GET['net'];
							$comm=$_GET['comm'];
							$gross=$_GET['gross'];
							$stamp=stampreverse($date);
							$journaldate=datereverse($date);

							

							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$hname=stripslashes($row['housename']);
							$phone=stripslashes($row['mobile']);
							$owner=stripslashes($row['owner']);
							$desc='Landlord Monthly Statement Posting:House name:'.$hname.',Month:'.$mon;
							checkaccdate($date);

							//post loan transaction if any:

							$result =mysql_query("select * from loanaccounts where acno='".$hid."' and  status=2 and loanbal>=1");
                            $num_results = mysql_num_rows($result);
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                $loanacno=stripslashes($row['loanacno']);
                                $loanbal=round($row['loanbal'],2);
                                $month_pay=round($row['month_pay'],2);
								if($loanbal<$month_pay){$amount=$loanbal;}else{$amount=$month_pay;}

								$resulta = mysql_query("insert into landtx values('','".$mon."','".$hid."','".$hname."','cr','0','Sacco Loan','Sacco Loan Deduction-Laon Ref:".$loanacno."','".$amount."','".$date."','".$stamp."','".$username."',1,'0')");
								postloanded($row,$username);


							}

							

						  $result =mysql_query("select * from houses where houseid='".$hid."'");
                          $num_results = mysql_num_rows($result);
                          for ($i=0; $i <$num_results; $i++) {
                              $row=mysql_fetch_array($result);
                              $amount=stripslashes($row['rent']);
                              $tenant=stripslashes($row['tenant']);
							  $tid=stripslashes($row['tenantid']);
							  $rid=stripslashes($row['rid']);

                              $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
                              $rowx=mysql_fetch_array($resultx);

                              if(stripslashes($row['status'])==0){$amount=0;$tenant='VACANT';}
                              if(stripslashes($row['housestatus'])=='Not for Rent'){$amount=0;$tenant='NOT FOR RENT ['.$tenant.']';}
                              

                              $resultg = mysql_query("insert into landstateunits values('','".$mon."','".$hid."','".$hname."','House Unit','".stripslashes($row['roomno'])."','".stripslashes($row['roomtype'])."','".$tenant."','".stripslashes($rowx['phone'])."','".$amount."','".$rid."','".$tid."')");
						
                            
                            }


							$question =mysql_query("SELECT * FROM journals order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['id'])+1;

							$resulta = mysql_query("insert into journals values('0','".$rcptno."','".$desc."','".$refno."','".$gross."','".$journaldate."','".$stamp."','".$username."',1,'0')");	
							

							//into ledger entries
							if($gross!=0){
							$amount=$gross;$lid=701;$lname='Landlord Expenses';$transtype='Debit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($vat!=0){
							$amount=$vat;$lid=614;$lname='Output Vat';$transtype='Credit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($net!=0){
							$amount=$net;$lid=$pid;$lname=$pname;$transtype='Credit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($comm!=0){
							$amount=$comm;$lid=716;$lname='Management Fees Revenue';$transtype='Credit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}


							$result = mysql_query("insert into landstate values('','".$mon."','".$hid."','".$hname."','".$gross."','".$comm."','".$vat."','".$net."','".$date."','".$stamp."','".$username."',1,'','".$pid."','".$pname."','".$refno."')");

							$resultg = mysql_query("update landtx set status=2 where mon='".$mon."' and hid='".$hid."'");


							if($result){

							//send sms
							$message='Hello '.$owner.'. The statement for your Property: '.$hname.' for the Month of '.$mon.'  has been generated. Thank you for your partnership.';
							sendsms($message,$phone);

							$resulta = mysql_query("insert into log values('0','".$username." posts a landlord statement.House name:".$hname.",Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							
							
							echo '<script>swal("Success!", "Transaction posted!", "success");</script>';
							echo"<script>window.open('report.php?id=63&code=1&d1=".$mon."&name=".$hid."');</script>";
							echo'<script>setTimeout(function() {landstategen();},500);</script>	';
							
							}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Transaction not posted!", "error");</script>';
									}
							break;

							case 81:
								 $code=$_GET['code'];

								

								  $result =mysql_query("select * from landstate where id='".$code."'");
	                         	  $row=mysql_fetch_array($result);
	                              $gross=stripslashes($row['gross']);
	                              $vat=stripslashes($row['vat']);
								  $net=stripslashes($row['net']);
								  $comm=stripslashes($row['agency']);
								  $hid=stripslashes($row['hid']);
								  $mon=stripslashes($row['mon']);
								  $hname=stripslashes($row['hname']);


								  $resultx = mysql_query("DELETE from landstate where id='".$code."'");
								  $resultb = mysql_query("DELETE from landstateunits where mon='".$mon."' and hid='".$hid."'");

								    $question =mysql_query("SELECT * FROM journals order by id desc limit 0,1");
									$ans=mysql_fetch_array($question);
								    $rcptno=stripslashes($ans['id'])+1;

								    $desc='Landlord Monthly Statement Cancellation:House name:'.$hname.',Month:'.$mon;

							$resulta = mysql_query("insert into journals values('0','".$rcptno."','".$desc."','".$refno."','".$gross."','".$journaldate."','".$stamp."','".$username."',1,'0')");	
							

							//into ledger entries
							if($gross!=0){
							$amount=$gross;$lid=701;$lname='Landlord Expenses';$transtype='Credit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($vat!=0){
							$amount=$vat;$lid=614;$lname='Output Vat';$transtype='Debit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($net!=0){
							$amount=$net;$lid=$pid;$lname=$pname;$transtype='Debit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($comm!=0){
							$amount=$comm;$lid=716;$lname='Management Fees Revenue';$transtype='Debit';
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','0','".$journaldate."','".$stamp."',1,'0')");	
							updateledgerbalance($lid, $journaldate, $stamp, $transtype, $amount);
							}

							if($resultx){

							$resulta = mysql_query("insert into log values('0','".$username." cancels a landlord statement.House name:".$hname.",Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" width="30px" height="30px"/>';
							
							
							echo '<script>swal("Success!", "Statement Cancelled!", "success");</script>';
							echo'<script>setTimeout(function() {deletestate();},500);</script>	';
							
							}
								else{
									echo'<img src="img/delete.png" width="30px" height="30px"/>';
									echo '<script>swal("Error", "Statement not Cancelled!", "error");</script>';
									}


							break;

							case 82:
							$acno=$hid=$_GET['hid'];
							$hname=$_GET['hname'];
							$amount=$_GET['amount'];
							$interest=$_GET['interest'];
							$repay=$months=$_GET['months'];
							$refno=$_GET['refno'];
							$purpose=$_GET['loanpurpose'];
							$date=$_GET['date'];
							$guarrantor=$_GET['guarrantor'];
							$security=$_GET['security'];
							$odetail=$_GET['otherdetails'];
							$intmode=$_GET['mode'];
							$stamp=stampreverse($date);
							$journaldate=datereverse($date);

							$question =mysql_query("SELECT * FROM loanaccounts order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
						    $loanacno=stripslashes($ans['loanacno'])+1;

							
							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$acname=stripslashes($row['housename']);
							$phone=stripslashes($row['mobile']);
							$owner=stripslashes($row['owner']);
							$crbal=stripslashes($row['bal']);
							$ncrbal=$crbal+$amount;
							$bcode='000';
							$arr_int=0;

							if($intmode==1&&$interest==0){$intmode=2;}


							//LET PDATE BE 1 MONTH FROM NOW
							$pdate=substr($date,0,2);
							
							$loan=$loanbal=$amount;
								
								
								//look for next month's date
								$tstamp=$stamp;
								$s = new DateTime($tstamp);
								$s->modify('+1month');
								$expstamp= $s->format('Ymd');


								//calculate monthly pay-based on different interest modes

									$totmonths=$repay;
									$annint=$interest/100;
									$monint=$annint;
									$totloan=$loanbal;


									if($intmode==1){

									//i(1+i)^n
									pow(2, 8);

									$numa=pow((1+$monint),$totmonths);
									$den=$numa-1;
									$numb=$numa*$monint*$totloan;

									if($den!=0){$monthly=$numb/$den;}else{$monthly=$numb;}
									$mon=$monthly;
									$totpaid=$monthly*$totmonths;
									$totint=$totpaid-$totloan;	

									}


									if($intmode==2){

									
									$totint=$totloan*$monint*$totmonths;
									$totpaid=$totint+$totloan;
									$monthly=$totpaid/$totmonths;
									$mon=$monthly;
									
									$loanbal=$totpaid;


									}

									$monthly=round($monthly,2);
									$totint=round($totint,2);
									$totpaid=round($totpaid,2);
									

								

							

							$resulta = mysql_query("insert into loanaccounts values('0','".$loanacno."','".$amount."','".$repay."','".$purpose."','".$pdate."','".$guarrantor."','".$security."','".$odetail."','".$interest."','".$acno."','".$acname."','".$date."','".$stamp."','".$username."','','','','','','','".$loanbal."','1','".$expstamp."',1,'".$monthly."','".$totpaid."','".$totint."','".$repay."','','','".$refno."','".$intmode."')");
							
							
							if($resulta){

							$resulta = mysql_query("insert into log values('0','".$username." makes a loan application transaction.Loan account opened:".$loanacno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Loan Created!", "success");</script>';
							echo'<script>setTimeout(function() {newloan();},500);</script>	';
							
							}
							else{
								echo '<script>swal("Error", "Loan not Created!", "error");</script>';
								}

							break;

							case 83:
							$acno=$hid=$_GET['hid'];
							$hname=$_GET['hname'];
							$amount=$_GET['amount'];
							$interest=$_GET['interest'];
							$repay=$months=$_GET['months'];
							$refno=$_GET['refno'];
							$purpose=$_GET['loanpurpose'];
							$date=$_GET['date'];
							$guarrantor=$_GET['guarrantor'];
							$security=$_GET['security'];
							$odetail=$_GET['otherdetails'];
							$intmode=$_GET['mode'];
							$stamp=stampreverse($date);
							$journaldate=datereverse($date);
							$loanacno=$param=$_GET['param'];

							

							
							$resultf = mysql_query("select * from mainhouses where houseid=".$hid."");
							$row=mysql_fetch_array($resultf);
							$acname=stripslashes($row['housename']);
							$phone=stripslashes($row['mobile']);
							$owner=stripslashes($row['owner']);
							$crbal=stripslashes($row['bal']);
							$ncrbal=$crbal+$amount;
							$bcode='000';
							$arr_int=0;


							//LET PDATE BE 1 MONTH FROM NOW
							$pdate=substr($date,0,2);
							
							$loan=$loanbal=$amount;
								
								
								//look for next month's date
								$tstamp=$stamp;
								$s = new DateTime($tstamp);
								$s->modify('+1month');
								$expstamp= $s->format('Ymd');


									//calculate monthly pay-based on different interest modes

									$totmonths=$repay;
									$annint=$interest/100;
									$monint=$annint/12;
									$totloan=$loanbal;

									if($intmode==1){

									//i(1+i)^n
									pow(2, 8);

									$numa=pow((1+$monint),$totmonths);
									$den=$numa-1;
									$numb=$numa*$monint*$totloan;

									if($den!=0){$monthly=$numb/$den;}else{$monthly=$numb;}
									$mon=$monthly;
									$totpaid=$monthly*$totmonths;
									$totint=$totpaid-$totloan;	

									}


									if($intmode==2){

									
									$totint=$totloan*$monint*$totmonths;
									$totpaid=$totint+$totloan;
									$monthly=$totpaid/$totmonths;
									$mon=$monthly;
									
									$loanbal=$totpaid;

									}

									$monthly=round($monthly,2);
									$totint=round($totint,2);
									$totpaid=round($totpaid,2);


								

							

							$resulta = mysql_query("update loanaccounts set int_rate='".$interest."',month_pay='".$monthly."',total_pay='".$totpaid."',total_interest='".$totint."',loanamount='".$amount."',repayment_period='".$repay."',purpose='".$purpose."',debit_date='".$pdate."',other_details='".$odetail."',security_details='".$security."',guarrantor_details='".$guarrantor."',loanbal='".$loanbal."',intmode='".$intmode."' where loanacno='".$loanacno."'");

							if($resulta){

							$resulta = mysql_query("insert into log values('0','".$username." edits a loan application transaction.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo '<script>swal("Success!", "Loan Information Updated!", "success");</script>';
							echo'<script>setTimeout(function() {editloan();},500);</script>	';
							
							}
							else{
								echo '<script>swal("Error", "Loan Information not Updated!", "error");</script>';
								}

							break;

							case 84:
							$param=$_GET['param'];
							$a=$_GET['a'];
							$result = mysql_query("DELETE from loanaccounts where loanacno='".$param."'");
							if($result){
							$resulta = mysql_query("insert into log values('','".$username." Deletes loan application.Account No:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							exit;
							}
								
							break;


							case 85:
							$param=$loanacno=$_GET['param'];
							$a=$_GET['a'];

							$resultx =mysql_query("select * from loanaccounts where loanacno='".$param."' limit 0,1");
      						$rowx=mysql_fetch_array($resultx);
      						$date=stripslashes($rowx['date_opened']);
      						$stamp=stripslashes($rowx['stamp_opened']);
      						$loanamount=$amount=stripslashes($rowx['loanamount']);
							$odetail=stripslashes($rowx['other_details']);
							$repay=stripslashes($rowx['repayment_period']);
							$purpose=stripslashes($rowx['purpose']);
							$acno=stripslashes($rowx['acno']);
							$loanbal=stripslashes($rowx['loanbal']);
							$bcode=0;
							
							
						
							if($a==0){
								
								$resultz = mysql_query("update loanaccounts set status=0,open_verified_by='".$username."' where loanacno='".$loanacno."'");
								
								if($resultz){
								$resulta = mysql_query("insert into log values('0','".$username." rejects loan application.Account No:".$loanacno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo '<script>swal("Success!", "Loan Application Rejected!", "success");</script>';
								echo"<script>setTimeout(function() {verifyloan();},500);</script>";	
								exit;
								}
								exit;
							}

							if($a==1){
							$result =mysql_query("select * from mainhouses where houseid='".$acno."'");
							$row=mysql_fetch_array($result);
							$acname=stripslashes($row['housename']);
							$ncrbal=stripslashes($row['bal']);
							
							

							//add loan bal and credit balance
							
							$ncrbal=$ncrbal+$loanamount;


							$resulta = mysql_query("insert into acctrack values('0','".$acno."','".$acname."','LOAN ACCOUNT APPROVAL-LOAN A/C NO:".$loanacno."','".$amount."','','".$ncrbal."','','".$date."','".$stamp."','".$username."','1','1','dr')");	
							$resulty = mysql_query("update mainhouses set bal='".$ncrbal."' where acno='".$acno."'");
							$resultz = mysql_query("update loanaccounts set status=2,open_verified_by='".$username."' where loanacno='".$loanacno."'")  or die (mysql_error());
							$resultp = mysql_query("insert into loantrack values('0','".$loanacno."','".$acname." LOAN A/C','".$bcode."','LOAN ACCOUNT APPROVED AND FUNDS CREDITED','".$loanbal."','','".$loanbal."','','".$date."','".$stamp."','".$username."','1','dr')");	
							$resultp = mysql_query("insert into maintrack values('0','LOAN','".$loanacno."','".$acname."','NEW LOAN-REF NO:".$loanacno."','".$loanbal."','".$loanbal."','".$date."','".$stamp."','".$stamp."0000','1')");	

								
							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." verifies loan application transaction.Loan account approved:".$loanacno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Loan Application Verified!", "success");</script>';
							echo'<script>setTimeout(function() {verifyloan();},500);</script>	';
							
							}
							else{
							echo '<script>swal("Error", "Loan Application not Verified!", "error");</script>';
							}

							}



							
							break;

							case 86:
							$loanacno=$_GET['loanacno'];
							$amount=$_GET['amount'];
							$details=$_GET['details'];

							$date=$_GET['date'];
							$stamp=stampreverse($date);
							$bcode=0;

							
							
							$result =mysql_query("select * from loanaccounts where loanacno='".$loanacno."'");
							$row=mysql_fetch_array($result);	
							$hid=$acno=stripslashes($row['acno']);
							$loanbal=stripslashes($row['loanbal']);	


							$result =mysql_query("select * from mainhouses where houseid='".$acno."'");
							$row=mysql_fetch_array($result);	
							$crbal=stripslashes($row['bal']);
							$acname=stripslashes($row['housename']);
							
							$ncrbal=$crbal-$amount;
							$nloanbal=$loanbal-$amount;
							
							
							$resultp = mysql_query("insert into acctrack values('0','".$acno."','".$acname."','".$details."-LOAN A/C NO:".$loanacno."','".$amount."','','".$ncrbal."','','".$date."','".$stamp."','".$username."','1','1','cr')");	
							$resultp = mysql_query("insert into loantrack values('0','".$loanacno."','".$acname."','".$bcode."','".$details."-LOAN ACCOUNT CREDIT:".$loanacno."','".$amount."','','".$nloanbal."','','".$date."','".$stamp."','".$username."','1','cr')");	
							
							$resulty = mysql_query("update mainhouses set bal='".$ncrbal."' where houseid='".$acno."'");
							$resulta = mysql_query("update loanaccounts set loanbal='".$nloanbal."' where loanacno='".$loanacno."'");
							$resultp = mysql_query("insert into maintrack values('0','LOAN','".$loanacno."','".$acname."','LOAN ACCOUNT CREDIT:".$loanacno."','".$amount."','".$nloanbal."','".$date."','".$stamp."','".$stamp."0000','1')");	


							if($nloanbal<1){
							//close loan account
							$resultz = mysql_query("update loanaccounts set status=3  where loanacno='".$loanacno."'");

							}

							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." makes a loan account credit. Loan A/c No:".$loanacno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Loan Payment Posted!", "success");</script>';
							echo'<script>setTimeout(function() {loanrepay();},500);</script>';
							
							}
							else{
							echo '<script>swal("Error", "Loan Payment not Posted!", "error");</script>';
							}
							
							
							
							break;

							case 87:
							$hid=$acno=$cusno=$_GET['acno'];
							$date=$_GET['date'];
							$odetail=$details=$_GET['odetail'];
							$amount=$_GET['amount'];

							$date=$_GET['date'];
							$stamp=stampreverse($date);
							$bcode=0;
							$refno=0;
							
							$result =mysql_query("select * from mainhouses where houseid='".$acno."'");
							$row=mysql_fetch_array($result);	
							$crbal=stripslashes($row['bal']);
							$acname=stripslashes($row['housename']);

							$ncrbal=$crbal+$amount;
							
							//get receipt no and insert into transactions
							$question =mysql_query("SELECT * FROM transactions order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['rcptno'])+1;
							
							
							//insert into transactions
							$resulta = mysql_query("insert into transactions values('0','".$rcptno."','cr','Normal Cash Deposit','','".$cusno."','".$acname."','".$amount."','".$refno."','".$odetail."','".$ncrbal."','".$date."','".date('h:i a')."','".$stamp."','".$username."','1')");	
							$resulty = mysql_query("update mainhouses set bal='".$ncrbal."' where houseid='".$hid."'");
							$resultp = mysql_query("insert into acctrack values('0','".$cusno."','".$acname."','".$details."-CASH DEPOSIT','".$amount."','','".$ncrbal."','','".$date."','".$stamp."','".$username."','1','1','cr')");	
							$resultp = mysql_query("insert into maintrack values('0','SHARES','".$cusno."','".$acname."','CASH DEPOSIT:".$cusno."','".$amount."','".$ncrbal."','".$date."','".$stamp."','".$stamp."0000','1')");	
					
							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." makes a cash deposit.Member No:".$cusno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Deposit Posted!", "success");</script>';
							echo'<script>setTimeout(function() {cashdep();},500);</script>';
							
							}
							else{
							echo '<script>swal("Error", "Deposit not Posted!", "error");</script>';
							}
							
							
							
							break;

							case 88:
							$hid=$acno=$cusno=$_GET['acno'];
							$date=$_GET['date'];
							$odetail=$details=$_GET['odetail'];
							$amount=$_GET['amount'];

							$date=$_GET['date'];
							$stamp=stampreverse($date);
							$bcode=0;
							$refno=0;
							
							$result =mysql_query("select * from mainhouses where houseid='".$acno."'");
							$row=mysql_fetch_array($result);	
							$crbal=stripslashes($row['bal']);
							$acname=stripslashes($row['housename']);

							$ncrbal=$crbal-$amount;
							
							//get receipt no and insert into transactions
							$question =mysql_query("SELECT * FROM transactions order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rcptno=stripslashes($ans['rcptno'])+1;
							
							
							//insert into transactions
							$resulta = mysql_query("insert into transactions values('0','".$rcptno."','dr','Normal Cash Withdrawal','','".$cusno."','".$acname."','".$amount."','".$refno."','".$odetail."','".$ncrbal."','".$date."','".date('h:i a')."','".$stamp."','".$username."','1')");	
							$resulty = mysql_query("update mainhouses set bal='".$ncrbal."' where houseid='".$hid."'");
							$resultp = mysql_query("insert into acctrack values('0','".$cusno."','".$acname."','CASH WITHDRAWAL','".$amount."','','".$ncrbal."','','".$date."','".$stamp."','".$username."','1','1','cr')");
							$resultp = mysql_query("insert into maintrack values('0','SHARES','".$cusno."','".$acname."','CASH WITHDRAWAL:".$cusno."','".$amount."','".$ncrbal."','".$date."','".$stamp."','".$stamp."0000','1')");		
							

							
							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." makes a cash withdrawal.Member No:".$cusno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo '<script>swal("Success!", "Withdrawal Posted!", "success");</script>';
							echo'<script>setTimeout(function() {cashwith();},500);</script>';
							
							}
							else{
							echo '<script>swal("Error", "Withdrawal not Posted!", "error");</script>';
							}
							
							
							break;

							case 89:
							$tid=$_GET['tid'];
							
							

							$resulta = mysql_query("update tenants set status=1 where tid='".$tid."'");
							if($resulta){

                            	$resulta = mysql_query("insert into log values('','".$username." reactivates Membership.Serial:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<script>setTimeout(function() {extenants();},500);</script>';
								echo '<script>swal("Success!", "Membership Activated!", "success");</script>';

                            }else{
                            	echo '<script>swal("Error", "Membership not activated!", "error");</script>';
                            }
							
							
							break;

							case 90:
							$amount=$_GET['amount'];
							$code=$_GET['code'];
							

							
								$result = mysql_query("update budget set amount='".$amount."' where id='".$code."'");
								if($result){
								echo'<img src="img/tick.png" style="width:30px; height:30px">';
								}
								else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
									}
							
							break;

							case 91:
							$tid=$_GET['tid'];
							
							
							$resultg = mysql_query("update tenants set status='0' where tid='".$tid."'")    or die (mysql_error());
							


							if($resultg){

                            	$resulta = mysql_query("insert into log values('','".$username." deactivates Membership.Name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<script>setTimeout(function() {findtenant();},500);</script>';
								echo '<script>swal("Success!", "Member Archived!", "success");</script>';

                            }else{
                            	echo '<script>swal("Error", "Member not Archived!", "error");</script>';
                            }
							
							
							break;


							case 92:
							$acno=$emp=$_GET['hid'];
							$hname=$_GET['hname'];
							$amount=$_GET['amount'];
							$interest=$_GET['interest'];
							$repay=$months=$_GET['months'];
							$refno=$_GET['refno'];
							$purpose=$_GET['loanpurpose'];
							$date=$_GET['date'];
							$guarrantor=$_GET['guarrantor'];
							$security=$_GET['security'];
							$odetail=$_GET['otherdetails'];
							$intmode=$_GET['mode'];
							$pid=$_GET['pid'];
							$pname=$_GET['pname'];
							$startmonth=$_GET['startmonth'];
							$startmonth=substr($startmonth,3,4).substr($startmonth,0,2).'31';
							$loantype=$_GET['loantype'];
							$stamp=stampreverse($date);
							$journaldate=datereverse($date);

							$question =mysql_query("SELECT * FROM emploans order by id desc limit 0,1");
							$ans=mysql_fetch_array($question);
						    $loanacno=stripslashes($ans['loanacno'])+1;

							connecthr();
							$resultf = mysql_query("select * from employee where emp='".$emp."'");
							$row=mysql_fetch_array($resultf);
							$acname=stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']);
							$phone=stripslashes($row['phone']);
							$owner=$acname;
							$crbal=0;
							$ncrbal=$crbal+$amount;
							$bcode='000';
							$arr_int=0;
							connectlocal();

							if($intmode==1&&$interest==0){$intmode=2;}


							//LET PDATE BE 1 MONTH FROM NOW
							$pdate=substr($date,0,2);
							
							$loan=$loanbal=$amount;
								
								
								//look for next month's date
								$tstamp=$stamp;
								$s = new DateTime($tstamp);
								$s->modify('+1month');
								$expstamp= $s->format('Ymd');


								//calculate monthly pay-based on different interest modes

									$totmonths=$repay;
									$annint=$interest/100;
									$monint=$annint;
									$totloan=$loanbal;


									if($intmode==1){

									//i(1+i)^n
									pow(2, 8);

									$numa=pow((1+$monint),$totmonths);
									$den=$numa-1;
									$numb=$numa*$monint*$totloan;

									if($den!=0){$monthly=$numb/$den;}else{$monthly=$numb;}
									$mon=$monthly;
									$totpaid=$monthly*$totmonths;
									$totint=$totpaid-$totloan;	

									}


									if($intmode==2){

									
									$totint=$totloan*$monint*$totmonths;
									$totpaid=$totint+$totloan;
									$monthly=$totpaid/$totmonths;
									$mon=$monthly;
									
									$loanbal=$totpaid;


									}

									$monthly=round($monthly,2);
									$totint=round($totint,2);
									$totpaid=round($totpaid,2);
									

								

							

							$resulta = mysql_query("insert into emploans values('0','".$loanacno."','".$amount."','".$repay."','".$purpose."','".$pdate."','".$guarrantor."','".$security."','".$odetail."','".$interest."','".$acno."','".$acname."','".$date."','".$stamp."','".$username."','','','','','','','".$loanbal."','1','".$expstamp."',1,'".$monthly."','".$totpaid."','".$totint."','".$repay."','','','".$refno."','".$intmode."','".$pid."','".$pname."','".$loantype."','".$startmonth."')");

								$journalno=0;$cid=$pid;$did=741;$refno=$refno;$journaldate=datereverse($date);
								$description='Loan/Advance issue to '.$acname.'-Ref No:'.$refno;
								postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$journaldate,$username,0);
							
							
							if($resulta){

							$resulta = mysql_query("insert into log values('0','".$username." makes an employee loan application transaction.Loan account opened:".$loanacno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo '<script>swal("Success!", "Employee Loan Created!", "success");</script>';
							echo'<script>setTimeout(function() {emploans();},500);</script>	';
							
							}
							else{
								echo '<script>swal("Error", "Loan not Created!", "error");</script>';
								}

							break;

							case 93:
							$code=$_GET['code'];
							$a=$_GET['a'];
							$checkin=$_GET['checkin'];
							$checkout=$_GET['checkout'];
							if($a==1){
							$resultg = mysql_query("update inspection set checkin='".$checkin."',checkinuser='".$username."' where id='".$code."'")    or die (mysql_error());	
							}

							if($a==2){
							$resultg = mysql_query("update inspection set checkout='".$checkout."',checkoutuser='".$username."' where id='".$code."'")    or die (mysql_error());	
							}
							
							if($resultg){
							$resulta = mysql_query("insert into log values('','".$username." saves inspection entry.Code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							

							break;

							case 94:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from inspection where id='".$code."'");
							$resulta = mysql_query("insert into log values('','".$username." deletes inspection record.Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							break;

							case 95:
							$cardno=$_GET['cardno'];

							$result =mysql_query("select * from cards where cardno='".$cardno."'");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)>0){
							echo '<script>swal("Error", "Card No already exists in the database!", "error");</script>';
							exit;
							}

							$result = mysql_query("INSERT INTO cards (id, cardno,date,stamp,status) VALUES ('0','".$cardno."','".date('d/m/Y')."','".date('Ymd')."',0)")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." registers card.Id:".$cardno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							echo'<img src="img/tick.png" style="width:30px; height:30px">';	
							
							break;

							case 96:
							$cardno=$_GET['cardno'];
							$tid=$_GET['tid'];


							  $result =mysql_query("select * from cards where cardno='".$cardno."' limit 0,1");
				              $row=mysql_fetch_array($result);
				              $cardid=stripslashes($row['id']);

				              $result =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
				              $row=mysql_fetch_array($result);
				              $bname=stripslashes($row['bname']);
				              $kpano=stripslashes($row['kpano']);


							$resulta = mysql_query("update tenants set cardid='".$cardid."',cardno='".$cardno."' where tid='".$tid."'")    or die (mysql_error());	
							
							$resultb = mysql_query("update cards set memberno='".$kpano."',memberid='".$tid."',membername='".$bname."',status=1 where id='".$cardid."'")    or die (mysql_error());	
							
							
							if($resultb){
							$resulta = mysql_query("insert into log values('','".$username." assigns card to member.Card No:".$cardno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo"<script>setTimeout(function() {assigncard();},500);</script>";
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							

							break;

							case 97:
							$cardid=$_GET['b'];

							$result =mysql_query("select * from cards where id='".$cardid."' and memberid!=''");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)==0){
							echo '<script>swal("Error", "Card Number has not been assigned to any member!", "error");</script>';
							exit;
							}

							$tid=stripslashes($row['memberid']);

							$resulta = mysql_query("update tenants set cardid='',cardno='' where tid='".$tid."'")    or die (mysql_error());	
							
							$resultb = mysql_query("update cards set memberno='',memberid='',membername='',status=0 where id='".$cardid."'")    or die (mysql_error());	
							
							
							if($resultb){
							$resulta = mysql_query("insert into log values('','".$username." assigns card to member.Card No:".$cardno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							echo"<script>setTimeout(function() {assigncard();},500);</script>";
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							
							break;

							case 98:
							$a=$_GET['a'];
							$b=$_GET['b'];
							
							if($a==1){
							$result = mysql_query("INSERT INTO workshops (id, title,location,startdate,enddate,startstamp,endstamp,remarks,date,stamp,status,username) VALUES ('0','".$_GET['title']."','".$_GET['location']."','".$_GET['startdate']."','".$_GET['enddate']."','".stampreverse($_GET['startdate'])."','".stampreverse($_GET['enddate'])."','".mysql_real_escape_string(trim($_GET['remarks']))."','".date('d/m/Y')."','".date('Ymd')."',0,'".$username."')")  or die (mysql_error());
							}
							else if($a==2){

								$result = mysql_query("update workshops set title='".$_GET['title']."',location='".$_GET['location']."',startdate='".$_GET['startdate']."',enddate='".$_GET['enddate']."',startstamp='".stampreverse($_GET['startdate'])."',endstamp='".stampreverse($_GET['enddate'])."',remarks='".$_GET['remarks']."' where id='".$b."'")   or die (mysql_error());	

							}

							$resulta = mysql_query("insert into log values('','".$username." registers workshop.title:".$_GET['title']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							if($result){
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							if($a==1){echo"<script>setTimeout(function() {workregistry();},500);</script>";}
							else if($a==2){echo"<script>setTimeout(function() {findworkshops();},500);</script>";}
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							
							break;


							case 99:
						    $param=$_GET['param'];
						    $result = mysql_query("DELETE from workshops where id='".$param."'");
						    $resulta = mysql_query("insert into log values('','".$username." deletes workshop record.Id:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
						    echo"<script>setTimeout(function() {findworkshops();},500);</script>";
						    
						    break;


						    case 100:
							$cardno=$_GET['cardno'];
							$workid=$_GET['workid'];


							$result =mysql_query("select * from cards where cardno='".$cardno."' and status=1");
							if(mysql_num_rows($result)==0){
							echo '<script>swal("Error", "Invalid Card.Either the Card has not been registered or its an inactive card!", "error");</script>';
							exit;
							}

							$row=mysql_fetch_array($result);
							$memberid=stripslashes($row['id']);
							$memberno=stripslashes($row['memberno']);
							$membername=stripslashes($row['membername']);

							$result = mysql_query("INSERT INTO workshopregister (id, workshopid,memberid,memberno,membername,date,stamp,status) VALUES ('0','".$workid."','".$memberid."','".$memberno."','".$membername."','".date('d/m/Y')."','".date('Ymd')."',1)")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." registers attendance.cardno:".$cardno.",workid:".$workid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							echo'<img src="img/tick.png" style="width:30px; height:30px">';	
							
							break;

							case 101:
							$a=$_GET['a'];
							$b=$_GET['b'];
							
							if($a==1){
							$result = mysql_query("INSERT INTO forums (id, title,author,startdate,startstamp,remarks,date,stamp,status,username) VALUES ('0','".$_GET['title']."','".$_GET['author']."','".$_GET['startdate']."','".stampreverse($_GET['startdate'])."','".mysql_real_escape_string(trim($_GET['remarks']))."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')")  or die (mysql_error());
							}
							else if($a==2){

								$result = mysql_query("update forums set title='".$_GET['title']."',author='".$_GET['author']."',startdate='".$_GET['startdate']."',startstamp='".stampreverse($_GET['startdate'])."',remarks='".$_GET['remarks']."' where id='".$b."'")   or die (mysql_error());	

							}

							$resulta = mysql_query("insert into log values('','".$username." registers forum.title:".$_GET['title']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							if($result){
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							if($a==1){echo"<script>setTimeout(function() {forumsregistry();},500);</script>";}
							else if($a==2){echo"<script>setTimeout(function() {findforums();},500);</script>";}
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							
							break;

							case 102:
						    $param=$_GET['param'];
						    $result = mysql_query("DELETE from forums where id='".$param."'");
						    $resulta = mysql_query("insert into log values('','".$username." deletes forum record.Id:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
						    echo"<script>setTimeout(function() {findforums();},500);</script>";
						    
						    break;

						    case 103:
							$a=$_GET['a'];
							$b=$_GET['b'];
							
							if($a==1){
							$result = mysql_query("INSERT INTO cme (id, title,author,startdate,enddate,startstamp,endstamp,remarks,date,stamp,status,username,pdffile) VALUES ('0','".$_GET['title']."','".$_GET['author']."','".$_GET['startdate']."','".$_GET['enddate']."','".stampreverse($_GET['startdate'])."','".stampreverse($_GET['enddate'])."','".mysql_real_escape_string(trim($_GET['remarks']))."','".date('d/m/Y')."','".date('Ymd')."',0,'".$username."','".$_GET['pdf']."')")  or die (mysql_error());
							}
							else if($a==2){

								$result = mysql_query("update cme set title='".$_GET['title']."',author='".$_GET['author']."',startdate='".$_GET['startdate']."',enddate='".$_GET['enddate']."',startstamp='".stampreverse($_GET['startdate'])."',endstamp='".stampreverse($_GET['enddate'])."',remarks='".$_GET['remarks']."',pdffile='".$_GET['pdf']."' where id='".$b."'")   or die (mysql_error());	

							}

							$resulta = mysql_query("insert into log values('','".$username." registers cme.title:".$_GET['title']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							if($result){
							echo'<img src="img/tick.png" style=""  width="30" height="30"/>';
							if($a==1){echo"<script>setTimeout(function() {cmeregistry();},500);</script>";}
							else if($a==2){echo"<script>setTimeout(function() {findcme();},500);</script>";}
							exit;
							}else{echo'<img src="img/delete.png" style=""  width="30" height="30"/>';
							}
							
							break;

							case 104:
						    $param=$_GET['param'];
						    $result = mysql_query("DELETE from cme where id='".$param."'");
						    $resulta = mysql_query("insert into log values('','".$username." deletes cme record.Id:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
						    echo"<script>setTimeout(function() {findcme();},500);</script>";
						    
						    break;

						    case 105:
							$message=$_GET['message'];
							
							$count=count($_SESSION['bulk']);
							foreach ($_SESSION['bulk'] as $key => $val) {
							$resultx =mysql_query("select * from tenants where tid='".$key."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$phone=stripslashes($rowx['phone']);
							$status=0;
							if(sendsms($message,$phone)){$status=1;}
							$resulte = mysql_query("insert into notices values('0','Bulk','".$message."','".$bname."','".$phone."','".$key."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
							
							}

							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "'.$count.' Messages successfully sent!", "success");</script>';
							echo"<script>setTimeout(function() {bulksms();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Message has not been sent!", "error");</script>';
							}
							break;


						    case 106:
							$message=$_GET['message'];
							$phone=$_GET['phoneno'];
							
							
							$status=0;
							if(sendsms($message,$phone)){$status=1;}
							$resulte = mysql_query("insert into notices values('0','Quick','".$message."','Unknown','".$phone."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
							
							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Message successfully sent!", "success");</script>';
							//echo"<script>setTimeout(function() {bulksms();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Message has not been sent!", "error");</script>';
							}
							break;


							case 107:
								$categ=$_GET['categ'];

								$result =mysql_query("select * from company");
								$row=mysql_fetch_array($result);
								$comname=strtoupper(stripslashes($row['CompanyName']));

								switch($categ){

								case 1:
								$resulta =mysql_query("select * from tenants where status=1 and bal>0");
								$num_resultsa = mysql_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);
									$cusno=stripslashes($rowa['tid']);
									$names=stripslashes($rowa['bname']);
									$phone=stripslashes($rowa['phone']);
									$bal=stripslashes($rowa['bal']);

									$message='Hello+'.$names.'.Your+annual+membership+invoice+is+overdue+and+needs+to+be+cleared.Your+current+Balance+is+'.number_format($bal).'.+Kindly+pay+up+within+7+days+to+avoid+account+deactivation.M-Pesa+Paybill+no:494063;Account+No:+'.$cusno; 

									$status=0;
									if(sendsms($message,$phone)){$status=1;}
									$resulte = mysql_query("insert into notices values('0','Auto','".$message."','".$names."','".$phone."','".$cusno."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
								}
								break;


								}


								$resulta = mysql_query("insert into log values('0','".$username." inserts sends auto bulk sms.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
								if($resulte){
								echo'<img src="img/tick.png" style="width:30px; height:30px">';
								echo '<script>swal("Success!", "Messages successfully sent!", "success");</script>';
								//echo"<script>setTimeout(function() {bulksms();},500);</script>";	
								}
								else{
									echo'<img src="img/delete.png" style="width:30px; height:30px">';
									echo '<script>swal("Error", "Your Messages have not been sent!", "error");</script>';
								}

								break;

							case 108:
							$message=$_GET['message'];
							$subject=$_GET['subject'];
							
							$count=count($_SESSION['bulk']);
							foreach ($_SESSION['bulk'] as $key => $val) {
							$resultx =mysql_query("select * from tenants where tid='".$key."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$bname=stripslashes($rowx['bname']);
							$phone=stripslashes($rowx['phone']);
									$status=0;
									$resulty = mysql_query("select * from emails order by id desc limit 0,1");
									$rowy=mysql_fetch_array($resulty);
									$emailid=stripslashes($rowy['id'])+1;

									$resulte = mysql_query("insert into emails values('".$emailid."','".$subject."','".$message."','".$bname."','".$phone."','".$key."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
									
									if(sendhtmlemail($emailid)){
									$status=1;
									$resulta = mysql_query("update emails set status=1 where id='".$emailid."'")    or die (mysql_error());	
									}

							}
							

							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "'.$count.' Emails successfully sent!", "success");</script>';
							echo"<script>setTimeout(function() {bulkemail();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Email has not been sent!", "error");</script>';
							}
							break;

							 case 109:
							$message=$_GET['message'];
							$subject=$_GET['subject'];
							$email=$_GET['email'];
							
							
							$status=0;
							$resulty = mysql_query("select * from emails order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$emailid=stripslashes($rowy['id'])+1;

							$resulte = mysql_query("insert into emails values('".$emailid."','".$subject."','".$message."','Unknown','".$email."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
							
							if(sendhtmlemail($emailid)){
							$status=1;
							$resulta = mysql_query("update emails set status=1 where id='".$emailid."'")    or die (mysql_error());	
							}
							
							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Email successfully sent!", "success");</script>';
							//echo"<script>setTimeout(function() {bulksms();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Your Email has not been sent!", "error");</script>';
							}
							break;


							case 110:
								$categ=$_GET['categ'];

								$result =mysql_query("select * from company");
								$row=mysql_fetch_array($result);
								$comname=strtoupper(stripslashes($row['CompanyName']));

								switch($categ){

								case 1:
								$resulta =mysql_query("select * from tenants where status=1 and bal>0");
								$num_resultsa = mysql_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);
									$cusno=stripslashes($rowa['tid']);
									$names=stripslashes($rowa['bname']);
									$email=stripslashes($rowa['email']);
									$bal=stripslashes($rowa['bal']);

									$message='Your+annual+membership+invoice+is+overdue+and+needs+to+be+cleared.Your+current+Balance+is+'.number_format($bal).'.+Kindly+pay+up+within+7+days+to+avoid+account+deactivation.M-Pesa+Paybill+no:494063;Account+No:+'.$cusno; 

										$status=0;
										$resulty = mysql_query("select * from emails order by id desc limit 0,1");
										$rowy=mysql_fetch_array($resulty);
										$emailid=stripslashes($rowy['id'])+1;

										$resulte = mysql_query("insert into emails values('".$emailid."','Balance Notification','".$message."','".$names."','".$email."','".$cusno."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
										
										if(sendhtmlemail($emailid)){
										$status=1;
										$resulta = mysql_query("update emails set status=1 where id='".$emailid."'")    or die (mysql_error());	
										}

									}

									break;

							}
							

							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "'.$count.' Emails successfully sent!", "success");</script>';
							echo"<script>setTimeout(function() {bulkemail();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Email has not been sent!", "error");</script>';
							}
							break;

							 case 111:
							$param=$_GET['param'];

							 $result =mysql_query("select * from notices  where id='".$param."' limit 0,1");
                             $rowa=mysql_fetch_array($result);
                             $phone=stripslashes($rowa['phone']);
							 $message=stripslashes($rowa['message']);
							
							
							$status=0;
							if(sendsms($message,$phone)){$status=1;}
							
							
							if($result){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo"<script>setTimeout(function() {findsms();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Message has not been sent!", "error");</script>';
							}
							break;

							case 112:
							$param=$_GET['param'];

						

							$result = mysql_query("DELETE from notices where id='".$param."'")   or die (mysql_error());
							
							$resulta = mysql_query("insert into log values('','".$username." deletes sms record.id:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo"<script>setTimeout(function() {findsms();},500);</script>";
									}
									else{
									echo'<img src="img/delete.png" style="width:30px; height:30px;"></p>';
									}
							break;



							 case 113:
							 $param=$_GET['param'];

							
							
							$status=0;
							if(sendhtmlemail($param)){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo"<script>setTimeout(function() {findemails();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Your Email has not been sent!", "error");</script>';
							}
							break;

							case 114:
							$param=$_GET['param'];

						

							$result = mysql_query("DELETE from emails where id='".$param."'")   or die (mysql_error());
							
							$resulta = mysql_query("insert into log values('','".$username." deletes email record.id:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo"<script>setTimeout(function() {findemails();},500);</script>";
									}
									else{
									echo'<img src="img/delete.png" style="width:30px; height:30px;"></p>';
									}
							break;

							//portal code


							 case 115:
							$cmeid=$_GET['cmeid'];
							
							$resultx =mysql_query("select * from cme where id='".$cmeid."' limit 0,1");
 							$rowx=mysql_fetch_array($resultx);
 							$title=stripslashes($rowx['title']);

 							$result =mysql_query("select * from cmeparticipants where memberno='".$username."' and cmeid='".$cmeid."'");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)>0){
							echo '<script>swal("Error", "CME Already acknowledged as studied!", "error");</script>';
							exit;
							}

							
							

							$resulta = mysql_query("insert into cmeparticipants values('','".$cmeid."','".$userid."','".$username."','".$fullname."','".date('d/m/Y')."','".date('Ymd')."',1)");

							$resultx =mysql_query("select * from tenants where tid='".$userid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$pointsbal=stripslashes($rowx['pointsbal']);
							$amount=5;
							$pointsbal+=$amount;//5 points

							$resulte = mysql_query("insert into pointstrack values('','".$userid."','".$username."','".$fullname."','CME','Points awarded for CME titled ".$title."','".$amount."','".$pointsbal."','".date('d/m/Y')."','".date('Ymd')."',1)");

						
							
							if($resulta){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Study acknowledged!", "success");</script>';
							$resulta = mysql_query("insert into log values('','".$username." acknowledges study.cme id:".$cmeid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>setTimeout(function() {cmepanel();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Study not  acknowledged!", "error");</script>';
							}
							break;


							 case 116:
							$forumid=$_GET['forumid'];
							$comment=$_GET['comment'];

							$resultx =mysql_query("select * from forums where id='".$forumid."' limit 0,1");
 							$rowx=mysql_fetch_array($resultx);
 							$title=stripslashes($rowx['title']);

 							
							
							

							$resulta = mysql_query("insert into forumcomments values('','".$forumid."','".$userid."','".$username."','".$fullname."','".$comment."','".date('d/m/Y')."','".date('Ymd')."',1,'".date('h:i A')."')");

							$resultx =mysql_query("select * from tenants where tid='".$userid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$pointsbal=stripslashes($rowx['pointsbal']);
							$amount=1;
							$pointsbal+=$amount;//5 points

							$resulte = mysql_query("insert into pointstrack values('','".$userid."','".$username."','".$fullname."','FORUM','Points awarded for FORUM titled ".$title."','".$amount."','".$pointsbal."','".date('d/m/Y')."','".date('Ymd')."',1)");

						
							
							if($resulta){
							echo "<script>
							$('#listcomments".$forumid."').append('<li><div class=\"menu-icon\"><img src=\"".getprofileimage($userid)."\" alt=\"image\"></div><div class=\"menu-text\">".$comment."<div class=\"menu-info\"> <span class=\"menu-date\">".date('d/m/Y')."-".date('h:i A')."</span></div></div></li>');
							</script>";
							
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							$resulta = mysql_query("insert into log values('','".$username." posts comment.forum id:".$forumid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Comment not  Posted!", "error");</script>';
							}
							break;






















							
								

							
							


								




	
	
	




		}