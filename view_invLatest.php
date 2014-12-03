<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
			

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
<?php //require_once "header.php"; ?>
<b><br><font size = "4" type="arial">View Invoices</b></font>&nbsp;&nbsp;&nbsp;&nbsp;view_invLatest.php
</br>



<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
//$SQLstringAp = "select * from invoice  where InvDate > 2012-06-04 ";
//$SQLstringAp = "select * from invoice  where InvDate > 2012-06-04 ";
//$SQLstringAp = "select * from invoice  where InvDate > '2013-01-24' ";
//$SQLstringAp = "select * from invoice  where InvDate = '2013-01-01' ";
//$SQLstringAp = "SELECT * FROM invoice WHERE date >= CURRENT_DATE() ORDER BY score DESC ";
//SELECT * FROM invoice WHERE date >= CURRENT_DATE() ORDER BY score DESC;  
//echo "____".WEEKOFYEAR(date);
//echo "______".WEEKOFYEAR(NOW())-1; 
$date = date('Y-m-d',time()-(14*86400)); // 14 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
echo "ddd".$date;
//$SQLstringAp = "select * from invoice  where InvDate WHERE date <='$date'";
$SQLstringAp = "select * from invoice  where InvDate >= '$date' order by InvDate";
//$SQLstringAp = "select * from invoice  where InvNo >  (select Max(InvNo) from invoice) -14 order by InvDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;Any invoices of 14 days ago:";
//$SQLstringAp = "select * from invoice  where InvDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstringAp."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryresultInn.

//$QueryresultInn = @mysql_query($SQLstringAp, $DBConnect);
  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

$resultInn = $DBConnect->query($SQLstringAp);

while($rowInvv = $resultInn->fetch_array())
{
$rowInvvs[] = $rowInvv;   //if undeclred means no invoices have occured within the last 8? days.
}
echo "<table  border='1' >\n";
echo "<tr><th>InvNo</th>";
echo "<th>InvDate&nbsp;&nbsp;</th>";
echo "<th>Customer</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>";
echo "<th>TotAmt</th>";
echo "<th>Summary</th>\n";
echo "<th>InvNoA</th>\n";
echo "<th>InvNoAincl</th>\n";
echo "<th>InvNoB</th>\n";
echo "<th>InvNoBincl</th>\n";
echo "<th>InvNoC</th>\n";
echo "<th>InvNoCincl</th>";
echo "</tr>\n";

foreach($rowInvvs as $rowInvv)
{
echo "<tr><th>".$rowInvv['InvNo']."</th>";
$D1 = explode("-", $rowInvv['InvDate']);
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
echo "<font  color = browInvvn><b>";
echo "{$EDate}</b></th>";//InvDate

 //echo "<th>".$rowInvv['CustNo']."</th>";

///while ($rowInvvC = $resultInnC->fetch_rowInvv()) {
   //  printf ("%s (%s)\n", $rowInvv[0], $rowInvv[1]);
//	$x = $rowInvv[0];
//	echo "<th>x: ".$x."</th>";
$CN = $rowInvv['CustNo'];
	//echo "<th>tmpCN: ".$CN."</th>";
$SQLstringApLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringApLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryresultInn.
$resultInn2 = $DBConnect->query($SQLstringApLN);


   while ($rowInvv2 = $resultInn2->fetch_row()) {
   $shortened = substr($rowInvv2[0], 0, 6);
      $shortenedFN = substr($rowInvv2[1], 0, 3);
     // echo "<th>{$rowInvv2[0]}</th>";//CustLN
   echo "<th align = left>{$shortenedFN}{$shortened}</th>";//CustLN
//short version of firstname and Surname
}



   $shortenedSDR = substr($rowInvv['SDR'], 0, 30);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR



echo "<th align = right>{$rowInvv['TotAmt']}</th>";//TotAmt or AmtPaid




   $shortenedSummary = substr($rowInvv['Summary'], 0, 15);

echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedSummary}</th>\n";//Summary




//echo "<th>".$rowInvv['InvNo']."</th>";
//echo "<th>".$rowInvv['InvDate']."</th>";
//echo "<th>".$rowInvv['Amt']."</th>";
//echo "<th>".$rowInvv['Summary']."</th>";
echo "<th>".$rowInvv['D1']."</th>";
echo "<th>".$rowInvv['Q1']."</th>";
echo "<th>".$rowInvv['ex1']."</th>";
echo "<th>".$rowInvv['D2']."</th>";
echo "<th>".$rowInvv['Q2']."</th>";
echo "<th>".$rowInvv['ex2']."</th>";
echo "<th>".$rowInvv['D3']."</th>";
echo "<th>".$rowInvv['Q3']."</th>";
echo "<th>".$rowInvv['ex3']."</th>";
echo "<th>".$rowInvv['D4']."</th>";
echo "<th>".$rowInvv['ex4']."</th>";
echo "<th>".$rowInvv['Summary']."</th>";
echo "<th>".$rowInvv['Draft']."</th>";


}
echo "</tr></table >";

/* free resultInn set */
$resultInn->close();

/* close connection */
//$mysqli->close();




 
?>


</body>
</html>

<?php
//	require_once('footer.php');		
?>
