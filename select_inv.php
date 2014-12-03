<?php

	$page_title = "Select an invoice";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	
	//PROCEDURAL
	//$link = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');

@session_start();
//if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
$indesc = 8;

$CustInt = 0;
echo "CustNo".@$_SESSION['CustNo'];
$CN = @$_SESSION['CustNo'];
$CustInt = $CN;

if ($CustInt == 0)
$query = "select InvNo, CustNo, InvDate, Summary from invoice ORDER BY Invno DESC";
else
{
$query = "select InvNo, CustNo, InvDate, Summary from invoice where CustNo = $CustInt ORDER BY Invno desc ";
$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$CustInt'";
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
//print "_CNo: ".$item2C;
print "_".$item3C." ";
}}


//Check if customer has any invoices:
if ($result = mysqli_query($DBConnect, $query)) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    if ( $row_cnt == 0)
   printf("<br><b>This customer has %d invoices.</b>\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}




}




//echo "<br>".$query."<br>";
echo "<br>";










?>
<b><font size = "4" type="arial">Print the invoice</b></font>
</br>
</br>

<form name="EditInv" action="print_inv_process_lastC.php" method="post">
<!--<form name="EditInv" action="print_invoice.php" method="post">-->

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice to be printed</option>";

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
$item3 =  $row["Summary"];
echo " ".$item2." ".$item3;
$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$item2'";

/*if ($resultC = mysqli_query($DBConnect, $queryC)) {
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


print " <option>"; 
if ($result = mysqli_query($link, $query2)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];
}}


*/






if ($CustInt == 0)
{
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
//print "_CNo: ".$item2C;
print "_".$item3C." ";

}}
}


print " </option>"; 

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}

mysqli_free_result($result);

}
else


	echo $queryC;
/* close connection */
//$mysqli->close();
echo "item2: ".$item2 ."<br>";?>
<br>
	fnghn<input type="submit" name="btn_submit" value="Print selected invoice" /> 

</select></p>  


















<?php
echo "<br />view_inv_by_cust.php<br />";
include ("view_inv_by_cust.php");
//echo "<br />view_trans_by_cust.php<br />";
include ("view_trans_by_cust.php");

//echo "<BR />Invoices total to: R".$Invsummm."<br />";
//echo "All transactions total to: R".$yo."<br>";

//echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";




//echo "<br />view_inv_by_cust2.php<br />";
//include ("view_inv_by_cust2.php");

//echo "<BR />Invoices total to: R".$Invsummm."<br />";
//echo "All transactions total to: R".$yo."<br>";

//echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";

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
echo "qC:".$queryC;

?>
