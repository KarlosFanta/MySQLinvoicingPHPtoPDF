<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>











<title>ACS Accounting, Invoicing and Inventory Management System</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<?php //include ("ajax/Demo/demo.php"); 
//include ("calculator/index.php"); 

?>
<body style="margin: 0px; padding: 0px;">
<table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">
  <tr>
    <!-- ============ HEADER SECTION ============== -->
    <td align="center" class="header" style="height: 5px;"><div align="left" class="xbig"><?//= $_SESSION["company_code"]?></div></td>
    <td class="header" style="height: 5px;"><div align="left" class="xbig">	&nbsp;
	PHP Accounting, Invoicing and Inventory Management System</div></td>
  </tr>
  <tr>
    <!-- ============ LEFT COLUMN (MENU) ============== -->
    <td width="2%" valign="top" class="title_column">
	
	<font size = '2'><a href="setts.php">Setup and Installation</a></font>

	
	
	<br></td>
<!--<td width="20%" valign="top" class="title_column"><br></td>-->
    <!-- ============ RIGHT COLUMN (CONTENT) ============== -->
    <td width="85%" height="1" valign="top" class="title_column"><strong class="title_column"><?//=$page_title?></strong></td>
<!--<td width="80%" height="1" valign="top" class="title_column"><strong class="title_column"><?//=$page_title?></strong></td>-->
  </tr>
  <tr>
    <td width="2%" valign="top" class="side_column">
	<!-- Menu -->
		<DIV ALIGN=CENTER>
		
	

<?php

echo <<< EOF

<?php
echo "kljn";<<< EOF
EOF;
?>

EOF;

?>



   <MAP NAME="map2">
<AREA
   HREF="selectCust.php" ALT="Select Customer" TITLE="Select Customer"
   SHAPE=RECT COORDS="43,9,97,26">
<!--<AREA
   HREF="unselectCust.php" ALT="Unselect Customer" TITLE="Unselect Customer"
   SHAPE=RECT COORDS="49,32,126,46">-->
<AREA
   HREF="Register.php" ALT="Add new Customer" TITLE="Add new customer"
   SHAPE=RECT COORDS="49,51,85,67">
<AREA
   HREF="editCust.php" ALT="Edit Customer" TITLE="Edit customer"
   SHAPE=RECT COORDS="48,74,86,85">
<AREA
   HREF="vc.php" ALT="View Customers" TITLE="View customers"
   SHAPE=RECT COORDS="45,92,123,110">
 <IMG SRC="Customers.jpg"  align = "center"
   ALT="map of customers" BORDER=0 
   USEMAP="#map2">
  
     </MAP>


	 <br>
  
   <MAP NAME="map3">
<AREA
   HREF="addInvCsess.php" ALT="Add new invoice" TITLE="Add new invoice"
   SHAPE=RECT COORDS="44,16,104,39">
<AREA
   HREF="edit_invC.php" ALT="Edit invoice" TITLE="edit invoice"
   SHAPE=RECT COORDS="51,40,103,56">
<AREA
   HREF="delInvC.php" ALT="Delete invoice" TITLE="Delete invoice"
   SHAPE=RECT COORDS="51,59,117,77">
<AREA
   HREF="ve_inv.php" ALT="View invoice" TITLE="View invoice"
   SHAPE=RECT COORDS="50,81,122,96">
<AREA
   HREF="select_invPDF.php" ALT="Print invoice" TITLE="Print invoice"
   SHAPE=RECT COORDS="49,100,88,118">
</MAP>

<IMG SRC="Invoices.jpg"  align = "center"
   ALT="map3" BORDER=0 
   USEMAP="#map3"><!--<BR>-->


   


<!--	 <br>
  
   <MAP NAME="mapQuo">
<AREA
   HREF="addQuoCsess.php" ALT="Add new quote" TITLE="Add new quote"
   SHAPE=RECT COORDS="44,16,104,39">
<AREA
   HREF="edit_QuoC.php" ALT="Edit quote" TITLE="edit quote"
   SHAPE=RECT COORDS="51,40,103,56">
