<?php
    session_start();
 


	$page_title = "Select a customer";
	require_once('header.php');	
	//require_once('db.php');	
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";

	if (@$_SESSION['CustNo'] == "" or @$_SESSION['CustNo'] == "NotYet")  //works if session was destroyed
	{
	//echo "no session<br />";
	//$_SESSION['sel'] = "addInvC";
	require_once('selectCust.php');	
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	require_once('addQuoprocessCsess1.php');	
	}
	
	
//	require_once('view_cust.php');	

	
	
?>
