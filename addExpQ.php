<html>
<head>
<title>Add an H expenseQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script  type="text/javascript">



function formValidator(){
    var ExpNo = document.getElementById('ExpNo');
    var PurchDate = document.getElementById('PurchDate');  //THE BIG PROBLEM WAS TOO ids FOR PURCHDATE it must be in the correct sequence!!!
    var SupCode = document.getElementById('SupCode');
    var AmtPaid = document.getElementById('AmtPaid');
    var AK = document.getElementById('AK');//Category
    var Aex = document.getElementById('Aex');//exVAT
    var AC = document.getElementById('AC');//CustNo
    // Check each input in the order that it appears in the form!
    if(notEmpty(ExpNo, "Please enter an expense number")){
//		if(notEmpty(Aex, "Please enter a valid numeric ex VAT")){
        if(lengthRestriction(PurchDate, 10,10)){
            if(notEmpty(SupCode, "Please enter a supplier code")){
                if(notEmpty(AK, "Please enter a categoryyy")){
                    if(isVAT(AmtPaid, Aex "VAT does not add up")){
            if(notEmpty(AC, "Please enter a valid numeric Customer number")){

            //if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
//				if(isDate(PurchDate, "Please put in Da 	te")){
            //		if(madeSelection(TMethod, "Please Choose Payment Method")){


                return true;
                        }
                    }
                }
            }
        }
    }
return false;
}
 // if (val1 != "" && val2 != "")

function isVAT(elem, elem2, helperMsg){
    if(elem.value == (elem2.value)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
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
//JQUERY: LOOK AT : echo file_get_contents('invJQuery.js');
//	<input type="text"  size="3" id="ItemA"  name="ItemA"  class='clInvNoA' />
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


function calc()
{

  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  val1 = document.getElementById("ex1").value;
  val2 = document.getElementById("Q1").value;
  /*
  val3 = document.getElementById("ex2").value;
  val4 = document.getElementById("Q2").value;
  val5 = document.getElementById("ex3").value;
  val6 = document.getElementById("Q3").value;
  val7 = document.getElementById("ex4").value;
  val8 = document.getElementById("Q4").value;
  val9 = document.getElementById("ex5").value;
  val10 = document.getElementById("Q5").value;
  val11 = document.getElementById("ex6").value;
  val12 = document.getElementById("Q6").value;
  val13 = document.getElementById("ex7").value;
  val14 = document.getElementById("Q7").value;
  val15 = document.getElementById("ex8").value;
  val16 = document.getElementById("Q8").value;
  */
  mani = "multiply";

  if (val1 != "" && val2 != "")
  {

  document.getElementById("resp").innerHTML="Calculating...";
//    queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+"&ex3="+val5+"&Q3="+val6+"&ex4="+val7+"&Q4="+val8+"&ex5="+val9+"&Q5="+val10+"&ex6="+val11+"&Q6="+val12+"&ex7="+val13+"&Q7="+val14+"&ex8="+val15+"&Q8="+val16+mani;
    queryPath = "CalcServ3.php?ex1="+val1+"&Q1="+val2;
//   queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+"&ex3="+val5+"&Q3="+val6+"&ex4="+val7+"&Q4="+val8+mani;
  //queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+&ex3="+val5+"&Q3="+val6+     &ex4="+val7+"&Q4="+val8+mani;
  //queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&manipulator="+mani;
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

      document.getElementById("resp").innerHTML=xmlhttp.responseText;

    }
  }

  xmlhttp.open("GET",queryPath);
  xmlhttp.send();

  }
}

</script>
</head>
<body>



<?php
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';
$daNextNo = 1; //default when table is empty.
$queryH = "SELECT MAX(ExpNo)  AS MAXNUM FROM expensesH";
$resultH = mysqli_query($DBConnect, $queryH);// or die(mysql_error());
$query = "SELECT MAX(ExpNo)  AS MAXNUM FROM expenses";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
$queryE = "SELECT MAX(ExpNo)  AS MAXNUM FROM expensesE";
$resultE = mysqli_query($DBConnect, $queryE);// or die(mysql_error());
$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNoH = 1;
$daNextNoE = 1;
while($row = mysqli_fetch_array($result)){
    echo "The max no ExpNo in expenses table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0]);
}while($row = mysqli_fetch_array($resultE)){
    echo "The max no ExpNo in expensesE table is:  ". $row[0] . "&nbsp;";
$daNextNoE = intval($row[0]);
}
while($row = mysqli_fetch_array($resultH)){
    echo "The max no ExpNo in expensesH table is:  ". $row[0] . "&nbsp;";
$daNextNoH = intval($row[0]);
}

