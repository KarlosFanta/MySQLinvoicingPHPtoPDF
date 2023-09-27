 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>


<?php


  $aDoor = $_POST['formDoor']; //array posted
//echo "aDoor:".$aDoor[];
echo "aDoor0:".$aDoor[0];
//echo " aDoor1:".$aDoor[1];
//echo " aDoor2:".$aDoor[2];
$N = 0;
  if(empty($aDoor))
  {
    echo("You didn't select any expenses.");
  }
  else
  {
    $N = count($aDoor);
 
    echo("You selected $N expenses (/doors): ");
  }
  
//$aDoor = array_reverse($aDoor); //invert array



$CustNo = '';
$CustNo = $_GET['CustNo'];
     echo " GET CustNo: ". $_GET['CustNo']. ".";

$queryS = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CustNo";

?>
<a href = 'selectCustAssignStkInv.php' target=_blank>Assign customer's Stock to Customer's invoice</a> &nbsp;&nbsp;
assignStkInv</br></br>
<a href = 'editExpCQ.php?CustNo=<?php echo $CustNo; ?>' target=_blank>Edit customer's expenses</a> &nbsp;&nbsp;
editExpCQ</br></br>
<b>

<?php

if ($result = mysqli_query($DBConnect, $queryS)) {
  while ($row = mysqli_fetch_assoc($result)) {
$CNNN = $row["CustNo"];
$LN =  mb_substr($row["CustLN"],  0, 13);
$FN = mb_substr($row["CustFN"],  0, 13);
$adsl = $row["u1"];
print "<font size = 3>".$FN;
print " ".$LN;
print "</font> CustNo".$CNNN;

	}
mysqli_free_result($result);

}


	//@session_start();

//$_SESSION['CustNo'] = $CustNo;


/*
	if(isset($_SESSION['CustNo']))
echo "";
else
echo "<a href = 'selectCust.php' >no  PLEASE SELECT A CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


	
	if(($_SESSION['CustNo'])== '0')
echo "<a href = 'selectCust.php' >no  PLEASE SELECT dA CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	//$CustNo = $_SESSION['CustNo'];

*/


//$ProofNo = 0;
//$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
$ExpeeArray = '';
$ExpDesc = '';
$SerialNo = '';

//$ExpeeArray
echo "</b/><br>";
//$clExp3= $clExp2[0];
$CustNoOld = '';
$Expee = '';
for ($x = 0; $x < $N; $x++) {
  //echo "<br>The number is: $x <br>";
echo "<br> aDoor$x:<font size = 3>".$aDoor[$x];
$CustNoOld = explode(', ', $aDoor[$x]);
echo " Existing/Previous Owner of expense:".$CustNoOld[8];
$CustNoOldb = $CustNoOld[8];
$Expee = $CustNoOld[0];
//echo "<br> Expee: $Expee";
$ExpeeArray = $Expee.", ".$ExpeeArray;
//echo " ExpeeArray: ".$ExpeeArray;


}


$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";
//include "StockOldDetails.php";
//include "StockUpdatedDetails.php";
//First check whom the stock belongs to: 
/*
$SQLString = "SELECT * FROM expenses WHERE ExpNo = $Expee";

if ($result = mysqli_query($DBConnect, $SQLString)){
	while ($row = mysqli_fetch_assoc($result)){
		$ExpNo = $row["ExpNo"];
		$Category = $row["Category"];
		$ExpDesc = $row["ExpDesc"];
		$SerialNo = $row["SerialNo"];
		$SupCode = $row["SupCode"];
		$ProdCostExVAT = $row["ProdCostExVAT"];
		$Notes = $row["Notes"];
		$CustNoOldb = $row["CustNo"];
		print "ExpNo: $ExpNo";
		print "_category: ".$Category;
		print "_ExpDesc: ".$ExpDesc;
		print "_S/N: ".$SerialNo;
		print "_SupCode: ".$SupCode;
		print "_<br>R".$ProdCostExVAT."ex VAT_";
		print " Notes: ".$Notes;
		}
	mysqli_free_result($result);
}
*/
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNoOldb" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$CustFNOld =  $row["CustFN"];
$CustLNOld =  $row["CustLN"];
$CustEmailOld = $row["CustEmail"];
//print "$item1";
//print "<b> <font size = 3>".$CustFN;
//print " <b>".$CustLN;
//print "</font></b> ".$item4;
//echo "..{$row['dotdot']}";
}
	mysqli_free_result($result);
};










//$CustNo = $_POST['CustNo'];
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

//$CustEmail = $_POST['CustEmail'];

