<?php

	include 'header.php';
require_once 'inc_OnlineStoreDB.php';//mysql connection and database selection
?>



<?php
$ExpNo = '';
$CustNo = '';
$InvNo ='';
$TBLrow = $_POST['mydropdownEC'];

echo "TBLrow: " .$TBLrow."</BR>";
$Expno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Invno</br />";
//$Invno = strtok(";");
//}
//echo "InvnozERO: ";
//echo $Invno[0]."</br />";
$ExpNo = intval($Expno[0]);

//$ExpNo = $_POST['EventNo'];
$CustNo = $_POST['CustNo'];
$InvNo = $_POST['InvNo'];

$query="update expenses set InvNo = '$InvNo' where ExpNo = $ExpNo";

mysqli_query($DBConnect, $query);
echo $query;

printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5'><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4>Update SUCCESS!</font>";

echo ";<br>";

echo "<a href = 'view_expenses_all.php'>view_expenses_all.php</a></a><br>";

echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
//$eventInt = intval($event_NoInt);
$SQLString = "SELECT * FROM expenses WHERE ExpNo = $ExpNo";
//$SQLString = "SELECT * FROM events WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited expense:</b></font>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ExpNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["InvNo"];
$item5 = $row["ExpDesc"];
$item6 = $row["SupCode"];

$item10 = $row["Notes"];
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
<form name="sdd" action="selectInvAssignStk.php" method="post">


<input type="submit" name="btn_submit" value="Update next expense" />
</form>
<!--
//$query="insert into events values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php

$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
?>

