<?php

	
	//	require_once('login_check.php');
	require_once("inc_OnlineStoreDB.php");
	

$SQLstringTR = "select * from transaction  order by TransNo desc limit 14"; 
//echo "</b>".$SQLstringTR;
echo "<a href='view_trans.php' target = _blank >>>View ALL Transactions<<</a> ";
echo "view_transLatestsortbyTrNo.php <a href = 'http://localhost/phpmyadmin/sql.php?db=kc&table=transaction&sql_query=SELECT+%2A+FROM+%60transaction%60%0AORDER+BY+%60transaction%60.%60TransNo%60++DESC&session_max_rows=25' target = '_blank'>phpmyadmin</a><br>"; //whole content of  table is now require_onced in a PHP array with  name $QueryResult.


if ($resultC = mysqli_query($DBConnect, $SQLstringTR)) {
echo "<table border='1'>\n";
echo "<tr><th>TrNo</th>";
echo "<th>TransDate</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>";
echo "<th>Customer</th>";
echo "<th>AmtPaid</th>";
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
echo "<th>".$row["TransNo"]."</th>";//CustNo is case senSitiVe
$D1 = explode("-", $row['TransDate']);

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];
$DDD =  $D1[2];
$arr2 = str_split($DDD, 1);

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

$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR


$CN = @$row['CustNo'];
if ($CN == '')
$CN = @$CNN;
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





echo "<th align = right>{$row['AmtPaid']}</th>";//TotAmt or AmtPaid
$yyy = $row['AmtPaid'];
//echo number_format("1000000",2)."<br>";
echo "<th align = right>".number_format($yyy ,2)."</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($row['Notes'], 0, 19);

echo "<th align = left >&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes

echo "<th>".$row['InvNoA']."</th>";
echo "<th>".$row['TMethod']."</th>";
echo "</tr>\n";

}
}


?>
</table>
</font>