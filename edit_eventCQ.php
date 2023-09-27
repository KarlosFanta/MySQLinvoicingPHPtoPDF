<?php


	$page_title = "Select an event";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	
	//PROCEDURAL
	//$DBConnect = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');
	
		/*$TBLrow = $_POST['mydropdownDC'];
		
		if ($TBLrow != "")
		
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

*/
$item2 = '1';
@session_start();
/*if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
{
//echo "<option value='_no_selection_'>Select Customer</option>";
//include ('selectCust.php');
}
else
{
*/
$CustInt = "*";
$CustInt = @$_SESSION['CustNo'];
echo "Custint:".$CustInt;
//if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
//$CustInt = "*";  //Select all events of all customers.
//echo "Custint:".$CustInt;


//$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."</br />";
//	echo " Selected Customer : ". $CustInt ."<br>";

//$query = "SELECT CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT CustNO, CustLN FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

	
	
	

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



$query = "select EventNo, CustNo, EDate, ENotes, Priority FROM events where CustNo = $CustInt ORDER BY EventNo";

if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
$query = "select EventNo, CustNo, EDate, ENotes, Priority FROM events ORDER BY Priority desc";

echo $query;




?>
<b><font size = "4" type="arial">Edit the event's Details</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;action=edit_event_process.php
</br>Quickedit: <a href = "edit_eventCQM.php">edit_eventCQM.php</a>
</br>

<form name="Editevent" action="edit_event_process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select event to be updated</option>";

<?php


echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$item2'";
echo "qC:".$queryC;
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["EventNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];

if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "__".$item1C;
print "__CNo: ".$item2C;
print "__".$item3C." ";
}}
$item3 = $row["EDate"];
$item4 = $row["ENotes"];
$item5 = $row["Priority"];

print "__".$item2;
print "__".$item3;
print "__".$item4;
print "___".$item5;

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
<input type="submit" name="btn_submit" value="Update selected event" /> 
	
</select></p>  


<?php
$indesc = 8;
include ("edit_eventCQb.php");
//include ("view_inv_by_cust.php");
//include ("view_trans_by_cust.php");
//include ("view_inv.php");
//}
?>



