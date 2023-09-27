<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php 
    //@session_start();
	//@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<nbr />";
	$CustInt = $_GET['CustNo'];
	echo "ggget $CustInt";
require_once "addInvCsessD.php";
?>