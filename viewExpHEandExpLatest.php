<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php
	require_once("inc_OnlineStoreDB.php");
		$THELIMIT = 35;
	 
// !empty can be used instead of isset	 
	if (!empty($_GET["LIMIT"])) {
   $THELIMIT = $_GET['LIMIT'];    
}

		
?>
<b><br><font size = "4" type="arial">View Expenses H & Exp</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpHEandExpLatest.php LIMIT20
</br>
<a href = 'viewExpHEandExpLatest.php?LIMIT=50' target = _blank>LIMIT 50</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=100' target = _blank>LIMIT 100</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=200' target = _blank>LIMIT 200</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=500' target = _blank>LIMIT 500</a>
<a href = 'viewExpHEandExpLatest.php?LIMIT=1000' target = _blank>LIMIT 1000</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=2000' target = _blank>LIMIT 2000</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=3000' target = _blank>LIMIT 3000</a> 
<a href = 'viewExpHEandExpLatest.php?LIMIT=9999000' target = _blank>LIMIT 9999000</a> </br>

<a href = 'viewExpHEandExpCust.php'>viewExpHEandExpCust</a> all expenses of Customer</br>
<a href = 'viewExpHEandExpD.php'>viewExpHEandExpD by Date</a></br>
<a href = 'viewExp.php'>viewExp only</a></br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>
<a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<a href = 'viewExpHmyedit.php'>viewExpHmyedit</a></br>
<a href = 'UnassignedCustStk.php'>UnassignedCustStk</a></br>
<a href = 'viewExpSelectCatg.php'>viewExpSelectCatg</a></br>
<a href = 'viewExpHEandExpCategory.php'>viewExpHEandExpCategory</a></br>

<a href = '../phpmyadmin/#PMAURL-3:sql.php?db=kc&table=expensese&server=1&target='>phpMyadmin</a></br>

<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
//$SQLstring = "select * from transaction  where TransDate > 2012-06-04 ";
//$SQLstring = "select * from transaction  where TransDate > 2012-06-04 ";
//$SQLstring = "select * from transaction  where TransDate > '2013-01-24' ";
//$SQLstring = "select * from transaction  where TransDate = '2013-01-01' ";
//$SQLstring = "SELECT * FROM transaction WHERE date >= CURRENT_DATE() ORDER BY score DESC ";
//SELECT * FROM transaction WHERE date >= CURRENT_DATE() ORDER BY score DESC;  
//echo "____".WEEKOFYEAR(date);
//echo "______".WEEKOFYEAR(NOW())-1; 
$date = date('Y-m-d',time()-(70*86400)); // 88 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
///echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstring = "select * from expenses  order by ExpNo  desc";


$SQLstring = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo , a.InvNo
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate, b.ProdCostExVAT, b.Notes, b.CustNo , b.Category
  FROM expensesH b      order by ExpNo desc";


  $SQLstring = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo , a.InvNo, 'expenses' as Source
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate, b.ProdCostExVAT, b.Notes, b.CustNo , b.Category, 'expensesH' as Source
  FROM expensesH b     
UNION ALL
SELECT c.ExpNo, c.Category, c.ExpDesc, c.SerialNo, c.SupCode, c.PurchDate, c.ProdCostExVAT, c.Notes, c.CustNo , c.Category, 'expensesE' as Source
  FROM expensesE c      order by ExpNo desc";

  
  $SQLstring = "SELECT a.ExpNo,  a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo , a.Category,a.InvNo, 'expenses' as Source
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate, b.ProdCostExVAT, b.Notes, b.CustNo , b.Category, b.InvNo, 'expensesH' as Source
  FROM expensesH b     
UNION ALL
SELECT c.ExpNo, c.ExpDesc, c.SerialNo, c.SupCode, c.PurchDate, c.ProdCostExVAT, c.Notes, c.CustNo , c.Category, c.InvNo,  'expensesE' as Source
  FROM expensesE c      order by ExpNo desc LIMIT $THELIMIT";
  
  //$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
////////echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
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
echo "<th>InvNo</th>";

echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>Category</th>\n";
echo "<th>TableN</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{
echo "<th>ExpNo".$row['ExpNo']."</th>";
echo "<th>".substr($row['ExpDesc'], 0, 34)."</th>";
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
echo "<th>".@$row['InvNo']."</th>";
echo "<th>".chunk_split($row['Notes'], 15, '<br>')."</th>";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

$NN = $rowCC['CustLN'];
$NN = mb_substr($NN, 0, 8);
$NNN = $rowCC['CustFN'];
$NNN = mb_substr($NNN, 0, 5);
}
mysqli_free_result($resultCC);
}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
$CCCC = '';
$NN = '';
$NNN ='';
$HHH = $row['SerialNo'];
$HHH = str_replace("%20","<br>",$HHH);
echo "<th>".$HHH."</th>";
echo "<th>".$row['Category']."</th>";
echo "<th>".$row['Source']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);

}


  
?>
<br>
<br><a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<br><a href = 'viewExpEmyeditbasic.php'>viewExpEmyeditbasic.php</a></br>
