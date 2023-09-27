 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
include("inc_OnlineStoreDB.php");
?>


<?php
//$ProofNo = 0;
$CustNo = '';
$CustNo = @$_POST['CustNo'];
$ExpNo = '';
$ExpNo = @$_POST['ExpNo'];
if ($ExpNo == '')
	$ExpNo = $_GET['ExpNo'];

if ($CustNo == '')
$CustNo = $_GET['CustNo'];
	
$pieces = explode(", ", $ExpNo);
echo "<br>";
echo $pieces[0]; // piece1
echo "<br>";
echo @$pieces[1]; // piece2
echo "<br>";
echo "<br>";
foreach($pieces as $i =>$key) {

    echo "i:".$i.'<br>key: '.$key .'</br>';

}
echo "<br>cnt: ";
echo count($pieces)-1;
$cnt2 = count($pieces)-1;



$CustFN ="";
$CustLN ="";
$CustEmail = "";
$CustNoOld = "";
echo "<br>";
$SQLString = "SELECT * FROM expenses WHERE ExpNo = $pieces[0]";
echo "<br>";
echo $SQLString;
if ($result = mysqli_query($DBConnect, $SQLString)){
	while ($row = mysqli_fetch_assoc($result)){
		$ExpNo = $row["ExpNo"];
		$Category = $row["Category"];
		$ExpDesc = $row["ExpDesc"];
		$SerialNo = $row["SerialNo"];
		$SupCode = $row["SupCode"];
		$ProdCostExVAT = $row["ProdCostExVAT"];
		$Notes = $row["Notes"];
		$InvNo = $row["InvNo"];
		$CustNoOld = $row["CustNo"];
		print "ExpNo: $ExpNo";
		print "_category: ".$Category;
		print "_ExpDesc: ".$ExpDesc;
		print "_S/N: ".$SerialNo;
		print "_SupCode: ".$SupCode;
		print "_<br>R".$ProdCostExVAT;
		print "ex VAT_Notes".$Notes;
		print "_CustNo: ".$CustNo;
		print "<br>invoice No: ".$InvNo;
		}
	mysqli_free_result($result);
}
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNoOld" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$CustFNOld =  $row["CustFN"];
$CustLNOld =  $row["CustLN"];
}
	mysqli_free_result($result);
};

echo"<br><font size = 2><b>The expense ExpNo $ExpNo $ExpDesc SN $SerialNo  belonged to CustNo:  $CustNoOld $CustFNOld $CustLNOld<br>";



if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT><br>";

$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$CustFN =  $row["CustFN"];
$CustLN =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
//print "<b> <font size = 3>".$CustFN;
//print " <b>".$CustLN;
//print "</font></b> ".$item4;
//echo "..{$row['dotdot']}";
}
	mysqli_free_result($result);
};


$CustEmail = str_replace(';', '; ', $CustEmail);

for ($x = 0; $x < $cnt2; $x++) {
  echo "<br>The number is: $x <br>";
//echo "<br> aDoor$x:".$aDoor[$x];
//echo "display chosen expenses:";

$query="UPDATE EXPENSES SET CustNo = '$CustNo' WHERE ExpNo =  $pieces[$x]";
mysqli_close($DBConnect);
include("inc_OnlineStoreDB.php");


mysqli_query($DBConnect, $query);
echo "<br><br>>>>>>>>>>>>temp disabled<br><br>";
 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "$query<br><font size = 3  color = red><b><b>update NOT successful!!! </b>!!</b></font><br><br></b>";
else
if (mysqli_affected_rows($DBConnect) == 0)
echo "$query<br><font size = 3  color = dark orange><b><b>Owner not changed.!!! </b>!!</b></font><br><br></b>";

else
if (mysqli_affected_rows($DBConnect) > 0)
	
echo "$query<br><font color=green size = 3>update success! we have a new owner ".mysqli_affected_rows($DBConnect)." rows updated</font><br>";


}

