<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php
require_once 'header.php';
?>


<form name="Addcust" action="add_CustProcess.php" onsubmit="return validateForm()" method="post">
		<div>
<h1> View All Expenses</h1>
<a href="./viewExp.php">View All Expenses</a></br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>
<a href = 'viewExpmyeditbasic.php'>viewExpmyeditbasic for editing</a></br>
<a href = 'viewExpHmyeditbasic.php'>viewExpHmyeditbasic for editing</a></br>
<a href = 'viewExpEmyeditbasic.php'>viewExpEmyeditbasic for editing</a></br>
<a href = 'viewExpALLmyeditbasic.php'>viewExpALLmyeditbasic for editing</a></br>
<a href="./viewExpAll.php">View All Expenses</a></br></br>
<h1> QuickEdit ExpensesC</h1>

<a href = "editExpQ.php">QuickEdit Expenses</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href = "editExpH.php">QuickEdit HomeExpenses (Cyb, Outsur, SARS, Eskom, Tel, BankFees, CellC,Food,Private)</a><br><a href = "editExpE.php">QuickEdit ExtraExpenses(Accountant, petrol, Carrepairs, Medical)</a></br></br>
<a href = "editExpCQ.php">QuickEdit ExpensesC of selected customer</a></br></br>
<a href = "moveExp.php">Move an expense from one table to another</a></br></br>


<h1> Edit Expenses</h1>
<a href = "editExpA.php">Edit Any Expenses</a> </br></br>
<!--<a href = 'selectCustAssignStk.php'>Assign Stock to any Customer</a></br>-->
<a href = 'selectCustAssignStkInv.php'>Assign customer's Stock to Customer's invoice</a> &nbsp;&nbsp;
assignStkInv</br></br>
<a href = 'selectCustAssignStk.php'>Assign any Stock to a Customer and then invoice</a></br></br>

<h1> View Expenses of Selected Customer</h1>
<a href="./viewExpCust.php">Customer Expenses</a></br>
<a href="./viewExpCustS.php">Select Customer, then show his/her Expenses</a></br></br>
<a href="./viewExpCustALL.php">Customer's All Expenses and all Invoices</a></br></br></br>




<h1> View and Edit Expenses of a supplier or category</h1>
<a href = "editExp2.php">View and Edit Any Expenses of certain supplier </a></br></br></br>



	</div>
 </form>
