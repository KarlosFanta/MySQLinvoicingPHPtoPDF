<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a customer";
//if( ! @$_SESSION){
    session_start();
//} 

	require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>
<!--<form name="Addcust" action="editCustProcess_last.php" method="post">-->


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the customer before we change him on the last form.

$TBLrow = $_POST['drop5'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."<br />";


$_SESSION['CustNo'] = $CustInt;

echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";


if (@$_SESSION['sel'] == "addInvC")
include ("addInvCsessD.php");
else if (@$_SESSION['sel'] == "edit_invC")
include ("edit_invCsess.php");
else if (@$_SESSION['sel'] == "add_eventC")
include ("addEventCsess.php");
else if (@$_SESSION['sel'] == "edit_transC")
include ("edit_transCsess.php");
else if (@$_SESSION['sel'] == "editCust")
include ("editCustProcess.php");
else if (@$_SESSION['sel'] == "add_trans2")
include ("add_trans2sess.php");
else if (@	$_SESSION['sel'] = "select_C");
{
echo "you have selected the customer.<br>";

echo "<a href='editCustProcess.php'><font size = '3'>Click here to <b>edit the customer</b>:";
echo "editCustProcess.php</a><br>";

echo "<a href='selectCust.php'><font size = '3'>Click here to <b>select another  customer</b>:";
echo "selectCust.php</a><br>";

echo "<a href='addQuoCsess.php'><font size = '3'>Click here to add <b>quotes</b>:</font>";
echo "addQuoCsess.php</a><br>";


echo "<a href='addInvCsess.php'><font size = '3'>Click here to add <b>invoices</b>:</font>";
echo "addInvCsess.php</a><br>";

echo "<a href='add_trans2sess.php'><font size = '3'>Click here to add a <b>transaction</b>:</font>";
echo "add_trans2sess.php</a><br>";

echo "<a href='addEventCsess.php'><font size = '3'>Click here to add an <b>event</b>:</font>";
echo "add_eventCsess.php</a><br>";

echo "<a href='interrogate.php'><font size = '3'><b>Interrogate</b> his/her line</font>";
echo "interrogate.php</a><br>";

include ("edit_trans_CustProcessC.php");
}
//else
//include ("editCustProcess.php");

//Reset:
$_SESSION['sel'] = "none";
	$CustInt = $_SESSION['CustNo'];
//echo "CustInt:". $CustInt;
//include ("view_cust_by_cust.php");
//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");
//include ("view_event_by_cust.php");

//include ("view_trans_by_cust.php");

$indesc = 8;
$in = 8;
//include ("view_inv_by_cust.php");

/*
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<font size = 4><b>Total Amount outstanding: R".($Invsummm - $yo)."</b></font><BR />";
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";
//include ("view_inv_by_custPD.php");
//include (".php");
*/
?> 



