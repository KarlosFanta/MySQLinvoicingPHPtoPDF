<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


</head>
<body>

<?php
require_once('header.php');	
require_once("inc_OnlineStoreDB.php");
 $CNLN = '';
 $CNFN = '';
$CCCCC = '';
$txtArea = $_POST['csv'];
/*echo "<br>";echo json_encode($txtArea);
echo "<br>";
echo "<br>";echo htmlentities($txtArea);
echo "<br>";
*/

//\x0D carriage return (CR) &#13;
//$string = $txtArea;
//$array = preg_split ('/$\R?^/m', $string);
//$array = preg_split (' ', $string);
//$array = preg_split (' ', $string);
//$array = preg_split (' ', $string);
//$array = preg_split (' ', $string);
//$array = preg_split ('&#13', $string);
//$array = preg_split ('\t', $string);
//$array = explode (' ', $string);
//$array = explode ('\t', $txtArea);
$txtArea = str_replace("\n", "\\n\n", $txtArea);
$txtArea = str_replace("\t", "\\t\t", $txtArea);
//echo "newlines raw outpup:".nl2br(htmlentities($txtArea)); // for HTML as output, with <br/> for newlines
//echo "<pre>" . $txtArea . "</pre><br>"; // for raw, preformated output
$array = explode ('\t', $txtArea);
$AA='';
$AA=$array[3];
$AA = ltrim($AA, '	');
$AA = ltrim($AA, 'R');//remove rand
//$AA = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000

if ($AA == '')
echo "<br><font size = 5 color= red><b>ERROR, no amount paid, in bank statement shift number to 4th column</b></font><br><br>";

$arraySDR = $array[1]; //sdr  chk view_Unpaid_inv_by_cust2bAT.php

$arraySDR = ltrim($arraySDR, '	');

$TransDate = $array[0];

$rest = substr($TransDate, -5, 1); // returns "d"
//echo "reest: >>".$rest."<< ";
if ($rest == ' ')
{
$DD = explode(" ", $TransDate);
$TransDate = $DD[0]."/".$DD[1]."/".$DD[2];
}
//echo "TransDate is now: >>".$TransDate."<<<br>";

$TransDate = str_replace(" ","/", $TransDate);

$D1 = explode("/", $TransDate);
//echo "TRRANSDATE:".$TransDate."TRRANSDATE";
if ($D1[1] == 'Jan')
{
$TransDate = $D1[0]."/01/".$D1[2];
}
if ($D1[1] == 'Feb')
{
$TransDate = $D1[0]."/02/".$D1[2];
}
if ($D1[1] == 'Mar')
{
$TransDate = $D1[0]."/03/".$D1[2];
}
if ($D1[1] == 'Apr')
{
$TransDate = $D1[0]."/04/".$D1[2];
}
if ($D1[1] == 'May')
{
$TransDate = $D1[0]."/05/".$D1[2];
}
if ($D1[1] == 'Jun')
{
$TransDate = $D1[0]."/06/".$D1[2];
}
if ($D1[1] == 'Jul')
{
$TransDate = $D1[0]."/07/".$D1[2];
}
if ($D1[1] == 'Aug')
{
$TransDate = $D1[0]."/08/".$D1[2];
}
if ($D1[1] == 'Sep')
{
$TransDate = $D1[0]."/09/".$D1[2];
}
if ($D1[1] == 'Oct')
{
$TransDate = $D1[0]."/10/".$D1[2];
}
if ($D1[1] == 'Nov')
{
$TransDate = $D1[0]."/11/".$D1[2];
}
if ($D1[1] == 'Dec')
{
$TransDate = $D1[0]."/12/".$D1[2];
}
//echo " TRRANSDATE:".$TransDate."TRRANSDATE";


$D2 = explode("/", $TransDate);
//echo "substr: ". substr( $year, 2)."end";
if (strlen($D2[2])== 2)
$TransDate = $D2[0]."/".$D2[1]."/20".$D2[2];


//echo " TRRANSDATE:".$TransDate."TRRANSDATE";