?>To double check if update successful, let's query the DB once more:<br>
<?php
$SQLString = "SELECT * FROM expenses WHERE ExpNo = $pieces[0]";
echo "<br>";
echo $SQLString;
echo "<br>";
if ($result = mysqli_query($DBConnect, $SQLString)){
	while ($row = mysqli_fetch_assoc($result)){
		$ExpNo = $row["ExpNo"];
		$Category = $row["Category"];
		$ExpDesc = $row["ExpDesc"];
		$SerialNo = $row["SerialNo"];
		$SupCode = $row["SupCode"];
		$ProdCostExVAT = $row["ProdCostExVAT"];
		$Notes = $row["Notes"];
		$InvNo = $row["InvNo"];
		$CustNoNew = $row["CustNo"];
		print "ExpNo: $ExpNo";
		print "_category: ".$Category;
		print "_ExpDesc: ".$ExpDesc;
		print "_S/N: ".$SerialNo;
		print "_SupCode: ".$SupCode;
		print "_<br>R".$ProdCostExVAT;
		print "ex VAT_Notes".$Notes;
		print "_ CustNoNew: ".$CustNoNew;
		print "<br>invoice No: ".$InvNo;
		
		$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNoNew" ;
//echo $SQLString."<br>";

if ($resultC = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFNnew =  $row["CustFN"];
$CustLNnew =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
//print "<b> <font size = 3>".$CustFN;
//print " <b>".$CustLN;
//print "</font></b> ".$item4;
//echo "..{$row['dotdot']}";
}
	mysqli_free_result($resultC);
};

		
		
		
		}
	mysqli_free_result($result);
}








	echo "<br>New owner of $ExpDesc SN $SerialNo <br>
is CustNew:<font size=3> $CustNoNew <font size=5>$CustFNnew $CustLNnew.</font>";






echo "<br><br>Select an invoice the expense must be added to: <br>";

?>
<form name="EditInv" action="invAssignProcessFromStockUpdate.php" method="post">
<?php
echo "<br>ExpNo: <input type = text value='$ExpNo' name= 'ExpNo' id='ExpNo'><br>";
?>

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice</option>";

<?php
$item1 = '';
$query = "select * from invoice where CustNo = $CustNo ORDER BY InvNo DESC";
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];

print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];
$item3 =  $row["Summary"];
$queryEXP = "select * from expenses where InvNo = $item1";
$ExpNo = '';

if ($resultEXP = mysqli_query($DBConnect, $queryEXP)) {
  while ($rowEXP = mysqli_fetch_assoc($resultEXP)) {
$ExpNo = $rowEXP["ExpNo"];
$ExpDesc =  $rowEXP["ExpDesc"];
print "_[".$ExpNo;
print "_".$ExpDesc."] ";

}
mysqli_free_result($resultEXP);
}
if ($ExpNo == '')
	echo "_No expense assigned yet";

$item5 = $row["InvDate"];
echo " ".$item5;
echo " ".$item3;
$item4 = $row["TotAmt"];
echo " R".$item4;
echo " D1: ".$row["D1"];
echo " D2: ".$row["D2"];
echo " D3: ".$row["D3"];
echo " D4: ".$row["D4"];
echo " D5: ".$row["D5"];
echo " D6: ".$row["D6"];
echo " D7: ".$row["D7"];
echo " D8: ".$row["D8"];
}
print " </option>"; 
mysqli_free_result($result);
}
else
	echo $queryC;
//echo "item2: ".$item2 ."<br>";
echo "CustNo: ".$CustNo ."<br>";



?>
<br>
<input type="submit" name="btn_submit" value="Select invoice" /> 
</select></p>  

<?php
if ($item1 == '')
	echo "This customer does not have any invoices yet";

$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
//echo $SQLstring."<br><br>"; 

if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];
	  echo "<tr><th>";
   echo $x;
echo "</th></FONT>";
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 18)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
echo "</tr>\n";


echo "<tr><th colspan='20'>";









$queryEXP = "select * from expenses where InvNo = $x";
$ExpNo = '';

if ($resultEXP = mysqli_query($DBConnect, $queryEXP)) {
  while ($rowEXP = mysqli_fetch_assoc($resultEXP)) {
$ExpNo = $rowEXP["ExpNo"];
$ExpDesc =  $rowEXP["ExpDesc"];
print "_[".$ExpNo;
print "_".$ExpDesc."] ";

}
mysqli_free_result($resultEXP);
}
if ($ExpNo == '')
	echo "_No expense assigned yet";












echo "</th></tr>";


		}
    $result->close();
}
echo "</table>";

?>
<br>
<br>
<br>
<!--<form name="Editcust" action=".php" method="post">-->
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<a href = "editExpCQ.php"> Edit customer's expense</a>	<br><br>
<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>


	</form>
<?php
$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
echo $SQLstring."<br><br>"; 

if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];
	  echo "<tr><th>";
   echo $x;
echo "</th></FONT>";
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
echo "</tr>\n";
		}
    $result->close();
}
echo "</table>";

?>
