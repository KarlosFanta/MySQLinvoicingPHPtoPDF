
<head>
<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
 
function addRecord()
{
var term_name = $('#name').val();        //Storing the value of textbox into a variable
 
if(term_name == '')        //Checking for NULL
{
$('#propspectDiv').html('Enter A Valid Name');    //Prints the progress text into our Progress DIV
$('#name').addClass('error');                    //Adding the error class to the progress DIV
return;
}
else{
$('#name').removeClass('error');
$('#propspectDiv').removeClass('error'); //Removing the error class from the progress DIV
$('#propspectDiv').html('Submitting your Request.<img src="ajax.gif" />');//Prints the progress text into our Progress DIV
 
$.ajax({
url : 'data.php', //Declaration of file, in which we will send the data
data:{
"name" : term_name                //we are passing the name value in URL
},
success : function(data){
window.setTimeout(function(){
$('#propspectDiv').html('Your Name is added to our records'); //Prints the progress text into our Progress DIV
$('#data').css("display","block");  //Changes the style of table from display:none to display:block
$('#data').html(data);                //Prints the data into the table
}, 2000);
}
});
}
}
 
</script>
</head>
<?php	//this is "process_Quo.php"
 $page_title = "You added a quote";
	//include_once('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
//require_once('db.php');//mysql connection and database selection
require_once('logprog.php');//mysql connection and database selection
	require_once("inc_OnlineStoreDB.php");//page567
	require_once("header.php");//page567

?>



<?php
$QuoNo = 0;
$CustNo = '';
$QDate = '';
$TotAmt = 0;
$QuoSQLDateDD = '';
$QuoSQLDateMM = '';
$QuoSQLDateYY = '';
$QuoPdStatus = '';
$Summary ='';
$QNotes ='';
$CustEmail ='';
$L1 ='';
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
$QNotes = $_POST['QNotes'];

$QuoNo = $_POST['QuoNo'];
$CustEmail = @$_POST['CustEmail'];
$L1 = @$_POST['L1'];
$Quo_NoInt = intval($QuoNo);
//$Quo_NoInt++;
$CustNo = $_POST['CustNo']; //DO NOT REMOVE! DO NOT REMOVE!!!
//$QuoDate = $_POST['QuoDate'];
$QuoSQLDateDD = $_POST['QuoSQLDateDD'];
$QuoSQLDateMM = $_POST['QuoSQLDateMM'];
$QuoSQLDateYY = $_POST['QuoSQLDateYY'];



$Da1 = explode("/", $QuoDate);
/*echo $Da1[2]."____";

echo $Da1[0]."____";
echo $Da1[1]."____";
*/
//$QuoSQLDate = $Da1[2]."-".$Da1[1]."-".$Da1[0];
$QuoSQLDate = $QuoSQLDateYY."-".$QuoSQLDateMM."-".$QuoSQLDateDD;
echo "<br>QuoSQLdate: ".$QuoSQLDate." ___<br>";

