<title>CustInv</title><link rel="stylesheet" href="mystyle.css">
<?php

	//$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");
if (@$_GET['CustNo'] != "")
$CustInt = intval($_GET['CustNo']);
$indesc = "9";
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];


$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];

if (@$CustInt == '')
{
	    @session_start();
 
	$CustInt = intval($_SESSION['CustNo'] );
}
echo "CustInt is $CustInt";
	

?> 



<?php //require_once "header.php"; ?>
<b><br><!--<font size = "2" type="arial">-->

<?php 
$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";
if (@$un == 'N')
echo "Error - please try view_inv_by_custUNRECONCILED.php";
$un = 'Y';
echo "<br><br>Your Invoices History view_inv_by_cust.php";
?>

 &nbsp;&nbsp;&nbsp;&nbsp;</font> </b><font color=#F5F5DC>view_inv_by_cust.php &nbsp;&nbsp;&nbsp;

<?php 		echo $SQLstring;
echo "&nbsp;&nbsp;&nbsp;indesc: ".$indesc."</font>";	echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo @$row['CustLN'];
?>
			</b></font>
</br>
<font size = 5>
Choose Invoices View:<br><br><b>
<a href = view_inv_by_cust_NotADSL.php?CustNo=<?php echo $CustInt; ?>>Not ADSL</a><br>
<a href = view_inv_by_cust_ADSL.php?CustNo=<?php echo $CustInt; ?>>ADSL only</a><br>
<a href = view_inv_by_cust_MAIN.php?CustNo=<?php echo $CustInt; ?>>All Details</a><br><br>
<a href = view_inv_by_cust_simple.php?CustNo=<?php echo $CustInt; ?>>Simple</a><br><br>
<a href = view_inv_by_cust_simpler.php?CustNo=<?php echo $CustInt; ?>>Simpler</a><br><br>
<a href = ViewTransByCustSimpler.php?CustNo=<?php echo $CustInt; ?>>view_trans_by_custSIMPLER</a><br><br>

<font color=blue>With proofs: <a href = view_inv_by_custADV.php>view_inv_by_custADV.php</a></font>
