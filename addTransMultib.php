<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script  type="text/javascript">
function deRequireCb(elClass) {
            el=document.getElementsByClassName(elClass);

            var atLeastOneChecked=false;//at least one cb is checked
            for (i=0; i<el.length; i++) {
                if (el[i].checked === true) {
                    atLeastOneChecked=true;
                }
            }

            if (atLeastOneChecked === true) {
                for (i=0; i<el.length; i++) {
                    el[i].required = false;
                }
            } else {
                for (i=0; i<el.length; i++) {
                    el[i].required = true;
                }
            }
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




<?php
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$TransDate = '';
$TransDate = @$_POST['TransDate'];

$rest = substr($TransDate, -5, 1); // returns "d"

echo "reest : ".$rest." ";
if ($rest == ' ')
{
$DD = explode(" ", $TransDate);
$TransDate = $DD[0]."/".$DD[1]."/".$DD[2];
}
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];


//echo "TransDate2:".$TransDate2;




$aDoor = @$_POST['formDoor']; //array posted
//echo "aDoor0:".$aDoor[0]; //this is InvNoA selected. This should provide us with the correct account Custno. otherwise you get a mixup.


  if(empty($aDoor))
  {
    echo("ERROR! <b><font size = 4><br><br>You didn't select any invoices.<br><br></font>");
  }
  else
  {
    $N = count($aDoor);
 
   /* echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      echo($aDoor[$i] . " ");
    }
	*/
	
  }

    //  echo($aDoor[0]);
      //echo($aDoor[1] . " ");

//echo $N;


$aD0R ="";
 $aD0 = "";
//echo "aDoor:".$aDoor;
//echo " aDoor0:".$aDoor[0]; check POST above


//now since invoice numbers are inreverse order we first want to sort them alphabetic order:
//$cars=array("Volvo","BMW","Toyota");
//rsort($aDoor); //didn;t help!
//$aDoor = rsort($aDoor); //didn;t work!

/*$reversed = array_reverse($aDoor);
$preserved = array_reverse($aDoor, true);

echo "<br><br>";
echo "<br><br>";
echo "<br><br>";

print_r($aDoor);
echo "<br><br>";
print_r($reversed);
echo "<br><br>";
print_r($preserved);
echo "<br><br>";
*/
$aDoor = array_reverse($aDoor); //invert array

//print_r($aDoor);

$aD0 = explode(',', $aDoor[0] );
$aD0R = @$aD0[1];
$aD0R = preg_replace('/\s+/', '', $aD0R);
$aD0R = str_replace('R', '', $aD0R);
$InvSM = @$aD0[2];
$InvSM = preg_replace('/\s+/', '', $InvSM);

//echo "aD0R:>>".$aD0R. "<<<br>";
//$aD0R = substr($aD0R, 2);
//echo "aD0R:>>".$aD0R. "<<<br>";
$SUMSEL=$aD0R;

echo "R".$aD0R." ";

$invR = $aD0[0];
echo "RR:".$invR;
//$invR = preg_replace('/\s+/', '', $invR);
//$invR = preg_replace('/[^pP]/', '', $invR);
//$InvNo = preg_replace("/[^a-zA-Z]/", "", $invR);
$InvNo = str_replace( "p", "" ,$invR);

echo " iv:".$InvNo;
require_once "view_inv_one.php";

$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$TBLarr = explode(';', $TBLrow );
//$CustInt = intval($TBLarr[0]);

$CustInt = $CN; //from view_inv_one.php





?>

<!--before we can add a transaction, we check what transactions the customer has done:
<br><br>-->
<?php

//$TBLrow = $_POST['mydropdownEC'];
$AmtPaid = "";
$AmtPaid = @$_POST['AmtPaid']; //from addTrcsv.php
echo "AmtPaid: " .$AmtPaid." ";
if ($AmtPaid == '')
{
	
	if(!empty($_POST['formDoor'])) {
    foreach($_POST['formDoor'] as $check) {
            echo $check."<br>"; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}
	
	
	echo "run";
//$AmtPaid = @$_POST['formDoor[0]']; //from addTrcsv.php
	echo "run";
	
	
	
	
}	
echo "AmtPaid: " .$AmtPaid." ";

$SDR = "";
$SDR = $_POST['SDR'];
$SDR = str_replace(',', ' ', $SDR);
echo "addTransMultib.php  SDR: " .$SDR."<BR>";

$SQLString = "SELECT * FROM customer WHERE CustNo = $CN" ;
//echo $SQLstring."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$CustFN =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$CommonSDR =  $row["CommonSDR"];
$Important = $row["Important"];
$PayNotes = $row["PayNotes"];
$ABBR =  $row["ABBR"];
print "$item1";
print " ".$CustFN;
print " <b><Font size = 3>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";

}
$result->free();
};
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $CustFN;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">

