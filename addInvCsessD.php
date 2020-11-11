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







</script>
</head>
<body>




<?php
require_once 'inc_OnlineStoreDB.php';//page567


require_once 'header.php';//page567

    @session_start();
	@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
	//do not start a form here
	//first the form of draft invoices comes first
?>

<?php


	include 'addInvCsessDdraft.php'; //this is a form on its own




	?>
	<!--WHy there are 2 forms here:  draft invoices get edited.
	<!--When a draft invoice is still to be worked on, then
	<form name="AddInv" onsubmit="return formValidator()" action="addInvprocess_lastC.php" method="post">
<!--calls addInvprocess_lastC.php<br>--->
<!--<form name="EditInv" action="edit_inv_process.php" method="post">-->
<form name="AddInv" onsubmit="return formValidator()" action="addInvCsessDchk.php" method="post">

<input type='hidden' name='CustNo' value="<?php echo $CustInt; ?>">










	<?php





$daNextNo = 1; //default if table is completely empty.
$queryMax = "SELECT MAX(InvNo)  AS MAXNUM FROM invoice"; ///CORRECT!! DO NOT REMOVE!!!! //2QUERIES HERE!!
$result = $DBConnect->query($queryMax);

/*while($row = mysqli_fetch_array($result)){
//	echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}*/
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[0]);
$InvNo = $row[0];
$InvNo = $InvNo+1;

//echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";

$OrdPd = "_";

$InvSQLDateDD = date("d");
$InvSQLDateMM = date("m");
$InvSQLDateYY =  date("Y");

//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";

$daNextNo = 1; //default when table is empty.

$queryM = "SELECT MAX(InvNo)  AS MAXNUM FROM invoice ";

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
//include 'monthtables.php';

$trimdaNextNoLL = $end[] = substr($daNextNo, -2);
//echo "trimdaNextNoLL: ". $trimdaNextNoLL."  ";
$trimdaNextNoFF = $end[] = substr($daNextNo, 0, 2);
echo "Suggested InvNo: ";

//if $daNextNo;
echo $daNextNo;

//echo " &nbsp; ".$queryM;
echo " &nbsp; ";

