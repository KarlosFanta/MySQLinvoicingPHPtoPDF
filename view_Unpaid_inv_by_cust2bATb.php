<?php 
@$TBLrow = $CustInt;
	require_once("inc_OnlineStoreDB.php");
	
?>
<br><font color='green'>view_Unpaid_inv_by_cust2bATb.php &nbsp;&nbsp;&nbsp; by InvNo desc_<a href = "view_Unpaid_inv_by_cust2bATd.php?CustNo=<?php echo $CustInt; ?>" target = _blank>Click here for less details or other sort order</a></font>

<?php 

 //echo "<br><Br><br>brrrrrrr @$AA <br><br>";
//first we load php arrays, then we compare them.
//we take all invoices of customer
//and then we take all paid invNos of transaction table
//to get all unpaid invoices

$index = 0;
$SQLstringb = "SELECT InvNo FROM invoice WHERE CustNo = '$CustInt'";
//echo "SQLstringb: ".$SQLstringb; //if no result then this customer never had any invoices
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
$yourArray[$index] = $row['InvNo'];
$index++;
}
mysqli_free_result($roww);
}

//echo "<br>index: ".$index."<br>"; 
//echo "<br>SQLstringb: ".$yourArray[$index]; 

//and now all paid invNos of transaction table

$indexx = 0;
$SQLstrT = "SELECT InvNoA, InvNoB, InvNoC, InvNoD, InvNoE, InvNoF, InvNoG, InvNoH FROM transaction WHERE CustNo = '$CustInt'";
//echo $SQLstrT;
//$yourArrayT[]=0;
$yourArrayT = array("", "", "", "", "", "", "", "");
if ($rowwT = mysqli_query($DBConnect, $SQLstrT)) {
while ($rowT = mysqli_fetch_assoc($rowwT)) {
$yourArrayT[$indexx] = $rowT['InvNoA'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoB'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoC'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoD'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoE'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoF'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoG'];
$indexx++;
$yourArrayT[$indexx] = $rowT['InvNoH'];
$indexx++;
	}
	mysqli_free_result($rowwT);
}


if ($index == 0)
	echo "<br><br><br><br><b>THIS CUSTOMER HAS NEVER HAD ANY INVOICES BEFORE!</b><br><br><br>";
else
{

$result = (array_diff($yourArray, $yourArrayT));
$XX = '';
foreach($result as $key => $value)
{
//  echo $key." Unpaid: ". $value."<br>";
  $XX = $XX." OR InvNo = '$value'";
  
}

$XX = substr($XX, 3); //removes the first OR
$SQLstrX = "SELECT * FROM invoice WHERE CustNo = '$CustInt' AND ".$XX." order by InvNo desc";


//echo "<br>$SQLstrX<br>";
//echo " NEW code! ";
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
//echo "<th>CustNo</th>";
if ($ShowDraft == "Y")
echo "<th>Draft</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
echo "<th>Owner</th>";
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
echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor, R$InvNor1, $InvNor2, $InvNor3, @$InvNor4'><font color = red>Inv$InvNor"; //0
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
 //echo "<br><Br><br>brrrrrrr @$AA <br><br>";

if (@$AA == '')
{
	echo "i copy pasted this code, hopefully it's the right code.";
	$AA='';
/*$AA=$array[2]; //during cash transaction, the array shows inttegers and gives problems.
//because ther is no array during cash transaction.
echo " array0: $array[0] ";
echo " array1: $array[1] ";
echo "<br>Aa array2: $array[2] ";
echo "<br>Aa array3: $array[3] ";
echo "<br>Aa array4: $array[4] ";
var_dump($array);
echo "<br>Aa array2: @$AA <br>";
*/
$AA = ltrim($AA, '	');
$AA = ltrim($AA, '	');
$AA = str_replace("-", "", $AA);
$AA = str_replace("-", "", $AA);
//$AA = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
}
 //echo "<br><Br><br>brrrrrrr @$AA <br><br>";

if ($row['TotAmt'] == $AA)
echo "<th><font size = 5><b>R{$row['TotAmt']}</b></font></th>"; ///TOTAL AMOUNT TotAmt
else
echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
echo "<th>{$row['Summary']}</th>"; //invHeading

$SQLcust = "SELECT * FROM customer WHERE CustNo = '$CustInt' ";


if ($resultC = mysqli_query($DBConnect, $SQLcust)) {
	while ($rowC = mysqli_fetch_assoc($resultC)) {
	$CustNo = $rowC["CustNo"];//case sensitive!
	$CustLN =  $rowC["CustLN"];//case sensitive!
	$CustFN = $rowC["CustFN"];//case sensitive!
	print "$CustLN";
	print "_".$CustNo;
	print "_".$CustFN." ";
	}
	mysqli_free_result($resultC);
}

/*if (!mysqli_query($DBConnect, "SET a=1"))
{
    printf("query Errormessage: %s\n", mysqli_error($DBConnect));
}
else
	echo "query does not give error";
*/

echo "inv  $TransDate $AA $arraySDR $TBLrow";

//echo "<th>".$CustLN."</th>"; //summary
			$Invsummm = $Invsummm + $row['TotAmt'];
			$UnpaidInvsummm = $UnpaidInvsummm + $row['TotAmt'];
			echo "</th>";
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
	
echo "</table>"; //i moved this up above the squiggly
}
}
//if (!mysqli_query($DBConnect, $SQLstrX)) {
//    printf("Query Errormessage: %s\n", mysqli_error($DBConnect));
//}
 //echo "<br><Br><br>brrrrrrr @$AA <br><br>";

echo "</b>Totals to: $UnpaidInvsummm <a href = 'RCExcel21.php' target=_blank>CLick here to find out which invoices the payment could be part of</a><br>Select a max of 8 invoices.<br>";


?>
Optional: Multiple transactions by same customer(same day, max 4x transactions).<br>
NB do not use this if multiple customer SDRs are being used.<br>
NB do not use this if single transaction is for 2 or more invoices.
<input type='checkbox' name='SeperateTrans' ><br>
<input type="hidden" id="TransDate"  name="TransDate" value="<?php echo @$TransDate;?>"> <!-- for addTransMultibSEP.php-->
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>"> <!-- for addTransMultibSEP.php-->
AAA2AA

<!--<input type="input" id="AmtPaid" name="AmtPaid" value="<?php echo $AA;?>">-->
<?php  
if (@$AA == '')
	$AA = 0; //prblem
echo "<br><Br><br>AA:<input type='input' id='AmtPaid' name='AmtPaid' value='$AA'> hmm"; 
?>

<!--<input type="input" id="AmtPaid" name="AmtPaid" value="<?php echo @$AmtPaid;?>">-->
<input type='submit' value='submit selected' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">

arraySDR<input type="text" id="SDR"  name="SDR" value="<?php echo @$arraySDR;?>"><!-- from addTrcsv.php -->


</form>