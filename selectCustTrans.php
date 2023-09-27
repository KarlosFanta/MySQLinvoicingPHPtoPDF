<?php


	$page_title = "Add a transaction";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	
?>	
<html>
<head>
<title>Add a transaction</title>
	<script type="text/javascript">
//Javascript for Validation of user inputs
function formValidator(){
	var csv = document.getElementById('csv');
//ALMAL = A * B;
//var ALMAL = var A1;
	// Check each input in the order that it appears in the form!
			if(containsTabs(csv, "Not enough tabular data TotAmt is missing")){
							return true;

					}			//very important bracket part of isNumeric!!!!!
	return false;
}//very important end of formvalidator!!

function containsTabs(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;

	var howz = elem.value;
 //alert(howz);
	

 var tabCount = (howz.split("	").length - 1);

/* alert(tabCount);

 
  
  if (tabCount === 1)
  {
  alert("you have 1x tabs");}
 if (tabCount === 2)
 alert("you have 2x tabs");
 if (tabCount === 3)
 alert("you have 3x tabs");
if (tabCount === 4)
 alert("you have 3x tabs");

  */   
	
 if (tabCount >2 )
  {

		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}






</script>
</head>
<a href = 'selectCustTrans1.php'>Click here to add normal transactions or Proofs</a><br>
<a href = 'testBankTransactions.php'>Check if bank transactions add up in bank statement</a><br>
<?php $CustNo = $_SESSION['CustNo']; ?> 
<a href = 'linkInvoices.php?CustNo = $CustNo'>Link multiple invoices to mulitple transactions</a><br>

<form  onsubmit="return formValidator()" action="addTrcsv.php"  method="post">
<br>  
CSV paste: <input type="text" name="csv"   id='csv'   style="width:520px;height:30px" autofocus required/> paste a line directly from your online bank statement.
<br>
<br>
<input type="submit" name="btn_submit" value="Submit EFT(csv tabular) detail:  DD/MM/YYYY StatementDescription AmtPaid" style="width:500px;height:30px" /> 
</form>
<a href = "view_inv.php" target = _blank>View all invoices</a><br>
<a href="./addProf.php">Add Profits</a></li><br />

<br><a href =  "view_transLatestsortbyTrNo.php">View Transactions Sorted by TransNo<</a><br>
<br>Sorted by Date:
<?php
include "viewExpHEandExptransLatest.php";
echo "<br>";
include "view_transLatestsortbyDateAsc.php";
//include "view_transLatest.php";
//include "viewExpHEandExp.php";

//include "view_proofLatest.php";
?>

<br><a href = "view_invD.php">View All Invoices ALL CUSTOMERS by Date</a></br></br>
<a href = "view_invDunpaid.php">View All UNPAID Invoices ALL CUSTOMERS by Date</a></br></br>
<?php
//include "view_invLatest.php";
?>

</body>

</html> 