
<?php
@session_start();

require_once 'header.php';
require_once 'db.php';

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	//echo "no session<br />";
	$_SESSION['sel'] = "edit_invC";
require_once 'selectCust.php';
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
require_once 'edit_inv_processC1sess.php';
	}


	//require_once 'view_cust.php';

?>
