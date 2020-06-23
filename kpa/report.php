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
$comloc=stripslashes($row['Location']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
$comprop=stripslashes($row['Property']);
$complot=stripslashes($row['Plot']);
$watermark=stripslashes($row['Watermark']);
$etrno=stripslashes($row['EtrNo']);
$combank=stripslashes($row['BankName']);
$combranch=stripslashes($row['BranchName']);
$comacno=stripslashes($row['AcNo']);
switch($id){
	case 1:
	$title='Kpa Central CRM Letter of Offer';
	break;
  case 1.1:
  $title='Kpa Central CRM Letter of Offer';
  break;
  case 2:
  $title='Kpa Central CRM Deposits Receipt';
  break;
  case 3:
  $title='Kpa Central CRM Vacate Notice';
  break;
  case 4:
  $title='Kpa Central CRM Requisition Note';
  break;
  case 5:
  $title='Kpa Central CRM Invoices';
  break;
  case 6:
  $title='Kpa Central CRM Receipts';
  break;

  case 7:
  $title='Kpa Central CRM Water Invoices';
  break;

  case 8:
  $title='Kpa Central CRM Electricity Invoices';
  break;

  case 9:
  $title='Kpa Central CRM Trial Balance';
  break;

  case 10:
  $title='Kpa Central CRM Income Statement';
  break;

  case 11:
  $title='Kpa Central CRM Balance Sheet';
  break;

  case 12:
  $title='Kpa Central CRM Invoices Reports';
  break;

  case 12.1:
  $title='Kpa Central CRM Credit Notes Reports';
  break;

  case 12.2:
  $title='Kpa Central CRM Refunds Reports';
  break;

  case 13:
  $title='Kpa Central CRM Receipts Reports';
  break;

  case 14:
  $title='Kpa Central CRM Summarized Invoices Reports';
  break;

  case 15:
  $title='Kpa Central CRM Summarized Receipts Reports';
  break;

  case 16:
  $title='Kpa Central CRM Invoices vs Receipts Reports';
  break;

  case 16.1:
  $title='Kpa Central CRM Invoices vs Receipts By FieldPerson Reports';
  break;

  case 16.2:
  $title='Kpa Central CRM Invoices vs Receipts By FieldPerson Reports';
  break;

  case 16.3:
  $title='Kpa Central CRM Invoices vs Receipts By Property Reports';
  break;

  case 16.4:
  $title='Kpa Central CRM Invoices vs Receipts By FieldPerson Reports';
  break;

  case 16.5:
  $title='Kpa Central CRM Invoices vs Receipts By FieldPerson Reports';
  break;

  case 17:
  $title='Kpa Central CRM Rent Projection Report';
  break;

  case 18:
  $title='Kpa Central CRM Members Reports';
  break;

  case 19:
  $title='Kpa Central CRM Deposits Reports';
  break;

  case 20:
  $title='Kpa Central CRM Lease Reports';
  break;

  case 21:
  $title='Kpa Central CRM Lease Reports';
  break;

  case 22:
  $title='Kpa Central CRM Checkout Reports';
  break;

  case 23:
  $title='Kpa Central CRM Documents Register Reports';
  break;

  case 24:
  $title='Kpa Central CRM Show of Interests Reports';
  break;

  case 25:
  $title='Kpa Central CRM Shop Applications Reports';
  break;

  case 26:
  $title='Kpa Central CRM Letter of Offers Reports';
  break;

  case 27:
  $title='Kpa Central CRM Pre-Members Reports';
  break;

  case 28:
  $title='Kpa Central CRM Properties Reports';
  break;

  case 28.1:
  $title='Kpa Central CRM All Field Persons Reports';
  break;

  case 29:
  $title='Kpa Central CRM Property Units Reports';
  break;

  case 30:
  $title='Kpa Central CRM Requisition Reports';
  break;

  case 31:
  $title='Kpa Central CRM Items List Reports';
  break;

  case 32:
  $title='Kpa Central CRM Chart of Accounts';
  break;

  case 33:
  $title='Kpa Central CRM Suppliers List';
  break;

  case 34:
  $title='Kpa Central CRM System Users List';
  break;

  case 35:
  $title='Kpa Central CRM User Access Report';
  break;

  case 36:
  $title='Kpa Central CRM Ledger Reports';
  break;

  case 37:
  $title='Kpa Central CRM MemberStatement';
  break;

  case 38:
  $title='Kpa Central CRM Landlord Statement';
  break;

  case 39:
  $title='Kpa Central CRM Supplier Statement';
  break;

  case 40:
  $title='Kpa Central CRM Activity Log Report';
  break;

  case 41:
  $title='Kpa Central CRM Custom Reports';
  break;

  case 42:
  $title='Kpa Central CRM Water Invoices Reports';
  break;

  case 43:
  $title='Kpa Central CRM Electricity Invoices Reports';
  break;

  case 44:
  $title='Kpa Central CRM Utility Payments Reports';
  break;

  case 45:
  $title='Kpa Central CRM Utility Reconciliations Reports';
  break;
  case 46:
  $title='Kpa Central CRM Purchases Note';
  break;

  case 47:
  $title='Kpa Central CRM Supplier Ageing Analysis';
  break;

  case 48:
  $title='Kpa Central CRM Supplier Invoices Report';
  break;

  case 49:
  $title='Kpa Central CRM Summarized Supplier Invoices Report';
  break;

  case 50:
  $title='Kpa Central CRM Output VAT Reports';
  break;

  case 51:
  $title='Kpa Central CRM Unit Activity Log Report';
  break;

   case 52:
  $title='Kpa Central CRM Members Ageing Analysis';
  break;

  case 53:
  $title='Kpa Central CRM Input VAT Reports';
  break;

  case 54:
  $title='Kpa Central CRM Rent Escalations Reports';
  break;

  case 54.1:
  $title='Kpa Central CRM Archived Members Reports';
  break;

  case 55:
  $title='Kpa Central CRM Credit Notes';
  break;

  case 56:
  $title='Kpa Central CRM Commision Summary Report';
  break;

  case 57:
  $title='Kpa Central CRM Daily Financial Report';
  break;

  case 58:
  $title='Kpa Central CRM Expenses Report';
  break;

  case 59:
  $title='Kpa Central CRM Monthly Expenses Summary';
  break;

  case 60:
  $title='Kpa Central CRM Refund Notes';
  break;

  case 61:
  $title='Kpa Central CRM Balances by Item Reports';
  break;

  case 62:
  $title='Kpa Central CRM Itemized MemberStatement';
  break;

  case 63:
  $title='Kpa Central CRM Landlord Monthly Statement';
  break;

  case 64:
  $title='Kpa Central CRM Paid/Unpaid Landlords Report';
  break;

  case 65:
  $title='Kpa Central CRM Tax Summary Report';
  break;

  case 66:
  $title='Kpa Central CRM Landlord Transactions Report';
  break;

  case 67:
  $title='Kpa Central CRM Agency Agreement Report';
  break;

  case 68:
  $title='Kpa Central CRM Unpaid Water Invoices Report';
  break;

  case 69:
  $title='Kpa Central CRM Income Category Statements Report';
  break;

  case 70:
  $title='Kpa Central CRM Income Summary Statements Report';
  break;

  case 71:
  $title='Kpa Central CRM MemberContracts Reports';
  break;


  case 72:
  $title='Kpa Central CRM Loan Amortization Schedule';
  break;

  case 73:
  $title='Kpa Central CRM Budget Management Report';
  break;

  case 74:
  $title='Kpa Central CRM Properties by Group Report';
  break;

  case 75:
  $title='Kpa Central CRM Field persons by Group Report';
  break;

  case 76:
  $title='Kpa Central CRM Share Accounts Report';
  break;

  case 77:
  $title='Kpa Central CRM Loan Accounts Report';
  break;

  case 78:
  $title='Kpa Central CRM Loans Ageing Report';
  break;

  case 79:
  $title='Kpa Central CRM Shares Ageing Report';
  break;

  case 80:
  $title='Kpa Central CRM Member Statement Report';
  break;

  case 81:
  $title='Kpa Central CRM Loans Arrears Report';
  break;

  case 82:
  $title='Kpa Central CRM Almost Due Loans Report';
  break;

  case 83:
  $title='Kpa Central CRM Cashier Transactions Report';
  break;

  case 84:
  $title='Kpa Central CRM Loans Repayment Report';
  break;

  case 85:
  $title='Kpa Central CRM Landlord Payments Report';
  break;

  case 86:
  $title='Kpa Central CRM Landlord Payments Report';
  break;

  case 87:
  $title='Kpa Central CRM Employee Advances Report';
  break;

  case 88:
  $title='Kpa Central Unit Checkin/Checkout Report';
  break;

   case 89:
  $title='Kpa Central Membership Certificate';
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
<script type="text/javascript" src="js/jquery.js"></script> 
<script src="custom/custom.js"></script>
<script src="js/excellentexport.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<style>
@media print {
    footer {page-break-after: always;}
    #toexcel{display:none;}
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
                      '.$comname.' hereby offers to the member below to lease the Premises described below subject to the following terms and conditions:-</p>
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
                      <p style="text-align:left">The Premises will be leased to the Memberfor a term of '.stripslashes($rowx['leaseterm']).'
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
                      <p style="text-align:left"><b>7.&nbsp;&nbsp;&nbsp;Rent Escalations:</b></p>
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

                      The Members will be required to deposit with the Landlord both water and electricity deposit totalling to  
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
                      <p style="text-align:left">Deposit payable is equivalent to <b>'.stripslashes($rowx['depmonths']).'</b> months rent totalling to Kenya shillings. <b>'.number_format(stripslashes($rowx['depamount'])).'</b><br/>
                       <b>'.stripslashes($rowx['otherdepositinfo']).'</b><br/>
                       Once the lease is signed, the deposit will be retained by the Landlord as security for the due performance by the Memberof the Tenant`s obligations under the lease. The deposit is refundable without interest to the Memberafter the expiry of the lease and delivery up of the Premises in accordance with the covenants contained in the lease.
                      <br/>The  deposit  will  not  be  utilized  by the  Member on  account  of  the payment of rent for the last month (or longer period) of the term of lease. 
                      <br/>The directors and shareholders of the Membershall provide personal guarantees for the obligations of the Memberunder the Lease and the License. Such guarantee will be incorporated in the Lease
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
                      The Membershall use the Premises as '.stripslashes($rowx['unitusage']).'. The Memberwill not use or permit or suffer the Premises or part thereof to be used for any illegal or immoral purposes.
                      <br/>The Landlord shall have an absolute and uncontrolled discretion whether or not to permit similar shops or trades in the Shopping mall and to locate the same upon the demised premises as it so wishes.

                      </p>
                      </div>
                      </div>

                      
                      <div class="form-group">
                       <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left"></div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Membershall comply with all laws acts orders rule and regulations by laws enhanced passed made or issued by the Government of the Republic of Kenya or any Municipal Township local or other authority in relation to the occupation or conduct of the Premises AND obtain all such licenses consents certificates or approvals and execute or cause to be done or executed all such works and things as under or by virtue of any law act order rule regulations as bye-law as aforesaid or under any notice order or directions given or made pursuit thereto for the time being in force are or shall be directed or necessary to be obtained done executed in 
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
                      The Landlord`s prior written consent will be required before the Membererects any partitions, fixtures or fittings in the Premises.

                      <br/>Any alterations to the power supply will require verification by the Landlord`s appointed electrical engineers at the cost of the Tenant.

                      <br/>The Membershall complete the ceilings; internal lighting of the Premises in accordance with such specifications as the Landlord may prescribe.

                      <br/>The  Member will  comply  with  all  store  fit  out,  renovations  and alterations criteria and guidelines issued by the Landlord.

                      <br/>The  Member shall  not  commence  any  such  fitting-out  work  in  the Premises unless and until the following conditions have been met:-

                      <br/>(i) Final Plans shall have been approved;

                      <br/>(ii)  the Membershall have obtained all relevant permits and/or approvals from the appropriate local and governmental authorities for the Tenant`s fitting out works on the Premises and shall have furnished the Landlord with copies of all such permits and/or approvals;
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

                    (iii) The Membershall have procured all Insurances required under the provisions of the Tenancy (herein referred to) and shall have furnished   the   Landlord   with   certificates   of   such Insurances; and The Landlord shall have consented in writing to the commencement of the Tenant`s fitting out works.

                      <br/>The fitting out work shall not interfere and/or create a nuisance or disturbance with the use, occupancy, or enjoyment of The Point by the Landlord, other Members or shoppers or at all.

                      <br/><b>Work Hours:</b>   Any fitting out work is to be done during the specific working hours of 8:00 a.m. to 7:00 p.m. unless otherwise agreed in writing by the Landlord.

                      <br/>Any damage to the building or part thereof and fixtures and fittings thereon forming The Point, external or internal, (i.e. including but not limited to sidewalks, storefront, doors, slab, studs, drywall, ceiling, ductwork, electrical work, plumbing, plumbing fixtures, painting, etc) caused by the Memberand/or the Tenant`s contractor or agents shall be repaired by the Landlord`s contractor at the Tenant`s expense and shall be payable forthwith by the Tenant.

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
                      This will be on the Lease Commencement  Date subject to the Memberhaving signed the lease before the Lease Commencement  Date, having made all requisite  payments and having received  Landlord`s approval on submitted fit out plans.
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
                      The Memberwill pay to the Landlord (if separate meters for utilities are installed at the Premises), or suppliers of utilities used exclusively in the Premises and indemnify the Landlord against all charges for such utilities consumed exclusively at or in relation to the Premises.</p>
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
                      In addition to the above rental and other charges and costs, the Memberwill be liable to pay on demand by the Landlord all Value Added Taxes leviable from time to time or other taxes leviable from time to time in law in respect of any amounts payable by the Tenant.</p>
                      </div>
                      </div>

                      
                      <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>16.&nbsp;&nbsp;&nbsp;Fit Out Period:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Memberwill be allowed a <b>'.stripslashes($rowx['fitout']).'</b> Month (s)
                      Fit Out Period commencing on the Lease Commencement Date (the "Fit  Out Period") and  will be expected to open the Premises for business at the expiry of such period.
                      <br/>If the Memberfails to open the Premises for business during this period, it will have to pay rent and all other charges for this period.
                      <br/>During  the  Fit  Out  Period,  the  Member shall  indemnify  and  hold harmless the Landlord for any loss, damage or injury suffered or incurred by the Landlord or third parties as a result of the actions or omissions of the Memberor its contractors, employees or agents actions in carrying out the fit out works.

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
                      The Membershall keep the Premises open for business at its convenient working hours and depending on the nature of the business. 
                      <br/>The Memberwill comply with such rules and conditions for extended opening as the Landlord may prescribe from time to time, including, without limitation, payment of additional service charge to cater for security and other costs for the extended opening hours.
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
                      The  Member shall  be  responsible  for  repairs  to  the  interior  of  the Premises,  including,  without  limitation,  all  partitions,  floors,  walls, ceilings, shop windows and internal fixtures and fittings.
                      <br/>On  termination  of  the  lease  or  earlier  determination  for  whatsoever reason, the Member will be required  to redecorate  the Premises  in the terms that will be contained in the in the lease for the Premises. During the term of the lease, the Memberwill be required to keep the Premises and fixtures and fittings thereon and therein in good repair, order and condition.
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
                      If the rent or any part thereof shall at any time remain unpaid for thirty (30) days after becoming payable, whether formally demanded or not, or if at any time thereafter the Memberis in breach of any of the covenants or conditions referred to in the lease, it will be lawful for the Landlord to re-enter the Premises and thereupon the lease will cease but without prejudice to any rights and remedies which may have accrued to the Landlord against the Memberin respect of any breach of covenant.   In the event that the Landlord allows the Memberany extra time to pay any outstanding rent or other charges, interest at the rate of the higher of (i) 10% over the base lending rate of the Prime Bank Limited from time to  time  or  25%  per  annum  will  be  paid  by  the  Member on  any outstanding   amounts   from  the  time   such   amounts   were   due   for payment, until payment in full.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-3 controls" style="width:10%;float:left"></div>
                      <div class="col-sm-3 controls" style="width:30%;float:left">
                      <p style="text-align:left"><b>21.&nbsp;&nbsp;&nbsp;Permission To Enter:</b></p>
                      </div>
                       <div class="col-sm-9 controls" style="width:60%;float:right">
                      <p style="text-align:left">
                      The Member shall allow the Landlord (or its agents and employees)  to enter the Premises (upon reasonable prior notice unless in the case of an emergency, in which case no notice will be required) for the purpose of ascertaining that the covenants and conditions of these Letter of Offer and  the  Lease  have  been  complied  with  and  to  carry  out  all  work required to comply with any notice given by the Landlord to the Memberspecifying  any maintenance,  cleaning or decoration  which the Memberhas failed to execute in breach of the Heads of Terms</p>
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
                      The  Member shall  indemnify  and  hold  harmless  the Landlord  for any loss, damage  or  injury  suffered  or  incurred  by the Landlord  or third parties as a result of the actions or omissions of the Memberor its contractors, employees or agents actions in relation to the Premises.
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
                      The Membershall take out its own insurance against all risks in relation to its equipment, furniture, fittings, stock and contents at the Premises, as well as any third party liability in relation to the Premises.
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
                      The Landlord will provide the Memberwith a lease for the Premises (the "lease"), which will be prepared by the Landlord`s  Advocates,'.stripslashes($rowx['lawyer']).'  and provided to the Member within 30 days of the date of these Letter of Offer.  The Memberwill execute the lease within 14 days of the final engrossed lease being provided to it, failing which the Landlord may withdraw its offer to Grant the Lease to the Tenant.
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
                      The  Member will  be responsible  for  its own  advocate`s legal  fees  in relation to approval of the Lease and the legal fees of the Landlord`s Advocates  in respect of the preparation,  execution  and registration  of the lease, together with stamp duty, registration fees and other disbursements.   The legal fees will be the minimum chargeable under the Advocates Remuneration Order 2014.</p>
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

                      <br/>The offer to grant the Lease is made subject to the Memberproviding to the Landlord the following:-

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
                       

                     <br/> This letter of offer is sent to the Memberin triplicate.   If its terms and conditions  are accepted,  please execute the enclosed copies and return them to us within the next seven (7) days from the date hereof together with your banker’s cheque in favour of <b>'.stripslashes($rowx['chequename']).'</b>, for the sum of Kenya Shillings '.number_format(stripslashes($rowx['chequeamount'])).' being the  Security  Deposit and one month’s rent payable  hereunder  failing  which  this  Offer  will  lapse  and  shall  be  automatically rescinded upon expiry of such period.
                     <br/> Prior to offering possession, the Memberwill be required to forward the payments as follows:-<br/>
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


case 1.1:
$lof=$_GET['rcptno'];
$resultx =mysql_query("select * from lof where id='".$lof."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$rid=stripslashes($rowx['rid']);
$leaseterm=stripslashes($rowx['leaseterm']);
$leaseend=' until the expiry of the period';
$xx=$yy='';
if(stripslashes($rowx['rescom'])=='Residential'){$xx='checked';}
if(stripslashes($rowx['rescom'])=='Commercial'){$yy='checked';}
$vat=0;
$resulty =mysql_query("select * from tenants where lof='".$lof."' limit 0,1");
$rowq=$rowy=mysql_fetch_array($resulty);
$idno=stripslashes($rowy['idno']);
$phone=stripslashes($rowy['phone']);
$email=stripslashes($rowy['email']);
$vatstatus=stripslashes($rowy['vat']);
if($vatstatus==1){$vat=0.16*stripslashes($rowy['monrent']);}
if(stripslashes($rowy['openlease'])==1){$leaseterm='open';$leaseend='';}
$payables=$rowy['monrent']+$rowy['garbage']+$rowy['water']+$rowy['security']+$rowy['electricity'];

$resulty =mysql_query("select * from houses where rid='".$rid."' limit 0,1");
$rowy=mysql_fetch_array($resulty);
$roomtype=stripslashes($rowy['roomtype']);
$houseid=stripslashes($rowy['houseid']);
$elecmeter=stripslashes($rowy['elecmeter']);
$watermeter=stripslashes($rowy['watermeter']);

$resulty =mysql_query("select * from mainhouses where houseid='".$houseid."' limit 0,1");
$rowy=mysql_fetch_array($resulty);
$plot=stripslashes($rowy['plot']);
$housename=stripslashes($rowy['housename']);


$totaldep=$rowx['rentdep']+$rowx['elecdep']+$rowx['waterdep']+$rowx['garbagedep'];




?>
<style>
.form-group{margin-bottom: 0px;font-weight: normal;font-size:12px;line-height:20px;}

</style>

<?php


echo'               <div class="panel-body" style="width:100%"><form class="form-horizontal" action="#" role="form">
                    <div style="clear:both; margin-bottom:10px"></div>
                     
                       
                    
                      <div class="lofdiv">
                     
                      <p style="text-align:CENTER;font-size:18px;font-weight:bold;margin-top:0;padding-top:0"><b>LEASE AGREEMENT</b><br/>

                     <p style="text-align:LEFT;font-size:12px">
                      Lessor: <b>'.$comname.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Plot No: <b>'.$plot.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
                      Lessee: <b>'.stripslashes($rowx['bname']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel No: <b>'.$phone.'</b><br/>
                      Room No: <b>'.stripslashes($rowx['roomno']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID NO: <b>'.$idno.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address: <b>'.stripslashes($rowx['address']).'</b><br/>
                      Email :<b>'.stripslashes($rowq['email']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Residential <input style=""  name="openlease" value="1" type="checkbox" '.$xx.'>  /  Commercial <input style=""  name="openlease" value="1" type="checkbox" '.$yy.'><br/>
                      Next of Kin :<b>'.stripslashes($rowq['gname']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relationship:<b>'.stripslashes($rowq['grship']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel No:<b>'.stripslashes($rowq['gphone']).'</b><br/>
                      Monthly Rent: <b>'.number_format(floatval($rowx['rent']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Value Added Tax (V.A.T): <b>'.number_format(floatval($vat),2).'</b><br/>
                      Garbage Fee Per Month: <b>'.number_format(floatval($rowq['garbage']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Security Fee per Month: <b>'.number_format(floatval($rowq['security']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electricity Fee per Month: <b>'.number_format(floatval($rowq['electricity']),2).'</b><br/>
                      Water Fee Per Month: <b>'.number_format(floatval($rowq['water']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Bills payable per Month: <b>'.number_format(floatval($payables),2).'</b><br/>
                      Rent Deposit :<b>'.number_format(floatval($rowx['rentdep']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rent deposit paid for: <b>'.stripslashes($rowx['depmonths']).'</b> Month(s) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Garbage Deposit :<b>'.number_format(floatval($rowx['garbagedep']),2).'</b><br/>
                      Water Deposit :<b>'.number_format(floatval($rowx['waterdep']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Water Meter No: <b>'.$watermeter.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Water Meter Reading: <b>'.stripslashes($rowx['waterreading']).'</b><br/>

                      Electricity Deposit :<b>'.number_format(floatval($rowx['elecdep']),2).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electricitiy Meter No: <b>'.$elecmeter.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electricity Meter Reading: <b>'.stripslashes($rowx['elecreading']).'</b><br/>
                      Total deposit Payable :<b>'.number_format(floatval($totaldep),2).'</b>
                      <b>
                    

                      
                  
                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><B>TERMS AND CONDITIONS </b></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                       
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"><b>1.&nbsp;&nbsp;&nbsp</b>The period of the lease shall be open commencing the date of the execution of this agreement, until terminated by either party giving the other two months notice in writing.
                     
                      </div>
                      </div>

                       <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">2.&nbsp;&nbsp;&nbsp</b>The lessor or his/her agents, servants may give two months notice, to review the monthly rent.</b></p>
                    
                     
                      </div>
                      </div>

                  

                     <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">3.&nbsp;&nbsp;&nbsp</b>All billes are due on <b>'.stripslashes($rowx['payabledate']).'</b> of every month, failure to which it will be treated as default.</b></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>4.&nbsp;&nbsp;&nbsp</b>All bills are payable to <b>'.$comname.'</b>.</p>
                    
                     
                      </div>
                      </div>

                     <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp</b>A/C Number: <b>'.$comacno.'</b>&nbsp;&nbsp;&nbsp;&nbsp;Bank: <b>'.$combank.'</b>&nbsp;&nbsp;&nbsp;&nbsp;Branch: <b>'.$combranch.'</b></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>6.&nbsp;&nbsp;&nbsp</b>All bills paid after <b>'.stripslashes($rowx['pendate']).'th</b> of every month shall attract penalty of <b>'.stripslashes($rowx['penpercent']).'%</b> of payable rent.</b></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>7.&nbsp;&nbsp;&nbsp</b>Utilizing of rent deposit is not acceptable, rent deposit shall cushion the repair of broken items.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>8.&nbsp;&nbsp;&nbsp</b>Failure to pay by <b>'.stripslashes($rowx['payabledate']).'</b> of every month you risk been locked out of the premises, until rent and penalties are paid in full.</p>
                    
                     
                      </div>
                      </div>

                     <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>9.&nbsp;&nbsp;&nbsp</b>Notice by the lessor to vacate the said premises should be one calendar month or payment of equivalent rent in lieu of notice.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>10.&nbsp;&nbsp;&nbsp</b>All money paid by the lessor shall be deemed paid upon production of genuine bank deposit slip and issuance of a receipt by <b>'.$comname.'</b>.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>11.&nbsp;&nbsp;&nbsp</b>The Premise shall be used exclusively for <b>'.stripslashes($rowx['rescom']).'</b> purposes only.</p>
                    
                     
                      </div>
                      </div>


                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>12.&nbsp;&nbsp;&nbsp</b>Subletting is not allowed.</p>
                    
                     
                      </div>
                      </div>



                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>13.&nbsp;&nbsp;&nbsp</b>Water and electricity may be disconnected, if any bill falls into arrears.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>14.&nbsp;&nbsp;&nbsp</b>Money paid for rent is not refundable.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>15.&nbsp;&nbsp;&nbsp</b>On execution of this agreement I the lessor hereby accept all payment shall be forwarded to the lessee by the agent and any claims and liabilities shall be borne by the lesser.</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>16.&nbsp;&nbsp;&nbsp</b>I authorize <b>'.$comname.'</b> to share my default information with credit reference bureau and to access my credit profile for purposes of our engagements.</p>
                    
                     
                      </div>
                      </div>

                       <div class="form-group">
                    
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left"><b>17.&nbsp;&nbsp;&nbsp</b>16% Value Added Tax (V.A.T) is chargeable where applicable.</p>
                    
                     
                      </div>
                      </div>


                      
                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">We the parties agree and acknowledge receipt and acceptance of the above terms of the lease agreement.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">Lessee(signed)..................................................................&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbspDate....................................................................................</p>
                      </div>
                      </div>

                      

                      <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">Lessor(signed)....................................................................&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbspDate..........................................................................</p>
                      </div>
                      </div>


                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">For and on behalf of <b>'.$comname.'</b></p>
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">NAME...................................................................................................................................................................................................................</p>
                      </div>
                      </div>

                      

                      <div class="form-group">
                     
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left">SIGNED....................................................................&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbspDate...............................................................................................................</p>
                      </div>
                      </div>

                     

                  


                     
                      


                      <div class="form-actions-condensed wizard"> </div>
                    </form>
                  </div>';
                  

break;


case 1.2:
$lof=$_GET['rcptno'];
$resultx =mysql_query("select * from lof where id='".$lof."' limit 0,1");
$rowx=mysql_fetch_array($resultx);

?>
<style>
.form-group{margin-bottom: 0px;
           }

</style>

<?php


echo'               <div class="panel-body" style="width:740px"><form class="form-horizontal" action="#" role="form">
                    <div style="clear:both; margin-bottom:10px"></div>
                     
                       <p style="text-align:center">
                       
                      
                          
                      <p style="text-align:center"><b><u>REPUBLIC OF KENYA</u></b></P>
                      <p style="text-align:center;font-size:12px;"><b><u>REGISTERED LANDS ACT (CAP 300)</u></b></P>
                      <p style="text-align:center;font-size:12px;"><b>LEASE AGREEMENT</b></P>
                       <div class="col-sm-12 controls" style="float:left">
                      
                      
                    
                      <div class="lofdiv">
                       <div class="form-group">
                       <p style="text-align:left"><b>1.&nbsp;&nbsp;&nbsp<b> DATE:        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp  _________________ day of________________________________________________________2017</b></p>
                      </div>
                       </div>
                      </div>

                    
                    

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:center">
                      <p style="text-align:left">&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp<b>THE LANDLORD:</b></p>
                      <p style="margin-left:300px;"> '.$comname.'<br/></p>
                     <p style="margin-left:300px;">P.O Box '.$comadd.'<br/></p>
                      <p style="margin-left:300px;">'.$comloc.'.</b><br/></b> </p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:center">
                      <p style="text-align:left">&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp<b>TENANT:</b></p>
                      <p style="margin-left:300px;"> '.stripslashes($rowx['bname']).'<br/></p>
                       <p style="margin-left:300px;">ID #:&nbsp;&nbsp;&nbsp&nbsp________________________<br></p>
                       <p style="margin-left:300px;">PIN #:&nbsp;&nbsp________________________<br></p>
                      <p style="margin-left:300px;">P.O Box '.$comadd.'<br/></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE BUILDING:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">The Building known as <B>'.$comname.' </B> constructed on L.R 4953/1923 comprising of 0.1000 of a hectare held by the LandLord as lease from the Government of Kenya under the provision of a grant
                      registered as I.R 5167 subject to the annual rent of shilling 2,400/= (reversible) and such matters as are reffererd in the grant.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE PREMISES:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is of '.stripslashes($rowx['location']).' of the building, House Number  '.stripslashes($rowx['roomno']).'.</p>
                      </div>
                      </div>

                       <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE TERM:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is of  '.stripslashes($rowx['leaseterm']).' year(s) from and including the <b>'.stripslashes($rowx['commencedate']).'</b> day of 2017.</p>
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE RENT:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is KES  <b>'.number_format(stripslashes($rowx['rent'])).'</b>  per month inclusive of VAT.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>2.&nbsp;&nbsp;&nbsp;<b><U> GRAND OF SALE:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Landlord lease to the Memberfor the Term the Premises together with the rights specified hereinafter but excepting and reserving to the Landlord the rights specified herein subject to all rights, easements, privileges, restrictions, covenants, and stipulations of whatever nature affecting the Premises and subject to the payment to the Landlord the Rent payable without any deduction as follows: </p>
                     
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">i.  Kenya Shillings<b>'.stripslashes($rowx['depmonths']).'</b> being '.number_format(stripslashes($rowx['depamount'])).' months’ Rent deposit and Kenya Shillings five-thousand (KES 5,000/=) being deposit for water and maintenance to be held by the Landlord as security for observation and performance by the Memberof the Terms and conditions of this lease and to be refunded to the Memberwithout interest at the expiry of the lease. Provided always that the said deposit shall not be applied as Rent.</P>
                       </div>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">ii.  Kenya Shillings  <b>'.number_format(stripslashes($rowx['rent'])).'</b> being Rent for..................... 2017 paid in advance upon execution of this lease and thereafter on or before the fifth (5th) day of each month.</p>
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">iii.  By way of further rent the service charge payable in accord with the lease.</p>
                     

                      </div>

                      </div>
                      </div>

                       <div class="form-group">
                      <p style="text-align:left"><b>3.&nbsp;&nbsp;&nbsp;<b><U>THE TENENT COVENANT:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Membercovenants with the Landlord:</P>
                     
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> a) To pay the Rent on the day and in the manner set out in this lease not to exercise or seek to exercise any right to claim to withhold Rent or any right or claim to legal or equitable set off and, if so required by the Landlord to make such payments by banker’s order to the bank and account which the Landlord may from time to time nominate.</P>
                       </div>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  To pay and indemnify the Landlord against Value Added Tax or any tax of a similar nature which may be substituted for it or levied in addition to it chargeable in respect of any payment made by the Memberunder any of the Terms of or in connection with this lease or in respect of any payment made by the Landlord where the Memberagrees in this lease to reimburse the Landlord for such payment.</p>
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  To pay to the suppliers and to indemnify the Landlord against all charges for electricity, telephone, water, and other services consumed at all in relation to the Premises. (Water Meter:'.stripslashes($rowx['water']).' / Current Reading: ..........)</p>
                     
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  To repair the Premises and keep them in repair excepting damages caused by an insured risks other than where the insurance money is irrecoverable in consequence of any act or default of the Memberor anyone at the Premises expressly or by implication with Tenant’s authority.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">e)  To clean the Premises and keep them in clean condition.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">f)  In the third year and in the last year of the Term to redecorate the Premises in a good and workmanlike manner with appropriate materials of good quality to the satisfaction of the Landlord. Any change in the colours and patterns of such decoration to be approved by the Landlord.</p>
                      </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">g)  Not to commit waste nor make any addition or alteration to the Premises provided that with the consent of the Landlord the Membermay install internal demountable partition which shall be approved by the Landlord and removed at the expiration of the Term if required by the Landlord and any damage to the Premises caused by the removal of made good.

                       </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">h)  To permit the Landlord to enter on the Premises for the purpose of ascertaining that the covenants and condition of this lease have been observed and performed and to carry out immediately all work required to comply with any notice given by the Landlord to the Memberspecifying any repairs, maintenance, cleaning, or decoration which the Memberhas failed to execute in breach of the Terms of the lease.</p>
                      </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                                        i)  Not to transfer, charge, sub-let, part, or share possession of the Premises provided that any allotment or transfer of shares in the Memberwhereby control of the Memberis altered shall constitute a transfer.
                                     </p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">j)  Not to do or to allow to remain on the Premises anything which in the opinion of the Landlord may be or become or cause a nuisance, annoyance, disturbance, inconvenience, injury, or damage to the Landlord, his members, or owners, or occupiers of the neighbouring premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">k)  To observe and perform the additional covenants.</p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">l) The Memberagrees with the Landlord:</p>
                        <div class="col-sm-12 controls" style="float:left">
                        <p style="text-align:left">a. To comply with all the requirements and recommendations of the insurers;</p>

                        <p style="text-align:left">b. Not to do or omit anything which could cause any policy of insurance on or in relation to the Premises to become void or voidable wholly or in part nor anything by which additional insurance premiums may become payable;</p>

                       <p style="text-align:left">c.  To keep the Premises supplied with fire fighting equipment as the insurers may require and to maintain such equipment efficient working order;</p>

                         <p style="text-align:left">d.  Not to store or bring on the Premises any article, substance or liquid of a specially combustible, inflammable or explosive nature;</p>
                           <p style="text-align:left">e.   To give notice to the Landlord immediately on the happening of any event that might affect any insurance policy on or relating to the Premises.</p>
                            
                       </div>
                        </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">m)  Not to affix to nor exhibit on the outside of the Premises or any window of the Premises or anywhere in the common parts any name-plate, sign, notice, or advertisement except in accordance with the relative provision in the First Schedule.</p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                       n)  Within seven days of receipt to produce to the Landlord any notice, direction, order, or proposal for the Premises made, given or issued to the Memberby any competent authority and without delay to take all necessary steps to comply with the notice, direction, or order and, at the request of the Landlord but at the cost of the Tenant, to make or join with the Landlord in making such objection or representation in respect of any notice, direction, order, or proposal as the Landlord shall deem expedient.
                       </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                       o) To give notice to the Landlord of any defect in the Premises which might give rise to an obligation on the Landlord to do or refrain from doing any act or thing to comply with the provisions of this lease or the duty of care imposed on the Landlord pursuant to the provisions of any law and at all times to display and maintain all notices which the Landlord may from time to time require to be displayed on the Premises.
                        </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">p)  To be responsible for and keep the Landlord fully indemnified against all damages losses, cost expenses, auction demands proceedings, claims, and liabilities made against or suffered or incurred by Landlord arising directly or indirectly out of any act, omission, or negligence of the Tenant, authority or out of any breach or non-observance by the Memberof the covenants condition or other provision of this lease.</p>
                      </div>


                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">q)  In the event of failure to pay the Rent of any other sum due under this lease within the due date whether formally demanded or not to pay the Landlord interest at the rate of 10% on the overdue amount from the due date to the date of actual payment provided that nothing in this covenant shall entitle as the Memberto withhold or delay any payment of the Rent or any other sum due under this lease after the date in which it falls due or in any way prejudice or affect the rights of the Landlord of the contained in this lease including the proviso for re-entry</p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">r)  In the event of failure to pay the Rent of any other sum due under this lease within seven days of the due date whether formally demanded or not to pay the Landlord interest at the rate of 20% on the overdue amount from the due date to the date of actual payment provided that nothing in this covenant shall entitle as the Memberto withhold or delay any payment of the Rent or any other sum due under this lease after the date in which it falls due or in any way prejudice or affect the rights of the Landlord of the contained in this lease including the proviso for re-entry.

                       </p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">s)  At the expiration of the Term to yield up the Premises in repair and in accordance with the Terms of this lease and to give up all keys of the Premises to the Landlord.</p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">t)  To pay the fees and disbursements of the Landlord’s advocates and all other costs and expenses incurred by the Landlord in relation to the preparation, execution, and registration of this lease and the stamp duty therein.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">u)  To pay to the Landlord on an indemnity basis all costs, fees, charges, disbursements and expenses incurred by the Landlord in relation or incidental to every application made by the Memberfor a consent or license required by the provisions of this lease or in relation incidental to the recovery or attempted recovery of Rent or other sums due from the Tenant.</p>
                      </div>

                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>4.&nbsp;&nbsp;&nbsp;<b><U>THE LANDLORD COVENANT:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Landlord covenants with the Tenant:</P>
                      
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                         a) To permit the Memberpeaceably and quietly to hold and enjoy the Premises without any interruption or disturbance from or by the Landlord or any person claiming under or in trust for the Landlord.
                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  To maintain and repair the structure of the Building.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  To maintain and repair the outer half severed medially of all internal non-load-bearing walls dividing the Premises from other parts of the Building.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  The Landlord will insure the Building and maintain the insurance unless it is vitiated by any act of the Memberor by anyone at the Building expressly or by implication with the Tenant’s authority.</p>
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;<b><U>PROVISIONS</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">Provisions of this lease:</P>
                      
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                         a) If and whenever during the Term the Rent or any part of them is outstanding for fourteen (14) days after becoming due whether formally demanded or not or there is a breach by the Memberof any covenant or other Terms of the lease the Landlord may re-enter the Premises or any part of them in the name of the whole at any time and even if any previous right of re-entry has been waived and then the Term will absolutely cease but without prejudice to any rights or remedies which may have accrued to the Landlord against the Members in respect of any breach of covenant or other Term of this lease including the breach in respect of which the re-entry is made.
                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  Each of the Membercovenants shall remain in full force notwithstanding that the Landlord shall have temporarily waived or released any such covenant.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  This lease embodies the entire understanding of the parties relating to the Premises and to all matters dealt with by any of the provisions of this lease.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  Any party wishing to terminate the lease herein before the expiry of the Term may do so by giving the other one (1) month notice in writing, proof of posting or dispatched shall be deemed to be proof of receipt and therefore the deposit shall be refunded to the Tenant.</p>
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>6.&nbsp;&nbsp;&nbsp;<b><U>ACCEPTANCE:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">
                       The Memberaccepts this lease subject to its covenants, conditions, restrictions, and stipulations.
                      </P>
                          
                      <p style="text-align:center"><b>FIRST SCHEDULE</b></P>
                      <p style="text-align:center;font-size:12px;"><b>Rights Granted</b></P>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                        
                          1.  The right for  the Memberand all persons expressly or by implication authorized by a Tenant, in common with the Landlord and all other persons having a like right, to use the common parts for all proper purposes in connection with the use and enjoyment of the Premises.

                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">2.  The right for the Memberand all persons expressly or by implication authorized by the Tenant, with all the other Members on the same floor of the Building as the Premises having a like right, to use the shared parts for all proper purposes in connection with the use and enjoyment of the Premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">3.  The right in common with the Landlord and all other persons having a like right, to the free and uninterrupted passage and running, subject to temporary interruption for repair, alteration or replacement, of water, sewage, electricity, telephone, and other services or laid in, on, over or under other parts of the Building and which serve the Premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">4.  The right of support and protection for the benefit of the Premises as is now enjoyed from all other parts of the Building.</p>
                      </div>
                     
                     <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">5.  The right to display in the reception area of the Building and immediately outside the entrance to the Premises a name-plate or sign in a position and of a size and type specified by the Landlord showing the Tenant’s name and other details approved by the Landlord.</p>
                      </div>

                     <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">6.  The right in cases of emergency only for the Memberand persons expressly or by implication authorized by the Tenant, to break and enter any lettable area and to have a right of way over such lettable area in order to gain access to any fire escapes of the Building.</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>IN WITNESS WHERE OF<b> the parties have put their hand on this agreement on the day month and year aforeto mentioned.</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>SIGNED<b> by the Landlord:&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp <b>NJOWAMBU (K) LTD<b></p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp)&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp---------------------------------------------------</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>


                      <div class="form-group">
                      <p style="text-align:left"><b>SIGNED<b> by the Tenant:&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp </p>
                      </div>
                       
                       <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp)&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp---------------------------------------------------</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><U>DRAWN BY:</U></p>

                      <p style="text-align:left">M/S J. K. Ngaruiya & Co. Advocates</p>
                      <p style="text-align:left">View Point House, 1st Floor</p>
                      <p style="text-align:left">Uhuru Street, Thika, Kenya</p>
                      <p style="text-align:left">P. O. Box 1042-01000</p>
                      </div>


                      


                     
                      


                      <div class="form-actions-condensed wizard"> </div>
                    </form>
                  </div>';
                  

