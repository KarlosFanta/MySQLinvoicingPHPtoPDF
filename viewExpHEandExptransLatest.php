<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "2" type="arial">View Expenses H & Exp & lastest Trans</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpHEandExptransLatest.php
</br>
<a href = 'viewExp.php'>viewExp only</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'UnassignedCustStk.php'>UnassignedCustStk</a></br>

<?php


$date = date('Y-m-d',time()-(88*86400)); // 88 days ago
//echo "ddd".$date;
/*$SQLstring = "select * from expenses  order by ExpNo  desc";

$SQLstring = "select * from transaction  order by TransDate desc, TransNo desc limit 19"; //works even better- finally!!

$SQLstring = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes,	a.CustNo , a.InvNo
  FROM expenses a
UNION ALL
SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate,b.ProdCostExVAT, b.Notes, b.CustNo , b.Category
  FROM expensesH b
UNION ALL
select t.TransNo, t.CustNo, t.TransDate, t.AmtPaid, t.Notes from transaction t order by TransDate desc, TransNo desc limit 19

  order by a.PurchDate, b.PurchDate, t.TransDate desc";
  
  $SQLstring = "
 SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate, a.ProdCostExVAT, a.Notes, a.CustNo, a.InvNo
FROM expenses a
UNION ALL SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate, b.ProdCostExVAT, b.Notes, b.CustNo, b.Category
FROM expensesH b
UNION ALL SELECT t.TransNo, t.TMethod, t.Notes, t.InvNoA, t.InvNoAincl, t.TransDate, t.AmtPaid, t.InvNoB, t.InvNoBincl, t.CustNo
FROM transaction t
ORDER BY PurchDate DESC
LIMIT 0 , 15 
  ";
*/
$SQLstring = "SELECT t.TransNo, t.TransDate, t.CustNo, t.CustSDR, t.AmtPaid,  t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod
FROM transaction t
UNION ALL SELECT a.ExpNo,  a.PurchDate, a.CustNo,a.ExpDesc, a.ProdCostExVAT, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo
FROM expenses a
UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc, b.ProdCostExVAT, b.Notes,b.SerialNo, b.SupCode, b.Category,  b.Category
FROM expensesH b
ORDER BY TransDate DESC , TransNo DESC
LIMIT 25 ";




$SQLstring = "SELECT t.TransNo, t.TransDate, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as CC, t.CustSDR, t.AmtPaid, t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod
FROM transaction t
UNION ALL SELECT a.ExpNo,  a.PurchDate, a.CustNo,a.ExpDesc, a.ProdCostExVAT, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo
FROM expenses a
UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc, b.ProdCostExVAT, b.Notes,b.SerialNo, b.SupCode, b.Category,  b.Category
FROM expensesH b
ORDER BY TransDate DESC , TransNo DESC
LIMIT 15 ";





