<?php


	//	require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	//require_once 'db.php';
	require_once 'inc_OnlineStoreDB.php';

?>
<?php //require_once 'header.php'; ?>
<!--<b><br><font size = "4" type="arial">View Invoices</b></font>
</br>-->
<?php
$SQLstring = "select * from invoice where InvNo = $InvNo";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
echo "view_inv_one: ";
if ($result = $DBConnect->query($SQLstring)) {
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

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select * from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

//echo "<th>{$row2[0]}</th>";
$CustLN = $row2[1];
$CustEmail = $row2[5];
$Abbr = $row2[13];

echo "<th>".$Abbr."</th>";
echo "<th>".$CustLN."</th>";
//echo "<th>".$CustEmail."</th>";
}
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>{$row[5]}</th></tr>\n";
		}
    /* free result set */
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
//	require_once 'footer.php';
?>