break;


case 1.3:
$lof=$_GET['rcptno'];
$resultx =mysql_query("select * from lof where id='".$lof."' limit 0,1");
$rowx=mysql_fetch_array($resultx);

?>
<style>
.form-group{margin-bottom: 0px;
           }

</style>

<?php


echo'               <div class="panel-body" style="width:740px"><form class="form-horizontal" action="#" role="form">
                    <div style="clear:both; margin-bottom:10px"></div>
                     
                       <p style="text-align:center">
                       
                      
                          
                      <p style="text-align:center"><b><u>REPUBLIC OF KENYA</u></b></P>
                      <p style="text-align:center;font-size:12px;"><b><u>REGISTERED LANDS ACT (CAP 300)</u></b></P>
                      <p style="text-align:center;font-size:12px;"><b>LEASE AGREEMENT</b></P>
                       <div class="col-sm-12 controls" style="float:left">
                      
                      
                    
                      <div class="lofdiv">
                       <div class="form-group">
                       <p style="text-align:left"><b>1.&nbsp;&nbsp;&nbsp<b> DATE:        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp  _________________ day of________________________________________________________2017</b></p>
                      </div>
                       </div>
                      </div>

                    
                    

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:center">
                      <p style="text-align:left">&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp<b>THE LANDLORD:</b></p>
                      <p style="margin-left:300px;"> '.$comname.'<br/></p>
                     <p style="margin-left:300px;">P.O Box '.$comadd.'<br/></p>
                      <p style="margin-left:300px;">'.$comloc.'.</b><br/></b> </p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:center">
                      <p style="text-align:left">&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp<b>TENANT:</b></p>
                      <p style="margin-left:300px;"> '.stripslashes($rowx['bname']).'<br/></p>
                       <p style="margin-left:300px;">ID #:&nbsp;&nbsp;&nbsp&nbsp________________________<br></p>
                       <p style="margin-left:300px;">PIN #:&nbsp;&nbsp________________________<br></p>
                      <p style="margin-left:300px;">P.O Box '.$comadd.'<br/></p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE BUILDING:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">The Building known as <B>'.$comname.' </B> constructed on L.R 4953/1923 comprising of 0.1000 of a hectare held by the LandLord as lease from the Government of Kenya under the provision of a grant
                      registered as I.R 5167 subject to the annual rent of shilling 2,400/= (reversible) and such matters as are reffererd in the grant.
                      </p>
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE PREMISES:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is of '.stripslashes($rowx['location']).' of the building, House Number  '.stripslashes($rowx['roomno']).'.</p>
                      </div>
                      </div>

                       <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE TERM:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is of  '.stripslashes($rowx['leaseterm']).' year(s) from and including the <b>'.stripslashes($rowx['commencedate']).'</b> day of 2017.</p>
                      </div>
                      </div>

                      <div class="form-group">
                     
                      <p style="text-align:left"><b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE RENT:</b></p>
                      </div>
                       <div class="col-sm-12 controls" >
                      <p style="margin-left:300px;">Is KES  <b>'.number_format(stripslashes($rowx['rent'])).'</b>  per month inclusive of VAT.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>2.&nbsp;&nbsp;&nbsp;<b><U> GRAND OF SALE:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Landlord lease to the Memberfor the Term the Premises together with the rights specified hereinafter but excepting and reserving to the Landlord the rights specified herein subject to all rights, easements, privileges, restrictions, covenants, and stipulations of whatever nature affecting the Premises and subject to the payment to the Landlord the Rent payable without any deduction as follows: </p>
                     
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">i.  Kenya Shillings<b>'.stripslashes($rowx['depmonths']).'</b> being '.number_format(stripslashes($rowx['depamount'])).' months’ Rent deposit and Kenya Shillings five-thousand (KES 5,000/=) being deposit for water and maintenance to be held by the Landlord as security for observation and performance by the Memberof the Terms and conditions of this lease and to be refunded to the Memberwithout interest at the expiry of the lease. Provided always that the said deposit shall not be applied as Rent.</P>
                       </div>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">ii.  Kenya Shillings  <b>'.number_format(stripslashes($rowx['rent'])).'</b> being Rent for..................... 2017 paid in advance upon execution of this lease and thereafter on or before the fifth (5th) day of each month.</p>
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">iii.  By way of further rent the service charge payable in accord with the lease.</p>
                     

                      </div>

                      </div>
                      </div>

                       <div class="form-group">
                      <p style="text-align:left"><b>3.&nbsp;&nbsp;&nbsp;<b><U>THE TENENT COVENANT:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Membercovenants with the Landlord:</P>
                     
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> a) To pay the Rent on the day and in the manner set out in this lease not to exercise or seek to exercise any right to claim to withhold Rent or any right or claim to legal or equitable set off and, if so required by the Landlord to make such payments by banker’s order to the bank and account which the Landlord may from time to time nominate.</P>
                       </div>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  To pay and indemnify the Landlord against Value Added Tax or any tax of a similar nature which may be substituted for it or levied in addition to it chargeable in respect of any payment made by the Memberunder any of the Terms of or in connection with this lease or in respect of any payment made by the Landlord where the Memberagrees in this lease to reimburse the Landlord for such payment.</p>
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  To pay to the suppliers and to indemnify the Landlord against all charges for electricity, telephone, water, and other services consumed at all in relation to the Premises. (Water Meter:'.stripslashes($rowx['water']).' / Current Reading: ..........)</p>
                     
                      </div>
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  To repair the Premises and keep them in repair excepting damages caused by an insured risks other than where the insurance money is irrecoverable in consequence of any act or default of the Memberor anyone at the Premises expressly or by implication with Tenant’s authority.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">e)  To clean the Premises and keep them in clean condition.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">f)  In the third year and in the last year of the Term to redecorate the Premises in a good and workmanlike manner with appropriate materials of good quality to the satisfaction of the Landlord. Any change in the colours and patterns of such decoration to be approved by the Landlord.</p>
                      </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">g)  Not to commit waste nor make any addition or alteration to the Premises provided that with the consent of the Landlord the Membermay install internal demountable partition which shall be approved by the Landlord and removed at the expiration of the Term if required by the Landlord and any damage to the Premises caused by the removal of made good.

                       </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">h)  To permit the Landlord to enter on the Premises for the purpose of ascertaining that the covenants and condition of this lease have been observed and performed and to carry out immediately all work required to comply with any notice given by the Landlord to the Memberspecifying any repairs, maintenance, cleaning, or decoration which the Memberhas failed to execute in breach of the Terms of the lease.</p>
                      </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                                        i)  Not to transfer, charge, sub-let, part, or share possession of the Premises provided that any allotment or transfer of shares in the Memberwhereby control of the Memberis altered shall constitute a transfer.
                                     </p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">j)  Not to do or to allow to remain on the Premises anything which in the opinion of the Landlord may be or become or cause a nuisance, annoyance, disturbance, inconvenience, injury, or damage to the Landlord, his members, or owners, or occupiers of the neighbouring premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">k)  To observe and perform the additional covenants.</p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">l) The Memberagrees with the Landlord:</p>
                        <div class="col-sm-12 controls" style="float:left">
                        <p style="text-align:left">a. To comply with all the requirements and recommendations of the insurers;</p>

                        <p style="text-align:left">b. Not to do or omit anything which could cause any policy of insurance on or in relation to the Premises to become void or voidable wholly or in part nor anything by which additional insurance premiums may become payable;</p>

                       <p style="text-align:left">c.  To keep the Premises supplied with fire fighting equipment as the insurers may require and to maintain such equipment efficient working order;</p>

                         <p style="text-align:left">d.  Not to store or bring on the Premises any article, substance or liquid of a specially combustible, inflammable or explosive nature;</p>
                           <p style="text-align:left">e.   To give notice to the Landlord immediately on the happening of any event that might affect any insurance policy on or relating to the Premises.</p>
                            
                       </div>
                        </div>


                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">m)  Not to affix to nor exhibit on the outside of the Premises or any window of the Premises or anywhere in the common parts any name-plate, sign, notice, or advertisement except in accordance with the relative provision in the First Schedule.</p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                       n)  Within seven days of receipt to produce to the Landlord any notice, direction, order, or proposal for the Premises made, given or issued to the Memberby any competent authority and without delay to take all necessary steps to comply with the notice, direction, or order and, at the request of the Landlord but at the cost of the Tenant, to make or join with the Landlord in making such objection or representation in respect of any notice, direction, order, or proposal as the Landlord shall deem expedient.
                       </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">
                       o) To give notice to the Landlord of any defect in the Premises which might give rise to an obligation on the Landlord to do or refrain from doing any act or thing to comply with the provisions of this lease or the duty of care imposed on the Landlord pursuant to the provisions of any law and at all times to display and maintain all notices which the Landlord may from time to time require to be displayed on the Premises.
                        </p>
                      </div>

                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">p)  To be responsible for and keep the Landlord fully indemnified against all damages losses, cost expenses, auction demands proceedings, claims, and liabilities made against or suffered or incurred by Landlord arising directly or indirectly out of any act, omission, or negligence of the Tenant, authority or out of any breach or non-observance by the Memberof the covenants condition or other provision of this lease.</p>
                      </div>


                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">q)  In the event of failure to pay the Rent of any other sum due under this lease within the due date whether formally demanded or not to pay the Landlord interest at the rate of 10% on the overdue amount from the due date to the date of actual payment provided that nothing in this covenant shall entitle as the Memberto withhold or delay any payment of the Rent or any other sum due under this lease after the date in which it falls due or in any way prejudice or affect the rights of the Landlord of the contained in this lease including the proviso for re-entry</p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">r)  In the event of failure to pay the Rent of any other sum due under this lease within seven days of the due date whether formally demanded or not to pay the Landlord interest at the rate of 20% on the overdue amount from the due date to the date of actual payment provided that nothing in this covenant shall entitle as the Memberto withhold or delay any payment of the Rent or any other sum due under this lease after the date in which it falls due or in any way prejudice or affect the rights of the Landlord of the contained in this lease including the proviso for re-entry.

                       </p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">s)  At the expiration of the Term to yield up the Premises in repair and in accordance with the Terms of this lease and to give up all keys of the Premises to the Landlord.</p>
                      </div>

                        <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">t)  To pay the fees and disbursements of the Landlord’s advocates and all other costs and expenses incurred by the Landlord in relation to the preparation, execution, and registration of this lease and the stamp duty therein.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">u)  To pay to the Landlord on an indemnity basis all costs, fees, charges, disbursements and expenses incurred by the Landlord in relation or incidental to every application made by the Memberfor a consent or license required by the provisions of this lease or in relation incidental to the recovery or attempted recovery of Rent or other sums due from the Tenant.</p>
                      </div>

                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>4.&nbsp;&nbsp;&nbsp;<b><U>THE LANDLORD COVENANT:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">The Landlord covenants with the Tenant:</P>
                      
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                         a) To permit the Memberpeaceably and quietly to hold and enjoy the Premises without any interruption or disturbance from or by the Landlord or any person claiming under or in trust for the Landlord.
                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  To maintain and repair the structure of the Building.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  To maintain and repair the outer half severed medially of all internal non-load-bearing walls dividing the Premises from other parts of the Building.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  The Landlord will insure the Building and maintain the insurance unless it is vitiated by any act of the Memberor by anyone at the Building expressly or by implication with the Tenant’s authority.</p>
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>5.&nbsp;&nbsp;&nbsp;<b><U>PROVISIONS</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">Provisions of this lease:</P>
                      
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                         a) If and whenever during the Term the Rent or any part of them is outstanding for fourteen (14) days after becoming due whether formally demanded or not or there is a breach by the Memberof any covenant or other Terms of the lease the Landlord may re-enter the Premises or any part of them in the name of the whole at any time and even if any previous right of re-entry has been waived and then the Term will absolutely cease but without prejudice to any rights or remedies which may have accrued to the Landlord against the Members in respect of any breach of covenant or other Term of this lease including the breach in respect of which the re-entry is made.
                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">b)  Each of the Membercovenants shall remain in full force notwithstanding that the Landlord shall have temporarily waived or released any such covenant.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">c)  This lease embodies the entire understanding of the parties relating to the Premises and to all matters dealt with by any of the provisions of this lease.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">d)  Any party wishing to terminate the lease herein before the expiry of the Term may do so by giving the other one (1) month notice in writing, proof of posting or dispatched shall be deemed to be proof of receipt and therefore the deposit shall be refunded to the Tenant.</p>
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>6.&nbsp;&nbsp;&nbsp;<b><U>ACCEPTANCE:</U></p>
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">
                       The Memberaccepts this lease subject to its covenants, conditions, restrictions, and stipulations.
                      </P>
                          
                      <p style="text-align:center"><b>FIRST SCHEDULE</b></P>
                      <p style="text-align:center;font-size:12px;"><b>Rights Granted</b></P>
                       <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left"> 
                        
                          1.  The right for  the Memberand all persons expressly or by implication authorized by a Tenant, in common with the Landlord and all other persons having a like right, to use the common parts for all proper purposes in connection with the use and enjoyment of the Premises.

                         </P>
                      
                        </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">2.  The right for the Memberand all persons expressly or by implication authorized by the Tenant, with all the other Members on the same floor of the Building as the Premises having a like right, to use the shared parts for all proper purposes in connection with the use and enjoyment of the Premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">3.  The right in common with the Landlord and all other persons having a like right, to the free and uninterrupted passage and running, subject to temporary interruption for repair, alteration or replacement, of water, sewage, electricity, telephone, and other services or laid in, on, over or under other parts of the Building and which serve the Premises.</p>
                      </div>

                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">4.  The right of support and protection for the benefit of the Premises as is now enjoyed from all other parts of the Building.</p>
                      </div>
                     
                     <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">5.  The right to display in the reception area of the Building and immediately outside the entrance to the Premises a name-plate or sign in a position and of a size and type specified by the Landlord showing the Tenant’s name and other details approved by the Landlord.</p>
                      </div>

                     <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">6.  The right in cases of emergency only for the Memberand persons expressly or by implication authorized by the Tenant, to break and enter any lettable area and to have a right of way over such lettable area in order to gain access to any fire escapes of the Building.</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>IN WITNESS WHERE OF<b> the parties have put their hand on this agreement on the day month and year aforeto mentioned.</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><b>SIGNED<b> by the Landlord:&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp <b>NJOWAMBU (K) LTD<b></p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp)&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp---------------------------------------------------</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>


                      <div class="form-group">
                      <p style="text-align:left"><b>SIGNED<b> by the Tenant:&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp </p>
                      </div>
                       
                       <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp)&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp---------------------------------------------------</p>
                      </div>
                        <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>
                      <div class="form-group">
                      <p style="text-align:center">)</p>
                      </div>

                      <div class="form-group">
                      <p style="text-align:left"><U>DRAWN BY:</U></p>

                      <p style="text-align:left">M/S J. K. Ngaruiya & Co. Advocates</p>
                      <p style="text-align:left">View Point House, 1st Floor</p>
                      <p style="text-align:left">Uhuru Street, Thika, Kenya</p>
                      <p style="text-align:left">P. O. Box 1042-01000</p>
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
$rno=stripslashes($row['kpano']);
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
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:14px;">MEMBER <?php  echo $doctitle ?></p>
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
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:14px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;MemberName: <?php  echo $bname ?><BR/>KPA No: <?php  echo $rno ?>&nbsp; &nbsp;&nbsp;&nbsp;<?php  echo $doctitle ?> No: <?php  echo $invno ?></p>
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
$xx=0;$vat=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$evat=stripslashes($row['vat']);
$xx+=stripslashes($row['invamount']);
$vat+=$evat;
$eamount=stripslashes($row['invamount'])-$evat; 
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
    <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs($eamount) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } 



