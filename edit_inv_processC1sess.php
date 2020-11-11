<?php


	$page_title = "Select an invoice";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';
	 @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];

		/*$TBLrow = $_POST['mydropdownDC'];
	//echo $TBLrow;
	//echo " 0: ".$TBLrow[0]."<br>";
	//$Custno = explode( "_", $TBLrow);
	//echo "___:".$CustInt."   ";

$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."</br />";
//	echo " Selected Customer : ". $CustInt ."<br>";

//$query = "SELECT CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT CustNO, CustLN FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

*/


$query = "select InvNo, CustNo, InvDate, Summary from invoice where CustNo = $CustInt ORDER BY Invno desc";
echo $query."<br />";
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

<b><font size = "3" type="arial">Select an invoice for editing</b></font>
&nbsp;&nbsp;&nbsp;&nbsp;edit_inv_processC1sess.php<br></br>
</br>

<form name="EditInv" action="edit_inv_process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice to be updated</option>";

<?php
echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>";
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];

$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$item2'";
//echo "qC:".$queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
print "_CNo: ".$item2C;
print "_".$item3C." ";
}}
$item3 = $row["InvDate"];
$item4 = $row["Summary"];

print "_".$item2;
print "_".$item3;
print "_".$item4;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}

$result->free();
//mysql_free_result($result);

}	echo $queryC;
/* close connection */
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Update selected invoice" />

</select></p>


<?php
include ("view_inv_by_cust.php");
include ("view_event_by_cust.php");
include ("view_trans_by_cust.php");

?>















<?php
/*
echo "<br>2ndWhile:<br><br>";
echo "<br>";
while($row=mysql_fetch_assoc($result))
{
echo '<option value = "'.$row['InvNo'].'">'.$row['InvFN'].'</option>';
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
	echo "The max no InvNo in invoice table is:  ". $row[0];
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
