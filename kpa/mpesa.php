<?php include('db_fns.php');
include('functions.php');


$memberno=$_GET['AccountReference'];
$phone=$_GET['PhoneNumber'];
$time=$_GET['TransTime'];
$amount=$_GET['Amount'];
$amount=preg_replace('~,~', '', $amount);
$refno=$_GET['MpesaReceiptNumber'];
$paybill=$_GET['PayBillNumber'];
$odetail=$_GET['TransactionDesc'].'Time:'.$time.'Phone:'.$phone.'Ref No:'.$refno;

$result =mysql_query("select * from customers where cusno='".$memberno."'");
if(mysql_num_rows($result)==0){
echo 0;
}else{



$result =mysql_query("select * from accounts where member1='".$memberno."' and accode=101");
$row=mysql_fetch_array($result);  
$bcode=stripslashes($row['branchcode']);
$crbal=stripslashes($row['crbal']);
$acname=stripslashes($row['acname']);
$accode=stripslashes($row['accode']);
$acno=stripslashes($row['acno']);

              $unibcode='001';
              $username='SYSTEM';
              $depledger=$depcat=690;
              
              $result =mysql_query("select * from ledgers  where branchcode='".$unibcode."' and ledgerid='".$depledger."' and currency='ksh'");
              $num_results = mysql_num_rows($result);
              $row=mysql_fetch_array($result);
              $cashacc=stripslashes($row['ledgerid']);
              $cashname=stripslashes($row['name']);
              $cashbal=stripslashes($row['bal']);
              
              
              $ncrbal=$crbal+$amount;
              $ncashbal=$cashbal+$amount;
              
              //get receipt no and insert into transactions
              $question =mysql_query("SELECT * FROM transactions order by id desc limit 0,1");
              $ans=mysql_fetch_array($question);
              $rcptno=stripslashes($ans['rcptno'])+1;
              
              
              //insert into transactions
              $resulta = mysql_query("insert into transactions values('0','".$rcptno."','cr','Normal Deposit via - ".$cashname."','','".$acno."','".$acname."','".$accode."','".$unibcode."','".$amount."','".$refno."','".$odetail."','".$ncrbal."','".$ncashbal."','".$y_m_d."','".date('h:i a')."','".$ymd."','".$username."','','1','".$depcat."')"); 
              
              //update ledgers
              //post journal entries
              $journalno=0;$cid=getacledger($acno);$did=$cashacc;$refno=$acno;$date=$y_m_d;
              $description='Cash Deposit-'.$acname.'-'.$acno;
              postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,$unibcode);

              //insert into account track
              $resultp = mysql_query("insert into acctrack values('0','".$acno."','".$acname."','".$bcode."','CASH DEPOSIT','".$amount."','','".$ncrbal."','','".$y_m_d."','".$ymd."','".$username."','1','1','dr')");  
              if($accode==102){
              $resultp = mysql_query("insert into maintrack values('0','SHARES','".$acno."','".$acname."','CONTRIBUTION','".$amount."','".$ncrbal."','".$y_m_d."','".$ymd."','".$ymd."0000','1')"); 
              }
              
              $resulty = mysql_query("update accounts set crbal='".$ncrbal."' where acno='".$acno."'");


              echo 1;



}

?>