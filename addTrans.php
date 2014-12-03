<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
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
				if(notEmpty(AmtPaid, "Please enter a valid FLOAT amoutn Paid isFloat")){
			if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
//				if(isDate(TransDate, "Please put in Da 	te")){
					if(madeSelection(TMethod, "Please Choose Payment Method")){
				
						
						
						
							return true;
						}
}
}}}

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




<?php	//this is "addTransCustProcess2.php"
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

echo "<br>Custint:".$CustInt."<br />";

	@session_start();

$_SESSION['CustNo'] = $CustInt;

	
	if(isset($_SESSION['CustNo']))
echo "yes";
else
echo "<a href = 'selectCust.php' >no  PLEASE SELECT A CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


	
	if(($_SESSION['CustNo'])== '0')
echo "<a href = 'selectCust.php' >no  PLEASE SELECT dA CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
include "monthtables.php";


echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";




?>
<!--<form name="addTransCustProcess2"  action="addTransprocess_last2.php" onsubmit='return formValidator()'   method="post">-->

<!--before we can add a transaction, we check what transactions the customer has done:
<br><br>-->
<?php

//$TBLrow = $_POST['mydropdownEC'];
$AmtPaid = "";
//$AmtPaid = @$_POST['AmtPaid'];

/*echo "TBLrow: " .$TBLrow."</BR>";
$CustNo = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
$CustInt = intval($CustNo[0]);


//echo "<br>Transint:".$CustInt."</br />";
*/
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
/*$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$item1";
print " ".$item2;
print " <b><Font size = 4>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";
/*print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;*/
}
$result->free();
};
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">
<?php
/*if ($result = $DBConnect->query($SQLstring)) {
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);


echo "{$row[0]}&nbsp;&nbsp;";
echo "<font size = '3'><b>";
echo "{$row[1]}&nbsp;&nbsp;";
echo "{$row[2]}&nbsp;&nbsp;</font></b>";
echo "{$row[3]}&nbsp;&nbsp;";
echo "{$row[4]}&nbsp;&nbsp;";
echo "{$row[5]}&nbsp;&nbsp;";
echo "{$row[6]}&nbsp;&nbsp;";
echo "{$row[7]}&nbsp;&nbsp;";
echo "{$row[8]}&nbsp;&nbsp;";
echo "{$row[9]}&nbsp;&nbsp;";

		}
    $result->close();
}*/


?>




<?php	

	//require_once ('inc_OnlineStoreDB.php');

$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(TransNo)  AS MAXNUM FROM transaction";


$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}

?>


<!--<form name="AddTrans" action="addTransprocess.php" method="post" target="_blank">

<!--<select name="mydropdownDC" onclick="hi">

<!--<option value="_no_selection_">Select Customer</option>";-->
<?php

// If submitted, check the value of "select". If its not blank value, get the value and put it into $select.
/*if(isset($select)&&$select!="")
{
$select = $_GET['select'];
}*/
?>

<!--<form name="AddTrans" action="addTransprocess.php" onsubmit="return formValidator();" method="post">-->
<!--<form  onsubmit='return formValidator()' action="addTransprocess.php"  method="post" >-->

<?php
echo "Add new transactions:<br>";
?>



<?php


$queryCP = "select * from aproof where CustNo = $CustInt";
echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {

    // determine number of rows result set 
    $row_cnt = mysqli_num_rows($resultCP1);
	

    printf("proof has %d rows.\n", $row_cnt);

    
    mysqli_free_result($resultCP1);
}

if ($row_cnt > 0)
{

	echo "<form   method='post'   action='addTransProof.php'  >";
echo "<br><br><br><br><b>Proof No.";
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


<br><br><b><br><br><br><br><br><br>";

}
else "no new proof of payments received";



echo "</form>";






?>

<form  action="addTransMulti.php"   method="post">
<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->

