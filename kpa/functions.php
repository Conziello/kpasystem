<?php
date_default_timezone_set('Africa/Nairobi'); 
function getcurlink($key){
    return $key.'-'.$_SESSION['links'][$key];
}

function getprevlink($key){
   
   
        $current_key=$key;
        $array=$_SESSION['links'];


        if (isset($array[$current_key+1])) 
        {
          // get the next item if there is 
          $array_next = $array[$current_key+1];$keyy=$current_key+1;
        } 
        else 
        {       
           // if not take the first (this means this is the end of the array)
          $array_next = $array[0];$keyy=0;
        }       

        if (isset($array[$current_key-1])) 
        {
           // get the previous item if there is
           $array_prev = $array[$current_key-1]; $keyy=$current_key-1;
        } 
        else 
        {   
          // if not take the last item (this means this is the beginning of the array)
          $array_prev = $array[count($array)-1];   $keyy=count($array)-1;     
        }
   
   return $keyy.'-'.$array_prev;
    
}




 function generateRandomString($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}




function postloanded($row,$username){

    $bcode=$unibcode='001';
    $transdate=date('Y/m/d');
    $transstamp=date('Ymd');
    $transmon=date('Ym');


    $stampexp=stripslashes($row['stamp_expiry']);
    $fmonth_pay=$month_pay=stripslashes($row['month_pay']);
    $acno=stripslashes($row['acno']);
    $accode=0;
    $loanacno=stripslashes($row['loanacno']);
    $oldlbal=$loanbal=stripslashes($row['loanbal']);
    $repay=stripslashes($row['repayment_period']);
    $totint=stripslashes($row['total_interest']);
    $rem_month=stripslashes($row['rem_months']);
    $int_rate=stripslashes($row['int_rate']);
    $arrears=stripslashes($row['arrears']);
    $arrstatus=stripslashes($row['arrears_status']);
    $intmode=stripslashes($row['intmode']);
    $arr_int=0;

     if($loanbal<$month_pay){$month_pay=$loanbal;}

    



      
    $month_pay=round($month_pay,2);
    $monint=0;
    $monloan=$month_pay;

    $resultx =mysql_query("select * from mainhouses where houseid='".$acno."'");
    $rowx=mysql_fetch_array($resultx);  
    $crbal=stripslashes($rowx['bal']);
    $acname=stripslashes($rowx['housename']);
    $acloanbal=0;
    

    //look for next month's date
    $expstatus=$transmon;
    $tstamp=$stampexp;
    $s = new DateTime($tstamp);
    //$td=substr($tstamp,6,2);
    //if($td>28){$s->modify('last day of next month');}
    //else{$s->modify('+1month');}
    $s->modify('+1month');
    $expstamp= $s->format('Ymd');

    $rem_month--;

    //add loan bal and credit balance
    
    $ncrbal=$crbal-$month_pay;
    $nloanbal=$loanbal-$monloan;
    $nacloanbal=$acloanbal-$monloan;
    
    
    //insert into account track
    //$resultp = mysql_query("insert into acctrack values('0','".$acno."','".$acname."','MONTHLY LOAN REPAYMENT-LOAN A/C NO:".$loanacno."','".$month_pay."','','".$ncrbal."','','".$transdate."','".$transstamp."','".$username."','1','1','cr')");  
    $resultp = mysql_query("insert into maintrack values('0','LOAN','".$loanacno."','".$acname."','LOAN REPAYMENT','".$monloan."','".$nloanbal."','".$transdate."','".$transstamp."','".$transstamp."0000','1')");   
    $resultp = mysql_query("insert into loantrack values('0','".$loanacno."','".$acname."','".$bcode."','MONTHLY LOAN REPAYMENT-LOAN A/C NO:".$loanacno."','".$monloan."','','".$nloanbal."','','".$transdate."','".$transstamp."','".$username."','1','cr')"); 
        

    //$resulty = mysql_query("update accounts set bal='".$ncrbal."',loanbal='".$nacloanbal."' where acno='".$acno."'");
    $resultz = mysql_query("update loanaccounts set loanbal='".$nloanbal."',rem_months='".$rem_month."',stamp_expiry='".$expstamp."',expiry_status='".$expstatus."',month_pay='".$month_pay."'  where loanacno='".$loanacno."'");

    if($nloanbal<1){
    //close loan account
    $resultz = mysql_query("update loanaccounts set status=3  where loanacno='".$loanacno."'");

    }
    //update income database-Monthly Loan Interest
    if($monint>0){
    $resultx = mysql_query("insert into income values('0','1','Monthly Loan Interest','','".$acno."','".$acname."','".$monint."','".$transdate."','".$transstamp."','".$username."','".$username."',1,'".$unibcode."')");
    }
    
                                
}


function gettenantbalance($tid){


$result =mysql_query("select * from receipts where tid='".$tid."' order by stamp asc");
$num_results = mysql_num_rows($result);
$bal=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
  if(stripslashes($row['drcr'])=='dr'||stripslashes($row['drcr'])=='rf'){
    $bal+=preg_replace('~,~', '', stripslashes($row['amount']));
  }else{
    $bal-=preg_replace('~,~', '', stripslashes($row['amount']));
  }
}

$resultg = mysql_query("update tenants set bal='".$bal."' where tid='".$tid."'");
return $bal;



}

function checkinvoiceexists($key){

    $xx=0;
    $max=count($_SESSION['receive']);
    for ($i = 0; $i < $max; $i++){

        $itcode = $_SESSION['receive'][$i][0];
        $paying = $_SESSION['receive'][$i][5];
        if($itcode==$key&&$paying!=''&&$paying!=0){
            $xx=1;
        }

    }
    return $xx;

}
function postautocreditnote($invid,$date,$username){


                            
                            $resultc = mysql_query("select * from invoices where id='".$invid."'  limit 0,1");
                            $row=mysql_fetch_array($resultc);
                            $tid=stripslashes($row['tid']);
                            $invoiceno=stripslashes($row['invno']);
                            $fintot=stripslashes($row['invamount']);
                            $refno='';
                            $time=date('h:i A');
                            $journaldate=datereverse($date);
                            $stamp=stampreverse($date);
                            $smode='';
                            $invamount=stripslashes($row['invamount']);
                            $paid=stripslashes($row['paid']);
                            $invbal=stripslashes($row['invbal']);
                            $credamount=$invamount;
                            $itcode=$invid;
                            $month=stripslashes($row['mon']);
                            $actname=$itname=stripslashes($row['actname']);
                            $actid=stripslashes($row['actid']);

                            $resultc = mysql_query("select * from receipts where invno='".$invoiceno."'  limit 0,1");
                            $row=mysql_fetch_array($resultc);
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
                            $refno=$credno=stripslashes($row['credno'])+1;

                            

                            

                            //get receipt no and insert into journal

                                    $details=$description='Credit Note:'.$tname.'-'.$tid.'-Details:'.$refno;$refno=$refno;
                                    
                                    $string='';$totgoods=0;$credtotal=0;
                            
                                    $invamount=$invamount-$credamount;
                                    $invbal=$invbal-$credamount;
                                    if($invbal<=0){$status=0;}else{$status=1;}

                                   
                                

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

                              
                                
                                
                     

                            //insert into receipts
                            $newbal=$prevbal-$credtotal;
                            $totamount=$totamount-$credtotal;
                            $resulte = mysql_query("insert into receipts values('0','','','".$credno."','','".$date."','".$month."','".$tid."','".$bname."','".$hid."','".$hname."','".$rid."','".$rno."','".$credtotal."','','".$details."','','".$newbal."','".$stamp."','cn',1,2,'".$username."','".date('Ymd')."')");
                            $resultg = mysql_query("update tenants set bal='".$newbal."' where tid='".$tid."'"); 
                            //$resulth = mysql_query("update receipts set amount='".$totamount."' where invno='".$invoiceno."'"); 
                            


}


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

    updateledgerbalance($ledger1, $date, $stamp, $action1, $amount);
    updateledgerbalance($ledger2, $date, $stamp, $action2, $amount);

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
    $threemon->modify('+1year');
    $threemon=$threemon->format('Ymd'); 

    $tstamp=date('Ymd');
    if($tstamp>$threemon){

        //echo '<script>swal("Error", "The date entered has been locked out of the current accounting period!", "error");</script>';
        //exit;
    }

}

