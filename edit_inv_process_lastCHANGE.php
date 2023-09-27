
<?php	//this is "edit_inv_process_last.php"
 $page_title = "You added a invoice";


	require_once("inc_OnlineStoreDB.php");
	require_once('logprog.php');

?>



<?php
$InvNo = '';
$InvNo = $_POST['InvNo'];
$InvNoNEW = '';
$InvNoNEW = $_POST['InvNoNEW'];
$Inv_NoInt = intval($InvNo);
$CustNo='';
$SDR='';
$FL='';
$CustEmail='';

$query="update invoice set InvNo = $InvNoNEW where InvNo = $Inv_NoInt";
//update invoice set InvNo = 7421 where InvNo = 5580

//update invoice set InvNo = 5580 where InvNo = 7421

$query= strtr($query, array('&nbsp;' => ' ')) ;

echo '</br>';

mysqli_query($DBConnect, $query);
printf("###Affected rows query(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<br><font size = 5 color = red><b>update NOT successfull!!!</b></font><br>
<font size = 3 color = red>if the error message says Duplicate entry for PRIMARY, 
then the invoice number already exists with another customer <a href = view_inv.php><b>Click here to check </a></b> 
<br>or you have already written the invoice into the sytem. <a href = view_inv.php><b>Click here to check </a></b> <br>
If it says something about syntax then u used an apostophee or komma</font>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
}
else
echo "MySQL database table updated success! <br></font>";

echo "<br /><br /><b>".$query.";</b><br /><br />";
/*$file = "log.htm";
$open = fopen($file, "a+"); //open the file, (log.htm).
fwrite($open, "<br><br>" .$query . "<br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y h s"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = ".$file.">Check log file: ".$file."</a><br />";

*/
$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");






















$query = "SELECT SDR, InvNo, Q1, ex1, Q2, ex2, Q3, ex3, Q4, ex4, Q5, ex5, Q6, ex6, Q7, ex7, Q8, ex8, CustNo  FROM Invoice WHERE InvNo = '$InvNo'";
//echo $query;
$result = $DBConnect->query($query);
$row = $result->fetch_array(MYSQLI_NUM); //this is object oriented and WORKS!!!
//printf ("%s (%s)\n", $row[0], $row[1]);
echo "__r0: ".$row[0];
echo " r1: ".$row[1];
//$SDR = $row[0];
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
echo " CustNo: ".$row['CustNo']."&nbsp;&nbsp;&nbsp;";


$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
$IT = 0;
$TAmt  = 0;

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$TAmt = $rowI['TotAmt'];



 $IT= (($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*1.15);

}}

$TAmt = number_format ($TAmt, 2, ".", "");
 echo "<br>";
 
 echo "the TAmt:".$TAmt."<br>";

 $IT = number_format ($IT, 2, ".", "");

 			echo " R".$IT;
echo "<br>";echo "<br>";
 echo "____hellloooo________TAmt:".$TAmt."<br>";

 
 
 
$ITN = number_format($IT,1); //I removed the last cent here
$TAmtN = number_format($TAmt,1);  //I removed the last cent here
echo "<br>TAmtN: ".$TAmtN;
echo "<br>ITN: ".$ITN;
if ($TAmtN != $ITN)
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b>";




echo "<br>IT show only cents: ";
//$TAmttmp = number_format($TAmt, 2, ".", "");

$pieces = explode(".", $TAmt);
//echo "<br>p0:".$pieces[0]; // piece1
echo "<br>p1:".$pieces[1]; // piece2
$p1 = $pieces[1];
$spl1 = str_split($p1);
$TAmttmp = 0;
//echo "<br>sp11:".$spl1; // piece2  /converting array to strong is a problem
$TAmttmp = $spl1[0];

//$result=round(100*$TAmttmp)/100;
//echo "<br>result".$result;
echo "<br>TAmttmp: with useless cent".$TAmttmp;
echo "<br>IT:".$IT;

if ($TAmttmp  == 0.01) //so if there is 1 cent subteract the useless cent.
$TAmt = $TAmt - 0.01;
echo "<br>TAmt: with useless cent".$TAmt;
echo "<br>TAmt: without useless cent".$TAmt;


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
echo "Folder Location: ".$FL."&nbsp;&nbsp;"; //filelocation
}}
if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}



echo "<input type='text' name='L1' size = 35 value=";
			echo $FL;






















































			echo ">";
			echo "<br>";

//echo "<br>InvNo:".$InvNo."</br />";
echo "<label>* invoice AutoNumber:</label>";
echo "<input type='text' name='InvNo'  value=";
			echo "'$InvNo'";









echo "><br><label>SDR:</label>";
?><input type='text' name='SDR' size = "50" value="<?php echo $SDR; ?>">
<?php

			echo "<br><br>".$IT;

//echo "<br>";echo "<br>";
	echo "<br><label>* invoice TotalAmount:TotAmt>TAmt</label>";
echo "<input type='text' name='TAmt'  value=";
			echo "'$TAmt'";
echo ">";
 




echo "<br>Swap name and surname:<input type='text' name='Swap'  value='N'>";
	






		?>	

			<div>










































		<dl>
			<dt></dt>



















			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<dd><input type="submit" name="btn_submit" value="Display Invoice" /> 
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
</div>




</form>


<?php


$queryFL = "SELECT L1 FROM customer WHERE CustNo = $CustNo" ;
//echo "queryFL:".$queryFL."<br>";

if ($resultFL = mysqli_query($DBConnect, $queryFL)) {      //I think this is to determine the MAX invoice number
  while ($rowFL = mysqli_fetch_assoc($resultFL)) {
  $FL = $rowFL['L1'];
//echo "Folder Location: ".$FL."&nbsp;&nbsp;"; //filelocation
}}
if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}
//echo "<input type='text' name='L1' size = 35 value=";
			//echo $FL;
//			echo ">";
			//echo "<br>";
			$newfldr = $FL;
			
//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			
			//echo "<br><br> newfldr: ".." <br>";
			
			echo "<a href= 'file:///".$newfldr."'  >$newfldr</a>   <br>";



			
			




include "invEmail.php";
?> 
<a href = "signaturePaid.php">signaturePaid.php</a><br>


<?php
echo "<br>";
echo "Customer's Email Address: <br><a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br><br>";
include ("signature.php");
?>


