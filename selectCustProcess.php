



<meta charset="UTF-8">



<!--

this opens up editCust.php
and editCust.php opens up editCustProcess.php

-->
























<?php	//this is "selectCustProcess.php"
session_start(); //if you move this down you get an error
	require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection


// LOOK FOR include ("editCustProcess.php");

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the customer before we change him on the last form.

$TBLrow = @$_GET['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
$CustInt = intval($Custno[0]);
//echo "<br>Custint:".$CustInt."<br />";

$_SESSION['CustNo'] = $CustInt;
$indesc = 8;
$in = 8;
include ("editCust.php");

?> 



