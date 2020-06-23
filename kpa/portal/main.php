<?php include('db_fns.php');
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from tenants where kpano='".$username."'");
$row=mysql_fetch_array($result);
$usertype='User';
$comname=$fullname=stripslashes($row['bname']);

$userid=stripslashes($row['tid']);
$userdep=stripslashes($row['mgroup']);
$profilepic=$_SESSION['profilephoto']=$photo=stripslashes($row['profile']);
$onename = explode(" ", $fullname); $onename= $onename[0];
include('functions.php'); 

$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);

$tel=stripslashes($row['Tel']);
$comadd=$Add=stripslashes($row['Address']);
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
     <title>KPA Central Member Portal</title>
    <meta name="keywords" content="Backup Management System" />
    <meta name="description" content="Backup Management System">
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

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="#" style="font-size:16px">KPA CENTRAL</a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
            		      		                    
                	
                                       
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
                          
                                    
                   	 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-5 col-xs-12">
            		
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

        <ul>

          <li>
          <a><span class="menu-text"><b>KPA Central MEMBER PORTAL</b></span></a>
          <img src="<?php echo $logo ?>" style="float:left;Width:100%;margin-bottom:10px"/>
         </li>
         <div style="clear:both;width:100%"></div>

            <li>
                <?php if($rightsarr[101]=='YES'){
                echo'<a onclick="dashboard()" href="#">
                <span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
                  <span class="menu-text">Dashboard</span>
                 </a>';} ?>
            </li>  

            <li>
                <?php if($rightsarr[101]=='YES'){
                echo'<a onclick="userprofile()" href="#">
                <span class="menu-icon"><i class="fa fa-user"></i></span> 
                  <span class="menu-text">My Profile</span>
                 </a>';} ?>
            </li>  


              <li>
                 <a onclick="calendarpanel()" href="#">
                    <span class="menu-icon"><i class="fa fa-calendar"></i></span>          
                    <span class="menu-text">Calendar & Events</span>             
                </a>
                
            </li>

            
             <li>
                 <a onclick="cmepanel()" href="#">
                    <span class="menu-icon"><i class="fa fa-cloud"></i></span>          
                    <span class="menu-text">CME's</span>             
                </a>
                
            </li>

            <li>
                <?php if($rightsarr[101]=='YES'){
                echo'<a onclick="forumpanel()" href="#">
                <span class="menu-icon"><i class="fa fa-bullhorn"></i></span> 
                  <span class="menu-text">Forums</span>
                 </a>';} ?>
            </li>  

            <li>
                <?php if($rightsarr[101]=='YES'){
                echo'<a onclick="statementpanel()" href="#">
                <span class="menu-icon"><i class="fa fa-briefcase"></i></span> 
                  <span class="menu-text">My Statement</span>
                 </a>';} ?>
            </li>  


    
              <li>
                 <a onclick="changelogin()" href="#">
                    <span class="menu-icon"><i class="fa fa-gears"></i></span>          
                    <span class="menu-text">Change Password</span>             
                </a>
                
            </li>


            <li>
                 <a onclick="logout()" href="#">
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
    
    <div class="vd_content-wrapper" id="mainp">


   


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
                  	Copyright &copy;<?php echo date('Y') ?> QET SYSTEMS. All Rights Reserved 
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

<!--script type="text/javascript">dashboard()</script-->

<!-- Specific Page Scripts END -->

</body>


<script type="text/javascript">
$('#mainp').css("background", "url('<?php echo $watermark ?>') no-repeat right");
dashboard();
</script>
<!-- Mirrored from vendroid.venmond.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Feb 2015 17:33:23 GMT -->
</html>