
<?php
//echo "<br>A1: ".$array[1]." "; //sdr  chk view_Unpaid_inv_by_cust2bAT.php
//let's look at the amount paid: $AA
//echo "Amount Paid: R$AA";
//$SQLstringTR = "select * from transaction  where TransDate >= '$date2' order by TransDate desc";
$SQLstringTR = "select * from transaction  where AmtPaid LIKE '$AA' order by TransDate desc Limit 3";
//echo $SQLstringTR."<br><br>"; 


if ($resultC = mysqli_query($DBConnect, $SQLstringTR)) {
	
if (mysqli_num_rows($resultC)>0)
{
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
}
else echo "No similar transactions found.<br>";
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
	echo "<font  color = red size =2>MAYBE ALREADY PROCESSED<br>THIS DAY:<br>";
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
if (mysqli_num_rows($resultC)>0)
echo "</tr></table >";

$resultC->close();
//else
//	echo "no transactions within last ? days";
}






 
?>test

</font>