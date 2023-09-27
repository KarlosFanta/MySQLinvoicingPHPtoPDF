<?php	//this is "edit_trans_CustProcessC2.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");

include "monthtables.php";
$First = '';

?>
<form name="Edit_trans_processC2" action="edit_trans_process_last.php" method="post">


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

$Fbjk4 = $_POST['Fbjk4'];
echo "Fbjk4: ".$Fbjk4."<br>";
//$in = $_POST['in'];
//$indesc = $_POST['indesc'];
$TransNo = explode('_', $Fbjk4 );
$TransInt = intval($TransNo[0]);
//echo "<br>TransInt:".$TransInt."</br />";
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
echo $SQLString ;
echo "<br>";
?>
<b><font size = "4" type="arial">Edit transaction (processC2)</b></font>calling edit_trans_process_last.php

</br>
<?php
$item2 = '';
//include "monthtables.php";
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
}
$result->free();
}	//echo "<br>";


include "monthtablesdropdown.php";

$SQLStringC = "SELECT * FROM customer WHERE CustNo = $item2";
//echo $SQLStringC."<br>";
if ($resultC = mysqli_query($DBConnect, $SQLStringC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$item1 = $row["CustNo"];
//print "<option value='$item1'>$item1";
print "<br>$item1";
$item2 =  $row["CustFN"];
$item3 = $row["CustLN"];
$item4 = $row["Important"];

print "&nbsp;&nbsp;&nbsp;&nbsp;".$item2;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item3;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item4;

}
	mysqli_free_result($resultC);
}

?>
<?php
 echo "<table width='10' border='0'>";
		echo "<tr>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
	  
	 $IA =   $row["InvNoA"];
	 $IB =   $row["InvNoB"];
	 $IC =   $row["InvNoC"];
	 $ID =   $row["InvNoD"];
	 $IE =   $row["InvNoE"];
	 $IF =   $row["InvNoF"];
	 $IG =   $row["InvNoG"];
	 $IH =   $row["InvNoH"];
	  
	  
	  
	  
	  
	  
	  
	  
 		echo "<th>";
			echo "<dt><label>TransNo:</label></dt>";
				echo "<dd><input type='text' name='TransNo' size = '3' value=";
			//echo $row[0];
			echo $row['TransNo'];
			echo "> </dd>";
		echo "</th>";


		echo "<input type='hidden' name='CustNo' size = '10' value=";
			echo $row['CustNo'];
			echo ">";

 		echo "<th>";
			echo "<dt><label>Date <br></label></dt>";
			echo "<dd><input type='text' name='TransDate' size = '8' value=";
			echo $row['TransDate'];
			$ddd = $row['TransDate'];
			echo "> </dd>";
			$dr = explode( '-', $ddd);
			$dP = $dr[2].'/'.$dr[1].'/'.$dr[0];
			echo $dP;
		echo "</th>";



 		echo "<th>";
			echo "<dt><label>Amt Paid</label></dt>";
			echo "<dd><input type='text' name='AmtPaid' size='6' value=";
			echo $row['AmtPaid'];
			echo "> </dd>";
		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Notes</label></dt>";
			echo "<dd><textarea name='Notes' >";
			echo strtr($row['Notes'], array(' ' => '&nbsp;')) ;
			echo "</textarea> </dd>";
		echo "</th>";

  		echo "<th>";
			echo "<dt><label>CustSDR</label></dt>";
			echo "<dd><textarea name='CustSDR' >";
			echo strtr($row['CustSDR'], array(' ' => '&nbsp;')) ;
			echo "</textarea> </dd>";
		echo "</th></tr></table><table><tr>";
 



$grrr = 0;
$grrr = $row['InvNoA'];
if ($grrr == 0)
$grrr = "";


		echo "<th>";
			echo "<dt><label>InvNoA</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoA' value=";
			print $grrr;
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoAincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoAincl' value=";
			echo $row["InvNoAincl"];
			echo "> </dd>";
		echo "</th> ";





 		echo "<th>";
			echo "<dt><label>InvNoB</label></dt>";
			echo "<dd><input type='text'  size = 5 name='InvNoB' value=";
			print $row['InvNoB'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoBincl</label></dt>";
			echo "<dd><input type='text' size = 4 name='InvNoBincl' value=";
			echo $row["InvNoBincl"];
			echo "> </dd>";
		echo "</th> ";

		
			echo "<th>";
			echo "<dt><label>InvNoC</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoCincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> </dd>";
		echo "</th></tr><tr> ";


			echo "<th>";
			echo "<dt><label>InvNoD</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoDincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> </dd>";
		echo "</th> ";



				echo "<th>";
			echo "<dt><label>InvNoE</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoEincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> </dd>";
		echo "</th> ";


		echo "<th>";
			echo "<dt><label>InvNoF</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoFincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> </dd>";
		echo "</th></tr><tr> ";


		echo "<th>";
			echo "<dt><label>InvNoG</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoGincl</label></dt>";
			echo "<dd><input type='text' size = 5 name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<dt><label>InvNoH</label></dt>";
			echo "<dd><input type='text'  size = 4 name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoHincl</label></dt>";
			echo "<dd><input type='text'  size = 4 name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> </dd>";
		echo "</th> ";


		
		
		
		echo "<th>";
			echo "<dt><label>TM</label></dt>";
			echo "<dd><input type='text' size = 5 name='TMethod' value=";
echo strtr($row['TMethod'], array(' ' => '&nbsp;')) ;
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>Priority</label></dt>";
			echo "<dd><input type='text' size = 6 name='Priority' value=";
echo strtr($row['Priority'], array(' ' => '&nbsp;')) ;
			echo "> </dd>";
		echo "</th></tr><tr><th></th><th></th><th></th><th></th> ";
 		echo "<th>";
			echo "<dt><label>CustNo: required when transaction is in wrong Customer</label></dt>";
			echo "<dd><input type='text' name='CustNo' value=";
			echo $row["CustNo"];
			echo "> </dd>";
		echo "</th> ";
 }
}
		echo "</tr> ";
		echo "</table> ";

		
