R189 laptop drive enclosure
R499  usb3 comp mania
oracle 3588us3 blk  2x in stk

3.5inch

<title>viewExp</title>
<?php

	
	
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "4" type="arial">View Expenses</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExp.php
</br>
<a href = 'viewExpHEandExp.php' target='_blank'>viewExpHEandExp</a></br>
<a href = 'viewExpD.php' target='_blank'>viewExpD</a></br>
<a href = 'viewExpmyedit.php' target='_blank'>viewExpmyedit</a></br>
<a href = 'http://localhost/phpmyadmin/sql.php?db=kc&table=expenses&pos=0' target='_blank'> Expenses PHPmyAdmin</a></br>

<a href = 'ExpCombo.php' target='_blank'>Home Expenses Extra Expenses and Work Expenses Combo</a></br>

<a href = "editExpA.php">Edit Any Expenses</a> </br></br>
<!--<a href = 'selectCustAssignStk.php'>Assign Stock to any Customer</a></br>-->
<a href = 'assignCustStktoInv.php'>Assign customer's Stock to Customer's invoice</a> &nbsp;&nbsp;
assignCustStktoInv</br></br>
<a href = 'selectCustAssignStkInv.php'>Assign customer's Stock to Customer's invoice</a> &nbsp;&nbsp;
assignStkInv</br></br>
<a href = 'selectCustAssignStk.php'>Assign any Stock to a Customer and then invoice</a></br></br>

Selected Customer:<br>
<a href="./viewExpCust.php">Customer Expenses</a></br>
<a href="./viewExpCustS.php">Select Customer, then show his/her Expenses</a></br>
<a href="./viewExpCustALL.php">Customer's All Expenses and all Invoices</a></br></br>




supplier or category: <br>
<a href = "editExp2.php">View and Edit Any Expenses of certain supplier </a></br>
Copy or Move expenses from one table to another.
<a href = "moveExp.php">View and Edit Any Expenses of certain supplier </a></br>


	</div>
 </form>

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
$SQLstring = "select * from expenses  order by ExpNo  desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

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
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "<th>InvNo</th>\n";
echo "<th>ExpNo</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{
	$D1='';
	$D1 = explode("-", $row['PurchDate']);
	$EDate = '';
$EDate = $D1[2]."/".$D1[1]."/".$D1[0];
//$DDD =  $D1[2];
//$arr2 = str_split($DDD, 1);
//echo $EDate;	 


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

echo "<th>Exp".$row['ExpNo']."</th><th>";
$CCCC = '';
$CCCC = $row['CustNo'];
if ($CCCC  == '300')
	echo "<font color = 'green'>";


//echo "".chunk_split($row['ExpDesc'], 33, '<br>')."</th>";

			echo mb_substr($row['ExpDesc'], 0, 18); 
			echo "<br><font size = 2>";
			echo mb_substr($row['ExpDesc'], 18, 20); 
			echo "<br>".mb_substr($row['ExpDesc'],  35); 
			echo "</font></th>"; 



echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."<br>".$EDate."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= 0;
$PEX= $row['ProdCostExVAT'];
$PIV = 0;
@$PIV = number_format(@$PEX*1.14 , 2, '.', '');
echo "<th>".@$PIV."</th>";
@$PIV = number_format(@$PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";



if ($row['InvNo'] != '')
echo "<th>".$row['InvNo']."</th>";
else
echo "<th>stk</th>";

echo "<th><font size ='1'> ".chunk_split($row['Notes'], 13, '<br>')."</textarea></th>";
$s = "SELECT * from customer where CustNo = '$CCCC'";
$NN = '';
$NNN = '';

if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = '';
$NNN = '';
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}
mysqli_free_result($resultCC);
}
echo "<th>".$row['CustNo']." <font size = 2>".mb_substr($NN, 0, 12)." ".mb_substr($NNN, 0, 12)."</font></th>";

//$SerialNo = $row['SerialNo']
$SerialNo = chunk_split($row['SerialNo'], 13, '<br>');

//join('-', str_split($str, 3))
echo "<th>".$SerialNo."</th>";
echo "<th>";
if ($row['InvNo'] != '')
	echo "Inv<br>";
echo $row['InvNo']."</th>";
echo "<th>Exp<br>".$row['ExpNo']."</th>";
	echo "</font>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
?>


</body>
</html>

<?php
//	require_once('footer.php');		
?>