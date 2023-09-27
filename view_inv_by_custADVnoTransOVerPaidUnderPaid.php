<?php
//require_once("inc_OnlineStoreDB.php");

//@session_start();
//$_SESSION['sel'] = "editCust";
//$CustInt = intval($_SESSION['CustNo'] );
//echo "<br><br><br>";
//echo "<br>Your Invoices History";@session_start();
if (@$CustInt == '')
{
$CustInt = $_GET['CustNo'];
//echo "executed1";
}
require_once "inc_OnlineStoreDB.php";
$indesc = 9;
$ShowDraft = "Y";
$InvPdStatus  = '';
//echo "".@$_GET['CustNo']."&nbsp;&nbsp;&nbsp;&nbsp;";

?>
<br><b>Paid and Unpaid Invoices</b> view_inv_by_custADVnoTransOVerPaidUnderPaid.php
<?php
$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";
//echo $SQLstring;
function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
			

if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Invoice Date</th>";
echo "<th>&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
echo "<th>TotalAmt</th>";
echo "<th>Proof</th>";
echo "<th>Payment&nbsp;Received</th>";
if ($InvPdStatus == "Y")
echo "<th>Inv Paid Status</th>";

if ($indesc == "d1")
{
echo "<th>D1</th>";
echo "<th>D2</th>\n";
echo "<th>D3</th>";
}



if ($indesc > "1")
{echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1</th>";
echo "<th>in1</th>";
}
if ($indesc > "2")
{echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
echo "<th>in2</th>";
}
if ($indesc > "3")
{echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";
}
if ($indesc > "4")
{echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";
}
if ($indesc > "5")
{echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";
}
if ($indesc > "6")
{echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";
}
if ($indesc > "7")
{echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
}
if ($indesc > "8")
{echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";
}

echo "</tr>\n";

 	  while (@$row = mysqli_fetch_assoc($resultINV)) {
			
			$TrR ="";
			echo "<tr><th>";
			$IInv = $row['InvNo'];
			$IIII = $row['InvNo'];
$SS = "select AmtPaid, TransNo,InvNoA, InvNoB from transaction where InvNoA = '$IInv' or  InvNoB = '$IInv'  or  InvNoC = '$IInv'  or  InvNoD = '$IInv'  or  InvNoE = '$IInv'  or  InvNoF = '$IInv'  or  InvNoG = '$IInv'  or  InvNoH = '$IInv'  ";
//echo $SS;
	if ($resultSS = mysqli_query($DBConnect, $SS)) {
	  while (@$rowPrf = mysqli_fetch_assoc($resultSS)) {
			//echo "TransNo: {$rowPrf['TransNo']}";  //TransNo
			$TrR = $rowPrf['TransNo'];
			//echo "rowPrfInvNoB".$rowPrf['InvNoB'];
			//echo "#".$TrR."#";
			
			
			
			
				$diff = floatval($row['TotAmt']) - floatval($rowPrf['AmtPaid']);
			
			
			
			if ($rowPrf['InvNoB'] != "" AND $rowPrf['InvNoB'] != "0")
				echo "{$row['InvNo']}<br><font size= '1'>multiple invoices<br>in 1 transaction<br></font>";
			else
			{
				//echo "overpaid underpaid";
			
			if ($rowPrf['AmtPaid'] == $row['TotAmt'])
			echo "<font color = green>{$row['InvNo']}";
			else
			if ($rowPrf['AmtPaid'] > $row['TotAmt'])
			{
			echo " <font color = 'olive'> {$row['InvNo']}<br>overpaid by R".number_format((float)-$diff, 2, '.', '');
			}
			else
			echo " <font color = 'orange'>{$row['InvNo']}<br>underpaid by R".number_format((float)$diff, 2, '.', '');;
			
			//number_format((float)$number, 2, '.', '');
			
			}
			
						}
    $resultSS->close();
				}	
			
		if ( $TrR == '')
			echo "<font color = red>{$row['InvNo']}<br>not paid";
		//	else
			//echo "<font color = green>{$row['InvNo']}";
			

				
			$TrR ="";//reset
			$rowPrf['TransNo'] ="";//reset
echo "</font></th>\n";
			
			
			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate
			echo "<th>{$row['Summary']}</th>"; //summary 3
			

echo "<th>R{$row['TotAmt']}"; ///TOTAL AMOUNT TotAmt
$TACol = $row['TotAmt'];
//echo "tacol: ".$TACol;
echo "</th>";

$daPrfekse = "";
		$SQLP = "select * from aproof where InvNoA = '$IIII' or  InvNoB = '$IIII'  or  InvNoC = '$IIII'  or  InvNoD = '$IIII'  or  InvNoE = '$IIII'  or  InvNoF = '$IIII'  or  InvNoG = '$IIII'  ";

		echo "<th>";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Pdate = $rowP['ProofDate'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			//echo " ".$Pday."/".$Pmonth."/".$Pyear."";//ProofDate
			}
    $resultP->close();
}		