?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
   <td style="width:50%;border-width:0px; border-color:#666; border-style:solid;"></td>
   <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;">VAT</td>
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
$entrydate=stripslashes($row['datestamp']);

$result =mysql_query("select * from tenants where tid='".$tid."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['bname']);
$rno=stripslashes($row['kpano']);
$hname=stripslashes($row['hname']);
//override bal
$curbal=stripslashes($row['bal']);
?>
<style>
body,p{
 font-weight:normal; text-transform:uppercase
}
</style>

<div class="panel-body maindiv" style="width:99%;border:0px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style=" margin:0px 5px 0 5px; position:absolute; max-height:100px"/>
<p style="text-align:center;font-size:18px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:11px">P.O Box <?php  echo $Add ?>&nbsp; &nbsp;&nbsp;&nbsp;Tel: <?php  echo $tel ?>
<br/>Email:<b style="text-transform:lowercase;font-weight:normal;"> <?php  echo $email ?></b> | Web:<b style="text-transform:lowercase;font-weight:normal;"> <?php  echo $web ?></b> </p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:12px;">MEMBER PAYMENT RECEIPT</p>

<div id="barcode" style="display:none;font-size:12px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<!--script type="text/javascript">

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

</script-->
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:11px">Bank Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Entry Date:<?php  echo stamptodate($entrydate) ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;MemberName: <?php  echo $bname ?>&nbsp; &nbsp;&nbsp;&nbsp;MemberNo: <?php  echo $tid ?><BR/>KPA No: <?php  echo $rno ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?></p>
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both"/>
<div style="width:100%;">
<table id="datatable"  style="width:100%;text-align:center;font-size:10px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;padding:0;font-weight:bold;">
      <td  style="width:50%;border-width:0px; border-color:#666; border-style:solid;">Entry Name</td>
      <td  style="width:25%;border-width:0px; border-color:#666; border-style:solid;">Month</td>
      <td  style="width:25%;border-width:0px; border-color:#666; border-style:solid;">Amount</td>
    </tr>


</tbody>
</table>

<div style="clear:both; margin-bottom:10px;border-bottom:2px solid #666"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:20px; font-weight:bold; padding:0; " >
<tbody>
<?php
$result =mysql_query("select * from receipt where rcptno='".$rcptno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$tid=stripslashes($row['tid']);
$xx+=stripslashes($row['amount']);  
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:10px">
    <td style="width:50%;border-width:0px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } 


$result =mysql_query("select * from invoices where tid='".$tid."' and invbal!=0 order by id desc limit 0,1");
$row=mysql_fetch_array($result);
$mon=stripslashes($row['mon']);
if($mon==''){$mon=$month;}


?>


</tbody>
</table>

<div style="clear:both; margin-bottom:10px;border-bottom:2px solid #666"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:20px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:10px">

<td style="width:40%;border-width:0px; border-color:#666; border-style:solid;">AMOUNT PAID</td>
<td style="width:60%;border-width:0px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:10px">
 <td style="width:40%;border-width:0px; border-color:#666; border-style:solid;">IN WORDS</td>
<td style="width:60%;border-width:0px; border-color:#666; border-style:solid;">KShs. <script>document.writeln(toWords(<?php echo $paid?>));</script> ONLY</td>
</tr>

<tr style="width:100%; height:20px;padding:0;  font-weight:bold; font-size:10px">
<td style="width:40%;border-width:0px; border-color:#666; border-style:solid;">OUTSTANDING BALANCE AS OF <?php  echo $mon ?></td>
<td style="width:60%;border-width:0px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></td>
</tr>

</tbody>
</table>

</div>

<div style="clear:both; margin-bottom:10px"></div>

<?php
if($_SESSION['database']=='mwanzop'){
  echo '<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">You can now Pay your bills Via M-PESA Paybill. Business No: 529052 | Account No: '.$tid.'.</p>';
}
?>
<p style="text-align:center;font-size:10px; font-weight:normal;margin:0 0 0 0px">Thank You | Transaction By <?php  echo getuser($user) ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
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
Rate Per Unit<br/>
Total Consumption<br/>
</p>
</div>
<?php $rate=$row['water']/$row['wd']; ?>
<div style="background:#fff;border-right:0px solid #333; border-bottom:1.5px solid #333">
<p style="padding-top:0px;text-align:right;font-size:11px; font-weight:normal;margin:0 5px 0 0px">
<script>document.writeln(( <?php  echo  $rate ?>).formatMoney(2, '.', ','));</script><br/>
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
<a id="toexcel" download="trial_balance.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
  $result =mysql_query("select * from ledgers   order by type, name");
  $num_results = mysql_num_rows($result); 
  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name']));
  }
  $pos=array(array());
  $max=count($arr);
  for ($i = 1; $i < $max; $i++){
    $a=0;$b=0;$c=0;$d=0;
    $resulta =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<='".$d2."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    $dr1=stripslashes($rowa['dr']);
    //if($arr[$i][0]==5){echo $a.'<br/>';}
    
    if($d1!=0){
      $resultb =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<'".$d1."'" );
      $rowb=mysql_fetch_array($resultb);
      $cr2=stripslashes($rowb['cr']);
      $dr2=stripslashes($rowb['dr']);
    }else {
      $cr2=0;
      $dr2=0;
    }
    //if($arr[$i][0]==5){echo $b;}

    
    $cr=$cr1-$cr2;
    $dr=$dr1-$dr2;
    $pos[]=array($arr[$i][0],$arr[$i][1],$cr,$dr,$arr[$i][3]);  
    
    
  }



  $max=count($pos);
  $a=0;$b=0;
  for ($i = 1; $i < $max; $i++){
    $lid=$pos[$i][0];
    $type=$pos[$i][1];
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Expense'||$type=='Asset'){
      $bal = $drbal-$crbal;
      $a+=$bal;
    }
    if($type=='Liability'||$type=='Revenue'||$type=='Equity'){
      $bal = $crbal-$drbal;
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
<a id="toexcel" download="income_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
$result =mysql_query("select * from ledgers  order by type, name");
$num_results = mysql_num_rows($result); 
for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name'])); 
}
$pos=array(array());
$max=count($arr);
for ($i = 1; $i < $max; $i++){
    $a=0;$b=0;$c=0;$d=0;
    $resulta =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<='".$d2."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    $dr1=stripslashes($rowa['dr']);
    //if($arr[$i][0]==5){echo $a.'<br/>';}
    
    if($d1!=0){
      $resultb =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<'".$d1."'" );
      $rowb=mysql_fetch_array($resultb);
      $cr2=stripslashes($rowb['cr']);
      $dr2=stripslashes($rowb['dr']);
    }else {
      $cr2=0;
      $dr2=0;
    }
    //if($arr[$i][0]==5){echo $b;}

    
    $cr=$cr1-$cr2;
    $dr=$dr1-$dr2;
    $pos[]=array($arr[$i][0],$arr[$i][1],$cr,$dr,$arr[$i][3]);  
    
    
  }


$max=count($pos);
$a=0;$c=0;
for ($i = 1; $i < $max; $i++){
  $lid=$pos[$i][0];
  $type=$pos[$i][1];
  $crbal=$pos[$i][2];
  $drbal=$pos[$i][3];
  $name=$pos[$i][4];
  if($type=='Revenue'){
    $bal = $crbal-$drbal;
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
  $crbal=$pos[$i][2];
  $drbal=$pos[$i][3];
  $name=$pos[$i][4];
  if($type=='Expense'){
    $bal = $drbal-$crbal;
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
<a id="toexcel" download="balance_sheet.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>




<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#333;color:#fff ">
  <td style="width:70%;border-width:0.5px; border-color:#666; border-style:solid;">Asset Name</td>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">Kshs.</td>
   </tr>
<?php
  $arr=array(array());
  $result =mysql_query("select * from ledgers order by name");
  $num_results = mysql_num_rows($result); 
  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name']));
  }
  $pos=array(array());
  $max=count($arr);
  for ($i = 1; $i < $max; $i++){
    $a=0;$b=0;$c=0;$d=0;
    $resulta =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<='".$d2."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    $dr1=stripslashes($rowa['dr']);
    //if($arr[$i][0]==5){echo $a.'<br/>';}
    
    if($d1!=0){
      $resultb =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$arr[$i][0]."' and stamp<'".$d1."'" );
      $rowb=mysql_fetch_array($resultb);
      $cr2=stripslashes($rowb['cr']);
      $dr2=stripslashes($rowb['dr']);
    }else {
      $cr2=0;
      $dr2=0;
    }
    //if($arr[$i][0]==5){echo $b;}

    
    $cr=$cr1-$cr2;
    $dr=$dr1-$dr2;
    $pos[]=array($arr[$i][0],$arr[$i][1],$cr,$dr,$arr[$i][3]);  
    
    
  }
  $max=count($pos);

  $e=0;
  for ($i = 1; $i < $max; $i++){
    $lid=$pos[$i][0];
    $type=$pos[$i][1];
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Expense'){
      $bal = $drbal-$crbal;
      $e+=$bal;
    }
  }
  $f=0;
  for ($i = 1; $i < $max; $i++){
    $lid=$pos[$i][0];
    $type=$pos[$i][1];
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Revenue'){
      $bal = $crbal-$drbal;
      $f+=$bal;
    }
  }
  $g=$f-$e;

  $a=0;$u=0;
  for ($i = 1; $i < $max; $i++){
    $lid=$pos[$i][0];
    $type=$pos[$i][1];
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Asset'){
      $bal = $drbal-$crbal;
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
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Liability'){
      $bal = $crbal-$drbal;
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
    $crbal=$pos[$i][2];
    $drbal=$pos[$i][3];
    $name=$pos[$i][4];
    if($type=='Equity'){
      $bal = $crbal-$drbal;
      $c+=$bal;
if($x%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ;cursor:pointer " onclick="window.open(\'report.php?id=36&name='.$lid.$sent.'\')" title="click to view">';}

    if($lid==601){
        $bal+=$g;
      }
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

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($rowa['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);

    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowx['phone'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['name2'])){
  $name2=$_GET['name2'];
}else $name2=0;

$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='invoice_reports';


$activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
}

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:20%;">MemberName</td>
        <td  style="width:15%;">Phone</td>
        <td  style="width:10%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
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


  $max=count($activities);
  for ($x= 0; $x < $max; $x++){
    if($activities[$x][0]==stripslashes($row['actid'])){
      $activities[$x][2]+=preg_replace('~,~', '', stripslashes($row['invamount']));  
      $activities[$x][3]=$activities[$x][2];
    }
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


<div style="float:right;">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Income Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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




case 12.1:

function creditnoteloop($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($rowa['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);

    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowx['phone'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['credno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser($rowa['username']) ?></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['name2'])){
  $name2=$_GET['name2'];
}else $name2=0;

$code=0;
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='creditnote_reports';


$activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
}

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER CREDIT NOTES REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">Phone</td>
        <td  style="width:10%;">Credit No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Username</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from creditnotes");
  }
  else{
  $result =mysql_query("select * from creditnotes  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 
  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['amount'])); 
  $aa+=1;
  }


  $max=count($activities);
  for ($x= 0; $x < $max; $x++){
    if($activities[$x][0]==stripslashes($row['actid'])){
      $activities[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $activities[$x][3]=$activities[$x][2];
    }
  }
  
  creditnoteloop($row,$i,$status,$aa);
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


<div style="float:right;">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Items Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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




case 12.2:

function refundsloop($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($rowa['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);

    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowx['phone'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['refundno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser($rowa['username']) ?></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['name2'])){
  $name2=$_GET['name2'];
}else $name2=0;

$code=0;
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='refunds_reports';


$activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
}

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER REFUNDS REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:20%;">MemberName</td>
        <td  style="width:15%;">Phone</td>
        <td  style="width:10%;">Refund No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Username</td>
    </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from refunds");
  }
  else{
  $result =mysql_query("select * from refunds  where stamp>='".$d1."' and stamp<='".$d2."'");
  }
 
  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['amount'])); 
  $aa+=1;
  }


  $max=count($activities);
  for ($x= 0; $x < $max; $x++){
    if($activities[$x][0]==stripslashes($row['actid'])){
      $activities[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $activities[$x][3]=$activities[$x][2];
    }
  }
  
  refundsloop($row,$i,$status,$aa);
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


<div style="float:right;">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Items Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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

case 13:

function receiptloop($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate($rowa['datestamp']) ?></td>
<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['lname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['refno']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser($rowa['username'])?></td>
</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['name2'])){
  $name2=$_GET['name2'];
}else $name2=0;

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



$activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
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
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER RECEIPTS REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0; font-size:11px" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:7%;">Entry Date</td>
         <td  style="width:7%;">Bank Date</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:5%;">Receipt No</td>
        <td  style="width:5%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:10%;">Pay Mode</td>
         <td  style="width:5%;">Ref No</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:10%;">User Name</td>
    </tr>


<?php


switch($code){

  
  case 0:
  $result =mysql_query("select * from receipt where datestamp='".date('Ymd')."' order by id asc");

  break;

  case 1:
  
  if($d1==0){
  $result =mysql_query("select * from receipt");
  }
  else{
  $result =mysql_query("select * from receipt  where datestamp>='".$d1."' and datestamp<='".$d2."'");
  }
  break;
  
  case 2:
  
  if($d1==0){
  $result =mysql_query("select * from receipt  where hid='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipt  where datestamp>='".$d1."' and datestamp<='".$d2."' and  hid='".$name."'");
  }
  break;

  case 3:
  $xx='';
  //if($name2!='All'){$xx=" and hid='".$name2."'";}
  if($d1==0){
  $result =mysql_query("select * from receipt  where  mon='".$name."' ".$xx."");
  }
  else{
  $result =mysql_query("select * from receipt  where datestamp>='".$d1."' and datestamp<='".$d2."' and  mon='".$name."' ".$xx."");
  }
  break;

  case 4:
  
  if($d1==0){
  $result =mysql_query("select * from receipt  where actid='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipt  where datestamp>='".$d1."' and datestamp<='".$d2."' and actid='".$name."'");
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


  $max=count($activities);
  for ($x= 0; $x < $max; $x++){
    if($activities[$x][0]==stripslashes($row['actid'])){
      $activities[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $activities[$x][3]=$activities[$x][2];
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


<div style="float:right;margin-right:5%">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Income Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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

$activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
}

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUMMARIZED MEMBER INVOICES REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:30%;">MemberName</td>
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
   
      $invno=stripslashes($row['invno']);
      $resultg =mysql_query("select * from invoices  where invno='".$invno."'");
      $num_resultsg = mysql_num_rows($resultg);
      for ($g=0; $g <$num_resultsg; $g++) {
      $rowg=mysql_fetch_array($resultg);
        $max=count($activities);
        for ($x= 0; $x < $max; $x++){
          if($activities[$x][0]==stripslashes($rowg['actid'])){
            $activities[$x][2]+=preg_replace('~,~', '', stripslashes($rowg['invamount']));  
            $activities[$x][3]=$activities[$x][2];
          }
        }

      }

  loopsuminv($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="float:right;">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Income Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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


case 15:

function loopsumrec($rowa,$i,$status,$max,$bal,$recamount){
$aa=$i+1;
$sent='';

$resultx =mysql_query("select * from receipt where rcptno='".stripslashes($rowa['rcptno'])."'");
$rowb=mysql_fetch_array($resultx);



if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate($rowa['datestamp']) ?></td>
<td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowb['lname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowb['refno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['month']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $recamount ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $max ?></td>
<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser($rowa['username']) ?></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

$code=$_GET['code'];




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


  $activities=array(array());
$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$activities[$i]=array(0,0,0,0); 
}



$result =mysql_query("select * from activities order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$activities[$i][1]=stripslashes($row['name']);
$activities[$i][0]=stripslashes($row['id']);
$activities[$i][2]=randomfour();
}

$max=count($activities);
for ($x= 0; $x < $max; $x++){
  $activities[$x][2]==0;
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
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SUMMARIZED MEMBER RECEIPTS REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:8%;">Entry Date</td>
        <td  style="width:8%;">Bank Date</td>
        <td  style="width:10%;">MemberName</td>
        <td  style="width:5%;">Receipt No</td>
        <td  style="width:10%;">Bank</td>
        <td  style="width:5%;">Ref No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:7%;">Bal</td>
        <td  style="width:5%;">Bal Item</td>
        <td  style="width:7%;">Username</td>
    </tr>


<?php

  switch($code){
  case 1:
  if($d1==0){
  $result =mysql_query("select * from receipts  where  drcr='cr' and amount>0");
  }
  else{
  $result =mysql_query("select * from receipts  where datestamp>='".$d1."' and datestamp<='".$d2."' and drcr='cr' and amount>0");
  }
  break;

  case 2:
  if($d1==0){
  $result =mysql_query("select * from receipts  where  drcr='cr' and  username='".$name."' and amount>0");
  }
  else{
  $result =mysql_query("select * from receipts  where datestamp>='".$d1."' and datestamp<='".$d2."' and drcr='cr'  and  username='".$name."' and amount>0");
  }
  break;

  case 3:
  if($d1==0){
  $result =mysql_query("select * from receipts  where  drcr='cr' and paymode='".$name."'");
  }
  else{
  $result =mysql_query("select * from receipts  where datestamp>='".$d1."' and datestamp<='".$d2."' and drcr='cr'  and  paymode='".$name."'");
  }
  break;
  }
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
   

      $recarray=array();
      $rcptno=stripslashes($row['rcptno']);$recamount=0;
      $resultg =mysql_query("select * from receipt  where rcptno='".$rcptno."'");
      $num_resultsg = mysql_num_rows($resultg);
      for ($g=0; $g <$num_resultsg; $g++) {
       $rowg=mysql_fetch_array($resultg);
       $recarray[stripslashes($rowg['actname'])]=stripslashes($rowg['amount']);
       $recamount+=stripslashes($rowg['amount']);
       $mon=stripslashes($rowg['mon']);
       $tid=stripslashes($rowg['tid']);
        $max=count($activities);
        for ($x= 0; $x < $max; $x++){
          if($activities[$x][0]==stripslashes($rowg['actid'])){
            $activities[$x][2]+=preg_replace('~,~', '', stripslashes($rowg['amount']));  
            $activities[$x][3]=$activities[$x][2];
          }
        }

      }


  $max=count($dept);
  for ($x= 0; $x < $max; $x++){
    if($dept[$x][0]==stripslashes($row['paymode'])){
      $dept[$x][2]+=preg_replace('~,~', '', $recamount);  
      $dept[$x][3]=$dept[$x][2];
    }
  }


  $resultb =mysql_query("select SUM(invbal) as dr from invoices where tid = '".$tid."' and mon = '".$mon."'" );
  $rowb=mysql_fetch_array($resultb);
  $bal=stripslashes($rowb['dr']);


  $maxs = array_keys($recarray, max($recarray));
  $a+=preg_replace('~,~', '', $recamount);
  loopsumrec($row,$i,$status,$maxs[0],$bal,$recamount);
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


<div style="float:right;margin-right:5%">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">Income Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($activities);
for ($x= 0; $x < $max; $x++){
    if($activities[$x][3]>0){
    echo"<p style=\"text-align:right; font-weight:bold;margin:0 10px 0 10px\">".$activities[$x][1].": <script>document.writeln((".$activities[$x][3].").formatMoney(2, '.', ','));</script></p>";
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

  $resultx =mysql_query("select * from mainhouses where houseid='".stripslashes($rowa['hid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $fname=stripslashes($rowx['fname']);
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo gettenantphone($rowa['tid']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['paid']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invbal']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['property'])){
  $property=$_GET['property'];
}else $property=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else {$month=0;}

$code=$_GET['code'];

$balonly=$_GET['balonly'];
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
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:5%;">Date</td>
        <td  style="width:10%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:5%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>

<?php
  $x='';$y=$z='';$q='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} if($property!='All'){$y=' and hid='.$property;}if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z."");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$q.$x.$y.$z."");
  }
  

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($row['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $tenstatus=stripslashes($rowx['status']);


  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  invvsrec($row,$i,$status,$aa);
  }
  
  
  }




?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Paid: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 16.1:

function invvsrec($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';

  $resultx =mysql_query("select * from mainhouses where houseid='".stripslashes($rowa['hid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $fname=stripslashes($rowx['fname']);

    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo gettenantphone($rowa['tid']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['paid']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invbal']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['fid'])){
  $fid=$_GET['fid'];
}else $fid=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else $month=0;
$code=$_GET['code'];
$balonly=$_GET['balonly'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$balonly=$_GET['balonly'];

$fname='invoice_vs_receipts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:5%;">Date</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:5%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>


<?php
  $x='';$y=$z='';$q='';$mm='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} 
  if($fid!='All'){


       $result =mysql_query("select * from mainhouses where status=1 and fid='".$fid."'");
       $num_results = mysql_num_rows($result);
       for ($i=0; $i <$num_results; $i++) {
       $rowa=mysql_fetch_array($result);
          if($i==0){
             $mm="hid='".stripslashes($rowa['houseid'])."'";
          }else{
             $mm.=" OR hid='".stripslashes($rowa['houseid'])."'";
          }
     
      }

    $y=' and  ('.$mm.')';

  }else{$y='';}

 
  if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z." order by hname");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$x.$y.$z." order by hname");
  }
  

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($row['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $tenstatus=stripslashes($rowx['status']);


  if($status!=0&&$tenstatus==1){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  invvsrec($row,$i,$status,$aa);
  }
  
 
  }




?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Collected: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 16.2:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['fid'])){
  $fid=$_GET['fid'];
}else $fid=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else $month=0;
$code=$_GET['code'];
$balonly=$_GET['balonly'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$balonly=$_GET['balonly'];

$fname='invoice_vs_receipts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:35%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>


<?php
  $x='';$y=$z='';$q='';$mm='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} 
  if($fid!='All'){


       $result =mysql_query("select * from mainhouses where  status=1 and fid='".$fid."'");
       $num_results = mysql_num_rows($result);
       for ($i=0; $i <$num_results; $i++) {
       $rowa=mysql_fetch_array($result);
          if($i==0){
             $mm="hid='".stripslashes($rowa['houseid'])."'";
          }else{
             $mm.=" OR hid='".stripslashes($rowa['houseid'])."'";
          }
     
      }

    $y=' and  ('.$mm.')';

  }else{$y='';}

 
  if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z." order by hname");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$x.$y.$z." order by hname");
  }
  

  $aa=0;
  $tenarray=array(array());
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  $tid=stripslashes($row['tid']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  }
  $item=' '.stripslashes($row['actname']).'('.stripslashes($row['mon']).')'.'('.stripslashes($row['invbal']).'); ';

  if(isset($tenarray[$tid])){
  $tenarray[$tid][2]=$tenarray[$tid][2].$item;
  $tenarray[$tid][3]=$tenarray[$tid][3]+stripslashes($row['invamount']);
  $tenarray[$tid][4]=$tenarray[$tid][4]+stripslashes($row['paid']);
  $tenarray[$tid][5]=$tenarray[$tid][5]+stripslashes($row['invbal']);

  }else{
    $tenarray[$tid]=array(stripslashes($row['tid']),stripslashes($row['tname']),$item,stripslashes($row['invamount']),stripslashes($row['paid']),stripslashes($row['invbal']),stripslashes($row['hname']),stripslashes($row['rno']));
  }  
  
  
  }

$i=0;$aa=1;
foreach ($tenarray as $key => $val) {

if($key!=''){
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  $tenarray[$key][1] ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  gettenantphone($tenarray[$key][0]) ?></td>
<td  style="width:35%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][2] ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][3] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][4] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][5] ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php 
$i+=1;$aa+=1;
} 

}


?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Collected: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 16.3:

 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['property'])){
  $property=$_GET['property'];
}else $property=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else {$month=0;}

$code=$_GET['code'];

$balonly=$_GET['balonly'];
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
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:5%;">Unit No</td>
        <td  style="width:35%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>

<?php
  $x='';$y=$z='';$q='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} if($property!='All'){$y=' and hid='.$property;}if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z."");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$q.$x.$y.$z."");
  }
  

  $aa=0;
  $tenarray=array(array());
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  $tid=stripslashes($row['tid']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  }
  
  
  $item=' '.stripslashes($row['actname']).'('.stripslashes($row['mon']).')'.'('.stripslashes($row['invbal']).'); ';

  if(isset($tenarray[$tid])){
  $tenarray[$tid][2]=$tenarray[$tid][2].$item;
  $tenarray[$tid][3]=$tenarray[$tid][3]+stripslashes($row['invamount']);
  $tenarray[$tid][4]=$tenarray[$tid][4]+stripslashes($row['paid']);
  $tenarray[$tid][5]=$tenarray[$tid][5]+stripslashes($row['invbal']);

  }else{
    $tenarray[$tid]=array(stripslashes($row['tid']),stripslashes($row['tname']),$item,stripslashes($row['invamount']),stripslashes($row['paid']),stripslashes($row['invbal']),stripslashes($row['hname']),stripslashes($row['rno']));
  }  
  


  }


$i=0;$aa=1;
foreach ($tenarray as $key => $val) {

if($key!=''){
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  $tenarray[$key][1] ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  gettenantphone($tenarray[$key][0]) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][6] ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][7] ?></td>
<td  style="width:35%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][2] ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][3] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][4] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][5] ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php 
$i+=1;$aa+=1;
} 

}


?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Paid: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 16.4:

function invvsrec($rowa,$i,$status,$aa){

$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';

  $resultx =mysql_query("select * from mainhouses where houseid='".stripslashes($rowa['hid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $fname=stripslashes($rowx['fname']);

    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo gettenantphone($rowa['tid']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname'])?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $fname ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['invno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['actname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['paid']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['invbal']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['fid'])){
  $fid=$_GET['fid'];
}else $fid=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else $month=0;
$code=$_GET['code'];
$balonly=$_GET['balonly'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$balonly=$_GET['balonly'];

$fname='invoice_vs_receipts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:5%;">Date</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:10%;">Property Name</td>
         <td  style="width:10%;">Field Person</td>
        <td  style="width:5%;">Unit No</td>
        <td  style="width:5%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:10%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>


<?php
  $x='';$y=$z='';$q='';$mm='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} 
  if($fid!='All'){

          $xy='(';
           $result =mysql_query("select * from fieldperson where groupid='".$fid."'  order by name");
           $num_results = mysql_num_rows($result);
           for ($i=0; $i <$num_results; $i++) {
                  $row=mysql_fetch_array($result);
                  if($i==0){$xy.='fid='.stripslashes($row['id']).'';}
                  else{$xy.=' or fid='.stripslashes($row['id']).'';}

            }
            $xy.=')';



          $result =mysql_query("select * from mainhouses where status=1  and ".$xy."");
          $num_results = mysql_num_rows($result);
           for ($i=0; $i <$num_results; $i++) {
           $rowa=mysql_fetch_array($result);
              if($i==0){
                 $mm="hid='".stripslashes($rowa['houseid'])."'";
              }else{
                 $mm.=" OR hid='".stripslashes($rowa['houseid'])."'";
              }
         
          }

        $y=' and  ('.$mm.')';

  }else{$y='';}

 
  if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z." order by hname");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$x.$y.$z." order by hname");
  }
  

  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);

  $resultx =mysql_query("select * from tenants where tid='".stripslashes($row['tid'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $tenstatus=stripslashes($rowx['status']);


  if($status!=0&&$tenstatus==1){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  invvsrec($row,$i,$status,$aa);
  }
  
 
  }




?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Collected: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 16.5:


$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['fid'])){
  $fid=$_GET['fid'];
}else $fid=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else $month=0;
$code=$_GET['code'];
$balonly=$_GET['balonly'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$balonly=$_GET['balonly'];

$fname='invoice_vs_receipts_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MEMBER INVOICES vs RECEIPTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:10%;">MemberPhone</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:5%;">Unit No</td>
        <td  style="width:35%;">Entry Name</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:5%;">Paid</td>
        <td  style="width:5%;">Balance</td>
    </tr>


<?php
  $x='';$y=$z='';$q='';$mm='';
  if($balonly==1){$q=' and invbal>0';}
  if($name!='All'){$x=' and actid='.$name;} 
  if($fid!='All'){


       
       $xy='(';
           $result =mysql_query("select * from fieldperson where groupid='".$fid."'  order by name");
           $num_results = mysql_num_rows($result);
           for ($i=0; $i <$num_results; $i++) {
                  $row=mysql_fetch_array($result);
                  if($i==0){$xy.='fid='.stripslashes($row['id']).'';}
                  else{$xy.=' or fid='.stripslashes($row['id']).'';}

            }
            $xy.=')';



        $result =mysql_query("select * from mainhouses where status=1  and ".$xy."");


       $num_results = mysql_num_rows($result);
       for ($i=0; $i <$num_results; $i++) {
       $rowa=mysql_fetch_array($result);
          if($i==0){
             $mm="hid='".stripslashes($rowa['houseid'])."'";
          }else{
             $mm.=" OR hid='".stripslashes($rowa['houseid'])."'";
          }
     
      }

    $y=' and  ('.$mm.')';

  }else{$y='';}

 
  if($month!=''){$z=" and mon='".$month."'";}
  if($d1==0){
  $result =mysql_query("select * from invoices where status!=0  ".$q.$x.$y.$z." order by hname");
  }
  else{
  $result =mysql_query("select * from invoices  where status!=0 and stamp>='".$d1."' and stamp<='".$d2."' ".$x.$y.$z." order by hname");
  }
  

  $aa=0;
  $tenarray=array(array());
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  $tid=stripslashes($row['tid']);
  if($status!=0){
  $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
  $b+=preg_replace('~,~', '', stripslashes($row['paid'])); 
  $c+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
  $aa+=1;
  }
  $item=' '.stripslashes($row['actname']).'('.stripslashes($row['mon']).')'.'('.stripslashes($row['invbal']).'); ';

  if(isset($tenarray[$tid])){
  $tenarray[$tid][2]=$tenarray[$tid][2].$item;
  $tenarray[$tid][3]=$tenarray[$tid][3]+stripslashes($row['invamount']);
  $tenarray[$tid][4]=$tenarray[$tid][4]+stripslashes($row['paid']);
  $tenarray[$tid][5]=$tenarray[$tid][5]+stripslashes($row['invbal']);

  }else{
    $tenarray[$tid]=array(stripslashes($row['tid']),stripslashes($row['tname']),$item,stripslashes($row['invamount']),stripslashes($row['paid']),stripslashes($row['invbal']),stripslashes($row['hname']),stripslashes($row['rno']));
  }  
  
  
  }

$i=0;$aa=1;
foreach ($tenarray as $key => $val) {

if($key!=''){
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';
    
?>


<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  $tenarray[$key][1] ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  gettenantphone($tenarray[$key][0]) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][6] ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][7] ?></td>
<td  style="width:35%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $tenarray[$key][2] ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][3] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][4] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tenarray[$key][5] ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php 
$i+=1;$aa+=1;
} 

}


?>

</tbody>
</table>

<?php
$percent=round(($b*100/$a),2);
$xx='<div style="float:left;display:none">';
if($code==1){$xx='<div style="float:left;">';}
?>

<div style="clear:both; margin-bottom:20px"></div>
<?php  echo $xx ?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Invoiced Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Paid Amount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Percentage Collected: <script>document.writeln(( <?php  echo $percent ?>).formatMoney(2, '.', ','));</script>%</p>

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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


     if($start<=date('Ymd')){

      $month=substr($start,4,2).'_'.substr($start,0,4);

      $result =mysql_query("select * from invoices where mon='".$month."' and actid=1 and status!=0");
      $num_results = mysql_num_rows($result);
      $projection=0;
      for ($i=0; $i <$num_results; $i++) {
      $row=mysql_fetch_array($result);
      $projection+=stripslashes($row['invamount']);
      }

      $projection=$projection/1.16;

     $mon[$start]=$projection;
     }

     else{
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
      
         }//end for loop

       }//end else

    
      $start=addmonths($start,1);

   


  }//end while



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


if($code==1){
  
  if($name==1){$title='Active Members';}
  else if($name=='All'){$title='All Members';}
  else if($name==0){$title='Ex-Members';}
  
}
if($code==2){$title='Members By Property';}
if($code==5){$title='Members By Group/Field Person';}
if($code==6){$title='Members By Sales Person';}

if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='members_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MEMBER LIST REPORT [<?php  echo $title ?>]
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:10%;">KPA No</td>
        <td  style="width:15%;">MemberName</td>
        <td  style="width:8%;">Phone</td>
        <td  style="width:8%;">Email</td>
        <td  style="width:8%;">Rent</td>
        <td  style="width:8%;">End Date</td>
        <td  style="width:10%;">Balance</td>
    </tr>


<?php

  switch($code){
    case 1:

    if($d1==0){
    if($name=='All'){$x='';}else {$x='Where status='.$name;}
    $result =mysql_query("select * from tenants ".$x." order by hname");
    }
    else{
      if($name=='All'){$x='';}else {$x=' and status='.$name;}
      $result =mysql_query("select * from tenants  where stamp>='".$d1."' and stamp<='".$d2."' ".$x." order by hname");
    }

    break;

    case 2:

    if($d1==0){
    $result =mysql_query("select * from tenants where hid='".$name."' and status=1 order by hname");
    }
    else{
      $result =mysql_query("select * from tenants  where stamp>='".$d1."' and stamp<='".$d2."' and  hid='".$name."' and status=1 order by hname");
    }

    break;

    case 3:

    if($name=='All'){
    $result =mysql_query("select * from tenants where status=1 and bal>0 order by hname");
   
    }
    else{
      $result =mysql_query("select * from tenants where status=1 and bal>0 order by hname");
    }

    

    break;

     case 4:

       if($name=='All'){
        $result =mysql_query("select * from tenants where status=1 and bal<0 order by hname");
       
        }
        else{
          $result =mysql_query("select * from tenants where  status=1 and bal<0 order by hname");
        }

   

    break;


    case 5:

      
      $xx='';
      if($name=='All'){
      $result =mysql_query("select * from mainhouses where status=1");
     
      }
      else{
       $result =mysql_query("select * from mainhouses where status=1 and fid='".$name."'");
      }
     $num_results = mysql_num_rows($result);
      for ($i=0; $i <$num_results; $i++) {
      $rowa=mysql_fetch_array($result);
        if($i==0){
           $xx.="hid='".stripslashes($rowa['houseid'])."'";
        }else{
           $xx.=" OR hid='".stripslashes($rowa['houseid'])."'";
        }
     
      }

      
       $result =mysql_query("select * from tenants where status=1 and (".$xx.") order by hname");
    

    break;

     case 6:

      
      $xx='';
      if($name=='All'){
      $result =mysql_query("select * from mainhouses where status=1");
     
      }
      else{
       $result =mysql_query("select * from mainhouses where status=1 and sid='".$name."'");
      }
     $num_results = mysql_num_rows($result);
      for ($i=0; $i <$num_results; $i++) {
      $rowa=mysql_fetch_array($result);
        if($i==0){
           $xx.="hid='".stripslashes($rowa['houseid'])."'";
        }else{
           $xx.=" OR hid='".stripslashes($rowa['houseid'])."'";
        }
     
      }
 
      
        if($d1==0){
        $result =mysql_query("select * from tenants where status!='' and (".$xx.") order by hname");
        }
        else{
           $result =mysql_query("select * from tenants where status!='' and (".$xx.") and stamp>='".$d1."' and stamp<='".$d2."' order by hname");
        }


    

    break;


  }
 
 
  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=mysql_fetch_array($result);
  $status=stripslashes($rowa['status']);
  $a+=preg_replace('~,~', '', stripslashes($rowa['monrent']));
  $b+=preg_replace('~,~', '', stripslashes($rowa['bal']));

  $aa=$i+1;
    $sent='';
    if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
    echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
    ?>
    <td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
     <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['kpano']) ?></td>
    <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['email']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['monrent']) ?>).formatMoney(2, '.', ','));</script></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate(stripslashes($rowa['contract_expiry_stamp'])) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['bal']) ?>).formatMoney(2, '.', ','));</script></td>
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
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Balances: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:30%;">MemberName</td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Creation Date</td>
        <td  style="width:30%;">MemberName</td>
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
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MEMBER UNIT HANDOVER REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Creation Date</td>
        <td  style="width:30%;">MemberName</td>
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
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MEMBER CHECKOUT REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:8%;">MemberName</td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
$fname='Pre_Members_reports';

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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:20%;">Property Name</td>
        <td  style="width:10%;">Landlord ID</td>
        <td  style="width:10%;">Plot No</td>
        <td  style="width:15%;">Field Person</td>
        <td  style="width:10%;">Commision</td>
        <td  style="width:10%;">Email</td>
        <td  style="width:10%;">Phone</td>
        <td  style="width:10%;">Balances</td>
        </tr>