$daNextNo =  max (array($daNextNo, $daNextNoH, $daNextNoE));
$daNextNo = $daNextNo+1;

$CCCCC = '';

$txtArea = $_POST['csv'];

$txtArea = str_replace("\n", "\\n\n", $txtArea);
$txtArea = str_replace("\t", "\\t\t", $txtArea);
//echo nl2br(htmlentities($txtArea)); // for HTML as output, with <br /> for newlines
//echo "<pre>" . $txtArea . "</pre>"; // for raw, preformated output
$array = explode ('\t', $txtArea);
$AA='';
$AA=$array[2];
$AA = ltrim($AA, '	');
$AA = str_replace("-", "", $AA);

//$AA = str_replace(",", "", $arraySDR); //for longn numbers like R11,000
$AA = strtr($AA, array(',' => '')); //for longn numbers like R11,000
$arraySDR = $array[1]; //sdr  chk view_Unpaid_inv_by_cust2bAT.php

$arraySDR = ltrim($arraySDR, '	');
$arraySearch = $arraySDR;

$arraySDR = str_replace("/", " ", $arraySDR);
$arraySDR = str_replace("-", " ", $arraySDR);
$arraySDR = str_replace("*", " ", $arraySDR);
$Aex = $AA/1.14;
$Aex = number_format((float)$Aex, 2, '.', '');

$category = '';$SupCode = '';

?>

<form  action="addExpMulti.php" onsubmit="return formValidator()"   method="post">
ExpNo: <input type="text" size="6"  id="ExpNo"  name="ExpNo" value="<?php echo $daNextNo;?>" /><br />
SDR: <input type="text" id="ItemA" size = 34 name="ItemA" value="<?php echo $arraySDR;?>">
AmtPaid: <input type="text" id="AmtPaid" size = 7 name="AmtPaid" value="<?php echo $AA;?>">
Ex VAT: <input type="text" id="Aex" size = 7 name="Aex" value="<?php echo $Aex;?>">
<br />
Category: <input type="text"  size="6" id="AK"  name="AK"  value="<?php echo $category;?>"  required/>
<!--<input type="text"  size="5" id="AC"  name="AC" class='clCN'   value='0'  />(/300/301)<br />DUPLICATION-->
SupCode: <input type="text"  id="SupCode"  name="SupCode" size="6"   value='<?php echo $SupCode;?>' required><br />
Notes: <input type="text"  id="AN"  name="AN" size="20"   value='' ><br />
Serial: <input type="text"  id="AS"  name="AS" size="12"   value='' >
<?php
$CustNo = $_POST['CustNo'];

$query = "select * from customer where CustNo = $CustNo";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $CustFN = $row["CustFN"];
    $CustLN = mb_substr($row["CustLN"], 0, 20);
    //print "".mb_substr($CustFN, 0, 8);
    print "&nbsp;&nbsp;". $CustFN;
    print "&nbsp;&nbsp;&nbsp;". $CustLN;

    }
    mysqli_free_result($result);
}
?>


<br />
<!--Select a Customer-->
<?php

if ($array[1] == '')
    echo "<font size=6>error, Please paste the date, Statement Description and Amount of a transaction into textarea. Preferably save the excel (.XLSX) file as a .CSV tabular file<br /><br /><br />";

//$arraySDR = str_replace($arraySDR, '/');
//$arraySDR = str_replace(array('/', ' '), array('-', ''),array('*', ''), $arraySDR);

