<?php include('db_fns.php');
$_SESSION['links']=array();
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$fullname=stripslashes($row['fullname']);
$userid=stripslashes($row['userid']);
$userdep=stripslashes($row['dept']);
$_SESSION['profilephoto']=$photo=stripslashes($row['photo']);
$onename = explode(" ", $fullname); $onename= $onename[0];
include('functions.php'); 

$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=stripslashes($row['CompanyName']);
$tel=stripslashes($row['Tel']);
$comadd=$Add=stripslashes($row['Address']);
$comloc=stripslashes($row['Location']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
$comprop=stripslashes($row['Property']);
$complot=stripslashes($row['Plot']);
$watermark=stripslashes($row['Watermark']);


$_SESSION['rightsarr']=$rightsarr=array();
$result =mysql_query("select * from accesstbl");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $var=stripslashes($row[$usertype]);
  $code=stripslashes($row['AccessCode']);
  $_SESSION['rightsarr'][$code]=$rightsarr[$code]=$var;
}



}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->

<!-- End of Data -->


<!-- Mirrored from vendroid.venmond.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Feb 2015 17:21:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>KPA Central CRM</title>
    <meta name="keywords" content="KPA Central CRM" />
    <meta name="description" content="KPA Central CRM">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/home.png">
    
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="css/font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            

	  
    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    


        
    <!-- Responsive CSS -->
        	<link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 

	  
 <!-- Specific CSS -->
  <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"><link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css"><link href="plugins/introjs/css/introjs.min.css" rel="stylesheet" type="text/css">    
  <link href="plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"><link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">   
  <link href="plugins/bootstrap-wysiwyg/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" type="text/css">
 
  
    <!-- Custom CSS -->
    <link href="custom/custom.css" rel="stylesheet" type="text/css">
     <link href="css/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="css/autocomplete.css" rel="stylesheet" type="text/css">
    <link href="css/select2.css" rel="stylesheet" type="text/css">
    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script> 
    <script type="text/javascript" src="js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script> 
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>     
    <![endif]-->
    
</head>    

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1"  onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">     
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="#" style="font-size:12px">KPA CENTRAL CRM</a>
             </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
            		                	<span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium">
	                    <i class="fa fa-bars"></i>
                    </span>
                                		                    
                	<span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span> 
                                       
            </div>
            <div class="vd_panel-menu left-pos visible-sm visible-xs">
                                 
                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>  
                            
                              
            </div>
            <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>        
                          
                        <span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                            <i class="fa fa-comments"></i>
                        </span>                   
                   	 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-5 col-xs-12">
            		
<div class="vd_menu-search">
  <form id="search-box" method="post" action="#">
    <input type="text" name="search" id="searchfield" class="vd_menu-search-text width-60" placeholder="Search">
    <div class="vd_menu-search-category"> <span data-action="click-trigger"> <span class="separator"></span> <span class="text">Category</span> <span class="icon"> <i class="fa fa-caret-down"></i></span> </span>
      <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm" data-action="click-target">
        <div class="child-menu">
          <div class="content-list content-menu content">
            <ul class="list-wrapper">
              <li>
                <label>
                  <input type="radio" name="category" value="tenants" checked>
                  <span>Members</span></label>
              </li>
              
              <li>
                <label>
                  <input type="radio" name="category" value="invoices">
                  <span>Invoices</span></label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="receipts">
                  <span>Receipts</span></label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="tendocs">
                  <span>Documents</span></label>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <span class="vd_menu-search-submit" onclick="searchdash()"><i class="fa fa-search"></i> </span>
  </form>
