<?php
    @session_start();
 	require_once ('inc_OnlineStoreDB.php');



	//check if there are summary in invoices that are duplicated:
	$SRYY = '';
$CustNoS = @$_SESSION['CustNo'];

$SQLstringS = "SELECT Summary FROM invoice where summary = '$Summary' and CustNo = $CustNo";
//echo "<br><br>".$SQLstringS."<br><br>"; 

if ($result = mysqli_query($DBConnect, $SQLstringS)) {


while ($row = mysqli_fetch_assoc($result)) {

echo "<br><font color = red size = 5><b>NB! These Summaries are duplicates!</font></b><br>
THis invoice Summary <b>$Summary</b> already exists for this customer!";

echo " ".$row["Summary"]."";
$SRYY = $row["Summary"];

//echo "\n<br>";
 $Summary = '';
}
mysqli_free_result($result);

}	

//echo "<br>s:".$Summary." sryy:".$SRYY."<br>";
/*if ($Summary == $SRYY)
{
	echo "<br><font color = red size = 4>NB!! DUPLICATION! <br>THis Summary <b>$Summary</b> already exists!<br>";
	$Summary = '';
}
else
	echo "<br>All ok this summary name does not exist for this customer yet.";
*/

?>
