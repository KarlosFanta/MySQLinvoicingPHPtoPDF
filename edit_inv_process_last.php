
<?php	//this is "edit_inv_process_last.php" edit_inv_processECHANGE.php OR edit_inv_processE.php</b> opens edit_inv_process_last.php

	require_once("inc_OnlineStoreDB.php");
	require_once('logprog.php');

?>



<?php
$InvNo = 0;
$CustNo = '';
$InvDate = '';
$Draft = 'Y';
$Type = "";
$Type = $_POST['Type'];



$InvPdStatus = '';
$Summary ='';
$CustEmail ='';

$TotAmt = '';
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



$InvNo = $_POST['InvNo'];



$Draft = $_POST['Draft'];
$Abbr = '';
$CustNo = $_POST['CustNo'];
$CustInt = $CustNo ;
$InvDate = $_POST['InvDate'];
$InvPdStatus = $_POST['InvPdStatus'];

$D1 = $_POST['D1'];




$Q1 = $_POST['Q1'];
$ex1 = $_POST['ex1'];
$ex1= @number_format ($ex1, 4, ".", "");
$ex1= floatval($ex1);




$D2 = $_POST['D2'];
$D2 = strtr($D2, array('&nbsp;' => ' ')) ;

$Q2 = $_POST['Q2'];
$ex2 = $_POST['ex2'];
$ex2= @number_format ($ex2, 4, ".", "");
$ex2= floatval($ex2);



$D3 = $_POST['D3'];
$D3 = strtr($D3, array('&nbsp;' => ' ')) ;
$Q3 = $_POST['Q3'];
$ex3 = $_POST['ex3'];
$ex3= @number_format ($ex3, 4, ".", "");
$ex3= floatval($ex3);



$D4 = $_POST['D4'];
$D4 = strtr($D4, array('&nbsp;' => ' ')) ;
$Q4 = $_POST['Q4'];
$ex4 = $_POST['ex4'];





$D5 = $_POST['D5'];
$D5 = strtr($D5, array('&nbsp;' => ' ')) ;
$Q5 = $_POST['Q5'];
$ex5 = $_POST['ex5'];
$ex5= number_format ($ex5, 4, ".", "");
$ex5= floatval($ex5);


$D6 = $_POST['D6'];
$D6 = strtr($D6, array('&nbsp;' => ' ')) ;
$Q6 = $_POST['Q6'];
$ex6 = $_POST['ex6'];




$D7 = $_POST['D7'];
$D7 = strtr($D7, array('&nbsp;' => ' ')) ;
$Q7 = $_POST['Q7'];
$ex7 = $_POST['ex7'];


$D8 = $_POST['D8'];
$D8 = strtr($D8, array('&nbsp;' => ' ')) ;
$Q8 = $_POST['Q8'];
$ex8 = $_POST['ex8'];
$ex8= number_format ($ex8, 4, ".", "");
$ex8= floatval($ex8);
$Abbr = $_POST['Abbr'];
if ($Abbr == "")
echo "WARNING Abbr is empty this will affect the SDR and Summary combo!";
$Summary = $_POST['Summary'];
$TotAmt = $_POST['TotAmt'];
$TAmt = $_POST['TotAmt'];





$Summary = $_POST['Summary'];
$SDR = $_POST['SDR'];
//echo "<br>SDR: ".$SDR."<br>";
function changeA($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/�/","_",$v1);
$v1 = preg_replace("/�/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/�/",".",$v1);
$v1 = preg_replace("/�/", '_', $v1);
$v1 = str_replace(' ', '_', $v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);

//$v1 = preg_replace("/\xA0\xA0/","_",$v1);

//$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";


$v2 = $v1;



return $v2;
}












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























trim($Summary,"\xa0");
trim($Summary," \n\r\t\0\x0b\xa0");





