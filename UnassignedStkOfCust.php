<?php
$row_cnt = 0;
$CustInt = @$CustNo;
$SQLstringEP = "select * from expenses where InvNo = '' and CustNo = $CustInt order by ExpNo desc";
if ($resultEP = mysqli_query($DBConnect, $SQLstringEP)) {
while ($row = mysqli_fetch_assoc($resultEP)) {
$row_cnt = mysqli_num_rows($resultEP);
}
mysqli_free_result($resultEP);
}


if ($row_cnt > 0)
{
echo "<b><br><font size = '3'>Unassigned customer's expenses:</b></font> 
</a>UnassignedStkOfCust.php";
echo "<a href='assignStk.php?CustNo=".$CustInt."' target=_blank> Add Expense for customer</a> <a href='editExpCQ.php?CustNo=".$CustInt."' target=_blank> Edit Customer's </a>";
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstringEP)) {

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
//echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) 
{
$ExpNo = $row['ExpNo'];
echo "<th> <a href = 'assignStkInvGET.php?CustNo=$CustInt&ExpNo=$ExpNo' target=_blank> ".$row['ExpNo']."</a></th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
//$CCCC = $row['CustNo'];
//$s = "SELECT * from customer where CustNo = '$CCCC'";
//if ($resultCC = mysqli_query($DBConnect, $s)) {
//while ($rowCC = mysqli_fetch_assoc($resultCC)) 
//{ 
//$NN = $rowCC['CustLN'];
//$NNN = $rowCC['CustFN'];
//}}
//echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);
}
 
}
?>
