<html>
<head>
<title>Add a expense</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script  type="text/javascript">



function formValidator(){


	// Make quick references to our fields
	var ExpNo = document.getElementById('ExpNo');
	var PurchDate = document.getElementById('lst');  //THE BIG PROBLEM WAS TOO ids FOR PURCHDATE it must be in the correct sequence!!!
	var SupCode = document.getElementById('SupCode');
	//var Notes = document.getElementById('Notes');
	//var TMethod = document.getElementById('TMethod');//Payment method
	

	
	var AK = document.getElementById('AK');//Category
	var AC = document.getElementById('AC');//CustNo
	// Check each input in the order that it appears in the form!
	if(notEmpty(ExpNo, "Please enter an expense number")){
//		if(notEmpty(Aex, "Please enter a valid numeric ex VAT")){

				if(lengthRestriction(PurchDate, 10,10)){

				if(notEmpty(SupCode, "Please enter a supplier code")){
					if(notEmpty(AK, "Please enter a category")){
	if(notEmpty(AC, "Please enter a valid numeric Customer number")){

			//if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
//				if(isDate(PurchDate, "Please put in Da 	te")){
			//		if(madeSelection(TMethod, "Please Choose Payment Method")){


				return true;
						}
	//				}
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
//JQUERY: LOOK AT : include 'invJQuery.php' 		
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




<?php	//this is "addTransCustProcess2.php"
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	@$CustInt = @$_SESSION['CustNo'];
//include "monthtables.php";
//echo "</th>";
//echo "<table ><tr><th>"; 
include "calculator/indexKL.php";
//echo "</th></tr></table>"; 
//include "viewExpLatestC.php";










$TBLrow = @$_POST['mydropdownEC'];
$SupCode = "";
$Category = "";
$Notes = "";
$item = @$_GET['item'];









$SupCode = @$_GET['SupCode'];
$InVAT = @$_GET['InVAT'];

$Category = @$_GET['Category'];
$Notes = @$_GET['Notes'];


//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );

$CustFN = '';
$CustLN = '';

//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."<br />";


$_SESSION['CustNo'] = $CustInt;
$CustNo = $CustInt;
/*if ($CustInt == "")
{
echo "custint not declared";
$CustNo = $CustInt;
}
else echo "custno declared as ".$Custno;
*/

//echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";




?>
<!--<form name="addTransCustProcess2"  action="addTransprocess_last2.php" onsubmit='return formValidator()'   method="post">-->

<!--before we can add a expense, we check what expenses the customer has done:
<br><br>-->
<?php

//$TBLrow = $_POST['mydropdownEC'];
$AmtPaid = "";
//$AmtPaid = @$_POST['AmtPaid'];

/*echo "TBLrow: " .$TBLrow."</BR>";
$CustNo = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$ExpNo</br />";
//$ExpNo = strtok(";");
//}
//echo "ExpNozERO: ";
//echo $ExpNo[0]."</br />";
$CustInt = intval($CustNo[0]);


//echo "<br>Transint:".$CustInt."</br />";
*/
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$CustNo = $row["CustNo"];
$CustFN =  mb_substr($row["CustFN"], 0, 8);
$CustLN =  mb_substr($row["CustLN"], 0, 8);
$CustEmail = '';
$CustEmail = $row["CustEmail"];
$Important = '';
$Important = $row["Important"];
/*$item5 = $row["Notes"];
$item6 = $row["SupCode"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$CustNo";
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
$result->free();
};
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $CustFN;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $CustLN;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo @$CustEmail;?>">

<?php

$daNextNo = 1; //default when table is empty.

$queryH = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesH";
$resultH = mysqli_query($DBConnect, $queryH);// or die(mysql_error());
$query = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expenses";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
$queryE = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesE";
$resultE = mysqli_query($DBConnect, $queryE);// or die(mysql_error());


$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNoH = 1;
$daNextNoE = 1;
while($row = mysqli_fetch_array($resultE)){
	//echo "The max no ExpNo in expensesE table is:  ". $row[0] . "&nbsp;";
$daNextNoE = intval($row[0]);
}
while($row = mysqli_fetch_array($resultH)){
	//echo "The max no ExpNo in expensesH table is:  ". $row[0] . "&nbsp;";
$daNextNoH = intval($row[0]);
}
while($row = mysqli_fetch_array($result)){
	//echo "The max no ExpNo in expenses table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0]);
}

$daNextNo =  max (array($daNextNo, $daNextNoH, $daNextNoE));

$daNextNo = $daNextNo+1;

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
echo "<br>Add new expensesE:<br>";

/*
$queryCP = "select * from aproof where CustNo = $CustInt";

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
$ExpNo1 = $row2["ExpNo"];

echo "<option value='";
echo $ProofNo;
echo "'>";
echo $ProofNo;

//to determine whether the proof has been paid we got to look at the aproof table
//which has a ExpNo column.
//in addTransprocessLast2 it will say update aproof set ExpNo = '1015' where ProofNo = 'ProofNo34' 

//NOPE:
//to determine whether the invoice(s) have been paid we got to look at the expense table
//$TRRSQL = "select * from expenses where CustNo = $CustInt and InvNoA = $item2b or  InvNoA = $item2b";

print "_TR:".$ExpNo1;
if ($ExpNo1 == '')
echo "not paid yet";
print "_R".$Amt;
print "_".$item2b;
print "_".$item3b;
print "__".$item4b;

print " </option>"; 

	}
$resultCP->free();
}

echo "</select> <br>(in addTransprocessLast2 it will say update aproof set ExpNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = 'http://localhost/phpMyAdmin-3.5.2-english/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;
<a href = 'http://localhost/ACS/view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a><br>



<br><br><b><br><br><br><br><br><br>";

}
else "no new proof of payments received";

echo "</form>";

*/




?>



<form name= "yoo">
		<input type='text'  style="width:26px"  name='Q1' id='Q1' size='5' value='1' onkeyup='calc()'> * R
	  <input type='text'  style="width:66px" name='ex1' id='ex1' size='10' class='exxx1' onkeyup='calc()'  >incl VAT = 
	  <span id="resp"></span><!-- in here possibly AJAX invoice total CalcServ.php-->
</form>
<form name= "quick"  action="addExpEQ.php"   method="post">
Quick: CSVpaste: <input type='text'  style="width:326px"  name='csv' id='csv' size='5' >
	  <input type='submit' value="Create E expense"   style="width:200px;height:30px" /> 

</form>
<form name="AddExp"  onsubmit="return formValidator()"  action="addExpEMulti.php"   method="post">
<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->
<br><a href = 'addExpEtype.php?item=ULPpetrol 10.07L @14.38&InVAT=100&Category=petrol&SupCode=CT'>Click here to add petrol</a>

<br>
Please put in products into expensesE table of 1 invoice:

<table>
<?php

echo "<tr><th>ExpNo</th>";
echo "<th>PurchDate";


//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;SupCode&nbsp;&nbsp;</th>";
//echo "<th>AmtPaid</th>";
//echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* expense AutoNumber: (!! Different for internet expenses!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="6"  id="ExpNo"  name="ExpNo" value="<?php echo $daNextNo;?>" />
		</th>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";



</th>
		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		?>
			<!--<label>PurchDate:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<!--<label>PurchDate:</label></dt>-->
			<!--<input type="text" size="10" id="PurchDate"  name="PurchDate" value="<?php //echo $PurchDate; ?>" /> -->
			<?php include("yesterday.php"); ?>
			<input id='lst'  size="10" name="PurchDate"  >
		</th>

		<th>
			<!--<label>&nbsp; SupCode:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<!--<input type="text"  size="19" id="SupCode"  name="SupCode" size = '20' value="" />-->
<?php include 'invJQueryExp.php';

	
 ?>	
		<!--<input id="SupCode"  name="SupCode" size="6" class='clSC' >-->
		<input id="SupCode"  name="SupCode" size="6" value="<?php echo $SupCode; ?>">
			
			
		</th>
		<th></b>Categories: petrol, CarRepairs, Medical 

</th>
	
	
		<!--<th>
			<select name="TMethod"  id="TMethod"  >
                <option value="Please Choose">Please Choose</option><!-- the javascript function requires phrase Please Choose 
			//VERY IMPORTANT THAT value must equal to please choose as well!!!

                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>	
                <option value="Mixed">Mixed</option>	
                <option value="-">-</option>	
</select>
			
		</th>-->
		</tr>
		</table>
		<table>
		<tr>

		
				
		<?php
	
		echo "<th>Item Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		//echo "<th>HOVER and wait InvB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		
	?>	
	
	<th>
	Ex VAT in VAT
	</th>
	<th>
	Km / SerialNo

	</th>
	
	<th>
	Notes(FreshStop)<br>
cash/EFT/prescribed
	</th>
	<th>
	Category

	</th>
	<th>
	<?php $CCC= $CustNo.",".$CustLN.$CustFN; ?>






	 <?php echo $CCC; ?>&nbsp;&nbsp;&nbsp;(business301)(300stock)<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
	</th>







	
	



			<tr></tr>
		<th>
<?php 		echo $daNextNo;?>
			<input type="text"  size="53" id="ItemA" required name="ItemA"  value='<?php echo $item; ?>'  /> <!--item Description-->
		</th>
	
	
			<th>
			<input type="text"  size="5" id="Aex" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Aex"  />

<!--			<input type="text"  size="5" id="Aex" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Aex"  />--><!--ex VAT-->

			<!-- type="number" min="1" max="10" step="0.5" -->
			<!--Many solutions here only work when keys are pressed. -->
			<!--These will fail if people paste text using the menu, or if they drag and drop text into the text input.-->
			<!--I've been bitten by that before. Be careful! -->
		<!--	<input type="text"  size="5" id="Aex"  name="Aex"   /><!--ex VAT-->

			<input type="text"  size="5" id="Ain" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Ain" value='<?php echo $InVAT; ?>'  /><!--in VAT-->
						

		</th>

			<th>
			<input type="text"  size="5" id="AS"  name="AS"   style="text-transform:uppercase;" /><!--SN-->
		</th>
			<th>
			<input type="text"  size="17" id="AN"  name="AN"   value="<?php echo $Notes; ?>" /><!--ProdnotesPN-->
		</th>
		<th>
			<input type="text"  size="6" id="AK"  name="AK"  required value="<?php echo $Category; ?>" pattern="[A-Za-z]+"/><!--Category-->
		</th>

		</th>
			<th>
			<input type="text"  size="5" id="AC"  name="AC" class='clCN' required value='<?php echo $CCC; ?>' /><!--Select a Customer-->
		</th>


































		





























































		</tr>
		<tr><th> </th></tr>	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr>
		

	
	
		<th>
						<?php echo ++$daNextNo;?>

			<input type="text"  size="51" id="ItemB"  name="ItemB"  />
		</th>
		<th>
			<input type="text"  size="5" id="Bex"  name="Bex"  />
			<input type="text"  size="5" id="Bin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Bin"  /><!--in VAT-->
		</th>
		<th>
			<input type="text"  size="5" id="BS"  name="BS"   style="text-transform:uppercase;" />
		</th>
			<th>
			<input type="text"  id="BN"  name="BN"  size="17" />
		</th>
		<th>
			<input type="text"  size="6" id="BK"  name="BK"   /><!--Category-->
		</th>

			<th>
					<select name="yodo" '>
<option value="_no_selection_">View Categories</option>";
<?php
$queryCat = "SELECT DISTINCT Category FROM expensesE";
if ($result = mysqli_query($DBConnect, $queryCat)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Cat = $row["Category"];
	print "<option value='$Cat'>".mb_substr($Cat, 0, 10);
	//print "_".$Cat;
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>
		
			<input type="text"  size="5" id="BC"  name="BC" class='clCN'  />
		</th>





















		
		







	<tr></tr>
		<th>
						<?php echo ++$daNextNo;?>

			<input type="text" id="ItemC"    size="51" name="ItemC" />
		</th>
				<th>
			<input type="text"  size="5" id="Cex"  name="Cex"   />
			<input type="text"  size="5" id="Cin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Cin"  /><!--in VAT-->
		</th>
		<th>
			<input type="text"  size="5" id="CS"  name="CS"   style="text-transform:uppercase;"  />
		</th>

		<th>
			<input type="text"  size="17" id="CN"  name="CN"   />
		</th>
		<th>
			<input type="text"  size="6" id="CK"  name="CK"   /><!--Category-->
		</th>
		<th>
			<input type="text"  size="5" id="CC"  name="CC" class='clCN'  />
		</th>










		<tr></tr>
		<th>
						<?php echo ++$daNextNo;?>

				<input type="text" size="51"  id="ItemD"  name="ItemD"  />
		</th>
					<th>
			<input type="text"  size="5" id="Dex"  name="Dex"   />
			<input type="text"  size="5" id="Din" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Din"  /><!--in VAT-->
		</th>

			<th>
			<input type="text"  size="5" id="DS"  name="DS"   style="text-transform:uppercase;"  />
		</th>
			<th>
			<input type="text"  size="17" id="DN"  name="DN"   />
		</th>
		<th>
			<input type="text"  size="6" id="DK"  name="DK"   /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="DC"  name="DC" class='clCN'  />
		</th>







	<tr></tr>
		<th>
				<?php echo ++$daNextNo;?>

		<input type="text" id="ItemE"   size="51" name="ItemE"   />
		</th>
				<th>
			<input type="text"  size="5" id="Eex"  name="Eex"   />
			<input type="text"  size="5" id="Ein" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Ein"  /><!--in VAT-->
			<th>
			<input type="text"  size="5" id="ES"  name="ES"   style="text-transform:uppercase;"  />
		</th>

				<th>
			<input type="text"  size="17" id="EN"  name="EN"   />
		</th>
		<th>
			<input type="text"  size="6" id="EK"  name="EK"   /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="EC"  name="EC" class='clCN'  />
		</th>





	

		<tr></tr>
		
  
		
		<th>
				<?php echo ++$daNextNo;?>

		<input type="text" size="51"  id="ItemF"  name="ItemF"  />
		</th>
					<th>
			<input type="text"  size="5" id="Fex"  name="Fex"   />
			<input type="text"  size="5" id="Fin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Fin"  /><!--in VAT-->
		<th>
			<input type="text"  size="5" id="FS"  name="FS"   style="text-transform:uppercase;"  />
		</th>
			<th>
			<input type="text"  size="17" id="FN"  name="FN"   />
		</th>
		<th>
			<input type="text"  size="6" id="FK"  name="FK"   /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="FC"  name="FC" class='clCN'  />
		</th>







	<tr></tr>
	
		<th>
				<?php echo ++$daNextNo;?>
				<input type="text"  size="51" id="ItemG"  name="ItemG" />
		</th>
		<th>
			<input type="text"  size="5" id="Gex"  name="Gex"   />
			<input type="text"  size="5" id="Gin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Gin"  /><!--in VAT-->
		</th>
	<th>
			<input type="text"  size="5" id="GS"  name="GS"   style="text-transform:uppercase;"   />
		</th>

			<th>
			<input type="text"  size="17" id="GN"  name="GN"   />
		</th>
		<th>
			<input type="text"  size="6" id="GK"  name="GK"   /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="GC"  name="GC" class='clCN'  />
		</th>





	

	<tr></tr>
		<th>
					<?php echo ++$daNextNo;?><input type="text" size="51"  id="ItemH"  name="ItemH"  />
	</th>
			<th>
			<input type="text"  size="5" id="Hex"  name="Hex"   />
			<input type="text"  size="5" id="Hin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Hin"  /><!--in VAT-->
		</th>
	<th>
		
			<input type="text"  size="5" id="HS"  name="HS"    style="text-transform:uppercase;"  />
		</th>
			<th>
			<input type="text" size="17"  id="HN"  name="HN"   />
		</th>
		<th>
			<input type="text"  size="6" id="HK"  name="HK"   /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="HC"  name="HC" class='clCN'  />
		</th>







	<tr></tr>
	
<!--		<th>
			<select name="Priority" value="<?php $oldpri = "."; echo $oldpri; ?>" >
                <option value=".">.</option>
                <option value="Low">Low</option>
                <option value="High">High</option>
			</select>
			
</th>-->
		</tr>
		</table>
	
	





<!--<input type="submit" name="btn_submit" value="Select the proof" style="width:300px;height:30px" /> -->
<!--	<br><input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>
<br><br><br><br><br><br><br><br><br><br><br>
-->

<!--<input type="submit" value="Create expense" onclick="return confirm('Are you sure about the date?');" /> -->
<input type='submit' value="Create expense"   style="width:300px;height:30px" /> 
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 
Med. deductions: only if prescribed by a doc or med. practitioner.













</form>

<a href= "viewExpE.php" target=_blank>viewExpE.php</a>
<a href= "viewExpHEandExp.php" target=_blank>viewExpHEandExp.php</a>

<?php
if ($Category == 'petrol')
{include "viewExpEpetrol.php";
}
else
include "viewExpHEandExp.php";




//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");




/*
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All expensesE total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

include ("view_event_by_cust.php");

*/


/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?> 



</body>
</html>