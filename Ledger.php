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







<?php
if(file_exists('111confidential.php'))
    include '111confidential.php';
include "LedgerNotes.php";
?>

