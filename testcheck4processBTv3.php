
<html>
<head><title>
testCheckbank acc
</title>
<?php
header("Content-type: text/html; charset=UTF-8");
?>
<head>
<meta charset="utf-8">
</head>
<body>
(if you are getting the error: Notice: Undefined offset: 1
Then your input does not contain tabs. Copy from Excel instead. )
<?php

$CustNo = '';
$EDate = '';
$txtArea ='';
$Priority = '_';
$Destination = '_';

$txtArea = $_POST['txtArea'];


//$TA = $_POST['txtArea']; //ok, so this one bypassed the string replacements.- let's see if it works now


$array = preg_split ('/$\R?^/m', $txtArea);
$Cnt = (count($array));
echo "Count: ".$Cnt;

//depending on how many rows are in the txtArea:
echo "<br>A0: ".$array[0];
echo "<br>A1: ".$array[1];
//echo "<br>A2: ".@$array[2];
//echo "<br>A3: ".@$array[3];



$row_data1   = $array[0];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_data1);
//echo "csvdATA1: ".$row_data1."<br><br>";
//echo "LA0: ".$LA[0]."<br><br>";
//echo "LA1: ".$LA[1]."<br><br>";
//echo "LA2: ".$LA[2]."<br>";
if ($LA[2] == "")
	echo "<b><font color = red>ERROR: field data missing maybe a tab too many</b></font><br>";
echo "LA3: ".$LA[3]."<br>";
if ($LA[3] == "")
	echo "<b><font color = red>ERROR: field data missing maybe a tab too many</b></font><br>";

//echo "LA4: ".@$LA[4]."<br>";
//echo "LA5: ".@$LA[5]."<br>";
//echo "<br><br>";



$row_data2   = $array[1];
//echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA2 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_data2);
/*echo "csvdATA2: ".$row_data2."<br><br>";
echo "LA20: ".$LA2[0]."<br><br>";
echo "LA21: ".$LA2[1]."<br><br>";
echo "LA22: ".$LA2[2]."<br>";
echo "LA23: ".$LA2[3]."<br>";

echo "<br><br>";
*/

for ($x = 0; $x < ($Cnt-2); $x++) {


$row_dataA   = $array[$x];
$row_dataB   = $array[$x+1];
echo "row_dataA: ".$row_dataA."<br>";
//echo "row_dataB: ".$row_dataB."<br><br>";

$LA13 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA);
$LA14 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataB);

//echo "LA14: ".$LA14[0]."<br><br>";
//echo "LA14: ".$LA14[1]."<br><br>";
//echo "LA14: ".$LA14[2]."<br><br>";
///echo "LA13: ".$LA13[0]."<br><br>";
//echo "LA13: ".$LA13[1]."<br><br>";
//echo "LA13: ".$LA13[2]."<br><br>";
/*echo "LA14_0: ".$LA14[0]."<br><br>";
echo "LA14_1: ".@$LA14[1]."<br><br>";
echo "LA14_2: ".@$LA14[2]."<br>";
echo "LA14_3: ".$LA14[3]."<br>";
*/
//echo "<br><br>";
$a = $LA13[3];
$b = $LA14[2];
@$SS = $a+$b;
echo "<br>LA13[3]: ".$LA13[3]." PLUS LA14[2]: ".$LA14[2]." GIVES YOU: ".$SS."<br>";
//echo "LA14[2]: ".$LA14[2]."<br>";
//echo "LA14[3]: ".$LA14[3]."<br>";

if (@number_format($LA14[3], 2) == number_format($SS, 2)) 
    echo "<b><font color = green>YES :-) the numbers $LA14[3]: ".$LA14[3]." and ".$SS." add up<br></b></font>";
 else 
    echo "<b><font color = red>Error! the numbers $LA14[3]: ".$LA14[3]." and ".$SS." don't add up<br></b></font>";

}

echo "row_dataB: ".$row_dataB."<br>";





?>
</body>
</html>

