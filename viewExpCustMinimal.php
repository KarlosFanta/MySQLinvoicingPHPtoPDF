<?php

	
	
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "2" type="arial">Customer's Expenses</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpCustMinimal.php
</br>All customers: <a href = 'viewExpHEandExp.php'>viewExpHEandExp</a>&nbsp;&nbsp;&nbsp;<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>

<?php
if (@$CustInt == '')
{
session_start();
 	$CustInt = '';
	$CustInt = @$_SESSION['CustNo'];
}
$SQLstring = "select * from expenses where CustNo = $CustInt order by ExpNo  desc";
//echo $SQLstring."<br><br>"; 
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Assigned</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
//echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{


echo "<th>".$row['ExpNo']."</th><th>";
if ($row['InvNo'] == '')
	echo "<font color = 'red'>";
echo "InvNo".$row['InvNo']."</th><th>";
echo "<font color = 'green'>";
if ($row['InvNo'] == '')
	echo "<font color = 'red'>";

echo "".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</font></th>";

echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";

$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
/*
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
*/
echo "<th>".$row['SerialNo']."</th>";

echo "</tr>";

}
echo "</table ></font>";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files
//include "edit_invCQ.php";
 
?>


</body>
</html>