<br><br>
here we can select multiple invoices for the transaction using jQuery:
<br>First select related invoices:

<table>
<?php

echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate";
//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CustSDR&nbsp;&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* Transaction AutoNumber: (!! Different for internet transactions!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $daNextNo;?>" />
		</th>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";



</th>
		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		?>
			<!--<label>TransDate:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<!--<label>TransDate:</label></dt>-->
			<!--<input type="text" size="10" id="TransDate"  name="TransDate" value="<?php //echo $TransDate; ?>" /> -->
			<?php include("yesterday.php"); ?>
			<input id='lst' id="TransDate" size="10" name="TransDate"  >
		</th>

		<th>
			<!--<label>&nbsp; CustSDR:</label></dt>-->
			<input type="text"  size="19" id="CustSDR"  name="CustSDR" size = '20' value="" />
			<!--<textarea id="CustSDR"  name="CustSDR" ></textarea>-->
			
			
		</th>

		<th>
			<!--<label>&nbsp; AmtPaid:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AmtPaid; ?>"   class='clAmt'/>
		</th>
	
	
		<th>
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
		</tr>
		</table>
		<table>
		<tr>

		
				
		<?php
		echo "<th>Invoices details incl VAT &nbsp;&nbsp;eg 7313, 209, Jun2014adsl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		//echo "<th>HOVER and wait InvB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		
	?>	
		</tr>
		</tr>
		</table>
		<!--<tr>
		<th>-->
			<!--<label>&nbsp; InvNoA:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
<?php include 'invJQuery2.php' ?>
			<input type="text"  size="3" id="InvNoA"  name="InvNoA" class='clInvNoA' />(click and wait)<br>
	<!--	</th>
	<tr></tr>
		<th>
			<!--<label>&nbsp; InvNoB:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoB"  name="InvNoB"  class='clInvNoA'/>(click and wait)
<!--		</th>
	<tr></tr>
		<th>
			<!--<label>&nbsp; InvNoC:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" id="InvNoC"    size="1" name="InvNoC"  class='clInvNoA' />(click and wait)<br>
<!--		</th>
	
	<tr></tr>
		<th>
			<!--<label>&nbsp; InvNoD:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="1"  id="InvNoD"  name="InvNoD"  class='clInvNoA' />click and wait)
<!--		</th>
	
	<tr></tr>
		<th>
			<!--<label>&nbsp; InvNoE:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" id="InvNoE"   size="1" name="InvNoE"  class='clInvNoA' />
<!--		</th>
		
		
		<tr></tr>
		
		
		<th>
			<!--<label>&nbsp; InvNoF:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="1"  id="InvNoF"  name="InvNoF"  class='clInvNoA' />
<!--		</th>
	<tr></tr>
	
		<th>
			<!--<label>&nbsp; InvNoG:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoG"  name="InvNoG"  class='clInvNoA' />
<!--		</th>
	
	<tr></tr>
		<th>
			<!--<label>&nbsp; InvNoH:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="1"  id="InvNoH"  name="InvNoH"  class='clInvNoA' />
<!--	</th>

	<tr></tr>
	
<!--		<th>
			<select name="Priority" value="<?php $oldpri = "."; echo $oldpri; ?>" >
                <option value=".">.</option>
                <option value="Low">Low</option>
                <option value="High">High</option>
			</select>
			
</th>-->
<!--		</tr>
		</table>





<!--<input type="submit" name="btn_submit" value="Select the proof" style="width:300px;height:30px" /> -->
<!--	<br><input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>
<br><br><br><br><br><br><br><br><br><br><br>
-->

<!--<input type="submit" value="Create transaction" onclick="return confirm('Are you sure about the date?');" /> -->
<input type='submit' value="Create transaction"   style="width:300px;height:30px" /> 
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 




</form>


<?php
include "view_transLatest.php";
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");





echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

include ("view_event_by_cust.php");



/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?> 



</body>
</html>
