<?php


	//require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	//require_once 'db.php';
require_once 'inc_OnlineStoreDB.php';

?>
<?php //require_once 'header.php'; ?>
<b><br><font size = "4" type="arial">View Invoices</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;view_inv.php
</br>



<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
$SQLstring = "select * from invoice order by InvNo desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustNo";
echo "CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>InvPdStatus</th>";
echo "</tr>\n";

    // fetch object array
	  while ($row = mysqli_fetch_assoc($result)) {
    //////////while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

	  ////$x = $row[0];
	  $x = $row["InvNo"];
//	  echo "<th>".$row["CustNo"]."</th>";
//echo "<th>".$row["CustFN"]."</th>";

	  echo "<tr><th>";

	  if ($x >= 4400 && $x <= 4469)
	  echo "<FONT color = 'red'>".$x." JAN2012";
	  else if ($x >= 4500 && $x <= 4569)
	  echo "<FONT color = 'red'>".$x. " FEB2012 ";
	  else if ($x >= 4600 && $x <= 4669)
	  echo "<FONT color = 'red'>".$x. " MAR2012 ";
	  else if ($x >= 4700 && $x <= 4769)
	  echo "<FONT color = 'red'>".$x. " APR2012 ";
	  else if ($x >= 4800 && $x <= 4869)
	  echo "<FONT color = 'red'>".$x. " MAY2012 ";
	  else if ($x >= 4900 && $x <= 4962)
	  echo "<FONT color = 'red'>".$x. " JUN2012 ";
	  else if ($x >= 5000 && $x <= 5069)
	  echo "<FONT color = 'red'>".$x. " JUL2012 ";
	  else if ($x >= 5100 && $x <= 5169)
	  echo "<FONT color = 'red'>".$x. " AUG2012 ";
	  else if ($x >= 5200 && $x <= 5269)
	  echo "<FONT color = 'red'>".$x. " SEP2012 ";
	  else if ($x >= 5300 && $x <= 5369)
	  echo "<FONT color = 'red'>".$x. " OCT2012 ";
	  else if ($x >= 5400 && $x <= 5469)
	  echo "<FONT color = 'red'>".$x. " NOV2012 ";
	  else if ($x >= 5500 && $x <= 5569)
	  echo "<FONT color = 'red'>".$x. " DEC2012 ";
	  else if ($x >= 5600 && $x <= 5669)
	  echo "<FONT color = 'red'>".$x. " JAN2012 ";
	  else if ($x >= 5700 && $x <= 5769)
	  echo "<FONT color = 'red'>".$x. " FEB2013 ";
	  else if ($x >= 5800 && $x <= 5869)
	  echo "<FONT color = 'red'>".$x. " MAR2013 ";
	  else if ($x >= 5900 && $x <= 5969)
	  echo "<FONT color = 'red'>".$x. " APR2013 ";
	  else if ($x >= 6000 && $x <= 6069)
	  echo "<FONT color = 'red'>".$x. " MAY2013 ";
	  else if ($x >= 6100 && $x <= 6169)
	  echo "<FONT color = 'red'>".$x. " JUN2013 ";
	  else if ($x >= 6200 && $x <= 6269)
	  echo "<FONT color = 'red'>".$x. " JUL2013 ";
	  else if ($x >= 6300 && $x <= 6369)
	  echo "<FONT color = 'red'>".$x. " AUG2013 ";
	  else if ($x >= 6400 && $x <= 6469)
	  echo "<FONT color = 'red'>".$x. " SEP2013 ";
	  else if ($x >= 6500 && $x <= 6569)
	  echo "<FONT color = 'red'>".$x. " OCT2013 ";
	  else if ($x >= 6600 && $x <= 6669)
	  echo "<FONT color = 'red'>".$x. " NOV2013 ";
	  else if ($x >= 6700 && $x <= 6769)
	  echo "<FONT color = 'red'>".$x. " DEC2013 ";
	  else echo $x;

	  echo "</th></FONT>";
echo "<th>".$row['CustNo'];
$CN = $row["CustNo"];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

//echo " {$row2[0]."</th>";
//echo " {substr('$row2[0]', 0, 4)."</th>";
echo substr($row2[0], 0, 7)."</th>";

//substr('abcdef', 0, 4);
}
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
echo "<th>".$row["D1"]."</th>\n";
echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();

}
echo "</table>";

/*$result=mysql_query($query);
//echo "<br><br>result: ".$result; //the whole content of the table is now require_onced in a PHP array with the name $result.
$num=mysql_numrows($result);//counts the rows

mysql_close();

/*echo "<br><br>";

$i=0;
while ($i < $num) {

$cell1 = mysql_result($result,$i,"productID");
$cell2 = mysql_result($result,$i,"orderID");
$cell3 = mysql_result($result,$i,"quantity");

echo "<b>$cell1
$cell2</b><br>$cell3<br><hr><br>";

$i++;
}
*/

?>
<!--<br><br>
<table border="1" cellspacing="2" cellpadding="2">
<tr>
<td>Order No</td>
<td>ODate</td>
<td>CustNo</td>
</tr>
-->
<?php
/*$i=0;
while ($i < $num) {



$f1 = mysql_result($result,$i,"OrderNo");
$f2=mysql_result($result,$i,"ODate");
$f3=mysql_result($result,$i,"CustNo");
?>

<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
</tr>

<?php
$i++;
}









/*
echo "num: ".$num;

echo "<table><tr>";
$i = 0;
while($row = mysql_fetch_array($result)) {
  echo "<td>".$row['CustNo']."</td>";
  if (++$i % 5 == 0) {
    echo "</tr><tr>";
  }
}
echo "</tr></table>"
*/




/*$stid = oci_parse($c, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';
*/

?>
</table>
















<?php
/*echo "<br><br><br/><br><br><br><br/><br><br><br><br/><br><br><br><br/><br>2-dimensional table example<br>";
$myarray = array("key1"=>array(1,2,3,4),
                 "key2"=>array(2,3,"B",5),
                 "key3"=>array(3,4,5,6),
                 "key4"=>array("Z",5,6,"E")); //Having a key or not doesn't break it

echo "<table>";
foreach($myarray as $key => $element){
    echo "<tr>";
    foreach($element as $subkey => $subelement){
        echo "<td>$subelement</td>";
    }
    echo "</tr>";
}
echo "</table>";
*/



?>

</body>
</html>





<?php
//require_once 'footer.php';
?>
