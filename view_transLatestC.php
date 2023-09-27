<?php

	
	//	require_once('login_check.php');
	require_once("inc_OnlineStoreDB.php");
	
?>
<b><br><font size = "3" type="arial">View Customer's Latest Transactions</b></font>&nbsp;&nbsp;&nbsp;&nbsp;view_transLatestC.php <a href= 'edit_transCQ.php'>edit_transCQ.php</a> <a href= 'view_trans_all.php'>view_trans_all.php</a>
</br>


<?php

	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringTRLN = "select CustFN, CustLN from customer where CustNo = $CustInt";
//echo $SQLstringTRLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

if ($result2 = mysqli_query($DBConnect, $SQLstringTRLN)) {
	while ($row2 = mysqli_fetch_assoc($result2)) {
//	$CustNo = $row2["CustNo"];//case sensitive!
	$CustLN =  $row2["CustLN"];//case sensitive!
	$CustFN = $row2["CustFN"];//case sensitive!

 //  $shortened = substr($row2[0], 0, 6);
 //     $shortenedFN = substr($row2[1], 0, 5);
	}
	mysqli_free_result($result2);
}


	echo $CustInt." ";
	print "_".$CustFN." ".$CustLN;








//$SQLstringTR = "SELECT * FROM transaction WHERE date >= CURRENT_DATE() ORDER BY score DESC ";
//SELECT * FROM transaction WHERE date >= CURRENT_DATE() ORDER BY score DESC;  
//echo "____".WEEKOFYEAR(date);
//echo "______".WEEKOFYEAR(NOW())-1; 
$date = date('Y-m-d',time()-(35*86400)); // 35 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
echo "ddd".$date;
//$SQLstringTR = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstringTR = "select * from transaction  where TransDate >= '$date' order by TransDate desc";
$SQLstringTR = "select * from transaction  order by TransDate desc limit 10"; //works best
$SQLstringTR = "select * from transaction   where CustNo = $CustInt order by TransDate desc, TransNo desc limit 19"; //works even better- finally!!

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
echo $SQLstringTR."<br><br>"; //whole content of  table is now require_onced in a PHP array with  name $QueryResult.

//$QueryResult = @mysql_query($SQLstringTR, $DBConnect);


