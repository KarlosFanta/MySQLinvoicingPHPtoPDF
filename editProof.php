<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit proof</title>
<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script  type="text/javascript">

<!--<script type='text/javascript'>-->

function formValidator(){
	// Make quick references to our fields
	var TransNo = document.getElementById('TransNo');
	var TransDate = document.getElementById('TransDate');  //it must be in the correct sequence!!!
	var Amt = document.getElementById('Amt');
	var Notes = document.getElementById('Notes');
	//var Proof = document.getElementById('TMethod');//Proof method



	// Check each input in the order that it appears in the form!
						if(isNumeric(TransNo, "Please enter a valid numeric transaction number")){
				if(lengthRestriction(TransDate, 10,10)){
				if(notEmpty(Amt, "Please enter a valid FLOAT amoutn Paid isFloat")){
			if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
//				if(isDate(TransDate, "Please put in Date")){
					//if(madeSelection(TMethod, "Please Choose Proof Method")){




							return true;
						}
}
}}}

	//					return false;

//}

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


//check include 'yesterday.php' for auto ProofDate
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
/*

	var currentDt = new Date();
    var mm = currentDt.getMonth() + 1;
    var dd = currentDt.getDate();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
    var yyyy = currentDt.getFullYear();
    var todaydate = mm + '/' + dd + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var yesterday = dd + '/' + mm + '/' + yyyy;
	// alert(yesterday);
	//document.write(todaydate); //required for input or span
	//document.write(yesterday);

	currentDt.setDate(currentDt.getDate()-2);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var twodaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-3);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var threedaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-4);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var fourdaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-5);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var fivedaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-6);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var sixdaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-2);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var sevendaysago = dd + '/' + mm + '/' + yyyy;

*/

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

</script>
</head>
<body>

<form onsubmit='return formValidator()'  action="editProofprocessLast2.php"   method="post">



<?php	//this is "addTransCustProcess2.php"
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';
//	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
//	$CustInt = $_SESSION['CustNo'];
include 'monthtables.php';
//include 'view_transLatest.php';
$Prof = @$_POST['Prof'];

$TBLrow ="";
$TBLrow = @$_POST['mydropdownEC'];
if ($TBLrow == "")
$TBLrow = $_POST['CustNo'];

//echo "TBLrow: " .$TBLrow."</BR>";
$CustNoPartArray = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$CustNo</br />";
//$CustNo = strtok(";");
//}
//echo "CustNozERO: ";
//echo $CustNo[0]."</br />";
$CustInt = intval($CustNoPartArray[0]);
$CustNo = $CustInt ;
//echo "<br>Custint:".$CustInt."<br />";

/*
if ($CustInt == '0')
$CustInt = @$_POST['CustNo'];

$_SESSION['CustNo'] = $CustInt;

echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";
*/


//$TBLrow = $_POST['mydropdownEC'];
$Amt = "";
//$Amt = @$_POST['Amt'];

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
$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
echo $SQLstring."<br>";

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) {
//$item1 = $row["CustNo"];
$CustFN =  $row["CustFN"];
$CustLN =  $row["CustLN"];
$CustEmail = $row["CustEmail"];
$Important = $row["Important"];
/*$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print $CustInt;
print " ".$CustFN;
print " <b><Font size = 4>".$CustLN;
print "</font></b> ".$CustEmail." ".$Important;
echo "..{$row['dotdot']}";
/*print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;*/
}
	mysqli_free_result($result);
};
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $CustFN;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $CustLN;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $CustEmail;?>">
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

$Numb = "ProofNo1"; //default when table is empty.
//$query = "SELECT  MAXNUM(ProofNo)  AS MAXNUM FROM aproof order by ProofNo";
//$query = "select ProofNo from aproof order by ProofNo desc limit 1"; // gives Proofno9 instead of Proofno11
//$query = "select ProofNo from aproof asc limit 1";
//$query = "select ProofNo from aproof order by SUBSTRING(ProofNo, 2) desc limit 1"; // gives Proofno9 instead
$query = "select ProofNo from aproof order by ProofDate desc limit 1";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