$TransDate = $array[0];
$inin = $array[1]; //InvNo
$ininV = str_replace(' ', '', $inin);
//$ininV = preg_replace('/\s+/', '', $ininV);//remove whitespace
$words = preg_replace('/[0-9]+/', '', $ininV);
$words = str_replace(array('.', ','), '' , $words); //remove kommas and fullstops
$words = preg_replace('/[.,]/', '', $words);
$words = str_replace("/", " ", $words);
$words = str_replace("-", " ", $words);
$words = str_replace("*", " ", $words);
$ininV = str_replace("/", " ", $ininV);
$ininV = str_replace("-", " ", $ininV);
$ininV = str_replace("*", " ", $ininV);
//$ininV = preg_replace('/\s+/', '', $ininV);

$ininA = explode (' ', $inin);

?>


<input type='text' name='PurchDate' id='PurchDate' value='<?php echo $TransDate; ?>'>
CustNo: <input type='text' name='AC' id='AC' value='<?php echo $CustNo; ?>' required>Stock: 300 business: 301
InvNo1: <input type='text' name='InvNo1' required >
        <select name="mydropdownINV" >
<option value="_no_selection_">View Cust Invoices:</option>";
<?php

        $query = "select * from invoice where CustNo = $CustNo ORDER BY InvNo desc";
//echo $query;

if ($result = mysqli_query($DBConnect, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $InvNo = $row["InvNo"];//case sensitive!
    $Summary = mb_substr($row["Summary"], 0, 20);//case sensitive!
    $TotAmt = $row["TotAmt"];//case sensitive!
    print "<option value='$InvNo'>".mb_substr($InvNo, 0, 8);
    print "_".$row["InvDate"];
    print "_".$Summary;
    print "_". $TotAmt;
    print "_". $row["D1"];
    print "_". $row["D2"];
    print "_". $row["D3"];
    print "_". $row["D4"];

    $SQLstring = "select * from expenses where InvNo = $InvNo order by ExpNo  desc";

    //echo $SQLstring." ";

$NN = '';
$NNN = '';

if ($resultinner = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($resultinner));

while ($row = mysqli_fetch_assoc($resultinner))
{
echo $row['ExpNo']." ";
echo $row['ExpDesc']." ";
echo $row['SupCode']." ";
echo $row['PurchDate']." ";
echo $row['ProdCostExVAT']." ";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo $PIV." ";

//echo $row['InvNo']." ";
echo $row['Notes']." ";
echo "".$row['SerialNo']." ";
echo "<br />";
}
mysqli_free_result($resultinner);
}

    print " </option>";
    }
    mysqli_free_result($result);
}
//	mysqli_close($link);
?>
</select>


    <select name="mydropdownEC">
<option value="_no_selection_">View Customersss</option>";
<?php
$query = "select CustNo,  CustFN, CustLN from customer ORDER BY custLN";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $CustNo = $row["CustNo"];//case sensitive!
    $CustLN = mb_substr($row["CustLN"], 0, 8);//case sensitive!
    $CustFN = mb_substr($row["CustFN"], 0, 8);//case sensitive!
    print "<option value='$CustNo'>".mb_substr($CustLN, 0, 8);
    print "_".$CustNo;
    print "_". mb_substr($CustFN, 0, 8);
    print " </option>";
    }
    mysqli_free_result($result);
}
?>
</select>



<input type="submit" value="Submit/Save" onsubmit='return formValidator()'  style="width:300px;height:30px" />  <button type="or Skip validation"   onsubmit='return formValidator()'  style="width:300px;height:30px"  formnovalidate>or: submit without validation</button>

</form>

<a href='edit_invCQ.php' target='_blank'>view Customer's invoices</a>
<a href='editExpCQ.php' target='_blank'>view Customer's expenses</a>


<!--<option value="_no_selection_">View Categories</option>-->
<?php

$TransDate;
$D = explode('/',$TransDate );
$TransDate = $D[2].'-'.$D[1].'-'.$D[0];
echo "td:".$TransDate."<br />";
/*$queryCat = "SELECT * FROM expensesH where PurchDate = '$TransDate'";
echo "queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $Cat = '';
    $Cat = $row["ExpDesc"];
    if ($Cat != '')
        echo "<br /><font size=3 color = red>WARNING These are on same date:</font><br />";

    print "<option value='$Cat'>".$Cat;
    //print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
    //print "_".$Cat;
    print " </option>";
    echo " ".$row["PurchDate"];
    }
    mysqli_free_result($result);
}
*/


