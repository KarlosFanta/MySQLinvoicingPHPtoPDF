
<?php
echo "<br>A3: ".$array[3]."<br>"; //sdr  chk view_Unpaid_inv_by_cust2bAT.php

preg_match_all('/(\d{1,})/', $arraySDR, $matches); //extract exact 0 digit numbers or greater from a given string
$M0 = $array[3];
$M0 = strtr($M0, array(' ' => '', ',' => '')); //remove kommas
$M0 = trim(preg_replace('/\t+/', '', $M0));  //remove tabs


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
	//error! no CustFN in invoice table

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
	echo "
	
	 <a href= 'addTrans.php?CustNo=$CCCCC&AmtPaid=$AA&TransDate=$TransDate' target = '_blank'>CustNo $CCCCC $CNLN	$CNFN</a> ".$CCCCC."<br>

	
	<a href= 'addTrans.php?CustNo=$CCCCC' target = '_blank'> $CCCCC $CNFN $CNLN </a>
</font></b><br>"; 

}
mysqli_free_result($resultC);
}
//echo "CCCCC: ".$CCCCC."<br>";


if (@$row_cnt > 1)
	echo "<br><font size = 2><b>MORE THAN 1 invoices FOUND chkAmtPd.php:$row_cnt rows. CustNO:$CCCCC!!<br></font></b><br>"; 


