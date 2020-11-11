


 <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>Add Invoice ProcessC</title>

  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
/*function mouseOver()
{
    //autocomplete
    $(".auto").autocomplete({
        source: "search2.php",
        minLength: 0
    });

}*/
function formValidator(){
	// Make quick references to our fields
//	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var InvNo = document.getElementById('InvNo');
	var Summary = document.getElementById('Summary');
	var TotAmt = document.getElementById('TotAmt');
	var TTTT = document.getElementById('TTTT');
	var ex1 = document.getElementById('ex1');

	var D1 = document.getElementById('D1');
	var D2 = document.getElementById('D2');
	var D3 = document.getElementById('D3');
	var D = document.getElementById('D4');
	var D = document.getElementById('D5');
	var D = document.getElementById('D6');
	var D = document.getElementById('D7');
	var D = document.getElementById('D8');
	var Draft = document.getElementById('Draft');
	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');

	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(InvNo, "Please enter a valid numeric invoice  number  INVOICE No")){
			if(notEmpty(Summary, "Please enter a short summary")){
			if(notEmpty(TotAmt, "Please enter a valid float invoice total amount")){
	//		if(Compare( Summary, TotAmt, TTTT,"Total amounts don't match")){
		//	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				if(madeSelection(Draft, "Please choose Draft")){
					if(lengthRestriction(InvNo, 1, 15)){
					if(lengthRestriction(D1, 1, 53)){
					if(isBiggerThanZero(ex1, "Price is first product is zero")){
							return true;

						}
			//		}


				}
			}}
		}
	}

	}//very important bracket part of isNumeric!!!!!
	return false;

}//very important end of formvalidator!!

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}
function isBiggerThanZero(elem, helperMsg){
	if(elem.value < 1){
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

/*function isFloat(elem, helperMsg){
	var numericExpression = /^[0-9\.]+$/-;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}*/
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
		alert("Please enter between " +min+ " and " +max+ " characters in "+uInput+ " ");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please choose Draft"){
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




function Compare(elem, elem2, elem3, helperMsg){

//alert("elem2 is " +elem2+ " _");
//alert("elem is " +elem+ " and  elem2 is " +elem+ " ");
alert(elem2.value);
alert("ywllo");
alert(elem2.value);
alert(elem3.value); //unfortunately it crashes here becasue this is an AJAC
alert(elem.value);

	//	return elem;
	//	return elem2;

	if(elem.value !== elem2.value){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	else
	{
			//return elem;
	//	return elem2;

	}
	return true;
}



//function noBack(){window.history.forward();}

//function preventBack(){window.history.forward();}
 //   setTimeout("preventBack()", 0);
  //  window.onunload=function(){null};
</script>



</script>
</head>
<body onload="noBack();" onpageshow="if(event.persisted)noBack();" onunload="">




<?php
	require_once 'inc_OnlineStoreDB.php';//page567


	require_once 'header.php';//page567

 //   @session_start();
//	@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
//	$CustInt = $_SESSION['CustNo'];
	//do not start a form here
	//first the form of draft invoices comes first
$InvNo = 0;
$CustNo = '';
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
$CustNo = $_POST['CustNo']; //DO NOT REMOVE! DO NOT REMOVE!!!
$CustInt = $CustNo;
if ($CustNo == "")
echo "<b><font size = 4 color = red>error, no Customer Number!!!</font>";

//$InvDate = $_POST['InvDate'];
$InvSQLDateDD = $_POST['InvSQLDateDD'];
$InvSQLDateMM = $_POST['InvSQLDateMM'];
$InvSQLDateYY = $_POST['InvSQLDateYY'];

$Draft = 'Y';
$Draft = $_POST['Draft'];
$InvPdStatus = $_POST['InvPdStatus'];
$D1 = $_POST['D1'];
$Q1 = $_POST['Q1'];
$ex1 = $_POST['ex1'];
//$ex1= @number_format ($ex1, 4, ".", "");
//$ex1= floatval($ex1);
$D2 = $_POST['D2'];
$Q2 = $_POST['Q2'];
$ex2 = $_POST['ex2'];
//$ex2= @number_format ($ex2, 4, ".", "");
//$ex2= floatval($ex2);
$D3 = $_POST['D3'];
$Q3 = $_POST['Q3'];
$ex3 = $_POST['ex3'];
//if ($ex3== '')
//$ex3 = 0;

//$ex3= @number_format ($ex3, 4, ".", "");
//$ex3= floatval($ex3);
$D4 = $_POST['D4'];
$Q4 = $_POST['Q4'];
$ex4 = $_POST['ex4'];
//if ($ex4== '')
//$ex4 = 0;

//$ex4= number_format ($ex4, 4, ".", "");
//$ex4 = floatval($ex4);
$D5 = $_POST['D5'];
$Q5 = $_POST['Q5'];
$ex5 = $_POST['ex5'];
//if ($ex5== '')
//$ex5 = 0;
//$ex5= number_format ($ex5, 4, ".", "");
//$ex5= floatval($ex5);
$D6 = $_POST['D6'];
$Q6 = $_POST['Q6'];
$ex6 = $_POST['ex6'];
//if ($ex6== '')
//$ex6 = 0;
//$ex6= number_format ($ex6, 4, ".", "");
//$ex6= floatval($ex6);
$D7 = $_POST['D7'];
$Q7 = $_POST['Q7'];
$ex7 = $_POST['ex7'];
//if ($ex7== '')
//$ex7 = 0;
//$ex7= number_format ($ex7, 4, ".", "");
//$ex7= floatval($ex7);
$D8 = $_POST['D8'];
$Q8 = $_POST['Q8'];
$ex8 = $_POST['ex8'];
//if ($ex8== '')
//$ex8 = 0;

//$ex8= number_format ($ex8, 4, ".", "");
//$ex8= floatval($ex8);
$Abbr = $_POST['Abbr'];
if ($Abbr == "")
echo "WARNING Abbr is empty this will affect the SDR and Summary combo!";
$Summary = $_POST['Summary'];
$TotAmt = $_POST['TotAmt'];
$TAmt = $_POST['TotAmt'];

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
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b><br>";
echo "<font face = 'arial' size = 5 color= red><b>correct invoice below before submitting:!</FONT></b><br>";

echo "<font face = 'arial' size = 5 color= red><b>(don't click back)</FONT></b><br>";
}


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

	?>









<form name="AddInv" onsubmit="return formValidator()" action="addInvprocess_lastC.php" method="post">

<!--<input type='hidden' name='CustNo' value="<?php //echo $CustInt; ?>">-->










	<?php




/*
// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
//$result = mysql_query($query) or die(mysql_error());
$daNextNo = 1; //default if table is completely empty.
$queryMax = "SELECT  MAX(InvNo)  AS MAXNUM FROM invoice"; ///CORRECT!! DO NOT REMOVE!!!! //2QUERIES HERE!!
$result = $DBConnect->query($queryMax);

$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[0]);
$InvNo = $row[0];
$InvNo = $InvNo+1;

//echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";

$OrdPd = "_";

$InvSQLDateDD = date("d");
$InvSQLDateMM = date("m");
$InvSQLDateYY =  date("Y");
*/
//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";

/*$daNextNo = 1; //default when table is empty.

$queryM = "SELECT  MAX(InvNo)  AS MAXNUM FROM invoice where invno < $sg";

$result = $DBConnect->query($queryM);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><br><font size = 5 color = red><b><b>queryM NOT successfull!!!</b></b></font><br><br>";
//else
//echo "select success! <br>";

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no EventNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}


$trimdaNextNoLL = $end[] = substr($daNextNo, -2);
//echo "trimdaNextNoLL: ". $trimdaNextNoLL."  ";
$trimdaNextNoFF = $end[] = substr($daNextNo, 0, 2);
//echo "trimdaNextNoFF: ". $trimdaNextNoFF."  ";

if ($trimdaNextNoLL < '62')
{
$daNextNoBB = '64';

$daNextNo = $trimdaNextNoFF.$daNextNoBB;

}


if ($trimdaNextNoLL > '97')
{
echo "<b>error ! change program for new suggestion.\$sg</b><br><br><br>";
}


echo "Suggested InvNo: ";

//if $daNextNo;
echo $daNextNo;

echo " &nbsp; ".$queryM;
echo " &nbsp; (PremierShoes ..61)";

*/











$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {

/*
 // $dotdot = $row2['dotdot'];
	//now we show which invoices was the latest one created:
	$queryLastInv = "SELECT MAX(InvNo) as LIVV FROM invoice  WHERE CustNo = $CustInt" ;
//echo "queryLastInv:".$queryLastInv."<br>";

if ($resultLastInv = mysqli_query($DBConnect, $queryLastInv)) {      //to determine the MAX invoice number
  while ($rowLastInv = mysqli_fetch_assoc($resultLastInv)) {
  $LIV = $rowLastInv['LIVV'];
}
mysqli_free_result($resultLastInv);
}
$First = substr($LIV, 0, 2);

//echo "F: ".$First."<br>";

$Y = $First+1;
//	echo "Y: ".$Y."<br>";
*/


/*	$queryID1 = "UPDATE jqinv SET invsugg = '$daNextNo' WHERE id = '1'";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $queryID1) === TRUE) {
	//echo '<br>queryID1 Success: '.$queryID1;
	echo "";
}
else
{
	//echo '<script type="text/javascript">alert("ERROR id1 NOT updated .$querySDR.")</script>';
	echo '<br><font size = 5 color = red><b>queryID1 NO success! </b></font><br>'.$queryID1;
}
	*/
/*	$queryID2 = "UPDATE jqinv SET invsugg = '$Y$dotstr' WHERE id = '2'";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $queryID2) === TRUE) {
echo "";
	//echo '<br>queryID2 Success: '.$queryID2."<br>";
}
else
{
	//echo '<script type="text/javascript">alert("ERROR id1 NOT updated .$querySDR.")</script>';
	echo '<br><font size = 5 color = red><b>queryID1 NO success! </b></font><br>'.$queryID2;

}
*/

		 		echo "<br>InvoiceNo: ";
			echo "<input type='text' name='InvNo' id='InvNo' size  = '5' value='$InvNo' >";

//echo "<option  value='select'>select.. </option>";

				echo "{$row2['dotdot']}</dt></dd>";
		//echo "open folder:	";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

//echo " ".$LIV." was Last inv created&nbsp;&nbsp;"; //filelocation








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

			echo "<a href= 'file:///".$newfldr."'  >$newfldr</a>&nbsp; &nbsp;    ";
//   file:///F:/_work/Customers/A/Abel_Jutta
			echo "<a href='addInvprocessCsess.php'>Inv No descriptions</a> </font>";

echo "addInvprocessCsessD.php opens addInvprocess_lastC.php<br>";
		//echo "</dl>";

 	//	echo "<!--<dl>-->";
			echo "Customer: <b>";

			echo " ";

			echo "<input type = 'text' value='$CustNo' id='CustNo' name= 'CustNo'>&nbsp;";
echo $row2['CustFN']."&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
$FNLN = $row2['CustFN'].$row2['CustLN'];
echo "</b><input type = 'hidden' name = 'FNLN' value = $FNLN >";

echo "{$row2['CustTel']}&nbsp;&nbsp;";
echo "{$row2['CustCell']}&nbsp;&nbsp;";
echo "{$row2['CustEmail']}&nbsp;&nbsp;";

echo "<input type='hidden' name='CustEmail' value=";
			echo $row2['CustEmail'];
			echo ">";

echo "<input type='hidden' name='L1' value=";
			echo $row2['L1'];
			echo ">";

	//$ae = $row2['ae'];

echo "{$row2['CustAddr']}&nbsp;&nbsp;";
echo "{$row2['Distance']} km&nbsp;&nbsp;";
$Dist = $row2['Distance'];
$u1 = $row2['u1'];
$u2 = $row2['u2'];
//$Important = $row2['Important'];
//$Extra = $row2['Extra'];
//$Confid = $row2['Confid'];
$Distance = "0";
$Distance = $row2['Distance'];
$Abbr = $row2['ABBR']; //CASE SENSITIVE!!!

			   mysqli_free_result($result);

			// DO NOT DISABLE!!! addInvprocess_lastC needs to know which customer got selected!!
			//There is no inserting here yet!!!


			echo " Abbr: <input type='hidden' name='Abbr' value=";
			echo " ";
			echo $Abbr;
			echo "> ";

			echo $Abbr;

		//echo "</dl>";
echo "<br>";
 		echo "<!--<dl>--><label>InvDate:&nbsp;&nbsp;&nbsp;&nbsp;</label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvSQLDateDD' size = '2' value=";

			echo $InvSQLDateDD;
			echo "> ";

			echo "<input type='text' name='InvSQLDateMM' size = '2' value=";
			echo $InvSQLDateMM;
			echo "> ";

			echo "<input type='text' name='InvSQLDateYY' size = '2' value=";
			echo $InvSQLDateYY;
			//echo "201";
			echo "> ";

		//echo"	DD/MM/YYYY ";

			//echo "Today: ".$InvSQLDateDD;
		//	echo "/";

		//	echo $InvSQLDateMM;
		//	echo "/";

		//	echo $InvSQLDateYY;
		//	echo " ";
						$RU1 = "_";
			$RU2 = "_";
			$RU1 = $row2["u1"];
			$RU2 = $row2["u2"];

			echo "</dd>";
		/*
			echo "<b>Last topup invoiced:";
			//<input type='text' size = '5' value=";echo $row2['topup'];	echo "></b> ";  textboxes don;t show spaces
		echo "<textarea id='topup' style='white-space:pre-wrap; height:18px;font-family:arial;width:200px;font-size: 10pt'  name='topup'  >";
	echo $row2['topup'];  echo "</textarea>";
	*/
			echo "</font></b></dd></dl>";
			//echo $row2['topup'];

		echo "</dd>";
		echo "</dl>";

		?>
        <br><label>SumMary:</label><input type='text' name='Summary' id='Summary' value='<?php echo $Summary; ?>' size='36'  >
		<!-- class auto check mysql table autosuggest from search.php or search2.php-->
		<!-- onmouseover='mouseOver(this)'-->
       <input type="submit"  value="Submit"   />
  	<?php
		/*	echo "&nbsp;adslinv:";

echo "<textarea name='adslinv' id='adslinv'  style='white-space:pre-wrap;height:18px;font-family:arial;width:250px;font-size:10pt' >";
		$adslinv = $_POST['adslinv'];
		echo $adslinv;
			//echo "{$row2['adslinv']}";
			echo "</textarea> &nbsp;&nbsp;&nbsp;&nbsp;";
			*/
  		echo "Travel:";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $Dist; q_mark>" /></dd>-->
			echo $Dist;
			echo "km ";
			echo $u1;
			echo $u2;

			  		echo "<br><!--<dl>-->Important</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<font size = '5'><b><textarea type='text' name='Important' style='height:24px;font-size:10pt;width:750px;font-family:arial;' size = 100 >";

			echo $Important;
			echo "</textarea> </font></b></dd></dl>";

			  		echo "<dl>Extra</label></dt>";

			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->







			echo "<textarea id='Extra' style='white-space:pre-wrap; height:100px;font-family:arial;width:550px;font-size: 10pt'  name='Extra'  >";

	echo $Extra;  echo "</textarea>";

			  		//echo "<dl></label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->



?>

<style>
label.button {
    padding: 0.2em 0.4em;
    -webkit-appearance: button;
}

#customize {
    display: none;
}

#customize + #Confid {
    display: none;
}

#customize:checked + #Confid {
    display: inline-block;
}
</style>

	 <label class="button" for="customize">Confid</label><br>

    <input type="checkbox" id="customize" />
