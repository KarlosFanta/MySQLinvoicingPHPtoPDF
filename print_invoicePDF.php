<?php

require 'Fpdf17/fpdf.php';

$InvNo2 = 0;
$InvNo2 = $_POST['InvNo'];
$SDR = "0";
$SDR = $_POST['SDR'];
$TAmt = "0";
@$TAmt = $_POST['TAmt'];
@$Swap = $_POST['Swap'];

class PDF extends FPDF {



        function BuildTable($header,$data) {

        //Colors, line width and bold font

		$InvNo2 = 0;
$InvNo2 = $_POST['InvNo'];
$SDR = "0";
$SDR = $_POST['SDR'];
$TAmt = "0";
@$TAmt = $_POST['TAmt'];
@$Swap = $_POST['Swap'];

        $this->SetFillColor(255,0,0);

        $this->SetTextColor(255);

        $this->SetDrawColor(128,0,0);

        $this->SetLineWidth(.3);

        $this->SetFont('','B');

        //Header

        // make an array for the column widths

        $w=array(85,40,15);

        // send the headers to the PDF document

        for($i=0;$i<count($header);$i++)

        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);

        $this->Ln();

        //Color and font restoration

        $this->SetFillColor(175);

        $this->SetTextColor(0);

        $this->SetFont('');

        //now spool out the data from the $data array

        $fill=true; // used to alternate row color backgrounds

        foreach($data as $row)

        {

        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);

        // set colors to show a URL style link

        $this->SetTextColor(0,0,255);

        $this->SetFont('', 'U');

        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill, 'http://www.oreilly.com');

        // restore normal color settings

        $this->SetTextColor(0);

        $this->SetFont('');

        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);

        $this->Ln();

        // flips from true to false and vise versa

        $fill =! $fill;

        }

        $this->Cell(array_sum($w),0,'','T');

        }

}



//connect to database

$connection = mysql_connect("localhost","root", "Itsmeagain007#");

$db = "kc";

mysql_select_db($db, $connection)

        or die( "Could not open $db database");

$InvNo2 = 0;
$InvNo2 = $_POST['InvNo'];
$SDR = "0";
$SDR = $_POST['SDR'];
$TAmt = "0";
@$TAmt = $_POST['TAmt'];
@$Swap = $_POST['Swap'];

$sql = 'SELECT * FROM invoice WHERE InvNo = 5608'; // WHERE InvNo = $InvNo2

$result = mysql_query($sql, $connection)

        or die( "Could not execute sql: $sql");

// build the data array from the database records.

While($row = mysql_fetch_array($result)) {

        $data[] = array($row['InvNo'], $row['D1'], $row['ex1'] );

}



// start and build the PDF document

$pdf = new PDF();

//Column titles

$header=array('Book Title','ISBN','Year');

$pdf->SetFont('Arial','',14);

$pdf->AddPage();

// call the table creation method

$pdf->BuildTable($header,$data);

$pdf->Output();

	//require_once 'db.php';//page567
		require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<?php


























$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."</BR>";

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
?>
	<TITLE>CompanyName's Computers TAX Invoice No <?php echo $InvNo2; echo " ".$rowI['Summary']?></TITLE>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="invoice.css" />

<script>
function printpage()
  {
  window.print()
  }
</script>
</HEAD>
<BODY >
<TABLE WIDTH=100% BORDER=0 CELLPADDING=2 CELLSPACING=0>
	<COL WIDTH=30*>
	<COL WIDTH=37*>
	<COL WIDTH=30*>
	<TR>
		<TH WIDTH=57%>
			<P LANG="en-GB" ALIGN=LEFT><FONT FACE="Arial, sans-serif"><FONT SIZE=4>CompanyName</FONT></FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Print the invoice" onclick="printpage()">
</P>
		</TH>
		<TH WIDTH=7%>
			<P LANG="en-GB" ALIGN=LEFT><FONT FACE="Arial, sans-serif" size = "2">DATE:</FONT></P>
		</TH>
		<TH WIDTH=*>
			<P LANG="en-GB" align = "left"><FONT FACE="Arial, sans-serif" size = "2">

			<?php //echo date("d.n.Y");
			$Dt1 = explode("-", $rowI['InvDate']);
//echo $Dt1[2]."____";

//echo $Dt1[0]."____";
//echo $Dt1[1]."____";
//$Dt2 = $_POST['Date1'];

//$Dt3 = $_POST['Date1'];

$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];

echo $TransDate;	 ?>

		</TH>
	</TR>
	<TR>
		<TH WIDTH=16%>
			<P LANG="en-GB" ALIGN=LEFT ><FONT SIZE=2><FONT FACE="Arial, sans-serif">
			VAT NO <br>

