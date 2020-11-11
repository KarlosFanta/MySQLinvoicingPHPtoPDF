<?php	//this is "edit_trans_CustProcessC2.php"
 $page_title = "You seleted a Transomer";
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

?>

</br></br>

<?php



include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0.05)
echo "<b>Total Amount oustanding: R".number_format(($Invsummm - $yo), 2, '.', '')."</b><BR />";
else
if (($Invsummm - $yo) > -0.04)
echo "<b>Balance: R 0.00</b><BR />";
else
echo "<b>Total Amount owing to you: R".-number_format(($Invsummm - $yo), 2, '.', '')."</b><BR />";
echo "<br /><br />";
include ("view_event_by_cust.php");
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



