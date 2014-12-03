<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function formValidator(){
	// Make quick references to our fields
	var CustFName = document.getElementById('CustFName');
	var CustLName = document.getElementById('CustLName');
	var CustTN = document.getElementById('CustTN');
	var CustCN = document.getElementById('CustCN');
	//var state = document.getElementById('state');
	//var username = document.getElementById('username');
	var CustEm = document.getElementById('CustEm');
	var CustDI = document.getElementById('CustDi');
	
	// Check each input in the order that it appears in the form!
	if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(CustTN, "Please enter a valid numeric telephone number")){
			if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
						if(emailValidator(CustEm, "Please enter a valid email address")){
				if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				//if(madeSelection(state, "Please Choose a State")){
					//if(lengthRestriction(username, 6, 8)){
							return true;
						}
					}
				}
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

<?php	$page_title = "New Product";
	include('header.php');	
	include ('inc_OnlineStoreDB.php')
?>

<?php
@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();
	$CNN = @$_SESSION['CustNo'];
$query = "select CustNo, CustFN, CustLN from customer ORDER BY custLN";

$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";
echo $queryS."<br>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
/*print $item2b;
 echo "____".$CNN;
 print "_".$item1b;
print "_".$item3b;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




	}
$result2->free();
	}



?>






<!--<form name="Addcust" onsubmit="return formValidator();" action="add_CustProcess.php" method="post">-->
<form  name="AddProd" action="add_prod_process.php" method="post" >

		<div>
<b><font size = "4" type="arial">Add A Product</b></font>

</br>

<!--<a href = "add_cust.php"> Please click here to Refresh before adding another customer. (in case you clicked Back)</a></br>-->
		<dl>
			<dt><label>* ProductDescription<?php //echo $this->lang->line('cust_fn'); ?>: </label></dt>
			<!--<dd><input type="text" id="cust_name" id="cust_fn" value="<?php //echo $this->mdl_custs->form_value('cust_name'); ?>" /></dd>-->
			<dd><input type="text"  id="CustFName"  name="CustFName" /></dd>
		</dl>

		<dl>
			<dt><label>Potential customer<?php //echo $this->lang->line('cust_ln'); ?>: </label></dt>
<dd>	

<select name="mydropdownEC" onchange='this.form.submit()'>

<!--<option value="_no_selection_">Select Customer</option>";-->

<?php
	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option value='";
echo $item1b;
echo "'>";
echo $item2b;

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".$item3b;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 
	}
$result2->free();
	}
}
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".$item3;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
$result->free();
//mysql_free_result($result);

}
// close connection */
//$mysqli->close();

print " </option>"; 
echo $item3b;
?>
		</select>	
			
			
			<!--<dd><input type="text" id="CustNo" name="CustNo" />-->
			
			</dd>
		</dl>

		<dl>
			<dt><label>* SupplierID :</label></dt>
			<!--<dd><input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" /></dd>-->
			<dd><input type="text" id="SupplierID"  name="SupplierID"  /></dd>
		</dl>

		<dl>
			<dt><label>* description<?php //echo $this->lang->line('cust_'); ?>: </label></dt>
			<dd><input type="text" id="PDesc" name="PDesc" /> </dd>
		</dl>

		<dl>
			<dt><label>* Cost price<?php //echo $this->lang->line('cust_ln'); ?>: </label></dt>
			<dd><input type="text" id="Cost" name="Cost" /> only numbers</dd>
		</dl>


		<dl>
			<dt></dt>
			<!--<dd><input type="submit" id="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<!--<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="validate('Addcust');return false;" /> -->
			<dd><input type='submit' value='Add/Sumbit' />
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>

	</div>
 </form>
