<?php


	$page_title = "Add a transaction";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>
<html>
<head>
<title>Add a transaction</title>
	<script type="text/javascript">
//Javascript for Validation of user inputs

</script>
</head>
<a href = 'selectCustTrans1.php'>old Add Trans</a>
<form action="addTrcsv.php" method="post"
<br>
CSV paste: <input type="text" name="csv"    style="width:520px;height:30px" />
<br>
<br>
<input type="submit" name="btn_submit" value="Submit EFT(csv tabular) detail:  DD/MM/YYYY SDR AmtPaid" style="width:500px;height:30px" />
</form>
<a href = "view_inv.php" target = _blank>View all invoices</a>
<br>Sorted by TransNo:<br>
<?php
include 'view_transLatestsortbyTrNo.php';
include 'viewExpHEandExptransLatest.php';
//include 'view_transLatest.php';
//include 'viewExpHEandExp.php';

//include 'view_proofLatest.php';
?>

<br><a href = "view_invD.php">View All Invoices ALL CUSTOMERS by Date</a></br></br>
<a href = "view_invDunpaid.php">View All UNPAID Invoices ALL CUSTOMERS by Date</a></br></br>
<?php
//include 'view_invLatest.php';
?>

</body>

</html>