<AREA
   HREF="delQuoC.php" ALT="Delete quote" TITLE="Delete quote"
   SHAPE=RECT COORDS="51,59,117,77">
<AREA
   HREF="ve_Quo.php" ALT="View quote" TITLE="View quote"
   SHAPE=RECT COORDS="50,81,122,96">
<AREA
   HREF="select_QuoPDF.php" ALT="Print quote" TITLE="Print quote"
   SHAPE=RECT COORDS="49,100,88,118">
</MAP>

<IMG SRC="quotes.bmp"  align = "center"
   ALT="mapQuo" BORDER=0 
   USEMAP="#mapQuo"><!--<BR>


   
<li class=""><a href="select_QuoPDF.php">Quotes To PDF</a></li><br />
-->


     
      <MAP NAME="map4">
<AREA
   HREF="selectCustTrans.php" ALT="Add new transaction" TITLE="Add new transaction"
   SHAPE=RECT COORDS="49,4,95,22"><!-- addTrans2sess   -->
<AREA
   HREF="selectCustTrans.php" ALT="Add transaction" TITLE="Add transaction"
   SHAPE=RECT COORDS="49,24,89,38"><!-- addTrans   -->
<AREA
   HREF="edit_trans_CustProcessC.php" ALT="Edit transaction" TITLE="edit transaction"
   SHAPE=RECT COORDS="48,42,89,57">
<AREA
   HREF="del_transC.php" ALT="Delete transaction" TITLE="Delete transaction"
   SHAPE=RECT COORDS="51,43,106,75">
<AREA
   HREF="ve_trans.php" ALT="View transaction" TITLE="View transaction"
   SHAPE=RECT COORDS="50,77,124,95">
<AREA
   HREF="view_trans_cust.php" ALT="Customer transaction" TITLE="Customer transaction"
   SHAPE=RECT COORDS="50,98,110,117">
</MAP>

<IMG SRC="Transactions.jpg" align = "center"
   ALT="map4" BORDER=0 
   USEMAP="#map4"><!--<BR>-->

   
   
   
   
   
   
      <br> 
	  			<!--<li class=""><a href="./selectCustTrans.php">Add TransactionC</a></li><br />-->
				<a href="./selectCustExp.php">Add Expenses/Profits</a></li><br /><br />
				<a href="./veExp.php">Edit/Del/View Expenses</a></li><br /><br />
			<a href="./outstanding.php">Outstanding payments</a></li><br /><br />
		
	<!--	
<MAP NAME="map1">
<AREA
   HREF="urgent_events.php" ALT="Urgent events" TITLE="Urgent events"
   SHAPE=RECT COORDS="16,2,124,25">
<IMG SRC="Urgentevents.bmp"
   ALT="map of urgent events" BORDER=0 
   USEMAP="#map1"><BR>
   </MAP>

-->
 
      
        <MAP NAME="map5">
<AREA
   HREF="addEventCsess.php" ALT="Add new event" TITLE="Add new event"
   SHAPE=RECT COORDS="49,4,95,22">
<AREA
   HREF="addEventprocess.php" ALT="Add event" TITLE="Add event"
   SHAPE=RECT COORDS="49,24,89,38">
<AREA
   HREF="edit_eventCQ.php" ALT="Edit event" TITLE="edit event"
   SHAPE=RECT COORDS="48,42,89,57">
<AREA
   HREF="del_eventC.php" ALT="Delete event" TITLE="Delete event"
   SHAPE=RECT COORDS="51,43,106,75">
<AREA
   HREF="ve_eve.php" ALT="View event" TITLE="View event"
   SHAPE=RECT COORDS="50,77,124,95">
<AREA
   HREF="urgent_events.php" ALT="Customer event" TITLE="Customer event"
   SHAPE=RECT COORDS="50,98,110,117">
</MAP>

<IMG SRC="events.jpg" align = "center"
   ALT="map5" BORDER=0 
   USEMAP="#map5"><!--<BR>-->
   
  <br> 
   
   	<!--		<li class=""><a href="./view_event_all_HP.php">Edit All HighPriority events</a></li>-->
   
  
   
   
   
   
