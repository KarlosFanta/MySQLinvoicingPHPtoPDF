<html>
<head>
<title>Add a expense</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script>

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
<!-- jquery required for copyToClipbrd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>

<?php	//this is "process_Trans.php"
$CustNo = '';
$PurchDate = '';				
$SupCode = '';
$Notes ='';
$TMethod = '';
$ItemA = 0;
$Aex = 0;
$Ain = '';
$Bin = '';
$Cin = '';
$Din = '';
$Ein = '';
$Fin = '';
$Gin = '';
$Hin = '';
$ItemB = 0;
$Bex = 0;
$ItemC = 0;
$Cex = 0;
$ItemD = 0;
$Dex = 0;
$ItemE = 0;
$Eex = 0;
$ItemF = 0;
$Fex = 0;
$ItemG = 0;
$Gex = 0;
$ItemH = 0;
$Hex = 0;
$ProofNo = '_';

$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";

//$TMethod = $_POST['TMethod'];

$InvNo1 = '';
$InvNo2 = '';
$InvNo3 = '';
$InvNo4 = '';
$InvNo5 = '';
$InvNo6 = '';
$InvNo7 = '';
$InvNo8 = '';
$AK = '';
$BK = '';
$CK = '';
$DK = '';
$EK = '';
$FK = '';
$GK = '';
$HK = '';
$ACustNo = '';
$ACustNo = $_POST['AC'];
$ACustNo = explode(",", $ACustNo);
$ACustNo = $ACustNo[0];

$PurchDate = '';
$PurchDate = $_POST['PurchDate'];

 $page_title = "You added an expense";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$ExpNo = 0;
$ExpNo = $_POST['ExpNo'];
$mydropdownINV  = '';
$mydropdownINV  = @$_POST['mydropdownINV'];
//echo "mydropdownINV: ".$mydropdownINV;
echo "<font size = 4>ExpNo <b>$ExpNo</b></font>";
if ($mydropdownINV != '_no_selection_')
{
	$V = explode ('_', $mydropdownINV);
	$InvNo1 = $V[0];


if ($InvNo1 == '')
	$InvNo1=$_POST['InvNo1'];

if ($InvNo1 != '')
	echo "<font size = 4> assigned to Invoice No $InvNo1 Purchase Date: $PurchDate</font>";
	
	
}
$CCSQL = "SELECT * FROM customer WHERE CustNo = $ACustNo";
//echo $CCSQL ;
if ($resultC = mysqli_query($DBConnect, $CCSQL)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustLNshort = substr($CustLN, 0, 12);
$CustEmail = $row["CustEmail"];

}
mysqli_free_result($resultC);
}
?>
<br>

<p id="p1">Exp<?php echo $ExpNo; 
if (@$InvNo1 != '')
	echo "	Inv$InvNo1$CustLNshort";   ?></p>

