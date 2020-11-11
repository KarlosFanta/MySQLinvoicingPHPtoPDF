<?php


	//	require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
//echo "indesc:".$indesc;
if (@$indesc == '')
  $indesc = 8;

//  echo "indesc:".$indesc;
$yo = 0;
$loop = 0;
$in = 8;

if (@$_POST['in'] != "")
$in = @$_POST['in'];
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];

echo "<BR />";
echo "All past transactions:";
$SQLstring = "select * from transaction where CustNo = '$CustInt' order by transdate desc";

?>

<!--<b><font size = "3" type="arial">Your Transactions History </font>-->
<?php 	//		echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
		//	echo " ";
		//	echo $row['CustLN'];
?>
			</b></font> &nbsp; &nbsp;  <font color=#65F5DC>view_trans_by_cust.php   order by transdate desc
			<?php echo $SQLstring; ?>

			</font>
			<a href = "edit_transCQ.php">edit_transCQ.php</a>
			<a href = "../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction">../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction</a>

</br>
<?php
$summm = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "<table  border='1'>";
echo "<tr><th>TransNo</th>";
echo "<th>TransRecvd</th>";
echo "<th>AmtPaid</th>";
echo "<th length= '120'>Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

if (@$in >0)
echo "<th>InvNoA</th>";
if (@$indesc >0)
echo "<th>InvNoA incl VAT</th>\n";
if ($in >1)
echo "<th>InvNoB</th>";
if ($indesc >1)
echo "<th>InvNoB incl VAT</th>\n";
if ($in >"2")
echo "<th>InvNoC</th>";
if ($indesc >2)
echo "<th>InvNoC incl VAT</th>\n";
if ($in >"3")
echo "<th>InvNoD</th>";
if ($indesc >3)
echo "<th>InvNoD incl VAT</th>\n";
if ($in >4)
echo "<th>InvNoE</th>";
if ($indesc >4)
echo "<th>InvNoE incl VAT</th>\n";
if ($in >5)
echo "<th>InvNoF</th>";
if ($indesc >5)
echo "<th>InvNoF incl VAT</th>\n";
if ($in > "6")
echo "<th>InvNoG</th>";
if ($indesc >6)
echo "<th>InvNoG incl VAT</th>\n";
if ($in >7)
echo "<th>InvNoH</th>";
if ($indesc >7)
echo "<th>InvNoH incl VAT</th>\n";
echo "<th>TMethod</th>";
//if ($indesc == "1")
echo "<th>Priority</th></tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
//	 while ($row = mysqli_fetch_row($result)) {
//    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

/*   if ($un == 'Y')
			{ echo "<tr><th>un".$un."display all trans</th><tr>";}
	else
				{ echo "<tr><th>".$un."N dont display trans</th><tr>";}
*/
//if ($un == 'N')  //Display paid reconciled invoices and reconciled transactions
			//{
$mmm =  $row['InvNoA'];  //invNoA
//echo "mmm: ".$mmm;

//if ($mmm >= 0)     //invNoA   if a zero OR if not a number  for exmaple 44p55   part paid.

//if (preg_match('/[A-Za-z]/', $mmm) ||  ($mmm == 0)      )

//{
echo "<tr><th>";
if ($mmm == '0')
echo "<font color = orange>";

echo "{$row['TransNo']}</font></th>";//TransNo
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
$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['AmtPaid']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['AmtPaid'];
echo "<th>{$row['Notes']}</th>\n";//Notes
echo "<th>{$row['CustSDR']}</th>";//CustSDR

//echo "<th>24:{$row[24]}</th>";//ERROR

//echo "<th>R{$row[29]}</th>";
$summm = $summm + $row['AmtPaid'];

//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th><font color = green>{$row['InvNoA']}</font></th>\n";//InvNoA  //InvA  from transaction table
if ($indesc >0)
echo "<th>{$row['InvNoAincl']}</th>\n";  //InAincl  from transaction table

//echo "<th>{$loop}</th>\n";
$loop++;
//$PaidInvs[$loop]=$row['InvNoAincl'];

if ($in >1)
echo "<th>{$row['InvNoB']}</th>";//InvNoB
$loop++;
//$PaidInvs[$loop]=$row['InvNoB'];

if ($indesc >1)
echo "<th>{$row['InvNoBincl']}</th>"; //InvNoBincl





if ($in >2)
echo "<th>{$row['InvNoC']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvNoCincl'];

if ($indesc >2)
echo "<th>{$row['InvNoE']}</th>";
 if ($in >3)
echo "<th>{$row['InvNoEincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvDincl'];

if ($indesc >3)
echo "<th>{$row['InvNoD']}</th>";
 if ($in >4)
echo "<th>{$row['InvNoDincl']}</th>";

$loop++;
//$PaidInvs[$loop]=$row['14];

if ($indesc >4)
echo "<th>{$row['InvNoE']}</th>";
 if ($in >5)