<?php


  $result =mysql_query("select * from mainhouses where status=1 order by fname asc,housename asc");
  $a=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $a+=stripslashes($rowa['bal']);
  $hid=stripslashes($rowa['houseid']);

    $resultb =mysql_query("select SUM(bal) as dr from tenants where hid = '".$hid."' and status=1" );
    $rowb=mysql_fetch_array($resultb);
    $bal=stripslashes($rowb['dr']);


  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housename']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['houseid']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['plot']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['fname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['commision']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['email']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mobile']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
   
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


case 28.1:


$date=date('Y/m/d');
$fname='field Person_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">FIELD PERSONS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:30%;">Field Person Name</td>
        <td  style="width:40%;">Properties</td>
        <td  style="width:25%;">Collection</td>
        </tr>


<?php
$collect=0;
$resultb =mysql_query("select SUM(monrent) as dr from tenants where status=1" );
$rowb=mysql_fetch_array($resultb);
$collect=stripslashes($rowb['dr']);


  $result =mysql_query("select * from fieldperson");
  $a=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $fid=stripslashes($rowa['id']);
  $hname='';$bal=0;

   $resultc =mysql_query("select * from mainhouses where status=1 and fid='".$fid."'");
   $num_resultsc = mysql_num_rows($resultc);
   for ($c=0; $c <$num_resultsc; $c++) {
      $rowc=mysql_fetch_array($resultc); 
      $hid=stripslashes($rowc['houseid']);
      $cc=$c+1;
      

      $resultb =mysql_query("select SUM(monrent) as dr from tenants where hid = '".$hid."' and status=1" );
      $rowb=mysql_fetch_array($resultb);
      $bal+=stripslashes($rowb['dr']);

      $hname.=$cc.'. '.stripslashes($rowc['housename']).' ('.number_format(floatval($rowb['dr']),2).')<br/>';

    }

    $percent=round(($bal*100/$collect),2);


  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['name']) ?></td>
  <td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;text-align:left "><?php  echo $hname ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script> (<?php  echo $percent ?>)%</td>
   
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div id="doctitle" style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:25%;">Property Name</td>
        <td  style="width:10%;">Unit No</td>
        <td  style="width:10%;">Unit Type</td>
        <td  style="width:15%;">Tenant</td>
        <td  style="width:15%;">Location</td>
        <td  style="width:10%;">Room ID</td>
        <td  style="width:10%;">Rent</td>
        </tr>


<?php
  
  switch($code){
  case 0:
   $result =mysql_query("select * from houses order by housename");
  break;

  case 1:
  $result =mysql_query("select * from houses where houseid='".$name."' order by housename");
  break;

  case 2:
  $result =mysql_query("select * from houses where status=0 order by housename");
  break;

  case 3:
  $result =mysql_query("select * from houses where status=1 order by housename");
  break;

  case 4:
  $name2=$_GET['name2'];
  if($name2=='All'){
    $result =mysql_query("select * from houses where houseid='".$name."' order by housename");
  }else{
    $result =mysql_query("select * from houses where houseid='".$name."' and status='".$name2."' order by housename");
  }
  
  break;

  case 5:

  $name2=$_GET['name2'];

    if($name2=='All'){
    $result =mysql_query("select * from houses where status='".$name2."' order by housename asc");
    }else{

       $xy='(';
       $result =mysql_query("select * from mainhouses where status=1 and fid='".$name."'  order by housename");
       $num_results = mysql_num_rows($result);
       for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $fname=stripslashes($row['fname']);
              if($i==0){$xy.='houseid='.stripslashes($row['houseid']).'';}
              else{$xy.=' or houseid='.stripslashes($row['houseid']).'';}

        }
        $xy.=')';

       

      $result =mysql_query("select * from houses where status='".$name2."'  and ".$xy."  order by housename asc");
    }

    echo "<script>$('#doctitle').html('FieldPerson:".$fname."');</script>";


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
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rid']) ?></td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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



<a id="toexcel" download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


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



<a id="toexcel" download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


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



<a id="toexcel" download="system_users.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-size:11px;font-weight:bold; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:40px">No.</td>
      <td  style="width:150px">Username</td>
      <td  style="width:150px">Position</td>
      <td  style="width:300px">Full Names</td>
      <td  style="width:120px">Department</td>
      <td  style="width:100px">Status</td>

       
        
         

    </tr> 


<?php
$a=1;
$result =mysql_query("select * from users order by dept");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$status='Active';$col='#0f6';
if(stripslashes($row['status'])==0){$status='Dormant';$col='#f00';}

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
      <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"><?php  echo $status ?></td>
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



<a id="toexcel" download="access_table.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


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

<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">Entry No</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:20%;">Other Account</td>
        <td  style="width:30%;">Description</td>
        <td  style="width:10%;">Debit</td>
        <td  style="width:10%;">Credit</td>
        <td  style="width:10%;">Bal</td>
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

 
   $openingbal=$cc;

  

  echo'
    <tr title="Preview Journal" style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer ;background:#ccc">';?>
  <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
     <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">BALANCE BROUGHT FORWARD</td>
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
  $lid=stripslashes($row['lid']);
  $rcptno=stripslashes($row['rcptno']);

  $resultx =mysql_query("select * from ledgerentries where rcptno='".$rcptno."' and lid!='".$lid."' order by transid desc");
  $rowx=mysql_fetch_array($resultx);
  $otherledger=stripslashes($rowx['lname']);



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
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $otherledger ?></td>
     <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']).'- ['.stripslashes($row['refno']).']' ?></td>
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
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $otherledger ?></td>
     <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']).'- ['.stripslashes($row['refno']).']' ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $col ?>"><!--?php  echo $sign ?--><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">
      <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script> </td>
     </tr>
  <?php 
  }
  
  ?>

      


<?php }

$closingbal=$cc;
 ?>

</tbody>
</table>
  

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Opening Balance: <script>document.writeln(( <?php  echo $openingbal ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Debits: <script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Credits: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Closing Bal: <script>document.writeln(( <?php  echo $closingbal ?>).formatMoney(2, '.', ','));</script></p>
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


<a id="toexcel" download="member_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php
$result =mysql_query("select * from tenants where tid='".$name."'");
$rowx=mysql_fetch_array($result);
$curbal=stripslashes($rowx['bal']);
?>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Name: <?php  echo stripslashes($rowx['bname']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Unit No: <?php  echo stripslashes($rowx['roomno']);?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone:<?php  echo stripslashes($rowx['phone']);  ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">Entry Date</td>
      <td  style="width:10%">Bank Date</td>
      <td  style="width:10%">Month</td>
      <td  style="width:10%">Username</td>
      <td  style="width:25%">Description</td>
      <td  style="width:10%">Debits</td>
      <td  style="width:10%">Credits</td>
      <td  style="width:10%">Balance</td>
  </tr> 


<?php
//bal b/f
$bal=0;
if($d1!=0){
$result =mysql_query("select * from receipts where tid='".$name."' and datestamp<'".$d1."' order by stamp asc");
$num_results = mysql_num_rows($result);

for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
  if(stripslashes($row['drcr'])=='dr'||stripslashes($row['drcr'])=='rf'){
    $bal+=preg_replace('~,~', '', stripslashes($row['amount']));
  }else{
    $bal-=preg_replace('~,~', '', stripslashes($row['amount']));
  }
}
}

$a=$b=0;
if($d1==0){
$result =mysql_query("select * from receipts where tid='".$name."' order by datestamp asc");
}else{
  $result =mysql_query("select * from receipts where tid='".$name."' and datestamp>='".$d1."' and datestamp<='".$d2."' order by datestamp asc");
}

$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rcptno='';$inv='';$rec='';
$row=mysql_fetch_array($result);
$receiptno=$row['rcptno'];
if(stripslashes($row['drcr'])=='dr'||stripslashes($row['drcr'])=='rf'){
$a+=preg_replace('~,~', '', stripslashes($row['amount']));$inv=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['invno']).'. ';$bal+=$row['amount'];
}else{
 $b+=preg_replace('~,~', '', stripslashes($row['amount']));$rec=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['rcptno']).'. ';$bal-=$row['amount'];
}
$entrydate=$row['date'];
if($entrydate!=''){$entrydate=stamptodate($row['datestamp']);}



if($i%2==0){$xxx='background:#fff';}else{$xxx='background:#f0f0f0';}
$resulty =mysql_query("select * from receipt where rcptno='".$receiptno."' and lname like '%Deduction Payment%'");
if(mysql_num_rows($resulty)>0){$xxx='background:#ff4d4d';}
echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;'.$xxx.'">';
 
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $entrydate?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['month']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo getuser($row['username']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $desc.stripslashes($row['description']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background: #99ffdd"><script>document.writeln(( <?php  echo $inv ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background: #ff8080"><script>document.writeln(( <?php  echo $rec ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
      
    </tr>


<?php 
} ?>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:25%">Totals</td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
  </tr> 


</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Outstanding Balance as at <?php  echo date('d/m/Y') ?>: <script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></p>

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


<a id="toexcel" download="landlord_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

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


<a id="toexcel" download="supplier_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

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
}else $timer1='0000';

if(isset($_GET['timer2'])){
  $timer2=$_GET['timer2'];
}else $timer2='2359';


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

$d11=stampreverse($d1).$timer1;
$d22=stampreverse($d2).$timer2;
 ?>

<div style="clear:both"></div>

<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


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
  
  $col='';
  if (strpos(stripslashes($row['activity']), 'Receives payment from Tenant') !== false){
    $col='background:#ff3';
  }
  

  if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
    ?>

    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['date']) ?></td>
    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['time']) ?></td>
    <td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['username']) ?></td>
    <td  style="width:63%;border-width:0.5px; border-color:#666; border-style:solid;<?php  echo $col ?> "><?php  echo stripslashes($row['activity']) ?></td>
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

<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
$name=$_GET['name'];


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

<a id="toexcel" download="water_invoices.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Month: <?php  echo $mon ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:4%">No.</td>
      <td  style="width:16%">MemberName</td>
      <td  style="width:8%">Property Unit No</td>
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

if($name=='All'){
$result =mysql_query("select * from waterinvoices where mon='".$mon."'");
}else{
$result =mysql_query("select * from waterinvoices where mon='".$mon."' and hid='".$name."'");
}




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
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['hname']).'-'.stripslashes($row['rno']) ?></td>
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

