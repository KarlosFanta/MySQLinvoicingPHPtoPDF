<?php
	require_once("inc_OnlineStoreDB.php");
			
$SQLstring = "select * from invoice where InvNo = $InvNo";
//echo $SQLstring;
echo "view_inv_one: ";
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>ABBR</th>";
echo "<th>Surname</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>InvPdStatus</th>";

echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";

   while ($row = mysqli_fetch_assoc($result)) {
 
echo "<tr><th>{$row['InvNo']}</th>";
echo "<th>{$row['CustNo']}</th>";
$CN = $row['CustNo'];
$SQLstringLN = "select * from customer where CustNo = $CN";

//echo "<th>{$SQLstringLN}</th>";


//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
if ($result2 = mysqli_query($DBConnect, $SQLstringLN)) {
while ($row2 = mysqli_fetch_assoc($result2)) {

$CustLN = $row2['CustLN'];
$CustEmail = $row2['CustEmail'];
$Abbr = $row2['ABBR'];

echo "<th>".$Abbr."</th>";
echo "<th>".$CustLN."</th>";
//echo "<th>".$CustEmail."</th>";
		}
mysqli_free_result($result2);
}
echo "<th>{$row['InvDate']}</th>";
echo "<th>{$row['Summary']}</th>";
echo "<th>{$row['InvPdStatus']}</th>";
echo "<th>{$row['D1']}</th>\n";
echo "<th>{$row['ex1']}</th></tr>\n";
		}
mysqli_free_result($result);
	
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
//	require_once('footer.php');		
?>