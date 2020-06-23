<?php include('db_fns.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$database=$_SESSION['database'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
include('functions.php'); 
require('fpdf.php');
require 'PHPMailerAutoload.php';
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<?php
if(isset($_GET['invno'])){
$invno=$_GET['invno'];}
$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel='Tel: '.stripslashes($row['Tel']);
$Add='P.O BOX '.stripslashes($row['Address']);
$web='Web: '.stripslashes($row['Website']);
$comemail='Email: '.stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);

$headtitle='PROFORMA INVOICE';$title='INVOICE';$docname=$database.'_inv_'.$invno;$message='Attached is a Proforma Invoice for your Monthly Rent. Kindly go through it and do make a payment by 5th next Month to avoid penalties.';




$result =mysql_query("select * from receipts where invno='".$invno."'  order by serial desc limit 0,1");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$tid=stripslashes($row['tid']);
$month=stripslashes($row['month']);
$curbal=stripslashes($row['bal']);
$date=stripslashes($row['date']);

$result =mysql_query("select * from invoices where invno='".$invno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$xx+=stripslashes($row['invamount']); 
$desc=stripslashes($row['description']);
$names=stripslashes($row['tname']);
$rno=stripslashes($row['rno']);
}

$amount=$xx;
$amount=number_format(floatval($amount));
$result =mysql_query("select * from tenants where tid='".$tid."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['bname']);
$rno=stripslashes($row['roomno']);
$email=stripslashes($row['email']);
$emailarr=explode('/',($email));
$cusemail=$emailarr[0];

class PDF extends FPDF
{
// Page header
function Header()
{
	
	
       
	
}

// Page footer
function Footer()
{
	
}
}
//new pdf
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

	$pdf->SetFont('Courier','B',65);
	$header = array($title.' #', 'DATE');
	$data = array($invno, $date);

	// Logo
	$pdf->Image($logo,10,6,60);
	// Arial bold 15
	$pdf->SetFont('Courier','B',35);

	$pdf->SetTextColor(31,174,102);
	// Move to the right
	$pdf->Cell(80);
	// Title
	$pdf->Cell(0,0,$headtitle,0,0,'C');
	// Line break
	$pdf->Ln(10);

	$pdf->SetFont('Courier','',15);


	$pdf->SetTextColor(0);
	$pdf->SetLineWidth(.3);
	$pdf->SetFillColor(31,174,102);
	

	$pdf->Cell(110);
	foreach($header as $col){
		
		$pdf->Cell(40,10,$col,1,0,'C',true);
	}
        
   	 $pdf->Ln();
   	 $pdf->Cell(110);
   $pdf->SetFillColor(255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('','B');
	// Header
	$w = array(40, 40);
	for($i=0;$i<count($data);$i++)
		$pdf->Cell($w[$i],10,$data[$i],1,0,'C',true);
	$pdf->Ln();
	$pdf->Ln(10);
	$pdf->SetTextColor(0);
	$pdf->Cell(0,0,$comname,0,0);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(10);
	$pdf->SetFont('Courier','',10);
	$pdf->Cell(0,0,$Add,0,0);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(10);
	$pdf->SetFont('Courier','',10);
	$pdf->Cell(0,0,$tel,0,0);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(10);
	$pdf->SetFont('Courier','',10);
	$pdf->Cell(0,0,$web,0,0);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(10);
	$pdf->SetFont('Courier','',10);
	$pdf->Cell(0,0,$comemail,0,0);
	$pdf->Ln(4);

	$pdf->Ln();
	$pdf->SetFillColor(31,174,102);
	$pdf->SetFont('Courier','',12);
	$pdf->Cell(70,6,'MAIL TO:',1,0,'L',true);
	$pdf->Ln();
	$pdf->SetFillColor(255);
	$pdf->Cell(70,6,$names,1,0,'L',true);
	$pdf->Ln();
	$pdf->SetFillColor(255);
	$pdf->Cell(70,6,'UNIT NO: '.$rno,1,0,'L',true);
	$pdf->Ln();
	$pdf->Ln(10);
	$pdf->SetFillColor(31,174,102);
	$pdf->Cell(140,6,'DESCRIPTION:',1,0,'L',true);
	$pdf->Cell(50,6,'AMOUNT',1,0,'L',true);
	$pdf->Ln();
	$pdf->Rect(2, 2, 206, 270,'');
	$pdf->SetFillColor(255);
	$pdf->Cell(140,105,$desc,1,0,'L',true);
	$pdf->Cell(50,105,$amount,1,0,'L',true);
	$pdf->Ln();
	$pdf->SetFillColor(31,174,102);
	$pdf->Cell(140,6,'TOTALS:',1,0,'L',true);
	$pdf->Cell(50,6,$amount,1,0,'L',true);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Courier','',10);
	$pdf->Cell(0,0,'This is a System Generated document and does not require a signature.',0,0,'C');
	$pdf->Ln();
	$pdf->Ln(5);
	$pdf->Cell(0,0,'Thank you for your business!',0,0,'C');
	$pdf->Ln();
	$pdf->Ln(10);
	$pdf->SetTextColor(31,174,102);
	$pdf->SetFont('Courier','',8);
	$pdf->Cell(0,0,$comname,0,0);
	$pdf->Ln(3);
	$pdf->SetLeftMargin(10);
	$pdf->Cell(0,0,$Add,0,0);
	$pdf->Ln(3);
	$pdf->SetLeftMargin(10);
	$pdf->Cell(0,0,$tel,0,0);
	$pdf->Ln(3);
	$pdf->SetLeftMargin(10);
	$pdf->Cell(0,0,$web,0,0);
	$pdf->Ln(3);
	$pdf->SetLeftMargin(10);
	$pdf->Cell(0,0,$comemail,0,0);
	$pdf->Ln(3);
	$pdf->Cell(120);

	
	$pdf->Output($docname);

	
	//send mail

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

$mail->addAttachment('docs/'.$docname.'.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $comname.'-RENT PROFORMA INVOICE';
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
                                       Hi '.$names.',

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
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/tulip-healthcare" style="color: #ffffff;">
                                                        <img src="http://njowambu.co.ke/water/htmlemail/images/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.facebook.com/tulip-healthcare" style="color: #ffffff;">
                                                        <img src="http://njowambu.co.ke/water/htmlemail/images/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
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

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email has been sent';
}




?>
<script>window.close();</script>