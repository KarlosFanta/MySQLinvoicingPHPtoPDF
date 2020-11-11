<?php

	//$page_title = "Customer";
	require_once 'inc_OnlineStoreDB.php';
?>

<?php //require_once 'header.php'; ?>
<b>Proofs matched to unpaid invoices</b><!--<font size = "2" type="arial">-->
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;</font> </b><font color=#F5F5DC>unreconciledProofs.php &nbsp;&nbsp;&nbsp;order by  desc</font>

<?php 		echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo @$row['CustLN'];
?>
</br>
<?php
$SQLstring = "select * from aproof where CustNo = '$CustInt' order by InvNo desc";
//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

//if ($resultINV = $DBConnect->query($SQLstring)) {
if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Invoice Date</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
if ($InvPdStatus == "Y")
echo "<th>Inv Paid Status</th>";

if ($indesc > "1")
{echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1</th>";
echo "<th>in1</th>";
}
if ($indesc > "2")
{echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
echo "<th>in2</th>";
}
if ($indesc > "3")
{echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";
}
if ($indesc > "4")
{echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";
}
if ($indesc > "5")
{echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";
}
if ($indesc > "6")
{echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";
}
if ($indesc > "7")
{echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
}
if ($indesc > "8")
{echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";
}

echo "</tr>\n";

    // fetch object array
//    while ($row = $resultINV->fetch_row()) {
	  while ($row = mysqli_fetch_assoc($resultINV)) {

      //  printf ("%s (%s)\n", $row[0], $row[1]);

//	echo "unnn:".$un;

//echo "<tr><th>";  deosnt work here when making paid invoices dissappear.

if (@in_array(@$row['InvNo'], @$PaidInvs))
{
    if ($un == 'Y')
			{
			/*echo "<tr><th><font color = green>{$row['InvNo']}Paid</th>\n";
		//	echo "<th>{$row[2]}</th>";  //invdate




			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate




















//			echo "<th>R{$row[29]}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>{$row['Summary']}</th>"; //summary 3
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4
			$Invsummm = $Invsummm + $row['TotAmt'];
			$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubh = $row['ex1']*1.14;
			$iubh2 = $row['ex2']*1.14;

			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}</th>\n";  ///     7
			echo "<th>ggg".$iubh."</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']}</th>\n";   //10
			echo "<th>fff{$iubh2}</th>\n";  ///     7
			}
			if ($indesc > "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']}</th>\n";  //13
			}
			if ($indesc > "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']}</th>\n";
			}
			if ($indesc > "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']}</th>\n";
			}
			if ($indesc > "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}</th>\n";
			}
			if ($indesc > "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}</th>\n";
			}
			if ($indesc > "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}</th>\n";
			}

			/*echo "<th>{$row[7]}</th>\n";
			echo "<th>{$row[7]}</th>\n";
			echo "<th>{$row[25]}</th>";
			echo "<th>{$row[26]}</th>";
			echo "<th>{$row[27]}</th>";
			echo "<th>{$row[28]}</th>";*/
//			echo "</tr></font>\n";
				//else do not display paid invoices

			}
				else
			{
				//echo "<tr><th>dont dusp".$un."</th></tr>";
							$Invsummm = $Invsummm + $row['TotAmt'];
							$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			}


		}
	else
		{
			echo "<tr><th><font color = red>{$row['InvNo']}</th>\n"; //0
//			echo "<th>{$row[2]}</th>";  //invdate

						$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate





			echo "<th>R{$row['TotAmt']}</th>"; ///TOTAL AMOUNT TotAmt
			echo "<th>{$row['Summary']}</th>"; //summary
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS
			$Invsummm = $Invsummm + $row['TotAmt'];
			$UnpaidInvsummm = $UnpaidInvsummm + $row['TotAmt'];

			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1

			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']}</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']}</th>\n";   //10
			}
			if ($indesc > "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']}</th>\n";  //13
			}
			if ($indesc > "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']}</th>\n";
			}
			if ($indesc > "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']}</th>\n";
			}
			if ($indesc > "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}</th>\n";
			}
			if ($indesc > "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}</th>\n";
			}
			if ($indesc > "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}</th>\n";
			}

			/*echo "<th>{$row[7]}</th>\n";
			echo "<th>{$row[7]}</th>\n";
			echo "<th>{$row[25]}</th>";
			echo "<th>{$row[26]}</th>";
			echo "<th>{$row[27]}</th>";
			echo "<th>{$row[28]}</th>";*/
			echo "</tr></font>\n";
		}



	}
    // free result set
    $resultINV->close();

}
echo "</table>";
//echo "Paid invoice total to:
if ($un == 'Y')
echo "Invoices total to: R ".$Invsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid Invoices: R ".$PaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid Invoices: R ".$UnpaidInvsummm.")<br />";
else
echo "Only Unpaid Invoices total to: R ".$UnpaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid Invoices: R ".$PaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid Invoices: R ".$UnpaidInvsummm.")<br />";

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
