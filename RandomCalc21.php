<?php 
    $txtArea = $_POST['txtArea'];
?>	
	<head><title>
imported
</title>
<!--header("Content-type: text/html; charset=UTF-8");-->
<meta charset="utf-8">
</head>



Calculations happen inside RCProcessArray.php<br>

If you input: <br>424.60<br>
635.4<br>
334.05<br>
67<br>
25.56<br>
55.3<br><br>

Then result should be: array(4) { [0]=> string(4) "55.3" [1]=> string(2) "67" [2]=> string(6) "334.05" [3]=> string(6) "424.60" } <br><br>
You have inputted: 
<?php
$txtArea ='';
$txtArea = $_POST['txtArea'];

$ma = explode(PHP_EOL, $txtArea); // load array
/*
LF 	&#10; 	line feed
VT 	&#11; 	vertical tab
FF 	&#12; 	form feed
CR 	&#13; 	carriage return
*/
/*

echo "<br>A0: ".$ma[0];
echo "<br>A1: ".$ma[1];
echo "<br>A2: ".$ma[2];
//echo "<br>A3: ".$array[3];

*/

//Quantity	Description	Price	Total
echo "<br><br>";

$RowNumbr = 0;
/*
foreach($ma as $key => $value)
{
  $u1 = "rEset";
  $RowNumbr++;
  echo "________________________________________________________________<br><font size = 4>$RowNumbr: NEWW RUN $RowNumbr</font>";
  echo "<br>Key: ".$key." has the value: <b>". $value;
  echo "</b>";

  $trtyu = "reSet";
    echo "<br>";
} 
*/	

foreach($ma as $key => $value)
{
  $u1 = "rEset";
  $RowNumbr++;
//  echo "________________________________________________________________<br><font size = 4>$RowNumbr: NEWW RUN $RowNumbr</font>";
//  echo "<br>Key: ".$key." has the value: <b>". $value;
  echo $value;

    echo "<br>";
} 

	include "RCProcessArray.php";
	


?>

<a href = "RCExcel21.php">For importing from Excel</a>
<!--
A customer has 8 (or more) unpaid invoices.<br>
He now has paid a certain amount but I don't know for which of the 8 invoices 
and I don't know for how many invoices the amount covers.<br>
So our code will find out which invoices are covered by the amount.<br>
It could be 2 or 3 or 4 or more invoices that have been paid.<br>
The current code can also handle float values.<br>
I received a payment of €139 and I need to find out which invoices I need to combine to get the total value of €139.<br><br>
Invoices amounts: €10, €22, €14, €35, €82<br>
Correct result for €139 =  €22 + €35 + €82.<br><br>





<form name="Editcust" action="RCProcess21.php" method="post">

Tot paid: <input type="text" id="Tot"  name="Tot"  value = "139" required ><br><br>
Tot of all invoices unpaid:  <input type="text" id="Tot"  name="unpaid"  value = "0"  ><br><br>
put Zeroes in unactive fields to prevent " Warning: A non-numeric value encountered "<br>
<input type="text" id="R1"  name="R1" value = "22" required><br><br>
<input type="text" id="R2"  name="R2" value = "35" required><br><br>
<input type="text" id="R3"  name="R3"  value = "82" required><br><br>
<input type="text" id="R4"  name="R4"  value = "0" required><br><br>
<input type="text" id="R5"  name="R5"  value = "0" required><br><br>
<input type="text" id="R6"  name="R6"  value = "0" required><br><br>
<input type="text" id="R7"  name="R7"  value = "0" required><br><br>
<input type="text" id="R8"  name="R8"  value = "0" required><br><br>
<input type="text" id="R9"  name="R9"  value = "0" required><br><br>
<input type="text" id="R10"  name="R10" value = "0" required><br><br>
<input type="text" id="R11"  name="R11" value = "0" required><br><br>
<input type="text" id="R12"  name="R12" value = "0" required><br><br>
<input type="text" id="R13"  name="R13" value = "0" required><br><br>
<input type="text" id="R14"  name="R14" value = "0" required><br><br>
<input type="text" id="R15"  name="R15" value = "0" required><br><br>
<input type="text" id="R16"  name="R16" value = "0" required><br><br>
<input type="text" id="R17"  name="R17" value = "0" required><br><br>
<input type="text" id="R18"  name="R18" value = "0" required><br><br>
<input type="text" id="R19"  name="R19" value = "0" required><br><br>
<input type="text" id="R20"  name="R20" value = "0" required><br><br>
<input type="text" id="R21"  name="R21" value = "0" required><br><br>
<br><input type="submit" name="btn_submit" value="submit" /> 

</form>
-->