/*
//First check if invoice exists, if not then create a new copy of the invoice:
$queryIchk = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
$row_cnt = 0;
if ($resultIchk = mysqli_query($DBConnect, $queryIchk)) {
  while ($rowI = mysqli_fetch_assoc($resultIchk)) {
$row_cnt = mysqli_num_rows($resultIchk);
echo " rows: $row_cnt</th>"; 
}mysqli_free_result($resultIchk);
}
if ($row_cnt < 1)
{
echo "You created a new copy of the invoice:<br><br>";	

$Inv_NoInt = intval($InvNo);
$isql = "INSERT INTO invoice (InvNo, CustNo, InvDate, InvPdStatus, Summary, D1, Q1, ex1, 
D2, Q2, ex2, D3, Q3, ex3, D4, Q4, ex4, D5, Q5, ex5, D6, Q6, ex6, D7, Q7, ex7, D8, Q8 , ex8,
TotAmt, SDR, Draft, Type) 
VALUES(" . $Inv_NoInt. ", ".$CustNo.", '". $InvDate."', '". $InvPdStatus."', '". $Summary."',
'$D1', '$Q1', '$ex1',  '$D2', '$Q2', '$ex2', '$D3', '$Q3', '$ex3', '$D4', '$Q4', '$ex4', '$D5', '$Q5', '$ex5', '$D6', '$Q6', '$ex6', '$D7', '$Q7', '$ex7', '$D8', '$Q8', '$ex8',
'$TotAmt', '". $SDR."', '$Draft', 'Invoice')";
//VALUES(" . $InvNo. ", ".$CustNo", '". $InvDate."', '". $OrdPd."')";
echo "<font size = 5 face= arial><b>".$Abbr. " &nbsp; InvNo ".$InvNo. " &nbsp;CustNo ".$CustNo. " &nbsp; ".$Summary. "</b></font> &nbsp; "; 
//echo "<a href='mailto:".$CustEmail."?Subject=$SubjINVOICE'>".$CustEmail."</a>&nbsp;&nbsp;";
echo "<font size = 5 face= arial><b></b></font> ";
echo "<br><textarea rows='2' cols='90'  style='font-size: 11pt'>".$isql."</textarea><br>"; // WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
//$DBConnect->query($isql); // WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
//echo "<br><font size = 4>";
// echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
//mysqli_query($DBConnect, $isql);// WARNING!  THIS QUERY ONLY TO BE EXECUTED WHEN TamT has been compared with Total
//$query = "SELECT SDR, InvNo, Q1, ex1, Q2, ex2, Q3, ex3, Q4, ex4, Q5, ex5, Q6, ex6, Q7, ex7, Q8, ex8  FROM Invoice WHERE InvNo = '$InvNo'";
//echo $query;
$TAmt = $TotAmt;
 $TAmt = number_format ($TAmt, 2, ".", "");
 echo "<br>";
 echo "TAmt:".$TAmt."<br>";
$IT= (($Q1*$ex1+$Q2*$ex2+$Q3*$ex3+
			$Q4*$ex4 + $Q5*$ex5 + $Q6*$ex6+
			$Q7*$ex7 + $Q8*$ex8)*1.15);
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
  echo "<br><font size = 4 color = red>isql insert error: ".mysqli_error($DBConnect)." </font><br><a href = '../phpmyadmin/tbl_sql.php?db=kc&table=invoice'>phpmyadmin invoice</a><br>";
  }
  else "<font color= green>insert success, invoice created.</font>";

$Tagg = '';	
  if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<br><font size = 10 color = red><b>insert  NOT successful!!!</b></font><br>
<font size = 3 color = red>if the error message says Duplicate entry for PRIMARY, 
then the invoice number already exists with another customer <a href = view_inv.php><b>Click here to check </a></b> 
<br>or you have already written the invoice into the sytem. <a href = view_inv.php><b>Click here to check </a></b> <br>
If it says something about syntax then u used an apostophee or komma</font>";
echo " <a href = '../phpmyadmin/index.php?db=kc&table=invoice' target = _blank>open PHPmyAdmin</a>";
}
else
{
echo "insert success! &nbsp;</font>";
$Tagg = 1;
}
printf("Rows inserted: %d\n", mysqli_affected_rows($DBConnect));	
if (mysqli_affected_rows($DBConnect)==1)
	    echo "<font color = green>successful!<br></font>";
else 
    echo "<br>Insert failed";    
}




}// END OF INSERT/ CREATE A COPY OF INVOICE OPTION
*/























echo "Thank you for changing the invoice's details: <font size = '4'>".$InvNo."</font> ".$Summary." R ".$TotAmt  ;

$Inv_NoInt = intval($InvNo);
 //D1 = $D1,  D2 = $D2,  D3 = $D3,  D4 = $D4,  D5 = $D5,  D6 = $D6,  D7 = $D7,  D8 = $D8, 
 //descriptions get updated on the next query!
$FirstUpdateQuery="update invoice set CustNo = $CustNo, 
 Q1 = $Q1,  Q2 = $Q2,Q3 = $Q3, Q4 = $Q4, Q5 = $Q5,  Q6 = $Q6,Q7 = $Q7, Q8 = $Q8, 
 ex1 = '$ex1',  ex2 = $ex2, ex3 = $ex3, ex4 = $ex4,ex5 = $ex5, ex6 = $ex6, ex7 = $ex7, ex8 = $ex8,
