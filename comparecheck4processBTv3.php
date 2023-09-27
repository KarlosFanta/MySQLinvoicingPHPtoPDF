
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
<b><font size = "4" type="arial">OK, so I determined that the comparison code will be too complex<br>
and that i should use the Compare funtion of Notepad++</b></font><br>
(if you are getting the error: Notice: Undefined offset: 1
Then your input does not contain tabs. Copy from Excel instead. )
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
/*echo "<br>A0: ".$array[0];
echo "<br>A1: ".$array[1];
echo "<br>A2: ".@$array[2];
echo "<br>A3: ".@$array[3];
*/


/*$row_data1   = $array[0];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_data1);
echo "csvdATA1: ".$row_data1."<br><br>";
echo "LA0: ".@$LA[0]."<br><br>";
echo "LA1: ".@$LA[1]."<br><br>";
echo "LA2: ".@$LA[2]."<br>";
//if ($LA[2] == "")
//	echo "<b><font color = red>ERROR: field data missing maybe a tab too many</b></font><br>";
echo "LA3: ".@$LA[3]."<br>";
*/echo "<br><br>OK, so we cleared Carried forward and blank lines:<br>";
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

if (@$LA13[1] == "")
	//echo "empty line /n\n";
echo "";
//    echo "brought\n"; echo "";
 else 
if (@$LA13[1] == "BROUGHT FORWARD")
	echo "";
//    echo "brought\n"; echo "";
 else 
if (@$LA13[1] == "PROVISIONAL STATEMENT") 
	echo "";
    //echo "carried\n";
 else 
if (@$LA13[1] == "CARRIED FORWARD") 
	echo "";
    //echo "carried\n";
 else 
if (@$LA13[1] == "") 
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
$row_dataA   = @$array[$x2]; //ok so here i added it for comparison
$row_dataA2   = $array2[$x2];
//echo "row_dataA: ".$row_dataA."<br>";
$LA13 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA);
$LA132 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA2);
//echo "LA132: ".@$LA132[0]."\n";

if (@$LA13[1] == @$LA132[1] )
	echo "same /n\n";
//    echo "brought\n"; echo "";
 else 
	echo "$row_dataA2\n"; 
}
?>




</textarea></td>
  </tr>
</table>
</body>
</html>

