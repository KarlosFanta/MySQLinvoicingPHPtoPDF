<?php

	//$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");

$CustInt = $_GET['CustNo'];


/*if (@$CustInt == '')
{
	    @session_start();
 
	$CustInt = intval($_SESSION['CustNo'] );
}
else echo "CustInt is $CustInt";
	*/
echo "CustInt is $CustInt";
?> 



<?php //require_once "header.php"; ?>
<b><br><!--<font size = "2" type="arial">-->

<?php 
$date = date('Y-m-d',time()-(200*86400)); // 200 days ago
$queryE = "SELECT ENotes FROM events WHERE CustNo = $CustInt and   EDate >= '$date' order by EDate desc" ;
$queryE = "SELECT ENotes FROM events WHERE CustNo = $CustInt order by EDate desc" ;
//echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	
	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;<br>";
}
mysqli_free_result($resultE);
}
?>