CompanyAddress<br>
Tel:  &nbsp;&nbsp;
Cell:  <br>
<A HREF="mailto:CompanyEmail@me.co.za">Email:  CompanyEmail@me.co.za</A></FONT></FONT></P>
		</TH>
		<TH WIDTH=21%>
			<P LANG="en-GB" ALIGN=LEFT><FONT FACE="Arial, sans-serif" size = "3">TAX INVOICE
			NO.

			</FONT>
		</TH>
		<TH WIDTH=13%>
			<P LANG="en-GB" align = "left"><FONT FACE="Arial, sans-serif" size = "4">
			<?php
			echo $InvNo2;
			?>
			</FONT><BR>
			</P>
		</TH>
	</TR>
	<TR>
		<TH WIDTH=16%>
			<P LANG="en-GB" ALIGN=LEFT STYLE="font-weight: normal"><FONT SIZE=3>Customer:

	<?php
//$InvNo = 0;
//$InvNo = $_POST['InvNo'];	//WARNIGN THIS IS CUSTOMER TABLE ONLY!  NOT THE INVOICE TABLE!!
			$SQLstring = "select * from customer where CustNo = (select CustNo from invoice where InvNo = '$InvNo2')";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {
//echo "<table width='100%' border='1'>\n";
//echo "<tr><th>CustNo</th>";
//echo "<th>CustFn</th>";
//echo "<th>CustLN Surname</th>";
//echo "<th>CustTel</th>";
//echo "<th>CustCell</th>";
//echo "<th>CustEmail</th>";
//echo "<th>CustAddr</th>";
//echo "<th>Distance</th>";
//echo "<th>LastLogin</th>";
//echo "<th>CustPW</th></tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

//echo "<tr><th>{$row[0]}</th>";

if ($Swap == "N")
{
echo Str_replace("_"," ", $row[1]);
//echo $row[1]; ///Cust FName
echo " ";
echo Str_replace("_"," ", $row[2]);

//echo $row[2]; //CustLName
}
else
{
echo Str_replace("_"," ", $row[2]);

//echo $row[2]; ///Cust FName
echo " ";
echo Str_replace("_"," ", $row[1]);

//echo $row[1]; //CustLName

}

echo "<br>Email: ";
//echo "{$row[3]}";
//echo "<th>{$row[3]}</th>";
//echo "{$row[4]}";
echo "{$row[5]}";// Cust Email FROM CUSTOMER TABLE!!!
$E = $row[5];
//echo "{$row[6]}";
//echo "<th>{$row[7]}</th>";
//echo "<th>{$row[8]}</th>";
//echo "<th>{$row[9]}</th></tr>\n";
//$P = $row[9];
/*echo "row5: {$row[5]}";
echo "row6: {$row[6]}";
echo "row7: {$row[7]}";
echo "row8: {$row[8]}";
echo "row9: {$row[9]}";
echo "row10: {$row[10]}";
echo "row11: {$row[11]}";
echo "row12: {$row[12]}";
echo "row13: {$row[13]}";
*/
$Abbr = $row[13];
?>



			</FONT></P>
		</TH>
		<TH WIDTH=22%>
			<P LANG="en-GB" align = "left">
			Account No:

			</P>
		</TH>
		<TH WIDTH=17%>
			<P LANG="en-GB" align = "left"><?php echo "{$row[0]}";
		}
    /* free result set */
    $result->close();

			?><BR>
			</P>
		</TH>
	</TR>

</TABLE>
<BR />
Summary: <?php
//echo $rowI['Summary'];
//$earlySDR = 'acc'.$CustNo.' inv'.$InvNo.' '.$Summary;
//echo "{$row[0]}";
//echo "inv".{$rowI[InvNo]};

/*echo $Abbr;
echo ',acc';
echo $rowI['CustNo'];
echo ',inv';
echo $rowI['InvNo'];
echo ",";
echo $rowI['Summary'];
*/
echo $SDR;
?>


&nbsp;&nbsp;Invoice T: R
<?php $TAmt = $rowI['TotAmt'];
 //$TAmt = number_format ($TAmt, 2, ".", "");
 echo $TAmt; ?>


 <?php
//echo "<br>InvNo:".$InvNo2."</br />";

