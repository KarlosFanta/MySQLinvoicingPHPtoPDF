
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add transaction</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
function formValidator(){
	// Make quick references to our fields
//	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var TransNo = document.getElementById('TransNo');
	var AmtPaid = document.getElementById('AmtPaid');
	var mydropdownDC = document.getElementById('mydropdownDC');
	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');

	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(TransNo, "Please enter a valid numeric transaction number")){
			if(notEmpty(AmtPaid, "Please enter a valid numeric amoutn Paid")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				if(madeSelection(mydropdownDC, "Please Choose a Customer")){
					//if(lengthRestriction(username, 6, 8)){
							return true;
		//				}
	//				}
				}
			}
	//	}

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
<?php	//this is "add_tranc_CustProcess2.php"
 $page_title = "You seleted a Customer";
require_once 'header.php';
	//require_once 'db.php';//mysqli connection and databse selection
	require_once 'inc_OnlineStoreDB.php';

?>
<form name="addTransCustProcess2" action="addTransprocess_last2.php" method="post">

before we can add a transaction, we check what transactions the customer has done:
<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

//$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
//$CustNo = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
//$CustNo = $_POST['CNN'];

//$CustInt = intval($CustNo[0]);

//echo "<br>Transint:".$CustInt."</br />";

//$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
echo $SQLstring;
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>CustNo</th>";
echo "<th>CustFn</th>";
echo "<th>CustLN Surname</th>";
echo "<th>CustTel</th>";
echo "<th>CustCell</th>";
echo "<th>CustEmail</th>";
echo "<th>CustAddr</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>CustPW</th></tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>";
echo "<th>{$row[5]}</th>";
echo "<th>{$row[6]}</th>";
echo "<th>{$row[7]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[9]}</th></tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

//echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Account No ".$TBLrow."</BR>"   ;
echo "Account No ".$CustNo."</BR>"   ;
//echo "Account No ".$CustNo[0]."</BR>"   ;
//echo "Account No ".$CustNo[1]."</BR>"   ;
//echo "Account No ".$CustNo[2]."</BR>"   ;

//$SQLstring = "SELECT * FROM transaction WHERE CustNo = $CustInt";
$SQLstring = "SELECT * FROM transaction WHERE CustNo = $CustNo";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {//from transaction table
echo "<table width='10' border='1'>\n";

echo "<tr><th>Trans No</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Notes</th>";
echo "<th>Payment Method</th>";
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
echo "<th>InvNoF detail</th>";
echo "<th>InvNoF incl VAT</th>\n";
echo "<th>InvNoG detail</th>";
echo "<th>InvNoG incl VAT</th>\n";

echo "<th>InvNoH detail</th>";
echo "<th>InvNoH incl VAT</th>\n";
echo "<th>Priority</th></tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {  //from transaction table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //TransNo from transaction table
//echo "<th>{$row[1]}</th>";       //CustNofrom transaction table
$CN = $row[1];                  //CustNO from transaction table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO from transaction table
echo "<th>{$row[2]}</th>";  //TransDate from transaction table
echo "<th>{$row[3]}</th>";  //AmtPaid from transaction table
echo "<th>{$row[4]}</th>\n";  //Notes from transaction table
echo "<th>{$row[5]}</th>\n";  //from transaction table
echo "<th>{$row[6]}</th>\n";  //from transaction table
echo "<th>{$row[7]}</th>\n";  //from transaction table
echo "<th>{$row[8]}</th>\n";  //from transaction table
echo "<th>{$row[9]}</th>\n";  //from transaction table
echo "<th>{$row[10]}</th>\n";  //from transaction table
echo "<th>{$row[11]}</th>\n";  //from transaction table
echo "<th>{$row[12]}</th>\n";  //from transaction table
echo "<th>{$row[13]}</th>\n";  //from transaction table
echo "<th>{$row[14]}</th>\n";  //from transaction table
echo "<th>{$row[15]}</th>\n";  //from transaction table
echo "<th>{$row[16]}</th>\n";  //from transaction table
echo "<th>{$row[17]}</th>\n";  //from transaction table
echo "<th>{$row[18]}</th>\n";  //from transaction table
echo "<th>{$row[19]}</th>\n";  //from transaction table
echo "<th>{$row[20]}</th>\n";  //from transaction table
echo "<th>{$row[21]}</th>\n";  //InvDincl from transaction table
echo "<th>{$row[22]}</th></tr>\n";  //InvDincl from transaction table
		}
    /* free result set */
    $result->close();

}
echo "</table>";

?>




<?php

require_once 'dbold.php';

$daNextNo = 1; //default when table is empty.
$query = "SELECT MAX(TransNo)  AS MAXNUM FROM transaction";

//$result=mysql_query($query);
//echo "<br>".$result."<br>";
//echo "<br>".intval($result)."<br>";
//while($row=mysql_fetch_array($result))


$result = mysql_query($query) or die(mysql_error());

