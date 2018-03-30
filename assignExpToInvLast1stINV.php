 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';

//$CustNo" 
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$CustNo = $_POST['CustNo'];

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";



$clInv = $_POST['mydropdownEC'];
echo "mydropdownEC:";
echo $clInv;
echo " ";

$clInv2 = explode('_', $clInv);
echo "clInv2[0]:";
echo $clInv2[0];
echo " ";
$clInv3= $clInv2[0];

$CustFN = $_POST['CustFN'];
$CustLN = $_POST['CustLN'];
$CustEmail = $_POST['CustEmail'];

$CustEmail = str_replace(';', '; ', $CustEmail);


//$ProofNo = $_POST['ProofNo'];


echo "CustNo ".$CustNo ." ExpNo ".$clInv ."."  ;



//$SQLString = "SELECT * FROM expenses WHERE CustNo = $CustNo";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>

 <?php

	$SQLstring = "select * from expenses where InvNo = $clInv3";
echo $SQLstring."<br><br>";

$NN = '';
$NNN = '';
$row_cnt = 0;
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
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
$CCCC = $row['CustNo'];
$row_cnt = mysqli_num_rows($resultC);

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

echo " There are currently $row_cnt expenses for this invoice.";


//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files
//include "edit_invCQ.php";
//echo "<br>";
//include "view_inv_by_custBasic.php";
 
	
	
	
echo "Select an expense to be assigned to: ";

?>
<form name="EditInv" action="ExpToInvAssignProcess1stINV.php" method="post">
<?php
echo "<br>InvNo: <input type = text value='$clInv3' name= clInv3 id=clInv3><br>";
?>
<!--<form name="EditInv" action="print_invoice.php" method="post">-->

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select expense</option>";

<?php
$query = "select * from expenses where CustNo = $CustNo ORDER BY ExpNo DESC";

echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
	$ExpNo = $row["ExpNo"];//case sensitive!
	$InvNo = $row["InvNo"];//case sensitive!
	$Category =  $row["Category"];//case sensitive!
	$ExpDesc = $row["ExpDesc"];//case sensitive!
	$SerialNo = $row["SerialNo"];//case sensitive!
	$SupCode = $row["SupCode"];//case sensitive!
	$PurchDate = $row["PurchDate"];//case sensitive!
	$ProdCostExVAT = $row["ProdCostExVAT"];//case sensitive!
	$Notes = $row["Notes"];//case sensitive!
	$CustNoB = $row["CustNo"];//case sensitive!
	print "<option value='$ExpNo'>$ExpNo";
if ($InvNo != '')
	print "_assigned to InvNo".$InvNo;
else
{
	print "_NOT ASSIGNED YET__";
}
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print " </option>"; 
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

<a href = "edit_invCQ.php" target=_blank>Search through customer's invoices here</a>

<?php


$SQLstring = "select * from invoice where InvNo = $clInv3  ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
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


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

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
		}
    //
    $result->close();
	
}
echo "</table>";
echo "<br><br>";

$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
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


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

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
		}
    //
    $result->close();
	
}
echo "</table>";
echo "<br><br>Exclude ADSL invoices:<br>";

	
	
	
	
	
	
	
	
	
	
	
	
	
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