//$QuoPdStatus = $_POST['QuoPdStatus'];

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
$ex3= @number_format ($ex3, 4, ".", "");
$ex3= floatval($ex3);
$D4 = $_POST['D4'];
$Q4 = $_POST['Q4'];
$ex4 = $_POST['ex4'];
$ex4= number_format ($ex4, 4, ".", "");
$ex4 = floatval($ex4);
$D5 = $_POST['D5'];
$Q5 = $_POST['Q5'];
$ex5 = $_POST['ex5'];
$ex5= number_format ($ex5, 4, ".", "");
$ex5= floatval($ex5);
$D6 = $_POST['D6'];
$Q6 = $_POST['Q6'];
$ex6 = $_POST['ex6'];
$ex6= number_format ($ex6, 4, ".", "");
$ex6= floatval($ex6);
$D7 = $_POST['D7'];
$Q7 = $_POST['Q7'];
$ex7 = $_POST['ex7'];
$ex7= number_format ($ex7, 4, ".", "");
$ex7= floatval($ex7);
$D8 = $_POST['D8'];
$Q8 = $_POST['Q8'];
$ex8 = $_POST['ex8'];
$ex8= number_format ($ex8, 4, ".", "");
$ex8= floatval($ex8);
$Abbr = $_POST['Abbr'];
if ($Abbr == "")
echo "WARNING Abbr is empty this will affect the SDR and Summery combo!";
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
//$QuoPdStatus = changeA($QuoPdStatus);
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
//$earlySDR = $Abbr.',acc'.$CustNo.',inv'.$QuoNo.','.$Summary;
$earlySDR = $Abbr.',inv'.$QuoNo.','.$Summary;
if ($TotAmt == "")
$TotAmt = 0;
$isql = "INSERT INTO quotes (QuoNo, CustNo, QDate, QNotes, Summary, D1, Q1, ex1, 
D2 , Q2 , ex2,
D3, Q3, ex3,
D4 , Q4 , ex4 ,
D5 , Q5 , ex5,
D6, Q6, ex6,
D7, Q7, ex7,
D8, Q8 , ex8, TotAmt, SDR) 
VALUES(" . $Quo_NoInt. ", ".$CustNo.", '". $QuoSQLDate."', '". $QNotes."', '". $Summary."',
'$D1', $Q1, '$ex1', 
 '$D2',  $Q2, $ex2,
 '$D3', $Q3, $ex3,
 '$D4',  $Q4, $ex4,
'$D5',  $Q5,  $ex5,
 '$D6', $Q6,  $ex6,
 '$D7',  $Q7, $ex7,
 '$D8',  $Q8, $ex8, $TotAmt, '". $earlySDR."'


)";
//VALUES(" . $QuoNo. ", ".$CustNo", '". $QuoDate."', '". $OrdPd."')";
echo "<br>".$isql;
echo ";<br>";
//$result = $DBConnect->query($query);
//$QueryResult = DBConnect->query($isql);
$DBConnect->query($isql);
echo "<br><font size = 4>";
 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";


if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><font size = 5 color = red><b>insert or update NOT successfull!!!</b></font><br>
<font size = 3>if the error message says Duplicate entry for PRIMARY, 
then the quote number already exists with another customer <a href = view_inv.php><b>Click here to check </a></b> 
<br>or yuo have already written the quote into the sytem. <a href = view_inv.php><b>Click here to check </a></b> <br>
If it says something about syntax then u used an apostophee or komma</font>";
else
echo "insert into MySQL database table success! <br></font>";




$file = "FileWriting/bkp.php";
//include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file'><br />";
	
//$file = "logaddtrans.php";
$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add quote:</b> <br>" .$isql. ";<br/><br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /></font><br /><a href = '$file'><b>FILE WRITTEN </B>Check log file:</a> <br />";



/*
$isql="update quote set CustNo = $CustNo, QuoDate ='$QuoDate', QuoPdStatus = '$QuoPdStatus', Summary= '$Summary', 
D1 = '$D1', Q1 = '$Q1', ex1 = '$ex1', 
D2 = '$D2', Q2 = '$Q2', ex2 = '$ex2',
D3 = '$D3', Q3 = '$Q3', ex3 = '$ex3',
D4 = '$D4', Q4 = '$Q4', ex4 = '$ex4',
D5 = '$D5', Q5 = '$Q5', ex5 = '$ex5',
D6 = '$D6', Q6 = '$Q6', ex6 = '$ex6',
D7 = '$D7', Q7 = '$Q7', ex7 = '$ex7',
D8 = '$D8', Q8 = '$Q8', ex8 = '$ex8'
where Quono = $Quo_NoInt";
//oracle: $isql="update quotes set Quofn = '$Quo_Name', Invln ='$Inv_LName', Invtel = '$Inv_Tel', Invcell= '$Inv_Cell', Invemail = '$Inv_Email', Invaddr = '$Inv_Addr', distance = '$Inv_Dist' where Invno = :Inv_NoInt";
echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $isql);
printf("###Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
echo "<br>".$isql;

$open = fopen($file, "a+"); //open the file, (log.htm).
fwrite($open, "<br><br><b>editaddInvprocess_last:</b> " .$isql . "<br/>"); 
fwrite($open, "<b>Date & Time:</b>". $date. "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.

*/
echo "<br /><a href = ".$file.">Check log file: ".$file."</a><br />";
$query = "SELECT SDR, QuoNo, Q1, ex1, Q2, ex2, Q3, ex3, Q4, ex4, Q5, ex5, Q6, ex6, Q7, ex7, Q8, ex8  FROM Quotes WHERE QuoNo = '$QuoNo'";
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
$queryI = "SELECT * FROM quotes WHERE QuoNo = $QuoNo" ;

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$TAmt = $rowI['TotAmt'];
 $TAmt = number_format ($TAmt, 2, ".", "");
 echo "<br>";
 echo "TAmt:".$TAmt."<br>";
