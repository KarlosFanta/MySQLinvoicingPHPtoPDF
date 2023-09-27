<?php	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
?>
<title>LinkInvoices</title>
<form name="er" action="SelectedInvoicesTransactionsToLink.php"  method="get">
<button type="submit" value="Save">Save</button>

<?php
//cy = "";
$CustNo = "";
$CustNo = $_GET['CustNo'];
if ($CustNo == '')
$CustNo = $_SESSION['CustNo']; 

$Notes = '';
//$myfileN = fopen("Ledger2newVATsNotes$TBLrow$cy.txt", "r") or die("Unable to create or open file!");
$myfileN = "LinkInvoicesCustNo$CustNo.txt";
$Notes = @file($myfileN)[0];
//$linesN = fgets($myfileN);//file in to an array
//$Notes = $linesN[0]; //line 2

$myFile = '';
$myFile = "LinkTransactionsCustNo$CustNo.txt";
$lines = @file($myFile);//file in to an array
//echo $lines[1]; //line 2
$pizza  = $lines[1];
$pieces = explode("NEXT", $pizza);


echo "<b>Select invoices and transaction into statement: </b>&nbsp;&nbsp;&nbsp; Statement Date: ".date("j M Y G:i")." &nbsp;&nbsp;&nbsp;Customer SELECTED: $CustNo<BR />";
$Invsummm  = 0;
$yo = 0;
$Pad = 0;

echo "<input type='hidden' name='CustNo' value='".$CustNo."'>";
//echo "<input type='hidden' name='mydropdownEC' value='".$TBLrow."'>";
//echo "Year: $cy ";
//echo " ".$TBLrow." ";

//echo "<font color= dark orange><input type='hidden' name='in' value='".$in."'>";

$TableDateName = 'TransDate';

//$QueryResult = @mysql_query($SQLstring, $DBConnect);


$SQLstring = "select * from transaction where CustNo = $CustNo order by TransDate";
//$SQLstring = "select * from transaction where TransDate  LIKE '$s' order by TransDate";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$yo = 0;

echo "<input type='text' name='Notes' value='".$Notes."'>";

?>

<font size = 3><b>PAYMENTS RECEIVED:</b><font size = 4><br>

<?php
$cnt = 0;
$x = 0;
$combine = '';
$mon = '';
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Accumulate</th>";
echo "<th>CustSDR</th>";
echo "<th>Notes</th>";
echo "<th>TM</th>";
echo "</tr>\n";


    while ($row = mysqli_fetch_assoc($result)) {
  //      printf ("%s (%s)\n", $row["TransNo"], $row["TransDate"]);
			  echo "<tr>";
			  if (in_array($row["TransNo"], $pieces))
  $mon = 'checked';
  
else
  $mon = 'unchecked';
			  
			  
echo "<th  style='font-weight:normal'><input type='checkbox' name= 'colour[]' value = '{$row['TransNo']}' $mon>{$row['TransNo']}</th>";//name= 'chkd$x'


$TD1  = $row['TransDate'];
$TD = explode("-", $TD1);


echo "<th  style='font-weight:normal'>".$TD[2]."/".$TD[1]."/".$TD[0]."</th>\n";
$AP = floatval($row['AmtPaid']);
$AP = number_format($AP, 2, '.', '');
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
echo "<th  style='font-weight:normal' align = right> ".$AP."</th>\n";
$yo = $yo + $AP;
echo "<th align = right style='font-weight:normal' ></b></font><small>".$yo."</th>\n";
echo "<th  style='font-weight:normal'>".$row['CustSDR']."</th>\n";
echo "<th  style='font-weight:normal'>".$row['Notes']."</th>\n";
echo "<th  style='font-weight:normal'>".$row['TMethod']."</th>\n";
echo "</tr>\n";
$x++;
$combine = $combine."NNNNN".$row['TransNo'];


    }
$cnt = mysqli_num_rows($result);

    mysqli_free_result($result);
}
echo "<input type='hidden' name='cnt' value='".$cnt."'>";
echo "<input type='hidden' name='combine' value='".$combine."'>";



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";


echo "Payments received for $CustNo: R<input type = 'text'  size = '8' value = '".number_format($yo, 2, '.', ' ')."'><br><br>";
//echo "All transactions for 1 month $cy is about: (divided by 2) R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', ' ')."'><br><br>";






