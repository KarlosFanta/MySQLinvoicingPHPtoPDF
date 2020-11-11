
<?php
include 'header.php';

   @session_start();
echo "SESSION CustNo: ". @$_SESSION['CustNo'] ."<br />";
$_SESSION = array();
//$_SESSION['CustNo'] = "1111111111";

session_destroy();

//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
echo "Customer unselected. (destroy session)";

?>
