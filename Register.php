<?php


require_once 'inc_OnlineStoreDB.php';//page567

	//VALIDATION SUMMARISED:
/*
<script type="text/javascript">
//Javascript for Validation of user inputs
function formValidator(){
	// variable
	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var CustTN = document.getElementById('CustTN');
	var CustCN = document.getElementById('CustCN');
	var CustEm = document.getElementById('CustEm');
	var CustDI = document.getElementById('CustDi');
	var CustPW = document.getElementById('CustPW');

	// Checks inputs
	// WARNING isEmpty does not exist! it is notEmpty
		//KEEP THE SEQUENCE CORRECT     KEEP THE SEQUENCE CORRECT                 KEEP THE SEQUENCE CORRECT

	if(notEmpty(CustFName, "Please enter only letters for your first name")){
	//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
	//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
	if(isNumeric(CustTN, "Please enter a valid numeric telephone number")){
	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
	if(emailValidator(CustEm, "Please enter a valid email address")){
	if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){
	if(notEmpty(CustPW, "Please enter a valid password")){
							return true;
						}
					}
				}
	//		}
		}
	}
	}//very important bracket!!!!!
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
</script>
</head>
<body>
<form name="Addcust" onsubmit="return formValidator()" action="add_CustProcess.php" method="post">
<!-- sequence might be important! first onsubmit then action!-->
<!-- id in input name is used for javascript validation and name is used for POST I presume-->
<input type="text" id="CustNo"   name="CustNo" value="<?php echo $daNextNo;?>" />
<input type="text"  id="CustFName"  name="CustFName" />
<input type="text" id="CustLName" name="CustLName" />
<input type="text" id="Abbr" name="Abbr" />
<input type="text" id="CustEm" name="CustEm" />
<input type='submit' value='Register Now'/>
</form>
//end of validation summary
*/









	//$date = date("H:i dS F"); //Get the date and time.
	//echo $date;
	$file = "logaddcust.php"; //Where the log will be saved.


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a customer</title>
<!--<META HTTP-EQUIV="refresh" CONTENT="8"> automtic refresh do not use!)-->
<!-- refreshes page every 3 seconds-->
<script type="text/javascript">
//Javascript for Validation of user inputs
function formValidator(){
	// variable
	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var CustTN = document.getElementById('CustTN');
	var CustCN = document.getElementById('CustCN');
	var CustEm = document.getElementById('CustEm');
	var CustDI = document.getElementById('CustDi');
	var CustPW = document.getElementById('CustPW');

	// Checks inputs
	// WARNING isEmpty does not exist! it is notEmpty
		//KEEP THE SEQUENCE CORRECT     KEEP THE SEQUENCE CORRECT                 KEEP THE SEQUENCE CORRECT

	if(notEmpty(CustFName, "Please enter only letters for your first name")){
	//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
	//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
	if(isNumeric(CustTN, "Please enter a valid numeric telephone number")){
	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
	if(emailValidator(CustEm, "Please enter a valid email address")){
	if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){
	if(notEmpty(CustPW, "Please enter a valid password")){
							return true;
						}
					}
				}
	//		}
		}
	}
	}//very important bracket!!!!!

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
</script>
</head>
<body>

<?php	$page_title = "Register";
require_once 'header.php';
?>





<?php

$daNextNo = 1; //default when table is empty.
//$query = "SELECT MAX(CustNo)  AS MAXNUM FROM customer";

$query = "SELECT MAX(CustNo), CustFN FROM customer where custno <> '300' and custno <> '301'";
$result = $DBConnect->query($query);
/* numeric array */
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[1]);
//echo $row[0];
//echo $row[1];
//$CN = $row[1];

$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNo = intval($row[0])+1;

if ($daNextNo == 300)
$daNextNo = $daNextNo + 10;

?>

<form name="Addcust" onsubmit="return formValidator()" action="add_CustProcess.php" method="post">

		<div>
