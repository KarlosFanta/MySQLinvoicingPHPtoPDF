

<?php
@session_start();
require_once 'header.php';
$_SESSION['sel'] = "add_trans2";

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	//echo "no session<br />";
	require_once 'selectCust.php';
	}
	else
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	echo 'addTransCustProcess2sess.php';
	include 'addTransCustProcess2sess.php';

	//    addTransCustProcess2sess.php

	//require_once 'view_cust.php';

?>


