<?php	
	//require_once('header.php');	
		require_once("inc_OnlineStoreDB.php");

?>
<head>
<title>oldVAT</title>	
			 
</head>
<script type = "text/javascript">  
         function myFormat() {  
          td { font-size: 23px }
td.myfontsize { font-size: 23px ; }
table.myFormat tr td { font-size: 23px; }
         }  
</script>  
<form name="Edit_trans_CustProcess" action="print_statement.php" method="post">
<textarea cols =  85>
 <br>ACS Database info: <br>
transactions i started filling up in 2012 <br>
expenses I started filling up  in 2014 <br>
ExpensesE (extrea) in 2015 <br>
ExpensesH (Home/Private) in 2014 <br>
<br>

<?php
$TBLrow = "";
$TBLrow = $_GET['mydropdownEC'];
$TaxRate = "";
$TaxRate = $_GET['TaxRate'];
echo " ".$TBLrow." ";			 
$cy = "";
$cy = $_GET['cy']; //year selected
echo "<b>Ledger </b>&nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." &nbsp;&nbsp;&nbsp;SELECTED: $TBLrow $cy<BR />";
$Invsummm  = 0;
$yo = 0;
$Pad = 0;

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


if (@$in == '')
$in = @$_GET['in'];
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
$cyPLUS1year = $cy+1;
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
} elseif ($TBLrow == 'FinYear') {
	echo "<br><br><b>NB Selected Financial year NB Code may not be complete<br>
	Transactions where inputted as from 2011<br>
	And Expenses as from 2014 into the database<br><br></b>";
$s = "$cy-03-%' or $TableDateName LIKE '$cy-04-%'  or $TableDateName LIKE '$cy-05-%'  or $TableDateName LIKE '$cy-06-%'  or $TableDateName LIKE '$cy-07-%'  or $TableDateName LIKE '$cy-08-%'  or $TableDateName LIKE '$cy-09-%'  or $TableDateName LIKE '$cy-10-%'  or $TableDateName LIKE '$cy-11-%'  or $TableDateName LIKE '$cy-12-%'  or $TableDateName LIKE '$cyPLUS1year-01-%'  or $TableDateName LIKE '$cyPLUS1year-02-%";
}

//$SQLstring = "select * from transaction where $TableDateName LIKE '$s' order by $TableDateName ";
$SQLstring = "select * from transaction where $TableDateName LIKE '$s' order by TransDate";
//$SQLstring = "select * from transaction where $TableDateName LIKE 'DSIABLED' ";
//echo "<textarea>";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
echo "</textarea>";
$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
?><table style='font-family:"Calibri", Courier, monospace; font-size:100%; border:1px solid black;  border-collapse: collapse;'  class='myFormat'  >\n
<tr  style='border:1px solid black;' ><?php
//echo "<th>TransDate&nbsp;</th>";

//echo "<th>TM</th>";
echo "<th  style='border:1px solid black;' >TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate&nbsp;</th>";
echo "<th>AmtPaid</th>";
echo "<th>Accumulate</th>";
echo "<th>CustSDR</th>";
echo "<th>Notes</th>";
echo "</tr>\n";


    while ($row = mysqli_fetch_assoc($result)) {
			  echo "<tr  style='border:1px solid black;' >";
$TTT = $row['TransDate'];
$orderdate = explode('-', $TTT);
$m = $orderdate[1];
$d   = $orderdate[2];
$y  = $orderdate[0];
//echo "<th  style='font-weight:normal'>$d $m $y</th>\n";

//echo "<th  style='font-weight:normal'>".$row['TMethod']."</th>\n";
echo "<th  style='font-weight:normal'>Tr{$row['TransNo']}</th>";
echo "<th  style='font-weight:normal'>{$row['TransDate']}</th>\n";
$AP = floatval($row['AmtPaid']);
$AP = number_format($AP, 2, '.', '');
//echo "<th align = right>".number_format($AP, 2, '.', '')."</th>\n";
echo "<th  style='font-weight:normal' align = right> ".$AP."</th>\n";
$yo = $yo + $AP;
echo "<th align = right style='font-weight:normal' ></b></font><small>".$yo."</th>\n";
echo "<th  style='font-weight:normal'>".$row['CustSDR']."</th>\n";
echo "<th  style='font-weight:normal'>".$row['Notes']."</th>\n";
echo "</tr>\n";

    }

    mysqli_free_result($result);
}



