
<?php


echo "<br><br>";
//echo "<br>MA21: ".$matches[2][2]; //date
$M0 = @$matches[0][0];
$M1 = 9999999999;
$M2 = 9999999999;
@$M1 = $matches[0][1];
@$M2 = $matches[0][2];
if ($M1 == '')
$M1 = 9999999999;
if ($M2 == '');
$M2 = 9999999999;

?>
M0<input type="text" id="InvNo"  name="InvNo" value="<?php echo $M0;?>">
<?php
echo "<br>A2: ".$array[2];
echo "<br>A3: <b>R".$array[3]."</b><br> ";

$TransDate = $array[0];
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

$ininA = $inin[0]; //InvNo
$ininB = $array[1]; //InvNo


$cred = $array[2];
$paid = $array[3];


$words = str_replace("ABSA BANK","",$words);
$words = str_replace("ABSABANK","",$words);
$words = trim($words); //removes whitespace at beginning and end
//$M0cut = trim($M0cut); 
$ininV = trim($ininV); 


	$queryC = "select CustNo from invoice where InvNo = $M0  UNION ALL  select CustNo from invoice where InvNo = $M1  UNION ALL select CustNo from invoice where InvNo = $M2 ";
//echo $queryC;
echo "queryC: ".$queryC;
//echo mb_substr($queryC, 0, 150);
//echo "<br>".mb_substr($queryC,  150);
echo "<br>";
$CCCCC = '';
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
//echo " <br><br>rows: $row_cnt"; //not ttested yet
$CCCCC = @$row["CustNo"];
echo "CCCCC: ".$CCCCC."<br>";

}
mysqli_free_result($resultC);
}
echo "CCCCC: ".$CCCCC."<br>";


if (@$row_cnt > 1)
	echo "<br><font size = 4><b>ERROR MORE THAN 1 USER FOUND:$row_cnt rows. CustNO:$CCCCC!!<br></font></b><br>"; 