function updateledgerbalance($lid, $date, $stamp, $txtype, $txamount){
                    $resultcx =mysql_query("select * from ledgerbalances where ledgerid='".$lid."' and stamp = '".$stamp."' limit 0,1");
                    if(mysql_num_rows($resultcx)==0){
                        $res = mysql_query("INSERT INTO ledgerbalances VALUES ('0', '".$date."', '".$stamp."', '".$lid."', '0', '0', '0', 0.00)");
                        $resultcx = mysql_query("select * from ledgerbalances where ledgerid='".$lid."' and stamp = '".$stamp."' limit 0,1");
                    }

                    $rowcx=mysql_fetch_array($resultcx);
                    $drbal=stripslashes($rowcx['debit']);
                    $crbal=stripslashes($rowcx['credit']);

                   
                   if ($txtype == 'Credit'){
                        $crbal += $txamount;
                        $resultn = mysql_query("update ledgerbalances set credit='".$crbal."' where ledgerid='".$lid."' and stamp = '".$stamp."'");
                    } else { //Debit
                        $drbal += $txamount;
                        $resultn = mysql_query("update ledgerbalances set debit='".$drbal."' where ledgerid='".$lid."' and stamp = '".$stamp."'");
                    }

                    
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

function getdailyvalue(){
 $resulta =mysql_query("select * from backup where date='".date('d/m/Y')."' limit 0,1");
 $num_resultsa = mysql_num_rows($resulta);
 return $num_resultsa;
}


function dateprint($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function clean($string){
	$string=str_replace('', '', $string);
	$string=str_replace('-', '', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
function stampreverse($date){
$a=substr($date,0,2);
$b=substr($date,3,2);
$c=substr($date,6,4);
$d=$c.$b.$a;
return $d;	
}

function datereverse($date){
$a=substr($date,0,2);
$b=substr($date,3,2);
$c=substr($date,6,4);
$d=$c.'/'.$b.'/'.$a;
return $d;  
}

function getmonth($date){
$a=substr($date,0,2);
$b=substr($date,3,2);
$c=substr($date,6,4);
$d=$b.'_'.$c;
return $d;	
}

function getletmon($no){
$monthNum = $no;
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
return substr($monthName,0,3);
}

function stamptodate($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function timeconvert($y,$x){
	$x=preg_replace('~:~', '', $x);
	$y=preg_replace('~:~', '', $y);
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($y, 2, 2);
	
	
	if($a>$b){
		$b=$b+24;
		$y=$b.$c;
	}
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($x, 2, 2);
	$d=substr($y, 2, 2);
	
	$e=$b-$a;
	$f=$e * 60;
	$g=$d-$c;
	
	$h=$f+$g;
	return $h;
}

function addmonths($start,$a){
      
      $start=substr($start,0,4).''.substr($start,4,2).''.substr($start,6,2);
      $s = new DateTime($start);
      $s->modify('+'.$a.'month');
      $start= $s->format('Ymd');
      return $start;

}

function getdiffmonths($d1,$d2){

    $date1 = substr($d1,0,4).'-'.substr($d1,4,2).'-'.substr($d1,6,2);
    $date2 = substr($d2,0,4).'-'.substr($d2,4,2).'-'.substr($d2,6,2);

    $ts1 = strtotime($date1);
    $ts2 = strtotime($date2);

    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);

    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
    return $diff;
}


function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789~!@#$%^&*()_+<>?:*/-";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
function backtime($time){
if(strlen($time)==7){$time='0'.$time;}
$a=substr($time,0,2);
$b=substr($time,3,2);   
$c=substr($time,6,2);
if($c=='AM'){
$time=$a.$b;
}else{
$a=$a+12;
$time=$a.$b;
}
if($time>=2400){$time-=1200;}
return $time;
}

function backtime2($time){
if(strlen($time)==6){$time='0'.$time;}
$a=substr($time,0,2);
$b=substr($time,3,2);   
$c=substr($time,5,2);
if($c=='AM'){
$time=$a.$b;
}else{
$a=$a+12;
$time=$a.$b;
}
if($time>=2400){$time-=1200;}
return $time;
}

function convtomonth($monthNum){

     $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
    return $monthName;
}

function sendsms($message,$phone){

$message=preg_replace('~ ~', '+', $message);
$phone=preg_replace('~ ~', '', $phone);

$url="http://apis.sematime.com/v1/68cd1891c4be453595764e04b85ad42f/messages/single.url?text=".$message."&recipients=".$phone."&AuthToken=71a4e51b928f4071a2ceab9a09869734";
$json=file_get_contents($url);
$data=json_decode($json,true);

 $failed=$data['failed'];
 return $failed;


}

function updatetenants(){

$tenants='';
$resulta =mysql_query("select * from tenants where status=1");
$num_resultsa = mysql_num_rows($resulta); 
for ($i=0; $i <$num_resultsa; $i++) {
$row=mysql_fetch_array($resulta);
$item=stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['kpano']);
$tenants.='"'.$item.'",';
}
$len=strlen($tenants);
$a=$len-1;
$tenants=substr($tenants,0,$a);
$_SESSION['tenants']=$tenants;

}

function getprofileimage($tid){

$img='img/user.png';
$resulta =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
$row=mysql_fetch_array($resulta);
$profile=stripslashes($row['profile']);

if($profile==''){$profile=$img;}
else{
      //$profile="../".$profile;
}
return $profile;

}


function getordertype($type){
    $order=0;
    switch($type){
        case 'Revenue':
        $order=1;
        break;
        case 'Expense':
        $order=2;
        break;
        case 'Asset':
        $order=3;
        break;
        case 'Liability':
        $order=4;
        break;
        case 'Equity':
        $order=5;
        break;
    }

    return $order;
}

function getledgerbreakdown($param,$sent,$level,$d1,$d2){
$pos=$_SESSION['mainpos'];
$max=count($pos);
$a=0;$b=0;

for ($i = 1; $i < $max; $i++){
    $lid=$pos[$i][0];
    $type=$pos[$i][1];
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    $catid=$pos[$i][5];

    if($type=='Expense'||$type=='Asset'){
      $bal = $drbal-$crbal;
      $a+=$bal;
    }
    if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
      $bal = $crbal-$drbal;
      $b+=$bal;
    }

     


    if($catid==$param){
          $result =mysql_query("select * from ledgers  where ledgerid='".$lid."' limit 0,1");
          $row=mysql_fetch_array($result);
          $name=stripslashes($row['name']);
          $type=stripslashes($row['type']);
          $level=stripslashes($row['level']);

          $bal=getledgerbalconsolidated($lid,$d1,$d2,0);

            //if($level==0||$level=''){$level=1;}
            $margin=($level-1)*20;
            
            echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;font-size:10px;cursor:pointer " title="Click to View" onclick="viewbreakdown(\''.$param.'θ'.$sent.'\')">';
            ?>
            <td style="width:10%;border-width:0.2px; border-color:#ccc; border-style:solid;text-align:left;"><span style="margin-left:<?php  echo  $margin ?>%">
            <img src="img/bullet.png" style="width:12px; height:12px; margin:0 3px -2px 0"><?php  echo  $name ?></span></td>
            <td style="width:10%;border-width:0.2px; border-color:#ccc; border-style:solid;">
            <?php if($type=='Expense'||$type=='Asset'){ echo number_format($bal); }?>
            </td>
            <td style="width:10%;border-width:0.2px; border-color:#ccc; border-style:solid;">
            <?php if($type=='Liability'||$type=='Revenue'||$type=='Equity'){ echo number_format($bal); }?>
            </td>
            </tr>

        <?php

          //$margin+=20;

          getledgerbreakdown($lid,$sent,$level,$d1,$d2);
    }



}



}

function sendhtmlemail($emailid){

                                

                               $result =mysql_query("select * from emails  where id='".$emailid."' limit 0,1");
                               $row=mysql_fetch_array($result);
                               
                                $reply=$from='info@kpacentral.or.ke';
                                $cname='KPA CENTRAL MIS';

                                $headers = "From: " . strip_tags($from) . "\r\n";
                                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                               
                                $regn=stripslashes($row['tid']);
                                $fname=stripslashes($row['sendto']);
                                $email=$to=stripslashes($row['email']);
                                $subject=stripslashes($row['type']);
                                $message=stripslashes($row['message']);
                                
                                $textmessage='';

                                
                               
                               
                                $textmessage='Dear <b>'.$fname.',</b><br/><br/></b><br>

                                <b><u>RE:'.$subject.'</u></b>

                                '.$message.'
                                <br><br>
                                Best Regards,<br/>
                                The KPA Central Team ';

                                $text = $textmessage;

                                $message = '<html><body>';
                                $message.='<table border="0" cellpadding="0" cellspacing="0" width="100%">    
                                        <tr>
                                            <td style="padding: 10px 0 30px 0;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="70%" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                                    <tr>
                                                         <td>
                                                            <img src="http://kpacentral.or.ke/assets/img/kpa-logo.jpeg" style="width: 100%;">
                                                           </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                       '.$textmessage.'
                                                                    </td>


                                                                </tr>

                                                          
                                                             
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#2196f3" style="padding: 30px 30px 30px 30px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                                                        &reg; KPA CENTRAL MIS '.date('Y').' All rights reserved<br/>
                                                                      </td>
                                                                    <td align="right" width="25%">
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>';
                                $message .= '</body></html>';

                               // echo $message;

                                //echo $message;

                                

                                
                                mail($to, $subject, $message, $headers);




                            
}




function getledgerbal($ledgerid){
    $result =mysql_query("select * from ledgers where ledgerid='".$ledgerid."' limit 0,1");
    $row=mysql_fetch_array($result);
    $type=stripslashes($row['type']);

    $resulta =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$ledgerid."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    $dr1=stripslashes($rowa['dr']);

    if($type=='Expense'||$type=='Asset'){
      $bal = $dr1-$cr1;
    }
    if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
      $bal = $cr1-$dr1;
    }

    return $bal;
}

function getledgerbaldates($ledgerid,$d1,$d2){

    $result =mysql_query("select * from ledgers where ledgerid='".$ledgerid."' limit 0,1");
    $row=mysql_fetch_array($result);
    $type=stripslashes($row['type']);

    $debtype='debit';$credtype='credit';
    $resulta =mysql_query("select SUM(".$debtype.") as dr, SUM(".$credtype.") as cr from ledgerbalances where ledgerid = '".$ledgerid."' and stamp>='".$d1."'  and stamp<='".$d2."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    $dr1=stripslashes($rowa['dr']);
    //if($arr[$i][0]==5){echo $a.'<br/>';}
    
   
    //if($arr[$i][0]==5){echo $b;}

    
    $cr=$cr1;
    $dr=$dr1;

    if($type=='Expense'||$type=='Asset'){
      $bal = $dr-$cr;
    }
    if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
      $bal = $cr-$dr;
    }

    return $bal;
}


function getcostofpurchases($lid,$d1,$d2){


    
    $tot=0;
    $result =mysql_query("select * from purchases  where Stamp>='".$d1."' and Stamp<='".$d2."' and Lid='".$lid."'");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $tot+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
    }

    return $tot;

}

function getcostofpurchasestodate($lid){


    
    $tot=0;
    $result =mysql_query("select * from purchases  where Stamp>='".date('Y')."0101' and Stamp<='".date('Ymd')."' and Lid='".$lid."'");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $tot+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
    }

    return $tot;

}


