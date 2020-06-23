<?php //include('db_fns.php');
ini_set('max_execution_time', 0);




$_POST= json_decode(file_get_contents('php://input'), true);
$tid=$refno=$_POST['BillRefNumber'];
$amount=$_POST['TransAmount'];
$transid=$_POST['TransID'];
$shortcode=$_POST['BusinessShortCode'];
$database='';
if($shortcode=='529052'){$database='mwanzop';}else if($shortcode=='939260'){$database='mwanzom';}



$db = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
mysql_select_db($database,$db);

/*

$tid=$refno='1001164';
$amount=3000;
$transid='LCGERTE769H';
*/

$resulta = mysql_query("insert into smsin values('0','".$refno."')");

$totalpay=$amount=preg_replace('~,~', '', $amount);
$date=date('d/m/Y');
$stamp=date('Ymd');
$username='SYSTEM';
$lid=697;
$lname='Lipa na M-PESA';


$result =mysql_query("select * from tenants where tid='".$refno."'");
if(mysql_num_rows($result)==0){
echo 'Invalid Customer Number';
}
else{

	$row=mysql_fetch_array($result);
	$prevbal=stripslashes($row['bal']);
	$bname=$names=$tname=stripslashes($row['bname']);
	$hid=stripslashes($row['hid']);
	$hname=stripslashes($row['hname']);
	$rid=stripslashes($row['rid']);
	$rno=stripslashes($row['roomno']);
	$phone=stripslashes($row['phone']);
	$pendate=stripslashes($row['pendate']);
	$prevbal=stripslashes($row['bal']);

	$description='Bills Payment via M-PESA Paybill:'.$tname.'-'.$tid.'-Ref No:'.$transid;$refno=$transid;
							

	  $rcptno=mysql_result(mysql_query("SELECT MAX(rcptno) from rcptnos"),0) + 1;
	  $question = mysql_query("insert into rcptnos values('".$rcptno."')");

	  $tot=0;
	  $resulty =mysql_query("select * from invoices where tid='".$tid."' and  invbal>0 order by  id asc, actid asc");
	  $num_resultsy = mysql_num_rows($resulty);
	    for ($i=0; $i <$num_resultsy; $i++) {
	    $rowy=mysql_fetch_array($resulty);
	    $invbal=stripslashes($rowy['invbal']);
	    $actid=stripslashes($rowy['actid']);
		$actname=stripslashes($rowy['actname']);
		$itcode=stripslashes($rowy['id']);
		$month=stripslashes($rowy['mon']);
		$paid=stripslashes($rowy['paid']);

	    if($amount>=$invbal){$paying=$invbal;$amount=$amount-$invbal;}else{$paying=$amount;$amount=0;}
		if($paying>0){
		 $tot+=$paying;
		 $tpaid=$paid+$paying;
		 $invbal=$invbal-$paying;
		 if($invbal<=0){$status=0;}else{$status=1;}


		 $resulta = mysql_query("insert into receipt values('0','".$rcptno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$month."','".$actid."','".$actname."','".$paying."','".$description."','".$date."','".$stamp."',1,'".$username."','".$refno."','".$lid."','".$lname."','".$itcode."','".date('Ymd')."')");
		  $resultb = mysql_query("update invoices set paid='".$tpaid."',invbal='".$invbal."',invstatus='".$status."' where id='".$itcode."'");


		
		 }
	 
	    }//end invoices loop

	   if($amount>0){

	   	//post directly to receipts

	   	$mon=$month=date('m_Y');
	   	$tenfigure=$amount*-1;

	   	$resultx =mysql_query("select * from receipts where drcr='dr' order by serial desc limit 0,1");
		$rowx=mysql_fetch_array($resultx);
		$invno=stripslashes($rowx['invno'])+1;

	   	$resultf = mysql_query("insert into invoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$bname."','".$mon."','10','Bal B/F','0','".$amount."','".$tenfigure."','1','Overpayment','".$date."','".$stamp."',1,'".$username."','0')");

	   	$resulte = mysql_query("insert into receipts values('0','','".$invno."','','','".$date."','".$mon."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','0','','Overpayment','','".$prevbal."','".$stamp."','dr',1,2,'".$username."','".date('Ymd')."')");

	    }



	   //insert into receipts
		$newbal=$prevbal-$totalpay;
		$resulte = mysql_query("insert into receipts values('0','".$rcptno."','','','','".$date."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$totalpay."','".$lid."','".$description."','','".$newbal."','".$stamp."','cr',1,2,'".$username."','".date('Ymd')."')");
		$resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'");	
		

		//post journal entries
		$journalno=0;$cid=628;$did=$lid;$refno=$refno;$date=datereverse($date);
		$description='Bills Payment via M-PESA-'.$bname.'-'.$rno;
		postjournal($journalno,$cid,'Credit','Minus',$did,'Debit','Add',$totalpay,$description,$refno,$date,$username,$hid);

}

?>