</DIV>



			<div class="menubg flt">
		<ul class="menu flt">
		<!--	<li class="current_page_item"><a href="./home.php">Home</a></li>-->
			<!--<li class=""><a href="./logout.php">Logout</a></li>-->
			<!--<li class="current_page_item"><a href="#">Customers</a></li>-->
			
		
		<!--	<li class=""><a href="./stakeholders.php">Overview of stakeholders</a></li>-->
		<!--<br>-->
		

		
		
		

<!--			<li class=""><a href="./urgent_events.php">Urgentevents</a></li>
			<li class=""><a href="./selectCust.php">SELECT Customer</a></li>
			<li class=""><a href="./unselectCust.php">UNSELECT Customer</a></li>
				
			<li class=""><a href="./Register.php">Add Customer</a></li>
			<li class=""><a href="./editCust.php">Edit Customer</a></li>
<!--			<li class=""><a href="./del_cust.php">Delete Customer</a></li>-->
			
<!--			<li class=""><a href="./vc.php">View/Edit Customers</a></li>
			<!--<li class="current_page_item"><a href="./view_customers2.php">View All Customers</a></li>-->
			<!--<li class="current_page_item"><a href="./view_cust_all.php">Edit All Customers</a></li>-->
			<!--<li class="current_page_item"><a href="./view_cust_all2.php">Edit All Customers</a></li>-->
			<!--<li class=""><a href="./search_cust.php">Search Customers</a></li>-->
			
<!--			<li class="current_page_item"><a href="./view_quot_all.php">Quotes</a></li>
<!--			<li class="current_page_item"><a href="#">Quotes</a></li>
			<li class=""><a href="./add_quo.php">Add Quote</a></li>
			<!--<li class=""><a href="./edit_quo.php">Edit/Delete Quote</a></li>
			<li class=""><a href="./view_quo.php">View/Search Quotes</a></li>-->
<!--			<li class="current_page_item"><a href="./view_ord_all.php">Orders</a></li>
<!--			<li class="current_page_item"><a href="#">Quotes</a></li>
			<li class=""><a href="./add_quo.php">Add Quote</a></li>
			<!--<li class=""><a href="./edit_quo.php">Edit/Delete Quote</a></li>
			<li class=""><a href="./view_quo.php">View/Search Quotes</a></li>-->

		<!--	<li class="current_page_item"><a href="#">Invoices</a></li>-->
<!--			<br />
<!--			<li class=""><a href="./addInvCsess.php">Add InvoiceC</a></li>
			<!--<li class=""><a href="./edit_invCsess.php">Edit InvoiceC</a></li>
			<!--<li class=""><a href="./addInv.php">Add Invoice</a></li>-->
<!--			<li class=""><a href="./edit_inv.php">Edit Invoice</a></li>-->
<!--			<li class=""><a href="./edit_invC.php">Edit InvoiceC </a></li>
			<li class=""><a href="./delInvC.php">Delete InvoiceC </a></li>

			<li class=""><a href="./ve_inv.php">View/Edit Invoices</a></li>
			<!--<li class=""><a href="./edit_invCQ.php">QuickEdit Invoice</a></li>
			<li class="current_page_item"><a href="./view_inv_all.php">Edit All Invoices</a></li>
			<!--<li class=""><a href="./view_inv.php">View Invoices</a></li>-->
<!--		<li class="current_page_item"><a href="./select_inv.php">Print Only</a></li>
			
						<br />

<!--			<li class="current_page_item"><a href="#">Credit Notes</a></li>
			<li class=""><a href="./add_cn.php">Add Credit Note</a></li>
	<!--		<li class=""><a href="./editCn.php">Edit/Delete Credit Note</a></li>
			<li class=""><a href="./view_cn.php">View/Search Credit Notes</a></li>-->
