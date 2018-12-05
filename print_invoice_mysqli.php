<?php
	//require_once("db.php");//page567
		require_once("inc_OnlineStoreDB.php");//page567

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<?php 
$InvNo2 = 0;
$InvNo2 = mysql_escape_string($_POST['InvNo']);
$SDR = "0";
$SDR = mysql_escape_string($_POST['SDR']);
$SQLstringO = "INSERT INTO invoice (SDR) VALUES('$SDR') WHERE InvNo = $InvNo2";

$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."</BR>";

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
?>
	<TITLE>CompanyName's Computers TAX Invoice No <?php echo $InvNo2; echo " ".$rowI['Summary']?> '12 prepaid ADSL</TITLE>
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
<input type="button" value="Print this page" onclick="printpage()">&nbsp;&nbsp;&nbsp;


<TABLE WIDTH=100% BORDER=0 CELLPADDING=2 CELLSPACING=0>
	<COL WIDTH=30*>
	<COL WIDTH=37*>
	<COL WIDTH=30*>
	<TR>
		<TH WIDTH=57%>
			<P LANG="en-GB" ALIGN=LEFT><FONT FACE="Arial, sans-serif"><FONT SIZE=4>CompanyName</FONT></FONT></P>
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
			VAT no  <br>
			
<br>
Tel:<br>
Cell:  <br>
<A HREF="mailto:CompanyEmail@me.co.za">Email:  CompanyEmail@me.co.za</A></FONT></FONT></P>
		</TH>
		<TH WIDTH=21%>
			<P LANG="en-GB" ALIGN=LEFT><FONT FACE="Arial, sans-serif" size = "2">TAX INVOICE
			NO.
	
			</FONT>
		</TH>
		<TH WIDTH=13%>
			<P LANG="en-GB" align = "left">
			<?php
			echo $InvNo2; 
			?>
			<BR>
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
echo "{$row[1]}"; ///Cust FName
echo " ";
echo "{$row[2]}"; //CustLName
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
//echo "<td>{$row[5]}</td></tr>\n";

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
echo "{$row[0]}";
//echo "inv".{$rowI[InvNo]}; 
echo 'acc';
echo $rowI['CustNo'];
echo ', inv';
echo $rowI['InvNo'];
echo " ";
echo $rowI['Summary'];

?>


&nbsp;&nbsp;Invoice T: R<?php $TAmt = $rowI['TotAmt']; $TAmt = number_format ($TAmt, 2, ".", "");echo $TAmt; ?>
<?php
//echo "<br>InvNo:".$InvNo2."</br />";

echo"<TABLE WIDTH=100% BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=*>		<COL WIDTH=10%>	<COL WIDTH=10%>		<COL WIDTH=10%>";
echo"<TR>
		<TH><label>Description</label>
		</TH>
		<TH ><label>Qty</label>
		</TH>
		<TH ><label>Unit ex VAT</label>
		</TH>
		<TH ><label>Total</label>
		</TH>
	</TR>
	<TR>
		<TH>";
			echo $rowI['D1'];
			echo "
		</TH>
		<TH >";
			print $rowI['Q1'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex1"];
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
			print $rowI['D2'];
			echo "
		</TH>
		<TH >";
			print $rowI['Q2'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex2"];
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
			echo $rowI['D3'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q3'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex3"];
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
			echo $rowI['D4'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q4'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex4"];
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
			echo $rowI['D5'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q5'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex5"];
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
			echo $rowI['D6'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q6'];
			echo "
		</TH>
		<TH ><label>";
			echo $rowI["ex6"];
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
			echo $rowI['D7'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q7'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex7"];
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
			echo $rowI['D8'];
			echo "
		</TH>
		<TH >";
			echo $rowI['Q8'];
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo $rowI["ex8"];
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
			$ST = round(($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"]),2);
			$ST = number_format ($ST, 2, ".", "");
			echo $ST;

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
			$VT = round(($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*0.14);
			$VT = number_format ($VT, 2, ".", "");
			echo $VT;
			echo "
		</TH>
	</TR>
	
		<TR>
		<TH> <p align = 'right'>";
			echo "Invoice Total";
			echo "
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			
			$IT= round((($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*1.14),2);
			$IT = number_format ($IT, 2, ".", "");
			echo "R".$IT;
			echo "
		</TH>
	</TR>
	
	
	
	
</table>
	
	";

?>
<br><FONT FACE="Arial, sans-serif" size = "2">
Recommended statement description: <?php echo $SDR; ?><BR />
Payments may be by cheque or EFT.<br />
Banking details: <br />
 Account holder: <br />
 Bank: <br />
 Account Number: <br />
 Branch No: )<br />
 Branch: <br />
 Type of Account:<br />
<br />
	<br />
<input type="button" value="Print this page" onclick="printpage()">&nbsp;&nbsp;&nbsp;
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
