http://localhost/START/progress.html<?php 
$CustNo = '';
$CustNo = $_GET['CustNo'];
     echo "CustNo: ". $_GET['CustNo']. "<br>";
	 
/*// !empty can be used instead of isset	 
	if (!empty($_POST["CustNo"])) {
    echo "Yes, CustNo is set<br>";    
}else{  
    echo "No, CustNo is not set<br>";
} 

if(isset($_GET["CustNo"])) echo "CustNo is set\n";
*/

if (@$CustNo == "")
{
//	require_once('header.php');	
@session_start();
$CustNo = 0;
echo "CustNo".@$_SESSION['CustNo'];
$CustNo = @$_SESSION['CustNo'];
}




	$date = date('Y-m-d',time()-(60*5266400)); // 1 days ago
$queryE = "SELECT * FROM events WHERE CustNo = $CustNo and   EDate >= '$date' and ENotes LIKE '%top%' order by EDate desc" ;
echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;
require_once("inc_OnlineStoreDB.php");


	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
//echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;</th><th>";

echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;<br>";
	
}$resultE->free();
}
include "topupInvs.php";
echo "</table><br>";
echo "<br>";
echo "<br>";
include "view_inv_by_cust.php";
?>