$IT= (($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*1.14);
			$IT = number_format ($IT, 2, ".", "");
			echo " R".$IT;
echo "<br>";echo "<br>";

$ITN = number_format($IT,1); //I removed the last cent here
$TAmtN = number_format($TAmt,1);  //I removed the last cent here
echo "<br>TAmtN: ".$TAmtN;
echo "<br>ITN: ".$ITN;
if ($TAmtN != $ITN)
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b>";
}}


?>
<!--<form name="PL" action="print_quote.php" method="post">-->
<form name="PL" action="PDF/tcpdf/examples/PDF.php" method="post">

<?php
//echo "<br>QuoNo:".$QuoNo."</br />";
echo "<label>* quote AutoNumber:</label>";
echo "<input type='text' name='QuoNo' size = 5 value=";
			echo "'$Quo_NoInt'";
			
		$Summary = $_POST['Summary'];
		$SDR = $Abbr.',inv'. $QuoNo.','. $Summary;
	//	$SDR = $Abbr.',acc'.$CustNo.',inv'. $QuoNo.','. $Summary;
		?>

		
<div>
 
		<?php //http://www.webstutorial.com/insert-record-into-database-using-ajax-how-to-insert-data-into-database-using-ajax/ajax ?>

<!--<div id="wrapper">
<input type="text" id="name" value="<?php //echo 'acc'.$CustNo.' inv'.$QuoNo.' '.$SDR; ?>" />
<input type="text" id="QuoNoR3" value="<?php //echo $QuoNo; ?>" />
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
			<dd><input type="submit" name="btn_submit" value="Display Quote" /> action="PDF/tcpdf/examples/PDF.php
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
		
		
		
		
		
</div>


Abbr: <input type='text' name='Abbr'  value="<?php echo $Abbr; ?>">

</form>

<?php
$querySDR = "UPDATE quotes SET SDR = '$SDR', Summary = '$Summary', TotAmt = $TAmt WHERE QuoNo = $QuoNo";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {   

	//echo '<script //type="text/javascript">alert("SDR,TAmt successfully updated  $querySDR ")</script>';
}
else 
	echo '<script type="text/javascript">alert("ERROR SDR,TAmt NOT updated .$querySDR.")</script>';
	
	
		if ($TAmtN != $ITN)
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b><br>";

include "invEmail.php";
?> 
<a href = "signaturePaid.php">signaturePaid.php</a><br>


<?php
echo "<br>";echo "Customer's Email Address:  ";


			$newfldr = $L1;
			
//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			
			echo "<br><br> newfldr: ".$newfldr." <br>";
			
			echo "<br> <a href= 'file:///".$newfldr."'>OPen newfolder</a>   <br>";
//   file:///F:/_work/Customers/A/Abel_Jutta


echo "LOCATION<br>
<a href='mailto:".$CustEmail."?Subject=Quotes'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br>";


echo "<br>";
include ("signature.php");







/*
$queryST = "UPDATE customer SET Topup = '$Topup' WHERE CustNo = $CustNo";
echo "<br>".$queryST;
if (mysqli_query($DBConnect, $queryST) === TRUE) {   

	echo '<script //type="text/javascript">alert("ST, last quoted topup successfully updated  $queryST ")</script>';
}
else 
{
	//echo '<script type="text/javascript">alert("ERROR ST,Topup NOT updated .$queryST.")</script>';
	//echo $queryST;
}
*/





?>
