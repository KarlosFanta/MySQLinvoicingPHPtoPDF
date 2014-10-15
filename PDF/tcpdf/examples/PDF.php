<?php
// File name   : example_048.php  HTML tables and table headers
// Author: Nicola Asuni
// (c) Copyright: Nicola Asuni   Tecnick.com LTD    www.tecnick.com   info@tecnick.com

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nla Asuni
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information



require_once ('../../../inc_OnlineStoreDB.php');

$InvNo2 = 0;
$InvNo2 = $_POST['InvNo'];
$SDR = "0";
$SDR = $_POST['SDR'];
$TAmt = "0";
@$TAmt = $_POST['TAmt'];
@$Swap = $_POST['Swap'];
$L1 = "F:/_work/Customers";
$L1 = @$_POST['L1'];

$strD1 = '*';
$strD2 = '';
$strD3 = '*';
$strD4 = '*';
$strD5 = '*';
$strD6 = '*';
$strD7 = '*';
$strD8 = '*';

$strQ1 = '';
$strQ2 = '';
$strQ3 = '';
$strQ4 = '';
$strQ5 = '';
$strQ6 = '';
$strQ7 = '';
$strQ8 = '';
$Mex1 = '';
$Mex2 = '';
$Mex3 = '';
$Mex4 = '';
$Mex5 = '';
$Mex6 = '';
$Mex7 = '';
$Mex8 = '';
$XT1 = '';
$XT2 = '';
$XT3 = '';
$XT4 = '';
$XT5 = '';
$XT6 = '';
$XT7 = '';
$XT8 = '';



$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."</BR>";
if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {


$pdf->SetCreator(PDF_CREATOR);//makes no diff
$pdf->SetAuthor('CompanyName');
$uniqueid = 'CompanyNames Computers TAX Invoice No'.$InvNo2.' '.$rowI['Summary'];

$pdf->SetTitle(''.$uniqueid.'');
$Summary1 = $rowI['Summary'];

$pdf->SetSubject(''.$uniqueid.'');
$pdf->SetKeywords('');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING); //thisis the fance Example heading

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); //makes no differe

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();//required!


// create some HTML content
$html = <<<EOD
<input type="button" name="print" value="Print" onclick="print()" />

<br />
EOD;

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
//$pdf->Button('print', 30, 10, 'Print', 'printpage()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

//$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));



//$pdf->Write(0, 'no heading ', '', 0, 'L', true, 0, false, false, 0);

