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
else{echo " no Getter";} 
	 

	if(isset($_GET["ExpNo"]))
{
	echo "GET ExpNo: ".$_GET["ExpNo"]."<br>";
	$ExpNo= $_GET["ExpNo"];
	//force session:
	$_SESSION['ExpNo'] = $_GET["ExpNo"];
	
}
else{echo " no Getter";} 
	 


//$Prof = @$_POST['Prof'];


//$TBLrow = @$_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
//$Custno = explode(';', $TBLrow );
//$CustInt = intval($Custno[0]);
//if ($TBLrow == '')
//{
//		@session_start();
//	echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
//	$CustInt = $_SESSION['CustNo'];
//}



//if ($CustInt == '0')
//$CustInt = @$_POST['CustNo'];

//$_SESSION['CustNo'] = $CustInt;

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
<form  action="assignExptoInvLast.php"   method="post">

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">





<?php
echo "Assign customer's expenses to an invoice.";

$query = "SELECT * FROM expenses  WHERE CustNo = '$CustInt' and InvNo ='' order by InvNo, category";
$queryE = "SELECT * FROM expenses  WHERE ExpNo = '$ExpNo' ";
echo $query."<br>";
?>

Stock included as from march 2014<br>
<?php
if ($resultinner = mysqli_query($DBConnect, $queryE)) {
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

or: <a href = 'editExpCQ.php?ExpNo=<?php echo $ExpNo;?>' target = '_blank' >Edit Stock Items of customer</a><br>





<a href = 'view_inv_by_custBasic.php?CustNo=<?php echo $ExpNo;?>'>Basic InvOnly View of customer</a><br>


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