if ($daPrfekse == "")
echo "-";
echo "<br>";  //ProofNo



			
		echo "";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Pdate = $rowP['ProofDate'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			echo " ".$Pday."/".$Pmonth."/".$Pyear."";//ProofDate
			}
    $resultP->close();
}	
if ($daPrfekse == "")
echo ".";
	
echo "<br>";  //ProofNo
			
			
			
		echo " ";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Notes = $rowP['CustSDR'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			echo $Notes;			}
    $resultP->close();
}	
if ($daPrfekse == "")
echo ".";
	
echo "</th>";  //ProofNo
			
			
			
			
			$Tdate= "";
			$transss = 0;
			$InvNoo = $row['InvNo'];
			$trsql = "select * from transaction where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo'   ";
			echo "<th>";
			
			echo "<font size= 2>";
			//echo $trsql;
			//echo "</th>";

			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				$APCol = $rowT['AmtPaid'];
				
				//if ($rowT['TransNo'] == $rowT['AmtPaid'])
				//echo "APCol:".$APCol;
				//echo "TACol:".$TACol;
				if ($APCol == $TACol)
				echo "<font color = green>";
								
				echo "Trans ".$rowT['TransNo'];
				
				echo "<br>(r".$rowT['AmtPaid'].")";
				echo "<br>on ";
				//.$rowT['TransDate']."";
			$Tdate = $rowT['TransDate'];
				
			$Tdate_array = explode("-",$Tdate);
			$Tyear = $Tdate_array[0];
			@$Tmonth = $Tdate_array[1];
			@$Tday = $Tdate_array[2];
			echo " ".$Tday."/".$Tmonth."/".$Tyear."";//ProofDate
			echo "<br>";
					echo "".$rowT['CustSDR'];
			
				}
			}	  
			
			echo "</font>";
			echo "</th>";

			
			
			
			
			
			
			
			
			
			
			//echo "<th></th>"; ///TOTAL AMOUNT TotAmt
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4
			
			$Invsummm = $Invsummm + $row['TotAmt'];
			$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubh = $row['ex1']*1.15; //iubh is used a few lines below: newVAT
			@$iubh2 = $row['ex2']*1.15; //Warning: A non-numeric value encountered
			
			if ($indesc > "1")
			{
			$dd1 = '';
			$dd1 = $row['D1'];
			$exploded = multiexplode(array("_",".","|",":"),$dd1);
			echo "<th> ";
			//echo $row['D1'];
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}<br>exVAT</th>\n";  ///     7
			echo "<th>".number_format($iubh, 2, '.', '')."</th>\n";  ///     7
			
			
			}
			if ($indesc > "2")
			{
			$dd2 = '';
			$dd2 = $row['D2'];
			$exploded = multiexplode(array("_",".","|",":"),$dd2);
			echo "<th> ";
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']} exVAT</th>\n";   //10
			echo "<th>{$iubh2}</th>\n";  ///     7
			}
			if ($indesc > "3")
			{
			$dd3 = '';
			$dd3 = $row['D3'];
			$exploded = multiexplode(array("_",".","|",":"),$dd3);
			echo "<th> ";
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']} exVAT</th>\n";  //13
			}
			if ($indesc > "4")
			{
			$dd4 = '';
			$dd4 = $row['D4'];
			$exploded = multiexplode(array("_",".","|",":"),$dd4);
			echo "<th> ";
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']} exVAT</th>\n";
			}
			if ($indesc > "5")
			{
			$dd5 = '';
			$dd5 = $row['D5'];
			$exploded = multiexplode(array("_",".","|",":"),$dd5);
			echo "<th> ";
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']} exVAT</th>\n";
			}
			if ($indesc > "6")
			{
			$dd6 = '';
			$dd6 = $row['D6'];
			$exploded = multiexplode(array("_",".","|",":"),$dd6);
			echo "<th> ";
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
			echo "</th>\n";
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}exVAT</th>\n";
			}
			if ($indesc > "7")
			{
			$dd7 = '';
			$dd7 = $row['D7'];
			echo "<th>";

			$string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $dd7);
