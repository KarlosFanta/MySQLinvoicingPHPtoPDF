

<?php	//this is "process_Inv.php"
require_once 'logprog.php';//mysql connection and database selection
require_once 'inc_OnlineStoreDB.php';//page567
//require_once 'header.php';//page567

?>



<?php
$InvNo = 0;
$CustNo = '';
$CustNo = $_POST['CustNo']; //DO NOT REMOVE! DO NOT REMOVE!!!
if ($CustNo == "")
echo "<b><font size = 4 color = red>error, no Customer Number!!!</font>";

$InvDate = '';

$InvSQLDateDD = '';
$InvSQLDateMM = '';
$InvSQLDateYY = '';
$InvPdStatus = '';
$Summary ='';
$CustEmail ='';

$D1 = '';
$Q1 = '';
$ex1 = '';
$D2 = '';
$Q2 = '';
$ex2 = '';
$D3 = '';
$Q3 = '';
$ex3 = '';
$D4 = '';
$Q4 = '';
$ex4 = '';
$D5 = '';
$Q5 = '';
$ex5 = '';
$D6 = '';
$Q6 = '';
$ex6 = '';
$D7 = '';
$Q7 = '';
$ex7 = '';
$D8 = '';
$Q8 = '';
$ex8 = '';
$Topup = "";
$Topup = $_POST['topup'];
//$adslinv = "";
//$adslinv = $_POST['adslinv'];
$Confid = "";
$Confid = $_POST['Confid'];
$Important = "";
$Important = $_POST['Important'];
$Extra = "";
$Extra = $_POST['Extra'];
//$Extra = mysqli_real_escape_string($DBConnect, $Extra);

$InvNo = $_POST['InvNo'];
$CustEmail = @$_POST['CustEmail'];
$CustEmail2 = $CustEmail; //required for body tag after all the inc ludes 2014
$Inv_NoInt = intval($InvNo); //required for insert statement


//$InvDate = $_POST['InvDate'];
$InvSQLDateDD = $_POST['InvSQLDateDD'];
$InvSQLDateMM = $_POST['InvSQLDateMM'];
$InvSQLDateYY = $_POST['InvSQLDateYY'];

$Da1 = explode("/", $InvDate);
/*echo $Da1[2]."____";

echo $Da1[0]."____";
echo $Da1[1]."____";
*/
//$InvSQLDate = $Da1[2]."-".$Da1[1]."-".$Da1[0];
$InvSQLDate = $InvSQLDateYY."-".$InvSQLDateMM."-".$InvSQLDateDD;
//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";
$Draft = 'Y';

$Draft = $_POST['Draft'];

$InvPdStatus = @$_POST['InvPdStatus'];
if ($Draft == 'Paid')
   $InvPdStatus  = 'Y';

$D1 = $_POST['D1'];
$Q1 = $_POST['Q1'];
$ex1 = $_POST['ex1'];
$ex1= @number_format ($ex1, 4, ".", "");
$ex1= floatval($ex1);
$D2 = $_POST['D2'];
$Q2 = $_POST['Q2'];
$ex2 = $_POST['ex2'];
$ex2= @number_format ($ex2, 4, ".", "");
$ex2= floatval($ex2);
$D3 = $_POST['D3'];
$Q3 = $_POST['Q3'];
$ex3 = $_POST['ex3'];
if ($ex3== '')
$ex3 = 0;

$ex3= @number_format ($ex3, 4, ".", "");
$ex3= floatval($ex3);
$D4 = $_POST['D4'];
$Q4 = $_POST['Q4'];
$ex4 = $_POST['ex4'];
if ($ex4== '')
$ex4 = 0;

$ex4= number_format ($ex4, 4, ".", "");
$ex4 = floatval($ex4);
$D5 = $_POST['D5'];
$Q5 = $_POST['Q5'];
$ex5 = $_POST['ex5'];
if ($ex5== '')
$ex5 = 0;
$ex5= number_format ($ex5, 4, ".", "");
$ex5= floatval($ex5);
$D6 = $_POST['D6'];
$Q6 = $_POST['Q6'];
$ex6 = $_POST['ex6'];
if ($ex6== '')
$ex6 = 0;
$ex6= number_format ($ex6, 4, ".", "");
$ex6= floatval($ex6);
$D7 = $_POST['D7'];
$Q7 = $_POST['Q7'];
$ex7 = $_POST['ex7'];
if ($ex7== '')
$ex7 = 0;
$ex7= number_format ($ex7, 4, ".", "");
$ex7= floatval($ex7);
$D8 = $_POST['D8'];
$Q8 = $_POST['Q8'];
$ex8 = $_POST['ex8'];
if ($ex8== '')
$ex8 = 0;

