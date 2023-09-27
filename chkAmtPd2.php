
<?php
echo "<br>chkAmtPd2 AmtPd: ".$AA."<br>"; //sdr  chk view_Unpaid_inv_by_cust2bAT.php


$query = "select * from invoice order by InvNo desc";
echo $query."<br>";


if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$CustNo = $row["CustNo"];
	$InvNo =  $row["InvNo"];
	$TotAmt =  $row["TotAmt"];
//	print "_".$CustNo;
	//print "_".$InvNo;
	//print "_".$TotAmt." ";
	
	if ($AA == $TotAmt)
	echo "CustNo found: $CustNo InvNO:  $InvNo  TotAmt: $TotAmt <a href= 'addTrans.php?AmtPaid=$AA&DA=$TransDate&CustNo=$CustNo&SDR=$arraySDR'>click here.</a></font><br>";

/*//removal of cents:
$AAnoCent = explode('.',$AA);
return $AAnoCent[0];
$TotAmtnoCent = explode('.',$TotAmt);

	if ($AAnoCent[0] == $TotAmtnoCent[0])
	echo "CustNo found: $CustNo InvNO:  $InvNo  TotAmt: $TotAmt nocent: $AAnoCent[0]<br>";

//removal of VAT:

*/

$AAnoCent = explode('.',$AA);
//return $AAnoCent[0];
$TotAmtnoCent = explode('.',$TotAmt);

	if ($AAnoCent[0] == $TotAmtnoCent[0])
	echo "CustNo found: $CustNo InvNO:  $InvNo  TotAmt: $TotAmt nocent: $AAnoCent[0]<br>";

//removal of VAT:
// never mind

	}
	mysqli_free_result($result);
}



preg_match_all('/(\d{1,})/', $arraySDR, $matches); //extract exact 0 digit numbers or greater from a given string


/*

$M0 = 9999999999;
$M1 = 9999999999;
$M2 = 9999999999;
$M0 = @$matches[0][0];
@$M1 = $matches[0][1];
@$M2 = $matches[0][2];
if ($M0 == '')
$M0 = 9999999999;
if ($M1 == '')
$M1 = 9999999999;
if ($M2 == '');
$M2 = 9999999999;
echo "<br>chkAmtPd.php  Miiiii: ".$M0."<br>";
echo "<br>chkAmtPd.php  nnnn: ".$M0."<br>";
echo "chkAmtPd.php Miiiii: ".$M0."<br>";
//if ($M0 > 0)&& ($M0 < 9999999999)
if ($M0 > 0 && ($M0 < 9999999999))
$CCCCC = $M0 ;
//echo "CCCCC: ".$CCCCC."<br>";


//echo "<br>A2: ".$array[2];
//echo "<br>A3: <b>R".$array[3]."</b><br> ";

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
*/


	$queryA = "select CustNo, CustFN, CustLN from invoice where CAST(TotAmt AS DECIMAL) = CAST('$M0' AS DECIMAL) ORDER BY `InvNo` DESC";

//echo $queryA;
//echo "chkAmtPd.php  queryA: ".$queryA."<br>"; //VERY IMPORTANT
//echo mb_substr($queryA, 0, 150);
//echo "<br>".mb_substr($queryA,  150);
//echo "<br>";
$CCCCC = '';
if ($resultC = mysqli_query($DBConnect, $queryA)) {

while ($row = mysqli_fetch_assoc($resultC)) {
echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
//echo " <br><br>rows: $row_cnt"; //not ttested yet
$CCCCC = @$row["CustNo"];
$CNFN = $row["CustFN"];
$CNLN = $row["CustLN"];

echo "CCCCC: ".$CCCCC."<br>";
	echo "<a href= 'addTrans.php?CustNo=$CCCCC' target = '_blank'> $CCCCC $CNFN $CNLN </a>
</font></b><br>"; 

}
mysqli_free_result($resultC);
}
//echo "CCCCC: ".$CCCCC."<br>";


if (@$row_cnt > 1)
	echo "<br><font size = 4><b>ERROR MORE THAN 1 invoices FOUND chkAmtPd.php:$row_cnt rows. CustNO:$CCCCC!!<br></font></b><br>"; 


