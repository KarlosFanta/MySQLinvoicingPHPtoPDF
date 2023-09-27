<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>

<form name="sdd" action="moveExp3.php" method="post">


<?php
$exp = '';

$newTable = '';


$exp = $_POST['exp'];
echo $exp;
$newTable = $_POST['newTable'];
$TableNameFrom = $_POST['TableNameFrom'];
$exp2 = explode('_', $exp );

echo "exp: <input type='text' name='exp'  value='$exp'  />";
echo "expdesc: <input type='text' name='expd'  value='$exp2[1]'  /><br>";
echo "TableNameFrom: <input type='text' name='TableNameFrom'  value='$TableNameFrom'  /><br>";
echo "newTable: <input type='text' name='newTable'  value='$newTable'  /><br>";
$SQLString = "SELECT * FROM $TableNameFrom WHERE ExpNo = $exp2[0]";

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

$Trans_NoInt = intval($exp2[0]);
//$query="insert into $newTable (ExpNo, Category, ExpDesc, SerialNo, SupCode, PurchDate, ProdCostExVAT , Notes, CustNo,InvNo) VALUES ('$ExpNo', '$Category', '$ExpDesc', '$SerialNo', '$SupCode', '$PurchDate', '$ProdCostExVAT', '$Notes', '$CustNo', '$InvNo')";



//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
//echo '</br></br></br></br></br></br></br>';

//mysqli_query($DBConnect, $query);
//echo $query;

//mysqli_query($DBConnect, $isql);



echo '</br>';echo '</br>';
$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM $newTable WHERE ExpNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<font size = "2" type="arial">Check if Expense already in the new table:</b></font>
</br>
<?php


if ($result=mysqli_query($DBConnect,$SQLString))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("Result set has %d rows in $newTable.\n",$rowcount);
  echo "<br>";
  if ( $rowcount > 0)
  echo "<font size = 6 type=arial color = red>ERROR! There is already an expense here:<br>Exp No used up already in new table</font><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
else
  echo "<font size = 4 type=arial>Ok, we can go ahead to move: Click insert&delete</font><br>";
	
  // Free result set
  mysqli_free_result($result);
  }



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

$item1 = $row["ExpNo"];
$item2 =  $row["Category"];
$item3 = $row["ExpDesc"];
$item4 = $row["SerialNo"];
$item5 = $row["SupCode"];
$item6 = $row["PurchDate"];
$item7 = $row["ProdCostExVAT"];
$item8 = $row["Notes"];
$item9 = $row["CustNo"];
$item10 = $row["InvNo"];
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

$TransInt2 = $TransInt + 10;
$TransInt4 = $TransInt - 10;

$SQLString = "SELECT * FROM $newTable WHERE ExpNo > $TransInt4 and   ExpNo < $TransInt2";
$SQLString = "SELECT * FROM $newTable WHERE ExpNo = $TransInt";
echo $SQLString;echo "<br>";echo "<br>";


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

$item1 = $row["ExpNo"];
$item2 =  $row["Category"];
$item3 = $row["ExpDesc"];
$item4 = $row["SerialNo"];
$item5 = $row["SupCode"];
$item6 = $row["PurchDate"];
$item7 = $row["ProdCostExVAT"];
$item8 = $row["Notes"];
$item9 = $row["CustNo"];
$item10 = $row["InvNo"];
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
echo "<br>";
}
$result->free();
}	echo "<br>";
//$mysqli->close();
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";







?>


<input type="submit" name="btn_submit" value="Insert and Delete" /> 
</form>
