<?php include('db_fns.php');
date_default_timezone_set('Africa/Nairobi');  
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from tenants where kpano='".$username."'");
$row=mysql_fetch_array($result);
$usertype='User';
$userid=stripslashes($row['tid']);
$profilepic=stripslashes($row['profile']);
$system=0;

$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=stripslashes($row['CompanyName']);
$comadd=$Add=stripslashes($row['Address']);
$comprop=stripslashes($row['Property']);
$complot=stripslashes($row['Plot']);

include('functions.php'); 
}
//else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<script type="text/javascript" src="custom/custom.js"></script>
<?php


$id=$_GET['id'];

switch($id){
              
case 1:

$_SESSION['rightsarr']=$rightsarr=array();
$result =mysql_query("select * from accesstbl");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $var=stripslashes($row[$usertype]);
  $code=stripslashes($row['AccessCode']);
  $_SESSION['rightsarr'][$code]=$rightsarr[$code]=$var;
}
  
  /*

  $dir    = '../clientbackups/'.$username.'/';
  $_SESSION['backups']=$backups = scandir($dir, 1);
  $totbackups=0;$totsize=0;$size=0;$maxsize=0;$maxdate=0;

  foreach ($backups as $key => $val) {
    if(strlen($val)>2){
      $size=filesize($dir.'/'.$val);
      $totbackups+=1;
      $totsize+=$size;

      $dblen=strlen($system);
      $date=substr($val,$dblen,8);
      if($date>$maxdate){$maxdate=$date;$maxsize=filesize($dir.'/'.$val);}
    }

  }

  $totsize=round(($totsize/1000000),2);
  $maxsize=round(($maxsize/1000000),2);


*/


           //calendar
          $events='';
          $result =mysql_query("select * from events where username='".$username."' and status=1");
          $num_results = mysql_num_rows($result); 
          for ($i=0; $i <$num_results; $i++) {
            $row=mysql_fetch_array($result);
            $code=stripslashes($row['id']);
            $title=stripslashes($row['name']);
            $startstamp=stripslashes($row['startstamp']);
            $endstamp=stripslashes($row['endstamp']);
            $sy=substr($startstamp,0,4);
            $sm=substr($startstamp,4,2)-1;
            $sd=substr($startstamp,6,2);
            $sh=substr($startstamp,8,2);
            $si=substr($startstamp,10,2);

           
            $ey=substr($endstamp,0,4);
            $em=substr($endstamp,4,2)-1;
            $ed=substr($endstamp,6,2);
            $eh=substr($endstamp,8,2);
            $ei=substr($endstamp,10,2);

            $events.="  {id: ".$code.",title: '".$title."',start: new Date(".$sy.", ".$sm.", ".$sd.", ".$sh.", ".$si."),end: new Date(".$ey.", ".$em.", ".$ed.", ".$eh.", ".$ei.") },";

          }


          $len=strlen($events);
          $len=$len-1;
          $events='['.substr($events,0,$len).']';


          
          //weather



          $city="Nairobi";
          $country="KE"; //Two digit country code
          $url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en&APPID=52322b2751dd8a3e357d01489cccd413";
          $json=file_get_contents($url);
          $data=json_decode($json,true);
          //Get current Temperature in Celsius
          $temp=round($data['main']['temp'],1);
          //Get Temp-MIN
          $temp_min=round($data['main']['temp_min'],1);
          //Get Temp-max
          $temp_max=round($data['main']['temp_max'],1);
          //Get weather condition
          $weather_desc=$data['weather'][0]['description'];
          //Get cloud percentage
          $cloud_per=round($data['clouds']['all'],1);
          //Get wind speed
          $speed=round($data['wind']['speed'],1);
          //Get HUMIDITY
          $humidity=round($data['main']['humidity'],1);

          if($temp>0){

            $resultg = mysql_query("update weather set city='".$city."',temp='".$temp."',temp_min='".$temp_min."',temp_max='".$temp_max."',humidity='".$humidity."',speed='".$speed."',description='".$weather_desc."' where id=1");  
          }

          $result =mysql_query("select * from weather where id=1");
          $row=mysql_fetch_array($result);
          $city=stripslashes($row['city']);
          $temp=stripslashes($row['temp']);
          $temp_min=stripslashes($row['temp_min']);
          $temp_max=stripslashes($row['temp_max']);
          $humidity=stripslashes($row['humidity']);
          $speed=stripslashes($row['speed']);
          $weather_desc=stripslashes($row['description']);




         
          $result =mysql_query("select * from tenants where kpano='".$username."'");
          $row=mysql_fetch_array($result);
          $pointsbal=stripslashes($row['pointsbal']);
          $curbal=stripslashes($row['bal']);
          


          $result =mysql_query("select * from cme where endstamp>='".date('Ymd')."'");
          $cmes = mysql_num_rows($result);

          $result =mysql_query("select * from workshopregister where  stamp>'".date('Ymd')."0000'");
          $workshops = mysql_num_rows($result);
  


echo'
<div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>User Dashboard</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
</div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          <div class="vd_content-section clearfix">';


           echo'<div class="row">
            <div class="col-md-12">
                
                <div class="row">
                  <div class="col-md-3">
                    <div class="vd_status-widget vd_bg-blue  widget">
                      <div class="vd_panel-menu"> </div>
                                  <!-- vd_panel-menu --> 
                                                                     
                                        <a class="panel-body" href="#">                                
                                            <div class="clearfix">
                                                <span class="menu-icon">
                                                    <i class="fa fa-smile-o"></i>
                                                </span>
                                                <span class="menu-value">
                                                     '.floatval($pointsbal).'
                                                </span>  
                                            </div>   
                                            <div class="menu-text clearfix">
                                                Total Points
                                            </div>  
                                         </a>                                                                
                                    </div>  

                                 </div>
                  <!--col-xs-6 -->
                  <div class="col-md-3">
                    <div class="vd_status-widget vd_bg-red widget">
    <div class="vd_panel-menu">
  