<?php



			echo "<textarea id='Confid' style='white-space:pre-wrap; height:100px;font-family:arial;width:700px;font-size: 10pt'  name='Confid'  >";
	echo $Confid;  echo "</textarea>";

/*	echo $ae;
	echo "> R";
	echo ($ae*1.14);
	echo "inex";
	*/
			echo "</font></b></dd></dl>";
			//echo $Extra;
			/*
			echo "<b>Last topup invoiced:<textarea id='topup' style='white-space:pre-wrap; height:20px;width:350px;font-size: 10pt'  name='topup'  >";
	//echo $row["CustDetails"];

	echo $row['topup'];echo "</textarea>";
			*/






		echo "<br> Watch <b>AJAX</B> in action: &nbsp;&nbsp;&nbsp;Latest adsl invoicing events:<br>";//chk CalcServ.php-->
	$date = date('Y-m-d',time()-(1*86400)); // 1 days ago
$queryE = "SELECT * FROM events WHERE CustNo = $CustInt and   EDate >= '$date' order by EDate desc" ;
//echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
//echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;</th><th>";

echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;<br>";

}$resultE->free();
}

echo"<TABLE WIDTH=10 BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=40*>		<COL WIDTH=57*>		<COL WIDTH=30*>";
echo"<TR>
		<TH WIDTH=52%><label>Description1 </label>
		<FONT size = '1'></b>(no apostrophees, no kommas)(Zeroes in empty fields!)</font></TH>
		<TH WIDTH=11%><label>Qty</label>
		</TH>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</TH>
		<TH WIDTH=23%><label></label>
		</TH>
		<!--<TH WIDTH=23%><label>Unit Price incl VAT</label>
		</TH>
		<TH WIDTH=23%><label>Total Price ex VAT</label>
		</TH>
		<TH WIDTH=23%><label>Total Price incl VAT</label>
		</TH>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</TH>-->";

		echo "</TR>	";
		echo "<TR>		<TH>";

		echo "<input id='D1' type='text' name='D1' size='53'  value='";

		echo $D1."'><br/>";

		echo "</TH>
		<TH ><input type='text' name='Q1' id='Q1' size='5' value='$Q1' >

		</TH>
		<TH >
			  <input type='text' name='ex1' id='ex1' size='10' value='$ex1' class='exxx1'   >
		</TH>



	";