//$time = strtotime('$TransDate -3 days');
//$dateM = date("Y-m-d", $time);
  //  echo "<br />date minus 3 days: ".$dateM."<br />";

   //echo "<br />TRANSDATE: ".$TransDate."<br />";

$date=date_create("$TransDate");
date_modify($date,"-14 days");
$dateM = date_format($date,"Y-m-d");
//echo "<br />TRANSDATE minus3 days: ".$dateM;

$date=date_create("$TransDate");
$date = date_modify($date,"+12 days");
$dateP = date_format($date,"Y-m-d");

//echo "<br />TRANSDATE plus3 days:: ".date_format($date,"Y-m-d");

$AexP = $Aex + 1.01;
$AexM = $Aex - 1.01;

$queryCat = "SELECT * FROM expenses where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br />";
        //echo "<br /><font size=3 color = red>WARNING These are on same date:</font><br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar date and similar price:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "<th>CustNo</th>";
echo "<th>InvNo</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
    $ExpDesc = '';
    $ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["CustNo"];
$CustNo = $row["CustNo"];

$queryC = "select * from customer where CustNo = $CustNo";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
while ($row = mysqli_fetch_assoc($resultC)) {
echo " ".$row["CustFN"]."<a href='{$row["CustLN"]}?='{$row["CustLN"]}'></a>";
echo "".$row["CustLN"]."";
}
mysqli_free_result($resultC);
}
echo "</th>";

echo "<th>".$row["InvNo"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}

$queryCat = "SELECT * FROM expenses where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar date:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];

echo "<th>".$row["ExpDesc"]."</th>";
    //print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
    //print "_".$ExpDesc;
//	print " </option>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}



$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br />";
        //echo "<br /><font size=3 color = red>WARNING These are on same date:</font><br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar date and similar priceH:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
    $ExpDesc = '';
    $ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}

$queryCat = "SELECT * FROM expensesH where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar dateH:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "<th>SupCode</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];

echo "<th>".$row["ExpDesc"]."</th>";
    //print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
    //print "_".$ExpDesc;
//	print " </option>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["SupCode"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}



$queryCat = "SELECT * FROM expensesE where (PurchDate between '$dateM' AND '$dateP') and ProdCostExVAT between $AexM and $AexP";
echo "queryCat: $queryCat <br />";
        //echo "<br /><font size=3 color = red>WARNING These are on same date:</font><br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar date and similar priceE:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
    $ExpDesc = '';
    $ExpDesc = $row["ExpDesc"];
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}
$queryCat = "SELECT * FROM expensesE where (PurchDate between '$dateM' AND '$dateP') ";
echo "queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
        echo "<br /><font size=3 color = red>WARNING These are on similar dateE:</font><br />";
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>ProdexVAT</th>";
echo "<th>ProdinVAT</th>";
echo "<th>PurchDate</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
//	$ExpDesc = '';
//	$ExpDesc = $row["ExpDesc"];

echo "<th>".$row["ExpDesc"]."</th>";
    //print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
    //print "_".$ExpDesc;
//	print " </option>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
$ProdinVAT = $row["ProdCostExVAT"]*1.14;
echo "<th>".$ProdinVAT."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "</tr>\n";
    }
    mysqli_free_result($result);
echo "</table>";
}
//shows different categories:
$queryCat = "SELECT * FROM expenses where ExpDesc = '$arraySearch'";
echo "<br /><br />queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $ExpDesc = $row["ExpDesc"];
    print "<option value='$ExpDesc'>".$ExpDesc;
    //print "<option value='$ExpDesc'>".mb_substr($ExpDesc, 0, 10);
    //print "_".$ExpDesc;
    //print " </option>";
    echo " ".$row["PurchDate"];
    }
    mysqli_free_result($result);
}
$queryCat = "SELECT DISTINCT Category FROM expenses";
echo "queryCat: $queryCat <br />";
if ($result = mysqli_query($DBConnect, $queryCat)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $Cat = $row["Category"];
    print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
    //print "_".$Cat;
    print " </option>";
    }
    mysqli_free_result($result);
}
echo "</select>";

include 'viewExpCust.php';
?>

</body>
</html>
