<?php 
@$TBLrow = $CustInt;
?>
<input type='hidden' name='TransDate' value='<?php echo @$TransDate; ?>'>
<input type='text' name='mydropdownEC' value='<?php echo $TBLrow; ?>'>
<?php
	require_once("inc_OnlineStoreDB.php");
	
?>
<br><font color='green'>view_Unpaid_inv.php &nbsp;&nbsp;&nbsp;order by InvNo desc</font>

<?php 


//first we load php arrays, then we compare them.
//we take all invoices of customer
//and then we take all paid invNos of transaction table
//to get all unpaid invoices

$index = 0;
//$SQLstringb = "SELECT InvNo FROM invoice WHERE CustNo = '$CustInt'";
$SQLstringb = "SELECT InvNo FROM invoice order by InvDate desc";
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
$yourArray[$index] = $row['InvNo'];
$index++;
}
mysqli_free_result($roww);
}




//and now all paid invNos of transaction table

$index = 0;
//$SQLstrT = "SELECT InvNoA, InvNoB, InvNoC, InvNoD, InvNoE, InvNoF, InvNoG, InvNoH FROM transaction WHERE CustNo = '@$CustInt'";
$SQLstrT = "SELECT InvNoA, InvNoB, InvNoC, InvNoD, InvNoE, InvNoF, InvNoG, InvNoH FROM transaction";
echo $SQLstrT;
if ($rowwT = mysqli_query($DBConnect, $SQLstrT)) {
while ($row = mysqli_fetch_assoc($rowwT)) {
$yourArrayT[$index] = $row['InvNoA'];
$index++;
$yourArrayT[$index] = $row['InvNoB'];
$index++;
$yourArrayT[$index] = $row['InvNoC'];
$index++;
$yourArrayT[$index] = $row['InvNoD'];
$index++;
$yourArrayT[$index] = $row['InvNoE'];
$index++;
$yourArrayT[$index] = $row['InvNoF'];
$index++;
$yourArrayT[$index] = $row['InvNoG'];
$index++;
$yourArrayT[$index] = $row['InvNoH'];
$index++;
	}
	mysqli_free_result($rowwT);
}




$result = (array_diff($yourArray, $yourArrayT));
$XX = '';
foreach($result as $key => $value)
{
//  echo $key." Unpaid: ". $value."<br>";
  $XX = $XX." OR InvNo = '$value'";
  
}
$XX = substr($XX, 3); //removes the first OR
//$SQLstrX = "SELECT * FROM invoice WHERE CustNo = '@$CustInt' AND ".$XX." order by InvNo desc";
$SQLstrX = "SELECT * FROM invoice WHERE  ".$XX." order by InvNo desc";


//echo "<br>$SQLstrX<br>";


?>
 NEW code! 
<?php
//echo $SQLstrX."<br>";
$ShowDraft = 'Y';
//if ($resultINVb = $DBConnect->query($SQLstringb)) {
if ($resultINVb = mysqli_query($DBConnect, $SQLstrX)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Cust</th>";
if ($ShowDraft == "Y")
echo "<th>Draft</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1</th>";
echo "<th>in1</th>";
echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
echo "<th>in2</th>";
echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";

echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";

echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";

echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";

echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";


echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultINVb)) {
$InvNor = $row['InvNo'];
$InvNor1 = $row['TotAmt'];
$InvNor2 = $row['Summary'];
$InvNor3 = '';
$InvNor4 = '';
echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor, R$InvNor1, $InvNor2, $InvNor3, @$InvNor4'><font color = red>$InvNor"; //0
echo "</th>\n";

echo "<th>";

$CustNo = $row['CustNo'];
$queryC = "select * from customer where CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($rowC = mysqli_fetch_assoc($resultC)) {
echo $rowC["CustFN"]."<a href = '{$rowC["CustLN"]}?='{$rowC["CustLN"]}'></a></th>";//CustFN 
echo $rowC["CustLN"]."";

}
mysqli_free_result($resultC);
}
echo "</th>\n";



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
			$Invsummm = $Invsummm + $row['TotAmt'];
			$UnpaidInvsummm = $UnpaidInvsummm + $row['TotAmt'];

			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}</th>\n";  ///     7
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']}</th>\n";   //10
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']}</th>\n";  //13
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']}</th>\n";
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']}</th>\n";
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}</th>\n";
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}</th>\n";
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}</th>\n";
			
			echo "</tr></font>\n";
		
	}
	mysqli_free_result($resultINVb);
	
}
echo "</table>";
if (!mysqli_query($DBConnect, $SQLstrX)) {
    printf("Query Errormessage: %s\n", mysqli_error($DBConnect));
}

echo "</b><br>";
?>
Optional: {UNDER CONSTRUTION] Multiple transactions by same customer.
<input type='checkbox' name='SeperateTrans' ><br>
<input type='submit' value='submit selected' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">

arraySDR<input type="text" id="SDR"  name="SDR" value="<?php echo @$arraySDR;?>"><!-- from addTrcsv.php -->


</form>