InvDate ='$InvDate', 
InvPdStatus = '$InvPdStatus', 
Summary = '$Summary',
TotAmt = '$TotAmt',
Type = '$Type',
Draft = '$Draft'
where InvNo = $Inv_NoInt";

$FirstUpdateQuery= strtr($FirstUpdateQuery, array('&nbsp;' => ' ')) ;

echo '</br>';

mysqli_query($DBConnect, $FirstUpdateQuery);
printf("###Affected rows FirstUpdateQuery(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<br><font size = 5 color = red><b>Update NOT successfull!!!</b></font><br>
<font size = 3 color = red>if the error message says Duplicate entry for PRIMARY, 
then the invoice number already exists with another customer <a href = view_inv.php><b>Click here to check </a></b> 
<br>or you have already written the invoice into the sytem. <a href = view_inv.php><b>Click here to check </a></b> <br>
If it says something about syntax then u used an apostophee or komma</font>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
}
else
echo "insert into MySQL database table success! <br></font>";

echo "<br /><textarea style='width:600px; height:30px;'>".$FirstUpdateQuery.";</textarea><br />";
$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
$IT = 0;
$TAmt  = 0;

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$TAmt = $rowI['TotAmt'];



 $IT= (($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*1.15);

}mysqli_free_result($resultI);
}

$TAmt = number_format ($TAmt, 2, ".", "");
// echo "<br>";
 
 //echo "the TAmt:".$TAmt."<br>";

 $IT = number_format ($IT, 2, ".", "");

 			echo " R".$IT;
echo " ";
 echo "_TAmt:".$TAmt." &nbsp;&nbsp;&nbsp;&nbsp;";

 
 
 
$ITN = number_format($IT,1); //I removed the last cent here
$TAmtN = number_format($TAmt,1);  //I removed the last cent here
//echo "<br>TAmtN: ".$TAmtN;
echo " ITN: ".$ITN;
if ($TAmtN != $ITN)
echo "<br><font face = 'arial' size = 10 color= red><b>WARNING!!! <br> TAmt does not equal Total</FONT></b><br>";


$query = $FirstUpdateQuery;
$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");




















$query2="update invoice set 
D1 = '$D1',
D2 = '$D2',
D3 = '$D3',
D4 = '$D4', 
D5 = '$D5', 
D6 = '$D6', 
D7 = '$D7', 
D8 = '$D8'
where InvNo = $Inv_NoInt";


//$query2= strtr($query2, array('&nbsp;' => ' ')) ;   //it might look like update_invoice_set...
//$query2= strtr($query2, array(' ' => ' ')) ;

echo '</br>';

mysqli_query($DBConnect, $query2);
printf("###Affected rows query2 (UPDATE) : %d\n", mysqli_affected_rows($DBConnect));
printf("Check: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5'><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php' target = _blank>open PHPAdmin</a>";
 }else
 echo "whoppeee 2nd part SUCCESS!!! :-)";

echo "<br /><textarea style='width:600px; height:30px;'>If permission denied area then close Adobe Acrobat".$query2."</textarea>";
//echo "D1:".$D1;
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php' target = _blank>open PHPAdmin</a>";

echo "<br />";
$file = "FileWriting/bkp.php";
//include("FileWriting/FileWriting.php");

$open = fopen($file, "a+"); //open the file, (log.htm).
fwrite($open, "<br><br>" .$query2 . "<br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y h s"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.


echo "<br /><a href = ".$file." target=_blank>Check log file: ".$file."</a>";













$query = "SELECT SDR, InvNo, Q1, ex1, Q2, ex2, Q3, ex3, Q4, ex4, Q5, ex5, Q6, ex6, Q7, ex7, Q8, ex8  FROM Invoice WHERE InvNo = '$InvNo'";
//echo $query;
$result = $DBConnect->query($query);
$row = $result->fetch_array(MYSQLI_NUM); //this is object oriented and WORKS!!!
//printf ("%s (%s)\n", $row[0], $row[1]);
echo "__r0: ".$row[0];
echo " r1: ".$row[1];
//$SDR = $row[0];
//echo "<br>";echo "<br>";
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





echo "<br>IT show only cents: ";
//$TAmttmp = number_format($TAmt, 2, ".", "");

$pieces = explode(".", $TAmt);
//echo "<br>p0:".$pieces[0]; // piece1
echo " p1:".$pieces[1]; // piece2
$p1 = $pieces[1];
$spl1 = str_split($p1);
$TAmttmp = 0;
//echo "<br>sp11:".$spl1; // piece2  /converting array to strong is a problem
$TAmttmp = $spl1[0];

//$result=round(100*$TAmttmp)/100;
//echo "<br>result".$result;
echo " TAmttmp: with useless cent".$TAmttmp;
echo " IT:".$IT;

if ($TAmttmp  == 0.01) //so if there is 1 cent subteract the useless cent.
$TAmt = $TAmt - 0.01;
echo "<br>TAmt: with useless cent".$TAmt;
echo "<br>TAmt: without useless cent".$TAmt;



?>

<form name="PL" action="PDF/tcpdf/examples/PDFeditInv.php" method="post">

<?php
$queryC = "SELECT L1, CustEmail FROM customer WHERE CustNo = $CustNo" ;
//fsdrecho "queryC:".$queryC."<br>";

//echo "Folder Location: "."&nbsp;&nbsp;"; //filelocation


if ($resultC = mysqli_query($DBConnect, $queryC)) { 
  while ($rowC = mysqli_fetch_assoc($resultC)) {
  $FL = $rowC['L1'];
  $CustEmail = $rowC['CustEmail'];
}
mysqli_free_result($resultC);
}

if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}