if ($resultC = mysqli_query($DBConnect, $SQLstringTR)) {
echo "<table border='1'>\n";
echo "<tr><th>TrNo</th>";
echo "<th>TransDate</th>";
//echo "<th>Customer</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>";
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
echo "<th>InvNoF</th>\n";
echo "<th>incl</th>";
echo "</tr>";
 
while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th>".$row["TransNo"]."</th>";//CustNo is case senSitiVe
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
if ($EDate == "03/01/2012")
echo "<font size = 5 color = orange><b>";

$arr2 = str_split($DDD, 1);
if ($arr2[1]== '2')
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

echo "{$EDate}</b></font></th>";//TransDate

 ///while ($rowC = $resultC->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);
//	$x = $row[0];
//	echo "<th>x: ".$x."</th>";
$CN = @$row['CustNo'];
if ($CN == '')
$CN = $CNN;
if ($CN == '')
$CN = '301';



$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
echo "<th>&nbsp;{$shortenedSDR}</th>\n";//SDR
$AP = $row['AmtPaid'];
echo "<th align = right>{$row['AmtPaid']}</th>";//TotAmt or AmtPaid
$shortenedNotes = substr($row['Notes'], 0, 30);
echo "<th align = left >&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes

$IA = 0;
$InvNoA = $row['InvNoA'];
echo "<th>".$InvNoA."<br>";
$SQLIA = "select Summary, TotAmt, InvDate from invoice where InvNo = $InvNoA";
//echo "SQLIA".$SQLIA."<br>";
if ($resultIA = mysqli_query($DBConnect, $SQLIA)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;
echo $rowIA["InvDate"];

$IA = $rowIA["TotAmt"];
$YYYYY = $row['InvNoAincl'];
$zzzzz = $rowIA["TotAmt"];
$diffff = ($row['InvNoAincl'] != $rowIA["TotAmt"]);
if ($row['InvNoAincl'] != $rowIA["TotAmt"])
	echo "ERROR!!difference is R$diffff";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>R";
echo $row['InvNoAincl']."</th>";

$IB = 0;
$InvNoB = $row['InvNoB'];
echo "<th>".$InvNoB."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoB";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$IB = $rowIA["TotAmt"];
if ($row['InvNoBincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoBincl'] != 0)
echo "R".$row['InvNoBincl'];
echo "</th>";

$IC = 0;
$InvNoC = $row['InvNoC'];
echo "<th>".$InvNoC."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoC";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$IC = $rowIA["TotAmt"];

if ($row['InvNoCincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoCincl'] != 0)
echo "R".$row['InvNoCincl'];
echo "</th>";


$ID = 0;
$InvNoD = $row['InvNoD'];
echo "<th>".$InvNoD."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoD";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$ID = $rowIA["TotAmt"];

if ($row['InvNoDincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoDincl'] != 0)
echo "R".$row['InvNoDincl'];
echo "</th>";

$IE = 0;
$InvNoE = $row['InvNoE'];
echo "<th>".$InvNoE."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoE";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$IE = $rowIA["TotAmt"];

if ($row['InvNoEincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoEincl'] != 0)
echo "R".$row['InvNoEincl'];
echo "</th>";


$IF = 0;
$InvNoF = $row['InvNoF'];
echo "<th>".$InvNoF."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoF";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$IF = $rowIA["TotAmt"];
if ($row['InvNoFincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoFincl'] != 0)
echo "R".$row['InvNoFincl'];
echo "</th>";



$IG = 0;
$InvNoG = $row['InvNoG'];
echo "<th>".$InvNoG."<br>";
$SQLIB = "select Summary, TotAmt from invoice where InvNo = $InvNoG";
if ($resultIA = mysqli_query($DBConnect, $SQLIB)) {
while ($rowIA = mysqli_fetch_assoc($resultIA)) {
$Summary = $rowIA["Summary"];
$Summary = chop($Summary,"<br>");
str_replace("<br>","",$Summary);
echo $Summary;

$IG = $rowIA["TotAmt"];

if ($row['InvNoGincl'] != $rowIA["TotAmt"])
	echo "ERROR!!";
}
mysqli_free_result($resultIA);
}	
echo "</th><th>";
if ($row['InvNoGincl'] != 0)
echo "R".$row['InvNoGincl'];

if (($IA+$IB+$IC+$ID+$IE+$IF+$IG) != $AP)
echo "ERROR!!".$AP." ".($IA+$IB+$IC+$ID+$IE+$IF+$IG);



echo "m</th>";












//echo "<th>".$row['Priority']."</th>";
//echo "<th>".$row['TMethod']."</th>";
echo "</tr>\n";

}
//else
//	echo "no transactions within last ? days";
}


/*
foreach($rows as $row)
{
echo "<tr><th>".$row['TransNo']."</th>";
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
   echo "<th>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}


$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
echo "<th>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$row['AmtPaid']}</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($row['Notes'], 0, 19);

echo "<th align = left >&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes




//echo "<th>".$row['TransDate']."</th>";
//echo "<th>".$row['AmtPaid']."</th>";
//echo "<th>".$row['Notes']."</th>";
echo "<th>".$row['InvNoA']."</th>";
//echo "<th>testss</th>";
/*echo "<th>".$row['InvNoAincl']."</th>";
echo "<th>".$row['InvNoB']."</th>";
echo "<th>".$row['InvNoBincl']."</th>";
echo "<th>".$row['InvNoC']."</th>";
echo "<th>".$row['InvNoCincl']."</th>";
echo "<th>".$row['InvNoD']."</th>";
echo "<th>".$row['InvNoDincl']."</th>";
echo "<th>".$row['InvNoE']."</th>";
echo "<th>".$row['InvNoEincl']."</th>";
echo "<th>".$row['Priority']."</th>";
echo "<th>".$row['TMethod']."</th>";


}
echo "</tr><br></table >";


$result->close();

*/



 
?>
</table>
</font>