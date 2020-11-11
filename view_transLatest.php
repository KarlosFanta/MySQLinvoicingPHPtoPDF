<?php


	//require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

?>
<style type="text/css">
   <!-- table.form{width:100%}
    td.label{width:7px;white-space:nowrap;}
    td input{width:100%;}-->
</style>

<!--<table border = 1 class="form">
    <tr>
        <td class="label">My label:</td>
        <td>yello</td>
    </tr>
</table>-->
<?php //require_once 'header.php'; ?>
<b><br><font size = "4" type="arial">View Transactions</b></font>&nbsp;&nbsp;&nbsp;&nbsp;view_transLatest.php
</br>



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
$date = date('Y-m-d',time()-(35*86400)); // 35 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstring = "select * from transaction  where TransDate >= '$date' order by TransDate desc";
$SQLstring = "select * from transaction  order by TransDate desc limit 10";
//$SQLstring = "select * from transaction  order by TransDate desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -35 order by TransDate";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;Any transactions of 35 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

$result = $DBConnect->query($SQLstring);

while($row = $result->fetch_array())
{
$rows[] = $row;   //if undeclred means no transactions have occured within the last 8? days.
}
echo "<table  border='1' >\n";
echo "<tr><th>TrNo</th>";
echo "<th>TransDate&nbsp;&nbsp;</th>";
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
echo "<th>incl</th>";
echo "<th>Py</th>";
echo "<th>TMethod</th>";
echo "</tr>\n";

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
echo "{$EDate}</b></th>";//TransDate

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


$CCSDR = $row['CustSDR'];
   $CCSDR = str_replace('%20', ' ', $CCSDR);
   $CCSDR = str_replace('&nbsp;', ' ', $CCSDR);
   $shortenedSDR = substr($CCSDR, 0, 30);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$row[3]}</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($row[4], 0, 15);

echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes




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
echo "<th>".$row['Priority']."</th>";
echo "<th>".$row['TMethod']."</th>";

}
echo "</tr></table >";

$result->close();

/* close connection */
//$mysqli->close();

?>


</body>
</html>

<?php
//require_once 'footer.php';
?>
