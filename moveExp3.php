<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>

<form name="sdd" action="moveExp4.php" method="post">


<?php
$exp = '';

$newTable = '';


$exp = $_POST['exp'];
echo "exp: <input type='text' name='exp'  value='$exp'  /><br>";
$exp2 = explode('_', $exp);
echo $exp;
$newTable = $_POST['newTable'];
$TableNameFrom = $_POST['TableNameFrom'];

echo "exp: <input type='text' name='exp'  value='$exp'  /><br>";
echo "TableNameFrom: <input type='text' name='TableNameFrom'  value='$TableNameFrom'  /><br>";
echo "newTable: <input type='text' name='newTable'  value='$newTable'  /><br>";


$exp2 = explode('_', $exp );

echo "<input type='text' name='TableNameFrom'  value='$TableNameFrom'  />";
$SQLString = "SELECT * FROM $TableNameFrom WHERE ExpNo = $exp2[0] and  ExpDesc = '$exp2[1]' ";
echo $SQLString;
/*$ExpNo = $exp2[0];
$Category = $exp2[1];
$ExpDesc = $exp2[2];
$SerialNo = $exp2[3];
$SupCode = $exp2[4];
$PurchDate = $exp2[5];
$ProdCostExVAT = $exp2[6];
$Notes = $exp2[7];
$Category = $exp2[8];
$CustNo = $exp2[9];
$InvNo = $exp2[10];*/
/*print "_".$ExpDesc;
print "_".$SerialNo;
print "_".$SupCode;
print "_".$PurchDate;
print "_".$ProdCostExVAT;
print "_".$Notes;
print "_".$CustNo;
print "_".$InvNo;
*/
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$ExpNo = $row["ExpNo"];
$Category =  $row["Category"];
$ExpDesc =  $row["ExpDesc"];
$SerialNo = $row["SerialNo"];
$SupCode = $row["SupCode"];
$PurchDate = $row["PurchDate"];
$ProdCostExVAT = $row["ProdCostExVAT"];
$Notes = $row["Notes"];
$CustNo = $row["CustNo"];
$InvNo = $row["InvNo"];

}
$result->free();
}	echo "<br>";


echo "Thank you for selecting the expense: ".$exp." new table:".$newTable."<br>"  ;

//$Trans_NoInt = intval($Trans_No);
$query="insert into $newTable (ExpNo, Category, ExpDesc, SerialNo, SupCode, PurchDate, ProdCostExVAT , Notes, CustNo,InvNo) VALUES ('$ExpNo', '$Category', '$ExpDesc', '$SerialNo', '$SupCode', '$PurchDate', '$ProdCostExVAT', '$Notes', '$CustNo', '$InvNo')";



//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
//echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $query);
echo $query;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5' color = 'red'><br><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoppeee SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";




echo '</br>';echo '</br>';
/*//php to sql does not understand semicolon. remove the semicolon!!!
//$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited transaction:</b></font>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;
}
$result->free();
}	echo "<br>";
//$mysqli->close();
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";

*/?>
<form name="sdd" action="edit_trans_CustProcessC.php" method="post">

<input type="submit" name="btn_submit" value="Click Next to delete item from old table" /> 
</form>
<?php


?>