function showbreakdown($lid,$array,$d1,$d2) {

        if (count($array)) {
            
            foreach ($array as $item) {

                  $resulty =mysql_query("select * from ledgers  where ledgerid='".$item['ledgerid']."' limit 0,1");
                  $rowy=mysql_fetch_array($resulty);
                  $name=stripslashes($rowy['name']);
                  $type=stripslashes($rowy['type']);
                  $level=stripslashes($rowy['level']);
                  $parent=stripslashes($rowy['parent']);

                  $margin=($level-1)*20;
                  $bname='All';$sent='';
                  if($d1!=0){$sent.='&d1='.stamptodate($d1);}
                  if($d2!=0){$sent.='&d2='.stamptodate($d2);}

                  if(isset($_SESSION['setledgers'][$item['ledgerid']])){$status=1;}else{$status=0;$_SESSION['setledgers'][$item['ledgerid']]=0;}
                   
                  if($lid!=$item['ledgerid']&&$status==0){
                  
                            if($parent==0){
                                 echo '<tr title="Click to View"  onclick="window.open(\'report.php?id=36&name='.$item['ledgerid'].$sent.'\')" style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;cursor:pointer;font-size:11px" class="row'.$lid.'" >';
                            
                            }else{
                                 echo '<tr style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;font-size:11px" class="row'.$lid.'" >';
                            
                            }
                            echo'<td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;text-align:left"><span style="margin-left:'.$margin.'%">
                            <img src="img/bullet.png" style="width:12px; height:12px; margin:0 3px -2px 0;">'.$name.'</span></td>
                            <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;text-align:right">';
                            if($type=='Expense'||$type=='Asset'){echo number_format(floatval($_SESSION['allledgers'][$item['ledgerid']]), 2, ".", "," ); } echo'</td>
                            <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;text-align:right">';if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
                            echo number_format(floatval($_SESSION['allledgers'][$item['ledgerid']]), 2, ".", "," ); } echo'</td>
                            </tr>';
                        
                             if (count($item['children'])) {
                                showbreakdown($lid,$item['children'],$d1,$d2);
                            }
               
                 
                    }//end if
                 }

          }
 }




