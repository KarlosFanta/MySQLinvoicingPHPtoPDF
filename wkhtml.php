<body bgcolor="#E6E6FA">
<?php
//PDF/tcpdf/examples/PDF.php
echo "create JPG file";
require_once 'inc_OnlineStoreDB.php';
$InvNo2 = 0;
$InvNo2 = $_POST['InvNo'];
$InvNo = $_POST['InvNo'];
$SDR = "0";
$SDR = $_POST['SDR'];
$TAmt = "0";
@$CustEmail = $_POST['CustEmail'];
@$Summary = $_POST['Summary'];
@$TAmt = $_POST['TAmt'];
@$Swap = $_POST['Swap'];
$L1F = "F:/_work/Customers";
$L1F = $_POST['L1'];
echo "&nbsp;&nbsp;L1F:  ".$L1F."<<br>";

$strD1 = '*';$strD2 = '';$strD3 = '*';$strD4 = '*';$strD5 = '*';$strD6 = '*';$strD7 = '*';$strD8 = '*';

$strQ1 = '';$strQ2 = '';$strQ3 = '';$strQ4 = '';$strQ5 = '';
$strQ6 = '';$strQ7 = '';$strQ8 = '';$Mex1 = '';$Mex2 = '';
$Mex3 = '';$Mex4 = '';$Mex5 = '';$Mex6 = '';$Mex7 = '';
$Mex8 = '';$XT1 = '';$XT2 = '';$XT3 = '';$XT4 = '';
$XT5 = '';$XT6 = '';$XT7 = '';$XT8 = '';

echo "Now we need to create an HTML file which gets converted to JPG";

$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."</BR>";
if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {


//$pdf->SetCreator(PDF_CREATOR);//makes no diff

//$pdf->SetTitle(''.$uniqueid.'');
$Summary1 = $rowI['Summary'];

// set font
//$pdf->SetFont('helvetica', 'B', 12);

// create some HTML content
$html = <<<EOD
<!--<input type="button" name="print" value="Print" onclick="print()" />-->

<br />
EOD;

// -----------------------------------------------------------------
$Dt1 = explode("-", $rowI['InvDate']);
$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];

$SQLstring = "select * from customer where CustNo = (select CustNo from invoice where InvNo = '$InvNo2')";

if ($result = $DBConnect->query($SQLstring)) {   //Object oriented style
    while ($row = $result->fetch_row()) {

if ($Swap == "N")
{
$strrepFN = Str_replace("_"," ", $row[1])." ";
//echo $row[1]; ///Cust FName
//echo " ";
$strrepLN =  Str_replace("_"," ", $row[2]);

//echo $row[2]; //CustLName
}
else
{
//swap around firstname with lastname:
$strrepFN =  Str_replace("_"," ", $row[2]). " ";

//echo $row[2]; ///Cust FName
//echo " ";
$strrepLN = Str_replace("_"," ", $row[1]);
//echo $row[1]; //CustLName

}


$Email = $row[5];// Cust Email FROM CUSTOMER TABLE!!!
$E = $row[5];
$Abbr = $row[13];
$rowNULL = $row[0];
}    // free result set
   $result->close();
}



$TAmt = $rowI['TotAmt'];
 //$TAmt = number_format ($TAmt, 2, ".", "");
$strD1 = strtr($rowI['D1'], array('_' => '&nbsp;')) ;
$strQ1= $rowI['Q1'];
$Mex1 = $rowI["ex1"];
$Mex1 = number_format ($Mex1, 2, ".", "");
$XT1 = 0;
$XT1 = $rowI["ex1"]*$rowI['Q1'];
$XT1 = number_format ($XT1, 2, ".", "");