<!--			<li class=""><a href="./add_trans2sess.php">Add TransactionC</a></li>
			<li class=""><a href="./add_trans.php">Add Transaction</a></li>
			<li class=""><a href="./edit_trans_CustProcessC.php">Edit TransactionC </a></li>
			<li class=""><a href="./del_transC.php">Delete TransactionC </a></li>
			
					<li class=""><a href="./ve_trans.php">View/Edit Transactions</a></li>
	
			
<!--			<li class=""><a href="./edit_transCQ.php">QuickEdit TransactionC </a></li>-->
		<!--	<li class=""><a href="./edit_trans.php">Edit Transaction</a></li>-->
<!--			<li class="current_page_item"><a href="./view_trans_cust.php">Customer Transactions</a></li>
		<!--	<li class="current_page_item"><a href="./view_trans.php">View All Transactions</a></li>
			<li class="current_page_item"><a href="./view_trans_all.php">Edit All Transactions</a></li>-->

			<!--			<li class="current_page_item"><a href="#">Transactions (Payments)</a></li>
			<li class=""><a href="./add_tr.php">Add Transaction</a></li>
<!--			<li class=""><a href="./view_tr.php">View/Search Transactions</a></li>-->
	<!--	<li class="current_page_item"><a href="./view_acc_all.php">Accounts</a></li>
<!--			<li class="current_page_item"><a href="#">ACCOUNTS</a></li>
			<li class=""><a href="./add_quo.php">Add Account</a></li>
<!--			<li class=""><a href="./edit_quo.php">Edit/Delete Account</a></li>
			<li class=""><a href="./view_quo.php">View/Search Accounts</a></li>-->
			
	<!--	<li class="current_page_item"><!--<a href="./view_cat_all.php">Categories</a></li>-->
<!--<br>-->
<!--			<li class=""><a href="./add_eventCsess.php">Add eventC</a></li>
			<li class=""><a href="./addEventprocess.php">Add General events</a></li>
			<li class=""><a href="./edit_eventCQ.php">QuickEditevent</a></li>
			<li class=""><a href="./view_event_all.php">Edit All events</a></li>
			<li class=""><a href="./view_event_all_HP.php">Edit All HighPriority events</a></li>
			
			<br>
			<!--<li class="current_page_item"><a href="#">REPORTS</a></li>-->
			<a href="backupDB.php">Backup DB data & structure</a><br />

			<li class=""><a href="../phpmyadmin/index.php?db=kc&token=954ececb41886fa8043ceefca56c867d#PMAURL:db=kc&server=1&target=db_export.php" target = "_blank">Backup DB with PHPMyAdmin</a></li>
			
	
			<a href="./codetricks.php">Code Tricks</a></li><br />
			<a href="../phpmyadmin/index.php?db=kc&token=218d93aa9bb914967a647a013f3ad1e8#PMAURL:db=kc&server=1&target=db_structure.php&token=218d93aa9bb914967a647a013f3ad1e8" target="_blank">phpMyAdmin</a></li><br>
			
			
			<br>
			<br><br>
			<br>
	
			Under construction:<br>
	
			Add JobCardC</a></li>	<br>
	
  				<a href="setts.php">Settings</a></li>
		
		
			<!--<li class="current_page_item"><a href="#">REPORTS</a></li>-->

			<!--<li class=""><a href="./profit.php">Profit made so far</a></li>
			<li class=""><!--<a href="./outstanding.php"></a></li>
			<li class=""><!--<a href="./outstanding.php">Profit for the year</a></li>
			<li class=""><!--<a href="./outstanding.php">Total sales</a></li>
			<li class=""><!--<a href="./outstanding.php">Total sales this year</a></li>
			<li class=""><!--<a href="./outstanding.php">Statistical graph</a></li>
			<li class=""><!--<a href="./outstanding.php">Table counts(no. of custs)</a></li>
			<li class=""><!--<a href="./outstanding.php">Stock low on supply</a></li>
			<li class=""><!--<a href="./profit.php"></a></li>
			<br>
			<li class="current_page_item"><a href="#">DB TABLE MANAGEMENT</a></li>-->
			
			<a href="./1.php" target = "_blank">SQL check</a></li>
			<!--<li class=""><a href="./tables.php" target = "_blank">Show all tables</a></li>-->
			
