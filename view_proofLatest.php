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
<b><br><font size = "4" type="arial">View Proofs</b></font>&nbsp;&nbsp;&nbsp;&nbsp;view_proofLatest.php
</br>



<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
//$SQLstringAp = "select * from aproof  where ProofDate > 2012-06-04 ";
//$SQLstringAp = "select * from aproof  where ProofDate > 2012-06-04 ";
//$SQLstringAp = "select * from aproof  where ProofDate > '2013-01-24' ";
//$SQLstringAp = "select * from aproof  where ProofDate = '2013-01-01' ";
//$SQLstringAp = "SELECT * FROM aproof WHERE date >= CURRENT_DATE() ORDER BY score DESC ";
//SELECT * FROM aproof WHERE date >= CURRENT_DATE() ORDER BY score DESC;
//echo "____".WEEKOFYEAR(date);
//echo "______".WEEKOFYEAR(NOW())-1;
$date = date('Y-m-d',time()-(14*86400)); // 14 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
echo "ddd".$date;
//$SQLstringAp = "select * from aproof  where ProofDate WHERE date <='$date'";
$SQLstringAp = "select * from aproof  where ProofDate >= '$date' order by ProofDate";
//$SQLstringAp = "select * from aproof  where ProofNo >  (select Max(ProofNo) from aproof) -14 order by ProofDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Any proofs of 14 days ago:";
//$SQLstringAp = "select * from aproof  where ProofDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstringAp."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryresultAp.

//$QueryresultAp = @mysql_query($SQLstringAp, $DBConnect);
  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

$resultAp = $DBConnect->query($SQLstringAp);

while($rowAp = $resultAp->fetch_array())
{
$rowAps[] = $rowAp;   //if undeclred means no proofs have occured within the last 8? days.
}
echo "<table  border='1' >\n";
echo "<tr><th>ProofNo</th>";
echo "<th>ProofDate&nbsp;&nbsp;</th>";
echo "<th>Customer</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>";
echo "<th>Amt</th>";
echo "<th>Notes</th>\n";
echo "<th>InvNoA</th>\n";
echo "<th>InvNoAincl</th>\n";
echo "<th>InvNoB</th>\n";
echo "<th>InvNoBincl</th>\n";
echo "<th>InvNoC</th>\n";
echo "<th>InvNoCincl</th>";
echo "</tr>\n";

foreach($rowAps as $rowAp)
{
echo "<tr><th>".$rowAp['ProofNo']."</th>";
$D1 = explode("-", $rowAp['ProofDate']);
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
echo "<font  color = browApn><b>";
echo "{$EDate}</b></th>";//ProofDate

 //echo "<th>".$rowAp['CustNo']."</th>";

///while ($rowApC = $resultApC->fetch_rowAp()) {
   //  printf ("%s (%s)\n", $rowAp[0], $rowAp[1]);
//	$x = $rowAp[0];
//	echo "<th>x: ".$x."</th>";
$CN = $rowAp['CustNo'];
	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringApLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringApLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryresultAp.
$resultAp2 = $DBConnect->query($SQLstringApLN);

   while ($rowAp2 = $resultAp2->fetch_row()) {
   $shortened = substr($rowAp2[0], 0, 6);
      $shortenedFN = substr($rowAp2[1], 0, 3);
     // echo "<th>{$rowAp2[0]}</th>";//CustLN
   echo "<th align = left>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}



   $shortenedSDR = substr($rowAp['CustSDR'], 0, 30);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$rowAp['Amt']}</th>";//TotAmt or AmtPaid




   $shortenedNotes = substr($rowAp['Notes'], 0, 15);

echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes




//echo "<th>".$rowAp['ProofNo']."</th>";
//echo "<th>".$rowAp['ProofDate']."</th>";
//echo "<th>".$rowAp['Amt']."</th>";
//echo "<th>".$rowAp['Notes']."</th>";
echo "<th>".$rowAp['InvNoA']."</th>";
echo "<th>".$rowAp['InvNoAincl']."</th>";
echo "<th>".$rowAp['InvNoB']."</th>";
echo "<th>".$rowAp['InvNoBincl']."</th>";
echo "<th>".$rowAp['InvNoC']."</th>";
echo "<th>".$rowAp['InvNoCincl']."</th>";
echo "<th>".$rowAp['InvNoD']."</th>";
echo "<th>".$rowAp['InvNoDincl']."</th>";
echo "<th>".$rowAp['InvNoE']."</th>";
echo "<th>".$rowAp['InvNoEincl']."</th>";
echo "<th>".$rowAp['Priority']."</th>";
echo "<th>".$rowAp['PMethod']."</th>";
echo "<th>".$rowAp['CustSDR']."</th>";

}
echo "</tr></table >";

/* free resultAp set */
$resultAp->close();

/* close connection */
//$mysqli->close();

?>


</body>
</html>

<?php
//require_once 'footer.php';
?>