function showbreakdown3($lid,$array,$d1,$d2) {

        if (count($array)) {
            
            foreach ($array as $item) {

                  $resulty =mysql_query("select * from ledgers  where ledgerid='".$item['ledgerid']."' limit 0,1");
                  $rowy=mysql_fetch_array($resulty);
                  $name=stripslashes($rowy['name']);
                  $type=stripslashes($rowy['type']);
                  $level=stripslashes($rowy['level']);
                  $parent=stripslashes($rowy['parent']);

                  $margin=($level-1)*20;
                  $bname='All';$sent='';
                  if($d1!=0){$sent.='&d1='.stamptodate($d1);}
                  if($d2!=0){$sent.='&d2='.stamptodate($d2);}

                  if(isset($_SESSION['setledgers'][$item['ledgerid']])){$status=1;}else{$status=0;$_SESSION['setledgers'][$item['ledgerid']]=0;}
                   
                  if($lid!=$item['ledgerid']&&$status==0){
                  
                            if($parent==0){
                                 echo '<tr title="Click to View"  onclick="window.open(\'report.php?id=36&name='.$item['ledgerid'].$sent.'\')" style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;cursor:pointer;font-size:11px" class="row'.$lid.'" >';
                            
                            }else{
                                 echo '<tr style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;font-size:11px" class="row'.$lid.'" >';
                            
                            }
                            echo'<td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;text-align:left"><span style="margin-left:'.$margin.'%">
                            <img src="img/bullet.png" style="width:12px; height:12px; margin:0 3px -2px 0;">'.$name.'</span></td>
                            <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;text-align:right">';
                            echo number_format(floatval($_SESSION['allledgers'][$item['ledgerid']]), 2, ".", "," ); echo'</td>
                             </tr>';
                        
                             if (count($item['children'])) {
                                showbreakdown3($lid,$item['children'],$d1,$d2);
                            }
               
                 
                    }//end if
                 }

          }
 }


function showbreakdown2($lid,$array,$d1,$d2) {



        if (count($array)) {
            
            foreach ($array as $item) {

                  $resulty =mysql_query("select * from ledgers  where ledgerid='".$item['ledgerid']."' limit 0,1");
                  $rowy=mysql_fetch_array($resulty);
                  $name=stripslashes($rowy['name']);
                  $type=stripslashes($rowy['type']);
                  $level=stripslashes($rowy['level']);
                  $parent=stripslashes($rowy['parent']);

                  $margin=($level-1)*20;
                  $bname='All';$sent='';
                  if($d1!=0){$sent.='&d1='.stamptodate($d1);}
                  if($d2!=0){$sent.='&d2='.stamptodate($d2);}

                  if(isset($_SESSION['setledgers'][$item['ledgerid']])){$status=1;}else{$status=0;$_SESSION['setledgers'][$item['ledgerid']]=0;}

                  $start=$d1;$end=$d2;
                  $yearacttot=0;
                  //while($start<=$end){
                    $monstart=substr($start,0,4).substr($start,4,2).'01';
                    $monend=substr($start,0,4).substr($start,4,2).'31';

                    if($parent!=1){
                        $yearacttot=getbudgetamountparent($item['ledgerid'],substr($monstart,0,4),substr($monstart,4,2),$d1,$d2);
                    }else{

                        $yearacttot=$_SESSION['allbudget'][$item['ledgerid']];
                    }
                    
                    //$start=addmonths($start,1);

                    //}
                    $monledtot=$_SESSION['allledgers'][$item['ledgerid']];
                    $yearledtot=$_SESSION['allledgerstodate'][$item['ledgerid']];


                    //if lid=cost of goods, get cost of goods bought
                    /*
                    if($parent==795){
                        $monledtot=getcostofpurchases($item['ledgerid'],$d1,$d2);
                        $_SESSION['allledgers'][$item['ledgerid']]=$monledtot;

                        $yearledtot=getcostofpurchasestodate($item['ledgerid']);
                        $_SESSION['allledgerstodate'][$item['ledgerid']]=$yearledtot;
                    }
                    */

                    /*
                    $yeardiff=$yearacttot-$yearledtot;

                    if($yearacttot==0||$yearacttot==''){$peryearcdiff=0;$yearacttot=0;}else{
                    $peryearcdiff=round(($yearledtot*100/$yearacttot),2);   
                    }

                    */

                    $yeardiff=$yearacttot-$monledtot;

                    if($yearacttot==0||$yearacttot==''){$peryearcdiff=0;$yearacttot=0;}else{
                    $peryearcdiff=round(($monledtot*100/$yearacttot),2);   
                    }
                   
                         
                        //if not locum or overtime
                         //if($lid!=$item['ledgerid']&&$status==0&&$item['ledgerid']!=667&&$item['ledgerid']!=739){
                  
                            if($parent==0){
                                 echo '<tr title="Click to View"  onclick="window.open(\'report.php?id=36&name='.$item['ledgerid'].$sent.'\')" style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;cursor:pointer;font-size:11px" class="row'.$lid.'" >';
                            
                            }else{
                                 echo '<tr style="width:100%; height:20px;padding:0; background:#fff;display:none; font-weight:normal;font-size:11px" class="row'.$lid.'" >';
                            
                            }
                             echo'<td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:left"><span style="margin-left:'.$margin.'%">
                            <img src="img/bullet.png" style="width:12px; height:12px; margin:0 3px -2px 0">'.$name.'</span></td>';
                           echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($yearacttot)).'</td>';
                            echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($monledtot)).'</td>';
                            echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right;display:none">'.number_format(round($yearledtot)).'</td>';
                            echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($yeardiff)).'</td>';
                            echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;font-weight:bold;text-align:right">'.$peryearcdiff.'%</td>';
                        
                             if (count($item['children'])) {
                                showbreakdown2($lid,$item['children'],$d1,$d2);
                            }
               
                 
                    //}//end if
                 }

          }
 }