/*
if (($Invsummm - $yo) > 0.06)
echo "<b>Total Amount outstanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
if (($Invsummm - $yo) > -0.01)
echo "<b>Balance:R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".number_format(-($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
//echo "</th></tr></table>";
//include ("view_inv_by_custPD.php");
*/


/*if ($TBLrow == 'JanFeb') {
$s = "$cy-01-%"; $t = "$cy-02-%";
} elseif ($TBLrow == 'MarApr') {
$s = "$cy-03-%"; $t = "$cy-04-%";
} elseif ($TBLrow == 'MayJun') {
$s = "$cy-05-%"; $t = "$cy-06-%";
} elseif ($TBLrow == 'JulAug') {
$s = "$cy-07-%"; $t = "$cy-08-%";
} elseif ($TBLrow == 'SepOct') {
$s = "$cy-09-%"; $t = "$cy-10-%";
} elseif ($TBLrow == 'NovDec') {
$s = "$cy-11-%"; $t = "$cy-12-%";
}
*/
$SQLstring = "select * from invoice where CustNo = $CustNo order by InvDate";
echo "<font size= 4 color= purple><b>Invoices  for $CustNo:<br><font size = 1>";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name 
?><button type="submit" value="Save">Save</button><?php

//$myFile = '';
//$myFile = "Ledger2newVATsE$TBLrow$cy.txt";
//@$lines = file($myFile);//file in to an array
//echo $lines[1]; //line 2
//$pizzaE  = $lines[1];
//$piecesE = explode("NEXT", $pizzaE);

if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Summary</th>";
echo "<th>InvDate&nbsp;</th>";
echo "<th>TotAmt<br></th>";
echo "<th>Draft</th>";
echo "<th>SDR</th>";
echo "<th>D1</th>";
echo "<th>D2</th>";
echo "<th>D3</th>";
echo "<th>D4</th>";
echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";

$monE = "unchecked";

/*	  if (in_array($row["InvNo"], $piecesE))
  $monE = 'checked';
  else
  $monE = 'unchecked';
*/
//echo "<th  style='font-weight:normal'><input type='checkbox' name= 'colourE[]' value = '{$row['TransNo']}' $mon>{$row['TransNo']}</th>";//name= 'chkd$x'

echo "<th style='font-weight:normal'><input type='checkbox'  name= 'colourE[]' value = '{$row['InvNo']}' $monE>".$row['InvNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Summary']."</th>";
$PD1  = $row['InvDate'];
$PD = explode("-", $PD1);


echo "<th  style='font-weight:normal'>".$PD[2]."/".$PD[1]."/".$PD[0]."</th>\n";

//echo "<th style='font-weight:normal'>".$row['InvDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['TotAmt']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
$PEX = floatval($row['TotAmt']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX." ";
//echo "</th><th style='font-weight:normal'>";
//echo "".number_format($PEX*1.15, 2, '.', '')."</th>";
echo "</th>";

//echo "<th style='font-weight:normal'>".$row['InvNo']."</th>";
//$Pad = $Pad + $PEX;
echo "<th align = right  style='font-weight:normal'><small>".$row['Draft']."ex</th>\n";
echo "<th style='font-weight:normal'>".$row['SDR']."</th>";
echo "<th style='font-weight:normal'>".$row['D1']."</th>";
echo "<th style='font-weight:normal'>".$row['D2']."</th>";
echo "<th style='font-weight:normal'>".$row['D3']."</th>";
echo "<th style='font-weight:normal'>".$row['D4']."</th>";
echo "</tr>\n";

    }

    mysqli_free_result($result);
}



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";


//echo "<font size = 3>Invoices for $CustNo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R".number_format($Pad, 2, '.', ' ')."ex VAT <b>AND</b>  R<input type = 'text'  size = '8' value = '".number_format($Pad*1.15, 2, '.', ' ')."'> incl VAT<br><br><font size = 1>";
//echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2*1.15, 2, '.', ' ')."'><br><br>";