if (($rowI['D2']) != '0')
{
$riD2 = $rowI['D2'];
//$arr1 = str_split($riD2);
$arr2 = str_split($riD2, 52);
foreach($arr2 as $value) {
$strD2= strtr($value, array('_' => '&nbsp;')) ;
 // echo "<br>";
}




$strQ2 = $rowI['Q2'];

			$Mex2 = $rowI["ex2"];

			$Mex2 = number_format ($Mex2, 2, ".", "");

	//		echo $Mex2;
			$XT2 = 0;
			$XT2 = $rowI["ex2"]*$rowI['Q2'];
			$XT2 = number_format ($XT2, 2, ".", "");
		//	echo $XT2;
}
//echo "<br>rowID3:".$rowI['D3']."<br>";
if (($rowI['D3']) != '0')
{
$strD3=  strtr($rowI['D3'], array('_' => '&nbsp;')) ;
$strQ3 = $rowI['Q3'];

			$Mex3 = $rowI["ex3"];

			$Mex3 = number_format ($Mex3, 2, ".", "");
			$XT3 = 0;
			$XT3 = $rowI["ex3"]*$rowI['Q3'];
			$XT3 = number_format ($XT3, 2, ".", "");
	//		echo $XT3;
}
else
$strD3= ' ';

if ($rowI['D4'] != '0')
{
$strD4 = strtr($rowI['D4'], array('_' => '&nbsp;')) ;
$strQ4 = $rowI['Q4'];
			$Mex4 = $rowI["ex4"];
			$Mex4 = number_format ($Mex4, 2, ".", "");

//			echo $Mex4;
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT4 = 0;
			$XT4 = $rowI["ex4"]*$rowI['Q4'];
			$XT4 = number_format ($XT4, 2, ".", "");
	//		echo $XT4;
}
else
$strD4= ' ';

	if ($rowI['D5'] != '0')
{
$strD5 =  strtr($rowI['D5'], array('_' => '&nbsp;')) ;

//			echo $rowI['D5'];

	$strQ5 =  $rowI['Q5'];

			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex5"];
			$Mex5 = $rowI["ex5"];
			$Mex5 = number_format ($Mex5, 2, ".", "");

		//	echo $Mex5;

			$XT5 = 0;
			$XT5 =  $rowI["ex5"]*$rowI["Q5"];
			$XT5 = number_format ($XT5, 2, ".", "");
//			echo $XT5;
}
else
$strD5= ' ';

if ($rowI['D6'] != '0')
{
$strD6 =  strtr($rowI['D6'], array('_' => '&nbsp;')) ;

$strQ6= $rowI['Q6'];
			$Mex6 = $rowI["ex6"];

			$Mex6 = number_format ($Mex6, 2, ".", "");

			$XT6 = 0;
			$XT6 = $rowI["ex6"]*$rowI['Q6'];
			$XT6 = number_format ($XT6, 2, ".", "");
}
else
$strD6= ' ';

if ($rowI['D7'] != '0')
{
$strD7 = strtr($rowI['D7'], array('_' => '&nbsp;')) ;

$strQ7 = $rowI['Q7'];
			$Mex7 = $rowI["ex7"];

			$Mex7 = number_format ($Mex7, 2, ".", "");

//			echo $Mex7;
			$XT7 = 0;
			$XT7 = $rowI["ex7"]*$rowI['Q7'];
			$XT7 = number_format ($XT7, 2, ".", "");
}
else
$strD7= ' ';

if ($rowI['D8'] != '0')
{
$strD8 =  strtr($rowI['D8'], array('_' => '&nbsp;')) ;
$strQ8 = $rowI['Q8'];
			$Mex8 = $rowI["ex8"];
			$Mex8 = number_format ($Mex8, 2, ".", "");

			$XT8 = 0;
			$XT8= $rowI["ex8"]*$rowI['Q8'];
			$XT8 = number_format ($XT8, 2, ".", "");
}
else
$strD8= ' ';

$ST = $rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"];
$ST2 = number_format ($ST, 2, ".", "");
		$VT = $ST*0.14;
		$VT2 = number_format ($VT, 2, ".", "");
