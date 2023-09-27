<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>

<form name="sdd" action="moveExp4.php" method="post">


<?php
$exp = '';

$TableNameFrom = '';


$exp = $_POST['exp'];
echo "exp: <input type='text' name='exp'  value='$exp'  /><br>";
$exp2 = explode('_', $exp);

echo $exp;
$TableNameFrom = $_POST['TableNameFrom'];

echo "exp: <input type='text' name='exp'  value='$exp'  /><br>";
echo "TableNameFrom: <input type='text' name='TableNameFrom'  value='$TableNameFrom'  /><br>";



$SQLString = "SELECT * FROM $TableNameFrom WHERE ExpNo = $exp2[0]";


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


echo "Thank you for selecting the expense: ".$exp." new table:".$TableNameFrom."<br>"  ;

//$Trans_NoInt = intval($Trans_No);
$query="delete from  $TableNameFrom where ExpNo = $exp2[0] and  ExpDesc = '$exp2[1]';
";



//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
//echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $query);
echo $query;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5' color = 'red'><br><b>NOT successful  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>DELETION SUCCESSFUL!!! :-)</font>";

echo ";<br>";

//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";




echo '</br>';echo '</br>';
$SQLString = "SELECT * FROM $TableNameFrom WHERE ExpNo = $exp2[0]";
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
}	echo "";



if ($result=mysqli_query($DBConnect,$SQLString))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("Result set has %d rows in $TableNameFrom.\n",$rowcount);
  echo "<br>";
  if ( $rowcount > 0)
  echo "<font size = 4 type=arial color = red>ERROR! There is already an expense here:</font><br>";
else
  echo "<font size = 4 type=arial>Successfully deleted</font><br>";
	
  // Free result set
  mysqli_free_result($result);
  }


?>
<!--<form name="sdd" action="edit_trans_CustProcessC.php" method="post">

<input type="submit" name="btn_submit" value="Update next transaction" /> 
</form>-->
<font size = 8>&nbsp;<a href = 'moveExp2.php?name=expensesH'>&nbsp;&nbsp;&nbsp;move next from expensesH</a><br>
<font size = 8>&nbsp;<a href = 'moveExp2.php?name=expensesE'>&nbsp;&nbsp;&nbsp;move next from expensesE</a><br>
<font size = 8>&nbsp;<a href = 'moveExp2.php?name=expenses'>&nbsp;&nbsp;&nbsp;move next from expenses</a><br>
<font size = 4>&nbsp;<a href = 'moveExp.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;move next </a>
<?php


?>

