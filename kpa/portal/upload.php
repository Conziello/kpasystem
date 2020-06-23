<?php
include('db_fns.php');
$username=$_SESSION['valid_user'];
$database=$_SESSION['database'];
if(isset($_POST['stamp'])){
$stamp =$_POST['stamp'];
}else $stamp=NULL;
if(isset($_POST['regno'])){
$regno =$_POST['regno'];
}else $regno=NULL;
$id =$_POST['id'];
include('functions.php'); 
 

 	switch($id){
	
	case 1:
	//insert into dependants

		
		$file = $_FILES['image']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			
			
			if($c!=0){
			$sql= mysql_query("insert into contacts values('0','".$filesop[0]."','".$filesop[1]."','".$filesop[2]."','".$filesop[4]."','".date('d/m/Y')."','".date('Ymd')."','','".$username."','1','','".$filesop[3]."')");
			}
			
			$c = $c + 1;
		}
		$c=$c-1;
		if($sql){
			echo '<p>'.$c.' records added succesfully</p><img style="width:80%; height:40%;"  src="img/excel.png?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>';
			
		}
	break;

	case 3: //user profile
	$name=$_FILES['image']['name'];
	$userid=$stamp;
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['image']['tmp_name'], 'img/users/'.$name);
	if(exif_imagetype('img/users/'.$name.'')){
		$src='img/users/'.$name;
		echo '<img style="width:100%; height:100%;"  src="'.$src.'"/>';
		$resultz = mysql_query("update tenants set profile='img/users/".$name."' where tid='".$userid."'");	
	}
	
	
	break;

	
	
}
	
	?>
