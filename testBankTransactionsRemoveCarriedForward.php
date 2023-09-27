<html>
<head>
<title>TestBank check amounts adding up </title>
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>



<form name="Adddata"   action="testcheck4processBTv3.php" method="post">
<div>
<b><font size = "4" type="arial">Upload Excel Data</b></font>
<br/>.php loads testcheck4processBTv3.php<br/>



		<br>
		
			
			

<?php $txtArea = $_POST['txtArea']; 
//count rows

?>
	

<br>
<?php 



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


/*for()
	if (row == "BROUGHT FORWARD")
		echo "nope<br>";
	else
		echo "da row";

*/

echo "<textarea  id='txtArea' name='txtArea' rows='20' cols='100'>";


for ($x = 0; $x < ($Cnt-1); $x++) {


$row_dataA   = $array[$x];
//echo "row_dataA: ".$row_dataA."<br>";

$LA13 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $row_dataA);

//echo "LA13: ".$LA13[1]."\n";

if ($LA13[1] == "BROUGHT FORWARD")
	echo "";
//    echo "brought\n"; echo "";
 else 
if ($LA13[1] == "PROVISIONAL STATEMENT") 
	echo "";
    //echo "carried\n";
 else 
if ($LA13[1] == "CARRIED FORWARD") 
	echo "";
    //echo "carried\n";
 else 
if ($LA13[1] == "") 
	echo "";
    //echo "blank\n";
 else 
   echo "$row_dataA\n";
//echo "yo\n";
}

















 ?>

</textarea>


<br>
<input type="submit" value="Test bank acc">
<br><br><br>






</body>
</html>