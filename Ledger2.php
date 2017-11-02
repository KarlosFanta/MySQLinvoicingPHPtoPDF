<?php	
	require_once('header.php');	
		require_once("inc_OnlineStoreDB.php");

?>
<form name="Edit_trans_CustProcess" action="print_statement.php" method="post">


<?php
echo "<b>Ledger </b>&nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." <BR />";
$Invsummm  = 0;
$yo = 0;
$Pad = 0;

$cy = "";
$cy = $_POST['cy']; //year selected
//echo "<input type='hidden' name='cy' value='".$cy."'>";
echo "Year: $cy ";
/*
$pm = "20";
$pm = @$_POST['pm']; //inv descriptions
//echo "pm:".$pm;
echo "<input type='hidden' name='pm' value='".$pm."'>";
$ev= "20";
$ev = @$_POST['ev']; //inv descriptions
echo "<input type='hidden' name='ev' value='".$ev."'>";
*/
$TBLrow = "";
$TBLrow = $_POST['mydropdownEC'];
echo " ".$TBLrow." ";

if (@$in == '')
$in = @$_POST['in'];
echo "<input type='hidden' name='in' value='".$in."'>";

if (@$indesc == '')
$indesc = @$_POST['indesc'];
echo "<input type='hidden' name='indesc' value='".$indesc."'>";
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];
echo "<input type='hidden' name='DisplayInvPdStatus' value='".$DisplayInvPdStatus."'>";

$CustNo = explode('_', $TBLrow );
$CustInt = intval($CustNo[0]);

$TableDateName = 'TransDate';

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($TBLrow == 'JanFeb') {
$s = "$cy-01-%' or $TableDateName LIKE '$cy-02-%";
} elseif ($TBLrow == 'MarApr') {
$s = "$cy-03-%' or $TableDateName LIKE '$cy-04-%";
} elseif ($TBLrow == 'MayJun') {
$s = "$cy-05-%' or $TableDateName LIKE '$cy-06-%";
} elseif ($TBLrow == 'JulAug') {
$s = "$cy-07-%' or $TableDateName LIKE '$cy-08-%";
} elseif ($TBLrow == 'SepOct') {
$s = "$cy-09-%' or $TableDateName LIKE '$cy-10-%";
} elseif ($TBLrow == 'NovDec') {
$s = "$cy-11-%' or $TableDateName LIKE '$cy-12-%";
}
$SQLstring = "select * from transaction where $TableDateName LIKE '$s' order by $TableDateName ";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Notes</th>";
echo "<th>Meth</th>";
echo "</tr>\n";


    while ($row = mysqli_fetch_assoc($result)) {
  //      printf ("%s (%s)\n", $row["TransNo"], $row["TransDate"]);
			  echo "<tr>";
echo "<th>{$row['TransNo']}</th>";
echo "<th>{$row['TransDate']}</th>\n";
$AP = floatval($row['AmtPaid']);
$AP = number_format($AP, 2, '.', '');
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
echo "<th align = right>".$AP."</th>\n";
$yo = $yo + $AP;
echo "<th align = right>".$yo."</th>\n";
echo "<th >".$row['Notes']."</th>\n";
echo "<th >".$row['TMethod']."</th>\n";
echo "</tr>\n";

    }

    mysqli_free_result($result);
}



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";


echo "All transactions for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($yo, 2, '.', ' ')."'><br><br>";
echo "All transactions for 1 month $cy is about: (divided by 2) R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', ' ')."'><br><br>";






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

$TableDateName = 'PurchDate';
if ($TBLrow == 'JanFeb') {
$s = "$cy-01-%' or $TableDateName LIKE '$cy-02-%";
} elseif ($TBLrow == 'MarApr') {
$s = "$cy-03-%' or $TableDateName LIKE '$cy-04-%";
} elseif ($TBLrow == 'MayJun') {
$s = "$cy-05-%' or $TableDateName LIKE '$cy-06-%";
} elseif ($TBLrow == 'JulAug') {
$s = "$cy-07-%' or $TableDateName LIKE '$cy-08-%";
} elseif ($TBLrow == 'SepOct') {
$s = "$cy-09-%' or $TableDateName LIKE '$cy-10-%";
} elseif ($TBLrow == 'NovDec') {
$s = "$cy-11-%' or $TableDateName LIKE '$cy-12-%";
}