?>
<input type="text"  size = 14  value="<?php echo $TransDate;?>">
SDR: <input type="text" id="SDR" size = 34 name="SDR" value="<?php echo $arraySDR;?>">
AmtPaid: <input type="text" id="AmtPaid" size = 7 name="AmtPaid" value="<?php echo $AA;?>">

<?php if ($AA == '')
echo "<br><font size = 5 color= red><b>ERROR, no amount paid, in bank statement shift number to 4th column</b></font><br><br>";

if ($AA > 4000)
echo "<br><font size = 8 color= red><b>Amount paid IS HUGE! R$AA <br>Please double check!!!</b></font><br><br>";

?>

<font size = 1>
<?php
//echo "<br>A0: ".$array[0]; //date
//echo "<br>A1: ".$array[1]; //sdr  chk view_Unpaid_inv_by_cust2bATb.php
//echo "<br>A2: ".$array[2]; //tab
//echo "<br>A3: ".@$array[3]."<br>"; //amt  chk view_Unpaid_inv_by_cust2bATb.php
//echo "<br>A4: ".@$array[4]; //tab
//echo "<br>A5: ".@$array[5]; //  chk view_Unpaid_inv_by_cust2bAT.php

if ($array[1] == '')
	echo "<font size = 6>error, Please paste the date, Statement Description and Amount of a transaction into textarea. Preferably save the excel (.XLSX) file as a .CSV tabular file<br><br><br>";

//$arraySDR = str_replace($arraySDR, '/');
//$arraySDR = str_replace(array('/', ' '), array('-', ''),array('*', ''), $arraySDR);
$arraySDR = str_replace("/", " ", $arraySDR);
$arraySDR = str_replace("-", " ", $arraySDR);
$arraySDR = str_replace("*", " ", $arraySDR);

preg_match_all('/(\d{4,})/', $arraySDR, $matches); //extract exact 4 digit numbers or greater from a given string
//echo "<br>matches:<br>";
//print_r($matches);
//echo "<br>MA00: ".@$matches[0][0]; //sdr  chk 
//echo "<br>MA01: ".@$matches[0][1]; //date
$M0 = @$matches[0][0];
$M1 = @$matches[0][1];
$M2 = @$matches[0][2];
//echo "A|AAAAA".$array[1];
//echo "TransDateb".$TransDate;

include "chkAcc.php"; //checks Customer Number in Statement Description
	echo "<br>chkAcc.php CCCCC: $CCCCC";
if ($CCCCC != '')
{
$query = "select CustNo, CustFN, CustLN from customer where CustNo = $CCCCC";
if ($result2 = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result2)) {
	$CNLN =  $row["CustLN"];
	$CNFN = $row["CustFN"];
	}
	mysqli_free_result($result2);
}

echo " Account no: <a href= 'addTrans.php?CustNo=$CCCCC&AmtPaid=$AA&TransDate=$TransDate&SDR=$arraySDR' target = '_blank'>CustNo $CCCCC $CNLN	$CNFN</a>";
}
//SDR=$arraySDR&AmtPaid=$AA

//echo "TransDateb".$TransDate;




echo "<br>chkTransExist.php ";
include "chkTransExist.php";
echo "<br>chkInv1.php ";
include "chkInv1.php";
echo "<br>chkInv.php ";
include "chkInv.php";




//echo "TransDatesinv".$TransDate;


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
//echo "TransDates".$TransDate;
//echo "TransDatesdr".$TransDate;

	echo "chkSDR.php CCCCC: $CCCCC";
include "chkSDR.php";
	echo "chkCommonSDR.php CCCCC: $CCCCC";
include "chkCommonSDR.php";
	echo "chkCommonSDR2.php CCCCC: $CCCCC";
include "chkCommonSDR2.php";
//	echo "CustInt: $CustInt<br>";


	$CustInt = $CCCCC;
//echo "CI:".$CustInt;	
	if ($ininV == '1878')
		$CustInt = 9; //mielck
	
	

	
//if ($CustInt == '')




//if ($CustInt == '') //this == somehow doens;t work.
//{
include "chkAmtPd.php";
echo "chkAmtPd.php CCCCC: $CCCCC";
//}
//	echo "CustInt: $CustInt<br>";
//if ($CustInt == '')
//{
include "chkSurname.php";













	echo "chkSurname.php CCCCC: $CCCCC";
