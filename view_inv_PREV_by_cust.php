<?php


	//	require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	//require_once 'db.php';
	require_once 'inc_OnlineStoreDB.php';

?>
<?php //require_once 'header.php'; ?>
<b><br><font size = "4" type="arial">Your Invoices History
<?php 			echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo $row['CustLN'];
?>
			</b></font> <font color = yellow>view_inv_prev_by_cust.php if nothing shows maybe customer has another account</font>
</br>
<?php
$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc   ";
//order by InvNo desc
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
echo "</font>";
if ($result = $DBConnect->query($SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
echo "<tr><th>InvNo</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Inv Paid Status</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>\n";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>\n";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>\n";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>\n";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>\n";
echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>\n";
echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th></tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
//echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
*/echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>R{$row[29]}</th>"; ///TOTAL AMOUNT TotAmt
$Invsummm = $Invsummm + $row[29];

echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary
echo "<th>{$row[6]}</th>\n";//D1
echo "<th>{$row[7]}</th>\n";//ex1
echo "<th>{$row[8]}</th>\n";//ex1
echo "<th>{$row[9]}</th>\n";//ex1
echo "<th>{$row[10]}</th>\n";//ex1
echo "<th>{$row[11]}</th>\n";//ex1
echo "<th>{$row[12]}</th>\n";//ex1
echo "<th>{$row[13]}</th>\n";//ex1
echo "<th>{$row[14]}</th>\n";//ex1
echo "<th>{$row[15]}</th>\n";//ex1
echo "<th>{$row[16]}</th>\n";//ex1
echo "<th>{$row[17]}</th>\n";//ex1
echo "<th>{$row[18]}</th>\n";//ex1
echo "<th>{$row[19]}</th>\n";//ex1
echo "<th>{$row[20]}</th>\n";//ex1
echo "<th>{$row[21]}</th>\n";
echo "<th>{$row[22]}</th>\n";
echo "<th>{$row[23]}</th>\n";
echo "<th>{$row[24]}</th>\n";
echo "<th>{$row[25]}</th>\n";
echo "<th>{$row[26]}</th>\n";
echo "<th>{$row[27]}</th>\n";
echo "<th>{$row[28]}</th>\n";

echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table><br><br>";
echo "Invoices total to: R ".$Invsummm."<br /><br />";

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



<?php
//	require_once 'footer.php';
?>