//$CustEmail = str_replace(';', '; ', $CustEmail);
/*echo "CustNoOld[2]:".$CustNoOld[2] ." "  ;
echo "CustNoOld[3]:".$CustNoOld[3] ." "  ;
echo "CustNoOld[4]:".$CustNoOld[4] ." "  ;
echo "CustNoOld[5]:".$CustNoOld[5] ." "  ;
echo "CustNoOld[6]:".$CustNoOld[6] ." "  ;
echo "CustNoOld[7]:".$CustNoOld[7] ." "  ;
//echo "CustNoOld[8]:".$CustNoOld[8] ." "  ;
//echo "CustNo".$CustNo ." ExpNo".$clExp3 ."."  ;
//echo "CustNo".$CustNo ." ExpNo".$clExp3 ."."  ;
//echo "CustNo".$CustNo ." ExpNo".$clExp3 ."."  ;
//echo "CustNo".$CustNo ." ExpNo".$clExp3 ."."  ;
*/
$ExpFinalArray = '';
$ExpOnlyy = '';
for ($x = 0; $x < $N; $x++) {
 // echo "<br>The number is: $x <br>";
//echo "<br> aDoor$x:".$aDoor[$x];
//echo "display chosen expenses:";

//for ($y = 0; $y < 9; $y++) {
//  echo "<br>The number is y: $y <br>";
//echo "<br> aDoor0:".$aDoor[0];
$ADDO = $aDoor[$x];
//echo "<br>ADDO: $ADDO <br>";
$ExpOnly = explode(', ', $ADDO);
//echo "<br>ExpOnly0: $ExpOnly[0] <br>";
//$ExpOnlyy = ExpOnly[0];
//echo "<br>ExpOnlyy: $ExpOnlyy <br>";

//$ExpFinalArray += $ExpArray[0];

//echo "ExpFinalArray: $ExpFinalArray:";
//$CustNoOld = explode(', ', $aDoor[$x]);
//echo " Previous Owner:".$CustNoOld[4];


}



if ($CustNo != $CustNoOld)
{
	echo "<br><br>To confirm that you want to change the previous owners $CustNoOld[8]<br>
	to new owner: $CustNo $CustFN $CustLN click here to continue: 
<form name='Editcust' action='StockUpdateChosen.php' method='post'>
<input type='hidden' id='CustNo'  name='CustNo'  value='$CustNo'>
<input type='hidden' id='CustNoOld'  name='CustNoOld'  value='$CustNoOld[0]'>
<input type='hidden' id='ExpDesc'  name='ExpDesc'  value='$ExpDesc'>
<input type='hidden' id='SerialNo'  name='ExpDesc'  value='$SerialNo'>
<input type='hidden' id='CustFNOld '  name='ExpDesc'  value='$CustFNOld '>
<input type='hidden' id='CustLNOld'  name='CustLNOld'  value='$CustLNOld'>

<!--chosenExpensesString:-->
<input type='text' id='ExpNo'  name='ExpNo'  value='$ExpeeArray'  >";
echo "<input type='submit' name='btn_submit'  style='width: 100px; height: 100px; background-color:orange;' value='Confirm' />
</form>

";//
}
else
{
	echo "<br>Nothing changed , the customer already has this expense assigned to.<br>";
echo "<br><br>Select an invoice the expense must be added to: <br>";

echo "<form name='EditInv' action='invAssignProcess.php' method='post'>";
echo "<br>ExpNo: <input type = text value='$clExp3' name= clExp3 id=clExp3><br>";
echo "<select name='mydropdownEC' onchange='this.form.submit()'>";
echo "<option value='_no_selection_'>Select invoice</option>";
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
	echo "Not yet Assigned";

echo " ".$item3;
$item4 = $row["TotAmt"];
echo " R".$item4;
$item5 = $row["InvDate"];
echo " ".$item5;
echo " ".$row["D1"];
echo " ".$row["D2"];
echo " ".$row["D3"];
echo " ".$row["D4"];
echo " ".$row["D5"];
echo " ".$row["D6"];
echo " ".$row["D7"];
echo " ".$row["D8"];
}
print " </option>"; 
mysqli_free_result($result);
}
else
	echo $queryC;
echo "item2: ".$item2 ."<br>";
echo "<br>";
echo "<input type='submit' name='btn_submit' value='Select invoice' /> 
</select></p>  ";
}
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
require_once "viewExpCust.php";
?>
<br>
<br>
<br>
<form name="Editcust" action=".php" method="post">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<a href = "editExpCQ.php"> Edit customer's expense</a>	<br><br>
<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>


	