?>

<div>
		<dl>
			<dt></dt>
			<dd><input type="submit" name="btn_submit" value="Submit/Save" /> 
			
			
						
			
			
		</dl>
</div>
</form>

<?php

$SQLstringA = "select * from invoice where InvNo = '$grrr'";
//echo "<br>InvNoA:<br>";
//echo $SQLstringA;
if ($resultINVA = mysqli_query($DBConnect, $SQLstringA)) {
//echo "<table  border='1'>\n";
$indesc = 9;
echo "<table  border='1'>";
echo "<tr><th>InvNoA</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Draft</th>";
echo "<th>Exp</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>ProofNo</th>";
echo "<th>PT</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
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

	  while (@$row = mysqli_fetch_assoc($resultINVA)) {

  			$TrR ="";
			
			
						$transss = 0;
			$InvNoo = $row['InvNo'];
			$trsql = "select * from transaction where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo'   ";


			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				echo "<font color= green> ".$rowT['TransNo'];
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

echo "</th>";

















	
			
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
			echo "<th>{$row['Summary']}</font></th>"; //summary 3
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4
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
    $resultINVA->close();
	
}
echo "</table></font>";




































































































$DisplayInvPdStatus = 'N';
$indesc = '3';
//echo "view_inv_by_cust2.php";
include "view_inv_by_custADV2.php";

if ($IA > '1')
{
	echo "test";
	
$query = "select * from invoice where InvNo = '$IA' or InvNo = '$IB' or InvNo = '$IC'";
echo $query;
echo "<table border='1'>\n";

if ($result = mysqli_query($DBConnect, $query)) {
echo "<tr><th>InvNo</th>";
echo "<th>TotAmt</th>";
echo "<th>Chk</th>";
echo "<th>Summary</th>";
echo "<th>InvDate</th>";

echo "</tr>\n";

  while ($row = mysqli_fetch_assoc($result)) {
/*$CustNo = $row["CustNo"];
$CustLN =  $row["CustLN"];
$CustFn = $row["CustFN"];
print "'$item1'>$item2";
print "_".$item1;
print "_".$item3;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBlink->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
echo "<tr>";
echo "<th>".$row["InvNo"]."</th>";
echo "<th>".$row["TotAmt"]."</th>";
$Q1 = $row["Q1"];
$ex1 = $row["ex1"];
$Q2 = $row["Q2"];
$ex2 = $row["ex2"];
$Q3 = $row["Q3"];
$ex3 = $row["ex3"];
$Q4 = $row["Q4"];
$ex4 = $row["ex4"];
$Q5 = $row["Q5"];
$ex5 = $row["ex5"];
$Q6 = $row["Q6"];
$ex6 = $row["ex6"];
$Q7 = $row["Q7"];
$ex7 = $row["ex7"];
$Q8 = $row["Q8"];
$ex8 = $row["ex8"];

@$TT = $Q1*$ex1 + $Q2*$ex2 + $Q3*$ex3+$Q4*$ex4+$Q5*$ex5+$Q6*$ex6+$ex7*$Q7+$ex8*$Q8; //Warning: A non-numeric value encountered
$TTV = $TT*1.15;
//echo "<th> TT: $TT  </th>";
echo "<th> $TTV </th>";


//echo "<th>".(($row["Q1"] * $row["ex1"]) + ($row["Q2"] * $row["ex2"]) + ($row["Q3"]* $row["ex3"]) + ($row["Q4"] * $row["ex4"]) + ($row["Q5"] * $row["ex5"]).($row["Q6"]*$row["ex6"])+($row["Q7"]*$row["ex7"])+($row["Q8"]* $row["ex8"]))."</th>";
//echo "<th>".($row["Q2"] * $row["ex2"]) ."</th>";
//echo "<th>".$row["Q1"]*$row["ex1"]+ $row["Q2"]* $row["ex2"] + $row["Q3"]* $row["ex3"]."</th>";
//echo "<th>".$row["Q4"] * $row["ex4"] + $row["Q5"] * $row["ex5"]."";
//echo $row["Q6"]*$row["ex6"]+$row["Q7"]*$row["ex7"]+$row["Q8"]* $row["ex8"]."</th>";

echo "<th>".$row["Summary"]."</th>";
echo "<th>".$row["InvDate"]."</th>";



echo "<th>".$row["Q1"]."*";
echo "".$row["ex1"]."+";
echo "".$row["Q2"]."*";
echo "".$row["ex2"]."+";
echo "".$row["Q3"]."*";
echo "".$row["ex3"]."+";
echo "".$row["Q4"]."*";
echo "".$row["ex4"]."+";
echo "".$row["Q5"]."*";
echo "".$row["ex5"]."+";
echo "".$row["Q6"]."*";
echo "".$row["ex6"]."+";
echo "".$row["Q7"]."*";
echo "".$row["ex7"]."+";
echo "".$row["Q8"]."*";
echo "".$row["ex8"]."</th>";
echo "</tr>\n";
			}
		 mysqli_free_result($result);
		}
}
echo "</table>";



include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");





echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>..Total Amount outstanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
echo "<br /><br />";
include ("view_event_by_cust.php");
/*$message = 'You have deleted '.$Fbjk4.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?> 



