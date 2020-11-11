
<?php
require_once 'inc_OnlineStoreDB.php';//page567


require_once 'header.php';//page567

    @session_start();
	@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
?>

<?php
	$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {

  $dotstr = $row2['dotdot'];
}
mysqli_free_result($result);
}
$dotdot = intval($dotstr);
//echo "dotdot:".$dotdot;

?>
<form name="EditInv" action="edit_inv_process.php" method="post">
<?php
$row_cnt = 7;
$queryDRFT = "select * from invoice where Draft = 'Y' and CustNo = $CustInt";
//echo $queryDRFT; //draft invoices.
$res = mysqli_query($DBConnect, $queryDRFT);
$row_cnt = mysqli_num_rows($res);
//echo $row_cnt ;

if ($row_cnt  == 0)
echo "No draft invoices require editing";
else
{
echo "<br><br><br><br><br><br>";
echo "<b>You have $row_cnt invoices that require editing and sending:</b><br><br><br><br><br><br><br><br>";

echo "<select name='mydropdownEC' onchange='this.form.submit()'>";
echo "<option value='_no_selection_'>Select draft invoice to be updated</option>";

if ($result = mysqli_query($DBConnect, $queryDRFT)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];
print "<option value='$item1'>$item1";

$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$CustInt'";
//echo "qC:".$queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
print "_CNo: ".$item2C;
print "_".$item3C." ";
}}

$item3 = $row["InvDate"];
$item4 = $row["Summary"];
$item5 = $row["TotAmt"];

//print "_".$item2;
print "_".$item3;
print "_".$item4;
print "_R".$item5;
print " </option>";

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}
mysqli_free_result($result);

}
echo "<b>You have $row_cnt invoices that require editing and sending:</b><br><br><br><br><br><br><br><br>";

	echo $queryC;
echo "<input type='submit' name='btn_submit' value='Update selected invoice' /> ";
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
//echo "<br><br>Notes: <br>";
//include 'notes/index.php'; //this is AJAX notes  THIS INCLUDE DID NOT WORK PROPERLY


?>

</select></p>

	</form>