//		echo "<input type='button' value='Print the invoice' //onclick='printpage()'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			//$IT= $ST*1.14;
			$IT2 = $TAmt;
			$IT2 = number_format ($TAmt, 2, ".", "");

if ($strD8 == '0&nbsp;')
$strD8 = '';

if ($strQ8 == '0')
$strQ8 = '';
if ($strQ7 == '0')
$strQ7 = '';
if ($strQ6 == '0')
$strQ6 = '';
if ($strQ5 == '0')
$strQ5 = '';
if ($strQ4 == '0')
$strQ4 = '';
if ($strQ3 == '0')
$strQ3 = '';
if ($strQ2 == '0')
$strQ2 = '';

if ($Mex8 == 0)
    $Mex8 = '';
if ($XT8  == 0)
$XT8 = '';

if ($strD7 == '0&nbsp;')
$strD7 = '';

if ($Mex7 == 0)
    $Mex7 = '';
if ($XT7  == 0)
$XT7 = '';

if ($strD6 == '0&nbsp;')
$strD6 = ' ';
if ($Mex6 == 0)
    $Mex6 = '';
if ($XT6  == 0)
$XT6 = '';

if ($strD5 == '0&nbsp;')
$strD5 = '';

if ($Mex5 == 0)
    $Mex5 = '';
if ($XT5  == 0)
$XT5 = '';

if ($strD4 == '0&nbsp;')
$strD4 = '';
if ($Mex4 == 0)
    $Mex4 = '';
if ($XT4  == 0)
$XT4 = '';

if ($strD3 == '0&nbsp;')
$strD3 = '';
if ($Mex3 == 0)
    $Mex3 = '';
if ($XT3  == 0)
$XT3 = '';

if ($strD2 == '0&nbsp;')
$strD2 = ' ';
if ($Mex2 == 0)
    $Mex2 = '';
if ($XT2  == 0)
$XT2 = '';

// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table  width="100%" cellpadding="2" cellspacing="0" border="1" >
 <tr>
  <td width = "57%" align = "left"><font size="3" ><b>CompanyName</b></font><br /></td>
  <td width = "23%" align = "left"><font size="3" > DATE:</font></td>
  <td width = "*"  align = "left"><font size="3" >&nbsp; $TransDate</font></td>
 </tr>

 <tr>
<td align = "left"><FONT SIZE=2>VAT NO VATNo<br>Addresss<br>
Tel:  &nbsp;&nbsp;Cell: <br>Email: </A></FONT></td>
<td align = "left"> <b><FONT FACE="Arial, sans-serif" size = "2">TAX INVOICE NO.</b>	</FONT></td>
<td align = "left"><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<FONT FACE="Arial, sans-serif" size = "2">$InvNo2</b></FONT></td>
</tr>

<tr>
<td align = "left"><FONT SIZE=3> Customer: $strrepFN $strrepLN<br> Email: $Email</FONT></td>
<td align = "left"> Account No: </td>
<td align = "left">&nbsp; &nbsp;&nbsp;$rowNULL</td>
</tr>
</table>
EOD;

$html = 'Summary: '.$Summary1.' ';

// -----------------------------------------------------------------------------

$tba = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">


<thead>
 <tr style="background-color:#FFFF9F;color:#000000;">
  <td width="66%" align="center">Description</td>
  <td width="10%" align="center">Qty</td>
  <td width="12%" align="center">Unit<br />ex VAT</td>
  <td width="*" align="center">Total<br />ex VAT</td>
 </tr>
