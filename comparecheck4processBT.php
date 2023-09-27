<html>
<head>
<title>compare </title>
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<b><font size = "4" type="arial">OK, so I determined that the comparison code will be too complex<br>
and that i should use the Compare funtion of Notepad++</b></font><br>

<form name="Adddata"   action="comparecheck4processBTv3.php" method="post">
<div>
<b><font size = "4" type="arial">Compare</b></font>
<br/>.php loads comparecheck4processBT.php<br/>
<br>
<?php
$txtArea = $_POST['txtArea']; 
$txtArea2 = $_POST['txtArea2']; 
//count rows
$array = preg_split ('/$\R?^/m', $txtArea);
$array2 = preg_split ('/$\R?^/m', $txtArea2);
$Cnt = (count($array));
echo "Count: ".$Cnt;
$Cnt2 = (count($array2));
echo "<br>Count: ".$Cnt2;

//depending on how many rows are in the txtArea:
echo "<br>A0: ".$array[0];
echo "<br>A1: ".$array[1];
echo "<br>A2: ".@$array[2];
echo "<br>A3: ".@$array[3];



/*$row_data1   = $array[0];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_data1);
echo "csvdATA1: ".$row_data1."<br><br>";
echo "LA0: ".@$LA[0]."<br><br>";
echo "LA1: ".@$LA[1]."<br><br>";
echo "LA2: ".@$LA[2]."<br>";
/*
//if ($LA[2] == "")
//	echo "<b><font color = red>ERROR: field data missing maybe a tab too many</b></font><br>";
echo "LA3: ".@$LA[3]."<br>";
*/echo "<br><br>OK, so we cleared Carried forward and blank lines:<br>";
//echo "LA4: ".@$LA[4]."<br>";
//echo "LA5: ".@$LA[5]."<br>";
//echo "<br><br>";

$NewDate = 'newdate';


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
?>
<table>
  <tr>
    <td>
<textarea  id='txtArea' name='txtArea' rows='20' cols='85'>
<?php
for ($x = 0; $x < ($Cnt); $x++) {
$row_dataA   = $array[$x];
//echo "row_dataA: ".$row_dataA."<br>";
$LA13 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA);
//echo "LA13: ".@$LA13[0]."\n";
$SDR = '';
$SDR = @$LA13[1];
//$SDR = mb_substr($SDR, 0, 5);
$Date1 = @$LA13[0];
$Exp = @$LA13[2];
$income = @$LA13[3];
$accum =  @$LA13[4];
//check date format 	
//if format 01-mar-08 then change to 2008-03-01


//echo $Date1;


if ((strlen($Date1) == 9) && 
 (strpos($Date1, '-') !== false))
 {
	//echo "\nDate format is 01-mar-08\n";
	
	$pieces = explode("-", $Date1);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2
/*if ($pieces[1] == '01')
	$month = 'Jan';
else if ($pieces[1] == '02')
	$month = 'Feb';
else if ($pieces[1] == '03')
	$month = 'Mar';
else if ($pieces[1] == '04')
	$month = 'Apr';
else if ($pieces[1] == '05')
	$month = 'May';
else if ($pieces[1] == '06')
	$month = 'Jun';
else if ($pieces[1] == '07')
	$month = 'Jul';
else if ($pieces[1] == '08')
	$month = 'Aug';
else if ($pieces[1] == '09')
	$month = 'Sep';
else if ($pieces[1] == '10')
	$month = 'Oct';
else if ($pieces[1] == '11')
	$month = 'Nov';
else if ($pieces[1] == '12')
	$month = 'Dec';
*/
if ($pieces[1] == 'Jan')
	$month = '01';
else if ($pieces[1] == 'Feb')
	$month = '02';
else if ($pieces[1] == 'Mar')
	$month = '03';
else if ($pieces[1] == 'Apr')
	$month = '04';
else if ($pieces[1] == 'May')
	$month = '05';
else if ($pieces[1] == 'Jun')
	$month = '06';
else if ($pieces[1] == 'Jul')
	$month = '07';
else if ($pieces[1] == 'Aug')
	$month = '08';
else if ($pieces[1] == 'Sep')
	$month = '09';
else if ($pieces[1] == 'Oct')
	$month = '10';
else if ($pieces[1] == 'Nov')
	$month = '11';
else if ($pieces[1] == 'Dec')
	$month = '12';
$NewDate = $pieces[2].'-'.$month.'-'.$pieces[0]; 
$row_dataA = "20".$NewDate."\t".$SDR."\t".$Exp."\t".$income;

 }
 else if
 ((strlen($Date1) == 10) && 
 (strpos($Date1, '-') !== false))
 {
	//echo "\nDate format is 2008-01-04\n";
	$NewDate = $Date1;
 }



if (@$SDR == "")
echo "";
 else 
if (@$SDR == "BROUG")
	echo "";
else
if (@$SDR == "BROUGHT FORWARD")
	echo "";
 else 
if (@$SDR == "BROUGHT FORWARD BALANCE")
	echo "";
 else 
if (@$SDR == "PROVI") 
	echo "";
 else 
if (@$SDR == "PROVISIONAL STATEMENT") 
	echo "";
    //echo "carried\n";
 else 
if (@$SDR  == "CARRI") 
	echo "";
 else 
if (@$SDR  == "CARRIED FORWARD") 
	echo "";
    //echo "carried\n";
 else 
if (@$SDR  == "CARRIED FORWARD BALANCE") 
	echo "";
    //echo "carried\n";
 else 
if (@$SDR == "") 
	echo "";
    //echo "blank\n";
 else 
   echo "$row_dataA\n";
}
?>
</textarea>
</td>
    <td><textarea id="txtArea2" name="txtArea2" rows="20" cols="85">
<?php

for ($x2 = 0; $x2 < ($Cnt2); $x2++) {
$row_dataA2   = $array2[$x2];
//echo "row_dataA: ".$row_dataA."<br>";
$LA132 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA2);
//echo "LA132: ".@$LA132[0]."\n";

if (@$LA132[1] == "")
	//echo "empty line /n\n";
echo "";
//    echo "brought\n"; echo "";
 else 
if (@$LA132[1] == "BROUGHT FORWARD")
	echo "";
//    echo "brought\n"; echo "";
 else 
if (@$LA132[1] == "PROVISIONAL STATEMENT") 
	echo "";
    //echo "carried\n";
 else 
if (@$LA132[1] == "CARRIED FORWARD") 
	echo "";
    //echo "carried\n";
 else 
if (@$LA132[1] == "") 
	echo "";
    //echo "blank\n";
 else 
   echo "$row_dataA2\n";
}
?>




</textarea></td>
  </tr>
</table>


<br>
<input type="submit" value="Test bank acc ie. launch BTv3">
<br><br><br>






</body>
</html>