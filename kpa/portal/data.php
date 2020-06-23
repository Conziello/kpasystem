<?php include('db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from tenants where kpano='".$username."'");
$row=mysql_fetch_array($result);
$usertype='User';
$tid=$userid=stripslashes($row['tid']);
$profilepic=stripslashes($row['profile']);
$fullname=$bname=stripslashes($row['bname']);
$userbranch='MAIN';
include('functions.php'); 
}
//else{echo"<script>window.location.href = \"index.php\";</script>";}
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

	if($stamp!=date('Ymd')){

			$resultb = mysql_query("select * from ledgerstatus where lid='".$ledger1."'");
			$rowb=mysql_fetch_array($resultb);
			$lstamp=stripslashes($rowb['stamp']);
			if($lstamp!=''&&$lstamp<$stamp){$tstamp=$lstamp;}else{$tstamp=$stamp;}
			$resultx = mysql_query("insert into ledgerstatus values('".$ledger1."','".$tstamp."')");
			$resultb = mysql_query("select * from ledgerstatus where lid='".$ledger2."'");
			$rowb=mysql_fetch_array($resultb);
			$lstamp=stripslashes($rowb['stamp']);
			if($lstamp!=''&&$lstamp<$stamp){$tstamp=$lstamp;}else{$tstamp=$stamp;}
			$resultx = mysql_query("insert into ledgerstatus values('".$ledger2."','".$tstamp."')");
			
			
	}
}