$array = explode(' ', $string);
for ($i = 0; $i < count($array); $i++) {
//($i % 2 != 0)?: $result[] = $array[$i] . ' ' . $array[$i + 1];

echo $array[$i];
$i++;
echo " ";

echo @$array[$i];
echo "<br>";
}
/*			$exploded = multiexplode(array("_",".","|",":"),$dd7);
			for ($i = 0; $i < count($exploded); $i++) {
				echo $exploded[$i];
				//echo "-$i-";
				$i++;
				echo "_";
				//echo "-$i-";
				echo @$exploded[$i];
				echo "<br>";
			}
*/			echo "</th>\n";
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}exVAT</th>\n";
			}
			if ($indesc > "8")
			{
				$dd8 = '';
			$dd8 = $row['D8'];
			//$dd8 = "test<br>test3";
//$arr = explode('_',$dd8);

//$dd8 = "here is a sample: this text, and this will be exploded. this also | this one too :)";

//$text = "here is a sample: this text, and this will be exploded. this also | this one too :)";
$exploded = multiexplode(array("_",".","|",":"),$dd8);

//print_r($exploded);


/*

$arr = array_filter(explode(' ',str_replace('_',' ',$dd8)));  

$result = array();
for($i=0;$i<count($arr)-1;$i++) {
        $result[] =  $arr[$i].' '.$arr[$i+1];
}
$result[] =  $arr[$i];		

$comma_separated = implode("<br>", $result);

	
			echo "<th>arr0: ".$arr[0]."end</th>\n";   //17
			echo "<th>".$comma_separated."</th>\n";   //17
*/
			//echo "<th>arr0: ".$exploded[0]." arr1:".$exploded[0]."</th>\n";   //17
			//echo "<th>arr0: ".$exploded[0]."</th>\n";   //17
			
/*			
$result = '';
for ($i = 0; $i < count($exploded); $i++) {
$result .= ($i % 2) ? '_' . $exploded[$i] . '<br>' : $exploded[$i]. ' ';
}
	*/		
			
			
//			$comma_separated = implode("<br>", $exploded);
			
			echo "<th> ";
//echo $result;
//echo "<br><br>";
for ($i = 0; $i < count($exploded); $i++) {
	echo $exploded[$i];
	//echo "-$i-";
	$i++;
	echo "_";
	//echo "-$i-";
	echo @$exploded[$i];
	echo "<br>";
	
}



/*			print_r($exploded);
			echo "<br>";
echo @($exploded[0]);

echo "<br>1:<br>";
echo @($exploded[1]);
echo "<br>2:<br>";

			echo @($exploded[2]);
echo "<br>3:<br>";

			echo @($exploded[3]);
echo "<br>8:<br>";

			echo @($exploded[8]);
	*/		
			
//			echo $comma_separated;
			
			echo "</th>\n";

			//echo($exploded[1]);
//			echo $exploded[1];   //17
			//echo "<th>arr0: ".$exploded[1]."</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}exVAT</th>\n";
			}
if ($indesc == "d1")
{
			echo "<th>{$row['D1']}</th>\n";
echo "<th>{$row['D2']}</th>\n";
echo "<th>{$row['D3']}</th>\n";

}

			echo "</tr></font>\n";
				//else do not display paid invoices

			//}
			
			
		//}	
	
	



	}
    // free result set
    $resultINV->close();
	
}
echo "</table>";
//echo "Paid invoice total to: 
echo "Invoices total to: R ".$Invsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid Invoices: R ".$PaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid Invoices: R ".$UnpaidInvsummm.")<br />";






echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".@$yo."<br>";

if (($Invsummm - @$yo) > 0)
echo "<b>_Total Amount oustanding: R".number_format(($Invsummm - @$yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - @$yo)."</b><BR />";

	
?>			
