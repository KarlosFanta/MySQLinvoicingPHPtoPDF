<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Invoice ProcessC</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
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

}//very important end of formvalidator!!

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
/*function isFloat(elem, helperMsg){      //NTO WORKING!!!
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


<?php
	require_once 'inc_OnlineStoreDB.php';//page567
	require_once 'header.php';//page567

    @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];

// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
//$result = mysql_query($query) or die(mysql_error());
$daNextNo = 1; //default if table is completely empty.
$query = "SELECT  MAX(InvNo)  AS MAXNUM FROM invoice"; ///CORRECT!! DO NOT REMOVE!!!!
$result = $DBConnect->query($query);

/*while($row = mysqli_fetch_array($result)){
//	echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}*/
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[0]);
$InvNo = $row[0];
$InvNo = $InvNo+1;

//echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";

/*
	$InvDate = $_POST['Date1'];
	//$Summary = $_POST['Summary'];

	//$CustInt = intval($Custno[0]);
	//echo "Make sure an invoice is selected.<br>";
	$TBLrow = $_POST['mydropdownDC'];
	//echo $TBLrow;
	//echo " 0: ".$TBLrow[0]."<br>";
	//$Custno = explode( "_", $TBLrow);
	//echo "___:".$CustInt."   ";

$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);
*/
//echo "<br>Custint:".$CustInt."</br />";
//	echo " Selected Customer : ". $CustInt ."<br>";

//$query = "SELECT CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT CustNO, CustLN FROM customer WHERE CustNo = $CustInt" ;
$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

//echo "Q:".$query;
//	  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
/*
if ($result2 = $DBConnect->query($query)) {

    while ($row2 = $result2->fetch_assoc()) {
       // printf ("%s (%s)\n", $row2['CustNo'], $row2['CustFN']);
	///	$TransNo_Check = $row[0];

			//echo "selected CustomerNo: ".$row2['CustNo']."<br>";
			//echo "selected CustomerLN: ".$row2['CustLN']."<br>";
//echo "<table width='100%' border='1'>\n";
/*echo "<tr><th>CustNo</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Email</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Distance</th>";
echo "<th>ABBR</th>";
//echo "<th>LastLogin</th>";
//echo "<th>CustPW</th></tr>\n";

echo "{$row2['CustNo']}&nbsp;";
echo "{$row2['CustFN']}&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;&nbsp;";
echo "{$row2['CustTel']}&nbsp;&nbsp;";
echo "{$row2['CustCell']}&nbsp;&nbsp;";
echo "{$row2['CustEmail']}&nbsp;&nbsp;";
echo "{$row2['CustAddr']}&nbsp;&nbsp;";
echo "{$row2['Distance']} km&nbsp;&nbsp;";
echo "{$row2['ABBR']}&nbsp;"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR'];
/*
echo "<tr><th>{$row2['CustNo']}</th>";
echo "<th>{$row2['CustFN']}</th>";
echo "<th>{$row2['CustLN']}</th>";
echo "<th>{$row2['CustTel']}</th>";
echo "<th>{$row2['CustCell']}</th>";
echo "<th>{$row2['CustEmail']}</th>";
echo "<th>{$row2['CustAddr']}</th>";
echo "<th>{$row2['Distance']} km</th>";
echo "<th>{$row2['ABBR']}</th>"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR'];
//echo "<th>{$row2['LastLogin']}</th>";
//echo "<th>{$row2['CustPW']}</th></tr>\n";
//echo "<td>{$row[5]}</td>";
echo "</tr>\n";

    $result->close();

}
//echo "</table>";

	}



*/





	$OrdPd = "_";

//$DateD = date("Y.m.d");
//$NewFormat = date("d/m/Y");
//$InvSQLDate = $D1[2]."-".$D1[1]."-".$D1[0];
$InvSQLDateDD = date("d");
$InvSQLDateMM = date("m");
$InvSQLDateYY =  date("Y");

//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";

?>
<form name="AddInv"  action="addInvprocess_lastC.php" onsubmit='return formValidator()' method="post">
<!--calls addInvprocess_lastC.php<br>--->

<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invoice before we change him on the last form.


//echo "TBLrow: " .$TBLrow."</BR>";

//while ($TBLrow !=NULL) {
//echo "$Invno</br />";
//$Invno = strtok(";");
//}
//echo "InvnozERO: ";
//echo $Invno[0]."</br />";
//$InvNo = intval($Invno[0]);