$ex8= number_format ($ex8, 4, ".", "");
$ex8= floatval($ex8);
$Abbr = $_POST['Abbr'];
if ($Abbr == "")
echo "WARNING Abbr is empty this will affect the SDR and Summary combo!";
$Summary = $_POST['Summary'];
$TotAmt = $_POST['TotAmt'];
$TAmt = $_POST['TotAmt'];

//$D1 = str_replace(' ', '_', $D1);
//$D1 = str_replace('  ', '__', $D1);

function changeA($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);
$v1 = preg_replace("/…/", '_', $v1);
$v1 = str_replace(' ', '_', $v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);

//$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";

/*
$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.
*/
$v2 = $v1;
return $v2;
}
/*$CustFName = changeA($CustFName);
$Cust_LName = changeA($Cust_LName);
$Cust_Tel = changeA($Cust_Tel);
$Cust_Cell =changeA($Cust_Cell);
$Cust_Email = changeA($Cust_Email); WARNIG! function removes the @ sign and the fullstop!
$Cust_Addr = changeA($Cust_Addr);
$Cust_Dist = changeA($Cust_Dist);
$CustIDdoc = changeA($CustIDdoc);
$CustDetails = changeA($CustDetails);
$ADSLTel = changeA($ADSLTel);
$CustPW = changeA($CustPW);
$Important = changeA($Important);*/
$Abbr = changeA($Abbr);
$InvPdStatus = changeA($InvPdStatus);
$Summary = changeA($Summary);

$D1 = changeA($D1);
$D2 = changeA($D2);
$D3 = changeA($D3);
$D4 = changeA($D4);
$D5 = changeA($D5);
$D6 = changeA($D6);
$D7 = changeA($D7);
$D8 = changeA($D8);

$earlySDR = "_";
//$earlySDR = $Abbr.',acc'.$CustNo.',inv'.$InvNo.','.$Summary;
$earlySDR = $Abbr.',inv'.$InvNo.','.$Summary;
include 'monthtables.php';

//truncated error: http://stackoverflow.com/questions/1704304/what-is-this-error-database-query-failed-data-truncated-for-column-column-na
if($Q2=='')
  $Q2=0;
if($Q3=='')
  $Q3=0;
if($Q4=='')
  $Q4=0;
if($Q5=='')
  $Q5=0;
if($Q6=='')
  $Q6=0;
if($Q7=='')
  $Q7=0;
if($Q8=='')
  $Q8=0;

//truncated error: http://stackoverflow.com/questions/1704304/what-is-this-error-database-query-failed-data-truncated-for-column-column-na
$isql = "INSERT INTO invoice (InvNo, CustNo, InvDate, InvPdStatus, Summary, D1, Q1, ex1,
D2 , Q2 , ex2,
D3, Q3, ex3,
D4 , Q4 , ex4 ,
D5 , Q5 , ex5,
D6, Q6, ex6,
D7, Q7, ex7,
D8, Q8 , ex8, TotAmt, SDR, Draft)
VALUES(" . $Inv_NoInt. ", ".$CustNo.", '". $InvSQLDate."', '". $InvPdStatus."', '". $Summary."',
'$D1', '$Q1', '$ex1',
 '$D2',  '$Q2', '$ex2',
 '$D3', '$Q3', '$ex3',
 '$D4',  '$Q4', '$ex4',
'$D5',  '$Q5',  '$ex5',
 '$D6', '$Q6',  '$ex6',
 '$D7',  '$Q7', '$ex7',
 '$D8',  '$Q8', '$ex8', '$TotAmt', '". $earlySDR."', '$Draft'


)";
//VALUES(" . $InvNo. ", ".$CustNo", '". $InvDate."', '". $OrdPd."')";
echo "<font size = 5 face= arial><b>InvNo ".$InvNo. " &nbsp; ".$Summary. "</b></font> &nbsp; ";
echo "<a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;";
echo "<font size = 5 face= arial><b>InvNo ".$InvNo. " &nbsp; ".$Summary. "</b></font><br> ";
echo "<br>".$isql.";<br>"; // WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
//$DBConnect->query($isql); // WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
//echo "<br><font size = 4>";
// echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";

