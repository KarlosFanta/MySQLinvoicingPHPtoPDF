<?php


	$page_title = "Select a customer";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';
	//PROCEDURAL
	//$link = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');

$query = "select CustNo, CustFN, CustLN from customer ORDER BY custln";
//echo $query;
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






?>
<b><br><font size = "4" type="arial">View All Customer's Transactions</b></font>
</br>
</br>

<form name="Editcust" action="view_trans_CustProcessALL.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<?php
@session_start();
if (@$_SESSION['CustNo'] == "")  //works if session was destroyed

echo "<option value='_no_selection_'>Select Customer</option>";
else
echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";

echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>";
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2";
print "_".$item1;
print "_".$item3;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();
?>



<input type="submit" name="btn_submit" value="select customer" />

</select></p>
<br>

How many invoices of transaction  to display on the right:
<input type="text" name="in" value= "7" >(in)
<br>
<br>
How many invoices descriptions to display on the right:
<input type="text" name="indesc" value= "0" >(indesc)
<br>
<br><br>
<br>
Display invPd Status: Y/N
<input type="text" name="InvPdStatus"  value= "N"  >
<br>
Display trans priority: Y/N
<input type="text" name="pr" value= "N"   >(pr)
<br>
Display payment method: Y/N
<input type="text" name="pm" value= "N"   >(pm)
<br>
Display events: Y/N
<input type="text" name="ev" value= "Y"   >(ev)


















<?php
/*
echo "<br>2ndWhile:<br><br>";
echo "<br>";
while($row=mysql_fetch_assoc($result))
{
echo '<option value = "'.$row['CustNo'].'">'.$row['CustFN'].'</option>';
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
	echo "The max no CustNo in customer table is:  ". $row[0];
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
