<?php	//this is "process_event.php"
 $page_title = "You added a event";
	include('header.php');	
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>



<?php
$event_No = 0;
$CustNo = '';
$EDate = '';
$ENotes ='';

$Destination ='';

$event_No = $_POST['EventNo'];
$CustNo = $_POST['CustNo'];
$EDate = $_POST['EDate'];
$ENotes = $_POST['ENotes'];
$Destination = $_POST['Destination'];
echo "D:".$Destination." ";


$Priority = $_POST['Priority'];

function changeV($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);
$v1 = str_replace(' ', '_', $v1);

$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";


$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.

return $v2;
}
$ENotes = changeV($ENotes);
//$Destination = changeV($Destination);
$Priority = changeV($Priority);
echo "D:".$Destination." ";


echo "Thank you for changing the event's details: ".$event_No." ".$CustNo ." ".$EDate ."."  ;

$event_NoInt = intval($event_No);
$query="update events set CustNo = '$CustNo', EDate ='$EDate',  
ENotes = '$ENotes', 
Destination = '$Destination', 
Priority = '$Priority' 
where EventNo = $event_NoInt";

mysqli_query($DBConnect, $query);
echo $query;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5'><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4>whoppeee SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_event_all.php'>view_event_all.php</a></a><br>";




echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
$eventInt = intval($event_NoInt);
$SQLString = "SELECT * FROM events WHERE EventNo = $eventInt";
//$SQLString = "SELECT * FROM events WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited event:</b></font>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["EventNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["EDate"];
$item5 = $row["Destination"];
$item6 = $row["ENotes"];

$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
//print "_R".$item4;
print "_".$item5;
print "_".$item6;
//print "_".$item7;
//print "_".$item8;
//print "_".$item9;
print "_".$item10;
}
$result->free();
}	echo "<br>";
//$mysqli->close();
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
?>
<form name="sdd" action="edit_eventCQ.php" method="post">


<input type="submit" name="btn_submit" value="Update next event" /> 
</form>
<!--
//$query="insert into events values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php

$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
?>

