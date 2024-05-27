<?php
	if (!empty($_GET["CustNo"])) 
    $CustInt = intval($_GET['CustNo']);

include "view_inv_by_custADV3.php";  //gives only totals
include "view_inv_by_custLATESTnotadsl.php";  //gives only totals

//echo "test<br>";
include "view_trans_by_custUNDERorOVERPAID.php";

include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
echo "<br>";echo "<br>";
include ("view_inv_prev_by_cust.php");

include ("view_event_by_cust.php");



echo "<br>determine next inv number: this can only be done after view_inv.php <br>";
echo "<a href= 'view_inv.php'  target='_blank'>View everyone's invoices: view_inv.php</a>";
?>
