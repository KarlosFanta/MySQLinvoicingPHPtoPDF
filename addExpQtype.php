<html>
<head>
<title>Add a expense</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript">



function formValidator(){
				//alert("1Test firing of for mValidator funtion alert box!");

	// Make quick references to our fields
	var ExpNo = document.getElementById('ExpNo');
	var PurchDate = document.getElementById('lst'); //THE BIG PROBLEM WAS TOO ids FOR PURCHDATE
	//it must be in the correct sequence!!!
	var SupCode = document.getElementById('SupCode');
	var ItemA = document.getElementById('ItemA');
	var Ain = document.getElementById('Ain');
	var Aex = document.getElementById('Aex');
	var AK = document.getElementById('AK');//Category
	var AC = document.getElementById('AC');//CustNo
	// Check each input in the order that it appears in the form!
	if(notEmpty(ExpNo, "Please enter an expense number")){
	if(anyValidate(Ain, Aex, "Please enter either ex VAT or in VAT amount")){
//		if(notEmpty(Aex, "Please enter a valid numeric ex VAT")){
				//alert("1Test firing of for mValidator funtion alert box!");
			if(lengthRestriction(PurchDate, 10, 10)){
			//alert("2Test firing of for mValidator funtion alert box!");
				if(notEmpty(SupCode, "Please enter a supplier code")){
					if(notEmpty(AK, "Please enter a category")){
	if(notEmpty(AC, "Please enter a valid numeric Customer number")){
//	if(madeSelection(mydropdownINV, "")){mydropdownINV
		
			//alert("3Test firing of for mValidator funtion alert box!");
			//if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
//				if(isDate(PurchDate, "Please put in Da 	te")){
			//		if(madeSelection(TMethod, "Please Choose Payment Method")){


				return true;
						}
//					}
				}
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
function anyValidate(elem, elem2, helperMsg) {
		if((elem.value.length == 0)&&(elem2.value.length == 0)){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
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
		alert("Please enter between " +min+ " and " +max+ " characters in "+uInput+ " ");
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
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";


/*if ($CustNo == '')
{
$CustNo = 0;
$CustNo = 0;
	@session_start();
	$CustNo = $_SESSION['CustNo'];
}
|*/
$TBLrow = @$_POST['mydropdownEC'];
			  

$CustNoIn = explode(';', $TBLrow );
$CustNo = intval($CustNoIn[0]);


if ($CustNo == '')
{
	$name = '';
$name = @$_GET['CustNo'];
     //echo " ". $_GET['CustNo']. ".";
	 //$CustNo = $_GET['CustNo'];
}




$_SESSION['CustNo'] = $CustNo;

//echo "<br>CustNo:".$CustNo."<br />";
$SupCode = "";
$Cat = "";
$Notes = "";
$ItemA = @$_GET['ItemA'];
$ItemB = @$_GET['ItemB'];
$ItemC = @$_GET['ItemC'];
$ItemD = @$_GET['ItemD'];
$ItemE = @$_GET['ItemE'];
$ItemF = @$_GET['ItemF'];
$ItemG = @$_GET['ItemG'];
$ItemH = @$_GET['ItemH'];
$SupCode = @$_GET['SupCode'];
$InVAT = @$_GET['InVAT'];
$Cat = @$_GET['Cat'];

echo "Cat is $Cat<br>";
$AC = '';
$AC = @$_GET['AC'];
$BC = @$_GET['BC'];
$CC = @$_GET['CC'];
$DC = @$_GET['DC'];
$EC = @$_GET['EC'];
$FC = @$_GET['FC'];
$GC = @$_GET['GC'];
$HC = @$_GET['HC'];
$BCat = @$_GET['BCat'];
$CCat = @$_GET['CCat'];
$DCat = @$_GET['DCat'];
$ECat = @$_GET['ECat'];
$FCat = @$_GET['FCat'];
$GCat = @$_GET['GCat'];
$HCat = @$_GET['HCat'];

$SN1 = $SN2 = $SN3 = $SN4 = $SN5 = $SN6 = $SN7 = $SN8 = '';

$SN1 = @$_GET['SN1'];
$SN2 = @$_GET['SN2'];
$SN3 = @$_GET['SN3'];
$SN4 = @$_GET['SN4'];
$SN5 = @$_GET['SN5'];
$SN6 = @$_GET['SN6'];
$SN7 = @$_GET['SN7'];
$SN8 = @$_GET['SN8'];
			
$AAMMTT=@$_GET['AAMMTT'];

$addstk = @$_POST['btnSubmit'];

echo "<br>addstk:<br><BR> " .$addstk."</BR>";
//echo "TBLrow: " .$TBLrow."</BR>";

$CustFN = '';
$CustLN = '';

//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";




/*if ($CustNo == "")
{
echo "CustNo not declared";
$CustNo = $CustNo;
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


$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
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
$daNextNoE = 1; 
$queryH = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesH";
$resultH = mysqli_query($DBConnect, $queryH);// or die(mysql_error());
$query = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expenses";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
$queryE = "SELECT  MAX(ExpNo)  AS MAXNUM FROM expensesE";
$resultE = mysqli_query($DBConnect, $queryE);// or die(mysql_error());


$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNoH = 1;
$daNextNoE = 1;
while($rowH = mysqli_fetch_array($resultH)){
	echo "max ExpNo in expensesH: ". $rowH[0] . "&nbsp;";
$daNextNoH = intval($rowH[0]);
}
while($row = mysqli_fetch_array($result)){
	echo "max ExpNo in expenses: ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0]);
}
while($rowE = mysqli_fetch_array($resultE)){
	echo "max ExpNo in expensesE: ". $rowE[0] . "&nbsp;";
$daNextNoE = intval($rowE[0]);
}

$daNextNo =  max (array($daNextNo, $daNextNoH, $daNextNoE));

$daNextNo = $daNextNo+1;


echo "Add new expenses:<br>";
?>
<form name= "yoo">
		<input type='text'  style="width:26px"  name='Q1' id='Q1' size='5' value='1' onkeyup='calc()'> * R
	  <input type='text'  style="width:66px" name='ex1' id='ex1' size='10' class='exxx1' onkeyup='calc()'  >incl VAT = 
	  <span id="resp"></span><!-- in here possibly AJAX invoice total CalcServ3.php-->
</form>
<form name= "quick"  action="addExpQ.php"   method="post">
Quick: CSVpaste: <input type='text'  style="width:326px"  name='csv' id='csv' size='5' >
	  <input type='submit' value="Create expense"   style="width:200px;height:30px" /> 
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>">

</form>
<form name="AddExp" onsubmit="return formValidator()" action="addExpMulti.php"   method="post">
<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->

<!--<a href = 'addExpHtype.php?item=IceCreamCone&InVAT=4.90&Cat=&SupCode=MD'>Click here to add ICE CREAM CONE</a> <a href = 'addExpHtype.php?item=IceCreamCone&InVAT=5.90&Cat=&SupCode=EK'>Steers CONE</a> <a href = 'addExpHtype.php?item=ElectricityEskomTaxExempt&InVAT=1000&Cat=electricity&SupCode=ST'>ESKOM</a> -->
<a href = 'addExpQtype.php?item=&InVAT=&Cat=&SupCode='>business</a> 
<a href = 'addExpQtype.php?item=&InVAT=&Cat=&SupCode=&BCat=&BC=0'>businessx2</a> 
<a href = 'addExpQtype.php?item=&InVAT=&Cat=&SupCode=&BCat=&BC=0&CCat=&CC=0'>businessx3</a> 
<br>$BCat = @$_GET['BCat'];

Please put in products or expenses of 1 invoice:

<table>
<?php

echo "<tr><th>ExpNo</th>";
echo "<th>PurchDate<br>
(collected on:)";
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;SupCode&nbsp;&nbsp;</th>";
echo "<th align = 'left'>domains SupCode: ZA </th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* expense AutoNumber: (!! Different for internet expenses!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="6"  id="ExpNo"  name="ExpNo" value="<?php echo $daNextNo;?>" />
		</th>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>";



</th>
		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		?>
			<!--<label>PurchDate:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<!--<label>PurchDate:</label></dt>-->
			<!--<input type="text" size="10" id="PurchDate"  name="PurchDate" value="<?php //echo $PurchDate; ?>" /> -->
			<?php include("yesterday.php"); ?>
			<input id='lst' size="10" name="PurchDate"  required>
		</th>

		<th>

		<input id="SupCode"  name="SupCode" size="6"  value="<?php echo $SupCode; ?>" required>
			
			
		</th>
		<th></b>Parking can sometimes relate to a customer otherwise add it to Business Expense
</th>
	
	
		</tr>
		</table>
		<table>
		<tr>

		
				
		<?php
	
		echo "<th>Item Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		//echo "<th>HOVER and wait InvB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		
	?>	
	
	<th>
	Ex_VAT_in_VAT.
	</th>
	<th>
	Serial Number
	</th>
	
	<th>
	Notes, Supplier InvNo
	</th>
	<th>
	Category
	</th>
	<th>
	<?php $CCC= $CustNo.",".$CustLN.$CustFN;

	if ($addstk == 'Add Stock')
	$CCC = '300';


	?>
	CustNo <?php //echo $CCC; ?> or<br> (business301)<br>(300stock)<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
	</th>
	<th>
	optional:<br>InvNo
	</th>

</tr>
	
			<tr></tr>
		<th>
<?php 		echo $daNextNo;?>
			<input type="text"  size="53" id="ItemA" required name="ItemA" value="<?php echo $ItemA; ?>" /> <!--item Description-->
		</th>
	
	
			<th>
			
			<!--<span id='resp'></span>-->
<input type="text"  size="5" id="Aex"  name="Aex"  type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places."  STYLE="color: black; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: orange;"  size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /><!--ex VAT-->
										 															<!--ex VAT--><!-- TO DO i have to change it so it allows a pattern of negative numbers for private profits-->
			<!-- type="number" min="1" max="10" step="0.5" -->
			<!--Many solutions here only work when keys are pressed. -->
			<!--These will fail if people paste text using the menu, or if they drag and drop text into the text input.-->
			<!--I've been bitten by that before. Be careful! -->
	<!--	<input type="text"  size="5" id="Aex"  name="Aex"   /><span id="resp"></span>
			<textarea  ="5" id="Aex"  name="Aex" style='width: 120px;height: 12px;	border: 3px solid #cccccc;	font-family: Tahoma, sans-serif;'  /><span id='resp'></span></textarea>
			<!-- NO! you would need a nested form to duplicate the ajax value and u cannot nest them`-->
<input type="text"  size="5" id="Ain" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]" title="This should be a number with up to 2 decimal places." name="Ain"  /><!--in VAT-->
</th>

			<th>
			<input type="text"  size="9" id="AS"  name="AS"   style="text-transform:uppercase;"  value="<?php echo $SN1; ?>" /><!--SN-->
		</th>
			<th>
			<input type="text"  size="17" id="AN"  name="AN"   /><!--ProdnotesPN-->
		</th>
		<th>
			<input type="text" size="6" id="AK" name="AK" required pattern="[A-Za-z0-9]+"  value="<?php echo $Cat; ?>" /><!--Category-->
		</th>

		</th>
			<th>
			<input type="text"  size="5" id="AC"  name="AC" class='clCN' required value='<?php echo $AC; ?>' /><!--Select a Customer-->
		</th>

		<th>
			<input type="text"  size="6" id="InvNo1"  name="InvNo1"   />
		</th>
		</tr>
		<tr><th> </th></tr>	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr>
		

	
	
		<th>
						<?php echo ++$daNextNo;?>
			<input type="text"  size="51" id="ItemB"  name="ItemB"  value="<?php echo $ItemB; ?>"  />
		</th>
		<th>
			<input type="text"  size="5" id="Bex"  name="Bex"  STYLE="color: black; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: yellow;" />
			<input type="text"  size="5" id="Bin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Bin"  /><!--in VAT-->
		</th>
		<th>
			<input type="text"  size="9" id="BS"  name="BS"   style="text-transform:uppercase;"  value="<?php echo $SN2; ?>" //><!--Serial-->
		</th>
			<th>
			<input type="text"  id="BN"  name="BN"  size="17" /><!--Notes-->
		</th>
		<th>
			<input type="text"  size="6" id="BK"  name="BK"   value="<?php echo $BCat; ?>"  /><!--Category-->
		</th>

			<th>
			<input type="text"  size="5" id="BC"  name="BC" class='clCN'  value='<?php echo $BC; ?>'  />
		</th>
		<th>
			<input type="text"  size="6" id="InvNo2"  name="InvNo2"   />
		</th>
	<tr></tr>
		<th>
							<?php echo ++$daNextNo;?>
										  
															<input type="text" id="ItemC"    size="51" name="ItemC"  value="<?php echo $ItemC; ?>" />
		</th>
				<th>
			<input type="text"  size="5" id="Cex"  name="Cex"  STYLE="color: black; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: pink;"  />
			<input type="text"  size="5" id="Cin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Cin"  /><!--in VAT-->
		</th>
		<th>
			<input type="text"  size="9" id="CS"  name="CS"   style="text-transform:uppercase;"   value="<?php echo $SN3; ?>" //>
		</th>

		<th>
			<input type="text"  size="17" id="CN"  name="CN"   />
		</th>
		<th>
			<input type="text"  size="6" id="CK"  name="CK"   value="<?php echo $CCat; ?>"  /><!--Category-->
		</th>
		<th>
			<input type="text"  size="5" id="CC"  name="CC" class='clCN'  value='<?php echo $CC; ?>'  />
		</th>
		<th>
			<input type="text"  size="6" id="InvNo3"  name="InvNo3"   />
		</th>
		<tr></tr>
		<th>
	<?php echo ++$daNextNo;?>
													  
				<input type="text" size="51"  id="ItemD"  name="ItemD"  value="<?php echo $ItemD; ?>"  />
		</th>
					<th>
			<input type="text"  size="5" id="Dex"  name="Dex"   />
			<input type="text"  size="5" id="Din" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Din"  /><!--in VAT-->
		</th>

			<th>
			<input type="text"  size="9" id="DS"  name="DS"   style="text-transform:uppercase;"  value="<?php echo $SN4; ?>" / />
		</th>
			<th>
			<input type="text"  size="17" id="DN"  name="DN"   />
		</th>
		<th>
			<input type="text"  size="6" id="DK"  name="DK"   value="<?php echo $DCat; ?>"  /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="DC"  name="DC" class='clCN'  value='<?php echo $DC; ?>'  />
		</th>
			<th>
			<input type="text"  size="6" id="InvNo4"  name="InvNo4"   />
		</th>


	<tr></tr>
		<th>
			<?php echo ++$daNextNo;?>												 
											 
				 
			<input type="text" id="ItemE"   size="51" name="ItemE"   value="<?php echo $ItemE; ?>"  />
		</th>
				<th>
			<input type="text"  size="5" id="Eex"  name="Eex"   />
			<input type="text"  size="5" id="Ein" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Ein"  /><!--in VAT-->
		</th>
			<th>
			<input type="text"  size="9" id="ES"  name="ES"   style="text-transform:uppercase;"  value="<?php echo $SN5; ?>" / />
		</th>

				<th>
			<input type="text"  size="17" id="EN"  name="EN"   />
		</th>
		<th>
			<input type="text"  size="6" id="EK"  name="EK" value="<?php echo $ECat; ?>"  /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="EC"  name="EC" class='clCN'  value='<?php echo $EC; ?>'  />
			</th>
		<th>
			<input type="text"  size="6" id="InvNo5"  name="InvNo5"   />
		</th>


		<tr></tr>
		
		
		<th>
							<?php echo ++$daNextNo;?>
   
		 
<input type="text" size="51"  id="ItemF"  name="ItemF"   value="<?php echo $ItemF; ?>" />
		</th>
					<th>
			<input type="text"  size="5" id="Fex"  name="Fex"   />
			<input type="text"  size="5" id="Fin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Fin"  /><!--in VAT-->
		<th>
			<input type="text"  size="9" id="FS"  name="FS"   style="text-transform:uppercase;"  value="<?php echo $SN6; ?>" / />
		</th>
			<th>
			<input type="text"  size="17" id="FN"  name="FN"   />
		</th>
		<th>
			<input type="text"  size="6" id="FK"  name="FK"   value="<?php echo $FCat; ?>"  /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="FC"  name="FC" class='clCN'  value='<?php echo $FC; ?>'  />
		</th>
		<th>
			<input type="text"  size="6" id="InvNo6"  name="InvNo6"   />
		</th>


	<tr></tr>
	
		<th>
							<?php echo ++$daNextNo;?>
													 
			 
				<input type="text"  size="51" id="ItemG"  name="ItemG"  value="<?php echo $ItemG; ?>"  />
		</th>
		<th>
			<input type="text"  size="5" id="Gex"  name="Gex"   />
			<input type="text"  size="5" id="Gin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Gin"  /><!--in VAT-->
		</th>
	<th>
			<input type="text"  size="9" id="GS"  name="GS"   style="text-transform:uppercase;"  value="<?php echo $SN7; ?>" /  />
		</th>

			<th>
			<input type="text"  size="17" id="GN"  name="GN"   />
		</th>
		<th>
			<input type="text"  size="6" id="GK"  name="GK"   value="<?php echo $GCat; ?>"  /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="GC"  name="GC" class='clCN'  value='<?php echo $GC; ?>'  />
		</th>
		<th>
			<input type="text"  size="6" id="InvNo7"  name="InvNo7"   />
		</th>

	
	<tr></tr>
		<th>						<?php echo ++$daNextNo;?>

			<input type="text" size="51"  id="ItemH"  name="ItemH"  value="<?php echo $ItemH; ?>"  />
	</th>
			<th>
			<input type="text"  size="5" id="Hex"  name="Hex"   />
			<input type="text"  size="5" id="Hin" type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="[0.01]+[0]"
            title="This should be a number with up to 2 decimal places." name="Hin"  /><!--in VAT-->
		</th>
	<th>
			<input type="text"  size="9" id="HS"  name="HS"    style="text-transform:uppercase;"  value="<?php echo $SN8; ?>" / />
		</th>
			<th>
			<input type="text" size="17"  id="HN"  name="HN"   />
		</th>
		<th>
			<input type="text"  size="6" id="HK"  name="HK"   value="<?php echo $HCat; ?>"  /><!--Category-->
		</th>
			<th>
			<input type="text"  size="5" id="HC"  name="HC" class='clCN'  value='<?php echo $HC; ?>'  />
		</th>
		<th>
			<input type="text"  size="6" id="InvNo8"  name="InvNo8"   />
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
<!--<input type='submit' value="Create expense"  />   style="width:300px;height:30px"
-->

<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<input type="submit" style="width:900px;height:30px" value="Submit/Save"  />   <!--style="width:300px;height:30px" --> <!-- not required: onsubmit='return formValidator()' -->

</form>

		<select name="mydropdownEC" '>
<option value="_no_selection_">View Customers</option>";
<?php
		$query = "select CustNo,  CustFN, CustLN from customer ORDER BY custLN";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$CustNo3 = $row["CustNo"];//case sensitive!
	$CustLN3 = mb_substr($row["CustLN"], 0, 8);//case sensitive!
	$CustFN3 = mb_substr($row["CustFN"], 0, 8);//case sensitive!
	print "<option value='$CustNo3'>".mb_substr($CustLN3, 0, 8);
	print "_".$CustNo3;
	print "_". mb_substr($CustFN3, 0, 8);
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>

	&nbsp;	&nbsp;	&nbsp;	&nbsp;			<select name="yodo" '>
<option value="_no_selection_">View Categories</option>";
<?php
$queryCat = "SELECT DISTINCT Category FROM expenses";
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

		<?php
		$query = "select * from invoice where CustNo = $CustNo ORDER BY InvNo desc";
//echo $query;
?>

		<select name="mydropdownINV" >
<option value="_no_selection_">View Cust Invoices:<?php echo "CustNo $CustNo"; ?></option>";
<?php
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$InvNo = $row["InvNo"];//case sensitive!
	$Summary = mb_substr($row["Summary"], 0, 20);//case sensitive!
	$InvDate = $row["InvDate"];//case sensitive!
	$TotAmt = $row["TotAmt"];//case sensitive!
	print "<option value='$InvNo'>".mb_substr($InvNo, 0, 8);
	print "_".$Summary;
	print "_". $TotAmt;
	print "_". $InvDate;
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
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo $PIV." ";

//echo $row['InvNo']." ";
echo $row['Notes']." ";
echo "".$row['SerialNo']." ";
echo "<br>";
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

<a href= "viewExp.php" target=_blank>viewExp.php</a><br>
<a href= "viewExpHEandExp.php" target=_blank>viewExpHEandExp.php</a><br>

<?php
include "viewExpCust.php";
//include "viewExpLatestC.php";
//include "viewExpLatest.php";
//echo "<br>";
//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");




/*
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All expenses total to: R".$yo."<br>";

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