if ($CustInt == 76)//hildebrand
{
echo "<b><font size = '3'>3GIG FREE</font></b>&nbsp;&nbsp;";
}

echo $row2['u1'];
echo $row2['u2'];
//echo $row2['CustPW'];
//echo $row2['D2'];

//echo "</table>";

	?>



Don't forget TOPUP checkup!!!  For discounts use a negative value. size 53 recommended for printing
		</TR>
	<TR>
		<TH><input type='text' id='D2' name='D2' size='53'   value='<?php
		echo $D2;

		 ?>'>
		<br>
	<?php
 //HIDDEN:
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' id='topup' name='topup'  value=' ";
	echo $Topup;  echo "' >";

?>
	 	</TH>
		<TH ><input type='text' name='Q2'  size='5' value="<?php echo $Q2 ; ?>" id='Q2'  >

		</TH>
		<TH >
			<input type='text' name='ex2'  size='10'
			value="<?php echo $ex2 ; ?>" id='ex2'  >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D3' name='D3' size='53'  value='<?php echo $D3 ?>'>
		</TH>
		<TH ><input type='text' name='Q3' size='5'  value="<?php echo $Q3 ; ?>" id='Q3'  >
		</TH>
		<TH >
			<input type='text' name='ex3'  size='10' id='ex3'   value='<?php echo $ex3 ?>'    >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D4' name='D4' size='53'  value='<?php echo $D4 ?>' >
		</TH>
		<TH ><input type='text' name='Q4' size='5' value="<?php echo $Q4 ; ?>" id='Q4'  >
		</TH>
		<TH >
			<input type='text' name='ex4'  size='10' id='ex4'   value='<?php echo $ex4; ?>'    >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D5' name='D5' size='53'  value='<?php echo $D5; ?>' >
		</TH>
		<TH ><input type='text' name='Q5'  size='5' value="<?php echo $Q5 ; ?>" id='Q5'  >
		</TH>
		<TH >
		<input type='text' name='ex5' size='10' id='ex5'   value='<?php echo $ex5; ?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D6' name='D6' size='53'  value='<?php echo $D6; ?>' >
		</TH>
		<TH ><input type='text' name='Q6'  size='5' value="<?php echo $Q6 ; ?>" id='Q6'  >
		</TH>
		<TH >
			<input type='text' name='ex6'  size='10' id='ex6'    value='<?php echo $ex6; ?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D7' name='D7' size='53'  value='<?php echo $D7; ?>' >
		</TH>
		<TH ><input type='text' name='Q7'  size='5' value="<?php echo $Q7 ; ?>" id='Q7'  >
		</TH>
		<TH >
			<input type='text' name='ex7' size='10' id='ex7'    value='<?php echo $ex7; ?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D8' name='D8' size='53'  value='<?php echo $D8; ?>' >
		</TH>
		<TH ><input type='text' name='Q8'  size='5' value="<?php echo $Q8 ; ?>" id='Q8'  >
		</TH>
		<TH >
			<input type='text' name='ex8' size='10'  id='ex8'    value='<?php echo $ex8; ?>' >
		</TH>
	</TR>




	</table>