//}
//	echo "CustInt: $CustInt<br>";
//if ($CustInt == '')
//{
include "chkSurnameNoSpaces.php";
	echo "<br>chkSurnameNoSpaces.php CCCCC: $CCCCC";
//}
//	echo "CustInt: $CustInt<br>";
//if ($CustInt == '')
//{
include "chkFname.php";
	echo " &nbsp;&nbsp;&nbsp;chkFname.php CCCCC: $CCCCC";
//}
//if ($CustInt == '')
//{
include "chkAmtPdAgain.php";
	echo "<br>chkAmtPdAgain.php CCCCC: $CCCCC";
//}
	$CustInt = $CCCCC;
	if ($CustInt == '175')
		$CustInt = 65; //grill	

	
	
	
		if ($CCCCC == '150')
	echo "CCCCChhh: $CCCCC

<br><br>
<br>

<br><br><font size = 5 color = black>
NB Not Klaus Scheurer, click on SIMILAR options:
<br><br></font>
";
//	echo "CustInt: $CustInt<br>";

	
	
	
	
if ($CustInt == '')
{
	

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>Could not assign transaction,<br> please click here</a><br>
	<b><a href= 'view_trans_all.php?'>view_trans_all.php</b></a>
	<br><br>";
	
	
	echo "<font size = 4><a href= 'selectCustTrans1.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>Could not assign transaction,<br> please click here to add transaction manually</a>";
	//include "view_inv_all.php";
	echo "<br></font>Display invoices with similar amounts:";
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

	echo "CCCCC: $CCCCC";
	echo "CustInt: $CustInt";


/*echo "<br>Custint:".$CustInt."<br />";
//@session_start();
//$_SESSION['CustNo'] = $CustInt;

if(isset($_SESSION['CustNo']))
echo "";
else
echo "<a href = 'selectCust.php' >no  PLEASE SELECT A CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

if(($_SESSION['CustNo'])== '0')
echo "<a href = 'selectCust.php' >no  PLEASE SELECT dA CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
*/
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
<input type="hidden" name="CustNo" value="<?php echo $item1;?>">
<input type="hidden"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden"   name="CustLN" value="<?php echo $item3;?>">
<input type="hidden"  name="CustEmail" value="<?php echo $item4;?>">



<?php
//echo "TransDateb".$TransDate;

include "chkTrans.php"; //check if transaction has already been processed.

	//echo "<font size = 4><a href= 'selectCustTransTry.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate&WrongCustNo=$item1'>wrong customer? try again here.</a> </font>";

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>if incorrect customer please click here</a></font><br><br>";
	

//include "view_transLatest.php";

include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";

?>
<form  name="AddTrans2"  method='post' action = "addTransMultibSEP.php">
<?php
 echo "<b>&nbsp;<font size= 3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$item2; echo " ".$item3."</font>";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes and has form action
echo "<b>WARNING! CHECK FOR SIMILARITIES: 88p04 above and 8804 below is the same invoice:</b>";
if ($TBLrow == '')
	$TBLrow = $CCCCC;
?>
<input type='hidden' name='TransDate' value='<?php echo $TransDate; ?>'>

<input type='text' name='mydropdownEC' value='<?php echo $TBLrow; ?>'>
<?php

include "view_Unpaid_inv_by_cust2bATb.php"; //2b is the one with checkboxes WARNING! addTrans.php also uses this file.

echo "<br>";

//include "calculator/indexKL.php"; // works here

if ($UnpaidInvsummm < 4)
echo "<br><font size = '6' > <b>No unpaid invoices. <br><font size = '4' > <a href = 'addInvCsess.php?Paid=Y'>Click here to create new invoice</a></b><br><br>
<a href = 'addInvCsessDadsl.php?Paid=Y&CustNo=$CustInt'>Click here to create new ADSL invoice</a></b><br>
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
<?php
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
<?php echo "<font size = '1'>CommonSDR: $CommonSDR </font>"; 

if ($CommonSDR  == '') echo "none. Recommended CommonSDR is $item3";
?>

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
?><br>
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
			$AA<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AA; //$AmtPaid ?>"   class='clAmt'/>
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