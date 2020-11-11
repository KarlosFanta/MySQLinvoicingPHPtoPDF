<?php


	//require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
$indesc = "Y";
$yo = 0;
$loop = 0;
?>
<?php //require_once 'header.php'; ?>

<b><font size = "3" type="arial">Your Transactions History </font>
<?php 			echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo $row['CustLN'];
?>
			</b></font> &nbsp; &nbsp;  view_trans_by_cust.php
</br>
<?php
$SQLstring = "select * from transaction where CustNo = '$CustInt' order by transdate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$summm = 0;
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th length= '120'>Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>TMethod</th>";
echo "<th>InvNoA</th>";
echo "<th>InvNoAincl</th>";
echo "<th>InvNoB</th>\n";
if ($indesc == "1")
echo "<th>Priority</th></tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>";

//if (@in_array(@$row[7], @$PaidInvs))
if ($row[6]  != "0")
    echo "<font color = purple>";
    else
	echo "<font color = red>";

echo "{$row[0]}</font></th>"; //transNO
//echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
*/
//echo "<th>{$row[2]}</th>";//Date
$date_array = explode("-",$row[2]);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>{$row[3]}</th>";///TOTAL AmtPaid
$yo = $yo+$row[3];
echo "<th>{$row[4]}</th>\n";//notes
echo "<th>{$row[23]}</th>";//CustSDR
echo "<th>{$row[5]}</th>\n";//EFT TMethod
//echo "<th>R{$row[29]}</th>";
$summm = $summm + $row[3];

//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary
echo "<th><font color = green>{$row[6]}</font></th>\n";//invNoA

//echo "<th>{$loop}</th>\n";
$loop++;
$PaidInvs[$loop]="$row[6]";

echo "<th>{$row[7]}</th>\n";//ex1
echo "<th>{$row[8]}</th>";
$loop++;
$PaidInvs[$loop]="$row[8]";

echo "<th>{$row[9]}</th>";
echo "<th>{$row[10]}</th>";
$loop++;
$PaidInvs[$loop]="$row[10]";

echo "<th>{$row[11]}</th>";
echo "<th>{$row[12]}</th>";
$loop++;
$PaidInvs[$loop]="$row[12]";

echo "<th>{$row[14]}</th>";
echo "<th>{$row[15]}</th>";
echo "<th>{$row[16]}</th>";
echo "<th>{$row[17]}</th>";
echo "<th>{$row[18]}</th>";
echo "<th>{$row[19]}</th>";
echo "<th>{$row[20]}</th>";
echo "<th>{$row[21]}</th>";
echo "<th>{$row[22]}</th>";

//echo "<th>{$row[24]}</th>";
echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";
echo "Transactions Paid totals to: R ".$summm."<br />";

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
//require_once 'footer.php';
?>
