<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add transaction</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script type='text/javascript'>

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
//				if(isDate(TransDate, "Please put in Date")){
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
</script>
</head>
<body>

<form onsubmit='return formValidator()'  method='post' action="addTransprocessLast2.php">


<?php	//this is "addTransCustProcess2.php"
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';
	$CustNo = "";
	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
	if ($CustInt == "")
	{
	$CustNo = $_POST['CustNo'];
	$CustInt = $_POST['CustNo'];
	}
	echo "<br>CustNo: ".$CustNo."<br>";

include 'view_transLatest.php';
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
/*$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$item1";
print "_".$item2;
print "_".$item3;
print "_".$item4;
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


<form onsubmit='return formValidator()'  action="addTransprocess_last2.php"   method="post">


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
<table width='10' border='0'>
<?php
echo "Add new transactions:<br>";

echo "<tr><th>Trans No</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate<br>";
echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>AmtPaid</th>";

echo "<th>&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Payment <br />Method</th>";
echo "<th>InvNoA detail</th>";
echo "<th>InvNoA incl VAT</th>\n";
echo "<th>InvNoB detail</th>";
echo "<th>InvNoB incl VAT</th>\n";
echo "<th>InvNoC detail</th>";
echo "<th>InvNoC incl VAT</th>\n";
echo "<th>InvNoD detail</th>";
echo "<th>InvNoD incl VAT</th>\n";
echo "<th>InvNoE detail</th>";
echo "<th>InvNoE incl VAT</th>\n";
echo "<th>Priority</th></tr>\n";
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
			<input type="text"  size="10" id="TransDate"  name="TransDate" value="" />
<!--			<input type="hidden" size="10"  id="TransDateOrig"  name="TransDateOrig" value="<?php //echo $daNextNo; ?>" />
-->
		</th>


		<th>
			<!--<label>&nbsp; CustSDR:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="10" id="CustSDR"  name="CustSDR" size = '30' value="." />
		</th>
		<th>
			<!--<label>&nbsp; AmtPaid:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AmtPaid; ?>" />
		</th>

		<th>
			<!--<label>&nbsp; Notes:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="10" id="Notes"  name="Notes" size = '35' value="" />
		</th>

		<th>
			<select name="TMethod"  id="TMethod"  >
                <option value="Please Choose">Choose</option><!-- the javascript function requires phrase Please Choose -->
				<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>
                <option value="Mixed">Mixed</option>
                <option value="-">-</option>
</select>

		</th>
		<th>
			<!--<label>&nbsp; InvNoA:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoA"  name="InvNoA" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoAincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoAincl"  name="InvNoAincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoB:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoB"  name="InvNoB" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoBincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoBincl"  name="InvNoBincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoC:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" id="InvNoC"    size="1" name="InvNoC" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoCincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="1"  id="InvNoCincl"  name="InvNoCincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoD:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="1"  id="InvNoD"  name="InvNoD" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoDincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoDincl"  name="InvNoDincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoE:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" id="InvNoE"   size="1" name="InvNoE" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoEincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="1" id="InvNoEincl"  name="InvNoEincl" value="0" />
		</th>


<!--		<th>
			<!--<label>&nbsp; InvNoF:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden" size="1"  id="InvNoF"  name="InvNoF" value="0" />
<!--		</th>
		<th>
			<!--<label>&nbsp; InvNoFincl:</label></dt>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden"  size="1" id="InvNoFincl"  name="InvNoFincl" value="0" />
<!--		</th>


		<th>
			<!--<label>&nbsp; InvNoG:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden"  size="1" id="InvNoG"  name="InvNoG" value="0" />
<!--		</th>
		<th>
			<!--<label>&nbsp; InvNoGincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden"  size="1" id="InvNoGincl"  name="InvNoGincl" value="0" />
<!--		</th>


		<th>
			<!--<label>&nbsp; InvNoH:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden" size="1"  id="InvNoH"  name="InvNoH" value="0" />
<!--		</th>
		<th>
			<!--<label>&nbsp; InvNoHincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="hidden" size="1"  id="InvNoHincl"  name="InvNoHincl" value="0" />
<!--		</th>
-->


		<th>
			<!--<label>&nbsp; Priority:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->


			<!--<input type="text" id="Priority"  name="Priority" value="." />-->


			<select name="Priority" value="<?php $oldpri = "."; echo $oldpri; ?>" >
                <option value=".">.</option>
                <option value="Low">Low</option>
                <option value="High">High</option>
			</select>

</th>
		</tr>
		</table>


<br></p>

<!--<input type="submit" value="Create transaction" onclick="return confirm('Are you sure about the date?');" /> -->
<input type='submit' value="Create transaction"  style="width:120px;height:50px"/>
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:100px;height:50px"/>
<!-- onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->

<!--
<input type="submit" name="btn_submit" value="Create transaction" onclick="formValidator()" /> -->

</form>



<?php //mysql_close($conn);?>






















<?php
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


</form>
<input type='submit' value="Create transaction"  width = "20" size  = "20" length = "20"/>
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  />
<!-- onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->

</body>
</html>