<font color=red size = 3>	NB Did you add or change amounts? Then change the Total Amount as well:<br>
	<span id="resp"></span><!-- in here possibly AJAX invoice total CalcServ.php-->
	<?php
		echo "<!--<dl>-->Total Amount incl VAT R</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' id='TotAmt' value=";
			echo $TotAmt;
			echo "><br>";

//not needed in cchk system because lastC adds all amounts up					echo "<!--<dl>-->Total Amount incl VAT R</label></dt>";
//			echo "<input type='text' name='ITN' id='ITN' value=";
//			echo $ITN;
//			echo ">";

	}
	}
	?>

<div>
		<!--<dl>-->
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<!--<dl>-->

			<!--<input type="submit"  value="Submit/Save"
			onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->
			<input type="submit"  value="Submit/Save"   />



		<select name='Draft' id= 'Draft' >
<option  value='<?php echo $Draft; ?>'>Draft selected: <?php echo $Draft; ?></option>
<option  value='Y'>Draft Yes</option>
<option  value='N'>Draft No. Quickly create invoice for sending</option>
<option  value='Paid'>This invoice has been paid</option>
<option  value='Now'>This invoice has been paid JUST NOW</option>

</select>

			<!-- sequence might be important! first onsubmit then action!-->
<!-- id in input name is used for javascript validation and name is used for POST I presume-->


			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>