//mysqli_query($DBConnect, $isql);// WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total










$queryST = "UPDATE customer SET  Confid = '$Confid', Topup = '$Topup', Extra = '$Extra', Important = '$Important' WHERE CustNo = $CustNo";
//echo "<br>".$queryST;
if (mysqli_query($DBConnect, $queryST) === TRUE) {

	//echo '<script //type="text/javascript">alert("ST, last invoiced topup successfully updated  $queryST ")</script>';
	echo '</font>queryST Success:  '.$queryST;
}
else
{
	//echo '<script type="text/javascript">alert("ERROR adslinv, ST,Topup NOT updated .$queryST.")</script>';
	//echo $queryST;
	echo "<br><font size = 5 color = red><b>queryST NO success: </b></font><br>".$queryST;
}



if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<br><font size = 4 color = red><b>insert or update NOT successfull!!!</b></font><br>
<font size = 3 color = red>if the error message says Duplicate entry for PRIMARY,
then the invoice number already exists with another customer <a href = view_inv.php><b>Click here to check </a></b>
<br>or you have already written the invoice into the sytem. <a href = view_inv.php><b>Click here to check </a></b> <br>
If it says something about syntax then u used an apostophee or komma</font>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
}
else
echo "insert into MySQL database table success! <br></font>";

$file = "FileWriting/bkp.php";
//include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file'><br />";

//$file = "logaddtrans.php";
$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add invoice:</b> <br>" .$isql. ";<br/><br/><br/>");
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /></font><a href = '$file'><b>FILE WRITTEN </B>Check log file:</a> ";

/*
$isql="update invoice set CustNo = $CustNo, InvDate ='$InvDate', InvPdStatus = '$InvPdStatus', Summary= '$Summary',
D1 = '$D1', Q1 = '$Q1', ex1 = '$ex1',
D2 = '$D2', Q2 = '$Q2', ex2 = '$ex2',
D3 = '$D3', Q3 = '$Q3', ex3 = '$ex3',
D4 = '$D4', Q4 = '$Q4', ex4 = '$ex4',
D5 = '$D5', Q5 = '$Q5', ex5 = '$ex5',
D6 = '$D6', Q6 = '$Q6', ex6 = '$ex6',
D7 = '$D7', Q7 = '$Q7', ex7 = '$ex7',
D8 = '$D8', Q8 = '$Q8', ex8 = '$ex8'
where Invno = $Inv_NoInt";
//oracle: $isql="update invoice set Invfn = '$Inv_Name', Invln ='$Inv_LName', Invtel = '$Inv_Tel', Invcell= '$Inv_Cell', Invemail = '$Inv_Email', Invaddr = '$Inv_Addr', distance = '$Inv_Dist' where Invno = :Inv_NoInt";
echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $isql);
printf("###Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
echo "<br>".$isql;

$open = fopen($file, "a+"); //open the file, (log.htm).
fwrite($open, "<br><br><b>editaddInvprocess_last:</b> " .$isql . "<br/>");
fwrite($open, "<b>Date & Time:</b>". $date. "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.

*/
echo " <a href = ".$file."> ".$file."</a>";
//$query = "SELECT SDR, InvNo, Q1, ex1, Q2, ex2, Q3, ex3, Q4, ex4, Q5, ex5, Q6, ex6, Q7, ex7, Q8, ex8  FROM Invoice WHERE InvNo = '$InvNo'";
//echo $query;
/*$result = $DBConnect->query($query);
$row = $result->fetch_array(MYSQLI_NUM); //this is object oriented and WORKS!!!
//printf ("%s (%s)\n", $row[0], $row[1]);
echo "__r0: ".$row[0];
echo " r1: ".$row[1];
$SDR = $row[0];
echo "<br>";echo "<br>";
echo " Q1: ".$row[2]."&nbsp;&nbsp;&nbsp;";
echo " ex1: ".$row[3]."&nbsp;&nbsp;&nbsp;";
echo " Q2: ".$row[4]."&nbsp;&nbsp;&nbsp;";
echo " ex2: ".$row[5]."&nbsp;&nbsp;&nbsp;";
echo " Q3: ".$row[6]."&nbsp;&nbsp;&nbsp;";
echo " ex3: ".$row[7]."&nbsp;&nbsp;&nbsp;";
echo " Q4: ".$row[8]."&nbsp;&nbsp;&nbsp;";
echo " ex4: ".$row[9]."&nbsp;&nbsp;&nbsp;";
echo " Q5: ".$row[10]."&nbsp;&nbsp;&nbsp;";
echo " ex5: ".$row[11]."&nbsp;&nbsp;&nbsp;";
echo " Q6: ".$row[12]."&nbsp;&nbsp;&nbsp;";
echo " ex6: ".$row[13]."&nbsp;&nbsp;&nbsp;";
echo " Q7: ".$row[14]."&nbsp;&nbsp;&nbsp;";
echo " ex7: ".$row[15]."&nbsp;&nbsp;&nbsp;";
echo " Q8: ".$row[16]."&nbsp;&nbsp;&nbsp;";
echo " ex8: ".$row[17]."&nbsp;&nbsp;&nbsp;";
*/
//$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;

