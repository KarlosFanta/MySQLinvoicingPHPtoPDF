<body bgcolor="#E6E6FA">
<?php
// create new PDF document

//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

//$uniqueid = "Invoice_No_{$InvNo2}_{$rowI['Summary']}.jpg";

echo "create JPG file";
//$im = imagecreatetruecolor(120, 20);

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
echo "<br />L1F:  ".$L1F."<<br />";

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

$XT5 = '';
$XT6 = '';

$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."<br />";
if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {


$author = 'CompanyName';
$uniqueid = 'TAX Invoice No'.$InvNo2.' '.$rowI['Summary'];

$SetTitle =''.$uniqueid.'';
$Summary1 = $rowI['Summary'];
$SetSubject = ''.$uniqueid.'';
//$pdf->SetKeywords('');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING); //thisis the fance Example heading

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); //makes no differe

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
/*if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
require_once dirname(__FILE__.'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();//required!


// create some HTML content
*/
$html = <<<EOD
<input type="button" name="print" value="Print" onclick="print()" />

<br />
EOD;

// output the HTML content
//$pdf->writeHTML($html, true, 0, true, 0);
//$pdf->Button('print', 30, 10, 'Print', 'printpage()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

//$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

//$pdf->Write(0, 'no heading ', '', 0, 'L', true, 0, false, false, 0);

//$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$Dt1 = explode("-", $rowI['InvDate']);
$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];

$SQLstring = "select * from customer where CustNo = (select CustNo from invoice where InvNo = '$InvNo2')";
//echo $SQLstring."<br /><br />"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

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
$strD1 = strtr($rowI['D1'], array('_' => ' ')) ;
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
$strD2= strtr($value, array('_' => ' ')) ;
 // echo "<br />";
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
//echo "<br />rowID3:".$rowI['D3']."<br />";
if (($rowI['D3']) != '0')
{
$strD3=  strtr($rowI['D3'], array('_' => ' ')) ;
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
$strD4 = strtr($rowI['D4'], array('_' => ' ')) ;
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
$strD5 =  strtr($rowI['D5'], array('_' => ' ')) ;

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
$strD6 =  strtr($rowI['D6'], array('_' => ' ')) ;

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
$strD7 = strtr($rowI['D7'], array('_' => ' ')) ;

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
$strD8 =  strtr($rowI['D8'], array('_' => ' ')) ;
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

/*echo"</table>
<TABLE WIDTH=100% BORDER=1 CELLPADDING=2 CELLSPACING=0>
<COL WIDTH=90%>	<COL WIDTH=*>
        <TR>
        <th>";
            echo "<p align = 'right'>Sub-Total";
            echo "
        </th>
        <th><label>";
            //     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
            $ST = $rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
            $rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
            $rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"];
            $ST2 = number_format ($ST, 2, ".", "");
            echo $ST2;

            echo "
        </th>
    </TR>

    <TR>
        <th> <p align = 'right'>";
            echo "Plus 14% VAT";
            echo "
        </th>
        <th><label>";
            //     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
            $VT = $ST*0.14;
            $VT2 = number_format ($VT, 2, ".", "");
            echo $VT2;
            echo "
        </th>
    </TR>

        <TR>
        <th> <p align = 'right'>";
        echo "<input type='button' value='Print the invoice' onclick='printpage()'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            echo "Invoice Total";
            echo "
        </th>
        <th><label>";
            //     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->

            $IT= $ST*1.14;
            $IT2 = number_format ($IT, 2, ".", "");
            echo "R".$IT2;
            echo "
        </th>
    </TR>

/*

*/
// -----------------------------------------------------------------------------

$L2 = "";
$L3 = "";
$L4 = "";
$L5 = "";
$L6 = "";
$L7 = "";
$L8 = "";

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
//$pdf->SetFont('times', 'BI', 20, '', 'false');
//  $pdf->SetFont('times', 'BI', 10, '', 'false');
$tbl = <<<EOD
CompanyName                                              TAX INVOICE NO. $InvNo2
VAT NO VATNo                                          DATE: $TransDate
CompAddress
Tel: CompanyTel
Cell: CompanyCell
Email:  CompanyEmail@me.co.za

Customer: $strrepFN $strrepLN
Email:     $Email
Account No: $rowNULL


EOD;

//$pdf->writeHTML($tbl, true, false, false, false, '');
//echo $Summary1;
//echo $rowI['Summary'];
$html = 'Summary: '.$Summary1.' ';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');

// -----------------------------------------------------------------------------

$L1 = "R$XT1 ex VAT is: [$strQ1 x $strD1]";
/*$L3 = "R$XT3 ex VAT is: [$strQ3 x $strD3]";
$L4 = "R$XT4 ex VAT is: [$strQ4 x $strD4]";
$L5 = "R$XT5 ex VAT is: [$strQ5 x $strD5]";
$L6 = "R$XT6 ex VAT is: [$strQ6 x $strD6]";
$L7 = "R$XT7 ex VAT is: [$strQ7 x $strD7]";
$L8 = "R$XT8 ex VAT is: [$strQ8 x $strD8]";
*/
$LALL = $L1;
if ($strD2 != '')
$L2 = "R$XT2 ex VAT is: [$strQ2 x $strD2]";

if ($strD3 != '')
$L3 = "R$XT3 ex VAT is: [$strQ3 x $strD3]";
if ($strD4 != '')
$L4 = "R$XT4 ex VAT is: [$strQ4 x $strD4]";
if ($strD5 != '')
$L5 = "R$XT5 ex VAT is: [$strQ5 x $strD5]";
if ($strD6 != '')
$L6 = "R$XT6 ex VAT is: [$strQ6 x $strD6]";
if ($strD7 != '')
$L7 = "R$XT7 ex VAT is: [$strQ7 x $strD7]";
if ($strD8 != '')
$L8 = "R$XT8 ex VAT is: [$strQ8 x $strD8]";

//$LALL = $L1."
/*".$L2;
if ($strD3 != '')
$LALL = $L1.$L2.$L3;
if ($strD4 != '')
$LALL = $L1.$L2.$L3.$L4;
if ($strD5 != '')
$LALL = $L1.$L2.$L3.$L4.$L5;
if ($strD6 != '')
$LALL = $L1.$L2.$L3.$L4.$L5.$L6;
if ($strD7 != '')
$LALL = $L1.$L2.$L3.$L4.$L5.$L6.$L7;
if ($strD8 != '')
$LALL = $L1.$L2.$L3.$L4.$L5.$L6.$L7.$L8;
*/
$tblT = <<<EOD
Invoice details:

$L1
$L2
$L3

R$ST2      (Subtotal ex VAT)
R $VT2       (VAT at 14%)
R$IT2      Invoice Total incl VAT
EOD;

//$pdf->writeHTML($tbl, true, false, false, false, '');

       //max lenght of totalSDR may be 30 chars long
$tblR = <<<EOD


Recommended payment reference:  $SDR

NB: For cash payments please make sure you have a receipt with my signature.
(EFT) Banking details:

Account holder: AccName
Bank:
Branch Code: (Universal branch number)
(Other branch codes:  )
Account Number:
(Branch:)
Type of Account: <BR />

Please send proof of payment to:
TERMS:
EOD;

//$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------


//Close and output PDF document
$uniqueid = "Invoice_No_{$InvNo2}_{$rowI['Summary']}.jpg";
echo "called:<b> ".$uniqueid."</b>";

//$pdf->Output('$uniqueid.pdf','F');
//$pdf->Output('$uniqueid.pdf','D');
//$pdf->Output('$uniqueid.pdf','I');
//$pdf->Output('','S'); //string
//$uniqueid = "C:/".$uniqueid;
$filelocation = str_replace('/', '\\', $L1F);
echo "<br />f:  ".$filelocation."<<br />";
//$pdf->Output($uniqueid,'F');

//$uniqueid2 = "C:\\".$uniqueid;
//echo $uniqueid2;
//$pdf->Output($uniqueid2,'F');

$uniqueidFL = $filelocation."\\".$uniqueid;
echo "<br />u:  ".$uniqueidFL."<br />";
//echo $uniqueid2;
//$pdf->Output($uniqueidFL,'F');

//$uniqueid3 = "http://localhost/".$uniqueid;
//echo "<br />".$uniqueid3;
//$pdf->Output($uniqueid3,'F'); // did not work

//echo "<br />".$uniqueid;
//$pdf->Output($uniqueid,'D'); // you cannot add file location!

}
} //my goodies!!

