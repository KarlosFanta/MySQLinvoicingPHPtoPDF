<?php

	//$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");
if (@$_GET['CustNo'] != "")
$CustInt = intval($_GET['CustNo'] );

$indesc = "9";
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];


$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];

if (@$CustInt == '')
{
	    @session_start();
 
	$CustInt = intval($_SESSION['CustNo'] );
}
else echo "CustInt is $CustInt";
	

?> 



<b><br><!--<font size = "2" type="arial">-->

<?php 
$SQLstring = "select * from invoice where CustNo = '$CustInt' and summary not like '%dsl' order by InvNo desc";
$SQLstring = "select * from invoice where CustNo = '$CustInt' and summary not like '%dsl' order by InvNo desc";
if (@$un == 'N')
echo "Error - please try view_inv_by_custUNRECONCILED.php";
$un = 'Y';
echo "<br><br>Your Invoices History view_inv_by_cust.php";
?>
<font color=blue> or click here for more details with proofs: <a href = view_inv_by_custADV.php>view_inv_by_custADV.php</a></font>

 &nbsp;&nbsp;&nbsp;&nbsp;</font> </b><font color=#F5F5DC>view_inv_by_cust.php &nbsp;&nbsp;&nbsp;

<?php 		echo $SQLstring;
echo "&nbsp;&nbsp;&nbsp;indesc: ".$indesc."</font>";	echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo @$row['CustLN'];
?>
			</b></font>
</br>
<?php
//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = '';
$PaidInvsummm = 0;
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Draft</th>";
echo "<th>Exp</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>ProofNo</th>";
echo "<th>PT</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
if ($InvPdStatus == "Y")
echo "<th>Inv Paid Status</th>";

//if ($indesc > "1")
echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>in1</th>";

if ($indesc >= "2")
{echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
echo "<th>in2</th>";
}
if ($indesc >= "3")
{echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";
}
if ($indesc >= "4")
{echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";
}
if ($indesc >= "5")
{echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";
}
if ($indesc >= "6")
{echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";
}
if ($indesc >= "7")
{echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
}
if ($indesc >= "8")
{echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";
}

echo "</tr>\n";
echo "<tr>";

	  while (@$row = mysqli_fetch_assoc($resultINV)) {

  			$TrR ="";
			
			
						$transss = 0;
			$InvNoo = $row['InvNo'];
			$trsql = "select * from transaction where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo'   ";


			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				///echo "<font color= green>yy ".$rowT['TransNo']."nn</th>";
				//echo " (r".$rowT['AmtPaid'].")";
				}
			}	  




echo "<tr><th>{$row['InvNo']}</th>";
echo "<th>{$row['Draft']}</th>\n";   //11
echo "<th>";

$SQLstrExp = "select * from expenses where InvNo = $InvNoo order by ExpNo  desc";
//where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo
if ($resultExp = mysqli_query($DBConnect, $SQLstrExp)) {
while ($rowE = mysqli_fetch_assoc($resultExp)) 
{
echo "ExpNo".$rowE['ExpNo'].": ".$rowE['ExpDesc']." ".$rowE['SerialNo']."<br>";
}
mysqli_free_result($resultExp);
}

echo "</th><th>";

















	
			
			$IInv = $row['InvNo'];
			$IIII = $row['InvNo'];
$SS = "select TransNo, TransDate from transaction where InvNoA = '$IInv' or  InvNoB = '$IInv'  or  InvNoC = '$IInv'  or  InvNoD = '$IInv'  or  InvNoE = '$IInv'  or  InvNoF = '$IInv'  or  InvNoG = '$IInv'  ";
//echo $SS;
	if ($resultSS = mysqli_query($DBConnect, $SS)) {
	  while (@$rowPrf = mysqli_fetch_assoc($resultSS)) {
			//echo "TransNo: {$rowPrf['TransNo']}";  //TransNo
			$TrR = $rowPrf['TransNo'];
			$TrRD = $rowPrf['TransDate'];
			$TrRDdate_array = explode("-",$rowPrf['TransDate']);
$TrRDyear = $TrRDdate_array[0];
$TrRDmonth = $TrRDdate_array[1];
$TrRDday = $TrRDdate_array[2];
			$TrRD = $TrRDday.'/'.$TrRDmonth;
					}
    $resultSS->close();
				}		


			if ( $TrR == '')
			echo "<font color = red>{$row['InvNo']}</th>\n";
			else
			echo "<font color = green>{$row['InvNo']}Paid on {$TrRD}</th>\n";
			$TrRD ="";//reset
			$TrR ="";//reset
			$rowPrf['TransNo'] ="";//reset

			
			
			
			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate

			
//			echo "<th>R{$row[29]}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
/*			
						$IIII = $row['InvNo'];
		$SQLP = "select * from aproof where InvNoA = '$IIII' or  InvNoB = '$IIII'  or  InvNoC = '$IIII'  or  InvNoD = '$IIII'  or  InvNoE = '$IIII'  or  InvNoF = '$IIII'  or  InvNoG = '$IIII'  ";
echo "<th>";  // No Proof received

if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
	}
    $resultP->close();
}		

echo "&nbsp;</th>";  // No Proof received

*/			
			
			
			
			
			echo "<th>";
			
			echo "<font size= 1>";
			//echo $trsql;
			//echo "</th>";

			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				echo "<font color= green> ".$rowT['TransNo'];
				echo " (r".$rowT['AmtPaid'].")";
				}
			}	  
			
			//echo "</font>";
			echo "</th>";

			
			
			
			
			
			
			
			
			
			
			
			//echo "<th></th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>";
			echo mb_substr($row['Summary'], 0, 11); 
			echo "<br><font size = 2>";
			echo mb_substr($row['Summary'], 11); 
			echo "</font></th>"; //summary 3
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4
			$Invsummm = $Invsummm + $row['TotAmt'];
			$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubh = round(($row['ex1']*1.15),2);
			@$iubh2 = round(($row['ex2']*1.15),2); //Warning: A non-numeric value encountered
			
			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>".round($row['ex1'], 2)."exVAT</th>\n";  ///     7
			echo "<th>".$iubh."</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>".round($row['ex2'],2)."exVAT</th>\n";   //10
			echo "<th>{$iubh2}</th>\n";  ///     7
			}
			if ($indesc > "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']} exVAT</th>\n";  //13
			}
			if ($indesc > "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']} exVAT</th>\n";
			}
			if ($indesc > "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']} exVAT</th>\n";
			}
			if ($indesc > "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}exVAT</th>\n";
			}
			if ($indesc > "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}exVAT</th>\n";
			}
			if ($indesc > "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}exVAT</th>\n";
			}

			echo "</tr></font>\n";
				//else do not display paid invoices

			
			
	




	}
    $resultINV->close();
	
}
echo "</table></font>";
//echo "Paid invoice total to: 
echo "(All invoices total to: R ".$Invsummm;
echo ")<br />";

