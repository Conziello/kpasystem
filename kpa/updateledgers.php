<?php 
			include('db_fns.php');
			error_reporting(1);

				$resultc = mysql_query("select * from ledgers");
				$num_resultsc = mysql_num_rows($resultc);
				$tr=0;

				for ($c=0; $c <$num_resultsc; $c++) {
					$rowc=mysql_fetch_array($resultc);
					$type=stripslashes($rowc['type']);
					$lid=stripslashes($rowc['ledgerid']);
					$bal=0;
					

					$result = mysql_query("SELECT * FROM  ledgerentries where lid='".$lid."' order by stamp asc,transid asc");
					$num_results = mysql_num_rows($result);
					//echo '<br> '.$num_results;
					$tr += $num_results;
					
					
					$dstamp=0;$ddate=0;$dcr=0;$ddr=0;$dbal=0;
					for ($i=0; $i <$num_results; $i++) {
						$row=mysql_fetch_array($result);
						$trans=stripslashes($row['type']);
						$amount=stripslashes($row['amount']);
						$transid=stripslashes($row['transid']);
						$stamp = stripslashes($row['stamp']);
						$date = stripslashes($row['date']);

						if ($dstamp != $stamp) {
							if ($dstamp == 0) {
								//Do nothing
							}else{
								if($type=='Expense'||$type=='Asset'){
									$dbal=$ddr - $dcr;
								}else{
									$dbal=$dcr - $ddr;
								}
								
								$res = mysql_query("INSERT INTO ledgerbalances VALUES ('0', '".$ddate."', '".$dstamp."', '".$lid."', '".$ddr."', '".$dcr."', '".$dbal."', 0.00)");//".floatval($bal)."
								//echo $date.'  - ['.$lid.'] -> '.$dbal.'<br>';
							}

							$dstamp = $stamp;
							$ddate = $date;
							$dcr=0;
							$ddr=0;
						}
						
						if(($type=='Expense'||$type=='Asset')&&$trans=='Debit'){
							//$bal+=$amount;
							$ddr+=$amount;
						}else if(($type=='Expense'||$type=='Asset')&&$trans=='Credit'){
							//$bal-=$amount;
							$dcr+=$amount;
						}else if(($type=='Liability'||$type=='Revenue'||$type=='Equity')&&$trans=='Credit'){
							//$bal+=$amount;
							$dcr+=$amount;
						}else if(($type=='Liability'||$type=='Revenue'||$type=='Equity')&&$trans=='Debit'){
							//$bal-=$amount;
							$ddr+=$amount;
						}else{

						}

						$re = $i + 1;

						if ($re == $num_results) {
							$res = mysql_query("INSERT INTO ledgerbalances VALUES ('0', '".$ddate."', '".$dstamp."', '".$lid."', '".$ddr."', '".$dcr."', '".$dbal."', 0.00)");//, ".floatval($bal)."
						}
						


						//$resultw = mysql_query("update ledgerentries set bal='".$bal."' where  transid='".$transid."'");

					}


					//$resultn = mysql_query("update ledgers set bal='".$bal."' where  ledgerid='".$lid."'");

					
				}//end ledger entries for loop
				echo "Tot: "+$tr;

				function updateledgerbalance($lid, $date, $stamp, $txtype, $txamount)
				{
					$resultcx =mysql_query("select * from ledgerbalances where ledgerid='".$lid."' and stamp = '".$stamp."' limit 0,1");
					
					if(mysql_num_rows($resultcx)==0){
						$res = mysql_query("INSERT INTO ledgerbalances VALUES ('0', '".$date."', '".$stamp."', '".$lid."', '0', '0', '0', 0.00)");
						$resultcx =mysql_query("select * from ledgerbalances where ledgerid='".$lid."' and stamp = '".$stamp."' limit 0,1");
					}

					$rowcx=mysql_fetch_array($resultcx);
					$bal=stripslashes($rowcx['balance']);

					$resultc =mysql_query("select * from ledgers where ledgerid='".$lid."' limit 0,1");
					$rowc=mysql_fetch_array($resultc);
					$ledgerType = stripslashes($rowcx['type']);

					if ($txtype == 'Credit') {
						switch ($ledgerType) {
							case 'Asset':
								$bal -= $txamount;
								break;
							case 'Expense':
								$bal -= $txamount;
								break;
							case 'Revenue':
								$bal += $txamount;
								break;
							case 'Liability':
								$bal += $txamount;
								break;
							case 'Equity':
								$bal += $txamount;
								break;
							default:
								# code...
								break;
						}
					} else { //Debit
						switch ($ledgerType) {
							case 'Asset':
								$bal += $txamount;
								break;
							case 'Expense':
								$bal += $txamount;
								break;
							case 'Revenue':
								$bal -= $txamount;
								break;
							case 'Liability':
								$bal -= $txamount;
								break;
							case 'Equity':
								$bal -= $txamount;
								break;
							default:
								# code...
								break;
						}
					}

					$resultn = mysql_query("update ledgerbalances set bal='".$bal."' where ledgerid='".$lid."' and stamp = '".$stamp."'");
				}
				


				


?>
