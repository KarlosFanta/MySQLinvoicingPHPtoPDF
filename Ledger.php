<?php


	$page_title = "Select a customer";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	
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
<b><br><font size = "3" type="arial">Ledger</b></font>
</br>
</br>


<?php
/*echo "<form name='Editcust' action='view_trans_CustProcessALL.php' method='post'>";
echo "<select name='mydropdownEC' onchange='this.form.submit()'>";
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

	}
$result->free();
//mysql_free_result($result);

}

echo "<input type='submit' name='btn_submit' value='select customer' /> </select>";
*/
?>
<form name='Ledger2' action='Ledger2.php' method='post'>
<br>
<?php
$cy = date('Y')-1; 
?>
Type in year:
<input type="text" name="cy" size = '4' value= "<?php echo $cy; ?>" >
<br>
<br>
Select months:
<select name='mydropdownEC'>
<option value='_no_selection_'>Select Months</option>
<option value="JanFeb">JanFeb</option>
<option value='MarApr'>MarApr</option>
<option value='MayJun'>MayJun</option>
<option value='JulAug'>JulAug</option>
<option value='SepOct'>SepOct</option>
<option value='NovDec'>NovDec</option>
</select>

<br><br>
<!--How many invoices descriptions to display on the right:
<input type="text" name="indesc" value= "0" >(indesc)-->
<br>
<br>

<input type='submit' name='btn_submit' value='Submit' /><br>
<br><br><br><br>

Submitted: 
2011 02<br>
2011 04<br>
2011 06<br>
TAX: 2014 verion1 issued overdue not submitted<br>
TAX: 2010 Verion1 Filed ITR12<br>
<br>
ProvTAX: 2011 1 IRP6<br>
ProvTAX: 2011 2 IRP6<br>
<br>
<br>
VAT201: 201404  R2600 3:20

Request MarApr2014: TAXPERIOD request 2014-04  for 2105 financial year<br>
<br><br>
Output incl VAT (confirmed payments received): goes into (1)<br><br>
<br>
Stock purchases 2months, CellC 2months, Teklom, NAVNIS, COZA, CAR Outsurance, Car, Bank fees, Cybersm 2months, Electricity <br><br>
Divide by 1.14 multiply by 0.14. The answer goes into (15)

not VAT: Petrol, RentR1500x2, medical, Private<br>
<br>
<br>
(15) only has the VAT postion of services provided to you or goods<br><br>
System will automatically calcualte intereset and penalty 10 percent on late payment.<br>
Don't worry if you leave it blank.<br>
Save, VAT profile UserNmber assume no1<br>
<br>
<a href= 'https://secure.sarsefiling.co.za' target='_blank'>https://secure.sarsefiling.co.za</a><br>





















<?php
include "LedgerNotes.php";
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