//$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$Dt1 = explode("-", $rowI['InvDate']);
$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];



		
$SQLstring = "select * from customer where CustNo = (select CustNo from invoice where InvNo = '$InvNo2')";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {   //Object oriented style
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

//echo "<tr><th>{$row[0]}</th>";

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
						
					
			
			
			
			

/**/
// -----------------------------------------------------------------------------








// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
//$pdf->SetFont('times', 'BI', 20, '', 'false');
//  $pdf->SetFont('times', 'BI', 10, '', 'false');
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="0" align="center">
 <tr nobr="true">
  <td width = "57%" ><font size="1" ></font><br /><font size="15" >CompanyName</font><br /><font size="1" ></font></td>
  <td width = "23%" align = "left"><font size="17" ></font><br /><font size="12" > DATE:</font></td>
  <td width = "*"  align = "left"><font size="17" ></font><br /><font size="12" >&nbsp; $TransDate</font></td>
 </tr>
 <tr nobr="true">
  <td ALIGN="LEFT"  ><FONT SIZE=12> VAT NO CompanyVATNo  <br>
 CopmanyAddrres<br>
 Tel: CompanyTelNo &nbsp;&nbsp;
 Cell:  CompanyCellNo<br>
 <A HREF="mailto:CompanyEmail@me.co.za">Email:  CompanyEmail@me.co.za</A></FONT>	
		
		</td>
  <td ALIGN="LEFT"><br /><br><FONT FACE="Arial, sans-serif" size = "12"> TAX INVOICE
			NO.
	
			</FONT></td>
  <td align = "LEFT"><br><br> <FONT FACE="Arial, sans-serif" size = "14">
			$InvNo2
						</FONT>
			  
  
  
  
  </td>
 </tr>
 <tr nobr="true">
  <td align = "left"><FONT SIZE=3> Customer: 
		
$strrepFN 
$strrepLN

<br> Email: $Email
			
			</FONT></td>
  <td align = "left"> Account No: 
						 
  </td>
  <td align = "left">&nbsp; &nbsp;&nbsp;$rowNULL</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
//echo $Summary1;
//echo $rowI['Summary'];
$html = 'Summary: '.$Summary1.' ';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// -----------------------------------------------------------------------------

$tbl = <<<EOD
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
	<td width="66%" colspan = "2" align="right"><input type="button" name="print" value="Print" onclick="print()" />
</td>
   <td width="22%" align="right">Invoice Total &nbsp;</td>
      <td width="*" align="right">R$IT2&nbsp; </td>
 </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

























	   //max lenght of totalSDR may be 30 chars long 
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
   <tr>
       <td align = "center" width="50%" >
   <FONT size = "11">
Recommended Beneficiary statement description(CR): <br /> $SDR <BR /><BR />

	Recommended statement description(DR): <br /> $SDR <BR /><BR />

Payments may be by cash, cheque or EFT.<br />
NB: For cash payments please make sure you have a receipt with my signature.<br />
   
	   </FONT>
	   
	   
	   </td>
       <td align = "center" width = "*">
	   
	   <font size="11" >
	   (EFT) Banking details:<BR />


<BR />
Account holder: CompanyName<br />
Bank: BankName<br />
Branch Code: BrCode (Universal branch number)<br />
(Other branch codes:  OtherBrCodes )<br />
Account Number: AccNo<br />
(Branch: BrName)<br />
 Type of Account: AccType<BR />


<BR />
Please send proof of payment to: <a href mailto: "CompanyEmail@me.co.za">CompanyEmail@me.co.za</a>
	   
	   
	   </font>
	   </td>
    </tr>
   <tr>
       <td align = "center">TERMS: <a href = http://TermsWebpage>TermsWebpage</a></td>
       <td  align = "center">Support: <br />
	   <a href = http://SupportPage>SupportPage</a></td>
    </tr>
 
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------


//Close and output PDF document
$uniqueid = "Invoice_No_{$InvNo2}_{$rowI['Summary']}.pdf";
//$pdf->Output('$uniqueid.pdf','F');
//$pdf->Output('$uniqueid.pdf','D');
//$pdf->Output('$uniqueid.pdf','I');
//$pdf->Output('','S'); //string
//$uniqueid = "C:/".$uniqueid;
$filelocation = str_replace('/', '\\', $L1);

//$pdf->Output($uniqueid,'F');

//$uniqueid2 = "C:\\".$uniqueid;
//echo $uniqueid2;
//$pdf->Output($uniqueid2,'F');

$uniqueidFL = $filelocation."\\".$uniqueid;
//echo $uniqueid2;
$pdf->Output($uniqueidFL,'F');
$pdf->Output($uniqueid,'D'); // you cannot add file location!


//$uniqueid3 = "http://localhost/".$uniqueid;
//echo "<br>".$uniqueid3;
//$pdf->Output($uniqueid3,'F'); // did not work

//echo "<br>".$uniqueid;
/*echo "uniqueid may  not have spaces: $uniqueid";
ob_start(); // at the beggining of your script
$html = ob_get_clean();
$html = 'your html content';
*/
$uniqueid = "Invoice_No_{$InvNo2}_{$rowI['Summary']}.pdf";
$uniqueid = "InvoiceNo.pdf";
//echo "if you get TCPDF ERROR: Some data has already been output, can't send PDF file";
/*
try these things:
//open 
//	public function Output($name='doc.pdf', $dest='I') {

ry to clean output buffer by using ob_clean()

or

Avoid printing spaces or any variable before outputting PDF content
*/



}} //my goodies!!
//============================================================+
// END OF FILE
//============================================================+
