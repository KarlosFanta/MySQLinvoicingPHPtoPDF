
<?php


	$page_title = "Select a transaction";
	require_once('header.php');	
//	require_once('db.php');	
	
	require_once('inc_OnlineStoreDB.php');	
	
	//PROCEDURAL
	//$link = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');

$query = "select distinct SupCode from expenses";
echo $query."<br>";
/*$result = mysql_query($query) or die(mysql_error());

if (!$result) {
    echo "Could not successfully run query ($query) from DB: " . mysql_error();
    exit;
}
//echo "<br>result:<br>".$result."<br><br>";
echo "<br><br>";
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
*/
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


//$query="insert into transaction (TransNo, CustNo, TransDate, Amtpaid, Notes, TMethod, InvNoA, InvNoAincl, InvNoB, InvNoBincl, InvNoC, InvNoCincl, InvNoD, InvNoDincl, InvNoE, InvNoEincl, InvNoF, InvNoFincl, InvNoG, InvNoGincl, InvNoH, InvNoHincl, Priority)
//values('$TransNo', '$CustNo', '$TransDate', '$AmtPaid', '$Notes', '$TMethod', $InvNoA, 
//$InvNoAincl, $InvNoB, $InvNoBincl, $InvNoC, $InvNoCincl, $InvNoD, $InvNoDincl, $InvNoE, $InvNoEincl, $InvNoF, $InvNoFincl, $InvNoG, $InvNoGincl, $InvNoH, $InvNoHincl, '$Priority')";
echo "<form name='EditExp' action='editExpProcess.php' method='post'>";


$ExpNo = '';
$ExpNo = $_GET['ExpNo'];
     echo "ExpNo ". $_GET['ExpNo']. ".";
$TN = 'expenses';
@$TN = @$_GET['TN'];
     echo "TN ". @$_GET['TN']. ".";

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
echo "<th>TN</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultE)) {
echo "<tr>";
echo "<th><input type='text' name='ExpNo' value='".$row["ExpNo"]."' size = 4></th>";
echo "<th><input type='text' name='Category' value='".$row["Category"]."' size = 7></th>";
echo "<th><input type='text' name='ExpDesc' value='".$row["ExpDesc"]."' size = 24></th>";
echo "<th><input type='text' name='SupCode' value='".$row["SupCode"]."' size = 5></th>";
echo "<th><input type='text' name='SerialNo' value='".$row["SerialNo"]."' size = 10></th>";
echo "<th><input type='text' name='PurchDate' value='".$row["PurchDate"]."' size = 9></th>";
echo "<th><input type='text' name='ProdCostExVAT' value='".$row["ProdCostExVAT"]."' size = 6></th>";
echo "<th><input type='text' name='Notes' value='".$row["Notes"]."' size = 14></th>";
echo "<th><input type='text' name='CustNo' value='".$row["CustNo"]."' size = 4></th>";
echo "<th><input type='text' name='InvNo' value='".$row["InvNo"]."' size = 4></th>";
echo "<th>".$TN."</th>";
$row_cnt = mysqli_num_rows($resultE);
echo "</tr>\n";

}
mysqli_free_result($resultE);
}

//mysqli_close($DBConnect);
echo "</table>";
echo " rows: $row_cnt"; //counter

//echo "<input type='text' name='TN' value='".$TN."' >";
echo "<input type='hidden' name='TN' value='".$TN."' >";


?>
<input type="submit" name="btn_submit" value="Update this expense" /> 
</form>

<br><br>
<a href = editExpQ.php>editExpQ.php</a>QuickEdit Basic all expenses
<br><br>
<br><br>
<a href = 'viewExpHEandExpCust.php'>viewExpHEandExpCust</a> all expenses of Customer Advanced View</br>
<br><br>
<br><br>
<b><font size = "4" type="arial"><a href = 'editExp2.php'>Edit expenses(E/H) of a supplier/category</a></b> </font>
</br>
</br>
<b><font size = "4" type="arial"><a href = 'editExpCQ.php'>Change expense to another customer</a> </b> </font>
</br>
</br>

<form name="EditTrans" action="edit_trans_process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select expense to be updated</option>";

<?php
echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
/*if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["SupCode"];
$item2 =  $row["CustNo"];
$item3 = $row["PurchDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["TMethod"];
$item7 = $row["InvNoA"];
print "<option value='$item1'>$item1";
print "_".$item2;
print "_".$item3;
print "_".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 


	}
$result->free();
//mysql_free_result($result);

}
 */
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Edit selected expense" /> 
	
</select></p>  


















<?php
/*
echo "<br>2ndWhile:<br><br>";
echo "<br>";
while($row=mysql_fetch_assoc($result))
{
echo '<option value = "'.$row['TransNo'].'">'.$row['TransFN'].'</option>';
}

*/


//$num=mysql_numrows($result);
//mysql_close();
//$i=0;
/*while($i<$num) {
$zone=mysql_result($result,$i,"zone");
$spot_name=mysql_result($result,$i,"spot_name");

echo "<option value="$spot_name">$spot_name</option>";

$i++;
*/
//

//echo "<br>3rdWhile:<br><br>";

/*
while($row = mysql_fetch_array($result)){
	echo "The max no TransNo in transaction table is:  ". $row[0];
	echo "&nbps;";
//$daNextNo = intval($row[0])+1;
}
*/

?>
