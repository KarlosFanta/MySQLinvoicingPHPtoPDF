<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
			

?> 
<?php //require_once "header.php"; ?>
<!--<b><br><font size = "3" type="arial">Your events History -->
<?php 			
/*echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo $row['CustLN'];//this do3esn;t work.
*/
			?>
			</b></font>

<?php
//$SQLstring = "select * FROM events where CustNo = '$CustInt' order by priority desc, EDate desc";
$SQLstring = "select * FROM events where priority = 'High' order by Custno, EDate desc";

//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if (@$CustLN != "")
{
echo "&nbsp;&nbsp;&nbsp;";
			echo $CustLN;
			echo "'s events:";
echo "&nbsp;&nbsp;&nbsp;";
}
echo "view_urgent_events.php &nbsp;&nbsp;&nbsp;";

if ($result = $DBConnect->query($SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='0'>";
//$summm = 0;
echo "<tr><th>EventNo</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate</th>";
echo "<th>ENotes</th>";
echo "<th>Priority</th>";
echo "</tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
//echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th align = left>".substr($row2[0], 0, 7)."</th>";










}

echo "<th align = left>{$row[2]}</th>";
echo "<th align = left>{$row[4]}</th>\n";//priority
echo "<th align = left>{$row[3]}</th>";///Enotes
//echo "<th>{$row[5]}</th>\n";
//echo "<th>R{$row[29]}</th>"; 
//$summm = $summm + $row[3];

//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary
/*echo "<th>{$row[6]}</th>\n";//D1
echo "<th>{$row[7]}</th>\n";//ex1
echo "<th>{$row[8]}</th>";
echo "<th>{$row[9]}</th>";
echo "<th>{$row[10]}</th>";
echo "<th>{$row[11]}</th>";*/
echo "</tr>\n";
		}
    /* free result set */
    $result->close();
	
}
echo "</table><br>";
//echo "events Paid totals to: R ".$summm."<br /><br />";


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
 



/*
$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
 if ($result2 = $DBConnect->query($query)) {//to determine the Important part of the customer
    while ($row2 = $result2->fetch_assoc()) {
$Important = $row2['Important'];
echo "<b>Important: ";
echo $Important;

echo "</b> &nbsp;&nbsp;&nbsp;";
	
echo $row2['CustFN']."&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
			echo "{$row2['CustNo']}&nbsp;";
echo "{$row2['CustTel']}&nbsp;&nbsp;";
echo "{$row2['CustCell']}&nbsp;&nbsp;";
echo "{$row2['CustEmail']}&nbsp;&nbsp;";
echo "{$row2['CustAddr']}&nbsp;&nbsp;";
//echo "{$row2['Distance']} km&nbsp;&nbsp;";
//echo "{$row2['ABBR']}&nbsp;"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR']; //CASE SENSITIVE!!!
			  // $result->close();
	
}}	
echo "<br>";




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

//	require_once('footer.php');		







/*


echo "<table border='1' align = left>";
echo "<tr>";
echo"<th>EventNo</th><th> CustNo </th><th>EDate </th><th>ENotes </th><th>Priority </th><th>Destination</th>></tr>";
$query = "SELECT * FROM events WHERE CustNo = $CustInt" ;
//echo $query;
 if ($result3 = $DBConnect->query($query)) {//to determine the Important part of the customer
    while ($row3 = $result3->fetch_assoc()) {
echo "<tr><th>";	

echo $row3['EventNo']."</th><th>";
echo "{$row3['CustNo']}</th><th>";
echo "{$row3['EDate']}</th><th align = left>";
echo "&nbsp;{$row3['ENotes']}&nbsp;&nbsp;</th><th>";
echo "{$row3['Priority']}</th><th>";
echo "{$row3['Destination']}</th>";
echo "</tr>";			  // $result->close();

}}	
echo "</table><br><br><p></p>";





















*/
?>
