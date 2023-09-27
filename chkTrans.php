<?php

	
	//	require_once('login_check.php');
	require_once("inc_OnlineStoreDB.php");
echo "TransDate".$TransDate;
	
?>
<b><br><font size = "1" type="arial">chkTrans.php
</br>
<!--SDR: <input type="text" id="SDR" size = 34 name="SDR" value="<?php //echo $arraySDR;?>">
AmtPaid: <input type="text" id="AmtPaid" size = 7 name="AmtPaid" value="<?php //echo $AA;?>">
check if tranaction already done: chkTrans.php<br>-->
<?php

//NB NB  NB We need to take the date that was received.
//echo "ttttrrrr$TransDate";


echo "TransDate:".$TransDate;
$rest = substr($TransDate, -3, 1); // returns "d"

echo "1reest:".$rest."end<br>";
if ($rest == ' ')
{
$DD = explode(" ", $TransDate);
echo "space found";
}
else if ($rest == '.')
{
$DD = explode(".", $TransDate);
echo "dot found";
}
else
{
$DD = explode("/", $TransDate);
echo "fslash found";
}
echo $DD[2]."____";

echo $DD[0]."____";
echo $DD[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$TransDate2 = $DD[2]."-".$DD[1]."-".$DD[0];



$date = date_create($TransDate2);
date_sub($date, date_interval_create_from_date_string('100 days'));
//echo "DF:".date_format($date, 'Y-m-d');
$date2 = date_format($date, 'Y-m-d');

//$time = strtotime('2001-11-22    -2 days'); // 35 days ago
//$time = strtotime('$TransDate2   -2 days'); // 35 days ago
//$time = strtotime(strtotime($TransDate2)  -2 days'); // 35 days ago
//$date = date("Y-m-d", $time);

$date = DateTime::createFromFormat('Y-m-d',$TransDate2);

$date->modify('+1 month');
//echo $date->format('Y-m-d');
//$date = date('Y-m-d',time()-(35*86400)); // 35 days ago
//86400 seconds per day
//echo "ddd: ".$date2, " <<< <br>";
//$SQLstringTR = "select * from transaction  where TransDate WHERE date2 <='$date2'";
$SQLstringTR = "select * from transaction  where TransDate >= '$date2' order by TransDate desc";
$SQLstringTR = "select * from transaction  order by TransDate desc limit 10"; //works best
$SQLstringTR = "select * from transaction   where CustNo = $CustInt order by TransDate desc, TransNo desc limit 1"; //works even better- finally!!
$SQLstringTR = "select * from transaction   where AmtPaid = $AA and TransDate >= '$date2', TransNo desc limit 1"; //works even better- finally!!

//$AA4 =   number_format($AA,1,"","");
$AA2 = (int)$AA;
//$AA3 = $AA2.'.0';
//$AA4 = $AA2.'.00';
//$AA6 = number_format(2.10, 1);
//$AA3 =   number_format($AA,0,"",".");
//$AA3 =   number_format($AA,2,",",".");


//$SQLstringTR = "select * from transaction   where (AmtPaid LIKE $AA and TransDate >= '$date' ) and (AmtPaid LIKE $AA2 and TransDate >= '$date2') limit 3"; //works even better- finally!!
$SQLstringTR = "select * from transaction  where (AmtPaid LIKE '$AA2.%'  or AmtPaid LIKE '$AA2')  and TransDate >= '$date2'  order by TransDate desc limit 4 ";

//$SQLstringTR = "SELECT a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes, a.CustNo , a.InvNo FROM expenses a UNION ALL SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate,b.ProdCostExVAT, b.Notes, b.CustNo , b.Category FROM expensesH b order by ExpNo desc";

//$SQLstringTR = "select * from transaction UNION ALL select * from expensesH limit 19"; //works even better- finally!!

//$SQLstringTR = "SELECT t.TransNo, a.ExpNo, a.Category, a.ExpDesc, a.SerialNo, a.SupCode, a.PurchDate,a.ProdCostExVAT, a.Notes, a.CustNo , a.InvNo FROM expenses a UNION ALL SELECT b.ExpNo, b.Category, b.ExpDesc, b.SerialNo, b.SupCode, b.PurchDate,b.ProdCostExVAT, b.Notes, b.CustNo , b.Category FROM expensesH b order by ExpNo desc";


//$SQLstringTR = "select * from transaction  order by TransNo desc, TransDate limit 19"; //works but not what i want
//$SQLstringTR = "select * from transaction  order by TransDate desc, TransNo limit 19"; //
//$SQLstringTR = "select * from (select TransNo as yo from transaction order by TransNo) as tmp order TransDate desc limit 19"; //
//$SQLstringTR = "select * from transaction  order by TransDate desc";
//$SQLstringTR = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -35 order by TransDate";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;Any transactions of 35 days ago:";
//$SQLstringTR = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
//echo $SQLstringTR."<br><br>"; //whole content of  table is now require_onced in a PHP array with  name $QueryResult.

//$QueryResult = @mysql_query($SQLstringTR, $DBConnect);


if ($resultC = mysqli_query($DBConnect, $SQLstringTR)) {
echo "<table border='1'>\n";
echo "<tr><th></th><th>SIMILAR</th><th><font color = orange ></th><th> TRANSACTIONS</th><th> </th><th>chkTrans.php</font></th></tr>";
echo "<tr><th>TrNo</th>";
echo "<th>TransDate</th>";
echo "<th>Customer</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>";
echo "<th>AmtPaid</th>";
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
 
while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th><input type = text value='Tr".$row["TransNo"]."' size = 6></th>";//CustNo is case senSitiVe
//echo "<th>".$row["CustFN"]."</th>";//CustFN is case senSitiVe
//echo "<th>".$row["CustLN"]."</th>";//CustLN is case senSitiVe
$D1 = explode("-", $row['TransDate']);
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
//if ($EDate == "03/01/2012")
//echo "<font size = 5 color = orange><b>";

$arr2 = str_split($DDD, 1);
/*if ($arr2[1]== '2')
{
echo "<font  color = green><b>";
}
else
if ($arr2[1]== '4')
echo "<font  color = purple><b>";
else 
if ($arr2[1]== '6')
echo "<font  color = blue><b>";
else
if ($arr2[1]== '8')
echo "<font  color = orangeRed><b>";

else
if ($arr2[1]== '0')
echo "<font  color = brown><b>";

//else
//if ($arr2[1]== '1')
//echo "<font  color = pink><b>";

else
if ($arr2[1]== '2')
echo "<font  color = black><b>";

else
if ($arr2[1]== '3')
echo "<font  color = teal><b>";

else
if ($arr2[1]== '5')
echo "<font  color = red><b>";

else
if ($arr2[1]== '7')
echo "<font  color = SaddleBrown><b>";

else
if ($arr2[1]== '9')
echo "<font  color = SlateBlue><b>";
*/
$df = $row['TransDate'];
$TransDate = str_replace(' ', '/', $TransDate);
if ($TransDate == $EDate)
	echo "<font  color = red size =4>MAYBE ALREADY PROCESSED<br>THIS DAY:<br>";
//echo "<b>{$EDate}</b></font>";//TransDate

//echo "compare EDate $EDate with TransDate  $TransDate ";

if ($EDate == "02/03/2021")
	$EDate ="02 Mar 2021";


echo "<b>{$EDate}</b></font>";//TransDate

 ///while ($rowC = $resultC->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);
//	$x = $row[0];
//	echo "<th>x: ".$x."</th>";
$CN = @$row['CustNo'];
if ($CN == '')
$CN = $CNN;
if ($CN == '')
$CN = '301';


	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringTRLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringTRLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringTRLN);


   while ($row2 = $result2->fetch_row()) {
   $shortened = substr($row2[0], 0, 6);
      $shortenedFN = substr($row2[1], 0, 3);
	  //echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>if incorrect customer please click here</a></font><br><br>";
   echo "<th><a href = 'addTrans.php?AmtPaid=$AA&DA=$TransDate&CustNo=$CN&SDR=$arraySDR'>$CN</a>{$shortenedFN}{$shortened}</th>";//CustLN
//   echo "<th><a href = 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate&CustNo=$CN'>$CN</a>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}


$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
echo "<th>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$row['AmtPaid']}</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($row['Notes'], 0, 30);

echo "<th align = left >&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes




//echo "<th>".$row['TransDate']."</th>";
//echo "<th>".$row['AmtPaid']."</th>";
//echo "<th>".$row['Notes']."</th>";
echo "<th>".$row['InvNoA']."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['InvNoAincl']."</th>";
echo "<th>".$row['InvNoB']."</th>";
echo "<th>".$row['InvNoBincl']."</th>";
echo "<th>".$row['InvNoC']."</th>";
echo "<th>".$row['InvNoCincl']."</th>";
echo "<th>".$row['InvNoD']."</th>";
echo "<th>".$row['InvNoDincl']."</th>";
echo "<th>".$row['InvNoE']."</th>";
echo "<th>".$row['InvNoEincl']."</th>";
//echo "<th>".$row['Priority']."</th>";
//echo "<th>".$row['TMethod']."</th>";
echo "</tr>\n";

}

$resultC->close();
//else
//	echo "no transactions within last ? days";
echo "</tr></table >";
}






 
?>

</font>