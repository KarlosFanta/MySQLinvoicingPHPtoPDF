<?php


	//require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	//require_once 'db.php';
require_once 'inc_OnlineStoreDB.php';
require_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Unassigned Expenses</title>
    <link href="dalogin/assets/css/bootstrap.css" rel="stylesheet">
  </head>
<?php //require_once 'header.php'; ?>
<b><font size = "4" type="arial">These expenses are not invoiced yet</b></font>
</br>
<?php
?>

</br>
</br>

<form name="selField" action="selectVC.php" method="post">
    <input type="submit" name="formSubmit" value="Submit" /><br>


<?php

$SQLstring = "select * from customer order by CustLN";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$queryC = "select * from customer ORDER BY custLN";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
$CustNo = $row["CustNo"];
//echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th><a href='editCust.php?mydropdownEC={$CustNo}'  target='_blank'>{$CustNo}</a></th>";//Cno

echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";
echo "<th>".$row["CustLN"]."";
$row_cnt = mysqli_num_rows($resultC);
//echo " rows: $row_cnt</th>";
echo "</tr>\n";

/*echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
*/

$queryA = "select * from expenses where InvNo='' and CustNo = $CustNo";
//echo $queryA;
if ($resultA = mysqli_query($DBConnect, $queryA)) {
//echo "<th>ExpNo</th>";
//echo "<th>ExpDesc</th>";
//echo "<th>ProdExVAT</th>";
//echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultA)) {
echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>".$row["ExpNo"]."</th>";
echo "<th>".$row["ExpDesc"]."<a href = '{$row["ExpNo"]}?='{$row["ExpNo"]}'></a></th>";
echo "<th>".$row["PurchDate"]."";
echo "<th>".$row["ProdCostExVAT"]."";
$row_cnt = mysqli_num_rows($resultA);
//echo " rows: $row_cnt</th>";
//echo "</tr>\n";

echo "</tr>\n";

}
mysqli_free_result($resultA);
}




}
mysqli_free_result($resultC);
}


echo "</table>";

?>







</body>
</html>
