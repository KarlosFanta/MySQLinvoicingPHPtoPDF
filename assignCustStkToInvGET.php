<html>
<head>
<title>Assign stock</title>
</head>
<body>



<?php	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";


	if(isset($_GET["CustNo"]))
{
	echo "GET CustNo: ".$_GET["CustNo"]."<br>";
	$CustNo= $_GET["CustNo"];
	$CustInt= $_GET["CustNo"];
	//force session:
	$_SESSION['CustNo'] = $_GET["CustNo"];
	
}
else{echo " no CustNo Getter";} 
	 

	if(isset($_GET["InvNo"]))
{
	echo "GET InvNo: ".$_GET["InvNo"]."<br>";
	$InvNo= $_GET["InvNo"];
	//force session:
	$_SESSION['InvNo'] = $_GET["InvNo"];
	
}
else{echo " no InvNo Getter";} 
	 




$Amt = "";

$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
print "$item1";
print " ".$item2;
print " <b><Font size = 4>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";
}
$result->free();
};
?>
<form  action="assignCustStktoInvLast.php"   method="post">

<input type="text" id="InvNo"  name="InvNo" value="<?php echo $InvNo;?>">
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">




Customer's Expenses not assigned to an invoice:
Choose checkboxes / select expenses for this invoice.
<?php
$SQLstringb = "SELECT * FROM invoice WHERE InvNo = '$InvNo'";
echo "SQLstringb: ".$SQLstringb; //if no result then this customer never had any invoices
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
echo $row['InvNo'];
echo '<br>';
echo $row['Summary'];
echo '<br>';
echo '<br>';
echo $row['D1'];
echo '<br>';
echo $row['D2'];
echo '<br>';
echo $row['D3'];
echo '<br>';
echo $row['D4'];
echo '<br>';
echo $row['D5'];
echo '<br>';
echo $row['D6'];
echo '<br>';
echo $row['D7'];
echo '<br>';
echo $row['D8'];
}
mysqli_free_result($roww);
}

//echo "<br>index: ".$index."<br>"; 
//echo "<br>SQLstringb: ".$yourArray[$index]; 

//and now all paid invNos of transaction table
/*
$indexx = 0;
$SQLstrT = "SELECT InvNoA, InvNoB, InvNoC, InvNoD, InvNoE, InvNoF, InvNoG, InvNoH FROM transaction WHERE CustNo = '$CustInt'";
echo $SQLstrT;
//$yourArrayT[]=0;
$yourArrayT = array("", "", "", "", "", "", "", "");
if ($rowwT = mysqli_query($DBConnect, $SQLstrT)) {
while ($row = mysqli_fetch_assoc($rowwT)) {
$yourArrayT[$indexx] = $row['InvNoA'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoB'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoC'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoD'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoE'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoF'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoG'];
$indexx++;
$yourArrayT[$indexx] = $row['InvNoH'];
$indexx++;
	}
	mysqli_free_result($rowwT);
}

$indexx = 0;
if ($index == 0)
	echo "<br><br><br><br><b>THIS CUSTOMER HAS NEVER HAD ANY INVOICES BEFORE!</b><br><br><br>";
else
{

$result = (array_diff($yourArray, $yourArrayT));
$XX = '';
foreach($result as $key => $value)
{
//  echo $key." Unpaid: ". $value."<br>";
  $XX = $XX." OR InvNo = '$value'";
 
}

$XX = substr($XX, 3); //removes the first OR
$SQLstrX = "SELECT * FROM invoice WHERE CustNo = '$CustInt' AND ".$XX." order by InvNo desc";


//echo "<br>$SQLstrX<br>";
echo " NEW code! ";
*/ //echo $SQLstrX."<br>";
$ShowDraft = 'Y';
$SQLstrX = "Select * from expenses where InvNo = '' and CustNo = $CustNo";
echo $SQLstrX ;
//if ($resultINVb = $DBConnect->query($SQLstringb)) {
echo "<table  border='1'>";

