<!--<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
-->
<?php
	//require_once("inc_OnlineStoreDB.php");
			

$SQLstring = "select * from expensesH  order by ExpNo  desc LIMIT 3";

$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' bordercolor='red'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>CostExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>InvNo</th>";

echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>Category</th>\n";
//echo "<th>TN</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";

echo "<th>".$row['ExpNo']."</th>";
echo "<th>".substr($row['ExpDesc'], 0, 25)."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."";
$PDD = $row['PurchDate'];

list($year, $month, $day) = explode('-', $row['PurchDate']);
echo "<br>".$day.'/'.$month.'/'. $year."</th>";
echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";
echo "<th>".@$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}
mysqli_free_result($resultCC);
}



echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "<th>".$row['Category']."</th>";
//echo "<th>".$row['Source']."</th>";
echo "</tr>";
}
mysqli_free_result($result);
}
echo "</table ></font>";





?>