echo "</table><br><br>";




$SQLstring = "select * from transaction where $TableDateName LIKE '$s' order by TMethod";
//$SQLstring = "select * from transaction where $TableDateName LIKE 'DSIABLED' ";
//echo "<textarea>";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
echo "</textarea>";
													
$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
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
echo "<th  style='font-weight:normal'>Tr{$row['TransNo']}</th>";
echo "<th  style='font-weight:normal'>{$row['TransDate']}</th>\n";
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

    }

    mysqli_free_result($result);
}



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', '')."";


echo "All transactions for $TBLrow $cy total to: R <font size = 20 >OUTPUT </font><input type = 'text'  style='font-size: 30pt' size = '8' value = '".number_format($yo, 2, '.', '')."'><br><br>";
echo "All transactions for 1 month $cy is about: (divided by 2) R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', '')."'><br><br>";






/*
if (($Invsummm - $yo) > 0.06)
echo "<b>Total Amount outstanding: R".number_format(($Invsummm - $yo), 2, '.', '')."</b><BR />";
else
if (($Invsummm - $yo) > -0.01)
echo "<b>Balance:R".number_format(($Invsummm - $yo), 2, '.', '')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".number_format(-($Invsummm - $yo), 2, '.', '')."</b><BR />";
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
} elseif ($TBLrow == 'FinYear') {
	echo "<br><br>NB Selected Financial year NB Code may not be complete<br><br><br>";
$s = "$cy-03-%' or $TableDateName LIKE '$cy-04-%'  or $TableDateName LIKE '$cy-05-%'  or $TableDateName LIKE '$cy-06-%'  or $TableDateName LIKE '$cy-07-%'  or $TableDateName LIKE '$cy-08-%'  or $TableDateName LIKE '$cy-09-%'  or $TableDateName LIKE '$cy-10-%'  or $TableDateName LIKE '$cy-11-%'  or $TableDateName LIKE '$cy-12-%'  or $TableDateName LIKE '$cyPLUS1year-01-%'  or $TableDateName LIKE '$cyPLUS1year-02-%";
}
//echo "<textarea>";
$SQLstring = "select * from expenses where $TableDateName LIKE '$s' order by $TableDateName ";
echo "EXPENSES (Stock/BusinessExp/ProductsSold):";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
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
echo "<th style='font-weight:normal'>ExpNo".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.14, 2, '.', '')."</th>";

//echo "<th>".$row['InvNo']."</th>";
$Pad = $Pad + $PEX;
echo "<th align = right>".$Pad."</th>\n";
echo "<th style='font-weight:normal'>".$row['Category']."</th>";
echo "<th style='font-weight:normal'>".$row['SerialNo']."</th>";
echo "<th style='font-weight:normal'>".$row['CustNo']."</th>";
echo "<th style='font-weight:normal'>".$row['Notes']."</th>";
echo "</tr>\n";

    }
    mysqli_free_result($result);
}



echo "</table><br><br>";


//echo "All invoices total to: R".number_format($Invsummm, 2, '.', '')."";


echo "All expenses for $TBLrow $cy total to: R".number_format($Pad, 2, '.', '')."ex VAT  R<input type = 'text'  size = '8' value = '".number_format($Pad*1.14, 2, '.', '')."'> incl VAT<br><br>";
echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2*1.14, 2, '.', '')."'><br><br>";















$SQLstring = "select * from expensesh where $TableDateName LIKE '$s' order by Category ";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadH  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
echo "<tr><th>HExpNo</th>";
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
echo "<th>H Exp".$row['ExpNo']."</th>";
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











$PadE  = '';

$PEX = '';
$SQLstring = "select * from expensesE where $TableDateName LIKE '$s' order by $TableDateName ";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
echo "<tr><th>E ExpNo</th>";
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
echo "<th>E Exp".$row['ExpNo']."</th>";
echo "<th><font color = green>".$row['ExpDesc']."</th>";
//echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEXf = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEXf, 2, '.', '');
echo "<th><font size = 1 color= grey>".$PEX."</th>";
echo "<th>".number_format($PEX*1.14, 2, '.', '')."</th>";

$PadE = floatval($PadE);

$PadE = $PadE + $PEXf*1.14; // this is in the while loop
echo "<th align = right  style='font-weight:normal'><small></b>".$PadE."</th>\n";

//echo "<th>".$row['InvNo']."</th>";
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






//echo "All invoices total to: R".number_format($Invsummm, 2, '.', '')."";

echo "All transactions for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($yo, 2, '.', '')."'><br><br>";
echo "All transactions for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($yo/2, 2, '.', '')."'><br><br>";

echo "All expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($Pad, 2, '.', '')."'><br><br>";
echo "All expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($Pad/2, 2, '.', '')."'><br><br>";


echo "All home expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($PadH, 2, '.', '')."'><br><br>";
echo "All home expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadH/2, 2, '.', '')."'><br><br>";


echo "All extra expenses for $TBLrow $cy total to: R<input type = 'text'  size = '8' value = '".number_format($PadE, 2, '.', '')."'><br><br>";
echo "All extra expenses for 1 month $cy is about: R<input type = 'text'  size = '8' value = '".number_format($PadE/2, 2, '.', '')."'><br><br>";



echo "<b>Profit including home expenses (not required for SARS):<br></b>";
$yo = floatval($yo);
$Pad = floatval($Pad);
$PadH = floatval($PadH);
$PadE = floatval($PadE);

echo "yo: ".$yo."&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Pad: ".$Pad."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "PadH: ".$PadH."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "PadE: ".$PadE."<br><br>";
//echo "PadE: ".$PadE."<br><br>";
//echo "PadE: ".$PadE."<br><br>";

$R = 0;
$R = '';
@$R = $yo - $Pad - $PadH - PadE;
echo "profit over 2 months: ".$R."<br><br>";
echo "profit over 1 month about: ".($R/2)."<br><br>";















$PEX = '';
$SQLstring = "select * from expensesE where PurchDate LIKE '$s' or PurchDate LIKE '$t' order by PurchDate ";
echo $SQLstring.">medical!<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
echo "<tr><th>E ExpNo</th>";
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
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.14, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.14;
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
echo $SQLstring." >petrol!<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$yo = 0;
$PadE  = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table class='myFormat'  border='0'>\n";
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
echo "<th style='font-weight:normal'>E ".$row['ExpNo']."</th>";
echo "<th style='font-weight:normal'><font color = green>".$row['ExpDesc']."</th>";
//echo "<th style='font-weight:normal'>".$row['SupCode']."</th>";
echo "<th style='font-weight:normal'>".$row['PurchDate']."</th>";
//echo "<th style='font-weight:normal'>".$row['ProdCostExVAT']."</th>";
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.14, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.14;
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
//$PIV = number_format($PEX*1.14 , 2, '.', '');
$PEX = floatval($row['ProdCostExVAT']);
$PEX = number_format($PEX, 2, '.', '');
echo "<th style='font-weight:normal'><font size = 1 color= grey>".$PEX."</th>";
echo "<th style='font-weight:normal'>".number_format($PEX*1.14, 2, '.', '')."</th>";


$PadE = $PadE + $PEX*1.14;
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



$selCat = "cellphone";
include "Ledger2newVATviewExpHpart.php";
$selCat = "clothes";
include "Ledger2newVATviewExpHpart.php";
$selCat = "food";
include "Ledger2newVATviewExpHpart.php";
$selCat = "internet";
include "Ledger2newVATviewExpHpart.php";
$selCat = "photos";
include "Ledger2newVATviewExpHpart.php";
$selCat = "private";
include "Ledger2newVATviewExpHpart.php";
echo "BankFee:<br>";
$selCat = "BankFee";
include "Ledger2newVATviewExpHpart.php";

echo "<br><br>Bankfee (small letters)kfee:<br>";
$selCat = "Bankfee";
include "Ledger2newVATviewExpHpart.php";

echo "BankFees: (plural so may not give any result)<br>";
$selCat = "BankFees";
include "Ledger2newVATviewExpHpart.php";

echo "carlicences<br>";
$selCat = "carlicences";
include "Ledger2newVATviewExpHpart.php";
echo "licence<br>";
$selCat = "licence";
include "Ledger2newVATviewExpHpart.php";







?>
 
 			

 