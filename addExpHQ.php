<html>
<head>
<title>Add an H expenseQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script>

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
<!-- jquery required for copyToClipbrd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>

<?php
require_once('header.php');	
require_once("inc_OnlineStoreDB.php");
$daNextNo = 1; //default when table is empty.
$queryH = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesH";
$resultH = mysqli_query($DBConnect, $queryH);// or die(mysql_error());
$query = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expenses";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
$queryE = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesE";
$resultE = mysqli_query($DBConnect, $queryE);// or die(mysql_error());
$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNoH = 1;
$daNextNoE = 1;
while($row = mysqli_fetch_array($resultH)){
	//echo "The max no ExpNo in expensesH table is:  ". $row[0] . "&nbsp;";
$daNextNoH = intval($row[0]);
}
while($row = mysqli_fetch_array($result)){
	//echo "The max no ExpNo in expenses table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0]);
}
while($row = mysqli_fetch_array($resultE)){
	//echo "The max no ExpNo in expensesE table is:  ". $row[0] . "&nbsp;";
$daNextNoE = intval($row[0]);
}
$daNextNo =  max (array($daNextNo, $daNextNoH, $daNextNoE));
$daNextNo = $daNextNo+1;





$CCCCC = '';
///$CustNo = @$_POST['CustNo'];
$txtArea = $_POST['csv'];

$txtArea = str_replace("\n", "\\n\n", $txtArea);
$txtArea = str_replace("\t", "\\t\t", $txtArea);
//echo nl2br(htmlentities($txtArea)); // for HTML as output, with <br/> for newlines
//echo "<pre>" . $txtArea . "</pre>"; // for raw, preformated output
$array = explode ('\t', $txtArea);
$AA='';
$AA=$array[2];
$AA = ltrim($AA, '	');
$AA = str_replace("-", "", $AA);

//$AA = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
$arraySDR = $array[1]; //sdr  chk 
$ItemA = $arraySDR;
$ItemAshort = substr($ItemA, 0, 6);


$arraySDR = ltrim($arraySDR, '	');
$arraySearch = $arraySDR;

$arraySDR = str_replace("/", " ", $arraySDR);
$arraySDR = str_replace("-", " ", $arraySDR);
$arraySDR = str_replace("*", " ", $arraySDR);
$Aex = $AA/1.15;
$Aex = number_format((float)$Aex, 2, '.', ''); 

$AK = '';
$SupCode = '';
if (mb_substr($arraySDR, 0, 4) == 'SELF') // SELF SERVICE BANKING FEE
{$AK = 'BankFee';
$SupCode = 'NB';
}
if (mb_substr($arraySDR, 0, 4) == 'CELL') // SELF SERVICE BANKING FEE
{$AK = 'cellphone';
$SupCode = 'CC';
}
	


?>

<!--<p id="p1">Exp<?php //echo $daNextNo; ?></p>-->
<!--<p id="p1"><?php //echo "HExp".$daNextNo."\t".$ItemAshort; ?></p>-->
<p id="p1"><?php echo "HExp".$daNextNo.$ItemAshort; ?></p>

