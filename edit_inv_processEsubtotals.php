<html>

<head>

<title>Edit Invoice Process</title>

<script type="text/javascript">


//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invoice before we change him on the last form.






function formValidator(){
	// Make quick references to our fields
//	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var InvNo = document.getElementById('InvNo');

	var TotAmt = document.getElementById('TotAmt');
	//var CustCN = document.getElementById('CustCN');
	//var mydropdownDC = document.getElementById('mydropdownDC');











	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');
	
	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(InvNo, "Please enter a valid numeric invoice  number")){

			if(notEmpty(TotAmt, "Please enter a valid float invoice total amount")){

		//	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				//if(madeSelection(mydropdownDC, "Please Choose a Customer")){
					//if(lengthRestriction(username, 6, 8)){


							return true;
		//				}
					//}
				}
	//		}
	//	}
	



	}//very important bracket part of isNumeric!!!!!
	

	return false;
	
}//very imporatna end of formvalidator!!

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}









function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}











function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}


function calc()
{
		
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  val1 = document.getElementById("ex1").value;
  val2 = document.getElementById("Q1").value;
  val3 = document.getElementById("ex2").value;
  val4 = document.getElementById("Q2").value;
  val5 = document.getElementById("ex3").value;
  val6 = document.getElementById("Q3").value;
  val7 = document.getElementById("ex4").value;
  val8 = document.getElementById("Q4").value;
  val9 = document.getElementById("ex5").value;
  val10 = document.getElementById("Q5").value;
  val11 = document.getElementById("ex6").value;
  val12 = document.getElementById("Q6").value;
  val13 = document.getElementById("ex7").value;
  val14 = document.getElementById("Q7").value;
  val15 = document.getElementById("ex8").value;
  val16 = document.getElementById("Q8").value;
  mani = "multiply";
  
  if (val1 != "" && val2 != "")
  {
  	
  document.getElementById("resp").innerHTML="Calculating...";
    queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+"&ex3="+val5+"&Q3="+val6+"&ex4="+val7+"&Q4="+val8+"&ex5="+val9+"&Q5="+val10+"&ex6="+val11+"&Q6="+val12+"&ex7="+val13+"&Q7="+val14+"&ex8="+val15+"&Q8="+val16+mani;
//   queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+"&ex3="+val5+"&Q3="+val6+"&ex4="+val7+"&Q4="+val8+mani;
  //queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&ex2="+val3+"&Q2="+val4+&ex3="+val5+"&Q3="+val6+     &ex4="+val7+"&Q4="+val8+mani;
  //queryPath = "CalcServ.php?ex1="+val1+"&Q1="+val2+"&manipulator="+mani;
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	
      document.getElementById("resp").innerHTML=xmlhttp.responseText;
        
    }
  }

  xmlhttp.open("GET",queryPath);
  xmlhttp.send();

  }
}

</script>

</head>
<body>

<?php	//this is "edit_inv_process.php"
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
	include "chkDuplic.php";
?>

<form name="EditInv" onsubmit="return formValidator();" action="edit_inv_process_lastsubtotals.php" method="post" >


<?php

//$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
//$Invno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Invno</br />";
//$Invno = strtok(";");
//}
//echo "InvnozERO: ";
//echo $Invno[0]."</br />";
//$InvNo = intval($Invno[0]);

echo "<br>InvNo: <b>".$InvNo." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>edit_inv_processE.php</b> opens edit_inv_process_last.php</b><br/>";
$queryC = "SELECT ABBR FROM customer c, invoice i WHERE i.InvNo = $InvNo and c.CustNo = i.CustNo";
echo $queryC ;  echo "<br>";
if ($result = mysqli_query($DBConnect, $queryC)) {
  while ($row = mysqli_fetch_assoc($result)) {
	echo $row['ABBR'];
	$Abbr = $row['ABBR'];
  }}
  echo "<br>";
  
  
  
  
  
  
  

$SQLstring = "select * from expenses where InvNo = $InvNo order by ExpNo  desc";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';


if (empty(mysqli_query($DBConnect, $SQLstring))) 
    echo 'No expenses found for this invoice'; 


if ($result = mysqli_query($DBConnect, $SQLstring)) {
while ($row = mysqli_fetch_assoc($result)) 
{
echo "".$row['ExpNo']."  ";
echo "".$row['ExpDesc']."  ";
echo "".$row['SupCode']."  ";
echo "".$row['PurchDate']."  ";
echo "".$row['ProdCostExVAT']."  ";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.14 , 2, '.', '');
echo "".$PIV."  ";
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "".$PIV."  ";
echo "".$row['InvNo']."  ";
echo "".$row['Notes']."  ";
echo "".$row['SerialNo']."  ";
}
mysqli_free_result($result);
}
//else
//	echo "nothing found";

  
  
  
  
  
  
  
  
$query = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "DELETE FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt); 
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
echo "qqqqq: ".$query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
echo "Thank you for selecting invoice ".$TBLrow." from your database. You may now change its details.</BR>"   ;


