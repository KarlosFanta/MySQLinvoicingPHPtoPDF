<?php	//this is "edit_inv_process.php"
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invoice before we change him on the last form.
$TBLrow = $_POST['mydropdownEC'];
$Invno = explode(';', $TBLrow );
$InvNo = intval($Invno[0]);
require_once 'view_inv_one.php';
include 'edit_inv_processE.php';
include ("view_inv_prev_by_cust.php");
include ("view_trans_by_cust.php");
?>

view ALL invoices of ALL customers: <a href=view_inv.php>view_inv.php</a>