$SQLstring = "SELECT t.TransNo, t.TransDate, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as CC, t.CustSDR, t.AmtPaid, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2,  t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod
FROM transaction t
UNION ALL SELECT a.ExpNo,  a.PurchDate, a.CustNo,a.ExpDesc, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2, a.ProdCostExVAT, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo
FROM expenses a
UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc,  (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2,b.ProdCostExVAT, b.Notes,b.SerialNo, b.SupCode, b.Category,  b.Category
FROM expensesH b
ORDER BY TransDate DESC , TransNo DESC
LIMIT 15 ";
  

  
$SQLstring = "SELECT t.TransNo, t.TransDate, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as CC, t.CustSDR, t.AmtPaid, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2, t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod
FROM transaction t
UNION ALL SELECT a.ExpNo,  a.PurchDate, a.CustNo,a.ExpDesc, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2, a.ProdCostExVAT, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo
FROM expenses a
UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc, b.ProdCostExVAT, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as AmtPaid2,  b.Notes,b.SerialNo, b.SupCode, b.Category,  b.Category
FROM expensesH b
ORDER BY TransDate DESC , TransNo DESC
LIMIT 15 ";
  
$SQLstring = "  SELECT t.TransNo, t.TransDate, (SELECT g.CustFN from customer g where CustNo = t.CustNo) as CC, t.CustSDR,  t.AmtPaid/1.14 as AP, t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod FROM transaction t UNION ALL SELECT a.ExpNo, a.PurchDate, a.CustNo,a.ExpDesc,  CONCAT('-',a.ProdCostExVAT) as AmtPaid2, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo FROM expenses a UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc, CONCAT('-', b.ProdCostExVAT) as AmtPaid2, b.Notes,b.SerialNo, b.SupCode, b.Category, b.Category FROM expensesH b  UNION ALL SELECT c.ExpNo, c.PurchDate, c.CustNo, c.ExpDesc, CONCAT('-', c.ProdCostExVAT) as AmtPaid2, c.Notes,c.SerialNo, c.SupCode, c.Category, c.Category FROM expensesE c ORDER BY TransDate DESC , TransNo DESC LIMIT 15 ";

$SQLstring = "  SELECT t.TransNo, t.TransDate, t.CustNo, t.CustSDR,  t.AmtPaid/1.14 as AP, t.Notes, t.InvNoA, t.InvNoB, t.InvNoC, t.TMethod FROM transaction t UNION ALL SELECT a.ExpNo, a.PurchDate, a.CustNo,a.ExpDesc,  CONCAT('-',a.ProdCostExVAT) as AmtPaid2, a.Notes, a.SerialNo, a.SupCode, a.Category, a.InvNo FROM expenses a UNION ALL SELECT b.ExpNo, b.PurchDate, b.CustNo, b.ExpDesc, CONCAT('-', b.ProdCostExVAT) as AmtPaid2, b.Notes,b.SerialNo, b.SupCode, b.Category, b.Category FROM expensesH b  UNION ALL SELECT c.ExpNo, c.PurchDate, c.CustNo, c.ExpDesc, CONCAT('-', c.ProdCostExVAT) as AmtPaid2, c.Notes,c.SerialNo, c.SupCode, c.Category, c.Category FROM expensesE c ORDER BY TransDate DESC , TransNo DESC LIMIT 85 ";
  
echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
echo "&nbsp;&nbsp;&nbsp;<textarea  style='white-space:pre-wrap; height:17px;font-family:arial;width:550px;font-size: 9pt'  cols='70'>".$SQLstring."</textarea>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

$result = $DBConnect->query($SQLstring);

while($row = $result->fetch_array())
{
$rows[] = $row;   //if undeclred means no transactions have occured within the last 8? days.
}
echo "<table  border='1' >";
echo "<tr><th>TrNo</th>";
echo "<th>TransDate&nbsp;&nbsp;</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>ex VAT</th>";
echo "<th>in VAT</th>\n";
echo "<th>Notes</th>\n";
echo "<th>InvNoA</th>\n";
echo "<th>incl</th>\n";
echo "<th>InvNoB</th>\n";
echo "<th>incl</th>\n";
echo "<th>InvNoC</th>\n";
echo "<th>incl</th>\n";
echo "<th>InvNoD</th>\n";
echo "<th>incl</th>\n";
echo "<th>InvNoE</th>\n";
echo "<th>incl</th>\n";
echo "<th>Py</th>\n";
echo "<th>TMethod</th>";
echo "</tr>";

foreach($rows as $row)
{
echo "<tr><th>Tr".$row['TransNo']."</th>";
$D1 = explode("-", $row['TransDate']);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";


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
echo "{$EDate}</b></font></th>";//TransDate

 ///while ($rowC = $resultC->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);
//	$x = $row[0];
//	echo "<th>x: ".$x."</th>";
//$CN = substr($row['CC'], 0, 16);
//$CN2 = substr($row['CC'], 16, 32);
	//echo "<th>tmpCN: ".$CN."</th>";
/*$SQLstringLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);


   while ($row2 = $result2->fetch_row()) {
   $shortened = substr($row2[0], 0, 6);
      $shortenedFN = substr($row2[1], 0, 3);
   echo "<th>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}
*/

$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
   echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR

   
   $CN = @$row['CustNo'];
if ($CN == '')
//$CN = $CNN;
if ($CN == '')
$CN = '301';


	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringTRLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringTRLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringTRLN);
//echo "<th>".$SQLstringTRLN."</th>";

  while ($row2 = $result2->fetch_row()) {
   $shortened = substr($row2[0], 0, 6);
      $shortenedFN = substr($row2[1], 0, 3);
   echo "<th>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}


   
   
   
//	echo "<th align = left>&nbsp;".$CN."<br>".$CN2."</th>";

//$Appp = number_format($row['AmtPaid'], 2); 
$AA = $row['AP'];
//echo "<br><br>AA:$AA";
if ($AA == '')
{
	echo "possible error: no value";
$AA = 0.0;
}
$AA = floatval($AA);
$Appp = number_format($AA, 2, '.', ''); 

echo "<th align = right></b><font color=grey>$Appp<b></font></th>";//TotAmt or AmtPaid ex VAT
$Appp=number_format($Appp*1.14, 2, '.', '');
echo "<th align = right>$Appp</th>";//TotAmt or AmtPaid  inVAT inclVAT
//echo "<th align = right>".$row['AmtPaid2']."</th>";//TotAmt or AmtPaid
//echo "<th align = right>{$row['AmtPaid']}</th>";//TotAmt or AmtPaid
//echo "<th align = right>{number_format($row['AmtPaid'], 2)}</th>";//TotAmt or AmtPaid



   $shortenedNotes = substr($row['Notes'], 0, 19);

echo "<th align = left >&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes




//echo "<th>".$row['TransDate']."</th>";
//echo "<th>".$row['AmtPaid']."</th>";
//echo "<th>".$row['Notes']."</th>";
echo "<th>".$row['InvNoA']."</th>";
//echo "<th>testss</th>";
//echo "<th>".$row['InvNoAincl']."</th>";
echo "<th>".$row['InvNoB']."</th>";
//echo "<th>".$row['InvNoBincl']."</th>";
echo "<th>".$row['InvNoC']."</th>";
//echo "<th>".$row['InvNoCincl']."</th>";
// "<th>".$row['InvNoD']."</th>";
//echo "<th>".$row['InvNoDincl']."</th>";
//echo "<th>".$row['InvNoE']."</th>";
//echo "<th>".$row['InvNoEincl']."</th>";
//echo "<th>".$row['Priority']."</th>";
echo "<th>".$row['TMethod']."</th>";


}
echo "</tr><br></table >";


$result->close();


?>

