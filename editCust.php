<?php
    @session_start();
 


	$page_title = "Select a customer";
	require_once('header.php');	
	//require_once('db.php');	

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	//echo "no session<br />";
	require_once('selectCust.php');	
	$_SESSION['sel'] = "editCust";
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	require_once('editCustProcess.php');	
	}
	
	
	//require_once('view_cust.php');	

	
	
?>
