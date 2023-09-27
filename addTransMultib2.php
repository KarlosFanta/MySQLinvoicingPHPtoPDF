<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="jquery-ui.css">
<!--//from //code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css-->
	<script type="text/javascript" src="jquery.min.js"></script>
<!--	//from http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js -->
	
	<script type="text/javascript" src="jquery.numeric.js"></script>
	
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script  type="text/javascript">
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


</script>
</head>
<body>




<?php	//this is "addTransCustProcess2.php"
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");



 

$DT = $_GET["DT"];//invDate
$SDR = $_GET["SDR"];//invDate
$DT = $_GET["DT"];//invDate
$CustInt = $_GET["CustNo"];
echo $CustInt."<br>";
$InvNo = $_GET["InvNo"];
$Summary = $_GET["Summary"];
$TotAmt = $_GET["TotAmt"];
$Flag = "";
$Flag = @$_GET["Flag"];
echo $InvNo."<br>";
$AmtPaid = "";
$SQLString = "";
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$CommonSDR =  $row["CommonSDR"];
$Important = $row["Important"];
$PayNotes = $row["PayNotes"];
$ABBR =  $row["ABBR"];
/*$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$item1";
print " ".$item2;
print " <b><Font size = 3>".$item3;
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






include "view_inv_by_custADV3.php";

$indesc = 0;
$ShowDraft = "N";
include "view_Unpaid_inv_by_cust2.php";
//echo "<br><br>";
$indesc = 9;
$ShowDraft = "Y";

//echo $N. " Selected: ";
$indesc = '0';
//include "calculator/indexKL.php"; // works here



 $aD0 = "";
//echo "aDoor:".$aDoor;
//echo " aDoor0:".$aDoor[0]; check POST above



$invR = 'invR';
$InvSM = 'invSM';





$aD1R ="";
 $aD1 = "";


if ($UnpaidInvsummm < 4)
echo "<br><font size = '6' > <b>No unpaid invoices. <br><a href = 'addInvCsess.php'>Click here to create new invoice</a></b><br><br><br><br><br><br><br><br><br><br><br></font><br><br>";


	
	
//	include "calculator/indexKL.php"; //not working here
	
	
	
	
	
	
	
	
	
	
	
	
	
	
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(TransNo)  AS MAXNUM FROM transaction";


$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;


}





include "calculator/indexKL.php"; // works here


$queryCP = "select * from aproof where CustNo = $CustInt";
echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {

    // determine number of rows result set 
    $row_cnt = mysqli_num_rows($resultCP1);
	

    printf("proof has %d rows.\n", $row_cnt);

    
    mysqli_free_result($resultCP1);
}


?><br>

<br> <?php

if ($row_cnt > 0)
{

	echo "<form   method='post'   action='addTransProof.php'  >";
echo "<br><b>Proof No.";
echo "<select name='ProofToPay' id='ProofToPay' onchange='this.form.submit()'>";
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
//echo "<input type='hidden' name='ProofNo' value= '$ProofNo'>";
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

echo "</select><br>";
echo "<input type='submit' value='Select Proof'   style='width:300px;height:30px' /> ";

echo " <br>(in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = 'http://localhost/phpMyAdmin-3.5.2-english/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;
<a href = 'http://localhost/ACS/view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a><br>


<br><br>";

}
else "no new proof of payments received";



echo "</form>";





//include "calculator/indexKL.php"; // may not be placed inside another form calculation screwd up
?>

<form  action="addTMchk.php"   method="post">

<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->


<?php 
if ($Flag == 'Fast')
	echo "Flag: <input type = 'text' name = 'Flag' id = 'Flag' value = 'Fast'>";

//include "calculator/indexKL.php"; ?>
<br>
<!--here we can select multiple invoices for the transaction using jQuery:
<br>First select related invoices:<br>-->
</p></n>
Payment Notes: <input type="text" id="PayNotes" size = '60' name="PayNotes" value="<?php echo $PayNotes;?>" > <br>


<?php


		//echo "pieces3:>>".$pieces[3]."<<";
		
//````````echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

echo "<table>";
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate<br>Hover and wait";
//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;	<input type='checkbox' name='updSDR' value='Bike'>update SDR<br>CustSDR+Common&nbsp;&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n<tr>";
?>


		



			<!--<th><label>* Transaction AutoNumber: (!! Different for internet transactions!)</label>


			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $daNextNo;?>" />

		</th>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>">




		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		?>
				<?php include("yesterday.php"); ?>
	<!--		<input id='lst' id="TransDate" size="10" name="TransDate" required >-->
			<input id='lst' id="TransDate" size="10" name="TransDate" value= "<?php //echo $DT; ?>" required >
		</th>

		<th>
			<!--<label>&nbsp; CustSDR:</label></dt>-->




			<input type="text"  size="23" id="CustSDR"  STYLE="color: #FFFFFF; background-color: #72A4D2;"   name="CustSDR" size = '20' value="<?php echo $SDR;//echo $pieces[4]; ?>" />
			<!--<textarea id="CustSDR"  name="CustSDR" ></textarea>-->
			
			
		</th>

		<th>
	<!--		<input type="number"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php //echo $SUMSEL; ?>"   class='clAmt'/>-->
			<!--<input class="decimal-2-places" type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php //echo $SUMSEL; ?>" />-->
	<input class="decimal-2-places" type="text" size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $TotAmt; ?>"  />
		<!--<input class="decimal-2-places" type="text" /> http://www.texotela.co.uk/code/jquery/numeric/ -->
	
			
		</th>
	
	
		<th>











<!-- drop down requires a name and not an id: The reason it's not sending through is becasue i did not select anyhting here,
i only chose the existing proof from the other dropdown which autosubmitted-->
<?php 
$EEE = ''; 
/*$EEE = $pieces[3];
if ($pieces[3]=='EFTEmailProof')
{
$EEE = 'EFT'; 
//echo " EEE:".$EEE;

}
*/
//echo " EEE:".$EEE;
if ($EEE == '')
	$EEE = 'EFT';