//echo "!ROBOT PRICE RESETS ON EACH CATEGORY!<br><font size = 1>";
?><button type="submit" value="Save">Save</button><?php
//$SQLstring = "select * from expensesh where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by Category";
/*$SQLstring = "select * from expensesh where PurchDate LIKE '$s' order by Category";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadH  = 0; $currentCat = 'miau';

$myFile = '';
$myFile = "Ledger2newVATsEH$TBLrow$cy.txt";
@$lines = file($myFile);//file in to an array
//echo $lines[1]; //line 2
$pizzaEH  = $lines[1];
$piecesEH = explode("NEXT", $pizzaEH);



if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Category</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCost<br>ExInVAT</th>";
//echo "<th>ProdCostInVAT</th>";
echo "<th>robot</th>";
//echo "<th>Category</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');

if ($currentCat != $row['Category'])
       echo "<tr><th></b>&nbsp;</th></tr>";//new line 
		
echo "<tr>";

	  if (in_array($row["ExpNo"], $piecesEH))
  $monEH = 'checked';
  else
  $monEH = 'unchecked';

echo "<th style='font-weight:normal'><input type='checkbox'  name= 'colourEH[]' value = '{$row['ExpNo']}' $monEH>".$row['ExpNo']."</th>";


//echo "<th style='font-weight:normal'><input type='checkbox'>".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'>";	
	if ($currentCat != $row['Category'])
{
//echo "reset total $PadH to current  value<br>";
$PadH = $PEX;
}
echo $row['Category'];
if ($currentCat == $row['Category'])
{
	$PadH = $PadH + $PEX;
}
echo"</th>";
echo "<th style='font-weight:normal'><font color = blue>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
$PD1  = $row['PurchDate'];
$PD = explode("-", $PD1);


echo "<th  style='font-weight:normal'>".$PD[2]."/".$PD[1]."/".$PD[0]."</th>\n";

//echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
//$PEX = floatval($row['ProdCostExVAT']);
//$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX." ";
//echo "</th><th style='font-weight:normal'>";

echo number_format($PEX*1.15, 2, '.', '')."</th>";
//echo "<th style='font-weight:normal'>".$row['Category']."</th>";

//$PadH = $PadH + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small>".$PadH."ex</th>\n";
//$PEX = number_format($PEX, 2, '.', '');
echo "<th align = right  style='font-weight:normal'><small>".number_format($PadH*1.15, 2, '.', '')."in</th>\n";

//echo "<th>".$row['InvNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "</tr>\n";

$currentCat = $row['Category'];
    }
	mysqli_free_result($result);
}
echo "</table><br><br>";























echo "<br><font size= 4 color= #1f82bf><b>ExpensesH (HOME) for $TBLrow $cy:<br><font size = 1>";

//$SQLstring = "select * from expensesh where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by Category";
$SQLstring = "select * from expensesh where PurchDate LIKE '$s' order by Category";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadH  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Category</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>ProdCostInVAT</th>";
echo "<th>robot</th>";
echo "<th>Notes</th>";
echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th></th><th></th><th></th><th></th><th></th><th></th>";
//echo "<th style='font-weight:normal'>".$row['ExpNo']."</th>";
//echo "<th style='font-weight:normal'>".$row['Category']."</th>";
//echo "<th style='font-weight:normal'><font color = blue>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
//echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
//echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
//echo "<th style='font-weight:normal'>".number_format($PEX*1.15, 2, '.', '')."</th>";
$PadH = $PadH + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small>".$PadH."in</th>\n";

//echo "<th>".$row['InvNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "</tr>\n";

    }
    mysqli_free_result($result);
}
echo "</table><br><br>";


































echo "<font size= 4 color= #6e9231><b>ExpensesE  for $TBLrow $cy:<br><font size = 1>";
$PEX = '';
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by PurchDate ";
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' order by Category ";
echo "<font size = 1>";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostInExVAT</th>";
//echo "<th>ProdCostInVAT</th>";
echo "<th>robot.</th>";
echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";

echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th></th><th></th><th></th>";
//echo "<th style='font-weight:normal'>".$row['ExpNo']."</th>";
//echo "<th style='font-weight:normal'><font color = green>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX." ";
//echo "<th style='font-weight:normal'>";
echo " ".number_format($PEX*1.15, 2, '.', '')."</th>";



$PadE = $PadE + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small></b>".$PadE."in</th>\n";

//echo "<th style='font-weight:normal'>".$row['InvNo']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "<th style='font-weight:normal'>".$row['Category']."</th>";
echo "<th style='font-weight:normal'>".$row['SerialNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
echo "<th style='font-weight:normal'>".$row['CustNo']."</th>";

echo "</tr>\n";

    }
    mysqli_free_result($result);
}
echo "</table><br><br>";















echo "<br><font size= 4 color= #6e9231><b>ExpensesE (EXTRA) for $TBLrow $cy:<br><font size = 4>";

echo "!ROBOT PRICE RESETS ON EACH CATEGORY!<br><font size = 1>";

//$SQLstring = "select * from expensese where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by Category";
$SQLstring = "select * from expensese where PurchDate LIKE '$s' order by Category";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadH  = 0; $currentCat = 'miau';
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>Category</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCost<br>ExInVAT</th>";
//echo "<th>ProdCostInVAT</th>";
echo "<th>robot</th>";
//echo "<th>Category</th>";
echo "</tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');

if ($currentCat != $row['Category'])
       echo "<tr><th></b>&nbsp;</th></tr>";//new line 
		
echo "<tr>";
echo "<th style='font-weight:normal'><input type='checkbox'>".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'>";	
	if ($currentCat != $row['Category'])
{
//echo "reset total $PadH to current  value<br>";
$PadH = $PEX;
}
echo $row['Category'];
if ($currentCat == $row['Category'])
{
	$PadH = $PadH + $PEX;
}
echo"</th>";
echo "<th style='font-weight:normal'><font color = blue>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
$PD1  = $row['PurchDate'];
$PD = explode("-", $PD1);


echo "<th  style='font-weight:normal'>".$PD[2]."/".$PD[1]."/".$PD[0]."</th>\n";

//echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
//$PEX = floatval($row['ProdCostExVAT']);
//$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX." ";
//echo "</th><th style='font-weight:normal'>";

echo number_format($PEX*1.15, 2, '.', '')."</th>";
//echo "<th style='font-weight:normal'>".$row['Category']."</th>";

//$PadH = $PadH + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small>".$PadH."ex</th>\n";
//$PEX = number_format($PEX, 2, '.', '');
echo "<th align = right  style='font-weight:normal'><small>".number_format($PadH*1.15, 2, '.', '')."in</th>\n";

//echo "<th>".$row['InvNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "</tr>\n";

$currentCat = $row['Category'];
    }
	mysqli_free_result($result);
}
echo "</table><br><br>";

















//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";

/*echo "Transactions for $TBLrow $cy: R<input type = 'text'  size = '8' value = '".number_format($yo, 2, '.', ' ')."'><br><br>";
//echo "All transactions for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', ' ')."'><br><br>";

echo "Expenses for $TBLrow $cy: R<input type = 'text'  size = '8' value = '".number_format($Pad, 2, '.', ' ')."'><br><br>";
//echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2, 2, '.', ' ')."'><br><br>";


echo "Home expenses for $TBLrow $cy: R<input type = 'text'  size = '8' value = '".number_format($PadH, 2, '.', ' ')."'><br><br>";
//echo "All home expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadH/2, 2, '.', ' ')."'><br><br>";


echo "Extra expenses for $TBLrow $cy: R<input type = 'text'  size = '8' value = '".number_format($PadE, 2, '.', ' ')."'><br><br>";
//echo "All extra expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadE/2, 2, '.', ' ')."'><br><br>";

*/









