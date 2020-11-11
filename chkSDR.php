<?php



echo "<br><br>";
//$arraySDR = str_replace("//", " ", $arraySDR);
//$arraySDR = str_replace("\/", " ", $arraySDR);
//$arraySDR = str_replace("\\", " ", $arraySDR);
//$arraySDR = str_replace("/\//", " ", $arraySDR);
//$arraySDR = str_replace("\/", " ", $arraySDR);
//$arraySDR = str_replace("/\//", " ", $arraySDR);
$arraySDR = ltrim($arraySDR, "/\s+/"); //sdr  chk view_Unpaid_inv_by_cust2bAT.php
$arraySDRcut = mb_substr($arraySDR, 0, 15); //eg INVESTECPBS Bra
//  \s matches any whitespace character.
//$arraySDR=substr($arraySDR, 0, strrpos($arraySDR, ' ')); //remove all after space presumably
echo "<br>arraySDR: ".$arraySDR;
$arraySDRcut2 = str_replace("ABSA BANK","",$arraySDRcut);
$arraySDRcut2 = preg_replace('/\s+/', '', $arraySDRcut2);//remove whitespace
echo "<br>arraySDRcut2: >".$arraySDRcut2."< ";

?>
arraySDR<input type="text" id="SDR"  name="SDR" value="<?php echo $arraySDR;?>">
<?php
echo "<br>A2: ".$array[2];
echo "<br>A3: <b>R".$array[3]."</b><br> ";

$TransDate = $array[0];
$inin = $array[1]; //SDR
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

$ininA = $inin[0]; //SDR
$ininB = $array[1]; //SDR


$cred = $array[2];
$paid = $array[3];

$words = str_replace("ABSA BANK","",$words);
$words = str_replace("ABSABANK","",$words);
$words = trim($words); //removes whitespace at beginning and end
$arraySDRcut = trim($arraySDRcut);
$ininV = trim($ininV);

	$queryC = "select CustNo from invoice where SDR LIKE '%$arraySDRcut2%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$words%'  UNION ALL select CustNo from invoice where SDR LIKE '%$words%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$words%'  UNION ALL  select CustNo from invoice where SDR LIKE '%$ininV%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$arraySDRcut%'   ";
//echo $queryC;
echo "queryC: ";
echo mb_substr($queryC, 0, 150);
echo "<br>".mb_substr($queryC,  150);
echo "<br>";
$CCCCC = '';
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
//echo " <br><br>rows: $row_cnt"; //not ttested yet
$CCCCC = $row["CustNo"];

}
mysqli_free_result($resultC);
}
if (@$row_cnt > 1)
	echo "<br><font size = 4><b>ERROR MORE THAN 1 USER FOUND:$row_cnt rows. CustNO:$CCCCC!!<br></font></b><br>";

if ($CCCCC == '')
{
$arraySDRcut = mb_substr($arraySDR, 0, 7);
	$query2 = "select CustNo from invoice where SDR LIKE '%$words%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$words%'  UNION ALL  select CustNo from invoice where SDR LIKE '%$ininV%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$arraySDRcut%'   ";
echo "<br>query2: ";//echo $query2;
echo mb_substr($query2, 0, 150);
echo "<br>".mb_substr($query2,  150);
echo "<br>";
if ($res2 = mysqli_query($DBConnect, $query2)) {

while ($row = mysqli_fetch_assoc($res2)) {
echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($res2);
echo " <br><br>rows: $row_cnt"; //not ttested yet
$CCCCC = $row["CustNo"];
if ($row_cnt > 1)
	echo "<font size = 4><b>ERROR MORE THAN 1 USER FOUND QUERY2: $CCCCC!!!!!</font></b><br>";

}
mysqli_free_result($res2);
}

}
?>
