<?php
date_default_timezone_set('Africa/Nairobi'); 
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

function sendsms($message,$phone){

$message=preg_replace('~ ~', '+', $message);
//$phone=preg_replace('~ ~', '', $phone);

$url="http://apis.sematime.com/v1/68cd1891c4be453595764e04b85ad42f/messages/single.url?text=".$message."&recipients=".$phone."&AuthToken=71a4e51b928f4071a2ceab9a09869734";
$json=file_get_contents($url);
$data=json_decode($json,true);

 $failed=$data['failed'];
 return $failed;


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
	$row=mysql_fetch_array($resulta);
	return stripslashes($row['fullname']);
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

