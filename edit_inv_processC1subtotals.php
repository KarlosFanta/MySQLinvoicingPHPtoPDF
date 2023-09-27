<?php


	$page_title = "Select an invoice";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	

$CustInt = $_SESSION['CustNo'];
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


$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$CustInt'";
//echo "qC:".$queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
//print "_".$item1C;
//print "_CNo: ".$item2C;
//print "_".$item3C." ";
}}



?>
<b><font size = "4" type="arial">Edit <b> <font size = '5'><?php echo $item2C." ".$item3C; ?></font></b>'s invoice's Details or convert it to a Quotation</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</br>To edit invoice numbers: rather change the contents
</br>




<form name="EditInv" action="edit_inv_processsubtotals.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice to be updated or convert to a quote</option>";

<?php
$Iquery = "select InvNo, CustNo, InvDate, Summary, TotAmt, Draft from invoice where CustNo = $CustInt ORDER BY Invno desc";
echo $Iquery;



echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($rowI = mysql_fetch_assoc($result)) {
if ($resultI = mysqli_query($DBConnect, $Iquery)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$item1 = $rowI["InvNo"];
print "<option value='$item1'>$item1";
$item2 =  $rowI["CustNo"];


$item3 = $rowI["InvDate"];
$item4 = $rowI["Summary"];
$item5 = $rowI["TotAmt"];
$Draft = $rowI["Draft"];

print "_".$item2;
print "_".$item3;
print "_".$item4;
print "_R".$item5;
if ($Draft=='Y')
echo " DRAFT INVOICE";
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 

/*    echo $rowI["InvNo"];//case sensitive!
    echo $rowI["InvFN"];//case sensitive!
    echo $rowI["InvLN"];//case sensitive!
*/
	}

$resultI->free();
//mysql_free_result($resultI);

}	echo $queryC;
/* close connection */
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Update selected invoice" /> 
	
</select></p>  
</form>
<br>
or:<br>
<form name="in2" action="edit_inv_processsubtotals.php" method="post">
<input type="text" name="mydropdownEC" value="" /> 
<input type="submit" name="btnIO" value="Type in invoice number" /> 
</form>


<br>
or:<br>

<form name="EditInv" action="edit_inv_processC1C.php" method="post">
<input type="submit" name="btnIO" value="Click here to change invoice number" /> 
</form>

<?php
echo "for <b> <font size = '5'>".$item2C." ".$item3C."</font></b><br><br>";

$indesc = 8;
include ("view_inv_by_cust.php");
include ("view_trans_by_cust.php");
//include ("view_inv.php");
echo "<a href= 'view_inv.php'>View everyone's invoices: view_inv.php</a>";

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
