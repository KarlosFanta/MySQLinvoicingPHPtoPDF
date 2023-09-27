<?php

require_once("inc_OnlineStoreDB.php");
@session_start();
if ($indesc == '')
	$indesc = "0";

$CustNo = intval($_SESSION['CustNo'] );
$Invsummm = 0;
$PaidInvsummm  = 0;
$UnpaidInvsummm  = 0;
$ex1  = 0;
$ex2  = 0;
?>

 &nbsp;&nbsp;&nbsp;&nbsp;</font> </b><font color=#F5F5DC>view_inv_PAIDinvoices.php &nbsp;&nbsp;&nbsp;order by InvNo desc</b></font></br>
  <a href = view_inv_by_custADV2.php target='blank'>view_inv_by_custADV2.php</a><br>
  
<?php



$SQLstring = "select * from invoice where CustNo = '$CustNo' order by InvNo desc";
$SQLstring = "SELECT i.InvNo, i.InvDate, i.Summary, i.TotAmt, i.ex1, i.ex2, i.ex3, i.ex4, i.ex5, i.ex6, i.ex7, i.ex8, i.D1, i.D2, i.D3, i.D4, i.D5, i.D6, i.D7, i.D8, i.Q1, i.Q2, i.Q3, i.Q4, i.Q5, i.Q6, i.Q7, i.Q8  
FROM invoice i, transaction t
WHERE i.CustNo = '$CustNo'
AND (i.InvNo = t.InvNoA
OR i.InvNo = t.InvNoB
OR i.InvNo = t.InvNoC
OR i.InvNo = t.InvNoD
OR i.InvNo = t.InvNoE
OR i.InvNo = t.InvNoF
OR i.InvNo = t.InvNoG
OR i.InvNo = t.InvNoH

 )
 order by i.InvNo desc";
//SELECT a.tutorial_id, a.tutorial_author, b.tutorial_count
//    -> FROM tutorials_tbl a, tcount_tbl b
//    -> WHERE a.tutorial_author = b.tutorial_author;


echo $SQLstring;
echo "<br><b>All paid invoices:</b>";

if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
echo "<tr><th>Inv No</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Invoice Date</th>";
echo "<th>&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
echo "<th>TotalAmt</th>";
echo "<th>ProofNo</th>";
echo "<th>ProofDate</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reference&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Payment Received&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>TMethod</th>";

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
$SS = "select TransNo from transaction where InvNoA = '$IInv' or  InvNoB = '$IInv'  or  InvNoC = '$IInv'  or  InvNoD = '$IInv'  or  InvNoE = '$IInv'  or  InvNoF = '$IInv'  or  InvNoG = '$IInv'  ";
//echo $SS;
	if ($resultSS = mysqli_query($DBConnect, $SS)) {
	  while (@$rowPrf = mysqli_fetch_assoc($resultSS)) {
			//echo "TransNo: {$rowPrf['TransNo']}";  //TransNo
			$TrR = $rowPrf['TransNo'];
					}
    $resultSS->close();
				}		


			if ( $TrR == '')
			echo "<font color = red>{$row['InvNo']}</th>\n";
			else
			echo "<font color = green>{$row['InvNo']}Paid</th>\n";
			
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
echo "</th>";  //ProofNo



			
		echo "<th>";  //forst part ProofNo
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
	
echo "</th>";  //ProofNo
			
			
			
		echo "<th>";  //forst part ProofNo
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
				
				echo " (r".$rowT['AmtPaid'].")";
				echo " on ";
				//.$rowT['TransDate']."";
			$Tdate = $rowT['TransDate'];
				
			$Tdate_array = explode("-",$Tdate);
			$Tyear = $Tdate_array[0];
			@$Tmonth = $Tdate_array[1];
			@$Tday = $Tdate_array[2];
			echo " ".$Tday."/".$Tmonth."/".$Tyear."";//ProofDate
			echo "<br>";
			echo "<th>".$rowT['TMethod']."</th>";
				
				}
			}	  
			
			echo "</font>";
			echo "</th>";

			
			
			
			
			
			
			
			
			
			
			
			//echo "<th></th>"; ///TOTAL AMOUNT TotAmt
			//if ($InvPdStatus == "Y")
			//echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4
			
			//$Invsummm = $Invsummm + $row['TotAmt'];
			//$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubh = $row['ex1']*1.15;
			@$iubh2 = $row['ex2']*1.15; //Warning: A non-numeric value encountered
			
			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']} exVAT</th>\n";  ///     7
			echo "<th>".$iubh."</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']} exVAT</th>\n";   //10
			echo "<th>iubh2{$iubh2}</th>\n";  ///     7
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

			//}
			
			
		//}	
	
	



	}
    // free result set
    $resultINV->close();
	
}
echo "</table>";

/*
//echo "Paid invoice total to: 
echo "Invoices total to: R ".$Invsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid Invoices: R ".$PaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid Invoices: R ".$UnpaidInvsummm.")<br />";
$yo = 0;
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>_Total Amount oustanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
echo "<br /><br />";

echo "vipdinvs-";
include ("view_Unpaid_inv_by_cust.php");
*/





















$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustNo" ;

if ($result = $DBConnect->query($SQLstring)) {


  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!

 		echo "";
			echo "Customer AutoNumber:";
//			echo "<input type='text' size = 4 name='CustNo' value=";
			//echo $row[0];
			echo $row['CustNo'];
	//		echo "> editCustProcess.php calls editCustProcess_last.php";
		echo "<br>";

 		echo "";
			echo "* First Name, / VAT no:";

			
		//	echo "<textarea id='cust_fn' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustFName' >";
echo $row['CustFN'];
//echo "</textarea>";
		
			
			
			
			
		echo "<br>";

 		echo "";
			echo "<label>* Surname:</label></dt>";
	
//echo "<textarea id='CustLName' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustLName' >";
echo $row['CustLN'];
//echo "</textarea>";
			
			
}}
	

?>