if ($resultINVb = mysqli_query($DBConnect, $SQLstrX)) {

echo "<tr><th>ExpNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>PurchDate</th>";
echo "<th>TotalAmt</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ExpDesc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //ExpDesc

echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>SupCode</th>";
echo "<th>Notes</th>\n";


echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultINVb)) {
$InvNor = $row['ExpNo'];
$InvNor1 = $row['ProdCostExVAT'];
$InvNor2 = $row['Notes'];
echo "<tr><th><input type='checkbox' name='formDoor[]' value='$InvNor'><font color = red>$InvNor";
echo "</th>\n";

$date_array = explode("-",$row['PurchDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year;

$out = date("Y") - $year;
//echo $out;

if ($out == 1 )
echo "<br>A year ago";
if ($out > 1 )
echo "<br><font color = orange>$out years ago</font>";
echo "</th>";//invDate

echo "<th>R{$row['ProdCostExVAT']}</th>"; ///TOTAL AMOUNT TotAmt
echo "<th>{$row['ExpDesc']}</th>"; //summary
echo "<th>{$row['Category']}</th>\n";//D1  5
echo "<th>{$row['SerialNo']}</th>\n";//Q1   6
echo "<th>{$row['SupCode']}</th>\n";  ///     7
echo "<th>{$row['Notes']}</th>\n";   //8

echo "</tr></font>\n";
		
	}
	mysqli_free_result($resultINVb);
	
}
echo "</table>"; //i moved this up above the squiggly


?>
<input type='checkbox' name='SeperateTrans' ><br>
<input type="hidden" id="TransDate"  name="TransDate" value="<?php echo @$TransDate;?>"> <!-- for addTransMultibSEP.php-->
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>"> <!-- for addTransMultibSEP.php-->
<input type="hidden" id="AmtPaid" name="AmtPaid" value="<?php echo @$AA;?>">
<input type='submit' value='submit selected' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">


</form>

<br><br><br><br>bb<br><br><br><br><br><br>









































































































<?php
echo "Assign customer's expenses to an invoice.";

$query = "SELECT * FROM expenses  WHERE CustNo = '$CustInt' and InvNo ='' order by InvNo, category";
//$queryE = "SELECT * FROM expenses  WHERE ExpNo = '$ExpNo' ";
echo $query."<br>";
?>

Stock included as from march 2014<br>
<?php
if ($resultinner = mysqli_query($DBConnect, $query)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($resultinner));


while ($row = mysqli_fetch_assoc($resultinner)) 
{
echo "Expno: ".$row['ExpNo']." ";
echo $row['ExpDesc']." ";
echo $row['SupCode']." ";
echo $row['PurchDate']." ";
echo $row['ProdCostExVAT']." ";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo $PIV." ";

//echo $row['InvNo']." ";
echo $row['Notes']." ";
echo "".$row['SerialNo']." ";
echo "<br>";
}
mysqli_free_result($resultinner);
}

?>




<select name="mydropdownEC" onchange='this.form.submit()'>
<option value="<?php echo $ExpNo; ?>"><?php echo $ExpNo; ?></option>";
<?php
$cnt = 0;

//echo "<br>firstWhile:<br><br>";
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
if ($InvNo == '')
$cnt = $cnt + 1;
	if ($InvNo != '')
	print "_ALREADY assigned to InvNo".$InvNo;
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
echo "</select>";
//echo "<font size = 7><br><br>CT $cnt </font>";
	if ($cnt == 0)
	print "<font size = 6>All expenses have been assigned to invoices.</font>";


?>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>" />
<input type="submit" name="btn_submit" value="select stk" /> <br>
<input type="submit" name="btn_submit" value="select stk" /> 
</form>
<form  action="assignExptoInvLast1stINV.php"   method="post">

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">



OR <br>First select invoice if you want to add multiple expenses:
<?php
$query = "SELECT * FROM invoice  WHERE CustNo = '$CustInt' order by InvNo desc";
echo $query."<br>";
?>
<select name="mydropdownEC" onchange='this.form.submit()'>
<option value="_no_selection_">Select Invoice (NB does not work together with top drop-down)</option>";
<?php
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$InvNo = $row["InvNo"];//case sensitive!
	$InvDate =  $row["InvDate"];//case sensitive!
	$Summary = $row["Summary"];//case sensitive!
	$TotAmt = $row["TotAmt"];//case sensitive!
	$D1 = $row["D1"];//case sensitive!
	$D2 = $row["D2"];//case sensitive!
	$D3 = $row["D3"];//case sensitive!
	$D4 = $row["D4"];//case sensitive!
	$D5 = $row["D5"];//case sensitive!
	$D6 = $row["D6"];//case sensitive!
	$D7 = $row["D7"];//case sensitive!
	$D8 = $row["D8"];//case sensitive!

	print "<option value='$InvNo'>$InvNo";
/*if ($InvNo != '')
	print "_assigned to InvNo".$InvNo;
else
{
	print "_NOT ASSIGNED YET__";
}
*/	print "_".$InvNo;
	print "_".$InvDate;
	print "_".$Summary;
	print "_".$TotAmt;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>" />
<input type="submit" name="btn_submit" value="select inv" /> <br>
<input type="submit" name="btn_submit" value="select inv" /> 
</form>


or: <a href = 'selectCustAssignStk.php'>Assign any Stock to a Customer:
selectCustAssignStk.php</a><br>

or: <a href = 'AssignStkToAnotherC.php?ExpNo=<?php echo $ExpNo;?>'>Assign customer's Stock to another Customer:
AssignStkToAnotherC.php</a><br>


or: <a href = 'editExp.php?ExpNo=<?php echo $ExpNo;?>'>Edit This Stock Item</a><br>

or: <a href = 'editExpCQ.php?ExpNo=<?php echo $ExpNo;?>'>Edit Stock Items of customer</a><br>








<?php
include ("view_inv_by_custANDexp.php");
 
include ("viewExp.php");
// include ("view_proof_by_cust.php");
//include ("view_proof_by_cust2.php");
include ("view_trans_by_cust.php");





echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

?> 

<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		

		
		?>

</form>
</body>
</html>