<a id="toexcel" download="electricity_invoices.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Month: <?php  echo $mon ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">No.</td>
      <td  style="width:20%">MemberName</td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:5%;">Inv. No</td>
        <td  style="width:10%;">Supplier</td>
        <td  style="width:15%;">Item</td>
        <td  style="width:20%;">Description</td>
        <td  style="width:5%;">Qty</td>
        <td  style="width:5%;">Price</td>
        <td  style="width:5%;">Total</td>
        <td  style="width:5%;">Vat</td>
        <td  style="width:5%;">Status</td>
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

  case 4:
  if($d1==0){
  $result =mysql_query("select * from purchases  where depid='".$name."'");
  }
  else{
  $result =mysql_query("select * from purchases  where stamp>='".$d1."' and stamp<='".$d2."' and  depid='".$name."'");
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
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['supname']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['itemname']) ?></td>
   <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['notes']) ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['qty']) ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['price']) ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['total']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['vat']) ?>).formatMoney(2, '.', ','));</script></td>
   <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $colour ?>"><?php  echo $status ?></td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:10%;">Invoice No</td>
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

  $aa=$a=0;$tot=0;
  foreach ($arr as $key => $val) {
  $aa=$aa+1;$items='';
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>


<?php if($type==1){ ?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">MemberName</td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">MEMBERS DEBT AGEING ANALYSIS<br/><strong style="font-size:12px">As at:<?php  echo dateprint($d2) ?></strong></p>
<div style="clear:both"></div>
<?php $d2=preg_replace('~/~', '', $d2); ?>
<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>


<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;">
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">No.</td>
      <td  style="width:24%;">Name</td>
      <td  style="width:8%;">KPA No</td>
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

  $result =mysql_query("select * from invoices where tid='".$tid."' and stamp<='".$d2."' and (invstatus=1 or invbal!=0) ");
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

    if($tot>0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=37&name='.stripslashes($rowx['tid']).'\')" title="click to view">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer "   onclick="window.open(\'report.php?id=37&name='.stripslashes($rowx['tid']).'\')" title="click to view">';}
      ?>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
     <td style="width:24%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['bname']) ?></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['kpano']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['phone']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $f ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>
       </tr>


<?php 

  $cc+=$c;$dd+=$d;$ee+=$e;$ff+=$f;
  
  }

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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>


<?php if($type==1){ ?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:15%;">MemberName</td>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:30%;">MemberName</td>
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


case 54.1:


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
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">ARCHIVED MEMBERS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:45%;">Member</td>
        <td  style="width:15%;">Unit</td>
        <td  style="width:15%;">Archive Date</td>
        <td  style="width:15%;">User Name</td>
       </tr>


<?php


  if($d1==0){
  $result =mysql_query("select * from housetrack where description='MemberCheckout'");
  }
  else{
  $result =mysql_query("select * from housetrack  where description='MemberCheckout' and stamp>='".$d1."' and stamp<='".$d2."'");
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
  <td  style="width:45%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rno']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $rowa['date'] ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo getuser(stripslashes($rowa['username'])) ?></td>


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
$credno=$_GET['rcptno'];
//get z
$result =mysql_query("select * from receipts where credno='".$credno."'  order by serial desc limit 0,1");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$tid=stripslashes($row['tid']);
$month=stripslashes($row['month']);
$curbal=stripslashes($row['bal']);
$date=stripslashes($row['date']);
$amount=stripslashes($row['amount']);

$doctitle='CREDIT NOTE';

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
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:14px;">MEMBER <?php  echo $doctitle ?></p>
<div id="barcode" style="font-size:12px; font-weight:normal; text-transform:uppercase"><?php  echo $credno ?></div>
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
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:14px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;MemberName: <?php  echo $bname ?>&nbsp; &nbsp;&nbsp;&nbsp;Unit No: <?php  echo $rno ?><br/><?php  echo $doctitle ?> No: <?php  echo $credno ?></p>
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
$result =mysql_query("select * from creditnotes where credno='".$credno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;$vat=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$evat=stripslashes($row['vat']);
$xx+=stripslashes($row['amount']);
$vat+=$evat;
$eamount=stripslashes($row['amount'])-$evat; 
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
    <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs($eamount) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } 



?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
   <td style="width:50%;border-width:0px; border-color:#666; border-style:solid;"></td>
   <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;">VAT</td>
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


case 56:


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
$fname='commision_summary_report';

?>
<div class="panel-body maindiv" style="width:99%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:85px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">COMMISION SUMMARY REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:30%;">Property</td>
        <td  style="width:15%;">Total Rent Invoiced</td>
        <td  style="width:15%;">Commision Earned</td>
        <td  style="width:15%;">Total Rent Paid</td>
        <td  style="width:15%;">Commision Paid</td>
        </tr>


<?php


//considerations-escalations,contract expiries,quartely payments
  $aa=$bb=$cc=$dd=0;
  $resultq =mysql_query("select * from mainhouses order by housename");
  $num_resultsq = mysql_num_rows($resultq);
  for ($q=0; $q <$num_resultsq; $q++) {
  $rowq=mysql_fetch_array($resultq);
  $hid=stripslashes($rowq['houseid']);
  $housename=stripslashes($rowq['housename']);
  $commision=stripslashes($rowq['commision']);
  $total=0;$paid=0;


  
  $mon=array();
  $start=substr($d1,3,4).substr($d1,0,2).'01';
  $end=substr($d2,3,4).substr($d2,0,2).'01';



      while($start<=$end){

        $month=substr($start,4,2).'_'.substr($start,0,4);

        $result =mysql_query("select * from invoices where mon='".$month."' and hid='".$hid."' and actid=1 and status!=0");
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
        $row=mysql_fetch_array($result);
        $amount=stripslashes($row['invamount'])-stripslashes($row['vat']);
        $total+=$amount;
        $paid+=stripslashes($row['paid']);
        }
         $start=addmonths($start,1);

        }//end while

   $comm=$total*$commision/100;
   $paidcomm=$paid*$commision/100;

   $aa+=$total;
   $bb+=$comm;
   $cc+=$paid;
   $dd+=$paidcomm;


  if($q%2==0){$col='#f0f0f0';}else{$col='#fff';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $q+1 ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $housename ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $comm ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $paidcomm ?>).formatMoney(2, '.', ','));</script></td>

  </tr>

  <?php
   } 
?>

</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Rent Invoiced: <script>document.writeln(( <?php  echo $aa ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Commision Earned: <script>document.writeln(( <?php  echo $bb ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Rent Paid: <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; font-weight:bold;margin:0 0 0 10px">Total Commision Paid: <script>document.writeln(( <?php  echo $dd ?>).formatMoney(2, '.', ','));</script></p>

</div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;




case 57:


$date=date('Y/m/d');
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
$fname='daily_financial_report_'.$d1;

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
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY FINANCIAL REPORT</p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Date:&nbsp;<?php  echo dateprint($d1) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1);?>

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">RECEIPTS REPORT</P>
<div style="clear:both; margin-bottom:10px"></div>
<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:25%;">MemberName</td>
        <td  style="width:20%;">Property-Unit</td>
        <td  style="width:15%;">Receipt No</td>
        <td  style="width:15%;">Amount</td>
        <td  style="width:15%;">Pay Mode</td>
       
      </tr>


<?php


 
  $result =mysql_query("select * from receipts  where stamp='".$d1."' and drcr='cr'  order by serial");
  $a=0;$b=0;$c=0;$d=$e=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;

  $max=count($dept);
  for ($x= 0; $x < $max; $x++){
    if($dept[$x][0]==stripslashes($row['paymode'])){
      $dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));  
      $dept[$x][3]=$dept[$x][2];
    }
  }

  $a+=preg_replace('~,~', '', stripslashes($row['amount']));

  $resultx =mysql_query("select * from ledgers  where ledgerid='".stripslashes($rowa['paymode'])."' limit 0,1");
  $rowx=mysql_fetch_array($resultx); 


 if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['tname']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname']).'-'.stripslashes($rowa['rno']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['rcptno']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowx['name']) ?></td>
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
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">EXPENSES REPORT</P>
<div style="clear:both; margin-bottom:10px"></div>
<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">No.</td>
        <td  style="width:15%;">Expense Name</td>
        <td  style="width:10%;">Type</td>
        <td  style="width:30%;">Description</td>
        <td  style="width:20%;">Amount</td>
        <td  style="width:15%;">Credit Account</td>
        
      </tr>


<?php


 
  $result =mysql_query("select * from ledgerentries  where stamp='".$d1."'  order by stamp asc,transid asc");
  $dr=0;$cr=0;$totdr=$totcr=0;$aa=1;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result);
  $lid=stripslashes($row['lid']);
  $transtype=stripslashes($row['type']);
  $rcptno=stripslashes($row['rcptno']);

  $resultx =mysql_query("select * from ledgers where ledgerid='".$lid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $type=stripslashes($rowx['type']);




  if($type=='Expense'){

  if($transtype=='Debit'){$dr=stripslashes($row['amount']);$cr=0;$opp='Credit';}
  if($transtype=='Credit'){$cr=stripslashes($row['amount']);$dr=0;$opp='Debit';}

  $totdr+=$dr;$totcr+=$cr;

  $resultx =mysql_query("select * from ledgerentries where rcptno='".$rcptno."' and  lid!='".$lid."' and type='".$opp."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $oppname=stripslashes($rowx['lname']);
           


 if($aa%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['lname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['type']) ?></td>
  <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['description']) ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $oppname ?></td>
 </tr>

<?php 

$aa+=1;
}


} ?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Debits: <script>document.writeln((<?php  echo $totdr ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Credits/Reversals: <script>document.writeln((<?php  echo $totcr ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Spent: <script>document.writeln((<?php  echo $totdr-$totcr ?>).formatMoney(2, '.', ','));</script></p>

</div>
<div style="clear:both; margin-bottom:20px"></div>

<div style="clear:both; margin-bottom:20px"></div>

<div style="width:100%;">
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">BANK/CASH ACCOUNTS SUMMARY REPORT</p>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">No.</td>
      <td  style="width:50%">Account</td>
      <td  style="width:15%">Opening Balance</td>
      <td  style="width:15%">Closing Balance</td>
  </tr> 

<?php

//brought forward
  $a=0;$totopening=$totclosing=0;
  $resultx =mysql_query("select * from ledgers where category='Bank' order by ledgerid");
  $num_resultsx = mysql_num_rows($resultx); 
  for ($xx=0; $xx <$num_resultsx; $xx++) {
    $rowx=mysql_fetch_array($resultx);
    $lid=stripslashes($rowx['ledgerid']);
    $opening=$closing=0;

    $resultb =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$lid."' and stamp<'".$d1."'" );
    $rowb=mysql_fetch_array($resultb);
    $cr2=stripslashes($rowb['cr']);
    $dr2=stripslashes($rowb['dr']);
    $opening = $dr2-$cr2;
    $totopening+=$opening;

    $resultb =mysql_query("select SUM(debit) as dr, SUM(credit) as cr from ledgerbalances where ledgerid = '".$lid."' and stamp<='".$d1."'" );
    $rowb=mysql_fetch_array($resultb);
    $cr2=stripslashes($rowb['cr']);
    $dr2=stripslashes($rowb['dr']);
    $closing = $dr2-$cr2;
    $totclosing+=$closing;

    $a+=1;

    if($xx%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:60%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['name']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $opening ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $closing ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
      
     
    </tr>

   


<?php 
$a++;
} ?>

 <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%"></td>
      <td  style="width:60%">Total Balance</td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $totopening ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $totclosing ?>).formatMoney(2, '.', ','));</script></td>
  </tr> 

</tbody>

</table>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;




case 58:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=0;
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='expenses_report';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Expenses Report<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div><?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Entry Date</td>
        <td  style="width:15%;">Ledger Name</td>
        <td  style="width:10%;">Type</td>
        <td  style="width:30%;">Description</td>
        <td  style="width:15%;">Debit</td>
        <td  style="width:15%;">Credits</td>

    </tr>

<?php
  $aa=1;
  if($d1==0){
  $result =mysql_query("select * from ledgerentries where lid!=701 order by stamp asc,transid asc");
  }
  else{
  $result =mysql_query("select * from ledgerentries  where lid!=701 and stamp>='".$d1."' and stamp<='".$d2."' order by stamp asc,transid asc");
  }
  $dr=0;$cr=0;$totdr=$totcr=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $lid=stripslashes($row['lid']);
  $transtype=stripslashes($row['type']);

  $resultx =mysql_query("select * from ledgers where ledgerid='".$lid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $type=stripslashes($rowx['type']);

  if($type=='Expense'){

  if($transtype=='Debit'){$dr=stripslashes($row['amount']);$cr=0;}
  if($transtype=='Credit'){$cr=stripslashes($row['amount']);$dr=0;}

  $totdr+=$dr;$totcr+=$cr;
           
  if($aa%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
  <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint($row['date']) ?></td>
       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['lname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['type']) ?></td>
      <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $dr ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $cr ?>).formatMoney(2, '.', ','));</script></td>
    
    </tr>


<?php $aa+=1; }


} ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Debits: <script>document.writeln((<?php  echo $totdr ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Credits/Reversals: <script>document.writeln((<?php  echo $totcr ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Spent: <script>document.writeln((<?php  echo $totdr-$totcr ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;

case 59:

$date=date('Y/m/d');
$stamp=date('Ymd');
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
$fname='monthly_expenses_summary';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Monthly Expenses Summary<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Month:&nbsp;&nbsp;<?php  echo $d1; ?></p><?php } else{?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div><?php 
 $year=substr($d1,3,4);
 $month=substr($d1,0,2);
 $yearmonth=$year.$month;
 $d1=$year.$month.'01';
 $d2=$year.$month.'31';

  $arr=array();
  $result =mysql_query("select * from ledgerentries  where stamp>='".$d1."' and stamp<='".$d2."'  order by stamp asc,transid asc");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $lid=stripslashes($row['lid']);
  $resultx =mysql_query("select * from ledgers where ledgerid='".$lid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
  $type=stripslashes($rowx['type']);

  if($type=='Expense'){
   $arr[$lid]=substr(stripslashes($row['lname']),0,30);
  }
  }

  $width=85/count($arr).'%';

?>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <?php
    echo ' <td  style="width:5%">Date.</td>';
    foreach ($arr as $i => $val) {
    echo ' <td  style="width:'.$width.'">'.$val.'</td>';
     $arr[$i]=0;
    }
    echo ' <td  style="width:10%">Total</td>';
    ?>
    </tr>

<?php
 
 $aa=1;
for ($x=1; $x <32; $x++) {

  $stamp=$yearmonth.sprintf("%02d",$x);


  if($aa%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
  ?>
  <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>

  <?php  
    $rowtot=0;
    foreach ($arr as $key => $val) {

        $result =mysql_query("select * from ledgerentries  where stamp='".$stamp."' and lid='".$key."'  order by stamp asc,transid asc");
        $tot=0;
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
          $row=mysql_fetch_array($result);
          $transtype=stripslashes($row['type']);
          if($transtype=='Debit'){$amount=stripslashes($row['amount']);}else {$amount=stripslashes($row['amount'])*-1;}
          $tot+=$amount;
         }

       $new=$arr[$key]+$tot;$arr[$key]=$new;
       $rowtot+=$tot;

       ?>


      <td style="width:<?php echo $width ?>;border-width:0.5px; border-color:#666; border-style:solid;"> <script>document.writeln((<?php  echo $tot ?>).formatMoney(2, '.', ','));</script></td>

       <?php

    }
    ?>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> <script>document.writeln((<?php  echo $rowtot ?>).formatMoney(2, '.', ','));</script></td>

<?php


$aa+=1;
} 
?>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
<?php
    echo ' <td  style="width:5%">Totals</td>';
    $total=0;
    foreach ($arr as $i => $val) {
      $total+=$val;
      ?>


      <td style="width:<?php echo $width ?>;"> <script>document.writeln((<?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>

       <?php
 }

    ?>
    <td style="width:10%"> <script>document.writeln((<?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
</tr>
</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;


case 60:
$refundno=$_GET['rcptno'];
//get z
$result =mysql_query("select * from receipts where refundno='".$refundno."'  order by serial desc limit 0,1");
$num_results = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$tid=stripslashes($row['tid']);
$month=stripslashes($row['month']);
$curbal=stripslashes($row['bal']);
$date=stripslashes($row['date']);
$amount=stripslashes($row['amount']);

$doctitle='REFUND NOTE';

$result =mysql_query("select * from tenants where tid='".$tid."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['bname']);
$rno=stripslashes($row['kpano']);
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
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:14px;">MEMBER <?php  echo $doctitle ?></p>
<div id="barcode" style="font-size:12px; font-weight:normal; text-transform:uppercase"><?php  echo $refundno ?></div>
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
<p style="text-align:center;   font-weight:normal; margin:0px 10PX 0 10px;font-size:14px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i a') ?>&nbsp; &nbsp;&nbsp;&nbsp;MemberName: <?php  echo $bname ?>&nbsp; &nbsp;&nbsp;&nbsp;KPA No: <?php  echo $rno ?><br/><?php  echo $doctitle ?> No: <?php  echo $credno ?></p>
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
$result =mysql_query("select * from refunds where refundno='".$refundno."' and status=1");
$num_results = mysql_num_rows($result);
$xx=0;$vat=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$user=stripslashes($row['username']);
$xx+=stripslashes($row['amount']);
$eamount=stripslashes($row['amount']);
?>

<tr style="width:100%; height:20px;padding:0;  font-weight:normal; font-size:11px">
    <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['actname']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['mon']) ?></td>
    <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo abs($eamount) ?>).formatMoney(2, '.', ','));</script></td>
      </tr>
    
<?php } 



?>

    

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



case 61:

function invvsrec2($rowa,$i,$status,$aa,$aaa,$bbb,$ccc){

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
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $aaa ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $bbb ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $ccc ?>).formatMoney(2, '.', ','));</script></td>

</tr>

<?php } 
$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else $name=0;
if(isset($_GET['property'])){
  $property=$_GET['property'];
}else $property=0;
if(isset($_GET['month'])){
  $month=$_GET['month'];
}else $month=0;
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
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">BALANCES BY ITEM REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:20%;">MemberName</td>
        <td  style="width:5%;">KPA No</td>
        <td  style="width:5%;">Inv No</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:15%;">Entry Name</td>
        <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Paid</td>
        <td  style="width:10%;">Balance</td>
    </tr>


<?php
  $x='';$y=$z='';$q='';
  $ten=array();
  if($name!='All'){$x=' and actid='.$name;} 
  $result =mysql_query("select * from invoices  where  stamp<='".$d2."'AND invbal!=0 ".$x.$y."");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $tid=stripslashes($row['tid']);
  $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
  $rowx=mysql_fetch_array($resultx);
    if(stripslashes($rowx['status'])!=0){
    $ten[$tid]=$tid;
    }
  }


  $aa=0;
  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;


  foreach ($ten as $key => $val) {
  $x='';$y=$z='';$q='';
  if($name!='All'){$x=' and actid='.$name;} 
  $result =mysql_query("select * from invoices  where  stamp<='".$d2."' and tid='".$key."'  ".$x.$y."");
  $num_results = mysql_num_rows($result);
    $aaa=$bbb=$ccc=0;
    for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $status=stripslashes($row['status']);
    $a+=preg_replace('~,~', '', stripslashes($row['invamount'])); $aaa+=preg_replace('~,~', '', stripslashes($row['invamount'])); 
    $b+=preg_replace('~,~', '', stripslashes($row['paid']));      $bbb+=preg_replace('~,~', '', stripslashes($row['paid'])); 
    $c+=preg_replace('~,~', '', stripslashes($row['invbal']));    $ccc+=preg_replace('~,~', '', stripslashes($row['invbal'])); 
    $aa+=1;  
    }


    invvsrec2($row,$i,$status,$aa,$aaa,$bbb,$ccc);




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


case 62:
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
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">ITEMIZED MEMBER STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<a id="toexcel" download="member_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php
$result =mysql_query("select * from tenants where tid='".$name."'");
$rowx=mysql_fetch_array($result);
$curbal=stripslashes($rowx['bal']);
?>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:5px; margin-bottom:5px;border-bottom:1px dotted #333"></div>
<p style="color:#333;text-align:center;margin:0 0 0 10px">Name: <?php  echo stripslashes($rowx['bname']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPA No: <?php  echo stripslashes($rowx['kpano']) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone: <?php  echo stripslashes($rowx['phone']);  ?></p>
<div style="clear:both; margin-bottom:10px;border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">Entry Date</td>
      <td  style="width:10%">Bank Date</td>
      <td  style="width:10%">Ref No</td>
      <td  style="width:10%">Month</td>
      <td  style="width:10%">User Name</td>
      <td  style="width:20%">Description</td>
      <td  style="width:10%">Debits</td>
      <td  style="width:10%">Credits</td>
      <td  style="width:10%">Balance</td>
  </tr> 


<?php

//bal b/f
$bal=0;
if($d1!=0){
$result =mysql_query("select * from receipts where tid='".$name."' and datestamp<'".$d1."' order by stamp asc");
$num_results = mysql_num_rows($result);

for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
  if(stripslashes($row['drcr'])=='dr'){
    $bal+=preg_replace('~,~', '', stripslashes($row['amount']));
  }else{
    $bal-=preg_replace('~,~', '', stripslashes($row['amount']));
  }
}
}



$a=$b=0;
if($d1==0){
$result =mysql_query("select * from receipts where tid='".$name."'");
}else{
  $result =mysql_query("select * from receipts where tid='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
}
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rcptno='';$inv='';$rec='';$amo='amount';
$row=mysql_fetch_array($result);
$drcr=stripslashes($row['drcr']);
switch($drcr){
case 'dr':
$title='Invoice';
$table='invoices';$amo='invamount';
$refno=stripslashes($row['invno']);$type='invno';
break;
case 'cr':
$title='Receipt';
$table='receipt';
$refno=stripslashes($row['rcptno']);$type='rcptno';
break;

case 'rf':
$title='Refund';
$table='refunds';
$refno=stripslashes($row['refundno']);$type='refundno';
break;

case 'cn':
$title='Credit Note';
$table='creditnotes';
$refno=stripslashes($row['credno']);$type='credno';
break;

case 'jn':
$title='Journal Entry';
$table='tenantjournals';
$refno=stripslashes($row['journalno']);$type='journalno';
break;
}

if(stripslashes($row['drcr'])=='dr'||stripslashes($row['drcr'])=='rf'){
$a+=preg_replace('~,~', '', stripslashes($row['amount']));$inv=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['invno']).'. ';$bal+=$row['amount'];
}else{
 $b+=preg_replace('~,~', '', stripslashes($row['amount']));$rec=preg_replace('~,~', '', stripslashes($row['amount']));$desc='REF NO: '.stripslashes($row['rcptno']).'. ';$bal-=$row['amount'];
}

$receiptno='';
$resultx =mysql_query("select * from ".$table." where ".$type."=".$refno." order by id desc");
$num_resultsx = mysql_num_rows($resultx);
for ($xx=0; $xx <$num_resultsx; $xx++) {
$rowq=$rowx=mysql_fetch_array($resultx);
$code=stripslashes($rowx['id']);
$entrydate=$row['date'];
$receiptno=$row['rcptno'];
if($entrydate!=''){$entrydate=stamptodate($row['datestamp']);}



if($xx%2==0){$xxx='background:#fff';}else{$xxx='background:#f0f0f0';}
if($table=='receipt'){
  $resulty =mysql_query("select * from receipt where rcptno='".$receiptno."' and lname like '%Deduction Payment%'");
  if(mysql_num_rows($resulty)>0){$xxx='background:#ff4d4d';}
}


if($table=='invoices'){
  $invbal=stripslashes($rowx['invbal']);
  if($invbal>0){$xxx='background:#ffff66';}
}

echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal;'.$xxx.'">';
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $entrydate ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['date']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $title.':'.$refno ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['mon']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo getuser($rowx['username']) ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['description']).'-<b>['.stripslashes($rowx['actname']).']</b>' ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background: #99ffdd">
        <?php if(stripslashes($row['drcr'])=='dr'||stripslashes($row['drcr'])=='rf'){ ?>
        <script>document.writeln(( <?php  echo stripslashes($rowx[$amo]) ?>).formatMoney(2, '.', ','));</script>
        <?php } ?>
      </td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background: #ff8080">
        <?php if(stripslashes($row['drcr'])=='cr'||stripslashes($row['drcr'])=='cn'){ ?>
        <script>document.writeln(( <?php  echo stripslashes($rowx[$amo]) ?>).formatMoney(2, '.', ','));</script>
        <?php } ?>
      </td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
      
      
      
      
     
    </tr>


<?php 
}


} ?>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:20%"></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
  </tr> 

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Total Outstanding Balance: <script>document.writeln(( <?php  echo $curbal ?>).formatMoney(2, '.', ','));</script></p>

<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 63:
$date=date('Y/m/d');
$stamp=date('Ymd');
$hid=$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
$mon=$d1;
$code=$_GET['code'];

$endmonth=convtomonth(substr($d1,0,2)).' '.substr($d1,3,4);

$d1=substr($d1,3,4).substr($d1,0,2).'01';
$d2=substr($d1,3,4).substr($d1,0,2).'31';
$s = new DateTime($d1);
$s->modify('-1day');
$lastmon= $s->format('Ymd');


$tstamp=substr($mon,3,4).substr($mon,0,2).date('d');
$s = new DateTime($tstamp);
$s->modify('-1month');
$lastmonth=$s->format('m_Y');

  $resultc = mysql_query("select * from landstate where mon='".$mon."' and hid='".$hid."'");
  if(mysql_num_rows($resultc)==0){
    echo "<script>alert('Statement has not been posted yet')</script>";
      exit;
  }
  $rowc=mysql_fetch_array($resultc);
  $rcptno=stripslashes($rowc['id']);
  $date=stripslashes($rowc['date']);
  $lname=stripslashes($rowc['lname']);
  $refno=stripslashes($rowc['refno']);
  $esd=stripslashes($rowc['esdstamp']);
  $cashier=stripslashes($rowc['username']);

  if($esd!=''&$code==2){

      echo "<script>alert('Final Copy has already been posted.Cannot Reprint Final Copy.')</script>";
      exit;

  }




?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">

<div style="width:100%;background:#fff;height:140px;float:left;border-bottom:2px solid #CCC;">

<div style="width:32%;border-right:0px solid #ccc;float:left;margin-left:10px;">
<h2 style="color:#333;font-size:40px;margin-left:5%;margin-top:0px">LANDLORD</br>STATEMENT</h2>
<?php

if($code==1){
echo '<h2 style="color:#ccc;font-size:50px;margin-left:5%;margin-top:-15px;font-weight:bold">COPY</h2>';
}else if($code==2){
  echo '<h2 style="color:#ccc;font-size:50px;margin-left:5%;margin-top:-15px;font-weight:bold">FINAL</h2>';
}
?>
</div>

<style>
tr,td{border:1px solid #ddd;}

</style>

<?php

$result =mysql_query("select * from mainhouses where houseid='".$name."'");
$rowx=mysql_fetch_array($result);
$housename=stripslashes($rowx['housename']);
$plot=stripslashes($rowx['plot']);
$owner=stripslashes($rowx['owner']);
$location=stripslashes($rowx['location']);
$commision=stripslashes($rowx['commision']);
$vatstatus=stripslashes($rowx['vat']);
$phone=stripslashes($rowx['mobile']);
?>

<div style="width:32%;border-right:0px solid #ccc;float:left">
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 50px; position:relative;"/>
</div>

<div style="width:32%;border-right:0px solid #ccc;float:left">
<p style="text-align:left;font-size:16px;   margin:0px 0 0 0px;font-weight:bold"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:left;    margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <span style="text-transform:lowercase"><?php echo $web ?></span><br/>Email:  <span style="text-transform:lowercase"><?php  echo $email ?></span></p><div style="clear:both"></div>
<div style="clear:both"></div>
</div>


</div>


<div style="width:100%;background:#fff;height:150px;float:left;border-bottom:2px solid #CCC">

<div style="width:32%;border-right:0px solid #ccc;float:left;margin-left:10px;margin-top:10px">
<p style="text-align:left;font-size:11px;   margin:0px 0 0 0px;color:#666">Paid To:</p>
<div style="clear:both"></div>
<p style="text-align:left;font-size:16px;   margin:0px 0 0 0px;font-weight:bold"><?php  echo $housename ?></p>
<p style="text-align:left;    margin:0 0 0 0px">Plot No: <b><?php  echo $plot ?>
<br/>Landlord No: <span style=""><b><?php echo $hid ?></b></span></b>
<br/>Location: <span style=""><b><?php echo $location ?></b></span>
<br/>Phone: <span style=""><b><?php echo $phone ?></b></span>

</p><div style="clear:both"></div>
</div>


<div style="width:32%;border-right:0px solid #ccc;float:left;margin-left:0px;margin-top:10px">
<p style="text-align:left;font-size:11px;   margin:0px 0 0 0px;color:#666">Statement Details:</p>
<div style="clear:both"></div>
<p style="text-align:left;    margin:0 0 0 0px">Month: <span style=""><b><?php echo $mon ?></b></span>
<br/>Bank and Branch: <span style=""><b><?php echo stripslashes($rowx['bankname']).'-'.stripslashes($rowx['branchname']) ?></b></span>
<br/>Account Name: <span style=""><b><?php echo stripslashes($rowx['acname']) ?></b></span>
<br/>Account No: <span style=""><b><?php echo stripslashes($rowx['acno']) ?></b></span>
</p><div style="clear:both"></div>
</div>


<div style="width:34%;border-right:0px solid #ccc;float:left;margin-left:0px;margin-top:10px">
<div id="barcode" style="font-size:10px; font-weight:bold; text-transform:uppercase;float:left"><?php  echo $rcptno ?></div>
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
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,2,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<div style="clear:both;height:10px"></div>
<div style="clear:both;border:2px solid #333;width: 70%;padding:3px;border-radius:5px">
<p style="text-align:left;font-size:20px; margin:0px 0 0 0px;font-weight:bold">STMT NO: <?php  echo sprintf("%04d",$rcptno) ?></p>

</div>
<p style="text-align:left;font-size:11px;font-weight:bold;   margin:5px 0 0 0px;color:#333">Date: <span style=""><b><?php echo $date ?></b></span> | Created By: <span style=""><b><?php echo getuser($cashier) ?></b></span></p>
</div>

</div>


<div style="clear:both; margin-bottom:10px"></div>
<?php echo'
 <table class="table table-striped data-tables" id="data-tables">
                              <thead>
                                <tr>
                                  <th>Type</th>
                                  <th>House No</th>
                                  <th>Unit Type</th>
                                  <th>MemberNo</th>
                                  <th style="width:30%">MemberName</th>
                                  <th>Phone No</th>
                                  ';if($code==1){echo '<th>Paid Amount</th>';}echo'
                                  <th>Payments</th>
                                  <th>Deductions</th>
                                 </tr>
                              </thead>
                              <tbody>';
                              
                              $aa=0;$bb=0;$commisionable=0;$totalpaid=0;
                              $result =mysql_query("select * from landstateunits where hid='".$hid."'  and  mon='".$mon."' ORDER BY LENGTH(rno),rno");
                              $num_results = mysql_num_rows($result);
                              for ($i=0; $i <$num_results; $i++) {
                                  $row=mysql_fetch_array($result);
                                  $amount=stripslashes($row['amount']);
                                  $tid=stripslashes($row['tid']);

                                  $today=substr($mon,3,4).substr($mon,0,2).date('d');
                                  $style='';
                                  $resultx =mysql_query("select * from tenants where tid='".$tid."' limit 0,1");
                                  $rowx=mysql_fetch_array($resultx);
                                  $days=daysdifference($rowx['stamp'],$today);
                                  if($days<=30){$style='background:#0ff';}

                                  $resulta =mysql_query("select SUM(amount) as paid from receipt where tid = '".$tid."' and actid=1 and mon='".$lastmonth."'" );
                                  $rowa=mysql_fetch_array($resulta);
                                  $payment=stripslashes($rowa['paid']);
                                  $totalpaid+=$payment;
                                  

                                  $aa+=$amount;
                                  echo'<tr class="gradeX" style="font-size:11px;">
                                  <td style="'.$style.'">House</td>
                                  <td style="'.$style.'">'.stripslashes($row['rno']).'</td>
                                  <td style="'.$style.'">'.stripslashes($row['unittype']).'</td>
                                  <td style="'.$style.'">'.stripslashes($row['tid']).'</td>
                                  <td style="width:30%;'.$style.'">'.stripslashes($row['tname']).'</td>
                                  <td style="'.$style.'">'.stripslashes($row['phone']).'</td>
                                  ';if($code==1){echo '<td style="'.$style.'">'.number_format(floatval($payment),2).'</td>';}echo'
                                  <td style="'.$style.'">'.number_format(floatval($amount),2).'</td>
                                  <td style="'.$style.'"></td>
                                  </tr>';

                                }

                                 $commisionable=$aa;

                              $result =mysql_query("select * from landtx where hid='".$hid."' and  mon='".$mon."'");
                              $num_results = mysql_num_rows($result);
                              for ($i=0; $i <$num_results; $i++) {
                                  $row=mysql_fetch_array($result);
                                  $drcr=stripslashes($row['drcr']);
                                  $amount=stripslashes($row['amount']);
                                   $commstatus=stripslashes($row['commisionable']);
                                  $commdesc='';
                                  if($drcr=='dr'){
                                    $type='Payment';$aa+=$amount;
                                    if($commstatus==1){$commisionable+=$amount;$commdesc='';}else {$commdesc='(non commisionable)';}
                                  }else {
                                    $type='Deduction';$bb+=$amount;
                                    if($commstatus==1){$commisionable-=$amount;$commdesc='';} else {$commdesc='(non commisionable)';}
                                  }

                                  echo'<tr class="gradeX" style="font-size:11px;">
                                  <td>'.$type.'</td>
                                  <td>'.stripslashes($row['itname']).'</td>
                                  <td>'.stripslashes($row['date']).'</td>
                                  <td></td>
                                  <td>'.stripslashes($row['description']).'<br/><small style="color:#f00;font-weight:normal"><i>'.$commdesc.'</small></i></td>
                                  <td>'.stripslashes($row['itname']).'</td>
                                  ';if($code==1){echo '<td></td>';}echo'
                                  <td>';if($drcr=='dr'){echo number_format(floatval($amount),2);}echo'</td>
                                   <td>';if($drcr=='cr'){echo number_format(floatval($amount),2);}echo'</td>
                                  </tr>';

                                }

                                echo '
                                <thead  style="font-size:14px;background:#ccc">
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th>Totals</th>
                                  ';if($code==1){echo '<th>'.number_format(floatval($totalpaid),2).'</th>';}echo'
                                  <th>'.number_format(floatval($aa),2).'</th>
                                  <th>'.number_format(floatval($bb),2).'</th>
                                  </tr>
                              </thead>';

                              $gross=$aa-$bb;
                              if($vatstatus==0){
                                $commision=round(($commision*1.16),2);
                              }
                              $comm=$commision*$commisionable/100;
                              $vat=0.16*$comm;
                              if($vatstatus==0){$vat=0;}
                              $net=$gross-$comm-$vat;

                               echo '<thead style="font-size:14px"><tr> <th></th> <th></th><th></th><th></th><th></th>';if($code==1){echo '<th></th>';}echo'<th>Gross Payable</th><th></th><th id="gross">'.number_format(floatval($gross),2).'</th></tr></thead>';
                              echo '<thead style="font-size:14px"><tr> <th></th> <th></th><th></th><th></th><th></th>';if($code==1){echo '<th></th>';}echo'<th>Gross Commisionable</th><th></th><th id="gross">'.number_format(floatval($commisionable),2).'</th></tr></thead>';
                               
                               echo '<thead style="font-size:14px"><tr> <th></th> <th></th><th></th><th></th><th></th>';if($code==1){echo '<th></th>';}echo'<th>Less Management Fee ('.$commision.') %</th><th></th><th id="comm">'.number_format(floatval($comm),2).'</th></tr></thead>';
                               if($vatstatus!=0){
                               echo '<thead style="font-size:14px"><tr> <th></th> <th></th><th></th><th></th><th></th>';if($code==1){echo '<th></th>';}echo'<th>Less 16% VAT</th><th></th><th id="vat">'.number_format(floatval($vat),2).'</th></tr></thead>';
                               }
                               echo '<thead style="font-size:14px;background:#ccc"><tr> <th></th> <th></th><th></th><th></th><th></th>';if($code==1){echo '<th></th>';}echo'<th>Net Payable</th><th></th><th id="net">'.number_format(floatval($net),2).'</th></tr></thead>';
                               
                              echo'</tbody>
                            </table>';

?>
<div style="clear:both; margin-bottom:40px"></div>

<?php echo'
 <table class="table table-striped data-tables">
        <thead>
          <tr>
            <th style="60%">Paid Through: '.$lname.'</th>
            <th style="20%">Date: '.$date.'</th>
            <th style="20%">Ref No: '.$refno.'</th>
            </tr>
             <tr>
            <th style="60%">Name:</th>
            <th style="20%">Signature:</th>
            <th style="20%">Date:</th>
            </tr>
        </thead>
        <tbody>




        </tbody>
      </table>';

   ?>
<div style="clear:both; margin-bottom:40px"></div>
<?php
if($code==1){ ?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">THIS IS A PROVISIONAL STATEMENT.THE ACTUAL STATEMENT WILL BE AVAILABLE AT THE END OF <u><?php echo strtoupper($endmonth) ?></u>.</p>
<?php } 

if($code==2){
$result= mysql_query("update landstate set esdstamp=1 where id='".$rcptno."'")  or die (mysql_error());
?>
<!--script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script-->
<?php
}

?>

</div>
<?php 
break;


case 64:


$date=date('Y/m/d');
$dd1=$_GET['d1'];
$dd2=$_GET['d2'];
$d1=substr($dd1,0,2);
$d2=substr($dd2,0,2);
$name=$_GET['name'];
$name2=$_GET['name2'];
$code=$_GET['code'];
$fname='properties_reports';

$xx='';
if($code==1){
  $result =mysql_query("select * from fieldperson where id='".$name."'");
  $row=mysql_fetch_array($result);
  $xx='-BY FIELDPERSON REPORT-'.stripslashes($row['name']);
}

if($code==2){
  $result =mysql_query("select * from groups where name='".$name."'");
  $row=mysql_fetch_array($result);
  $xx='-BY GROUP REPORT-'.stripslashes($row['name']);
}

$mon=substr($dd1,3,2).'_'.substr($dd1,6,4);
$commencestamp=stampreverse($dd1);


?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PAID/UNPAID LANDLORDS REPORT<?php  echo $xx ?>
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong>
<br/><strong style="font-size:11px">Month:<?php  echo $mon ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:15%;">Property Name</td>
         <td  style="width:10%;">Plot No</td>
         <td  style="width:5%;">Group</td>
        <td  style="width:10%;">Field Person</td>
        <td  style="width:5%;">Phone</td>
        <td  style="width:10%;">Paid Amount</td>
         <td  style="width:10%;">Bank Name</td>
        <td  style="width:10%;">A/C Name</td>
        <td  style="width:10%;">A/C No</td>
         <td  style="width:5%;">Payable By</td>
         <td  style="width:5%;">Status</td>
        </tr>


<?php

switch($code){

  case 1:

    if($name=='All'){
    $result =mysql_query("select * from mainhouses where status=1 and paydate>='".$d1."' and paydate<='".$d2."' and  commencestamp<='".$commencestamp."' order by paydate asc");
    }else{
    $result =mysql_query("select * from mainhouses where status=1 and paydate>='".$d1."' and paydate<='".$d2."'  and fid='".$name."' and  commencestamp<='".$commencestamp."' order by paydate asc");
    }


  break;

  case 2:

    if($name=='All'){
    $result =mysql_query("select * from mainhouses where status=1 and paydate>='".$d1."' and paydate<='".$d2."' and  commencestamp<='".$commencestamp."' order by paydate asc");
    }else{

       $xy='(';
       $result =mysql_query("select * from fieldperson where groupid='".$name."'  order by name");
       $num_results = mysql_num_rows($result);
       for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              if($i==0){$xy.='fid='.stripslashes($row['id']).'';}
              else{$xy.=' or fid='.stripslashes($row['id']).'';}

        }
        $xy.=')';



      $result =mysql_query("select * from mainhouses where status=1 and paydate>='".$d1."' and paydate<='".$d2."'  and ".$xy." and  commencestamp<='".$commencestamp."' order by paydate asc");
    }


  break;



}

   
  
  $a=0;$xx=0;$aa=0;
  $totaltenants=$a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
 
  $a+=stripslashes($rowa['bal']);
  $hid=stripslashes($rowa['houseid']);
  $stat=1;


  $total=0;
  $resultb =mysql_query("select * from tenants where hid='".$hid."' and status=1");
  $num_resultsb = mysql_num_rows($resultb);
  for ($b=0; $b <$num_resultsb; $b++) {
  $rowb=mysql_fetch_array($resultb);
  $total+=stripslashes($rowb['monrent']);
 }

 $status='Pending';$statcol='#ff3';$paidam=0;
  $resultc = mysql_query("select * from landstate where mon='".$mon."' and hid='".$hid."'");
  if(mysql_num_rows($resultc)>0){
     $status='Paid';$statcol='#0f6';$xx+=1;
     $rowc=mysql_fetch_array($resultc);
     $paidam=stripslashes($rowc['net']);
  }

  $resultb =mysql_query("select * from fieldperson where id='".stripslashes($rowa['fid'])."'");
  $rowb=mysql_fetch_array($resultb);
  $group=stripslashes($rowb['groupid']);


  if($name2==1&&$status=='Pending'){$stat=0;}
  if($name2==0&&$status=='Paid'){$stat=0;}
  if($name2=='All'){$stat=1;}
  if($stat==1){

  $aa+=1;

  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housename']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['plot']) ?></td>
 <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $group ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['fname']) ?></td>
   <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mobile']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $paidam ?>).formatMoney(2, '.', ','));</script></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bankname']) ?></td>
     <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['acname']) ?></td>
      <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['acno']) ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['paydate']) ?></td>
    <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;background:<?php  echo $statcol ?>;  "><?php  echo $status ?></td>
  </tr>

<?php

  }
 } 


 $percent=round(($xx*100/$totaltenants),2);
 $yy=$totaltenants-$xx;
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Number Paid:<?php  echo $xx ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Number UnPaid:<?php  echo $yy ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Percentage Paid:<?php  echo $percent ?>%</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;