<?php



$indesc = '0';
//include "calculator/indexKL.php"; // works here


$aD1R ="";


if (array_key_exists('1', $aDoor)) {
    //echo "The '1' element is in the array";


 $aD1 = "";
$aD1 = explode(',', $aDoor[1] );
$aD1R = $aD1[1];
//echo "aD1R:>>".$aD1R. "<<<br>";
$aD1R = substr($aD1R, 2);
//echo "aD1R:>>".$aD1R. "<<<br>";
$SUMSEL= $aD0R+$aD1R;
echo " + R".$aD1R."";
}


if (array_key_exists('2', $aDoor)) {
  //  echo "The '2' element is in the array";


$aD2R ="";
 $aD2 = "";
$aD2 = explode(',', $aDoor[2] );
$aD2R = $aD2[1];
//echo "aD2R:>>".$aD2R. "<<<br>";
$aD2R = substr($aD2R, 2);
//echo "aD2R:>>".$aD2R. "<<<br>";
$SUMSEL= $SUMSEL+$aD2R;
echo " + R".$aD2R."";

}

if (array_key_exists('3', $aDoor)) {
$aD3R ="";
 $aD3 = "";
$aD3 = explode(',', $aDoor[3] );
$aD3R = $aD3[1];
//echo "aD3R:>>".$aD3R. "<<<br>";
$aD3R = substr($aD3R, 2);
//echo "aD3R:>>".$aD3R. "<<<br>";
$SUMSEL= $SUMSEL+$aD3R;
echo " + R".$aD3R."";

}

if (array_key_exists('4', $aDoor)) {
$aD4R ="";
 $aD4 = "";
$aD4 = explode(',', $aDoor[4] );
$aD4R = $aD4[1];
//echo "aD4R:>>".$aD4R. "<<<br>";
$aD4R = substr($aD4R, 2);
//echo "aD4R:>>".$aD4R. "<<<br>";
$SUMSEL= $SUMSEL+$aD4R;
echo " + R".$aD4R."";

}

if (array_key_exists('5', $aDoor)) {
$aD5R ="";
 $aD5 = "";
$aD5 = explode(',', $aDoor[5] );
$aD5R = $aD5[1];
//echo "aD5R:>>".$aD5R. "<<<br>";
$aD5R = substr($aD5R, 2);
//echo "aD5R:>>".$aD5R. "<<<br>";
$SUMSEL= $SUMSEL+$aD5R;
echo " + R".$aD5R."";

}

if (array_key_exists('6', $aDoor)) {
$aD6R ="";
 $aD6 = "";
$aD6 = explode(',', $aDoor[6] );
$aD6R = $aD6[1];
//echo "aD6R:>>".$aD6R. "<<<br>";
$aD6R = substr($aD6R, 2);
//echo "aD6R:>>".$aD6R. "<<<br>";
$SUMSEL= $SUMSEL+$aD6R;
echo " + R".$aD6R."";

}
if (array_key_exists('7', $aDoor)) {
$aD7R ="";
 $aD7 = "";
$aD7 = explode(',', $aDoor[7] );
$aD7R = $aD7[1];
//echo "aD7R:>>".$aD7R. "<<<br>";
$aD7R = substr($aD7R, 2);
//echo "aD7R:>>".$aD7R. "<<<br>";
$SUMSEL= $SUMSEL+$aD7R;
echo " + R".$aD7R."";

}

if (array_key_exists('8', $aDoor)) {

echo "<br><font size = 5 color = red>  ERROR!  CANNOT HANDLE MORE THAN 8 TRANSACTIONS! <br>
Please create another transaction.</font>";

}














echo " = ".$SUMSEL."";

//echo "SUMSEL:>>".$SUMSEL. "<<<br>";


/*if ($UnpaidInvsummm < 4)
echo "<br><font size = '6' > <b>No unpaid invoices. <br><a href = 'addInvCsess.php'>Click here to create new invoice</a></b><br><br><br><br><br><br><br><br><br><br><br></font><br><br>";

	*/
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(TransNo)  AS MAXNUM FROM transaction";


$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;


}














//include "calculator/indexKL.php"; // works here BUT I NEVER USE IT (2016)


$queryCP = "select * from aproof where CustNo = $CN";
//echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {

    // determine number of rows result set 
    $row_cnt = mysqli_num_rows($resultCP1);
	

    //printf("proof has %d rows.\n", $row_cnt);

    
    mysqli_free_result($resultCP1);
}