<button onclick="copyToClipboard('#p1')" required>Copy ExpNo to clipboard memory</button><!--works with javascript object function copyToClipboard( -->
<br>
<a href = "selectCustExp.php"> Click to add another expense</a>	<br><br>
<?php


if ($mydropdownINV != '_no_selection_')
{
	$V = explode ('_', $mydropdownINV);
	$InvNo1 = $V[0];


if ($InvNo1== '')
	$InvNo1=$_POST['InvNo1'];

if ($InvNo1 != '')	
	echo "<font size = 5>Invoice No $InvNo1  assigned to:<br></font> Inv$InvNo1";
	
	
}
//$pieces = explode(" ", $pizza);
//echo $pieces[0]; // piece1
else 
	$InvNo1 = $_POST['InvNo1'];



$InvNo2 = @$_POST['InvNo2'];
$InvNo3 = @$_POST['InvNo3'];
$InvNo4 = @$_POST['InvNo4'];
$InvNo5 = @$_POST['InvNo5'];
$InvNo6 = @$_POST['InvNo6'];
$InvNo7 = @$_POST['InvNo7'];
$InvNo8 = @$_POST['InvNo8'];
$AK = $_POST['AK'];
$BK = @$_POST['BK'];
$CK = @$_POST['CK'];
$DK = @$_POST['DK'];
$EK = @$_POST['EK'];
$FK = @$_POST['FK'];
$GK = @$_POST['GK'];
$HK = @$_POST['HK'];



$ItemA = '';
$Aex = '';
$AS = '';
$AN = '';
$ItemB = @'';
$Bex = @'';
$BS = '';
$BC = '';
$BN = '';
$ItemC = @'';
$Cex = @'';
$CS = '';
$CC = '';
$CN = '';
$ItemD = @'';
$Dex = @'';
$DS = '';
$DC = '';
$DN = '';
$ItemE = @'';
$Eex = @'';
$ES = '';
$EC = '';
$EN = '';
$ItemF = @'';
$Fex = @'';
$FS = '';
$FC = '';
$FN = '';
$ItemG = @'';
$Gex = @'';
$GS = '';
$GC = '';
$GN = '';
$ItemH = @'';
$Hex = @'';
$HS = '';
$HC = '';
$HN = '';



$ItemA = $_POST['ItemA'];
$ItemA = str_replace("'", "", $ItemA);
$Aex = $_POST['Aex'];
$AS = @$_POST['AS'];
$AN = $_POST['AN'];
$ItemB = @$_POST['ItemB'];
$ItemB = str_replace("'", "", $ItemB);
$Bex = @$_POST['Bex'];
$BS = @$_POST['BS'];
$BC = @$_POST['BC'];
$BN = @$_POST['BN'];
$ItemC = @$_POST['ItemC'];
$ItemC = str_replace("'", "", $ItemC);
								  
$Cex = @$_POST['Cex'];
$CS = @$_POST['CS'];
$CC = @$_POST['CC'];
$CN = @$_POST['CN'];
$ItemD = @$_POST['ItemD'];
$ItemD = str_replace("'", "", $ItemD);
								  
$Dex = @$_POST['Dex'];
$DS = @$_POST['DS'];
$DC = @$_POST['DC'];
$DN = @$_POST['DN'];
$ItemE = @$_POST['ItemE'];
$ItemE = str_replace("'", "", $ItemE);
$Eex = @$_POST['Eex'];
$ES = @$_POST['ES'];
$EC = @$_POST['EC'];
$EN = @$_POST['EN'];
$ItemF = @$_POST['ItemF'];
$Fex = @$_POST['Fex'];
$FS = @$_POST['FS'];
$FC = @$_POST['FC'];
$FN = @$_POST['FN'];
$ItemG = @$_POST['ItemG'];
$Gex = @$_POST['Gex'];
$GS = @$_POST['GS'];
$GC = @$_POST['GC'];
$GN = @$_POST['GN'];
$ItemH = @$_POST['ItemH'];
$Hex = @$_POST['Hex'];
$HS = @$_POST['HS'];
$HC = @$_POST['HC'];
$HN = @$_POST['HN'];

//$Priority = $_POST['Priority'];
$Priority = '.';

//$pieces = explode(" ", $pizza);
//echo $pieces[0]; // piece1


$BC = explode(",", $BC);
$BC = @$BC[0];
$CC = explode(",", $CC);
$CC = @$CC[0];
$DC = explode(",", $DC);
$DC = @$DC[0];
$EC = explode(",", $EC);
$EC = @$EC[0];
$FC = explode(",", $FC);
$FC = @$FC[0];
$GC = explode(",", $GC);
$GC = @$GC[0];
$HC = explode(",", $HC);
$HC = @$HC[0];




@$Ain = $_POST['Ain'];
@$Bin = $_POST['Bin'];
@$Cin = $_POST['Cin'];
@$Din = $_POST['Din'];
@$Ein = $_POST['Ein'];
@$Fin = $_POST['Fin'];
@$Gin = $_POST['Gin'];
@$Hin = $_POST['Hin'];
echo "Ain:".$Ain;
if ($Ain != '')
{
	$Aex = $Ain /1.15;
	//$Aex = number_format((float)$Aex, 2, '.', ''); 
	$Aex = sprintf('%0.2f', $Aex);
echo "<br>Ain divide by 1.15 gives $Aex  ";
}
if ($Bin != '')
{
	$Bex = $Bin /1.15;
	//$Bex = number_format((float)$Bex, 2, '.', ''); 
	$Bex = sprintf('%0.2f', $Bex);
echo "<br>Bin divide by 1.15 gives $Bex ";
}
if ($Cin != '')
{
	$Cex = $Cin /1.15;
	//$Bex = number_format((float)$Bex, 2, '.', ''); 
	$Cex = sprintf('%0.2f', $Cex);
echo "<br>Cin divide by 1.15 gives $Cex ";
}

if ($Din != '')
{
	$Dex = $Din /1.15;
	//$Dex = number_format((float)$Dex, 2, '.', ''); 
	$Dex = sprintf('%0.2f', $Dex);
echo "<br>Din divide by 1.15 gives $Dex";
}

if ($Ein != '')
{
	$Eex = $Ein /1.15;
	//$Eex = number_format((float)$Eex, 2, '.', ''); 
	$Eex = sprintf('%0.2f', $Eex);
echo "<br>Ein divide by 1.15 gives $Eex";
}

if ($Fin != '')
{
	$Fex = $Fin /1.15;
	//$Fex = number_format((float)$Fex, 2, '.', ''); 
	$Fex = sprintf('%0.2f', $Fex);
echo "<br>Fin divide by 1.15 gives $Fex";
}

if ($Gin != '')
{
	$Gex = $Gin /1.15;
	//$ex = number_format((float)$ex, 2, '.', ''); 
	$Gex = sprintf('%0.2f', $Gex);
echo "<br>Gin divide by 1.15 gives $Gex";
}

if ($Hin != '')
{
	$Hex = $Hin /1.15;
	//$ex = number_format((float)$ex, 2, '.', ''); 
	$Hex = sprintf('%0.2f', $Hex);
echo "<br>Hin divide by 1.15 gives $Hex";
}


$ExpNo = $_POST['ExpNo'];
//$CustNo = $_POST['CustNo'];
if ($ACustNo == 0)
echo "<br><font size = '5'>ERROR CUSTNo $ACustNo is zero  but Ok for private expense</FONT>";

//echo "CustNO: ".$CustNo;



$CustEmail = str_replace(';', '; ', $CustEmail);

$D1 = $PurchDate;
$D2 = explode("/", $D1);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$PurchDate = $D2[2]."-".$D2[1]."-".$D2[0];

echo $PurchDate;	 
$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8
$AS = @$_POST['AS'];
$AS = mysqli_real_escape_string($DBConnect, $AS); 
mb_convert_encoding($AS, "ISO-8859-1");
echo "CSR: $AS";
echo "CSR:special".htmlspecialchars($AS);
echo "CSR:htmlentities".htmlentities($AS);
$AS = str_replace("\xC2","SPACE",$AS);
$AS = str_replace(" ","SPACE",$AS);
$AS = str_replace("&nbsp;","SPACE",$AS);
echo "CSR:htmlentities".htmlentities($AS);

//$AS = ereg_replace("[^A-Za-z0-9\w\ &nbsp;]", "", $AS); //deprecated
echo "SPCYCSR: $AS";

$AS = preg_replace("/[\s_]/", "-", $AS);

mb_convert_encoding($AS, "UTF-8");

$AS = str_replace("SPACE","%20",$AS); //for mailto to work

echo " back to whitepace: $AS";


$SupCode = $_POST['SupCode'];
$Notes = @$_POST['Notes'];
//echo " notes:".$Notes ;
//$str = htmlentities('$Notes'); //causes a blank!
//$Notes = htmlspecialchars($Notes);
$charset = mysqli_character_set_name($DBConnect);
printf ("%s\n",$charset);
//$Notes = htmlspecialchars("$Notes", ENT_QUOTES);

//header( "Content-Type: text/html; charset=utf-8" );
/*$body = "begrüßen zu dürfen";
$g = "ben zu fen";
echo htmlentities( $body );
echo htmlentities( $g );
*/

/*htmlXspecialchars($Notes);
htmlXentities($Notes);
htmlX_entity_decode($Notes);
*/
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.


$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014



$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é","\xA0");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;","&nbsp;");
$Notes = str_replace($von, $zu, $Notes);  
$AS = str_replace($von, $zu, $AS);  
//echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); 
$AS = mysqli_real_escape_string($DBConnect, $AS); 
//dbl  backsl\and&hash# space (){}[]?//\\$%ö
//$Notes = preg_replace("/ö/","\xF6",$Notes); not working
//$Notes = preg_replace("/ö/","oe",$Notes); //WORKS!
$AS = preg_replace("/ö/","oe",$AS); //WORKS!
//iconv("UTF-8", "ISO-8859-1", $Notes); 
//$Notes = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $Notes); //  not working
//$Notes = addslashes($_POST[$Notes]);