echo "<th>{$row['InvNoEincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvNoEincl'];
if ($indesc >5)

echo "<th>{$row['InvNoF']}</th>";
 if ($in >6)
echo "<th>{$row['InvNoFincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvFincl'];
if ($indesc >6)

echo "<th>{$row['InvNoG']}</th>";

 if ($in >7)
echo "<th>{$row['InvNoGincl']}</th>";

$loop++;
//$PaidInvs[$loop]=$row['InvH'];
if ($indesc >7)
echo "<th>{$row['InvNoHincl']}</th>";//InvNoHincl  Dont forget to enable invoice descriptions as well

//echo "<th>{$row['CustSDR']}</th>";//CustSDR
echo "<th>{$row['TMethod']}</th>\n";//EFT TMethod
echo "<th>{$row['Priority']}</th>";//priority

echo "</tr>\n";

/*} //yo
	else
{
echo "<tr><th>";

$mmm =  $row['InvNoA'];
//echo "$mmm: ".$mmm;
if ($mmm == '0')
echo "<font color = orange>";

echo "{$row['0']}</font></th>";//TransNo
//echo "<th>{$row['1']}</th>";
			//$CN = $row['1];
			//$SQLstringLN = "select CustLN from customer where CustNo = $CN";
			//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name //$QueryResult.
			//$result2 = $DBConnect->query($SQLstringLN);
			//	while ($row2 = $result2->fetch_row()) {

			//echo "<th>{$row2[0']}</th>";
			//}

//echo "<th>{$row['2']}</th>";//Date
$date_array = explode("-",$row['2']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['3']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['3'];
echo "<th>{$row['4']}</th>";//notes
echo "<th>{$row['23']}</th>";//CustSDR

//echo "<th>24:{$row['24']}</th>";//ERROR

//echo "<th>R{$row['29']}</th>";
$summm = $summm + $row['3'];

//echo "<th align = 'left'>{$row['5']}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th><font color = green>{$row['InvNoA']}</font></th>";//invNoA  //InvA  from transaction table
if ($indesc >0)
{echo "<th>";
if ($row['InvNoAincl'] >"0")
echo "R {$row['InvNoAincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}
//echo "<th>{$loop}</th>";
$loop++;
$PaidInvs[$loop]=$row['InvNoA'];

if ($in >1)
echo "<th><font color = green>{$row['InvNoB']}</font></th>";//InvNob
$loop++;
$PaidInvs[$loop]=$row['InvNoB'];

if ($indesc >1)
{
echo "<th>";
if ($row['InvNoBincl'] >"0")
echo "R {$row['InvNoBincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}





if ($in >2)
echo "<th><font color = green>{$row['InvNoC']}</font></th>";
$loop++;
$PaidInvs[$loop]=$row['InvNoC'];

if ($indesc >2)
{
echo "<th>";
if ($row['InvNoCincl'] >"0")
echo "R {$row['InvNoCincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}





 if ($in >3)
echo "<th><font color = green>{$row['InvNoD']}</font></th>";
$loop++;
$PaidInvs[$loop]=$row['InvNoD'];

if ($indesc >3)
{
echo "<th>";
if ($row['InvNoDincl'] >"0")
echo "R {$row['InvNoDincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}

 if ($in >4)
echo "<th><font color = green>{$row['InvNoE']}</font></th>";

$loop++;
$PaidInvs[$loop]=$row['InvNoE'];

if ($indesc >4)
{
echo "<th>";
if ($row['InvNoEincl'] >"0")
echo "R {$row['InvNoEincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}



 if ($in >5)
echo "<th><font color = green>{$row['InvNoF']}</font></th>";
$loop++;
$PaidInvs[$loop]=$row['InvNoF'];

if ($indesc >5)
{
echo "<th>";
if ($row['InvNoFincl'] >"0")
echo "R {$row['InvNoFincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}

 if ($in >6)
echo "<th><font color = green>{$row['18']}</th>";
$loop++;
$PaidInvs[$loop]=$row['18'];
if ($indesc >6)
{
echo "<th>";
if ($row['19'] >"0")
echo "R {$row['19']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}


 if ($in >7)
echo "<th><font color = green>{$row['20']}</font></th>";

$loop++;
$PaidInvs[$loop]=$row['20'];
if ($indesc >7)
//echo "<th>{$row['21']}</th>";//InhHincl  Dont forget to enable invoice descriptions as well
{
echo "<th>";
if ($row['21'] >"0")
echo "R {$row['21']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from transaction table
}


//echo "<th>{$row['23']}</th>";//CustSDR
echo "<th>{$row['5']}</th>";//EFT TMethod
echo "<th>{$row['22']}</th>";//priority

echo "</tr>";
}
*/



		}
    // free result set
    mysqli_free_result($result);

}
echo "</table>";

//if ($un == 'Y')
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
//	require_once 'footer.php';
?>
