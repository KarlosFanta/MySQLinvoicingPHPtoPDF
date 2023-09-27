<title>copyExp</title>
<?php

	
	
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "4" type="arial">View Expenses</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExp.php
</br>
<a href = 'viewExpHEandExp.php' target='_blank'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php' target='_blank'>viewExpmyedit</a></br>
<a href = 'ExpCombo.php' target='_blank'>Home Expenses Extra Expenses and Work Expenses Combo</a></br>

<form name="AddExp" onsubmit="return formValidator()" action="copyExp2.php"   method="post">
<input type="submit" name="btn_submit" value="Select " style="width:300px;height:30px" />
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
echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstring = "select * from expenses  order by ExpNo  desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>InvNo</th>\n";
echo "<th>ExpNo</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{
	$D1='';
	$D1 = explode("-", $row['PurchDate']);
	$EDate = '';
$EDate = $D1[2]."/".$D1[1]."/".$D1[0];


echo "<th>";
echo "<input type='checkbox' value = '".$row['ExpNo']."' >" .$row['ExpNo']."</th><th>";
$CCCC = '';
$CCCC = $row['CustNo'];
if ($CCCC  == '300')
	echo "<font color = 'green'>";


echo "".chunk_split($row['ExpDesc'], 33, '<br>')."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."<br>".$EDate."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= 0;
$PEX= $row['ProdCostExVAT'];
$PIV = 0;
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".chunk_split($row['Notes'], 13, '<br>')."</th>";
$s = "SELECT * from customer where CustNo = '$CCCC'";
$NN = '';
$NNN = '';

if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = '';
$NNN = '';
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}
mysqli_free_result($resultCC);
}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";

//$SerialNo = $row['SerialNo']
$SerialNo = chunk_split($row['SerialNo'], 13, '<br>');

//join('-', str_split($str, 3))
echo "<th>".$SerialNo."</th>";
echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['ExpNo']."</th>";
	echo "</font>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
?>
</form>

</body>
</html>

<?php
//	require_once('footer.php');		
?>