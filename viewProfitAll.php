<title>
All Profits
</title>
<?php

	require_once('header.php');	
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
<b><br><font size = "4" type="arial">View Profits</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewProfitall.php
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
$date = date('Y-m-d',time()-(88*86400)); // 88 days ago
//$date = date('Y-m-d',time()-(24*86400)); // 24 days ago
//86400 seconds per day
echo "ddd".$date;
//$SQLstring = "select * from transaction  where TransDate WHERE date <='$date'";
$SQLstring = "select * from hprofits   order by ProfitNo desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;All profits:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ProfitNo</th>";
echo "<th>Amt&nbsp;&nbsp;</th>";
echo "<th>Date</th>";
//echo "<th>ProfitDesc</th>";
//echo "<th>ProfitNo</th>";
echo "<th>AccNo</th>\n";
//echo "<th>CustNo</th>\n";
echo "<th>&nbsp;&nbsp;&nbsp;PP ProfitDesc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{

/*
foreach($rows as $row)
{
echo "<tr><th>".$row['TransNo']."</th>";
$D1 = explode("-", $row['RecvdDate']);
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
echo "{$EDate}</b></th>";//RecvdDate

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
echo "<th>".$row['ProfitNo']."</th>";

//echo "<th>".$row['ProfitDesc']."</th>";
$PP= $row['ProfitDesc'];
$pieces1 = explode(" ", $PP);
echo "";
$mm = @$pieces1[1];
//echo " mm".$mm;
$d = substr($mm, 0, 2);
$mont = substr($mm, 2, 4);
//echo " d: ".$d."##";
//echo " **mont".$mont."##";

if ($mont == 'Jan')
$mont = "01";
if ($mont == 'Feb')
$mont = "02";
if ($mont == 'Mar')
$mont = "03";
if ($mont == 'Apr')
$mont = "04";
if ($mont == 'May')
$mont = "05";
if ($mont == 'Jun')
$mont = "06";
if ($mont == 'Jul')
$mont = "07";
if ($mont == 'Aug')
$mont = "08";
if ($mont == 'Sep')
$mont = "09";
if ($mont == 'Oct')
$mont = "10";
if ($mont == 'Nov')
$mont = "11";
if ($mont == 'Dec')
$mont = "12";


$mm2 = @$pieces1[3];

$mm2= '';

//echo " mm2".$mm2;

$d2 = substr($mm2, 0, 2);
$mont2 = substr($mm2, 2, 4);
//echo " d: ".$d2."##";
//echo " **mont2".$mont2."##";

if ($mont2 == 'Jan')
$mont2 = "01";
if ($mont2 == 'Feb')
$mont2 = "02";
if ($mont2 == 'Mar')
$mont2 = "03";
if ($mont2 == 'Apr')
$mont2 = "04";
if ($mont2 == 'May')
$mont2 = "05";
if ($mont2 == 'Jun')
$mont2 = "06";
if ($mont2 == 'Jul')
$mont2 = "07";
if ($mont2 == 'Aug')
$mont2 = "08";
if ($mont2 == 'Sep')
$mont2 = "09";
if ($mont2 == 'Oct')
$mont2 = "10";
if ($mont2 == 'Nov')
$mont2 = "11";
if ($mont2 == 'Dec')
$mont2 = "12";


//echo "<th>";
//echo "".$pieces1[0]." ".$d."/".$mont." - ".$d2."/".$mont2." ";
//echo "</th>";




echo "<th>".$row['Amt']."</th>";
echo "<th>";
//echo "<th>".$row['RecvdDate']."<br>";
$DDDDD = $row['RecvdDate'];
$pieces = explode("-", $DDDDD);

echo "".$pieces[2]."/".$pieces[1]."/".$pieces[0]."</th>";

//echo "<th>".$PP."<br>";

//echo "<th>testss</th>";
//echo "<th>".$row['Notes']."</th>";
echo "<th>".$row['AccNo']."</th>";
echo "<th>".$PP."</th>";
//echo "<th>".$row['SupCode']."</th>";
//echo "<th>".$row['Category']."</th>";
//echo "<th>".$row['CustNo']."</th>";
/*$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}}

echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
*/

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
?>

























</body>
</html>

