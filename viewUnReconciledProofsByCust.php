<?php

	//$page_title = "Customer";
	require_once 'inc_OnlineStoreDB.php';
$SQLstring = "select * from aproof where CustNo = '$CustInt' and  TransNo = '' ";

?>
<b><br>




<?php 		//echo @$row['CustFN'];
		//	echo " ";
			//echo @$row['CustLN'];
?>
			</b></font><br>
Unreconciled Proofs</font><font color=#F5F5DC> </b>viewUnReconciledProofsByCust.php &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <?php echo $SQLstring; ?>
 </font><br>
<?php
//$SQLstring = "select * from aproof where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

$Prfsummm = 0;
$UnpaidPrfsummm = 0;
$PaidPrfsummm = 0;//if ($resultprf = $DBConnect->query($SQLstring)) {
if ($resultprf = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";

echo "<tr><th>Proof No&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Proof Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
//if ($InvPdStatus == "Y")
echo "<th>Inv Paid Status</th>";
/*
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
*/
echo "</tr>\n";

    // fetch object array
//    while ($row = $resultprf->fetch_row()) {
	  while ($row = mysqli_fetch_assoc($resultprf)) {

      /*
			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate
*/
					echo "<tr><th><font color = red>{$row['ProofNo']}</th>\n"; //0
			echo "<th>R{$row['Amt']}</th>"; ///TOTAL AMOUNT Amt
			echo "<th>{$row['Notes']}</th>"; //summary
			echo "<th>{$row['PMethod']}</th>\n"; //PDSTATUS
			$Prfsummm = $Prfsummm + $row['Amt'];
			$UnpaidPrfsummm = $UnpaidPrfsummm + $row['Amt'];

			echo "<th>{$row['CustSDR']}</th>\n";
			echo "<th>{$row['InvNoA']}</th>\n";
			echo "<th>{$row['InvNoB']}</th>\n";
			echo "</tr></font>\n";

	}
    // free result set
    mysqli_free_result($resultprf);

}
echo "</table>";
//echo "Paid aproof total to:
//if ($un == 'Y')
//echo "aproofs total to: R ".$Prfsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid aproofs: R ".$PaidPrfsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid aproofs: R ".$UnpaidPrfsummm.")<br />";
//else
echo "Unpaid aproofs total to: &nbsp;&nbsp; <b>R ".$UnpaidPrfsummm;
echo "</b><br>";

?>
