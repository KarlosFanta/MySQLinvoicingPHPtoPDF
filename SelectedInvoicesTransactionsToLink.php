<a href = "SelectedInvoicesTransactionsToLink.php?CustNo=1">SelectedInvoicesTransactionsToLink.php?CustNo=1</a>
<script>

</script>
<?php
$CustNo = "";
$CustNo = $_GET['CustNo'];
$txtfilename = "SelectedInvTrCustNo$CustNo.php?CustNo=$CustNo";
?>
or click: <a href = "<?php echo $txtfilename; ?>"><?php echo $txtfilename; ?></a>
<title>Selected Transactions and Invoices for Linking</title>
SelectedInvoicesTransactionsToLink.php<br><br>
<a href = 'SelInvsToLink.php?CustNo=<?php echo $CustNo; ?>'>NEXT: SelInvsToLink.php</a><br><br>
<a href = 'SelTransToLink.php?CustNo=<?php echo $CustNo; ?>'>NEXT: SelTransToLink.php</a><br><br>
<br>

<?php
//$Notes = $_GET['Notes'];
$myfile = fopen("Linking$CustNo.txt", "w") or die("Unable to create or open file!");
//fwrite($myfile, $Notes);
$txt = "\n";
//fwrite($myfile, $txt);//gives new line at end: optional
fclose($myfile);


echo "<b> </b>&nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." &nbsp;&nbsp;&nbsp; CustNo $CustNo <BR />";

$join ='';

if(isset($_GET['colour'])) {
    $name = $_GET['colour'];
	//print_r($name);
foreach (@$name as $colour){ 
//    echo $colour."<br />";
$join = $join.$colour."NEXT";
}
} else {
    echo "empty array, nothingr selected";
}
$myfile = fopen("LinkingTransactions$CustNo.txt", "w") or die("Unable to create or open file!");
$txt = "PaymentsReceived:\n";
fwrite($myfile, $txt);
$txt = "\n";
fwrite($myfile, $join);
fwrite($myfile, $txt);//gives new line at end: optional
fclose($myfile);

//echo "<br><br><a href = 'LinkingTransactions$CustNo.txt'>LinkingTransactions$CustNo.txt</a><br><br>";






//$myFile= 
$content= file("LinkingTransactions$CustNo.txt");
//echo "<br><br>";
//echo $content[1];
//echo "<br><br>";
//$lines = explode($content,'\n');//load string into array
$SecondLine = $content[1]; ///reads 2nd line of file
//echo "<br><br>SecondLine: ";
//echo $SecondLine;
//echo "<br><br>";

$array = explode('NEXT', $SecondLine);//load string into array
$Transarray = array_pop($array);  


if (end($array) == "") { 
    array_pop($array); 
}

//if (end($Transarray) == "") { 
//    array_pop($Transarray); 
//}

//echo '<pre>';  print_r($array); echo '</pre>';
//echo '<br>a0:';
// echo $array[0];
// echo 'end</br>';
//echo '<br>b'; 
//echo $array[1]; echo '</br>';
//echo '<br>'; echo $array[2] ; echo '</br>';






//echo "<br><br>";
$joinE ='';

if(isset($_GET['colourE'])) {

$nameE = $_GET['colourE'];
print_r($nameE);
foreach ($nameE as $colourE){ 
//    echo $colourE."<br />";
$joinE = $joinE.$colourE."NEXT";
}
echo $joinE;
}
else echo "empty arrarry2, nothing selected";

$myfileE = fopen("LinkingInvoices$CustNo.txt", "w") or die("Unable to create or open Efile!");
$txt = "invoices:\n";
fwrite($myfileE, $txt);
$txt = "\n";
fwrite($myfileE, $joinE);
fwrite($myfileE, $txt);//gives new line at end: optional
fclose($myfileE);

echo "<br><br><a href = 'LinkingInvoices$CustNo.txt'>LinkingTransactions$CustNo.txt</a><br><br>";




$InvContent= file("LinkingInvoices$CustNo.txt");
//echo "<br><br>";
//echo $InvContent[1];
//echo "<br><br>";
//$lines = explode($InvContent,'\n');//load string into array
$InvSecondLine = $InvContent[1]; ///reads 2nd line of file
//echo "<br><br>InvSecondLine: ";
//echo $InvSecondLine;
//echo "<br><br>";

//$Invarray = explode('NEXT', $InvSecondLine);//load string into Invarray
//$Invarray = array_pop($InvarrayM);  
//$Invarray = unset($InvarrayM[count($InvarrayM)-1];  

$Invarray = explode('NEXT', $InvSecondLine);//load string into array
$Invarray2 = array_pop($Invarray);  //this is so weird! it works even though it does not make any sense.




if (end($Invarray) == "") { 
    array_pop($Invarray); 
}
//echo '<pre>'; print_r($Invarray); echo '</pre>';
//echo '<br>a0:';
// echo $Invarray[0];
// echo 'end</br>';
//echo '<br>b'; 
//echo $Invarray[1]; echo '</br>';
//echo '<br>'; echo $Invarray[2] ; echo '</br>';



echo "Credits/payments selected for linking to invoices:<table border='2'>";
foreach($array as $values)
{

echo "<tr><td>";

echo "TransNo $values";

echo "</td></tr>";
}
echo "<br><br>";


echo "</table>";

echo "invoices selected for linking to tranactions/payments:<table border='2'>";


foreach($Invarray as $Invvalues)
{

echo "<tr><td>";

echo "InvNo $Invvalues";

echo "</td></tr>";
}
echo "<br><br>";


echo "</table>";

echo "<table border='2'>";



for($i=0;$i<(count($Invarray));$i++){
echo $Invarray[$i];
echo "<br>";
}





?>
 
 			

 