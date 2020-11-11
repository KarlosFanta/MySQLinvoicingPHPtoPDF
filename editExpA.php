<html>
<head>
<title>Assign stock</title>
<meta charset="UTF-8">

</head>
<body>



<?php	//this is "addTransCustProcess2.php"
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

include ("viewExpHEandExpLinked.php");
exit();
?>
<form name="Editcust" action="editExp.php"   method="GET">
<!--<table border='0'>-->
<?php
echo "Select expense to be edited:<br>";

?>
<!--<input type='text' name='clExp' id='clExp' size  = '130' value= 'Click here to Select a Product'>-->

<?php
$query = "SELECT * FROM expenses order by category";
$query = "SELECT * FROM expenses where category = 'antivirus' and (CustNo = 300 or  CustNo = 0)";
//echo $query."<br>";

?>
<!--<form name="Editcust" action="Process.php" method="post">-->
Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
echo "<select name='mde1' >";
echo "<option value='_no_selection_'>Select Expense</option>";
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
$query = "SELECT * FROM expenses ";
echo $query."<br>";
//<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde2'><!-- onchange='this.form.submit()'-->
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
<br><br>
Assign to a different customer: <a href = 'selectCustAssignStk.php'>selectCustAssignStk.php</a>
<br><br><br>
<!--<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Products assigned to customer'>-->

<?php
$query = "SELECT * FROM expenses order by ExpNo desc";
echo $query."<br>";
//<!--<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde3'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select Expense by ExpNo desc</option>'";
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

	mde4:<input type="text" name="mde4" value="_nott_selection_" />


<?php
$query = "SELECT * FROM expenses order by SerialNo";
echo $query."<br>";
//<!--<form name="Editcust" action="Process.php" method="post">-->
echo "Stock included as from march 2014<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name='mde3'><!-- onchange='this.form.submit()'-->
<option value='_nooooo_selection_'>Select Expense by SerialNo</option>'";
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
	if($SerialNo=='') echo 'noS/N';
	print "_".$Category;
	print "_".$ExpDesc;
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


<br>
Stock according to (multiple) category(catgories)
<br>
<?php

$query = "SELECT distinct Category FROM expenses  order by Category";
//echo $query."<br>";

?>
</form><form name="Editcust" action="ProcessCat.php" method="post">
Stock>>>><<<<<<<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<!--onchange='this.form.submit()-->
<select name="mde4" >
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

<select name="mde5" >
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

<select name="mde6" >
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
</select> <input type="submit" name="btn_submit" value="select stk" /> <br>
<input type="submit" name="btn_submit" value="select stk" />


</form><br><br>
<a href = "serial.php" target = _blank>View Serial Numbers only</a>
<br><br><br>
<!--<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Products assigned to customer'>-->








<?php


//include ("viewExp.php");
// include ("view_proof_by_cust.php");
//include ("view_proof_by_cust2.php");
//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");

//include ("view_event_by_cust.php");

?>
<!--</table>-->
<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");

//include ("viewExp.php");
//include ("view_proof_all.php");

		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->

<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
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


 });
</script>

</form>
</body>
</html>
