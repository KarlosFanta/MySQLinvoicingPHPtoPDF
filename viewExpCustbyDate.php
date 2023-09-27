<?php

	
	
	require_once("inc_OnlineStoreDB.php");
if (@$CustInt == '')
{
@session_start();
//if(isset($_SESSION['CustNo']) && !empty($_SESSION['CustNo'])) 
//{
  // echo 'Set and not empty, and no undefined index error!';
 	$CustInt = '';
	$CustInt = @$_SESSION['CustNo'];
	//echo "CustInt loaded from session: ".$CustInt;
}
if (@$CustInt == '')
{
 	$CustInt = $CustNo;
	$_SESSION['CustNo'] = $CustInt;
	//echo "CustInt loaded from session: ".$CustInt;
}

			
?>
<b><br><font size = "4" type="arial">View Expenses of 


<?php 

$s = "SELECT * from customer where CustNo = '$CustInt'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

echo $rowCC['CustLN'];
echo " ".$rowCC['CustFN'];


}
mysqli_free_result($resultCC);
}


?>


</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpCustbyDate.php
</br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>


<?php


//@session_start();
//if(isset($_SESSION['CustNo']) && !empty($_SESSION['CustNo'])) 
//{
  // echo 'Set and not empty, and no undefined index error!';
// 	$CustInt = @$_SESSION['CustNo'];
	//echo "CustInt loaded from session: ".$CustInt;
  
   
//}
/*if (@$_SESSION['CustNo'] == "")
{
	$CustInt = @$_SESSION['CustNo'];
	echo "CustInt loaded from session: ".$CustInt;
}
else echo "noope";
*/

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
$SQLstring = "select * from expenses where CustNo = $CustInt order by PurchDate desc";

if($CustInt == 0)
	$SQLstring = "select * from expenses where CustNo = $CustInt UNION select * from expenses where CustNo = 300  order by ExpNo  desc";
	

//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

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
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{


echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
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

}
mysqli_free_result($resultCC);

}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files
echo "ybo";
//include "edit_invCQ.php"; //language error
echo "<br>";
//echo "ybo";include "view_inv_by_custBasic.php"; //overkill
 
?>


</body>
</html>
