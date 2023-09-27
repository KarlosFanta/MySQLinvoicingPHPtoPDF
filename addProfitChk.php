<html>
<head>
<title>Adding Profit</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script>

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
<!-- jquery required for copyToClipbrd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<?php

$ProfitNo = 0;
$ProfitNo = $_POST['ProfitNo'];
$CustNo = '0';
$AccNo = '123';
$SupCode = '';
$Notes ='';
$TMethod = '';

$ProofNo = '_';

$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";
$ItemA = '';
$AS = '';
$AC = ''; //category
$AN = '';


$CCCCC = '';
$txtArea = $_POST['csv'];
/*echo "<br>";echo json_encode($txtArea);
echo "<br>";
echo "<br>";echo htmlentities($txtArea);
echo "<br>";
*/
$txtArea = str_ireplace("10240 KB", "10mbps", $txtArea);

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
//echo nl2br(htmlentities($txtArea)); // for HTML as output, with <br/> for newlines
//echo "<pre>" . $txtArea . "</pre>"; // for raw, preformated output
$array = explode ('\t', $txtArea);
$Amt='';
$Amt=$array[3];

if ($Amt == '')
{
echo "<font szie = 6 color = red>error Amount on wrong spot correct in bank sheet</font>";
$Amt=$array[2];

}	

$Amt = ltrim($Amt, '	');
//$Amt = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$Amt = strtr($Amt, array(',' => '')); //for longn numbers like R11,000
$arraySDR = $array[1]; //sdr  chk view_Unpaid_inv_by_cust2bAT.php

$arraySDR = ltrim($arraySDR, '	');

echo "SDR: $arraySDR<br>";
echo "Amt: $Amt<br>";
echo "<input type='text' id='Am' name='pn'  style='width: 60px;'  value='$ProfitNo'>";
?>
<p id="p1"><?php echo $ProfitNo; ?></p>

<button onclick="copyToClipboard('#p1')">Copy ProfitNo to clipboard memory</button><br>

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
//$arraySDR = str_replace("/", "", $arraySDR);
$arraySDR = str_replace("/01", "Jan", $arraySDR);
$arraySDR = str_replace("/02", "Feb", $arraySDR);
$arraySDR = str_replace("/03", "mar", $arraySDR);
$arraySDR = str_replace("/04", "Apr", $arraySDR);
$arraySDR = str_replace("/05", "May", $arraySDR);
$arraySDR = str_replace("/06", "Jun", $arraySDR);
$arraySDR = str_replace("/07", "Jul", $arraySDR);
$arraySDR = str_replace("/08", "Aug", $arraySDR);
$arraySDR = str_replace("/09", "Sep", $arraySDR);
$arraySDR = str_replace("/10", "Oct", $arraySDR);
$arraySDR = str_replace("/11", "Nov", $arraySDR);
$arraySDR = str_replace("/12", "Dec", $arraySDR);
$arraySDR = str_replace("-", "to ", $arraySDR);
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

$ItemA= $arraySDR;
$TransDate = $array[0];

//echo "TRRR:[[[[[[".$TransDate."]]]]]]]<br>";



$rest = substr($TransDate, -5, 1); // returns "d"
//echo "reest: >>".$rest."<< ";
if ($rest == ' ')
{
	echo "active 1";
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






















//echo "TRRR:[[[[[[".$TransDate."]]]]]]]<br>";

$rest = substr($TransDate, -5, 1);
//echo "reest: >>".$rest."<<<br><br><br>";
if ($rest == ' ')
{
	echo "activate";
$DD = explode(" ", $TransDate);
$TransDate = $DD[0]."/".$DD[1]."/".$DD[2];
}
//echo "TRRR:[[[[[[".$TransDate."]]]]]]]<br>";


echo " ".$TransDate." ";
$TransDate = trim(preg_replace('/\t+/', '', $TransDate));


//echo "TRRR:[[[[[[".$TransDate."]]]]]]]<br>";






$A2 = explode("/", $TransDate);
$TransDate = $A2[2]."-".$A2[1]."-".$A2[0];

$query="insert into Hprofits (ProfitNo, Category, ProfitDesc, AccNo, SupCode, RecvdDate, Amt, Notes, CustNo )
VALUES                       ( $ProfitNo,   '$AC',  '$ItemA', '$AccNo','$SupCode', '$TransDate', '$Amt','$AN', '' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><font size = 5  color = red><b><b>insert into Hprofits NOT successfull!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: Profit No: $ProfitNo</font><br>a: $query<br>";




include "viewProfitAll.php";








exit();
include "chkInv.php";


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


if ($CCCCC == '')
include "chkSDR.php";


	$CustInt = $CCCCC;
//echo "CI:".$CustInt;	
	if ($ininV == '1878')
		$CustInt = 9; //mielck
if ($CustInt == '')
include "chkACC.php";
if ($CustInt == '')
include "chkAmtPd.php";
	
	$CustInt = $CCCCC;

if ($CustInt == '')
{
	

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&Amt=$Amt&DA=$TransDate'>Could not assign transaction,<br> please click here</a><br>
	<b><a href= 'view_trans_all.php?'>view_trans_all.php</b></a>
	<br><br>";
	
	
	echo "<font size = 4><a href= 'selectCustTrans1.php?SDR=$arraySDR&Amt=$Amt'>Could not assign transaction,<br> please click here to add transaction manually</a>";
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
$Amt = "";
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

	echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&Amt=$Amt&DA=$TransDate'>if incorrect customer please click here</a></font><br><br>";
	

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
echo "<br><font size = '6' > <b>No unpaid invoices. <br><font size = '4' > <a href = 'addInvCsess.php'>Click here to create new invoice</a></b><br><br>
<a href = 'addInvCsessDadsl.php'>Click here to create new ADSL invoice</a></b><br>
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
//include "calculator/indexKL.php"; // may not be placed in side another form calculation screwd up
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
echo "<font size = 5>Total Amount outstanding: R".($Invsummm - $yo)."</font></b><BR />";

include ("view_event_by_cust.php");
?> 
</body>
</html>