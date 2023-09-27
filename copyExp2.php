<html>
<head>
<title>Add a MULTI transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="jquery-ui.css">
<!--//from //code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css-->
	<script type="text/javascript" src="jquery.min.js"></script>
	<!--//from http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js-->
	
	<script type="text/javascript" src="jquery.numeric.js"></script>
	
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script  type="text/javascript">
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
			if(notEmpty(AmtPaid, "Please enter a valid FLOAT amount Paid isFloat")){
				if(notEmpty(Notes, "Please create a Note or put in a dot if not sure")){
					if(isDate(TransDate, "Please put in Da 	te")){
					if(madeSelection(TMethod, "Please Choose Payment Method")){
				return true;
				}
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

<?php	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$TransDate = '';
$TransDate = $_POST['TransDate'];
//echo ''.$TransDate;

  $aDoor = $_POST['formDoor']; //array posted
//echo "aDoor0:".$aDoor[0];

  if(empty($aDoor))
  {
    echo("You didn't select any invoices.");
  }
  else
  {
    $N = count($aDoor);
 
    echo("You selected $N invoices (/doors): ");
   /* for($i=0; $i < $N; $i++)
    {
      echo "contents of array: ";
	  echo($aDoor[$i] . " ");
    }
	*/
	
  }
  

$aDoor = array_reverse($aDoor); //invert array



    //  echo($aDoor[0]);
      //echo($aDoor[1] . " ");

//echo $N;


$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

  if($CustInt == '')
	  $CustInt = $_POST['CustNo'];


//echo "<br>Custint:".$CustInt."<br />";




/*
	@session_start();

$_SESSION['CustNo'] = $CustInt;



	if(isset($_SESSION['CustNo']))
echo "";
else
echo "<a href = 'selectCust.php' >no  PLEASE SELECT A CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


	
	if(($_SESSION['CustNo'])== '0')
echo "<a href = 'selectCust.php' >no  PLEASE SELECT dA CUSTOMER!!  <a href = 'selectCust.php' >Click here</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
//<?php include "calculator/indexKL.php"; ? >
	include "monthtables.php";
//include "calculator/indexKL.php";
//include "calculator/indexB.php";

//echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";




?>
<!--<form name="addTransCustProcess2"  action="addTransprocess_last2.php" onsubmit='return formValidator()'   method="post">-->

<!--before we can add a transaction, we check what transactions the customer has done:
<br><br>-->
<?php

//$TBLrow = $_POST['mydropdownEC'];
$AmtPaid = "";
//$AmtPaid = @$_POST['AmtPaid'];

$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$CommonSDR =  $row["CommonSDR"];
$Important = $row["Important"];
$PayNotes = $row["PayNotes"];
$ABBR =  $row["ABBR"];
print "$item1";
print " ".$item2;
print " <b><Font size = 3>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";
}
$result->free();
};
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $item1;?>">
<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">
<br>
<?php



include "view_inv_by_custADV3.php";


echo $N. " Selected: ";
$indesc = '0';
//include "calculator/indexKL.php"; // works here


$aD0R ="";
 $aD0 = "";
//echo "aDoor:".$aDoor;
//echo " aDoor0:".$aDoor[0]; check POST above

$aD0 = explode(',', $aDoor[0] );
$invR = $aD0[0];
$invR = preg_replace('/\s+/', '', $invR);
$aD0R = $aD0[1];
$aD0R = preg_replace('/\s+/', '', $aD0R);
$aD0R = str_replace('R', '', $aD0R);
$InvSM = $aD0[2];
$InvSM = preg_replace('/\s+/', '', $InvSM);

//echo "aD0R:>>".$aD0R. "<<<br>";
//$aD0R = substr($aD0R, 2);
//echo "aD0R:>>".$aD0R. "<<<br>";
$SUMSEL=$aD0R;

echo "R".$aD0R."";



if (array_key_exists('1', $aDoor)) {
    //echo "The '1' element is in the array";


$aD1R ="";
 $aD1 = "";
$aD1 = explode(',', $aDoor[1] );
$inv1R = $aD1[0];
$inv1R = preg_replace('/\s+/', '', $inv1R);
$aD1R = $aD1[1];
//echo "aD1R:>>".$aD1R. "<<<br>";
$aD1R = substr($aD1R, 2);
//echo "aD1R:>>".$aD1R. "<<<br>";
$Inv1SM = $aD1[2];
$Inv1SM = preg_replace('/\s+/', '', $Inv1SM);

$SUMSEL= $aD0R+$aD1R;
echo " + R".$aD1R."";
}

if (array_key_exists('2', $aDoor)) {
  //  echo "The '2' element is in the array";

$aD2R ="";
 $aD2 = "";
$aD2 = explode(',', $aDoor[2] );
$inv2R = '';
$inv2R = $aD2[0];
$inv2R = preg_replace('/\s+/', '', $inv2R);
$aD2R = $aD2[1];
//echo "aD2R:>>".$aD2R. "<<<br>";
$aD2R = substr($aD2R, 2);
//echo "aD2R:>>".$aD2R. "<<<br>";
$Inv2SM = '';
$Inv2SM = $aD2[2];
$Inv2SM = preg_replace('/\s+/', '', $Inv2SM);

$SUMSEL= $SUMSEL+$aD2R;
echo " + R".$aD2R."";
}

if (array_key_exists('3', $aDoor)) {
$aD3R ="";
 $aD3 = "";
$aD3 = explode(',', $aDoor[3] );
$inv3R = $aD3[0];
$inv3R = preg_replace('/\s+/', '', $inv3R);
$aD3R = $aD3[1];
//echo "aD3R:>>".$aD3R. "<<<br>";
$aD3R = substr($aD3R, 2);
//echo "aD3R:>>".$aD3R. "<<<br>";
$Inv3SM = $aD3[2];
$Inv3SM = preg_replace('/\s+/', '', $Inv3SM);

$SUMSEL= $SUMSEL+$aD3R;
echo " + R".$aD3R."";
}

if (array_key_exists('4', $aDoor)) {
$aD4R ="";
 $aD4 = "";
$aD4 = explode(',', $aDoor[4] );
$inv4R = $aD4[0];
$inv4R = preg_replace('/\s+/', '', $inv4R);
$aD4R = $aD4[1];
//echo "aD4R:>>".$aD4R. "<<<br>";
$aD4R = substr($aD4R, 2);
//echo "aD4R:>>".$aD4R. "<<<br>";
$InvSM4 = $aD4[2];
$InvSM4 = preg_replace('/\s+/', '', $Inv4SM);

$SUMSEL= $SUMSEL+$aD4R;
echo " + R".$aD4R."";

}

if (array_key_exists('5', $aDoor)) {
$aD5R ="";
 $aD5 = "";
$aD5 = explode(',', $aDoor[5] );
$aD5R = $aD5[1];
//echo "aD5R:>>".$aD5R. "<<<br>";
$aD5R = substr($aD5R, 2);
//echo "aD5R:>>".$aD5R. "<<<br>";

$SUMSEL= $SUMSEL+$aD5R;
echo " + R".$aD5R."";

}

if (array_key_exists('6', $aDoor)) {
$aD6R ="";
 $aD6 = "";
$aD6 = explode(',', $aDoor[6] );
$aD6R = $aD6[1];
//echo "aD6R:>>".$aD6R. "<<<br>";
$aD6R = substr($aD6R, 2);
//echo "aD6R:>>".$aD6R. "<<<br>";
$SUMSEL= $SUMSEL+$aD6R;
echo " + R".$aD6R."";

}
if (array_key_exists('7', $aDoor)) {
$aD7R ="";
 $aD7 = "";
$aD7 = explode(',', $aDoor[7] );
$aD7R = $aD7[1];
//echo "aD7R:>>".$aD7R. "<<<br>";
$aD7R = substr($aD7R, 2);
//echo "aD7R:>>".$aD7R. "<<<br>";
$SUMSEL= $SUMSEL+$aD7R;
echo " + R".$aD7R."";

}

if (array_key_exists('8', $aDoor)) {

echo "<br><font size = 5 color = red>  ERROR!  CANNOT HANDLE MORE THAN 8 TRANSACTIONS! <br>
Please create another transaction.</font>";

}














echo " = ".$SUMSEL."<br>";

//echo "SUMSEL:>>".$SUMSEL. "<<<br>";


	
//	include "calculator/indexKL.php"; //not working here
	
	
	
	
	
	
	
	
	
	
	
	
	
	
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(TransNo)  AS MAXNUM FROM transaction";


$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no TransNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;


}














include "calculator/indexKL.php"; // works here


$queryCP = "select * from aproof where CustNo = $CustInt Limit 7";
echo $queryCP;
if ($resultCP1 = mysqli_query($DBConnect, $queryCP)) {

    // determine number of rows result set 
    $row_cnt = mysqli_num_rows($resultCP1);
	

    printf("proof has %d rows.\n", $row_cnt);

    
    mysqli_free_result($resultCP1);
}


?>


<br> <?php

if ($row_cnt > 0)
{

	echo "<form   method='post'   action='addTransProof.php'  >";
echo "<br><b>Proof No.";
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
$TransNo1 = $row2["TransNo"];
//$SM = $row2["Summary"];
$queryII = "select * from invoice where InvNo = $item2b";

echo "<input type='hidden' name='ProofNo' value= '$ProofNo'>";
echo "<option value='";
echo $ProofNo;
echo "'>";
echo $ProofNo;


//to determine whether the proof has been paid we got to look at the aproof table
//which has a TransNo column.
//in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' 

//NOPE:
//to determine whether the invoice(s) have been paid we got to look at the transaction table
//$TRRSQL = "select * from transaction where CustNo = $CustInt and InvNoA = $item2b or  InvNoA = $item2b";

print "_TR:".$TransNo1;
if ($TransNo1 == '')
echo "not paid yet";
else 
echo "ALREADY ASSIGNED TO TR:".$TransNo1;

print "_R".$Amt;
print "_InvNoA:".$item2b;

if ($row2["InvNoB"] > 0)
print "_InvNoB:".$item3b;

if ($row2["InvNoC"] > 0)
print "_InvNoC:".$row2["InvNoC"];

if ($row2["InvNoD"] > 0)
print "_InvNoD:".$row2["InvNoD"];

if ($row2["InvNoE"] > 0)
print "_InvNoE:".$row2["InvNoE"];

if ($row2["InvNoF"] > 0)
print "_InvNoF:".$row2["InvNoF"];

if ($row2["InvNoG"] > 0)
print "_InvNoG:".$row2["InvNoG"];


print "_PrfDate:".$item4b;
print "_CustNo:".$row2["TransNo"];

if ($resultII = mysqli_query($DBConnect, $queryII)) {
  while ($rowII = mysqli_fetch_assoc($resultII)) {

  $SS = $rowII["Summary"];
  echo "___".$SS;
  }
 }

print " </option>"; 


	}
$resultCP->free();
}

echo "</select>";
echo "<input type='submit' value='Select Proof'   style='width:300px;height:30px' /> ";

echo " <br>(in addTransprocessLast2 it will say update aproof set TransNo = '1015' where ProofNo = 'ProofNo34' )<br><a href = 'http://localhost/phpmyadmin/sql.php?db=kc&goto=db_structure.php&table=aproof&pos=0' target= '_blank'>phpMyadmin</a> &nbsp; &nbsp; &nbsp;
<a href = 'http://localhost/ACS/view_inv_by_custADV.php' target= '_blank'>view_inv_by_custADV.php</a><br>


";

}
else "no new proof of payments received";



echo "</form>";





//include "calculator/indexKL.php"; // may not be placed inside another form calculation screwd up
?>

<form  action="addTMchkSEP.php"   method="post">
<input type="text" id="Nr"  name="Nr" value="<?php echo $N;?>">

<!--<form onsubmit='return formValidator()'  action="addTransprocessLast2.php"   method="post">-->


<?php 
//include "calculator/indexKL.php"; ?>
<br>
<!--here we can select multiple invoices for the transaction using jQuery:
<br>First select related invoices:<br>-->
</p></n>
Payment Notes: <input type="text" id="PayNotes" size = '90' name="PayNotes" value="<?php echo $PayNotes;?>" >
<a href = 'paynotes.php?CustNo=<?php echo $CustInt; ?>'>Edit PayNotes only</a>
<br>
<?php
//Transactions found for this invoice:

include "view_trans_by_custBASIC.php";









		$yyy = $aDoor[0];
		//echo "aDoor0:".$aDoor[0];
		//echo "yyy:".$yyy;
		$pieces = "";
		$pieces = explode(", ", $yyy);
		//echo "yyy:".$yyy;
		//echo "pieces3:>>".$pieces[3]."<<";
		
//````````echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2














?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>">


<table>
<tr><th>TransNo</th>
<th><input type="text" size="2"  id="TransNo1"  name="TransNo" value="<?php echo "".$daNextNo;?>" />
</th>
<th><input type="text" size="2"  id="TransNo2"  name="TransNo2" value="<?php echo "".++$daNextNo;?>" />
</th>



<?php 
$TransNo3 = ++$daNextNo;
$TransNo4 = ++$daNextNo;
if ($N == 3)
	echo "
<th><input type='text' size='2'  id='TransNo3'  name='TransNo3' value= '$TransNo3' />
</th>";
if ($N == 4)
	echo "
<th><input type='text' size='2'  id='TransNo4'  name='TransNo4' value= '$TransNo4'  />
</th>";
?>
</tr>
<tr>
<th>&nbsp;&nbsp;&nbsp;&nbsp;	<input type='checkbox' name='updSDR' value='checked'>update SDR<br>CustSDR+Common&nbsp;&nbsp;</th>

<th>
<input type="text"  size="23" id="InvNoA"  name="InvNoA" style="font-size: 16px;font-weight: bold;" value = "<?php echo $aDoor[0]; ?>"  /><br>
<input type="text" size="43" id="CustSDR1" STYLE="color: #FFFFFF; background-color: #72A4D2;" name="CustSDR1"  value="<?php echo $CommonSDR.' Inv'.$invR.' '.$InvSM;//echo $pieces[4]; ?>" />
</th>

<!--
$aD0 = explode(',', $aDoor[0] );
$aD0R = $aD0[1];
$aD0R = preg_replace('/\s+/', '', $aD0R);
$aD0R = str_replace('R', '', $aD0R);
$invR = $aD0[0];
$invR = preg_replace('/\s+/', '', $invR);


$InvSM = $aD0[2];
$InvSM = preg_replace('/\s+/', '', $InvSM);
-->



<th>
<input type="text"  size="23" id="InvNoA2"  name="InvNoA2" style="font-size: 16px;font-weight: bold;"  value = "<?php echo @$aDoor[1]; ?>" class='clInvNoA'/><br>
<input type="text" size="43" id="CustSDR2" STYLE="color: #FFFFFF; background-color: #72A4D2;" name="CustSDR2" value="<?php echo $CommonSDR.' Inv'.$inv1R.' '.$Inv1SM;//echo $pieces[4]; ?>" />
</th>

<th>
<input type="text"  size="23" id="InvNoA3"  name="InvNoA3" style="font-size: 16px;font-weight: bold;"  value = "<?php echo @$aDoor[2]; ?>" class='clInvNoA'/><br>
<input type="text" size="43" id="CustSDR3" STYLE="color: #FFFFFF; background-color: #72A4D2;" name="CustSDR3" value="<?php echo $CommonSDR.' Inv'.@$inv2R.' '.@$Inv2SM;//echo $pieces[4]; ?>" />
</th>

<th>
<input type="text"  size="23" id="InvNoA4"  name="InvNoA4" style="font-size: 16px;font-weight: bold;"  value = "<?php echo @$aDoor[3]; ?>" class='clInvNoA'/><br>
<input type="text" size="43" id="CustSDR4" STYLE="color: #FFFFFF; background-color: #72A4D2;" name="CustSDR4" value="<?php echo $CommonSDR.' Inv'.@$inv3R.' '.@$Inv3SM;//echo $pieces[4]; ?>" />
</th>


</tr>
<tr>
<th>AmtPaid</th>
<th>
aD0R<input class="decimal-2-places" type="text" size="5" id="AmtPaid1"  name="AmtPaid1" value="<?php echo $aD0R; ?>"  />
<!--<input class="decimal-2-places" type="text" /> http://www.texotela.co.uk/code/jquery/numeric/ -->
</th>
<th>
aD1R<input class="decimal-2-places" type="text" size="5" id="AmtPaid2"  name="AmtPaid2" value="<?php echo $aD1R; ?>"  />
</th>
<th>
aD2R<input class="decimal-2-places" type="text" size="5" id="AmtPaid3"  name="AmtPaid3" value="<?php echo @$aD2R; ?>"  />
</th>
<th>
aD3R<input class="decimal-2-places" type="text" size="5" id="AmtPaid4"  name="AmtPaid4" value="<?php echo @$aD3R; ?>"  />
</th>
</tr>
<tr><th>TransDate<br>Hover and wait</th>
</th>
<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
$NewFormat = date("d/m/Y");
include("yesterday.php"); ?>
<input id='lst' size="10" name="TransDate1" value = "<?php echo $TransDate; ?>" required >
</th>
<th><?php 
include("yesterday2.php"); ?>
<input  id="lst2" size="10" name="TransDate2" value = "<?php echo $TransDate; ?>" required >
</th>
<th><?php 
include("yesterday2.php"); ?>
<input  id="lst2" size="10" name="TransDate3" value = "<?php echo $TransDate; ?>" required >
</th>
<th><?php 
include("yesterday2.php"); ?>
<input  id="lst2" size="10" name="TransDate4" value = "<?php echo $TransDate; ?>" required >
</th>
</tr>

<tr>
<th>Payment Method</th>

<th>
<?php 
$EEE = ''; 
$EEE = $pieces[3];
if ($pieces[3]=='EFTEmailProof')
{
$EEE = 'EFT'; 
//echo " EEE:".$EEE;
}
//echo " EEE:".$EEE;
if ($EEE == '')
	$EEE = 'EFT';
?>
<select name="TMethod"  id="TMethod"  >
<option value="<?php echo $EEE; ?>"><?php echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose --> <!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->
<option value="EFT">EFT</option>
<option value="Cash">Cash</option>
<option value="Cash Bank Deposit">Cash Bank Desposit</option>
<option value="Stop-order">Stop-order</option>
<option value="Debit">Debit</option>
<option value="Cheque">Cheque</option>	
<option value="Mixed">Mixed</option>	
<option value="-">-</option>	
</select>
</th>










<th>
<select name="TMethod2"  id="TMethod2"  >
<option value="<?php echo $EEE; ?>"><?php echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose --> <!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->
<option value="EFT">EFT</option>
<option value="Cash">Cash</option>
<option value="Cash Bank Deposit">Cash Bank Desposit</option>
<option value="Stop-order">Stop-order</option>
<option value="Debit">Debit</option>
<option value="Cheque">Cheque</option>	
<option value="Mixed">Mixed</option>	
<option value="-">-</option>	
</select>
</th>

<th>
<select name="TMethod3"  id="TMethod3"  >
<option value="<?php echo $EEE; ?>"><?php echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose --> <!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->
<option value="EFT">EFT</option>
<option value="Cash">Cash</option>
<option value="Cash Bank Deposit">Cash Bank Desposit</option>
<option value="Stop-order">Stop-order</option>
<option value="Debit">Debit</option>
<option value="Cheque">Cheque</option>	
<option value="Mixed">Mixed</option>	
<option value="-">-</option>	
</select>
</th>

<th>
<select name="TMethod4"  id="TMethod4"  >
<option value="<?php echo $EEE; ?>"><?php echo $EEE; ?></option><!-- the javascript function requires phrase Please Choose --> <!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->
<option value="EFT">EFT</option>
<option value="Cash">Cash</option>
<option value="Cash Bank Deposit">Cash Bank Desposit</option>
<option value="Stop-order">Stop-order</option>
<option value="Debit">Debit</option>
<option value="Cheque">Cheque</option>	
<option value="Mixed">Mixed</option>	
<option value="-">-</option>	
</select>
</th>








</tr>


<!-- drop down requires a name and not an id: The reason it's not sending through is becasue i did not select anyhting here, i only chose the existing proof from the other dropdown which autosubmitted-->

</table>
		
		
		<?php
		echo "Invoices details incl VAT &nbsp;&nbsp;eg &nbsp;&nbsp;$ABBR inv$invR $InvSM<br>";
		echo "IS THERE UNDER OR OVERPAYMENT THEN ADD NOTE INTO PAYMENT NOTES<br>";

		//include 'invJQuery2.php' ?>
			
	
	<!--		<input type="text"  size="35" id="InvNoA"  name="InvNoA"  value = "<?php //echo @$aDoor[0]; ?>"  class='clInvNoA' /><br>
			<input type="text"  size="35" id="InvNoA2"  name="InvNoA2"  value = "<?php //echo @$aDoor[1]; ?>"  class='clInvNoA' /><br>
			<input type="text"  size="35" id="InvNoA3"  name="InvNoA3"  value = "<?php //echo @$aDoor[2]; ?>"  class='clInvNoA' /><br>
			<input type="text" size="35" id="InvNoA4"  name="InvNoA4"  value = "<?php //echo @$aDoor[3]; ?>"  class='clInvNoA' /><br>
-->
			<input type="text" size="35" id="InvNoA5"  name="InvNoA5"  value = "<?php echo @$aDoor[4]; ?>"  class='clInvNoA' /><br>
			<input type="text" size="35" id="InvNoA6"  name="InvNoA6"  value = "<?php echo @$aDoor[5]; ?>"  class='clInvNoA' /><br>
			<input type="text" size="35" id="InvNoA7"  name="InvNoA7"  value = "<?php echo @$aDoor[6]; ?>"  class='clInvNoA' /><br>
			<input type="text" size="35" id="InvNoA8"  name="InvNoA8"  value = "<?php echo @$aDoor[7]; ?>"  class='clInvNoA' /><br>
			


<input type='submit' value="Create transaction"   onsubmit='return formValidator()'  style="width:200px;height:30px" /> 




<select name="AP"  id="AP"  >
 <!-- the javascript function requires phrase Please Choose -->
		<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="DoNotAddAProof">DoNotAddAProof</option>
                <option value="AddAProofSAMEDATE">AddAProofSAMEDATE</option>
                <option value="AddAProof">AddAProof</option>
</select>


<br>
<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:200px;height:30px" /> <br>
</form>

<br><p></p>

<form   method='post' action = "addProofSEP.php">

<input type='submit' value='(or first add a Proof)' style="height:50px; width:200px">
CustNo: <input type="text" id="CustNo" size='5' name="CustNo" style="height:20px; width:40px" value="<?php echo $CustInt;?>">

</form>

<?php
include "view_Underpaid_inv_by_cust2bb.php";
include "view_proof_by_cust3.php";
include "viewExpCust2.php";
$indesc = 9;
$ShowDraft = "N";
include "view_Unpaid_inv_by_cust2.php";
//echo "<br><br>";
$indesc = 9;
$ShowDraft = "Y";

include ("view_trans_by_cust.php");
include "view_transLatest.php";
//include ("view_inv_by_cust.php");

include "view_trans_by_custUNDERorOVERPAID.php";




echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

//include ("view_event_by_cust.php");
*/
?> 
<a href = "view_event_by_cust.php" target = _blank>view_event_by_cust.php</a>

</body>
</html>