echo"<TABLE WIDTH=100% BORDER=1 CELLPADDING=0 CELLSPACING=0>";
echo "<COL WIDTH=*>		<COL WIDTH=10%>	<COL WIDTH=14%>		<COL WIDTH=10%>";
echo"<TR>
		<TH><label>Description</label>
		</TH>
		<TH ><label>Qty</label>
		</TH>
		<TH >Unit ex VAT
		</TH>
		<TH ><label>Total</label>
		</TH>
	</TR>
	<TR>
		<TH>";
					echo strtr($rowI['D1'], array('_' => '&nbsp;')) ;

			//echo $rowI['D1'];
			echo "
		</TH>
		<TH >";
			print $rowI['Q1'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$Mex1 = $rowI["ex1"];

			$Mex1 = number_format ($Mex1, 2, ".", "");

			echo $Mex1;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT1 = 0;
			$XT1 = $rowI["ex1"]*$rowI['Q1'];
			$XT1 = number_format ($XT1, 2, ".", "");
			echo $XT1;
			echo "
		</TH>
	</TR>";

if (($rowI['D2']) != '0')
{
echo "<TR>
		<TH>";

//		echo strtr($rowI['D2'], array('_' => '&nbsp;')) ;
			$riD2 = $rowI['D2'];

			//$arr1 = str_split($riD2);
$arr2 = str_split($riD2, 52);

	//	echo strtr($arr2[0], array('_' => '&nbsp;')) ;
//echo "<br>";

foreach($arr2 as $value) {
  //print $value;
		print strtr($value, array('_' => '&nbsp;')) ;

  echo "<br>";
}

/*
echo "ffff".$arr2[0]."<br>";

echo $arr2[1]."<br>";

echo $arr2[2]."<br>";

echo @$arr2[3]."<br>";

echo @$arr2[4]."<br>";

echo @$arr2[5]."<br>";

echo @$arr2[6]."<br>";

echo @$arr2[7]."<br>";

echo @$arr2[8]."<br>";

echo @$arr2[9]."<br>";

echo @$arr2[10]."<br>";

echo @$arr2[11]."<br>";

	*/


			//echo strtr($rowI['D2'], array('_' => '&nbsp;')) ;

//			print $rowI['D2'];
			echo "
		</TH>
		<TH >";
			print $rowI['Q2'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex2"];

			$Mex2 = $rowI["ex2"];

			$Mex2 = number_format ($Mex2, 2, ".", "");

			echo $Mex2;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT2 = 0;
			$XT2 = $rowI["ex2"]*$rowI['Q2'];
			$XT2 = number_format ($XT2, 2, ".", "");
			echo $XT2;
			echo "
		</TH>
	</TR>";
}
//echo "<br>rowID3:".$rowI['D3']."<br>";
if (($rowI['D3']) != '0')
{
echo "<TR>
		<TH>";
			echo strtr($rowI['D3'], array('_' => '&nbsp;')) ;

//			echo $rowI['D3'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q3'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex3"];

			$Mex3 = $rowI["ex3"];

			$Mex3 = number_format ($Mex3, 2, ".", "");

			echo $Mex3;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT3 = 0;
			$XT3 = $rowI["ex3"]*$rowI['Q3'];
			$XT3 = number_format ($XT3, 2, ".", "");
			echo $XT3;
			echo "
		</TH>
	</TR>";
}

if ($rowI['D4'] != '0')
{
echo "<TR>
		<TH>";
		echo strtr($rowI['D4'], array('_' => '&nbsp;')) ;

			//echo $rowI['D4'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q4'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex4"];

			$Mex4 = $rowI["ex4"];

			$Mex4 = number_format ($Mex4, 2, ".", "");

			echo $Mex4;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT4 = 0;
			$XT4 = $rowI["ex4"]*$rowI['Q4'];
			$XT4 = number_format ($XT4, 2, ".", "");
			echo $XT4;
			echo "
		</TH>
	</TR>";
}

if ($rowI['D5'] != '0')
{
echo "<TR>
		<TH>";
			echo strtr($rowI['D5'], array('_' => '&nbsp;')) ;

//			echo $rowI['D5'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q5'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex5"];
			$Mex5 = $rowI["ex5"];

			$Mex5 = number_format ($Mex5, 2, ".", "");

			echo $Mex5;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT5 = 0;
			$XT5 =  $rowI["ex5"]*$rowI["Q5"];
			$XT5 = number_format ($XT5, 2, ".", "");
			echo $XT5;
			echo "
		</TH>
	</TR>";
}

if ($rowI['D6'] != '0')
{

echo "<TR>
		<TH>";
							echo strtr($rowI['D6'], array('_' => '&nbsp;')) ;

		//	echo $rowI['D6'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q6'];
			echo "
		</TH>
		<TH ><label>";
			//echo $rowI["ex6"];
						$Mex6 = $rowI["ex6"];

			$Mex6 = number_format ($Mex6, 2, ".", "");

			echo $Mex6;

			echo "
		</TH>
		<TH ><label>";
			$XT6 = 0;
			$XT6 = $rowI["ex6"]*$rowI['Q6'];
			$XT6 = number_format ($XT6, 2, ".", "");
			echo $XT6;
			echo "
		</TH>
	</TR>";
}

if ($rowI['D7'] != '0')
{

echo "<TR>
		<TH>";
			echo strtr($rowI['D7'], array('_' => '&nbsp;')) ;

			//echo $rowI['D7'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q7'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex7"];
						$Mex7 = $rowI["ex7"];

			$Mex7 = number_format ($Mex7, 2, ".", "");

			echo $Mex7;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT7 = 0;
			$XT7 = $rowI["ex7"]*$rowI['Q7'];
			$XT7 = number_format ($XT7, 2, ".", "");
			echo $XT7;
			echo "
		</TH>
	</TR>";
}

if ($rowI['D8'] != '0')
{

echo "<TR>
		<TH>";
			echo strtr($rowI['D8'], array('_' => '&nbsp;')) ;

			//echo $rowI['D8'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q8'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo $rowI["ex8"];
			$Mex8 = $rowI["ex8"];
			$Mex8 = number_format ($Mex8, 2, ".", "");

			echo $Mex8;

			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$XT8 = 0;
			$XT8= $rowI["ex8"]*$rowI['Q8'];
			$XT8 = number_format ($XT8, 2, ".", "");
			echo $XT8;
			echo "
		</TH>
	</TR>";
}
echo"</table>
<TABLE WIDTH=100% BORDER=1 CELLPADDING=2 CELLSPACING=0>
<COL WIDTH=90%>	<COL WIDTH=*>
		<TR>
		<TH>";
			echo "<p align = 'right'>Sub-Total";
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$ST = $rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"];
			$ST2 = number_format ($ST, 2, ".", "");
			echo $ST2;

			echo "
		</TH>
	</TR>

	<TR>
		<TH> <p align = 'right'>";
			echo "Plus 14% VAT";
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$VT = $ST*0.14;
			$VT2 = number_format ($VT, 2, ".", "");
			echo $VT2;
			echo "
		</TH>
	</TR>

		<TR>
		<TH> <p align = 'right'>";
		echo "<input type='button' value='Print the invoice' onclick='printpage()'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			echo "Invoice Total";
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->

			$IT= $ST*1.14;
			$IT2 = number_format ($IT, 2, ".", "");
			echo "R".$IT2;
			echo "
		</TH>
	</TR>



</table>

	";

?>
<br>

<table width='100%' border='1'>
<tr>
<COL WIDTH=*>	<COL WIDTH=65%>

<th>

<FONT FACE="Arial, sans-serif" size = "2">
<?php //max lenght of totalSDR may be 30 chars long ?>
</b>Recommended Beneficiary statement description(CR): <b><br /><?php echo $rowI['SDR']; ?><BR /><BR /></b>
Recommended statement description(DR): <br /><b><?php echo  $rowI['SDR'];  ?><BR /></b>
<br><FONT size = "1">
Payments may be by cash, cheque or EFT.<br />
NB: For cash payments please make sure you have a receipt with my signature.<br />
<br />


 </th>
 <th><FONT FACE="Arial, sans-serif" size = "2">
(EFT) Banking details:<font size = 1><BR />


<BR /></font><FONT FACE="Arial, sans-serif" size = "2">
Account holder: <br />
Bank: <br />
Branch Code:  (Universal branch number)<br />
(Other branch codes:  )<br />
Account Number: <br />
(Branch: )<br />
 Type of Account: <font size = 1><BR />


<BR /></font><FONT FACE="Arial, sans-serif" size = "2">
Please send proof of payment to: CompanyEmail@me.co.za<br />
 </th>

 </tr>
 <tr>
 <th>
<a href = "http://TermsWebpage" target="_blank">TERMS: TermsWebpage</a>



 </th>

<th>Support: <a href = "http://SupportPage" target="_blank">SupportPage</a>
</th>
 </tr>
<!--<input type="button" value="Print the invoice" onclick="printpage()">-->
<!--<a href="http://www.web2pdfconvert.com/convert">Save to PDF</a>&nbsp;&nbsp;&nbsp;-->
<!--<a href="#" onclick="javascript:document.execCommand('SaveAs','1','[FILENAME]')">Click to save</a>-->
<!-- Web2PDF Converter Button BEGIN -->
<script type="text/javascript">
//var
//pdfbuttonlabel="Save page as PDF"
</script>
<script --src="http://www.web2pdfconvert.com/pdfbutton2.js" id="Web2PDF" type="text/javascript"></script>
<!-- Web2PDF Converter Button END -->
 <?php

	}//end customer table rows
	}//rowI assoc
	}//if result for rowI assoc




 $url1 = "yo.htm";
 //$url1 = $_GET["url"];
//  header("content-disposition: attachment;
//  filename=" . baseName($url1);
 // header("content-type: application/force-download");

?>

</body>
</html>
