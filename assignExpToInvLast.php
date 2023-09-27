<title>assignExptoInvLast</title>
 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$ProofDate = '';
$Amt = '';
$Notes ='';
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";
$CustNo = '';
$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";
$clExp = $_POST['mydropdownEC'];
echo "mydropdownEC:";
echo $clExp;
echo " ";
$clExp2 = explode('_', $clExp);
echo "clExp2[0]:"; echo $clExp2[0]; echo " ";
$clExp3= $clExp2[0];
$CustFN = $_POST['CustFN']; $CustLN = $_POST['CustLN'];
$CustEmail = $_POST['CustEmail'];
$CustEmail = str_replace(';', '; ', $CustEmail);
echo "CustNo ".$CustNo ." ExpNo ".$clExp ."."  ;
	$SQLstring = "select * from expenses where ExpNo = $clExp3";
echo $SQLstring."<br><br>"; 
$NN = '';
$NNN = '';
if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";
while ($row = mysqli_fetch_assoc($result)) 
{
echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";

echo "</tr>";

}
echo "</table >";
mysqli_free_result($result);
}
	
echo "Select an invoice the expense must be added to: <br>";

?>
<form name="EditInv" action="ExpToInvAssignProcessChk.php" method="post">
<?php
echo "<br>ExpNo: <input type = text value='$clExp3' name= clExp3 id=clExp3><br>";
?>
<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice</option>";

<?php
$query = "select * from invoice where CustNo = $CustNo ORDER BY InvNo DESC";

echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];
print "<option value='$item1'>$item1";
//$item2 =  $row["CustNo"];
$item5 = $row["InvDate"];
echo " ".$item5;

$item3 =  $row["Summary"];
//echo " ".$item2;
echo " ".$item3;
$item4 = $row["TotAmt"];
echo " R".$item4;
echo " ".$row["D1"];
echo " ".$row["D2"];
echo " ".$row["D3"];
echo " ".$row["D4"];
echo " ".$row["D5"];
echo " ".$row["D6"];
echo " ".$row["D7"];
echo " ".$row["D8"];



if ($CustNo == 0)
{
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
//print "_CNo: ".$item2C;
print "_".$item3C." ";

}}
}


print " </option>"; 

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}

mysqli_free_result($result);

}
else


	echo $queryC;
/* close connection */
//$mysqli->close();
//echo "item2: ".$item2 ."<br>";
?>
<br>
<input type="submit" name="btn_submit" value="Select invoice" /> 

</select></p>  

<a href = "edit_invCQ.php">Search through customer's invoices here</a>

<br>
<?php


$SQLstringD = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
//echo $SQLstringD;

if ($resultD = mysqli_query($DBConnect, $SQLstringD)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>Draft</th>";
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
while ($row = mysqli_fetch_assoc($resultD)) {
  $x = $row["InvNo"];
  echo "<tr><th>".$x."</th></FONT>";
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
echo "<th>".$row["Draft"]."</th>\n";

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
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";





	$SQLstring = "select * from expenses where InvNo = $x";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP 
if ($result = mysqli_query($DBConnect, $SQLstring)) {

while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{
echo "<tr>";
echo "<th></th>";
echo "<th><font color = green>".$row['ExpNo']."</th>";
echo "<th><font color = green>".$row['ExpDesc']."</th>";
echo "<th><font color = green>".$row['SupCode']."</th>";
echo "<th><font color = green>".$row['PurchDate']."</th>";
echo "<th><font color = green>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th><font color = green>".$PIV."</th>";
echo "<th><font color = green>".$row['SerialNo']."</font></th>";
echo "</tr>";
}
mysqli_free_result($result);
}




	}
	mysqli_free_result($resultD);
}
echo "</table>";

	
	
	
	
	
	
	
	
	
	
	
	
	
?>


<!--<form name="Editcust" action="addProofCustProcess2sess.php" method="post">-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form name="Editcust" action="addProof.php" method="post">

<!--<input type = "hidden" name="mydropdownEC" value="<?php //echo $CustNo ?>">-->
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">
<input type = "hidden" name="ProofDate" value="<?php echo $ProofDate ?>">
<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">

<a href = "editExpCQ.php"> Edit customer's expense</a>	<br><br>
<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>

	<!--<input type = "submit" value = "Click to add another transaction">-->


	

<?php
//echo $query;
$ttttt = 0;

echo "<br><br>";



?>
<a href='selectCustProof.php'>Click to add email proof for another customer</a> or <input type = "submit" value = "Click to add email proof for the same customer">
</font></b>





	<br><br>
	

	<br><br>

	
	

<br><br><br><br>
<?php








?>








