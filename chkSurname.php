<?php

//echo "<br>chkSurnmame3: ".$array[1]."<br>"; //sdr  

preg_match_all('/(\d{1,})/', $arraySDR, $matches); //extract exact 0 digit numbers or greater from a given string
$M1 = $array[1];
$M1 = strtr($M1, array(' ' => ' ', ',' => ' ')); //replace kommas with spaces
$M1 = trim(preg_replace('/\t+/', ' ', $M1));  //replace tabs

$array_2 = explode(' ', $M1);
$array_2 = array_map('strtolower', $array_2);
echo "<br>";
/*print_r($array_2);
foreach($array_2 as $my){
    echo $my.'<br>';  
}
echo "<br>";

echo ">".$M1."<";

$data   = preg_split('/\s+/', $M1);
echo "<br><br>";
echo ">".$data[0]."<";
echo ">".$data[1]."<";
echo ">".$data[2]."<";
*/
	$queryC = "select CustNo, CustLN, CustFN from customer";
//echo $queryC."<br>";




/*

if($res = $DBConnect->query($queryC)) {
    $ret = [];
    while($row = $res->fetch_assoc()) {
       $ret[] = $row;
    }

    print_r($ret);

 } else {
      echo $DBConnect->error;
 }

echo "end<br>";
foreach ($ret as $row) {
    echo "Id: {$row[id]}<br />"
       . "Name: {$row[name]}<br />"
       . "Code: {$row[code]}<br /><br />";
}
print_r($myArray);
echo "end<br>";
*/








//echo "<br>";

$CustNo = '';
$CustLN = '';
$CustLN2 = '';
$CustLNsearch = '';
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
//echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
//echo " <br><br>rows: $row_cnt"; //not ttested yet
$CustNo = $row["CustNo"];
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustLN = strtolower($CustLN);
$CustLN = strtr($CustLN, array('.' => '', ',' => ''));

$CustLNarray =  explode("_", $CustLN);
//put all surnames into one long string for searching
//$COUNTresult = count($CustLNarray);
foreach ($CustLNarray as $item) {
    //echo "<li>$item</li>";
//$CustLNsearch .= ' '.$item;
	//compare item to 


foreach ($array_2 as $item2) {


if ($item2 == $item)
{
	//echo "we have a match: $item";
	$CCCCC = $row["CustNo"];
	
}
//else
//	echo " no match: $item vs $item2<br>";

}
	
	
}
	
}
mysqli_free_result($resultC);
}




	echo "<b>Maybe: </b><a href= 'addTrans.php?CustNo=$CCCCC&AmtPaid=$AA&TransDate=$TransDate&SDR=$arraySDR' target = '_blank'>CustNo $CCCCC $CustLN	$CustFN</a> ".$CCCCC."<br></font></b><br>"; 










//echo "<br>CustLNsearch:";
//echo $CustLNsearch;
//$array_1 = explode(" ", $CustLNsearch);
//$array_2 = explode(" ", $str2);
//$differenceCount = count(array_diff($array_1, $array_2));
//echo "<br>".$differenceCount."<br>";
//$differentPercent = $differenceCount / ($totalWords / 100);
/*foreach ($userinfo as $user) {
    echo "Id: {$user[id]}<br />"
       . "Name: {$user[name]}<br />"
       . "Code: {$user[code]}<br /><br />";
}
print_r($myArray);
echo "end<br>";

echo implode(',',$array);
echo "end<br>";



$arraySDR = ltrim($arraySDR, "/\s+/"); //sdr  chk view_Unpaid_inv_by_cust2bAT.php
$arraySDRcut = mb_substr($arraySDR, 0, 15); //eg INVESTECPBS Bra
//  \s matches any whitespace character.
//$arraySDR=substr($arraySDR, 0, strrpos($arraySDR, ' ')); //remove all after space presumably
//echo "<br>arraySDR: ".$arraySDR;
$arraySDRcut2 = str_replace("ABSA BANK","",$arraySDRcut);
$arraySDRcut2 = preg_replace('/\s+/', '', $arraySDRcut2);//remove whitespace
//echo "<br>arraySDRcut2: >".$arraySDRcut2."< ";

//echo "<br>A2: ".$array[2];
//echo "<br>A3: <b>R".$array[3]."</b><br> ";

//$TransDate = $array[0];
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
//echo "queryC: ";
//echo mb_substr($queryC, 0, 150);
//echo "<br>".mb_substr($queryC,  150);
//echo "<br>";
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
	echo "<br><font size = 2><b> MORE THAN 1 USER FOUND:$row_cnt rows. CustNO:$CCCCC!<br></font></b><br>"; 

if ($CCCCC == '')
{
$arraySDRcut = mb_substr($arraySDR, 0, 7);
	$query2 = "select CustNo from invoice where SDR LIKE '%$words%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$words%'  UNION ALL  select CustNo from invoice where SDR LIKE '%$ininV%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$arraySDRcut%'   ";
//echo "<br>query2: ";//echo $query2;
//echo mb_substr($query2, 0, 150);
//echo "<br>".mb_substr($query2,  150);
//echo "<br>";
if ($res2 = mysqli_query($DBConnect, $query2)) {

while ($row = mysqli_fetch_assoc($res2)) {
echo "".$row["CustNo"]."";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($res2);
echo " <br>rowschkSDR: $row_cnt"; //not ttested yet
$CCCCC = $row["CustNo"];
if ($row_cnt > 1)
{

$queryCC = "select CustFN, CustLN from customer where CustNo = $CCCCC ";
if ($resultCC = mysqli_query($DBConnect, $queryCC)) {
while ($row = mysqli_fetch_assoc($resultCC)) {
$CNFN = $row["CustFN"];
$CNLN = $row["CustLN"];
$row_cnt = mysqli_num_rows($resultCC);
}
mysqli_free_result($resultCC);
}



	echo "<font size = 4><b>ERROR MORE THAN 1 CustNo FOUND QUERY2 chkSDR.php:
<br><a href= 'addTrans.php?CustNo=$CCCCC' target = '_blank'> $CCCCC $CNFN $CNLN </a>
!!!!!</font></b><br>"; 
}


}
mysqli_free_result($res2);
}

}

*/
?>