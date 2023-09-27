<html>
<head>
<title>Edit Invoice</title>
<meta charset="UTF-8">
</head>
<body>
<?php
    session_start();
 


	require_once('header.php');	
	//require_once('db.php');	
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	include "chkDuplic.php";
//echo "sess: ".@$_SESSION['CustNo']."<<";
	if (@$_SESSION['CustNo'] == "" or @$_SESSION['CustNo'] == "NotYet" or @$_SESSION['CustNo'] == "0")  //works if session was destroyed
	{
	//echo "no session<br />";
	//$_SESSION['sel'] = "addInvC";
	require_once('selectCust.php');	
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	//require_once('edit_inv_processC1.php');	
	require_once('editinvCchoose.php');	
//	require_once('edit_inv_processC1.php');	
	}
	

?>
</p>  