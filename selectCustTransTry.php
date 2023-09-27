<?php


	$page_title = "Add a transaction";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	
?>	
<html>
<head>
<title>Add a transaction</title>
<script type="text/javascript">

</script>
</head>

<?php
	$CNN = '';
$CNN = @$_GET['CustNo'];
$WrongCustNo = '';
$WrongCustNo = $_GET['WrongCustNo'];
echo "WrongCustNo:".$WrongCustNo." <br>";


$TransDate = '';
$TransDate = @$_GET['DA'];
//echo $TransDate;
$arraySDR = $SDR = '';
$arraySDR = $SDR = @$_GET['SDR'];
//echo $SDR;
$AA = $AmtPd = '';
$AA = $AmtPd = @$_GET['AmtPaid'];
//echo $AmtPd;


require_once('header.php');	
require_once("inc_OnlineStoreDB.php");
$CCCCC = '';

?>
<input type="text"  size = 14  value="<?php echo $TransDate;?>">
SDR: <input type="text" id="SDR" size = 34 name="SDR" value="<?php echo $arraySDR;?>">
AmtPaid: <input type="text" id="AmtPaid" size = 7 name="AmtPaid" value="<?php echo $AA;?>">
<?php


preg_match_all('/(\d{4,})/', $arraySDR, $matches); //extract exact 4 digit numbers or greater from a given string
//echo "<br>matches:<br>";
//print_r($matches);
//echo "<br>MA00: ".@$matches[0][0]; //sdr  chk 
//echo "<br>MA01: ".@$matches[0][1]; //date
$M0 = @$matches[0][0];
$M1 = @$matches[0][1];
$M2 = @$matches[0][2];
//echo "A|AAAAA".$array[1];

include "chkAmtPd2.php";
//include "chkInv.php";


if (strpos($arraySDR, 'HLDBR') !== false) {
    $CCCCC = 76;
	
	echo "<br><br>BUT might also be Hildebrand Parents CustNo329<br><br>";
}
if (strpos($arraySDR, 'ERNST') !== false) {
    $CCCCC = 92;
	
	echo "<br>Ernst Reiner Klaus<br><br>";
}
if ($arraySDR == '1878')
{
    $CCCCC = 9;
	
	echo "<br>Mielck<br><br>";
}


//if ($CCCCC == '')
//include "chkSDR.php";


	$CustInt = $CCCCC;
//echo "CI:".$CustInt;	
	if ($ininV == '1878')
		$CustInt = 9; //mielck
if ($CustInt == '')
include "chkACC.php";
if ($CustInt == '')
include "chkAmtPd.php";
if ($CustInt == '')
include "chkSurname.php";
if ($CustInt == '')
include "chkSurnameNoSpaces.php";
if ($CustInt == '')
include "chkFname.php";
	
	$CustInt = $CCCCC;

if ($CustInt == '')
{
	

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>Could not assign transaction,<br> please click here</a><br>
	<b><a href= 'view_trans_all.php?'>view_trans_all.php</b></a>
	<br><br>";
	
	
	echo "<font size = 4><a href= 'selectCustTrans1.php?SDR=$arraySDR&AmtPaid=$AA'>Could not assign transaction,<br> please click here to add transaction manually</a>";
	//include "view_inv_all.php";
	include "view_inv_amt.php";
	
exit();
}

if (@$_POST['inv1'] != '')
{
	//we received an inv1 umber from the form
	//check whom this invoice belongs to
	$inin = $_POST['inv1'] ;
	$queryC = "select CustNo from invoice where InvNo = $inin";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
echo "".$row["CustNo"]."</th>";//CustNo is case senSitiVe
//echo "".$row["InvNo"]."</th>";//CustFN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo " InvNorows: $row_cnt</th>"; //not ttested yet

$CCCCC = $row["CustNo"];
	$CustInt = $CCCCC;
	}
mysqli_free_result($resultC);
}
		if ($_POST['inv1'] == '1878')
		$CustInt = 9; //mielck

}


@session_start();
$_SESSION['CustNo'] = $CustInt;



$AmtPaid = "";
$CommonSDR = "";
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLString;
$item1 = '';
$item2 = '';
$item3 = '';
$item4 = '';
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
$PayNotes = $row["PayNotes"];
$CommonSDR = $row["CommonSDR"];

print "TrcsvCustNo: $item1";
print " ".$item2;
print " <b><Font size = 3>".$item3;
print "</font></b> ".$item4." ".$Important;
//echo "..{$row['dotdot']}";
}
$result->free();
};
?>
<input type="hidden" idf="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">



