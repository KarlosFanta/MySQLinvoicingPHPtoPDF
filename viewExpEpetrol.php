<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
viewExpEpetrol.php
<?php
	require_once("inc_OnlineStoreDB.php");
			
$SQLstring = "select * from expensesE where Category = 'petrol' order by PurchDate  desc";
echo "<textarea  style='white-space:pre-wrap; height:17px;font-family:arial;width:550px;font-size: 9pt'  cols='100'>". $SQLstring."</textarea><br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>CostExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>inVAT</th>";
echo "<th>InvNo</th>";

echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>Category</th>\n";
//echo "<th>TN</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{
echo "<th>".$row['ExpNo']."</th>";
echo "<th>".substr($row['ExpDesc'], 0, 25)."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."";
$PDD = $row['PurchDate'];

list($year, $month, $day) = explode('-', $row['PurchDate']);
echo "<br>".$day.'/'.$month.'/'. $year."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";
$PIV = number_format($PEX*1.15 , 2, '.', '');
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

}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "<th>".$row['Category']."</th>";
//echo "<th>".$row['Source']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
  
?>
<br>