echo "<input type='hidden' name='L1' size = 35 value=";
			echo $FL;
			echo ">";
echo "<label>* invoice AutoNumber:</label>";
echo "<input type='text' name='InvNo'  value=";
			echo "'$InvNo'";
echo ">SDR:";
?>
<input type='text' name='SDR' size = "50" value="<?php echo $SDR; ?>">
<input type='text' name='CustNo' size = "50" value="<?php echo $CustNo; ?>">
<?php
			echo "<br>".$IT;
	echo "<br><label>* invoice TotalAmount:TotAmt>TAmt</label>";
echo "<input type='text' name='TAmt'  value=";
			echo "'$TAmt'";
echo ">";
echo "<br>Swap name and surname:<input type='text' name='Swap'  value='N'>";
?>	
<div>
		<dl>
		<dt></dt>
			<dd><input type="submit" name="btn_submit" value="Display Invoice"  style="height:50px; width:150px"/> 
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" />--></dd>
		</dl>
</div>
</form>
In case of emergency: if Display Button does not work:
<a href= 'ice.php?SDR=<?php echo $SDR; ?>&InvNo=<?php echo $InvNo; ?>' target = '_blank'>ice.php?SDR=<?php echo $SDR; ?>&InvNo=<?php echo $InvNo; ?></a>



<form name="PL" action="PDF/tcpdf/examples/PDFquote.php" method="post">
<br>QUOTE: or TYPE<br>
<?php

echo "<input type='text' name='L1' size = 35 value=";
			echo $FL;
			echo "><br>";
echo "<label>* invoice AutoNumber:</label>";
echo "<input type='text' name='InvNo'  value=";
			echo "'$InvNo'";
echo "><br><label>SDR:</label>";
?>
<input type='text' name='SDR' size = "50" value="<?php echo $SDR; ?>">
<?php
			echo "<br><br>".$IT;
	echo "<br><label>* invoice TotalAmount:TotAmt>TAmt</label>";
echo "<input type='text' name='TAmt'  value=";
			echo "'$TAmt'";
echo ">";
echo "<br>Swap name and surname:<input type='text' name='Swap'  value='N'>";
?>	
<div>
		<dl>
		<dt></dt>
			<dd><input type="submit" name="btn_submit" value="Display Quote or other Type" /> 
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
</div>
</form>


<script type="text/javascript">
function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
</script>



<?php
//echo "<script type='text/javascript'>tempAlert('yoooooo<br>ooooooooooooo',1000);</script>";


$querySDR = "UPDATE invoice SET SDR = '$SDR', TotAmt = $TAmt WHERE InvNo = $InvNo";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {   
echo "<script type='text/javascript'>tempAlert(' <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;SDR TAmt <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;successfully updated           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br> ',2000);</script>";
//echo "<script type='text/javascript'>tempAlert('SDR',3000);</script>";
	//echo '<script type="text/javascript">alert("SDR,TAmt successfully updated $querySDR Click OK to continue")</script>';
}
else 

	echo '<script type="text/javascript">alert("ERROR SDR,TAmt NOT updated .$querySDR.")</script>';











			
			




include "invEmail.php";
include "invEmailQuote.php";
?> 
<a href = "signaturePaid.php">signaturePaid.php</a><br>


<?php
echo "<br>";
echo "Customer's Email Address: <br><a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br><br>";
//include ("signature.php"); // NB check invEmail.php
//include ("signatureQuote.php"); // NB check invEmail.php
?>


