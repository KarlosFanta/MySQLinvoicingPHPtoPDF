<?php
echo $SQLstrX ;
//if ($resultINVb = $DBConnect->query($SQLstringb)) {
echo "<table  border='1'>";

if ($resultINVb = mysqli_query($DBConnect, $SQLstrX)) {

echo "<tr><th>ExpNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>PurchDate</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ExpDesc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //ExpDesc

echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>SupCode</th>";
echo "<th>Notes</th>\n";


echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultINVb)) {
$InvNor = $row['ExpNo'];
$InvNor1 = $row['ProdCostExVAT'];
$InvNor2 = $row['Notes'];
echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor'><font color = red>$InvNor";
echo "</th>\n";

$date_array = explode("-",$row['PurchDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year;

$out = date("Y") - $year;
//echo $out;

if ($out == 1 )
echo "<br>A year ago";
if ($out > 1 )
echo "<br><font color = orange>$out years ago</font>";
echo "</th>";//invDate

echo "<th>R{$row['ProdCostExVAT']}</th>"; ///TOTAL AMOUNT TotAmt
echo "<th>{$row['ExpDesc']}</th>"; //summary
echo "<th>{$row['Category']}</th>\n";//D1  5
echo "<th>{$row['SerialNo']}</th>\n";//Q1   6
echo "<th>{$row['SupCode']}</th>\n";  ///     7
echo "<th>{$row['Notes']}</th>\n";   //8

echo "</tr></font>\n";
		
	}
	mysqli_free_result($resultINVb);
	
}
echo "</table>"; //i moved this up above the squiggly
?>