//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['InvNO']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['InvFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['InvLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the invoice has a surname entered!!!
    echo $row[3] . $row['InvTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['InvCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['InvEMAIL']"</br>";
    echo $row[6] . $row['InvADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";
 */
// while ($row = mysql_fetch_assoc($objResult)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl>";
			echo "<dt><label>* invoice AutoNumber:</label>Invoice Number can only be changed using phpMyAdmin</dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNo'  value=";
			//echo $row[0];
			echo $row['InvNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['InvNo'];
			echo ">



Type: (Quote/order/Draft invoice/performa Invoice:)
<input type='text' name='Type'  value='".$row['Type']."'>
						</dd>";
			
			
			
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//			<?php
			
			$CustInt = $row['CustNo'];

$queryFL = "SELECT L1 FROM customer WHERE CustNo = $CustInt" ;
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



			
			
			
			
			
			
			
			
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>* CustNo:</label><b>  NB Change the SDRs below as well!!!!</b></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustNo' value=";
			echo $row['CustNo'];
			echo "> <input type='text' name='Abbr' value='$Abbr'>"; //check view_inv_one.php
		echo "</dl>";

	
		
		
		
		
		
		
 /*		echo "<dl>";
			echo "<dt><label>* Abbr:</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Abbr' value=";
			echo $row['ABBR'];
			echo "> </dd>";
		echo "</dl>";
*/
 		echo "<dl>";
			echo "<dt><label>* InvDate:  &nbsp;&nbsp;YYYY-MM-DD</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvDate' value=";
			echo $row['InvDate'];
			echo "> </dd>";
		echo "</dl>";


 		echo "<dl>";
			echo "<dt><label>Summary<b>  NB Change the SDRs below as well!!!!</b></label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Summary' size='45'  value=";
			echo strtr($row['Summary'], array(' ' => '&nbsp;')) ;

		//	echo $row['Summary'];
			echo "> <input type='submit' name='btnsubmit' value='Submit/Save (After submitting you may change it to a quote)' > </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Inv Sent or Paid? (InvPdStatus)</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvPdStatus' value=";
			echo strtr($row['InvPdStatus'], array(' ' => '&nbsp;')) ;
//			echo $row['InvPdStatus'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Short Statement Description (SDR)<br> ";
			//echo strtr($row['Summary'], array(' ' => '&nbsp;')) ;
			echo "<dd><input type='text' name='SDR' size = '30' value=";
			
			echo strtr($row['SDR'], array(' ' => '&nbsp;')) ;
			
					echo "> </dd>";
		echo "</dl>";

			
			$earlySDR = "_";
			$earlySDR = $Abbr.',inv'.$InvNo.','.$row['Summary'];
			


















				
			echo "<dt><label>earlySDR partitioned <br> ";
			//echo strtr($row['Summary'], array(' ' => '&nbsp;')) ;
			echo "<dd><input type='text' name='SDR' size = '30' value=";
			
			echo $earlySDR ;
			echo ">  maxtotlengthForSDR is30chars</dd>";
		echo "</dl>";

		echo "<dl>";
		$mm = '';
		$mm = number_format($row['TotAmt']/1.15, 3, '.', ' ');
			echo "<dt><label><b>Total incl VAT</b></label> TotAmt  (R $mm ex VAT)</dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$TATA = '';
			$TATA = $row['TotAmt'];
			//echo $TATA;
			echo "<dd>R<input type='text' name='TotAmt' size='45'  value=";
			echo strtr($TATA, array(' ' => '&nbsp;')) ;
			//echo $TATA;
			echo "> </dd>";
		echo "</dl>";

			
			
			
			
//			echo $row['Summary'];
			//echo "</label></dt>";
			
			//echo $row['Abbr'];
			
			
			
			
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
	/*		echo "<dd><input type='text' name='SDR' value=";
			echo strtr($row['SDR'], array(' ' => '&nbsp;')) ;
//			echo $row['SDR'];
			echo "> </dd>";
		echo "</dl>";
*/
 		
echo"<TABLE WIDTH=100 BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=40*>		<COL WIDTH=57*>		<COL WIDTH=30*>";
echo"<TR>
		<TH WIDTH=52%><label>Description<br> (replace spaces with _underscores)</label>
		</TH>
		<TH WIDTH=11%><label>Qty</label>
		</TH>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</TH>
		<TH WIDTH=23%><label>Unit Price in VAT</label>
		</TH>
		<TH WIDTH=23%><label>TotExVAT</label>
		</TH>
		<TH WIDTH=23%><label>TotInclVAT</label>
		</TH>
	</TR>";

$TotEx= 0;

for( $i=1; $i<9; $i++ ) 
{
	echo "<TR>
		<TH>";
			echo "<input type='text' name='D".$i."' size='45'  value=";
			$DDD= "D".$i;
			//print $row[$DDD];
			strtr($row[$DDD], array(' ' => '_')) ;
			strtr($row[$DDD], array('&nbsp;' => '_')) ;
			$D1 = '0';
			//$D1= reset($row[$DDD]);
			$D1= $row[$DDD];
			
		$D1 = strtr($D1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
			$D1 = preg_replace('/\s/u', '_', $D1);//this baby also does the trick!!!
//WARNING THIS DOES NOT WORK:			$D1 = preg_replace('/\s/u', ' ', $D1);		
			
//			$D1 = strtr($D1, array('&#32;' => '_')) ;
//			$D1 = strtr($D1, array('&#32;' => '_')) ;
//			$D1 = strtr($D1, array('U+0020;' => '_')) ;

			
//			 str_replace(" ","_",$D1).
//			str_replace(chr(160),'_',$D1);
//			$D1 = strtr($D1, array(' ' => '_')) ;
//$D1 = str_replace(' ', '_', $D1);
//$D1 = str_replace('  ', '&nbsp;&nbsp;', $D1);
//$D1 = str_replace('\xA0', '&nbsp;', $D1);
//$D1 = str_replace('\xA0', '_', $D1);
//$D1 = trim($D1, "\xA0"); // <- THIS DOES NOT WORK
//trim($D1,"\xa0");
// EDITED>>
// UTF encodes it as chr(0xC2).chr(0xA0)
//$D1 = trim($D1,chr(0xC2).chr(0xA0)); // should work 

//trim($D1," \n\r\t\0\x0b\xa0");
//$D1 = preg_replace('/\s+/', '_', $D1);

//preg_replace('/(&nbsp;)+$/', '_', $D1);

			echo $D1;
			

			
			
			
			
			
			if ($row[$DDD] == "")
			echo "0";
			echo ">
			
			
			
			
			
			
		</TH>
		<TH >";
			echo "<input type='text' name='Q".$i."' id='Q".$i."' size='5' value=";
			$QQQ =  "Q".$i;
//			print $row[$QQQ];
			echo strtr($row[$QQQ], array(' ' => '&nbsp;')) ;
			if ($row[$QQQ] == "")
			echo "0";
			echo " onkeyup='calc()'> 
		</TH>
		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='ex".$i."'  id='ex".$i."'  size='5' value=";
			$EEE =  "ex".$i;
//			echo $row[$EEE];
			echo strtr($row[$EEE], array(' ' => '&nbsp;')) ;
			if ($row[$EEE] == "")
			echo "0";
			echo " onkeyup='calc()'> 
		</TH>

		
		
		<TH ><label>";
			$EEE =  "ex".$i;
			$MEEM =  $row[$EEE];
			//if (is_numeric($MEEM)) { echo "Yes"; } else { echo "No"; }
//echo $MEEM;
//$MEEM = $row[$EEE]; //automatically converts to numeric
$MEEM = floatval($row[$EEE]); //automatically converts to numeric
//$MEEM = floatval($MEEM); //automatically converts to numeric
//echo $MEEM*1.15;
echo floatval($row[$EEE])*1.15;


//echo ($row[$EEE]+0)*1.15;
//echo $row[$EEE]*1.15;
			//echo @$row[$EEE]*1.15; // A non-numeric value encountered
			 
echo "		</TH>


		<TH ><label>";
			$EEE =  "ex".$i;
			echo floatval($row[$EEE]) * @$row[$QQQ];
			$TotEx += floatval($row[$EEE]) * @$row[$QQQ];
echo "		</TH>

		<TH ><label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			$EEE =  "ex".$i;
			echo floatval($row[$EEE])*1.15*$row[$QQQ];
			 
	echo"	</TH>
	</TR>
	";
}	
	



	
echo "</table>";
	}
	}	echo "<br><span id='resp'></span>AJAX";	//AJAX  check javascript	

	echo "Total Ex VAT: = ";
	echo $TotEx;
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "Total Incl VAT: = ";
	echo $TotEx* 1.15;
	echo "<br><span id='resp'></span>AJAX";
	
	
	
//echo "<input type='hidden' CustEmail; NB If CustNo changes, then CustEmail also changes."

	
	?>


	
	
<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<dd><input type="submit" name="btn_submit" value="Submit/Save (After submitting you may change it to a quote)" > 
			
			
		</dl>

		
					
		<select name='Draft' id= 'Draft' >
<option  value='N'>Draft No.Invoice ready for sending</option>
<option  value='Y'>Draft Yes</option>
</select>
		open folder:	
			<?php
			

$queryFL = "SELECT L1 FROM customer WHERE CustNo = $CustInt" ;
echo "queryFL:".$queryFL."<br>";

if ($resultFL = mysqli_query($DBConnect, $queryFL)) {      //I think this is to determine the MAX invoice number
  while ($rowFL = mysqli_fetch_assoc($resultFL)) {
  $FL = $rowFL['L1'];
echo "Folder Location: ".$FL."&nbsp;&nbsp;"; //filelocation
}}
if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}
else
echo "<br>Customer folder found.<br>";
echo "<input type='text' name='L1' size = 35 value=";
			echo $FL;
			echo ">";
			echo "<br>";
?>
		
		
		
		
		
		
		
		</div>
</form>






<?php
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?> 
