<html>
<head>
<title>Assign stock</title>
<meta charset="UTF-8">

</head>
<body>

<form onsubmit='return formValidator()'  action="assignExpLastCat.php"   method="post">


<?php	//this is "addTransCustProcess2.php"
require_once('header.php');	
require_once("inc_OnlineStoreDB.php");
@session_start();
//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";


$CustNo = '';
$Amt = '';
$Notes ='';
$mde4 = '';
$mde4 = $_POST['mde4'];
echo "<br>mde4:".$mde4."<<<<br>";
	$query = "SELECT * FROM expenses WHERE category = '$mde4'";

$mde5 = '';
$mde5 = $_POST['mde5'];
echo "<br>mde5:".$mde5."<<<<br>";
if ($mde5 != 'Select Expense by category')
	$query = "SELECT * FROM expenses WHERE category IN ( '$mde4' ,'$mde5' ) ";


$mde6 = '';
$mde6 = $_POST['mde6'];
echo "<br>mde6:".$mde6."<<<<br>";
if ($mde6 != 'Select Expense by category')
	$query = "SELECT * FROM expenses WHERE category IN ( '$mde4' ,'$mde5' , '$mde6') ";



$clExp4 = explode('_', $mde4);
echo "clExp4[0]:";
echo $clExp4[0];
echo "<br><bR>";
$cl4= $clExp4[0];

//$CustNo" 
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$CustNo = $_POST['CustNo'];

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT><br>";
$CustNo = $_POST['CustNo'];


//<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde3'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select expense by categories: $cl4 $mde5 $mde6</option>'";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
			
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print "<option value='$ExpNo'>$ExpNo";
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB;
	
/*	$query = "select * from customer where CustNo = $CustNoB";
if ($resultC = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
echo $row["CustFN"]." ";
echo $row["CustLN"]." ";

			}
		 mysqli_free_result($resultC);
		}
	
	*/
	print " </option>"; 
	}
	mysqli_free_result($result);
}
echo "</select><br>";

?>

<input type="submit" name="btn_submit" value="select stok" /> <br>
<input type="submit" name="btn_submit" value="select stok" /> 
<?php
echo "<br>".$query."<br>";

if (!mysqli_query($DBConnect, "SET a=1")) {
    printf("<br><br>query Errormessage: %s\n", mysqli_error($DBConnect));
}
else
	echo "<br><br>query does not give error";

echo "<br><br>";





	

	//$query = "SELECT * FROM expenses WHERE category IN ( '$mde4' ,'$mde5' , '$mde6') order by SerialNo";
	$query = "SELECT * FROM expenses WHERE category IN ( '$mde4' ,'$mde5' , '$mde6') order by PurchDate";





echo "Select by serial number:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mdeSerial'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select expense by serial number</option>'";
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
			
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print "<option value='$ExpNo'>$ExpNo";
	print "_".$SerialNo;
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB;
	
/*	$query = "select * from customer where CustNo = $CustNoB";
if ($resultC = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
echo $row["CustFN"]." ";
echo $row["CustLN"]." ";

			}
		 mysqli_free_result($resultC);
		}
	
	*/
	print " </option>"; 
	}
	mysqli_free_result($result);
}
echo "</select><br>";

?>

<input type="submit" name="btn_submit" value="select stok" /> <br>
<input type="submit" name="btn_submit" value="select stok" /> 
CustNo: <input type="text" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>">
<!--<input type="hidden" id="CustFN"  name="CustFN" value="<?php echo $item2;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">-->

<?php
echo "<br>".$query."<br>";

if (!mysqli_query($DBConnect, "SET a=1")) {
    printf("<br><br>query $query <br> Error message: %s\n", mysqli_error($DBConnect));
}
else
	echo "<br><br>query does not give error";

echo "<br><br>";















$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
//echo $SQLString."<br>";

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
print " <b><Font size = 4>".$item3;
print "</font></b> ".$item4;
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

$CustInt = $_SESSION['CustNo'];
$Prof = @$_POST['Prof'];

