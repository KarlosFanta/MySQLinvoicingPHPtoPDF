<style>




table {
  border-collapse: collapse;
 
}

caption {
font-size: 100%;
text-align: right;
}
</style>

<?php 

@$TBLrow = $CustInt;
	require_once("inc_OnlineStoreDB.php");
	
?>
<br><font color='green'>view_Unpaid_inv_by_cust2bATb_.php &nbsp;&nbsp;&nbsp;order by InvNo desc</font>

<?php 


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
while ($row = mysqli_fetch_assoc($rowwT)) {
$yourArrayT[$indexx] = $row['InvNoA'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoB'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoC'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoD'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoE'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoF'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoG'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoH'];
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
echo " NEW code! ";
//echo $SQLstrX."<br>";
$ShowDraft = 'Y';
//if ($resultINVb = $DBConnect->query($SQLstringb)) {
if ($resultINVb = mysqli_query($DBConnect, $SQLstrX)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th style='font-size:12px;' >InvNo</th>";
//echo "<th>CustNo</th>";
if ($ShowDraft == "Y")
echo "<th>Draft</th>";
echo "<th style='font-size:14px;' >&nbsp;&nbsp;&nbsp;Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date&nbsp;&nbsp;&nbsp;</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
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
echo "<tr><th  style='font-size:14px;' ><font color = red>$InvNor"; //0
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

echo "<th  style='font-size:15px;' >".$day."/".$month."/".$year;

$out = date("Y") - $year;
//echo $out;

if ($out == 1 )
echo "<br>A year ago";
if ($out > 1 )
echo "<br><font color = orange>$out years ago</font>";
echo "</th>";//invDate

if ($AA = '')
{
	//i copy pasted this code, hopefully it's the right code.
	$AA='';
$AA=$array[2];
$AA = ltrim($AA, '	');
$AA = ltrim($AA, '	');
$AA = str_replace("-", "", $AA);
$AA = str_replace("-", "", $AA);
//$AA = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
}

if ($row['TotAmt'] == $AA)
echo "<th><font size = 5><b>R{$row['TotAmt']}</b></font></th>"; ///TOTAL AMOUNT TotAmt
else
echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
echo "<th>{$row['Summary']}</th>"; //summary
			$Invsummm = $Invsummm + $row['TotAmt'];
			$UnpaidInvsummm = $UnpaidInvsummm + $row['TotAmt'];

			echo "<th  style='font-size:14px;' >{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}</th>\n";  ///     7
			echo "<th style='font-size:14px;' >{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']}</th>\n";   //10
			echo "<th style='font-size:14px;' >{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']}</th>\n";  //13
			echo "<th style='font-size:14px;' >{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']}</th>\n";
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th style='font-size:14px;' >{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']}</th>\n";
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th style='font-size:14px;' >{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}</th>\n";
			echo "<th style='font-size:14px;' >{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}</th>\n";
			echo "<th style='font-size:14px;' >{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}</th>\n";
			
			echo "</tr></font>\n";
		
	}
	mysqli_free_result($resultINVb);
	
echo "</table>"; //i moved this up above the squiggly
}
}

echo "</b><br>";
?>