function printledgerlist($array,$d1,$d2) {

        

        if (count($array)) {
           
            foreach ($array as $item) {
                

                  $yearbal=$bal=$xx=$yy=0;
                  $result =mysql_query("select * from ledgers  where ledgerid='".$item['ledgerid']."' limit 0,1");
                  $row=mysql_fetch_array($result);
                  $name=stripslashes($row['name']);
                  $type=stripslashes($row['type']);
                  $level=stripslashes($row['level']);
                  $address=stripslashes($row['address']);
                  $parent=stripslashes($row['parent']);
                 
                    $debtype='debit';$credtype='credit';

                    //curent period

                    $resulta =mysql_query("select SUM(".$debtype.") as dr, SUM(".$credtype.") as cr from ledgerbalances where ledgerid = '".$item['ledgerid']."' and stamp>='".$d1."' and stamp<='".$d2."'" );
                    $rowa=mysql_fetch_array($resulta);
                    $cr=stripslashes($rowa['cr']);
                    $dr=stripslashes($rowa['dr']);
                    //if($arr[$i][0]==5){echo $a.'<br/>';}

                    //year to date

                    $resulta =mysql_query("select SUM(".$debtype.") as dr, SUM(".$credtype.") as cr from ledgerbalances where ledgerid = '".$item['ledgerid']."' and stamp>='".date('Y')."0101' and stamp<='".date('Ymd')."'" );
                    $rowa=mysql_fetch_array($resulta);
                    $crmain=stripslashes($rowa['cr']);
                    $drmain=stripslashes($rowa['dr']);
                    

                   

                     
                     if($type=='Expense'||$type=='Asset'){
                      $bal = $dr-$cr; $yearbal = $drmain-$crmain;
                     }
                     if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
                      $bal = $cr-$dr;  $yearbal = $crmain-$drmain;
                     }

                     //update balance to parent

                     $allpeople=explode('-',$address);

                    
                     foreach ($allpeople as $peoplekey => $peopleval) {
                        
                        //if lid=cost of goods, get cost of goods bought
                        /*
                        if($parent==795){
                            $bal=getcostofpurchases($item['ledgerid'],$d1,$d2);
                            $_SESSION['allledgers'][$item['ledgerid']]=$bal;

                            $yearbal=getcostofpurchasestodate($item['ledgerid']);
                            $_SESSION['allledgerstodate'][$item['ledgerid']]=$yearbal;
                        }
                        */

                        
                        //if not overtime or locum salary
                        //if($item['ledgerid']!=667&&$item['ledgerid']!=739){

                                $figure=$_SESSION['allledgers'][$peopleval]+$bal;
                                $_SESSION['allledgers'][$peopleval]=$figure;


                                $figure=$_SESSION['allledgerstodate'][$peopleval]+$yearbal;
                                $_SESSION['allledgerstodate'][$peopleval]=$figure;
                                //echo $peopleval.'-'.$_SESSION['allledgers'][$peopleval].'<br/>';

                        //}

                        


                     }

                    
                if (count($item['children'])) {
                    printledgerlist($item['children'],$d1,$d2);
                }
           
            }

        }
 }

  function calculatebudget($array,$start,$end) {

        $d1=0;
        $d2=date('Ymd');

        $months=1+substr($end,4,2)-substr($start,4,2);
        $years=(substr($end,0,4)-substr($start,0,4))*12;
        $mult=$years+$months;
        


        if (count($array)) {
            //echo "<ul>";

            foreach ($array as $item) {
                //echo "<li>";

                $start=$_SESSION['mainstart'];
                $end=$_SESSION['mainend'];


                  $totbud=0;
                  
                  //while($start<=$end){
                    $monstart=substr($start,0,4).substr($start,4,2).'01';
                    $monend=substr($start,0,4).substr($start,4,2).'31';
                    $totbud=getbudgetamount($item['ledgerid'],substr($monstart,0,4),substr($monstart,4,2));
                    $totbud=$totbud*$mult;
                    //$start=addmonths($start,1);

                // }

                 // $_SESSION['allledgers'][$item['ledgerid']]=$totbud;

                  

                

                  $bal=$xx=$yy=0;
                  $result =mysql_query("select * from ledgers  where ledgerid='".$item['ledgerid']."' limit 0,1");
                  $row=mysql_fetch_array($result);
                  $name=stripslashes($row['name']);
                  $type=stripslashes($row['type']);
                  $level=stripslashes($row['level']);
                  $address=stripslashes($row['address']);
                  $parent=stripslashes($row['parent']);
                 
                  $bal=$totbud;

                     //update balance to parent

                 
                             $allpeople=explode('-',$address);

                                        //if not overtime or locum salary
                                //if($item['ledgerid']!=667&&$item['ledgerid']!=739){

                                        foreach ($allpeople as $peoplekey => $peopleval) {
                                        if(isset($_SESSION['allbudget'][$peopleval])){
                                        $figure=$_SESSION['allbudget'][$peopleval]+$bal;
                                        }else{$figure=$bal;}
                                        $_SESSION['allbudget'][$peopleval]=$figure;
                                        //echo $peopleval.'-'.$_SESSION['allledgers'][$peopleval].'<br/>';
                                        }


                                            
                                //}
                                

                     //echo $item['ledgerid'].'-'.$name.'-'.$_SESSION['allbudget'][$item['ledgerid']].'<br/>';



                if (count($item['children'])) {
                    calculatebudget($item['children'],$start,$end);
                }
                //echo "</li>";
            }

           // echo "</ul>";
        }
 }


function getledgerChildren($parent) {
    $query = "SELECT * FROM ledgers WHERE catid = $parent";
    $result = mysql_query($query);
    $children = array();
     $i = 0;
    if(mysql_num_rows($result)==0){
    //$children[$i] = array();
    //$children[$i]['ledgerid'] = $parent;
    //$children[$i]['children'] =  array();
    return $children;
    }else{
   
       
            while($row = mysql_fetch_assoc($result)) {
            $children[$i] = array();


                            $children[$i]['ledgerid'] = $row['ledgerid'];
                            $children[$i]['children'] = getledgerChildren($row['ledgerid']);
                    


            $i++;
            }
            return $children;
        }

}




function getledgerbalconsolidated($ledgerid,$d1,$d2,$mainbal){


    $array = getChildren($ledgerid);
    
    $bal=$xx=$yy=0;
        
    
    $debtype='debit';$credtype='credit';
    $result =mysql_query("select * from ledgers where ledgerid='".$ledgerid."' limit 0,1");
    $row=mysql_fetch_array($result);
    $type=stripslashes($row['type']);
    $dr=$cr=0;


    if(count($array)) {
        
        foreach ($array as $item) {
            
            $resulta =mysql_query("select SUM(".$debtype.") as dr, SUM(".$credtype.") as cr from ledgerbalances where ledgerid = '".$item['ledgerid']."' and stamp>='".$d1."' and stamp<='".$d2."'" );
            $rowa=mysql_fetch_array($resulta);
            $cr1=stripslashes($rowa['cr']);
            $dr1=stripslashes($rowa['dr']);
            //if($arr[$i][0]==5){echo $a.'<br/>';}
            
            
            $cr=$cr1;
            $dr=$dr1;

             $xx+=$dr;
             $yy+=$cr;

             if($type=='Expense'||$type=='Asset'){
              $bal = $xx-$yy;
             }
            if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
              $bal = $yy-$xx;
             }

             $mainbal+=$bal;
             
            

            if (count($item['children'])) {
                getledgerbalconsolidated($item['ledgerid'],$d1,$d2,$mainbal);
            }
            
        }

    
    }


    return $mainbal;

}

function loopbalances($mainid,$ledgerid,$d1,$d2){


    
}