</div>
<!-- vd_panel-menu --> 
        <a class="panel-body"  href="#">                                
        <div class="clearfix">
            <span class="menu-icon">
                 <i class="fa fa-cloud"></i>
            </span>
            <span class="menu-value">
                '.$cmes.'
            </span>  
        </div>   
        <div class="menu-text clearfix">
            Online CME`s
        </div>  
     </a>                              
                                                                    
</div>                   </div>
                  <!--col-xs-6 --> 
                
                  <div class="col-md-3">
                    <div class="vd_status-widget vd_bg-green widget">
    <div class="vd_panel-menu">
  
</div>
<!-- vd_panel-menu --> 

<a class="panel-body"  href="#">                                  
        <div class="clearfix">
            <span class="menu-icon">
                <i class="fa fa-calendar"></i>
            </span>
             <span class="menu-value" style="text-align:left;margin-left:5px;font-size:22px">
                '.$workshops.'
            </span>  
        </div>   
        <div class="menu-text clearfix">
           Upcoming Events
        </div>
     </a>  
                                  
                                                                
</div>                    </div>
                  <!--col-xs-6 -->

                    <div class="col-md-3">
                    <div class="vd_status-widget vd_bg-yellow widget">
    <div class="vd_panel-menu">
  
</div>
<!-- vd_panel-menu --> 

<a class="panel-body"  href="#">                                  
        <div class="clearfix">
            <span class="menu-icon">
                <i class="fa fa-money"></i>
            </span>
             <span class="menu-value"> 
                '.number_format(floatval($curbal)).'
            </span>  
        </div>   
        <div class="menu-text clearfix">
           A/c Balance
        </div>
     </a>  
                                  
                                                                
</div>                    </div>
                  <!--col-xs-6 -->
                 
                </div>
                <!-- .row --> 
                
              </div>
              <!-- .col-md-5 --> 
            </div>


  <div class="row">

               <div class="col-md-12">
                
<div class="panel widget panel-bd-top vd_todo-widget light-widget">
 <div class="panel-body">
    <h2 class="mgbt-xs-20"> <span class="append-icon"> <i class="fa fa-arrows vd_green"></i> </span> Jump to Section</h2>


      <div class="isotope js-isotope vd_gallery text-center" >
              <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="userprofile()"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/profile.png"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">Profile</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>
                <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="calendarpanel()"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/calendar.png"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">Events</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>
              
                <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="cmepanel()"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/cme.png"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">CME</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>

                <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="forumpanel()"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/forum.png"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">Forum</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>

                <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="statementpanel()"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/statement.jpg"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">Statement</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>

                <div class="gallery-item" style="background:#fff;border:1px solid #ccc">
                <a href="#" onclick="renewmembership('.date('Y').')" title="Renew Membership"> 
                  <div class="btn vd_round-btn  btn-lg mgtp-15"><img src="img/renew.png"/></div>
                    <h3 class="filter-name mgtp-10 mgbt-xs-5 vd_grey font-semibold">Renew</h3>
                    <div class="bg-cover light"></div>                    
                </a>
              </div>

               
             
                           

            </div>
            <!-- isotope -->
    
   

  </div>
</div>
<!-- Panel Widget -->               </div>
              <!-- col-md-4 -->




  <div id="renewdiv"></div>     


</div>




<div class="row" style="display:none">


       


<div class="col-md-6  mgbt-xs-20 mgbt-md-0">
                
<div class="panel widget light-widget panel-bd-top">
  <div class="panel-body">
  <button class="btn vd_btn vd_bg-green" onclick="togglenewevent()"><span class="menu-icon"><i class="icon icon-calendar"></i></span>New Event</button>
  <div style="clear:both;width:100%;margin-bottom:10px"></div>

  <div id="newevent" class="col-md-12" style="border:1px solid #ccc;display:none">
  <form class="form-horizontal" action="#" role="form">
  <div style="clear:both;width:100%;margin-bottom:10px"></div>
   <div class="form-group">
    <label class="col-sm-3 control-label">Event Name</label>
    <div class="col-sm-8 controls">
     <input class="input-border-btm" type="text" id="eventname">
    </div>
    </div>

     <div class="form-group" style="">
      <label class="col-sm-3 control-label">Date & Time</label>
      <div class="col-sm-9 controls">
      <div class="input-group">
        <input type="text" placeholder="Date" id="eventdate" readonly>
       <span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#datepicker-icon"><i class="fa fa-calendar"></i></span>
      </div>
      </div>
     </div>

    

                            
  <div class="form-group form-actions">
    <div class="col-sm-3"> </div>
    <div class="col-sm-9">
      <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="addnewevent()"><i class="icon-ok"></i> Save Event</button>
       <div id="message" style="width:40px;height:40px;float:right"></div>
    </div>
  </div>
  </form>

  </div><!--new event -->

<div style="clear:both;width:100%;margin-bottom:10px"></div>
    <div id="calendar" class="mgtp-10"> </div>

                         

  </div>
</div>
<!-- Panel Widget -->              </div>
              <!-- col-md-6 -->
              
            
              
             
              
              <!--col-md-4-->
         

              <div class="col-md-6">
                
<div class="panel widget panel-bd-top vd_todo-widget light-widget">
  <div class="panel-heading no-title ">
    <div class="vd_panel-menu">
 
<!-- vd_panel-menu --> 
        </div>
  </div>
  <div class="panel-body">
    <h2 class="mgbt-xs-20"> <span class="append-icon"> <i class="fa fa-check-circle-o vd_green"></i> </span> Todo List</h2>
    <div class="input-group mgbt-xs-15">
      <input type="text" id="newtodo" placeholder="New Task...">
      <div class="input-group-btn">
        <button onClick="newtask()" data-toggle="dropdown" class="btn dropdown-toggle vd_bg-green vd_white" type="button"><i class="fa fa-plus fa-fw"></i></button>
      </div>
      <!-- /btn-group --> 
    </div>
    <div  data-rel="scroll">  
    <div class="controls" style="max-height:overflow-y:auto" id="alltasks">';
    taskscount($username);
    $result =mysql_query("select * from todo where status=0 and username='".$username."'");
    $num_results = mysql_num_rows($result);
      for ($i=0; $i <$num_results; $i++) {
          $row=mysql_fetch_array($result);
          $code=stripslashes($row['id']);
         echo '<div class="vd_checkbox checkbox-done" onClick="checktask('.$code.')">
          <input type="checkbox" id="checkbox-'.$code.'" value="1" name="todo'.$code.'">
          <label for="checkbox-'.$code.'"> '.stripslashes($row['name']).' </label>
          </div>';

         }

  echo'</div>
   </div>


  </div>
</div>
<!-- Panel Widget -->               </div>
</div>              <!-- col-md-4 -->

<div class="row">
 <div class="col-md-12" style="">
                
<div class="panel widget vd_weather-widget">
  <div class="panel-heading no-title vd_bg-yellow"> 
  </div>
  <div class="panel-body vd_bg-yellow vd_white">
   <h3 class="weather-description mgbt-xs-5">'.$city.'</h3>
    <h1 class="weather-degree">'.$temp.'&deg;</h1>
    <h4 class="weather-description mgbt-xs-5">'.$weather_desc.'</h4>
    <h4 class="weather-degree-2">'.$temp_min.'&deg; / '.$temp_max.'&deg;</h4>
    <div class="weather-icon">
      <canvas id="clear-day" width="80" height="80"> </canvas>
    </div>
  </div>
  <div class="panel-body-list weather-info">
    <div class="col-xs-6 bdr-soft-grey">
      <h1 class="font-semibold vd_yellow weather-subinfo humid value" ><span>
        <canvas id="rain" width="36" height="36"></canvas>
        </span> '.$humidity.'%</h1>
    </div>
    <div class="col-xs-6">
      <h1 class="vd_yellow weather-subinfo" ><span class="append-icon">
        <canvas id="wind" width="36" height="36"></canvas>
        </span><span class="font-semibold prepend-icon wind-value">'.$speed.'</span><span class="wind-text">m/s</span></h1>
    </div>
  </div>
</div>
<!-- Panel Widget -->               </div>
              <!-- col-md-4 -->



            </div>';




   



              echo'   
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

     


<!-- Specific Page Scripts Put Here -->';



echo'<!-- Flot Chart  -->

<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.categories.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.animator.min.js"></script>';



echo'<!-- Calendar -->

<script type="text/javascript" src="plugins/moment/moment.min.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>

<script type="text/javascript" src="plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>';


echo"<script>var calendarevents=".$events."</script>"; 



?>
<script type="text/javascript">
//calendar


  

function getmonth(a){
var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
var d = new Date();
d.setMonth(d.getMonth()-a);
var d2=monthNames[d.getMonth()]+' '+d.getFullYear();
return d2;

}


</script>

<script type="text/javascript">

/* FULL CALENDAR  */

    $('#calendar').fullCalendar({
      header: {
        left:   'title',
        center: '',
        right:  'today prev,next'
      },
      editable: true,
      events: calendarevents,
        eventClick: function(event) {
            if (event.id) {
                var d = new Date(event.start);
                d=d.toString(); 
                e=d.substring(0,24);

                var d = new Date(event.end);
                d=d.toString(); 
                f=d.substring(0,24);

                swal({
                title: event.title,
                text: "Start:<b>"+e+"</b><BR/>End:<b>"+f+"</b>",
                html: true
                });

             }
        }
    });
    

// Skycons

      var icons = new Skycons({"color": "white","resizeClear": true}),
        icons_btm = new Skycons({"color": "#F89C2C","resizeClear": true}),
          list  = "clear-day",
      livd_btm = ["rain", "wind"
      ];
      icons.set(list,list)
      for(var i = livd_btm.length; i--; )
        icons_btm.set(livd_btm[i], livd_btm[i]);

      icons.play();
    icons_btm.play();

/* News Widget */
     $(".vd_news-widget .vd_carousel").carouFredSel({
      prev:{
        button : function()
        {
          return $(this).parent().parent().children('.vd_carousel-control').children('a:first-child')
        }
      },
      next:{
        button : function()
        {
          return $(this).parent().parent().children('.vd_carousel-control').children('a:last-child')
        }
      },    
      scroll: {
        fx: "crossfade",
        onBefore: function(){
            var target = "#front-1-clients";
            $(target).css("transition","all .5s ease-in-out 0s");       
          if ($(target).hasClass("vd_bg-soft-yellow")){           
            $(target).removeClass("vd_bg-soft-yellow");
            $(target).addClass("vd_bg-soft-red");   
          } else
          if ($(target).hasClass("vd_bg-soft-red")){            
            $(target).removeClass("vd_bg-soft-red");
            $(target).addClass("vd_bg-soft-blue");    
          } else
          if ($(target).hasClass("vd_bg-soft-blue")){           
            $(target).removeClass("vd_bg-soft-blue");
            $(target).addClass("vd_bg-soft-green");   
          } else
          if ($(target).hasClass("vd_bg-soft-green")){            
            $(target).removeClass("vd_bg-soft-green");
            $(target).addClass("vd_bg-soft-yellow");    
          }           
        }
      },
      width: "auto",
      height: "responsive",
      responsive: true,
      auto:3000
      
    });
  $('#eventdate').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' });

</script>
<?php


$resultc = mysql_query("select * from backup where date='".date('d/m/Y')."'");
if(mysql_num_rows($resultc)==0){

//echo "<script>automation()</script>";

 }

break;

case 2:
$result = mysql_query("insert into log values('','".$username." accesses New Contact Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>New Contact</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> New Contact Information </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Contact Person <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Business Name</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="bname">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Phone Number <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="phone">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Category </label>
                        <div class="col-sm-9 controls">
                         <select id="category">
                          <option value="">Select One...</option>';
                            $resulta =mysql_query("select * from categories order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                  
                          echo'
                          </select>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savecontact(1,0)"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


    case 3:
   $result = mysql_query("insert into log values('','".$username." accesses Contacts Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Contacts Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Contacts Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Contact Name</th>
                          <th>Business Name</th>
                          <th>Phone</th>
                          <th>Category</th>
                          <th>Remarks</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from contacts where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.stripslashes($row['name']).'</td>
                          <td>'.stripslashes($row['bname']).'</td>
                          <td>'.stripslashes($row['phone']).'</td>
                          <td>'.stripslashes($row['category']).'</td>
                          <td>'.stripslashes($row['remarks']).'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="intopen(1,'.$code.')">Send Message</option>
                            <option onclick="intopen(2,'.$code.')">Edit Contact</option>
                            <option onclick="intopen(3,'.$code.')">Remove Contact</option>
                           </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

        case 4:
  $param=$_GET['param'];
  $result = mysql_query("insert into log values('','".$username." accesses Contact Details Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $result =mysql_query("select * from contacts where id='".$param."' limit 0,1");
  $row=mysql_fetch_array($result);
 echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Contact</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Contact Information </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Contact Person <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="name" value="'.stripslashes($row['name']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Business Name <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="bname" value="'.stripslashes($row['bname']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Phone Number <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="phone" value="'.stripslashes($row['phone']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Category </label>
                        <div class="col-sm-9 controls">
                         <select id="category">
                          <option value="'.stripslashes($row['category']).'">'.stripslashes($row['category']).'</option>';
                            $resulta =mysql_query("select * from categories order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $rowa=mysql_fetch_array($resulta);
                              $name=stripslashes($rowa['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                  
                          echo'
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks">'.stripslashes($row['remarks']).'</textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savecontact(2,'.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case 5:
 $result = mysql_query("insert into log values('','".$username." accesses Import Contacts Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Import Contacts</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Import Contacts </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-12">To start with, we will need an Excel file having the Name and Phone Number of each and every person you wish to add to your Contacts.</label>
                       </div>

                       <div class="form-group">
                         <div class="col-sm-9 controls">
                      
                        <h5>NOTE:</h5>
                        <a class="labels">1. Upload only .csv File Format.</a><br/>
                        <a class="labels">2. The First row in the document should contain the Title sub-headings; as in the sample contacts below:</a><br/>
                        <a class="labels" href="img/qsms_sample_contacts.csv"><u>3. Sample Excel File</u></a><br/>


                       </div>

                       </div>

                    
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 



              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Import Contacts </h3>
                  </div>
                  <div class="panel-body">
                    
                    <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                    <dd class="custuploadblock_js">
                    <input style="opacity:0; float:left;" name="image" id="photoupload"  
                    class="transfileform_js" type="file">
                    </dd>
                    <iframe name="leiframe" id="leiframe" class="leiframe"  style="width:120px;height:160px; margin-left:20px">
                    </iframe>
                     <input type="hidden" id="stamp" name="stamp" value=""/>
                    <input type="hidden" id="id" name="id"  value="1"/>
                    <div class="cleaner_h5"></div>
                      <input type="submit" value="upload" id="send"  style="width:30%;margin-right:15%; float:right; cursor:pointer"class="in_field"/>
                    </form>
                      
                  
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

       case 6:
   $_SESSION['bulk']=array();
 $result = mysql_query("insert into log values('','".$username." accesses Send Messages Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Send Messages</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Contacts List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                       <input type="hidden" id="contlength" value="0"/>
                        <label style="float:left;cursor:pointer;text-decoration:underline" onclick="selectall(1)" class="col-sm-3">Select All</label>
                        <label style="float:left;cursor:pointer;text-decoration:underline" onclick="selectall(0)" class="col-sm-3">Unselect All</label>
                        <label style="float:left;" onclick="unselectall()" class="col-sm-2">Group:</label>
                        <div class="col-sm-4 controls">
                         <select id="category">
                          <option value="">Select One...</option>';
                            $resulta =mysql_query("select * from categories order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\" onClick=\"selectgroup('".$name."')\">".$name."</option>";
                            }
                  
                          echo'
                          </select>
                        </div>
                        </div>

                     <div class="form-group">
                     <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Contact Name</th>
                          <th>Phone</th>
                          <th>Include</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from contacts where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.stripslashes($row['name']).'</td>
                          <td>'.stripslashes($row['phone']).'</td>
                          <td> <input type="checkbox" value="1" class="include" name="include'.$code.'" onclick="checkcontact('.$code.')" id="include'.$code.'"></td>
                         
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                  </div>

                      

                    
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 



              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Send Message </h3>
                  </div>
                  <div class="panel-body">
                    
                       <div class="form-group">
                        <label style="float:left" class="col-sm-12" id="messlength">&nbsp;</label>
                       </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Message</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="7" class="width-100" id="messages" onkeyup="calcmesslength()"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-2"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savemessage()"><i class="icon-ok"></i> Send Message</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          </div>
                        <div class="col-sm-2" id="message"> </div>
                      </div>
                      
                  
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

       <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script>';


    break;

    case 6.1:

    $status=$_GET['status'];
    $code=$_GET['code'];
     if($status==1){
       $_SESSION['bulk'][$code]=$code;
    }else{
      unset($_SESSION['bulk'][$code]);
    }

   
    echo '<script>$("#contlength").val('.count($_SESSION['bulk']).');</script>';
    

    break;

    case 6.2:
     $status=$_GET['status'];
    $_SESSION['bulk']=array();

    if($status==1){


       $result =mysql_query("select * from contacts where status=1");
       $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
            $row=mysql_fetch_array($result);
            $code=stripslashes($row['id']);
         
             $_SESSION['bulk'][$code]=$code;
          }


      echo '<script>$(".include").prop("checked",true);</script>';
    }else{

      echo '<script>$(".include").prop("checked",false);</script>';
    }

     echo '<script>$("#contlength").val('.count($_SESSION['bulk']).');</script>';
    break;

    case 6.3:
     $name=$_GET['name'];
    $result =mysql_query("select * from contacts where category='".$name."' and status=1");
     $num_results = mysql_num_rows($result);
      for ($i=0; $i <$num_results; $i++) {
          $row=mysql_fetch_array($result);
          $code=stripslashes($row['id']);
          $_SESSION['bulk'][$code]=$code;
           echo '<script>$("#include'.$code.'").prop("checked",true);</script>';
        }

         echo '<script>$("#contlength").val('.count($_SESSION['bulk']).');</script>';

    break;
    
    
 





    case 7:
   $result = mysql_query("insert into log values('','".$username." accesses View Backups Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Backups</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Backups-View Backups</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Name</th>
                          <th>Size</th>
                          <th>Download</th>
                          </tr>
                      </thead>
                      <tbody>';
                    $code=0;
                    $dir    = '../clientbackups/'.$username.'/';
                    $totbackups=0;$totsize=0;$size=0;$maxsize=0;$maxdate=0;
                    foreach ($_SESSION['backups'] as $key => $val) {
                        if(strlen($val)>2){
                          $size=filesize($dir.'/'.$val);
                          $totbackups+=1;$code+=1;
                          $totsize+=$size;

                          $dblen=strlen($system); $date=substr($val,$dblen,8);
                          $dblen2=$dblen+8; $time=substr($val,$dblen2,4);
                          if($date>$maxdate){$maxdate=$date;$maxsize=filesize($dir.'/'.$val);}
                        

                          $size=round(($size/1000000),2);
                          
                         
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.$code.'</td>
                          <td>'.stamptodate($date).'</td>
                          <td>'.$time.' hrs</td>
                          <td>'.$val.'</td>
                          <td>'.$size.' MB</td>
                           <td class="menu-action"><a data-original-title="view" target="blank" href="'.$dir.'/'.$val.'" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-green vd_green"> <i class="fa fa-cloud-download"></i> </a></td>
                           </tr>';

                        }

                      }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;




case 8:
$sap=$param=$_GET['param'];
$resultx =mysql_query("select * from shopapps where id='".$param."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$soi=stripslashes($rowx['soi']);
$result = mysql_query("insert into log values('','".$username." accesses Edit Shop Application Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Shop Application</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Business Details </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.stripslashes($rowx['bname']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Nature of Business<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="nature" value="'.stripslashes($rowx['nature']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Period in Business </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="period" value="'.stripslashes($rowx['period']).'">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['address']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email Address <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['email']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['phone']).'">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Location </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="location" value="'.stripslashes($rowx['location']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Bankers </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.stripslashes($rowx['bankers']).'">
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 


               <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Directors Details </h3>
                  </div>
                  <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">1. Director</a></li>
                      <li><a href="#tab2" data-toggle="tab">2. Director</a></li>
                      <li><a href="#tab3" data-toggle="tab">3. Director</a></li>
                     </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab1">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname1" value="'.stripslashes($rowx['dname1']).'">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone1" value="'.stripslashes($rowx['dphone1']).'">
                        </div>
                      </div>


                      </div>
                      <div class="tab-pane" id="tab2">
                          

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname2" value="'.stripslashes($rowx['dname2']).'">
                        </div>
                      </div>
                        <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone2" value="'.stripslashes($rowx['dphone2']).'">
                        </div>
                      </div>
                          

                       </div>

                      <div class="tab-pane" id="tab3">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname3" value="'.stripslashes($rowx['dname3']).'">
                        </div>
                      </div>
                        <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone3" value="'.stripslashes($rowx['dphone3']).'">
                        </div>
                      </div>

                      </div>
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 



                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> References Details </h3>
                  </div>
                  <div class="panel-body">
                     <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab4" data-toggle="tab">1. Reference</a></li>
                      <li><a href="#tab5" data-toggle="tab">2. Reference</a></li>
                       </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab4">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rname1" value="'.stripslashes($rowx['rname1']).'">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rphone1" value="'.stripslashes($rowx['rphone1']).'">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Company</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rcom1" value="'.stripslashes($rowx['rcom1']).'">
                        </div>
                      </div>


                      </div>
                      <div class="tab-pane" id="tab5">
                          

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rname2" value="'.stripslashes($rowx['rname2']).'">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rphone2" value="'.stripslashes($rowx['rphone2']).'">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Company</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rcom2" value="'.stripslashes($rowx['rcom2']).'">
                        </div>
                      </div>
                          

                       </div>

                     
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 

              </div>
              <!-- col-md-12 --> 


              

               <div class="col-md-6">


                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Space Requirements </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     
                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Details</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="spacedetails" value="'.stripslashes($rowx['spacedetails']).'">
                        </div>
                      </div>
                       <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Special Requirements</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="spacespecial">'.stripslashes($rowx['spacespecial']).'</textarea>
                        </div>
                      </div>

                     </form>


                  </div>
                </div>
                <!-- Panel Widget --> 


                 <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Other Details/Notes</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     
                       <div class="form-group">
                        <div class="col-sm-12 controls">
                          <textarea rows="3" class="width-100" id="odetail">'.stripslashes($rowx['odetail']).'</textarea>
                        </div>
                      </div>

                     </form>


                  </div>
                </div>
                <!-- Panel Widget --> 


                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Documents Upload</h3>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                      <div class="col-sm-4" style="border-right:1px solid #ccc">
                      <ul class="nav nav-pills nav-stacked">
                      <li class="active" style="border:1px solid #ccc;border-radius:4px"><a href="#tab0" data-toggle="tab">Uploaded Documents</a></li>
                      <li style="border:1px solid #ccc;border-radius:4px" onclick="setype(\'Certificate_of_Incorporation\')"><a href="#tab6" data-toggle="tab">Cert of Incop/Regn</a></li>
                     <li><a href="#tab7" style="border:1px solid #ccc;border-radius:4px" onclick="setype(\'Memorandum/Articles_of_Association\')" data-toggle="tab">Memorandum & Articles</a></li>
                      <li><a href="#tab8"  style="border:1px solid #ccc;border-radius:4px" onclick="setype(\'Pin/Vat_Certificate\')" data-toggle="tab">Pin & VAT Cert</a></li>
                      <li><a href="#tab9"  style="border:1px solid #ccc;border-radius:4px" onclick="setype(\'Certificate_of_Confirmation\')" data-toggle="tab">Cert of Confirmation</a></li>
                      <li><a href="#tab10"  style="border:1px solid #ccc;border-radius:4px" onclick="setype(\'ID_Card_Copies\')" data-toggle="tab">ID Card Copies</a></li>
                      <li><a href="#tab11" style="border:1px solid #ccc;border-radius:4px"  onclick="setype(\'Pin_Copies\')"data-toggle="tab">Pin Copies</a></li>
                      </ul>     
                  </div>                      
                    <div class="col-sm-8">            
                    <div class="tab-content mgbt-xs-20">
                     <div class="tab-pane active" id="tab0">

                     <div style="width:100%;height:350px; overflow-y:auto; float:left; padding:2%">';
            
                          $resulta =mysql_query("select * from tendocs where soi='".$soi."' or sap='".$sap."' order by name");
                            $num_resultsa = mysql_num_rows($resulta);
                           for ($i=0; $i <$num_resultsa; $i++) {
                              $rowa=mysql_fetch_array($resulta);
                              $name=stripslashes($rowa['name']);
                              $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                              if(exif_imagetype('uploads/tenants/'.$name.'')){
                              $src='uploads/tenants/'.$name;
                              }
                              else if($type=='pdf'){
                                  $src='img/adobe.png';
                              }
                              else if($type=='xls'||$type=='xlsx'){
                                 $src='img/excel.png';
                              }
                              else if($type=='doc'||$type=='rtf'||$type=='docx'){
                                $src='img/word.png';
                              }else{
                                $src='img/format.png';
                              }
                              echo'<div style="border:1px solid #ccc; margin-bottom:10px;width:90%;min-height:100px;float:left;margin-right:10px;padding:5px">';
                              echo"<a href=\"uploads/tenants/".stripslashes($rowa['name'])."\"  target=\"_blank\"><img  src=\"".$src."\" alt=\"Photo\" style=\"float:left; max-width:100%; cursor:pointer\">
                             <div class=\"cleaner\"></div> ".stripslashes($rowa['details'])."</a>
                              </div>";
                            }

                       echo '</div>

                      </div><!-- end tab -->

                      <div class="tab-pane" id="tab6">

                        <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-3">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fname"  name="fname"  required>
                        </div>
                        </div>
                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe">
                        </iframe>
                        <input type="hidden" id="type" name="type" value="Document"/>
                        <input type="hidden"  name="soi" value=""/>
                        <input type="hidden"  name="sap" value="'.$param.'"/>
                        <input type="hidden"  name="tid" value=""/>
                        <input type="hidden"  name="type"   id="doctype" value="Certificate_of_Incorporation"/>
                        <input type="hidden" id="id" name="id"  value="1"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:30%" type="submit" onclick="uphoto()"><i class="icon-ok"></i>Upload</button>
                        </form>
                        <div class="cleaner_h5"></div>  
                        <div id="certdiv" style="width:100%;min-height:30px;"></div>
                        <div class="cleaner_h5"></div>                
     

                      </div><!-- end tab --> 
                    </div><!-- end sm-9 -->  
                    </div><!-- end row -->  
                     
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 


                 <!-- Panel Widget --> 


                 <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Save Application</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     
                       <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveshopapp(2,'.$sap.','.$soi.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>

                     </form>


                  </div>
                </div>
                <!-- Panel Widget --> 


              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


case 9:
$sap=$param=$_GET['param'];
$resultx =mysql_query("select * from shopapps where id='".$param."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$soi=stripslashes($rowx['soi']);
$result = mysql_query("insert into log values('','".$username." accesses View Shop Application Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>View Shop Application Form</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Business Details </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.stripslashes($rowx['bname']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Nature of Business <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="nature" value="'.stripslashes($rowx['nature']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Period in Business </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="period" value="'.stripslashes($rowx['period']).'" disabled class="vd_bd-red">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['address']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email Address <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['email']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['phone']).'" disabled class="vd_bd-red">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Location </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="location" value="'.stripslashes($rowx['location']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Bankers </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.stripslashes($rowx['bankers']).'" disabled class="vd_bd-red">
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 


               <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Directors Details </h3>
                  </div>
                  <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">1. Director</a></li>
                      <li><a href="#tab2" data-toggle="tab">2. Director</a></li>
                      <li><a href="#tab3" data-toggle="tab">3. Director</a></li>
                     </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab1">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname1" value="'.stripslashes($rowx['dname1']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone1" value="'.stripslashes($rowx['dphone1']).'" disabled class="vd_bd-red">
                        </div>
                      </div>


                      </div>
                      <div class="tab-pane" id="tab2">
                          

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname2" value="'.stripslashes($rowx['dname2']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                        <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone2" value="'.stripslashes($rowx['dphone2']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                          

                       </div>

                      <div class="tab-pane" id="tab3">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname3" value="'.stripslashes($rowx['dname3']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                        <div class="cleaner_h10"></div>  
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone3" value="'.stripslashes($rowx['dphone3']).'" disabled class="vd_bd-red">
                        </div>
                      </div>

                      </div>
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 



                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> References Details </h3>
                  </div>
                  <div class="panel-body">
                     <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab4" data-toggle="tab">1. Reference</a></li>
                      <li><a href="#tab5" data-toggle="tab">2. Reference</a></li>
                       </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab4">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rname1" value="'.stripslashes($rowx['rname1']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rphone1" value="'.stripslashes($rowx['rphone1']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Company</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rcom1" value="'.stripslashes($rowx['rcom1']).'" disabled class="vd_bd-red">
                        </div>
                      </div>


                      </div>
                      <div class="tab-pane" id="tab5">
                          

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rname2" value="'.stripslashes($rowx['rname2']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rphone2" value="'.stripslashes($rowx['rphone2']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Company</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rcom2" value="'.stripslashes($rowx['rcom2']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                          

                       </div>

                     
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 

              </div>
              <!-- col-md-12 --> 


              

               <div class="col-md-6">


                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Space Requirements </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     
                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Details</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="spacedetails" value="'.stripslashes($rowx['spacedetails']).'" disabled class="vd_bd-red">
                        </div>
                      </div>
                       <div class="cleaner_h10"></div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Special Requirements</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100 vd_bd-red" id="spacespecial" disabled>'.stripslashes($rowx['spacespecial']).'</textarea>
                        </div>
                      </div>

                     </form>


                  </div>
                </div>
                <!-- Panel Widget --> 


                 <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Other Details/Notes</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                     
                       <div class="form-group">
                        <div class="col-sm-12 controls">
                          <textarea rows="3" class="width-100 vd_bd-red" id="odetail" disabled>'.stripslashes($rowx['odetail']).'</textarea>
                        </div>
                      </div>

                     </form>


                  </div>
                </div>
                <!-- Panel Widget --> 


                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Documents Upload</h3>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                      <div class="col-sm-4" style="border-right:1px solid #ccc">
                      <ul class="nav nav-pills nav-stacked">
                      <li class="active" style="border:1px solid #ccc;border-radius:4px"><a href="#tab0" data-toggle="tab">Uploaded Documents</a></li>
                      </ul>     
                  </div>                      
                    <div class="col-sm-8">            
                    <div class="tab-content mgbt-xs-20">
                     <div class="tab-pane active" id="tab0">

                     <div style="width:100%;height:350px; overflow-y:auto; float:left; padding:2%">';
            
                          $resulta =mysql_query("select * from tendocs where soi='".$soi."' or sap='".$sap."' order by name");
                            $num_resultsa = mysql_num_rows($resulta);
                           for ($i=0; $i <$num_resultsa; $i++) {
                              $rowa=mysql_fetch_array($resulta);
                              $name=stripslashes($rowa['name']);
                               $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                              if(exif_imagetype('uploads/tenants/'.$name.'')){
                              $src='uploads/tenants/'.$name;
                              }
                              else if($type=='pdf'){
                                  $src='img/adobe.png';
                              }
                              else if($type=='xls'||$type=='slsx'){
                                 $src='img/excel.png';
                              }
                              else if($type=='doc'||$type=='rtf'||$type=='docx'){
                                $src='img/word.png';
                              }else{
                                $src='img/format.png';
                              }
                              echo'<div style="border:1px solid #ccc; margin-bottom:10px;width:90%;min-height:100px;float:left;margin-right:10px;padding:5px">';
                              echo"<a href=\"uploads/tenants/".stripslashes($rowa['name'])."\"  target=\"_blank\"><img  src=\"".$src."\" alt=\"Photo\" style=\"float:left; max-width:100%; cursor:pointer\">
                             <div class=\"cleaner\"></div> ".stripslashes($rowa['details'])."</a>
                              </div>";
                            }

                       echo '</div>

                      </div><!-- end tab -->

                      
                    </div><!-- end sm-9 -->  
                    </div><!-- end row -->  
                     
                    </div>


                  </div>
                </div>
                <!-- Panel Widget --> 

            </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


    case 10:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Letter of Offer</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Letter of Offer</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from shopapps where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['id']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
        onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:11,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 11:
$result = mysql_query("insert into log values('','".$username." accesses New Letter of Offer Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
$sap=$param=$_GET['param'];
$resultx =mysql_query("select * from shopapps where id='".$param."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$soi=stripslashes($rowx['soi']);
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Letter of Offer: '.stripslashes($rowx['bname']).'</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-pencil"></i> </span>Letter of Offer: '.stripslashes($rowx['bname']).'</h3>
                  </div>
                  <div  class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <p style="text-align:center">
                      <b>'.$comprop.'</b><br/>
                      LAND REFERENCE NO. '.$complot.'.<br/>
                     <b><u>LETTER OF OFFER</b></u><br/>

                      <b><u>SUBJECT TO LEASE</b></u></p>
                     
                      <button class="btn vd_btn vd_bg-green" data-toggle="modal" data-target="#myModal"><span class="menu-icon"><i class="fa fa-fw fa-gear"></i></span>Populate LOF</button>
                      <p style="text-align:left">
                      '.$comname.' hereby offers to the tenant below to lease the Premises described below subject to the following terms and conditions:-</p>
                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>1.&nbsp;&nbsp;&nbsp;Landlord:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      '.$comname.'<br/>
                      P.O Box '.$comadd.'<br/>
                      '.$comloc.'.<br/>
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>2.&nbsp;&nbsp;&nbsp;Tenant:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      <input type="text" disabled id="bname" class="input-border-btm width-30 vd_bd-red" placeholder="fill here" value="'.stripslashes($rowx['bname']).'">
                      <div class="cleaner"></div>
                      <input type="text" disabled id="address" class="input-border-btm width-30 vd_bd-red" placeholder="fill here" value="P.O BOX '.stripslashes($rowx['address']).'">
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>3.&nbsp;&nbsp;&nbsp;Premises:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">Unit Number
                      <input type="text" id="unit1" disabled class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                        located on the 
                      <input type="text"  id="location1" disabled class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                       as more particularly shown in the plan annexed hereto.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>4.&nbsp;&nbsp;&nbsp;Lease Term:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">The Premises will be leased to the Tenant for a term of  
                      <input type="text" disabled id="leaseterm1" class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                      from the commencement date set out below.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;Commencement:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">The lease will commence on      
                      <input type="text" disabled id="commencement1" class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                      (the "Lease Commencement Date").
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>6.&nbsp;&nbsp;&nbsp;Rent:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">The initial rent payable during the first year of the term of the lease will be KShs.    
                      <input disabled type="text" id="rent1" class="input-border-btm width-30 vd_bd-red" placeholder="fill here" value="">
                      per month inclusive of VAT.
                      <br/>
                      Rent will be payable monthly in advance, by the <input disabled type="text" id="rentdate1" class="input-border-btm width-10 vd_bd-red" placeholder="fill here" value=""> day of the month upon receipt of the invoice.
                      <br/>
                      The Rent for the first month will be payable on or before the Lease Commencement Date  <input disabled type="text" id="commencement2" class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                      <br/>
                      Any rent waived during the Fit Out Period (defined below) will be credited to the 2nd month’s rent.

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;Rent Escalations:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">The  rent  will  escalate  by        
                      <input type="text" id="escalation1" class="input-border-btm width-10 vd_bd-red" placeholder="fill here" value="">% after  every 
                        <input type="text" id="escalation_int1" class="input-border-btm width-10 vd_bd-red" placeholder="fill here" value=""> year(s) from  the  Term Commencement  Date, irrespective of any waiver of Rent during the Fit Out Period.  The rent will escalate as follows:-.
                       </p>
                      <textarea rows="7" class="width-100" id="escalation_breakdown" disabled></textarea>
                      </div>
                      </div>

                          <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header vd_bg-green vd_white">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title" id="myModalLabel">LOF Variables Entry</h4>
                                  </div>
                                  <div class="modal-body"> 

                                  

                                   <div class="form-group">
                                        <label class="col-sm-4 control-label">Unit</label>
                                        <div class="col-sm-7 controls">';
                                          $result =mysql_query("select * from houses where status=0");
                                          $num_results = mysql_num_rows($result);
                                         echo'<select id="unit" class="input-border-btm" required onchange="setunit()" >
                                          <option value="" selected></option>';
                                         for ($i=0; $i <$num_results; $i++) {
                                                $row=mysql_fetch_array($result);
                                                echo '<option value="'.stripslashes($row['rid']).'#'.stripslashes($row['roomno']).'#'.stripslashes($row['location']).'#'.stripslashes($row['rent']).'">'.stripslashes($row['roomno']).'</option>';
                                              }
                                         echo'</select>
                                          </div>

                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Location</label>
                                        <div class="col-sm-7 controls">
                                         <input  type="hidden" id="rid" required disabled>
                                         <input  type="hidden" id="roomno" required disabled>
                                          <input class="input-border-btm" type="text" id="location" required disabled>
                                        </div>

                                      </div>

                                       
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lease Term</label>
                                        <div class="col-sm-2 controls">
                                        <input class="input-border-btm" type="number" id="years" value="5" required>
                                         </div>
                                         <label class="col-sm-1 control-label">Years</label>
                                         <div class="col-sm-2 controls">
                                        <input class="input-border-btm" type="number" id="months" value="3" required>
                                         </div>
                                         <label class="col-sm-2 control-label">Months</label>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Monthly Rent</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="monrent" required disabled>
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Payable Date</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="datepicker-date" required>
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Commencement Date</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="datepicker-normal" required>
                                        </div>

                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Escalation Percentage</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="escper" value="10" required>
                                        </div>

                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-6 control-label">Escalation Interval in Years</label>
                                        <div class="col-sm-5 controls">
                                         <input class="input-border-btm" type="number" id="escint" value="1" required>
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Utilities Deposit</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="utildep" value="" format(this) required>
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Deposit (No. of Months)</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="number" id="depmonths" value="6" required>
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-6 control-label">Deposit Payable Currently (No. of Months)-</label>
                                        <div class="col-sm-5 controls">
                                         <input class="input-border-btm" type="number" id="depmonthscurrent" value="6" required>
                                        </div>

                                      </div>

                                      
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Fit Out Period (Months)</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="number" id="fitperiod" value="1" required>
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Premises Usage</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="usage" value="" required>
                                        </div>

                                      </div>

                                        <div class="form-group">
                                        <label class="col-sm-4 control-label">Lawyer</label>
                                        <div class="col-sm-7 controls">';
                                          $result =mysql_query("select * from lawyers");
                                          $num_results = mysql_num_rows($result);
                                         echo'<select id="advocate" class="input-border-btm" required   >
                                          <option value="" selected></option>';
                                         for ($i=0; $i <$num_results; $i++) {
                                                $row=mysql_fetch_array($result);
                                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                                              }
                                         echo'</select>
                                          </div>

                                      </div>
                                      
                                     
                                  </div>
                                  <div class="modal-footer background-login">
                                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn vd_btn vd_bg-green" onclick="calcesc()">Execute</button>
                                    <div id="message" style="width:40px;height:40px;float:right"></div>
                                  </div>
                                </div>
                                <!-- /.modal-content --> 
                              </div>
                              <!-- /.modal-dialog --> 
                            </div>
                            <!-- /.modal --> 

                      

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>8.&nbsp;&nbsp;&nbsp;Service Charge:</b></p>
                      </div>
                      <br/>

                      <div class="col-sm-9 controls">
                       <textarea rows="8" class="width-100" id="servicecharge">In additional to the rent, a service charge charge payable monthly in advance will be levied.  The service charge is inclusive of the rent prescribed above and will cover all outgoings, operational costs and overheads relating to the building that shall include but not limited to the following:-</textarea>
                      <br/>
                      i.  water for common areas;<br/>
                      ii. insurance;<br/>
                      iii.  cost of periodic maintenance and decoration of common areas;<br/>
                      iv. maintenance of vehicle parking and delivery areas;<br/>
                      v.  management costs;<br/>
                      vi. rates and land rents;<br/>
                      vii.  cleaning of common areas; and<br/>
                      viii. security.<br/>

                      The Service charge payable shall be determined by a Certified Accountant and will be payable from the Lease Commencement Date.<br/>

                      The   Service   Charge   does   not   cover   common   area   electricity   or electricity and water exclusively consumed by the Tenant, which will be metered separately and payable by the Tenant.<br/>

                      The Tenants will be required to deposit with the Landlord both water and electricity deposit totalling to  
                       <input disabled type="text" id="utildep1" class="input-border-btm width-20 vd_bd-red" placeholder="fill here" value="KShs. ">
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>9.&nbsp;&nbsp;&nbsp;Deposit & Guarantee:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">Deposit payable is equivalent to       
                      <input type="text" disabled  id="depmonths1" class="input-border-btm width-30 vd_bd-red" placeholder="fill here">
                      months rent totalling to Kenya shillings
                       <input type="text" disabled id="depamount1" class="input-border-btm width-70 vd_bd-red" placeholder="fill here"><div class="cleaner_h5"></div>
                       <textarea rows="3" class="width-100" id="depositinfo" placeholder="Other Deposit Info"></textarea><br/>
                       Once the lease is signed, the deposit will be retained by the Landlord as security for the due performance by the Tenant of the Tenant`s obligations under the lease. The deposit is refundable without interest to the Tenant after the expiry of the lease and delivery up of the Premises in accordance with the covenants contained in the lease.
                      <br/>The  deposit  will  not  be  utilized  by the  Tenant  on  account  of  the payment of rent for the last month (or longer period) of the term of lease. 
                      <br/>The directors and shareholders of the Tenant shall provide personal guarantees for the obligations of the Tenant under the Lease and the License. Such guarantee will be incorporated in the Lease

                      </p>
                      </div>
                      </div>


                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>10.&nbsp;&nbsp;&nbsp;User:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant shall use the Premises as 
                       <input disabled type="text" id="usage1" class="input-border-btm width-50 vd_bd-red" placeholder="fill here" value="">
                       <br/>The Tenant will not use or permit or suffer the Premises or part thereof to be used for any illegal or immoral purposes.
                      <br/>The Landlord shall have an absolute and uncontrolled discretion whether or not to permit similar shops or trades in the Shopping mall and to locate the same upon the demised premises as it so wishes.
                      <br/>The Tenant shall comply with all laws acts orders rule and regulations by laws enhanced passed made or issued by the Government of the Republic of Kenya or any Municipal Township local or other authority in relation to the occupation or conduct of the Premises AND obtain all such licenses consents certificates or approvals and execute or cause to be done or executed all such works and things as under or by virtue of any law act order rule regulations as bye-law as aforesaid or under any notice order or directions given or made pursuit thereto for the time being in force are or shall be directed or necessary to be obtained done executed in respect of or upon the Premises of any part thereof whether by owner or occupier in consequence of the user of the Premises for the purpose hereby authorized and at all times to keep the Landlord indemnified against all claims and liability including every fine penalty costs incurred paid or suffered by the Landlord in respect thereof and not to do or permit of suffer any act which shall amount to a breach or non-observance of any negative of restrictive covenant or special condition contained in any title document of The Point property and the building thereon is held by the Landlord as to which they are otherwise subject.

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>11.&nbsp;&nbsp;&nbsp;Sub-Letting:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">Subletting, assignments and transferring of the premises will only be allowed unless by the written consent of the Landlord.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>12.&nbsp;&nbsp;&nbsp;Renovations & Partitioning:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Landlord`s prior written consent will be required before the Tenant erects any partitions, fixtures or fittings in the Premises.

                      <br/>Any alterations to the power supply will require verification by the Landlord`s appointed electrical engineers at the cost of the Tenant.

                      <br/>The Tenant shall complete the ceilings; internal lighting of the Premises in accordance with such specifications as the Landlord may prescribe.

                      <br/>The  Tenant  will  comply  with  all  store  fit  out,  renovations  and alterations criteria and guidelines issued by the Landlord.

                      <br/>The  Tenant  shall  not  commence  any  such  fitting-out  work  in  the Premises unless and until the following conditions have been met:-

                      <br/>(i) Final Plans shall have been approved;

                      <br/>(ii)  the Tenant shall have obtained all relevant permits and/or approvals from the appropriate local and governmental authorities for the Tenant`s fitting out works on the Premises and shall have furnished the Landlord with copies of all such permits and/or approvals;

                     <br/> (iii) The Tenant shall have procured all Insurances required under the provisions of the Tenancy (herein referred to) and shall have furnished   the   Landlord   with   certificates   of   such Insurances; and The Landlord shall have consented in writing to the commencement of the Tenant`s fitting out works.

                      <br/>The fitting out work shall not interfere and/or create a nuisance or disturbance with the use, occupancy, or enjoyment of The Point by the Landlord, other Tenants or shoppers or at all.

                      <br/><b>Work Hours:</b>   Any fitting out work is to be done during the specific working hours of 8:00 a.m. to 7:00 p.m. unless otherwise agreed in writing by the Landlord.

                      <br/>Any damage to the building or part thereof and fixtures and fittings thereon forming The Point, external or internal, (i.e. including but not limited to sidewalks, storefront, doors, slab, studs, drywall, ceiling, ductwork, electrical work, plumbing, plumbing fixtures, painting, etc) caused by the Tenant and/or the Tenant`s contractor or agents shall be repaired by the Landlord`s contractor at the Tenant`s expense and shall be payable forthwith by the Tenant.

                      <br/>All the Tenant`s signage shall be at Tenant`s own expense and shall be of a size and quality of design and construction to conform to the Landlord`s  sign criteria for  The Point as  stipulated in  the provisions  of  the  said  Fit  Out  Criteria  and  shall  be  subject  to  the approval of the Landlords Project Architect and all relevant local and governmental bodies

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>13.&nbsp;&nbsp;&nbsp;Possession:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      This will be on the Lease Commencement  Date subject to the Tenant having signed the lease before the Lease Commencement  Date, having made all requisite  payments and having received  Landlord`s approval on submitted fit out plans.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>14.&nbsp;&nbsp;&nbsp;Utilities:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant will pay to the Landlord (if separate meters for utilities are installed at the Premises), or suppliers of utilities used exclusively in the Premises and indemnify the Landlord against all charges for such utilities consumed exclusively at or in relation to the Premises.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>15.&nbsp;&nbsp;&nbsp;VAT & Other Taxes:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      In addition to the above rental and other charges and costs, the Tenant will be liable to pay on demand by the Landlord all Value Added Taxes leviable from time to time or other taxes leviable from time to time in law in respect of any amounts payable by the Tenant.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>16.&nbsp;&nbsp;&nbsp;Fit Out Period:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant will be allowed a <input type="text" disabled id="fitout1" class="input-border-btm width-50 vd_bd-red" placeholder="fill here" value=""> Month (s)
                      Fit Out Period commencing on the Lease Commencement Date (the "Fit  Out Period") and  will be expected to open the Premises for business at the expiry of such period.
                      <br/>If the Tenant fails to open the Premises for business during this period, it will have to pay rent and all other charges for this period.
                      <br/>During  the  Fit  Out  Period,  the  Tenant  shall  indemnify  and  hold harmless the Landlord for any loss, damage or injury suffered or incurred by the Landlord or third parties as a result of the actions or omissions of the Tenant or its contractors, employees or agents actions in carrying out the fit out works.

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>17.&nbsp;&nbsp;&nbsp;Opening Hours:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant shall keep the Premises open for business at its convenient working hours and depending on the nature of the business. 
                      <br/>The Tenant will comply with such rules and conditions for extended opening as the Landlord may prescribe from time to time, including, without limitation, payment of additional service charge to cater for security and other costs for the extended opening hours.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>18.&nbsp;&nbsp;&nbsp;Security:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      While the Landlord will provide day and night security services to the compound and every reasonable care will be taken to ensure that such services are properly carried out, no warranty is given by the Landlord in respect thereof.
                      <br/>The   Landlord,   its   agents   and   employees   are   under   no   liability whatsoever to the Tenant, the Tenant`s guests and employees against injury, damage or loss caused by burglary, theft or otherwise on the Landlord`s property.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>19.&nbsp;&nbsp;&nbsp;Repair &  Decoration:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The  Tenant  shall  be  responsible  for  repairs  to  the  interior  of  the Premises,  including,  without  limitation,  all  partitions,  floors,  walls, ceilings, shop windows and internal fixtures and fittings.
                      <br/>On  termination  of  the  lease  or  earlier  determination  for  whatsoever reason, the Tenant  will be required  to redecorate  the Premises  in the terms that will be contained in the in the lease for the Premises. During the term of the lease, the Tenant will be required to keep the Premises and fixtures and fittings thereon and therein in good repair, order and condition.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>20.&nbsp;&nbsp;&nbsp;Breach of Covenants:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      If the rent or any part thereof shall at any time remain unpaid for thirty (30) days after becoming payable, whether formally demanded or not, or if at any time thereafter the Tenant is in breach of any of the covenants or conditions referred to in the lease, it will be lawful for the Landlord to re-enter the Premises and thereupon the lease will cease but without prejudice to any rights and remedies which may have accrued to the Landlord against the Tenant in respect of any breach of covenant.   In the event that the Landlord allows the Tenant any extra time to pay any outstanding rent or other charges, interest at the rate of the higher of (i) 10% over the base lending rate of the Prime Bank Limited from time to  time  or  25%  per  annum  will  be  paid  by  the  Tenant  on  any outstanding   amounts   from  the  time   such   amounts   were   due   for payment, until payment in full.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>21.&nbsp;&nbsp;&nbsp;Permission To Enter:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant  shall allow the Landlord (or its agents and employees)  to enter the Premises (upon reasonable prior notice unless in the case of an emergency, in which case no notice will be required) for the purpose of ascertaining that the covenants and conditions of these Letter of Offer and  the  Lease  have  been  complied  with  and  to  carry  out  all  work required to comply with any notice given by the Landlord to the Tenant specifying  any maintenance,  cleaning or decoration  which the Tenant has failed to execute in breach of the Heads of Terms</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>22.&nbsp;&nbsp;&nbsp;Indemnity:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The  Tenant  shall  indemnify  and  hold  harmless  the Landlord  for any loss, damage  or  injury  suffered  or  incurred  by the Landlord  or third parties as a result of the actions or omissions of the Tenant or its contractors, employees or agents actions in relation to the Premises.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>23.&nbsp;&nbsp;&nbsp;Insurance:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Tenant shall take out its own insurance against all risks in relation to its equipment, furniture, fittings, stock and contents at the Premises, as well as any third party liability in relation to the Premises.
                      </p>
                      </div>
                      </div>

                     


                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>24.&nbsp;&nbsp;&nbsp;Lease:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The Landlord will provide the Tenant with a lease for the Premises (the "lease"), which will be prepared by the Landlord`s  Advocates,
                       <input type="text" disabled id="advocate1" class="input-border-btm width-50 vd_bd-red" placeholder="fill here" value="">  and provided to the Tenant  within 30 days of the date of these Letter of Offer.  The Tenant will execute the lease within 14 days of the final engrossed lease being provided to it, failing which the Landlord may withdraw its offer to Grant the Lease to the Tenant.
                      <br/>Until  such  time  as  the  lease  has  been  executed  and  registered,  all covenants, conditions and the rent agreed, shall be deemed to have been incorporated in this document.
                      </p>
                      </div>
                      </div>


                      <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>25.&nbsp;&nbsp;&nbsp;Legal Fees:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      The  Tenant  will  be responsible  for  its own  advocate`s legal  fees  in relation to approval of the Lease and the legal fees of the Landlord`s Advocates  in respect of the preparation,  execution  and registration  of the lease, together with stamp duty, registration fees and other disbursements.   The legal fees will be the minimum chargeable under the Advocates Remuneration Order 2014.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>26.&nbsp;&nbsp;&nbsp;Confidentiality:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      This offer is made in confidence.  No terms shall be discussed with by third party save for the Tenant’s legal advisors who shall, in turn, be bound by this confidentiality clause.
                      </p>
                      </div>
                      </div>


                       <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>27.&nbsp;&nbsp;&nbsp;Contract:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      Until such time as the agreement for Lease has been executed and registered, all covenants, conditions and the rent agreed, shall be deemed to have been incorporated in this offer.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls">
                      <p style="text-align:left"><b>28.&nbsp;&nbsp;&nbsp;Conditions & Acceptance:</b></p>
                      </div>
                      <div class="col-sm-9 controls">
                      <p style="text-align:left">
                      28. Conditions & Acceptance:  By accepting these Heads of Terms, both parties approve the conditions contained herein and agree to execute a formal lease of the premises based on the agreed terms.

                      <br/>The offer to grant the Lease is made subject to the Tenant providing to the Landlord the following:-

                     <br/> a)  A   certified   copy   of   the   Certificate   of   Incorporation   or Certificate of Registration  of Business Name, as the case may be, or other identification as may be required  by the Landlord Advocates;

                     <br/> b)  A copy  of the  Memorandum  or Articles  or  Association  (if a limited liability company);

                      <br/>c)  A copy of the PIN and VAT Registration Certificate of the Tenancy Holder;

                     <br/> d) A Certificate  of Confirmation  of directors  from the Company Secretary; and

                      <br/>e) Photocopies of the Directors Identity Cards/Passports (if applicable).

                     <br/> This letter of offer is sent to the Tenant in triplicate.   If its terms and conditions  are accepted,  please execute the enclosed copies and return them to us within the next seven (7) days from the date hereof together with your banker’s cheque in favour of 
                      <input type="text" id="chequename1" class="input-border-btm width-50 vd_bd-red" placeholder="fill here" value="'.$comname.'">, for the sum of Kenya Shillings <input type="text" disabled id="chequeamount1" class="input-border-btm width-50 vd_bd-red" placeholder="fill here" value=""> being the  Security  Deposit and one month’s rent payable  hereunder  failing  which  this  Offer  will  lapse  and  shall  be  automatically rescinded upon expiry of such period.
                     <br/> Prior to offering possession, the Tenant will be required to forward the payments as follows:-
                       </p>
                      <div class="cleaner_h10"></div>
                      <textarea rows="7" class="width-100" id="payment_breakdown" disabled></textarea>
                       
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-6 controls">
                      <p style="text-align:left">
                      Yours faithfully
                      <br/>'.$comname.'<br/><br/><br/><br/>


                      ..........................................<br/>
                      Director

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-12 controls">
                      <p style="">
                      <b style="text-align:center">TENANT’S ACCEPTANCE OF OFFER</b><br/>
                      I/We confirm that I/We have read and understood and accepted and agree to all the above terms and conditions.
                      <br/>
                      a)  Limited Companies
                      The duplicate Letter must be signed by two directors. You must return the duplicate Letter together with a certified photocopy of your Certificate of Incorporation (if a Kenyan Company) or a certified copy of your Certificate of Compliance (if a foreign company registered in Kenya).
                      </p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-6 controls" style="border-right:1px dotted #ccc">
                      <p style="text-align:left">SEALED with the common Seal of the Tenant<br/>
                      ........................................<br/><br/><br/>
                      In the presence of<br/><br/><br/>
                      Director<br/><br/><br/>
                      Director/Secretary<br/><br/><br/>
                      Date<br/><br/><br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls">
                      <p style="text-align:left"><br/><br/><br/><br/><br/><br/>
                      Company Seal
                      </p>
                      </div>
                      </div> 


                      <div class="form-group">
                      <div class="col-sm-12 controls">
                      <p style="text-align:left">I confirm that I was present and witnessed the signatures of .....................................................and  ..................................................... two of the Directors of  .....................................................</p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-6 controls" style="">
                      <p style="text-align:left">Name of Advocate<br/>
                      ............................................................<br/><br/>
                      Address<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls">
                      <p style="text-align:left">Signature of Advocate<br/><br/>
                      ............................................................<br/>
                      </p>
                      </div>
                      </div> 



                      <div class="form-group">
                      <div class="col-sm-12 controls">
                      <p style="">
                      <b style="text-align:center">LANDLORD’S ACCEPTANCE</b><br/>
                     </p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-6 controls" style="border-right:1px dotted #ccc">
                      <p style="text-align:left">SEALED with the common Seal of '.$comname.'<br/>
                      In the presence of<br/><br/><br/>
                      Director<br/><br/><br/>
                      Director/Secretary<br/><br/><br/>
                      Date<br/><br/><br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls">
                      <p style="text-align:left"><br/><br/><br/><br/><br/><br/>
                      Company Seal
                      </p>
                      </div>
                      </div> 


                      <div class="form-group">
                      <div class="col-sm-12 controls">
                      <p style="text-align:left">I confirm that I was present and witnessed the signatures of .....................................................and  ..................................................... two of the Directors of  '.$comname.'</p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-6 controls" style="">
                      <p style="text-align:left">Name of Advocate<br/>
                      ............................................................<br/><br/>
                      Address<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls">
                      <p style="text-align:left">Signature of Advocate<br/><br/>
                      ............................................................<br/>
                      </p>
                      </div>
                      </div> 



                      


                      <div class="form-actions-condensed wizard">
                        <button class="btn vd_btn vd_bg-green" onclick="submitlof('.$sap.')"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Finish</button>
                        <div id="messagediv" style="width:40px;height:40px;float:right"></div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-12--> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section -->  
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '#datepicker-date' ).datepicker({ dateFormat: 'dd'}); </script>";

      break;

      case 12:
        
        $commencedate=$date=$_GET['commencedate'];
        $escper=$_GET['escper'];
        $escint=$_GET['escint'];
        $fitperiod=$_GET['fitperiod'];
        $monrent=$rent=$_GET['monrent'];
        $escalation='';
        $years=$_GET['years'];
        $mons=$_GET['months'];
        $leasetam=$years*12+$mons;
        $roomno=$_GET['roomno'];
        $lawyer=$_GET['lawyer'];
        $usage=$_GET['usage'];
        $location=$_GET['location'];
        $payabledate=$_GET['payabledate'];
        $depmonths=$_GET['depmonths'];
        $depmonthscurrent=$_GET['depmonthscurrent'];
        $utildep=$_GET['utildep'];
        $monvar=12*$escint;

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
        $escalation.=$rentfree;
        //first year

        $oneyear=$commence;
        $s = new DateTime($commence);
        $s->modify('+'.$escint.'year');
        $end=$commence=$s->format('Ymd');
        $end = new DateTime($end);
        $end->modify('-1day');
        $endfree= $end->format('Ymd');

        $oneyear='\r\nFrom '.stamptodate($oneyear).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
        $escalation.=$oneyear;
        $months-=$monvar;

        

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

        $oneyear='\r\nFrom '.stamptodate($start).' to '.stamptodate($endfree).'-KShs.'.number_format($rent);
        $escalation.=$oneyear;
        $months-=$monvar;

        }
        echo'<img src="img/tick.png" style="width:30px; height:30px">';
         $aa=substr($payabledate,1,1);
         if($aa==1){$bb='st';}else if($aa==2){$bb='nd';}if($aa==3){$bb='rd';}else{$bb='th';}
         $totdep=$monrent*$depmonths;
         $deppayable=$depmonthscurrent*$monrent;
         $depandrent=$deppayable+$monrent;
         $deppayabletot=$depandrent+$utildep;
         $payment_breakdown='';
         $payment_breakdown.='Security Deposit ('.$depmonthscurrent.' Month(s) Rent)\t\t\tKSh.'.number_format($deppayable);
         $payment_breakdown.='\r\nFirst Month`s Rent (Including VAT)\t\t\tKSh.'.number_format($monrent);
         $payment_breakdown.='\r\nWater and Electricity Deposit\t\t\t\tKSh.'.number_format($utildep);
         $payment_breakdown.='\r\nLegal Fees Deposit (Including VAT)\t\t\tTBA';
         $payment_breakdown.='\r\nStamp Duty/Registration Fees \t\t\t\tTBA';
         $payment_breakdown.='\r\nTOTAL\t\t\t\t\t\t\t\t\tKShs.'.number_format($deppayabletot);
        echo "<script>
          $('#unit1').val('".$roomno."');
          $('#location1').val('".$location."');
          $('#leaseterm1').val('".$years." Years ".$mons." Months');
          $('#commencement1').val('".$commencedate."');
          $('#commencement2').val('".$commencedate."');
          $('#rent1').val('".number_format($monrent)."');
          $('#rentdate1').val('".$payabledate.$bb."');
          $('#escalation1').val('".$escper."');
          $('#escalation_int1').val('".$escint."');
          $('#escalation_breakdown').val('".$escalation."');
          $('#utildep1').val('".number_format($utildep)."');
          $('#depmonths1').val('".$depmonths."');
          $('#depamount1').val('".translateToWords($totdep)." (".$totdep.")');
          $('#usage1').val('".$usage."');
          $('#fitout1').val('".$fitperiod."');
          $('#advocate1').val('".$lawyer."');
           $('#chequeamount1').val('".translateToWords($deppayabletot)." (".$deppayabletot.")');
           $('#payment_breakdown').val('".$payment_breakdown."');
          </script>";

        break;


   case 12.1:
   $result = mysql_query("insert into log values('','".$username." accesses New Tenant Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>New Tenant-Search LOF`s</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>New Tenant-Search LOF`s</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Contact Name</th>
                          <th>Business Name</th>
                          <th>Phone</th>
                          <th>Remarks</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from interests where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.stripslashes($row['name']).'</td>
                          <td>'.stripslashes($row['bname']).'</td>
                          <td>'.stripslashes($row['phone']).'</td>
                          <td>'.stripslashes($row['remarks']).'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="intopen(1,'.$code.')">Shop Application</option>
                            <option onclick="intopen(2,'.$code.')">Edit SOI</option>
                            <option onclick="intopen(3,'.$code.')">Remove SOI</option>
                           </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;




    case 13:
   $result = mysql_query("insert into log values('','".$username." accesses Find Tenants Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Tenants-Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Tenants-Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                        <th>Unit</th>
                          <th>Business Name</th>
                          <th>Contact Name</th>
                          <th>Phone</th>
                          <th>Entry Date</th>
                          <th>Balance</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['tid']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.stripslashes($row['roomno']).'</td>
                          <td>'.stripslashes($row['bname']).'</td>
                          <td>'.stripslashes($row['dname']).'</td>
                          <td>'.stripslashes($row['phone']).'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>'.number_format(stripslashes($row['bal'])).'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="intopen(4,'.$code.')">Edit Tenant</option>
                            <option onclick="intopen(5,'.$code.')">Tenant Info</option>
                            <option onclick="intopen(6,'.$code.')">Invoice Tenant</option>
                            <option onclick="intopen(7,'.$code.')">Receipt Tenant</option>
                            <option onclick="intopen(8,'.$code.')">Check Out Tenant</option>
                           </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

    case 14:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Deposits Payment</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Deposits Payment</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where deposit_status=0");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:15,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

  case 15:
  $param=$_GET['param'];

  $result = mysql_query("insert into log values('','".$username." accesses  Deposits Payment Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $result =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
  $row=mysql_fetch_array($result);
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Deposits Payment</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

      
          

         echo' <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Deposits Payment-'.stripslashes($row['bname']).'-['.stripslashes($row['roomno']).'] </h3>
                  </div>
                  <div class="panel-body">
                  <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Total Deposit Payable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="total"  disabled value="'.number_format(floatval(stripslashes($row['total_deposit']))).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Total Paid<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="paid"  disabled value="'.number_format(floatval(stripslashes($row['paid_deposit']))).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Total Balance<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="balance"  disabled value="'.number_format(floatval(stripslashes($row['bal_deposit']))).'">
                        </div>
                      </div>

                      

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Total Paying<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="paying" value="" onkeyup="format(this)">
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers where subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Ref No</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="refno"  value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>';

                       $start=stripslashes($row['deposit_stamp_expiry']);
                       $start=substr($start,0,4).''.substr($start,4,2).''.substr($start,6,2);
                       $s = new DateTime($start);
                       $s->modify('+1month');
                       $next= $s->format('Ymd');

                      echo'<div class="form-group">
                        <label style="float:left" class="col-sm-5">Next Payment Date</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="datepicker-normal" value="'.stamptodate($next).'">
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savedeposit('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-7 --> 

               <div class="col-md-5">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Deposits Schedule/Remarks </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      
                       <div class="form-group">
                        <div class="col-sm-12 controls">
                          <p>'.stripslashes($row['deposit_remarks']).'</p>
                        </div>
                      </div>

                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-4 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";
     

    break;

    case 16:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Lease Upload</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Lease Upload</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where lease_status=0 or lease_status=''");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:17,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

  case 17:
  $param=$_GET['param'];

  $result = mysql_query("insert into log values('','".$username." accesses  Lease Upload Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $result =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
  $row=mysql_fetch_array($result);
  $lof=stripslashes($row['lof']);
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Lease Upload</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

      
          

         echo' <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Lease Upload-'.stripslashes($row['bname']).'-['.stripslashes($row['roomno']).'] </h3>
                  </div>
                  <div class="panel-body">
                  <button onclick="window.open(\'report.php?id=1&rcptno='.$lof.'\')" class="btn vd_btn vd_bg-green" data-toggle="modal" style="float:right" data-target="#myModal"><span class="menu-icon"><i class="fa fa-fw fa-gear"></i></span>View LOF</button>
                      <div style="clear:both;width:100%;margin-bottom:5px"></div>
                      
                      

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Lease No<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="leaseno" value="" >
                        </div>
                      </div>
                       <div style="clear:both;width:100%;margin-bottom:5px"></div>
                       <div class="form-group">
                        <label class="col-sm-5 control-label">Verifications<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="escalations"  id="checkbox-1">
                            <label for="checkbox-1"> Escalations Ok? </label>
                          </div>
                          <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="tenancyperiod"  id="checkbox-2">
                            <label for="checkbox-2"> Period of Tenancy Ok? </label>
                          </div>
                          <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="leaseperiods"  id="checkbox-3">
                            <label for="checkbox-3"> Lease Periods Ok? </label>
                          </div>
                        </div>
                      </div>

                      <div style="clear:both;width:100%;"></div>

                       <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="fname"  name="fname"  required>
                        </div>
                        </div>
                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe">
                        </iframe>
                        <input type="hidden" id="type" name="type" value="Document"/>
                        <input type="hidden"  name="tid" value="'.$param.'"/>
                        <input type="hidden"  name="type"   id="doctype" value="Lease Document"/>
                        <input type="hidden" id="id" name="id"  value="2"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:20%" type="submit" onclick="uphoto()"><i class="icon-ok"></i>Upload</button>
                        </form>

                        <div style="clear:both;width:100%;margin-bottom:5px"></div>
                      

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                        <div style="clear:both;width:100%;margin-bottom:5px"></div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">User Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="password" id="password" value="" >
                        </div>
                      </div>

                     <div style="clear:both;width:100%;margin-bottom:5px"></div>
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savelease('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                   </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-7 --> 

              


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";
     

    break;


    case 18:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Unit Handover/Tenant Checkin</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Unit Handover/Tenant Checkin</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where handover_status=0 or handover_status=''");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:19,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 19:
  $param=$_GET['param'];

  $result = mysql_query("insert into log values('','".$username." accesses  Unit Handover/Tenant Checkin Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $result =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
  $row=mysql_fetch_array($result);
  $lof=stripslashes($row['lof']);
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Unit Handover/Tenant Checkin</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

      
          

         echo' <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Tenant Checkin-'.stripslashes($row['bname']).'-['.stripslashes($row['roomno']).'] </h3>
                  </div>
                 <div class="panel-body">
                   <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <div class="col-sm-12 controls">
                          <textarea id="wysiwyghtml" class="width-100 form-control"  rows="15" placeholder="Unit Description before Fit Out"></textarea>
                        </div>
                      </div>
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savehandover('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-7 --> 

               <div class="col-md-5">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Unit Handover Photos/Documents </h3>
                  </div>
                  <div class="panel-body">
                   <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="fname"  name="fname"  required>
                        </div>
                        </div>
                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe">
                        </iframe>
                        <input type="hidden" id="type" name="type" value="Document"/>
                        <input type="hidden"  name="tid" value="'.$param.'"/>
                        <input type="hidden"  name="type"   id="doctype" value="Unit Handover Photos"/>
                        <input type="hidden" id="id" name="id"  value="2"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:30%" type="submit" onclick="uphoto()"><i class="icon-ok"></i>Upload</button>
                        </form>

                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-4 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>    $('#wysiwyghtml').wysihtml5();    </script>";
     

    break;

    case 20:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Tenant File</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Tenant File</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:21,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 21:
   $tid= $param=$_GET['param'];
  $result = mysql_query("insert into log values('','".$username." accesses Tenant File Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $lof=stripslashes($rowx['lof']);
  $stat=stripslashes($rowx['status']);

  $resulty =mysql_query("select * from lof where id='".$lof."' limit 0,1");
  $rowy=mysql_fetch_array($resulty);
  $sap=stripslashes($rowy['sap']);
 
  $resulty =mysql_query("select * from shopapps where id='".$sap."' limit 0,1");
  $rowy=mysql_fetch_array($resulty);
  $soi=stripslashes($rowy['soi']);

  if($sap==''){$sap=0;} if($soi==''){$soi=0;}



  if($stat==1){$status='Active';$col='#1fae66';}else if($stat==0){$status='Checked Out';$col='#f85d2c';}else{$status='Contract Expired';$col='#f89c2c';}
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Tenant File</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Tenant File-'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).'] </h3>
                  </div>
                 <div class="panel-body">
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">Personal Information</a></li>
                      <li><a href="#tab2" data-toggle="tab">Billing</a></li>
                      <li><a href="#tab3" data-toggle="tab">Documents</a></li>
                      <li><a href="#tab4" data-toggle="tab">Upload Documents</a></li>
                    </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab1"> 
                    <div class="col-md-6">
                      <form class="form-horizontal" action="#" role="form">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Tenant Status</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.$status.'" style="background:'.$col.'" disabled>
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.stripslashes($rowx['bname']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="nature" value="'.stripslashes($rowx['address']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="period" value="'.stripslashes($rowx['phone']).'" disabled>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['email']).'" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Director Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['dname']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['dphone']).'" disabled>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Property Name </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="location" value="'.stripslashes($rowx['hname']).'" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit No. </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.stripslashes($rowx['roomno']).'" disabled>
                        </div>
                      </div>

                      


                    </form>
                     </div>

                     <div class="col-md-6">
                      <form class="form-horizontal" action="#" role="form">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Monthly Rent </label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.number_format(stripslashes($rowx['monrent'])).'" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Billing Cycle</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.stripslashes($rowx['billing_type']).'" disabled>
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Date Created</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bankers" value="'.stripslashes($rowx['date']).'" disabled>
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Total Balance</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.number_format(stripslashes($rowx['bal'])).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Total Deposit</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="nature" value="'.number_format(stripslashes($rowx['paid_deposit'])).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Lease No</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="period" value="'.stripslashes($rowx['leaseno']).'" disabled>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Lease Upload Date</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stamptodate(stripslashes($rowx['lease_upload_stamp'])).'" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Handover By</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['handover_by']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Handover Details</label>
                        <div class="col-sm-8 controls" style="max-height:100px; overflow-y:auto">
                          <p>'.stripslashes($rowx['handover_details']).'</p>
                        </div>
                      </div>




                    </form>
                     </div>





                      </div><!--end tab-->
                      <div class="tab-pane" id="tab2">

                              <div class="panel-body table-responsive">
                            <table class="table table-striped data-tables" id="data-tables">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Type</th>
                                  <th>Rcpt/Inv No</th>
                                  <th>Description</th>
                                  <th>Amount</th>
                                  <th>Bal</th>
                                </tr>
                              </thead>
                              <tbody>';
                            $result =mysql_query("select * from receipts where status=1 and tid='".$tid."'");
                            $num_results = mysql_num_rows($result);
                              for ($i=0; $i <$num_results; $i++) {
                                  $row=mysql_fetch_array($result);
                                  $categ=stripslashes($row['categ']);
                                  $code=stripslashes($row['serial']);
                                  if(stripslashes($row['drcr'])=='dr'){$type='Invoice';$out=5;$rcptno=stripslashes($row['invno']);}
                                  if(stripslashes($row['drcr'])=='cr'){$type='Receipt';$out=6;$rcptno=stripslashes($row['rcptno']);}

                                 if($categ==2){$out=5;}if($categ==3){$out=7;}if($categ==4){$out=8;}
                                echo"<tr class=\"gradeX\" id=\"normal".$code."\" title=\"Click to View\" style=\"cursor:pointer\" onclick=\"window.open('report.php?id=".$out."&rcptno=".$rcptno."')\" >";
                                  echo' <td>'.stripslashes($row['date']).'</td>
                                  <td>'.$type.'</td>
                                  <td>'.$rcptno.'</td>
                                  <td>'.stripslashes($row['description']).'</td>
                                  <td>'.number_format(floatval($row['amount'])).'</td>
                                  <td>'.number_format(floatval($row['bal'])).'</td>
                                    </tr>';

                                }
                               
                              echo'</tbody>
                            </table>
                          </div>




                       </div>
                      <div class="tab-pane" id="tab3"> 

                      <div style="width:100%;height:350px; overflow-y:auto; float:left; padding:2%">';


            
                          $resulta =mysql_query("select * from tendocs where soi='".$soi."' or sap='".$sap."'  or tid='".$tid."' order by stamp desc");
                            $num_resultsa = mysql_num_rows($resulta);
                           for ($i=0; $i <$num_resultsa; $i++) {
                              $rowa=mysql_fetch_array($resulta);
                              $name=stripslashes($rowa['name']);
                              $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                              if(exif_imagetype('uploads/tenants/'.$name.'')){
                              $src='uploads/tenants/'.$name;
                              }
                              else if($type=='pdf'){
                                  $src='img/adobe.png';
                              }
                              else if($type=='xls'||$type=='xlsx'){
                                 $src='img/excel.png';
                              }
                              else if($type=='doc'||$type=='rtf'||$type=='docx'){
                                $src='img/word.png';
                              }else{
                                $src='img/format.png';
                              }
                              echo'<div style="border:1px solid #ccc; margin-bottom:10px;width:200px;min-height:100px;max-height:200px;float:left;margin-right:10px;padding:5px;overflow:hidden" id="doc'.stripslashes($rowa['id']).'">
                             <img src="img/delete.png" style="width:30px;height:30px;float:right;margin:5px;border:1px solid #f00;padding:2px;cursor:pointer" title="Delete" onclick="deldoc('.stripslashes($rowa['id']).')"/>';
                              echo"<a href=\"uploads/tenants/".stripslashes($rowa['name'])."\"  target=\"_blank\"><img  src=\"".$src."\" alt=\"Photo\" style=\"float:left; max-width:200px; max-height:100px;cursor:pointer\">
                             <div class=\"cleaner\"></div> <b>TYPE: ".stripslashes($rowa['type'])."</b><br/>DETAILS: ".stripslashes($rowa['details'])."<br/>NAME: ".stripslashes($rowa['name'])."</a>
                              </div>";
                            }

                       echo '</div>

                          

                      </div>
                      <div class="tab-pane" id="tab4"> 
                         <div class="col-md-6">
                        <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-3">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fname"  name="fname"  required>
                        </div>
                        </div>
                         <div class="cleaner_h5"></div>
                        <div class="form-group">
                        <label style="float:left" class="col-sm-3">Type:<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <select style="padding:5px" name="type" id="doctype">
                            <option value="" selected>Select One...</option>
                             <option value="Certificate of Incorporation">Certificate of Incorporation</option>
                              <option value="Checkout Documents">Checkout Documents</option>
                           <option value="ID_Card_Copies">ID_Card_Copies</option>
                            <option value="Lease Document">Lease Document</option>
                            <option value="Memorandum/Articles_of_Association">Memorandum/Articles_of_Association</option>
                           <option value="Pin/Vat_Certificate">Pin/Vat_Certificate</option>
                            <option value="Unit Handover Photos">Unit Handover Photos</option>
                            <option value="Pin_Copies">Pin_Copies</option>
                            <option value="Other Documents">Other Documents</option>
                            </select>
                        </div>
                        </div>

                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe">
                        </iframe>
                        <input type="hidden"  name="soi" value="'.$soi.'"/>
                        <input type="hidden"  name="sap" value="'.$sap.'"/>
                        <input type="hidden"  name="tid" value="'.$tid.'"/>
                        <input type="hidden" id="id" name="id"  value="1"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:20%" type="submit" onclick="uphoto()"><i class="icon-ok"></i>Upload</button>
                        </form>

                        </div>
                       </div>
                      </div>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
        </div>
            <!-- row --> 
              </div>
            
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->
        <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
     
    break;


    case 22:
   $result = mysql_query("insert into log values('','".$username." accesses Ex- Tenants Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Ex-Tenants-Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Ex-Tenants-Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Business Name</th>
                          <th>Contact Name</th>
                          <th>Unit</th>
                          <th>Phone</th>
                          <th>Entry Date</th>
                          <th>Balance</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from tenants where status=0");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['tid']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          
                          <td>'.stripslashes($row['bname']).'</td>
                          <td>'.stripslashes($row['dname']).'</td>
                          <td>'.stripslashes($row['roomno']).'</td>
                          <td>'.stripslashes($row['phone']).'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>'.number_format(stripslashes($row['bal'])).'</td>
                          <td>
                           <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                             <option onclick="intopen(5,'.$code.')">Tenant Info</option>
                            </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

        case 23:
    $result = mysql_query("insert into log values('','".$username." accesses Send Documents Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
    echo'<div class="vd_container" id="container">
            <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Send Documents</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
           <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Send Documents </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div class="form-group">
                        <label style="float:left" class="col-sm-4">To be Delivered By<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="person">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Documents to Send<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="documents"></textarea>
                        </div>
                      </div>

                       
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="sendremarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savesenddocument()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>$('#timepicker-default').timepicker(); $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


    break;

     case 23.1:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Receive Sent Documents</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Receive Sent Documents </h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from docsregistry where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['id']).'-'.stripslashes($row['sendername']).'-'.stripslashes($row['senddate']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
        onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:23.2,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

     case 23.2:

     $param=$_GET['param'];
$resultx =mysql_query("select * from docsregistry where id='".$param."' limit 0,1");
 $rowx=mysql_fetch_array($resultx);
    $result = mysql_query("insert into log values('','".$username." accesses Documents Registry Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
    echo'<div class="vd_container" id="container">
            <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Documents Registry-Receive Documents</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
           <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Documents Registry-Receive Documents </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                         <div class="form-group">
                        <label style="float:left" class="col-sm-3">Documents</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="4" class="width-100" id="documents" disabled>'.stripslashes($rowx['docname']).'</textarea>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Sent By<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="person" value="'.stripslashes($rowx['sendername']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Brought By<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="person" value="'.stripslashes($rowx['broughtby']).'" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Received By<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="received">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Receive Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="datepicker-normal">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Receive Time<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                         <div class="input-group bootstrap-timepicker">
                          <input type="text" placeholder="Time" id="timepicker-default">
                            <span class="input-group-addon" id="timepicker-default-span"><i class="fa fa-clock-o"></i></span> 
                            </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks</label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savereceivedocument('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>$('#timepicker-default').timepicker(); $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


    break;

    case 24:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Tenant Check Out</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Tenant Check Out</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:25,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 25:
  $param=$_GET['param'];

  $result = mysql_query("insert into log values('','".$username." accesses  Tenant Checkout Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $result =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
  $row=mysql_fetch_array($result);
  $lof=stripslashes($row['lof']);
  $deposit=stripslashes($row['paid_deposit']);
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Tenant Checkout</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

      
          

         echo' <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Tenant Checkout-'.stripslashes($row['bname']).'-['.stripslashes($row['roomno']).'] </h3>
                  </div>
                 <div class="panel-body">
                   <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <div class="col-sm-12 controls">
                          <textarea id="wysiwyghtml" class="width-100 form-control"  rows="15" placeholder="Unit Description on Check Out"></textarea>
                        </div>
                      </div>
                    
                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-7 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Intent to Vacate/ Unit Photos Upload </h3>
                  </div>
                  <div class="panel-body">
                   <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-6 controls">
                          <input type="text" id="fname"  name="fname"  required>
                        </div>
                        </div>
                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe">
                        </iframe>
                        <input type="hidden" id="type" name="type" value="Document"/>
                        <input type="hidden"  name="tid" value="'.$param.'"/>
                        <input type="hidden"  name="type"   id="doctype" value="Checkout Documents"/>
                        <input type="hidden" id="id" name="id"  value="2"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:25%" type="submit" onclick="uphoto()"><i class="icon-ok"></i>Upload</button>
                        </form>

                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Other Details</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-5">Notice Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="datepicker-normal2">
                        </div>
                      </div>
                     <div class="form-group">
                        <label style="float:left" class="col-sm-5">Vacate Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="datepicker-normal">
                        </div>
                      </div>

                      
                    </form>


                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-4 --> 

              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Deductions</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form class="form-horizontal" action="#" role="form">
                     <div class="form-group">
                        <label style="float:left" class="col-sm-5">Deposit Held</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="totdeposit" value="'.number_format($deposit).'" disabled>
                        </div>
                      </div>


                   <div class="form-group">
                        <label style="float:left" class="col-sm-5">Unit Condition</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="unided" onkeyup="calcdepayable(this)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Notice Penalties</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="notded" onkeyup="calcdepayable(this)">
                        </div>
                      </div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Other Deductions</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="othded" onkeyup="calcdepayable(this)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Deposit Payable</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="depayable"  value="'.number_format($deposit).'"  disabled>
                        </div>
                      </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers where subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Ref No</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="refno"  value="">
                        </div>
                      </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savecheckout('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>


                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-4 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>    $('#wysiwyghtml').wysihtml5(); $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'});$( '#datepicker-normal2' ).datepicker({ dateFormat: 'dd/mm/yy'});   </script>";
     

    break;

     case 26:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Tenant Info</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Edit Tenant Info</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:27,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 27:
    $param=$_GET['param'];
    $result = mysql_query("insert into log values('','".$username." accesses Tenant File Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
    $resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $lof=stripslashes($rowx['lof']);
    $stat=stripslashes($rowx['status']);
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Tenant File</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Tenant Information-'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).'] </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="'.stripslashes($rowx['bname']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['address']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['phone']).'">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['email']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Director Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname" value="'.stripslashes($rowx['dname']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone" value="'.stripslashes($rowx['dphone']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">KRA Pin<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="pin" value="'.stripslashes($rowx['pin']).'">
                        </div>
                      </div>




                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from houses where status=0");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="unit" class="select" required >
                          <option value="'.stripslashes($rowx['rid']).'" selected>'.stripslashes($rowx['roomno']).'</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['rid']).'">'.stripslashes($row['roomno']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Billing Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <select id="btype" class="select" >
                         <option value="'.stripslashes($rowx['billing_type']).'" selected>'.stripslashes($rowx['billing_type']).'</option>
                          <option value="Monthly">Monthly</option>
                          <option value="Quartely">Quartely</option>
                          <option value="Yearly">Yearly</option>
                         </select>
                          </div>
                        </div>

                       
                </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Tenant Information-'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).'] </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      

                        
                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Next Billing Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="datepicker-normal" value="'.stamptodate(stripslashes($rowx['invoice_expiry_stamp'])).'">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Escalation Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <select id="etype" class="select" required >
                         <option value="'.stripslashes($rowx['escalation_type']).'" selected>'.stripslashes($rowx['escalation_type']).' Year(s)</option>
                          <option value="1">1 Year</option>
                          <option value="2">2 Years</option>
                         </select>
                          </div>
                        </div>';

                        $xx='';
                        if(stripslashes($rowx['penstatus'])==1){$xx='checked';}

                        echo'<div class="form-group" id="switch-input">
                        <label style="float:left" class="col-sm-4">Penalties</label>
                        <div class="col-sm-8 controls">
                        <input  name="penstatus" value="1" type="checkbox" data-rel="switch" data-wrapper-class=["inverse","red"] '.$xx.'>
                        </div>
                        </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Penalties Date</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="pendate" value="'.stripslashes($rowx['pendate']).'">
                        </div>
                        </div>

                         <div class="form-group">
                        <label style="float:left" class="col-sm-4">Penalties %</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="penpercent" value="'.stripslashes($rowx['penpercent']).'">
                        </div>
                        </div>

                         <div class="form-group">
                        <label style="float:left" class="col-sm-4">Waive Penalties (Month)</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="waivermonth" value="'.stripslashes($rowx['penwaivermonth']).'">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Payable</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="depayable" value="'.number_format(floatval($rowx['total_deposit'])).'" onkeyup="format(this)" disabled>
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Paid</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="depaid" value="'.number_format(floatval($rowx['paid_deposit'])).'" onkeyup="format(this)" disabled>
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Balance</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="debal" value="'.number_format(floatval($rowx['bal_deposit'])).'" onkeyup="format(this)" disabled>
                        </div>
                        </div>

                       

                    <div class="form-group form-actions">
                    <div class="col-sm-4"> </div>
                    <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savetenant('.$param.')"><i class="icon-ok"></i> Save</button>
                      <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                      <div id="message" style="width:40px;height:40px;float:right"></div>
                    </div>
                  </div>
                </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'});$( '#pendate' ).datepicker({ dateFormat: 'dd'});$( '#waivermonth' ).datepicker({ dateFormat: 'mm_yy'}); </script>";

     
    break;

    case 28:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Vacate Notice</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Vacate Notice</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:29,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 29:
    $param=$_GET['param'];
    $resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $lof=stripslashes($rowx['lof']);
    $stat=stripslashes($rowx['status']);
     $result = mysql_query("insert into log values('','".$username." accesses Vacate Notice Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Generate Vacate Notice</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Generate Vacate Notice-'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).']  </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Vacate Date <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="datepicker-normal" class="datepicker-normal">
                        </div>
                      </div>

                      
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Vacate Reasons<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="5" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savevacate('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
        echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


    break;

     case 30:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Extend Contract</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Extend Contract</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:31,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 31:
    $param=$_GET['param'];
    $resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $lof=stripslashes($rowx['lof']);
    $stat=stripslashes($rowx['status']);
     $result = mysql_query("insert into log values('','".$username." accesses Extend Contract Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Extend Tenant Contract</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Extend Tenant Contract-'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).']  </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-3">Current Date <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="date" disabled value="'.stamptodate(stripslashes($rowx['contract_expiry_stamp'])).'">
                        </div>
                      </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">New Expiry Date <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="datepicker-normal">
                        </div>
                      </div>

                      
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="5" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveextend('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
        echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


    break;
 case 32:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Rent Escalations</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Edit Rent Escalations</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:33,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 33:
    $param=$_GET['param'];
    $resultx =mysql_query("select * from tenants where tid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $lof=stripslashes($rowx['lof']);
    $stat=stripslashes($rowx['status']);
     $result = mysql_query("insert into log values('','".$username." accesses Edit Rent Escalations Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Rent Escalations</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-9">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Rent Escalations -'.stripslashes($rowx['bname']).'-['.stripslashes($rowx['roomno']).']  </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">';
                    echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:20%;">Period</td>
                                      <td  style="width:20%;">Start Date</td>
                                      <td  style="width:20%;">End Date</td>
                                      <td  style="width:20%;">Amount</td>
                                      <td  style="width:20%;">Save</td>
                                        
                                    </tr>'; 

                              $result =mysql_query("select * from escalations where tid='".$param."'");
                              $num_results = mysql_num_rows($result);
                              for ($i=0; $i <$num_results; $i++) {
                              $row=mysql_fetch_array($result);
                              $code=stripslashes($row['id']);
                                  
                                      
                                if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ">';}
                                else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
                                echo'
                                <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;" id="colname'.$code.'">'.$i.'</td>
                                 <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="datepicker-normal" value="'.stamptodate($row['start']).'" id="start'.$code.'" style="width:90%;text-align:center"></td>
                                 <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="datepicker-normal" value="'.stamptodate($row['end']).'" id="end'.$code.'" style="width:90%;text-align:center"></td>
                                <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="" value="'.stripslashes($row['amount']).'" id="amount'.$code.'" style="width:90%;text-align:center"></td>
                                <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"  id="save'.$code.'"  onclick="saveescalation('.$code.')"><img src="img/save.png" width="30"/></td>
                                </tr>';
                                  }


                              echo '</tbody></table>
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
        echo "<script>  $( '.datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


    break;


   case 34:
   $result = mysql_query("insert into log values('','".$username." accesses Find Properties Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Properties Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Properties Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Property Name</th>
                          <th>Location</th>
                          <th>Plot No</th>
                          <th>House Type</th>
                          <th>Owner Name</th>
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from mainhouses where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['houseid']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          
                          <td>'.stripslashes($row['housename']).'</td>
                          <td>'.stripslashes($row['location']).'</td>
                          <td>'.stripslashes($row['plot']).'</td>
                          <td>'.stripslashes($row['housetype']).'</td>
                          <td>'.stripslashes($row['owner']).'</td>
                          <td>'.stripslashes($row['mobile']).'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="intopen(9,'.$code.')">Edit Property</option>
                           </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

    
   case 35:
   $result = mysql_query("insert into log values('','".$username." accesses Find Properties Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Units Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Units Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Property Name</th>
                          <th>Unit No</th>
                          <th>Location</th>
                          <th>Unit Type</th>
                          <th>Rent</th>
                          <th>Status</th>
                          <th>Tenant Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from houses order by houseid");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['rid']);
                          $stat=stripslashes($row['status']);
                          if($stat==1){$status='Occupied';$col='#1fae66';}else{$status='Empty';$col='#f89c2c';}
                    
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          
                          <td>'.stripslashes($row['housename']).'</td>
                          <td>'.stripslashes($row['roomno']).'</td>
                          <td>'.stripslashes($row['location']).'</td>
                          <td>'.stripslashes($row['roomtype']).'</td>
                          <td>'.stripslashes($row['rent']).'</td>
                          <td style="background:'.$col.'">'.$status.'</td>
                          <td>'.stripslashes($row['tenant']).'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="intopen(10,'.$code.')">Edit Unit</option>
                           </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

      case 36:
      $result = mysql_query("insert into log values('','".$username." accesses Add Properties Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Add Properties </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add Property  </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Location<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="location">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address">
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">House Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from housetypes");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="housetype" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">House Value</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="value" onkeyup="format(this)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">No. of Units</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="units" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Owner Name <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="owner">
                        </div>
                      </div>
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add Property  </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Owner Phone <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Plot No <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="plot">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Remarks</label>
                        <div class="col-sm-8 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveproperty(1,0)"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 




              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case 37:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Properties</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Edit Properties</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from mainhouses");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['houseid']);
                          echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['houseid']).'-'.stripslashes($row['housename']).'-'.stripslashes($row['location']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:38,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

      case 38:

    $param=$_GET['param'];
    $resultx =mysql_query("select * from mainhouses where houseid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $hid=stripslashes($rowx['houseid']);
    $result = mysql_query("insert into log values('','".$username." accesses Edit Property Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Edit Properties </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Property-'.stripslashes($rowx['housename']).'-['.stripslashes($rowx['location']).']    </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="name" value="'.stripslashes($rowx['housename']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Location<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="location" value="'.stripslashes($rowx['location']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['postal']).'">
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">House Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from housetypes");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="housetype" class="select" >
                          <option value="'.stripslashes($rowx['housetype']).'" selected>'.stripslashes($rowx['housetype']).'</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">House Value</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="value" value="'.stripslashes($rowx['housevalue']).'" onkeyup="format(this)">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">No. of Units</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="units" value="'.stripslashes($rowx['noofrooms']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Owner Name <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="owner" value="'.stripslashes($rowx['owner']).'">
                        </div>
                      </div>

                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Property-'.stripslashes($rowx['housename']).'-['.stripslashes($rowx['location']).']    </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">



                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Owner Phone <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['mobile']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Plot No <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="plot" value="'.stripslashes($rowx['plot']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Remarks</label>
                        <div class="col-sm-8 controls">
                          <textarea rows="3" class="width-100" id="remarks">'.stripslashes($rowx['details']).'</textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-8">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveproperty(2,'.$param.')"><i class="icon-ok"></i> Save</button>
                           <button class="btn vd_btn vd_bg-red vd_white" type="submit" onclick="saveproperty(3,'.$param.')"><i class="icon-ok"></i> Delete</button>
                         <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 





              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case 39:
      $result = mysql_query("insert into log values('','".$username." accesses Add Property Units Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Add Property Units </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add Property Units</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-4">Property<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from mainhouses");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="property" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit No<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="roomno">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Floor Space</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="floorspace" value="">
                        </div>
                      </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Residential/Commercial<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <select id="rescom" class="select">
                          <option value="" selected>Select One...</option>
                           <option value="commercial">Commercial</option>
                          <option value="residential">Residential</option>
                          </select>
                          </div>
                        </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from roomtypes");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="roomtype" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                     <div class="form-group">
                      <label style="float:left" class="col-sm-4">Location<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from locations");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="location" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Rent<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rent" onkeyup="format(this)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Water Meter</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="watermeter">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Meter Reading</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="waterprev">
                        </div>
                      </div>

                       
                       
                    
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add Property Units </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Electricity Meter</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="elecmeter">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Meter Reading</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="elecprev">
                        </div>
                      </div>



                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Remarks</label>
                        <div class="col-sm-8 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveunit(1,0)"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 




              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


    case 40:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Property Units</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Edit Property Units</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from houses");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['houseid']);
                          echo '<option value="'.stripslashes($row['rid']).'">'.stripslashes($row['rid']).'-'.stripslashes($row['housename']).'-'.stripslashes($row['roomno']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:41,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;

    case 41:

    $param=$_GET['param'];
    $resultx =mysql_query("select * from houses where rid='".$param."' limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $hid=stripslashes($rowx['houseid']);
    $result = mysql_query("insert into log values('','".$username." accesses Edit Property Unit Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Edit Units </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Property Unit</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-4">Property<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from mainhouses");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="property" class="select">
                          <option value="'.stripslashes($rowx['houseid']).'" selected>'.stripslashes($rowx['housename']).'</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit No<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="roomno" value="'.stripslashes($rowx['roomno']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Floor Space</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="floorspace" value="'.stripslashes($rowx['floorspace']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Residential/Commercial<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <select id="rescom" class="select">
                          <option value="'.stripslashes($rowx['rescom']).'" selected>'.stripslashes($rowx['rescom']).'</option>
                           <option value="commercial">Commercial</option>
                          <option value="residential">Residential</option>
                          </select>
                          </div>
                        </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from roomtypes");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="roomtype" class="select">
                         <option value="'.stripslashes($rowx['roomtype']).'" selected>'.stripslashes($rowx['roomtype']).'</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>


                      
                     <div class="form-group">
                      <label style="float:left" class="col-sm-4">Location<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from locations");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="location" class="select">
                         <option value="'.stripslashes($rowx['location']).'" selected>'.stripslashes($rowx['location']).'</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Rent<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="rent" onkeyup="format(this)" value="'.stripslashes($rowx['rent']).'">
                        </div>
                      </div>

                      
                       
                    
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Property Unit</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                    <div class="form-group">
                        <label style="float:left" class="col-sm-4">Water Meter</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="watermeter" value="'.stripslashes($rowx['watermeter']).'">
                        </div>
                      </div>

                      <div class="form-group">
                      <label style="float:left" class="col-sm-4">Previous Reading</label>
                        <div class="col-sm-8 controls">
                         <input type="text" id="waterprev" value="'.stripslashes($rowx['waterprevious']).'">
                        </div>
                      </div>
                       
                       
                       
                      
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Electricity Meter</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="elecmeter" value="'.stripslashes($rowx['elecmeter']).'">
                        </div>
                      </div>
                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Previous Reading</label>
                        <div class="col-sm-8 controls">
                           <input type="text" id="elecprev" value="'.stripslashes($rowx['elecprevious']).'">
                        </div>
                      </div>

                     



                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Remarks</label>
                        <div class="col-sm-8 controls">
                          <textarea rows="3" class="width-100" id="remarks">'.stripslashes($rowx['details']).'</textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-8">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveunit(2,'.$param.')"><i class="icon-ok"></i> Save</button>
                           <button class="btn vd_btn vd_bg-red vd_white" type="submit" onclick="saveunit(3,'.$param.')"><i class="icon-ok"></i> Delete</button>
                         <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 




              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case 42:

      echo'<script>document.onkeydown = keydown;
        function keydown(evt){
          if (!evt) evt = event;
      
       if (evt.keyCode==115){ //f4
        evt.preventDefault();
        $("#itemname").parent().find("input:first").focus();  
       }
       if (evt.keyCode==119){ //f8
       evt.preventDefault();
        viewitem(); 
          }
         if (evt.keyCode==112){ //f1
       evt.preventDefault();
         additem(); 
          }
      if (evt.keyCode==121){ //f10
      evt.preventDefault();
      submititem(); 
          }
     if (evt.keyCode==120){ //f9
      evt.preventDefault();
            emptyitem(); 
          }
      
      if (evt.keyCode==114){ //f3
      evt.preventDefault();
      removelastitem();
          }
         
      }</script>';

    $result = mysql_query("insert into log values('','".$username." accesses Make Requisition Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Make Requisition </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Make Requisition</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-1">Property:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="property">';
                        $resulta =mysql_query("select * from mainhouses");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $bid=stripslashes($row['houseid']);
                                    $name=stripslashes($row['housename']);
                                    echo"<option value=\"".$bid."\">".$name."</option>";
                                }
                        echo'
                        </select>
                        </div>
                      <label style="float:left" class="col-sm-1">Location:</label>
                        <div class="col-sm-3 controls">
                         <select id="location">
                        <option value="">Select one...</option>';
                        $resulta =mysql_query("select * from locations  order by id desc");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $bid=stripslashes($row['id']);
                                    $name=stripslashes($row['name']);
                                    echo"<option value=\"".$bid."\">".$name."</option>";
                                }
                        echo'
                        </select>
                        </div>

                        <label style="float:left" class="col-sm-1">Item:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="itemname" onchange="setprice()">
                        <option value="" selected>Select one...</option>';
                         $resulta =mysql_query("select * from items  order by ItemName");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $item=stripslashes($row['ItemName']);
                                    $code=stripslashes($row['ItemCode']);
                                    $price =stripslashes($row['Price']);
                                    echo"<option value=\"".$code."#".$price."\" >".$item."</option>";
                                }
                        echo'
                        </select>
                        </div>
                        <input type="hidden" id="totitems"/>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-1">Qty:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                         <input type="text" id="qty" onkeyup="calcitemtotal(this)">
                        </div>
                      <label style="float:left" class="col-sm-1">Price:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="price" onkeyup="calcitemtotal(this)">
                        </div>

                        <label style="float:left" class="col-sm-1">Total:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="total" disabled>
                        </div>

                         <label style="float:left" class="col-sm-1">Vat:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="vat" value="0">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-1">Description:<span style="color:#f00">*</span></label>
                        <div class="col-sm-5 controls">
                         <input type="text" id="notes">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="additem()"><span class="menu-icon"><i class="icon icon-add-to-list"></i></span>Add Item</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-yellow" onclick="viewitem()"><span class="menu-icon"><i class="fa fa-search"></i></span>View List</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-red" onclick="emptyitem()"><span class="menu-icon"><i class="fa fa-trash-o"></i></span>Empty List</button>
                         </div>


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Items List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case '42.2':
              $depid=$_GET['depid'];
              $depname=$_GET['depname'];
              $quat=$_GET['quat'];
              $itcode=$_GET['itcode'];
              $itname=$_GET['itname'];
              $price=$_GET['price'];
              $total=$_GET['total'];
              $location=$_GET['location'];
              $locid=$_GET['locid'];
              $notes=$_GET['notes'];
              $vat=$_GET['vat'];
              
              if(isset($_SESSION['cart'])){
              $max=count($_SESSION['cart']);
              $_SESSION['cart'][$max]=array($itcode,$itname,$quat,$depid,$depname,$price,$total,$locid,$location,$notes,$vat);
             // $_SESSION['cart'] = array_unique($_SESSION['cart'], SORT_REGULAR);
              $max=count($_SESSION['cart']);
              }
              
              else{
              $_SESSION['cart']=array(array());
              $_SESSION['cart'][0]=array($itcode,$itname,$quat,$depid,$depname,$price,$total,$locid,$location,$notes,$vat);
             // $_SESSION['cart'] = array_unique($_SESSION['cart'], SORT_REGULAR);
              $max=count($_SESSION['cart']);}
              cartitems($max);
              
          break;
          
          case '42.3':
          $pid=$_GET['pid'];
          unset($_SESSION['cart'][$pid]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
          $max=count($_SESSION['cart']);
          cartitems($max);
                
          break;
          
          case '42.4':
        
          if(isset($_SESSION['cart'])){
              $max=count($_SESSION['cart']);
              cartitems($max);
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>'; }
                
          break;
          
          case '42.5':
          $a='cart';
          end($_SESSION[$a]);
          $pid= key($_SESSION[$a]);
          unset($_SESSION[$a][$pid]);
          $_SESSION[$a]=array_values($_SESSION[$a]);
          $max=count($_SESSION[$a]);
          cartitems($max);
                
          break;
          
          case '42.6':
          
          
          if(isset($_SESSION['cart'])){
              unset($_SESSION['cart']);
             echo"<script>$('#totitems').val(0);$('#item44').val('');$('#from').val('');$('#quat').val('');$('#urgency').val('');</script>";
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>';}
                
          break;

           case 43:
        echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Approve Requisition</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>';
                  $arr=array();
                    $resulta =mysql_query("select * from requests where status=1 order by id desc");
                  $num_resultsa = mysql_num_rows($resulta); 
                  for ($i=0; $i <$num_resultsa; $i++) {
                    $rowa=mysql_fetch_array($resulta);
                    $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']).'-'.stripslashes($rowa['depname']).'-'.stripslashes($rowa['location']).'-Date:'.stripslashes($rowa['date']);
                    }
                  echo'<!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Approve Requisition</h3>
                  </div>
                <select id="intcombo">';
                  foreach ($arr as $key => $val) {
                  echo'<option value="'.$key.'">'.$val.'</option>';
                   }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
              <!-- .vd_content --> 
            </div>
            <!-- .vd_container -->';
                echo "<script>
                      $('#intcombo').editableSelect({
                    onSelect: function (element) {
                    var param = $('#intcombo').val();
                    var str = $('#item5').val();
                    var parts=param.split('-',3);
                    param=parts[0];
                    $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                    $.ajax({
                    url:'bridge.php',
                    data:{id:44,param:param},
                    success:function(data){
                    $('#mainp').html(data);
                    }
                    });
                  }
                  }).focus();</script>";

               break;

               case 44:

              $rcptno=$_GET['param'];
              $result = mysql_query("insert into log values('','".$username." Approve Requistion accesses Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
                echo'<div class="vd_container" id="container">
                  <div class="vd_content clearfix">
                    <div class="vd_head-section clearfix">
                      <div class="vd_panel-header">
                        <ul class="breadcrumb">
                          <li><a> Approve Requisition </a></li>
                         </ul>
                        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
                        </div>
           
                      </div>
                    </div>
                    <!-- vd_head-section -->
                    
                    <div class="vd_content-section clearfix">
                      <div class="row" id="form-basic">
                          <div class="col-md-12">
                          <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                              <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Approve Requisition</h3>
                            </div>
                            <div class="panel-body">
                              <form class="form-horizontal" action="#" role="form">';

                                 echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:35%;">Item Name</td>
                                      <td  style="width:15%;">Qty</td>
                                      <td  style="width:15%;">Price</td>
                                      <td  style="width:15%;">Total</td>
                                      <td  style="width:10%;">Save</td>
                                      <td  style="width:10%;">Remove</td>
                                        
                                    </tr>'; 
                                $resulta =mysql_query("select * from requests where rcptno='".$rcptno."'");
                                $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $rowa=mysql_fetch_array($resulta);
                                    $code=stripslashes($rowa['id']);

                                     if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "id="normal'.$code.'"  >';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer" id="normal'.$code.'"  >'; }
                                    echo'
                                     <td style="width:35%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($rowa['itemname']).'</td>
                                     <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input  type="text" style="width:90%;  text-align:center" id="qty'.$code.'" onkeyup="calcitemtotal2('.$code.')"  value="'.stripslashes($rowa['qty']).'"/></td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input  type="text" style="width:90%;  text-align:center" id="price'.$code.'"  onkeyup="calcitemtotal2('.$code.')"   value="'.stripslashes($rowa['price']).'"/></td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input  type="text" style="width:90%;  text-align:center" id="total'.$code.'"  disabled  value="'.stripslashes($rowa['total']).'"/></td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="save'.$code.'"  onclick="saveapprove('.$code.')"><img src="img/save.png" width="20"/></td>
                                    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"  id="del'.$code.'"  onclick="delapprove('.$code.')"><img src="img/delete.png" width="20"/></td>
                                   
                                    </tr>';
                                      }

                                    echo '</tbody></table>
                          <div style="clear:both;width:100%;margin-bottom:5px"></div>
                           <div class="col-sm-3 controls">
                              <button class="btn vd_btn vd_bg-green" onclick="approvedeny(2,'.$rcptno.')"><span class="menu-icon"><i class="icon icon-checkmark"></i></span>Approve Requisition</button>
                           </div>

                            <div class="col-sm-3 controls">
                              <button class="btn vd_btn vd_bg-red" onclick="approvedeny(0,'.$rcptno.')"><span class="menu-icon"><i class="icon icon-cross"></i></span>Reject Requisition</button>
                           </div>

                            <div class="col-sm-3 controls">
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                              <div id="message" style="width:40px;height:40px;float:right"></div>
                            </div>

                              
                              </form>
                            </div>
                          </div>
                          <!-- Panel Widget --> 
                        </div>
                        <!-- col-md-12 --> 


                        
                        </div>
                      <!-- row --> 
                        </div>
                      


                      
                    </div>
                    <!-- .vd_content-section --> 
                    
                  </div>
                  <!-- .vd_content --> 
                </div>
                <!-- .vd_container --> ';


    break;


       case 45:
        echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Requisition Close Out</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>';
                  $arr=array();
                    $resulta =mysql_query("select * from requests where status=2 order by id desc");
                  $num_resultsa = mysql_num_rows($resulta); 
                  for ($i=0; $i <$num_resultsa; $i++) {
                    $rowa=mysql_fetch_array($resulta);
                    $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']).'-'.stripslashes($rowa['depname']).'-'.stripslashes($rowa['location']).'-Date:'.stripslashes($rowa['date']);
                    }
                  echo'<!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Requisition Close Out</h3>
                  </div>
                <select id="intcombo">';
                  foreach ($arr as $key => $val) {
                  echo'<option value="'.$key.'">'.$val.'</option>';
                   }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
              <!-- .vd_content --> 
              </div>
              <!-- .vd_container -->';
                echo "<script>
                      $('#intcombo').editableSelect({
                    onSelect: function (element) {
                    var param = $('#intcombo').val();
                    var str = $('#item5').val();
                    var parts=param.split('-',3);
                    param=parts[0];
                    $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                    $.ajax({
                    url:'bridge.php',
                    data:{id:46,param:param},
                    success:function(data){
                    $('#mainp').html(data);
                    }
                    });
                  }
                  }).focus();</script>";

               break;

            case 46:

              $rcptno=$_GET['param'];
              $result = mysql_query("insert into log values('','".$username."   accesses Requistion Close Out Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
                echo'<div class="vd_container" id="container">
                  <div class="vd_content clearfix">
                    <div class="vd_head-section clearfix">
                      <div class="vd_panel-header">
                        <ul class="breadcrumb">
                          <li><a> Requistion Close Out </a></li>
                         </ul>
                        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
                        </div>
           
                      </div>
                    </div>
                    <!-- vd_head-section -->
                    
                    <div class="vd_content-section clearfix">
                      <div class="row" id="form-basic">
                          <div class="col-md-12">
                          <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                              <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Requistion Close Out</h3>
                            </div>
                            <div class="panel-body">
                              <form class="form-horizontal" action="#" role="form">';

                                 echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; \" >";
                                echo'<tbody>
                                <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:35%;">Item Name</td>
                                      <td  style="width:15%;">Qty</td>
                                      <td  style="width:15%;">Price</td>
                                      <td  style="width:15%;">Total</td>
                                         
                                    </tr>'; 
                                $resulta =mysql_query("select * from requests where rcptno='".$rcptno."'");
                                $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $rowa=mysql_fetch_array($resulta);
                                    $code=stripslashes($rowa['id']);

                                     if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "id="normal'.$code.'"  >';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer" id="normal'.$code.'"  >'; }
                                    echo'
                                     <td style="width:35%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($rowa['itemname']).'</td>
                                     <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input disabled type="text" style="width:90%;  text-align:center" id="qty'.$code.'" onkeyup="calcitemtotal2('.$code.')"  value="'.stripslashes($rowa['qty']).'"/></td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input  disabled type="text" style="width:90%;  text-align:center" id="price'.$code.'"  onkeyup="calcitemtotal2('.$code.')"   value="'.stripslashes($rowa['price']).'"/></td>
                                    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input disabled  type="text" style="width:90%;  text-align:center" id="total'.$code.'"  disabled  value="'.stripslashes($rowa['total']).'"/></td>
                                    
                                    </tr>';
                                      }

                                    echo '</tbody></table>
                                    <div style="clear:both;width:100%;margin-bottom:5px"></div>
                                      <label style="float:left" class="col-sm-1">Supplier:<span style="color:#f00">*</span></label>
                                    <div class="col-sm-3 controls">
                                     <select id="supplier">
                                    <option value="" selected>Select one...</option>';
                                    $resulta =mysql_query("select * from suppliers  order by supname");
                                              $num_resultsa = mysql_num_rows($resulta); 
                                              for ($i=0; $i <$num_resultsa; $i++) {
                                                $row=mysql_fetch_array($resulta);
                                                $bid=stripslashes($row['supid']);
                                                $name=stripslashes($row['supname']);
                                                echo"<option value=\"".$bid."\">".$name."</option>";
                                            }
                                    echo'
                                    </select>
                                    </div>
                                   

                                     <div class="col-sm-3 controls">
                                        <button class="btn vd_btn vd_bg-green" onclick="closereq(4,'.$rcptno.')"><span class="menu-icon"><i class="icon icon-checkmark"></i></span>Approve Payment</button>
                                     </div>

                                      <div class="col-sm-3 controls">
                                        <button class="btn vd_btn vd_bg-red" onclick="closereq(3,'.$rcptno.')"><span class="menu-icon"><i class="icon icon-cross"></i></span>Reject Payment</button>
                                     </div>

                                      <div class="col-sm-2 controls">
                                        <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                                        <div id="message" style="width:40px;height:40px;float:right"></div>
                                      </div>

                              
                              </form>
                            </div>
                          </div>
                          <!-- Panel Widget --> 
                        </div>
                        <!-- col-md-12 --> 


                        
                        </div>
                      <!-- row --> 
                        </div>
                      


                      
                    </div>
                    <!-- .vd_content-section --> 
                    
                  </div>
                  <!-- .vd_content --> 
                </div>
                <!-- .vd_container --> ';


              break;


   case 47:
   $result = mysql_query("insert into log values('','".$username." accesses Find Requisitions Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Requisitions Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

                  $arr=array();
                  $resulta =mysql_query("select * from requests order by id desc");
                  $num_resultsa = mysql_num_rows($resulta); 
                  for ($i=0; $i <$num_resultsa; $i++) {
                    $rowa=mysql_fetch_array($resulta);
                    $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']);
                    }
          
         echo' <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Requisitions Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Property Name</th>
                          <th>Location</th>
                          <th style="width:25%">Items</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';

                
                 

                  foreach ($arr as $key => $val) {
                
                    $items='';
                    $result =mysql_query("select * from requests where rcptno='".$key."' order by id desc");
                    $num_results = mysql_num_rows($result);
                    $total=0;
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['rcptno']);
                          $stat=stripslashes($row['status']);
                          $items.=stripslashes($row['itemname']).';';
                          $total+=preg_replace('~,~', '', stripslashes($row['total']));
                          if($stat==5){$status='Paid';$col='#1fae66';}
                           if($stat==4){$status='Payment Approved';$col='#F85D2C';}
                          if($stat==3){$status='Payment Rejected';$col='#f00';}
                          if($stat==2){$status='Approved';$col='#67B8CB';}
                          if($stat==1){$status='New';$col='#F89C2C';}
                          if($stat==0){$status='Rejected';$col='#f00';}
                          
                        }
                    
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          
                          <td>'.stripslashes($row['depname']).'</td>
                          <td>'.stripslashes($row['location']).'</td>
                          <td style="width:25%;cursor:pointer"  title="Click to View" onclick="window.open(\'report.php?id=4&rcptno='.$code.'\')">'.$items.'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>'.number_format($total).'</td>
                          <td style="background:'.$col.'">'.$status.'</td>
                          <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>';
                            if($stat==1){echo '<option onclick="intopen(1,'.$code.')">Approve/Reject Requisition</option>'; }
                            if($stat==2){echo '<option onclick="intopen(1,'.$code.')">Approve/Reject Payment</option>'; }
                            if($stat==4){echo '<option onclick="intopen(1,'.$code.')">Pay Requisition</option>'; }
                            
                          echo' </select>
                          </td>
                         </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

        case 48:

              $result = mysql_query("insert into log values('','".$username." Add/Edit Items accesses Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
                echo'<div class="vd_container" id="container">
                  <div class="vd_content clearfix">
                    <div class="vd_head-section clearfix">
                      <div class="vd_panel-header">
                        <ul class="breadcrumb">
                          <li><a> Add/Edit Items </a></li>
                         </ul>
                        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
                        </div>
           
                      </div>
                    </div>
                    <!-- vd_head-section -->
                    
                    <div class="vd_content-section clearfix">
                      <div class="row" id="form-basic">
                          <div class="col-md-12">
                          <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                              <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add/Edit Requisition Items</h3>
                            </div>
                               <div class="panel-body table-responsive">
                                <div class="col-sm-3 controls">
                                  <button class="btn vd_btn vd_bg-green"  data-toggle="modal" data-target="#myModal"><span class="menu-icon"><i class="icon icon-checkmark"></i></span>Add Item</button>
                               </div>

                            

                            <div class="col-sm-3 controls">
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                             </div>

                             <div style="clear:both;width:100%;margin-bottom:5px"></div>
                              <table class="table table-striped" id="data-tables">
                              <thead>
                                <tr>
                                      <th  style="width:10%;">Item Code</th>
                                      <th  style="width:30%;">Item Name</th>
                                      <th  style="width:25%;">Account</th>
                                      <th  style="width:15%;">Price</th>
                                      <th  style="width:10%;">Save</th>
                                      <th  style="width:10%;">Remove</th>
                                        
                                    </tr>
                                    </thead>
                                   <tbody>'; 
                                  $resulta =mysql_query("select * from items");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $rowa=mysql_fetch_array($resulta);
                                    $code=stripslashes($rowa['ItemCode']);

                                    echo'<tr class="gradeX" id="normal'.$code.'" >
                                     <td style="width:10%;">'.stripslashes($rowa['ItemCode']).'</td>
                                     <td style="width:30%;"><input  type="text" style="width:90%;  text-align:center" id="name'.$code.'" value="'.stripslashes($rowa['ItemName']).'"/></td>
                                     <td style="width:25%;">
                                     <select id="account'.$code.'">
                                    <option value="'.stripslashes($rowa['Lid']).'">'.stripslashes($rowa['Lname']).'</option>';
                                     $resultx =mysql_query("select * from ledgers where type='Expense' or type='Asset' order by name");
                                      $num_resultsx = mysql_num_rows($resultx);
                                        for ($x=0; $x <$num_resultsx; $x++) {
                                            $rowx=mysql_fetch_array($resultx);
                                             echo '<option value="'.stripslashes($rowx['ledgerid']).'">'.stripslashes($rowx['name']).'</option>';
                                          }
                                     echo'</select>

                                     </td>
                                     <td style="width:15%;"><input  type="text" style="width:90%;  text-align:center" id="price'.$code.'" value="'.stripslashes($rowa['Price']).'"/></td>
                                    <td style="width:10%;cursor:pointer" id="save'.$code.'"  onclick="savereqitem('.$code.')"><img src="img/save.png" width="30"/></td>
                                    <td style="width:10%;cursor:pointer" id="del'.$code.'"  onclick="delreqitem('.$code.')" ><img src="img/delete.png" width="30"/></td>
                                   
                                    </tr>';
                                      }

                                    echo'</tbody>
                                  </table>


                                    <!-- Modal -->
                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header vd_bg-green vd_white">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                          <h4 class="modal-title" id="myModalLabel">Add New Item</h4>
                                        </div>
                                        <div class="modal-body"> 
                                          <form class="form-horizontal" action="#" role="form">
                                        

                                       
                                             <div class="form-group">
                                              <label class="col-sm-4 control-label">Item Name</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="nitem" required>
                                              </div>

                                            </div>

                                             
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Price</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="nprice" required>
                                              </div>
                                              
                                        </div>

                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Account</label>
                                              <div class="col-sm-7 controls">
                                                <select id="naccount" required>
                                              <option value="">Select One...</option>';
                                               $resultx =mysql_query("select * from ledgers where type='Expense' order by name");
                                                $num_resultsx = mysql_num_rows($resultx);
                                                  for ($x=0; $x <$num_resultsx; $x++) {
                                                      $rowx=mysql_fetch_array($resultx);
                                                       echo '<option value="'.stripslashes($rowx['ledgerid']).'">'.stripslashes($rowx['name']).'</option>';
                                                    }
                                               echo'</select>
                                              </div>
                                              
                                        </div>

                                        </div>

                                        <div class="modal-footer background-login">
                                          <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn vd_btn vd_bg-green" onclick="addnewreqitem()">Save Item</button>
                                          <div id="message" style="width:40px;height:40px;float:right"></div>
                                        </div>
                                      </div>
                                      <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                  </div>
                                  <!-- /.modal --> 



                                </div>
                              </div>
                              <!-- Panel Widget --> 
                            </div>
                            <!-- col-md-12 --> 
                          </div>
                          <!-- row --> 
                          
                        </div>
                        <!-- .vd_content-section --> 
                        
                      </div>
                      <!-- .vd_content --> 
                    </div>
                    <!-- .vd_container --> 

                    

                    <script type="text/javascript">
                    $(document).ready(function() {
                        "use strict";
                        $("#data-tables").dataTable();
                    } );
                    </script> 

                        ';

                   break;

          case 49:
          if(isset($_SESSION['rent'])){unset($_SESSION['rent']);}
           echo'<script>document.onkeydown = keydown;
        function keydown(evt){
          if (!evt) evt = event;
      
             if (evt.keyCode==115){ //f4
              evt.preventDefault();
              $("#itemname").parent().find("input:first").focus();  
             }
             if (evt.keyCode==119){ //f8
             evt.preventDefault();
              viewrent(); 
                }
               if (evt.keyCode==112){ //f1
             evt.preventDefault();
               addrent(); 
                }
            if (evt.keyCode==121){ //f10
            evt.preventDefault();
            submitrent(); 
                }
           if (evt.keyCode==120){ //f9
            evt.preventDefault();
                  emptyrent(); 
                }
            
            if (evt.keyCode==114){ //f3
            evt.preventDefault();
            removelastrent();
          }
         
      }</script>';

    $result = mysql_query("insert into log values('','".$username." accesses Tenant Invoicing Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Tenant Invoicing </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Tenant Invoicing</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-1">Tenant:<span style="color:#f00">*</span></label>
                        <div class="col-sm-4 controls">
                        <input type="text" placeholder="" id="tenant">
                        <input type="hidden" id="totitems"/>
                        </div>

                        <label style="float:left" class="col-sm-1">Month:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                        <input type="text" placeholder="" id="month">
                        </div>

                        <label style="float:left" class="col-sm-1">Item:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="itemname">
                        </div>

                        
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-1">Qty:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <input type="text" id="qty" onkeyup="calcitemtotal(this)">
                        </div>
                      <label style="float:left" class="col-sm-1">Price:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="price" onkeyup="calcitemtotal(this)">
                        </div>

                        <label style="float:left" class="col-sm-1">Total:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="total" disabled>
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-1">Description:</label>
                        <div class="col-sm-5 controls">
                         <input type="text" id="notes">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="addrent()"><span class="menu-icon"><i class="icon icon-add-to-list"></i></span>Add Item</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-yellow" onclick="viewrent()"><span class="menu-icon"><i class="fa fa-search"></i></span>View List</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-red" onclick="emptyrent()"><span class="menu-icon"><i class="fa fa-trash-o"></i></span>Empty List</button>
                         </div>


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Items List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
        echo '<script>
          var tenants = ['.$_SESSION['tenants'].'];
          $( "#tenant" ).autocomplete({source: tenants});
           var activities = ['.$_SESSION['activities'].'];
          $( "#itemname" ).autocomplete({source: activities});
          </script>';
          echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'}); </script>";


    break;

    case '49.2':
            $tid=$_GET['tid'];
            $tname=$_GET['tname'];
            $roomno=$_GET['roomno'];
            $actid=$_GET['actid'];
            $actname=$_GET['actname'];
            $quat=$_GET['quat'];
            $price=$_GET['price'];
            $total=$_GET['total'];
            $notes=$_GET['notes'];
            $month=$_GET['month'];
            
            if(isset($_SESSION['rent'])){
            $max=count($_SESSION['rent']);
            $_SESSION['rent'][$max]=array($tid,$tname,$quat,$actid,$actname,$price,$total,$roomno,$month,$notes);
            //$_SESSION['rent'] = array_unique($_SESSION['rent'], SORT_REGULAR);
            $max=count($_SESSION['rent']);
            }
            
            else{
            $_SESSION['rent']=array(array());
            $_SESSION['rent'][0]=array($tid,$tname,$quat,$actid,$actname,$price,$total,$roomno,$month,$notes);
           // $_SESSION['rent'] = array_unique($_SESSION['rent'], SORT_REGULAR);
            $max=count($_SESSION['rent']);}
            cartrent($max);
              
          break;
          
          case '49.3':
          $pid=$_GET['pid'];
          unset($_SESSION['rent'][$pid]);
          $_SESSION['rent']=array_values($_SESSION['rent']);
          $max=count($_SESSION['rent']);
          cartrent($max);
                
          break;
          
          case '49.4':
        
          if(isset($_SESSION['rent'])){
              $max=count($_SESSION['rent']);
              cartrent($max);
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>'; }
                
          break;
          
          case '49.5':
          $a='rent';
          end($_SESSION[$a]);
          $pid= key($_SESSION[$a]);
          unset($_SESSION[$a][$pid]);
          $_SESSION[$a]=array_values($_SESSION[$a]);
          $max=count($_SESSION[$a]);
          cartrent($max);
                
          break;
          
          case '49.6':
          
          
          if(isset($_SESSION['rent'])){
              unset($_SESSION['rent']);
             echo"<script>$('#totitems').val(0);$('#item44').val('');$('#from').val('');$('#quat').val('');$('#urgency').val('');</script>";
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>';}
                
          break;

           case 50:
          if(isset($_SESSION['receive'])){unset($_SESSION['receive']);}
         

    $result = mysql_query("insert into log values('','".$username." accesses Receive Payments Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Receive Payments </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Receive Payments</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-2">Tenant:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="tenant">
                        </div>

                        <label style="float:left" class="col-sm-2">Balance:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="prevbal" disabled>
                        </div>

                        </div>

                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Invoices List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Submit  Payments</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-2">Total Entries:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <input type="text" id="totitems" disabled>
                         <input type="hidden" id="invtot">
                         <input type="hidden" id="paytot">
                        </div>
                      <label style="float:left" class="col-sm-2">Final Total:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="fintot" disabled>
                        </div>
                       </div>

                   <div class="form-group">
                        <label style="float:left" class="col-sm-2">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers where subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>

                         <label style="float:left" class="col-sm-1">Date:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="bankdate" value="'.date('d/m/Y').'">
                        </div>

                        <label style="float:left" class="col-sm-1">Ref No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="refno">
                        </div>
                        
                          <div class="col-sm-2 controls" style="">
                            <button class="btn vd_btn vd_bg-green" onclick="submitreceivefee()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit</button>
                         </div>

                         


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
              </div>
            <!-- row --> 
              </div>
            
            </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
          echo "<script>
          var tenants = [".$_SESSION['tenants']."];
          $( '#tenant' ).autocomplete({
            source: tenants,
            select: function( event, ui ) {
                setTimeout(function() {
                var param = $('#tenant').val();
                var parts=param.split('-',3);
                param=parts[0];
                $('#display').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                $.ajax({
                url:'bridge.php',
                data:{id:50.1,param:param},
                success:function(data){
                $('#display').html(data);
                }
                });
                },500);
            }

            });
          </script>";
          echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'}); </script>";
           echo "<script>  $( '#bankdate' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


              break;

              case 50.1:
              $param=$tid=$_GET['param'];
              //$sess=$_GET['sess'];
              unset($_SESSION['receive']);
              
              $resulty =mysql_query("select * from invoices where tid='".$tid."' and  (invstatus=1 or invbal<0)");
              $num_resultsy = mysql_num_rows($resulty);
               $xy=0;
              $_SESSION['receive']=array();
                for ($i=0; $i <$num_resultsy; $i++) {
                $rowy=mysql_fetch_array($resulty);
                $xy+=stripslashes($rowy['invamount']);
                $_SESSION['receive'][$i]=array(stripslashes($rowy['id']),stripslashes($rowy['actname']),stripslashes($rowy['invamount']),stripslashes($rowy['paid']),stripslashes($rowy['invbal']),'',stripslashes($rowy['mon']));
              }

              $max=count($_SESSION['receive']);


              $invtot=0;$paidtot=0;$fintot=0;
              for ($i = 0; $i < $max; $i++){
              $fintot+=preg_replace('~,~', '', $_SESSION['receive'][$i][5]);
              }

              $bal=0;
              $resulta =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
              $row=mysql_fetch_array($resulta);
              $bal=stripslashes($row['bal']);

              //$bal=number_format($bal);
              
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#prevbal').val(".$bal.")</script>
              <script>$('#fintot').val((".$fintot.").formatMoney(2, '.', ','))</script>";
            
              cartreceive($max);
                      
              

              break;

              case 50.2:
              $code=$_GET['code'];
              $paying=$_GET['paying'];
              $_SESSION['receive'][$code][5]=$paying;
              $max=count($_SESSION['receive']);

              $paidtot=0;
              for ($i = 0; $i < $max; $i++){
              $paidtot+=preg_replace('~,~', '', $_SESSION['receive'][$i][5]);
              }
              
              echo"<script>$('#fintot').val((".$paidtot.").formatMoney(2, '.', ','))</script>
              <script>$('#paytot').html((".$paidtot.").formatMoney(2, '.', ','))</script>";
              echo'<img src="img/tick.png" style="width:30px; height:30px">';
              
              

              break;


               case 51:
               $result = mysql_query("insert into log values('','".$username." accesses Find Invoices/Receits Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
               echo' <div class="vd_container" id="container">
                    <div class="vd_content clearfix">
                      <div class="vd_head-section clearfix">
                        <div class="vd_panel-header">
                          <ul class="breadcrumb">
                            <li><a>Receipts/Invoices Search Panel</a></li>
                           </ul>
                          <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                  <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                  <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                  <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                  
                          </div>
             
                        </div>
                      </div>
                      <!-- vd_head-section -->
                      
                      <div class="vd_content-section clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="panel widget">
                              <div class="panel-heading vd_bg-grey">
                                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Receipts/Invoices Search Panel</h3>
                              </div>
                              <div class="panel-body table-responsive">
                                <table class="table table-striped" id="data-tables">
                                  <thead>
                                    <tr>
                                      <th>Tenant Name</th>
                                      <th>Unit No</th>
                                      <th>Type</th>
                                      <th>Inv/Receipt No</th>
                                      <th>Date</th>
                                      <th>Amount</th>
                                      </tr>
                                  </thead>
                                  <tbody>';
                                $result =mysql_query("select * from receipts where status=1 order by serial desc");
                                $num_results = mysql_num_rows($result);
                                  for ($i=0; $i <$num_results; $i++) {
                                      $row=mysql_fetch_array($result);
                                      $code=stripslashes($row['serial']);
                                      $categ=stripslashes($row['categ']);
                                      if(stripslashes($row['drcr'])=='dr'){
                                        $type='Invoice';$out=5;$rcptno=stripslashes($row['invno']);$col='#f89c2c';if(stripslashes($row['amount'])<0){$type='Credit Note';}
                                      }else{
                                        $type='Receipt';$out=6;$rcptno=stripslashes($row['rcptno']);$col='#1fae66';
                                      }

                                      if($categ==3){$out=7;}if($categ==4){$out=8;}

                                   
                                      echo"<tr class=\"gradeX\" id=\"normal".$code."\" title=\"Click to View\" style=\"cursor:pointer\" onclick=\"window.open('report.php?id=".$out."&rcptno=".$rcptno."')\" >";
                                      echo'<td>'.stripslashes($row['tname']).'</td>
                                      <td>'.stripslashes($row['rno']).'</td>
                                      <td style="background:'.$col.'">'.$type.'</td>
                                      <td>'.$rcptno.'</td>
                                      <td>'.stripslashes($row['date']).'</td>
                                      <td>'.number_format(stripslashes($row['amount'])).'</td>
                                      </tr>';

                                    }
                                   
                                  echo'</tbody>
                                </table>
                              </div>
                            </div>
                            <!-- Panel Widget --> 
                          </div>
                          <!-- col-md-12 --> 
                        </div>
                        <!-- row --> 
                        
                      </div>
                      <!-- .vd_content-section --> 
                      
                    </div>
                    <!-- .vd_content --> 
                  </div>
                  <!-- .vd_container --> 

                  <script type="text/javascript">
                  $(document).ready(function() {
                      "use strict";
                      $("#data-tables").dataTable();
                  } );
                  </script> ';
                    break;

                    case 52:
          if(isset($_SESSION['journal'])){unset($_SESSION['journal']);}
           echo'<script>document.onkeydown = keydown;
            function keydown(evt){
              if (!evt) evt = event;
          
          
          if (evt.keyCode==119){ //f8
           evt.preventDefault();
               viewjournal(); 
              }
             if (evt.keyCode==112){ //f1
           evt.preventDefault();
                addjournal(); 
              }
          if (evt.keyCode==121){ //f10
          evt.preventDefault();
          submitjournal();
              }
          
          if (evt.keyCode==120){ //f9
          evt.preventDefault();
               emptyjournal(); 
              }
          if (evt.keyCode==114){ //f3
          evt.preventDefault();
          removelastjournal();
              }
             
          }</script>';

    $result = mysql_query("insert into log values('','".$username." accesses Make Journal Entries Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> New Journal Entry </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-9">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>New Journal Entry</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-1">Type:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="transtype">
                          <option value="">Select one...</option>
                        <option value="Debit">Debit</option>
                        <option value="Credit">Credit</option></select>
                        </div>

                        <label style="float:left" class="col-sm-1">Ledger:<span style="color:#f00">*</span></label>
                        <div class="col-sm-5 controls">
                        <input type="text" placeholder="" id="ledgername">
                        </div>

                       </div>

                        <div class="form-group supten" style="display:none" id="tendiv">
                        <label style="float:left" class="col-sm-1">Tenant:<span style="color:#f00">*</span></label>
                        <div class="col-sm-5 controls">
                        <input type="text" placeholder="" id="tenantname">
                        </div>
                         <label style="float:left" class="col-sm-1">Item:<span style="color:#f00">*</span></label>
                        <div class="col-sm-5 controls">
                        <input type="text" placeholder="" id="itemname">
                        </div>

                       </div>

                       <div class="form-group supten" style="display:none" id="supdiv">
                        <label style="float:left" class="col-sm-1">Supplier:<span style="color:#f00">*</span></label>
                        <div class="col-sm-5 controls">
                        <input type="text" placeholder="" id="suppliername">
                        </div>

                       </div>

                     

                        <div class="form-group">
                        <label style="float:left" class="col-sm-1">Amount:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                         <input type="text" id="amount" onkeyup="format(this)">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="addjournal()"><span class="menu-icon"><i class="icon icon-add-to-list"></i></span>Add Entry</button>
                         </div>

                          <div class="col-sm-3 controls">
                            <button class="btn vd_btn vd_bg-yellow" onclick="viewjournal()"><span class="menu-icon"><i class="fa fa-search"></i></span>View Entries</button>
                         </div>

                          <div class="col-sm-4 controls">
                            <button class="btn vd_btn vd_bg-red" onclick="emptyjournal()"><span class="menu-icon"><i class="fa fa-trash-o"></i></span>Empty Entry List</button>
                         </div>


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 

                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Entries List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 


              </div>
              <!-- col-md-9 --> 


              <div class="col-md-3">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Submit Entry</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">';
                    $max=0;
                    if(isset($_SESSION['journal'])){
                    $max=count($_SESSION['journal']);
                    $dr=0;$cr=0;
                    for ($i = 0; $i < $max; $i++){
                      if($_SESSION['journal'][$i][2]=='Debit'){
                        $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                      }else{
                        $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                      } 
                    }
                    echo"<script>$('#totitems').val(".$max.")</script>
                    <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
                    <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";
                    }
                    
                    echo'
                        <div class="form-group">
                         <label style="float:left" class="col-sm-4">Date:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="date" value="'.date('d/m/Y').'" disabled>
                        </div>
                         </div>

                         <div class="form-group">
                         <label style="float:left" class="col-sm-4">Total Entries:</label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="totitems" value="'.$max.'" disabled>
                        </div>
                         </div>

                          <div class="form-group">
                         <label style="float:left" class="col-sm-4">DR Amount:</label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="dramount" value="" disabled>
                        </div>
                         </div>

                           <div class="form-group">
                         <label style="float:left" class="col-sm-4">CR Amount:</label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="cramount" value="" disabled>
                        </div>
                         </div>

                           <div class="form-group">
                         <label style="float:left" class="col-sm-4">Description:<span style="color:#f00">*</span></label>
                         <div style="clear:both;width:100%"></div>
                          <div class="col-sm-12 controls">
                          <textarea id="notes" col="5"></textarea>
                          </div>
                         </div>

                           <div class="form-group">
                         <label style="float:left" class="col-sm-4">Refno:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="refno" value="">
                        </div>
                         </div>

                         <div class="col-sm-8 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="submitjournal()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit Entry</button>
                         </div>
                    
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-3 --> 

              
              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
        <!-- .vd_container --> ';

              $suppliers='';
              $resulta =mysql_query("select * from suppliers order by supname");
              $num_resultsa = mysql_num_rows($resulta); 
              for ($i=0; $i <$num_resultsa; $i++) {
              $row=mysql_fetch_array($resulta);
              $item=stripslashes($row['supid']).'-'.stripslashes($row['supname']);
              $suppliers.='"'.$item.'",';
              }
              $len=strlen($suppliers);
              $a=$len-1;
              $suppliers=substr($suppliers,0,$a);
     
                 echo '<script>
                      var ledgers = ['.$_SESSION['ledgers'].'];
                      var tenants = ['.$_SESSION['tenants'].'];
                      var suppliers = ['.$suppliers.'];
                      $( "#tenantname" ).autocomplete({source: tenants});
                      $( "#suppliername" ).autocomplete({source: suppliers});
                      var activities = ['.$_SESSION['activities'].'];
                      $( "#itemname" ).autocomplete({source: activities});
                      </script>';
             echo "<script>  $( '#date' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";

                echo "<script>
                $('#ledgername' ).autocomplete({
                  source: ledgers,
                  select: function( event, ui ) {
                    $('.supten').hide();
                     setTimeout(function() {
                      var param = $('#ledgername').val();
                      var parts=param.split('-',3);
                      param=parts[0];
                      if(param==628){
                        $('#tendiv').show();
                      }
                      if(param==629){
                        $('#supdiv').show();
                      }
                    },200);
                   
                    }
                });
          </script>";

            break;


              case '52.3':
              
              
              $amount=$_GET['amount'];
              $lid=$_GET['lid'];
              $lname=$_GET['lname'];
              $type=$_GET['type'];
              $subid=$_GET['subid'];
              $item=$_GET['item'];
              
              if(isset($_SESSION['journal'])){
              $max=count($_SESSION['journal']);
              $_SESSION['journal'][$max]=array($lid,$lname,$type,$amount,$subid,$item);
              $max=count($_SESSION['journal']);
              }
              
              else{
              $_SESSION['journal']=array(array());
              $_SESSION['journal'][0]=array($lid,$lname,$type,$amount,$subid,$item);
              $max=count($_SESSION['journal']);}
               $dr=0;$cr=0;
              for ($i = 0; $i < $max; $i++){
                if($_SESSION['journal'][$i][2]=='Debit'){
                  $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                }else{
                  $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                } 
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
              <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";

              cartjournal($max);
              
              
          break;  
            case '52.4':
          $pid=$_GET['pid'];
          unset($_SESSION['journal'][$pid]);
          $_SESSION['journal']=array_values($_SESSION['journal']);
          $max=count($_SESSION['journal']);
          $dr=0;$cr=0;
              for ($i = 0; $i < $max; $i++){
                if($_SESSION['journal'][$i][2]=='Debit'){
                  $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                }else{
                  $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                } 
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
              <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";

              cartjournal($max);
                
          break;
          
            case '52.5':
          
              if(isset($_SESSION['journal'])){
              $max=count($_SESSION['journal']);

              $dr=0;$cr=0;
              for ($i = 0; $i < $max; $i++){
                if($_SESSION['journal'][$i][2]=='Debit'){
                  $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                }else{
                  $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                } 
              
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
              <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";



              cartjournal($max);

          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>'; 
                    
                  }
                
          break;
          
            case '52.6':
          
          
          if(isset($_SESSION['journal'])){
              unset($_SESSION['journal']);
              $dr=0;$cr=0;
              $max=count($_SESSION['journal']);
              for ($i = 0; $i < $max; $i++){
                if($_SESSION['journal'][$i][2]=='Debit'){
                  $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                }else{
                  $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                } 
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
              <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";

              cartjournal($max);
              
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>'; 
                    
                  }
                
          break;
            case '52.7':
          end($_SESSION['journal']);
          $pid= key($_SESSION['journal']);
          unset($_SESSION['journal'][$pid]);
          $_SESSION['journal']=array_values($_SESSION['journal']);
          $max=count($_SESSION['journal']);
          $dr=0;$cr=0;
              for ($i = 0; $i < $max; $i++){
                if($_SESSION['journal'][$i][2]=='Debit'){
                  $dr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                }else{
                  $cr+=preg_replace('~,~', '', $_SESSION['journal'][$i][3]);
                } 
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#dramount').val((".$dr.").formatMoney(2, '.', ','))</script>
              <script>$('#cramount').val((".$cr.").formatMoney(2, '.', ','))</script>";

              cartjournal($max);
                
          break;

           case 53:
               $result = mysql_query("insert into log values('','".$username." accesses Find Journal Entries Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
               echo' <div class="vd_container" id="container">
                    <div class="vd_content clearfix">
                      <div class="vd_head-section clearfix">
                        <div class="vd_panel-header">
                          <ul class="breadcrumb">
                            <li><a>Journal Entries Search Panel</a></li>
                           </ul>
                          <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                  <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                  <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                  <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                  
                          </div>
             
                        </div>
                      </div>
                      <!-- vd_head-section -->
                      
                      <div class="vd_content-section clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="panel widget">
                              <div class="panel-heading vd_bg-grey">
                                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Journal Entries Search Panel</h3>
                              </div>
                              <div class="panel-body table-responsive">
                                <table class="table table-striped" id="data-tables">
                                  <thead>
                                    <tr>
                                      <th>Entry No</th>
                                      <th>Date</th>
                                      <th>Ledger Name</th>
                                      <th>Description</th>
                                      <th>Amount</th>
                                      </tr>
                                  </thead>
                                  <tbody>';
                                  $result =mysql_query("select * from ledgerentries where status=1 order by transid desc");
                                  $num_results = mysql_num_rows($result);
                                    for ($i=0; $i <$num_results; $i++) {
                                      $row=mysql_fetch_array($result);
                                      $code=stripslashes($row['transid']);
                                      
                                     echo"<tr class=\"gradeX\" id=\"normal".$code."\" onClick=\"seejournal(".stripslashes($row['rcptno']).")\" title=\"Preview Journal\"  style=\"cursor:pointer\">";
                                      echo'<td>'.stripslashes($row['rcptno']).'</td>
                                      <td>'.dateprint(stripslashes($row['date'])).'</td>
                                      <td>'.stripslashes($row['lname']).'</td>
                                       <td>'.stripslashes($row['description']).'</td>
                                      <td>'.number_format(floatval($row['amount'])).'</td>
                                      </tr>';

                                    }
                                   
                                  echo'</tbody>
                                </table>
                              </div>
                            </div>
                            <!-- Panel Widget --> 
                          </div>
                          <!-- col-md-12 --> 
                        </div>
                        <!-- row --> 
                        
                      </div>
                      <!-- .vd_content-section --> 
                      
                    </div>
                    <!-- .vd_content --> 
                  </div>
                  <!-- .vd_container --> 
                  <div style="clear:both; margin-bottom:10px" id="seejournal"></div>

                  <script type="text/javascript">
                  $(document).ready(function() {
                      "use strict";
                      $("#data-tables").dataTable();
                  } );
                  </script> ';
                    break;

                case 54:

              $result = mysql_query("insert into log values('','".$username."  accesses Chart of Accounts Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
                echo'<div class="vd_container" id="container">
                  <div class="vd_content clearfix">
                    <div class="vd_head-section clearfix">
                      <div class="vd_panel-header">
                        <ul class="breadcrumb">
                          <li><a> Chart of Accounts </a></li>
                         </ul>
                        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
                        </div>
           
                      </div>
                    </div>
                    <!-- vd_head-section -->
                    
                    <div class="vd_content-section clearfix">
                      <div class="row" id="form-basic">
                          <div class="col-md-12">
                          <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                              <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Chart of Accounts </h3>
                            </div>
                               <div class="panel-body table-responsive">
                                <div class="col-sm-3 controls">
                                  <button class="btn vd_btn vd_bg-green"  data-toggle="modal" data-target="#myModal"><span class="menu-icon"><i class="icon icon-checkmark"></i></span>Add Ledger</button>
                               </div>

                            

                            <div class="col-sm-3 controls">
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                             </div>

                             <div style="clear:both;width:100%;margin-bottom:5px"></div>
                              <table class="table table-striped" id="data-tables">
                              <thead>
                                <tr>
                                      <th>Ledger Code</th>
                                      <th>Ledger Name</th>
                                      <th>Main Account</th>
                                      <th>Save</th>
                                      <th>Remove</th>
                                        
                                    </tr>
                                    </thead>
                                   <tbody>'; 
                                  $resulta =mysql_query("SELECT * FROM ledgers order by code");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $rowa=mysql_fetch_array($resulta);
                                    $code=stripslashes($rowa['ledgerid']);

                                    echo'<tr class="gradeX" id="normal'.$code.'" >
                                     <td id="ledgercode'.$code.'" >'.stripslashes($rowa['code']).'</td>
                                     <td><input  type="text" style="width:90%;  text-align:center" id="name'.$code.'" value="'.stripslashes($rowa['name']).'"/></td>
                                     <td>
                                      <select id="subcat'.$code.'" style="width:90%">
                                     <option value="'.stripslashes($rowa['subcat']).'" selected="selected">'.stripslashes($rowa['subcat']).'</option>';
                                      $resultx =mysql_query("select * from ledgersubcategories order by name");
                                      $num_resultsx = mysql_num_rows($resultx);
                                      for ($x=0; $x <$num_resultsx; $x++) {
                                          $rowx=mysql_fetch_array($resultx);
                                          echo'<option value="'.stripslashes($rowx['name']).'">'.stripslashes($rowx['name']).'</option>';
                                      }
                                      echo'
                                      </select>
                                      </td>
                                     <td id="save'.$code.'"  onclick="saveledger('.$code.')" style="cursor:pointer"><img src="img/save.png" width="30"/></td>
                                     <td id="del'.$code.'"  onclick="removeledger('.$code.')"  style="cursor:pointer"><img src="img/delete.png" width="30"/></td>
                                      </tr>';
                                      }

                                    echo'</tbody>
                                  </table>


                                    <!-- Modal -->
                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header vd_bg-green vd_white">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                          <h4 class="modal-title" id="myModalLabel">Add New Ledger</h4>
                                        </div>
                                        <div class="modal-body"> 
                                          <form class="form-horizontal" action="#" role="form">
                                        

                                       
                                             <div class="form-group">
                                              <label class="col-sm-4 control-label">Ledger Name</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="ledgername" required>
                                              </div>

                                            </div>

                                             
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Category</label>
                                              <div class="col-sm-7 controls">
                                               <select id="ledgercat" style="width:90%">
                                               <option value="" selected="selected">Select One...</option>';
                                                $resultx =mysql_query("select * from ledgersubcategories order by name");
                                                $num_resultsx = mysql_num_rows($resultx);
                                                for ($x=0; $x <$num_resultsx; $x++) {
                                                    $rowx=mysql_fetch_array($resultx);
                                                    echo'<option value="'.stripslashes($rowx['id']).'">'.stripslashes($rowx['name']).'</option>';
                                                }
                                                echo'
                                                </select>
                                              </div>
                                              </form>
                                        </div>

                                        </div>

                                        <div class="modal-footer background-login">
                                          <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn vd_btn vd_bg-green" onclick="addnewledger()">Save Ledger</button>
                                          <div id="message" style="width:40px;height:40px;float:right"></div>
                                        </div>
                                      </div>
                                      <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                  </div>
                                  <!-- /.modal --> 



                                </div>
                              </div>
                              <!-- Panel Widget --> 
                            </div>
                            <!-- col-md-12 --> 
                          </div>
                          <!-- row --> 
                          
                        </div>
                        <!-- .vd_content-section --> 
                        
                      </div>
                      <!-- .vd_content --> 
                    </div>
                    <!-- .vd_container --> 

                    

                    <script type="text/javascript">
                    $(document).ready(function() {
                        "use strict";
                        $("#data-tables").dataTable();
                    } );
                    </script> 

                        ';

                   break;

        case 55:
          if(isset($_SESSION['expense'])){unset($_SESSION['expense']);}
           echo'<script>document.onkeydown = keydown;
           function keydown(evt){
        if (!evt) evt = event;
    
            if (evt.keyCode==113){ //f2
                 evt.preventDefault();
                  $("#pricexpense").focus();
               }
               if (evt.keyCode==115){ //f4
                evt.preventDefault();
                    $("#itemexpense").parent().find("input:first").focus();   
               }
               if (evt.keyCode==119){ //f8
               evt.preventDefault();
                   viewexpense(); 
                  }
                 if (evt.keyCode==112){ //f1
               evt.preventDefault();
                    addexpense(); 
                  }
              if (evt.keyCode==121){ //f10
              evt.preventDefault();
              submitexpense();
                  }
              
              if (evt.keyCode==120){ //f9
              evt.preventDefault();
                   emptyexpense(); 
                  }
              if (evt.keyCode==114){ //f3
              evt.preventDefault();
              removelastexpense();
                  }
             
          }</script>';

    $result = mysql_query("insert into log values('','".$username." accesses Expenses Management Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Expenses Transactions Management </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-9">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Expenses Transactions Management</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        
                        <label style="float:left" class="col-sm-1">Ledger:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="ledgername">
                        </div>

                        <label style="float:left" class="col-sm-2">Description:<span style="color:#f00">*</span></label>
                        <div class="col-sm-6 controls">
                        <input type="text" placeholder="" id="desc">
                        </div>

                       </div>

                     

                        <div class="form-group">
                        <label style="float:left" class="col-sm-1">Amount:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                         <input type="text" id="pricexpense" onkeyup="format(this)">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="addexpense()"><span class="menu-icon"><i class="icon icon-add-to-list"></i></span>Add Entry</button>
                         </div>

                          <div class="col-sm-3 controls">
                            <button class="btn vd_btn vd_bg-yellow" onclick="viewexpense()"><span class="menu-icon"><i class="fa fa-search"></i></span>View Entries</button>
                         </div>

                          <div class="col-sm-4 controls">
                            <button class="btn vd_btn vd_bg-red" onclick="emptyexpense()"><span class="menu-icon"><i class="fa fa-trash-o"></i></span>Empty Entry List</button>
                         </div>


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 

                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Entries List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 


              </div>
              <!-- col-md-9 --> 


              <div class="col-md-3">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Submit Transaction</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">';
                    $max=0;
                   if(isset($_SESSION['expense'])){
                    $max=count($_SESSION['expense']);
                    $tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
                    for ($i = 0; $i < $max; $i++){
                    $tprice+=preg_replace('~,~', '', $_SESSION['expense'][$i][2]);
                    }
                    echo"<script>$('#totitems').val(".$max.")</script>
                    <script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
                    }
                    
                    echo'
                        <div class="form-group">
                         <label style="float:left" class="col-sm-4">Date:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="date" value="'.date('d/m/Y').'" disabled>
                        </div>
                         </div>

                         <div class="form-group">
                         <label style="float:left" class="col-sm-4">Total Entries:</label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="totitems" value="'.$max.'" disabled>
                        </div>
                         </div>

                          <div class="form-group">
                         <label style="float:left" class="col-sm-4">Total Amount:</label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="totprice" value="" disabled>
                        </div>
                         </div>';

                         $resulta =mysql_query("select * from ledgers where ledgerid=658");
                        $rowa=mysql_fetch_array($resulta);
                        $pettybal=stripslashes($rowa['bal']);

                        echo'<div class="form-group">
                         <label style="float:left" class="col-sm-4">Credit:</label>
                        <div class="col-sm-8 controls">
                        <select  id="creditledger" disabled>
                        <option value="658" selected="selected" onclick="setpettybal('.$pettybal.')">PETTY CASH ACCOUNT</option>';
                        $resulta =mysql_query("select * from ledgers where subcat='Bank' order by ledgerid");
                        $num_resultsa = mysql_num_rows($resulta); 
                        for ($i=0; $i <$num_resultsa; $i++) {
                          $row=mysql_fetch_array($resulta);
                        echo'<option value="'.stripslashes($row['ledgerid']).'" onclick="setpettybal('.stripslashes($row['bal']).')">'.stripslashes($row['name']).'</option>';  
                        }echo'
                        </select>
                        </div>
                         </div>

                           <div class="form-group">
                         <label style="float:left" class="col-sm-4">Refno:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="refno" value="">
                        </div>
                         </div>

                         <div class="form-group">
                         <label style="float:left" class="col-sm-4">Account Bal:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <input type="text" placeholder="" id="pettyaccbal"  value="'.number_format($pettybal).'" disabled>
                        </div>
                         </div>


                         <div class="col-sm-8 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="submitexpense()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit Entry</button>
                         </div>
                    
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-3 --> 

              
              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
        <!-- .vd_container --> ';

        $ledgers='';
        $resulta =mysql_query("select * from ledgers where status=1 and type='Expense' order by name");
        $num_resultsa = mysql_num_rows($resulta); 
        for ($i=0; $i <$num_resultsa; $i++) {
        $row=mysql_fetch_array($resulta);
        $item=stripslashes($row['ledgerid']).'-'.stripslashes($row['name']);
        $ledgers.='"'.$item.'",';
        }
        $len=strlen($ledgers);
        $a=$len-1;
        $ledgers=substr($ledgers,0,$a);


           echo '<script>
          var ledgers = ['.$ledgers.'];
          $( "#ledgername" ).autocomplete({source: ledgers});
           </script>';
          echo "<script>  $( '#date' ).datepicker({ dateFormat: 'dd/mm/yy'}); </script>";


            break;


              case 55.1:// 39
              
              
              $amount=$_GET['amount'];
              $eid=$_GET['eid'];
              $ename=$_GET['ename'];
              $desc=$_GET['desc'];
              
              if(isset($_SESSION['expense'])){
              $max=count($_SESSION['expense']);
              $_SESSION['expense'][$max]=array($eid,$ename,$amount,$desc);
              $max=count($_SESSION['expense']);
              }
              
              else{
              $_SESSION['expense']=array(array());
              $_SESSION['expense'][0]=array($eid,$ename,$amount,$desc);
              $max=count($_SESSION['expense']);}
              $tprice=0;
              for ($i = 0; $i < $max; $i++){
              $tprice+=preg_replace('~,~', '', $_SESSION['expense'][$i][2]);
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
              cartexpense($max);
              
              
          break;  
         
          
          case 55.2://41
          
          if(isset($_SESSION['expense'])){
              $max=count($_SESSION['expense']);
              cartexpense($max);
          }
          else  {  echo'<script>swal("Error", "List is empty!", "error");</script>'; 
                    
                  }
                
          break;
          
          case 55.3://42
          
          
          if(isset($_SESSION['expense'])){
              unset($_SESSION['expense']);
              echo"<script>$('#totitems').val('');$('#fintot').val('');</script>";
              
          }
          else  {  echo'<script>swal("Error", "List is empty!", "error");</script>'; 
                    
                  }
                
          break;
          case 55.4://43
          end($_SESSION['expense']);
          $pid= key($_SESSION['expense']);
          unset($_SESSION['expense'][$pid]);
           $_SESSION['expense']=array_values($_SESSION['expense']);
          $max=count($_SESSION['expense']);
          $ftotal=0;
              for ($i = 0; $i < $max; $i++){
              $ftotal+=preg_replace('~,~', '', $_SESSION['expense'][$i][2]);
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#totprice').val((".$ftotal.").formatMoney(2, '.', ','))</script>";
            cartexpense($max);
                
          break;

           case 55.5://40
          $pid=$_GET['pid'];
          unset($_SESSION['expense'][$pid]);
          $_SESSION['expense']=array_values($_SESSION['expense']);
          $max=count($_SESSION['expense']);
          $ftotal=0;
              for ($i = 0; $i < $max; $i++){
              $ftotal+=preg_replace('~,~', '', $_SESSION['expense'][$i][2]);
              }
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#totprice').val((".$ftotal.").formatMoney(2, '.', ','))</script>";
              cartexpense($max);
                
          break;

          case 56:
      $result = mysql_query("insert into log values('','".$username." accesses Bank Transactions Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Bank Transactions</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Bank Transactions</h3>
                  </div>
                  <div class="panel-body">';

                  $result =mysql_query("select * from ledgers where ledgerid='625' limit 0,1");
                  $row=mysql_fetch_array($result);
                  $cashbal=number_format(stripslashes($row['bal']),2);

                   echo' <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Bank <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="ledgername">
                        </div>
                      </div>

                      
                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Phone Number <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                           <select style="" id="action">
                            <option value="" selected>Select One...</option>
                            <option value="Cash Deposit">Cash Deposit</option>
                            <option value="Cash Withdrawal">Cash Withdrawal</option>
                           </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Cash Balance </label>
                        <div class="col-sm-9 controls">
                          <input type="text" value="'.$cashbal.'" id="cashbal" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Amount<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="amount" onkeyup="format(this)">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savebankdep()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      $ledgers='';
        $resulta =mysql_query("select * from ledgers where status=1 and subcat='Bank' order by name");
        $num_resultsa = mysql_num_rows($resulta); 
        for ($i=0; $i <$num_resultsa; $i++) {
        $row=mysql_fetch_array($resulta);
        $item=stripslashes($row['ledgerid']).'-'.stripslashes($row['name']);
        $ledgers.='"'.$item.'",';
        }
        $len=strlen($ledgers);
        $a=$len-1;
        $ledgers=substr($ledgers,0,$a);


           echo '<script>
          var ledgers = ['.$ledgers.'];
          $( "#ledgername" ).autocomplete({source: ledgers});
           </script>';


    break;

     case 57:
      $result = mysql_query("insert into log values('','".$username." accesses Credit Landlord Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Credit Landlord Account</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Credit Landlord Account</h3>
                  </div>
                  <div class="panel-body"> <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Landlord <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">';
                          $result =mysql_query("select * from mainhouses");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="landlord" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                              }
                         echo'</select>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Amount<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="amount" onkeyup="format(this)">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savecredland()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';



    break;

     case 58:
      $result = mysql_query("insert into log values('','".$username." accesses Pay Landlord Account Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Pay Landlord Account</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Pay Landlord Account</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Landlord <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">';
                          $result =mysql_query("select * from mainhouses");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="landlord" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                              }
                         echo'</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers where subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Amount<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="amount" onkeyup="format(this)">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savepayland()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;
        

    case 59:
      $result = mysql_query("insert into log values('','".$username." accesses Water Invoicing Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
     
              if(isset($_GET['a'])){
              $a=$_GET['a'];  
              }else $a=NULL;
              if(isset($_GET['b'])){
              $b=$_GET['b'];  
              }else $b=NULL;

    $resultx =mysql_query("select * from waterrates where id=1 limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $fixed=stripslashes($rowx['fixed']);
     $waterrate=stripslashes($rowx['water']);
     $sewerrate=stripslashes($rowx['sewer']);


      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Water Invoicing</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Water Invoicing</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                      
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="month"  value="'.$a.'" >
                        </div>
                       </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Date of Reading<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="date"  value="'.$b.'" >
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Unit<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="units">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Meter No<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                        <input type="hidden" id="rescom"/>
                          <input type="text" id="meter" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Previous<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="waterprev" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Current<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="watercurr">
                        </div>
                      </div>

                     
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Water Invoicing</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                     
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Difference</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="waterdiff" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fixed Charge</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fixed" value="'.$fixed.'" disabled>
                          <input type="hidden" id="waterrate" value="'.$waterrate.'">
                          <input type="hidden" id="sewerrate" value="'.$sewerrate.'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Water</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="water" disabled>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Sewer</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="sewer" disabled>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Sum Total</label>
                        <div class="col-sm-9 controls">
                          <input type="hidden" id="sumtotal" disabled>
                          <input type="text" id="sumtotal2" disabled>
                        </div>
                      </div>


                       
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="addwater()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                           <div id="display" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

        $units='';
        $resulta =mysql_query("select * from houses where status=1 order by tenant");
        $num_resultsa = mysql_num_rows($resulta); 
        for ($i=0; $i <$num_resultsa; $i++) {
        $row=mysql_fetch_array($resulta);
        $item=stripslashes($row['rid']).'-'.stripslashes($row['tenant']).'-'.stripslashes($row['roomno']);
        $units.='"'.$item.'",';
        }
        $len=strlen($units);
        $a=$len-1;
        $units=substr($units,0,$a);

         echo "<script>
          var units = [".$units."];
          $( '#units' ).autocomplete({
            source: units,
            select: function( event, ui ) {
                setTimeout(function() {
                var param = $('#units').val();
                var parts=param.split('-',3);
                param=parts[0];
                $('#display').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                $.ajax({
                url:'bridge.php',
                data:{id:59.1,param:param},
                success:function(data){
                $('#display').html(data);
                }
                });
                },500);
            }

            });
          </script>";
          echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'}); $( '#date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";


    break;

    case 59.1:

              $rid=$_GET['param'];
              $resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
              $rowy=mysql_fetch_array($resulty);
              
              echo"<script>
              $('#waterprev').val('".stripslashes($rowy['waterprevious'])."');
              $('#meter').val('".stripslashes($rowy['watermeter'])."');
              $('#rescom').val('".stripslashes($rowy['rescom'])."');
              $('#waterdiff').val('');
              $('#watercurr').val('');
              </script>";
            
              
    break;

     case 60:
      $result = mysql_query("insert into log values('','".$username." accesses Electricity Invoicing Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
     
              if(isset($_GET['a'])){
              $a=$_GET['a'];  
              }else $a=NULL;
              if(isset($_GET['b'])){
              $b=$_GET['b'];  
              }else $b=NULL;

    $resultx =mysql_query("select * from elecrates where id=1 limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    $fixed=stripslashes($rowx['fixed']);
    $consumption=stripslashes($rowx['consumption']);
    $fuel=stripslashes($rowx['fuel']);
    $forex=stripslashes($rowx['forex']);
    $inflation=stripslashes($rowx['inflation']);
    $arma=stripslashes($rowx['arma']);
    $erc=stripslashes($rowx['erc']);
    $rep=stripslashes($rowx['rep']);
    $vat=stripslashes($rowx['vat']);


      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Electricity Invoicing</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Electricity Invoicing</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                      
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="month"  value="'.$a.'" >
                        </div>
                       </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Date of Reading<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="date"  value="'.$b.'" >
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Unit<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="units">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Meter No<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                        <input type="hidden" id="rescom"/>
                          <input type="text" id="meter" disabled>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Previous<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="elecprev" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Current<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="elecurr">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Difference</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="elecdiff" disabled>
                        </div>
                      </div>

                      

                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Electricity Invoicing</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                     
                      

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fixed</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fixed" disabled value="'.$fixed.'">
                          <input type="hidden" id="vconsumption" disabled value="'.$consumption.'">
                          <input type="hidden" id="vfuel" disabled value="'.$fuel.'">
                          <input type="hidden" id="vforex" disabled value="'.$forex.'">
                          <input type="hidden" id="vinflation" disabled value="'.$inflation.'">
                          <input type="hidden" id="varma" disabled value="'.$arma.'">
                          <input type="hidden" id="verc" disabled value="'.$erc.'">
                          <input type="hidden" id="vrep" disabled value="'.$rep.'">
                          <input type="hidden" id="vvat" disabled value="'.$vat.'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Consumption</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="consumption" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fuel Cost Charge</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fuel" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Forex</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="forex" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Inflation</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="inflation" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">WARMA LEVY</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="arma" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">ERC LEVY</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="erc" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">REP LEVY</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="rep" disabled value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">VAT</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="vat" disabled value="">
                        </div>
                      </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Total</label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="electotal" disabled>
                        </div>
                      </div>
                     
                     
                     <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="addelec()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                           <div id="display" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            
         </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

        $units='';
        $resulta =mysql_query("select * from houses where status=1 order by tenant");
        $num_resultsa = mysql_num_rows($resulta); 
        for ($i=0; $i <$num_resultsa; $i++) {
        $row=mysql_fetch_array($resulta);
        $item=stripslashes($row['rid']).'-'.stripslashes($row['tenant']).'-'.stripslashes($row['roomno']);
        $units.='"'.$item.'",';
        }
        $len=strlen($units);
        $a=$len-1;
        $units=substr($units,0,$a);

         echo "<script>
          var units = [".$units."];
          $( '#units' ).autocomplete({
            source: units,
            select: function( event, ui ) {
                setTimeout(function() {
                var param = $('#units').val();
                var parts=param.split('-',3);
                param=parts[0];
                $('#display').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                $.ajax({
                url:'bridge.php',
                data:{id:60.1,param:param},
                success:function(data){
                $('#display').html(data);
                }
                });
                },500);
            }

            });
          </script>";
          echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'}); $( '#date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";


    break;

    case 60.1:

              $rid=$_GET['param'];
              $resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
              $rowy=mysql_fetch_array($resulty);
              
              echo"<script>
              $('#elecprev').val('".stripslashes($rowy['elecprevious'])."');
              $('#meter').val('".stripslashes($rowy['elecmeter'])."');
              $('#rescom').val('".stripslashes($rowy['rescom'])."');
              $('#elecdiff').val('');
              $('#elecurr').val('');
              </script>";
            
              
    break;

    case 61:
      $result = mysql_query("insert into log values('','".$username." accesses Utility Bills Payment Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Utility Bills Payment</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Utility Bills Payment</h3>
                  </div>
                  <div class="panel-body">';

                   echo' <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Property <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">';
                          $result =mysql_query("select * from mainhouses");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="landlord" class="select">
                          <option value="" selected>Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                              }
                         echo'</select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Utility<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <select id="utility">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from activities");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['lid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="month">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Bill Number<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="billno">
                        </div>
                      </div>




                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers where subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Amount<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="amount" onkeyup="format(this)">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Refno<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="refno">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <textarea rows="3" class="width-100" id="remarks"></textarea>
                        </div>
                      </div>
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="utilitypayment()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;

    case 62:
      $result = mysql_query("insert into log values('','".$username." accesses Edit Company Details Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      $result =mysql_query("select * from company");
      $row=mysql_fetch_array($result);  
      $lic=stripslashes($row['License']); 
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Company Details </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Edit Company Details </h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Company Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="cname" disabled value="'.stripslashes($row['CompanyName']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="add" value="'.stripslashes($row['Address']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Telephone</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="tel" value="'.stripslashes($row['Tel']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Website<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="web" value="'.stripslashes($row['Website']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Email Address</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="email" value="'.stripslashes($row['Email']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Tagline</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="motto" value="'.stripslashes($row['Motto']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Location Description</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="loc" value="'.stripslashes($row['Description']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">KRA Pin</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="pin" value="'.stripslashes($row['Pin']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">ETR No</label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="etrno" value="'.stripslashes($row['EtrNo']).'">
                        </div>
                      </div>


                      

                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="editcompany()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;

     case 63:
      $result = mysql_query("insert into log values('','".$username." accesses System Users Manager Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>System Users Manager</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          $result =mysql_query("select * from users order by userid desc limit 0,1");
              $row=mysql_fetch_array($result);
              $name=stripslashes($row['name']);
              $a=substr($name,2,3);
              $a=$a+1;
              $b=sprintf("%03s",$a);
          
        echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>New System User</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Username<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="name1" maxlength="2" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-3 controls">
                          <input type="text" id="name2" value="'.$b.'" disabled>
                        </div>
                        
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Fullname<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="fname1" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="pass1" value="password" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Position<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="pos1">
                          <option value="">Select One...</option>';
                            $resulta =mysql_query("select * from positions order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                  
                          echo'
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Branch<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="branch1">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from branchtbl order by name");
                          $num_resultsa = mysql_num_rows($resulta); 
                          for ($i=0; $i <$num_resultsa; $i++) {
                            $row=mysql_fetch_array($resulta);
                            $name=stripslashes($row['name']);
                            echo"<option value=\"".stripslashes($row['name'])."\">".$name."</option>";
                          }
                  
                          echo'
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Department<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="dep1">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from dept order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                                
                          echo'
                          </select>
                        </div>
                      </div>

                      
                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="addnewuser()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>Edit System User</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Position<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="usercombo" onchange="changeuser()" >
                          <option value="">Select One...</option>';
                           $result =mysql_query("select * from users");
                            $num_results = mysql_num_rows($result);
                            for ($i=0; $i <$num_results; $i++) {
                              $row=mysql_fetch_array($result);
                              $user2=stripslashes($row['userid']);
                              $name2=stripslashes($row['name']);
                              $pos2=stripslashes($row['position']);
                              $fname2=stripslashes($row['fullname']);
                              $dep2=stripslashes($row['dept']);
                              $branch2=stripslashes($row['branch']);
                            echo'<option value="'.$user2.'θ'.$pos2.'θ'.$fname2.'θ'.$dep2.'θ'.$branch2.'">'.stripslashes($row['name']).'-'.stripslashes($row['fullname']).'</option>'; 
                            }
                          echo'
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Fullname<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="fname2" >
                          <input type="hidden" id="user2" >
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Position<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="pos2">
                          <option value="">Select One...</option>';
                            $resulta =mysql_query("select * from positions order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                  
                          echo'
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Branch<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="branch2">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from branchtbl order by name");
                          $num_resultsa = mysql_num_rows($resulta); 
                          for ($i=0; $i <$num_resultsa; $i++) {
                            $row=mysql_fetch_array($resulta);
                            $name=stripslashes($row['name']);
                            echo"<option value=\"".stripslashes($row['name'])."\">".$name."</option>";
                          }
                  
                          echo'
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Department<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="dep2">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from dept order by name");
                            $num_resultsa = mysql_num_rows($resulta); 
                            for ($i=0; $i <$num_resultsa; $i++) {
                              $row=mysql_fetch_array($resulta);
                              $name=stripslashes($row['name']);
                              echo"<option value=\"".$name."\">".$name."</option>";
                            }
                                
                          echo'
                          </select>
                        </div>
                      </div>
                        <div class="form-group">
                      <div class="vd_checkbox checkbox-success">
                      <input type="checkbox" value="1" name="respas"  id="checkbox-3" style="float:left;margin-left:40px">
                       <label for="checkbox-3"> Reset Password? </label>
                      </div>
                      </div>

                      
                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="edituser()"><i class="fa fa-save"></i> Save</button>
                          <button class="btn vd_btn vd_bg-red vd_white" type="submit" onclick="deluser()"><i class="icon-trash"></i> Delete</button>
                         
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;
        

    case 64:
      $result = mysql_query("insert into log values('','".$username." accesses Change Login Credentials Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Change Login Credentials</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Change Login Credentials</h3>
                  </div>
                  <div class="panel-body">

                       <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe" style="display:none">
                        <div class="cleaner"></div> 
                        <div class="form-group">
                        <label style="float:left" class="col-sm-9">Change Profile Picture:</label>
                        </div>
                        <div class="cleaner_h5"></div>
                        <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
                        <iframe name="leiframe" id="leiframe" class="leiframe" src="'.$profilepic.'">
                        </iframe>
                       <input type="hidden"  name="stamp" value="'.$userid.'"/>
                        <input type="hidden" id="id" name="id"  value="3"/>
                        <div class="cleaner_h5"></div>
                        <button class="btn vd_btn vd_bg-green vd_white" style="float:right;margin-right:20%" type="submit"><i class="icon-ok"></i>Upload</button>
                        </form>

                        <div style="clear:both;width:100%;margin-bottom:10px"></div>

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Old Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="password" id="opass">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">New Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                         <input type="password" id="npass">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Confirm Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                         <input type="password" id="cpass">
                        </div>
                      </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="postpass('.$userid.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;

     case 65:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>User Access Rights</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>User Access Rights</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from positions");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
            <!-- .vd_content --> 
          </div>
          <!-- .vd_container -->';
          echo "<script>
                $('#intcombo').editableSelect({
              onSelect: function (element) {
              var param = $('#intcombo').val();
              var str = $('#item5').val();
              var parts=param.split('-',3);
              param=parts[0];
              $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
              $.ajax({
              url:'bridge.php',
              data:{id:66,param:param},
              success:function(data){
              $('#mainp').html(data);
              }
              });
            }
            }).focus();</script>";

    break;


    case 66:
    $param=$_GET['param'];
      $result = mysql_query("insert into log values('','".$username." accesses User Access Rights Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>User Access Rights </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>User Access Rights: '.$param.' </h3>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                       <div class="col-sm-12 controls" style="height:400px; overflow-y:auto">
                       <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
                       <div class="form-group form-actions">
                        <div class="col-sm-12">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="selectuser(1)"><i class="icon-ok"></i> Yes to All</button>
                          <button class="btn vd_btn vd_bg-red vd_white" type="button" onclick="selectuser(0)"><i class="icon-ok"></i> No to All</button>
                         <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                       <input type="hidden" id="user" value="'.$param.'"/>';
                        echo"<table id=\"datatable\"  style=\"text-align:center;font-size:11px; font-weight:bold; padding:0;width:100% \" >";
                                    echo'<tbody>
                                    <tr  class="panel-heading vd_bg-grey" style="color:#fff;padding-left:0;width:100%">
                                      <td  style="width:70%;">Description</td>
                                      <td  style="width:30%;">Access</td>
                                         
                                    </tr>';

                                   $result =mysql_query("select * from accesstbl");
                                    $num_results = mysql_num_rows($result);
                                    for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    $code=stripslashes($row['AccessCode']);

                                    if($i%2!=0){echo"<tr style=\"width:100%;height:20px;padding:0; font-weight:normal ;cursor:pointer\">";}
                                        else{ echo"<tr style=\"width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer\">"; }
                                       echo'<td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Descrip']).'</td>';
                                       echo"<td style=\"width:30%;border-width:0.5px; border-color:#666; border-style:solid;\">
                                       <select class=\"select\" id=\"right".$code."\" style=\"width:90%\" onchange=\"saveaccess('".$param."',".$code.")\">";
                                        if(stripslashes($row[$param])=='YES'){
                                          echo "<option value=\"".stripslashes($row[$param])."\" selected=\"selected\">".stripslashes($row[$param])."</option><option value=\"NO\">NO</option>";
                                        }else{
                                          echo "<option value=\"NO\" selected=\"selected\">NO</option><option value=\"YES\">YES</option>";
                                        }
                                        
                                        echo"</select>
                                       </td>";
                                      echo'</tr>';  
                                     }
                                    
                                   echo'</tbody></table>
                         </div> </div>

                         
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;

    case 67:
      $result = mysql_query("insert into log values('','".$username." accesses  Add/Edit System Variables Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Add/Edit System Variables</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>New System Variable</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Category<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="sysvar">
                          <option value="">Select One...</option>
                          <option value="categories">CONTACT CATEGORIES</option>
                          <option value="branchtbl">BRANCH</option>
                          <option value="dept">DEPARTMENT</option>
                        </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Variable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="vname" >
                        </div>
                      </div>

                     
                      
                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="postvariable()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>Edit System Variables</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                     
                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Category<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select id="sysvar2"  onchange="setcat()">
                          <option value="">Select One...</option>
                          <option value="1$categories">CONTACT CATEGORIES</option>
                          <option value="3$branchtbl">BRANCH</option>
                          <option value="2$dept">DEPARTMENT</option>
                         </select>
                        </div>
                      </div>

                      <div class="form-group" id="opt1"  style="display:none">
                        <label style="float:left" class="col-sm-5">Variable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select class="select" style="float:right" id="syscat1"  onchange="setvar(1)">
                          <option value="" selected="selected" disabled="disabled"Select one...</option>';
                          $result =mysql_query("select * from categories order by name");
                                    $num_results = mysql_num_rows($result);
                                    for ($i=0; $i <$num_results; $i++) {
                                      $row=mysql_fetch_array($result);
                                      $bid=stripslashes($row['id']);
                                      $name=strtoupper(stripslashes($row['name']));
                                      echo"<option value=\"".$bid."$".$name."\">".$name."</option>";
                                    }
                          echo'
                            </select>
                        </div>
                      </div>

                       <div class="form-group" id="opt3"  style="display:none">
                        <label style="float:left" class="col-sm-5">Variable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select class="select" style="float:right" id="syscat3"  onchange="setvar(3)">
                          <option value="" selected="selected" disabled="disabled"Select one...</option>';
                          $result =mysql_query("select * from branchtbl order by name");
                                    $num_results = mysql_num_rows($result);
                                    for ($i=0; $i <$num_results; $i++) {
                                      $row=mysql_fetch_array($result);
                                      $bid=stripslashes($row['id']);
                                      $name=strtoupper(stripslashes($row['name']));
                                      echo"<option value=\"".$bid."$".$name."\">".$name."</option>";
                                    }
                          echo'
                            </select>
                        </div>
                      </div>

                      <div class="form-group" id="opt2"  style="display:none">
                        <label style="float:left" class="col-sm-5">Variable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <select class="select" style="float:right" id="syscat2"  onchange="setvar(2)">
                          <option value="" selected="selected" disabled="disabled"Select one...</option>';
                          $result =mysql_query("select * from dept order by name");
                                    $num_results = mysql_num_rows($result);
                                    for ($i=0; $i <$num_results; $i++) {
                                      $row=mysql_fetch_array($result);
                                      $bid=stripslashes($row['id']);
                                      $name=strtoupper(stripslashes($row['name']));
                                      echo"<option value=\"".$bid."$".$name."\">".$name."</option>";
                                    }
                          echo'
                            </select>
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Variable<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="vname2" >
                        </div>
                      </div>


                      
                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="editvariable()"><i class="fa fa-save"></i> Save</button>
                          <button class="btn vd_btn vd_bg-red vd_white" type="submit" onclick="deletevariable()"><i class="icon-trash"></i> Delete</button>
                         
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;

      case 68:
      $result = mysql_query("insert into log values('','".$username." accesses Reports Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>System Reports</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-magic"></i> </span> System Reports</h3>
                  </div>
                  <div class="panel-body">
                    <div class="panel-group" id="accordion">

                      ';if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-green vd_bd-green">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Financial Statements</a> </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="finstate(9)">Trial Balance</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="finstate(10)">Income Statement</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="finstate(11)">Balance Sheet</label></a><br/>
                           </div>
                        </div>
                      </div>

                     ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-yellow">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Income Reports</a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                             <div class="panel-body">
                                <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=12&code=0\')" >Today Invoices</label></a><br/> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="invrep(1)">Invoices Reports-All</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="invrep(2)">Invoices By Property</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="invrep(3)">Invoices By Month</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="invrep(4)">Invoices By Item</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="summinv()">Summarized Invoices</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=13&code=0\')" >Today Receipts</label></a><br/> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="receiptrep(1)">Receipts Reports-All</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="receiptrep(2)">Receipts By Property</label></a><br/>
                             <a><label style="cursor:pointer" class="col-sm-12" onclick="receiptrep(3)">Receipts By Month</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="receiptrep(4)">Receipts By Item</label></a><br/>
                               <a><label style="cursor:pointer" class="col-sm-12" onclick="summrec()">Summarized Receipts</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="invvsrep()">Invoices vs Receipts</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="rentproj()">Rent Projections</label></a><br/>
                              
                           </div>
                          </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-blue">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Tenants Reports </a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="tenrep1()">Tenants By Status</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="tenrep2()">Tenants By Property</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=18&code=3\')" ">Tenants with Balances</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=18&code=4\')" ">Tenants with Overpayments</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="deprep()">Tenants Deposits Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="tenstate()">Tenants Statements</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="tenageing()">Tenants Ageing Analysis</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="landstate()">Landlord Statements</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="leaserep()">Lease Upload Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="handoverrep()">Unit Handover Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="checkoutrep()">Tenants Checkout Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="docregrep()">Documents Register Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="escrep()">Rent Escalation Reports</label></a><br/>
                           </div>
                           </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-green vd_bd-green">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Inquiries Reports</a> </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="soirep()">Prospects (Show of Interest)</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="saprep()">Shop Applications</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="lofrep()">Letter of Offers</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="pretenrep()">Pre-Tenants</label></a><br/>
                           </div>
                        </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                       <div class="panel panel-default">
                        <div class="panel-heading vd_bg-yellow vd_bd-yellow">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"> Properties Reports</a> </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=28&code=3\')">All Properties</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=29&code=0\')">All Units</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="unitsbyprop()">Units by Property</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=29&code=2\')">Empty Units</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=29&code=3\')">Occupied Units</label></a><br/>
                             <a><label style="cursor:pointer" class="col-sm-12" onclick="housetrack()">Unit Activity Log</label></a><br/>
                           </div>
                        </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-blue vd_bd-blue">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"> Maintenance Reports</a> </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="reqrep1()">Requisitions-All</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="reqrep2()">Requisitions by Property</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="reqrep3()">Requisitions by Status</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="reprintreq()">Reprint Requisition</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=31&code=3\')">Items List</label></a><br/>
                             
                           </div>
                        </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-green vd_bd-green">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"> Accounts Reports</a> </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=32&code=3\')">Chart of Accounts</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="ledrep()">Ledger Reports</label></a><br/>
                               <a><label style="cursor:pointer" class="col-sm-12" onclick="window.open(\'report.php?id=33&code=3\')">Suppliers List</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="supstate()">Supplier Statements</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="supageing()">Suppliers Ageing Analysis</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="supinvoicesall()">Suppliers Invoices List-All</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="supinvoicesitem()">Suppliers Invoices List-By Item</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="supinvoicessup()">Suppliers Invoices List-By Supplier</label></a><br/>
                             <a><label style="cursor:pointer" class="col-sm-12" onclick="supinvoicessumm()">Summarized Suppliers Invoices</label></a><br/>
                             <a><label style="cursor:pointer" class="col-sm-12" onclick="vatrep()">Output VAT Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="inpvatrep()">Input VAT Reports</label></a><br/>
                            </div>
                        </div>
                      </div>

                      ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                      <div class="panel panel-default">
                        <div class="panel-heading vd_bg-yellow vd_bd-yellow">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"> Utilities Reports</a> </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="waterinvrep()">Water Invoices</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="elecinvrep()">Electricity Invoices</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="utilpayrep1()">All Utility Payments</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="utilpayrep2()">Utility Payments-By Property</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="utilpayrep3()">Utility Payments-By Item</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="utilreconrep()">Utility Reconciliations</label></a><br/>
                            </div>
                        </div>
                      </div>

                       ';}if($_SESSION['rightsarr'][107]=='YES'){echo'
                       <div class="panel panel-default">
                        <div class="panel-heading vd_bg-blue vd_bd-blue">
                          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"> Admin Reports</a> </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">
                          <div class="panel-body"> 
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=34&code=3\')">Sytem Users</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="logrep()">Audit Trail</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12"  onclick="window.open(\'report.php?id=35&code=3\')">User Access Reports</label></a><br/>
                              <a><label style="cursor:pointer" class="col-sm-12" onclick="customrep()">Custom Reports</label></a><br/>
                            </div>
                        </div>
                      </div>';}





                   echo' </div>
                  </div>
                </div>
              </div>
             <!-- col-md-6 --> 


               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>System Reports</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">


                      </div>
                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      


    break;

    case 69:
    $a=$_GET['a'];
    if($a==9){$title='Trial Balance';}if($a==10){$title='Income Statement';}if($a==11){$title='Balance Sheet';}
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterfinstate('.$a.')"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;


    case 70:
   $result = mysql_query("insert into log values('','".$username." accesses Letter of Offers Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Letter of Offers-Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
           <div id="message" style="width:40px"></div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Letter of Offers-Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Business Name</th>
                          <th>Address</th>
                          <th>Unit No</th>
                          <th>Rent</th>
                          <th>Lease Term</th>
                          <th>Commence Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                    $result =mysql_query("select * from lof where status=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                       
                          echo'<tr class="gradeX" id="normal'.$code.'">
                          <td>'.stripslashes($row['bname']).'</td>
                          <td>'.stripslashes($row['address']).'</td>
                          <td>'.stripslashes($row['roomno']).'</td>
                          <td>'.stripslashes($row['rent']).'</td>
                          <td>'.stripslashes($row['leaseterm']).'</td>
                          <td>'.stripslashes($row['commencedate']).'</td>
                         <td>
                         <select style="padding:2px">
                            <option value="" selected>Select One...</option>
                            <option onclick="shopopen(5,'.$code.')">View LOF</option>
                            <option onclick="shopopen(6,'.$code.')">Archive LOF</option>
                            <option onclick="shopopen(7,'.$code.')">Activate Tenancy</option>
                             </select>
                          </td>
                            </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 


      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

        case 71:
        $a=$_GET['a'];
        if($a==1){$title='Invoices Reports-All';}if($a==2){$title='Invoices Reports-By Property';}if($a==3){$title='Invoices Reports-By Month';}if($a==4){$title='Invoices Reports-By Item';}
        echo '              <div class="form-group"> 
                            <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                            </div> ';

                            if($a==1){

                              echo'<input type="hidden" id="itemname">';
                            }

                            if($a==2){

                           echo'<div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>';

                            }

                            if($a==3){

                           echo'
                            <div class="form-group">
                            <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="itemname" class="date">
                            </div>
                            </div>';

                            echo "<script>  $( '#itemname' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

                            }


                             if($a==4){

                           echo'<div class="form-group">
                            <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from activities where status=1");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>';

                            }

                            echo' <div class="form-group">
                            <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="date1" class="date">
                            </div>
                            </div>

                            <div class="form-group">
                            <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="date2" class="date">
                            </div>
                            </div>


                            <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                             </div>

                            <div class="form-group form-actions">
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-9">
                              <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterinvrep('.$a.')"><i class="fa fa-save"></i> Submit</button>
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                              <div id="message2" style="width:40px;height:40px;float:right"></div>
                            </div>
                          </div>';


                         echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 72:
        $a=$_GET['a'];
        if($a==1){$title='Receipts Reports-All';}if($a==2){$title='Receipts Reports-By Property';}if($a==3){$title='Receipts Reports-By Month';}if($a==4){$title='Receipts Reports-By Item';}
        echo '              <div class="form-group"> 
                            <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                            </div> ';

                            if($a==1){

                              echo'<input type="hidden" id="itemname">';
                            }

                            if($a==2){

                           echo'<div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>';

                            }

                            if($a==3){

                           echo'
                            <div class="form-group">
                            <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="itemname" class="date">
                            </div>
                            </div>';

                            echo "<script>  $( '#itemname' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

                            }


                             if($a==4){

                           echo'<div class="form-group">
                            <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from activities where status=1");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>';

                            }

                            echo' <div class="form-group">
                            <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="date1" class="date">
                            </div>
                            </div>

                            <div class="form-group">
                            <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                              <input type="text" id="date2" class="date">
                            </div>
                            </div>


                            <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                             </div>

                            <div class="form-group form-actions">
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-9">
                              <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterreceiptrep('.$a.')"><i class="fa fa-save"></i> Submit</button>
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                              <div id="message2" style="width:40px;height:40px;float:right"></div>
                            </div>
                          </div>';


                         echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

     case 73:
    $title='Summarized Invoices';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersumminv()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 74:
    $title='Summarized Receipts';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersummrec()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 75:
    $title='Invoices Versus Receipts';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       

                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from activities where status=1");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="All" selected>All</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>

                         <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterinvvsrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 76:
    $title='Rent Projections';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       

                         <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterrentproj()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

    break;

     case 77:
        $title='Contacts List';
      $result = mysql_query("insert into log values('','".$username." accesses ".$title." Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>'.$title.'</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>'.$title.'</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">
                      <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Group<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from categories order by name");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="All" selected>All</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                                  }
                             echo'</select>
                              </div>
                          </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entercontrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";
                      
                   echo' </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      


    break;



     case 77.1:
        $title='Messages Reports';
      $result = mysql_query("insert into log values('','".$username." accesses ".$title." Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>'.$title.'</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>'.$title.'</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">
                      <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entermesrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";
                      
                   echo' </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      


    break;


   
    case 78:
    $title='Tenants By Property';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entertenrep2()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 79:
    $title='Deposits Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterdeprep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 80:
    $title='Lease Reports';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterleaserep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 81:
    $title='Handover Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterhandoverrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 82:
    $title='Checkout Reports';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entercheckoutrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 83:
    $title='Documents Register Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterdocregrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 84:
    $title='Show of Interest Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersoirep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 85:
    $title='Shop Applications Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersaprep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 86:
    $title='Letter of Offers Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterlofrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 87:
    $title='Pre-Tenants Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterpretenrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 88:
    $title='Units By Property';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterunitsbyprop()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                  

    break;

      case 89:
    $title='Requisitions (All) Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterreqrep1()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

       case 90:
    $title='Requistions By Property';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterreqrep2()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

     case 91:
    $title='Requistions By Property';

    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">
                            <select id="itemname" class="select">
                            <option value="">Select One...</option>
                            <option value="0">Rejected</option>
                            <option value="1">New</option>
                            <option value="2">Approved</option>
                            <option value="3">Payment Rejected</option>
                            <option value="4">Payment Approved</option>
                            <option value="5">Paid</option>
                            </select>
                              </div>
                            </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterreqrep3()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 92:
                $title='Reprint requisition';
                echo '   
                <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Requisition<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>


                        

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterreprintreq()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

               $arr=array();
                $result =mysql_query("select * from requests");
                $num_results = mysql_num_rows($result);
                for ($i=0; $i <$num_results; $i++) {
                $rowa=$row=mysql_fetch_array($result); 
                $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']).'-'.stripslashes($row['location']).'-'.stripslashes($row['date']);
                }

                $requests='';
                foreach ($arr as $key => $val) {
                  $requests.='"'.$val.'",';
                 }
                  $len=strlen($requests);
                        $a=$len-1;
                        $requests=substr($requests,0,$a);

                echo '<script>
                var requests = ['.$requests.'];
                $( "#itemname" ).autocomplete({source: requests});
                </script>';

    break;

     case 93:
    $title='Ledger Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Ledger<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterledrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $result =mysql_query("select * from ledgers");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['ledgerid'])]=stripslashes($rowa['ledgerid']).'-'.stripslashes($row['name']);
                      }

                      $ledgers='';
                      foreach ($arr as $key => $val) {
                        $ledgers.='"'.$val.'",';
                       }

                       $len=strlen($ledgers);
                        $a=$len-1;
                        $ledgers=substr($ledgers,0,$a);

                      echo '<script>
                      var ledgers = ['.$ledgers.'];
                      $( "#itemname" ).autocomplete({source: ledgers});
                      </script>';



     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 94:

          $journal=$_GET['journal'];

          $result =mysql_query("select * from journals where rcptno='".$journal."'");
              $row=mysql_fetch_array($result);
              $desc=stripslashes($row['desc']);
              $date=dateprint(stripslashes($row['date']));

          echo'

          <div class="modal show"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header vd_bg-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">JOURNAL ENTRY PREVIEW-ENTRY NO:'.$journal.'<br/>DESCRIPTION:'.$desc.'<br/>DATE:'.$date.'</h4>
              </div>
              <div class="modal-body"> 
              
        <table  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
          <tbody>
          <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
          <td  style="width:60%;">Ledger Name</td>
          <td  style="width:20%;">Debit</td>
          <td  style="width:20%;">Credit</td>
          </tr>';

          $result =mysql_query("select * from ledgerentries where rcptno='".$journal."'");
              $num_results = mysql_num_rows($result); $aa=$bb=0;
          for ($i=0; $i <$num_results; $i++) {
            $row=mysql_fetch_array($result);
            $rcptno=stripslashes($row['rcptno']);
            
            
          if($i%2==0){
          echo"<tr  style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0;text-transform:none\">";
          }
          else{
          echo"<tr style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;background:#f0f0f0;  padding:0;text-transform:none\">";
          }
          echo'<td  style="width:60%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['lname']).'</td>
          <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">';
          if(stripslashes($row['type'])=='Debit'){ echo number_format(stripslashes($row['amount']));$aa+=stripslashes($row['amount']);}
          echo '</td>
          <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">';
          if(stripslashes($row['type'])=='Credit'){ echo number_format(stripslashes($row['amount']));$bb+=stripslashes($row['amount']);}
          echo '</td>
          </tr>';
            } 

        echo'

        <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
          <td  style="width:60%;">Totals</td>
          <td  style="width:20%;">'.number_format($aa).'</td>
          <td  style="width:20%;">'.number_format($bb).'</td>
          </tr>
        </tbody></table>
  
      
        </div>
          <div class="modal-footer background-login">
            <button type="button" class="btn vd_btn vd_bg-grey"  onclick="hidemodal()">Close</button>
             <div id="message" style="width:40px;height:40px;float:right"></div>
          </div>
        </div>
        <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal --> ';

          break;

           case 95:
      $title='Tenants Statements';
      echo '   <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Tenant<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entertenstate()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      echo '<script>
                      var tenants = ['.$_SESSION['tenants'].'];
                      $( "#itemname" ).autocomplete({source: tenants});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

      case 96:
      $title='Landlord Statements';
      echo '   <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Landlord<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterlandstate()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $result =mysql_query("select * from mainhouses");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['houseid'])]=stripslashes($rowa['houseid']).'-'.stripslashes($row['housename']);
                      }

                      $mainhouses='';
                      foreach ($arr as $key => $val) {
                        $mainhouses.='"'.$val.'",';
                       }
                       $len=strlen($mainhouses);
                        $a=$len-1;
                        $mainhouses=substr($mainhouses,0,$a);
                      echo '<script>
                      var mainhouses = ['.$mainhouses.'];
                      $( "#itemname" ).autocomplete({source: mainhouses});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 97:
      $title='Supplier Statements';
      echo '   <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Supplier<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupstate()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $result =mysql_query("select * from suppliers");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['supid'])]=stripslashes($rowa['supid']).'-'.stripslashes($row['supname']);
                      }

                      $suppliers='';
                      foreach ($arr as $key => $val) {
                        $suppliers.='"'.$val.'",';
                       }
                       $len=strlen($suppliers);
                        $a=$len-1;
                        $suppliers=substr($suppliers,0,$a);
                      echo '<script>
                      var suppliers = ['.$suppliers.'];
                      $( "#itemname" ).autocomplete({source: suppliers});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;


      case 98:
      $title='Audit Trail Report';
      $result = mysql_query("insert into log values('','".$username." accesses ".$title." Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>'.$title.'</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>'.$title.'</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">
                      <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">User<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="" placeholder="Type All">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-4 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        <div class="col-sm-3 controls">
                          <input type="text" id="timer1" class="time">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-4 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                         <div class="col-sm-3 controls">
                          <input type="text" id="timer2" class="time">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterlogrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $arr[]='All Users';
                      $result =mysql_query("select * from users");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['name'])]=stripslashes($rowa['name']).'-'.stripslashes($row['fullname']);
                      }

                      $users='';
                      foreach ($arr as $key => $val) {
                        $users.='"'.$val.'",';
                       }
                       $len=strlen($users);
                        $a=$len-1;
                        $users=substr($users,0,$a);
                      echo '<script>
                      var users = ['.$users.'];
                      $( "#itemname" ).autocomplete({source: users});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '.time' ).timepicker() </script>";

                     echo' </div>
                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      


    break;

     

              case 99:

$result = mysql_query("insert into log values('','".$username." accesses Custom Reports Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Custom Reports</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-4">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Custom Reports </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Table <span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                         <select style=""  id="tablename">
                        <option value="">Select one...</option>';
                          $result=mysql_query('show tables');
                          $num_results = mysql_num_rows($result);
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo'<option value="'.$row[0].'">'.$row[0].'</option>';
                            }
                              
                         echo'</select>
                        </div>
                      </div>
                     
                     
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="opentable()"><i class="icon-ok"></i> Submit</button>
                          
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 

                 <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Submit Queries </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      
                      <div id="preview"  style="width:90%;text-align:left;padding:5px"></div>

                     
                      <div class="form-group form-actions">
                        <div class="col-sm-12">
                          <button class="btn vd_btn vd_bg-yellow vd_white" type="button" onclick="previewquery()"><i class="icon-ok"></i> Preview</button>
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="runquery()"><i class="icon-ok"></i> Run</button>
                           <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 

              </div>
              <!-- col-md-4 --> 


              <div class="col-md-8">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Custom Reports </h3>
                  </div>
                  <div class="panel-body" id="columname">
                   
                    
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

            case 100:
            $table=$_GET['param'];  
              $_SESSION['showcolumns']=array();
              $_SESSION['searchqueries']=array();
            echo'<div id="inside" style="height:350px; width:98%;overflow-y:auto;">';
            echo"<table id=\"datatable\"  style=\"width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; border-left:1px solid #333 \" >";
            echo'<tbody>
            <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
                  <td  style="width:30%;">Column Name</td>
                  <td  style="width:20%;">Operator</td>
                  <td  style="width:20%;">Value</td>
                  <td  style="width:15%;">Add Search</td>
                    <td  style="width:15%;">Show Column</td>
                    
                </tr>'; 
                $result=mysql_query('DESCRIBE '.$table);
              $num_results = mysql_num_rows($result);
              
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              
                  
            if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer;">';}
            else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer">'; }
            echo'
            <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;" id="colname'.$i.'">'.stripslashes($row[0]).'</td>
            <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">
            <select class="select" id="ops'.$i.'" style="width:100%; padding:2px;text-align:center">
                          <option value="">Select One...</option>
                          <option value="=">=</option>
                          <option value="!=">!=</option>
                          <option value=">=">>=</option>
                          <option value="<="><=</option>
                          <option value="LIKE">LIKE</option>
                          <option value="NOT LIKE">NOT LIKE</option>
                          <option value=">">></option>
                          <option value="<"><</option>
                          </select>
            </td>
            <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="text" class="in_field\" value="" id="val'.$i.'" style="width:100%;text-align:center;padding:2px"></td>
            <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="checkbox" name="addsearch'.$i.'" style="float:left;margin:0px 0 0 45px" onclick="addsearch('.$i.')" value="1"/></td>
            <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><input type="checkbox" name="showcol'.$i.'" style="float:left;margin:0px 0 0 45px" onclick="showcol('.$i.')" value="1"/></td>
            </tr>';
              }


          echo '</tbody></table>';

          echo '</div>
          <div class="cleaner_h10"></div>
          <a class="labels" style="float:left; margin-left:0px;">Order by:</a>
               <div class="ui-widget" style="margin-right:22px; float:left;margin-left:20px">
                <select style="" class="combos" id="order1">
                <option value="">Select one...</option>';
                   $result=mysql_query('DESCRIBE '.$table);
                  $num_results = mysql_num_rows($result);
                    for ($i=0; $i <$num_results; $i++) {
                        $row=mysql_fetch_array($result);
                        echo'<option value="'.$row[0].'">'.$row[0].'</option>';
                }
                    
                  echo'</select></div>

                 <a class="labels" style="float:left; margin-left:10px;">Asc/Desc:</a>
               <div class="ui-widget" style="margin-right:22px; float:left;margin-left:20px">
                <select style="" class="combos" id="order2">
                <option value="">Select one...</option>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
                </select></div>
                <a class="labels" style="float:left; margin-left:10px;">Limit:</a>
                <input class="in_field" style="float:left; margin-left:10px;width:100px" id="limit" type="text">  
                <div class="cleaner_h5" id="dispres"></div>';


            break;



              case 101:

              $colname=$_GET['colname'];
              $val=$_GET['val'];
              $i=$_GET['i'];
              if($val==1){
              $_SESSION['showcolumns'][$i]=$colname;
              }else{
                unset($_SESSION['showcolumns'][$i]);
              }

              break;

              case 102:

              $colname=$_GET['colname'];
              $val=$_GET['val'];
              $ops=$_GET['ops'];
              $i=$_GET['i'];
              $searchvalue=$_GET['searchvalue'];
              if($val==1){
                if($ops=='LIKE'||$ops=='NOT LIKE'){$searchvalue='%'.$searchvalue.'%';}
              $_SESSION['searchqueries'][$i]=$colname.' '.$ops.' '."'".$searchvalue."'";
              }else{
                unset($_SESSION['searchqueries'][$i]);
              }

              break;

              case 103:

              $param=$_GET['param'];
              $col=$_GET['col'];
              $orderby=$_GET['orderby'];
              $limit=$_GET['limit'];
              $_SESSION['query']='';

            
              if($limit!=''){$limvalue=' limit 0,'.$limit;}else{$limvalue='';}
              if($orderby==''){$orderby='asc';}
              if($col!=''){$order=' order by '.$col.' '.$orderby;}else{$order='';}

              $count=count($_SESSION['searchqueries']);
              if($count>0){
                $search=' where ';
                foreach ($_SESSION['searchqueries'] as $i => $val) {
                  $search.=$val.' and ';
                }
              $a=strlen($search);$b=$a-5;
              $search=substr($search,0,$b);
              }else {$search='';}




              $query='select * from '.$param.$search.$order.$limvalue;
              $_SESSION['query']=$query;
              echo $_SESSION['query'];

              break;

              case 104:
                   $title='Water Invoices Report';

                         echo '<div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="month" class="date">
                        </div>
                        </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterwaterinvrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

    break;

    case 105:
                   $title='Electricity Invoices Report';

                         echo '<div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="month" class="date">
                        </div>
                        </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterelecinvrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

    break;

     case 106:
    $title='Utility Payments Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterutilpayrep1()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 107:
    $title='Utility Payments Report-By Property';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>   

                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterutilpayrep2()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 108:
    $title='Utility Payments Report-By Item';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>   

                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';

                             $resulta =mysql_query("select * from activities");
                            $num_resultsa = mysql_num_rows($resulta);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                 for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['lid']).'">'.stripslashes($rowa['name']).'</option>';
                                }

                           echo'</select>
                              </div>
                            </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterutilpayrep3()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 109:
    $title='Utility Reconciliations Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>   

                       
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Property<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from mainhouses order by housename");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['houseid']).'">'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>


                            <div class="form-group">
                            <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';

                             $resulta =mysql_query("select * from activities");
                            $num_resultsa = mysql_num_rows($resulta);
                             echo'<select id="itemname2" class="select">
                              <option value="" selected>Select One...</option>';
                                 for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['lid']).'">'.stripslashes($rowa['name']).'</option>';
                                }

                           echo'</select>
                              </div>
                            </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>


                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterutilreconrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

    break;

     case 110:
      if(isset($_SESSION['bill'])){unset($_SESSION['bill']);}
       $result = mysql_query("insert into log values('','".$username." accesses Post Supplier Invoice Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
              

      echo'<script>document.onkeydown = keydown;
        function keydown(evt){
          if (!evt) evt = event;
      
       if (evt.keyCode==115){ //f4
        evt.preventDefault();
        $("#itemname").parent().find("input:first").focus();  
       }
       if (evt.keyCode==119){ //f8
       evt.preventDefault();
        viewbill(); 
          }
         if (evt.keyCode==112){ //f1
       evt.preventDefault();
         addbill(); 
          }
      if (evt.keyCode==121){ //f10
      evt.preventDefault();
      submitbill(); 
          }
     if (evt.keyCode==120){ //f9
      evt.preventDefault();
            emptybill(); 
          }
      
      if (evt.keyCode==114){ //f3
      evt.preventDefault();
      removelastbill();
          }
         
      }</script>';

    $result = mysql_query("insert into log values('','".$username." accesses Post Supplier Invoice Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Post Supplier Invoice </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Post Supplier Invoice</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-1">Property:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="property">
                        <option value="">Select one...</option>';
                        $resulta =mysql_query("select * from mainhouses");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $bid=stripslashes($row['houseid']);
                                    $name=stripslashes($row['housename']);
                                    echo"<option value=\"".$bid."\">".$name."</option>";
                                }
                        echo'
                        </select>
                        </div>
                      <label style="float:left" class="col-sm-1">Supplier:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="supplier">
                        <option value="">Select one...</option>';
                        $resulta =mysql_query("select * from suppliers order by supname");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $bid=stripslashes($row['supid']);
                                    $name=stripslashes($row['supname']);
                                    echo"<option value=\"".$bid."\">".$name."</option>";
                                }
                        echo'
                        </select>
                        </div>

                        <label style="float:left" class="col-sm-1">Item:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <select id="itemname" onchange="setprice()">
                        <option value="" selected>Select one...</option>';
                         $resulta =mysql_query("select * from items  order by ItemName");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $row=mysql_fetch_array($resulta);
                                    $item=stripslashes($row['ItemName']);
                                    $code=stripslashes($row['ItemCode']);
                                    $price =stripslashes($row['Price']);
                                    echo"<option value=\"".$code."#".$price."\" >".$item."</option>";
                                }
                        echo'
                        </select>
                        </div>
                        <input type="hidden" id="totitems"/>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-1">Qty:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                         <input type="text" id="qty" onkeyup="calcitemtotal(this)">
                        </div>
                      <label style="float:left" class="col-sm-1">Price:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="price" onkeyup="calcitemtotal(this)">
                        </div>

                        <label style="float:left" class="col-sm-1">Total:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="total" disabled>
                        </div>

                         <label style="float:left" class="col-sm-1">Vat:<span style="color:#f00">*</span></label>
                        <div class="col-sm-2 controls">
                          <input type="text" id="vat" value="0">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-1">Description:</label>
                        <div class="col-sm-5 controls">
                         <input type="text" id="notes">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="addbill()"><span class="menu-icon"><i class="icon icon-add-to-list"></i></span>Add Item</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-yellow" onclick="viewbill()"><span class="menu-icon"><i class="fa fa-search"></i></span>View List</button>
                         </div>

                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-red" onclick="emptybill()"><span class="menu-icon"><i class="fa fa-trash-o"></i></span>Empty List</button>
                         </div>


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Items List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
              </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;

    case '110.2':
              $depid=$_GET['depid'];
              $depname=$_GET['depname'];
              $quat=$_GET['quat'];
              $itcode=$_GET['itcode'];
              $itname=$_GET['itname'];
              $price=$_GET['price'];
              $total=$_GET['total'];
              $supname=$_GET['supname'];
              $supid=$_GET['supid'];
              $notes=$_GET['notes'];
              $vat=$_GET['vat'];
              
              if(isset($_SESSION['bill'])){
              $max=count($_SESSION['bill']);
              $_SESSION['bill'][$max]=array($itcode,$itname,$quat,$depid,$depname,$price,$total,$supid,$supname,$notes,$vat);
             // $_SESSION['bill'] = array_unique($_SESSION['bill'], SORT_REGULAR);
              $max=count($_SESSION['bill']);
              }
              
              else{
              $_SESSION['bill']=array(array());
              $_SESSION['bill'][0]=array($itcode,$itname,$quat,$depid,$depname,$price,$total,$supid,$supname,$notes,$vat);
             // $_SESSION['bill'] = array_unique($_SESSION['bill'], SORT_REGULAR);
              $max=count($_SESSION['bill']);}
              cartbill($max);
              
          break;
          
          case '110.3':
          $pid=$_GET['pid'];
          unset($_SESSION['bill'][$pid]);
          $_SESSION['bill']=array_values($_SESSION['bill']);
          $max=count($_SESSION['bill']);
          cartbill($max);
                
          break;
          
          case '110.4':
        
          if(isset($_SESSION['bill'])){
              $max=count($_SESSION['bill']);
              cartbill($max);
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>'; }
                
          break;
          
          case '110.5':
          $a='bill';
          end($_SESSION[$a]);
          $pid= key($_SESSION[$a]);
          unset($_SESSION[$a][$pid]);
          $_SESSION[$a]=array_values($_SESSION[$a]);
          $max=count($_SESSION[$a]);
          cartbill($max);
                
          break;
          
          case '110.6':
          
          
          if(isset($_SESSION['bill'])){
              unset($_SESSION['bill']);
             echo"<script>$('#totitems').val(0);$('#item44').val('');$('#from').val('');$('#quat').val('');$('#urgency').val('');</script>";
          }
          else  { echo'<script>swal("Error", "List is empty!", "error");</script>';}
                
          break;

      case 111:
       $result = mysql_query("insert into log values('','".$username." accesses Find Supplier Invoices Search Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
       echo' <div class="vd_container" id="container">
            <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Supplier Invoices Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

                  $arr=array();
                  $resulta =mysql_query("select * from purchases order by id desc");
                  $num_resultsa = mysql_num_rows($resulta); 
                  for ($i=0; $i <$num_resultsa; $i++) {
                    $rowa=mysql_fetch_array($resulta);
                    $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']);
                    }
          
         echo' <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Supplier Invoices Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Property Name</th>
                          <th>Supplier</th>
                          <th>Items</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>';

                
                 

                  foreach ($arr as $key => $val) {
                
                    $items='';
                    $result =mysql_query("select * from purchases where rcptno='".$key."' order by id desc");
                    $num_results = mysql_num_rows($result);
                    $total=0;
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['rcptno']);
                          $stat=stripslashes($row['status']);
                          $items.=stripslashes($row['itemname']).';';
                          $total+=preg_replace('~,~', '', stripslashes($row['total']));
                          if($stat==2){$status='Paid';$col='#1fae66';}
                          if($stat==1){$status='New';$col='#F89C2C';}
                          
                        }
                    
                       
                          echo'<tr class="gradeX" id="normal'.$code.'" style="cursor:pointer" title="Click to View" onclick="window.open(\'report.php?id=46&rcptno='.$code.'\')">
                          
                          <td>'.stripslashes($row['depname']).'</td>
                          <td>'.stripslashes($row['supname']).'</td>
                          <td style="width:25%">'.$items.'</td>
                          <td>'.stripslashes($row['date']).'</td>
                          <td>'.number_format($total).'</td>
                          <td style="background:'.$col.'">'.$status.'</td>
                          </tr>';

                        }
                       
                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

         case 112:

              $result = mysql_query("insert into log values('','".$username."  accesses Add/Edit Suppliers Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
                echo'<div class="vd_container" id="container">
                  <div class="vd_content clearfix">
                    <div class="vd_head-section clearfix">
                      <div class="vd_panel-header">
                        <ul class="breadcrumb">
                          <li><a> Add/Edit Suppliers </a></li>
                         </ul>
                        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
                        </div>
           
                      </div>
                    </div>
                    <!-- vd_head-section -->
                    
                    <div class="vd_content-section clearfix">
                      <div class="row" id="form-basic">
                          <div class="col-md-12">
                          <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                              <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Add/Edit Suppliers</h3>
                            </div>
                               <div class="panel-body table-responsive">
                                <div class="col-sm-3 controls">
                                  <button class="btn vd_btn vd_bg-green"  data-toggle="modal" data-target="#myModal"><span class="menu-icon"><i class="icon icon-checkmark"></i></span>Add Supplier</button>
                               </div>

                            

                            <div class="col-sm-3 controls">
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                             </div>

                             <div style="clear:both;width:100%;margin-bottom:5px"></div>
                              <table class="table table-striped" id="data-tables" style="font-size:11px">
                              <thead>
                                <tr>
                                      <th  style="width:30%;">Supplier Name</th>
                                      <th  style="width:15%;">Location</th>
                                      <th  style="width:10%;">Contact Person</th>
                                      <th  style="width:10%;">Contact Tel</th>
                                      <th  style="width:10%;">Pin</th>
                                      <th  style="width:15%;">Notes</th>
                                       <th  style="width:5%;">Save</th>
                                      <th  style="width:5%;">Remove</th>
                                        
                                    </tr>
                                    </thead>
                                   <tbody>'; 
                                  $resulta =mysql_query("select * from suppliers");
                                  $num_resultsa = mysql_num_rows($resulta); 
                                  for ($i=0; $i <$num_resultsa; $i++) {
                                    $rowa=mysql_fetch_array($resulta);
                                    $code=stripslashes($rowa['supid']);

                                    echo'<tr class="gradeX" id="normal'.$code.'" >
                                    <td style="width:30%;"><input  type="text" style="width:100%;  text-align:center" id="sname'.$code.'" value="'.stripslashes($rowa['supname']).'"/></td>
                                    <td style="width:15%;"><input  type="text" style="width:100%;  text-align:center" id="location'.$code.'" value="'.stripslashes($rowa['location']).'"/></td>
                                    <td style="width:10%;"><input  type="text" style="width:100%;  text-align:center" id="cname'.$code.'" value="'.stripslashes($rowa['contactperson']).'"/></td>
                                    <td style="width:10%;"><input  type="text" style="width:100%;  text-align:center" id="ctel'.$code.'" value="'.stripslashes($rowa['contacttel']).'"/></td>
                                    
                                     <td style="width:10%;"><input  type="text" style="width:100%;  text-align:center" id="pin'.$code.'" value="'.stripslashes($rowa['pin']).'"/></td>
                                    

                                    <td style="width:15%;"><input  type="text" style="width:90%;  text-align:center" id="notes'.$code.'" value="'.stripslashes($rowa['notes']).'"/></td>
                                    <td style="width:5%;cursor:pointer" id="save'.$code.'"  onclick="savesup('.$code.')"><img src="img/save.png" width="30"/></td>
                                    <td style="width:5%;cursor:pointer" id="del'.$code.'"  onclick="delsup('.$code.')" ><img src="img/delete.png" width="30"/></td>
                                   
                                    </tr>';
                                      }

                                    echo'</tbody>
                                  </table>


                                   <!-- Modal -->
                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header vd_bg-green vd_white">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                          <h4 class="modal-title" id="myModalLabel">Add New Supplier</h4>
                                        </div>
                                        <div class="modal-body"> 
                                          <form class="form-horizontal" action="#" role="form">
                                        
                                            <div class="form-group">
                                              <label class="col-sm-4 control-label">Supplier Name<span style="color:#f00">*</span></label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="nsname" required>
                                              </div>
                                            </div>

                                             
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Location</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="nlocation" required>
                                              </div>
                                            </div>

                                             <div class="form-group">
                                              <label class="col-sm-4 control-label">Contact Person</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="ncname" required>
                                              </div>
                                            </div>

                                             <div class="form-group">
                                              <label class="col-sm-4 control-label">Contact Tel</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="nctel" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label class="col-sm-4 control-label">KRA Pin</label>
                                              <div class="col-sm-7 controls">
                                               <input class="input-border-btm" type="text" id="npin" required>
                                              </div>
                                            </div>

                                             <div class="form-group">
                                              <label class="col-sm-4 control-label">Notes</label>
                                              <div class="col-sm-7 controls">
                                               <textarea col="3" id="nnotes"></textarea>
                                              </div>
                                            </div>

                                          
                                            </form>
                                        </div>

                                        <div class="modal-footer background-login">
                                          <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn vd_btn vd_bg-green" onclick="addnewsup()">Save Supplier</button>
                                          <div id="message" style="width:40px;height:40px;float:right"></div>
                                        </div>
                                      </div>
                                      <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                  </div>
                                  <!-- /.modal --> 



                                </div>
                              </div>
                              <!-- Panel Widget --> 
                            </div>
                            <!-- col-md-12 --> 
                          </div>
                          <!-- row --> 
                          
                        </div>
                        <!-- .vd_content-section --> 
                        
                      </div>
                      <!-- .vd_content --> 
                    </div>
                    <!-- .vd_container --> 

                    

                    <script type="text/javascript">
                    $(document).ready(function() {
                        "use strict";
                        $("#data-tables").dataTable();
                    } );
                    </script> 

                        ';

                   break;

                    case 113:
    if(isset($_SESSION['paysup'])){unset($_SESSION['paysup']);}
    $result = mysql_query("insert into log values('','".$username." accesses pay Suppliers Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a> Pay Suppliers </a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Pay Suppliers </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                     <div class="form-group">
                        <label style="float:left" class="col-sm-2">Supplier:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="supplier">
                        </div>

                        <label style="float:left" class="col-sm-2">Balance:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                        <input type="text" placeholder="" id="prevbal" disabled>
                        </div>

                        </div>

                     </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Invoices List</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                    <div id="display">


                    </div>
                   </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Submit  Payments</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                      <div class="form-group">
                        <label style="float:left" class="col-sm-2">Total Entries:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                         <input type="text" id="totitems" disabled>
                         <input type="hidden" id="invtot">
                         <input type="hidden" id="paytot">
                        </div>
                      <label style="float:left" class="col-sm-2">Final Total:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="fintot" disabled>
                        </div>
                       </div>

                   <div class="form-group">
                        <label style="float:left" class="col-sm-2">Pay Mode<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <select id="paymode">
                          <option value="">Select One...</option>';
                           $resulta =mysql_query("select * from ledgers WHERE subcat='Bank'");
                            $num_resultsa = mysql_num_rows($resulta);
                              for ($i=0; $i <$num_resultsa; $i++) {
                                  $rowa=mysql_fetch_array($resulta);
                                  $code=stripslashes($rowa['id']);
                                  echo '<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';
                                }
                           echo'</select>
                        </div>

                         <label style="float:left" class="col-sm-2">Ref No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-3 controls">
                          <input type="text" id="refno">
                        </div>
                        
                          <div class="col-sm-2 controls">
                            <button class="btn vd_btn vd_bg-green" onclick="submitsuppay()"><span class="menu-icon"><i class="fa fa-save"></i></span>Submit</button>
                         </div>

                         


                        </div>

                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
              </div>
            <!-- row --> 
              </div>
            
            </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       $suppliers='';
        $resulta =mysql_query("select * from suppliers order by supname");
        $num_resultsa = mysql_num_rows($resulta); 
        for ($i=0; $i <$num_resultsa; $i++) {
        $row=mysql_fetch_array($resulta);
        $item=stripslashes($row['supid']).'-'.stripslashes($row['supname']);
        $suppliers.='"'.$item.'",';
        }
        $len=strlen($suppliers);
        $a=$len-1;
        $suppliers=substr($suppliers,0,$a);


          echo "<script>
          var suppliers = [".$suppliers."];
          $( '#supplier' ).autocomplete({
            source: suppliers,
            select: function( event, ui ) {
                setTimeout(function() {
                var param = $('#supplier').val();
                var parts=param.split('-',2);
                param=parts[0];
                $('#display').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
                $.ajax({
                url:'bridge.php',
                data:{id:113.1,param:param},
                success:function(data){
                $('#display').html(data);
                }
                });
                },500);
            }

            });
          </script>";
          echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'}); </script>";


              break;

              case 113.1:
              $param=$sid=$_GET['param'];
              //$sess=$_GET['sess'];
              unset($_SESSION['paysup']);
              
              $resulty =mysql_query("select * from supplierdebts where SupplierId='".$sid."' and DrCr='dr' and  Status=1");
              $num_resultsy = mysql_num_rows($resulty);
               $xy=0;
              $_SESSION['paysup']=array();
                for ($i=0; $i <$num_resultsy; $i++) {
                $rowy=mysql_fetch_array($resulty);
                $xy+=stripslashes($rowy['Amount']);
                $_SESSION['paysup'][$i]=array(stripslashes($rowy['TransNo']),stripslashes($rowy['InvoiceNo']),stripslashes($rowy['Amount']),stripslashes($rowy['Paid']),stripslashes($rowy['InvBal']),'');
              }

              $max=count($_SESSION['paysup']);


              $invtot=0;$paidtot=0;$fintot=0;
              for ($i = 0; $i < $max; $i++){
              $fintot+=preg_replace('~,~', '', $_SESSION['paysup'][$i][5]);
              }

              $bal=0;
              $resulta =mysql_query("select * from suppliers where supid='".$param."' limit 0,1");
              $row=mysql_fetch_array($resulta);
              $bal=stripslashes($row['bal']);

              //$bal=number_format($bal);
              
              echo"<script>$('#totitems').val(".$max.")</script>
              <script>$('#prevbal').val((".$bal.").formatMoney(2, '.', ','))</script>
              <script>$('#fintot').val((".$fintot.").formatMoney(2, '.', ','))</script>";
            
              cartpaysup($max);
                      
              

              break;

              case 113.2:
              $code=$_GET['code'];
              $paying=$_GET['paying'];
              $_SESSION['paysup'][$code][5]=$paying;
              $max=count($_SESSION['paysup']);

              $paidtot=0;
              for ($i = 0; $i < $max; $i++){
              $paidtot+=preg_replace('~,~', '', $_SESSION['paysup'][$i][5]);
              }
              
              echo"<script>$('#fintot').val((".$paidtot.").formatMoney(2, '.', ','))</script>
              <script>$('#paytot').html((".$paidtot.").formatMoney(2, '.', ','))</script>";
              echo'<img src="img/tick.png" style="width:30px; height:30px">';
              
              

              break;

                case 114:
                $title='Suppliers Balances Ageing Analysis';
                 echo '  <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">As at<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

      
                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupageing()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


              echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

          break;

    case 115:
    $title='Supplier Invoices-All Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupinvoicesall()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 116:
      $title='Supplier Invoices-by Item Report';
      echo '   <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Item<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupinvoicesitem()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $result =mysql_query("select * from items");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['ItemCode'])]=stripslashes($rowa['ItemCode']).'-'.stripslashes($row['ItemName']);
                      }

                      $items='';
                      foreach ($arr as $key => $val) {
                        $items.='"'.$val.'",';
                       }
                       $len=strlen($items);
                        $a=$len-1;
                        $items=substr($items,0,$a);
                      echo '<script>
                      var items = ['.$items.'];
                      $( "#itemname" ).autocomplete({source: items});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

     case 117:
      $title='Supplier Invoices-by Supplier Report';
      echo '   <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div> 

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Supplier<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="itemname" class="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupinvoicessup()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';

                      $arr=array();
                      $result =mysql_query("select * from suppliers");
                      $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                      $rowa=$row=mysql_fetch_array($result); 
                      $arr[stripslashes($rowa['supid'])]=stripslashes($rowa['supid']).'-'.stripslashes($row['supname']);
                      }

                      $suppliers='';
                      foreach ($arr as $key => $val) {
                        $suppliers.='"'.$val.'",';
                       }
                       $len=strlen($suppliers);
                        $a=$len-1;
                        $suppliers=substr($suppliers,0,$a);
                      echo '<script>
                      var suppliers = ['.$suppliers.'];
                      $( "#itemname" ).autocomplete({source: suppliers});
                      </script>';
                      echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;


    case 118:
    $title='Summarized Supplier Invoices Report';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entersupinvoicessumm()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

     case 119:
      $result = mysql_query("insert into log values('','".$username." accesses Monthly Rent Invoicing Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Monthly Rent Invoicing</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              


               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>Monthly Rent Invoicing</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="month" class="date">
                        </div>
                        </div>

                       
                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="postrentauto()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      </div>
                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
       echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";
      


    break;

    case 120:
    $title='Output VAT Reports';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Format<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <div class="vd_radio radio-success">
                            <input type="radio" name="format" id="optionsRadios3" value="1" checked>
                            <label  for="optionsRadios3"> Normal </label>
                            <input type="radio" name="format" id="optionsRadios4" value="2">
                            <label  for="optionsRadios4"> I-Tax </label>
                          </div> 
                         </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>


                         

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entervatrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;


     case 121:
      $result = mysql_query("insert into log values('','".$username." accesses Monthly Penalties Invoicing Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Monthly Penalties Invoicing</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->';

          echo'<div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              


               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>Monthly Penalties Invoicing</h3>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" action="#" role="form">
                      <div id="display">


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Month<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="month" class="date">
                        </div>
                        </div>

                       
                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="postpenauto()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      </div>
                      
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-6 --> 


            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';
       echo "<script>  $( '.date' ).datepicker({ dateFormat: 'mm_yy'});  </script>";
      


    break;

    case 122:
    $db=$_GET['db'];
    $_SESSION['database']=$db;
    echo"<script>window.location.href = \"main.php\";</script>";

    break;

    case 123:
    echo '<div  data-rel="scroll" style="max-height:250px;overflow-y:auto"> 
               <ul class="list-wrapper pd-lr-10">';
               taskscount($username);
               $result =mysql_query("select * from todo where status=0 and username='".$username."'");
              $num_results = mysql_num_rows($result);
               for ($i=0; $i <$num_results; $i++) {
                $row=mysql_fetch_array($result);
                $code=stripslashes($row['id']);
              echo'<li> 
                        <div class="menu-icon"><img alt="example image" src="'.$_SESSION['profilephoto'].'"></div> 
                            <div class="menu-text"> '.stripslashes($row['name']).'
                              <div class="menu-info">
                                    <span class="menu-date">'.stripslashes($row['date']).' '.stripslashes($row['time']).' </span>                                                                         
                                    <span class="menu-action"  onClick="checktask2('.$code.')">
                                        <span  class="menu-action-icon vd_green vd_bd-green"  title="Mark as Completed" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-check"></i>
                                        </span>                                                                            
                                    </span>                                
                              </div>
                            </div> 
                    </li>';


               }

          echo' </ul>
               </div>';

    break;

     case 124:
    echo '   <div  data-rel="scroll" style="max-height:250px;overflow-y:auto"> 
               <ul  class="list-wrapper pd-lr-10">';
                notificationscount($username);
               $result =mysql_query("select * from messages where name='".$username."' and status=0 order by id desc");
              $num_results = mysql_num_rows($result); 
              for ($i=0; $i <$num_results; $i++) {
                $row=mysql_fetch_array($result);
                $code=stripslashes($row['id']);
                if(stripslashes($row['status'])==0){$stat=0;$col='#fff5de';}else{$stat=1;$col='none';}

                   echo' <li> <a href="#"> 
                        <div class="menu-icon vd_yellow"><i class="icon icon-mail"></i></div> 
                            <div class="menu-text"> '.stripslashes($row['message']).'
                              <div class="menu-info"><span class="menu-date">'.stripslashes($row['date']).'</span>
                              <span class="menu-action"  onClick="checknotif('.$code.')">
                                        <span  class="menu-action-icon vd_green vd_bd-green"  title="Mark as Read" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-check"></i>
                                        </span>                                                                            
                                    </span> 
                              </div>
                            </div> 
                    </a> </li>';

                  }
                 echo' </ul>
               </div>';

    break;


       case 125:
    $title='Unit Activity Log';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                            <label style="float:left" class="col-sm-5">Unit<span style="color:#f00">*</span></label>
                            <div class="col-sm-7 controls">';
                            $result =mysql_query("select * from houses order by roomno");
                            $num_results = mysql_num_rows($result);
                             echo'<select id="itemname" class="select">
                              <option value="" selected>Select One...</option>';
                                for ($i=0; $i <$num_results; $i++) {
                                    $row=mysql_fetch_array($result);
                                    echo '<option value="'.stripslashes($row['rid']).'">'.stripslashes($row['roomno']).'-'.stripslashes($row['housename']).'</option>';
                                  }
                             echo'</select>
                              </div>
                            </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                        <input type="text" id="date1" class="date">
                        </div>
                        </div>


                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterhousetrack()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';

                   echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 126:

    $resultx =mysql_query("select * from waterrates where id=1 limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    

$result = mysql_query("insert into log values('','".$username." accesses Adjust Water Utility Rates Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Adjust Water Utility Rates</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Adjust Water Utility Rates </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Sewer Rate <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="sewer" value="'.stripslashes($rowx['sewer']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Water Rate <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="water" value="'.stripslashes($rowx['water']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fixed Charge<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fixed" value="'.stripslashes($rowx['fixed']).'">
                        </div>
                      </div>

                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savewaterrates()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


    case 127:

    $resultx =mysql_query("select * from elecrates where id=1 limit 0,1");
    $rowx=mysql_fetch_array($resultx);
    

  $result = mysql_query("insert into log values('','".$username." accesses Adjust Electricity Utility Rates Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  echo'<div class="vd_container" id="container">
          <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
              <div class="vd_panel-header">
                <ul class="breadcrumb">
                  <li><a>Adjust Electricity Utility Rates</a></li>
                 </ul>
                <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                  <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                  <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                  <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                  
                </div>
   
              </div>
            </div>
            <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Adjust Electricity Utility Rates </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">

                    <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fixed Charge<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fixed" value="'.stripslashes($rowx['fixed']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Consumption <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="consumption" value="'.stripslashes($rowx['consumption']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Fuel Cost <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="fuel" value="'.stripslashes($rowx['fuel']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Forex Adj <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="forex" value="'.stripslashes($rowx['forex']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">Inflation Adj <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="inflation" value="'.stripslashes($rowx['inflation']).'">
                        </div>
                      </div>


                    <div class="form-group">
                        <label style="float:left" class="col-sm-3">WARMA LEVY<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="arma" value="'.stripslashes($rowx['arma']).'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-3">ERC <span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="erc" value="'.stripslashes($rowx['erc']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">REP LEVY<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="rep" value="'.stripslashes($rowx['rep']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-3">VAT<span style="color:#f00">*</span></label>
                        <div class="col-sm-9 controls">
                          <input type="text" id="vat" value="'.stripslashes($rowx['vat']).'">
                        </div>
                      </div>


                       

                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveelecrates()"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';


    break;


                case 128:
                $title='Tenants Balances Ageing Analysis';
                 echo '  <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                       
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">As at<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

      
                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="entertenageing()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


              echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

          break;

    case 129:
    $title='Input VAT Reports';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Format<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <div class="vd_radio radio-success">
                            <input type="radio" name="format" id="optionsRadios3" value="1" checked>
                            <label  for="optionsRadios3"> Normal </label>
                            <input type="radio" name="format" id="optionsRadios4" value="2">
                            <label  for="optionsRadios4"> I-Tax </label>
                          </div> 
                         </div>
                        </div>


                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterinpvatrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>';
     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;


     case 130:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Letter of Offer</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Edit Letter of Offer</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from lof");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['id']).'">'.stripslashes($row['id']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['roomno']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          $('#mainp').html('<img id=\"img-spinner\" src=\"img/spin.gif\" style=\"position:absolute; width:30px;top:25%; left:60%\" alt=\"Loading\"/>');
          $.ajax({
          url:'bridge.php',
          data:{id:131,param:param},
          success:function(data){
          $('#mainp').html(data);
          }
          });
        }
        }).focus();</script>";

    break;


  case 131:
  $param=$_GET['param'];
  $result = mysql_query("insert into log values('','".$username." accesses Edit Letter of Offer Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $resultx =mysql_query("select * from lof where id='".$param."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
 echo'<div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Edit Letter of Offer</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Letter of Offer Variables </h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                          
                           <div class="form-group">
                                        <label class="col-sm-4 control-label">Name</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="bname" required  value="'.stripslashes($rowx['bname']).'">
                                        </div>

                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Address</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="address" required  value="'.stripslashes($rowx['address']).'">
                                        </div>

                                      </div>

                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Unit</label>
                                        <div class="col-sm-7 controls">';
                                          $result =mysql_query("select * from houses where status=0 or rid='".stripslashes($rowx['rid'])."'");
                                          $num_results = mysql_num_rows($result);
                                          echo'<select id="unit" class="input-border-btm" required  onchange="setunit()" >
                                          <option value="'.stripslashes($rowx['rid']).'#'.stripslashes($rowx['roomno']).'#'.stripslashes($rowx['location']).'#'.stripslashes($rowx['rent']).'" selected>'.stripslashes($rowx['roomno']).'</option>';
                                         for ($i=0; $i <$num_results; $i++) {
                                                $row=mysql_fetch_array($result);
                                                echo '<option value="'.stripslashes($row['rid']).'#'.stripslashes($row['roomno']).'#'.stripslashes($row['location']).'#'.stripslashes($row['rent']).'">'.stripslashes($row['roomno']).'</option>';
                                              }
                                         echo'</select>
                                          </div>

                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Location</label>
                                        <div class="col-sm-7 controls">
                                         <input  type="hidden" id="rid" required disabled value="'.stripslashes($rowx['rid']).'">
                                         <input  type="hidden" id="roomno" required disabled value="'.stripslashes($rowx['roomno']).'">
                                          <input class="input-border-btm" type="text" id="location" required disabled value="'.stripslashes($rowx['location']).'">
                                        </div>

                                      </div>

                                       
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lease Term</label>';
                                        $leaseterm=stripslashes($rowx['leaseterm']);
                                        $years=substr($leaseterm,0,1);
                                        $months=substr($leaseterm,8,1);
                                       echo' <div class="col-sm-2 controls">
                                        <input class="input-border-btm" type="number" id="years" required value="'.$years.'">
                                         </div>
                                         <label class="col-sm-1 control-label">Years</label>
                                         <div class="col-sm-2 controls">
                                        <input class="input-border-btm" type="number" id="months"  required value="'.$months.'">
                                         </div>
                                         <label class="col-sm-2 control-label">Months</label>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Monthly Rent</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="monrent" required disabled value="'.stripslashes($rowx['rent']).'">
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Payable Date</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="datepicker-date" required value="'.substr(stripslashes($rowx['payabledate']),0,2).'">
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Commencement Date</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="text" id="datepicker-normal" required value="'.stripslashes($rowx['commencedate']).'">
                                        </div>

                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Escalation Percentage</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="escper" required value="'.stripslashes($rowx['escalation']).'">
                                        </div>

                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-6 control-label">Escalation Interval in Years</label>
                                        <div class="col-sm-5 controls">
                                         <input class="input-border-btm" type="text" id="escint"  required value="'.stripslashes($rowx['escalation_type']).'">
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <label class="col-sm-4 control-label">Utilities Deposit</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="utildep"  required value="'.stripslashes($rowx['utildep']).'">
                                        </div>

                                      </div>


                                      <div class="form-group">
                                       <label class="col-sm-4 control-label">Service Charge</label>
                                       <div class="col-sm-7 controls">
                                       <textarea rows="8" class="width-100" id="servicecharge">'.stripslashes($rowx['servicecharge']).'</textarea>
                                        </div>
                                      </div>

                                      

                                      
                                      ';

                                      $depmon=(stripslashes($rowx['chequeamount'])-stripslashes($rowx['utildep'])-stripslashes($rowx['rent']))/stripslashes($rowx['rent']);
                                      echo'
                                        <div class="form-group">
                                        <label class="col-sm-4 control-label">Deposit (No. of Months)</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="number" id="depmonths"  required value="'.stripslashes($rowx['depmonths']).'">
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-6 control-label">Deposit Payable Currently (No. of Months)-</label>
                                        <div class="col-sm-5 controls">
                                         <input class="input-border-btm" type="number" id="depmonthscurrent"  required value="'.$depmon.'">
                                        </div>

                                      </div>

                                      
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Fit Out Period (Months)</label>
                                        <div class="col-sm-7 controls">
                                          <input class="input-border-btm" type="number" id="fitperiod"  required value="'.stripslashes($rowx['fitout']).'">
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Premises Usage</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="usage" required value="'.stripslashes($rowx['unitusage']).'">
                                        </div>

                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Cheque Payable To</label>
                                        <div class="col-sm-7 controls">
                                         <input class="input-border-btm" type="text" id="chequename" required value="'.stripslashes($rowx['chequename']).'">
                                        </div>

                                      </div>

                                        <div class="form-group">
                                        <label class="col-sm-4 control-label">Lawyer</label>
                                        <div class="col-sm-7 controls">';
                                          $result =mysql_query("select * from lawyers");
                                          $num_results = mysql_num_rows($result);
                                         echo'<select id="advocate" class="input-border-btm" required   >
                                          <option value="'.stripslashes($rowx['lawyer']).'" selected>'.stripslashes($rowx['lawyer']).'</option>';
                                         for ($i=0; $i <$num_results; $i++) {
                                                $row=mysql_fetch_array($result);
                                                echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                                              }

                                         echo'</select>
                                          </div>

                                      </div>

                                  <div class="form-group">
                                       <label class="col-sm-4 control-label">Payment Breakdown</label>
                                       <div class="col-sm-7 controls">
                                       <textarea rows="8" class="width-100" id="payment_breakdown">'.stripslashes($rowx['payment_breakdown']).'</textarea>
                                        </div>
                                      </div>

                                       


                                        
                     
                    
                      <div class="form-group form-actions">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savelof('.$param.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '#datepicker-date' ).datepicker({ dateFormat: 'dd'}); </script>";

    break;

  case 132:
   $search=$_GET['search'];
   $categ=$_GET['categ'];
   $arr=array(array());
   switch($categ){
    case 'contacts':
    $result =mysql_query("SELECT * FROM contacts WHERE name LIKE '%".$search."%' or  bname LIKE '%".$search."%' or  remarks LIKE '%".$search."%' or  phone LIKE '%".$search."%'  limit 0,1000");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $max=count($arr);
    $recid=stripslashes($row['id']);
    $desc='Name: '.stripslashes($row['name']).' Business: '.stripslashes($row['bname']).' Phone: '.stripslashes($row['phone']).' Remarks: '.stripslashes($row['remarks']);
    $arr[$max]=array($recid,$desc,1);
    }
    break;

    case 'messages':
    $result =mysql_query("SELECT * FROM notices WHERE sendto LIKE '%".$search."%' or  phone LIKE '%".$search."%' or  message LIKE '%".$search."%'  limit 0,1000");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $max=count($arr);
    $recid=stripslashes($row['id']);
    $desc='Message: '.stripslashes($row['message']).' Sent to: '.stripslashes($row['sendto']).' Phone: '.stripslashes($row['phone']);
    $arr[$max]=array($recid,$desc,2);
    }
    break;

   
   }

   searchtable($categ,$search);
   $result = mysql_query("insert into log values('','".$username." accesses  Search Module Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Search Panel</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
      
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Search Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Record ID</th>
                          <th>Description</th>
                         </tr>
                      </thead>
                      <tbody>';

                    $max=count($arr);
                    for ($i = 1; $i < $max; $i++){
                    $recid = $arr[$i][0];
                    $desc = $arr[$i][1];
                    $catid = $arr[$i][2];
                    
                     echo"<tr class=\"gradeX\" id=\"normal".$i."\"  style=\"cursor:pointer\" title=\"View Record\">";
                          echo'<td>'.$recid.'</td>
                          <td>'.$desc.'</td>
                          </tr>';

                    }


                      echo'</tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 

      <script type="text/javascript">
      $(document).ready(function() {
          "use strict";
          $("#data-tables").dataTable();
      } );
      </script> ';
        break;

        case 133:

        echo ' <!-- Modal -->
                                  <div class="modal" id="myModal" style="display:block;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header vd_bg-green vd_white">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                           <h4 class="modal-title" id="myModalLabel">System Update...Kindly Wait</h4>
                                        </div>
                                        <div class="modal-body"> 
                                          <form class="form-horizontal" action="#" role="form">
                                        

                                       
                                             <div class="form-group">
                                               <div class="col-sm-12 controls">
                                                <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" id="autodiv" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:0%"> <span id="autospan">0%</span> </div>
                                              </div>
                                              </div>
                                           </div>

                                           <div id="automess"></div>

                                         </div>

                                        <div class="modal-footer background-login">
                                          <div id="message" style="width:40px;height:40px;float:right"></div>
                                        </div>
                                      </div>
                                      <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                  </div>
                                  <!-- /.modal --> 
                                  <script>updatescript()</script>
';
break;

    case 134:
    $result = mysql_query("insert into log values('','".$username." accesses New Tenant File Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>New Tenant</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> New Tenant Information (Direct Entry)</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Director Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">KRA Pin<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="pin" value="">
                        </div>
                      </div>




                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Unit<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">';
                        $result =mysql_query("select * from houses where status=0");
                        $num_results = mysql_num_rows($result);
                         echo'<select id="unit" class="select" required >
                         <option value="">Select One...</option>';
                            for ($i=0; $i <$num_results; $i++) {
                                $row=mysql_fetch_array($result);
                                echo '<option value="'.stripslashes($row['rid']).'">'.stripslashes($row['roomno']).'-'.stripslashes($row['rent']).'</option>';
                              }
                         echo'</select>
                          </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Billing Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        <select id="btype" class="select" >
                          <option value="Monthly">Monthly</option>
                          <option value="Quartely">Quartely</option>
                          <option value="Yearly">Yearly</option>
                         </select>
                          </div>
                        </div>

                        
                          <div class="form-group">
                          <label  style="float:left" class="col-sm-4">Lease Term</label>
                          <div class="col-sm-2 controls">
                          <input class="input-border-btm" type="number" id="years" required value="5">
                           </div>
                           <label class="col-sm-1 control-label">Years</label>
                           <div class="col-sm-2 controls">
                          <input class="input-border-btm" type="number" id="months"  required value="3">
                           </div>
                           <label class="col-sm-2 control-label">Months</label>

                        </div>

                      

                    
                </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

               <div class="col-md-6">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> New Tenant Information (Direct Entry)</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      
                     
                        

                        <div class="form-group">
                          <label style="float:left" class="col-sm-4">Payable Date</label>
                          <div class="col-sm-8 controls">
                            <input class="input-border-btm" type="text" id="datepicker-date" required value="">
                          </div>

                        </div>

                        <div class="form-group">
                          <label style="float:left" class="col-sm-4">Commencement Date</label>
                          <div class="col-sm-8 controls">
                            <input class="input-border-btm" type="text" id="datepicker-normal" required value="">
                          </div>

                        </div>
                        
                        <div class="form-group">
                          <label style="float:left" class="col-sm-4">Escalation Percentage</label>
                          <div class="col-sm-8 controls">
                           <input class="input-border-btm" type="text" id="escper" required value="10">
                          </div>

                        </div>

                         <div class="form-group">
                          <label style="float:left" class="col-sm-6">Escalation Interval in Years</label>
                          <div class="col-sm-6 controls">
                           <input class="input-border-btm" type="text" id="escint"  required value="1">
                          </div>
                        </div>






                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Payable</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="depayable" value="" onkeyup="format(this)">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Paid</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="depaid" value="" onkeyup="format(this)">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Deposit Balance</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="debal" value="" onkeyup="format(this)">
                        </div>
                        </div>


                    <div class="form-group form-actions">
                    <div class="col-sm-4"> </div>
                    <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="savenewtenant()"><i class="icon-ok"></i> Save</button>
                      <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                      <div id="message" style="width:40px;height:40px;float:right"></div>
                    </div>
                  </div>
                </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 -->
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '#datepicker-date' ).datepicker({ dateFormat: 'dd'}); </script>";

     
    break;

     case 135:
    $title='Rent Escalation Reports';
    echo '              <div class="form-group"> 
                        <p style="text-align:center;font-size:16px;font-weight:bold;text-decoration:underline">'.$title.'</p> 
                        </div>          
                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date1" class="date">
                        </div>
                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="text" id="date2" class="date">
                        </div>
                        </div>

                        <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                        </div>

                        <div class="form-group form-actions">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-9">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterescrep()"><i class="fa fa-save"></i> Submit</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message2" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>


                      ';


     echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

    break;

    case 136:
    $result = mysql_query("insert into log values('','".$username." accesses Activations Booking Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Activations/Open Space Booking</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
              <!-- vd_head-section -->
            <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Activations/Open Space Booking</h3>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Business Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="bname" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="">
                        </div>
                      </div>


                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Contact Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dname" value="">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Telephone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="dphone" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">KRA Pin</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="pin" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Other Details</label>
                        <div class="col-sm-8 controls">
                          <textarea rows="3" class="width-100" id="details"></textarea>
                        </div>
                      </div>

                   <div class="form-group form-actions">
                    <div class="col-sm-4"> </div>
                    <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveactivation()"><i class="icon-ok"></i> Save</button>
                      <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                      <div id="message" style="width:40px;height:40px;float:right"></div>
                    </div>
                  </div>


                    
                </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 

              
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

      echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '#datepicker-date' ).datepicker({ dateFormat: 'dd'}); </script>";

     
    break;

      case 137:
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
         <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Activations Clearing/Removal</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
              <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
              <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
              <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
              
                      </div>
         
                    </div>
                  </div>
                  <!-- vd_head-section -->
                <div style="width:100%;padding:20px">
                <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-search"></i> </span>Activations Clearing/Removal</h3>
                  </div>
                <select id="intcombo">';
                   $result =mysql_query("select * from tenants where status=1 and activation=1");
                    $num_results = mysql_num_rows($result);
                      for ($i=0; $i <$num_results; $i++) {
                          $row=mysql_fetch_array($result);
                          $code=stripslashes($row['id']);
                          echo '<option value="'.stripslashes($row['tid']).'">'.stripslashes($row['tid']).'-'.stripslashes($row['bname']).'-'.stripslashes($row['phone']).'</option>';
                        }
                   echo'</select>
                     <div class="cleaner_h10"></div>
                     <div class="col-sm-7">
                      <button class="btn vd_btn vd_bg-red" type="button" onclick="hidecont()">Cancel</button>
                    </div>
                    </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';
      echo "<script>
            $('#intcombo').editableSelect({
          onSelect: function (element) {
          var param = $('#intcombo').val();
          var str = $('#item5').val();
          var parts=param.split('-',3);
          param=parts[0];
          closeactivation(param);
        }
        }).focus();</script>";

    break;


    case 138:
      $result = mysql_query("insert into log values('','".$username." accesses Change Login Credentials Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')"); 

     

      $result =mysql_query("select * from tenants where kpano='".$username."'");
$rowx=mysql_fetch_array($result);
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>Profile</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->

        
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent"> <img alt="example image" src="'.getprofileimage($userid).'"> </div>
                    
                    <h2 class="font-semibold mgbt-xs-5" style="font-size:14px;margin-top:10px">'.stripslashes($rowx['bname']).'</h2>
                   <div class="mgtp-20">
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr>
                            <td style="width:50%;">Status</td>
                            <td><span class="label label-success">Active</span></td>
                          </tr>
                          <tr>
                            <td>Rating</td>
                            <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                          </tr>
                          <tr>
                            <td>Member Since</td>
                            <td> '.stripslashes($rowx['date']).' </td>
                             </tr>

                        
                        </tbody>
                      </table>

                     
                    </div>


                   
                  </div>
                </div>
                <!-- panel widget -->
                
               
              </div>
              <div class="col-sm-9">
                <div class="tabs widget">
  <ul class="nav nav-tabs widget">
    <li class="active"> <a data-toggle="tab" href="#profile-tab"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="#projects-tab"> Edit Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>    
    <li> <a data-toggle="tab" href="#photos-tab"> Change Password <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="#friends-tab"> Upload Profile Pic <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
   </ul>
  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-20">
<div class="vd_info tr"> <a class="btn vd_btn btn-xs vd_bg-yellow"  data-toggle="tab"  href="#projects-tab"> <i class="fa fa-pencil append-icon"></i> Edit Profile</a> </div>      
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Names:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['bname']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">ID:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['idno']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Enrollment No:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['eno']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>

          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">KPA NO:</label>
              <div class="col-xs-7 controls"><b>'.stripslashes($rowx['kpano']).'</b></div>
              <!-- col-sm-10 --> 
            </div>
          </div>

          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Year of Enrollment:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['eyear']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Address:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['address']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Phone:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['phone']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['email']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Pin:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['pin']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">County:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['county']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Current Facility:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['currfacility']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>


           <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Next of Kin (Name):</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['gname']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>

           <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Next of Kin Relationship:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['grship']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>

           <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Next of Kin Phone:</label>
              <div class="col-xs-7 controls">'.stripslashes($rowx['gphone']).'</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
           <a class="btn vd_btn btn-xs vd_bg-soft-green" target="blank"   href="../report.php?id=89&rcptno='.$userid.'"> <i class="fa fa-certificate append-icon"></i> View Membership Certficate</a> 
            </div>
          </div>
        </div>
        </div>
        
    </div>
    <!-- home-tab -->
    
    <div id="projects-tab" class="tab-pane">
      <div class="pd-20">
       

         <form class="form-horizontal" action="#" role="form">
                      

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Address<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="address" value="'.stripslashes($rowx['address']).'">
                        </div>
                      </div>

                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="phone" value="'.stripslashes($rowx['phone']).'">
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">ID No<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="idno" value="'.stripslashes($rowx['idno']).'">
                        </div>
                      </div>


                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Year of Enrollment<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="eyear" value="'.stripslashes($rowx['eyear']).'">
                        </div>
                      </div>



                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Email<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="email" value="'.stripslashes($rowx['email']).'">
                        </div>
                      </div>



                       <div class="form-group">
                        <label style="float:left" class="col-sm-4">KRA Pin</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="pin" value="'.stripslashes($rowx['pin']).'">
                        </div>
                      </div>

                              <div class="form-group">
                        <label style="float:left" class="col-sm-4">Current Facility</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="currfacility" value="'.stripslashes($rowx['currfacility']).'">
                        </div>
                      </div>

                      <div class="form-group">
                          <label style="float:left" class="col-sm-4">County</label>
                          <div class="col-sm-8 controls">';
                            $result =mysql_query("select * from counties");
                            $num_results = mysql_num_rows($result);
                           echo'<select id="county" class="input-border-btm" required   >
                            <option value="'.stripslashes($rowx['county']).'" selected>'.stripslashes($rowx['county']).'</option>';
                           for ($i=0; $i <$num_results; $i++) {
                                  $row=mysql_fetch_array($result);
                                  echo '<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
                                }
                           echo'</select>
                            </div>

                        </div>';

                       
                       echo'<div class="form-group">
                        <label style="float:left" class="col-sm-4">Sub-County</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="subcounty" value="'.stripslashes($rowx['subcounty']).'">
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Next of Kin Name</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="gname"  value="'.stripslashes($rowx['gname']).'">
                        </div>
                        </div>

                        <div class="form-group">
                          <label style="float:left" class="col-sm-4">Next of Kin Relationship</label>
                          <div class="col-sm-8 controls">
                          <select id="grship" class="input-border-btm">
                          <option value="'.stripslashes($rowx['grship']).'">'.stripslashes($rowx['grship']).'</option>
                           <option value="">None</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Husband">Husband</option>
                            <option value="Wife">Wife</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Aunt">Aunt</option>
                            <option value="Cousin">Cousin</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Others">Others</option></select>
                            </div>

                        </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Next of Kin Phone</label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="gphone" value="'.stripslashes($rowx['gphone']).'">
                        </div>
                        </div>
                        

                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="saveprofile('.$userid.')"><i class="icon-ok"></i> Save details</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                     

                      



                       

                       

                     


                      

                    
                </form>       
        </div>
    </div>
    
    <div id="photos-tab" class="tab-pane">
      <div class="pd-20">
     <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Old Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="password" id="opass">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">New Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                         <input type="password" id="npass">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">Confirm Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                         <input type="password" id="cpass">
                        </div>
                      </div>

                      <div class="form-group form-actions">
                        <div class="col-sm-5"> </div>
                        <div class="col-sm-7">
                          <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="postpass('.$userid.')"><i class="icon-ok"></i> Save</button>
                          <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                          <div id="message" style="width:40px;height:40px;float:right"></div>
                        </div>
                      </div>
                    </form>     
        
      </div>
      <!-- pd-20 -->       
    </div> <!-- photos tab -->
    <div id="friends-tab" class="tab-pane">
      <div class="pd-20">
      <div class="row">
        <div class="col-sm-12">


        <div id="cropContainerModal"></div>


        </div>
         
            </div> <!-- row -->
        </div> <!-- pd-20 --> 
    </div>  <!-- groups tab -->   
    
  </div>
  <!-- tab-content --> 
</div>
<!-- tabs-widget -->              </div>
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
      
          
        
          
          

        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";

      ?>

  <script src="js/croppic.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>


    
    
    var croppicContainerModalOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        modal:true,
        imgEyecandyOpacity:0.4,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
    
    
    
    
  </script>

  <?php


    break;



        //portal code begins here


    case 208:
    $param=0;
if(!isset($_GET['keyy'])){$_SESSION['links'][]=$id.'-'.$param;end($_SESSION['links']); $keyy= key($_SESSION['links']);}
else{$keyy=$_GET['keyy'];}echo "<script> $('#thekey').val('".$keyy."');</script>";
      $result = mysql_query("insert into log values('','".$username." accesses Calendar Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">

        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Association Events Calendar</h3>
                  </div>
                  <div class="panel-body box">

                      <form class="form-horizontal" action="#" role="form">
                     
                      <div style="clear:both;width:100%;margin-bottom:10px"></div>
                      <div id="calendar" class="mgtp-10"> </div>
                       


                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';



  //calendar
          $events='';
          $result =mysql_query("select * from events where  status=1");
          $num_results = mysql_num_rows($result); 
          for ($i=0; $i <$num_results; $i++) {
            $row=mysql_fetch_array($result);
            $code=stripslashes($row['id']);
            $title=stripslashes($row['name']);
            $startstamp=stripslashes($row['startstamp']);
            $endstamp=stripslashes($row['endstamp']);
            $sy=substr($startstamp,0,4);
            $sm=substr($startstamp,4,2)-1;
            $sd=substr($startstamp,6,2);
            $sh=substr($startstamp,8,2);
            $si=substr($startstamp,10,2);

           
            $ey=substr($endstamp,0,4);
            $em=substr($endstamp,4,2)-1;
            $ed=substr($endstamp,6,2);
            $eh=substr($endstamp,8,2);
            $ei=substr($endstamp,10,2);

            $events.="  {id: ".$code.",title: '".$title."',start: new Date(".$sy.", ".$sm.", ".$sd.", ".$sh.", ".$si."),end: new Date(".$ey.", ".$em.", ".$ed.", ".$eh.", ".$ei.") },";

          }


          $len=strlen($events);
          $len=$len-1;
          $events='['.substr($events,0,$len).']';




echo"<script>var calendarevents=".$events."</script>"; 



?>
<script type="text/javascript">
//calendar


  

function getmonth(a){
var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
var d = new Date();
d.setMonth(d.getMonth()-a);
var d2=monthNames[d.getMonth()]+' '+d.getFullYear();
return d2;

}


</script>


<script type="text/javascript">

/* FULL CALENDAR  */

    $('#calendar').fullCalendar({
      header: {
        left:   'title',
        center: '',
        right:  'today prev,next'
      },
      editable: true,
      events: calendarevents,
        eventClick: function(event) {
            if (event.id) {
                var d = new Date(event.start);
                d=d.toString(); 
                e=d.substring(0,24);

                var d = new Date(event.end);
                d=d.toString(); 
                f=d.substring(0,24);

                swal({
                title: event.title,
                text: "Start:<b>"+e+"</b><BR/>End:<b>"+f+"</b>",
                html: true
                });

             }
        }
    });
    

// Skycons

      var icons = new Skycons({"color": "white","resizeClear": true}),
        icons_btm = new Skycons({"color": "#F89C2C","resizeClear": true}),
          list  = "clear-day",
      livd_btm = ["rain", "wind"
      ];
      icons.set(list,list)
      for(var i = livd_btm.length; i--; )
        icons_btm.set(livd_btm[i], livd_btm[i]);

      icons.play();
    icons_btm.play();

/* News Widget */
     $(".vd_news-widget .vd_carousel").carouFredSel({
      prev:{
        button : function()
        {
          return $(this).parent().parent().children('.vd_carousel-control').children('a:first-child')
        }
      },
      next:{
        button : function()
        {
          return $(this).parent().parent().children('.vd_carousel-control').children('a:last-child')
        }
      },    
      scroll: {
        fx: "crossfade",
        onBefore: function(){
            var target = "#front-1-clients";
            $(target).css("transition","all .5s ease-in-out 0s");       
          if ($(target).hasClass("vd_bg-soft-yellow")){           
            $(target).removeClass("vd_bg-soft-yellow");
            $(target).addClass("vd_bg-soft-red");   
          } else
          if ($(target).hasClass("vd_bg-soft-red")){            
            $(target).removeClass("vd_bg-soft-red");
            $(target).addClass("vd_bg-soft-blue");    
          } else
          if ($(target).hasClass("vd_bg-soft-blue")){           
            $(target).removeClass("vd_bg-soft-blue");
            $(target).addClass("vd_bg-soft-green");   
          } else
          if ($(target).hasClass("vd_bg-soft-green")){            
            $(target).removeClass("vd_bg-soft-green");
            $(target).addClass("vd_bg-soft-yellow");    
          }           
        }
      },
      width: "auto",
      height: "responsive",
      responsive: true,
      auto:3000
      
    });
  $('#eventdate').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' });

</script>

<?php


 break;





  case 209:
    $param=0;
if(!isset($_GET['keyy'])){$_SESSION['links'][]=$id.'-'.$param;end($_SESSION['links']); $keyy= key($_SESSION['links']);}
else{$keyy=$_GET['keyy'];}echo "<script> $('#thekey').val('".$keyy."');</script>";
   $result = mysql_query("insert into log values('','".$username." accesses Member CME Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
        <button class="btn vd_btn vd_bg-green" style="display:none" id="modaltrigger"  data-toggle="modal" data-target="#myModal"><a></a></button>

            <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Member CME Panel</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>CME Id</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Register Date</th>
                          <th>Expiry Date</th>
                          <th>Status</th>
                         </tr>
                      </thead>

                      <tbody>';

                       $result =mysql_query("select * from cme where endstamp>=".date('Ymd')."");
                        $num_results = mysql_num_rows($result);
                          for ($i=0; $i <$num_results; $i++) {
                              $row=mysql_fetch_array($result);
                               $code=stripslashes($row['id']);
                                if($row['endstamp']>date('Ymd')){$status= '<b style="background:#ff3">Open</b>';}
                                else {$status= '<b style="background:#f00">Closed</b>';}


                                   if($row%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "   onclick="opencmepanel('.$code.')">';}
                                    else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer" onclick="opencmepanel('.$code.')">'; }
                                    echo'
                                    <td>'.$row['id'].'</td>
                                     <td>'.$row['title'].'</td>
                                     <td>'.$row['author'].'</td>
                                     <td>'.$row['date'].'</td>
                                     <td>'.$row['enddate'].'</td>
                                     <td>'.$status.'</td>
                                    </tr>';
                                      }

                   echo '</tbody>                  
                </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 



            





      
      <style>td{cursor:pointer} </style>';
        break;




    case 210:
$param=$_GET['param'];
if(!isset($_GET['keyy'])){$_SESSION['links'][]=$id.'-'.$param;end($_SESSION['links']); $keyy= key($_SESSION['links']);}
else{$keyy=$_GET['keyy'];}echo "<script> $('#thekey').val('".$keyy."');</script>";
  $result = mysql_query("insert into log values('','".$username." accesses CME File Panel.Record ID:".$param."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  $resultx =mysql_query("select * from cme where id='".$param."'");
  $rowx=mysql_fetch_array($resultx);
 


 // if($sap==''){$sap=0;} if($soi==''){$soi=0;}



 
    echo '<div class="vd_container" id="container">
        <div class="vd_content clearfix" style="">
   
                <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> CME File-'.stripslashes($rowx['title']).'-['.stripslashes($rowx['startdate']).'] </h3>
                  </div>
                 <div class="panel-body">
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">General Information</a></li>
                      <li><a href="#tab2" data-toggle="tab">CME Notes</a></li>
                      </ul>     
                    <br/>               
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab1"> 
                    <div class="col-md-12">
                      <form class="form-horizontal" action="#" role="form">

                      
                      

                     <form class="form-horizontal" action="#" role="form">
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Title<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                         <input type="hidden" id="cmeid" value="'.stripslashes($rowx['id']).'">
                          <input type="text" id="title" value="'.stripslashes($rowx['title']).'" disabled>
                        </div>
                      </div>

                       
                      
                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="date" value="'.stripslashes($rowx['startdate']).'" disabled>
                        </div>
                      </div>

                        <div class="form-group">
                        <label style="float:left" class="col-sm-4">Expiry Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="date" value="'.stripslashes($rowx['enddate']).'" disabled>
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Author<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                          <input type="text" id="author" value="'.stripslashes($rowx['author']).'" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-4">Remarks<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

                        '.stripslashes($rowx['remarks']).'
                        </div>
                      </div>
                            
                            

                      
                      


                    </form>
                     </div>

                     </div><!--end tab-->



                           <div class="tab-pane" id="tab2">
                           <h6 style="background:#ff3;padding:3px;font-weight:bold">Scroll down and Click the Acknowledge Study Button</h6>

                           <form method="post" id="esign_acceptance_form" action="/application">
    <div>
      <object id="applicant_esign_content" data="../uploads/cme/'.stripslashes($rowx['pdffile']).'.pdf" type="application/pdf" width="100%" height="400px">


                
                     </object>

                      <p>Your web browser does not have a PDF plugin.
  Instead you can <a target="blank" href="../uploads/cme/'.stripslashes($rowx['pdffile']).'.pdf">click here to
  download the PDF file.</a></p>


      
      </div>

         <div style="text-align: right;">
        <div>
          <input type="hidden" value="false" name="applicant_read_the_content" id="applicant_read_the_content" />
          <button class="btn vd_btn vd_bg-green vd_white" type="button" id="accept_esign_disclosure_applicant"><i class="icon-ok"></i>Acknowledge Study</button>
         <div id="message" style="width:40px;height:40px;float:right"></div>
        </div>
      </div>

        
     
    </form>




                          </div>




                       </div>
                     
                      </div>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
        </div>
            <!-- row --> 
              </div>
            
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container -->';

      ?>

      <script>
  
         //$("#applicant_read_the_content").val("true");

         var totalScrollHeight = $("#applicant_esign_content")[0].scrollHeight
         var scrollBarHeight = $("#applicant_esign_content")[0].clientHeight
          if(totalScrollHeight==0){ $("#applicant_read_the_content").val("true");}
         
        $("#applicant_esign_content").scroll(function(){
            var totalScrollHeight = $("#applicant_esign_content")[0].scrollHeight
            var scrollBarHeight = $("#applicant_esign_content")[0].clientHeight
            var scrollBarTopPosition = $("#applicant_esign_content")[0].scrollTop
            if (totalScrollHeight== scrollBarHeight + scrollBarTopPosition){
                $("#applicant_read_the_content").val("true")
            }else{
               $("#applicant_read_the_content").val("false")
            }

           
        })

        $("#accept_esign_disclosure_applicant").click(function(){
            if ($("#applicant_read_the_content").val() != "true"){
                swal("Error", "Please scroll through the cme notes before clicking Submit"+totalScrollHeight, "error");
                return false
            }
            else{
                submitcme();
            }
        })
  
</script>


<?php
       
     
    break;





  case 211:
    $param=0;
if(!isset($_GET['keyy'])){$_SESSION['links'][]=$id.'-'.$param;end($_SESSION['links']); $keyy= key($_SESSION['links']);}
else{$keyy=$_GET['keyy'];}echo "<script> $('#thekey').val('".$keyy."');</script>";
   $result = mysql_query("insert into log values('','".$username." accesses Forums Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
   echo' <div class="vd_container" id="container">
        <div class="vd_content clearfix">
        
            <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Member Forums Panel</h3>
                  </div>';

                   $resultx =mysql_query("select * from forums order by id desc limit 0,1");
                   $rowx=mysql_fetch_array($resultx);
                   $year=stripslashes($rowx['stamp']);
                   if($year==''){date('Y');}else{$year=substr($year,0,4);}



                   echo'<ul class="vd_timeline">
                  <li class="tl-item tl-item-year" >
                    <div class="tl-year">'.$year.'</div>
                  </li>
                  <li class="tl-item tl-item-date">
                    <div class="tl-date"> Start </div>
                  </li>';

                   $result =mysql_query("select * from forums where  status=1 order by id desc");
                  $num_results = mysql_num_rows($result); 
                  for ($i=0; $i <$num_results; $i++) {
                    $row=mysql_fetch_array($result);
                    $forumid=stripslashes($row['id']);


                     $resultx =mysql_query("select * from forumcomments where forumid='".$forumid."'");
                     $comments = mysql_num_rows($resultx);
 


                  echo'<li class="tl-item">
                    <div class="tl-icon success"> <i class="fa fa-comments"></i> </div>
                    <div class="tl-label panel widget light-widget panel-bd-left">
                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="img/admin.png">
                      <h3 class="mgtp-10 mgbt-xs-5">'.stripslashes($row['title']).'</h3>
                      <span class="vd_soft-grey" style="font-weight:bold">'.stripslashes($row['date']).' By <a href="#">'.stripslashes($row['author']).'</a></span>
                      <div class="clearfix mgbt-xs-10"></div>
                      <p class="mgbt-xs-20">'.stripslashes($row['remarks']).'</p>
                      <div class="tl-action"><a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment ('.$comments.')</a></div>
                      <hr class="mgtp-0"/>
                      <div class="comments">
                        <div class="content-list content-image">
                          <ul class="list-wrapper no-bd-btm" id="listcomments'.$forumid.'">';

                           $resulta =mysql_query("select * from forumcomments where forumid='".$forumid."' order by id asc");
                           $num_resultsa = mysql_num_rows($resulta);

                          for ($a=0; $a <$num_resultsa; $a++) {
                            $rowa=mysql_fetch_array($resulta);
                            $comid=stripslashes($rowa['id']);
                            $img=getprofileimage($rowa['memberid']);


                            echo'<li>
                              <div class="menu-icon"><img src="'.$img.'" alt="image"></div>
                              <div class="menu-text">'.stripslashes($rowa['comment']).'
                                <div class="menu-info"> <span class="menu-date">'.stripslashes($rowa['date']).'-'.stripslashes($rowa['time']).'</span> </div>
                              </div>
                            </li>';

                          }
                           
                         echo'</ul>
                        </div>
                        <!-- content-list -->
                        <hr class="no-bd"/>
                        <div class="reply-comment">
                          <div class="content-list content-image">
                            <div class="list-wrapper">
                              <div>
                                <div class="menu-icon"><img src="'.$profilepic.'" alt="image"></div>
                                <div class="menu-text">
                                  <textarea  rows="3" id="commentarea'.$forumid.'" class="width-100" placeholder="Write a comment..."></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- reply-comment -->


                           <div class="form-group form-actions">
                           <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                              <button class="btn-xs vd_btn vd_bg-green vd_white" type="button" onclick="savecomment('.$forumid.')"><i class="icon-ok"></i>Add Comment</button>
                             <div id="message'.$forumid.'" style="width:40px;height:40px;float:right"></div>
                            </div>
                          </div>


                        </div>
                        <!-- comments --> 
                      </div>
                      <!-- panel-body --> 
                    </div>
                    <!-- panel --> 
                  </li>';


                  }
                 
                 
                  
                 echo' <li class="tl-item tl-item-date">
                    <div class="tl-date tl-date-end"> END </div>
                  </li>
                </ul>
                 



                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 





      <style>td{cursor:pointer} </style>';
        break;




    case 212:
      $result = mysql_query("insert into log values('','".$username." accesses Change Login Credentials Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
      echo'<div class="vd_container" id="container">
              <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a>View Statement</a></li>
               </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
              <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                <div class="fullscreen-button menu" title="Exit"> <i class="icon-logout" onclick="hidecont()"></i> </div>
                
              </div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
        
          
          

          <div class="vd_content-section clearfix">
            <div class="row" id="form-basic">
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>View My Statement</h3>
                  </div>
                  <div class="panel-body">

                      

                      <form class="form-horizontal" action="#" role="form">
                     

                       <div class="form-group">
                        <label style="float:left" class="col-sm-5">Start Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                          <input type="password" id="opass">
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="float:left" class="col-sm-5">End Date<span style="color:#f00">*</span></label>
                        <div class="col-sm-7 controls">
                         <input type="password" id="npass">
                        </div>
                      </div>


                     <div class="vd_checkbox checkbox-success">
                            <input type="checkbox" value="1" name="viewall"  id="checkbox-3">
                            <label for="checkbox-3"> View All? </label>
                             </div>

                            <div class="form-group form-actions">
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-9">
                              <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="enterstatement()"><i class="fa fa-save"></i> Submit</button>
                              <button class="btn vd_btn" type="button" onclick="hidecont()">Cancel</button>
                              <div id="message2" style="width:40px;height:40px;float:right"></div>
                            </div>
                          </div>';


                         echo "<script>  $( '.date' ).datepicker({ dateFormat: 'dd/mm/yy'});  </script>";

                  echo'  </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
              </div>
            


            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> ';

       echo "<script>  $( '#month' ).datepicker({ dateFormat: 'mm_yy'});  </script>";


    break;


}
?>