while($row = mysqli_fetch_array($result)){
	echo "<br>The max no ProofNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = $row[0];
$Numb = substr($daNextNo, 7);
$Numb++;
}
echo "<br><br>";
$daNewProofNo = "ProofNo".$Numb;

?>


<!--<form name="AddProof" action="addProofprocess.php" method="post" target="_blank">

<!--<select name="mydropdownDC" onclick="hi">

<!--<option value="_no_selection_">Select Customer</option>";-->
<?php

// If submitted, check the value of "select". If its not blank value, get the value and put it into $select.
/*if(isset($select)&&$select!="")
{
$select = $_GET['select'];
}*/
?>

<!--<form name="AddProof" action="addProofprocess.php" onsubmit="return formValidator();" method="post">-->
<!--<form  onsubmit='return formValidator()' action="addProofprocess.php"  method="post" >-->
<table border='0'>
<?php
$SQLstring = "SELECT * FROM aproof WHERE CustNo = $CustInt order by ProofDate desc";
$SQLstringC = "SELECT * FROM customer WHERE CustNo = $CustInt";
echo $SQLstring."<br>";
if ($result = mysqli_query($DBConnect, $SQLstringC)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustFN"];

$item3 = $row["CustLN"];
$item4 = $row["Important"];

print "&nbsp;&nbsp;&nbsp;&nbsp;".$item2;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item3;
$item4 = str_replace("Â", " ", $item4); //removesÂ
$item4 = str_replace("  ", " ", $item4); //removesdouble spaces
$item4 = str_replace("&nbsp;&nbsp;", "&nbsp;", $item4); //removes%20
//$b = html_entity_decode($item4);
print "<br>IMPORTANT: &nbsp;&nbsp;&nbsp;&nbsp;".$item4.""; //$b;

}}
//$sql = "SELECT TransNo, TransFN, TransLN, TransTel, TransCell, TransEmail, TransAddr, Distance FROM Transomer WHERE TransNo = $TransInt" ;
//$query = "SELECT * FROM transaction WHERE CustNo = $CustInt" ;
//$sql = "DELETE FROM Transomer WHERE TransNo = $TransInt" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt);
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
//echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Account No ".$TBLrow."</BR>"   ;

?>



<b><font size = "4" type="arial">Edit <?php echo $item3 ?>'s proofs</b></font>
</br>


</br>

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select proof to be updated</option>";

<?php
if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ProofNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["TransNo"];

$item3 = $row["ProofDate"];
$item4 = $row["Amt"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item6 = str_replace("%20", " ", $item6); //removes%20


$item8 = $row["InvNoA"];
if ($item8 == 0)
$item8 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//print "_".$item2; //CustNo
print "_".$item8;
print " R".$item4;
print " ".$item3;

print " Notes: ".$item5;
print " CustSDR: ".$item6;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}

$result->free();
//mysql_free_result($result);

}	echo "<br>";
// close connection
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Update selected proof" />

</select></p>
<a href= "edit_trans_CustProcessCunresolved.php">Only Show unresolved transacions</a>



	<br>
<!--<input type="submit" value="Create Proofaction" onclick="return confirm('Are you sure about the date?');" /> -->
<input type='submit' value="Edit proof"   style="width:300px;height:30px" />
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" />
<!-- onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->

<!--
<input type="submit" name="btn_submit" value="Create proof" onclick="formValidator()" /> -->



</form>



<?php //mysql_close($conn);?>
</p>





















<?php
include ("view_proof_by_cust.php");
include ("view_proof_by_cust2.php");
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

//include ("view_event_by_cust.php");

/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>
</table>
<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");

include ("view_proof_all.php");

		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->



</form>
</body>
</html>
