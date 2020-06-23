<?php include('db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
include('functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>

<?php
$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=stripslashes($row['CompanyName']);
$tel=stripslashes($row['Tel']);
$comadd=$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
$comprop=stripslashes($row['Property']);
$complot=stripslashes($row['Plot']);
$watermark=stripslashes($row['Watermark']);
$etrno=stripslashes($row['EtrNo']);
switch($id){
	case 1:
	$title='Q-Sms Letter of Offer';
	break;
  case 2:
  $title='Q-Sms Deposits Receipt';
  break;
  case 3:
  $title='Q-Sms Vacate Notice';
  break;
  case 4:
  $title='Q-Sms Requisition Note';
  break;
  case 5:
  $title='Q-Sms Invoices';
  break;
  case 6:
  $title='Q-Sms Receipts';
  break;

  case 7:
  $title='Q-Sms Water Invoices';
  break;

  case 8:
  $title='Q-Sms Electricity Invoices';
  break;

  case 9:
  $title='Q-Sms Trial Balance';
  break;

  case 10:
  $title='Q-Sms Income Statement';
  break;

  case 11:
  $title='Q-Sms Balance Sheet';
  break;

  case 12:
  $title='Q-Sms Invoices Reports';
  break;

  case 13:
  $title='Q-Sms Receipts Reports';
  break;

  case 14:
  $title='Q-Sms Summarized Invoices Reports';
  break;

  case 15:
  $title='Q-Sms Summarized Receipts Reports';
  break;

  case 16:
  $title='Q-Sms Invoices vs Receipts Reports';
  break;

  case 17:
  $title='Q-Sms Rent Projection Report';
  break;

  case 18:
  $title='Q-Sms Contacts Reports';
  break;

  case 19:
  $title='Q-Sms Deposits Reports';
  break;

  case 20:
  $title='Q-Sms Lease Reports';
  break;

  case 21:
  $title='Q-Sms Lease Reports';
  break;

  case 22:
  $title='Q-Sms Checkout Reports';
  break;

  case 23:
  $title='Q-Sms Documents Register Reports';
  break;

  case 24:
  $title='Q-Sms Show of Interests Reports';
  break;

  case 25:
  $title='Q-Sms Shop Applications Reports';
  break;

  case 26:
  $title='Q-Sms Letter of Offers Reports';
  break;

  case 27:
  $title='Q-Sms Pre-Tenants Reports';
  break;

  case 28:
  $title='Q-Sms Properties Reports';
  break;

  case 29:
  $title='Q-Sms Property Units Reports';
  break;

  case 30:
  $title='Q-Sms Requisition Reports';
  break;

  case 31:
  $title='Q-Sms Items List Reports';
  break;

  case 32:
  $title='Q-Sms Chart of Accounts';
  break;

  case 33:
  $title='Q-Sms Suppliers List';
  break;

  case 34:
  $title='Q-Sms System Users List';
  break;

  case 35:
  $title='Q-Sms User Access Report';
  break;

  case 36:
  $title='Q-Sms Ledger Reports';
  break;

  case 37:
  $title='Q-Sms Tenant Statement';
  break;

  case 38:
  $title='Q-Sms Landlord Statement';
  break;

  case 39:
  $title='Q-Sms Supplier Statement';
  break;

  case 40:
  $title='Q-Sms Activity Log Report';
  break;

  case 41:
  $title='Q-Sms Custom Reports';
  break;

  case 42:
  $title='Q-Sms Water Invoices Reports';
  break;

  case 43:
  $title='Q-Sms Electricity Invoices Reports';
  break;

  case 44:
  $title='Q-Sms Utility Payments Reports';
  break;

  case 45:
  $title='Q-Sms Utility Reconciliations Reports';
  break;
  case 46:
  $title='Q-Sms Purchases Note';
  break;

  case 47:
  $title='Q-Sms Supplier Ageing Analysis';
  break;

  case 48:
  $title='Q-Sms Supplier Invoices Report';
  break;

  case 49:
  $title='Q-Sms Summarized Supplier Invoices Report';
  break;

  case 50:
  $title='Q-Sms Output VAT Reports';
  break;

  case 51:
  $title='Q-Sms Unit Activity Log Report';
  break;

   case 52:
  $title='Q-Sms Tenants Ageing Analysis';
  break;

  case 53:
  $title='Q-Sms Input VAT Reports';
  break;

  case 54:
  $title='Q-Sms Rent Escalations Reports';
  break;

  case 55:
  $title='Q-Sms Messages Reports';
  break;



  
  
	

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<link id="favicon" href="img/fav.png" rel="icon" type="image/png"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/fonts.css"  rel="stylesheet" type="text/css">
<link href="css/theme.min.css" rel="stylesheet" type="text/css">
 <link rel="shortcut icon" href="img/home.png">
<script src="custom/custom.js"></script>
<script src="js/excellentexport.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<style>
@media print {
    footer {page-break-after: always;}
}
.head{
   
}

.maindiv {
    position: relative;
    width:100%;
    padding:1%;margin:5px;
}


.lofdiv {
    position: relative;
    width:100%;
    height: 100%;
    z-index: 99999;
    /*background: url('img/watermarks/point2.png') center center no-repeat;*/
    pointer-events: none;
    padding:1%;margin:5px;
}

</style>
</head>

<body style="background:#fff">
<?php 
switch($id){


case 1:
$lof=$_GET['rcptno'];
$resultx =mysql_query("select * from lof where id='".$lof."' limit 0,1");
$rowx=mysql_fetch_array($resultx);


echo'               <div class="panel-body" style="width:740px"><form class="form-horizontal" action="#" role="form">
                    <div style="clear:both; margin-bottom:10px"></div>
                     <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                     <div style="clear:both; margin-bottom:120px;width:100%"></div>
                      <p style="text-align:center;font-size:18px">
                      <b>'.$comprop.'</b><br/><br/>
                      LAND REFERENCE NO. '.$complot.'.<br/><br/>
                     <b><u>LETTER OF OFFER</b></u><br/><br/>
                      <b><u>SUBJECT TO LEASE</b></u></p>
                     <div style="clear:both; margin-bottom:30px"></div>
                     <p style="text-align:left;margin-left:10%">
                      '.$comname.' hereby offers to the tenant below to lease the Premises described below subject to the following terms and conditions:-</p>
                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>1.&nbsp;&nbsp;&nbsp;Landlord:</b></p>
                      </div>
                      <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      '.$comname.'<br/>
                      P.O Box '.$comadd.'<br/>
                      '.$comloc.'.<br/>
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>2.&nbsp;&nbsp;&nbsp;Tenant:</b></p>
                      </div>
                      <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">'.stripslashes($rowx['bname']).'
                     <br/>
                     '.stripslashes($rowx['address']).'
                     </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>3.&nbsp;&nbsp;&nbsp;Premises:</b></p>
                      </div>
                      <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">Unit Number '.stripslashes($rowx['roomno']).' located on the '.stripslashes($rowx['location']).' as more particularly shown in the plan annexed hereto.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>4.&nbsp;&nbsp;&nbsp;Lease Term:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">The Premises will be leased to the Tenant for a term of '.stripslashes($rowx['leaseterm']).'
                      from the commencement date set out below.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;Commencement:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">The lease will commence on <b>'.stripslashes($rowx['commencedate']).'</b> (the    "Lease Commencement Date").</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>6.&nbsp;&nbsp;&nbsp;Rent:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">The initial rent payable during the first year of the term of the lease will be
                       KShs. <b>'.number_format(stripslashes($rowx['rent'])).'</b>  per month inclusive of VAT.
                      <br/>
                      Rent will be payable monthly in advance, by the '.stripslashes($rowx['payabledate']).' day of the month upon receipt of the invoice.
                      <br/>
                      The Rent for the first month will be payable on or before the Lease Commencement Date  <b>'.stripslashes($rowx['commencedate']).'.</b>
                      <br/>
                      Any rent waived during the Fit Out Period (defined below) will be credited to the 2nd month’s rent.

                      </p>
                      </div>
                      </div>

                      </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>


                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;Rent Escalations:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">The  rent  will  escalate  by  '.stripslashes($rowx['escalation']).'%
                       after  every  '.stripslashes($rowx['escalation_type']).' year(s) from  the  Term Commencement  Date, irrespective of any waiver of Rent during the Fit Out Period.  The rent will escalate as follows:-.<br/> <br/><b>'.stripslashes($rowx['escalation_breakdown']).'</b>
                       </p>
                     </div>
                      </div>
                     
                      
                     
                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>8.&nbsp;&nbsp;&nbsp;Service Charge:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                     '.stripslashes($rowx['servicecharge']).'
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
                       KShs.'.number_format(stripslashes($rowx['utildep'])).'
                      </p>
                      </div>
                      </div>

                     

                      </div><footer class="footer"></footer>

                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                      <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px;"/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>9.&nbsp;&nbsp;&nbsp;Deposit & Guarantee:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">Deposit payable is equivalent to <b>'.stripslashes($rowx['depmonths']).'</b> months rent totalling to Kenya shillings. '.number_format(stripslashes($rowx['depamount'])).'<br/>
                       <b>'.stripslashes($rowx['otherdepositinfo']).'</b><br/>
                       Once the lease is signed, the deposit will be retained by the Landlord as security for the due performance by the Tenant of the Tenant`s obligations under the lease. The deposit is refundable without interest to the Tenant after the expiry of the lease and delivery up of the Premises in accordance with the covenants contained in the lease.
                      <br/>The  deposit  will  not  be  utilized  by the  Tenant  on  account  of  the payment of rent for the last month (or longer period) of the term of lease. 
                      <br/>The directors and shareholders of the Tenant shall provide personal guarantees for the obligations of the Tenant under the Lease and the License. Such guarantee will be incorporated in the Lease
                       </p>
                      </div>
                      </div>


                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>10.&nbsp;&nbsp;&nbsp;User:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant shall use the Premises as '.stripslashes($rowx['unitusage']).'. The Tenant will not use or permit or suffer the Premises or part thereof to be used for any illegal or immoral purposes.
                      <br/>The Landlord shall have an absolute and uncontrolled discretion whether or not to permit similar shops or trades in the Shopping mall and to locate the same upon the demised premises as it so wishes.

                      </p>
                      </div>
                      </div>

                      
                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left"></div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant shall comply with all laws acts orders rule and regulations by laws enhanced passed made or issued by the Government of the Republic of Kenya or any Municipal Township local or other authority in relation to the occupation or conduct of the Premises AND obtain all such licenses consents certificates or approvals and execute or cause to be done or executed all such works and things as under or by virtue of any law act order rule regulations as bye-law as aforesaid or under any notice order or directions given or made pursuit thereto for the time being in force are or shall be directed or necessary to be obtained done executed in 
                      </p>
                      </div>
                      </div>

                      </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>
                       <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left"></div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      respect of or upon the Premises of any part thereof whether by owner or occupier in consequence of the user of the Premises for the purpose hereby authorized and at all times to keep the Landlord indemnified against all claims and liability including every fine penalty costs incurred paid or suffered by the Landlord in respect thereof and not to do or permit of suffer any act which shall amount to a breach or non-observance of any negative of restrictive covenant or special condition contained in any title document of The Point property and the building thereon is held by the Landlord as to which they are otherwise subject.
                        </p>
                      </div>
                      </div>


                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>11.&nbsp;&nbsp;&nbsp;Sub-Letting:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">Subletting, assignments and transferring of the premises will only be allowed unless by the written consent of the Landlord.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>12.&nbsp;&nbsp;&nbsp;Renovations & Partitioning:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Landlord`s prior written consent will be required before the Tenant erects any partitions, fixtures or fittings in the Premises.

                      <br/>Any alterations to the power supply will require verification by the Landlord`s appointed electrical engineers at the cost of the Tenant.

                      <br/>The Tenant shall complete the ceilings; internal lighting of the Premises in accordance with such specifications as the Landlord may prescribe.

                      <br/>The  Tenant  will  comply  with  all  store  fit  out,  renovations  and alterations criteria and guidelines issued by the Landlord.

                      <br/>The  Tenant  shall  not  commence  any  such  fitting-out  work  in  the Premises unless and until the following conditions have been met:-

                      <br/>(i) Final Plans shall have been approved;

                      <br/>(ii)  the Tenant shall have obtained all relevant permits and/or approvals from the appropriate local and governmental authorities for the Tenant`s fitting out works on the Premises and shall have furnished the Landlord with copies of all such permits and/or approvals;
                      </p>
                      </div>
                      </div>

                       </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left"></div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">

                    (iii) The Tenant shall have procured all Insurances required under the provisions of the Tenancy (herein referred to) and shall have furnished   the   Landlord   with   certificates   of   such Insurances; and The Landlord shall have consented in writing to the commencement of the Tenant`s fitting out works.

                      <br/>The fitting out work shall not interfere and/or create a nuisance or disturbance with the use, occupancy, or enjoyment of The Point by the Landlord, other Tenants or shoppers or at all.

                      <br/><b>Work Hours:</b>   Any fitting out work is to be done during the specific working hours of 8:00 a.m. to 7:00 p.m. unless otherwise agreed in writing by the Landlord.

                      <br/>Any damage to the building or part thereof and fixtures and fittings thereon forming The Point, external or internal, (i.e. including but not limited to sidewalks, storefront, doors, slab, studs, drywall, ceiling, ductwork, electrical work, plumbing, plumbing fixtures, painting, etc) caused by the Tenant and/or the Tenant`s contractor or agents shall be repaired by the Landlord`s contractor at the Tenant`s expense and shall be payable forthwith by the Tenant.

                      <br/>All the Tenant`s signage shall be at Tenant`s own expense and shall be of a size and quality of design and construction to conform to the Landlord`s  sign criteria for  The Point as  stipulated in  the provisions  of  the  said  Fit  Out  Criteria  and  shall  be  subject  to  the approval of the Landlords Project Architect and all relevant local and governmental bodies

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>13.&nbsp;&nbsp;&nbsp;Possession:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      This will be on the Lease Commencement  Date subject to the Tenant having signed the lease before the Lease Commencement  Date, having made all requisite  payments and having received  Landlord`s approval on submitted fit out plans.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>14.&nbsp;&nbsp;&nbsp;Utilities:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant will pay to the Landlord (if separate meters for utilities are installed at the Premises), or suppliers of utilities used exclusively in the Premises and indemnify the Landlord against all charges for such utilities consumed exclusively at or in relation to the Premises.</p>
                      </div>
                      </div>

                      </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>15.&nbsp;&nbsp;&nbsp;VAT & Other Taxes:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      In addition to the above rental and other charges and costs, the Tenant will be liable to pay on demand by the Landlord all Value Added Taxes leviable from time to time or other taxes leviable from time to time in law in respect of any amounts payable by the Tenant.</p>
                      </div>
                      </div>

                      
                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>16.&nbsp;&nbsp;&nbsp;Fit Out Period:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant will be allowed a <b>'.stripslashes($rowx['fitout']).'</b> Month (s)
                      Fit Out Period commencing on the Lease Commencement Date (the "Fit  Out Period") and  will be expected to open the Premises for business at the expiry of such period.
                      <br/>If the Tenant fails to open the Premises for business during this period, it will have to pay rent and all other charges for this period.
                      <br/>During  the  Fit  Out  Period,  the  Tenant  shall  indemnify  and  hold harmless the Landlord for any loss, damage or injury suffered or incurred by the Landlord or third parties as a result of the actions or omissions of the Tenant or its contractors, employees or agents actions in carrying out the fit out works.

                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>17.&nbsp;&nbsp;&nbsp;Opening Hours:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant shall keep the Premises open for business at its convenient working hours and depending on the nature of the business. 
                      <br/>The Tenant will comply with such rules and conditions for extended opening as the Landlord may prescribe from time to time, including, without limitation, payment of additional service charge to cater for security and other costs for the extended opening hours.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>18.&nbsp;&nbsp;&nbsp;Security:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      While the Landlord will provide day and night security services to the compound and every reasonable care will be taken to ensure that such services are properly carried out, no warranty is given by the Landlord in respect thereof.
                      <br/>The   Landlord,   its   agents   and   employees   are   under   no   liability whatsoever to the Tenant, the Tenant`s guests and employees against injury, damage or loss caused by burglary, theft or otherwise on the Landlord`s property.
                      </p>
                      </div>
                      </div>

                       </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>19.&nbsp;&nbsp;&nbsp;Repair &  Decoration:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The  Tenant  shall  be  responsible  for  repairs  to  the  interior  of  the Premises,  including,  without  limitation,  all  partitions,  floors,  walls, ceilings, shop windows and internal fixtures and fittings.
                      <br/>On  termination  of  the  lease  or  earlier  determination  for  whatsoever reason, the Tenant  will be required  to redecorate  the Premises  in the terms that will be contained in the in the lease for the Premises. During the term of the lease, the Tenant will be required to keep the Premises and fixtures and fittings thereon and therein in good repair, order and condition.
                      </p>
                      </div>
                      </div>

                     
                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>20.&nbsp;&nbsp;&nbsp;Breach of Covenants:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      If the rent or any part thereof shall at any time remain unpaid for thirty (30) days after becoming payable, whether formally demanded or not, or if at any time thereafter the Tenant is in breach of any of the covenants or conditions referred to in the lease, it will be lawful for the Landlord to re-enter the Premises and thereupon the lease will cease but without prejudice to any rights and remedies which may have accrued to the Landlord against the Tenant in respect of any breach of covenant.   In the event that the Landlord allows the Tenant any extra time to pay any outstanding rent or other charges, interest at the rate of the higher of (i) 10% over the base lending rate of the Prime Bank Limited from time to  time  or  25%  per  annum  will  be  paid  by  the  Tenant  on  any outstanding   amounts   from  the  time   such   amounts   were   due   for payment, until payment in full.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>21.&nbsp;&nbsp;&nbsp;Permission To Enter:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant  shall allow the Landlord (or its agents and employees)  to enter the Premises (upon reasonable prior notice unless in the case of an emergency, in which case no notice will be required) for the purpose of ascertaining that the covenants and conditions of these Letter of Offer and  the  Lease  have  been  complied  with  and  to  carry  out  all  work required to comply with any notice given by the Landlord to the Tenant specifying  any maintenance,  cleaning or decoration  which the Tenant has failed to execute in breach of the Heads of Terms</p>
                      </div>
                      </div>

                       </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>22.&nbsp;&nbsp;&nbsp;Indemnity:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The  Tenant  shall  indemnify  and  hold  harmless  the Landlord  for any loss, damage  or  injury  suffered  or  incurred  by the Landlord  or third parties as a result of the actions or omissions of the Tenant or its contractors, employees or agents actions in relation to the Premises.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>23.&nbsp;&nbsp;&nbsp;Insurance:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Tenant shall take out its own insurance against all risks in relation to its equipment, furniture, fittings, stock and contents at the Premises, as well as any third party liability in relation to the Premises.
                      </p>
                      </div>
                      </div>

                     

                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>24.&nbsp;&nbsp;&nbsp;Lease:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Landlord will provide the Tenant with a lease for the Premises (the "lease"), which will be prepared by the Landlord`s  Advocates,'.stripslashes($rowx['lawyer']).'  and provided to the Tenant  within 30 days of the date of these Letter of Offer.  The Tenant will execute the lease within 14 days of the final engrossed lease being provided to it, failing which the Landlord may withdraw its offer to Grant the Lease to the Tenant.
                      <br/>Until  such  time  as  the  lease  has  been  executed  and  registered,  all covenants, conditions and the rent agreed, shall be deemed to have been incorporated in this document.
                      </p>
                      </div>
                      </div>

                  


                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>25.&nbsp;&nbsp;&nbsp;Legal Fees:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The  Tenant  will  be responsible  for  its own  advocate`s legal  fees  in relation to approval of the Lease and the legal fees of the Landlord`s Advocates  in respect of the preparation,  execution  and registration  of the lease, together with stamp duty, registration fees and other disbursements.   The legal fees will be the minimum chargeable under the Advocates Remuneration Order 2014.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>26.&nbsp;&nbsp;&nbsp;Confidentiality:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      This offer is made in confidence.  No terms shall be discussed with by third party save for the Tenant’s legal advisors who shall, in turn, be bound by this confidentiality clause.
                      </p>
                      </div>
                      </div>

                      </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>


                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>27.&nbsp;&nbsp;&nbsp;Contract:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      Until such time as the agreement for Lease has been executed and registered, all covenants, conditions and the rent agreed, shall be deemed to have been incorporated in this offer.</p>
                      </div>
                      </div>

                     

                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>28.&nbsp;&nbsp;&nbsp;Conditions & Acceptance:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">By accepting these Heads of Terms, both parties approve the conditions contained herein and agree to execute a formal lease of the premises based on the agreed terms.

                      <br/>The offer to grant the Lease is made subject to the Tenant providing to the Landlord the following:-

                     <br/> a)  A   certified   copy   of   the   Certificate   of   Incorporation   or Certificate of Registration  of Business Name, as the case may be, or other identification as may be required  by the Landlord Advocates;
                    
                    <br/>  b)  A copy  of the  Memorandum  or Articles  or  Association  (if a limited liability company);

                      <br/>c)  A copy of the PIN and VAT Registration Certificate of the Tenancy Holder;

                     <br/> d) A Certificate  of Confirmation  of directors  from the Company Secretary; and

                      <br/>e) Photocopies of the Directors Identity Cards/Passports (if applicable).
                    </p>
                     </div>
                      </div>
                     
                      

                    
                     </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>
                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">  </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                       

                     <br/> This letter of offer is sent to the Tenant in triplicate.   If its terms and conditions  are accepted,  please execute the enclosed copies and return them to us within the next seven (7) days from the date hereof together with your banker’s cheque in favour of <b>'.stripslashes($rowx['chequename']).'</b>, for the sum of Kenya Shillings '.number_format(stripslashes($rowx['chequeamount'])).' being the  Security  Deposit and one month’s rent payable  hereunder  failing  which  this  Offer  will  lapse  and  shall  be  automatically rescinded upon expiry of such period.
                     <br/> Prior to offering possession, the Tenant will be required to forward the payments as follows:-<br/>
                     '.stripslashes($rowx['payment_breakdown']).'
                       </p>
                      </div>
                      </div>

                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-6 controls" style="width:50%;float:left">
                      <p style="text-align:left">
                      Yours faithfully
                      <br/>'.$comname.'<br/><br/><br/><br/>


                      ..........................................<br/>
                      Director

                      </p>
                      </div>
                      </div>

                       </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                        <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-12 controls" style="width:90%;float:left">
                      <p style="">
                      <b style="text-align:center">TENANT’S ACCEPTANCE OF OFFER</b><br/>
                      I/We confirm that I/We have read and understood and accepted and agree to all the above terms and conditions.
                      <br/>
                      a)  Limited Companies
                      The duplicate Letter must be signed by two directors. You must return the duplicate Letter together with a certified photocopy of your Certificate of Incorporation (if a Kenyan Company) or a certified copy of your Certificate of Compliance (if a foreign company registered in Kenya).
                      </p>
                      </div>
                      <div class="cleaner_h10"></div>
                       <div class="col-sm-1 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-6 controls" style="border-right:1px dotted #ccc;width:45%;float:left">
                      <p style="text-align:left">SEALED with the common Seal of the Tenant<br/>
                      ........................................<br/><br/><br/>
                      In the presence of<br/><br/><br/>
                      Director<br/><br/>
                      Director/Secretary<br/><br/><br/>
                      Date<br/><br/><br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls" style="width:45%;float:left">
                      <p style="text-align:left"><br/><br/><br/><br/>
                      Company Seal
                      </p>
                      </div>
                      </div> 


                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-9 controls" style="width:90%;float:left">
                      <p style="text-align:left">I confirm that I was present and witnessed the signatures of .....................................................and  ..................................................... two of the Directors of  .....................................................</p>
                      </div>
                      <div class="cleaner_h10"></div>
                        <div class="col-sm-1 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-6 controls"  style="width:45%;float:left">
                      <p style="text-align:left">Name of Advocate<br/>
                      ............................................................<br/><br/>
                      Address<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls" style="width:45%;float:left">
                      <p style="text-align:left">Signature of Advocate<br/><br/>
                      ............................................................<br/>
                      </p>
                      </div>
                      </div> 

                       </div><footer class="footer"></footer>
                      <div class="head" style="width:100%;height:50px"></div>
                      <div class="lofdiv">
                     <img src="'.$logo.'" style="position:absolute;max-height:100px; left:60px; "/>
                      <div style="clear:both; margin-bottom:120px;width:100%"></div>

                      <div class="form-group">
                        <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-12 controls" style="width:90%;float:left">
                      <p style="">
                      <b style="text-align:center">LANDLORD’S ACCEPTANCE</b><br/>
                     </p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-3 controls" style="width:10%;float:left;float:left"></div>
                      <div class="col-sm-6 controls" style="border-right:1px dotted #ccc;width:45%;float:left">
                      <p style="text-align:left">SEALED with the common Seal of '.$comname.'<br/>
                      In the presence of<br/><br/><br/>
                      Director<br/><br/><br/>
                      Director/Secretary<br/><br/><br/>
                      Date<br/><br/><br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls" style="width:45%;float:left">
                      <p style="text-align:left"><br/><br/><br/><br/><br/><br/>
                      Company Seal
                      </p>
                      </div>
                      </div> 


                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-12 controls" style="width:90%;float:left">
                      <p style="text-align:left">I confirm that I was present and witnessed the signatures of .....................................................and  ..................................................... two of the Directors of  '.$comname.'</p>
                      </div>
                      <div class="cleaner_h10"></div>
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-6 controls"  style="width:45%;float:left">
                      <p style="text-align:left">Name of Advocate<br/>
                      ............................................................<br/><br/>
                      Address<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      ............................................................<br/>
                      </p>
                      </div>

                      <div class="col-sm-6 controls" style="width:45%;float:left">
                      <p style="text-align:left">Signature of Advocate<br/><br/>
                      ............................................................<br/>
                      </p>
                      </div>
                      </div> 

                      </div> 

                      


                      <div class="form-actions-condensed wizard"> </div>
                    </form>
                  </div>';
                  

break;

case 2:
$result =mysql_query("select * from receipt where rcptno='".$rcptno."'");
$row=mysql_fetch_array($result);
$amount=stripslashes($row['amount']);
$desc=stripslashes($row['description']);
$tid=stripslashes($row['tid']);
$tname=stripslashes($row['tname']);
$rno=stripslashes($row['rno']);
$cashier=stripslashes($row['username']);
$date=stripslashes($row['date']);
$actname=stripslashes($row['actname']);
$pmode=stripslashes($row['lname']);
$refno=stripslashes($row['refno']);
$time=date('h:i A');

$result =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
$row=mysql_fetch_array($result);
$bal=stripslashes($row['bal_deposit']);
?>

<div class="panel-body maindiv" style="text-transform:uppercase;border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:100px; margin:10px 5px 0 5px; position:absolute;"/>
<p style="text-align:center;font-size:20px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:12px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
</p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">DEPOSIT PAYMENT RECEIPT
<br/>RECEIPT NO: <?php  echo $rcptno ?></p>
<div id="barcode" style=""><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<div style="clear:both; margin-bottom:0px;margin-top:10px; "></div>



<p style="text-align:center;   font-weight:normal; margin:0px 0 0 0px"><b>Date:</b><?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<b>Time:</b><?php  echo $time; ?>&nbsp; &nbsp;&nbsp;&nbsp;</p>
<div style="clear:both; margin-bottom:5px; border-top:1.5px dashed #333"></div>

<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>NAME: </b><?php  echo $tname ?></p>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>Unit No: </b><?php  echo $rno ?></p>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>AMOUNT: </b><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>IN WORDS: </b><script>document.writeln(toWords(<?php echo $amount?>));</script>Kenya shillings only.</p>
<?php if($pmode!=''){ ?>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>Mode of Payment: </b><?php  echo $pmode ?></p>
<?php }  if($refno!=''){ ?>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>Ref No: </b><?php  echo $refno ?></p>
<?php } ?>
<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>Payment For: </b><?php  echo $actname ?></p>

<p style="text-align:left;   font-weight:normal; margin:5px 0 0 10px"><b>Balance: </b><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both"/>
<div style="clear:both; margin-bottom:10px;margin-top:10px;border-top:1.5px dashed #333"></div>
<p style="text-align:left;   font-weight:normal; margin:0px 0 0 10px; font-size:15px"><b>Signature:</b></p>
<div style="clear:both;margin-bottom:10px;margin-top:10px;border-top:1.5px dashed #333"/><br/>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Thank You for letting us serve you. | Transaction By <?php  echo $cashier ?></p>
</div>


<?php 
break;

case 3:

$stamp=date('Ymd');
$rcptno=$_GET['rcptno'];

$result =mysql_query("select * from vacate where id='".$rcptno."' limit 0,1");
$row=mysql_fetch_array($result);

?>
<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:14px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">NOTICE TO VACATE<br/><strong style="font-size:12px">Date:<?php  echo stripslashes($row['date']) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:5px; border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">
<b>Date:</b> <?php  echo stripslashes($row['date'])  ?><br/>
<b>Tenant's Name: </b> <?php  echo stripslashes($row['tname']) ?><br/>
<b>House Name: </b> <?php  echo stripslashes($row['hname']) ?><br/>
<b>Apartment No: </b> <?php  echo stripslashes($row['rno']) ?><br/>
<b>Vacate Reason: </b> <?php  echo stripslashes($row['details']) ?><br/>
<br/></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dotted #333"></div>
<div style="margin-left:10px;font-size:12px; font-weight:normal;margin:0 0 0 10px">

<b>Description: </b><br/>
This notice is to inform you that your tenancy will be terminated on <b><u><?php  echo stripslashes($row['vacatedate']) ?></u></b>.<br/>

You are required to vacate the premises and remove all your possessions from the premises by this date. <br/>

All keys to the premises are be to returned upon your move out.<br/>

All rent and bills for the premises will be payable until the termination date.
<br/><br/>
</div>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership in Business.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Printed By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 4:
$rcptno=$_GET['rcptno'];
$result =mysql_query("select * from requests where rcptno='".$rcptno."'");
$row=mysql_fetch_array($result);
$location=stripslashes($row['location']);

?>
<div class="panel-body maindiv" style="width:800px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">OFFICIAL REQUISITION NOTE<br/>Request No:<?php  echo $rcptno ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px;border-top:1px dashed #666" ></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px"><strong style="font-size:11px">Property:<?php  echo stripslashes($row['depname']) ?></strong><br/>Location:<?php  echo $location ?></strong></p>
<div style="clear:both; margin-bottom:10px;border-top:1px dashed #666" ></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
  <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:5%;">No</td>
      <td  style="width:25%;">Item</td>
      <td  style="width:40%;">Description</td>
      <td  style="width:10%;">Qty</td>
      <td  style="width:10%;">Price</td>
      <td  style="width:10%;">Total</td>
 </tr>
<?php
$result =mysql_query("select * from requests where rcptno='".$rcptno."'");
            $num_results = mysql_num_rows($result);
            $x=1;$qty=$total=0;
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $qty+=stripslashes($row['qty']);
              $total+=preg_replace('~,~', '', stripslashes($row['total']));

  if($i%2==0){  echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
   echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $x ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['itemname']) ?></td>
<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['notes']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['qty']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['price']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>


<?php 
$x++;
} ?>

 <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:5%;"></td>
      <td  style="width:25%;"></td>
      <td  style="width:40%;">Totals</td>
      <td  style="width:10%;"><?php  echo $qty ?></td>
      <td  style="width:10%;"></td>
      <td  style="width:10%;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
 </tr>


</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px; text-decoration:underline">REQUEST SUMMARY</p>
<?php
$result =mysql_query("select * from requesttrack where rcptno='".$rcptno."'");
            $num_results = mysql_num_rows($result);
              $x=1;
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
  echo"<p style=\"text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px; \">".$x.". ".stripslashes($row['log'])."</p>"; 
  $x++;         
              }
              
?>


<div style="clear:both; margin-bottom:20px"></div>
</div>
<?php 
break;


case 5:
$invno=$_GET['rcptno'];
//get z
$result =mysql_query("select * from receipts where invno='".$invno."'  order by serial desc limit 0,1");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$tid=stripslashes($row['tid']);
$month=stripslashes($row['month']);
$curbal=stripslashes($row['bal']);
$date=stripslashes($row['date']);
$amount=stripslashes($row['amount']);

if($amount>=0){$doctitle='INVOICE';}else{$doctitle='CREDIT NOTE';}

$result =mysql_query("select * from tenants where tid='".$tid."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['bname']);
$rno=stripslashes($row['roomno']);
//override bal
$curbal=stripslashes($row['bal']);

?>
<style>
body,p{
 font-weight:normal; text-transform:uppercase
}
</style>

<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style=" margin:0px 5px 0 5px; position:absolute; max-height:60px"/>
<p style="text-align:center;font-size:18px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:12px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <b style="text-transform:lowercase;font-weight:normal;"><?php  echo $web ?></b><br/>Email:<b style="text-transform:lowercase;font-weight:normal;"> <?php  echo $email ?></b></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:14px;">TENANT <?php  echo $doctitle ?></p>
<div id="barcode" style="font-size:12px; font-weight:normal; text-transform:uppercase"><?php  echo $invno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }

get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:14px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;Tenant Name: <?php  echo $bname ?>&nbsp; &nbsp;&nbsp;&nbsp;Unit No: <?php  echo $rno ?><br/><?php  echo $doctitle ?> No: <?php  echo $invno ?></p>
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both"/>
<div style="width:100%;">
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:50%;">Entry Name</td>
       <td  style="width:25%;">Month</td>
      <td  style="width:25%;">Amount</td>
    </tr>
<?php
$result =mysql_query("select * from invoices where invno='".$invno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$xx+=stripslashes($row['invamount']);  
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
    <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs(stripslashes($row['invamount']))/1.16 ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } 

$vat=($xx/1.16)*0.16;

?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
   <td style="width:50%;border-width:0px; border-color:#666; border-style:solid;"></td>
   <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;">VAT-16%</td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs($vat) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:20px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:11px">
<td style="width:55%;border-width:0px; border-color:#666; border-style:solid;"></td>
<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $doctitle ?> TOTAL</td>
<td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs($xx) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:11px">
<td style="width:55%;border-width:0px; border-color:#666; border-style:solid;"></td>
<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">OUTSTANDING BALANCE</td>
<td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></td>
</tr>

</tbody>
</table>

</div>

<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Thank You</p>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Transaction By <?php  echo getuser($user) ?>.</p>
<div style="clear:both; margin-bottom:20px"></div>
</div>

<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>

<?php 
break;



case 6:
$rcptno=$_GET['rcptno'];
//get z
$result =mysql_query("select * from receipts where rcptno='".$rcptno."'  order by serial desc limit 0,1");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$tid=stripslashes($row['tid']);
$month=stripslashes($row['month']);
$curbal=stripslashes($row['bal']);
$paid=stripslashes($row['amount']);
$date=stripslashes($row['date']);

$result =mysql_query("select * from tenants where tid='".$tid."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['bname']);
$rno=stripslashes($row['roomno']);
//override bal
$curbal=stripslashes($row['bal']);
?>
<style>
body,p{
 font-weight:normal; text-transform:uppercase
}
</style>

<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style=" margin:0px 5px 0 5px; position:absolute; max-height:60px"/>
<p style="text-align:center;font-size:18px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:12px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <b style="text-transform:lowercase;font-weight:normal;"><?php  echo $web ?></b><br/>Email:<b style="text-transform:lowercase;font-weight:normal;"> <?php  echo $email ?></b></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:14px;">TENANT PAYMENT RECEIPT</p>
<div id="barcode" style="font-size:12px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }

get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:14px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;Tenant Name: <?php  echo $bname ?>&nbsp; &nbsp;&nbsp;&nbsp;Unit No: <?php  echo $rno ?><br/>Receipt No: <?php  echo $rcptno ?></p>
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both"/>
<div style="width:100%;">
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:50%;">Entry Name</td>
      <td  style="width:25%;">Month</td>
      <td  style="width:25%;">Amount</td>
    </tr>
<?php
$result =mysql_query("select * from receipt where rcptno='".$rcptno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$xx+=stripslashes($row['amount']);  
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
    <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } ?>


</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:20px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:11px">
<td style="width:20%;border-width:0px; border-color:#666; border-style:solid;"></td>
<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">AMOUNT PAID</td>
<td style="width:60%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:11px">
<td style="width:20%;border-width:0px; border-color:#666; border-style:solid;"></td>
 <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">IN WORDS</td>
<td style="width:60%;border-width:0.5px; border-color:#666; border-style:solid;">KShs. <script>document.writeln(toWords(<?php echo $paid?>));</script> ONLY</td>
</tr>

<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:11px">
<td style="width:20%;border-width:0px; border-color:#666; border-style:solid;"></td>
<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">OUTSTANDING BALANCE</td>
<td style="width:60%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></td>
</tr>

</tbody>
</table>

</div>

<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Thank You</p>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Transaction By <?php  echo getuser($user) ?>.</p>
<div style="clear:both; margin-bottom:20px"></div>
</div>

<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>

<?php 
break;



case 7:
if($rcptno==''){
  exit;
}
$result =mysql_query("select * from waterinvoices where rcptno=".$rcptno."");
$row=mysql_fetch_array($result);
$hid=stripslashes($row['hid']);
$tid=stripslashes($row['tid']);
$date=stripslashes($row['date']);
$datetime=substr($date,6,4).''.substr($date,3,2).''.substr($date,0,2);

$resulta =mysql_query("select * from mainhouses where houseid='".$hid."'");
$rowa=mysql_fetch_array($resulta);
$housename=stripslashes($rowa['housename']);
$tel=stripslashes($rowa['mobile']);
$Add=stripslashes($rowa['postal']);
$plotno=stripslashes($rowa['plot']);

$resultb =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
$rowb=mysql_fetch_array($resultb);
$tenadd=stripslashes($rowb['address']);
$rno=stripslashes($rowb['roomno']);

  $resultx =mysql_query("select * from waterrates where id=1 limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $fixed=stripslashes($rowx['fixed']);
 $waterrate=stripslashes($rowx['water']);
 $sewerrate=stripslashes($rowx['sewer']);



$s = new DateTime($datetime);
$s->modify('+7days');
$duedate=$datedue=$s->format('d/m/Y');

?>

<div class="panel-body maindiv" style="width:740px;min-height:900px; border:1px solid #333">
<p style="text-align:center;font-size:22px; font-weight:bold;margin:50px 0 0 0px">WATER BILL</p>
<div style="clear:both;"></div>
<div style="width:40%;float:left;margin-left:10px">
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 0px;"/>
<div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $housename ?><br/>P.O BOX <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/><strong>Plot No: </strong><?php  echo $plotno ?></p>
</div>

<div style="width:40%;float:right;margin-right:10px">
<div style="clear:both"></div>
<div style="width:100%;border-bottom:1px solid #333;margin-top:20px"><p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px;">Contract No:<span style="float:right"><?php  echo $rcptno ?></span></p></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px">
<?php  echo stripslashes($row['tname']) ?><br/>P.O BOX <?php  echo $tenadd ?><br/>Supply Location:<div style="border:1px solid #333"><?php  echo $rno ?></div></p>
</div>


<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>


<div style="float:left;width:100%">
<div style="width:30%; height:20px; float:left; overflow:hidden;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;border-right:1.5px solid #333;margin:0 0 0 0px">Bill No.</p>
</div>
<div style="width:30%; height:20px;float:left; overflow:hidden;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;border-right:1.5px solid #333;margin:0 0 0 0px">Date of Issue</p>
</div>
<div style="height:20px;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;margin:0 0 0 0px">Date Due</p>
</div>

<div style="clear:both;"></div>

<div style="background:#fff;width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333;">
<p style="text-align:center;font-size:12px; font-weight:normal;margin:0px 10px 0 0px"><strong><?php  echo $rcptno.'-'.stripslashes($row['mon'])  ?></strong>
</p>
</div>
<div style="background:#fff;width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><strong><?php  echo $date ?></strong></p>
</div>
<div style="background:#fff; height:20px;border-right:0px solid #333;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><strong><?php  echo $datedue ?></strong></p>
</div></div>

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:left;font-size:12px; font-weight:normal;margin:0 0 0 0px">Consumption Period : <strong><?php  echo stripslashes($row['mon'])  ?></strong></p>

<div style="min-height:100px;border-left:1.5px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<div style="float:left; border-top:1.5px solid #333;border-right:1px solid #333;width:100%;border-bottom:0px solid #333;border-left:0">
<div style="background:#66b2FF;width:60%; height:20px; float:left;border-bottom:0px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">CONSUMPTION DATA</p>
</div>
<div style="background:#66b2FF; height:20px;border-right:0px solid #333;border-left:1.5px solid #333;border-bottom:0px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">BILLING CONCEPTS</p>
</div>
<div style="clear:both;"></div>
<div style="float:left; border-top:1.5px solid #333;border-LEFT:0px solid #333; border-right:0px solid #333;width:100%;border-bottom:0px solid #333;">
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Meter Number</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Previous Reading</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Current Reading</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Consumption</p>
</div>
<div style="background:#99CCFF;width:30%; height:20px;border-right:0px solid #333; border-left:1.5px solid #333;float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Billing Concept</p>
</div>
<div style="background:#99CCFF; height:20px;border-right:0px solid #333;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Amount</p>
</div>
</div>


<div style="clear:both;"></div>

<div style="background:#fff;width:15%; height:20px;border-left:0;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333;font-weight:normal;">
<p style="text-align:center;font-size:11px; font-weight:normal;margin:0px 10px 0 0px"><?php  echo stripslashes($row['meterno']) ?>
</p>
</div>
<div style="background:#fff;width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="text-align:center;font-size:11px; font-weight:normal;margin:0px 10px 0 0px"><?php  echo stripslashes($row['wp']) ?>
</p>
</div>
<div style="background:#fff;width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo stripslashes($row['wc']) ?></p>
</div>
<div style="background:#fff;width:15%;height:20px; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo round(stripslashes($row['wd']),3) ?></p>
</div>
<div style="background:#fff;width:30%; float:left; overflow:hidden;border-left:1.5px solid #333;border-bottom:1.5px solid #333;">
<p style="padding-top:0px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 5px">
Fixed Charge<br/>
Sewer<br/>
Water Consumption<br/>
</p>
</div>

<div style="background:#fff;border-right:0px solid #333; border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:right;font-size:11px; font-weight:normal;margin:0 5px 0 0px">
<script>document.writeln(( <?php  echo  stripslashes($row['fixed'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['sewer'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['water'])?>).formatMoney(2, '.', ','));</script><br/>
</div>
</div>

<div style="clear:both;"></div>


<div style="background:#fff;width:60%;border-right:1.5px solid #333; height:20px;border-bottom:0; float:left;border-left:0">&nbsp;</div>
<div style="background:#fff;width:30%; float:left; overflow:hidden;height:20px;">
<p style="padding-top:0px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 5px">
Total Amount
</p>
</div>

<div style="background:#fff;height:20px;border-right:1.5px solid #333; border-left:1.5px solid #333;">
<p style="padding-top:0px;text-align:right;font-size:11px; font-weight:normal;margin:0 5px 0 0px">
<script>document.writeln(( <?php  echo  stripslashes($row['total'])?>).formatMoney(2, '.', ','));</script></p>
</div>


</div>

<div style="clear:both; margin-bottom:10px;border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">THE NET ACCOUNT BALANCE AS ON <strong><?php  echo $date ?></strong> IS <strong><script>document.writeln(( <?php  echo  stripslashes($row['total'])?>).formatMoney(2, '.', ','));</script></strong></p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">PLEASE PAY THIS AMOUNT ON OR BEFORE <strong><?php  echo $duedate ?></strong> TO AVOID DISCONNECTION </p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">THIS WATER BILL IS PAYABLE BEFORE <strong><?php  echo $duedate ?></strong> </p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">NOTICE IS HEREBY GIVEN THAT IF THIS BILL IS NOT PAID WITHIN SEVEN (7) DAYS FROM <strong><?php  echo $duedate ?></strong> ; YOUR SUPPLY SHALL BE LIABLE TO DISCONNECTION WITHOUT ANY FURTHER NOTICE TO YOU.</p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">NOTE:ALL PAYMENTS TO BE DONE TO <strong><?php  echo $comname ?></strong> </p>
</div>

<!--script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script-->

<?php
break;


case 8:
if($rcptno==''){
  exit;
}
$result =mysql_query("select * from elecinvoices where rcptno=".$rcptno."");
$row=mysql_fetch_array($result);
$hid=stripslashes($row['hid']);
$tid=stripslashes($row['tid']);
$date=stripslashes($row['date']);
$datetime=substr($date,6,4).''.substr($date,3,2).''.substr($date,0,2);
$resulta =mysql_query("select * from mainhouses where houseid='".$hid."'");
$rowa=mysql_fetch_array($resulta);
$housename=stripslashes($rowa['housename']);
$tel=stripslashes($rowa['mobile']);
$Add=stripslashes($rowa['postal']);
$plotno=stripslashes($rowa['plot']);

$resultb =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
$rowb=mysql_fetch_array($resultb);
$tenadd=stripslashes($rowb['address']);
$rno=stripslashes($rowb['roomno']);

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



$s = new DateTime($datetime);
$s->modify('+7days');
$duedate=$datedue=$s->format('d/m/Y');

?>

<div class="panel-body maindiv" style="width:740px;min-height:900px; border:1px solid #333">
<p style="text-align:center;font-size:22px; font-weight:bold;margin:50px 0 0 0px">ELECTRICITY BILL</p>
<div style="clear:both;"></div>
<div style="width:40%;float:left;margin-left:10px">
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 0px;"/>
<div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $housename ?><br/>P.O BOX <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/><strong>Plot No: </strong><?php  echo $plotno ?></p>
</div>

<div style="width:40%;float:right;margin-right:10px">
<div style="clear:both"></div>
<div style="width:100%;border-bottom:1px solid #333;margin-top:20px"><p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px;">Contract No:<span style="float:right"><?php  echo $rcptno ?></span></p></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 0px">
<?php  echo stripslashes($row['tname']) ?><br/>P.O BOX <?php  echo $tenadd ?><br/>Supply Location:<div style="border:1px solid #333"><?php  echo $rno ?></div></p>
</div>


<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>


<div style="float:left;width:100%">
<div style="width:25%; height:20px; float:left; overflow:hidden;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;border-right:1.5px solid #333;margin:0 0 0 0px">Bill No.</p>
</div>
<div style="width:25%; height:20px;float:left; overflow:hidden;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;border-right:1.5px solid #333;margin:0 0 0 0px">Max. Authorized Load (KW)</p>
</div>
<div style="width:25%; height:20px;float:left; overflow:hidden;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;border-right:1.5px solid #333;margin:0 0 0 0px">Date of Issue</p>
</div>
<div style="height:20px;">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:normal;margin:0 0 0 0px">Date Due</p>
</div>

<div style="clear:both;"></div>

<div style="background:#fff;width:25%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333;">
<p style="text-align:center;font-size:12px; font-weight:normal;margin:0px 10px 0 0px"><strong><?php  echo $rcptno.'-'.$date ?></strong>
</p>
</div>
<div style="background:#fff;width:25%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><strong>7</strong></p>
</div>
<div style="background:#fff;width:25%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><strong><?php  echo $date ?></strong></p>
</div>
<div style="background:#fff; height:20px;border-right:0px solid #333;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><strong><?php  echo $datedue ?></strong></p>
</div></div>

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:left;font-size:12px; font-weight:normal;margin:0 0 0 0px">Consumption Period : <strong><?php  echo stripslashes($row['mon'])  ?></strong></p>

<div style="min-height:200px;border-left:1.5px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<div style="float:left; border-top:1.5px solid #333;border-right:1px solid #333;width:100%;border-bottom:0px solid #333;">
<div style="background:#66b2FF;width:60%; height:20px; float:left;border-bottom:0px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">CONSUMPTION DATA</p>
</div>
<div style="background:#66b2FF; height:20px;border-right:0px solid #333;border-left:1.5px solid #333;border-bottom:0px solid #333">
<p style="padding-top:0px;text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">BILLING CONCEPTS</p>
</div>
<div style="clear:both;"></div>
<div style="float:left; border-top:1.5px solid #333;border-LEFT:0px solid #333; border-right:0px solid #333;width:100%;border-bottom:0px solid #333;">
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Meter Number</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Previous Reading</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px;border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Current Reading</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px; float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Consumption</p>
</div>
<div style="background:#99CCFF;width:30%; height:20px;border-right:0px solid #333; border-left:1.5px solid #333;float:left;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Billing Concept</p>
</div>
<div style="background:#99CCFF; height:20px;border-right:0px solid #333;border-bottom:1px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Amount</p>
</div>
</div>


<div style="clear:both;"></div>

<div style="background:#fff;width:15%; height:20px;border-left:0;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333;font-weight:normal;">
<p style="text-align:center;font-size:11px; font-weight:normal;margin:0px 10px 0 0px"><?php  echo stripslashes($row['meterno']) ?>
</p>
</div>
<div style="background:#fff;width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="text-align:center;font-size:11px; font-weight:normal;margin:0px 10px 0 0px"><?php  echo stripslashes($row['ep']) ?>
</p>
</div>
<div style="background:#fff;width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo stripslashes($row['ec']) ?></p>
</div>
<div style="background:#fff;width:15%;height:20px; float:left; overflow:hidden;border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo round(stripslashes($row['ed']),3) ?></p>
</div>
<div style="background:#fff;width:30%; float:left; overflow:hidden;border-left:1.5px solid #333;border-bottom:1.5px solid #333;">
<p style="padding-top:0px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 5px">
Fixed Charge<br/>
Consumption<br/>
Fuel Cost Charge <?php  echo $fuel*100 ?> cents/Kwh<br/>
Forex Adj <?php  echo $forex*100 ?> cents/Kwh<br/>
Inflation <?php  echo $inflation*100 ?> cents/Kwh<br/>
WARMA Levy <?php  echo $arma*100 ?> cents/Kwh<br/>
ERC Levy <?php  echo $erc*100 ?> cents/Kwh<br/>
REP Levy <?php  echo $rep*100 ?> cents/Kwh<br/>
VAT<br/>
</p>
</div>

<div style="background:#fff;border-right:0px solid #333; border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:right;font-size:11px; font-weight:normal;margin:0 5px 0 0px">
<script>document.writeln(( <?php  echo  stripslashes($row['fixed'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['consumption'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['fuel'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['forex'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['inflation'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['arma'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['erc'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['rep'])?>).formatMoney(2, '.', ','));</script><br/>
<script>document.writeln(( <?php  echo  stripslashes($row['vat'])?>).formatMoney(2, '.', ','));</script><br/>
</p>
</div>
</div>

<div style="clear:both;"></div>


<div style="background:#fff;width:60%;border-right:1.5px solid #333; height:20px;border-bottom:0; float:left;">&nbsp;</div>
<div style="background:#fff;width:30%; float:left; overflow:hidden;height:20px;">
<p style="padding-top:0px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 5px">
Total Amount
</p>
</div>

<div style="background:#fff;height:20px;border-right:1.5px solid #333; border-left:1.5px solid #333;">
<p style="padding-top:0px;text-align:right;font-size:11px; font-weight:normal;margin:0 5px 0 0px">
<script>document.writeln(( <?php  echo  stripslashes($row['total'])?>).formatMoney(2, '.', ','));</script></p>
</div>


</div>

<div style="clear:both; margin-bottom:10px;border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">THE NET ACCOUNT BALANCE AS ON <strong><?php  echo $date ?></strong> IS <strong><script>document.writeln(( <?php  echo  stripslashes($row['total'])?>).formatMoney(2, '.', ','));</script></strong></p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">PLEASE PAY THIS AMOUNT ON OR BEFORE <strong><?php  echo $duedate ?></strong> TO AVOID DISCONNECTION </p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">THIS ELECTRICITY BILL IS PAYABLE BEFORE <strong><?php  echo $duedate ?></strong> </p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">NOTICE IS HEREBY GIVEN THAT IF THIS BILL IS NOT PAID WITHIN SEVEN (7) DAYS FROM <strong><?php  echo $duedate ?></strong> ; YOUR SUPPLY SHALL BE LIABLE TO DISCONNECTION WITHOUT ANY FURTHER NOTICE TO YOU.</p>
<p style="text-align:left;font-size:9px; font-weight:normal;margin:0 0 0 0px">NOTE:ALL PAYMENTS TO BE DONE TO <strong><?php  echo $comname ?></strong> </p>
</div>

<!--script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script-->

<?php
break;


case 9:
$result =mysql_query("select * from ledgers limit 0,1");
$row=mysql_fetch_array($result);
$date=stripslashes($row['date']);
$sent='';
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);$sent.='&d1='.preg_replace('~/~', '', $d1);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);$sent.='&d2='.preg_replace('~/~', '', $d2);
}else $d2=0;


?>



<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL TRIAL BALANCE REPORT</p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><strong style="font-size:11px">As at: <?php  echo  dateprint($d2) ?></strong></p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>
<a download="trial_balance.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0; font-size:11px" >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:50%">Ledger</td>
      <td  style="width:25%">Dr</td>
      <td  style="width:25%">Cr</td>
      </tr> 



<?php
$arr=array(array());
$result =mysql_query("select * from ledgers order by name");
$num_results = mysql_num_rows($result); 
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name'])); stripslashes($row['type']);
}
$pos=array(array());
$max=count($arr);
for ($i = 1; $i < $max; $i++){
  $a=0;$b=0;$c=0;$d=0;
  $resulta =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<=".$d2."  order by stamp desc,transid desc limit 0,1");
  $num_resultsa = mysql_num_rows($resulta); 
  $rowa=mysql_fetch_array($resulta);
  $a=stripslashes($rowa['bal']);
  //if($arr[$i][0]==657){echo $a;}
  
  if($d1!=0){
  $resultb =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<='".$d1."' order by stamp desc,transid desc limit 0,1");
  $num_resultsb = mysql_num_rows($resultb); 
  $rowb=mysql_fetch_array($resultb);
  $b=stripslashes($rowb['bal']);
  }else $b=0;
  //if($arr[$i][0]==657){echo stripslashes($rowb['transid']);}

  
  $c=$a-$b;
  $pos[]=array($arr[$i][0],$arr[$i][1],$c,$arr[$i][3]); 
  
  
}



$max=count($pos);
$a=0;$b=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Expense'||$type=='Asset'){
$a+=$bal;
}
if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
$b+=$bal;
}




    if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer  "   onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    <?php if($type=='Expense'||$type=='Asset'){?><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script><?php }?>
    </td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    <?php if($type=='Liability'||$type=='Revenue'||$type=='Equity'){?><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script><?php }?>
    </td>
       </tr>
      <?php } ?>

  <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:50%">Totals</td>
      <td  style="width:25%"><script>document.writeln((<?php  echo  $a ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:25%"><script>document.writeln((<?php  echo  $b ?>).formatMoney(2, '.', ','));</script></td>
      </tr> 

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 10:
$result =mysql_query("select * from ledgers limit 0,1");
$row=mysql_fetch_array($result);
$date=stripslashes($row['date']);
$sent='';
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);$sent.='&d1='.preg_replace('~/~', '', $d1);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);$sent.='&d2='.preg_replace('~/~', '', $d2);
}else $d2=0;
?>
<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL INCOME STATEMENT</p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><strong style="font-size:11px">As at: <?php  echo  dateprint($d2) ?></strong></p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>
<a download="income_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:50%">Ledger</td>
      <td  style="width:25%">Dr</td>
      <td  style="width:25%">Cr</td>
      </tr> 



<?php
$arr=array(array());
$result =mysql_query("select * from ledgers  order by name");
$num_results = mysql_num_rows($result); 
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name'])); stripslashes($row['type']);
}
$pos=array(array());
$max=count($arr);
for ($i = 1; $i < $max; $i++){
  $a=0;$b=0;$c=0;$d=0;
  $resulta =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<=".$d2."  order by stamp desc,transid desc limit 0,1");
  $num_resultsa = mysql_num_rows($resulta); 
  $rowa=mysql_fetch_array($resulta);
  $a=stripslashes($rowa['bal']);
  
  if($d1!=0){
  $resultb =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<'".$d1."' order by stamp desc,transid desc limit 0,1");
  $num_resultsb = mysql_num_rows($resultb); 
  $rowb=mysql_fetch_array($resultb);
  $b=stripslashes($rowb['bal']);
  }else $b=0;
  
  $c=$a-$b;
  $pos[]=array($arr[$i][0],$arr[$i][1],$c,$arr[$i][3]); 
  
  
}

$max=count($pos);
$a=0;$c=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Revenue'){
$a+=$bal;



if($c%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer  " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    </td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    <script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script>
    </td>
       </tr>
      
<?php
  $c++;
  } 
  }

$c=0;$b=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Expense'){
$b+=$bal;

if($c%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    <script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script>
    </td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
    </td>
       </tr>
      
<?php
  $c++;
  } 
  }

?>

  <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:50%">Net Income</td>
      <td  style="width:25%"><script>document.writeln((<?php  echo  $a-$b ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:25%"></td>
      </tr> 

 </tbody>     
</table>  

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 11:
$result =mysql_query("select * from ledgers limit 0,1");
$row=mysql_fetch_array($result);
$date=stripslashes($row['date']);
$sent='';
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);$sent.='&d1='.preg_replace('~/~', '', $d1);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);$sent.='&d2='.preg_replace('~/~', '', $d2);
}else $d2=0;
?>
<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL BALANCE SHEET</p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><strong style="font-size:11px">As at: <?php  echo dateprint($d2) ?></strong></p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>
<a download="balance_sheet.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>




<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Asset Name</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">Kshs.</td>
   </tr>
<?php
$arr=array(array());
$result =mysql_query("select * from ledgers where ledgerid!=601 order by name");
$num_results = mysql_num_rows($result); 
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name'])); stripslashes($row['type']);
}
$pos=array(array());
$max=count($arr);
for ($i = 1; $i < $max; $i++){
  $a=0;$b=0;$c=0;$d=0;
  $resulta =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<=".$d2."  order by stamp desc,transid desc limit 0,1");
  $num_resultsa = mysql_num_rows($resulta); 
  $rowa=mysql_fetch_array($resulta);
  $a=stripslashes($rowa['bal']);
  
  if($d1!=0){
  $resultb =mysql_query("select * from ledgerentries where lid='".$arr[$i][0]."' and stamp<'".$d1."' order by stamp desc,transid desc limit 0,1");
  $num_resultsb = mysql_num_rows($resultb); 
  $rowb=mysql_fetch_array($resultb);
  $b=stripslashes($rowb['bal']);
  }else $b=0;
  
  $c=$a-$b;
  $pos[]=array($arr[$i][0],$arr[$i][1],$c,$arr[$i][3]); 
  
  
}

$max=count($pos);

$e=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Expense'){
$e+=$bal;
}
}
$f=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Revenue'){
$f+=$bal;
}
}
$g=$f-$e;

$a=0;$u=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Asset'){
$a+=$bal;


if($u%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}
?>

      <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
       </tr>
      
<?php
  $u++;
  } 
}

?>
<tr style="width:100%; height:20px;padding:0; font-weight:bold;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Total Assets</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo  $a ?>).formatMoney(2, '.', ','));</script></td>
   </tr>

  <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Liability Name</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">Kshs.</td>
   </tr>
<?php
$b=0;$v=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Liability'){
$b+=$bal;
if($v%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}
?>

      <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
       </tr>
      
<?php
  $v++;
  } 
}
?>
  <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Equity Name</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">Kshs.</td>
   </tr>
<?php
$c=0;$x=0;
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];
if($type=='Equity'){
$c+=$bal;
if($x%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}

    if($lid==55){$bal=$g;}
?>

      <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  $name ?></td>
      <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
       </tr>
      
<?php
  $x++;
  } 
}
?>

<tr style="width:100%; height:20px;padding:0; font-weight:bold;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Total Liabilities & Equity</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $b+$c-$d+$g  ?>).formatMoney(2, '.', ','));</script></td>
   </tr>
   </tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 12:

function invoiceloop($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;

$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='invoice_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">TENANT INVOICES REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:25%;">Tenant Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:20%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
    </tr>


<?php


switch($code){

  
  case 0:
  $result =mysql_query("select * from invoices where stamp='".date('Ymd')."' order by id asc");

  break;

  case 1:
  
  if($d1==0){
  $result =mysql_query("select * from invoices");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
  break;
  
  case 2:
  
  if($d1==0){
  $result =mysql_query("select * from invoices  where hid='".$name."'");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and  hid='".$name."'");
  }
  break;

  case 3:
  
  if($d1==0){
  $result =mysql_query("select * from invoices  where  mon='".$name."'");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and  mon='".$name."'");
  }
  break;

  case 4:
  
  if($d1==0){
  $result =mysql_query("select * from invoices  where actid='".$name."'");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and actid='".$name."'");
  }
  break;

  
  
}

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $aa+=1;
  }
  
  invoiceloop($row,$i,$status,$aa);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 13:

function receiptloop($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;

$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='receipt_reports';


$dept=array(array());
$result =mysql_query("select * from ledgers where subcat='Bank' order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from ledgers where subcat='Bank' order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['ledgerid']);
$dept[$i][2]=randomfour();
}

$max=count($dept);
for ($x= 0; $x < $max; $x++){
  $dept[$x][2]==0;
  }
$arr1=array();$arr2=array();$arr3=array();



?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">TENANT RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0; font-size:11px" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:25%;">Tenant Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:20%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
    </tr>


<?php


switch($code){

  
  case 0:
  $result =mysql_query("select * from receipt where stamp='".date('Ymd')."' order by id asc");

  break;

  case 1:
  
  if($d1==0){
  $result =mysql_query("select * from receipt");
  }
  else{
  $result =mysql_query("select * from receipt  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
  break;
  
  case 2:
  
  if($d1==0){
  $result =mysql_query("select * from receipt  where hid='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipt  where stamp>='".$d1."' and stamp<='".$d2."' and  hid='".$name."'");
  }
  break;

  case 3:
  
  if($d1==0){
  $result =mysql_query("select * from receipt  where  mon='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipt  where stamp>='".$d1."' and stamp<='".$d2."' and  mon='".$name."'");
  }
  break;

  case 4:
  
  if($d1==0){
  $result =mysql_query("select * from receipt  where actid='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipt  where stamp>='".$d1."' and stamp<='".$d2."' and actid='".$name."'");
  }
  break;

  
  
}

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $tot=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);

  $max=count($dept);
  for ($x= 0; $x < $max; $x++){
    if($dept[$x][0]==stripslashes($row['lid'])){
      $dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $dept[$x][3]=$dept[$x][2];
    }
  }
  $tot+=preg_replace('~,~', '', stripslashes($row['amount'])); 
  $aa+=1;
  receiptloop($row,$i,$status,$aa);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Payments Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
    if($dept[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$dept[$x][1].": <script>document.writeln((".$dept[$x][3].").formatMoney(2, '.', ','));</script></p>";
    }
  }
    
?>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 14:

function loopsuminv($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['month']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='invoice_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUMMARIZED TENANT INVOICES REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:15%;">Unit</td>
        <td  style="width:15%;">Inv No</td>
        <td  style="width:11%;">Month</td>
        <td  style="width:15%;">Amount</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from receipts  where  drcr='dr'");
  }
  else{
  $result =mysql_query("select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."' and drcr='dr'");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['amount']));
  }
  loopsuminv($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 15:

function loopsumrec($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['month']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='summarized_receipt_reports';

$dept=array(array());
$result =mysql_query("select * from ledgers where subcat='Bank' order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from ledgers where subcat='Bank' order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['ledgerid']);
$dept[$i][2]=randomfour();
}

$max=count($dept);
for ($x= 0; $x < $max; $x++){
  $dept[$x][2]==0;
  }
$arr1=array();$arr2=array();$arr3=array();

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUMMARIZED TENANT RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:15%;">Unit</td>
        <td  style="width:15%;">Receipt No</td>
        <td  style="width:11%;">Month</td>
        <td  style="width:15%;">Amount</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from receipts  where  drcr='cr'");
  }
  else{
  $result =mysql_query("select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."' and drcr='cr'");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
   $max=count($dept);
  for ($x= 0; $x < $max; $x++){
    if($dept[$x][0]==stripslashes($row['paymode'])){
      $dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $dept[$x][3]=$dept[$x][2];
    }
  }
  $a+=preg_replace('~,~', '', stripslashes($row['amount']));
  loopsumrec($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Payments Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
    if($dept[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$dept[$x][1].": <script>document.writeln((".$dept[$x][3].").formatMoney(2, '.', ','));</script></p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 16:

function invvsrec($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['paid']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invbal']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;

$code=0;
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='invoice_vs_receipts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">TENANT INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:20%;">Tenant Name</td>
        <td  style="width:5%;">Unit No</td>
        <td  style="width:5%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:15%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Paid</td>
        <td  style="width:10%;">Balance</td>
    </tr>


<?php
  $x='';
  if($name!='All'){$x=' and actid='.$name;}
  
  if($d1==0){
  if($name!='All'){$x=' where actid='.$name;}
  $result =mysql_query("select * from invoices ".$x."");
  }
  else{
   if($name!='All'){$x=' and actid='.$name;}
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' ".$x."");
  }
  

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  }
  
  invvsrec($row,$i,$status,$aa);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 17:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['code'])){
$code=$_GET['code'];
}else $code=0;

if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
$fname='rent_projection_report';

?>
<div class="panel-body maindiv" style="width:740px;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:85px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">RENT PROJECTION REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:30%;">Month</td>
        <td  style="width:30%;">Amount</td>
        <td  style="width:30%;">Cumulative</td>
        </tr>


<?php


//considerations-escalations,contract expiries,quartely payments
  $ten=array();
  $result =mysql_query("select * from tenants where status=1");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $ten[stripslashes($row['tid'])]=stripslashes($row['contract_expiry_stamp']).'#'.stripslashes($row['billing_type']).'#'.stripslashes($row['invoice_expiry_stamp']);
  }

 
  
  $mon=array();
  $start=substr($d1,3,4).substr($d1,0,2).'01';
  $end=substr($d2,3,4).substr($d2,0,2).'01';



  while($start<=$end){

      $mon[$start]=0;
      foreach ($ten as $key => $val) {
      $valarr=explode('#',($val));
      $contract_expiry_stamp=$valarr[0];
      $billing_type=$valarr[1];
      $invoice_expiry_stamp=$valarr[2];


      $result =mysql_query("select * from escalations where tid='".$key."' and start<='".$start."' and end>='".$start."' and ".$start."<='".$contract_expiry_stamp."' limit 0,1");
      $row=mysql_fetch_array($result);
      $amount=stripslashes($row['amount']);

     
          if($billing_type=='Monthly'&&$start>=$invoice_expiry_stamp){
            $amount=$amount;
            $expiry_stamp=addmonths($invoice_expiry_stamp,1);
            $ten[$key]=$contract_expiry_stamp.'#'.$billing_type.'#'.$expiry_stamp;
          }

          else if($billing_type=='Quartely'&&$start>=$invoice_expiry_stamp){
            $amount=$amount*3;
            $expiry_stamp=addmonths($invoice_expiry_stamp,3);
            $ten[$key]=$contract_expiry_stamp.'#'.$billing_type.'#'.$expiry_stamp;
          }

          
           else if($billing_type=='Yearly'&&$start>=$invoice_expiry_stamp){
            $amount=$amount*12;
            $expiry_stamp=addmonths($invoice_expiry_stamp,12);
            $ten[$key]=$contract_expiry_stamp.'#'.$billing_type.'#'.$expiry_stamp;
          }
          else{
            $amount=0;
          }

          //include vat
          $amount=$amount/1.16;
          
           $mon[$start]+=$amount;
      
      }

    
      $start=addmonths($start,1);


  }



$i=1;$tot=0;
foreach ($mon as $key => $val) {
if($i%2==0){$col='#f0f0f0';}else{$col='#fff';}
$tot+=$val;
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';?>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $i ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo substr($key,4,2).'_'.substr($key,0,4) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php
$i++;
 } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 18:

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];


  if($name=='All'){$title='All Contacts';}
  else if($name!='All'){$title=$name.' Contacts';}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='contacts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">CONTACTS LIST REPORT [<?php  echo $title ?>]
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:20%;">Contact Name</td>
        <td  style="width:20%;">Business Name</td>
        <td  style="width:10%;">Category</td>
        <td  style="width:10%;">Phone</td>
        <td  style="width:20%;">Remarks</td>
        <td  style="width:10%;">Date Created</td>
    </tr>


<?php

    if($d1==0){
    if($name=='All'){$x='';}else {$x='Where category='.$name;}
    $result =mysql_query("select * from contacts ".$x."");
    }
    else{
      if($name=='All'){$x='';}else {$x=' and status='.$name;}
      $result =mysql_query("select * from contacts  where stamp>='".$d1."' and stamp<='".$d2."' ".$x."");
    }


 
  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=mysql_fetch_array($result);


  $aa=$i+1;
    $sent='';
    if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
    echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
    ?>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['name']) ?></td>
    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['category']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['remarks']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  </tr>

<?php } 

?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 19:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='deposits_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DEPOSIT PAYMENTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:10%;">Unit</td>
        <td  style="width:15%;">Deposit Payable</td>
        <td  style="width:15%;">Deposit Paid</td>
        <td  style="width:15%;">Balance</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from tenants  where  status=1");
  }
  else{
  $result =mysql_query("select * from tenants  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
  }
 

  $a=0;$b=0;$c=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result);
  $a+=preg_replace('~,~', '', stripslashes($row['total_deposit']));
  $b+=preg_replace('~,~', '', stripslashes($row['paid_deposit']));
  $c+=preg_replace('~,~', '', stripslashes($row['bal_deposit']));
  
 
  $aa=$i+1;

  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
   <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['total_deposit']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['paid_deposit']) ?>).formatMoney(2, '.', ','));</script></td>
 <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['bal_deposit']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Payable: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Paid: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Balance: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 20:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='lease_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">LEASE UPLOAD REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Creation Date</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:10%;">Unit</td>
        <td  style="width:10%;">Lease No</td>
        <td  style="width:10%;">Upload Date</td>
        <td  style="width:10%;">Uploaded By</td>
        <td  style="width:15%;">Upload Details</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from tenants  where  status=1");
  }
  else{
  $result =mysql_query("select * from tenants  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  if(stripslashes($rowa['lease_status'])==1){
    $b++;
  }

  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['leaseno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate(stripslashes($rowa['lease_upload_stamp'])) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser(stripslashes($rowa['lease_upload_by'])) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['lease_details']) ?></td>
 </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Records: <?php  echo $a ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Uploaded: <?php  echo $b ?></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 21:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='handover_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">TENANT UNIT HANDOVER REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Creation Date</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:10%;">Unit</td>
       <td  style="width:10%;">Handover Date</td>
        <td  style="width:10%;">Handover By</td>
        <td  style="width:25%;">Handover Details</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from tenants  where  status=1");
  }
  else{
  $result =mysql_query("select * from tenants  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
  }
 

  $a=0;$b=0;$c=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  if(stripslashes($rowa['handover_status'])==1){
    $b++;
  }

  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
 <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate(stripslashes($rowa['handover_stamp'])) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser(stripslashes($rowa['handover_by'])) ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['handover_details']) ?></td>
 </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Records: <?php  echo $a ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Handed Over: <?php  echo $b ?></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 22:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='checkout_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">TENANT CHECKOUT REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:8%;">Tenant Name</td>
        <td  style="width:8%;">Unit</td>
        <td  style="width:8%;">Checkout Date</td>
        <td  style="width:8%;">Checkout By</td>
        <td  style="width:8%;">Notice Date</td>
        <td  style="width:8%;">Vacate Date</td>
        <td  style="width:8%;">Checkout Details</td>
        <td  style="width:8%;">Unit Deds.</td>
        <td  style="width:8%;">Notice Deds.</td>
        <td  style="width:8%;">Other Deds.</td>
        <td  style="width:8%;">Total Deds.</td>
        <td  style="width:8%;">Deposit Paid</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from tenants  where  status=0");
  }
  else{
  $result =mysql_query("select * from tenants  where checkout_stamp>='".$d1."' and checkout_stamp<='".$d2."' and status=0");
  }
 

  $a=0;$b=0;$c=0;$d=$e=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $a+=stripslashes($rowa['unit_deductions']);
 $b+=stripslashes($rowa['notice_deductions']);
  $c+=stripslashes($rowa['other_deductions']);
 $d+=stripslashes($rowa['total_deductions_on_checkout']);
  $e+=stripslashes($rowa['deposit_paid']);
  

  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['checkout_date']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser(stripslashes($rowa['checkout_by'])) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['checkout_notice_date']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['vacate_date']) ?></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['checkout_details']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['unit_deductions']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['notice_deductions']) ?>).formatMoney(2, '.', ','));</script></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['other_deductions']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['total_deductions_on_checkout']) ?>).formatMoney(2, '.', ','));</script></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['deposit_paid']) ?>).formatMoney(2, '.', ','));</script></td>

 </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Unit Condition Deductions: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Notice Date Deductions: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Other Deductions: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Deductions: <script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Deposit Paid after Deductions: <script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 23:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='documents_register_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DOCUMENTS REGISTER REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:20%;">Documents</td>
        <td  style="width:10%;">Sender Name</td>
        <td  style="width:10%;">Brought By</td>
        <td  style="width:10%;">Received By</td>
        <td  style="width:10%;">Receive Date</td>
         <td  style="width:10%;">Receive Time</td>
        <td  style="width:15%;">Remarks</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from docsregistry");
  }
  else{
  $result =mysql_query("select * from docsregistry  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['docname']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['sendername']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['broughtby']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['receivedby']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['receivedate']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['receivetime']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['remarks']) ?></td>
 </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 24:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='prospects_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PROSPECTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:20%;">Business Name</td>
        <td  style="width:20%;">Contact Name</td>
        <td  style="width:10%;">Contact Phone</td>
        <td  style="width:25%;">Remarks</td>
        <td  style="width:10%;">Status</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from interests");
  }
  else{
  $result =mysql_query("select * from interests  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $stat=stripslashes($rowa['status']);
  if($stat==1){$status='Pending';$colour='#ff3';} if($stat==0){$status='Cancelled';$colour='#f85d2c';} if($stat==2){$status='Advanced';$colour='#1fae66';}
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
   <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['name']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['remarks']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 25:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='shop_applications_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SHOP APPLICATIONS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:20%;">Business Name</td>
        <td  style="width:10%;">Business Nature</td>
        <td  style="width:8%;">Phone</td>
        <td  style="width:8%;">Email</td>
        <td  style="width:8%;">Contact Name</td>
        <td  style="width:8%;">Contact Phone</td>
        <td  style="width:15%;">Remarks</td>
        <td  style="width:8%;">Status</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from shopapps");
  }
  else{
  $result =mysql_query("select * from shopapps  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $stat=stripslashes($rowa['status']);
  if($stat==1){$status='Pending';$colour='#ff3';} if($stat==0){$status='Cancelled';$colour='#f85d2c';} if($stat==2){$status='Advanced';$colour='#1fae66';}
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['nature']) ?></td>
   <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['email']) ?></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['dname1']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['dphone1']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['odetail']) ?></td>
   <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 26:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='Letter_of Offers_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">LETTER OF OFFERS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:20%;">Business Name</td>
        <td  style="width:10%;">Unit</td>
        <td  style="width:8%;">Lease Term</td>
        <td  style="width:8%;">Commence Date</td>
        <td  style="width:8%;">End Date</td>
        <td  style="width:8%;">Rent</td>
        <td  style="width:8%;">1st Rent Date</td>
        <td  style="width:8%;">Amount Payable</td>
        <td  style="width:8%;">Status</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from lof");
  }
  else{
  $result =mysql_query("select * from lof  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $stat=stripslashes($rowa['status']);
  if($stat==1){$status='Pending';$colour='#ff3';} if($stat==0){$status='Cancelled';$colour='#f85d2c';} if($stat==2){$status='Advanced';$colour='#1fae66';}
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
   <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['leaseterm']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['commencedate']) ?></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['enddate']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['rent']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['firstmonthrentdate']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['chequeamount']) ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 27:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='Pre_Tenants_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PRE-TENANTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:20%;">Business Name</td>
        <td  style="width:10%;">Unit</td>
        <td  style="width:8%;">Lease Term</td>
        <td  style="width:8%;">Commence Date</td>
        <td  style="width:8%;">End Date</td>
        <td  style="width:12%;">Rent</td>
        <td  style="width:12%;">1st Rent Date</td>
        <td  style="width:8%;">Amount Payable</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from lof where status=1");
  }
  else{
  $result =mysql_query("select * from lof  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
  }
 

  $a=0;$b=0;$c=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $stat=stripslashes($rowa['status']);
  if($stat==1){$status='Pending';$colour='#ff3';} if($stat==0){$status='Cancelled';$colour='#f85d2c';} if($stat==2){$status='Advanced';$colour='#1fae66';}
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
   <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['leaseterm']) ?></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['commencedate']) ?></td>
 <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['enddate']) ?></td>
  <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['rent']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['firstmonthrentdate']) ?></td>
  <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['chequeamount']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 28:


$date=date('Y/m/d');
$fname='properties_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PROPERTIES REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:25%;">Property Name</td>
        <td  style="width:15%;">Property Type</td>
        <td  style="width:10%;">Plot No</td>
        <td  style="width:15%;">Location</td>
        <td  style="width:10%;">No. Of Rooms</td>
        <td  style="width:10%;">Address</td>
        <td  style="width:10%;">Phone</td>
        </tr>


<?php


  $result =mysql_query("select * from mainhouses");
  $a=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $a+=stripslashes($rowa['bal']);
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housename']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housetype']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['plot']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['location']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['noofrooms']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['postal']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mobile']) ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 29:

if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$date=date('Y/m/d');
$fname='units_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PROPERTY UNITS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:25%;">Property Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Unit Type</td>
        <td  style="width:15%;">Tenant</td>
        <td  style="width:15%;">Location</td>
        <td  style="width:10%;">Floor Space</td>
        <td  style="width:10%;">Rent</td>
        </tr>


<?php
  
  switch($code){
  case 0:
   $result =mysql_query("select * from houses");
  break;

  case 1:
  $result =mysql_query("select * from houses where houseid='".$name."'");
  break;

  case 2:
  $result =mysql_query("select * from houses where status=0");
  break;

  case 3:
  $result =mysql_query("select * from houses where status=1");
  break;



  }
  $a=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $a+=stripslashes($rowa['rent']);
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housename']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomtype']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tenant']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['location']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['floorspace']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['rent']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Rent: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 30:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$fname='requisitions_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">REQUISITONS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:10%;">Requisition No</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:10%;">Location</td>
        <td  style="width:10%;">Remarks</td>
        <td  style="width:15%;">Items</td>
        <td  style="width:10%;">Total</td>
        <td  style="width:10%;">Vat</td>
        <td  style="width:10%;">Status</td>
        </tr>


<?php

  switch($code){
  case 1:
   if($d1==0){
  $result =mysql_query("select * from requests");
  }
  else{
  $result =mysql_query("select * from requests  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
  break;

  case 2:
   if($d1==0){
  $result =mysql_query("select * from requests  where depid='".$name."'");
  }
  else{
  $result =mysql_query("select * from requests  where stamp>='".$d1."' and stamp<='".$d2."' and  depid='".$name."'");
  }
  break;

  case 3:
  if($d1==0){
  $result =mysql_query("select * from requests  where status='".$name."'");
  }
  else{
  $result =mysql_query("select * from requests  where stamp>='".$d1."' and stamp<='".$d2."' and  status='".$name."'");
  }
  break;

  }

 
 

  $arr=array();
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']);
  }

  $aa=$a=0;$b=0;
  foreach ($arr as $key => $val) {
  $aa=$aa+1;
  $items='';$tot=$vat=0;
  $result =mysql_query("select * from requests  where rcptno='".$key."'");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $items.=stripslashes($rowa['itemname']).';';
  $tot+=stripslashes($rowa['total']);
  $vat+=stripslashes($rowa['vat']);
  }

  $a+=$tot;
  $b+=$vat;
  $stat=stripslashes($rowa['status']);
  if($stat==5){$status='Paid';$colour='#1fae66';}
  if($stat==4){$status='Payment Approved';$colour='#F85D2C';}
  if($stat==3){$status='Payment Rejected';$colour='#f00';}
  if($stat==2){$status='Approved';$colour='#67B8CB';}
  if($stat==1){$status='New';$colour='#F89C2C';}
  if($stat==0){$status='Rejected';$colour='#f00';}




  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['depname']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['location']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['notes']) ?></td>
 <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $items ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $vat ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">VAT Total: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 31:


$date=date('Y/m/d');
$fname='items_list_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">ITEMS LIST REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Code</td>
        <td  style="width:30%;">Name</td>
        <td  style="width:15%;">Price</td>
        <td  style="width:20%;">Category</td>
        <td  style="width:20%;">Account</td>
       </tr>


<?php


  $result =mysql_query("select * from items");
  $a=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['ItemCode']) ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['ItemName']) ?></td>
   <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['Price']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['DepName']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['Lname']) ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 32:
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL CHART OF ACCOUNTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:5%">No.</td>
      <td  style="width:20%">Account Name</td>
      <td  style="width:10%">Code</td>
      <td  style="width:25%">Financial Statement</td>
      <td  style="width:15%">Category</td>
      <td  style="width:15%">Sub-Category</td>
      <td  style="width:10%">Normally</td>
  </tr> 


<?php
$a=1;
$result =mysql_query("select * from ledgers order by code asc");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$type=stripslashes($row['type']);
if($type=='Asset'||$type=='Expense'){$normal='Debit';}else{$normal='Credit';}
if($type=='Asset'){$statement='Trial Balance,Balance Sheet';}
if($type=='Expense'){$statement='Trial Balance,Income Statement';}
if($type=='Liability'){$statement='Trial Balance,Balance Sheet';}
if($type=='Revenue'){$statement='Trial Balance,Income Statement';}
if($type=='Equity'){$statement='Trial Balance,Balance Sheet';}

if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['name']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['code']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $statement ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['type']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['subcat']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $normal ?></td>
      
      
      
      
     
    </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 33:
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">SUPPLIERS LIST<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:5%">No.</td>
      <td  style="width:20%">Supplier Name</td>
      <td  style="width:10%">Location</td>
      <td  style="width:20%">Contact Person</td>
      <td  style="width:10%">Telephone</td>
      <td  style="width:25%">Notes</td>
      <td  style="width:10%">Balance</td>
  </tr> 


<?php
$a=1;$tot=0;
$result =mysql_query("select * from suppliers order by supname asc");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$tot+=stripslashes($row['bal']);
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['supname']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['location']) ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['contactperson']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['contacttel']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['notes']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['bal']) ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
     
    </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Balance: <script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 34:
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL SYSTEM USERS LIST<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a download="system_users.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-size:11px;font-weight:bold; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:40px">No.</td>
      <td  style="width:150px">Username</td>
      <td  style="width:150px">Position</td>
      <td  style="width:300px">Full Names</td>
      <td  style="width:120px">Department</td>

       
        
         

    </tr> 


<?php
$a=1;
$result =mysql_query("select * from users order by dept");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);

if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:40px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:150px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['name']) ?></td>
      <td style="width:150px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['position']) ?></td>
      <td style="width:300px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['fullname']) ?></td>
      <td style="width:120px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['dept']) ?></td>
      
    </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 35:

$arr=array();
$result =mysql_query("select * from positions");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[stripslashes($row['name'])]=stripslashes($row['name']);
}

$width=round(80/count($arr));
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">SYSTEM USER ACCESS RIGHTS REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a download="access_table.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-size:11px;font-weight:bold; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:5%">Code</td>
      <td  style="width:15%">Description</td>
      <?php
       foreach ($arr as $key => $val) {
        echo '<td  style="width:'.$width.'%">'.$val.'</td>';
       }

      ?>
</tr> 


<?php
$a=1;
$result =mysql_query("select * from accesstbl order by AccessCode");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);

if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['AccessCode']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Descrip']) ?></td>
      <?php
       foreach ($arr as $key => $val) {
        echo '<td  style="border-width:0.5px; border-color:#666; border-style:solid;width:'.$width.'%">'.stripslashes($row[$val]).'</td>';
       }

      ?>
    </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 36:

$date=date('Y/m/d');
$stamp=date('Ymd');
$value=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$resultx =mysql_query("select * from ledgers where ledgerid='".$value."'");
$rowx=mysql_fetch_array($resultx);;;
$bal=stripslashes($rowx['bal']);
$name=stripslashes($rowx['name']);
$type=stripslashes($rowx['type']);
$fname=$name.'_ledger_report';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">OFFICIAL LEDGER REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong><br/><?php  echo $name ?>-Bal:<script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:7%;">Entry No</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:48%;">Description</td>
        <td  style="width:10%;">Debit</td>
        <td  style="width:10%;">Credit</td>
        <td  style="width:15%;">Bal</td>
         </tr>




<?php

//brought forward
  
  $cc=0;
  if($d1==0){
  $result =mysql_query("select * from ledgerentries where lid=".$value."  order by stamp asc,transid asc limit 0,1");
  $row=mysql_fetch_array($result);
  $cc=0;
  }
  else{
  $result =mysql_query("select * from ledgerentries  where stamp<'".$d1."' and lid=".$value." order by stamp desc,transid desc limit 0,1");
  $row=mysql_fetch_array($result);
   $cc=stripslashes($row['bal']);
  }

 


  

  echo'
    <tr title="Preview Journal" style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ;background:#ccc">';?>
  <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
  <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
     <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;">BALANCE BROUGHT FORWARD</td>
     <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
      <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script> </td>
     </tr>

<?php
  $a=$d=$c=0;
  if($d1==0){
  $result =mysql_query("select * from ledgerentries where lid=".$value."  order by stamp asc ,transid asc");
  }
  else{
  $result =mysql_query("select * from ledgerentries  where stamp>='".$d1."' and stamp<='".$d2."' and lid=".$value." order by stamp asc ,transid asc");
  }
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $balance=stripslashes($row['bal']);
  if(stripslashes($row['type'])=='Credit'){
  $c+=preg_replace('~,~', '', stripslashes($row['amount']));
  }
  if(stripslashes($row['type'])=='Debit'){
  $d+=preg_replace('~,~', '', stripslashes($row['amount']));
  }
  //calculate balances
  $sign='';
  if($type=='Asset'||$type=='Expense'){
    if(stripslashes($row['type'])=='Debit'){
      $cc+=preg_replace('~,~', '', stripslashes($row['amount'])); 
    }else{
      $cc-=preg_replace('~,~', '', stripslashes($row['amount'])); 
      $sign='(-)';
    }
  }

  if($type=='Revenue'||$type=='Equity'||$type=='Liability'){

    if(stripslashes($row['type'])=='Debit'){
      $sign='(-)';
      $cc-=preg_replace('~,~', '', stripslashes($row['amount'])); 
    }else{
      $cc+=preg_replace('~,~', '', stripslashes($row['amount'])); 
    }
  }


  $col='none';
  if(stripslashes($row['amount'])<0){$col='#f00';}

  if($i%2==0){
      echo'
    <tr title="Preview Journal" style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer " onClick="seejournal('.stripslashes($row['rcptno']).')">';
    }else{
      echo'<tr  title="Preview Journal" style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer  " onClick="seejournal('.stripslashes($row['rcptno']).')">';}

  if (stripslashes($row['type'])=='Debit') {?>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  dateprint(stripslashes($row['date'])) ?></td>
     <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']).'- ['.stripslashes($row['refno']).']' ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"><!--?php  echo $sign ?--><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
      <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script> </td>
     </tr>
  <?php 
  } else {
    ?>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  dateprint(stripslashes($row['date'])) ?></td>
     <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']).'- ['.stripslashes($row['refno']).']' ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"><!--?php  echo $sign ?--><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
      <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script> </td>
     </tr>
  <?php 
  }
  
  ?>

      


<?php } ?>

</tbody>
</table>
  

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Debits: <script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Credits: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Difference: <script>document.writeln(( <?php  echo $d-$c ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px" id="seejournal"></div>
<script type="text/javascript" src="js/jquery.js"></script> 
<style type="text/css">
#mon{width:300px; min-height:170px;position:fixed;left:40%; top:40%;background:#fff; border-radius:0px;z-index:1000;}
}
</style>
</div>
<?php 

break;


case 37:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;


?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<a download="tenant_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php
$result =mysql_query("select * from tenants where kpano='".$username."'");
$rowx=mysql_fetch_array($result);
$curbal=stripslashes($rowx['bal']);
$name=stripslashes($rowx['tid']);
?>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Name: <?php  echo stripslashes($rowx['bname']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPA No: <?php  echo stripslashes($rowx['kpano']) ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">Date</td>
      <td  style="width:35%">Description</td>
      <td  style="width:15%">Debits</td>
      <td  style="width:15%">Credits</td>
      <td  style="width:15%">Balance</td>
  </tr> 


<?php
$a=$b=0;
if($d1==0){
$result =mysql_query("select * from receipts where tid='".$name."'");
}else{
  $result =mysql_query("select * from receipts where tid='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
}
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rcptno='';$inv='';$rec='';
$row=mysql_fetch_array($result);
if(stripslashes($row['drcr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['amount']));$inv=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['invno']).'. ';
}else{
 $b+=preg_replace('~,~', '', stripslashes($row['amount']));$rec=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['rcptno']).'. ';
}
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date']) ?></td>
      <td style="width:35%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $desc.stripslashes($row['description']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $inv ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $rec ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['bal']) ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
     
    </tr>


<?php 
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Outstanding Balance: <script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 38:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;


?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">LANDLORD STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<a download="landlord_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php
$result =mysql_query("select * from mainhouses where houseid='".$name."'");
$rowx=mysql_fetch_array($result);
?>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Name: <?php  echo stripslashes($rowx['housename']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Plot No: <?php  echo stripslashes($rowx['plot']) ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">Date</td>
      <td  style="width:45%">Description</td>
      <td  style="width:15%">Invoices</td>
      <td  style="width:15%">Receipts</td>
      <td  style="width:15%">Balance</td>
  </tr> 


<?php
$a=$b=0;
if($d1==0){
$result =mysql_query("select * from housedebts where hid='".$name."'");
}else{
  $result =mysql_query("select * from housedebts where hid='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
}
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rcptno='';$inv='';$rec='';
$row=mysql_fetch_array($result);
if(stripslashes($row['drcr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['amount']));$inv=preg_replace('~,~', '', stripslashes($row['amount']));
}else{
 $b+=preg_replace('~,~', '', stripslashes($row['amount']));$rec=preg_replace('~,~', '', stripslashes($row['amount']));
}
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date']) ?></td>
      <td style="width:45%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['details']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $inv ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $rec ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['bal']) ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
     
    </tr>


<?php 
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Invoices: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Receipts: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 39:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;


?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">SUPPLIER STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<a download="supplier_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php
$result =mysql_query("select * from suppliers where supid='".$name."'");
$rowx=mysql_fetch_array($result);
?>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Name: <?php  echo stripslashes($rowx['supname']) ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">Date</td>
      <td  style="width:45%">Description</td>
      <td  style="width:15%">Credits</td>
      <td  style="width:15%">Debits</td>
      <td  style="width:15%">Balance</td>
  </tr> 


<?php
$a=$b=0;
if($d1==0){
$result =mysql_query("select * from supplierdebts where SupplierId='".$name."'");
}else{
  $result =mysql_query("select * from supplierdebts where SupplierId='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
}
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rcptno='';$inv='';$rec='';
$row=mysql_fetch_array($result);
if(stripslashes($row['DrCr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['Amount']));$inv=preg_replace('~,~', '', stripslashes($row['Amount']));$desc='PURCHASES INVOICE NO: '.stripslashes($row['InvoiceNo']);
}else{
 $b+=preg_replace('~,~', '', stripslashes($row['Amount']));$rec=preg_replace('~,~', '', stripslashes($row['Amount']));$desc='PAYMENT OF INVOICE NO: '.stripslashes($row['InvoiceNo']);
}
$desc=stripslashes($row['AccNotes']);
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Date']) ?></td>
      <td style="width:45%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $desc ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $inv ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $rec ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
     
    </tr>


<?php 

} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Credits: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Debits: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 40:


$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;

if(isset($_GET['timer1'])){
  $timer1=$_GET['timer1'];
}else $timer1='12:00am';

if(isset($_GET['timer2'])){
  $timer2=$_GET['timer2'];
}else $timer2='12:00am';


$user=$_GET['name'];
$fname='activity_log';


?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">SYSTEM ACTIVITY LOG<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1.'  '.$timer1;  ?>&nbsp;&nbsp;To:&nbsp;<?php   echo $d2.'  '.$timer2; ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php }
$time1=backtime($timer1);
$time2=backtime($timer2);
$d11=stampreverse($d1).$time1;
$d22=stampreverse($d2).$time2;
 ?>

<div style="clear:both"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:12%;">Date</td>
        <td  style="width:12%;">Time</td>
        <td  style="width:12%;">Username</td>
        <td  style="width:63%;">Activity</td>
        </tr>


<?php


  if($code==1){
        if($d1==0){
        $result =mysql_query("select * from log where status=1");
        }
        else{
        $result =mysql_query("select * from log  where stamp>='".$d11."' and stamp<='".$d22."' and status=1");
        }
  
  }
  else if($code==2){
      if($d1==0){
      $result =mysql_query("select * from log where status=1 and username='".$user."'");
      }
      else{
      $result =mysql_query("select * from log  where stamp>='".$d11."' and stamp<='".$d22."' and status=1 and username='".$user."'");
      }
  }
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  
  

  if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
    ?>

    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['date']) ?></td>
    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['time']) ?></td>
    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['username']) ?></td>
    <td  style="width:63%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['activity']) ?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;




case 41:

$date=date('Y/m/d');
$stamp=date('Ymd');
$fname='custom_report';

$title='Custom Report';

if(isset($_SESSION['query'])){
$query=$_SESSION['query'];
}else{exit;}



?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $title ?><br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both; margin-bottom:10px;margin-top:10px;border-bottom:1px solid #ccc"></div>
<p style="text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"><?php  echo $query ?></p>
<div style="clear:both; margin-bottom:10px;margin-top:10px;border-bottom:1px solid #ccc"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>

<?php
$count=count($_SESSION['showcolumns']);
$width=round(95/$count).'%';


?>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0;text-transform:uppercase">

    <?php
    echo ' <td  style="width:5%">No.</td>';
    foreach ($_SESSION['showcolumns'] as $i => $val) {
    echo ' <td  style="width:'.$width.'">'.$val.'</td>';
    }
    ?>
       
        </tr>

<?php

  $result =mysql_query($query);
  $num_results = mysql_num_rows($result);
  $aa=0;
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $aa+=1;
  if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';}else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
        echo ' <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.$aa.'</td>';
    foreach ($_SESSION['showcolumns'] as $a => $val) {
      echo ' <td style="width:'.$width.';border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row[$val]).'</td>';
      }
         
    echo'</tr>';
} ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;


case 42:
$date=date('Y/m/d');
$stamp=date('Ymd');
$mon=$_GET['mon'];



?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MONTHLY WATER INVOICES REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<a download="water_invoices.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Month: <?php  echo $mon ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:4%">No.</td>
      <td  style="width:16%">Tenant Name</td>
      <td  style="width:8%">Unit No</td>
      <td  style="width:8%">W.Prev</td>
      <td  style="width:8%">W.Curr</td>
      <td  style="width:8%">Consum</td>
       <td  style="width:8%">Water</td>
      <td  style="width:8%">Sewer</td>
      <td  style="width:8%">Meter</td>
       <td  style="width:8%">Conservancy</td>
      <td  style="width:8%">Toilet</td>
      <td  style="width:8%">Total</td>
  </tr> 


<?php
$result =mysql_query("select * from waterinvoices where mon='".$mon."'");
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$m=0;$z=0;$k=0;$l=0;$t=0;$x=0;$aa=1;
$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $a+=preg_replace('~,~', '', stripslashes($row['water']));
  $b+=preg_replace('~,~', '', stripslashes($row['sewer']));
  $c+=preg_replace('~,~', '', stripslashes($row['meter']));
  $d+=preg_replace('~,~', '', stripslashes($row['conservancy']));
  
  $g+=preg_replace('~,~', '', stripslashes($row['wd']));
  $z+=preg_replace('~,~', '', stripslashes($row['total']));
  $t+=preg_replace('~,~', '', stripslashes($row['toilet']));
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:16%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['tname']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rno']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['wp']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['wc']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['wd']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['water']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['sewer']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['meter']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['conservancy']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['toilet']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php 
$aa++;
} ?>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
       <td  style="width:4%"></td>
      <td  style="width:16%">Totals</td>
      <td  style="width:8%"></td>
      <td  style="width:8%"></td>
      <td  style="width:8%"></td>
      <td  style="width:8%"><?php  echo $g ?></td>
      <td  style="width:8%"><script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:8%"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:8%"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
       <td  style="width:8%"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:8%"><script>document.writeln(( <?php  echo $t ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:8%"><script>document.writeln(( <?php  echo $z ?>).formatMoney(2, '.', ','));</script></td>
  </tr> 

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 43:
$date=date('Y/m/d');
$stamp=date('Ymd');
$mon=$_GET['mon'];



?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MONTHLY ELECTRICITY INVOICES REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<a download="electricity_invoices.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Month: <?php  echo $mon ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">No.</td>
      <td  style="width:20%">Tenant Name</td>
      <td  style="width:10%">Unit No</td>
      <td  style="width:10%">E.Prev</td>
      <td  style="width:10%">E.Curr</td>
      <td  style="width:10%">Consum</td>
      <td  style="width:10%">Fixed Cost</td>
      <td  style="width:10%">Variable Costt</td>
      <td  style="width:10%">Total</td>
  </tr> 


<?php
$result =mysql_query("select * from elecinvoices where mon='".$mon."'");
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$m=0;$z=0;$k=0;$l=0;$t=0;$x=0;$aa=1;
$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $a+=preg_replace('~,~', '', stripslashes($row['ed']));
  $b+=preg_replace('~,~', '', stripslashes($row['ef']));
  $var=preg_replace('~,~', '', stripslashes($row['er']))*preg_replace('~,~', '', stripslashes($row['ed']));
  $c+=$var;
  $d+=preg_replace('~,~', '', stripslashes($row['total']));
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['tname']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rno']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ep']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ec']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ed']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['ef']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $var ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></td>
       </tr>


<?php 
$aa++;
} ?>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
       <td  style="width:10%"></td>
      <td  style="width:20%">Totals</td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"><?php  echo $a ?></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></td>
      </tr> 

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 44:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$fname='utility_payments_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">UTILITY PAYMENTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:15%;">Property Name</td>
        <td  style="width:10%;">Bill No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Item Name</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Ref No</td>
        <td  style="width:20%;">Remarks</td>
        </tr>


<?php

  switch($code){
  case 1:
   if($d1==0){
  $result =mysql_query("select * from utilities");
  }
  else{
  $result =mysql_query("select * from utilities  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
  break;

  case 2:
   if($d1==0){
  $result =mysql_query("select * from utilities  where hid='".$name."'");
  }
  else{
  $result =mysql_query("select * from utilities  where stamp>='".$d1."' and stamp<='".$d2."' and  hid='".$name."'");
  }
  break;

  case 3:
  if($d1==0){
  $result =mysql_query("select * from utilities  where lid='".$name."'");
  }
  else{
  $result =mysql_query("select * from utilities  where stamp>='".$d1."' and stamp<='".$d2."' and  lid='".$name."'");
  }
  break;

  }

 
 
  $aa=$a=0;

  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $a+=stripslashes($rowa['amount']);
  $aa=$i+1;
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['billno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['month']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['lname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount'])  ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['refno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['remarks']) ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 45:



$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
if(isset($_GET['name2'])){
  $name2=$_GET['name2'];
}else {$name2=0;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
$fname='utility_reconciliation_reports';

$resulta =mysql_query("select * from mainhouses where houseid='".$name."'");
$rowa=mysql_fetch_array($resulta);
$hname=stripslashes($rowa['housename']);

$resulta =mysql_query("select * from activities where lid='".$name2."'");
$rowa=mysql_fetch_array($resulta);
$actid=stripslashes($rowa['id']);
$actlid=stripslashes($rowa['lid']);
$actname=stripslashes($rowa['name']);
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">UTILITY RECONCILIATION REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Property: <?php  echo $hname ?>&nbsp;&nbsp;&nbsp;&nbsp;Utility: <?php  echo $actname ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:20%;">Month</td>
        <td  style="width:25%;">Total Invoiced</td>
        <td  style="width:25%;">Total Paid</td>
        <td  style="width:25%;">Difference</td>
    </tr>


<?php

  $start=substr($d1,3,4).substr($d1,0,2).'01';
  $end=substr($d2,3,4).substr($d2,0,2).'01';
  $arr=array();
   
   while($start<=$end){
      $mon=substr($start,4,2).'_'.substr($start,0,4);
      $arr[$mon]=$mon;
      
      $start=substr($start,0,4).''.substr($start,4,2).''.substr($start,6,2);
      $s = new DateTime($start);
      $s->modify('+1month');
      $start= $s->format('Ymd');
  }

  $no=1;$aa=0;$bb=0;$cc=0;
  foreach ($arr as $key => $val) {
        $a=0;$b=0;$c=0;
        $result =mysql_query("select * from invoices where hid='".$name."' and actid='".$actid."'  and mon='".$key."'");
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
        $row=mysql_fetch_array($result);
        $a+=preg_replace('~,~', '', stripslashes($row['invamount']));
        }

        $result =mysql_query("select * from utilities  where hid='".$name."' and lid='".$actlid."'  and month='".$key."'");
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
        $row=mysql_fetch_array($result);
        $b+=preg_replace('~,~', '', stripslashes($row['amount']));
        }

        $c=$a-$b;
        $aa+=$a;
        $bb+=$b;
        $cc+=$c;


$no++;
if($no%2==0){$col='#f0f0f0';}else{$col='#fff';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $no ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $key ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $aa ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Amount Paid: <script>document.writeln(( <?php  echo $bb ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Difference: <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 46:
$rcptno=$_GET['rcptno'];


$result =mysql_query("select * from supplierdebts where InvoiceNo='".$rcptno."' and DrCr='dr'");
$row=mysql_fetch_array($result);
$amount=stripslashes($row['Amount']);
if($amount>=0){$doctitle='SUPPLIER PURCHASE NOTE';}else{$doctitle='SUPPLIER DEBIT NOTE';}


$result =mysql_query("select * from purchases where rcptno='".$rcptno."'");
$row=mysql_fetch_array($result);
$supname=stripslashes($row['supname']);


?>
<div class="panel-body maindiv" style="width:740px;min-height:840px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:60px; margin:0px 10px 0 10px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $doctitle ?><br/>Request No:<?php  echo $rcptno ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px;border-top:1px dashed #666" ></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px"><strong style="font-size:11px">Property:<?php  echo stripslashes($row['depname']) ?></strong><br/>Supplier:<?php  echo $supname ?></strong><br/><strong style="font-size:11px">Description:<?php  echo stripslashes($row['notes']) ?></strong></p>
<div style="clear:both; margin-bottom:10px;border-top:1px dashed #666" ></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
  <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:15%;">No</td>
      <td  style="width:40%;">Item</td>
      <td  style="width:15%;">Qty</td>
      <td  style="width:15%;">Price</td>
      <td  style="width:15%;">Total</td>
 </tr>
<?php
$result =mysql_query("select * from purchases where rcptno='".$rcptno."'");
            $num_results = mysql_num_rows($result);
            $x=1;$qty=$total=0;
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $qty+=stripslashes($row['qty']);
              $total+=preg_replace('~,~', '', stripslashes($row['total']));

  if($i%2==0){  echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
   echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $x ?></td>
<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['itemname']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['qty']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['price']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>


<?php 
$x++;
} ?>

 <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:15%;"></td>
      <td  style="width:40%;">Totals</td>
      <td  style="width:15%;"><?php  echo $qty ?></td>
      <td  style="width:15%;"></td>
      <td  style="width:15%;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
 </tr>


</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 47:

$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='creditors_ageing_list';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">CREDITORS DEBT AGEING ANALYSIS<br/><strong style="font-size:12px">As at:<?php  echo dateprint($d2) ?></strong></p>
<div style="clear:both"></div>
<?php $d2=preg_replace('~/~', '', $d2); ?>
<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>


<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;">
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">No.</td>
      <td  style="width:8%;">Sup ID.</td>
      <td  style="width:24%;">Name</td>
      <td  style="width:10%;">Telephone</td>
      <td  style="width:10%;">1-30 Days</td>
      <td  style="width:10%;">31-60 Days</td>
      <td  style="width:10%;">61-90 Days</td>
      <td  style="width:10%;">Over 90 Days</td>
      <td  style="width:10%;">Balance</td>
      </tr>
<?php
  $aa=0;$cc=$dd=$ee=$ff=0;
  $resultx =mysql_query("select * from suppliers order by supname");
  $num_resultsx = mysql_num_rows($resultx);
  for ($q=0; $q <$num_resultsx; $q++) {
  $rowx=mysql_fetch_array($resultx);
  $cusid=stripslashes($rowx['supid']);

  //ageing

  $result =mysql_query("select * from supplierdebts where SupplierId='".$cusid."' and DrCr='dr' and Stamp<='".$d2."' and Status=1");
  $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  
  $stamp=stripslashes($row['Stamp']);
  $x=substr(stripslashes($row['Stamp']),0,4);
  $y=substr(stripslashes($row['Stamp']),4,2);
  $z=substr(stripslashes($row['Stamp']),6,2);
  $datex=date('Y');$datey=date('m');$datez=date('d');
  $diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
  $tdiff=($diffx*365)+($diffy*30)+($diffz*1);

    if($tdiff<=30){
      $c+=preg_replace('~,~', '', stripslashes($row['Amount']));
    }
    if($tdiff>30&&$tdiff<=60){
      $d+=preg_replace('~,~', '', stripslashes($row['Amount']));
    }
    if($tdiff>60&&$tdiff<=90){
      $e+=preg_replace('~,~', '', stripslashes($row['Amount']));
    }
    
    if($tdiff>=90){
      $f+=preg_replace('~,~', '', stripslashes($row['Amount']));
    }
  
  }

  $tot=$c+$d+$e+$f;
//end ageing
  $aa+=1;

  if($q%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=39&name='.stripslashes($rowx['supid']).'\')" title="click to view">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=39&name='.stripslashes($rowx['supid']).'\')" title="click to view">';}
?>  <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
     <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['supid']) ?></td>
      <td style="width:24%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['supname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['contacttel']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $f ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>
       </tr>


<?php 

$cc+=$c;$dd+=$d;$ee+=$e;$ff+=$f;

}

$gg=$cc+$dd+$ee+$ff;
?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;"></td>
      <td  style="width:8%;"></td>
      <td  style="width:24%;">Totals</td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $dd ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ee ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ff ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $gg ?>).formatMoney(2, '.', ','));</script></td>
        </tr>
</tbody>
</table>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;


case 48:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$fname='supplier_invoices_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUPPLIER INVOICES REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:5%;">Inv. No</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:10%;">Supplier</td>
        <td  style="width:15%;">Item</td>
        <td  style="width:5%;">Qty</td>
        <td  style="width:10%;">Price</td>
        <td  style="width:10%;">Total</td>
        <td  style="width:10%;">Vat</td>
        <td  style="width:10%;">Status</td>
        </tr>


<?php

  switch($code){
  case 1:
   if($d1==0){
  $result =mysql_query("select * from purchases");
  }
  else{
  $result =mysql_query("select * from purchases  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
  break;

  case 2:
   if($d1==0){
  $result =mysql_query("select * from purchases  where itemcode='".$name."'");
  }
  else{
  $result =mysql_query("select * from purchases  where stamp>='".$d1."' and stamp<='".$d2."' and  itemcode='".$name."'");
  }
  break;

  case 3:
  if($d1==0){
  $result =mysql_query("select * from purchases  where supid='".$name."'");
  }
  else{
  $result =mysql_query("select * from purchases  where stamp>='".$d1."' and stamp<='".$d2."' and  supid='".$name."'");
  }
  break;

  }

 
 
  $aa=$a=0;$items='';$tot=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$aa+1;
 
  $a+=stripslashes($rowa['total']);
  $b+=stripslashes($rowa['vat']);
  $stat=stripslashes($rowa['status']);
  if($stat==2){$status='Paid';$colour='#1fae66';}
  if($stat==1){$status='New';$colour='#F89C2C';}




  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['depname']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['supname']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['itemname']) ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['qty']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['price']) ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['total']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">VAT Total: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 49:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$fname='summarized_supplier_invoices_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUMMARIZED SUPPLIER INVOICES REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:10%;">Invoice No</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:10%;">Supplier</td>
        <td  style="width:35%;">Items</td>
        <td  style="width:10%;">Total</td>
        <td  style="width:10%;">Status</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from purchases");
  }
  else{
  $result =mysql_query("select * from purchases  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 
 
 

  $arr=array();
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $arr[stripslashes($rowa['rcptno'])]=stripslashes($rowa['rcptno']);
  }

  $aa=$a=0;$items='';$tot=0;
  foreach ($arr as $key => $val) {
  $aa=$aa+1;
  $result =mysql_query("select * from purchases  where rcptno='".$key."'");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $items.=stripslashes($rowa['itemname']).';';
  $tot+=stripslashes($rowa['total']);
  }

  $a+=$tot;
  $stat=stripslashes($rowa['status']);

  if($stat==2){$status='Paid';$colour='#1fae66';}
  if($stat==1){$status='New';$colour='#F89C2C';}





  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['depname']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['supname']) ?></td>
   <td  style="width:35%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $items ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 50:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if(isset($_GET['type'])){
  $type=$_GET['type'];
}else {$type=1;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='output_vat_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">OUTPUT VAT REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>


<?php if($type==1){ ?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">Tenant Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:10%;">Invoice Amount</td>
        <td  style="width:10%;">Sale Amount</td>
        <td  style="width:10%;">VAT Amount</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from invoices  where  vat!=0");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
 $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount']));
  $b+=preg_replace('~,~', '', stripslashes($row['vat']));
  }
  

  $aa=$i+1;
  $sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount'])-stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php

  }

}
else{

  ?>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">Purchaser Pin</td>
        <td  style="width:20%;">Purchaser Name</td>
        <td  style="width:15%;">ETR Serial Number</td>
        <td  style="width:10%;">Invoice Date</td>
        <td  style="width:10%;">Invoice Number</td>
        <td  style="width:25%;">Description of Service</td>
        <td  style="width:10%;">Taxable Value</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from invoices  where  vat!=0");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount']));
  $b+=preg_replace('~,~', '', stripslashes($row['vat']));
  }
  
  $tid=stripslashes($row['tid']);
  $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $pin=stripslashes($rowx['pin']);

  $aa=$i+1;
  $sent='';
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pin ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $etrno ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount'])-stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

  <?php

    }


}




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Invoices Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Sales Amount: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total VAT Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 51:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
$code=$_GET['code'];
$fname='unit_activity_reports';

$result =mysql_query("select * from houses where rid='".$name."' limit 0,1");
$rowa=mysql_fetch_array($result);
$unitname=stripslashes($rowa['housename']).'-'.stripslashes($rowa['roomno']);

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">UNIT ACTIVITY LOG REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Unit:<?php  echo $unitname ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:20%;">Entry Date</td>
        <td  style="width:50%;">Description</td>
        <td  style="width:15%;">Rent</td>
        <td  style="width:15%;">Username</td>
        </tr>


<?php


   if($d1==0){
  $result =mysql_query("select * from housetrack  where rid='".$name."'");
  }
  else{
  $result =mysql_query("select * from housetrack  where stamp>='".$d1."' and stamp<='".$d2."' and  rid='".$name."'");
  }

 
 $aa=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
    $aa+=1;
  $rowa=$row=mysql_fetch_array($result); 
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:50%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['description']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['rent']) ?>).formatMoney(2, '.', ','));</script></td>
     <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['username']) ?></td>
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 52:

$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='debtors_ageing_list';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">TENANTS DEBT AGEING ANALYSIS<br/><strong style="font-size:12px">As at:<?php  echo dateprint($d2) ?></strong></p>
<div style="clear:both"></div>
<?php $d2=preg_replace('~/~', '', $d2); ?>
<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>


<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;">
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">No.</td>
      <td  style="width:24%;">Name</td>
      <td  style="width:8%;">Unit</td>
      <td  style="width:10%;">Telephone</td>
      <td  style="width:10%;">1-30 Days</td>
      <td  style="width:10%;">31-60 Days</td>
      <td  style="width:10%;">61-90 Days</td>
      <td  style="width:10%;">Over 90 Days</td>
      <td  style="width:10%;">Balance</td>
      </tr>
<?php
  $aa=0;$cc=$dd=$ee=$ff=0;
  $resultx =mysql_query("select * from tenants where bal>0 order by tid");
  $num_resultsx = mysql_num_rows($resultx);
  for ($q=0; $q <$num_resultsx; $q++) {
  $rowx=mysql_fetch_array($resultx);
  $tid=stripslashes($rowx['tid']);

  //ageing

  $result =mysql_query("select * from invoices where tid='".$tid."' and stamp<='".$d2."' and invstatus=1");
  $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  
  $stamp=stripslashes($row['stamp']);
  $x=substr(stripslashes($row['stamp']),0,4);
  $y=substr(stripslashes($row['stamp']),4,2);
  $z=substr(stripslashes($row['stamp']),6,2);
  $datex=date('Y');$datey=date('m');$datez=date('d');
  $diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
  $tdiff=($diffx*365)+($diffy*30)+($diffz*1);

    if($tdiff<=30){
      $c+=preg_replace('~,~', '', stripslashes($row['invamount']));
    }
    if($tdiff>30&&$tdiff<=60){
      $d+=preg_replace('~,~', '', stripslashes($row['invamount']));
    }
    if($tdiff>60&&$tdiff<=90){
      $e+=preg_replace('~,~', '', stripslashes($row['invamount']));
    }
    
    if($tdiff>=90){
      $f+=preg_replace('~,~', '', stripslashes($row['invamount']));
    }
  
  }

  $tot=$c+$d+$e+$f;
//end ageing
  $aa+=1;

  if($q%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=37&name='.stripslashes($rowx['tid']).'\')" title="click to view">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=37&name='.stripslashes($rowx['tid']).'\')" title="click to view">';}
?>  <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
     <td style="width:24%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['bname']) ?></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['roomno']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['dphone']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $f ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>
       </tr>


<?php 

$cc+=$c;$dd+=$d;$ee+=$e;$ff+=$f;

}

$gg=$cc+$dd+$ee+$ff;
?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;"></td>
     <td  style="width:24%;">Totals</td>
       <td  style="width:8%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $dd ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ee ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ff ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $gg ?>).formatMoney(2, '.', ','));</script></td>
        </tr>
</tbody>
</table>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;




case 50:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if(isset($_GET['type'])){
  $type=$_GET['type'];
}else {$type=1;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='vat_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">INVOICES VAT REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>


<?php if($type==1){ ?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">Tenant Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:10%;">Invoice Amount</td>
        <td  style="width:10%;">Sale Amount</td>
        <td  style="width:10%;">VAT Amount</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from invoices  where  vat!=0");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
 $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount']));
  $b+=preg_replace('~,~', '', stripslashes($row['vat']));
  }
  

  $aa=$i+1;
  $sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount'])-stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php

  }

}
else{

  ?>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">Purchaser Pin</td>
        <td  style="width:20%;">Purchaser Name</td>
        <td  style="width:15%;">ETR Serial Number</td>
        <td  style="width:10%;">Invoice Date</td>
        <td  style="width:10%;">Invoice Number</td>
        <td  style="width:25%;">Description of Service</td>
        <td  style="width:10%;">Taxable Value</td>
        </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from invoices  where  vat!=0");
  }
  else{
  $result =mysql_query("select * from invoices  where stamp>='".$d1."' and stamp<='".$d2."' and vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount']));
  $b+=preg_replace('~,~', '', stripslashes($row['vat']));
  }
  
  $tid=stripslashes($row['tid']);
  $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $pin=stripslashes($rowx['pin']);

  $aa=$i+1;
  $sent='';
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pin ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $etrno ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount'])-stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

  <?php

    }


}




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Invoices Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Sales Amount: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total VAT Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 53:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if(isset($_GET['type'])){
  $type=$_GET['type'];
}else {$type=1;}

if($name=='All'){$code=1;}else{$code=2;}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='input_vat_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">INPUT VAT REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>


<?php if($type==1){ ?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">Supplier Name</td>
        <td  style="width:10%;">Invoice No</td>
        <td  style="width:30%;">Description</td>
        <td  style="width:10%;">Invoice Amount</td>
        <td  style="width:10%;">Purchase Amount</td>
        <td  style="width:10%;">VAT Amount</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from supplierdebts  where  Vat!=0");
  }
  else{
  $result =mysql_query("select * from supplierdebts  where Stamp>='".$d1."' and Stamp<='".$d2."' and Vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
 $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['Status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['Amount']));
  $b+=preg_replace('~,~', '', stripslashes($row['vat']));
  }
  

  $aa=$i+1;
  $sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['Date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['SupplierName'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['InvoiceNo']) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['AccNotes']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['Amount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['Amount'])-stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php

  }

}
else{

  ?>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">Type of Purchase</td>
        <td  style="width:10%;">Supplier Pin</td>
        <td  style="width:20%;">Supplier Name</td>
        <td  style="width:10%;">Invoice Date</td>
        <td  style="width:10%;">Invoice Number</td>
        <td  style="width:30%;">Description of Service</td>
        <td  style="width:10%;">Taxable Value</td>
        </tr>


<?php



  if($d1==0){
  $result =mysql_query("select * from supplierdebts  where  Vat!=0");
  }
  else{
  $result =mysql_query("select * from supplierdebts  where Stamp>='".$d1."' and Stamp<='".$d2."' and Vat!=0");
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
 $rowa= $row=mysql_fetch_array($result);
  $status=stripslashes($row['Status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['Amount']));
  $b+=preg_replace('~,~', '', stripslashes($row['Vat']));
  }
  $type='Local';
  
  
  $supid=stripslashes($row['SupplierId']);
  $resultx =mysql_query("select * from suppliers where supid='".$supid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $pin=stripslashes($rowx['pin']);

  $aa=$i+1;
  $sent='';
  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $type ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pin ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['SupplierName'])?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['Date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['InvoiceNo']) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['AccNotes']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['Amount'])-stripslashes($rowa['Vat']) ?>).formatMoney(2, '.', ','));</script></td>
  </tr>

  <?php

    }


}




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Invoices Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Purchases Amount: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total VAT Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 54:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='escalation_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">RENT ESCALATION REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:30%;">Tenant Name</td>
        <td  style="width:15%;">Unit</td>
        <td  style="width:15%;">Start Date</td>
        <td  style="width:15%;">End Date</td>
        <td  style="width:15%;">Amount</td>
      </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from escalations order by tid");
  }
  else{
  $result =mysql_query("select * from escalations  where end>='".$d1."' and end<='".$d2."'  order by tid");
  }
 

  $a=0;$b=0;$c=0;$d=$e=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
 if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate($rowa['start']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate(stripslashes($rowa['end'])) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>

 </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 55:

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];


  if($name=='All'){$title='All Contacts';}
  else if($name!='All'){$title=$name.' Contacts';}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='messages_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">CONTACTS LIST REPORT [<?php  echo $title ?>]
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:25%;">Sent to</td>
        <td  style="width:15%;">Phone Number</td>
        <td  style="width:30%;">Message</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:10%;">Time</td>
    </tr>


<?php

    if($d1==0){
    $result =mysql_query("select * from notices");
    }
    else{
      $result =mysql_query("select * from notices  where stamp>='".$d1."' and stamp<='".$d2."'");
    }


 
  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=mysql_fetch_array($result);


  $aa=$i+1;
    $sent='';
    if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
    echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
    ?>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
    <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['sendto']) ?></td>
    <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
    <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['message']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['time']) ?></td>
  </tr>

<?php } 

?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


}