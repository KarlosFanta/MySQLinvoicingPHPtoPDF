<?php

	
	
	require_once("inc_OnlineStoreDB.php");
			
?>
viewExpHSameDay.php
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
$date = date('Y-m-d',time()-(88*86400)); // 88 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
//echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
//$SQLstring = "select * from expensesH where CustNo = $CustInt order by ExpNo  desc";
echo $PurchDate;
$Ep = explode("-", $PurchDate);


//$/PDprev = date('y-m-d', strtotime('-1 day', strtotime('$PurchDate')));
//$PDprev2  = date('y-m-d', strtotime('-2 day', strtotime('$PurchDate')));
//$PDnext =  date('y-m-d', strtotime('+1 day', strtotime('$PurchDate')));
//$PDnext2 =  date('y-m-d', strtotime('+2 day', strtotime('$PurchDate')));
$PDnext = new DateTime($PurchDate);
    $PDnext->modify('+1 day');
    $PD = $PDnext->format('y-m-d');
$PDnext2 = new DateTime($PurchDate);
 	$PDnext2->modify('+2 day');
    $PD2 = $PDnext2->format('y-m-d');

$PDprev = new DateTime($PurchDate);
 	$PDprev->modify('-1 day');
    $PDp = $PDprev->format('y-m-d');

$PDprev2 = new DateTime($PurchDate);
 	$PDprev2->modify('-2 day');
    $PDp2 = $PDprev2->format('y-m-d');

	
/*$EpDay = $Ep[2];
$EpM = $Ep[1];
//$PDprev  =  $Ep[0]."-".$Ep[1]."-".($EpDay - 1);
$PDprev2  =  $Ep[0]."-".$Ep[1]."-".($EpDay - 2);
$PDnext  =  $Ep[0]."-".$Ep[1]."-".($EpDay + 1);
$PDnext2  =  $Ep[0]."-".$Ep[1]."-".($EpDay + 2);
$PDnextmonth =  $Ep[0]."-".($EpM+1)."-01";
$PDprevmonth31 =  $Ep[0]."-".($EpM-1)."-31";
$PDprevmonth30 =  $Ep[0]."-".($EpM-1)."-30";
$PDprevmonth29 =  $Ep[0]."-".($EpM-1)."-29";
$PDprevmonth28 =  $Ep[0]."-".($EpM-1)."-28";
$PDprevmonth27 =  $Ep[0]."-".($EpM-1)."-27";
$PDprevmonth26 =  $Ep[0]."-".($EpM-1)."-26";
*/
$SQLstring = "select * from expensesH where PurchDate = '$PurchDate' or PurchDate = '$PD'   or PurchDate = '$PD2'  or PurchDate = '$PDp' or PurchDate = '$PDp2' order by PurchDate desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;All expensesH of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo "<br>".$SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
//echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>PurchDate</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>1.14</th>";
echo "<th>1.15</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{


echo "<th>Exp".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
//echo "<th>".$row['SupCode']."</th>";
$PurchDate = $row['PurchDate'];
$DDDD = explode("-", $PurchDate);

echo "<th>".$row['PurchDate']."</th>";
echo "<th>".$DDDD[2].'.'.$DDDD[1].'.'.$DDDD[0]."</th>";
echo "<th>".$DDDD[2].'/'.$DDDD[1].'/'.$DDDD[0]."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
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

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
?>


</body>
</html>

<?php
//	require_once('footer.php');		
?>