case 65:


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


$fname='tax_summary_report';

?>
<div class="panel-body maindiv" style="width:99%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:85px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">TAX SUMMARY REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>


<?php $d1=substr($d1,3,4).substr($d1,0,2).'01'; $d2=substr($d2,3,4).substr($d2,0,2).'31';?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:5%;">Date.</td>
        <td  style="width:5%;">Month</td>
        <td  style="width:15%;">Property/Landlord</td>
        <td  style="width:5%;">Phone No</td>
         <td  style="width:5%;">Invoiced</td>
        <td  style="width:10%;">Total Gross Payable</td>
        <td  style="width:10%;">Amount Paid to Owner</td>
        <td  style="width:10%;">MemberPayments</td>
        <td  style="width:10%;">Variance</td>
        <td  style="width:5%;">Comm %d</td>
        <td  style="width:10%;">Commision</td>
        <td  style="width:10%;">Tax</td>
        </tr>


<?php


//considerations-escalations,contract expiries,quartely payments
  $aa=$bb=$cc=$dd=0;$ee=0;$ff=$gg=0;$hh=0;
  $resultq =mysql_query("select * from landstate where stamp>='".$d1."' and stamp<='".$d2."'");
  $num_resultsq = mysql_num_rows($resultq);
  for ($q=0; $q <$num_resultsq; $q++) {
  $rowq=mysql_fetch_array($resultq);
  $hid=stripslashes($rowq['hid']);
  $housename=stripslashes($rowq['hname']);
  $total=stripslashes($rowq['gross']);
  $paid=stripslashes($rowq['net']);
  $tax=stripslashes($rowq['vat']);
  $comm=stripslashes($rowq['agency']);
  $mon=stripslashes($rowq['mon']);
  $date=stripslashes($rowq['date']);


  $total=0;
  $result =mysql_query("select * from landstateunits where hid='".$hid."'  and  mon='".$mon."'");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $total+=stripslashes($row['amount']);

  }

  $resulta =mysql_query("select * from mainhouses where houseid='".$hid."'");
  $rowa=mysql_fetch_array($resulta); 
  $commision=stripslashes($rowa['commision']);
  $mobile=stripslashes($rowa['mobile']);


  $resulta =mysql_query("select SUM(amount) as dr from receipt where actid=1 and hid = '".$hid."' and mon = '".$mon."'" );
  $rowa=mysql_fetch_array($resulta);
  $receipts=floatval($rowa['dr']);


  $resulta =mysql_query("select SUM(invamount) as dr from invoices where actid=1 and hid = '".$hid."' and mon = '".$mon."'" );
  $rowa=mysql_fetch_array($resulta);
  $invoiced=floatval($rowa['dr']);

  $balances=$total-$receipts;

   $aa+=$total;
   $bb+=$comm;
   $cc+=$paid;
   $ee+=$tax;
   $ff+=$receipts;
   $gg+=$balances;
   $hh+=$invoiced;




  if($q%2==0){$col='#f0f0f0';}else{$col='#fff';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $q+1 ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $date ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $mon ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $housename ?></td>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $mobile ?></td>
    <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $invoiced ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>

   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $receipts ?>).formatMoney(2, '.', ','));</script></td>

    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $balances ?>).formatMoney(2, '.', ','));</script></td>

   <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $commision ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $comm ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $tax ?>).formatMoney(2, '.', ','));</script></td>

  </tr>

  <?php
   } 
?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:15%;"></td>
        <td  style="width:5%;">Totals</td>
        <td  style="width:5%;"><script>document.writeln(( <?php  echo $hh ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $aa ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></td>

        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ff ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $gg ?>).formatMoney(2, '.', ','));</script></td>



        <td  style="width:5%;"></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $bb ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $ee ?>).formatMoney(2, '.', ','));</script></td>
        </tr>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 66:

function loopsumtx($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
if(stripslashes($rowa['drcr'])=='dr'){
  $type='Payment';
}else{$type='Deduction';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mon']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $type ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['itname']) ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['description']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}

if($name=='All'){$code=1;}else{$code=2;}
if(isset($_GET['code'])){$code=$_GET['code'];}


if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='landlord_transactions_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">LANDLORD TRANSACTIONS REPORT
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


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:10%;">Date</td>
        <td  style="width:10%;">Month</td>
        <td  style="width:15%;">Property Name</td>
        <td  style="width:10%;">Type</td>
        <td  style="width:15%;">Item Name</td>
        <td  style="width:25%;">Description</td>
        <td  style="width:10%;">Amount</td>
    </tr>


<?php



switch($code){

  case 1:

  if($d1==0){
  $result =mysql_query("select * from landtx");
  }
  else{
  $result =mysql_query("select * from landtx  where stamp>='".$d1."' and stamp<='".$d2."'");
  }


  break;

  case 2:

  if($d1==0){
  $result =mysql_query("select * from landtx  where  hid='".$name."'");
  }
  else{
  $result =mysql_query("select * from landtx  where stamp>='".$d1."' and stamp<='".$d2."' and hid='".$name."'");
  }

  
  break;


  case 3:

  $type=$_GET['type'];


    if($d1==0){

    $result =mysql_query("select * from landtx  where  mon='".$name."' and itcode='".$type."'");
    }
    else{

    $result =mysql_query("select * from landtx  where stamp>='".$d1."' and stamp<='".$d2."' and mon='".$name."' and itcode='".$type."'");
    }

  
  break;
}
  
 

  $arr1=array();$arr2=array();$arr3=array();
  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $drcr=stripslashes($row['drcr']);
  $status=stripslashes($row['status']);
  if($drcr=='dr'){
  $a+=preg_replace('~,~', '', stripslashes($row['amount']));
  }else{
  $b+=preg_replace('~,~', '', stripslashes($row['amount']));
  }
  loopsumtx($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Payments: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Deductions: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Net Difference: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 67:
$hid=$_GET['rcptno'];
$result =mysql_query("select * from mainhouses where houseid='".$hid."'");
$rowx=mysql_fetch_array($result);
$housename=stripslashes($rowx['housename']);
$plot=stripslashes($rowx['plot']);
$owner=stripslashes($rowx['owner']);
$location=stripslashes($rowx['location']);
$commision=stripslashes($rowx['commision']);
$vatstatus=stripslashes($rowx['vat']);
$phone=stripslashes($rowx['mobile']);

?>
<style>
.form-group{margin-bottom: 0px;font-size: 13px}
b{color:#f00;}
</style>

<?php


echo'               <div class="panel-body" style="width:740px"><form class="form-horizontal" action="#" role="form">
                    <div style="clear:both; margin-bottom:10px"></div>
                     
                       <p style="text-align:center;font-size:18px;font-weight:bold">
                      <strong>REPUBLIC OF KENYA<br/>
                      AGENCY AGREEMENT</strong><br/>
                      </p>


                      <div style="clear:both;border-bottom:2px solid #333;width:100%"></div>
                    
                      <div class="lofdiv">
                     

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">"An agreement is made on this <b><u>'.stripslashes($rowx['date']).'</U></b> between <b><u>'.$comname.'</U></b> 
                      of Post Office Box Number <b><u>'.$comadd.'</U></b>. A limited liability company herein after referred as <b><u>("AGENT")</U></b>   whereby where the context so admits includes its representatives and assigns on one part 
                      <b><u>'.stripslashes($rowx['housename']).'</U></b> and I.D NO.<b><u>'.stripslashes($rowx['idno']).'</U></b> of Post Office Box number <b><u>'.stripslashes($rowx['postal']).'</U></b> here in after referred to as the <b><u>("PRINCIPAL")</U></b>  whereby where the context so admits includes their administrators
and estate on the other part. And whereas the principal is the proprietor of all that piece of land  own as plot number <b><u>'.stripslashes($rowx['plot']).'</U></b>  and the developments thereon."
</p>
                    
                     
                      </div>
                      </div>

                      <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left;font-size:16px;font-weight:bold"><u>NOW THIS AGREEMENT IS AGREED AND DECLARED AS FOLLOWS:</u></p>
                    
                      </div>
                      </div>

                      <div class="form-group">
                       
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">1.That the <b><u>"PRINCIPAL"</u></b> does hereby engage the <b><u>"AGENT"</u></b> to manage and collect rent on behalf of the rental houses situated on plot number <b><u>'.stripslashes($rowx['plot']).'</U></b>.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">2.That the  <b><u>"PRINCIPAL"</u></b> shall pay to the <B><u>"AGENT"</u></b> a commission of <B><u>'.stripslashes($rowx['commision']).'%</u></b> of total rent collected and to be deducted from the rent paid by the <b><u>"PRINCIPAL`s"</u></b> members.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">3.That the <b><u>"AGENT"</u></b> does hereby undertake to remit to the <b><u>"PRINCIPAL"</u></b> full rent less <B><u>'.stripslashes($rowx['commision']).'%</u></b> on the <b><u>'.stripslashes($rowx['paydate']).'th</U></b> of every month for all occupied rooms.</p>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">4.That the <b><u>"AGENT"</u></b> will deposit all money collected on the <b><u>'.stripslashes($rowx['paydate']).'th</U></b> day of every month to <B><u>'.stripslashes($rowx['bankname']).'</u></b> <B><u>'.stripslashes($rowx['branchname']).'</u></b> ACCOUNT NAME <b><u>'.stripslashes($rowx['acname']).'</U></b> ACCOUNT NO <b><u>'.stripslashes($rowx['acno']).'</U></b> respectively.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">5.That the  <b><u>"'.stripslashes($rowx['depositheldby']).'"</u></b> retains in respect of each unit a Deposit equal to one month`s rent for every <b><u>new</u></b> member</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">6.That the management of water and electricity payments shall be taken care of by the <b><u>"'.stripslashes($rowx['utilitiesby']).'"</u></b>.</p>
                      </div>
                      </div>


                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">7.This agreement takes effect from <b><u>'.stripslashes($rowx['commencedate']).'</U></b> until terminate by either party giving the other one months notice in writing.</p>
                      </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                       <p style="text-align:left">8.That the <b><u>"AGENT"</u></b> shall provide the <b><u>"PRINCIPAL"</u></b> with a monthly return and a list of all current members and their corresponding rooms.</p>
                     </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">9.That the contract shall be terminated with immediate effect if the <b><u>"PRINCIPAL"</u></b> receives any payments directly from the members.</p>
                     </div>
                      </div>

                      <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">10.That the <b><u>"AGENT"</u></b> shall assume every member has a Rent deposit equivalent to one month`s rent to Cushion rent defaulters.</p>
                     </div>
                      </div>

                       <div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">11.That the <b><u>"AGENT"</u></b> shall not be responsible or liable for rent arrears accumulated prior to the Execution of this agreement.</p>
                     </div>
                      </div>';
                      if($vatstatus==1){
                      echo'<div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">12. That we shall deduct 16% V.A.T value added tax on commission.</p>
                     </div>
                      </div>';

                      }



                      echo'<div class="form-group">
                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">For and on behalf of '.$comname.':</p>
                     </div>
                      </div>


                       <div class="form-group">
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left"><strong><u>NAME</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>ID NO</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <strong><u>TEL NO</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <strong><u>DESIGNATION</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>SIGNED</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>DATE</u></strong>
                      </p>
                      </div>
                      </div>

                       <p style="text-align:left;MARGIN-BOTTOM:0;PADDING-BOTTOM:0">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>DIRECTOR</strong>
                        </p>



                      <div style="clear:both;border-bottom:2px dashed #ccc;width:100%;margin-top:0px;margin-bottom:0px"></div>

                       <div class="form-group">

                      <div class="col-sm-12 controls" style="float:left">
                      <p style="text-align:left">For and on behalf of THE PRINCIPAL:</p>
                      </div>
                    
                      
                      <div class="col-sm-12 controls" style="float:right">
                      <p style="text-align:left"><strong><u>NAME</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>ID NO</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <strong><u>TEL NO</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <strong><u>DESIGNATION</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>SIGNED</u></strong>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong><u>DATE</u></strong>
                      </p>
                      </div>
                      </div>

                      <p style="text-align:left;MARGIN-BOTTOM:0;PADDING-BOTTOM:0">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>PRINCIPAL</strong>
                        </p>
                        <div style="clear:both;border-bottom:2px dashed #ccc;width:100%;margin-top:0px;"></div>


                      <div class="form-actions-condensed wizard"> </div>
                    </form>
                  </div>';
                  

break;



case 68:
$date=date('Y/m/d');
$stamp=date('Ymd');
$mon=$_GET['mon'];



?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:130px; margin:0px 10px 0 10px;width:10%;  position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">UNPAID MONTHLY WATER INVOICES REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
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
      <td  style="width:26%">MemberName</td>
      <td  style="width:10%">Unit No</td>
      <td  style="width:10%">W.Prev</td>
      <td  style="width:10%">W.Curr</td>
      <td  style="width:10%">Consum</td>
       <td  style="width:10%">Amount Due</td>
      <td  style="width:10%">Amount Paid</td>
      <td  style="width:10%">Balance</td>
      
  </tr> 


<?php
//$result =mysql_query("select * from waterinvoices where mon='".$mon."' and status=1");

  //$mon=$_GET['reg'];
  //$categ=$_GET['categ'];
  //$date=date('Y/m/d');
  $stamp=date('Ymd');
  //$fname=$mon.'_category_statements';

  $arr=array();
  $pos=array();
  $result = mysql_query("select * from tenants where status = 1 ORDER BY roomno");
  //echo $result;
  $num_results = mysql_num_rows($result);

  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $arr[stripslashes($row['tid'])]=array(stripslashes($row['bname']), stripslashes($row['bal']), stripslashes($row['roomno']));
  }

  //$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$m=0;$z=0;$k=0;$l=0;$t=0;$x=0;
  $consum=0;$due=0;$paid=0;$balance=0;
  $globwd;

  foreach ($arr as $key => $val) {
              
    $dr=0;$cr=0;$rcptno='';$dat='';$rno;$wp=0;$wc=0;$wd=0;

    $result =mysql_query("select * from waterinvoices where mon='".$mon."' and tid='".$key."'");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
      $rowx = mysql_fetch_array($result);
      $dr += stripslashes($rowx['total']);
      $wp += stripslashes($rowx['wp']);
      $wc += stripslashes($rowx['wc']);
      $wd += stripslashes($rowx['wd']);
    }
    

    $result =mysql_query("select * from receipts where month='".$mon."' and tid = '".$key."' and drcr='cr' and description LIKE '%WATER%'");
    $num_results = mysql_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
      $row=mysql_fetch_array($result);
      $cr+=stripslashes($row['amount']);
      $rcptno.=stripslashes($row['rcptno']).';';
      $dat.=stripslashes($row['date']).'; ';
    }
      //echo $key.' - '.stripslashes($row['rno']).'<br>';       s

    $bal=$dr-$cr;
    if ($bal > (0.5*$dr) && $val[1] > 0 ){
      $consum += $wd;
      $due += $dr;
      $paid += $cr;
      $balance += $bal;
      //array_push($pos, array($key,$val[0],$val[2],$wp,$wc,$wd,$dr,$cr,$bal,$dat,$rcptno));
      $pos[]=array($key,$val[0],$val[2],$wp,$wc,$wd,$dr,$cr,$bal,$dat,$rcptno);
    }
    
  }

  $count = count($pos);$aa=0;
  for ($i=0; $i <$count; $i++) {
    $aa+=1;
  if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:26%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $pos[$i][1] ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $pos[$i][2] ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $pos[$i][3] ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $pos[$i][4] ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $pos[$i][5] ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $pos[$i][6] ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $pos[$i][7] ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $pos[$i][8] ?>).formatMoney(2, '.', ','));</script></td>
     
       </tr>


<?php 
$aa++;
} ?>

<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
       <td  style="width:4%"></td>
      <td  style="width:26%">Totals</td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"></td>
      <td  style="width:10%"><?php  echo $consum ?></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $due ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>
      <td  style="width:10%"><script>document.writeln(( <?php  echo $balance ?>).formatMoney(2, '.', ','));</script></td>
  </tr> 

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 69:
$reg=$_GET['d2'];
$categ=$_GET['name'];
$date=date('Y/m/d');
$stamp=date('Ymd');
$fname=$reg.'_category_statements';

$arr=array();
$pos=array(array());
$result =mysql_query("select * from receipts where month='".$reg."' order by rno");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[stripslashes($row['tid'])]=stripslashes($row['tid']);
}
foreach ($arr as $key => $val) {
              
              $dr=0;$cr=0;$rcptno='';$dat='';
              if($categ=='All'){
              $result =mysql_query("select * from invoices where mon='".$reg."' and tid='".$key."'");
              }else{
              $result =mysql_query("select * from invoices where mon='".$reg."' and tid='".$key."' and actid='".$categ."'");   
              }
              
              $num_results = mysql_num_rows($result);
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $dr+=stripslashes($row['invamount']);
              }

              if($categ=='All'){
              $result =mysql_query("select * from receipt where mon='".$reg."' and tid='".$key."'");
              }else{
              $result =mysql_query("select * from receipt where mon='".$reg."' and tid='".$key."' and actid='".$categ."'");   
              }
              $num_results = mysql_num_rows($result);
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $cr+=stripslashes($row['amount']);
              $rcptno.=stripslashes($row['rcptno']).';';
              $dat.=stripslashes($row['date']).'; ';
              }
      //echo $key.' - '.stripslashes($row['rno']).'<br>';       s
    $bal=$dr-$cr;
    if (!empty($row) && !($dr == 0 && $cr == 0)) {  
      $pos[]=array(stripslashes($row['tid']),stripslashes($row['tname']),stripslashes($row['rno']),$dr,$cr,$bal,$dat,$rcptno);
    }
    
}


?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:130px; margin:0px 10px 0 10px;width:10%;  position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">MONTHLY INCOME CATEGORY STATEMENTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MONTH:&nbsp;&nbsp;<?php  echo $reg ?>&nbsp;&nbsp;CATEGORY:&nbsp;<?php  echo $categ ?></p>

<div style="clear:both; margin-bottom:10px" ></div>
<a download="landlord_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:14%;">Unit</td>
        <td  style="width:20%;">Members Name</td>
        <td  style="width:14%;">Amount Due</td>
        <td  style="width:14%;">Amount Paid</td>
        <td  style="width:14%;">Balance</td>
        <td  style="width:14%;">Date</td>
        <td  style="width:10%;">Receipt</td>
    </tr>
<?php

$max=count($pos);
$a=0;$b=0;$c=0;
for ($i = 1; $i < $max; $i++){

  $a+= $pos[$i][3];
  $b+= $pos[$i][4];
  $c+= $pos[$i][5];

  if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pos[$i][2] ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pos[$i][1] ?></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][3] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][4] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][5] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pos[$i][6] ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pos[$i][7] ?></td>
</tr>
<?php } 

$percent=$b*100/$a;
$percent=round($percent,2);
$vacant=0;
$result =mysql_query("select * from houses where status=0");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$vacant+=stripslashes($row['rent']);
?>


<tr style="width:100%; height:20px;padding:0; background:#ff3; font-weight:normal  ">
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['roomno']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; ">Rent Amount: <script>document.writeln((<?php  echo stripslashes($row['rent']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">0</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">0</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">0</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "></td>
</tr>
<?php

}

?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:14%;">Totals</td>
        <td  style="width:20%;">Vacant: <script>document.writeln((<?php  echo $vacant ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;"><script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;"><script>document.writeln((<?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;"><script>document.writeln((<?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;">Percent : <?php  echo $percent ?> %</td>
        <td  style="width:10%;"></td>
    </tr>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 
break;



case 70:
$reg=$_GET['d2'];
$date=date('Y/m/d');
$stamp=date('Ymd');
$fname=$reg.'_summary_statements';



$arr=array();
$pos=array(array());

$result =mysql_query("select * from activities where status=1");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$arr[stripslashes($row['id'])]=strtoupper($row['name']);
}



foreach ($arr as $key => $val) {
              
              $dr=0;$cr=0;$rcptno='';$dat='';

              $result =mysql_query("select * from invoices where mon='".$reg."'  and actid='".$key."'");
              $num_results = mysql_num_rows($result);
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $dr+=stripslashes($row['invamount']);
              }

              $result =mysql_query("select * from receipt where mon='".$reg."'  and actid='".$key."'");
              $num_results = mysql_num_rows($result);
              for ($i=0; $i <$num_results; $i++) {
              $row=mysql_fetch_array($result);
              $cr+=stripslashes($row['amount']);
              $rcptno.=stripslashes($row['rcptno']).';';
              $dat.=stripslashes($row['date']).';';
              }
              
    $bal=$dr-$cr; 
    $desc=$val.' STATEMENT ('.$reg.')';     
    $pos[]=array($desc,$dr,$cr,$bal);
    
}


?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:130px; margin:0px 10px 0 10px;width:10%;  position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">MONTHLY INCOME SUMMARY STATEMENTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MONTH:&nbsp;&nbsp;<?php  echo $reg ?>&nbsp;&nbsp;</p>
<div style="clear:both"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:40%;">Category</td>
        <td  style="width:20%;">Total Due</td>
        <td  style="width:20%;">Total Paid</td>
        <td  style="width:20%;">Balance</td>
       </tr>
<?php

$max=count($pos);
$a=0;$b=0;$c=0;
for ($i = 1; $i < $max; $i++){

  $a+= $pos[$i][1];
  $b+= $pos[$i][2];
  $c+= $pos[$i][3];

  if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $pos[$i][0] ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][1] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][2] ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo $pos[$i][3] ?>).formatMoney(2, '.', ','));</script></td>