if (isset($_POST["mydropdownEC"]))
{
$TBLrow = $_POST['mydropdownEC'];
$Custno = explode(';', $TBLrow );
$CustInt = intval($Custno[0]);
echo 'isset';
}
else
{
$CustInt = $_SESSION['CustNo'];
echo 'issetgg'.$CustInt;
}

if ($CustInt == '0')
$CustInt = @$_POST['CustNo'];
if ($CustInt == '')
{
	$name = '';
$name = $_GET['CustNo'];
     echo " ". $_GET['CustNo']. ".";
	 $CustInt = $_GET['CustNo'];
}


include ("viewExpCust2.php");


echo "Expenses by selected categories: $cl4 $mde5 $mde6'";
echo "<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
	
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print $ExpNo;
	print "_".$Category;
	print "_".$ExpDesc;
	print "_S/N: ".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB."<br>";
	
	}
	mysqli_free_result($result);
}
echo "<br>";












echo "<a href= 'viewExp.php' target=_blank>viewExp.php</a><br>";


/*
echo " Expense not here? <a href = 'addExp.php?CustNo=".$CustInt."'>Click here to add Expense for customer.</a><br>";

$_SESSION['CustNo'] = $CustInt; //ok important reverse

echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";

echo "<br>CustNo:".$CustInt."</br />";
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
print "$item1";
print " ".$item2;
print " <b><Font size = 4>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";
}
$result->free();
};
?>

<?php

// If submitted, check the value of "select". If its not blank value, get the value and put it into $select.
/*if(isset($select)&&$select!="")
{
$select = $_GET['select'];
}
?>

<table border='0'>
<?php
echo "Select stock to be assigned to selected customer:<br>";

?>
<!--<input type='text' name='clExp' id='clExp' size  = '130' value= 'Click here to Select a Product'>-->

<?php
$query = "SELECT * FROM expenses order by category";
$query = "SELECT * FROM expenses where category = 'antivirus' and (CustNo = 300 or  CustNo = 0)";
echo $query."<br>";

?>
<!--<form name="Editcust" action="Process.php" method="post">-->
Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="mde1" ><!--onchange='this.form.submit()'-->
<option value="_no_selection_">Select Expense</option>
<?php
//echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
			
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print "<option value='$ExpNo'>$ExpNo";
	print "_".$CustNoB;
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB;
	
	$query = "select * from customer where CustNo = $CustNoB";
if ($resultC = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
echo $row["CustFN"]." ";
echo $row["CustLN"]." ";

			}
		 mysqli_free_result($resultC);
		}
	
	
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>
<input type="submit" name="btn_submit" value="select stk" /> <br>
<input type="submit" name="btn_submit" value="select stk" /> 



<br><br>
<?php
$query = "SELECT * FROM expenses WHERE CustNo = '$CustInt'";
echo $query."<br>";
//<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde3'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select Expense by ExpNo</option>'";
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
			
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print "<option value='$ExpNo'>$ExpNo";
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB;
	
	$query = "select * from customer where CustNo = $CustNoB";
if ($resultC = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
echo $row["CustFN"]." ";
echo $row["CustLN"]." ";

			}
		 mysqli_free_result($resultC);
		}
	
	
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>
<input type="submit" name="btn_submit" value="select stok" /> <br>
<input type="submit" name="btn_submit" value="select stok" /> 
<br><br><br><br><br>
<!--<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Products assigned to customer'>-->
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";

<?php
$query = "SELECT * FROM expenses order by ExpNo desc";
echo $query."<br>";
//<!--<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde3'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select Expense by ExpNo</option>'";
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
			
			
	$ExpNo = $row["ExpNo"];
	$Category =  $row["Category"];
	$ExpDesc = $row["ExpDesc"];
	$SerialNo = $row["SerialNo"];
	$SupCode = $row["SupCode"];
	$PurchDate = $row["PurchDate"];
	$ProdCostExVAT = $row["ProdCostExVAT"];
	$Notes = $row["Notes"];
	$CustNoB = $row["CustNo"];
	print "<option value='$ExpNo'>$ExpNo";
	print "_".$Category;
	print "_".$ExpDesc;
	print "_".$SerialNo;
	print "_".$SupCode;
	print "_".$PurchDate;
	print "_R".$ProdCostExVAT;
	print "ex VAT_".$Notes;
	print "assigned to _".$CustNoB;
	
	$query = "select * from customer where CustNo = $CustNoB";
if ($resultC = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
echo $row["CustFN"]." ";
echo $row["CustLN"]." ";

			}
		 mysqli_free_result($resultC);
		}
	
	
	print " </option>"; 
	}
	mysqli_free_result($result);
}
?>
</select>

	



<br><br>
<?php
$query = "SELECT distinct Category FROM expenses  order by Category";
echo $query."<br>";

?>
</form><form name="Editcust" action="ProcessCat.php" method="post">
Stock>>>><<<<<<<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<!--onchange='this.form.submit()-->
<select name="opt4" >
<option value="_nott_selection_">Select Expense by category</option>
<?php
if ($result = mysqli_query($DBConnect, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Category =  $row["Category"];//$ExpNo = $row["ExpNo"]; 	 	$ExpDesc = $row["ExpDesc"];
	//$SerialNo = $row["SerialNo"]; 	$SupCode = $row["SupCode"]; 	$PurchDate = $row["PurchDate"];
	//$ProdCostExVAT = $row["ProdCostExVAT"]; 	$Notes = $row["Notes"]; 	$CustNoB = $row["CustNo"];
	print "<option value='$Category'>$Category";	
	//print "_".$Category;	print "_".$ExpDesc;
	//print "_".$SerialNo;	print "_".$SupCode;	print "_".$PurchDate;
	//print "_R".$ProdCostExVAT;	print "ex VAT_".$Notes;	print "assigned to _".$CustNoB;
	print " </option>"; 
	}
	mysqli_free_result($result);
}

?>
</select>
<input type="submit" name="btn_submit" value="select stk" /> <br>
<input type="submit" name="btn_submit" value="select stk" /> 
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";
</form><br><br><br><br><br>
<!--<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Products assigned to customer'>-->

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";


"SELECT * FROM expenses WHERE CustNo = '$CustInt'"

	




<?php
 
include ("viewExpCust2.php");
include ("viewExp.php");
 include ("view_proof_by_cust.php");
include ("view_proof_by_cust2.php");
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");





echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

//include ("view_event_by_cust.php");



?> 
</table>
<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		$NewFormat = date("d/m/Y");
		

//include ("viewExp.php");		
include ("view_proof_all.php");		
		
		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".auto").autocomplete({
        source: "search.php",
        minLength: 0
		
				}).mouseover(function() {
				$(this).autocomplete("search");
	});                
 

     $(".clInvNo").autocomplete({
        source: "searchinvAdd.php",
        minLength: 0
		
				}).mouseover(function() {
				$(this).autocomplete("search");
	});                

//expenses or products
    $(".clExp").autocomplete({
        source: "searchExpb.php",
        minLength: 0
		
				}).focus(function() {
				$(this).autocomplete("search");
	});     
	
	//var delay = $( ".clExpC" ).autocomplete( "option", "delay" );

    $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0
		
				}).mouseover(function() {
				$(this).autocomplete("search");
	//});                
		//		}).mouseout(function() {
		//		$(this).autocomplete("reset");
	//});                
//$(".clExpC").autocomplete({
    //    source: "searchExpC.php",
   //     minLength: 0
	});                
/*
       $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0

   
		}).mouseleave(function() {
			$(this).autocomplete("close", "delay", 5000);
	});                

	*/
	
	
	
	
	
				//Solution: http://jsfiddle.net/ricardolohmann/SdLaP/
//http://stackoverflow.com/questions/4604216/jquery-ui-autocomplete-minlength0-issue
	
/*	$("input#autocomplete").focus(function(e) {
    if(!e.isTrigger) {
        $(this).autocomplete("search", "");
    }
    return false;
*/
	
 
// });
//</script>
?>
</form>
</body>
</html>