function checkaccdate($date){

	$s=datereverse($date);
	$stamp=preg_replace('~/~', '', $s);
	$s=preg_replace('~/~', '-', $s);
	$threemon = new DateTime($s);
	$threemon->modify('+3month');
	$threemon=$threemon->format('Ymd');	

	$tstamp=date('Ymd');
	if($tstamp>$threemon){

		echo '<script>swal("Error", "The date entered has been locked out of the current accounting period!", "error");</script>';
		exit;
	}

}


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

									$result= mysql_query("insert into contacts values('0','".$_GET['name']."','".$_GET['bname']."','".$_GET['phone']."','".$_GET['remarks']."','".date('d/m/Y')."','".date('Ymd')."','".$next."','".$username."','1','','".$_GET['category']."')");
									$resulta = mysql_query("insert into log values('0','".$username." inserts data into contacts table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Contact Detail has been saved!", "success");</script>';
									echo"<script>setTimeout(function() {newcontact();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Contact Detail has not been updated!", "error");</script>';
									}

							}

							else if($a==2){

									$result = mysql_query("update contacts set name='".$_GET['name']."',bname='".$_GET['bname']."',phone='".$_GET['phone']."',remarks='".$_GET['remarks']."',category='".$_GET['category']."',expstamp='".$next."' WHERE id='".$soi."'");
									$resulta = mysql_query("insert into log values('0','".$username." edits contact Entry.Record ID:".$soi."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
									if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									echo '<script>swal("Success!", "You Contact Detail has been updated!", "success");</script>';
									echo"<script>setTimeout(function() {newcontact();},500);</script>";	
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										echo '<script>swal("Error", "You Contact Detail has not been updated!", "error");</script>';
									}

							}

							else if($a==3){

								$result = mysql_query("DELETE from contacts where id='".$soi."'");
								
							}

							


							break;

							case 1.1:


							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;

							$mon=date('Y');

							$resultc = mysql_query("select * from invoices where mon='".$mon."' and tid='".$tid."'");
							if(mysql_num_rows($resultc)>0){
								//echo '<script>swal("Error", "Membership Renewal Invoice already exists!", "error");</script>';
								echo '<span style="color:#f00"><b>Error:Membership Renewal Invoice already exists!</b></span>';
								exit;
							}

							$amount=5000;
							$renewal=4000;
							$welfare=1000;

						
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

							$nbal=$bal+$amount;

							$vat=0;

							

							//insert invoice
							$desc='MEMBERSHIP RENEWAL INVOICE FOR '.$mon;
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".date('d/m/Y')."','".$mon."','".$tid."','".$fullname."','','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$amount."','".date('Ymd')."','dr',1,2,'".$username."','".date('Ymd')."')")  or die (mysql_error());
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','1','Membership Fee','".$renewal."','0','".$renewal."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')")  or die (mysql_error());
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','5','Welfare Fee','".$welfare."','0','".$welfare."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')")  or die (mysql_error());
							
							$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");	
							

							
							//income
							$journalno=0;$cid=635;$did=628;$refno=$tid;$date=date('Y/m/d');
							$description='Membership Renewal Income-'.stripslashes($rowx['bname']).'-'.stripslashes($rowx['kpano']);
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$renewal,$description,$refno,$date,$username,$userbranch);
							
							$journalno=0;$cid=674;$did=628;$refno=$tid;$date=date('Y/m/d');
							$description='Welfare Income-'.stripslashes($rowx['bname']).'-'.stripslashes($rowx['roomno']);
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$welfare,$description,$refno,$date,$username,$userbranch);

							if($resultg){
							echo '<script>swal("Success!", "Application for renewal successful!", "success");</script>';
							}
							else{
								echo '<script>swal("Error", "Application for renewal not successful!", "error");</script>';
							}

							


							break;


							case 2:
							$message=$_GET['message'];
							 //into notices
					        $resulty = mysql_query("select * from notices order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$messageid=stripslashes($rowy['messageid'])+1;

							$count=count($_SESSION['bulk']);
							foreach ($_SESSION['bulk'] as $key => $val) {
							$resultx =mysql_query("select * from contacts where id='".$key."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$name=stripslashes($rowx['name']);
							$bname=stripslashes($rowx['bname']);
							$phone=stripslashes($rowx['phone']);
							$status=0;
							if(sendsms($message,$phone)){$status=1;}
							$resulte = mysql_query("insert into notices values('0','Bulk','".$messageid."','".$message."','".$name." [".$bname."]','".$phone."','".$key."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
							
							}

							if($resulte){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "'.$count.' Messages successfully sent!", "success");</script>';
							echo"<script>setTimeout(function() {sendmessage();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "You Message has not been sent!", "error");</script>';
							}




							break;

							case 3:
							$phone=$_GET['phone'];
							$message=$_GET['message'];
							$status=0;

							 //into notices
					        $resulty = mysql_query("select * from notices order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$messageid=stripslashes($rowy['messageid'])+1;

							if(sendsms($message,$phone)){$status=1;}
							$resulte = mysql_query("insert into notices values('0','Bulk','".$messageid."','".$message."','Random','".$phone."','0','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$status."','','0','')");
							
						
							if($resulte){
							$resulta = mysql_query("insert into log values('0','".$username." creates new sms','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#phone2').val('');$('#message2').val('');</script>";
							echo '<script>swal("Success!", "Message sent!", "success");</script>';

							exit;
							}
							else{
								echo '<script>swal("Error", "Notification not sent!", "error");</script>';
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


							//penalty variables
							$penpercent=10;
							$pendate=10;
							$penstatus=1;


							$resultc = mysql_query("INSERT INTO tenants (id, tid, lof, bname, address, phone, email, dname, dphone, date, stamp, status, rid, roomno, hid, hname, monrent, payable_expiry, contract_expiry_stamp, billing_type, escalation_type, invoice_expiry_stamp, penpercent, pendate, penstatus, penmonth, penwaivermonth) VALUES ('0','".$tid."','".$lof."','".stripslashes($rowz['bname'])."','".stripslashes($rowz['address'])."','".stripslashes($rowz['phone'])."','".stripslashes($rowz['email'])."','".stripslashes($rowz['dname1'])."','".stripslashes($rowz['dphone1'])."','".date('d/m/Y')."','".date('Ymd')."',1,'".stripslashes($roww['rid'])."','".stripslashes($roww['roomno'])."','".stripslashes($roww['houseid'])."','".stripslashes($roww['housename'])."','".stripslashes($rowx['rent'])."','".$payable_expiry."','".stripslashes($rowx['endstamp'])."','Monthly','".stripslashes($rowx['escalation_type'])."','".$payable_expiry."','".$penpercent."','".$pendate."','".$penstatus."',0,0)");
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
							$vat=round((($amount/1.16)*0.16),2);
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$amount."','".date('Ymd')."','dr',1,2)");
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
							$_SESSION['tenants'][$max]=$item;
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

							$resultb = mysql_query("select * from ledgers where ledgerid='".$lid."' and branchcode='".$hid."'");
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
							$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','".date('d/m/Y')."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','".$lid."','".$desc."','','".$bal."','".date('Ymd')."','cr',1,2)");
							$resultf = mysql_query("insert into receipt values('0','".$rcptno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','12','Deposit','".$amount."','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$refno."','".$lid."','".$lname."')");
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
							
							$resultg = mysql_query("update tenants set checkout_date='".date('d/m/Y')."',checkout_stamp='".date('Ymd')."',status='0',checkout_details='".$remarks."',checkout_by='".$username."',checkout_notice_date='".$notice."',vacate_date='".$vacate."',unit_deductions='".$unided."',notice_deductions='".$notded."',other_deductions='".$othded."',total_deductions_on_checkout='".$total."',deposit_paid='".$depayable."' where tid='".$tid."'")    or die (mysql_error());
							$resulth = mysql_query("update houses set tenant='',tenantid='',status=0 where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$rno."','".$hid."','".$hname."','Tenant Checkout','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							



							//post journal entries
							$journalno=0;$cid=675;$did=627;$refno=$refno;$date=date('Y/m/d');
							$description='Deposits Deductions-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Minus',$total,$description,$refno,$date,$username,$hid);

							

							//post journal entries
							$journalno=0;$cid=$paymode;$did=627;$refno=$refno;$date=date('Y/m/d');
							$description='Deposits Return after Deductions-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Minus',$depayable,$description,$refno,$date,$username,$hid);

							


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
							$dname=$_GET['dname'];
							$dphone=$_GET['dphone'];
							$unit=$_GET['unit'];
							$btype=$_GET['btype'];
							$etype=$_GET['etype'];
							$pin=$_GET['pin'];
							$nextdate=stampreverse($_GET['nextdate']);

							//deposit
							$depayable=$_GET['depayable'];
							$depaid=$_GET['depaid'];
							$debal=$_GET['debal'];

							//penalties
							$penstatus=$_GET['penstatus'];
							$pendate=$_GET['pendate'];
							$penpercent=$_GET['penpercent'];
							$waivermonth=$_GET['waivermonth'];

							$resultg = mysql_query("update tenants set bname='".$bname."',address='".$address."',phone='".$phone."',email='".$email."',dname='".$dname."',dphone='".$dphone."',billing_type='".$btype."',escalation_type='".$etype."',total_deposit='".$depayable."',paid_deposit='".$depaid."',bal_deposit='".$debal."',pin='".$pin."',invoice_expiry_stamp='".$nextdate."',penstatus='".$penstatus."',penpercent='".$penpercent."',pendate='".$pendate."',penwaivermonth='".$waivermonth."'   where tid='".$tid."'")    or die (mysql_error());
							
							
							$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$rid=stripslashes($rowx['rid']);
							
							//change of unit
							if($unit!=$rid){

							$resultx =mysql_query("select * from houses where rid='".$unit."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$monrent=stripslashes($rowx['rent']);
							$rno=stripslashes($rowx['roomno']);
							$hid=stripslashes($rowx['houseid']);
							$hname=stripslashes($rowx['housename']);

							$resulth = mysql_query("update houses set tenant='',tenantid='',status=0 where rid='".$rid."'");
							$resulti = mysql_query("update houses set tenant='".$bname."',tenantid='".$tid."',status=1 where rid='".$unit."'");
							$resultj = mysql_query("update tenants set rid='".$unit."',roomno='".$rno."',hid='".$hid."',hname='".$hname."',monrent='".$monrent."'   where tid='".$tid."'")    or die (mysql_error());
							
							}
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." edits information for tenant no-".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo'<img src="img/tick.png" style="width:30px; height:30px">';
							echo '<script>swal("Success!", "Tenant Information updated!", "success");</script>';
							echo"<script>setTimeout(function() {edittenant();},500);</script>";	
							}
							else{
								echo'<img src="img/delete.png" style="width:30px; height:30px">';
								echo '<script>swal("Error", "Information not updated!", "error");</script>';
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
							
							$result = mysql_query("insert into vacate values('".$rcptno."','".stripslashes($row['rid'])."','".$param."','".stripslashes($row['bname'])."','".stripslashes($row['hname'])."','".stripslashes($row['roomno'])."','".$vacdate."','".$desc."','".$date."','".$stamp."',1)");
							if($result){
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

							case 13:
							$a=$_GET['a'];
							$param=$hid=$_GET['b'];
							$name=$_GET['name'];
							if($a==1){
							$result= mysql_query("insert into mainhouses values('','".$_GET['housetype']."','".$_GET['value']."','".$_GET['name']."','".$_GET['units']."','".$_GET['location']."','".$_GET['owner']."','".$_GET['phone']."',1,0,'".$_GET['address']."','".$_GET['plot']."','".$_GET['remarks']."')")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." inserts new property.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {addproperties();},500);</script>	';
							}
							if($a==2){
							$result= mysql_query("update mainhouses set housetype='".$_GET['housetype']."',housevalue='".$_GET['value']."',housename='".$_GET['name']."',noofrooms='".$_GET['units']."',location='".$_GET['location']."',owner='".$_GET['owner']."',mobile='".$_GET['phone']."',postal='".$_GET['address']."',plot='".$_GET['plot']."',details='".$_GET['remarks']."' where houseid='".$hid."'")  or die (mysql_error());
							$resulta = mysql_query("insert into log values('','".$username." edits property.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {editproperties();},500);</script>	';
							}
							if($a==3){
							$result = mysql_query("DELETE from mainhouses where houseid='".$param."'");
							$resulta = mysql_query("insert into log values('','".$username." deletes property.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {editproperties();},500);</script>	';
							}
							if($result){
							$resultc = mysql_query("update company set Property='".$_GET['name']."',Plot='".$_GET['plot']."'");
							echo '<script>swal("Success!", "Property data updated!", "success");</script>';
							echo'<img src="img/tick.png" style="margin-top:0px;width:30px; height:30px">';
							}else{echo'<img src="img/delete.png" style="margin-top:0px;width:30px; height:30px">';
							echo '<script>swal("Error", "Property data not updated!", "error");</script>';
							}
							
							break;

							case 14:
							$a=$_GET['a'];
							$param=$rid=$_GET['b'];
							$roomno=$name=$_GET['roomno'];
							$hid=$_GET['property'];
							$rent=$_GET['rent'];

							$result =mysql_query("select * from mainhouses where houseid='".$hid."'");
                        	$row=mysql_fetch_array($result);
                            $hname=stripslashes($row['housename']);
                            $htype=stripslashes($row['housetype']);


							if($a==1){

							$result =mysql_query("select * from houses where houseid='".$hid."' and roomno='".$roomno."'");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)>0){
							echo '<script>swal("Error", "Unit with the same name already exists in the database!", "error");</script>';
							exit;
							}
							$question =mysql_query("SELECT * FROM houses order by rid desc limit 0,1");
							$ans=mysql_fetch_array($question);
							$rid=stripslashes($ans['rid'])+1;

							$result = mysql_query("insert into houses values('".$rid."','".$hid."','".$hname."','".$htype."','".$_GET['roomno']."','".$_GET['roomtype']."','".$_GET['location']."','','".date('d/m/Y')."','','','".$_GET['rent']."','".date('Ymd')."',0,'".$_GET['elecprev']."','".$_GET['waterprev']."','".$_GET['rescom']."','".$_GET['watermeter']."','".$_GET['elecmeter']."','".$_GET['floorspace']."','".$_GET['remarks']."')");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Creation','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." inserts new unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>$('#elecmeter').val('');$('#watermeter').val('');$('#elecprev').val('');$('#waterprev').val('');$('#roomno').val('');$('#rent').val('');$('#remarks').val('');</script>";
							}
							if($a==2){
							$result = mysql_query("update houses set houseid='".$hid."',housename='".$hname."',housetype='".$htype."',roomno='".$_GET['roomno']."',roomtype='".$_GET['roomtype']."',location='".$_GET['location']."',rent='".$_GET['rent']."',rescom='".$_GET['rescom']."',elecprevious='".$_GET['elecprev']."',waterprevious='".$_GET['waterprev']."',watermeter='".$_GET['watermeter']."',elecmeter='".$_GET['elecmeter']."',floorspace='".$_GET['floorspace']."',details='".$_GET['remarks']."' where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Information Editing','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." edits unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {editunits();},500);</script>	';
							}
							if($a==3){
							$result =mysql_query("select * from houses where rid='".$rid."' and status=0");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)==0){
							echo '<script>swal("Error", "Unit has to be empty first for deletion", "error");</script>';
							exit;
							}
							$result = mysql_query("DELETE from houses where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Unit Deletion','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							$resulta = mysql_query("insert into log values('','".$username." deletes unit.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<script>setTimeout(function() {editunits();},500);</script>	';
							}
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

							
							//get receipt number
							$result =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$invno=stripslashes($row['invno'])+1;
							$invtot=0;
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

								$resultb = mysql_query("select * from activities where id='".$actid."' limit 0,1");
								$rowb=mysql_fetch_array($resultb);
								$actlid=stripslashes($rowb['lid']);
								$actlname=stripslashes($rowb['lname']);

								//if penalty,rent or advertisement
								if($actid==1||$actid==4||$actid==11){
								$vat=round((($total/1.16)*0.16),2);
								}else {$vat=0;}


								//insert invoice
								if($fintot>=0){$desc=$actname.'-INVOICE FOR '.$month;}else{$desc=$actname.'-CREDIT NOTE:'.$month;}
								
								$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$total."','0','".$total."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
								

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
							$resulte = mysql_query("insert into receipts values('0','','".$invno."','".date('d/m/Y')."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$invtot."','','".$desc."','','".$nbal."','".date('Ymd')."','dr',1,2)");
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

							$tid=$_GET['tid'];
							$fintot=$_GET['fintot'];
							$lid=$_GET['pid'];
							$lname=$_GET['pname'];
							$refno=$_GET['refno'];
							$date=$_GET['date'];
							$time=date('h:i A');
							$stamp=stampreverse($date);
							$max=count($_SESSION['receive']);
							$smode='';

							checkaccdate($date);
							
							
							$resultc = mysql_query("select * from tenants where tid='".$tid."' order by id desc limit 0,1");
							$row=mysql_fetch_array($resultc);
							$prevbal=stripslashes($row['bal']);
							$bname=$names=$tname=stripslashes($row['bname']);
							$hid=stripslashes($row['hid']);
							$hname=stripslashes($row['hname']);
							$rid=stripslashes($row['rid']);
							$rno=stripslashes($row['roomno']);
							$newbal=$prevbal-$fintot;

							//get receipt number
							$result =mysql_query("select * from receipts where drcr='cr' order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							$rcptno=stripslashes($row['rcptno'])+1;

							

							

							//get receipt no and insert into journal

							$description='Bills Payment:'.$tname.'-'.$tid.'-Ref No:'.$refno;$refno=$refno;
							
							$string='';$totgoods=0;
							for ($i = 0; $i < $max; $i++){
									$itcode = $_SESSION['receive'][$i][0];
									$itname = $_SESSION['receive'][$i][1];
									$tamount = $_SESSION['receive'][$i][2];
									$paid = $_SESSION['receive'][$i][3];
									$invbal = $_SESSION['receive'][$i][4];
									$paying = $_SESSION['receive'][$i][5];
									$month = $_SESSION['receive'][$i][6];
									$tpaid=$paid+$paying;
									$invbal=$invbal-$paying;
									if($invbal<=0){$status=0;}else{$status=1;}

									if($paying!=0&&$paying!=''){
									$resultx = mysql_query("select * from invoices where id='".$itcode."' order by id desc limit 0,1");
									$rowx=mysql_fetch_array($resultx);
									$actid=stripslashes($rowx['actid']);
									$actname=stripslashes($rowx['actname']);

									$resulta = mysql_query("insert into receipt values('0','".$rcptno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$paying."','".$description."','".$date."','".$stamp."',1,'".$username."','".$refno."','".$lid."','".$lname."')");
									$resultb = mysql_query("update invoices set paid='".$tpaid."',invbal='".$invbal."',invstatus='".$status."' where id='".$itcode."'");	

									
									}//end if
								
								
							}//end for

							//insert into receipts
							$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','".$date."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$fintot."','".$lid."','".$description."','','".$newbal."','".$stamp."','cr',1,2)");
							$resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'");	
							

							//post journal entries
							$journalno=0;$cid=628;$did=$lid;$refno=$refno;$date=datereverse($date);
							$description='Bills Payment-'.$bname.'-'.$rno;
							postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$fintot,$description,$refno,$date,$username,$hid);


							if($resulte&&$resultg){
							unset($_SESSION['receive']);
							$resulta = mysql_query("insert into log values('0','".$username." Receives payment from Tenant.Receipt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<script>window.open('report.php?id=6&rcptno=".$rcptno."');</script>";	
							echo"<script>$('#totitems').val('');$('#fintot').val('');$('#paymode').val('');$('#refno').val('');$('#prevbal').val('');$('#tenant').val('').focus().prop('disabled',false);</script>";
							//echo"<script>setTimeout(function() {receipting();},500);</script>";
							echo '<script>swal("Success!", "Payment posted!", "success");</script>';
							exit;
							}
							else{
									echo '<script>swal("Error", "Payment not posted!", "error");</script>';
							}
									
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
					            $mon=getmonth(dateprint($date));

								$stype='dr';
								if($transtype=='Credit'){$tenfigure=$tenfigure*-1;}
								$nbal=$nbal+$tenfigure; 

								
								if($actid==1||$actid==4||$actid==11){
								$vat=round((($tenfigure/1.16)*0.16),2);
								}else {$vat=0;}
								
								
								$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
								$rowx=mysql_fetch_array($resultx);
								$invno=stripslashes($rowx['invno'])+1;

								//insert invoice
								$resulte = mysql_query("insert into receipts values('0','','".$invno."','".dateprint($date)."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$tenfigure."','','".$desc."','','".$nbal."','".$stamp."','dr',1,2)");
								$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','1','Rent','".$tenfigure."','".$tenfigure."','0','0','".$desc."','".dateprint($date)."','".$stamp."',1,'".$username."','".$vat."')");
								$resultg = mysql_query("update tenants set bal='".$nbal."' where tid='".$tid."'");	


								

								
								/*
								if($vat!=0){
									//into ledger entries
									$resulta = mysql_query("select * from ledgers where ledgerid=614");
									$row=mysql_fetch_array($resulta);
									$vbal=stripslashes($row['bal']);
									$vid=stripslashes($row['ledgerid']);
									$vname=stripslashes($row['name']);

									$vbal=$vbal+$vat; 

									if($vat<0){$vtype='Debit';}else{$vtype='Credit';}
									$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$vtype."','".$vid."','".$vname."','".abs($vat)."','".$desc."','".$refno."','".$vbal."','".$date."','".$stamp."',1,'0')");	
									$resultc = mysql_query("update ledgers set bal='".$vbal."' where ledgerid=".$vid."");
								}

								*/
								
								
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

							//into ledger entries
							$resultb = mysql_query("insert into ledgerentries values('0','".$rcptno."','".$transtype."','".$lid."','".$lname."','".$amount."','".$desc."','".$refno."','".$bal."','".$date."','".$stamp."',1,'0')");	
							$resultc = mysql_query("update ledgers set bal='".$bal."' where ledgerid=".$lid."");

								
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
							$subcat=$_GET['subcat'];

							$resulta =mysql_query("select * from ledgersubcategories  where name='".$subcat."' limit 0,1");
							$rowa=mysql_fetch_array($resulta);
							$type=stripslashes($rowa['type']);



							$result = mysql_query("update ledgers set type='".$type."',name='".$_GET['name']."',subcat='".$_GET['subcat']."',code='".$_GET['ledgercode']."',status=1 where ledgerid='".$code."'");	
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
							$cur='ksh';

							$resulta =mysql_query("select * from ledgersubcategories  where id='".$cat."' limit 0,1");
							$rowa=mysql_fetch_array($resulta);
							$subcat=stripslashes($rowa['name']);
							$type=stripslashes($rowa['type']);


							$resultb = mysql_query("select * from ledgers where subcat='".$subcat."' order by code desc");
							$rowb=mysql_fetch_array($resultb);
							$code=stripslashes($rowb['code'])+1;
							



							$result= mysql_query("insert into ledgers values('0','".$lid."','".$ledger."','".$type."',0,1,'','111','Other','0','".$cur."',0,'".$code."','".$subcat."')");
							$resulta = mysql_query("insert into log values('0','".$username." inserts data into ledgers database.Ledger name:".$_GET['ledger']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
							if($result){
									echo'<img src="img/tick.png" style="width:30px; height:30px">';
									//into session
									$item=$lid.'-'.$ledger;
									$max=count($_SESSION['ledgers']);
									$_SESSION['ledgers'][$max]=$item;
									//echo"<script>setTimeout(function() {ledgers();},500);</script>";
									}
									else{
										echo'<img src="img/delete.png" style="width:30px; height:30px">';
										}
							
							break;		
							case 28:
							$code=$_GET['code'];
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
								

								$journalno=0;$cid=$lid;$did=$eid;$refno=$refno;$date=date('Y/m/d');
								$description=$desc.'-Ref No:'.$refno;
								postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);


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
									echo'<img src="images/delete.png" width="30px" height="30px"/>';
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
							$fixed=$_GET['fixed'];
							$amount=$_GET['sum'];
							
							
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
							$balb=$balb+$amount;

							//$vat=round((($amount/1.16)*0.16),2);
							$vat=0;
							
							$resulta = mysql_query("insert into receipts values('','','".$invno."','".$date."','".$mon."','".$tid."','".$tname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$balb."','".$stamp."','dr',1,3)");
							$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','2','Water','".$amount."','0','".$amount."','1','".$desc."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."','".$vat."')");
							$resultz = mysql_query("update tenants set bal='".$balb."' where tid='".$tid."'");	
									
							$resulty = mysql_query("insert into waterinvoices values('','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','".$_GET['dateread']."','".$_GET['mtrno']."','".$_GET['wp']."','".$_GET['wc']."','".$_GET['wd']."','".$_GET['water']."','".$_GET['sewer']."','".$_GET['fixed']."','".$amount."','".$date."','".$stamp."',1,'".$username."')");
							$resultg = mysql_query("update houses set waterprevious='".$_GET['wc']."' where rid='".$rid."'");

							//update ledgers
							$journalno=0;$cid=671;$did=628;$refno=$hid;$date=date('Y/m/d');
							$description='Water Billing-'.$hname.'-'.$desc;
							postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);


							
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

							
							$resulta = mysql_query("insert into receipts values('','','".$invno."','".$date."','".$mon."','".$tid."','".$tname."','".$hid."','".$hname."','".$rid."','".$rno."','".$amount."','','".$desc."','','".$balb."','".$stamp."','dr',1,4)");
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
							$resultx =mysql_query("select * from tenants where tid=".$userid."");
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
								$result = mysql_query("update tenants set password='".$pass."' where tid=".$userid."");
							
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
							
							
							$resultc = mysql_query("update company set CompanyName='".$cname."',Tel='".$tel."',Address='".$add."',Website='".$web."',Email='".$email."',Description='".$loc."',Motto='".$motto."',Pin='".$pin."',EtrNo='".$etrno."'");
							
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
							$pass=sha1($pass);
							
							$resultc = mysql_query("select * from users where name='".$name."'");
							if(mysql_num_rows($resultc)>0){
								echo '<script>swal("Error", "User name already exists!", "error");</script>';
									exit;
							}
					
							
							$result = mysql_query("insert into users values('0','".$user."','".$pos."','','".$pass."','".$dept."','".$name."','".$branch."')") or die (mysql_error());		
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

							$rec=$_GET['rec'];

							if($rec==1){
							$result = mysql_query("update users set password = sha1('password') where userid='".$user."'")  or die (mysql_error());
							}
							
							
							$result = mysql_query("update users set position='".$pos."',dept='".$dept."',fullname='".$fname."',branch='".$branch."' where userid='".$user."'");
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
							$result = mysql_query("DELETE from users where userid='".$code."'");
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
							$resulta = mysql_query("insert into log values('0','".$username." updates user rights .User Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
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
							$result = mysql_query("insert into ".$cat." values('0','".$name."')");	
					
							if($result){
							$resulta = mysql_query("insert into log values('0','".$username." inserts a new data into ".$cat." table.name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo'<script>setTimeout(function() {variables();},500);</script>';	
							echo '<script>swal("Success!", "Variable Created!", "success");</script>';
							}
							else {
								echo"<img src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
								echo '<script>swal("Error", "Variable not Created!", "error");</script>';
							}
							
							break;
							case 45:
							$vname=$_GET['vname'];
							$sysvar=$_GET['sysvar'];
							$bid=$_GET['bid'];
							
							$result = mysql_query("update ".$sysvar." set name='".$vname."' where id='".$bid."'");		
					
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
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Rent for Month of '.$mon.'. Thank you for your partneship.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


								//into email

								foreach ($emailarr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Rent for Month of '.$mon.'. Thank you for your partneship.';
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
	                          echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
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
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partneship.';
									if(strlen($val)>5){
									$resulte = mysql_query("insert into notices values('0','Invoice','".$message."','".$bname."','".$val."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
									}

								}


								//into email

								foreach ($emailarr as $key => $val) {
									$message='Hello '.$bname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).' being Late Rent Payment Penalty for Month of '.$mon.'. Thank you for your partneship.';
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
	                          echo"<script>window.open('invoice.php?id=1&invno=".$refno."');</script>";
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

							$resulta = mysql_query("insert into events values('0','".$name."','".date('d/m/Y')."','".date('h:i A')."','".date('YmdHi')."','".date('Ymd')."','".$s1."','".$s2.$s3."','".$startstamp."','".$s5."','".$s6.$s7."','".$endstamp."','".$username."','1')");
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
								,escalation='".$escper."',escalation_breakdown='".$escalation."',escalation_type='".$escint."',utildep='".$utildep."',servicecharge='".$servicecharge."',depmonths='".$depmonths."',depamount='".$totdep."',unitusage='".$usage."',fitout='".$fitperiod."',lawyer='".$lawyer."',chequeamount='".$deppayabletot."',payment_breakdown='".$payment."' WHERE id='".$lof."'")    or die (mysql_error());
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

        				
							case 63:

							$bname=$_GET['bname'];
							$address=$_GET['address'];
							$phone=$_GET['phone'];
							$email=$_GET['email'];
							$dname=$_GET['dname'];
							$dphone=$_GET['dphone'];
							$pin=$_GET['pin'];
							$rid=$unit=$_GET['unit'];
							$btype=$_GET['btype'];
							$years=$_GET['years'];
					        $mons=$_GET['months'];
							$payabledate=$_GET['payabledate'];
							$commencedate=$date=$_GET['commencedate'];
							$commstamp=stampreverse($commencedate);
							$escper=$_GET['escper'];
					        $escint=$_GET['escint'];
					        $escalation='';
					        $leasetam=$years*12+$mons;
					        $monvar=12*$escint;
					        $fitperiod=0;

							//deposit
							$depayable=$_GET['depayable'];
							$depaid=$_GET['depaid'];
							$debal=$_GET['debal'];


							$resultx =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$hid=stripslashes($rowx['houseid']);
							$hname=stripslashes($rowx['housename']);
							$rno=$roomno=stripslashes($rowx['roomno']);
							$rent=$monrent=stripslashes($rowx['rent']);

							$payable_expiry=substr($commstamp,0,6).$payabledate;
							$mon=substr($payable_expiry,4,2).'_'.substr($payable_expiry,0,4);


							//escalations
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

							

					        $resulty = mysql_query("select * from tenants order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$tid=stripslashes($rowy['tid'])+1;

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

							//lease stamp-30days
							//handover stamp-30days

							$tstamp=date('Ymd');
							$s = new DateTime($tstamp);
							$s->modify('+1month');
							$deposit_stamp_expiry=$lease_stamp_expiry= $handover_stamp_expiry=$s->format('Ymd');
							$contract_expiry_stamp=$finalend;

							//penalty variablescase
							$penpercent=10;
							$pendate=10;
							$penstatus=1;

							
							$resultc = mysql_query("INSERT INTO tenants (id, tid, lof, bname, address, phone, email, dname, dphone, date, stamp, status, rid, roomno, hid, hname, monrent, payable_expiry, contract_expiry_stamp, billing_type, escalation_type, invoice_expiry_stamp, total_deposit, paid_deposit, bal_deposit, deposit_status, escalation_expiry_stamp, lease_stamp_expiry, handover_stamp_expiry, deposit_stamp_expiry, penpercent, pendate, penstatus, penmonth, penwaivermonth) VALUES ('0','".$tid."','0','".$bname."','".$address."','".$phone."','".$email."','".$dname."','".$dphone."','".date('d/m/Y')."','".date('Ymd')."',1,'".$rid."','".$roomno."','".$hid."','".$hname."','".$monrent."','".$payable_expiry."','".$finalend."','".$btype."','".$escint."','".$payable_expiry."','".$depayable."','".$depaid."','".$debal."',0,'".$escalation_expiry_stamp."','".$lease_stamp_expiry."','".$handover_stamp_expiry."','".$deposit_stamp_expiry."','".$penpercent."','".$pendate."','".$penstatus."',0,0)");
							$resulth = mysql_query("update houses set tenant='".$bname."',tenantid='".$tid."',status=1 where rid='".$rid."'");
							$resultx = mysql_query("insert into housetrack values('','".$rid."','".$roomno."','".$hid."','".$hname."','Tenant Checkin','".$rent."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')");
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." creates new tenant.tenant name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Tenant created!", "success");</script>';
							//into session
							$item=$tid.'-'.$bname.'-'.$roomno;
							$max=count($_SESSION['tenants']);
							$_SESSION['tenants'][$max]=$item;
							//echo"<script>setTimeout(function() {newtenant();},500);</script>";	
							}
							else{
								echo '<script>swal("Error", "Tenant not created!", "error");</script>';
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

							$resulty = mysql_query("select * from tenants order by id desc limit 0,1");
							$rowy=mysql_fetch_array($resulty);
							$tid=stripslashes($rowy['tid'])+1;

							$resultc = mysql_query("INSERT INTO tenants (id, tid, bname, address, phone, email, dname, dphone, details, date, stamp, status, activation) VALUES ('0','".$tid."','".$bname."','".$address."','".$phone."','".$email."','".$dname."','".$dphone."','".$details."','".date('d/m/Y')."','".date('Ymd')."',1,1)");
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." assigns open space to name:".$bname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultc){
							echo '<script>swal("Success!", "Activation Record saved!", "success");</script>';
							echo"<script>setTimeout(function() {activations();},500);</script>";	
							//into session
							$item=$tid.'-'.$bname.'-'.$roomno;
							$max=count($_SESSION['tenants']);
							$_SESSION['tenants'][$max]=$item;
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
							$amount=3;
							$pointsbal+=$amount;//5 points

							$resulte = mysql_query("insert into pointstrack values('','".$userid."','".$username."','".$fullname."','CME','Points awarded for CME titled ".$title."','".$amount."','".$pointsbal."','".date('d/m/Y')."','".date('Ymd')."',1)");
							$resultg = mysql_query("update tenants set pointsbal='".$pointsbal."' where tid='".$userid."'");	
						
							
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
							$resultg = mysql_query("update tenants set pointsbal='".$pointsbal."' where tid='".$userid."'");	
						
							
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

							case 117:

							$tid=$param=$_GET['param'];
							$address=$_GET['address'];
							$phone=$_GET['phone'];
							$email=$_GET['email'];
							
							$pin=$_GET['pin'];
							$idno=$_GET['idno'];
							$eyear=$_GET['eyear'];
							
							$currfacility=$_GET['currfacility'];
							$county=$_GET['county'];
							$subcounty=$_GET['subcounty'];

							$gname=$_GET['gname'];
							$grship=$_GET['grship'];
							$gphone=$_GET['gphone'];
							




							//escalations
							$next=date('Y-m-d', strtotime('+1 month')) ;
							$next=preg_replace('~-~', '', $next);


							
					       	$resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
							$rowx=mysql_fetch_array($resultx);
							$rid=stripslashes($rowx['rid']);
							$oldroomno=stripslashes($rowx['roomno']);
							$lof=stripslashes($rowx['lof']);

							$resultg = mysql_query("update tenants set address='".$address."',phone='".$phone."',idno='".$idno."',pin='".$pin."',email='".$email."',county='".$county."',subcounty='".$subcounty."',currfacility='".$currfacility."',gname='".$gname."',gphone='".$gphone."',grship='".$grship."',eyear='".$eyear."',idno='".$idno."'  where tid='".$tid."'")    or die (mysql_error());
							
							//register log
							$resulta = mysql_query("insert into log values('0','".$username." updates  member profile.Member id:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							if($resultg){
							echo '<script>swal("Success!", "Member Info Saved!", "success");</script>';
							}
							else{
								echo '<script>swal("Error", "Member Info not Saved!", "error");</script>';
							}


							break;






							
								

							
							


								




	
	
	




		}