// Print out result

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysql_fetch_array($result)){
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}
//	echo "Add 1 = ". $daNextNo;

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
<form action="addTransprocess.php" onsubmit='return formValidator()' method="post">
<table width='10' border='1'>
<?php
echo "<br><tr><th>Trans No</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Notes</th>";
echo "<th>Payment Method</th>";
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
echo "<th>InvNoF detail</th>";
echo "<th>InvNoF incl VAT</th>\n";
echo "<th>InvNoG detail</th>";
echo "<th>InvNoG incl VAT</th>\n";
echo "<th>InvNoH detail</th>";
echo "<th>InvNoH incl VAT</th>\n";
echo "<th>Priority</th></tr>\n";
?>

		<tr>
			<!--<th><label>* Transaction AutoNumber: (!! Different for internet transactions!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $daNextNo;?>" />
		</th>
		<!--<dt><label>* Customer:-->
<!--<select name="mydropdownDC" onclick="hi">-->
<?php
// Get records from database (table "name_list").
/*$list = mysql_query("SELECT * FROM customer where CustNo = $CustInt");

// Show records by while loop.
while($row_list=mysql_fetch_assoc($list)){
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row_list['CustNo'];
$CustFN =  $row_list['CustFN'];
$CustLN =  $row_list['CustLN'];

echo "<input type = 'text' value='$CustInt' >";
// if($CustNo == $select){
//echo "selected";

//echo $CustNo;
//echo "_ ";
echo $CustFN;
echo " ";
echo $CustLN;

//echo "</option>";
}
*/




?>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";

</th>
		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");
		?>
			<!--<label>TransDate:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<input type="text" size="10" id="TransDate"  name="TransDate" value="<?php //echo $NewFormat; CANNOT becasue copy from bank account?>" />
		</th>

		<th>
			<!--<label>&nbsp; AmtPaid:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="AmtPaid"  name="AmtPaid" value="" />
		</th>

		<th>
			<!--<label>&nbsp; Notes:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="Notes"  name="Notes" value="." />
		</th>
		<th>
			<!--<label>&nbsp; Payment Method:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<!--<input type="text" id="TMethod"  name="TMethod" value="." />-->


			<select name="TMethod"  id="TMethod" value="<?php $oldstatus = "."; echo $oldstatus; ?>" >-->
                <option value="EFT">EFT</option>
                <option value="Debit">Debit</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="Cheque">Mixed</option>
</select>
			<!----->
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
			<input type="text"  size="3" id="InvNoB"  name="InvNoB" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoBincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoBincl"  name="InvNoBincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoC:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" id="InvNoC"  name="InvNoC" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoCincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoCincl"  name="InvNoCincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoD:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoD"  name="InvNoD" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoDincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoDincl"  name="InvNoDincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoE:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoE"  name="InvNoE" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoEincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoEincl"  name="InvNoEincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoF:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoF"  name="InvNoF" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoFincl:</label></dt>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoFincl"  name="InvNoFincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoG:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoG"  name="InvNoG" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoGincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="3" id="InvNoGincl"  name="InvNoGincl" value="0" />
		</th>


		<th>
			<!--<label>&nbsp; InvNoH:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoH"  name="InvNoH" value="0" />
		</th>
		<th>
			<!--<label>&nbsp; InvNoHincl:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text" size="3"  id="InvNoHincl"  name="InvNoHincl" value="0" />
		</th>



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


<br><br>
<input type="submit" value="Create transaction" onclick="return confirm('Are you sure about the date and Invoice Number?');" />
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

</form>

<?php mysql_close($conn);?>
</p>







<?php
    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['TransNo']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['TransFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['TransLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the Transomer has a surname entered!!!
    echo $row[3] . $row['TransTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['TransCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['TransEMAIL']"</br>";
    echo $row[6] . $row['TransADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";

	if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl>";
			echo "<dt><label>* Transaction Number:</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='TransNo' value=";
			//echo $row[0];
			echo $row['TransNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['TransNo'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>* CustNo:</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='CustNo' value=";
			echo $row['CustNo'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>TransDate </label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='TransDate' value=";
			echo $row['TransDate'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Amount Paid</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='AmtPaid' value=";
			echo $row['AmtPaid'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Notes</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='Notes' value=";
			echo $row['Notes'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Transfer Method</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='TMethod' value=";
			echo $row['TMethod'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>InvNoA</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoA' value=";
			print $row['InvNoA'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoAincl</label></dt>";
			//     <!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoAincl' value=";
			echo $row["InvNoAincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoB</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoB' value=";
			print $row['InvNoB'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoBincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoBincl' value=";
			echo $row["InvNoBincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoC</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoCincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoD</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoDincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoE</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoEincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoF</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoFincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoG</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoGincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoH</label></dt>";
			//     <!--<input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoHincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> ";
		echo "</dl> ";

		//$objResult;
 }

}

//oracle: oci_free_statement($objParse);
//oci_free_statement($stid);
//oracle: oci_close($conn);

		/*<dl>
			<dt><label>* First Name<?php //echo $this->lang->line('Trans_fn'); ?>: </label></dt>
			<!--<input type="text" name="Trans_name" id="Trans_fn" value="<?php //echo $this->mdl_Transs->form_value('Trans_name'); ?>" />-->
			<input type="text" name="TransFName" />
		</dl>
*/
?>
<div>
		<dl>
			<dt></dt>
			<!--<input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" />-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" />
		</dl>
</div>
</form>






<?php
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