/*

echo "<font size= 4 color= #6e9231>";

$PEX = '';
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by PurchDate ";
$SQLstring = "select * from expensesE where PurchDate LIKE '$s'  order by PurchDate ";
echo $SQLstring.">medical!<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>ProdCostInVAT</th>";
echo "<th>robot.</th>";
echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";

echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {

if ($row['Category'] == 'medical')
{
echo "<tr>";
echo "<th style='font-weight:normal'>".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'><font color = green>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.15, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small></b>".$PadE."</th>\n";

//echo "<th style='font-weight:normal'>".$row['InvNo']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "<th style='font-weight:normal'>".$row['Category']."</th>";
echo "<th style='font-weight:normal'>".$row['SerialNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
echo "<th style='font-weight:normal'>".$row['CustNo']."</th>";

echo "</tr>\n";
}
    }
    mysqli_free_result($result);
}
echo "</table><br><br>";




$PEX = '';
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by PurchDate ";
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' order by PurchDate ";
echo $SQLstring." >petrol!<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>ProdCostInVAT</th>";
echo "<th>robot.</th>";
echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";

echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {

if ($row['Category'] == 'petrol')
{
echo "<tr>";
echo "<th style='font-weight:normal'>".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'><font color = green>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.15, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small></b>".$PadE."</th>\n";

//echo "<th style='font-weight:normal'>".$row['InvNo']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "<th style='font-weight:normal'>".$row['Category']."</th>";
echo "<th style='font-weight:normal'>".$row['SerialNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
echo "<th style='font-weight:normal'>".$row['CustNo']."</th>";

echo "</tr>\n";
}
    }
    mysqli_free_result($result);
}


echo "<th></th>";
echo "<th style='font-weight:normal'><b>And now for oil:</b></th>";
echo "<th></th>";


$PadE = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
    while ($row = mysqli_fetch_assoc($result)) {
if ($row['Category'] == 'oil')
{
echo "<tr>";
echo "<th style='font-weight:normal'>".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'><font color = green>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.15 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.15, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.15;
echo "<th align = right  style='font-weight:normal'><small></b>".$PadE."</th>\n";

//echo "<th style='font-weight:normal'>".$row['InvNo']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "<th style='font-weight:normal'>".$row['Category']."</th>";
echo "<th style='font-weight:normal'>".$row['SerialNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
echo "<th style='font-weight:normal'>".$row['CustNo']."</th>";

echo "</tr>\n";
}
    }
    mysqli_free_result($result);
}

echo "</table><br><br>";
*/