function getbudgetamount($lid,$year,$mon){
    $amount=0;
    $resultx =mysql_query("SELECT * FROM budget WHERE year='".$year."' and lid='".$lid."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $amount=stripslashes($rowx['amount']);
    return $amount;

}

function getbudgetamountparent($lid,$year,$mon,$start,$end){

    $months=1+substr($end,4,2)-substr($start,4,2);
    $years=(substr($end,0,4)-substr($start,0,4))*12;
    $mult=$years+$months;


    $amount=0;
    $resultx =mysql_query("SELECT * FROM budget WHERE year='".$year."' and lid='".$lid."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $amount=stripslashes($rowx['amount'])*$mult;
    return $amount;

}

function getledgername($val){

    $resulta =mysql_query("select * from ledgers where ledgerid='".$val."' limit 0,1");
    $row=mysql_fetch_array($resulta);
    return stripslashes($row['name']);

}

function randomfour() {
    $alphabet = "abcdefghijklmnopqrstuwxyz";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i <4 ; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
function getuser($user){
	$resulta =mysql_query("select * from users where name='".$user."' limit 0,1");
    if(mysql_num_rows($resulta)==0){
       return strtoupper($user);
    }else{
       $row=mysql_fetch_array($resulta);
       return stripslashes($row['fullname']); 
    }
}


function gettenantphone($tid){
    $resulta =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
    $row=mysql_fetch_array($resulta);
    return stripslashes($row['phone']);
}

function taskscount($username){

    $result =mysql_query("select * from todo where status=0 and username='".$username."'");
    $tasks = mysql_num_rows($result);
    echo "<script>$('#taskscount').html(".$tasks.");</script>";
}
function notificationscount($user){

    $result =mysql_query("select * from messages where status=0 and name='".$user."'");
    $notifications = mysql_num_rows($result);
    echo "<script>$('#notificationscount').html(".$notifications.");</script>";
}
function mailto($name,$to,$subject,$message,$reply){


							
							  $headers='';
							  $headers .= "Reply-To: ".$name." <".$reply.">\r\n";
							  $headers .= "Return-Path: ".$name." <".$to.">\r\n";
							  $headers .= "From: ".$name." <".$to.">\r\n";

							mail(@$to, $subject, $message,$headers);
}

function daysdifference($date1,$date2){
    
     $date1 = strtotime($date1);
     $date2 = strtotime($date2);
     $datediff = $date2 - $date1;
     return floor($datediff/(60*60*24));

}

function translateToWords($number) 
{
/*****
     * A recursive function to turn digits into words
     * Numbers must be integers from -999,999,999,999 to 999,999,999,999 inclussive.    
     *
     *  (C) 2010 Peter Ajtai
     *    This program is free software: you can redistribute it and/or modify
     *    it under the terms of the GNU General Public License as published by
     *    the Free Software Foundation, either version 3 of the License, or
     *    (at your option) any later version.
     *
     *    This program is distributed in the hope that it will be useful,
     *    but WITHOUT ANY WARRANTY; without even the implied warranty of
     *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *    GNU General Public License for more details.
     *
     *    See the GNU General Public License: <http://www.gnu.org/licenses/>.
     *
     */
    // zero is a special case, it cause problems even with typecasting if we don't deal with it here
    $max_size = pow(10,18);
    if (!$number) return "zero";
    if (is_int($number) && $number < abs($max_size)) 
    {            
        switch ($number) 
        {
            // set up some rules for converting digits to words
            case $number < 0:
                $prefix = "negative";
                $suffix = translateToWords(-1*$number);
                $string = $prefix . " " . $suffix;
                break;
            case 1:
                $string = "one";
                break;
            case 2:
                $string = "two";
                break;
            case 3:
                $string = "three";
                break;
            case 4: 
                $string = "four";
                break;
            case 5:
                $string = "five";
                break;
            case 6:
                $string = "six";
                break;
            case 7:
                $string = "seven";
                break;
            case 8:
                $string = "eight";
                break;
            case 9:
                $string = "nine";
                break;                
            case 10:
                $string = "ten";
                break;            
            case 11:
                $string = "eleven";
                break;            
            case 12:
                $string = "twelve";
                break;            
            case 13:
                $string = "thirteen";
                break;            
            // fourteen handled later
            case 15:
                $string = "fifteen";
                break;            
            case $number < 20:
                $string = translateToWords($number%10);
                // eighteen only has one "t"
                if ($number == 18)
                {
                $suffix = "een";
                } else 
                {
                $suffix = "teen";
                }
                $string .= $suffix;
                break;            
            case 20:
                $string = "twenty";
                break;            
            case 30:
                $string = "thirty";
                break;            
            case 40:
                $string = "forty";
                break;            
            case 50:
                $string = "fifty";
                break;            
            case 60:
                $string = "sixty";
                break;            
            case 70:
                $string = "seventy";
                break;            
            case 80:
                $string = "eighty";
                break;            
            case 90:
                $string = "ninety";
                break;                
            case $number < 100:
                $prefix = translateToWords($number-$number%10);
                $suffix = translateToWords($number%10);
                $string = $prefix . "-" . $suffix;
                break;
            // handles all number 100 to 999
            case $number < pow(10,3):                    
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,2)))) . " hundred";
                if ($number%pow(10,2)) $suffix = " and " . translateToWords($number%pow(10,2));
                $string = $prefix . $suffix;
                break;
            case $number < pow(10,6):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,3)))) . " thousand";
                if ($number%pow(10,3)) $suffix = translateToWords($number%pow(10,3));
                $string = $prefix . " " . $suffix;
                break;
            case $number < pow(10,9):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,6)))) . " million";
                if ($number%pow(10,6)) $suffix = translateToWords($number%pow(10,6));
                $string = $prefix . " " . $suffix;
                break;                    
            case $number < pow(10,12):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,9)))) . " billion";
                if ($number%pow(10,9)) $suffix = translateToWords($number%pow(10,9));
                $string = $prefix . " " . $suffix;    
                break;
            case $number < pow(10,15):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,12)))) . " trillion";
                if ($number%pow(10,12)) $suffix = translateToWords($number%pow(10,12));
                $string = $prefix . " " . $suffix;    
                break;        
            // Be careful not to pass default formatted numbers in the quadrillions+ into this function
            // Default formatting is float and causes errors
            case $number < pow(10,18):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,15)))) . " quadrillion";
                if ($number%pow(10,15)) $suffix = translateToWords($number%pow(10,15));
                $string = $prefix . " " . $suffix;    
                break;                    
        }
    } else
    {
        echo "ERROR with - $number<br/> Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
    }
    return $string;    
}

function searchtable($table,$string){
$sql="SELECT * from ".$table."";
$sql_query=mysql_query($sql);
$logicStr="WHERE ";
$count=mysql_num_fields($sql_query);
for($i=0 ; $i < mysql_num_fields($sql_query) ; $i++){
 if($i == ($count-1) )
$logicStr=$logicStr."".mysql_field_name($sql_query,$i)." LIKE '%".$string."%' ";
else
$logicStr=$logicStr."".mysql_field_name($sql_query,$i)." LIKE '%".$string."%' OR ";
}
// start the search in all the fields and when a match is found, go on printing it .
$sql="SELECT * from ".$table." ".$logicStr;
$query=mysql_query($sql);

}