//$Notes = mb_convert_encoding($Notes, 'ISO-8859-15', 'UTF-8'); //causes question marks for umlaute!



/*$Notes = preg_replace("/'/","_",$Notes);
///////$Notes = preg_replace("/ /","_",$Notes);
$Notes = preg_replace("/&nbsp;/","_",$Notes);
$Notes = str_replace(' ', '_', $Notes);
*/$AS = preg_replace("/'/","_",$AS);
$SupCode = preg_replace("/,/","",$SupCode);
$AS = preg_replace("/,/","",$AS);


$Notes = mysqli_real_escape_string($DBConnect, $Notes);




//echo "Thank you for adding the expense's details: ".$ExpNo." ".$CustNo ." ".$D1 ."."  ;

//$ExpNoInt = intval($ExpNo);

echo "<br><font size = 3>Expense No </font><input type='text' value = '$ExpNo'  size='4'> $AN , $ItemA, R$Aex";
if ($InvNo1 != '')
	echo " <font size = 4>assigned to InvoiceNo $InvNo1</font>";

echo "</font><br>";
if ($InvNo1 == '')
echo "<a href = 'addInvCsessDexp.php?CustNo=$ACustNo&ExpNo=$ExpNo'><b> Click to add new invoice for this expense</a>	<br><br>";
echo "<a href = 'StockUpdateChosen.php?CustNo=$ACustNo&ExpNo=$ExpNo'><b> Click to assign this expense to an existing invoice</a>	<br><br>";
echo "<a href = 'viewExpmyeditbasic.php?CustNo=$ACustNo&ExpNo=$ExpNo'><b> Made a mistake? Click here</a>	<br><br>";

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES               ( $ExpNo, $ACustNo, '$PurchDate', '$SupCode', '$AN', '$AS', '$ItemA', '$Aex','$AK', '$InvNo1' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: ExpNo <input type='text' value = '$ExpNo'  size='4'> $ItemA</font><br>a: $query<br>";



if ($ItemB != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES               ( $ExpNo, $BC, '$PurchDate', '$SupCode', '$BN', '$BS', '$ItemB', '$Bex', '$BK', '$InvNo2' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 3 color = green >insert success: ExpNo $ExpNo</font><br>b: $query<br>";

}



if ($ItemC != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES ( $ExpNo, $CC, '$PurchDate', '$SupCode', '$CN', '$CS', '$ItemC', '$Cex' , '$CK', '$InvNo3' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: ExpNo $ExpNo</font><br>c: $query<br>";

}



if ($ItemD != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES               ( $ExpNo, $DC, '$PurchDate', '$SupCode', '$DN', '$DS', '$ItemD', '$Dex', '$DK' , '$InvNo4') ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: ExpNo $ExpNo</font><br>d: $query<br>";

}



if ($ItemE != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES               ( $ExpNo, $EC, '$PurchDate', '$SupCode', '$EN', '$ES', '$ItemE', '$Eex', '$EK', '$InvNo5' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: ExpNo $ExpNo</font><br>e: $query<br>";

}



if ($ItemF != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo)
VALUES               ( $ExpNo, $FC, '$PurchDate', '$SupCode', '$FN', '$FS', '$ItemF', '$Fex', '$FK', '$InvNo6' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color = green >insert success: ExpNo $ExpNo</font><br>f: $query<br>";

}



if ($ItemG != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category, InvNo )
VALUES               ( $ExpNo, $GC, '$PurchDate', '$SupCode', '$GN', '$GS', '$ItemG', '$Gex', '$GK', '$InvNo7' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successfull!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4  color= green>insert success: ExpNo $ExpNo</font><br>g: $query<br>";

}



if ($ItemH != '')
{
$ExpNo++;

$query="insert into expenses (ExpNo, CustNo, PurchDate, SupCode, Notes, SerialNo, ExpDesc, ProdCostExVAT, Category , InvNo)
VALUES               ( $ExpNo, $HC, '$PurchDate', '$SupCode', '$HN', '$HS', '$ItemH', '$Hex', '$HK', '$InvNo8' ) ";
echo '</br>';
mysqli_query($DBConnect, $query);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into expenses NOT successfull!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4 color= green>insert success: ExpNo $ExpNo</font><br>h: $query<br>";

}

?><br><br>
</font>

<a href = 'viewExpHEandExpCust.php'>viewExpHEandExpCust</a> all expenses of Customer</br>
<a href = 'viewExpHEandExpD.php'>viewExpHEandExpD by Date</a></br>
<a href = 'viewExp.php'>viewExp only</a></br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>
<a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<a href = 'viewExpHmyedit.php'>viewExpHmyedit</a></br>
<a href = 'UnassignedCustStk.php'>UnassignedCustStk</a></br>
<a href = 'viewExpSelectCatg.php'>viewExpSelectCatg</a></br>
<a href = 'viewExpHEandExpCategory.php'>viewExpHEandExpCategory</a></br>

<a href = '../phpmyadmin/#PMAURL-3:sql.php?db=kc&table=expensese&server=1&target='>phpMyadmin</a></br>

<a href = "editExp.php">Edit Any Expenses </a></br></br>
<a href = 'selectCustAssignStk.php'>Assign Stock to a Customer</a></br>
<a href = 'selectCustAssignStkInv.php'>Assign Stock to Customer's invoice</a></br>

<br><br>
<?php

$CustInt =$ACustNo;
include "viewExpSameDay.php";
//include "viewExpCust.php";
include "viewExpCust2.php";
//include "viewExpCustMinimal.php";
include "viewExp.php";

//include "viewExpLatest.php";
?>
<a href = 'viewExpLatest.php'>viewExpLatest</a></br>









<?php



/*


//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($ExpNoInt);
$SQLString = "SELECT * FROM expenses WHERE ExpNo = $TransInt";
//$SQLString = "SELECT * FROM expenses WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited the expense:</b></font>

</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ExpNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["PurchDate"];
$item4 = $row["SupCode"];
$item5 = $row["Notes"];
$item6 = $row["SerialNo"];
//$item7 = $row["TMethod"];
$item8 = $row["ExpDesc"];
$item9 = $row["ProdCostExVAT"];
//$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
//print "_".$item7;
print "_".$item8;
print "_".$item9;
//print "_".$item10;
}
mysqli_free_result($result);
}
	


$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
	
//$file = "logaddtrans.php";
/*$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add transcaction:</b> <br>" .$query. ";<br/><br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = '$file.'><b>FILE WRITTEN </B>Check log file:</a> <br />";
*/	


$CustInt = $CustNo ;
?>


<form name="Editcust" action="selectCustExp.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="SupCode" value="<?php echo $SupCode ?>">
<input type = "hidden" name="PurchDate" value="<?php echo $PurchDate ?>">
<input type = "hidden" name="SupCode" value="<?php echo $SupCode ?>">

<a href = "selectCustExp.php"> Click to add another expense</a>	<br><br>
	
	<!--<input type = "submit" value = "Click to add another expense">-->


	

<?php
echo $query;
$ttttt = 0;

echo "<br><br>";
echo "Details: <br>";

echo "</b><table>";
echo "<tr><th align = 'left' >.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "</th></tr>";


if ($ItemA != '0')
{

$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemA";


if ($result = mysqli_query($DBConnect, $SQLINV)) {
 echo "<tr>";

 while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";

}
mysqli_free_result($result);
}
echo "</tr>";

}


if ($ItemB != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemB";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left' >Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($ItemC != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemC";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}



if ($ItemD != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemD";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;

echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($ItemE != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemE";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}



if ($ItemF != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemF";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($ItemG != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemG";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($ItemH != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE Item = $ItemH";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["Item"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>Item: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}


echo "</table>";
echo "Total: ".$ttttt."<br>";



$sptp = 'w';
//echo sptp;






 ?>
<font size= 2><b>
<a href='selectCustExp.php'>Click to add expense for another customer</a> or <input type = "submit" value = "Click to add expense for the same customer">
</font></b>





	<br><br>
	

	<br><br>

	
	

<br><br><br><br>
<script type="text/javascript">
function myFunction()
{

//location.href = "mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipt&body=<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>";
//var x = location.href;
//document.getElementById("demo").innerHTML=x;
}
</script>

<body onload="javascript:myFunction()">








