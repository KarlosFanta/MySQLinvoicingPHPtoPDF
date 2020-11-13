<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add proof</title>
<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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

<form onsubmit='return formValidator()'  action="addProofprocessLast2.php"   method="post">



<?php	//this is "addTransCustProcess2.php"
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';
    @session_start();
    //echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
    $CustInt = $_SESSION['CustNo'];
//include 'monthtables.php';
$Prof = @$_POST['Prof'];

$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."<br />";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br />Custint:".$CustInt."<br />";

if ($CustInt == '0')
$CustInt = @$_POST['CustNo'];

$_SESSION['CustNo'] = $CustInt;

echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";

?>
<!--<form name="addTransCustProcess2"  action="addTransprocess_last2.php" onsubmit='return formValidator()'   method="post">-->

<!--before we can add a transaction, we check what transactions the customer has done:
<br /><br />-->
<?php

//$TBLrow = $_POST['mydropdownEC'];
$Amt = "";
//$Amt = @$_POST['Amt'];

/*echo "TBLrow: " .$TBLrow."<br />";
$CustNo = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
$CustInt = intval($CustNo[0]);

//echo "<br />Transint:".$CustInt."</br />";
*/
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring."<br />";

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
print " <b><font size=4>".$item3;
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
echo "<font size='3'><b>";
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



//require_once 'inc_OnlineStoreDB.php';

$Numb = "ProofNo1"; //default when table is empty.
//$query = "SELECT MAXNUM(ProofNo)  AS MAXNUM FROM aproof order by ProofNo";
//$query = "select ProofNo from aproof order by ProofNo desc limit 1"; // gives Proofno9 instead of Proofno11
//$query = "select ProofNo from aproof asc limit 1";
//$query = "select ProofNo from aproof order by SUBSTRING(ProofNo, 2) desc limit 1"; // gives Proofno9 instead
$query = "select ProofNo from aproof order by ProofDate desc limit 1";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

while($row = mysqli_fetch_array($result)){
    echo "<br />The max no ProofNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = $row[0];
$Numb = substr($daNextNo, 7);
$Numb++;
}
echo "<br /><br />";
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
<!--<form  onsubmit='return formValidator()' action="addProofprocess.php" method="post">-->
<table border='0'>
<?php
echo "Add new proofs:<br />";

echo "<tr>";
//echo "<th>Proof No &nbsp;</th>"; //left out becasue mysql statement will get MaxNumber before writing to DB.
//echo "<th>CustNo</th>";
echo "<th>ProofDate<br />";
//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;CustSDR or Bank Ref&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Amt</th>";

echo "<th>&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />HOVER and wait</th>";
echo "</tr><tr>";

echo "</tr>\n";
?>

<!--
    <tr>
            <th><input type="text" size="2"  id="ProofNo"  name="ProofNo" value="<?php echo $daNewProofNo;?>" />
        </th>
-->
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";

</th>
        <th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
        $NewFormat = date("d/m/Y");
        ?>
            <!--<label>ProofDate:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <!--<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->
            <?php include 'yesterday.php' ?>
            <input id="lst"   name="ProofDate"  >

<!--			<input type="hidden" size="10"  id="ProofDateOrig"  name="ProofDateOrig" value="<?php //echo $daNextNo; ?>" />
-->
        </th>

        <th>
            <!--<label>&nbsp; CustSDR:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <textarea size="19" id="CustSDR"  name="CustSDR" size = '20' ><?php if ($Prof == 'ChequeToBeDeposited') echo 'Received a Cheque'; ?></textarea>
        </th>

        <th>
            <!--<label>&nbsp; Amt:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="5" id="Amt"  name="Amt" value="<?php echo $Amt; ?>"   class='clAmt' />
        </th>

        <th>
            <!--<label>&nbsp; Notes:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <!--<input type="text"  size="10" id="Notes"  name="Notes" size = '35' value="" />-->
            <textarea id="Notes"  name="Notes"   class='clNotes'></textarea>
            <textarea id="Notes2"  name="Notes2"   class='clNotes'></textarea>
            <textarea id="Notes3"  name="Notes3"   class='clNotes'></textarea>
            <textarea id="Notes4"  name="Notes4"   class='clNotes'></textarea>
            <textarea id="Notes5"  name="Notes5"   class='clNotes'></textarea>
            <textarea id="Notes6"  name="Notes6"   class='clNotes'></textarea>
            <textarea id="Notes7"  name="Notes7"   class='clNotes'></textarea>
            <textarea id="Notes8"  name="Notes8"   class='clNotes'></textarea>

        </th>
    </tr>
    </table>
    <table>

    <tr>

    <?php