</div>
                </div>
                <div class="col-sm-7 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<ul class="mega-ul">
    <?php
    $result =mysql_query("select * from messages where name='".$username."' and status=0");
    $notifications = mysql_num_rows($result); 
    $result =mysql_query("select * from todo where status=0 and username='".$username."'");
    $tasks = mysql_num_rows($result);
    ?>
    <li id="top-menu-2" class="one-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"  onclick="loadtasks()"><i class="fa fa-tasks"></i></span> 
		<span class="badge vd_bg-red" id="taskscount"><?php echo $tasks ?></span>        
      </a>
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
           	   Tasks
           </div>                 
		      <div class="content-list content-image" id="maintasks">
           	   
               <div class="closing text-center" style="">
               		<a href="#" onclick="dashboard()">See All Tasks <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
    </li>  
    <li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"   onclick="loadnotifications()"><i class="fa fa-globe"></i></span> 
		<span class="badge vd_bg-red" id="notificationscount"><?php echo $notifications ?></span>        
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
           		Notifications 
               <div class="vd_panel-menu">
                </div>
           </div>                 
		   <div class="content-list" id="mainnotifications">	
           	
               <div class="closing text-center" style="">
               		<a href="#" onclick="dashboard()">See All Notifications <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content -->         
    </li>  
     
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
                <img src="<?php echo $photo ?>" alt="Profile" />               
            </span>
            <span class="mega-name"><?php echo $onename ?><i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a>
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">               
                    <li> <a href="#" onclick="changelogin()"> <div class="menu-icon"><i class=" fa fa-cogs"></i></div> <div class="menu-text">Change Password</div> </a> </li>
                    <li> <a href="#" onclick="logout()"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Log Out</div> </a></li>
                     </ul>
            </div> 
        </div> 
      </div>     
  
    </li>               
     </ul>