//echo "<br>InvNo:".$InvNo."</br />";

//$sql = "SELECT InvNo,  FROM invoice WHERE InvNo = $InvNo" ;
//$query = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
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
///echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Thank you for selecting ".$TBLrow." from your database. You may now change its details.</BR>"   ;

//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
// while ($row = mysql_fetch_assoc($objResult)) {

echo "This is addInvprocessCsess.php  ";
echo "<a href='addInvprocessCsessD.php'><font size = '3'>First Click here to if you need to add descriptions</font>";
echo "addInvprocessCsessD.php</a><br>";

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is to determine the MAX invoice number
  while ($row = @mysqli_fetch_assoc($result)) {


 		echo "<dl><label>InvoiceNo: </label>";
			echo "<input type='text' name='InvNo' id='InvNo' size  = '5' value=";
			//echo $InvNo;
			echo "> </dt></dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "Customer: ";

			if ($result2 = $DBConnect->query($query)) {

    while ($row2 = $result2->fetch_assoc()) {







			//echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
	//		echo $row['CustLN'];

			echo "{$row2['CustNo']}&nbsp;";
			echo "<b><FONT size = 4 face = arial>&nbsp;&nbsp;";
echo $row2['CustFN']."&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
			echo "</FONT></b>";

echo "{$row2['CustTel']}&nbsp;&nbsp;";
echo "{$row2['CustCell']}&nbsp;&nbsp;";
echo "{$row2['CustEmail']}&nbsp;&nbsp;";
echo "{$row2['CustAddr']}&nbsp;&nbsp;";
echo "{$row2['Distance']} km&nbsp;&nbsp;";
$Important = $row2['Important'];

echo "{$row2['ABBR']}&nbsp;"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR']; //CASE SENSITIVE!!!

			   $result->close();

	//		echo "&nbsp;&nbsp;Account No: ";
	//		echo $row['CustNo'];

			// DO NOT DISABLE!!! addInvprocess_lastC needs to know which customer got selected!!
			//There is no inserting here yet!!!
			echo " <input type='hidden' name='CustNo' value=";
			echo " ";
			echo $row['CustNo'];
			echo "> ";

			echo " Abbr: <input type='hidden' name='Abbr' value=";
			echo " ";
			echo $Abbr;
			echo "> ";

			echo $Abbr;

}
//echo "</table>";

	}


		echo "</dl>";
		echo "This is addQuoprocessCsess.php ";
echo "<b><a href='addInvprocessCsessD.php'><font face= arial size = '3'>NB NB NB First Click here to if you need to add descriptions</font></b></a>";
echo "addInvprocessCsessD.php</a><br>";

 		echo "<dl><label>InvDate:&nbsp;&nbsp;&nbsp;&nbsp;</label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvSQLDateDD' size = '2' value=";
			//echo $InvSQLDateDD;
			echo "> ";

			echo "<input type='text' name='InvSQLDateMM' size = '2' value=";
			//echo $InvSQLDateMM;
			echo "> ";

			echo "<input type='text' name='InvSQLDateYY' size = '2' value=";
			//echo $InvSQLDateYY;
			echo "201";
			echo "> ";

		echo"	DD/MM/YYYY ";

			echo "Today: ".$InvSQLDateDD;
			echo "/";

			echo $InvSQLDateMM;
			echo "/";

			echo $InvSQLDateYY;
			echo " ";

		echo "</dd>";
		echo "</dl>";

 		echo "<dl>Summary: &nbsp;</label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='Summary' size='45'  value=";
			echo "";
			echo "> Short and sweet overview without spaces, no &.</dd>";
		echo "</dl>";

  		echo "<dl>Inv Sent or Paid? (InvPdStatus)</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvPdStatus' value=";
			echo "_";
			echo "> </dd></dl>";

			  		echo "<dl><font color = red size = 4 >Important: <label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='Important' size = 100 value=";
			echo $Important;
			echo "> </font></dd></dl>";

		//echo "</dl> Watch <b>AJAX</B> in action:<br>";

/*echo"<TABLE WIDTH=10 BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=40*>		<COL WIDTH=57*>		<COL WIDTH=30*>";
echo"<TR>
		<TH WIDTH=52%><label>Description1</label>
		<FONT size = '1'></b>(no apostrophees, no kommas)(Zeroes in empty fields!)</font></TH>

		<TH WIDTH=11%><label>Qty1</label>
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

		echo "</TR> ";
		echo "<TR>		<TH>";

		echo "<input id='D1' type='text' name='D1' size='55'  value='0'><br/>";

		echo "</TH>
		<TH ><input type='text' name='Q1' id='Q1' size='5' value='0' onkeyup='calc()'>

		</TH>
		<TH >
			<input type='text' name='ex1' id='ex1' size='5' value='0' onkeyup='calc()'>
		</TH>

		<TH >
			</label></B>no apostrophees.
		</TH>



	";

*/


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

	?>

Don't forget TOPUP checkup!!!  For discounts use a negative value


		<input id='D1' type='hidden' name='D1' size='45'  value='0'><br/>

		<input type='hidden' name='Q1' id='Q1' size='5' value='0' onkeyup='calc()'>


			<input type='hidden' name='ex1' id='ex1' size='5' value='0' onkeyup='calc()'>







		<input type='hidden' name='D2' size='45'  value='0'>

		<input type='hidden' name='Q2'  size='5' value='0' id='Q2'  onkeyup='calc()'>



			<input type='hidden' name='ex2'  size='5' value='0' id='ex2'  onkeyup='calc()'>




		<input type='hidden' name='D3' size='45'  value='0'>

		<input type='hidden' name='Q3' size='5'  value='0' id='Q3'  onkeyup='calc()'>


			<input type='hidden' name='ex3'  size='5' value='0' id='ex3'  onkeyup='calc()'>




		<input type='hidden' name='D4' size='45'  value='0'>

		<input type='hidden' name='Q4' size='5' value='0' id='Q4'  onkeyup='calc()'>


			<input type='hidden' name='ex4'  size='5' value='0' id='ex4'  onkeyup='calc()'>




		<input type='hidden' name='D5' size='45'  value='0'>

		<input type='hidden' name='Q5'  size='5' value='0' id='Q5'  onkeyup='calc()'>


			<input type='hidden' name='ex5'  size='5' value='0' id='ex5'  onkeyup='calc()'>




		<input type='hidden' name='D6' size='45'  value='0'>

		<input type='hidden' name='Q6'  size='5' value='0' id='Q6'  onkeyup='calc()'>


			<input type='hidden' name='ex6'  size='5'   value='0' id='ex6'  onkeyup='calc()'>




		<input type='hidden' name='D7' size='45'  value='0'>

		<input type='hidden' name='Q7'  size='5' value='0' id='Q7'  onkeyup='calc()'>


			<input type='hidden' name='ex7'  size='5' value='0' id='ex7'  onkeyup='calc()'>




		<input type='hidden' name='D8' size='45'  value='0'>

		<input type='hidden' name='Q8'  size='5' value='0' id='Q8'  onkeyup='calc()'>


			<input type='hidden' name='ex8' size='5'  value='0' id='ex8'  onkeyup='calc()'>


























<!--		</TR>
	<TR>
		<TH><input type='text' name='D2' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q2'  size='5' value='0' id='Q2'  onkeyup='calc()'>

		</TH>
		<TH >
			<input type='text' name='ex2'  size='5' value='0' id='ex2'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D3' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q3' size='5'  value='0' id='Q3'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex3'  size='5' value='0' id='ex3'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D4' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q4' size='5' value='0' id='Q4'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex4'  size='5' value='0' id='ex4'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D5' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q5'  size='5' value='0' id='Q5'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex5'  size='5' value='0' id='ex5'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D6' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q6'  size='5' value='0' id='Q6'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex6'  size='5'   value='0' id='ex6'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D7' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q7'  size='5' value='0' id='Q7'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex7'  size='5' value='0' id='ex7'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='D8' size='45'  value='0'>
		</TH>
		<TH ><input type='text' name='Q8'  size='5' value='0' id='Q8'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex8' size='5'  value='0' id='ex8'  onkeyup='calc()'>
		</TH>
	</TR>




	</table>

	<span id="resp"></span>
-->
	<?php
		echo "<dl>Total Amount incl VAT R</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' id='TotAmt' value=";
			echo "";
			echo "> </dd>";
		echo "</dl>";

	}
	}
	?>

<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" value="Submit/Save" onsubmit='return formValidator()'
			onclick="return confirm('Is the Invoice number AND Date correct?')"/>
	<!--		onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/> -->


			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>
<?php
include ("view_inv_prev_by_cust.php");
include ("view_event_by_cust.php");
include ("view_trans_by_cust.php");
include ("view_inv.php");

//require_once 'view_inv_one.php';

?>

</body>
</html>