if ($row_cnt > 0)
{
echo "<form method='post' action='addTransProof.php' >";
//echo "Before entering anything first select the proof if there is one.<br>";
echo "(Proof No.)";
echo "<input type='submit' value='(Select Proof)'/> "; 	
echo "<select name='ProofToPay' id='ProofToPay' onchange='this.form.submit()'>";

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
//$TRRSQL = "select * from transaction where CustNo = $CN and InvNoA = $item2b or  InvNoA = $item2b";

//print "_TR:".$TransNo1;
if ($TransNo1 == '')
echo "not paid yet";
else 
echo " ALREADY ASSIGNED TO TR:".$TransNo1;

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
//print "_TransNo:".$row2["TransNo"];

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

echo "</select>";
echo "<input type='hidden' name='ProofNo' value= '$ProofNo'>";
echo " <br>(in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = '../phpmyadmin/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;
<a href = 'view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a>


";

}
else "no new proof of payments received";



echo "</form>";





//include "calculator/indexKL.php"; // may not be placed inside another form calculation screwd up
?>

<form  action="addTMchk.php"   method="post">

<!--here we can select multiple invoices for the transaction using jQuery:
<br>First select related invoices:<br>-->

Payment Notes: <input type="text" id="PayNotes" size = '90' name="PayNotes" value="<?php echo $PayNotes;?>" >
<a href = 'paynotes.php?CustNo=<?php echo $CN; ?>'>Edit PayNotes only</a>
<br>
<?php
//Transactions found for this invoice:

include "view_trans_by_custBASIC.php";












		$yyy = $aDoor[0];
		//echo "aDoor0:".$aDoor[0];
		//echo "yyy:".$yyy;
		$pieces = "";
		$pieces = explode(", ", $yyy);
		//echo "yyy:".$yyy;
		//echo "pieces3:>>".$pieces[3]."<<";
		
//````````echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

echo "<table>";
echo "<tr><th>TransNo</th>";
echo "<th>TransDate<br>Hover and wait";
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;	<input type='checkbox' name='updSDR' value='checked'>update SDR<br>CustSDR+Common $invR</th>";
echo "<th>SUMSEL:<br>$SUMSEL </th>";
echo "<th>Payment Method</th>";
echo "</tr>\n<tr>";
?>
<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $daNextNo;?>" />
</th>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CN;?>">
<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
$NewFormat = date("d/m/Y");

include("yesterday.php"); 

if ($SDR != '')
	$CommonSDR = '';


if ($AmtPaid == 0)
$AmtPaid = '';

?>
<input id='lst' id="TransDate" size="10" name="TransDate" value = "<?php echo $TransDate; ?>" required >
</th>
<th><?php 
//;print_r(str_split($CustFN,8));
$CustFNs = (str_split($CustFN,38));

//$colors = array("red", "green", "blue", "yellow"); 

foreach ($CustFNs as $value) {
  echo "$value <br>";
}
/*
for ($i = 0; $i < count($CustFN); $i++)
{
   echo $CustFN[$i] . "\n";
}
foreach ($CustFN as $key => $val) {
   echo $val;
}
*/
echo " ".$CustLN; ?><br>
<input type="text"  size="23" id="CustSDR"  STYLE="color: #FFFFFF; background-color: #72A4D2;"   name="CustSDR" size = '20' value="<?php echo $CommonSDR.$SDR; ?>" />
</th>
<th>
<input class="decimal-2-places" type="text" size="5" id="AmtPaid" required  name="AmtPaid" value="<?php echo $AmtPaid; //echo $SUMSEL; ?>"  />
		<!--<input class="decimal-2-places" type="text" /> http://www.texotela.co.uk/code/jquery/numeric/ -->
<?php //echo "amtpaid: $AmtPaid"; 
@$Difference = @$AmtPaid - $SUMSEL;
//$Difference = -1 * abs($Difference); //change negative to a positive number.
if ($AmtPaid != $SUMSEL)
	echo "<font color= red><br>NB NOT THE SAME AMT! AmtPd: $AmtPaid<br> $aD0R + ".@$aD1R." = sumsel $SUMSEL </b><br>Difference is $Difference</font>";
else
	echo "<font color= #107C10><br>Same <br>Amount</b></font>";

?>
		
		
		
		</th>
<th>


<!-- drop down requires a name and not an id: The reason it's not sending through is becasue i did not select anyhting here,
i only chose the existing proof from the other dropdown which autosubmitted-->
<?php 
$EEE = ''; 
$EEE = $pieces[3];
if ($pieces[3]=='EFTEmailProof')
{
$EEE = 'EFT'; 
//echo " EEE:".$EEE;

}
//echo " EEE:".$EEE;

