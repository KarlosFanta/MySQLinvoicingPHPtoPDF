<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
require_once 'inc_OnlineStoreDB.php';

?>
<b><br><font size = "4" type="arial">View Expenses H & Exp</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpHandExp.php
</br>
<a href = 'viewExp.php'>viewExp only</a></br>


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
$SQLstring = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate,b.ProdCostExVAT, b.Notes, b.CustNo
  FROM expensesH b      order by ExpNo";
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
echo "<th>ProdCostExVAT</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result))
//while($row = $result->fetch_array())
{

/*
foreach($rows as $row)
{
echo "<tr><th>".$row['TransNo']."</th>";
$D1 = explode("-", $row['PurchDate']);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];
$DDD =  $D1[2];
$arr2 = str_split($DDD, 1);
//echo $EDate;

echo "<th>";
if ($EDate == "03/01/2012")
echo "<font size = 5 color = orange><b>";
$arr2 = str_split($DDD, 1);
if ($arr2[1]== '2')
{
echo "<font  color = green><b>";
}
if ($arr2[1]== '4')
echo "<font  color = purple><b>";
if ($arr2[1]== '6')
echo "<font  color = blue><b>";
if ($arr2[1]== '8')
echo "<font  color = orange><b>";

if ($arr2[1]== '0')
echo "<font  color = brown><b>";
echo "{$EDate}</b></th>";//PurchDate

 //echo "<th>".$row['CustNo']."</th>";

///while ($rowC = $resultC->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);
//	$x = $row[0];
//	echo "<th>x: ".$x."</th>";
$CN = $row['CustNo'];
	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);

   while ($row2 = $result2->fetch_row()) {
   $shortened = substr($row2[0], 0, 6);
      $shortenedFN = substr($row2[1], 0, 3);
     // echo "<th>{$row2[0]}</th>";//CustLN
   echo "<th align = left>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}



   $shortenedSDR = substr($row['CustSDR'], 0, 30);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$row[3]}</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($row[4], 0, 15);

echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes


*/

echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
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
//require_once 'footer.php';
?>
