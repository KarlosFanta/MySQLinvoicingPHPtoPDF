

<?php

// So here we search the string for numbers and put them into a (multidimensional) array Then we check if the array has a relevant invoice number.
echo "<br>chkinv1.php ";


//$arraySDR = "333 sdvnln 22 fkl6 bn55 35 16844";
echo "arraySDR: ".$arraySDR."<br>";

 
/*$isThereNumber = false;
for ($i = 0; $i < strlen($arraySDR); $i++) {
    if ( ctype_digit($arraySDR[$i]) ) {
        $isThereNumber = true;
        break;
    }
}
 
if ( $isThereNumber ) {
    echo "\"{$arraySDR}\" has number(s).";
} else {
    echo "\"{$arraySDR}\" does not have number(s).";
}*/
 
//preg_match_all('/(\d+) +(\D*[^\s\d])/', $arraySDR, $mmmm);
//preg_match_all('/(\d+) +(\D*[^\s\d])/', $arraySDR, $mmmm);
preg_match_all('!\d+!', $arraySDR, $mmmm);
/*
//$resultM = array_combine($mmmm[1], $mmmm[2]);
//resultAM0 = array($mmmm);

//echo "<br>resultM:<br>";

//print_r($resultM);
echo "<br><br>mmmm print_r:<br>";
//print_r($mmmm); //now we have all the numbers occuring in the string.
echo print_r($mmmm);
echo "<br><br>";
//echo var_dump($mmmm);
echo "<br><br>";


echo "<br>here goes: <br><br>";

echo '<table border="1">';
echo '<tr><th>Movies</th><th>Genre</th><th>Director</th></tr>';
*/

foreach( $mmmm as $movie )
{
    //echo '<tr>';
    foreach( $movie as $key )
    {
        //echo '<td>'.$key.'</td>';
		
		
$queryinvC = "select CustNo, Summary, InvDate from invoice where InvNo = '$key'";
//echo $queryinvC;
//$CCCCC = '';
if ($resultI4 = mysqli_query($DBConnect, $queryinvC)) {

while ($rowI4 = mysqli_fetch_assoc($resultI4)) {
echo "".$rowI4["CustNo"]."";
$CCCCI4 = $rowI4["CustNo"];
$InvDate = $rowI4["InvDate"];


$queryCg = "select * from customer where CustNo = $CCCCI4";
//echo $queryCg;
if ($resultCg = mysqli_query($DBConnect, $queryCg)) {
while ($rowg = mysqli_fetch_assoc($resultCg)) {
$CNFN = $rowg["CustFN"];
$CNLN = $rowg["CustLN"];

}
mysqli_free_result($resultCg);
}



echo "CCCCC: <a href= 'addTrans.php?CustNo=$CCCCI4&InvDate=$InvDate&SDR=$arraySDR&TransDate=$TransDate&AmtPaid=$AA' target = '_blank'>CustNo $CCCCC $CNLN	$CNFN</a> ".$CCCCI4." for InvNo<b>$key</b><br>";
echo "T<br>";

}
mysqli_free_result($resultI4);
}
else echo "Inv Numberrr not found, look at last 2 digits, maybe customer created next invoice.";


}}
if (@$CCCCI4 == '')
	echo "Inv Number not found, look at last 2 digits, maybe customer created next invoice.";

/*		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    }
    echo '</tr>';
}
echo '</table>';



foreach ($mmmm as $food_array) {
    echo '<tr>';
    foreach ($food_array as $key1 => $value1) {
        echo '<td>' . $value1[0] . '</td>';    
    }
    echo '<tr>';
}


echo "<br>here goes2: <br><br>";

$data = array(
    "abc"=>array(
            "label" => "abc",
            "value" => "def",
            "type" => "ghi",
            "desc" => "jkl",
            ),
    "def"=>array(
            "label" => "mno",
            "value" => "qrs",
            "type" => "tuv",
            "desc" => "wxyz",
            ),
    );

$matches = array();
$pattern = "/a/i";  //contains an 'a'
//loop through the data
foreach($data as $key=>$value){
    //loop through each key under data sub array
    foreach($value as $key2=>$value2){
        //check for match.
        if(preg_match($pattern, $value2)){
            //add to matches array.
            $matches[$key]=$value;
            //match found, so break from foreach
            break;
        }
    }
}
echo '<pre>'.print_r($matches, true).'</pre>';


echo "<br><br>end of here goes <br><br>";



foreach ($mmmm[0] as $match) { // use first array item to loop through since the mmmm are in its sub-array
    echo "Number = " . $match[0] . " | Offset = " . $match[0] . "\r\n<br>";
}




$AmtofNumbers = count($mmmm);

//now we need all the invoice numbers of the database.
for ($x = 0; $x <= $AmtofNumbers; $x++) {
  echo "The number is: $x <br>";




$tt = $mmmm[0];
echo "tt: ".$tt."<br>";
	$queryinvC = "select CustNo, Summary, invDate from invoice where InvNo = '$tt'";
echo $queryinvC;
//$CCCCC = '';
if ($resultI4 = mysqli_query($DBConnect, $queryinvC)) {

while ($rowI4 = mysqli_fetch_assoc($resultI4)) {
echo "".$rowI4["CustNo"]."";
$CCCCI4 = $rowI4["CustNo"];
echo "CCCCC: <a href= 'addTrans.php?CustNo=$CCCCC&AmtPaid=$AA&TransDate=$TransDate' target = '_blank'>CustNo $CCCCC $CNLN	$CNFN</a> ".$CCCCI4."<br>";

}
mysqli_free_result($resultC);
}
$cntI4 = mysqli_num_rows($resultI4);
//echo "CCCCC: ".$CCCCC."<br>";

}

















echo "<br><br><br><br><br><br><br>";

$resultAM1 = array($mmmm[0]);

//echo "<br>resultM:<br>";

//print_r($resultM);
echo "<br><br>resultAM1:<br>";
print_r($resultAM1);

echo "<br><br><br><br><br><br><br>";



//$resultAM2 = array($mmmm[0,1]);

//echo "<br>resultM:<br>";

//print_r($resultM);
echo "<br><br>resultAM2:<br>";
print_r($resultAM2);

echo "<br><br><br><br><br><br><br>";



//echo "<br><br>";
//echo "<br>MA21: ".$matches[2][2]; //date
$M0 = @$matches[0][0];
$M1 = 9999999999;
$M2 = 9999999999;
@$M1 = $matches[0][1];
@$M2 = $matches[0][2];
if ($M0 == '')
$M0 = 9999999999;
if ($M1 == '')
$M1 = 9999999999;
if ($M2 == '');
$M2 = 9999999999;

?>
<input type="hidden" id="InvNo"  name="InvNo" value="<?php echo $M0;?>">
<?php
//echo "<br>A2: ".$array[2];
//echo "<br>A3: <b>R".$array[3]."</b><br> ";

//$TransDate = $array[0];
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
//echo "queryC: ".$queryC."<br>";
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
$CCCCC = @$row["CustNo"];
echo "CCCCC: <a href= 'addTrans.php?CustNo=$CCCCC&AmtPaid=$AA&TransDate=$TransDate' target = '_blank'>CustNo $CCCCC $CNLN	$CNFN</a> ".$CCCCC."<br>";

}
mysqli_free_result($resultC);
}
//echo "CCCCC: ".$CCCCC."<br>";


if (@$row_cnt > 1)
	echo "<br><font size = 4><b>chkinv.php ERROR MORE THAN 1 USER FOUND chkInv.php:$row_cnt rows. CustNO:$CCCCC!!<br></font></b><br>"; 


*/
?>