</tr>
<?php } 

$percent=$b*100/$a;
$percent=round($percent,2);
?>


<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:40%;">Grand Totals</td>
        <td  style="width:20%;"><script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:20%;"><script>document.writeln((<?php  echo $b ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:20%;"><script>document.writeln((<?php  echo $c ?>).formatMoney(2, '.', ','));</script></td>
       
    </tr>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 
break;


case 71:

$date=date('Y/m/d');
if(isset($_GET['name'])){
$name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];


if($code==1){
  
  if($name==1){$title='Active Members';}
  else if($name=='All'){$title='All Members';}
  else if($name==0){$title='Ex-Members';}
  
}
if($code==2){$title='Members By Property';}

if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='member_reports';

?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
  <div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:130px; margin:0px 10px 0 10px;width:10%;  position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">MEMBER LIST REPORT [<?php  echo $title ?>]
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($code==1){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Contracts List-Active</p>
<?php } else if($code==2){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Contracts List-Expired</p>
<?php }else if($code==3){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Contracts List-All</p>
<?php }else if($code==4){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Contracts List-Almost to Expire</p>
<?php } else {}?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:20%;">MemberName</td>
        <td  style="width:10%;">Property Name</td>
        <td  style="width:6%;">Unit</td>
        <td  style="width:8%;">Phone</td>
        <td  style="width:8%;">Email</td>
        <td  style="width:8%;">Rent</td>
        <td  style="width:10%;">Lease Start</td>
        <td  style="width:8%;">End Date</td>
        <td  style="width:10%;">Balance</td>
        <td  style="width:10%;">Status</td>
    </tr>


<?php
  
  $back='';$stat='';
   $today=date('Ymd');
  $next=date('Y-m-d', strtotime('+1 month')) ;
  $next=preg_replace('~-~', '', $next);

  if($code==1){
  $result =mysql_query("select * from tenants where status=1  order by roomno");
  }
  else if($code==2){
  $result =mysql_query("select * from tenants where status=0  order by roomno");
  }
  
  else if($code==3){
  $result =mysql_query("select * from tenants order by roomno");
  }
  
  else if($code==4){
 
  $result =mysql_query("select * from tenants where status=1  and contract_expiry_stamp>='".$today."'  and contract_expiry_stamp<='".$next."' order by roomno");
  }
 
  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=mysql_fetch_array($result);
  $status=stripslashes($rowa['status']);
  $a+=preg_replace('~,~', '', stripslashes($rowa['monrent']));
  $b+=preg_replace('~,~', '', stripslashes($rowa['bal']));
  if($status==1){$back='#0f6';$stat='Active';}
  if($status==0){$back='#f00';$stat='Inactive';}
  if(stripslashes($rowa['contract_expiry_stamp'])>=$today&&stripslashes($rowa['contract_expiry_stamp'])<=$next){$back='#ff0';$stat='Almost Expiring';}

  $aa=$i+1;
    $sent='';
    if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
    echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
    ?>
    <td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['bname']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['hname']) ?></td>
    <td  style="width:6%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['roomno']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['phone']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['email']) ?></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($rowa['monrent']) ?>).formatMoney(2, '.', ','));</script></td>
    <td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['date']) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stamptodate(stripslashes($rowa['contract_expiry_stamp'])) ?></td>
    <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($rowa['bal']) ?>).formatMoney(2, '.', ','));</script></td>
     <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;background: <?php  echo $back ?>"><?php  echo $stat ?></td>
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



case 72:
if(!(isset($_SESSION['loanschedule']))){
echo"
                    <script>
                    alert('No schedule calculated!')
                    </script>";
exit;
}

$fname='loan_amortization_schedule';
?>
<div class="panel-body maindiv" style="width:800px;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">LOAN AMORTIZATION SCHEDULE
<br/><strong style="font-size:12px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Summary</p>


<table   style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:20%;">Loan Amount</td>
      <td  style="width:20%;">No of Months</td>
      <td  style="width:20%;">Monthly Payment</td>
      <td  style="width:20%;">Total Payments</td>
      <td  style="width:20%;">Interest Paid</td>
     </tr>

<?php

      echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
  ?>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['calculator'][1] ?>).formatMoney(2, '.', ','));</script></td>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $_SESSION['calculator'][2] ?></td>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['calculator'][3] ?>).formatMoney(2, '.', ','));</script></td>
     <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['calculator'][4] ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['calculator'][5] ?>).formatMoney(2, '.', ','));</script></td>
    </tr>

</tbody>
</table>
 <div style="clear:both; margin-bottom:10px"></div>


<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Breakdown</p>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:20%;">Month</td>
      <td  style="width:20%;">Starting Balance</td>
      <td  style="width:20%;">Interest</td>
      <td  style="width:20%;">Payment</td>
      <td  style="width:20%;">Ending Balance</td>
     </tr>

<?php

  $max=count($_SESSION['loanschedule']);
 for ($row = 0; $row < $max; $row++){
   if($row%2==0){
      echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
    ?>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $_SESSION['loanschedule'][$row][0] ?></td>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['loanschedule'][$row][1] ?>).formatMoney(2, '.', ','));</script></td>
    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['loanschedule'][$row][2] ?>).formatMoney(2, '.', ','));</script></td>
     <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['loanschedule'][$row][3] ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo $_SESSION['loanschedule'][$row][4] ?>).formatMoney(2, '.', ','));</script></td>
    </tr>
<?php } ?>

</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>

<?php
break;



case 73:
$result =mysql_query("select * from ledgers limit 0,1");
$row=mysql_fetch_array($result);
$date=stripslashes($row['date']);
$name='All';$dd1=$dd2=0;
$sent='';
if(isset($_GET['d1'])){
 
  $d1=$_GET['d1'];
   $dd1='01'.'/'.substr($d1,0,2).'/'.substr($d1,3,4);
  $sent.='&d1='.$dd1;
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
$dd2='31'.'/'.substr($d2,0,2).'/'.substr($d2,3,4);
  $sent.='&d2='.$dd2;
}else $d2=0;


 $dd1=preg_replace('~/~', '', $dd1); $dd2=preg_replace('~/~', '', $dd2);


$_SESSION['setledgers']=array();
?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">BUDGET MANAGEMENT REPORT</p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>

<a download="income_statement.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px"></div>
<?php
$start=$startmain=$d1=substr($d1,3,4).substr($d1,0,2).'01';
$end=$d2=substr($d2,3,4).substr($d2,0,2).'31';
$_SESSION['mainstart']=$start;$_SESSION['mainend']=$end;
$monexpact=$monrevact=$mondiffact=$monassact=array();
$monexpbud=$monrevbud=$mondiffbud=$monassbud=array();
$currrevat=$currexpact=$currdiffact=$currassact=array();
?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="text-align:left">Account</td>
      <?php
      $monexpbud[$startmain]=$monrevbud[$startmain]=$monassbud[$startmain]=0;$mondiffbud[$startmain]=0;
      $monexpact[$startmain]=$monrevact[$startmain]=$monassact[$startmain]=0;$mondiffact[$startmain]=0;
      $currrevat[$startmain]=$currexpact[$startmain]=$currassact[$startmain]=0;$currdiffact[$startmain]=0;

      

    echo '<td  style="text-align:right">Budget</td>';
    echo '<td  style="text-align:right">Actual Amount (Current)</td>';
    echo '<td  style="text-align:right;display:none">Actual Year to Date </td>';
    echo '<td  style="text-align:right">Variance</td>';
    echo '<td  style="text-align:right">% Difference</td>';
      $start=$d1;
      ?>
      <?php
      /*echo'<td  style="">Total (Budget)</td>
      <td  style="">Total (Actual)</td>
      <td  style="">Total (Variance)</td>
      <td  style="">Total (Diff)</td>';
      */
      ?>
      </tr> 



<?php


$arr=array(array());
$result =mysql_query("select * from ledgers order by name");
  $num_results = mysql_num_rows($result); 
  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $_SESSION['allledgers'][stripslashes($row['ledgerid'])]=0;
    $_SESSION['allledgerstodate'][stripslashes($row['ledgerid'])]=0;
    $_SESSION['allbudget'][stripslashes($row['ledgerid'])]=0;
    $arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name']),'');
  }


 

  $result =mysql_query("select * from ledgers where level=1 order by name");
  $num_results = mysql_num_rows($result); 
  for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
      $_SESSION['mainarr'][stripslashes($row['ledgerid'])]=0;
      $finalResult = getledgerChildren($row['ledgerid']);
      printledgerlist($finalResult,$startmain,$end);
      calculatebudget($finalResult,$startmain,$end);

   }




$totexpact=$totrevact=$totassact=0;$totexpbud=$totrevbud=$totassbud=0;$loadrev=0;$loadexp=0;

//no cost of goods and stock expenses
$resultm =mysql_query("select * from ledgers where level=1 and (type='Revenue' or type='Expense' or ledgerid='856') and ledgerid!=644 and ledgerid!=818  order by ordertype asc,code asc");
$num_resultsm = mysql_num_rows($resultm); 
for ($m=0; $m <$num_resultsm; $m++) {
$rowm=mysql_fetch_array($resultm);
$mainkey=$rowm['ledgerid'];
$finalResult = getledgerChildren($rowm['ledgerid']);
$type=$rowm['type'];
$mainname=stripslashes($rowm['name']);
$parent=stripslashes($rowm['parent']);


  
$yearledtot=0;$yearacttot=0;$yeardiff=0;$peryearcdiff=0;
$max=count($arr);
for ($i = 1; $i < $max; $i++){

  $finalResult = getledgerChildren($mainkey);

  if($mainkey==$arr[$i][0]){



  
    if($loadrev==0&&$arr[$i][1]=='Expense'){

    echo'
    <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">

    <td  style="text-align:left">Total Income</td>';

        $endrevact=0;$endrevbud=$totmonact=0;
    

        foreach ($monrevact as $q => $val) {
        //echo '<td  style="">'.number_format($monrevbud[$q], 2, ".", "," ).'</td>';
        //echo '<td  style="">'.number_format($val, 2, ".", "," ).'</td>';

          $dd=$monrevbud[$q]-$val;
          if($monrevbud[$q]==0||$monrevbud[$q]==''){$percdifferrence=0;$monrevbud[$q]=0;}else{
          $percdifferrence=round(($val*100/$monrevbud[$q]),2);  
          }

          //echo '<td  style="">'.number_format($dd, 2, ".", "," ).'</td>';
          //echo '<td  style="font-weight:bold">'.$percdifferrence.'%</td>';
          $endrevact+=$val;$endrevbud+=$monrevbud[$q];$totmonact+=$currrevat[$q];
          $mondiffact[$q]+=$val;$mondiffbud[$q]+=$monrevbud[$q];$currdiffact[$q]+=$currrevat[$q];


        }

        $difference=$endrevbud-$totmonact;
        if($endrevbud==0||$endrevbud==''){$percdifferrence=0;$endrevbud=0;}else{
          $percdifferrence=round(($totmonact*100/$endrevbud),2);  
        }
        echo'<td  style="text-align:right">'.number_format(round($endrevbud)).'</td>
        <td  style="text-align:right">'.number_format(round($totmonact)).'</td>
        <td  style="text-align:right;display:none">'.number_format(round($endrevact)).'</td>
        <td  style="text-align:right">'.number_format(round($difference)).'</td>
        <td  style="font-weight:bold;text-align:right">'.$percdifferrence.'%</td>';
        

      echo'</tr>';

      $loadrev=1;
  
  }



  if($loadexp==0&&$arr[$i][1]=='Asset'){
    
    echo'
    <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">

    <td  style="text-align:left">Total Operations Expenditure</td>';

      $endexpact=0;$endexpbud=0;$totmonact=0;
    

       foreach ($monexpact as $q => $val) {
        //echo '<td  style="">'.number_format($monexpbud[$q], 2, ".", "," ).'</td>';
        //echo '<td  style="">'.number_format($val, 2, ".", "," ).'</td>';

        $dd=$monexpbud[$q]-$val;
        if($monexpbud[$q]==0||$monexpbud[$q]==''){$percdifferrence=0;$monexpbud[$q]=0;}else{
        $percdifferrence=round(($val*100/$monexpbud[$q]),2);  
        }

        //echo '<td  style="">'.number_format($dd, 2, ".", "," ).'</td>';
        //echo '<td  style="font-weight:bold">'.$percdifferrence.'%</td>';
        $endexpact+=$val;$endexpbud+=$monexpbud[$q];$totmonact+=$currexpact[$q];
        $mondiffact[$q]-=$val;$mondiffbud[$q]-=$monexpbud[$q];$currdiffact[$q]-=$currexpact[$q];
        }

        $difference=$endexpbud-$totmonact;
        if($endexpbud==0||$endexpbud==''){$percdifferrence=0;$endexpbud=0;}else{
          $percdifferrence=round(($totmonact*100/$endexpbud),2);  
        }
      

      echo'<td  style="text-align:right">'.number_format(round($endexpbud)).'</td>
      <td  style="text-align:right">'.number_format(round($totmonact)).'</td>
      <td  style="text-align:right;display:none">'.number_format(round($endexpact)).'</td>
      <td  style="text-align:right">'.number_format(round($difference)).'</td>
      <td  style="font-weight:bold;text-align:right">'.$percdifferrence.'%</td>';
        

      echo'</tr>';


    }
  
  //end if

  
   
        $type=$arr[$i][1];
        

        $a=0;$b=0;$c=0;$d=0;
        $monledtot=$_SESSION['allledgers'][$mainkey];
        $c=$_SESSION['allledgerstodate'][$mainkey];
        


          if($parent==0){

            $monledtot=getledgerbaldates($mainkey,$dd1,$dd2);
            $c=getledgerbaldates($mainkey,date('Y').'0101',date('Ymd'));
            
          }


        

        
        $actamount=0;
        /*while($start<=$end){
          $monstart=substr($start,0,4).substr($start,4,2).'01';
          $monend=substr($start,0,4).substr($start,4,2).'31';
          $actamount+=getbudgetamount($arr[$i][0],substr($monstart,0,4),substr($monstart,4,2));
          $start=addmonths($start,1);

        }
        */
        if($parent==0){
          $actamount=getbudgetamountparent($mainkey,substr($startmain,0,4),substr($startmain,4,2),$startmain,$end);
        }else{
          $actamount=$_SESSION['allbudget'][$mainkey];  
        }
        



        
        $diff=$actamount-$c;
        if($actamount==0||$actamount==''){$percdiff=0;$actamount=0;}else{
          $percdiff=round(($c*100/$actamount),2); 
        }



        


        
        $pos[]=array($arr[$i][0],$arr[$i][1],$arr[$i][3],$actamount,$c,$diff,$percdiff,$arr[$i][4]);  
            
        $yearledtot+=$c;
        $yearacttot+=$actamount;

        if($arr[$i][1]=='Revenue'){$monrevact[$startmain]+=$c;$monrevbud[$startmain]+=$actamount;$currrevat[$startmain]+=$monledtot;}
        if($arr[$i][1]=='Expense'){$monexpact[$startmain]+=$c;$monexpbud[$startmain]+=$actamount;$currexpact[$startmain]+=$monledtot;}
        if($arr[$i][1]=='Asset'){$monassact[$startmain]+=$c;$monassbud[$startmain]+=$actamount;$currassact[$startmain]+=$monledtot;}
        //$start=addmonths($start,1);

         

          $start=$d1;
          if($arr[$i][1]=='Revenue'){$totrevact+=$yearledtot;}if($arr[$i][1]=='Expense'){$totexpact+=$yearledtot;}if($arr[$i][1]=='Asset'){$totassact+=$yearledtot;}

          $yeardiff=$yearacttot-$monledtot;

          if($yearacttot==0||$yearacttot==''){$peryearcdiff=0;$yearacttot=0;}else{
          $peryearcdiff=round(($monledtot*100/$yearacttot),2); 
        }

  


    }//end if

  }//end for

  if($parent==0){
  echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer  " onclick="window.open(\'report.php?id=36&name='.$mainkey.$sent.'\')" title="Click to View" >';
  }else{
  echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;cursor:pointer  " onclick="viewbreakdown(\''.$mainkey.'\')" title="Click to View" >';
  }
  if($parent==0){
  echo'<td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:left">'.$mainname.'</td>';
  }
  else{
  echo'<td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:left">'.$mainname.'<img src="img/bu.png" style="width:12px; height:15px; margin:0 3px -4px 1px"></td>';
  }
  
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($yearacttot)).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($monledtot)).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right;display:none">'.number_format(round($yearledtot)).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right">'.number_format(round($yeardiff)).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;text-align:right;font-weight:bold">'.$peryearcdiff.'%</td>';

  /*
    echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;">'.number_format($yearacttot, 2, ".", "," ).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;">'.number_format($yearledtot, 2, ".", "," ).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;">'.number_format($yeardiff, 2, ".", "," ).'</td>';
  echo ' <td style="border-width:0.5px; border-color:#666; border-style:solid;font-weight:bold">'.$peryearcdiff.'%</td>';*/

    echo '</tr>';

    showbreakdown2($mainkey,$finalResult,$startmain,$end);




  }//end for loop

    

    echo'
    <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">

    <td  style="text-align:left">Total Capital Expenditure</td>';

      $endassact=0;$endassbud=0;$totmonact=0;
    

       foreach ($monassact as $q => $val) {
        //echo '<td  style="">'.number_format($monexpbud[$q], 2, ".", "," ).'</td>';
        //echo '<td  style="">'.number_format($val, 2, ".", "," ).'</td>';

        $dd=$monassbud[$q]-$val;
        if($monassbud[$q]==0||$monassbud[$q]==''){$percdifferrence=0;$monassbud[$q]=0;}else{
        $percdifferrence=round(($val*100/$monassbud[$q]),2);  
        }

        //echo '<td  style="">'.number_format($dd, 2, ".", "," ).'</td>';
        //echo '<td  style="font-weight:bold">'.$percdifferrence.'%</td>';
        $endassact+=$val;$endassbud+=$monassbud[$q];$totmonact+=$currassact[$q];
        $mondiffact[$q]-=$val;$mondiffbud[$q]-=$monassbud[$q];$currdiffact[$q]-=$currassact[$q];
        }

        $difference=$endassbud-$totmonact;
        if($endassbud==0||$endassbud==''){$percdifferrence=0;$endassbud=0;}else{
          $percdifferrence=round(($totmonact*100/$endassbud),2);  
        }
      

      echo'<td  style="text-align:right">'.number_format(round($endassbud)).'</td>
      <td  style="text-align:right">'.number_format(round($totmonact)).'</td>
      <td  style="text-align:right;display:none">'.number_format(round($endassact)).'</td>
      <td  style="text-align:right">'.number_format(round($difference)).'</td>
      <td  style="font-weight:bold;text-align:right">'.$percdifferrence.'%</td>';
        

    echo'</tr>';



    echo'
    <tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">

    <td  style="text-align:left">Net Profit Before Tax</td>';

      $endrevact=0;$endrevbud=0;$endmondiff=0;


    

      foreach ($mondiffact as $q => $val) {
        //echo '<td  style="">'.number_format($mondiffbud[$q], 2, ".", "," ).'</td>';
        //echo '<td  style="">'.number_format($val, 2, ".", "," ).'</td>';

        $dd=$mondiffbud[$q]-$val;
        if($mondiffbud[$q]==0||$mondiffbud[$q]==''){$percdifferrence=0;$mondiffbud[$q]=0;}else{
        $percdifferrence=round(($val*100/$mondiffbud[$q]),2); 
        }

        ///echo '<td  style="">'.number_format($dd, 2, ".", "," ).'</td>';
        //echo '<td  style="font-weight:bold">'.$percdifferrence.'%</td>';
        $endrevact+=$val;$endrevbud+=$mondiffbud[$q];
        $endmondiff+=$currdiffact[$q];
        
        }

        $difference=$endrevbud-$endmondiff;
        if($endrevbud==0||$endrevbud==''){$percdifferrence=0;$endrevbud=0;}else{
          $percdifferrence=round(($endmondiff*100/$endrevbud),2);  
        

        }
      echo'<td  style="text-align:right">'.number_format(round($endrevbud)).'</td>
      <td  style="text-align:right">'.number_format(round($endmondiff)).'</td>
      <td  style="text-align:right;display:none">'.number_format(round($endrevact)).'</td>
      <td  style="text-align:right">'.number_format(round($difference)).'</td>
      <td  style="font-weight:bold;text-align:right">'.$percdifferrence.'%</td>';

        echo'</tr>';


$_SESSION['comppos']=$pos;


?>
 </tbody>     
</table>  

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p id="testline" style="text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 74:
$name=$_GET['name'];
?>
<div class="panel-body maindiv" style="width:740px;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">PROPERTIES BY GROUP:<?php  echo $name ?><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a id="toexcel" download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:20%">No.</td>
      <td  style="width:80%">Name</td>
      </tr> 


<?php
$a=1;$tot=0;$mm='';
if($name=='All'){$x='';}else {$x="where groupid='".$name."'";}
$result =mysql_query("select * from fieldperson ".$x." order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$rowa=mysql_fetch_array($result);
        if($i==0){
             $mm="and (fid='".stripslashes($rowa['name'])."'";
          }else{
             $mm.=" OR fid='".stripslashes($rowa['name'])."'";
          }

}

$mm.=')';
if($name=='All'){$mm='';}



$result =mysql_query("select * from mainhouses where status=1 ".$mm." order by housename asc");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:80%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['housename']) ?></td>
      
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


case 75:
$name=$_GET['name'];
?>
<div class="panel-body maindiv" style="width:740px;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">FIELDPERSONS BY GROUP:<?php  echo $name ?><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a id="toexcel" download="chart_of_accounts.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:20%">No.</td>
      <td  style="width:80%">Name</td>
      </tr> 


<?php
$a=1;$tot=0;$mm='';
if($name=='All'){$x='';}else {$x="where groupid='".$name."'";}
$result =mysql_query("select * from fieldperson ".$x." order by name");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $a ?></td>
      <td style="width:80%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['name']) ?></td>
      
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



case 76:


$date=date('Y/m/d');
$fname='shares_reports';

$code=2;
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;


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
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0;" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:20%;">Property Name</td>
        <td  style="width:10%;">Property Type</td>
        <td  style="width:10%;">Plot No</td>
        <td  style="width:15%;">Field Person</td>
        <td  style="width:10%;">Commision</td>
        <td  style="width:10%;">Email</td>
        <td  style="width:10%;">Phone</td>
        <td  style="width:10%;">Shares Balance</td>
        </tr>


<?php

  if($d1==0){
   $result =mysql_query("select * from mainhouses where status=1 order by fname asc,housename asc");
  }
  else{
  $result =mysql_query("select * from mainhouses where status=1 and stamp>='".$d1."' and stamp<='".$d2."' order by fname asc,housename asc");
  }

 
  $a=0;
  $a=$num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $rowa=$row=mysql_fetch_array($result); 
  $aa=$i+1;
  $bal=stripslashes($rowa['bal']);
  $a+=$bal;
  $hid=stripslashes($rowa['houseid']);



  if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
  echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
  ?>
  <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
  <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housename']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['housetype']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['plot']) ?></td>
  <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['fname']) ?></td>
  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['commision']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['email']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowa['mobile']) ?></td>
   <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
   
  </tr>

<?php } 
?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Balance:<script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 77:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=0;
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;

$fname='loans_reports';


$d1=preg_replace('~/~', '', datereverse($d1)); $d2=preg_replace('~/~', '', datereverse($d2));


  
       $yy='ALL BRANCHES LOANS';
      if($d1==0){
      $result =mysql_query("select * from  loanaccounts where (status=2 or status=3)");
      }
      else{
      $result =mysql_query("select * from loanaccounts  where stamp_opened>='".$d1."' and stamp_opened<='".$d2."' and (status=2 or status=3)");
      }
     



?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">LOANS REPORTS
<br/><strong style="font-size:12px">Category:<?php  echo $yy ?></strong><br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<div style="clear:both; margin-bottom:20px"></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">Date</td>
      <td  style="width:10%;">Loan A/c No</td>
      <td  style="width:10%;">Member No</td>
     <td  style="width:12%;">A/c Name</td>
      <td  style="width:10%;">Repayment Period</td>
      <td  style="width:10%;">Loan Amount</td>
      <td  style="width:8%;">Loan Bal</td>
      <td  style="width:8%;">ID No.</td>
       <td  style="width:8%;">Remaining Period</td>
       <td  style="width:8%;">Phone</td>
      
      
      
    </tr>

<?php


  $a=$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
    $a+=stripslashes($row['loanamount']);
    $b+=stripslashes($row['loanbal']);
     $m1=stripslashes($row['acno']);

    $resulty =mysql_query("select * from mainhouses where houseid='".$m1."' limit 0,1");
    $rowy=mysql_fetch_array($resulty);
    $phone=stripslashes($rowy['mobile']);
    $idno=stripslashes($rowy['idno']);
    
   



