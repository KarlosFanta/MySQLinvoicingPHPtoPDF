<?php


	if(isset($_GET["CustNo"]))
{
	//echo "GET name: ".$_GET["name"]."<br>";
	$CustInt = $_GET["CustNo"];
	//force session:
//	$_SESSION['name'] = $_GET["name"];
	
}
		





$chkbx = "0";
$indesc = "9";
//$ShowDraft
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];


$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];

$TBLrow = @$_POST['mydropdownEC'];

	//$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");
?>
<form  name="AddTrans2"  method='post' action = "addTransMultibSEP.php">
<input type='hidden' name='mydropdownEC' value='<?php echo $TBLrow; ?>'>
<?php 		//echo "indesc: ".$indesc."</font>";	echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			//echo @$row['CustLN'];
?>
			</b></font>
<br>OVERpaid invoices: &nbsp;&nbsp;&nbsp;<font color='green'>view_Overpaid_inv_by_cust2b.php &nbsp;&nbsp;&nbsp;</font>

<?php
//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";

//$SQLstring = "SELECT * FROM invoice wHERE invoice.InvNo NOT IN ( SELECT InvNoA  FROM transaction ) AND invoice.InvNo NOT IN  ( SELECT InvNoB  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoC  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoD  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoE  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoF  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoG  FROM transaction ) AND  invoice.InvNo NOT IN  ( SELECT InvNoH  FROM transaction ) AND invoice.CustNo = '$CustInt'";

//$SQLstring = "SELECT * FROM invoice wHERE (SELECT AmtPaid FROM TRANSACTION ) < (SELECT TotAmt FROM invoice) AND invoice.CustNo = '$CustInt'";
//$SQLstring = "SELECT i.InvNo as InvNo FROM invoice i wHERE (SELECT t.AmtPaid FROM TRANSACTION t) < (SELECT i.TotAmt FROM invoice i) AND i.CustNo = '151' and t.CustNo = '151'";
$SQLstring = "SELECT * FROM transaction WHERE
 (AmtPaid) > (InvNoAincl+InvNoBincl+InvNoCincl+InvNoDincl+InvNoEincl+InvNoFincl+InvNoGincl)
AND CustNo = '$CustInt'  ";

// hey we are suppoed to show invoices not transactions//this is a stuff up




//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$QueryResult = @mysql_query($SQLstring, $DBConnect);
//$ShowDraft = 'Y';
//if ($resultINV = $DBConnect->query($SQLstring)) {
if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$OverpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>CustNo</th>";
//if ($ShowDraft == "Y")  transactions don;t have draft
echo "<th>P</th>";//priority
echo "<th>Invoice Date</th>";
echo "<th>AmtPaid</th>";
echo "<th>TotalReq</th>";
echo "<th>TransNo</th>";
echo "<th>Diff</th>";
echo "<th>InvNoA</th>";
echo "<th>InvNoAincl</th>";
echo "<th>InvNoB</th>";
echo "<th>InvNoBincl</th>";
//echo "<th>AmtPaid</th>";
// Notes 	InvNoA 	InvNoAincl 	InvNoB 	InvNoBincl 	InvNoC 	InvNoCincl 	InvNoD 	InvNoDincl 	InvNoE 	InvNoEincl 	InvNoF 	InvNoFincl 	InvNoG 	InvNoGincl 	InvNoH 	InvNoHincl 	Priority 	CustSDR 

//echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Notes

echo "</tr>\n";

    // fetch object array 
//    while ($row = $resultINV->fetch_row()) {
	  while ($row = mysqli_fetch_assoc($resultINV)) {

      //  printf ("%s (%s)\n", $row[0], $row[1]);

	  
	  
	  
	  
	  
//	echo "unnn:".$un;  
	  
	  
	  
//echo "<tr><th>";  deosnt work here when making paid invoices dissappear.

if (@in_array(@$row['InvNo'], @$PaidInvs)) 
{
    if ($un == 'Y')
			{

			}
				else
			{
				//echo "<tr><th>dont dusp".$un."</th></tr>";
							$Invsummm = $Invsummm + $row['TotAmt'];
							$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			}
			
			
		}	
	else
		{
			$InvNor = $row['InvNoA'];
			$InvNor1 = $row['AmtPaid'];
			$InvNor2 = $row['Notes'];
$queryAP = "select * from aproof where InvNoA = $InvNor OR InvNoB = $InvNor OR InvNoC = $InvNor OR InvNoD = $InvNor OR InvNoE = $InvNor OR InvNoF = $InvNor OR InvNoG = $InvNor OR InvNoH = $InvNor";
//echo $queryAP;
$InvNor3 = '';
$InvNor4 = '';
if ($resultAP = mysqli_query($DBConnect, $queryAP)) {
  while ($rowAP = mysqli_fetch_assoc($resultAP)) {
//echo " <th>".$rowAP["ProofNo"];
//echo "</font> ".$rowAP["PMethod"];

//$InvNor3 = $rowAP['PMethod'];
//$InvNor4 = $rowAP['CustSDR'];
//		echo "</th>";

			}
		 mysqli_free_result($resultAP);
		}
			//$InvNor3 = $rowAP['PMethod']; //sorry not in invoice table, but try aproof table.
			echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor, R$InvNor1, $InvNor2, $InvNor3, @$InvNor4'><font color = '#CC350C'>$InvNor"; //0
			
echo "</th>\n"; //0






//if ($ShowDraft == "Y")
//			echo "<th><textarea  style='width:30px; height:30px;' >{$row['Priority']}</textarea></th>"; // this was Draft
echo "<th>{$row['Priority']}</th>"; // transactions dont have Draft

		$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year;

$out = date("Y") - $year;
//echo $out;

if ($out == 1 )
echo "<br>A year ago";
if ($out > 1 )
echo "<br><font color = orange>$out years ago</font>";


echo "</th>";//invDate


			
			
			
			echo "<th>R{$row['AmtPaid']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['InvNoAincl']}</th>"; ///TOTAL AMOUNT TotAmt
						echo "<th>{$row['TransNo']}</th>";

$Diff1 = $row['AmtPaid'] - $row['InvNoAincl'];
$Diff1 = (number_format($Diff1, 2, '.', ''));
			echo "<th>R{$Diff1}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>{$row['Notes']}</th>";
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS
			$Invsummm = $Invsummm + $row['AmtPaid'];
			$OverpaidInvsummm = $OverpaidInvsummm + $row['AmtPaid'];


			echo "<th>R{$row['InvNoA']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['InvNoAincl']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['InvNoB']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['InvNoBincl']}</th>"; ///TOTAL AMOUNT TotAmt

			echo "</tr></font>\n";
		}
	}
	mysqli_free_result($resultINV);
	
}
echo "</table>";
echo "Overpaid Invoices total to: &nbsp;&nbsp; <b>R ".$OverpaidInvsummm;
echo "</b><br>";
$OverpaidInvsummm = 0;
?>