?>

<!--</font><font size = 2 color = black face = arial></b>
<br>Display all H categories: </b></font></font></font></font></font></font></font></font></font></font></font></font>-->
<?php
/*
$SQLstring = "select DISTINCT Category from expensesh where PurchDate LIKE '$s' ";
//echo $SQLstring." <br><br>"; 
if ($result = mysqli_query($DBConnect, $SQLstring)) {
    while ($row = mysqli_fetch_assoc($result)) {
echo $row['Category']." &nbsp;&nbsp;";
}
    mysqli_free_result($result);
}

?><font size = 2 color = black face = arial></b>
<br>Display all E categories: </b></font></font></font></font></font></font></font></font></font></font>
<?php
$SQLstring = "select DISTINCT Category from expensesE  where PurchDate LIKE '$s'  ";
//echo $SQLstring." <br><br>"; 
if ($result = mysqli_query($DBConnect, $SQLstring)) {
    while ($row = mysqli_fetch_assoc($result)) {
echo $row['Category']." &nbsp;&nbsp;";
}
    mysqli_free_result($result);
}



$selCat = "cellphone";
//include "Ledger2newVATviewExpHparts.php ";
//$selCat = "clothes";
//include "Ledger2newVATviewExpHparts.php";
//$selCat = "food";
include "Ledger2newVATviewExpHparts.php";
$selCat = "internet";
include "Ledger2newVATviewExpHparts.php";
$selCat = "photos";
include "Ledger2newVATviewExpHparts.php";
$selCat = "private";
include "Ledger2newVATviewExpHparts.php";
echo "BankFee:<br>";
$selCat = "BankFee";
include "Ledger2newVATviewExpHparts.php";

echo "<br><br>Bankfee (small letters)kfee:<br>";
$selCat = "Bankfee";
include "Ledger2newVATviewExpHparts.php";

echo "BankFees: (plural so may not give any result)<br>";
$selCat = "BankFees";
include "Ledger2newVATviewExpHparts.php";

echo "carlicences<br>";
$selCat = "carlicences";
include "Ledger2newVATviewExpHparts.php";
echo "licence<br>";
$selCat = "licence";
include "Ledger2newVATviewExpHparts.php";
*/

//echo "<b><font color=  #de4664 size =3>Profit including home expenses (not required for SARS):<br></b>";
$yo = floatval($yo);
$Pad = floatval($Pad);
//$PadH = floatval($PadH);
//$PadE = floatval($PadE);

//echo "yo: ".$yo."&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "Pad: ".$Pad."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "PadH: ".$PadH."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "PadE: ".$PadE."<br><br>";
//echo "PadE: ".$PadE."<br><br>";
//echo "PadE: ".$PadE."<br><br>";

$R = 0;
$R = '';
//@$R = $yo - $Pad - $PadH - PadE;
//echo "profit of this month: ".$R."<br><br>";
//echo "profit over 1 month about: ".($R/2)."<br><br>";


?>
</form> 
 			

 