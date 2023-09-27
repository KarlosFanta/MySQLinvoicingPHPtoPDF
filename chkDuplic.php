<?php
    @session_start();
 	require_once ('inc_OnlineStoreDB.php');



	//check if there are summary in invoices that are duplicated:
	
$CustNoS = @$_SESSION['CustNo'];

$SQLstringS = "SELECT Summary, InvNo, InvDate, TotAmt, COUNT(*) as count FROM invoice where CustNo = $CustNoS  GROUP BY summary HAVING COUNT(*) > 1 ";
//echo $SQLstringS."<br><br>"; 

if ($result = mysqli_query($DBConnect, $SQLstringS)) {


while ($row = mysqli_fetch_assoc($result)) {

echo "<br><font color = red size = 4>NB! These Summaries are duplicates!</font>";

echo " ".$row["Summary"]."";
echo " ".$row["InvDate"]."";
echo " R".$row["TotAmt"]."";
echo " InvNo ".$row["InvNo"]."";

echo "\n<br>";
 
}
mysqli_free_result($result);

}	



?>
