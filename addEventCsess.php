

<?php
session_start();
require_once 'header.php';

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	echo "no session, first select a customer:<br />";
	require_once 'selectCust.php';
	}
	else
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	require_once 'addEventCustProcess_sess.php';

	//require_once 'view_cust.php';
require_once 'urgent_events.php';

?>


