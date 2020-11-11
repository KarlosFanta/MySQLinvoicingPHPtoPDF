<html>
<head>
<title>Assign stock</title>
</head>
<body>

<form  action="assignExptoInvLast.php"   method="post">


<?php
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';
	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
$Prof = @$_POST['Prof'];

$TBLrow = @$_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
$CustInt = intval($Custno[0]);
if ($TBLrow == '')
{
		@session_start();
	echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
}



if ($CustInt == '0')
$CustInt = @$_POST['CustNo'];

$_SESSION['CustNo'] = $CustInt;

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
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">




<table border='0'>
<?php
echo "Assign customer's expenses to an invoice.";

$query = "SELECT * FROM expenses  WHERE CustNo = '$CustInt' order by InvNo, category";
echo $query."<br>";

?>
<form name="Editcust" action="Process.php" method="post">
Stock included as from march 2014<br>
<select name="mydropdownEC" onchange='this.form.submit()'>
<option value="_no_selection_">Select Expense</option>";
<?php
echo "<br>firstWhile:<br><br>";
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
?>
</select>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>" />

<input type="submit" name="btn_submit" value="select stk" /> <br>
<input type="submit" name="btn_submit" value="select stk" />




</form>























<?php
include ("view_inv_by_cust.php");

include ("viewExp.php");
 include ("view_proof_by_cust.php");
include ("view_proof_by_cust2.php");
include ("view_trans_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

?>
</table>
<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");

include ("viewExp.php");
include ("view_proof_all.php");

		?>
<!--
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {

    //autocomplete
    $(".auto").autocomplete({
        source: "search.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	});

     $(".clInvNo").autocomplete({
        source: "searchinvAdd.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	});

//expenses or products
    $(".clExp").autocomplete({
        source: "searchExpb.php",
        minLength: 0

				}).focus(function() {
				$(this).autocomplete("search");
	});

	//var delay = $( ".clExpC" ).autocomplete( "option", "delay" );

    $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	//});
		//		}).mouseout(function() {
		//		$(this).autocomplete("reset");
	//});
//$(".clExpC").autocomplete({
    //    source: "searchExpC.php",
   //     minLength: 0
	});
/*
       $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0


		}).mouseleave(function() {
			$(this).autocomplete("close", "delay", 5000);
	});

	*/





				//Solution: http://jsfiddle.net/ricardolohmann/SdLaP/
//http://stackoverflow.com/questions/4604216/jquery-ui-autocomplete-minlength0-issue

/*	$("input#autocomplete").focus(function(e) {
    if(!e.isTrigger) {
        $(this).autocomplete("search", "");
    }
    return false;
*/


 });
</script>
-->
</form>
</body>
</html>
