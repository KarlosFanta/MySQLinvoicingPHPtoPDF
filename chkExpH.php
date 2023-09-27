
<?php
//$query="insert into expensesH (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
//VALUES               ( $ExpNo, $AC, '$PurchDate', '$SupCode', '$AN', '$AS', '$ItemA', '$Aex','$AK', '' ) ";

//$arraySDR = $array[1]; //sdr  chk view_Unpaid_inv_by_cust2bAT.php
$arraySDR = $ItemA;
$arraySDR = ltrim($arraySDR, '	');
$arraySearch = $arraySDR;

//$TransDate = $array[0];
$TransDate = $PurchDate;
//$inin = $array[1]; //InvNo$InvNo;
$InvNo = '0';
$inin = $InvNo; //InvNo
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
echo $TransDate;
//$D = explode('/',$TransDate );
//$TransDate = $D[2].'-'.$D[1].'-'.$D[0];
echo "td:".$TransDate."<br>";

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
							   


$queryCat = "SELECT * FROM expensesH where (PurchDate  between '$dateM3' AND '$dateP3') and ProdCostExVAT between $AexM and $AexP";
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
		echo "<br><br>";							  
	
$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
		echo "<br><font size = 3 color = red>WARNING These are on similar dateH:</font><br>";
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

		

$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
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
	$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') ";
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
echo "<br><br>queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Cat = $row["ExpDesc"];
	print "<option value='$Cat'>".$Cat;
	//print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
	//print "_".$Cat;
	print " </option>"; 
	echo " ".$row["PurchDate"];
	}
	mysqli_free_result($result);
}
$queryCat = "SELECT DISTINCT Category FROM expensesH";
echo "queryCat: $queryCat <br>";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Cat = $row["Category"];
	print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
	//print "_".$Cat;
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>
</body>
</html>