//if ($resultI = mysqli_query($DBConnect, $queryI)) {
//  while ($rowI = mysqli_fetch_assoc($resultI)) {
//$TAmt = $TotAmt;
 $TAmt = number_format ($TAmt, 2, ".", "");
 echo "<br>";
 //echo "TAmt:".$TAmt."<br>";
$IT= (($Q1*$ex1+$Q2*$ex2+$Q3*$ex3+
			$Q4*$ex4 + $Q5*$ex5 + $Q6*$ex6+
			$Q7*$ex7 + $Q8*$ex8)*1.14);
			$IT = number_format ($IT, 2, ".", "");
			//echo " R".$IT;
//echo "<br>";echo "<br>";

$ITN = number_format($IT,1); //I removed the last cent here
$TAmtN = number_format($TAmt,1);  //I removed the last cent here
//echo "<br>TAmtN: ".$TAmtN;
//echo "<br>ITN: ".$ITN;
if ($TAmtN != $ITN)
{
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt $TAmtN does not equal Total $ITN</FONT></b><br>";
echo "<font face = 'arial' size = 5 color= red><b>INSERT NOT AUTHORISED!</FONT></b><br>";
echo "<font face = 'arial' size = 3 color= red><b>Display invoice will show blank.!</FONT></b><br>";

echo "<font face = 'arial' size = 5 color= red><b><a href='javascript: history.go(-1)'>Go Back</a></FONT></b><br>";
}
else
{


if (!mysqli_query($DBConnect,"$isql")) // WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
  {
  echo "<br><font size = 4 color = red>isql insert error: ".mysqli_error($DBConnect)."</font><br><a href = 'http://localhost/phpMyAdmin-3.5.2-english/tbl_sql.php?db=kc&table=invoice'>http://localhost/phpMyAdmin-3.5.2-english/tbl_sql.php?db=kc&table=invoice</a><br>";
  }
  else "<font color= green>insert success, invoice created.</font>";

printf("Affected rows (INSERT): %d\n", mysqli_affected_rows($DBConnect));

if (mysqli_affected_rows($DBConnect)==1)
	    echo "<br>success<br>";
else
    echo "<br>failed";
}










?>
<!--<form name="PL" action="print_invoice.php" method="post">-->
<form name="PL" action="PDF/tcpdf/examples/PDF.php" method="post">

<?php

//$L1 = @$_POST['L1'];

$queryC = "SELECT L1 FROM customer WHERE CustNo = $CustNo" ;
echo "queryC:".$queryC;

if ($resultC = mysqli_query($DBConnect, $queryC)) {      //I think this is to determine the MAX invoice number
  while ($rowC = mysqli_fetch_assoc($resultC)) {
  $FL = $rowC['L1'];
//echo "Folder Location: ";
//echo $FL."&nbsp;&nbsp;"; //filelocation
}}
if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}
echo "<input type='hidden' name='L1' size = 35 value=";
			echo $FL;
			echo ">";
			echo "<br>";

