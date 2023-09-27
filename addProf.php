<html>
<head>
<title>Add a Profit</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<script  type="text/javascript">



function formValidator(){
	// Make quick references to our fields
	var ProfitNo = document.getElementById('ProfitNo');
	var DaA = document.getElementById('DaA');  //it must be in the correct sequence!!!
	var DaB = document.getElementById('DaB');  //it must be in the correct sequence!!!
	var SupCode = document.getElementById('SupCode');
	//var Notes = document.getElementById('Notes');
	//var TMethod = document.getElementById('TMethod');//Payment method
	

	
	// Check each input in the order that it appears in the form!
						if(isNumeric(ProfitNo, "Please enter a valid numeric profit number")){
				if(lengthRestriction(DaA, 10,10)){
				if(notEmpty(SupCode, "Please enter a supplier code")){
			if(addProf(DaB, "no tabs or spaces")){
//				if(isDate(DaA, "Please put in Da 	te")){
			//		if(madeSelection(TMethod, "Please Choose Payment Method")){
				return true;
				}
			}}
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
</script>
</head>
<body>




<?php	//this is "addTransCustProcess2.php"
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
//	@session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
//	$CustInt = $_SESSION['CustNo'];
//include "monthtables.php";
//echo "</th>";
//echo "<table ><tr><th>"; 
//include "calculator/indexKL.php";
//echo "</th></tr></table>"; 
//include "viewExpLatest.php";
//include "viewExpLatestC.php";

?>
<form action="addProfit.php" method="post"
<br>  
CSV paste: <input type="text" name="csv"    style="width:520px;height:30px" autofocus required/>
<br>
<br>

<?php
	
$daNextNo = 1; //default when table is empty.
$queryPH = "SELECT  MAX(ProfitNo)  AS MAXNUM FROM hprofits";
$resultPH = mysqli_query($DBConnect, $queryPH);// or die(mysql_error());

//echo $queryPH;
$daNextNo = 1; //forces a 1 if table is completely empty.
while($rowP = mysqli_fetch_array($resultPH)){
	echo "The max no ProfitNo in Hprofits table is:  ". $rowP[0] . "&nbsp;";
$daNextNo = intval($rowP[0]);
}
//echo "Add new profitsH: $daNextNo<br>";

$daNextNo = $daNextNo+1;



//echo "Add new profitsH: $daNextNo<br>";

?>
<input type="hidden" name="ProfitNo" value= '<?php echo $daNextNo; ?>' />
<input type="submit" name="btn_submit" value="Submit EFT(csv tabular) detail:  DD/MM/YYYY SDR AmtPaid" style="width:500px;height:30px" /> 
</form>


<form name="AddProfitMulti"  onsubmit="return formValidator()"  action="addProfHMulti.php"   method="post">
<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->

<br><br>
Please put in profit: (tabs get automtically removed after submit)

<table>
<?php

echo "<tr><th>ProfitNo</th>";

//echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;AccNo&nbsp;&nbsp;</th>";
//echo "<th>AmtPaid</th>";
//echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
<tr>
			<!--<th><label>* expense AutoNumber: (!! Different for internet expenses!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
	<th><input type="text" size="2"  id="ProfitNo"  name="ProfitNo" value="<?php echo $daNextNo;?>" />
	</th>

	<?php //$DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		//$NewFormat = date("d/m/Y");
		?>
			<!--<label>DaA:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<!--<label>DaA:</label></dt>-->
			<!--<input type="text" size="10" id="DaA"  name="DaA" value="<?php //echo $DaA; ?>" /> -->
		
			<!--<input id='lst' id="DaA" size="10" name="DaA"  >-->
	

	


			
			
	</th>

		</tr>
		</table>
		<table>
<tr>

		
				
		<?php	
	
		//echo "<th>Date: &nbsp;&nbsp;&nbsp;&nbsp;</th>";
		//echo "<th>HOVER and wait InvB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		
	?>	
	
	</tr>
	
			</table>
<table>
<tr>
<th>
	Date:
	</th>
	
<?php include("yesterday.php"); ?>
	<th>

		<input type="text"  size="27"  id='lst' id="DaA" name="DaA" required /> <!--date-->
	</th>
	<th>
<?php include("yesterday.php"); ?>
		<input type="text"  size="27" id='lst' id="DaB"  name="DaB"  /> <!--date-->
	</th>
	<th><?php include("yesterday.php"); ?>
		<input type="text"  size="27" id='lst' id="DaC"  name="DaC"  /> <!--date-->
	</th>
	<th>
		<input type="text"  size="27" id='lst' id="DaD"  name="DaD"  /> <!--date-->
	</th>
	<th>
		<input type="text"  size="27" id='lst' id="DaE"  name="DaE"  /> <!--date-->
	</th>
	<!--<th>
		<input type="text"  size="27" id='lst'  id="DaF"  name="DaF"  /> 
	</th>-->




</tr>
<tr>
<th>
	Descr:
	</th>
	
	
	<th>

		<input type="text"  size="3" id="ItemA"  name="ItemA" required /> <!--item PPDescription-->
	</th>
		<th>
		<input type="text"  size="1" id="ItemB"  name="ItemB"  />
	</th>
	<th>
		<input type="text" size="1" id="ItemC"    name="ItemC" />
	</th>
	<th>
		<input type="text" size="1"  id="ItemD"  name="ItemD"  />
	</th>
	<th>
		<input type="text"  size="1" id="ItemE"  name="ItemE"   />
	</th>
<!--	<th>
		<input type="text" size="1"  id="ItemF"  name="ItemF"  />
	</th>-->
	</tr>
	<tr>
	<th>
	Amt:
	</th>

	
	
	<th>
		<input type="text"  size="2" id="Aex"  name="Aex"  required /><!--ex VAT-->
	</th>
	<th>
		<input type="text"  size="2" id="Bex"  name="Bex"  />
	</th>
	<th>
		<input type="text"  size="2" id="Cex"  name="Cex"   />
	</th>
		<th>
		<input type="text"  size="2" id="Dex"  name="Dex"   />
	</th>

	
		<th>
		<input type="text"  size="2" id="Eex"  name="Eex"   />
	</th>

			<th>
		<!--<input type="text"  size="2" id="Fex"  name="Fex"   />
	</th>-->

	

	
			
</tr>
<tr>

	<th>
	Notes(leave empty)
	</th>

	<th>
		<input type="text"  size="2" id="AN"  name="AN"  required /><!--ProdnotesPN-->
	</th>

	<th>
		<input type="text"  id="BN"  name="BN"   />
	</th>
	
	<th>
		<input type="text"  size="1" id="CN"  name="CN"   />
	</th>

	<th>
		<input type="text"  size="1" id="DN"  name="DN"   />
	</th>

	<th>
		<input type="text"  size="1" id="EN"  name="EN"   />
	</th>

		<!--
	<th>
		<input type="text"  size="1" id="FN"  name="FN"   />
	</th>
-->



</tr>




<tr>

	<th>
AccNo:
	</th>

	<th>
			<select name="Acc1" value = "123" >
                 <option value="123">123</option>
               <option value="9998">9998</option>
                <option value="Other">OtherProfit</option>
			</select>
		
	</th>

	<th>

	</th>
	
	<th>

	</th>

	<th>


	</th>

	<th>

	</th>

	<!---
	<th>
	</th>-->
</tr>

		</table>
	
	





<!--<input type="submit" name="btn_submit" value="Select the proof" style="width:300px;height:30px" /> -->
<!--	<br><input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>
<br><br><br><br><br><br><br><br><br><br><br>
-->

<input type='submit' name='submit' value="Create profit AccNo 123..3114"   style="width:300px;height:30px" /> 
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<input type="submit" name='submit' value="Create profit PARK AccNo 9998"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 
<input type="submit" name='submit' value="Create other profit"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 






</form>
<a href= "editProf.php">edit Profits</a>

<?php
include ("viewProfitAll.php");

//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");




/*
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All expensesH total to: R".$yo."<br>";

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