</thead>


 <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD1</td>
  <td width="10%" align="center">$strQ1</td>
  <td width="12%" align="right">$Mex1&nbsp; </td>
  <td width="*" align="right">$XT1&nbsp; </td>
 </tr>
 <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD2</td>
  <td width="10%" align="center">$strQ2</td>
   <td width="12%" align="right">$Mex2&nbsp; </td>
      <td width="*" align="right">$XT2&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD3</td>
  <td width="10%" align="center">$strQ3</td>
   <td width="12%" align="right">$Mex3&nbsp; </td>
      <td width="*" align="right">$XT3&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD4</td>
  <td width="10%" align="center">$strQ4</td>
   <td width="12%" align="right">$Mex4&nbsp; </td>
      <td width="*" align="right">$XT4&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD5</td>
  <td width="10%" align="center">$strQ5</td>
   <td width="12%" align="right">$Mex5&nbsp; </td>
      <td width="*" align="right">$XT5&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD6</td>
  <td width="10%" align="center">$strQ6</td>
   <td width="12%" align="right">$Mex6&nbsp; </td>
      <td width="*" align="right">$XT6&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD7</td>
  <td width="10%" align="center">$strQ7</td>
   <td width="12%" align="right">$Mex7&nbsp; </td>
      <td width="*" align="right">$XT7&nbsp; </td>
 </tr>
  <tr nobr="true" width = "66%">
  <td width="66%" align="left">&nbsp;$strD8</td>
  <td width="10%" align="center">$strQ8</td>
   <td width="12%" align="right">$Mex8&nbsp; </td>
      <td width="*" align="right">$XT8&nbsp; </td>
 </tr>

 <tr nobr="true" width = "66%">
	<td width="66%" colspan = "2" align="center"></td>
   <td width="22%" align="right">Sub-Total &nbsp;</td>
      <td width="*" align="right">$ST2&nbsp; </td>
 </tr>


 <tr nobr="true" width = "66%">
	<td width="66%" colspan = "2" align="right"></td>
   <td width="22%" align="right">Plus 14% VAT&nbsp; </td>
      <td width="*" align="right">$VT2&nbsp; </td>
 </tr>
 <tr nobr="true" width = "66%">
	<td width="66%" colspan = "2" align="right"><!--<input type="button" name="print" value="Print" onclick="print()" />-->
</td>
   <td width="22%" align="right"><b>Invoice Total &nbsp;</b></td>
      <td width="*" align="right"><b>R$IT2</b>&nbsp; </td>
 </tr>

</table>
EOD;

	   //max lenght of totalSDR may be 30 chars long
$tbb = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
   <tr>
       <td align = "center" width="57%" >




	   <font size="3" >
	   Banking details:<BR />
Account holder: <br />
Bank: <br />
Universal branch code:  <br />
	   <font size="2" >
(Other branch codes:  )<br /></font>
 <font size="3" >Account Number: <br /></font>
 <font size="2" >(Branch:)<br />
 Type of Account: <BR />


<BR />
Please send proof of payment to: <a href mailto: "me@me.co.za">me@me.co.za</a>

	   </font>

	   </td>
       <td align = "center" width = "*">


	     <FONT size = "3">
<b>Recommended payment reference: <br /> $SDR <BR /><BR /></b>

Payments may be by cash, cheque or EFT.<br />
NB: For cash payments please make sure you have a receipt with my signature.<br />

	   </FONT>




	</td>
    </tr>
   <tr>
    <td align = "center">TERMS: <a href = http://></a></td>
       <td  align = "center">Support: <br />
	   <a href = http://></a></td>
    </tr>

</table>
EOD;

// -----------------------------------------------------------------------------


//Close and output PDF document

$uniqueid = "Invoice_No_{$InvNo2}_{$rowI['Summary']}.jpg";
//$pdf->Output('$uniqueid.pdf','F');
//$pdf->Output('$uniqueid.pdf','D');
//$pdf->Output('$uniqueid.pdf','I');
//$pdf->Output('','S'); //string
//$uniqueid = "C:/".$uniqueid;
$filelocation = str_replace('/', '\\', $L1F);

//$pdf->Output($uniqueid,'F');

//$uniqueid2 = "C:\\".$uniqueid;
//echo $uniqueid2;
//$pdf->Output($uniqueid2,'F');

$uniqueidFL = $filelocation."\\".$uniqueid;
//echo $uniqueid2;
//$pdf->Output($uniqueidFL,'F');