//echo "<br>InvNo:".$InvNo."</br />";
//echo "<label>* invoice AutoNumber:</label>";
echo "<input type='hidden' name='InvNo' size = 5 value=";
			echo "'$Inv_NoInt'";

		$Summary = $_POST['Summary'];
		$SDR = $Abbr.',inv'. $InvNo.','. $Summary;
	//	$SDR = $Abbr.',acc'.$CustNo.',inv'. $InvNo.','. $Summary;
		?>


<div>

		<?php //http://www.webstutorial.com/insert-record-into-database-using-ajax-how-to-insert-data-into-database-using-ajax/ajax ?>

<!--<div id="wrapper">
<input type="text" id="name" value="<?php //echo 'acc'.$CustNo.' inv'.$InvNo.' '.$SDR; ?>" />
<input type="text" id="InvNoR3" value="<?php //echo $InvNo; ?>" />
<input type="button" value="Submit" onclick="addRecord()" />
<div id="propspectDiv"></div>
<table id="data" border="1" cellspacing="0" cellpadding="0" width="75" style="display:none;"></table>
</div>-->

		<br />
			<dd>SDR: <input type="text" name="SDR" id="SDR" size = "50" value="<?php echo $earlySDR; ?>" /></dd>
		</dd>
	</dl>

	<dl>
			<dt></dt>
			<dd>TAmt: <input type="text" name="TAmt" id="TAmt" size = "10" value="<?php echo $TotAmt; ?>" /> Summary: <input type="text" name="Summary" id="Summary" size = "30" value="<?php echo $Summary; ?>" /></dd>
		</dd>
	</dl>

		<dl>

			<dd>Swap Surname with First Name:<input type="text" name="Swap" id="Swap" size = "2" value="N" /></dd>
		</dd>
	</dl>



		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" width = 300 value="Display Invoice" style="height:50px; width:700px" /><br>
if you get "TCPDF ERROR: Some data has already been output, can't send PDF file" then you will find the PDF file in the customer folder.			action="PDF/tcpdf/examples/PDF.php


		Invoice_No_<?php echo $InvNo; echo "_".$Summary?>.pdf




</div>
<?php
			$newfldr = $FL;
$uniqueid = "Invoice_No_{$InvNo}_{$Summary}.pdf";
//echo "<br> <a href= 'file:///".$newfldr.'/'.$uniqueid."' target = '_blank'>Click here to check if invoice exists inside customer folder  ";
//echo " ".$newfldr.'/'.$uniqueid."</a> <br>";
echo "<br> <a href= 'file:///".$newfldr."' target = '_blank'>Right-click here in Ext App to check if invoice exists inside customer folder  ";
echo " ".$newfldr."</a> <br>";
//echo "<br> <a href= 'file:///".$newfldr.'/'.$uniqueid."' target = '_blank'>Click here to check if invoice exists inside customer folder  ";
//echo " ".$newfldr.'/'.$uniqueid."</a> <br>";
?>
Abbr: <input type='text' name='Abbr'  value="<?php echo $Abbr; ?>">

</form>

<?php
$querySDR = "UPDATE invoice SET SDR = '$SDR', Summary = '$Summary', TotAmt = $TAmt WHERE InvNo = $InvNo";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {

	//echo '<script //type="text/javascript">alert("SDR,TAmt successfully updated  $querySDR ")</script>';
	echo 'querySDR Success: '.$querySDR;
}
else
{
	echo '<script type="text/javascript">alert("ERROR SDR,TAmt NOT updated .$querySDR.")</script>';
	echo '<br><font size = 5 color = red><b>querySDR NO success! </b></font><br>'.$querySDR;
}
		if ($TAmtN != $ITN)
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b><br>";

include 'invEmail.php'; //mailto
?>
<a href = "signaturePaid.php">signaturePaid.php</a> also edit invEmail.php<br>


<?php
echo "<br>";
echo "Customer's Email Address:  <a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>";
//echo "&nbsp;&nbsp;" .$CustEmail."<br><br>";