<!--			<li class=""><a href="./SQLheader.php" target = "_blank">SQL database code</a></li>
<!--			<li class=""><a href="./run_sql.php">Run SQL Query</a></li><!--
			<li class=""><a href="./view_tbl.php">View All Table Structures</a></li>
			<li class=""><a href="./view_all.php">View All Table with Contents</a></li>
			<li class=""><a href="./empty_tbl.php">Drop A Table</a></li>
			<li class=""><a href="./create_tbl.php">Create A Table</a></li>
			<li class=""><a href="./add_fk.php">Add FK to a Table</a></li>
			<li class=""><a href="./add_pk.php">Add PK to a Table</a></li>		
			<li class=""><a href="./add_col.php">Add a column a Table</a></li>		
			<li class=""><a href="./empty_tbl.php">insert data to a Table row</a></li>
			<li class=""><a href="./save_to_file.php">Save comments to a txt file</a></li>
			<li class=""><a href="./bkp.php">Backup/Export Database</a></li>-->
<!--			<li class=""><a href="./cnt.php">Count Tables</a></li>
			<li class=""><a href="./report_cust.php">Report1</a></li>
			<li class=""><a href="./report_cust2.php">Report2</a></li>
			<li class=""><a href="./report_cust3.php">Report3</a></li>-->
				<li class=""><a href="./ERD.php">ERD</a></li>
				<li class=""><a href="phpMyEdit-5.7.1/phpMyEditSetup.php" target=_blank>phpMyEditSetup</a></li>
			<!--<li class=""><a href="./recovery.php">Backup & Recovery</a></li>-->
			<!--<li class=""><a href="./log.php">SQL Log File</a></li>-->
			<!--<li class=""><a href="./how.php">How to Alter</a></li>-->
	
	
			<a href="./1111home.php">Home</a></li>
	
			
	<br>
	<br>
			<!--<li class="current_page_item"><a href="#">Billing</a></li>
			<li class=""><a href="./view_billing.php" target="_blank">View Billing</a></li>
			<li class=""><a href="./view_billing_csv.php" target="_blank">Download Billing CSV File</a></li>
			<li class=""><a href="./iew_invoicing_csv.php" target="_blank">Download Invoicing CSV File</a></li>			
			<li class="current_page_item"><a href="#">Download</a></li>-->
			
			
				<li class="current_page_item"><a href="./view_supp_all.php">Suppliers</a></li>
<!--	<li class=""><a href="./add_supp.php">Add Supplier</a></li>
			<li class=""><a href="./edit_supp.php">Edit/Delete Supplier</a></li>-->
		<!--	<li class=""><a href="./view_supp.php">View/Search Suppliers</a></li>-->

<!--<li class="current_page_item"><a href="#">Products</a></li>-->

		<li class="current_page_item"><a href="./view_prod_all.php">Products</a></li>
	<!--<a href="./add_prod.php">Add Product</a></li>-->
		<!--	<li class=""><a href="./edit_prod.php">Edit/Delete Product</a></li>
		<!--	<li class=""><a href="./view_prod.php">View/Search Products</a></li>-->
			
			<!--<li class="current_page_item"><a href="./view_prod_line_all.php">Product_Line</a></li>
			<!--<li class="current_page_item"><a href="#">Product_Line</a></li>-->
<!--			<li class=""><a href="./add_prod.php">Add Product_Line</a></li>-->
<!--			<li class=""><a href="./edit_prod.php">Edit/Delete Product_line</a></li>
			<li class=""><a href="./view_prod.php">View/Search Product_line</a></li>-->


		</ul>	
	</div>
	


	
	
	
	
	</td><!--write above here-->
	<td align="left" valign="top">
	
	<?php //include ("ajax/Demo/demo.php"); 
//include ("calculator/index.php"); 


?>
<body background="try14.php">
	
	
	<!--</td>DO NOT ENABLE-->
	<!--</table>DO NOT ENABLE-->
	
	
