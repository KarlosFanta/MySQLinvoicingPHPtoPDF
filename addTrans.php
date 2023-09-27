
<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
	<script  type="text/javascript">
	function enable1() {
    document.getElementById("btn1").disabled=false;
}

function formValidator(){
	// Make quick references to our fields
	var TransNo = document.getElementById('TransNo');
	var TransDate = document.getElementById('TransDate');  //it must be in the correct sequence!!!
	var AmtPaid = document.getElementById('AmtPaid');
	var Notes = document.getElementById('Notes');
	var TMethod = document.getElementById('TMethod');//Payment method
	// Check each input in the order that it appears in the form!
	if(isNumeric(TransNo, "Please enter a valid numeric transaction number")){
		if(lengthRestriction(TransDate, 10,10)){
			if(notEmpty(AmtPaid, "Please enter a valid FLOAT amount Paid isFloat")){
				if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
					if(isDate(TransDate, "Please put in Da 	te")){
					if(madeSelection(TMethod, "Please Choose Payment Method")){
				return true;
				}
			}
		}
	}
}
						return false;
}

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

/* CAUSES NOTHING TO FUNCTION
function isFloat(elem, helperMsg){
	var numericExpression = /^[0-9\.]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
*/
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}




function isDate(value, sepVal, dayIdx, monthIdx, yearIdx) {
    try {
        //Change the below values to determine which format of date you wish to check. It is set to dd/mm/yyyy by default.
        var DayIndex = dayIdx !== undefined ? dayIdx : 0; 
        var MonthIndex = monthIdx !== undefined ? monthIdx : 0;
        var YearIndex = yearIdx !== undefined ? yearIdx : 0;
 
        value = value.replace(/-/g, "/").replace(/\./g, "/"); 
        var SplitValue = value.split(sepVal || "/");
        var OK = true;
        if (!(SplitValue[DayIndex].length == 1 || SplitValue[DayIndex].length == 2)) {
            OK = false;
        }
        if (OK && !(SplitValue[MonthIndex].length == 1 || SplitValue[MonthIndex].length == 2)) {
            OK = false;
        }
        if (OK && SplitValue[YearIndex].length != 4) {
            OK = false;
        }
        if (OK) {
            var Day = parseInt(SplitValue[DayIndex], 10);
            var Month = parseInt(SplitValue[MonthIndex], 10);
            var Year = parseInt(SplitValue[YearIndex], 10);
 
            if (OK = ((Year > 1900) && (Year < new Date().getFullYear()))) {
                if (OK = (Month <= 12 && Month > 0)) {

                    var LeapYear = (((Year % 4) == 0) && ((Year % 100) != 0) || ((Year % 400) == 0));   
                    
                    if(OK = Day > 0)
                    {
                        if (Month == 2) {  
                            OK = LeapYear ? Day <= 29 : Day <= 28;
                        } 
                        else {
                            if ((Month == 4) || (Month == 6) || (Month == 9) || (Month == 11)) {
                                OK = Day <= 30;
                            }
                            else {
                                OK = Day <= 31;
                            }
                        }
                    }
                }
            }
        }
        return OK;
    }
    catch (e) {
        return false;
    }
}


//JQUERY: LOOK AT : include 'invJQuery.php' 		
//	<input type="text"  size="3" id="InvNoA"  name="InvNoA"  class='clInvNoA' />
/*	
	$(function() {
		//var availableTags = [todaydate,	yesterday, twodaysago, threedaysago, fourdaysago, fivedaysago, sixdaysago, sevendaysago];
		var availableTags = ["yp","jj"];
		$( "#lst" ).autocomplete({
		source: availableTags,
		minLength: 0
			}).mouseover(function() {
				$(this).autocomplete("search");
		});
		});
*/
</script>
</head>
<body>

<?php
require_once('header.php');	
require_once("inc_OnlineStoreDB.php");
$TransDate = '';
$TransDate = @$_POST['TransDate'];
echo ''.$TransDate;