<?php
include "chkTrans.php"; //check if transaction has already been processed.

	echo "<font size = 4><a href= 'selectCustTransTry.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate&WrongCustNo=$CustNo'>wrong customer? try again here.</a></font><br><br>";

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>if incorrect customer please click here</a></font><br><br>";
	

$queryCP = "select * from aproof where CustNo = $CustInt order by ProofDate desc";
//echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {
    $row_cnt = mysqli_num_rows($resultCP1);
    //printf("proof has %d rows.\n", $row_cnt);
    mysqli_free_result($resultCP1);
}

?>

<form method='post' action = "addProof.php?='<?php echo $TransDate; ?>'">
<input type='submit' value='(Add a Proof)' style="height:22px; width:100px">
<?php echo "<font size = '1'>CommonSDR: $CommonSDR </font>"; ?>

<input type="hidden" id="CustNo" size='5' name="CustNo"  value="<?php echo $CustInt;?>">
</form>
 <?php

$item2b = '';
$rowCntUP = 0;
$queryUP = "select * from aproof where CustNo = $CustInt and TransNo = '' order by ProofDate desc";
//echo $queryUP;
if ($resultUP = mysqli_query($DBConnect, $queryUP)) {

$rowCntUP = mysqli_num_rows($resultUP);
if ($rowCntUP != 0)
{
echo "Unassigned proofs:<br>";

echo "<table width='10' border='1'>\n";
echo "<tr><th>ProofNo</th>";
echo "<th>Amt</th>";
echo "<th>InvNoA</th>";
echo "<th>InvNoB</th>";
echo "<th>ProofDate</th>";
echo "<th>TransNo</th>";
echo "</tr>\n";
}
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

if ($rowCntUP != 0)
{
echo "</table>";
}



if ($row_cnt > 0)
{
echo "<form   method='post'   action='addTransProof.php'  >";
echo "<b>";
echo "<select onclick='enable1()' name='ProofToPay' id='ProofToPay' onchange='this.form.submit()'>";
echo "Before entering anything first select the proof if there is one.<br>";
echo "<option value='Select a Proof'>(Select a Proof)</option>"; 	
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

//print "_TR:".$TransNo1;
if ($TransNo1 == '')
echo " not paid yet";
else 
echo " already assigned to TR:".$TransNo1;

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

echo "</select></b>";
//echo "<input type='submit' value='Select Proof' id='btn1' disabled='true'   style='width:300px;height:30px' /> ";

echo " <br>(in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = 'phpmyadmin/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;";
echo "<a href = 'view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a><br>
<a href = 'editProof.php' target= '_blank'>Click here to assign a proof to another paid invoice</a>";
if ($CommonSDR == '')
echo "<br><b><a href= editCust.php><b>CommonSDR is blank! editCust</a></b>";

echo "<br>";

}
else "no new proof of payments received";
echo "</form>";

//include "view_transLatest.php";

include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes and has form action
echo "<b>WARNING! CHECK FOR SIMILARITIES: 88p04 above and 8804 below is the same invoice:</b>";
if ($TBLrow == '')
	$TBLrow = $CCCCC;
?>
<input type='hidden' name='TransDate' value='<?php echo $TransDate; ?>'>

<input type='text' name='mydropdownEC' value='<?php echo $TBLrow; ?>'>
<?php

include "view_Unpaid_inv_by_cust2bATb.php"; //2b is the one with checkboxes

echo "<br>";

//include "calculator/indexKL.php"; // works here

if ($UnpaidInvsummm < 4)
echo "<br><font size = '6' > <b>No unpaid invoices. <br><font size = '4' > <a href = 'addInvCsess.php?Paid=Y'>Click here to create new invoice</a></b><br><br>
<a href = 'addInvCsessDadsl.php?Paid=Y'>Click here to create new ADSL invoice</a></b><br>
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
//include "calculator/indexKL.php"; // works here but i never use it
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
			<input type="text"  size="19" id="CustSDR"  name="CustSDR" size = '20' value="<?php echo $CommonSDR; ?>" />

		</th>

		<th>
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AA; //$AmtPaid ?>"   class='clAmt'/>
		</th>
		<th>

		<!-- drop down requires a name and not an id: The reason it's not sending through is becasue i did not select anyhting here,
i only chose the existing proof from the other dropdown which autosubmitted-->
			<select name="TMethod"  id="TMethod"  >
               <!--  <option value="Please Choose">Please Choose</option>the javascript function requires phrase Please Choose -->
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
$indesc = '0';
//include "view_transLatest.php";
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");


echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";
echo "<font size = 5>Total Amount outstanding: R".($Invsummm - $yo)."</font></b><BR />";

include ("view_event_by_cust.php");
?> 
</body>
</html>