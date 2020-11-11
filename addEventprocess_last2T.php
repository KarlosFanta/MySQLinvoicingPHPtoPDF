<?php	//this is "process_Trans.php"
 $page_title = "You added a event";
	include 'header.php';
//require_once 'db.php';//mysql connection and database selection
require_once 'inc_OnlineStoreDB.php';

?>



<?php
$EventNo = 0;
$CustNo = '';
$EDate = '';
//$AmtPaid = '';
$ENotes ='';
$Priority = '_';
//$InvNoA = 0;
//$InvNoAincl = 0;
$EventNo = $_POST['EventNo'];
$CustNo = $_POST['CustNo'];
$Priority = $_POST['Priority'];
$Destination = "";
$Destination = $_POST['Destination'];

$D1 = $_POST['EDate'];
$D2 = explode("-", $D1);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D2[0]."/".$D2[1]."/".$D2[2];   //check addEventCustProcess_sessT.php

echo $EDate;

//$AmtPaid = $_POST['AmtPaid'];
$ENotes = $_POST['ENotes'];
$ENotes = preg_replace("/'/","_",$ENotes);
$ENotes = preg_replace("/‘/","_",$ENotes);
$ENotes = preg_replace("/’/","_",$ENotes);
$ENotes = preg_replace("/&/","and",$ENotes);
$ENotes = preg_replace("/,/","+",$ENotes);

$ENotes = preg_replace("/…/",".",$ENotes);

echo " ENotes:".$ENotes ;
//echo "TMeth:".$TMethod." ";

echo "Thank you for adding the event's details: ".$EventNo." ".$CustNo ." ".$EDate ."."  ;

$EventNoInt = intval($EventNo);
$query="insert into events (EventNo, CustNo, EDate, ENotes, Priority, Destination )
VALUES
( $EventNo,  $CustNo, '$EDate', '$ENotes', '$Priority', '$Destination') ";

/*(EventNo = $EventNo, CustNo = $CustNo, EDate ='$EDate', AmtPaid = $AmtPaid, ENotes = '$ENotes', TMethod = '$TMethod',
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update events set Transfn = '$CustNo', Transln ='$EDate', Transtel = '$AmtPaid', Transcell= '$ENotes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where EventNo = :EventNoInt";
echo '</br></br></br>';

mysqli_query($DBConnect, $query);
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5 color = red><b><b><b>insert or update NOT successfull!!!</b>!!</b></font><br><br>";
else
echo "insert success! <br>";
echo "
<form action='addEventCustProcess_sessT.php'  onsubmit='return formValidator()'  method='post' >

<input type='submit' value='Create another adsl event'  /> ";

echo "<br><br>";
echo $query;

echo ";<br><br>";
//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");

echo '</br>';

$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

echo '</br>..';
?>

<input type='submit' value='Create another adsl event'  /> ";
</form>