//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			echo "<br> <a href= 'file:///".$newfldr."'>OPen newfolder</a>  &nbsp; &nbsp; &nbsp;";
echo " ".$newfldr." <br>";
			//   file:///F:/_work/Customers/A/Abel_Jutta


echo "<br> <a href= 'file:///F:/_work/Customers'>Open all customers folder</a>  &nbsp; &nbsp; &nbsp;";
//echo " ".$newfldr." <br>";

echo "<br> <a href= 'file:///C:\Documents and Settings\Me_37\Local Settings\Temp'>Open temp folder</a>  &nbsp; &nbsp; &nbsp;";
//echo " ".$newfldr." <br>";

			?>
<SCRIPT>
strdestination1 = 'mailto:CompanyEmail?subject=Software&body=see attachment&attachment="C:/test.pdf"'
</SCRIPT>
<input type="button" name="Email" onclick="window.open(strdestination,'mywindow','width=400,height=200')" value="Email">

<br><br>
<?php //$body = "yebo"; ?>
<!--
<a href='mailto:<?php //echo $CustEmail ?>?subject=Invoice No <?php //echo $InvNo; echo " ".$Summary?>&body=<?php //echo $body.$nl.$aa.$nl.$a0.$nl ?>'>
Click to zap customer</a><br>
-->





<?php
//echo "LOCATION<br>TEST ATTACHMENT1: <a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."'</a>&nbsp;&nbsp;" .$CustEmail."<br>";
//echo "LOCATION<br>TEST ATTACHMENT2:
//<a href='mailto:".$CustEmail."?Subject=Invoice&Attachment=http://localhost/ACS/test.pdf' >".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail.">"."<br>";
//echo "LOCATION<br>TEST ATTACHMENT3: <a href='mailto:".$CustEmail."?Subject=Invoice&Attachment=test.pdf '>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail.">"."<br>";

/*
<a href="mailto:<?php echo $CustEmail ?>?subject=Invoice No <?php echo $InvNo; echo " ".$Summary?>&body=<?php echo $body.
$nl.$aa.$nl.$a0.$nl.$a1.$nl.$a2.$nl.$a2b.$nl.$nl.$a3.$nl.$a4.$nl.$a5.$nl.$a6.$nl.$a7.$nl.$nl.$a8.
$nl.$a9.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b5.$nl.$nl.$b6.$nl.$b7.$nl.$nl.$b8.
$nl.$b9.$nl.$nl.$ba.$nl.$bb.$nl.$bc.$nl.$nl.$bd.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh ?>">
Click to EMail  customer</a><br>

file://localhost/c|/test.pdf
file:///c|/test.pdf
file://localhost/ACS/test.pdf
file:///c:/test.pdf
*/

//http://localhost/ACS/test.pdf
//echo "<br>end </a>";
//echo "Customer's Email Address: <br><a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br><br>";
//include ("signature.php");

$un= 'N';
$indesc = '1';
$in = '1';
//echo "indesc:".$indesc;
//include 'edit_trans_CustProcess.php';
echo "<br><br>";
//include 'view_event_by_cust.php';

$un= 'Y';

echo "<br><br>";
//




//include ("view_inv_all.php");
echo "CE:".$CustEmail;
?>

<br>

<script type="text/javascript">
function redirect()
{
    window.location.href = "mailto:<?php echo $CustEmail2; ?>?subject=<?php if (@$Draft == 'Paid')
echo "PAID ";  ?>Invoice No <?php echo $InvNo; echo " ".$Summary; ?>&body=<?php echo $body.
$nl.$aa.$nl.$a0.$nl.$a1.$nl.$a2.$nl.$a2b.$nl.$nl.$a3.$nl.$a4.$nl.$a5.$nl.$a6.$nl.$a7.$nl.$nl.$a8.
$nl.$a9.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b5.$nl.$nl.$b6.$nl.$b7.$nl.$nl.$b8.
$nl.$b9.$nl.$nl.$ba.$nl.$bb.$nl.$bc.$nl.$nl.$bd.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh; ?>";

}
</script>
<body onload="javascript: redirect();">
<?php
include 'edit_trans_CustProcess.php'; //including this in the middle causes havoc with variables.
?>
