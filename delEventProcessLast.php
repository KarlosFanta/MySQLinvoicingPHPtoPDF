<?php	//this is "process_event.php"
 $page_title = "You added a event";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>
<!--<form name="t" action="del_event_process_lastNEXT.php" method="post">-->
<form name="t" action="delEventCustProcessC.php" method="post">

<?php

$TBLrow = $_POST['mydropdownEC'];
$CustNo = $_POST['CustNo'];
echo "<input type='hidden' name='CustNo' value=";
			echo $CustNo;
			echo "> ";
echo "<input type='hidden' name='CustNo2' value=";
			echo $CustNo;
			echo "> ";
?>
<input type= "hidden" id = "mydropdownEC" name = "mydropdownEC"  value = ?><?php echo $TBLrow; ?>>

<?php

$event_No = 0;
//$CustNo = '';
$EDate = '';

$ENotes ='';


$event_No = $_POST['EventNo'];
//$CustNo = $_POST['CustNo'];
$EDate = $_POST['EDate'];
$ENotes = $_POST['ENotes'];




echo "Thank you for deleting the event: ".$event_No." ".$CustNo ." ".$EDate ."."  ;

$event_NoInt = intval($event_No);
$query="delete FROM events where EventNo = $event_NoInt";
//oracle: $query="update events set eventfn = '$CustNo', eventln ='$EDate', eventtel = '$AmtPaid', eventcell= '$ENotes', eventemail = '$TMethod', eventaddr = '$InvNoA', distance = '$InvNoAincl' where eventno = :event_NoInt";
echo '</br></br>';

mysqli_query($DBConnect, $query);
printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
echo $query;

echo ";<br>";


echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
$eventInt = intval($event_NoInt);
$SQLString = "SELECT * FROM events WHERE EventNo = $eventInt";
//$SQLString = "SELECT * FROM events WHERE WHERE CustNo = $item2;
?>

<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["EventNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["EDate"];
$item5 = $row["ENotes"];

print "$item1";
print "_".$item2;
print "_".$item3;
print "_".$item5;
}
$result->free();
}	echo "<br>";
//$mysqli->close();
?>




<input type = "submit" value = "Delete another event">
	<input type = "submit" value = "Delete another event">
	<br><br>


<?php
$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";


?>