?>
<select name="TMethodR"  id="TMethodR"  >
 <option value="<?php echo $EEE; ?>"><?php echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose -->
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
		</tr>
		</table>
		
		
		<?php
		echo "Invoices details incl VAT &nbsp;&nbsp;eg 7313, 209, Jun2014adsl&nbsp;&nbsp;&nbsp;&nbsp;$ABBR,inv$invR,$InvSM<br>";

		//include 'invJQuery2.php' ?>
			<input type="text"  size="35" id="InvNoA"  name="InvNoA" style="font-size: 16px;font-weight: bold;" value = "<?php echo $InvNo; ?>"  /><br>
			

<input type='submit' value="Create transaction"   onsubmit='return formValidator()'  style="width:200px;height:30px" /> 




<select name="AP"  id="AP"  >
 <!-- the javascript function requires phrase Please Choose -->
		<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="DoNotAddAProof">DoNotAddAProof</option>
				 <option value="AddAProofSAMEDATE">AddAProofSAMEDATE</option>
                <option value="AddAProof">AddAProof</option>
				
</select>


<br>
<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:200px;height:30px" /> <br>
</form>

<br><p></p>

<form   method='post' action = "addProof.php">

<input type='submit' value='(or first add a Proof)' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">

</form>

<?php
include "view_proof_by_cust3.php";
include "viewExpCust2.php";

$indesc = 0;
$ShowDraft = "N";
include "view_Unpaid_inv_by_cust2.php";
//echo "<br><br>";
$indesc = 9;
$ShowDraft = "Y";

//include ("view_trans_by_cust.php");
//include "view_transLatest.php";

?>
<a href = "view_trans_by_cust.php" target="_blank">view_trans_by_cust.php</a>
<br><br>
<a href = "view_transLatest.php" target="_blank">view_transLatest.php</a>
<br><br>


<?php

//include ("view_inv_by_cust.php");

include "view_trans_by_custUNDERorOVERPAID.php";




echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

include ("view_event_by_cust.php");
?> 

</body>
</html>