if(isset($_GET["TransDate"]))
{
	//echo "YES GETTING <a href = 'acceptCustNo.php?CustNo=$CustInt' target='_blank'>Accept CustNo into session</a>";
$TransDate  = $_GET['TransDate'];
$TransDate = str_replace(" ","/", $TransDate);
echo "TD: ".$TransDate;
}

if(isset($_GET["DA"]))
{
	//echo "YES GETTING ";
$TransDate  = $_GET['DA'];
$TransDate = str_replace(" ","/", $TransDate);
echo "TD: ".$TransDate;
}



$arraySDR = @$_POST['SDR'];
if ($arraySDR == '')
$arraySDR = $_GET['SDR'];
echo '<b><font size = 2>SDR: '.$arraySDR."</font> &nbsp;&nbsp;&nbsp;";

if (@$_POST['acc1'] == '')
{
$TBLrow = @$_POST['mydropdownEC'];
//echo "TBLrow: " .$TBLrow."</BR>";

$Custno = explode(';', $TBLrow );
$CustInt = intval($Custno[0]);
}
else
{
	//we received a account number from the form
	//account number is the same as the customer number.
$CustInt = $_POST['acc1'];
}

if (@$_POST['inv1'] != '')
{
	//we received an inv1 umber from the form
	//check whom this invoice belongs to
	$inin = $_POST['inv1'] ;
	$queryC = "select CustNo from invoice where InvNo = $inin";
echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
echo "".$row["CustNo"]."</th>";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."</th>";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo " rows: $row_cnt</th>"; //not ttested yet

$CCCCC = $row["CustNo"];
	$CustInt = $CCCCC;
	}
mysqli_free_result($resultC);
}

if ($_POST['inv1'] == '1878')
$CustInt = 9; //mielck
}

if (@$_POST['csdr'] != '')
{
	//we received an csdr umber from the form
	//check whom this invoice belongs to
	$inin = $_POST['csdr'] ;
	$queryC = "select CustNo from invoice where SDR LIKE '%$inin%'  UNION ALL  select CustNo from customer where CommonSDR LIKE '%$inin%' ";
	echo $queryC;
	echo "statement seems to work now";
	if ($resultC = mysqli_query($DBConnect, $queryC)) {
	while ($row = mysqli_fetch_assoc($resultC)) {
	echo "".$row["CustNo"]."</th>";//CustNo is case senSitiVe
	//echo "".$row["InvNo"]."</th>";//CustFN is case senSitiVe
	$row_cnt = mysqli_num_rows($resultC);
	echo " rows: $row_cnt</th>"; //not ttested yet
	$CCCCC = $row["CustNo"];
}
mysqli_free_result($resultC);
}
$CustInt = $CCCCC;
if ($_POST['csdr'] == '1878')
	$CustInt = 9; //mielck
}
//echo "<br>Custint:".$CustInt."<br />";
@session_start();

if(isset($_GET["CustNo"]))
{
	$CustInt  = $_GET['CustNo'];
	echo "<a href = 'acceptCustNo.php?CustNo=$CustInt' target='_blank'>Accept CustNo into session_</a>";

	echo " <a href = 'edit_transCQ.php?CustNo=$CustInt' target='_blank'>Transactions</a>";
	$_SESSION['CustNo'] = $CustInt ; // force into session
}

$_SESSION['CustNo'] = $CustInt;

$file = fopen("sessCustNo.txt","w");
echo fwrite($file,"$CustInt");
fclose($file);

echo "sessionCustNo: ".$_SESSION['CustNo']."<br>";




if(isset($_SESSION['CustNo']))
$_SESSION['CustNo'] = $CustInt;
else
echo "<a href = 'selectCust.php' >no  PLEASE SELECT A CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

