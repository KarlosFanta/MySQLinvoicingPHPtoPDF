<?php
	require_once("inc_OnlineStoreDB.php");

?> 
<style type="text/css">
   <!-- table.form{width:100%}
    td.label{width:7px;white-space:nowrap;}
    td input{width:100%;}-->
</style>

<b><br><font size = "4" type="arial">View Expenses</b></font>&nbsp;&nbsp;&nbsp;&nbsp;>viewExpLatest.php
</br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>


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
echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstring = "select * from expenses  where PurchDate >= '$date' order by PurchDate";



$SQLstring = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo 
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate,b.ProdCostExVAT, b.Notes, b.CustNo 
  FROM expensesH b     order by PurchDate desc limit 25"; //limit does not work without desc











//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;25 of the latest expenses:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>";


while ($row = mysqli_fetch_assoc($result)) 
{
$ProdCostExVAT = $row['ProdCostExVAT'];
$M14 = number_format($ProdCostExVAT*1.14, 2, '.', '');
$M15 = number_format($ProdCostExVAT*1.15, 2, '.', '');
echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."";
list($year, $month, $day) = explode('-', $row['PurchDate']);
echo "<br>".$day.'/'.$month.'/'. $year."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."<br><font size = 2>R".$M14."incl<br></font>R".$M15."incl</th>";
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

echo "</tr>";

}

mysqli_free_result($result);


}
echo "</table >";

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
?>


</body>
</html>

<?php
//	require_once('footer.php');		
?>