$SQLstring = "select * from expenses where $TableDateName LIKE '$s' order by $TableDateName ";
echo "EXPENSES (Stock/BusinessExp/ProductsSold):";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>ProdCostinVAT</th>";
echo "<th>robot</th>";
echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>CustNo</th>";
echo "<th>Notes</th>";
echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
//echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th><font size = 1 color= grey>".$PEX."</th>";
echo "<th>".number_format($PEX*1.14, 2, '.', '')."</th>";

//echo "<th>".$row['InvNo']."</th>";
$Pad = $Pad + $PEX;
echo "<th align = right>".$Pad."</th>\n";
echo "<th>".$row['Category']."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "<th>".$row['CustNo']."</th>";
echo "<th>".$row['Notes']."</th>";
echo "</tr>\n";

    }

    /* free result set */
    mysqli_free_result($result);
}



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";


echo "All expenses for $TBLrow $cy total to: R".number_format($Pad, 2, '.', ' ')."ex VAT  R<input type = 'text'  size = '8' value = '".number_format($Pad*1.14, 2, '.', ' ')."'> incl VAT<br><br>";
echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2*1.14, 2, '.', ' ')."'><br><br>";















$SQLstring = "select * from expensesh where $TableDateName LIKE '$s' order by Category ";
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
//echo "<th>Category</th>";
echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['Category']."</th>";
echo "<th><font color = blue>".$row['ExpDesc']."</th>";
//echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th><font size = 1 color= grey>".$PEX."</th>";
echo "<th>".number_format($PEX*1.14, 2, '.', '')."</th>";
//echo "<th>".$row['Category']."</th>";





$PadH = $PadH + $PEX;
echo "<th align = right>".$PadH."</th>\n";

//echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "</tr>\n";

    }
    mysqli_free_result($result);
}
echo "</table><br><br>";












$PEX = '';
$SQLstring = "select * from expensesE where $TableDateName LIKE '$s' order by $TableDateName ";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  border='0'>\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc</th>";
echo "<th>PurchDate&nbsp;</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>ProdCostInVAT</th>";
echo "<th>robot</th>";
echo "<th>Category</th>";
echo "<th>SerialNo</th>";
echo "<th>Notes</th>";
echo "<th>CustNo</th>";

echo "</tr>\n";

    while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row['ExpNo']."</th>";
echo "<th><font color = green>".$row['ExpDesc']."</th>";
//echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th><font size = 1 color= grey>".$PEX."</th>";
echo "<th>".number_format($PEX*1.14, 2, '.', '')."</th>";



$PadE = $PadE + $PEX;
echo "<th align = right>".$PadE."</th>\n";

//echo "<th>".$row['InvNo']."</th>";
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
//echo "<th align = right>".$AP."</th>\n";
echo "<th>".$row['Category']."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "<th>".$row['Notes']."</th>";

echo "</tr>\n";

    }
    mysqli_free_result($result);
}
echo "</table><br><br>";




















//echo "All invoices total to: R".number_format($Invsummm, 2, '.', ' ')."";

echo "All transactions for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($yo, 2, '.', ' ')."'><br><br>";
echo "All transactions for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', ' ')."'><br><br>";

echo "All expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($Pad, 2, '.', ' ')."'><br><br>";
echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2, 2, '.', ' ')."'><br><br>";


echo "All home expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($PadH, 2, '.', ' ')."'><br><br>";
echo "All home expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadH/2, 2, '.', ' ')."'><br><br>";


echo "All extra expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($PadE, 2, '.', ' ')."'><br><br>";
echo "All extra expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadE/2, 2, '.', ' ')."'><br><br>";



$R = $yo - $Pad - $PadH - PadE;
echo "profit over 2 months: ".$R."<br><br>";
echo "profit over 1 month about: ".($R/2)."<br><br>";






?>
 
 			

 