<button onclick="copyToClipboard('#p1')" required>Copy ExpNo to clipboard memory</button> <!--works with javascript object function copyToClipboard( -->


<form  action="addExpHMulti.php"   method="post">
ExpNo: <input type="text" size="6"  id="ExpNo"  name="ExpNo" value="<?php echo $daNextNo;?>" /><br>
SDR: <input type="text" id="ItemA" size = 34 name="ItemA" value="<?php echo $arraySDR;?>">
AmtPaid: <input type="text" id="AmtPaid" size = 7 name="AmtPaid" value="<?php echo $AA;?>">
Ex VAT: <input type="text" id="Aex" size = 7 name="Aex" value="<?php echo $Aex;?>">
<br>
<?php 
if ($arraySDR == 'Notification Fee: E mail')
{
	$AK = 'BankFee';
	$SupCode = 'NB';
}
if ($arraySDR == 'Notification Fee: SMS')
{
	$AK = 'BankFee';
	$SupCode = 'NB';
}



if (stripos(strtolower($arraySDR), 'RSM') !== false) {
	$AK = 'internet';
	$SupCode = 'CS';
	
	
	echo "<font size = 3>error wrong table not ExpH anymor!</font>";
}
if (stripos(strtolower($arraySDR), 'karllo0') !== false) {
	$AK = 'internet';
	$SupCode = 'CS';
		echo "<font size = 3>error wrong table not ExpH anymor!</font>";

}
if (stripos(strtolower($arraySDR), 'W8996') !== false) {
	$AK = 'internet';
	$SupCode = 'CS';
		echo "<font size = 3>error wrong table not ExpH anymor!</font>";

}

if (mb_substr($arraySDR, 0, 5) == 'HANGT')
{
	$AK = 'private';
	$SupCode = 'HT';
}
if (mb_substr($arraySDR, -3) == 'STV')
{
	$AK = 'TV';
	$SupCode = 'SS';
}
	?>
Category: <input type="text"  size="6" id="AK"  name="AK"  value="<?php echo $AK;?>" required />
<input type="text"  size="5" id="AC"  name="AC" class='clCN'   value='0'  />(/300/301)<br>
SupCode: <input type="text"  id="SupCode"  name="SupCode" size="3" required  value="<?php echo $SupCode;?>"><br>
Notes: <input type="text"  id="AN"  name="AN" size="26"   value='' > 
	Serial: <input type="text"  id="AS"  name="AS" size="6"   value='' ><br>

<br>
				
<?php

if ($array[1] == '')
	echo "<font size = 6>error, Please paste the date, Statement Description and Amount of a transaction into textarea. Preferably save the excel (.XLSX) file as a .CSV tabular file<br><br><br>";

//$arraySDR = str_replace($arraySDR, '/');
//$arraySDR = str_replace(array('/', ' '), array('-', ''),array('*', ''), $arraySDR);


$TransDate = $array[0];
$rest = substr($TransDate, -5, 1); // returns "d"
//echo "reeest: >>".$rest."<<<br><br>";
if ($rest == ' ')
{
$DD = explode(" ", $TransDate);
$TransDate = $DD[0]."/".$DD[1]."/".$DD[2];
}


$rest2 = substr($TransDate, -6, 3); // returns "d"
//echo "reeest2: >>".$rest2."<<<br><br>";

if ($rest2 == 'Jan')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/01/".$DD2[2];
}
if ($rest2 == 'Feb')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/02/".$DD2[2];
}
if ($rest2 == 'Mar')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/03/".$DD2[2];
}
if ($rest2 == 'Apr')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/04/".$DD2[2]; //this was incorrctly set to March(03)
}
if ($rest2 == 'May')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/05/".$DD2[2];
}
if ($rest2 == 'Jun')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/06/".$DD2[2];
}
if ($rest2 == 'Jul')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/07/".$DD2[2];
}
if ($rest2 == 'Aug')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/08/".$DD2[2];
}
if ($rest2 == 'Sep')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/09/".$DD2[2];
}
if ($rest2 == 'Oct')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/10/".$DD2[2];
}
if ($rest2 == 'Nov')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/11/".$DD2[2];
}
if ($rest2 == 'Dec')
{
$DD2 = explode(" ", $TransDate);
$TransDate = $DD2[0]."/12/".$DD2[2];
}
//echo "TransDate is now: >>".$TransDate."<<<br><br>";

$inin = $array[1]; //InvNo
$ininV = str_replace(' ', '', $inin);
//$ininV = preg_replace('/\s+/', '', $ininV);//remove whitespace
$words = preg_replace('/[0-9]+/', '', $ininV);
$words = str_replace(array('.', ','), '' , $words); //remove kommas and fullstops
$words = preg_replace('/[.,]/', '', $words);
$words = str_replace("/", " ", $words);
$words = str_replace("-", " ", $words);
$words = str_replace("*", " ", $words);
$ininV = str_replace("/", " ", $ininV);
$ininV = str_replace("-", " ", $ininV);
$ininV = str_replace("*", " ", $ininV);
//$ininV = preg_replace('/\s+/', '', $ininV);

$ininA = explode (' ', $inin);



?>