<?php
echo $CustInt;
?>

<br>
<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Select a Product assigned to customer'><br><br><br>
<input type='text' name='clExp' id='clExp' size  = '130' class='clExp' value= 'Select a Product'>
<!--<form action='' method='post'>
        <br><label>Summary:</label><input type='text' name='summ' value='' class='auto'><br>
    </form>
-->

<?php


//echo "test<br>";
include 'view_trans_by_custUNDERorOVERPAID.php';
echo "<br>edit_trans_CustProcessCinvFirst.php<br>";
include ("edit_trans_CustProcessCinvFirst.php");
//echo "test<br>";
include ("view_event_by_cust.php");

include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
echo "<br>";echo "<br>";
include ("view_inv_prev_by_cust.php");

//echo "test2<br>";
//include ("view_trans_by_cust.php");
//echo "test3<br>";
echo "<br>determine next inv number: this can only be done after view_inv.php <br>";
//echo "test4<br>";
include ("view_inv.php");

//echo "test5<br>";
//include ("view_inv_all.php");

//require_once 'view_inv_one.php';

/*
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "</tr>\n";

	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];
	  echo "<tr><th>";

	  if ($x >= 4400 && $x <= 4469)
	  echo "<FONT color = 'red'>".$x." JAN2012";
	  else if ($x >= 4500 && $x <= 4569)
	  echo "<FONT color = 'red'>".$x. " FEB2012 ";
	  else if ($x >= 4600 && $x <= 4669)
	  echo "<FONT color = 'red'>".$x. " MAR2012 ";
	  else if ($x >= 4700 && $x <= 4769)
	  echo "<FONT color = 'red'>".$x. " APR2012 ";
	  else if ($x >= 4800 && $x <= 4869)
	  echo "<FONT color = 'red'>".$x. " MAY2012 ";
	  else if ($x >= 4900 && $x <= 4962)
	  echo "<FONT color = 'red'>".$x. " JUN2012 ";
	  else if ($x >= 5000 && $x <= 5069)
	  echo "<FONT color = 'red'>".$x. " JUL2012 ";
	  else if ($x >= 5100 && $x <= 5169)
	  echo "<FONT color = 'red'>".$x. " AUG2012 ";
	  else if ($x >= 5200 && $x <= 5269)
	  echo "<FONT color = 'red'>".$x. " SEP2012 ";
	  else if ($x >= 5300 && $x <= 5369)
	  echo "<FONT color = 'red'>".$x. " OCT2012 ";
	  else if ($x >= 5400 && $x <= 5469)
	  echo "<FONT color = 'red'>".$x. " NOV2012 ";
	  else if ($x >= 5500 && $x <= 5569)
	  echo "<FONT color = 'red'>".$x. " DEC2012 ";
	  else if ($x >= 5600 && $x <= 5669)
	  echo "<FONT color = 'red'>".$x. " JAN2012 ";
	  else if ($x >= 5700 && $x <= 5769)
	  echo "<FONT color = 'red'>".$x. " FEB2013 ";
	  else if ($x >= 5800 && $x <= 5869)
	  echo "<FONT color = 'red'>".$x. " MAR2013 ";
	  else if ($x >= 5900 && $x <= 5969)
	  echo "<FONT color = 'red'>".$x. " APR2013 ";
	  else if ($x >= 6000 && $x <= 6069)
	  echo "<FONT color = 'red'>".$x. " MAY2013 ";
	  else if ($x >= 6100 && $x <= 6169)
	  echo "<FONT color = 'red'>".$x. " JUN2013 ";
	  else if ($x >= 6200 && $x <= 6269)
	  echo "<FONT color = 'red'>".$x. " JUL2013 ";
	  else if ($x >= 6300 && $x <= 6369)
	  echo "<FONT color = 'red'>".$x. " AUG2013 ";
	  else if ($x >= 6400 && $x <= 6469)
	  echo "<FONT color = 'red'>".$x. " SEP2013 ";
	  else if ($x >= 6500 && $x <= 6569)
	  echo "<FONT color = 'red'>".$x. " OCT2013 ";
	  else if ($x >= 6600 && $x <= 6669)
	  echo "<FONT color = 'red'>".$x. " NOV2013 ";
	  else if ($x >= 6700 && $x <= 6769)
	  echo "<FONT color = 'red'>".$x. " DEC2013 ";
  else echo $x;
	  echo "</th></FONT>";
echo "</tr>\n";
		}
    //
    $result->close();mysqli_free_result($result);

}
echo "</table>";

*/