if(($_SESSION['CustNo'])== '0')
{
echo "<a href = 'selectCust.php' >no  PLEASE SELECT dA CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}

//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
$CustInt = $_SESSION['CustNo'];

$AmtPaid = "";
if(isset($_GET["AmtPaid"]))
{
$AmtPaid  = $_GET['AmtPaid'];
	echo "got AmtPaid: R$AmtPaid <"; //only shows if therre was a Getter. maybe check POSrt below
}
if(isset($_POST["AmtPaid"]))
{
$AmtPaid  = $_POST['AmtPaid'];
	echo " POST <font size = 5>AmtPaid: <b>R$AmtPaid <></b> </font>";
}
	$AA = $AmtPaid ;
$AmtPd = "";
if(isset($_GET["AmtPd"]))   //NB AmtPaid is different to AmtPd
{
$AmtPd  = $_GET['AmtPd'];
	echo "got AmtPd: R$AmtPd ";
}
if(isset($_POST["AmtPd"]))
{
$AmtPd  = $_POST['AmtPd'];
	echo "POST AmtPd: R$AmtPd";
}

$CommonSDR = "";
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt";
//echo $SQLString;
if ($result = mysqli_query($DBConnect, $SQLString)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$item1 = $row["CustNo"];
	$item2 =  $row["CustFN"];
	$item3 =  $row["CustLN"];
	$item4 = $row["CustEmail"];
	$Important = $row["Important"];
	$PayNotes = $row["PayNotes"];
	$CommonSDR = $row["CommonSDR"];
	print "CustNo: $item1";
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
<?php
$queryCP = "select * from aproof where CustNo = $CustInt order by ProofDate desc";
//echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {
    $row_cnt = mysqli_num_rows($resultCP1);
    printf("Proof has %d rows.\n", $row_cnt);
    mysqli_free_result($resultCP1);
}
?>
<br>
<form   method='post' action = "addProof.php?='<?php echo $TransDate; ?>'">
<input type='submit' value='(or first add a Proof)' style="height:20px; width:160px">
<?php echo "<font size = '1'>CommonSDR: $CommonSDR </font>"; ?>
<input type="hidden" id="CustNo" size='5' name="CustNo"  value="<?php echo $CustInt;?>">
</form>

<?php
echo "Unassigned proofs:<br>";
$item2b = '';
$queryUP = "select * from aproof where CustNo = $CustInt and TransNo = '' order by ProofDate desc";
echo $queryUP;
if ($resultUP = mysqli_query($DBConnect, $queryUP)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>ProofNo</th>";
echo "<th>Amt</th>";
echo "<th>InvNoA</th>";
echo "<th>InvNoB</th>";
echo "<th>ProofDate</th>";
echo "<th>TransNo</th>";
echo "</tr>\n";
while ($rowUP = mysqli_fetch_assoc($resultUP)) {
echo "<tr>";
echo "<th>".$rowUP["ProofNo"]."</th>";//CustNo is case senSitiVe
echo "<th>".$rowUP["Amt"]."</th>";//CustFN is case senSitiVe
echo "<th>".$rowUP["InvNoA"]."</th>";//CustLN is case senSitiVe
echo "<th>".$rowUP["InvNoB"]."</th>";//CustLN is case senSitiVe
echo "<th>".$rowUP["ProofDate"]."</th>";//CustLN is case senSitiVe
echo "<th>".$rowUP["TransNo"]."</th>";//CustLN is case senSitiVe
echo "</tr>\n";
$item2b =  $rowUP["InvNoA"];
}
mysqli_free_result($resultUP);
}
echo "</table>";

if ($row_cnt > 0)
{
echo "<form   method='post'   action='addTransProof.php'  >";
echo "<br><b>Proof No.";
echo "<select onclick='enable1()' name='ProofToPay' id='ProofToPay' onchange='this.form.submit()'>";
echo "Before entering anything first select the proof if there is one.<br>";
echo "<option value='Select a Proof'>Select a Proof</option>"; 	
if ($resultCP = mysqli_query($DBConnect, $queryCP)) {
	while ($row2 = mysqli_fetch_assoc($resultCP)) {
	$ProofNo = $row2["ProofNo"];
	$Amt =  $row2["Amt"];
	$item2b =  $row2["InvNoA"];
	$item3b = $row2["InvNoB"];
	$item4b = $row2["ProofDate"];
	$TransNo1 = $row2["TransNo"];
	//$SM = $row2["Summary"];
	$queryII = "select * from invoice where InvNo = $item2b";
	echo "<option value='";
	echo $ProofNo;
	echo "'>";
	echo $ProofNo;
	//to determine whether the proof has been paid we got to look at the aproof table
	//which has a TransNo column.
	//in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' 

	//NOPE:
	//to determine whether the invoice(s) have been paid we got to look at the transaction table
	//$TRRSQL = "select * from transaction where CustNo = $CustInt and InvNoA = $item2b or  InvNoA = $item2b";

	print "_TR:".$TransNo1;
	if ($TransNo1 == '')
		echo "not paid yet";
	else 
	echo "ALREADY ASSIGNED TO TR:".$TransNo1;

	print "_R".$Amt;
	print "_InvNoA:".$item2b;

	if ($row2["InvNoB"] > 0)
		print "_InvNoB:".$item3b;

	if ($row2["InvNoC"] > 0)
		print "_InvNoC:".$row2["InvNoC"];

	if ($row2["InvNoD"] > 0)
		print "_InvNoD:".$row2["InvNoD"];

	if ($row2["InvNoE"] > 0)
		print "_InvNoE:".$row2["InvNoE"];

	if ($row2["InvNoF"] > 0)
		print "_InvNoF:".$row2["InvNoF"];

	if ($row2["InvNoG"] > 0)
		print "_InvNoG:".$row2["InvNoG"];


	print "_PrfDate:".$item4b;
	print "_CustNo:".$row2["TransNo"];

	if ($resultII = mysqli_query($DBConnect, $queryII)) {
	  while ($rowII = mysqli_fetch_assoc($resultII)) {

	  $SS = $rowII["Summary"];
	  echo "___".$SS;
	  }
	 }
	print " </option>"; 
		}
	$resultCP->free();
}

echo "</select><br><br>";
echo "<input type='submit' value='Select Proof' id='btn1' disabled='true'   style='width:300px;height:30px' /> ";

echo " <br>(in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = 'http://localhost/phpMyAdmin-3.5.2-english/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;
<a href = 'view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a><br>
<a href = 'editProof.php' target= '_blank'>Click here to assign a proof to another paid invoice</a><br>

<b>";
if ($CommonSDR == '')
echo "<a href= editCust.php><b>CommonSDR is blank! editCust</a></b>";

echo "<br><br>";

}
else "no new proof of payments received";
echo "</form>";


include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes
echo "<b>WARNING! CHECK FOR SIMILARITIES: 88p04 above and 8804 below is the same invoice:</b>";
include "view_Unpaid_inv_by_cust2bATb.php"; //2b is the one with checkboxes WARNING! addTrcsv.php also uses this file.

echo "<br>";
echo "<br><font size = '3' > <b><a href='addProofMultipleProofs.php?CustNo=$CustInt'>add multiple Proofs</a></font></b><br>";

//include "calculator/indexKL.php"; // works here
echo "UPIS:".$UnpaidInvsummm;

if ($UnpaidInvsummm < 4)
echo "<br><font size = '6' > <b>No unpaid invoices. <br><font size = '4' > <a href = 'addInvCsess.php'>Click here to create new invoice</a></b><br><br>
<a href = 'addInvCsessDadsl.php?CustNo=$CustInt'>Click here to create new ADSL invoice</a></b><br>
<br><br></font><br><br>";
else
echo "<br><font size = '3' > <b> <br><a href = 'addInvCsess.php'>Click here to create new invoice</a></b><br><br>
<a href = 'addInvCsessDadsl.php'>Click here to create new ADSL invoice</a></b><br>
<br><br></font><br><br>";
	
//	include "calculator/indexKL.php"; //not working here
//include "calculator/index.php"; //not working here
	
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(TransNo)  AS MAXNUM FROM transaction";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
while($row = mysqli_fetch_array($result))
{
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}


include "view_transLatestC.php"; //

echo "Add new transactions:<br>";
include "calculator/indexKL.php"; // works here


//include "calculator/indexKL.php"; // may not be placed inside another form calculation screwd up
?>
<form  action="addTMchk.php"   method="post">
<br>
<?php //include "calculator/indexKL.php"; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>Only if invoices do not show above, scroll down here:
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>

here we can select multiple invoices for the transaction using jQuery:
<br>First select related invoices:<br>
Payment Notes: <input type="text" id="PayNotes" size = '30' name="PayNotes" value="<?php echo $PayNotes;?>" > <br>
<?php
include "viewExpCust2.php";
echo "<table>";
echo "<tr><th>TransNo</th>";
echo "<th>TransDate<br>Hover and wait";
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CustSDR&nbsp;&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n<tr>";
?>
<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $daNextNo;?>" />
</th>
<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		?>
			<?php include("yesterday.php"); ?>
			<input id="TransDate" size="10" name="TransDate" value = "<?php echo $TransDate; ?>" >
		</th>

		<th>
			CustSDR<input type="text"  size="19" id="CustSDR"  name="CustSDR" size = '20' value="<?php echo $CommonSDR; ?>" />

		</th>

		<th>
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AmtPaid; ?>"   class='clAmt'/>
		</th>
		<th>

		<!-- drop down requires a name and not an id: The reason it's not sending through is becasue i did not select anyhting here,
i only chose the existing proof from the other dropdown which autosubmitted-->
			<select name="TMethod"  id="TMethod"  >
                <option value="Please Choose">Please Choose</option><!-- the javascript function requires phrase Please Choose -->
				<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>	
                <option value="Mixed">Mixed</option>	
                <option value="-">-</option>	
</select>
		</th>
		<th>
		<select name="AP"  id="AP"  >
 <!-- the javascript function requires phrase Please Choose -->
		<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="DoNotAddAProof">DoNotAddAProof</option>
                <option value="AddAProof">AddAProof</option>
				<option value="AddAProofSAMEDATE">AddAProofSAMEDATE</option>
</select>
		</th>
		
		</tr></table>
		<table>
		<tr>
		<?php
		echo "<th>Invoices details incl VAT &nbsp;&nbsp;eg 7313, 209, Jun2014adsl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		
	?>	
		</tr></tr>	</table>

<?php include 'invJQuery2.php' ?>
			<input type="text"  size="3" id="InvNoA"  name="InvNoA" class='clInvNoA' />(click and wait)<br>
			<input type="text"  size="1" id="InvNoB"  name="InvNoB"  class='clInvNoA'/>(click and wait)
			<input type="text" id="InvNoC"    size="1" name="InvNoC"  class='clInvNoA' />(click and wait)<br>
			<input type="text" size="1"  id="InvNoD"  name="InvNoD"  class='clInvNoA' />click and wait)
			<input type="text" id="InvNoE"   size="1" name="InvNoE"  class='clInvNoA' />
			<input type="text" size="1"  id="InvNoF"  name="InvNoF"  class='clInvNoA' />
			<input type="text"  size="1" id="InvNoG"  name="InvNoG"  class='clInvNoA' />
			<input type="text" size="1"  id="InvNoH"  name="InvNoH"  class='clInvNoA' />
			<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">

<input type='submit' value="Create transaction"   style="width:300px;height:30px" /> 
<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 

</form>

<?php
include "view_trans_by_custUNDERorOVERPAID.php";

$ShowDraft = "Y";
include "view_Unpaid_inv_by_cust2.php";
echo "<br><br>";
include "view_Unpaid_inv_by_cust2bATb_.php";
echo "<br><br>";
$indesc = '0';
//include "view_transLatest.php";
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");


echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";
echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

include ("view_event_by_cust.php");
?> 
</body>
</html>