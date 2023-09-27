<?php


/*

if (preg_match("/\b$searchitem\b/", $str)) {
    echo "<br><br>fOUND<br>";
}
*/

echo "<br>chkSurnameNoSPAcesss: ";
//echo $array[1];
echo "<br>"; //sdr  

preg_match_all('/(\d{1,})/', $arraySDR, $matches); //extract exact 0 digit numbers or greater from a given string
$M1 = $array[1];
$M1 = strtolower($M1);
$M1 = strtr($M1, array(' ' => ' ', ',' => ' ')); //replace kommas with spaces
$M1 = trim(preg_replace('/\t+/', ' ', $M1));  //replace tabs




$array_2 = explode(' ', $M1);
$array_2 = array_map('strtolower', $array_2);
echo "<br>";

	$queryCu = "select CustLN from customer"; //maybe loading CustNos and surnames into array
echo "queryCu";
$CustNo = '';
$CustLN = '';
$CustLN2 = '';
$CustLNsearch = '';


if ($resultCu = mysqli_query($DBConnect, $queryCu)) {
	while ($rowu = mysqli_fetch_assoc($resultCu)) {


//echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultCu);
//echo " <br><br>rows: $row_cnt"; //not ttested yet
//$CustNo = $rowu["CustNo"];
$CustLN = $rowu["CustLN"];
$CustLN = strtolower($CustLN);
$CustLNa = strtr($CustLN, array('.' => '', ',' => ''));

$CustLNarray =  explode("_", $CustLNa);
//put all surnames into one long string for searching
//$COUNTresult = count($CustLNarray);


foreach ($CustLNarray as $searchitem)
{
    //echo "<li>$searchitem</li>";
//$CustLNsearch .= ' '.$searchitem;
	//compare searchitem to 

//echo "<br>";
//echo "yyyyy";
if ($searchitem != '')
{
$qD = "select * from customer where CustLN = $searchitem";
echo $qD."<br>";
$row_cnt = 0;
if ($resultC = mysqli_query($DBConnect, $qD)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>Nor</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
	
echo "<tr>";

//echo "<th>numrws:".mysqli_num_rows($resultC)."</th>";
echo "<th><a href= ".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th><a href = 'addTrans.php?DA=$TransDate&AmtPaid=$AA&CustNo=$CCCCC&SDR=$arraySDR'>$CCCCC</a>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
//echo "<th><a href = 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate&CustNo=$CCCCC'>$CCCCC</a>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo "</tr>\n";

}
}
}									 

if (strlen($searchitem) < 3)
$searchitem = $searchitem.'<b>waytooshort</b>';
	
@$pos = strpos($M1, $searchitem);

if ($pos === false) {
    //echo "<font color = red>'$searchitem' not found in  '$M1'.<br></font>";
} else {
    echo "<font color = green><b>'$searchitem' was found in '$M1' <a href = 'addTrans.php?DA=$TransDate&AmtPaid=$AA&CustNo=$CCCCC&SDR=$arraySDR'>$CCCCC</a></b>";
		$CCCCC = $row["CustNo"];

}
}


$CustLN = mb_substr($CustLN, 0, 5); //sometimes we have HILDEBR
$CustLNb = strtr($CustLN, array('.' => '', ',' => ''));
$CustLNarray =  explode("_", $CustLNb);
//put all surnames into one long string for searching
//$COUNTresult = count($CustLNarray);
foreach ($CustLNarray as $searchitem)
{
    //echo "<li>$searchitem</li>";
//$CustLNsearch .= ' '.$searchitem;
	//compare searchitem to 

if (strlen($searchitem) < 3)
$searchitem = $searchitem.'<b>waytooshort</b>';
	
@$pos = strpos($M1, $searchitem);

if ($pos === false) {
    //echo "<font color = red>'$searchitem' not found in SHORT '$M1'.<br></font>";
} else {
    echo "<font color = green><b>'$searchitem' was found in chkSurnameNoSpaces SHORT '$M1'</b>";
		$CCCCC = $row["CustNo"];
		
		


		
$qD = "select * from customer where CustNo = $CCCCC";
echo $qD;
$row_cnt = 0;
if ($resultC = mysqli_query($DBConnect, $qD)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th><a href= ".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th><a href = 'addTrans.php?DA=$TransDate&AmtPaid=$AA&CustNo=$CCCCC&SDR=$arraySDR'>$CCCCC</a>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
//echo "<th><a href = 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate&CustNo=$CCCCC'>$CCCCC</a>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo "</tr>\n";

}
}

}
}

	
}
mysqli_free_result($resultCu);
}
if ($CCCCC == '329')
	$CCCCC = '76'; // hildebrand home to work
?>