if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date_opened']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['loanacno']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $m1 ?></td>
        <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['repayment_period']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanamount']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanbal']) ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $idno ?></td>
     <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rem_months']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $phone ?></td>
    </tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Loans Disbursed:<script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Loan Balances:<script>document.writeln((<?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>



<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;

case 78:



$date=date('Y/m/d');
$stamp=date('Ymd');
$code=0;
$d1=$_GET['d2'];
//$name=$_GET['name'];
$d1=preg_replace('~/~', '', datereverse($d1));
$fname='loans_ageing_list';

?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">LOANS BALANCE AGEING ANALYSIS<br/><strong style="font-size:12px">As at:<?php  echo stamptodate($d1) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">No.</td>
      <td  style="width:10%;">Member No.</td>
      <td  style="width:10%;">Loan Ac No.</td>
      <td  style="width:20%;">Ac Name</td>
       <td  style="width:10%;">Telephone</td>
      <td  style="width:20%;">Balance</td>
      </tr>



<?php
  $aa=0;$cc=$dd=$ee=$ff=0;
  $resultx =mysql_query("select * from loanaccounts order by id");
  $num_resultsx = mysql_num_rows($resultx);
  for ($q=0; $q <$num_resultsx; $q++) {
  $rowx=mysql_fetch_array($resultx);
  $acno=stripslashes($rowx['loanacno']);
  $mainbal=stripslashes($rowx['loanbal']);
  $dr1=$cr1=$bal=0;

  $resulty =mysql_query("select * from mainhouses where houseid='".stripslashes($rowx['acno'])."' limit 0,1");
  $rowy=mysql_fetch_array($resulty);
  if(stripslashes($rowy['status'])!=0){

 
 
    $resulta =mysql_query("select SUM(amount) as dr from loantrack where acno = '".$acno."' and drcr = 'dr' and stamp<='".$d1."'" );
    $rowa=mysql_fetch_array($resulta);
    $dr1=stripslashes($rowa['dr']);
   
    $resulta =mysql_query("select SUM(amount) as cr from loantrack where acno = '".$acno."' and drcr = 'cr' and stamp<='".$d1."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    

  $bal=$dr1-$cr1;

 
 

  if($bal!=0&&$mainbal>1){
//end ageing
   $aa+=1;

   $cc+=$bal;

    if($aa%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;" >';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;">';}
?>    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['acno']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['loanacno']) ?></td>
       <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowy['housename']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowy['mobile']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
     </tr>


<?php 


}

}

}
?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;"></td>
      <td  style="width:10%;"></td>
      <td  style="width:20%;"></td>
      <td  style="width:10%;"></td>
      <td  style="width:10%;">Totals</td>
      <td  style="width:10%;"><script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></td>
        </tr>
</tbody>
</table>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;


case 79:



$date=date('Y/m/d');
$stamp=date('Ymd');
$code=0;
$d1=$_GET['d2'];
$d1=preg_replace('~/~', '', datereverse($d1));
$fname='shares_ageing_list';
if($code==1){$accode=102;}
else if($code==2){$accode=101;}
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">ACCOUNTS BALANCE AGEING ANALYSIS<br/><strong style="font-size:12px">As at:<?php  echo stamptodate($d1) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">No.</td>
      <td  style="width:10%;">Ac No.</td>
      <td  style="width:40%;">Ac Name</td>
       <td  style="width:10%;">Telephone</td>
      <td  style="width:20%;">Balance</td>
      </tr>



<?php
  $aa=0;$cc=$dd=$ee=$ff=0;
  $resultx =mysql_query("select * from mainhouses where status=1 order by housename");
  $num_resultsx = mysql_num_rows($resultx);
  for ($q=0; $q <$num_resultsx; $q++) {
  $rowy=$rowx=mysql_fetch_array($resultx);
  $acno=stripslashes($rowx['houseid']);
  $mainbal=stripslashes($rowx['bal']);


   // if(stripslashes($rowy['status'])!=0){
 
    $resulta =mysql_query("select SUM(amount) as dr from acctrack where acno = '".$acno."' and drcr = 'dr' and stamp<='".$d1."'" );
    $rowa=mysql_fetch_array($resulta);
    $dr1=stripslashes($rowa['dr']);
   
    $resulta =mysql_query("select SUM(amount) as cr from acctrack where acno = '".$acno."' and drcr = 'cr' and stamp<='".$d1."'" );
    $rowa=mysql_fetch_array($resulta);
    $cr1=stripslashes($rowa['cr']);
    

    $bal=$dr1-$cr1;

 
    if($bal!=0){

    $cc+=$bal;


//end ageing
   $aa+=1;

    if($aa%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal;" >';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal;">';}
?>  <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['houseid']) ?></td>
       <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['housename']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowy['mobile']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script></td>
     </tr>


<?php 

//}

}

}
?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;"></td>
      <td  style="width:10%;"></td>
      <td  style="width:30%;"></td>
       <td  style="width:10%;"></td>
        <td  style="width:10%;"><script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></td>
        </tr>
</tbody>
</table>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;



case 80:

function runheader($acs,$titlewidth){
?>


<table id=""  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%">Date</td>
        <td  style="width:20%">Reference</td>
         <?php
        foreach ($acs as $key => $val) {

           if($val=='LOAN'){
            $result =mysql_query("select * from loanaccounts where loanacno='".$key."' limit 0,1");
             $row=mysql_fetch_array($result);
               $period='('.stripslashes($row['repayment_period']).'m)';
            }
            else {  $period='';}


        echo ' <td  style="width:'.$titlewidth.'">'.strtoupper($val.': '.$key).$period.'</td>';
        }
        ?>
        </tr>

        <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%"></td>
        <td  style="width:20%"></td>
         <?php
        foreach ($acs as $key => $val) {
        if($val=='LOAN'){
            $result =mysql_query("select * from loanaccounts where loanacno='".$key."' limit 0,1");
             $row=mysql_fetch_array($result);
               echo ' <td  style="width:'.$titlewidth.'">';?>Amount:<script>document.writeln((<?php  echo stripslashes($row['loanamount'])?>).formatMoney(2, '.', ','));</script> <?php echo'</td>';
            
            }
            else {  echo ' <td  style="width:'.$titlewidth.'"></td>';}
        }
        ?>
        </tr>

         <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%"></td>
        <td  style="width:20%"></td>
         <?php
        foreach ($acs as $key => $val) {
        if($val=='LOAN'){
            $result =mysql_query("select * from loanaccounts where loanacno='".$key."' limit 0,1");
             $row=mysql_fetch_array($result);
               echo ' <td  style="width:'.$titlewidth.'">';?>Total Int:<script>document.writeln((<?php  echo stripslashes($row['total_interest'])?>).formatMoney(2, '.', ','));</script> <?php echo'</td>';
            }
            else {  echo ' <td  style="width:'.$titlewidth.'"></td>';}
        }
        ?>
        </tr>

</tbody>
</table>

<?php
}

$date=date('Y/m/d');
$tstamp=$stamp=date('Ymd');
$code=$_GET['code'];
$active=$_GET['active'];
$cusno=$name=$_GET['name'];

if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
$d1=preg_replace('~/~', '', datereverse($d1));$d2=preg_replace('~/~', '', datereverse($d2)); 
$fname='member_ledger_card_'.$name;





$GLOBALS['arrdata']=array(array());



$acs=array();
$totshares=0;$totarrears=0;
$result =mysql_query("select * from mainhouses where houseid='".$cusno."'");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
  $acs[stripslashes($row['houseid'])]='SHARES';
  $names=stripslashes($row['housename']);
  $totshares+=stripslashes($row['bal']);
  $totarrears+=stripslashes($row['bal']);

}


$totloan=0;
if($active==0){
$result =mysql_query("select * from loanaccounts where acno='".$cusno."' and (status=2 or status=3) order by acno");
}else{
  $result =mysql_query("select * from loanaccounts where acno='".$cusno."' and status=2 order by acno");
}

$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$acs[stripslashes($row['loanacno'])]='LOAN';
  $totloan+=stripslashes($row['loanbal']);
}


$laststamp=0;
foreach ($acs as $key => $val) {

            $acno=$key;

              if($d1==0){
              $resultb =mysql_query("select * from maintrack where acno='".$acno."' and type='".$val."' order by id asc");
              }else{
                $resultb =mysql_query("select * from maintrack  where stamp>='".$d1."' and stamp<='".$d2."' and acno='".$acno."' and type='".$val."'  order by id asc");
              }
              $num_resultsb = mysql_num_rows($resultb); 
              for ($b=0; $b <$num_resultsb; $b++) {
                $rowb=mysql_fetch_array($resultb);
                $max=count($GLOBALS['arrdata']);
                if(stripslashes($rowb['stamp'])>$laststamp){$laststamp=stripslashes($rowb['stamp']);}
                if(empty($GLOBALS['arrdata'][0])){
                  $GLOBALS['arrdata'][0]=array('cat' =>stripslashes($rowb['type']),'number' =>'0','acno' =>$acno,'stamp' =>stripslashes($rowb['stamp']),'description' =>stripslashes($rowb['description']),'amount' =>stripslashes($rowb['amount']),'crbal' =>stripslashes($rowb['bal']));
              
                }else{
                  $GLOBALS['arrdata'][$max]=array('cat' =>stripslashes($rowb['type']),'number' =>$max,'acno' =>$acno,'stamp' =>stripslashes($rowb['stamp']),'description' =>stripslashes($rowb['description']),'amount' =>stripslashes($rowb['amount']),'crbal' =>stripslashes($rowb['bal']));
              }
             }//end for loop
       

}



$count=count($acs);
$titlewidth=(70/$count).'%';
$width=(35/$count).'%';

$mainacs=$acs;
$mainwidth=$titlewidth;


?>
<style>
@media print {
    footer {page-break-after: always;}
  }
</style>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">MEMBER LEDGER STATEMENT
</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px;border-top:1px dashed #333;border-bottom:1px dashed #333">MEMBER:<strong style="font-size:12px"><?php  echo $names ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;MEMBER NO:<strong style="font-size:12px"><?php  echo $cusno ?></strong></p>
<div style="clear:both"></div>


<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Statement as At <?php  echo stamptodate($laststamp) ?></p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<p><img src="img/print.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onClick="window.print() " title="Print"/></p>

<div style="clear:both; margin-bottom:10px"></div>

<?php runheader($mainacs,$mainwidth); ?>
<!--footer class="footer"></footer-->

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<?php
$acs2=$acs;
$sort = array();
foreach($GLOBALS['arrdata'] as $k=>$v) {
    $sort['stamp'][$k] = $v['stamp'];
    $sort['number'][$k] = $v['number'];
}
array_multisort($sort['stamp'], SORT_ASC, $sort['number'], SORT_ASC,$GLOBALS['arrdata']);


//usort($GLOBALS['arrdata'], "cmp");
$i=0;
foreach ($GLOBALS['arrdata'] as $key => $val) {

if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

         <td style="border-width:0px;border-right:1px;border-color:#666; border-style:solid;width:10%"><?php  echo stamptodate($GLOBALS['arrdata'][$key]['stamp']) ?></td>
         <td style="border-width:0px; border-color:#666;border-right:1px; border-style:solid;width:20%"><?php  echo $GLOBALS['arrdata'][$key]['description'] ?></td>
        <?php
        foreach ($acs2 as $key2 => $val2) {
          echo '<td style="width:'.$width.';border-width:0px; border-color:#666; border-style:solid;">';
            if($GLOBALS['arrdata'][$key]['acno']==$key2&&$GLOBALS['arrdata'][$key]['cat']==$val2){
             ?> <script>document.writeln((<?php  echo $GLOBALS['arrdata'][$key]['amount'] ?>).formatMoney(2, '.', ','));</script><?php
            }
          echo '</td>';

           echo '<td style="width:'.$width.';border-width:0px;border-right:1px; border-color:#666; border-style:solid;">';
            if($GLOBALS['arrdata'][$key]['acno']==$key2&&$GLOBALS['arrdata'][$key]['cat']==$val2){
              $acs[$key2]=$GLOBALS['arrdata'][$key]['crbal'];
              ?> <script>document.writeln((<?php  echo $GLOBALS['arrdata'][$key]['crbal'] ?>).formatMoney(2, '.', ','));</script><?php
            }
          echo '</td>';
        }
        ?>
        </tr>

<?php 



$i++;

if($i<21){$mod=20;}else{$mod=25;}

if($i%$mod==0&&$i!=25){ ?> </tbody></table><footer class="footer"></footer><?php runheader($mainacs,$mainwidth);  ?><table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody><?php }

 }

 ?>


<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
<td  style="width:10%"></td>
<td  style="width:20%">Balance</td>
<?php
foreach ($acs as $key => $val) { ?>
<td  style="width:<?php echo $width ?>"></td>
<td  style="width:<?php echo $width ?>"><script>document.writeln((<?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>
<?php } ?>
</tr>

</tbody>
</table>
<div style="clear:both; margin-bottom:10px"></div>


 <div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Shares : <script>document.writeln(( <?php  echo $totshares ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Loan : <script>document.writeln(( <?php  echo $totloan ?>).formatMoney(2, '.', ','));</script></p>



</div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;

case 81:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
$fname='in_arrears_loans';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">IN ARREARS LOANS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<?php $d1=preg_replace('~/~', '', $d1); ?>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;">No.</td>
        <td  style="width:25%;">Account Name</td>
        <td  style="width:10%;">Loan A/c No</td>
        <td  style="width:10%;">Normal A/c No</td>
        <td  style="width:10%;">Loan Amount</td>
        <td  style="width:10%;">Loan Balance</td>
        <td  style="width:10%;">Remaining Months</td>
        <td  style="width:10%;">Arrears</td>
        <td  style="width:10%;">Opened By</td>
    </tr>

<?php
  $mon=substr($d1,0,6);
   if($name=='All'){
    $result =mysql_query("select * from loanaccounts  where  status=2 and arrears_status=1");
    }else{
       $result =mysql_query("select * from loanaccounts  where status=2 and arrears_status=1  and branchcode='".$unibcode."'");
    }
  $a=0;$aa=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $a+=stripslashes($row['arrears']);
  $aa+=1;


if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

       <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $aa ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
     <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['loanacno']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acno']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanamount']) ?>).formatMoney(2, '.', ','));</script></td>
         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanbal']) ?>).formatMoney(2, '.', ','));</script></td>
         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rem_months']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['arrears']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['opened_by']) ?></td>
       
       </tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Arrears: <script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;

case 82:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;

$d1=datereverse($d1);
$fname='almost_due_loans';
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">ALMOST DUE LOANS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">DUE DATE:&nbsp;&nbsp;<?php  echo dateprint($d1)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<?php $d1=preg_replace('~/~', '', $d1); ?>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">Date Due</td>
        <td  style="width:25%;">Account Name</td>
        <td  style="width:15%;">Loan Account No</td>
       <td  style="width:15%;">Loan Amount</td>
       <td  style="width:10%;">Monthly Payment</td>
        <td  style="width:14%;">Loan Balance</td>
        <td  style="width:10%;">Remaining Months</td>
        
    </tr>

<?php
  $mon=substr($d1,0,6);
   if($name=='All'){
    $result =mysql_query("select * from loanaccounts  where '".$d1."'>=stamp_expiry and status=2 and expiry_status!='".$mon."'");
    }else{
       $result =mysql_query("select * from loanaccounts  where '".$d1."'>=stamp_expiry and status=2 and expiry_status!='".$mon."'  and branchcode='".$unibcode."'");
    }
  $a=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $a+=stripslashes($row['month_pay']);
  


if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp_expiry'])) ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
     <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['loanacno']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanamount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['month_pay']) ?>).formatMoney(2, '.', ','));</script></td>
         <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanbal']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rem_months']) ?></td>
       
       </tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Amount Payable: <script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;


case 83:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=2;
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;


$d1=preg_replace('~/~', '', datereverse($d1));$d2=preg_replace('~/~', '', datereverse($d2)); 


  
       $yy='ALL BRANCHES TRANSACTIONS';
      if($d1==0){
      $result =mysql_query("select * from  transactions where status=1");
      }
      else{
      $result =mysql_query("select * from transactions  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
      }
      
$fname=strtolower(preg_replace('~ ~', '_', $yy));



?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">TRANSACTIONS REPORTS
<br/><strong style="font-size:12px">Category:<?php  echo $yy ?></strong><br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<div style="clear:both; margin-bottom:20px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">Date</td>
      <td  style="width:6%;">Time</td>
      <td  style="width:6%;">Rcptno</td>
      <td  style="width:10%;">Category</td>
      <td  style="width:8%;">Type</td>
      <td  style="width:8%;">A/c No</td>
      <td  style="width:10%;">A/c Name</td>
      <td  style="width:8%;">Amount</td>
      <td  style="width:8%;">Details</td>
      <td  style="width:8%;">Cashier Bal</td>
       <td  style="width:6%;">Posted</td>
      
      
    </tr>

<?php


  $a=$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  if(stripslashes($row['type'])=='dr'){
    $a+=stripslashes($row['amount']);
  }
  else{
    $b+=stripslashes($row['amount']);
  }

    
  

if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date']) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['time']) ?></td>
        <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
         <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo strtoupper(stripslashes($row['type'])) ?></td>
       <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acno']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;">Ref No: <?php  echo stripslashes($row['refno']) ?> [<?php  echo stripslashes($row['odetail']) ?>]</td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['cashbal']) ?>).formatMoney(2, '.', ','));</script></td>
      <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['username']) ?></td>
      </tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Debits:<script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Credits:<script>document.writeln((<?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;

case 84:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=2;
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
$fname='loans_deduction_report';
$d1=preg_replace('~/~', '', datereverse($d1));$d2=preg_replace('~/~', '', datereverse($d2)); 
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">LOANS DEDUCTION REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:15%;">Date</td>
        <td  style="width:40%;">Account Name</td>
        <td  style="width:15%;">Loan Account No</td>
        <td  style="width:15%;">Deduction Amount</td>
        <td  style="width:15%;">Loan Balance</td>
        
    </tr>

<?php
  $mon=substr($d1,0,6);
    if($d1==0){
    $result =mysql_query("select * from loantrack  where  description like '%MONTHLY LOAN REPAYMENT%'");
    }else{
    $result =mysql_query("select * from loantrack  where  description like '%MONTHLY LOAN REPAYMENT%' and stamp>='".$d1."' and stamp<='".$d2."'");
    }
  $a=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $a+=stripslashes($row['amount']);
  


if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp'])) ?></td>
       <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
     <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acno']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['crbal']) ?>).formatMoney(2, '.', ','));</script></td>

       </tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Amount Deducted: <script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;


case 85:


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


$fname='landlord_payments_report';

?>
<div class="panel-body maindiv" style="width:99%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:85px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">SUMMARIZED LANDLORD MONTHLY PAYMENTS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p>
<?php } else if($code==0){?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else {?>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>


<?php $d1=substr($d1,3,4).substr($d1,0,2).'01'; $d2=substr($d2,3,4).substr($d2,0,2).'31';?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a id="toexcel" download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="img/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-weight:bold; padding:0;font-size:11px " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;">No.</td>
        <td  style="width:5%;">Date.</td>
        <td  style="width:5%;">Month</td>
        <td  style="width:15%;">Property/Landlord</td>
        <td  style="width:10%;">Phone No</td>
         <td  style="width:10%;">Invoiced</td>
        <td  style="width:10%;">Total Gross Payable</td>
        <td  style="width:10%;">Amount Paid to Owner</td>
        <td  style="width:10%;">MemberPayments</td>
        <td  style="width:10%;">Variance</td>
       </tr>


<?php


//considerations-escalations,contract expiries,quartely payments
  $aa=$bb=$cc=$dd=0;$ee=0;$ff=$gg=0;$hh=0;
  $resultq =mysql_query("select * from landstate where stamp>='".$d1."' and stamp<='".$d2."'");
  $num_resultsq = mysql_num_rows($resultq);
  for ($q=0; $q <$num_resultsq; $q++) {
  $rowq=mysql_fetch_array($resultq);
  $hid=stripslashes($rowq['hid']);
  $housename=stripslashes($rowq['hname']);
  $total=stripslashes($rowq['gross']);
  $paid=stripslashes($rowq['net']);
  $tax=stripslashes($rowq['vat']);
  $comm=stripslashes($rowq['agency']);
  $mon=stripslashes($rowq['mon']);


  $resulta =mysql_query("select * from mainhouses where houseid='".$hid."'");
  $rowa=mysql_fetch_array($resulta); 
  $commision=stripslashes($rowa['commision']);
  $mobile=stripslashes($rowa['mobile']);
  $fid=stripslashes($rowa['fid']);

  $resulta =mysql_query("select * from fieldperson where id='".$fid."'");
  $rowa=mysql_fetch_array($resulta); 
  $groupid=stripslashes($rowa['groupid']);

  $show=0;
  if($name=='All'){$show=1;}
  if($name==$groupid){$show=1;}


            if($show==1){


                $total=0;
                $result =mysql_query("select * from landstateunits where hid='".$hid."'  and  mon='".$mon."'");
                $num_results = mysql_num_rows($result);
                for ($i=0; $i <$num_results; $i++) {
                  $row=mysql_fetch_array($result);
                  $total+=stripslashes($row['amount']);

                }




                $resulta =mysql_query("select SUM(amount) as dr from receipt where actid=1 and hid = '".$hid."' and mon = '".$mon."'" );
                $rowa=mysql_fetch_array($resulta);
                $receipts=floatval($rowa['dr']);


                $resulta =mysql_query("select SUM(invamount) as dr from invoices where actid=1 and hid = '".$hid."' and mon = '".$mon."'" );
                $rowa=mysql_fetch_array($resulta);
                $invoiced=floatval($rowa['dr']);

                $balances=$total-$receipts;

                 $aa+=$total;
                 $bb+=$comm;
                 $cc+=$paid;
                 $ee+=$tax;
                 $ff+=$receipts;
                 $gg+=$balances;
                $hh+=$invoiced;




                if($q%2==0){$col='#f0f0f0';}else{$col='#fff';}
                echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';?>
                <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $q+1 ?></td>
                <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo dateprint($date) ?></td>
                <td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $mon ?></td>
                <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $housename ?></td>
                <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $mobile ?></td>
                  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $invoiced ?>).formatMoney(2, '.', ','));</script></td>
                <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
                <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $paid ?>).formatMoney(2, '.', ','));</script></td>

                 <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $receipts ?>).formatMoney(2, '.', ','));</script></td>

                  <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $balances ?>).formatMoney(2, '.', ','));</script></td>

                </tr>

                <?php
                 } 


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


case 86:


$type=$_GET['type'];
$name=$_GET['name'];


?>
<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">OFFICIAL PAYMENTS SCHEDULE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<a id="toexcel" download="payments_schedule.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center; font-size:11px;font-weight:bold; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:25%">Landlord No</td>
      <td  style="width:50%">Names</td>
      <td  style="width:25%">Amount</td>
     
     </tr> 


<?php
  $a=1;$aa=0;
  $result =mysql_query("select * from landtx  where  mon='".$name."' and itcode='".$type."' and status=2");
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $aa+=preg_replace('~,~', '', stripslashes($row['amount']));

  if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['hid']) ?></td>
      <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['hname']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['amount']) ?></td>
    </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Amount Deducted: <script>document.writeln((<?php  echo $aa ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 87:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=2;
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
$fname='employee_advances_report';
$d1=preg_replace('~/~', '', datereverse($d1));$d2=preg_replace('~/~', '', datereverse($d2)); 
?>

<div class="panel-body maindiv" style="width:98%;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">EMPLOYEE LOANS/ADVANCES REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1)  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2)  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Full Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="img/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">Date</td>
      <td  style="width:5%;">Loan  No</td>
      <td  style="width:8%;">Loan Type.</td>
      <td  style="width:10%;">Employee No</td>
      <td  style="width:12%;">A/c Name</td>
      <td  style="width:10%;">Repayment Period</td>
      <td  style="width:10%;">Loan Amount</td>
      <td  style="width:8%;">Deduction Amount</td>
      <td  style="width:8%;">Loan Bal</td>
      <td  style="width:8%;">Paid Through</td>
      <td  style="width:8%;">Username</td>
      
      
      
    </tr>

<?php

 if($d1==0){
  $result =mysql_query("select * from  emploans");
  }
  else{
  $result =mysql_query("select * from emploans  where stamp_opened>='".$d1."' and stamp_opened<='".$d2."'");
  }
  $a=$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
    $a+=stripslashes($row['loanamount']);
    $b+=stripslashes($row['loanbal']);
    $m1=stripslashes($row['acno']);


    
   



if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date_opened']) ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['loanacno']) ?></td>
<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['loantype']) ?></td>
<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $m1 ?></td>
<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['acname']) ?></td>
<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['repayment_period']) ?></td>

<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanamount']) ?>).formatMoney(2, '.', ','));</script></td>
<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['month_pay']) ?>).formatMoney(2, '.', ','));</script></td>
<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln((<?php  echo stripslashes($row['loanbal']) ?>).formatMoney(2, '.', ','));</script></td>
<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pname']) ?></td>
<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo getuser($row['opened_by']) ?></td>
</tr>


<?php } ?>

</tbody>
</table>
  
 
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Total Amount Deducted: <script>document.writeln((<?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 

break;


case 88:
$tid=$rcptno;
$resulty =mysql_query("select * from tenants where tid='".$rcptno."' limit 0,1");
$rowq=$rowy=mysql_fetch_array($resulty);
$bname=stripslashes($rowy['bname']);
$roomno=stripslashes($rowy['roomno']);
$hname=stripslashes($rowy['hname']);

?>
<div class="panel-body maindiv" style="width:800px;min-height:260px; border:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;width:18%; position:absolute;"/>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">INSPECTION CHECKLIST<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<table   style="width:100%;text-align:left;font-size:12px;margin-left:0px; font-weight:bold; padding:0;color:#333; " >
<tbody>
    <tr style="width:100%; color:#fff; background:#333; padding:0">
      <td  style="width:50%;"><strong>Property Name: </strong><?php  echo $hname ?></td>
        <td  style="width:50%;"><strong>Room No: </strong><?php  echo $roomno ?></td>
        </tr>
        <tr style="width:100%; color:#fff; background:#333; padding:0">
      <td  style="width:50%;"><strong>MemberName: </strong><?php  echo $bname ?></td>
      <td  style="width:50%;"><strong>MemberNo: </strong><?php  echo $tid ?></td>
        </tr>
      
        
    </tbody>
    </table>

<div style="clear:both; margin-bottom:10px"></div>
<p>This form is designed to assist in recording the consition of a renatl unit upon moving in and moving out. To be most useful, it should be filled out in the presence of the property owner and the member, and each should retain a signed and dated copy.</p>
<div style="clear:both; margin-bottom:10px"></div>
<table id="datatable"  style="width:100%;text-align:center; font-size:11px;font-weight:bold; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
      
      <td  style="width:10%">No.</td>
      <td  style="width:40%">Description</td>
      <td  style="width:25%">Check In Condition</td>
      <td  style="width:25%">Check Out Condition</td>
     
    </tr> 


<?php
$a=1;
$result =mysql_query("select * from inspection where tid='".$tid."'");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);


if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;font-weight:bold"><?php  echo $a ?>.</td>
      <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;font-weight:bold"><?php  echo stripslashes($row['description']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['checkin']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['checkout']) ?></td>
      </tr>


<?php 
$a++;
} ?>

</tbody>

</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center; font-weight:bold;margin:0 0 0 0px">Report pulled By <?php  echo getuser($username) ?>.</p>
</div>
<?php 
break;

case 89:

$resulty =mysql_query("select * from tenants where tid='".$rcptno."' limit 0,1");
$rowq=$rowy=mysql_fetch_array($resulty);
$bname=stripslashes($rowy['bname']);
$phone=stripslashes($rowy['phone']);


?>
<style type="text/css">
<!--
span.cls_002{font-size:24.0px;color:rgb(222,0,33);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_002{font-size:24.0px;color:rgb(222,0,33);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_003{font-size:18.1px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-size:18.1px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_004{font-size:46.0px;color:#000;font-weight:normal;font-style:normal;text-decoration: none}
div.cls_004{font-size:46.0px;color:#000;font-weight:normal;font-style:normal;text-decoration: none}
span.cls_005{font-size:15.8px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_005{font-size:15.8px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-size:16.0px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-size:16.0px;color:rgb(64,64,64);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_007{font-size:13.5px;color:#000;font-weight:bold;font-style:normal;text-decoration: none}
div.cls_007{font-size:13.5px;color:#000;font-weight:bold;font-style:normal;text-decoration: none}
span.cls_008{font-size:12.0px;color:rgb(64,64,64);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_008{font-size:12.0px;color:rgb(64,64,64);font-weight:bold;font-style:normal;text-decoration: none}
-->
</style>
<script type="text/javascript" src="04d3133e-3088-11ea-a5fd-0cc47a792c0a_id_04d3133e-3088-11ea-a5fd-0cc47a792c0a_files/wz_jsgraphics.js"></script>
</head>
<body>
<div style="position:absolute;left:50%;margin-left:-396px;top:0px;width:792px;height:611px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="img/background1.jpeg" width=792 height=611></div>
<div style="width:100%">

<div style="position:relative;margin-top: 200px;margin-left: 300px" class="cls_003"><span class="cls_003">This is to certify that</span></div>
<div style="position:relative;margin-top: 30px;text-align: center" class="cls_004"><span class="cls_004"><?php echo $bname?></span></div>
<div style="position:absolute;left:119.47px;top:314.40px" class="cls_005"><span class="cls_005">has completed the organisation's mission and is now a certified member</span></div>
<div style="position:absolute;left:119.47px;top:334.40px" class="cls_005"><span class="cls_005"> of the Kenya Pharmaceuticals Asscoiation-Central Branch, and as such,</span></div>
<div style="position:absolute;left:119.47px;top:358.40px" class="cls_005"><span class="cls_005">enjoys the benefits and privileges thereof.</span></div>

<div style="position:absolute;left:142.28px;top:482.92px" class="cls_007"><span class="cls_007">JOEL CHEGE</span></div>
<div style="position:absolute;left:532.80px;top:482.92px" class="cls_007"><span class="cls_007">ERISIANA MSINGA</span></div>
<div style="position:absolute;left:139.99px;top:506.93px" class="cls_008"><span class="cls_008">Branch Chairman</span></div>
<div style="position:absolute;left:534.93px;top:506.93px" class="cls_008"><span class="cls_008">Branch Secretary</span></div>

</div>
</div>

<?php
break;


}