$text = $tbl.$tblT.$tblR;
$im = imagecreatetruecolor(600, 650);
//$background = imagecolorallocate( $im, 255, 255, 255 );
//$text_colour = imagecolorallocate( $im, 170, 172, 172 );
//$line_colour = imagecolorallocate( $im, 128, 255, 0 );

$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 224, 224, 224);
$black = imagecolorallocate($im, 000, 000, 000);
//imagefilledrectangle($im, 0, 0, 399, 29, $white);
imagefilledrectangle($im, 0, 0, 699, 999, $white);//must be 1 pixel smaller than $im = imagecreatetruecolor(400, 130);

$font = 'arial.ttf';

// Add some shadow to the text
//imagettftext($im, 30, 0, 111, 121, $grey, $font, $text);

// Add the text
imagettftext($im, 10,       0,   20,            20,        $black,    $font, $text);
//                fontsize, scew, left margin, top margin, fontcolor, face,  text



//$text_color = imagecolorallocate($im, 233, 14, 91);
//imagestring($im, 1, 5, 5,  'A Simple TCrazyy ext String', $text_color);

// Save the image as 'simpletext.jpg'
imagejpeg($im, $uniqueid, 75);

imagejpeg($im, $uniqueidFL, 75);

// Output the image
//imagejpeg($im);

// Free up memory
imagedestroy($im);
$filelocation = "file:///".$filelocation ;
strtr($filelocation, array('\\' => '/')) ;
echo "<br /> <a href= '".$filelocation."' alt= 'Right-click in Ext App'>Open customer folder: ".$filelocation." </a> &nbsp;&nbsp;&nbsp; <br />";
//include 'invEmail.php';
?>
<font size=4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php if (@$Draft == 'Paid')
echo "PAID ";  ?>Invoice No <?php echo $InvNo; echo " ".$Summary?>&body="">  <!-- unfrotunately the body cannot handle HTML commands!!! -->
Click to EMail customer</a><br />
</font>
<br />

<br /><br />preview the image:<br />
<img src =  <?php echo $uniqueid; ?> >