echo "SELECT * FROM expenses WHERE CustNo = '$CustInt'";

?>
</form>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {

    //autocomplete
    $(".autoS").autocomplete({
        source: "search.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	});

     $(".clInvNo").autocomplete({
        source: "searchinvAdd.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	});

    $(".exxx1").autocomplete({
        source: "searchexxx1.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	});

	//var delay = $( ".clExpC" ).autocomplete( "option", "delay" );

    $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0

				}).mouseover(function() {
				$(this).autocomplete("search");
	//});
		//		}).mouseout(function() {
		//		$(this).autocomplete("reset");
	//});
//$(".clExpC").autocomplete({
    //    source: "searchExpC.php",
   //     minLength: 0
	});
/*
       $(".clExpC").autocomplete({
        source: "searchExpC.php",
        minLength: 0


		}).mouseleave(function() {
			$(this).autocomplete("close", "delay", 5000);
	});

	*/




//expenses or products
    $(".clExp").autocomplete({
        source: "searchExp.php",
        minLength: 0

				}).focus(function() {
				$(this).autocomplete("search");
	});

				//Solution: http://jsfiddle.net/ricardolohmann/SdLaP/
//http://stackoverflow.com/questions/4604216/jquery-ui-autocomplete-minlength0-issue

/*	$("input#autocomplete").focus(function(e) {
    if(!e.isTrigger) {
        $(this).autocomplete("search", "");
    }
    return false;
*/


 });
</script>
</body>
</html>