//$uniqueid3 = "http://localhost/".$uniqueid;
//echo "<br>".$uniqueid3;
//$pdf->Output($uniqueid3,'F'); // did not work

//echo "<br>".$uniqueid;
//$pdf->Output($uniqueid,'D'); // you cannot add file location!

}} //my goodies!!

$myFile = "1.html";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $tbl;
fwrite($fh, $stringData);
$stringData = $tba;
fwrite($fh, $stringData);
$stringData = $tbb;
fwrite($fh, $stringData);

fclose($fh);

function passthru_enabled() {
    $disabled = explode(', ', ini_get('disable_functions'));
    return !in_array('exec', $disabled);
}
if (passthru_enabled()) {
    echo "passthru is enabled";
} else {
    echo "passthru is disabled";
}
echo "&nbsp;&nbsp;";

//add php to your pATH variable.
error_reporting(-1);
ini_set('display_errors', 'On');

//exec("1.bat");
/*
cd\
cd c:\program files\wkhtmltopdf\bin
wkhtmltoimage 1.html C:\howzit.jpg
rem i could not write to htdocs folder.
*/

echo "<br>";echo "&nbsp;&nbsp;";
echo "filelocation:".$filelocation;
$command = 'wkhtmltoimage --width 574 --height 775 --quality 96 --zoom 1 1.html '.$filelocation.'\\'.$uniqueid;
echo "&nbsp;&nbsp;";//echo "<br>";
  ob_start();
  passthru($command);
//echo "<br>";
  $content = ob_get_clean();
echo "&nbsp;&nbsp;";
  echo "Command:".$command;
//echo "&nbsp;&nbsp;<br>";
  echo "content:".$content;
//echo "&nbsp;&nbsp;<br>";

//echo "<br>";echo "&nbsp;&nbsp;";// now save a copy of pic to locahost for preview.
//echo "filelocation:".$filelocation;
$command = 'wkhtmltoimage --width 574 --height 775 --quality 96 --zoom 1 1.html '.$uniqueid;
echo "&nbsp;&nbsp;";//echo "<br>";
  ob_start();
  passthru($command);
//echo "<br>";
  $content = ob_get_clean();
echo "&nbsp;&nbsp;";
  echo "Command:".$command;
//echo "<br>&nbsp;&nbsp;";
  echo "content:".$content;
echo "&nbsp;&nbsp;<br>";

?>
<img src =  <?php echo $filelocation.'\\'.$uniqueid; ?> > <?php echo $filelocation.$uniqueid; ?>

<?php


$fffl = $filelocation;

$filelocation = "file:///".$filelocation ;
strtr($filelocation, array('\\' => '/')) ;
echo "<br> <a href= '".$filelocation."' alt= 'Right-click in Ext App'>Open customer folder: ".$filelocation." </a> &nbsp;&nbsp;&nbsp; <br>";
//include 'invEmail.php';
?>
<font size = 3><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php if (@$Draft == 'Paid')
echo "PAID ";  ?>Invoice No <?php echo $InvNo; echo " ".$Summary?>&body="">  <!-- unfrotunately the body cannot handle HTML commands!!! -->
Click to EMail customer</a><br>
</font>
<br>
1preview:<br>
<img src =  <?php echo $uniqueid; ?> ><br><br><br><br><br>

<?php echo $uniqueid; ?>
<br><br>2preview the image:<br>
<img src =  <?php echo $filelocation.'\\'.$uniqueid; ?> > <?php echo $filelocation.'\\'.$uniqueid; ?>
<br><br>3preview the image:<br>
<br><img src =  <?php echo $fffl.'\\'.$uniqueid; ?> > <?php echo $fffl.'\\'.$uniqueid; ?>
<br><br>4Right-click to preview the image:<br>
<a href = "<?php echo $filelocation.'\\'.$uniqueid; ?>" > <?php echo $filelocation.'\\'.$uniqueid; ?> </a>