echo "<th>InvNoA No<br />
HOVER OVER ME!</th>";
echo "<th>InvNoA incl VAT</th>\n";
echo "<th>InvNoB No</th>";
echo "<th>InvNoB incl VAT</th>\n";
echo "<th>InvNoC No</th>";
echo "<th>InvNoC incl VAT</th>\n";
echo "</tr>";
?>

    <tr>
        <th>
            <!--<label>&nbsp; InvNoA:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->

    <?php echo file_get_contents('invJQuery.js'); ?>
    <input type="text"  size="3" id="InvNoA"  name="InvNoA"  class='clInvNoA' />

    </th>
        <th>
            <!--<label>&nbsp; InvNoAincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" size="3"  id="InvNoAincl"  name="InvNoAincl"   class='clAmt'/>
        </th>


        <th>
            <!--<label>&nbsp; InvNoB:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoB"  name="InvNoB" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoBincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoBincl"  name="InvNoBincl"   class='clAmt'  />
        </th>


        <th>
            <!--<label>&nbsp; InvNoC:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" id="InvNoC"    size="1" name="InvNoC" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoCincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" size="1"  id="InvNoCincl"  name="InvNoCincl" value="0"  class='clAmt'  />
        </th>


</tr>
<tr>
<th>InvNoD No</th>
<th>InvNoD incl VAT</th>
<th>InvNoE No</th>
<th>InvNoE incl VAT</th>
<th>InvNoF No</th>
<th>InvNoF incl VAT</th>
</tr>

<tr>

    <th>
            <!--<label>&nbsp; InvNoD:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" size="1"  id="InvNoD"  name="InvNoD" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoDincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoDincl"  name="InvNoDincl" value="0"  class='clAmt'  />
        </th>


        <th>
            <!--<label>&nbsp; InvNoE:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" id="InvNoE"   size="1" name="InvNoE" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoEincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoEincl"  name="InvNoEincl" value="0"  class='clAmt'  />
        </th>


        <th>
            <!--<label>&nbsp; InvNoF:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text" size="1"  id="InvNoF"  name="InvNoF" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoFincl:</label></dt>
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoFincl"  name="InvNoFincl" value="0"  class='clAmt'  />
        </th>

</tr>
<tr>
<th>InvNoG No</th>
<th>InvNoG incl VAT</th>
<th>InvNoH No</th>
<th>InvNoH incl VAT</th>
<th>Priority</th>
<th>Proof Method &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

    </tr>

        <th>
            <!--<label>&nbsp; InvNoG:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoG"  name="InvNoG" value="0"  class='clInvNoA' />
        </th>
        <th>
            <!--<label>&nbsp; InvNoGincl:</label></dt>-->
            <!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
            <input type="text"  size="1" id="InvNoGincl"  name="InvNoGincl" value="0"  class='clAmt'  />
            </th><th>
            <input type="text" size="1"  id="InvNoH"  name="InvNoH" value="0"  class='clInvNoA' />
            </th><th>
            <input type="text" size="1"  id="InvNoHincl"  name="InvNoHincl" value="0"  class='clAmt'  />
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

        <th>

            <input type="text"  size="15" id="PMethod"  name="PMethod" value="<?php echo $Prof; ?>" />

        </th>

        </tr>
        </table>

    <br />
<!--<input type="submit" value="Create Proofaction" onclick="return confirm('Are you sure about the date?');" /> -->
<input type='submit' value="Create proof"   style="width:300px;height:30px" />
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

<input type="submit" value="Submit/Save" onsubmit='return formValidator()'  style="width:300px;height:30px" />
<!-- onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->

<!--
<input type="submit" name="btn_submit" value="Create transaction" onclick="formValidator()" /> -->



</form>



<?php //mysql_close($conn);?>
</p>
<?php
include ("view_inv_by_custADV2.php");
include ("view_proof_by_cust.php");
include ("view_proof_by_cust2.php");
include 'monthtables.php';
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br />";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

//include 'view_event_by_cust.php';

/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>
</table>
<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
        $NewFormat = date("d/m/Y");

include 'view_proof_all.php';

        ?>
        <!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

    <!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->

</form>
</body>
</html>
