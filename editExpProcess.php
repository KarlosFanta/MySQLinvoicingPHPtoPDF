<?php	

	include('header.php');	
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection


echo "Doublecheck what the expense was:<br>";

$ExpNo = '';
$CustNo = '';
$InvNo ='';
$Category ='';
$ExpDesc ='';
$SupCode ='';
$SerialNo ='';
$Notes ='';
$PurchDate ='';
$ProdCostExVAT ='';
$TN = 'expenses';




$ExpNo = $_POST['ExpNo'];
$CustNo = $_POST['CustNo'];
$InvNo = $_POST['InvNo'];
$Category = $_POST['Category'];
$ExpDesc = $_POST['ExpDesc'];
$SupCode = $_POST['SupCode'];
$SerialNo = $_POST['SerialNo'];
$PurchDate = $_POST['PurchDate'];
$Notes = $_POST['Notes'];
$ProdCostExVAT = $_POST['ProdCostExVAT'];
$TN = @$_POST['TN'];



$Equery = "select * from $TN where ExpNo = $ExpNo";
echo $Equery;

if ($resultE = mysqli_query($DBConnect, $Equery)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Category</th>";
echo "<th>ExpDesc</th>";
echo "<th>SupCode</th>";
echo "<th>SerialNo</th>";
echo "<th>PurchDate</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";
echo "<th>InvNo</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultE)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
echo "<th>".$row["Category"]."</th>";
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["SupCode"]."</th>";
echo "<th>".$row["SerialNo"]."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
echo "<th>".$row["Notes"]."</th>";
echo "<th>".$row["CustNo"]."</th>";
echo "<th>".$row["InvNo"]."</th>";
$row_cnt = mysqli_num_rows($resultE);
echo "</tr>\n";

}
mysqli_free_result($resultE);
}

echo "</table>";



$query="update $TN set InvNo = '$InvNo', CustNo = '$CustNo',Category = '$Category',ExpDesc = '$ExpDesc',SupCode = '$SupCode',SerialNo = '$SerialNo',Notes = '$Notes',PurchDate = '$PurchDate' , ProdCostExVAT = '$ProdCostExVAT' where ExpNo = $ExpNo";

mysqli_query($DBConnect, $query);
echo $query;

printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) < 1)
 {echo "<FONT size = '5'><b>NOT successful  :-( <br>if zero then this expenseNumber does not exist in the first place<br>or there has been no changes</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
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









$Equery = "select * from $TN where ExpNo = $ExpNo";
echo $Equery;

if ($resultE = mysqli_query($DBConnect, $Equery)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Category</th>";
echo "<th>ExpDesc</th>";
echo "<th>SupCode</th>";
echo "<th>SerialNo</th>";
echo "<th>PurchDate</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";
echo "<th>InvNo</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultE)) {
echo "<tr>";
echo "<th>".$row["ExpNo"]."</th>";
echo "<th>".$row["Category"]."</th>";
echo "<th>".$row["ExpDesc"]."</th>";
echo "<th>".$row["SupCode"]."</th>";
echo "<th>".$row["SerialNo"]."</th>";
echo "<th>".$row["PurchDate"]."</th>";
echo "<th>".$row["ProdCostExVAT"]."</th>";
echo "<th>".$row["Notes"]."</th>";
echo "<th>".$row["CustNo"]."</th>";
echo "<th>".$row["InvNo"]."</th>";
$row_cnt = mysqli_num_rows($resultE);
echo "</tr>\n";

}
mysqli_free_result($resultE);
}

echo "</table>";



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
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
?>

