<?php
$chkbx = "0";
//$indesc = "9";
//$ShowDraft
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];

$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];

//$TBLrow = $_POST['mydropdownEC'];

	//$page_title = "Customer";
require_once 'inc_OnlineStoreDB.php';
?>
<br><font color='green'>view_Unpaid_inv_by_cust2b.php &nbsp;&nbsp;&nbsp;order by InvNo desc</font>
</form><form  name="AddTrans2"  method='post' action = "addProofMultib.php">
<input type='hidden' name='mydropdownEC' value='<?php echo $TBLrow; ?>'>
<?php 		//echo "indesc: ".$indesc."</font>";	echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			//echo @$row['CustLN'];
?>
			</b></font>
</br>Unpaid invoices:<br>
<?php
//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";

$SQLstring = "SELECT * FROM invoice wHERE invoice.InvNo NOT
IN ( SELECT InvNoA  FROM transaction )
AND invoice.InvNo NOT IN  ( SELECT InvNoB  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoC  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoD  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoE  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoF  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoG  FROM transaction )
AND  invoice.InvNo NOT IN  ( SELECT InvNoH  FROM transaction )
AND invoice.CustNo = '$CustInt'";

$SQLstring = "SELECT * FROM invoice WHERE invoice.CustNo = '$CustInt'
AND invoice.InvNo NOT IN ( SELECT InvNoA  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoB  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoC  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoD  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoE  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoF  FROM transaction  where CustNo = '$CustInt')
AND invoice.InvNo NOT IN  ( SELECT InvNoG  FROM transaction where CustNo = '$CustInt' )
AND invoice.InvNo NOT IN  ( SELECT InvNoH  FROM transaction where CustNo = '$CustInt' ) ";

//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$ShowDraft = 'Y';
//if ($resultINV = $DBConnect->query($SQLstring)) {
if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>CustNo</th>";
if ($ShowDraft == "Y")
echo "<th>Draft</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
if ($indesc > "1")
{
echo "<th>D1</th>";
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
			$InvNor = $row['InvNo'];
			$InvNor1 = $row['TotAmt'];
			$InvNor2 = $row['Summary'];
$queryAP = "select * from aproof where InvNoA = $InvNor OR InvNoB = $InvNor OR InvNoC = $InvNor OR InvNoD = $InvNor OR InvNoE = $InvNor OR InvNoF = $InvNor OR InvNoG = $InvNor OR InvNoH = $InvNor";
//echo $queryAP;
$InvNor3 = '';
$InvNor4 = '';
if ($resultAP = mysqli_query($DBConnect, $queryAP)) {
  while ($rowAP = mysqli_fetch_assoc($resultAP)) {
echo " ".$rowAP["ProofNo"];
echo "</font> ".$rowAP["PMethod"];

$InvNor3 = $rowAP['PMethod'];
$InvNor4 = $rowAP['CustSDR'];
			}
		 mysqli_free_result($resultAP);
		}
			//$InvNor3 = $rowAP['PMethod']; //sorry not in invoice table, but try aproof table.
			echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor, R$InvNor1, $InvNor2, $InvNor3, @$InvNor4'><font color = red>$InvNor"; //0
//			echo "</th>\n";

	//			echo "<th>"; //0





echo "</th>\n"; //0






if ($ShowDraft == "Y")
			echo "<th>{$row['Draft']}</th>";

						$date_array = explode("-",$row['InvDate']);
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





			echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>{$row['Summary']}</th>"; //summary
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS
			$Invsummm = $Invsummm + $row['TotAmt'];
			$UnpaidInvsummm = $UnpaidInvsummm + $row['TotAmt'];

			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']}</th>\n";   //10
			}
			if ($indesc > "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']}</th>\n";  //13
			}
			if ($indesc > "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']}</th>\n";
			}
			if ($indesc > "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']}</th>\n";
			}
			if ($indesc > "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}</th>\n";
			}
			if ($indesc > "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}</th>\n";
			}
			if ($indesc > "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}</th>\n";
			}
			echo "</tr></font>\n";
		}
	}
	mysqli_free_result($resultINV);

}
echo "</table>";
echo "Unpaid Invoices total to: &nbsp;&nbsp; <b>R ".$UnpaidInvsummm;
echo "</b><br>";
?>
<input type='submit' value='submit selected' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">
</form>