<!-- Head menu search form ends -->                         
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 
<div class="content">
  <div class="container">
    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">
	<div class="navbar-tabs-menu clearfix">
			     <span class="expand-menu" data-action="expand-navbar-tabs-menu">
            	
            	                
            </span>
                                                 
    </div>
	   <div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
    	 <div class="vd_menu">

        <ul class="menuitem">

          <li style="">
          <a><span class="menu-text">This copy is licensed to:</span></a>
          <div style="background: #f00">
          <img src="<?php echo $logo ?>" style="float:left;margin-bottom:10px;width:100%"/>
          </div>
          <div style="clear:both"></div>
          <a><span class="menu-text"><b><?php echo $comname ?></span></a></b>
         </li>
         <div style="clear:both;width:100%"></div>

    <li>
          <?php if($rightsarr[101]=='YES'){
          echo'<a  href="#" onclick="dashboard()" >
          <span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">Dashboard</span>
           </a>';} ?>
     </li>  

     
    <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-users"> </i></span> 
            <span class="menu-text">Members</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>

              <li style="">
                    <?php if($rightsarr[107]=='YES'){
          echo'<a  href="#" onclick="newtenant()" >
                        <span class="menu-text">New Member</span>  
                    </a>';} ?>
                </li> 

                
                <li>
                    <?php if($rightsarr[108]=='YES'){
          echo'<a  href="#" onclick="findtenant()" >
                        <span class="menu-text">Find Member</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[109]=='YES'){
          echo'<a  href="#" onclick="edittenant()" >
                        <span class="menu-text">Edit Member Info</span>  
                    </a>';} ?>
                </li> 
             

            <li>
                     <?php if($rightsarr[113]=='YES'){
          echo'<a  href="#" onclick="tenantfile()" >
                        <span class="menu-text">Member File</span>  
                        </a>';} ?>
                </li> 

                <li>
                     <?php if($rightsarr[114]=='YES'){
          echo'<a  href="#" onclick="checkout()" >
                        <span class="menu-text">Archive Member</span>  
                        </a>';} ?>
                </li> 

               
               <li>
                     <?php if($rightsarr[119]=='YES'){
              echo'<a  href="#" onclick="extenants()" >
                        <span class="menu-text">Ex-Members</span>  
                        </a>';} ?>
                </li> 



                
            </ul>   
        </div>
    </li> 

    <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="icon-vcard"> </i></span> 
            <span class="menu-text">Cards</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul> 

             <li>
                 <?php if($rightsarr[178]=='YES'){
          echo'<a  href="#" onclick="cardregister()" >
                        <span class="menu-text">Card Registry</span>  
                        </a>';} ?>
                </li> 


                <li>
                    <?php if($rightsarr[120]=='YES'){
          echo'<a  href="#" onclick="findcards()" >
                        <span class="menu-text">Find Cards</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[129]=='YES'){
                  echo'<a  href="#" onclick="assigncard()" >
                        <span class="menu-text">Card Assignment</span>  
                    </a>';} ?>
                </li> 
                
                

            </ul>   
        </div>
    </li> 


     <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-institution"> </i></span> 
            <span class="menu-text">CME's</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul> 
             <li>
                      <?php if($rightsarr[138]=='YES'){
              echo'<a  href="#" onclick="cmeregistry()" >
                        <span class="menu-text">CME Registry</span>  
                    </a>';} ?>
                </li>  
                <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="findcme()" >
                        <span class="menu-text">Find CME</span>  
                    </a>';} ?>
                </li> 


                <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seecme(1)" >
                        <span class="menu-text">Edit CME</span>  
                    </a>';} ?>
                </li> 
                 <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seecme(2)" >
                        <span class="menu-text">Delete CME</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[135]=='YES'){
          echo'<a  href="#" onclick="seecme(3)" >
                        <span class="menu-text">CME File</span>  
                    </a>';} ?>
                </li> 
               
               

               

                

            </ul>   
        </div>
    </li> 


    <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-briefcase"> </i></span> 
            <span class="menu-text">Workshops</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul> 
             <li>
                      <?php if($rightsarr[138]=='YES'){
              echo'<a  href="#" onclick="workregistry()" >
                        <span class="menu-text">Workshops Registry</span>  
                    </a>';} ?>
                </li>  
                <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="findworkshops()" >
                        <span class="menu-text">Find Workshops</span>  
                    </a>';} ?>
                </li> 
                 <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seeworkshop(1)" >
                        <span class="menu-text">Edit Workshop</span>  
                    </a>';} ?>
                </li> 
                 <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seeworkshop(2)" >
                        <span class="menu-text">Delete Workshop</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[135]=='YES'){
          echo'<a  href="#" onclick="seeworkshop(3)" >
                        <span class="menu-text">Workshop File</span>  
                    </a>';} ?>
                </li>

                <li>
                    <?php if($rightsarr[135]=='YES'){
                echo'<a  href="#" onclick="seeworkshop(4)" >
                        <span class="menu-text">Workshop Attendance</span>  
                    </a>';} ?>
                </li>  
               

               

                

            </ul>   
        </div>
    </li> 

    <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-bullhorn"> </i></span> 
            <span class="menu-text">Forums</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul> 
             

                  <li>
                      <?php if($rightsarr[138]=='YES'){
              echo'<a  href="#" onclick="forumsregistry()" >
                        <span class="menu-text">Forums Registry</span>  
                    </a>';} ?>
                </li>  
                <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="findforums()" >
                        <span class="menu-text">Find Forum</span>  
                    </a>';} ?>
                </li> 

                  <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seeforum(1)" >
                        <span class="menu-text">Edit Forum</span>  
                    </a>';} ?>
                </li> 
                 <li>
                    <?php if($rightsarr[134]=='YES'){
          echo'<a  href="#" onclick="seeforum(2)" >
                        <span class="menu-text">Delete Forum</span>  
                    </a>';} ?>
                </li> 


                <li>
                    <?php if($rightsarr[135]=='YES'){
          echo'<a  href="#" onclick="seeforum(3)" >
                        <span class="menu-text">Forum File</span>  
                    </a>';} ?>
                </li> 
               


                

            </ul>   
        </div>
    </li> 



      <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="icon-mail"> </i></span> 
            <span class="menu-text">Communication</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <?php if($rightsarr[139]=='YES'){
          echo'<a  href="#" onclick="bulksms()" >
                        <span class="menu-text">Bulk SMS</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[139]=='YES'){
                   echo'<a  href="#" onclick="bulkemail()" href="#">
                        <span class="menu-text">Bulk E-Mail</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[141]=='YES'){
          echo'<a  href="#" onclick="findsms()" >
                        <span class="menu-text">Find SMS</span>  
                    </a>';} ?>
                </li> 
              

                <li>
                    <?php if($rightsarr[140]=='YES'){
          echo'<a  href="#" onclick="findemails()" >
                        <span class="menu-text">Find Emails</span>  
                    </a>';} ?>
                </li> 

                 
               </ul>   
        </div>
    </li> 

    <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-money"> </i></span> 
            <span class="menu-text">Accounts</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul>  
              <li>
                    <?php if($rightsarr[142]=='YES'){
          echo'<a  href="#" onclick="invoicing()" >
                        <span class="menu-text">Post Invoices</span>  
                    </a>';} ?>
                </li> 

                 <li>
                    <?php if($rightsarr[143]=='YES'){
          echo'<a  href="#" onclick="multipleinvoicing()" >
                        <span class="menu-text">Multiple Member Invoicing</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[145]=='YES'){
                echo'<a  href="#" onclick="receipting()">
                        <span class="menu-text">Receive Payments</span>  
                    </a>';} ?>
                </li> 

                   <li>
                    <?php if($rightsarr[175]=='YES'){
                echo'<a  href="#" onclick="creditnote()" >
                        <span class="menu-text">Credit Notes</span>  
                    </a>';} ?>
                </li> 

                 <li>
                    <?php if($rightsarr[176]=='YES'){
          echo'<a  href="#" onclick="refunds()" >
                        <span class="menu-text">Member Refunds</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[146]=='YES'){
          echo'<a  href="#" onclick="findrent()" >
                        <span class="menu-text">Find Member Entries</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[147]=='YES'){
          echo'<a  href="#" onclick="journalent()" >
                        <span class="menu-text">Make Journal Entries</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[148]=='YES'){
          echo'<a  href="#" onclick="findjournal()" >
                        <span class="menu-text">Find Journal Entries</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[149]=='YES'){
          echo'<a  href="#" onclick="ledgers()" >
                        <span class="menu-text">Chart of Accounts</span>  
                    </a>';} ?>
                </li> 

                 <li>
                    <?php if($rightsarr[176]=='YES'){
                  echo'<a  href="#" onclick="billables()" >
                        <span class="menu-text">Set Billable Items</span>  
                    </a>';} ?>
                </li> 


                <li>
                    <?php if($rightsarr[150]=='YES'){
                  echo'<a  href="#" onclick="supinvoice()" >
                        <span class="menu-text">Post Supplier Invoices</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[151]=='YES'){
          echo'<a  href="#" onclick="findsupinv()" >
                        <span class="menu-text">Find Supplier Invoices</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[152]=='YES'){
          echo'<a  href="#" onclick="expman()" >
                        <span class="menu-text">Expenses Management</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[153]=='YES'){
          echo'<a  href="#" onclick="addsup()" >
                        <span class="menu-text">Add/Edit Suppliers</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[154]=='YES'){
          echo'<a  href="#" onclick="paysup()" >
                        <span class="menu-text">Pay Supplier Invoices</span>  
                    </a>';} ?>
                </li> 

                <li>
                    <?php if($rightsarr[155]=='YES'){
          echo'<a  href="#" onclick="bank()" >
                        <span class="menu-text">Bank Transactions</span>  
                    </a>';} ?>
                </li> 

              
                <li style="">
                    <?php if($rightsarr[183]=='YES'){
                  echo'<a  href="#" onclick="budman()" >
                        <span class="menu-text">Budget Management</span>  
                    </a>';} ?>
                </li> 
                


                 

            </ul>   
        </div>
    </li> 


     
   

     <li>
      <a href="javascript:void(0);" data-action="click-trigger">
          <span class="menu-icon"><i class="fa fa-gears"> </i></span> 
            <span class="menu-text">Tools & Settings</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
        </a>
      <div class="child-menu"  data-action="click-target">
            <ul> 
            <li>
                    <?php if($rightsarr[158]=='YES'){
          echo'<a  href="#" onclick="company()" >
                        <span class="menu-text">Company Details</span>  
                    </a>';} ?>
                </li>  
                <li>
                    <?php if($rightsarr[159]=='YES'){
          echo'<a  href="#" onclick="adduser()" >
                        <span class="menu-text">System Users Manager</span>  
                    </a>';} ?>
                </li> 
                
                <li>
                    <?php if($rightsarr[160]=='YES'){
          echo'<a  href="#" onclick="useraccess()" >
                        <span class="menu-text">User Access Rights</span>  
                    </a>';} ?>
                </li> 
                <li>
                    <?php if($rightsarr[161]=='YES'){
          echo'<a  href="#" onclick="variables()" >
                        <span class="menu-text">Add/Edit System Variables</span>  
                    </a>';} ?>
                </li> 

            
                <li>
                    <?php if($rightsarr[162]=='YES'){
                    echo'<a  href="#" onclick="changelogin()" >
                        <span class="menu-text">Change Password</span>  
                    </a>';} ?>
                </li> 

            </ul>   
        </div>
    </li> 

    <li>
      <a  href="#" onclick="reports()" >
            <span class="menu-icon"><i class="fa fa-signal"> </i></span> 
            <span class="menu-text">Reports</span>  
           </a>
      
    </li> 
    


            <li>
                 <a  href="#" onclick="logout()" >
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>

            <li style="height:100px">
                <a href="index.php">
                   <span class="menu-text"></span>             
                </a>
                
            </li>

           

   
                 
</ul>


<!-- Head menu search form ends -->     </div>             
    </div>     
</div>    <div class="vd_navbar vd_nav-width vd_navbar-chat vd_bg-black-80 vd_navbar-right   ">
	<div class="navbar-tabs-menu clearfix">
		 
            <div class="menu-container">               
        		 <div class="navbar-search-wrapper">
    <div class="navbar-search vd_bg-black-30">
        <span class="append-icon"><i class="fa fa-search"></i></span>
        <input type="text" placeholder="Search" class="vd_menu-search-text no-bg no-bd vd_white width-70" name="search">
        <div class="pull-right search-config">                                
            <a  data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle" ><span class="prepend-icon vd_grey"><i class="fa fa-cog"></i></span></a>                                
        </div>
    </div>
</div>  
            </div>        
                                                 
    </div>
	<div class="navbar-menu clearfix">
    	<div class="content-list content-image content-chat">
            
        </div>

            
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>    
    <!-- Middle Content Start -->
     <div class="vd_head-section clearfix">
      <div class="vd_panel-header">
       <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
          <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
          <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
          <?php
          echo' <div class="fullscreen-button menu" data-original-title="Previous Window" data-toggle="tooltip" data-placement="bottom" onclick="linkup1()"><i class="fa fa-reply"></i></div>
           <div class="fullscreen-button menu" data-original-title="Reload Window" data-toggle="tooltip" data-placement="bottom" onclick="linkup2()"><i class="fa fa-refresh"></i></div>';
          ?>
          <div class="fullscreen-button menu" data-original-title="Close Window" data-toggle="tooltip" data-placement="bottom"> <i class="icon-logout" onclick="hidecont()"></i> </div>
          
        </div>

      </div>
    </div>
    <!-- vd_head-section -->
    <input type="hidden" id="thekey" value="0" style="float:right;width:30px"/><div id="keyresponse"></div>
    <div id="refreshnotif"></div>
    <div class="vd_content-wrapper" id="mainp"   style="margin-bottom:20px">


   


    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<div id="automate"></div>

<!-- Footer Start -->
  <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright" style="text-align:center">
                  	Copyright &copy;2013-<?php echo date('Y') ?> QET SYSTEMS. All Rights Reserved.
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a>';} ?> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/theme.js"></script>



<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->

<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="js/caroufredsel.js"></script> 
<script type="text/javascript" src="js/plugins.js"></script>

<script type="text/javascript" src="plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="plugins/pnotify/js/jquery.pnotify.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>



 
<!-- Intro JS (Tour) -->

<script type="text/javascript" src="plugins/introjs/js/intro.min.js"></script>
<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>


<!-- Sky Icons -->

<script type="text/javascript" src="plugins/skycons/skycons.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="custom/custom.js"></script>
<script src="js/date.js" type="text/javascript"></script>
<script src="js/blockui.js" type="text/javascript"></script>
<script src="js/idle-timer.min.js" type="text/javascript"></script>
<script src="js/jquery.ba-dotimeout.js" type="text/javascript"></script>
<script src="js/select2.js" type="text/javascript"></script>
<script type="text/javascript">dashboard();</script>

<!-- Specific Page Scripts END -->

</body>

<?php

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





$activities='';
$resulta =mysql_query("select * from activities");
$num_resultsa = mysql_num_rows($resulta); 
for ($i=0; $i <$num_resultsa; $i++) {
$row=mysql_fetch_array($resulta);
$item=stripslashes($row['id']).'-'.stripslashes($row['name']);
$activities.='"'.$item.'",';
}
$len=strlen($activities);
$a=$len-1;
$activities=substr($activities,0,$a);
$_SESSION['activities']=$activities;

$ledgers='';
$resulta =mysql_query("select * from ledgers where status=1  and parent!=1 order by name");
$num_resultsa = mysql_num_rows($resulta); 
for ($i=0; $i <$num_resultsa; $i++) {
$row=mysql_fetch_array($resulta);
$item=stripslashes($row['ledgerid']).'-'.stripslashes($row['name']);
$ledgers.='"'.$item.'",';
}
$len=strlen($ledgers);
$a=$len-1;
$ledgers=substr($ledgers,0,$a);
$_SESSION['ledgers']=$ledgers;


$resulte = mysql_query("update ledgerlock set status=0"); 

?>
<script type="text/javascript">

  window.onload = setupRefresh;
  var timer=0;
  function setupRefresh(){
  timer=setInterval("auto_logout();",600000);
  timer3=setInterval("refreshnotif();",300000);
  }


  function refreshnotif(){

    $("#refreshnotif").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
    $.ajax({
    url:'bridge.php',
    data:{id:181},
    success:function(data){
    $('#refreshnotif').html(data);
    }
    });
}
  

function reset_interval(){
  if(timer!=0){
    clearInterval(timer);
    timer=0;
    timer=setInterval("auto_logout();",600000);
  }
}
function auto_logout(){
  var b = $('#remote').val();
   window.location.href = "logout.php";
}
</script>
<script type="text/javascript">
var comname='<?php echo $comname; ?>';
function getClockTime(){
  return comname + '<BR/><BR/>'+ Date.parse('now').toString('dddd, MMMM d, yyyy') + '<br><BR/>' +  Date.parse('now').toString('h:mm:ss tt');
}
function updateScreensaverClock(){
  $('#screenSaverTime').html( getClockTime() );
  $.doTimeout('screensaverClockTimer', 500, function(){
    updateScreensaverClock();
  });
}
function stopScreensaverClock(){
  $.doTimeout('screensaverClockTimer');
}
function startScreensaver(){
  $.blockUI({
    fadeIn:1000,
    constrainTabKey: true,
    bindEvents: true,
    baseZ: 100000,
    fadeOut:1000,
    message:'<div id="screenSaverTime">' + getClockTime() + '<\/div>',
    overlayCSS: { 
      opacity: 0.78
    },
    css: { 
      border: 'none',
      padding: '15px',
      backgroundColor: '#000',
      '-webkit-border-radius': '10px',
      '-moz-border-radius': '10px',
      opacity: 0.8,
      color: '#fff',
      fontSize:'20px',
      fontWeight:'bold'
    },
    onOverlayClick: $.unblockUI,
    ignoreIfBlocked: true,
    focusInput: true,
    onBlock:updateScreensaverClock,
    onUnblock:stopScreensaverClock
  });
}
$(function(){
  $.idleTimer(60000);  // 300000 = 5 minutes
  $(document).on('idle.idleTimer', function(e, elem, obj){
    e.stopPropagation(); 
    startScreensaver();
  });
  $(document).on('active.idleTimer', function(e, elem, obj, triggerevent){
    $.unblockUI();
  });
});
</script>
<script type="text/javascript">
//$('#mainp').css("background", "url('<?php echo $watermark ?>') no-repeat center");
//dashboard();
//updatescript();
refreshnotif();
</script>

<?php

$result = mysql_query("select * from backup where date='".date('d/m/Y')."'");
$num_results = mysql_num_rows($result);
if($num_results==0){
$resultz = mysql_query("insert into backup values('0','".date('d/m/Y')."')");
echo "<script>updatescript();</script>";
}
?>

<!-- Mirrored from vendroid.venmond.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Feb 2015 17:33:23 GMT -->
</html>