function cartitems($max){
    echo"<script>$('#totitems').val(".$max.")</script>";
    echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Location</td>
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:10%;">Qty</td>
                                      <td  style="width:15%;">Price</td>
                                      <td  style="width:15%;">Total</td>
                                      <td  style="width:10%;">Remove</td>
                                        
                                    </tr>'; 
                                $tot=0;
                                for ($row = 0; $row < $max; $row++){
                                    $tot+=$_SESSION['cart'][$row][6];
                                     if($row%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ">';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
                                    echo'
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['cart'][$row][8].'</td>
                                     <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['cart'][$row][1].'</td>
                                     <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['cart'][$row][2].'</td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['cart'][$row][5].'</td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['cart'][$row][6].'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="del'.$row.'"  onclick="delitem('.$row.')"><img src="img/delete.png" width="20"/></td>
                                    </tr>';
                                      }

                                    echo '</tbody></table>
                                    <div style="clear:both;width:100%;margin-bottom:5px"></div>
                                     <button style="float:right" class="btn vd_btn vd_bg-green" onclick="submititem()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit Requisition</button>
                                    <div class="form-group" tyle="float:right">
                                    <label class="col-sm-1">Total</label>
                                    <div class="col-sm-2 controls">
                                      <input type="text" id="finaltotal" disabled value="'.number_format(floatval($tot)).'">
                                    </div>
                                  </div>
                                    ';
    
                                    
                    
}
		
function cartrent($max){
    echo"<script>$('#totitems').val(".$max.")</script>";
    echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Tenant Name</td>
                                      <td  style="width:10%;">Month</td>
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:10%;">Qty</td>
                                      <td  style="width:10%;">Price</td>
                                      <td  style="width:10%;">Total</td>
                                      <td  style="width:10%;">Remove</td>
                                        
                                    </tr>'; 
                                    $tot=0;
                                for ($row = 0; $row < $max; $row++){
                                    $tot+=$_SESSION['rent'][$row][6];

                                     if($row%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ">';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
                                    echo'
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['rent'][$row][1].'['.$_SESSION['rent'][$row][7].']</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['rent'][$row][8].'</td>
                                    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['rent'][$row][4].'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['rent'][$row][2].'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['rent'][$row][5].'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format($_SESSION['rent'][$row][6]).'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="del'.$row.'"  onclick="delrent('.$row.')"><img src="img/delete.png" width="20"/></td>
                                    </tr>';
                                      }

                                    echo '</tbody></table>
                                    <div style="clear:both;width:100%;margin-bottom:5px"></div>
                                     <button style="float:right" class="btn vd_btn vd_bg-green" onclick="submitrent()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit Invoice</button>
                                    <div class="form-group" tyle="float:right">
                                    <label  class="col-sm-1">Total</label>
                                    <div class="col-sm-2 controls">
                                      <input type="text" id="finaltotal" disabled value="'.number_format(floatval($tot)).'">
                                    </div>
                                  </div>
                                    ';
    
                                    
                    
}


        
function cartmeters($max){
    echo"<script>$('#totitems').val(".$max.")</script>";
    echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Meter Type</td>
                                      <td  style="width:20%;">Meter No</td>
                                      <td  style="width:20%;">A/c No</td>
                                      <td  style="width:20%;">Reading</td>
                                      <td  style="width:10%;">Save</td>
                                      <td  style="width:10%;">Remove</td>
                                    </tr>'; 
                                   for ($row = 0; $row < $max; $row++){
                                   
                                     if($row%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ">';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
                                    echo'
                                 
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">
                                     <select id="metertype'.$row.'" class="select">
                                      <option value="'.$_SESSION['meters'][$row][0].'" selected>'.$_SESSION['meters'][$row][0].'</option>
                                        <option value="Water">Water</option>
                                        <option value="Electricity">Electricity</option>
                          
                                      </select>
                                    </td>
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input value="'.$_SESSION['meters'][$row][1].'" type="text" class="put_field" id="meterno'.$row.'"  style="background:#fff;width:90%;text-align:center"/></td>
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input value="'.$_SESSION['meters'][$row][2].'"  type="text" class="put_field" id="meteracno'.$row.'"  style="background:#fff;width:90%;text-align:center"/></td>
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input  value="'.$_SESSION['meters'][$row][3].'" type="text" class="put_field" id="curread'.$row.'"  style="background:#fff;width:90%;text-align:center"/></td>


                                   <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="save'.$row.'"  onclick="savemeter('.$row.')"><img src="img/save.png" width="20"/></td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="del'.$row.'"  onclick="delmeter('.$row.')"><img src="img/delete.png" width="20"/></td>
                                    </tr>';
                                      }

                                    echo '</tbody></table>';
    
                                    
                    
}

function cartreceive($max){

   

                                    echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:15%;">Month</td>
                                      <td  style="width:15%;">Invoiced Amount</td>
                                      <td  style="width:10%;">Amount Paid</td>
                                      <td  style="width:10%;">Balance</td>
                                      <td  style="width:10%;">Paying</td>
                                      <td  style="width:10%;">Save</td>
                                        
                                    </tr>';
                                    $aa=$bb=$cc=0;
                                    for ($row = 0; $row < $max; $row++)
                                    {
                                        $bal=$_SESSION['receive'][$row][2] - $_SESSION['receive'][$row][3];
                                        $aa+=$_SESSION['receive'][$row][2];
                                        $bb+=$_SESSION['receive'][$row][3];
                                        $cc+=$bal;



                                    if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                    else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                        
                                    echo'<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['receive'][$row][1].'</td>
                                       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['receive'][$row][6].'</td>
                                       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['receive'][$row][2])).'</td>
                                        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['receive'][$row][3])).'</td>
                                         <td  id="bal'.$row.'"  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($bal)).'</td>
                                         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="put_field" id="paying'.$row.'"  onkeyup="checkpaying('.$row.')" style="background:#fff;width:90%;text-align:center"/></td>
                                        <td id="save'.$row.'" style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="savereceivefee('.$row.')" ><img src="img/save.png" width="30"/></td>
                                       </tr>';  
                                     }
                                    
                            echo'</tbody></table>
                            <div id="title" style="">
                                    <div id="figure1" style="margin-left:0px; width:30%;color:#fff;">TOTALS</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($aa).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($bb).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($cc).'</div>
                                    <div class="figure1" id="paytot"  style="width:15%;color:#fff;">0</div>
                                    </div>
                            </div>';
}

function cartcredit($max){

   

                                    echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:15%;">Month</td>
                                      <td  style="width:15%;">Invoiced Amount</td>
                                      <td  style="width:10%;">Credit Amount</td>
                                      <td  style="width:10%;">Save</td>
                                        
                                    </tr>';
                                    $aa=$bb=$cc=0;
                                    for ($row = 0; $row < $max; $row++)
                                    {
                                        $bal=$_SESSION['credit'][$row][2] - $_SESSION['credit'][$row][3];
                                        $aa+=$_SESSION['credit'][$row][2];
                                        $bb+=$_SESSION['credit'][$row][3];
                                        $cc+=$bal;



                                    if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                    else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                        
                                    echo'<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['credit'][$row][1].'</td>
                                       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['credit'][$row][6].'</td>
                                       <td id="bal'.$row.'" style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['credit'][$row][2])).'</td>
                                       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="put_field" id="paying'.$row.'"  onkeyup="checkpayingcred('.$row.')" style="background:#fff;width:90%;text-align:center"/></td>
                                        <td id="save'.$row.'" style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="savecreditnote('.$row.')" ><img src="img/save.png" width="30"/></td>
                                       </tr>';  
                                     }
                                    
                            echo'</tbody></table>
                            <div id="title" style="">
                                    <div id="figure1" style="margin-left:0px; width:30%;color:#fff;">TOTALS</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($aa).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($bb).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($cc).'</div>
                                    <div class="figure1" id="paytot"  style="width:15%;color:#fff;">0</div>
                                    </div>
                            </div>';
}