$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {


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

	$queryID1 = "UPDATE jqinv SET invsugg = '$daNextNo' WHERE id = '1'";
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

	$queryID2 = "UPDATE jqinv SET invsugg = '$Y$dotstr' WHERE id = '2'";
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


		 		echo "<br>InvoiceNo: ";
			echo "<input type='text' name='InvNo' id='InvNo' size  = '5' class='clInvNo' >";

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

echo "addInvprocessCsessD.php opens addInvprocess_lastC.php<br>";
		//echo "</dl>";

 	//	echo "<!--<dl>-->";
			echo "Customer: <b>";

			echo " ";

			echo "{$row2['CustNo']}&nbsp;";
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

	$ae = $row2['ae'];

echo "{$row2['CustAddr']}&nbsp;&nbsp;";
echo "{$row2['Distance']} km&nbsp;&nbsp;";
$Dist = $row2['Distance'];
$u1 = $row2['u1'];
$u2 = $row2['u2'];
$Important = $row2['Important'];
$Extra = $row2['Extra'];
$Confid = $row2['Confid'];
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
			$RU1 = $row["u1"];
			$RU2 = $row["u2"];

			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvPdStatus' size = 5 value=";

			echo "_";
			echo "> ";

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

 		//echo "<dl>Summary: &nbsp;</label>";

			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			//echo "<input type='text' name='Summary' id='Summary' size='45'  value=";

			//echo "";
			//echo "> Short and sweet overview without spaces, no &.</dd>";
		//echo "</dl>";
		?>
        <br><label>SumMary:</label><input type='text' name='Summary' id='Summary' value='' size='36' class='autoS' >
		<!-- class auto check mysql table autosuggest from search.php or search2.php-->
		<!-- onmouseover='mouseOver(this)'-->
       <input type="submit"  value="Submit"   />
  	<?php
	/*		echo "&nbsp;adslinv:";

echo "<textarea name='adslinv' id='adslinv'  style='white-space:pre-wrap;height:18px;font-family:arial;width:250px;font-size:10pt' >";

			echo "{$row2['adslinv']}";
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

	echo $ae;
	echo "> R";
	echo ($ae*1.14);
	echo "inex";

			echo "</font></b></dd></dl>";
			echo $Extra;
			/*
			echo "<b>Last topup invoiced:<textarea id='topup' style='white-space:pre-wrap; height:20px;width:350px;font-size: 10pt'  name='topup'  >";
	//echo $row["CustDetails"];

	echo $row['topup'];echo "</textarea>";
			*/






		echo "<br> Watch <b>AJAX</B> in action: &nbsp;&nbsp;&nbsp;

		Latest adsl invoicing events:<br>";//chk CalcServ.php-->
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
		<FONT size = '1'></b>(no apostrophees, no kommas)(Zeroes in empty fields!)</font></th>
		<TH WIDTH=11%><label>Qty</label>
		</th>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</th>
		<TH WIDTH=23%><label></label>
		</th>
		<!--<TH WIDTH=23%><label>Unit Price incl VAT</label>
		</th>
		<TH WIDTH=23%><label>Total Price ex VAT</label>
		</th>
		<TH WIDTH=23%><label>Total Price incl VAT</label>
		</th>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</th>-->";

		echo "</TR>	";
		echo "<TR>		<th>";

		echo "<input id='D1' type='text' name='D1' size='53'  value='";

		echo " {$row2['adslinv']}'><br/>";

		echo "</th>
		<th><input type='text' name='Q1' id='Q1' size='5' value='1' onkeyup='calc()'>

		</th>
		<th>
			  <input type='text' name='ex1' id='ex1' size='10' class='exxx1' onkeyup='calc()'  >{$row2['ae']}
		</th>



	";

if ($CustInt == 24)//auslese
{
echo "<b><font size = '3'>1GIG FREE</font></b>&nbsp;&nbsp;";
}




elseif ($CustInt == 155)//bluesky
{
echo "<b><font size = '3'>3GIG FREE</font></b>&nbsp;&nbsp;";
}
elseif ($CustInt == 76)//hildebrand
{
echo "<b><font size = '3'>3GIG FREE</font></b>&nbsp;&nbsp;";
}
elseif ($CustInt == 152)//mark
{
echo "<b><font size = '3'>3GIG FREE AT HOME</font></b>&nbsp;&nbsp;";
}
elseif ($CustInt == 14)//batsch
{
echo "<b><font size = '3'>2GIG FREE</font></b>&nbsp;&nbsp;";
}
elseif ($CustInt == 68)//elke
{
echo "<b><font size = '3'>1GIG FREE</font></b>&nbsp;&nbsp;";
}
else
echo "";

echo $row2['u1'];
echo $row2['u2'];
//echo $row2['CustPW'];
echo $row2['invD2'];

//echo "</table>";

	?>



 For discounts use a negative value. size 53 recommended for printing
		</TR>
	<TR>
		<th><input type='text' id='D2' name='D2' size='53'   value='<?php
		echo $row2['invD2'];

		 ?>'>
		<br>

		</th>
		<th><input type='text' name='Q2'  size='5' value='' id='Q2'  onkeyup='calc()'>

		</th>
		<th>
			<input type='text' name='ex2'  size='10'
			value='<?php
			$jng = $row2['ae2'];
			if ($jng == "")
				$jng = ''; //was zero  here previously
			echo $jng;
			?>' id='ex2'  onkeyup='calc()'>
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D3' name='D3' size='53'  value='<?php echo $row2['invD3'] ?>'>Travel <?php echo $Distance; ?> km
		</th>
		<th><input type='text' name='Q3' size='5'  value='' id='Q3'  onkeyup='calc()'>
		</th>
		<th>
			<input type='text' name='ex3'  size='10' id='ex3'  onkeyup='calc()' value='<?php echo $row2['ae3']?>'    >
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D4' name='D4' size='53'  value='<?php echo $row2['invD4']?>' >
		</th>
		<th><input type='text' name='Q4' size='5' value='' id='Q4'  onkeyup='calc()'>
		</th>
		<th>
			<input type='text' name='ex4'  size='10' id='ex4'  onkeyup='calc()' value='<?php echo $row2['ae4']?>'    >
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D5' name='D5' size='53'  value='<?php echo $row2['invD5']?>' >
		</th>
		<th><input type='text' name='Q5'  size='5' value='' id='Q5'  onkeyup='calc()'>
		</th>
		<th>
		<input type='text' name='ex5' size='10' id='ex5' onkeyup='calc()'  value='<?php echo $row2['ae5']?>' >
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D6' name='D6' size='53'  value='<?php echo $row2['invD6']?>' >
		</th>
		<th><input type='text' name='Q6'  size='5' value='' id='Q6'  onkeyup='calc()'>
		</th>
		<th>
			<input type='text' name='ex6'  size='10' id='ex6'  onkeyup='calc()'  value='<?php echo $row2['ae6']?>' >
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D7' name='D7' size='53'  value='<?php echo $row2['invD7']?>' >
		</th>
		<th><input type='text' name='Q7'  size='5' value='' id='Q7'  onkeyup='calc()'>
		</th>
		<th>
			<input type='text' name='ex7' size='10' id='ex7'  onkeyup='calc()'  value='<?php echo $row2['ae7']?>' >
		</th>
	</TR>

	<TR>
		<th><input type='text'  id='D8' name='D8' size='53'  value='<?php echo $row2['invD8']?>' >
		</th>
		<th><input type='text' name='Q8'  size='5' value='' id='Q8'  onkeyup='calc()'>
		</th>
		<th>
			<input type='text' name='ex8' size='10'  id='ex8'  onkeyup='calc()'  value='<?php echo $row2['ae8']?>' >
		</th>
	</TR>




	</table>

	<span id="resp"></span><!-- in here possibly AJAX invoice total CalcServ.php-->
	<?php
		echo "<!--<dl>-->Total Amount incl VAT R</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' id='TotAmt' value=";
			echo "";
			echo "> <Do not put a 'R' here.</dd>";
		echo "</dl>";

//}}

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
<option  value='Please choose Draft'>Please choose Draft</option>
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

echo "<br>determine next inv number: this can only be done after view_inv.php <br>";

include ("view_inv.php");

echo "SELECT * FROM expenses WHERE CustNo = '$CustInt'";

?>
</form>

<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
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
