<?php
include('db_fns.php');
$database=$_SESSION['database'];
if(isset($_POST['stamp'])){
$stamp =$_POST['stamp'];
}else $stamp=NULL;
if(isset($_POST['regno'])){
$regno =$_POST['regno'];
}else $regno=NULL;
$id =$_POST['id'];
include('functions.php'); 
$username=$_SESSION['valid_user'];

 	switch($id){
	
	case 1: //shop application
	if(isset($_POST['details'])){
	$details =$_POST['details'];
	}else $details='';
	$fname =$_POST['fname'];
	$name=$_FILES['image']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$rand=randomfour();
	$name=$database.'_'.$rand.'_'.$name;
	$soi =$_POST['soi'];
	$sap =$_POST['sap'];
	$tid =$_POST['tid'];
	$doctype =$_POST['type'];
	$div=$doctype.'div';
	$link='uploads/tenants/'.$name;
	move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/tenants/'.$name);
	if(exif_imagetype('uploads/tenants/'.$name.'')){
		$src=$link;$type='Image';
	}
	else if($ext=='pdf'){
		$src='img/adobe.png';$type='PDF';
	}
	else if($ext=='xls'||$ext=='xlsx'){
		$src='img/excel.png';$type='Excel';
	}
	else if($ext=='doc'||$ext=='docx'){
		$src='img/word.png';$type='Word';
	}
	else{
		$src='img/format.png';$type='Unknown';
	}	
	echo '<img style="width:100%; height:100%;"  src="'.$src.'"/>';
	$result = mysql_query("insert into tendocs values('0','".$doctype."','".$soi."','".$sap."','".$tid."','".$name."','".$link."','".$fname."','".date('d/m/Y')."','".date('Ymd')."','1')");
	break;
	
	case 2: //upload lease
	if(isset($_POST['details'])){
	$details =$_POST['details'];
	}else $details='';
	$fname =$_POST['fname'];
	$name=$_FILES['image']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$rand=randomfour();
	$name=$database.'_'.$rand.'_'.$name;
	$tid =$_POST['tid'];
	$doctype =$_POST['type'];
	$div=$doctype.'div';
	$link='uploads/tenants/'.$name;
	move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/tenants/'.$name);
	if(exif_imagetype('uploads/tenants/'.$name.'')){
		$src=$link;$type='Image';
	}
	else if($ext=='pdf'){
		$src='img/adobe.png';$type='PDF';
	}
	else if($ext=='xls'||$ext=='xlsx'){
		$src='img/excel.png';$type='Excel';
	}
	else if($ext=='doc'||$ext=='docx'){
		$src='img/word.png';$type='Word';
	}
	else{
		$src='img/format.png';$type='Unknown';
	}	
	echo '<img style="width:100%; height:100%;"  src="'.$src.'"/>';
	$result = mysql_query("insert into tendocs values('0','".$doctype."','','','".$tid."','".$name."','".$link."','".$fname."','".date('d/m/Y')."','".date('Ymd')."','1')");
	break;

	case 3: //user profile
	$name=$_FILES['image']['name'];
	$userid=$stamp;
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['image']['tmp_name'], 'img/users/'.$name);
	if(exif_imagetype('img/users/'.$name.'')){
		$src='img/users/'.$name;
		echo '<img style="width:100%; height:100%;"  src="'.$src.'"/>';
		$resultz = mysql_query("update users set photo='img/users/".$name."' where userid='".$userid."'");	
	}
	
	
	break;

	case 4: //water consumption
		
		$file = $_FILES['image']['tmp_name'];
		$name=$_FILES['image']['name'];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		if($ext!='csv'){

			echo '<script>alert("Inappropriate File format.Upload CSV File Only.")</script>';
			exit;
		}
		//echo 'Loading...';

		$resulta=0;

		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
						 
					if($c!=0){
						 $rid=$filesop[0];
						 $wp=$filesop[5];
						 $wc=$filesop[6];
						 $toilet=$filesop[7];
			 
			 				$resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
				            $rowy=mysql_fetch_array($resulty);
				            $rno=stripslashes($rowy['roomno']);
				            $tid=stripslashes($rowy['tenantid']);
				            $tname=stripslashes($rowy['tenant']);
				            $hid=stripslashes($rowy['houseid']);
				            $hname=stripslashes($rowy['housename']);
				            $mtrno=stripslashes($rowy['watermeter']);
				            //$wp=stripslashes($rowy['waterprevious']);


				             $resultz =mysql_query("select * from mainhouses where houseid='".stripslashes($rowy['houseid'])."' limit 0,1");
              				 $rowz=mysql_fetch_array($resultz);
              				 $rate=stripslashes($rowz['water']);


							$fromdep=0;
							$mon=$_POST['month'];
							$dateread=$_POST['date'];
							$wd=$wc-$wp;
	
							$water=$wd*$rate;
							$sewer=0;
							$meter=0;
							$service=0;
							$cons=0;
							$amount=$water+$sewer+$meter+$service+$cons+$toilet;
							
							if($amount!=0){


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
												
										$resulty = mysql_query("insert into waterinvoices values('0','".$invno."','".$hid."','".$hname."','".$rid."','".$rno."','".$tid."','".$tname."','".$mon."','".$dateread."','".$mtrno."','".$wp."','".$wc."','".$wd."','".$water."','".$sewer."','".$service."','".$meter."','".$cons."','".$toilet."','".$amount."','".$date."','".$stamp."',1,'".$username."')");
										$resultg = mysql_query("update houses set waterprevious='".$wc."' where rid='".$rid."'");

										//update ledgers
										$journalno=0;$cid=671;$did=628;$refno=$hid;$date=date('Y/m/d');
										$description='Water Billing-'.$hname.'-'.$desc;
										postjournal($journalno,$cid,'Credit','Add',$did,'Debit','Add',$amount,$description,$refno,$date,$username,0);

										$message='Hello '.$tname.'. Your Account for unit no: '.$rno.' at '.$hname.' has been invoiced KShs. '.number_format(floatval($amount)).', being the water bill for '.$mon.'. Your new balance is: '.number_format(floatval($balb)).'. Thank you for your partnership.';
										$resulte = mysql_query("insert into notices values('0','Receipt','".$message."','".$tname."','".$phone."','".$tid."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','0','','0','".$invno."')");
										

							}
			 				

					}

					$c = $c + 1;
		}

		if($resulta){
			echo $c.' records billed succesfully<img style="width:80%; height:40%;"  src="img/excel.png?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>';
		}
	
	
	break;

	case 5: //ladlord docs
	if(isset($_POST['details'])){
	$details =$_POST['details'];
	}else $details='';
	$fname =$_POST['fname'];
	$name=$_FILES['image']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$rand=randomfour();
	$name=$database.'_'.$rand.'_'.$name;
	$soi =$_POST['soi'];
	$sap =$_POST['sap'];
	$tid =$_POST['tid'];
	$doctype =$_POST['type'];
	$div=$doctype.'div';
	$link='uploads/landlords/'.$name;
	move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/landlords/'.$name);
	if(exif_imagetype('uploads/landlords/'.$name.'')){
		$src=$link;$type='Image';
	}
	else if($ext=='pdf'){
		$src='img/adobe.png';$type='PDF';
	}
	else if($ext=='xls'||$ext=='xlsx'){
		$src='img/excel.png';$type='Excel';
	}
	else if($ext=='doc'||$ext=='docx'){
		$src='img/word.png';$type='Word';
	}
	else{
		$src='img/format.png';$type='Unknown';
	}	
	echo '<img style="width:100%; height:100%;"  src="'.$src.'"/>';
	$result = mysql_query("insert into tendocs values('0','".$doctype."','".$soi."','".$sap."','L-".$tid."','".$name."','".$link."','".$fname."','".date('d/m/Y')."','".date('Ymd')."','1')");
	break;


	case 6: //sacco upload
	
	$mon =$_POST['month'];
	$name=$_FILES['image']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	
	if($ext=='csv'){

		$result =mysql_query("select * from saccouploadregister where mon='".$mon."'");		
		if(mysql_num_rows($result)>0){
		echo"<p>Month has already been uploaded.</p>";
		exit;
		}else{

				

				
				$file = $_FILES['image']['tmp_name'];
				$handle = fopen($file, "r");
				$c = 0;
				while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
				{
					$cusno = intval($filesop[0]);
					$name = strval($filesop[1]);
					$amount = floatval($filesop[2]);
					$loanno = strval($filesop[3]);

					$result =mysql_query("select * from mainhouses where houseid='".$cusno."'");
					if(mysql_num_rows($result)>0){
						$row=mysql_fetch_array($result);
						
					$resultg = mysql_query("insert into landtx values('0','".$mon."','".stripslashes($row['houseid'])."','".stripslashes($row['housename'])."','cr','Sacco','Sacco Loan','Sacco Loan Deduction-Loan Ref No:".$loanno."','".$amount."','".date('d/m/Y')."','".date('Ymd')."','".$username."',1,'0')");
						$c = $c + 1;

					}

					
					
				
				}

				$resultg = mysql_query("insert into saccouploadregister values('0','".$mon."')");	
							


				echo '<p style="font-size:11px">'.$c.' records imported.</p><img style="width:80%; height:40%;"  src="img/excel.png?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>';
				//echo "<script>refreshbatch()</script>";

		}


	

	}
	else{
		echo 'Invalid File Type.CSV Only';
	}	
	
	break;


	case 7: //cme pdf
	$file = $_FILES['image']['name'];
	$name=$_FILES['image']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	if($ext!='pdf'){

		echo '<script>alert("Inappropriate File format.Upload PDF File Only.")</script>';
		exit;
	}


	$name=$_FILES['image']['name'];
	$stamp =$_POST['stamp'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$name=$stamp.'.'.$ext;
	if(move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/cme/'.$name)){
		echo '<img style="width:100%; height:100%;"  src="img/adobe.png"/>';
	}
	
	
	break;

	

	
	
}
	
	?>
