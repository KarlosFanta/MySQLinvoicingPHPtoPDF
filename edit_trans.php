<?php


	$page_title = "Select a transaction";
require_once 'header.php';
//require_once 'db.php';

require_once 'inc_OnlineStoreDB.php';

	//PROCEDURAL
	//$link = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');

$query = "select TransNo, CustNo, TransDate, AmtPaid, Notes, TMethod, InvNoA from transaction ORDER BY TransNo";
//echo $query."<br>";
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

?>
<b><font size = "4" type="arial">Edit a transaction's Details</b></font>
</br>
</br>

<form name="EditTrans" action="edit_trans_process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select transaction to be updated</option>";

<?php
echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>";
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
$item2 =  $row["CustNo"];
$item3 = $row["TransDate"];
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

/*    echo $row["TransNo"];//case sensitive!
    echo $row["TransFN"];//case sensitive!
    echo $row["TransLN"];//case sensitive!
*/
	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Update selected transaction" />

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

<?php
/*echo "<br>4thWhile:<br><br>";
while ($row = mysql_fetch_array($result))
{
//$var_term;
 foreach($row as $item)
   {
      print "<option value='$item'>$item";
  print " </option>";
 }
}
*/
?>
