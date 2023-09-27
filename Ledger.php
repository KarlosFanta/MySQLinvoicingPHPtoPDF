<?php


	$page_title = "Ledger";
	require_once('header.php');	


?>
<b><br><font size = "3" type="arial">Ledger</b></font>
</br>
</br>
<a href = 'LedgerApr2018s.php'><b>Click here to continue for the new VAT 1.15 single months</a></b><br>
(or double months: <a href = 'LedgerApr2018s.php'>Click here to continue for the new VAT 1.15</a>)</b><br>

<?php

?>
<form name='Ledger2' action='Ledger2.php' method='get'>
<br>
<?php
$cy = date('Y')-1; 
?>
Type in year:
<input  type="number" step="any" min="2010" max="2018"  name="cy" size = '5' value= "201" >
<br>
<a href = 'LedgerApr2018.php'><b>Click here to continue for the new VAT 1.15 and Financial Years above 2018</a></b>

<br>
Select months:
<select name='mydropdownEC' required>
<option value='FinYear'>FinYear</option>
<option value=''>Select Months</option>
<option value="JanFeb">JanFeb</option>
<option value='MarApr'>MarApr</option>
<option value='MayJun'>MayJun</option>
<option value='JulAug'>JulAug</option>
<option value='SepOct'>SepOct</option>
<option value='NovDec'>NovDec</option>
<option value='FinYear'>FinYear</option>
</select>

<br><br> <br>ACS Database info: <br>
transactions i started filling up in 2012 <br>
expenses I started filling up  in 2014 <br>
ExpensesE (extrea) in 2015 <br>
ExpensesH (Home/Private) in 2014 <br>
<br>

<!--How many invoices descriptions to display on the right:
<input type="text" name="indesc" value= "0" >(indesc)-->
<br>
<br>
 The tax rate was 14% until 31 March 2018<br>15% on 1st April 2018. <br>
 The problem is that my fin year ends end of Feb,  so be careful with 2018 finyear. 
 <br>
 <Br>
 Tax Rate: (14 or 15)<br>
<input type='taxrate' name='btn_submit' value='14' /><br>

<input type='submit' name='btn_submit' value='OLD VAT Submit' /><br>
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
Divide by 1.14 multiply by 0.14. (or 1.15 by 1April2018) The answer goes into (15)

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
