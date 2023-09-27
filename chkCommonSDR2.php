<?php
//How to find words in no-space string with PHP
//first, we need to delete all the spaces from the string
$SDRnospaces = str_replace(" ", "", $arraySDR);; //sdr  chk view_Unpaid_inv_by_cust2bAT.php
$SDRnospaces = strtolower($SDRnospaces);
$SDR2ndhalf = substr($SDRnospaces, -3);



//load all CommonSDRs into an array:
$query = "Select CustNo, CustLN, CustFN from customer where CommonSDR LIKE '%$SDR2ndhalf%'";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$CustNo = $row["CustNo"];//case sensitive!
	$CustLN =  $row["CustLN"];//case sensitive!
	$CustFN = $row["CustFN"];//case sensitive!

echo "<br><a href= 'addTrans.php?CustNo=$CustNo&AmtPaid=$AA&TransDate=$TransDate&SDR=$arraySDR' target = '_blank'>CustNo $CustNo $CustFN	$CustLN</a> ".$CustNo."<br>";




	}
	mysqli_free_result($result);
}



?>