<?php


	$page_title = "Select a customer";
//	include 'dalogin/index.php';
//	include 'dalogin/USerSession.php';
	//include 'dalogin/CheckLogin.php';

	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a customer</title>

<br>
These are uncompleted unsent draft invoices:
<br>

<?php

@session_start();
//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";
$CNN = @$_SESSION['CustNo'];
$queryS = "select InvNo, InvDate, Summary,TotAmt,SDR  from invoice where Draft = 'Y'";
echo $queryS."<br>";

if ($resultInv = mysqli_query($DBConnect, $queryS)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>SDR</th>";

echo "</tr>\n";
  while ($rowInv = mysqli_fetch_assoc($resultInv)) {
echo "<th>{$rowInv['InvNo']}</th>";
/*$CN = $rowInv[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($rowInv2 = $result2->fetch_rowInv()) {

echo "<th>{$rowInv2[0]}</th>";
}*/
echo "<th>{$rowInv['InvDate']}</th>";
echo "<th>{$rowInv['InvNo']}</th>";
echo "<th>{$rowInv['Summary']}</th>";
echo "<th>{$rowInv['TotAmt']}</th>";
echo "<th>{$rowInv['SDR']}</th>";
echo "</tr>\n";

	}
mysqli_free_result($resultInv);
	}
mysqli_close($DBConnect);

?>
