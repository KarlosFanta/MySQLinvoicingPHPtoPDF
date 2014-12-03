<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php
	require_once('header.php');	
?>


<form name="Addcust" action="add_CustProcess.php" onsubmit="return validateForm()" method="post">
		<div>
<h1> QuickEdit ExpensesC</h1>

<a href = "editExpQ.php">QuickEdit Expenses</a></br></br></br>
<a href = "editExpCQ.php">QuickEdit ExpensesC of selected customer</a></br></br></br>


<h1> Edit Expenses</h1>
<a href = "editExp.php">Edit Any Expenses </a></br></br></br>

<h1> View Expenses of Selected Customer</h1>
<a href="./viewExpCust.php">Customer Expenses</a></br></br></br>
<a href="./viewExpCustALL.php">Customer All Expenses and all Invoices</a></br></br></br>


<h1> View All Expenses of ALL Customers</h1>
<a href="./viewExp.php">View All Expenses</a></br></br></br>

<h1> Edit All Expenses</h1>
<a href="./viewExpAll.php">Edit All Expenses</a></br></br></br>




	</div>
 </form>
