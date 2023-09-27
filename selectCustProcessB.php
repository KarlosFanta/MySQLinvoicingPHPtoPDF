<html>
<head>
<title>Add ADSL Invoice addInvCsessDadsl</title>
<!--
//To modify a preference in a browser application such as Firefox or SeaMonkey, type about:config
//To change an existing preference, double click on it. 
//browser.backspace_action
//0
//Pressing [Backspace] will go back a page in the session history and [Shift]+[Backspace] will go forward. (Default in Windows)
//1
//Pressing [Backspace] will scroll up a page in the current document and [Shift]+[Backspace] will scroll down. (Default in Linux builds before 2006-12-07)
-->

<meta charset="UTF-8">
</head>
<body>

<?php
session_start();
	require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
$TBLrow = @$_POST['mydropdownEC'];
$Custno = explode(';', $TBLrow );
$CustInt = intval($Custno[0]);
$_SESSION['CustNo'] = $CustInt;

include ("addInvCsessDadsl.php");

//$CustInt = $_SESSION['CustNo'];
//$indesc = 8;
//$in = 8;
?> 