//if ($EEE == '')
$EEE = 'Please Choose'; //was EFT

?>
<!-- <select name="TMethod"  id="TMethod" required >
<!-- <option value="<?php //echo $EEE; ?>"><?php //echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose -->
		<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

 <!--               <option value="">Please Choose</option>
                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>	
                <option value="Mixed">Mixed</option>	
                <option value="-">-</option>	
</select>

<!--*<br>
 <div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div> -->

<!--<input class='acb' type='checkbox' name='acheckbox[]' value='1'
<input class='acb' type='checkbox' name='acheckbox[]' 

-->

 <!-- <input  class='acb' type="checkbox" id="TMethod1" name="TMethod[]" value="EFT"  onclick='deRequire("acb")' required>
  <label for="EFT"> EFT</label><br>
  <input class='acb'  type="checkbox" id="TMethod2" name="TMethod[]" value="Cash"  onclick='deRequire("acb")' required>
  <label for="Cash"> Cash</label><br>
  <input class='acb'  type="checkbox" id="TMethod3" name="TMethod[]" value="Cheque"  onclick='deRequire("acb")' required>
  <label for="Cheque"> Cheque</label><br><br>
  
   <input type="radio" id="EFT" name="TMethodR" value="EFT" required>
<label for="EFT">EFT</label><br>
<input type="radio" id="Cash" name="TMethodR" value="Cash">
<label for="Cash">Cash</label><br>
<input type="Cheque" id="Cheque" name="TMethodR" value="Cheque">
<label for="Cheque">Cheque</label> 
--><br>
<div class="field form-inline radio"><br>
  <label class="radio" for="txtContact">Preferred Method of TMethodR</label><br>
  <input class="radio" type="radio" name="TMethodR" value="EFT" required  /> <span>EFT</span><br>
  <input class="radio" type="radio" name="TMethodR" value="Cash" /> <span>Cash</span><br>
  <input class="radio" type="radio" name="TMethodR" value="Cheque"   /> <span>Cheque</span><br>
  <input class="radio" type="radio" name="TMethodR" value="Debi" /> <span>Debi</span><br>
</div>

</th>
</tr>
</table>
		
<?php
echo "Invoices details incl VAT &nbsp;&nbsp;eg 7313, 209, Jun2014adsl&nbsp;&nbsp;&nbsp;&nbsp;$ABBR,inv$invR,$InvSM<br>";
echo "IS THERE UNDER OR OVERPAYMENT THEN ADD NOTE INTO PAYMENT NOTES<br>";

	//include 'invJQuery2.php' ?>
<input type="text" size="35" id="InvNoA" name="InvNoA" 
style="font-size: 16px;font-weight: bold;" value = "<?php echo $aDoor[0]; ?>" /><br>

<input type="text"  size="35" id="InvNoB"  name="InvNoB"
 style="font-size: 16px;font-weight: bold;" value = "<?php echo @$aDoor[1]; ?>" class='clInvNoA'/>

<input type='submit' value="Create transaction" onsubmit='return formValidator()' style="width:200px;height:30px" /><br>
<br>
<input type="text" size="35" id="InvNoC"  name="InvNoC" value = "<?php echo @$aDoor[2]; ?>"  class='clInvNoA' /><br>
<!--
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->


<input type="text" size="35" id="InvNoD"  name="InvNoD" value = "<?php echo @$aDoor[3]; ?>"  class='clInvNoA' /><br>
<input type="text" size="35" id="InvNoE"  name="InvNoE" value = "<?php echo @$aDoor[4]; ?>"  class='clInvNoA' /><br>
<input type="text" size="35" id="InvNoF"  name="InvNoF" value = "<?php echo @$aDoor[5]; ?>"  class='clInvNoA' /><br>
<input type="text" size="35" id="InvNoG"  name="InvNoG" value = "<?php echo @$aDoor[6]; ?>"  class='clInvNoA' /><br>
<input type="text" size="35" id="InvNoH"  name="InvNoH" value = "<?php echo @$aDoor[7]; ?>"  class='clInvNoA' /><br>
			


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
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CN;?>">

</form>

<?php
include "view_Underpaid_inv_by_cust2bb.php";
include "view_proof_by_cust3.php";
include "viewExpCust2.php";
$indesc = 9;
$ShowDraft = "N";
include "view_Unpaid_inv_by_cust2.php";
//echo "<br><br>";
$indesc = 9;
$ShowDraft = "Y";

include ("view_trans_by_cust.php");
include "view_transLatest.php";

include "view_trans_by_custUNDERorOVERPAID.php";




echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

?> 
<a href = "view_event_by_cust.php" target = _blank>view_event_by_cust.php</a>

</body>
</html>