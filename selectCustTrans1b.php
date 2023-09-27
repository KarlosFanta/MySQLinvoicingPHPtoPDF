<?php


	$page_title = "Add a transaction";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	
?>	
<html>
<head>
<title>Add a transaction</title>
<script type="text/javascript">

</script>
</head>

<?php
	$CNN = '';
$CNN = @$_GET['CustNo'];

if(isset($_GET["CustNo"])) echo "CustNo $CNN is set\n";

$TransDate = '';
$TransDate = @$_GET['DA'];
//echo $TransDate;
$SDR = '';
$SDR = @$_GET['SDR'];
//echo $SDR;
$AmtPd = '';
$AmtPd = @$_GET['AmtPaid'];
//echo $AmtPd;

@session_start();


if ($CNN == '')
$CNN = @$_SESSION['CustNo'];
else
@$_SESSION['CustNo'] = $CNN;
	

$queryS = "select CustNo, CustFN, CustLN, CommonSDR from customer where CustNo = $CNN";
//echo $queryS."<br>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
$CommonSDR = $row2["CommonSDR"];

	}
$result2->free();
	}

?>
<b><font size = "2" type="arial">Select A Customer who paid for an invoice:</b></font><font color = dark yellow> selectCust.php</font>

</br>
</br>

<form name="addTrans" action="addTrans.php" method="post">
<input type = 'hidden' id= 'TransDate' name= 'TransDate' size='15' value = '<?php echo $TransDate; ?>'>
SDRRRR: <?php echo $SDR; ?><input type = 'hidden' id= 'SDR' name= 'SDR' size='85' value = '<?php echo $SDR; ?>'>
<input type = 'hidden' id= 'AmtPaid' name= 'AmtPaid' size='12' value = '<?php echo $AmtPd; ?>'><br>
<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php
	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Add Customer's payment</option>";
else
{
if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option value='";
echo $item1b;
echo "'>";
echo $item2b;

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
print "_".$item3b;

print " </option>"; 
	}
$result2->free();
	}
}
$query = "select CustNo, CustFN, CustLN from customer ORDER BY custLN";

if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".$item3;

print " </option>"; 

	}
$result->free();

}

print " </option>"; 


echo "<option> </option>";
echo "<option> </option>";
echo "<option>ordered by CommonSDR: </option>";
echo "<option> </option>";
echo "<option> </option>";
$queryS = "select CustNo, CustFN, CustLN, CommonSDR from customer where CommonSDR != '' ORDER BY CommonSDR";
//echo $Iquery;

if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($rowS = mysqli_fetch_assoc($resultS)) {
$item1 = $rowS["CustNo"];
$item2 =  $rowS["CustLN"];
$item3 = $rowS["CustFN"];
$CommonSDR = $rowS["CommonSDR"];
print "<option value='$item1'>$CommonSDR"; //all customers
print "_".$item1;
print "_".$item2;
print "_".$item3;

}
$resultS->free();
}





echo "<option> </option>";
echo "<option> </option>";
echo "<option>ordered by invoice no: </option>";
echo "<option> </option>";
echo "<option> </option>";
$Iquery = "select CustNo, InvNo, InvDate, Summary, TotAmt from invoice  ORDER BY Invno desc";
//echo $Iquery;

if ($resultI = mysqli_query($DBConnect, $Iquery)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$item0 = $rowI["CustNo"];
$item1 = $rowI["InvNo"];

print "<option value='$item0'>$item0";
$item3 = $rowI["InvDate"];
$item4 = $rowI["Summary"];
$item5 = $rowI["TotAmt"];
print "_".$item1;
$queryCC = "select CustNo, CustLN from customer where CustNo = $item0";
if ($resultCC = mysqli_query($DBConnect, $queryCC)) {
  while ($rowI = mysqli_fetch_assoc($resultCC)) {
echo "_";
  echo $rowI["CustLN"];
}
$resultCC->free();
}
print "_".$item3;
print "_".$item4;
print "_R".$item5;
print " </option>"; 
}
$resultI->free();
}



?>
</select>
<input type="submit" name="btn_submit" value="Select the customer" style="width:130px;height:30px" /> 
<br>  
AccNo: <input type="text" name="acc1"    style="width:120px;height:30px" />
InvNo: <input type="text" name="inv1"  placeholder="or type in inv no"  style="width:120px;height:30px" /> 
CSDR: <input type="text" name="csdr"  placeholder="or type in common SDR"  style="width:120px;height:30px" /> 
<a href = "view_inv.php" target = _blank>View all invoices</a>
<br>
<input type="submit" name="btn_submit" value="Select the customer" style="width:300px;height:30px" /> 


<b>
</form>

<br><br>Or Select type of proof: (not confirmed payment):<br>
        <form  action="selectCustProof.php" method="post">
            <input type="submit" name="btnSubmit" value="ChequeToBeDeposited" style="width:220px"  /><br>
            <input type="submit" name="btnSubmit" value="ChequeDeliveredToMyBank" style="width:220px"  /><br>
            <input type="submit" name="btnSubmit" value="EFTEmailProof" style="width:220px"  /><br>
            <input type="submit" name="btnSubmit" value="EDIT_Proofs" style="width:220px"  /><br>
             <input type="submit" name="btnSubmit" value="EFTEmailProof and Transaction" style="width:220px"  /><br>

        </form>


<?php

include "view_transLatestsortbyTrNo.php";
include "viewExpHEandExptransLatest.php";
//include "view_transLatest.php";
//include "view_proofLatest.php";
?>
<a href = "view_transLatest.php"  onclick="window.open('view_transLatest.php', 'newwindow', 'width=900, height=650'); return false;">View Latest Transactions</a></br></br>
<a href = "viewExpHEandExp.php"  onclick="window.open('viewExpHEandExp.php', 'newwindow', 'width=900, height=650'); return false;">View All EXPENSES</a></br></br>
<a href = "view_proofLatest.php"  onclick="window.open('view_proofLatest.php', 'newwindow', 'width=900, height=650'); return false;">View Latest Proofs</a></br></br>

<br><a href = "view_invD.php">View All Invoices ALL CUSTOMERS by Date</a></br></br>
<a href = "view_invDunpaid.php">View All UNPAID Invoices ALL CUSTOMERS by Date</a></br></br>
<?php
include "view_invLatest.php";
?>

</body>

</html> 