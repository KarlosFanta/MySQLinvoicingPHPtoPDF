<?php


	$page_title = "Select a customer";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	


?>
<b><br><font size = "4" type="arial">DELETE Customer's Invoices</b></font>
</br>
</br>

<form name="Delcust" action="delInv_CustProcessC.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<?php
@session_start();
if (@$_SESSION['CustNo'] == "")  //works if session was destroyed

echo "<option value='_no_selection_'>Select Customer</option>";
else
{
$CustNo = $_SESSION['CustNo'];
$query = "select CustNo,  CustFN, CustLN from customer where CustNo = $CustNo";
echo $query;

if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$CustLN =  $row["CustLN"];
$CustFN = $row["CustFN"];
  }
echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."#".$CustLN."</option>";

}

}






$query = "select CustNo,  CustFN, CustLN from customer ORDER BY custLN";
echo $query;

echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$CustLN =  $row["CustLN"];
$CustFN = $row["CustFN"];
print "<option value='$item1'>";
print mb_substr($CustLN, 0, 25);
print "#";
print $item1;
print "$".mb_substr($CustFN, 0, 25);

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


















<?php
require_once ("view_inv_all.php");
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
