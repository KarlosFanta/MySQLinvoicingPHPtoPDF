<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "4" type="arial">View Expenses H & Exp</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpHEandExp.php
</br>
<a href = 'viewExpHEandExpD.php'>viewExpHEandExpD by Date</a></br>
<a href = 'viewExpHEandExpK.php'>viewExpHEandExpK by Category</a></br>
<a href = 'viewExpHEandExpSP.php'>viewExpHEandExpSP by SupCode</a></br>
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
//$date = date('Y-m-d',time()-(88*86400)); // 88 days ago
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
  FROM expensesE c      order by PurchDate desc";

  
  $SQLstring = "SELECT a.ExpNo,  a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo , a.Category,a.InvNo, 'expenses' as Source
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate, b.ProdCostExVAT, b.Notes, b.CustNo , b.Category, b.InvNo, 'expensesH' as Source
  FROM expensesH b     
UNION ALL
SELECT c.ExpNo, c.ExpDesc, c.SerialNo, c.SupCode, c.PurchDate, c.ProdCostExVAT, c.Notes, c.CustNo , c.Category, c.InvNo,  'expensesE' as Source
  FROM expensesE c      order by PurchDate desc";
  
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
echo "<th>inVAT</th>";
echo "<th>InvNo</th>";

echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>Category</th>\n";
echo "<th>TN</th>\n";
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

echo "<th>Exp".$row['ExpNo']."</th>";
echo "<th>".substr($row['ExpDesc'], 0, 25)."</th>";
echo "<th>".$row['SupCode']."</th>";
//echo "<th>".$row['PurchDate']."</th>";
echo "<th>".$row['PurchDate']."";
$PDD = $row['PurchDate'];

list($year, $month, $day) = explode('-', $row['PurchDate']);
echo "<br>".$day.'/'.$month.'/'. $year."";
echo "<br>".$day.' '.$month.' '. $year."";
echo "<br>*".' '.$month.' '. $year."";
if ($month == '01')
	$monthm = 'Jan';
else if ($month == '02')
	$monthm = 'Feb';
else if ($month == '03')
	$monthm = 'Mar';
else if ($month == '04')
	$monthm = 'Apr';
else if ($month == '05')
	$monthm = 'May';
else if ($month == '06')
	$monthm = 'Jun';
else if ($month == '07')
	$monthm = 'Jul';
else if ($month == '08')
	$monthm = 'Aug';
else if ($month == '09')
	$monthm = 'Sep';
else if ($month == '10')
	$monthm = 'Oct';
else if ($month == '11')
	$monthm = 'Nov';
else if ($month == '12')
	$monthm = 'Dec';
$yeary = substr($year, 2);
echo "<br>".$day.''.$monthm.''. $year."</th>";

//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
@$PIV = number_format($PEX*1.14 , 2, '.', '');
@$PIVb = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";
echo "<th>".$PIVb."</th>";
echo "<th>".@$row['InvNo'];
if (@$row['InvNo'] == "")
	echo "no InvNo";
echo "</th>";
echo "<th>".chunk_split($row['Notes'], 15, '<br>')."</th>";

$CCCC = '';
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

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
  
?>
<br>
<br><a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<br><a href = 'viewExpEmyeditbasic.php'>viewExpEmyeditbasic.php</a></br>
<br>
<?php
$SQLstring = "select * from expensesE  order by ExpNo  desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='4' bordercolor = blue>\n";
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
echo "<th>Catgory</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{
echo "<th>Exp".$row['ExpNo']."</th>";
echo "<th>".substr($row['ExpDesc'], 0, 25)."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>testss</th>";
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

}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "<th>".$row['Category']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}


?>

</body>
</html>

<?php
//	require_once('footer.php');		
?>