<b><font size = "4" type="arial">Add Customer</b></font>
<br/>Register.php loads add_CustProcess.php<br/>

<?php //echo '<script type="text/javascript">   parent.window.location.reload(true);</script>';		//to refresh the page?>
<!--<a href = "add_cust.php"> Please click here to Refresh before adding another customer. (in case you clicked Back)</a></br>-->
		<dl>
			<dt><label>&nbsp;  Customer AutoNumber:</label></dt>
			<!--<dd><input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" /></dd>-->
			<!--<dd><input type="text" id="CustNoDisabled"  disabled="disabled" name="CustNoDisabled" value="<?php //echo $daNextNo;?>" /></dd>-->
			<dd><input type="text" id="CustNo"   name="CustNo" value="<?php echo $daNextNo;?>" /> Refresh the page first!</dd>
			<!--<input type="hidden" id="CustNo"   name="CustNo" value="<?php //echo $daNextNo;?>" /> -->
			<a href="javascript:document.location.reload();"
ONMOUSEOVER="window.status='Refresh'; return true">
<img src="refresh.jpg"
border="0" /></a></dd>
		</dl>

		<dl>
			<dt><label>* Name & VAT No<?php //echo $this->lang->line('cust_fn'); ?>: </label></dt>
			<!--<dd><input type="text" id="cust_name" id="cust_fn" value="<?php //echo $this->mdl_custs->form_value('cust_name'); ?>" /></dd>-->
			<dd><input type="text"  id="CustFName"  name="CustFName" /> no ', no: Umlaute(special vowels)  </dd>
		</dl>

		<dl>
			<dt><label>*&nbsp;Surname &/or Company Name<?php //echo $this->lang->line('cust_ln'); ?>: </label></dt>
			<dd><input type="text" id="CustLName" name="CustLName" /></dd>
		</dl>

		<dl>
			<dt><label>*&nbsp;Banking Code Abbreviation Name<?php //echo $this->lang->line('cust_ln'); ?>: </label></dt>
			<dd><input type="text" id="Abbr" name="Abbr" /> e.g. for Stephan Brandt it is SBr beneficiary payment: <br>SBrMarchADSL R220  preferably less than 4 characters.</dd>
		</dl>


		<dl>
			<dt><label>* Email Address<?php //echo $this->lang->line('cust_ln'); ?>: </label>(no spaces inbetween emails)</dt>
			<dd><input type="text" id="CustEm" name="CustEm" /></dd>
		</dl>

		<dl>
			<dt><label>&nbsp; Distance <?php //echo $this->lang->line('cust_ln'); ?>: </label></dt>
			<dd><input type="text" id="CustDi" name="CustDi" value="0"/> km >Indicates how far customer is from your business. </dd>
			<dd>
			</dl>
Check distance: <a href = "https://maps.google.com/maps?a&q=28+buxton+avenue+cape+town" target=_blank>MAPS</a>
		<dl>


		<dl>
			<dt></dt>
			<!--<dd><input type="submit" id="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<!--<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="validate('Addcust');return false;" /> -->
		<!--	<dd><input type='submit' value='Register Now' name='submitR' id='submitR'/>-->
			<dd><input type='submit' value='Register Now'/>

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>

	</div>
 </form>

<?php
$SQLstring = "select * from customer order by custNo desc";
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Address</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>Cell</th>";
echo "<th>CustPW</th></tr>\n";

   while ($row = $result->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[6]}</th>\n";
echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";
echo "<th>{$row[9]}</th>\n";
echo "<th>{$row[10]}</th>\n";
echo "<th>{$row[11]}</th></tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";
echo "<br><br><br>";
$SQLstring = "select * from customer order by custLN";
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Address</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>Cell</th>";
echo "<th>CustPW</th></tr>\n";

   while ($row = $result->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[6]}</th>\n";
echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";
echo "<th>{$row[9]}</th>\n";
echo "<th>{$row[10]}</th>\n";
echo "<th>{$row[11]}</th></tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

?>

</body>
</html>