function cartrefund($max){

   

                                    echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:15%;">Month</td>
                                      <td  style="width:15%;">Receipted Amount</td>
                                      <td  style="width:10%;">Refund Amount</td>
                                      <td  style="width:10%;">Save</td>
                                        
                                    </tr>';
                                    $aa=$bb=$cc=0;
                                    for ($row = 0; $row < $max; $row++)
                                    {
                                        $bal=$_SESSION['refund'][$row][2] - $_SESSION['refund'][$row][3];
                                        $aa+=$_SESSION['refund'][$row][2];
                                        $bb+=$_SESSION['refund'][$row][3];
                                        $cc+=$bal;



                                    if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                    else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                        
                                    echo'<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['refund'][$row][1].'</td>
                                       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['refund'][$row][6].'</td>
                                       <td id="bal'.$row.'" style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['refund'][$row][2])).'</td>
                                       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="put_field" id="paying'.$row.'"  onkeyup="checkpayingcred('.$row.')" style="background:#fff;width:90%;text-align:center"/></td>
                                        <td id="save'.$row.'" style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="saverefund('.$row.')" ><img src="img/save.png" width="30"/></td>
                                       </tr>';  
                                     }
                                    
                            echo'</tbody></table>
                            <div id="title" style="">
                                    <div id="figure1" style="margin-left:0px; width:30%;color:#fff;">TOTALS</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($aa).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($bb).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($cc).'</div>
                                    <div class="figure1" id="paytot"  style="width:15%;color:#fff;">0</div>
                                    </div>
                            </div>';
}

function cartpaysup($max){

   

                                    echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Invoice No</td>
                                      <td  style="width:20%;">Invoiced Amount</td>
                                      <td  style="width:15%;">Amount Paid</td>
                                      <td  style="width:15%;">Balance</td>
                                      <td  style="width:15%;">Paying</td>
                                      <td  style="width:15%;">Save</td>
                                        
                                    </tr>';
                                    $aa=$bb=$cc=0;
                                    for ($row = 0; $row < $max; $row++)
                                    {
                                        $bal=$_SESSION['paysup'][$row][2] - $_SESSION['paysup'][$row][3];
                                        $aa+=$_SESSION['paysup'][$row][2];
                                        $bb+=$_SESSION['paysup'][$row][3];
                                        $cc+=$bal;



                                    if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                    else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                        
                                    echo'<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['paysup'][$row][1].'</td>
                                       <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['paysup'][$row][2])).'</td>
                                        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['paysup'][$row][3])).'</td>
                                         <td  id="bal'.$row.'"  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($bal)).'</td>
                                         <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="put_field" id="paying'.$row.'"  onkeyup="checkpaying('.$row.')" style="background:#fff;width:90%;text-align:center"/></td>
                                        <td id="save'.$row.'" style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="savesuppay('.$row.')" ><img src="img/save.png" width="30"/></td>
                                       </tr>';  
                                     }
                                    
                            echo'</tbody></table>
                            
                            <div id="title" style="">
                                    <div id="figure1" style="margin-left:0px; width:30%;color:#fff;">TOTALS</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($aa).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($bb).'</div>
                                    <div id="figure1"  style="width:15%;color:#fff;">'.number_format($cc).'</div>
                                    <div class="figure1" id="paytot"  style="width:15%;color:#fff;">0</div>
                                    </div>
                            </div>';
}

function cartjournal($max){

                                    echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:45%;">Ledger Name</td>
                                      <td  style="width:20%;">Debit</td>
                                      <td  style="width:20%;">Credit</td>
                                      <td  style="width:15%;">Remove</td>
                                        
                                    </tr>';


                                    $aa=$bb=0;
                                    for ($row = 0; $row < $max; $row++){
                                        $subid='';
                                        if($_SESSION['journal'][$row][4]!=''){$subid='['.$_SESSION['journal'][$row][4].']';}

                                    if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                    else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                        
                                    echo'<td style="width:45%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['journal'][$row][1].$subid.'</td>
                                       <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">';
                                       if($_SESSION['journal'][$row][2]=='Debit'){ echo number_format($_SESSION['journal'][$row][3]);$aa+=$_SESSION['journal'][$row][3];}
                                       echo'</td>
                                       <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">';
                                       if($_SESSION['journal'][$row][2]=='Credit'){ echo number_format($_SESSION['journal'][$row][3]);$bb+=$_SESSION['journal'][$row][3];}
                                       echo'</td>
                                        <td id="del'.$row.'" style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="deletejournal('.$row.')" ><img src="img/delete.png" width="30"/></td>
                                       </tr>';  
                                     }

                                    echo'
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:45%;">TOTALS</td>
                                      <td  style="width:20%;">'.number_format($aa).'</td>
                                      <td  style="width:20%;">'.number_format($bb).'</td>
                                      <td  style="width:15%;"></td>
                                        
                                    </tr>
                                    </tbody></table>

                                   ';
}

function cartexpense($max){

      echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:35%;">Expense Name</td>
                                      <td  style="width:45%;">Description</td>
                                      <td  style="width:10%;">Amount</td>
                                      <td  style="width:10%;">Remove</td>
                                        
                                    </tr>';

                                    for ($row = 0; $row < $max; $row++) {

                                        if($row%2==0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                        else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                      echo'<td style="width:35%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['expense'][$row][1].'</td>
                                       <td style="width:45%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['expense'][$row][3].'</td>
                                       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.number_format(floatval($_SESSION['expense'][$row][2])).'</td>
                                       <td id="del'.$row.'" style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;" onclick="deleteexpense('.$row.')" ><img src="img/delete.png" width="30"/></td>
                                       </tr>';  
                                     }
                                    
                                   echo'</tbody></table>';
}


function cartbill($max){
    echo"<script>$('#totitems').val(".$max.")</script>";
    echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Supplier</td>
                                      <td  style="width:30%;">Item Name</td>
                                      <td  style="width:10%;">Qty</td>
                                      <td  style="width:15%;">Price</td>
                                      <td  style="width:15%;">Total</td>
                                      <td  style="width:10%;">Remove</td>
                                        
                                    </tr>'; 
                                $tot=0;
                                for ($row = 0; $row < $max; $row++){
                                    $tot+=$_SESSION['bill'][$row][6];

                                     if($row%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ">';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
                                    echo'
                                    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['bill'][$row][8].'</td>
                                     <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['bill'][$row][1].'</td>
                                     <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['bill'][$row][2].'</td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['bill'][$row][5].'</td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.$_SESSION['bill'][$row][6].'</td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="del'.$row.'"  onclick="delbill('.$row.')"><img src="img/delete.png" width="20"/></td>
                                    </tr>';
                                      }

                                    echo '</tbody></table>
                                    <div style="clear:both;width:100%;margin-bottom:5px"></div>
                                    
                                     <button style="float:right" class="btn vd_btn vd_bg-green" onclick="submitbill()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit Invoice</button>
                                    <div class="form-group" tyle="float:right">
                                    <label class="col-sm-1">Total</label>
                                    <div class="col-sm-2 controls">
                                      <input type="text" id="finaltotal" disabled value="'.number_format(floatval($tot)).'">
                                    </div>
                                  </div>
                                    ';
    
                                    
                    
}


?>