<input type='text' name='PurchDate' value='<?php echo $TransDate; ?>'>




<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 

</form><p id="p1"><?php echo $daNextNo; ?></p>


<button onclick="copyToClipboard('#p1')" required>Copy ExpNo to clipboard memory</button> 

<option value="_no_selection_">View Categories</option>
<?php

$TransDate;
$D = explode('/',$TransDate );
$TransDate = $D[2].'-'.$D[1].'-'.$D[0];
echo "td:".$TransDate."<br>";
/*$queryCat = "SELECT * FROM expensesH where PurchDate = '$TransDate'";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Cat = '';
	$Cat = $row["ExpDesc"];
	if ($Cat != '')
		echo "<br><font size = 5 color = red>WARNING These are on same date:</font><br>";
	
	print "<option value='$Cat'>".$Cat;
	//print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
	//print "_".$Cat;
	print " </option>"; 
	echo " ".$row["PurchDate"];
	}
	mysqli_free_result($result);
}
*/

 $date=date_create("$TransDate");
date_modify($date,"-50 days");
$dateM = date_format($date,"Y-m-d");
//echo "<br>TRANSDATE minus3 days: ".$dateM;


$date=date_create("$TransDate");
$date = date_modify($date,"+50 days");
$dateP = date_format($date,"Y-m-d");


$date=date_create("$TransDate");
$date = date_modify($date,"-3 days");
$dateM3 = date_format($date,"Y-m-d");

$date=date_create("$TransDate");
$date = date_modify($date,"+3 days");
$dateP3 = date_format($date,"Y-m-d");

//echo "<br>TRANSDATE plus3 days:: ".date_format($date,"Y-m-d");

$AexP = $Aex + 10.01;
$AexM = $Aex - 10.01;
							   


$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM3' AND '$dateP3') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br>";
		//echo "<br><font size = 3 color = red>WARNING These are on same date:</font><br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar date and similar priceH:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>Exp".$row["ExpNo"]."</th>";
	$ExpDesc = '';
	$ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}
		echo "<br><br>";							  
	
$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') order by PurchDate";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar dateH:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "<th>SupCode</th>";
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>Exp".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];
	
echo "<th>".$row["ExpDesc"]."</th>";
	//print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
	//print "_".$ExpDesc;
//	print " </option>"; 
echo "<th>".$row["ProdCostExVAT"]."</th>";
@$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["SupCode"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}

	$queryCat = "SELECT * FROM expenses where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br>";
		//echo "<br><font size = 3 color = red>WARNING These are on same date:</font><br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar date and similar price:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
	$ExpDesc = '';
	$ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}
	
$queryCat = "SELECT * FROM expenses where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar date:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "<th>SupCode</th>";
					
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];
	
echo "<th>".$row["ExpDesc"]."</th>";
	//print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
	//print "_".$ExpDesc;
//	print " </option>"; 
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["SupCode"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}

		

$queryCat = "SELECT * FROM expensesE where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br>";
		//echo "<br><font size = 3 color = red>WARNING These are on same date:</font><br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar date and similar price:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
	$ExpDesc = '';
	$ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}
	$queryCat = "SELECT * FROM expensesE where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar dateE:</font><br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
	while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];
	
echo "<th>".$row["ExpDesc"]."</th>";
	//print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
	//print "_".$ExpDesc;
//	print " </option>"; 
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.15;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
	}
	mysqli_free_result($result);
echo "</table>";
}


																				   
$queryCat = "SELECT * FROM expensesH where ExpDesc = '$arraySearch'";
//echo "<br><br>queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$ExpDesc = $row["ExpDesc"];
	print "<option value='$ExpDesc'>".$ExpDesc;
	//print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
	//print "_".$Cat;
	print " </option>"; 
	echo " ".$row["PurchDate"];
	}
	mysqli_free_result($result);
}
echo "<br><br>";
$queryCat = "SELECT DISTINCT Category FROM expensesH";
//echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Cat = $row["Category"];
	print "".mb_substr($Cat, 0, 12);
	//print "_".$Cat;
	print " ,"; 
	}
	mysqli_free_result($result);
}
?>
</select>
</body>
</html>