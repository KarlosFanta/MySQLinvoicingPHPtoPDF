<head><title>Outstanding</title></head>
<?php	//this is "edit_trans_CustProcess.php"
 $page_title = "Outstanding payments of ALL customers";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$pr = "N";
//$pr = $_POST['pr']; //inv descriptions
$pm = "N";
//$pm = $_POST['pm']; //inv descriptions
$ev= "N";
$in= "N";
//$ev = $_POST['ev']; //inv descriptions
$DisplayInvPdStatus  = "N";
$Invsummm = 0;
?>

<a href = "outstanding3.php"> View only outstanding customers</a><br>
<a href = "outstandingadsl.php"> View only adsl outstanding customers</a><br>
<form name="Edit_trans_process" action="edit_trans_process_last.php" method="post">


<?php

echo "<b>ALL CUSTOMERS</b>    Date: ".date("j M Y")." <BR />";

$SQLstring = "select * from customer";
if ($result = $DBConnect->query($SQLstring)) {
   while ($row = $result->fetch_row()) {

$CustInt = $row[0];
include ("outstanding4.php");
		}
    $result->close();
	
}
















?>

I wrote this code to list all the files except directories

<a href="F:/work/" >Go to downloads page</a>
<a href="../" >Go to downloads page</a>

<a href="./downloads/folder_i_want_to_display/" >Go to downloads page</a>
