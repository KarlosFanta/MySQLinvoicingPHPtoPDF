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
	var QuoNo = document.getElementById('QuoNo');
	var Summary = document.getElementById('Summary');
	var TotAmt = document.getElementById('TotAmt');
	var D1 = document.getElementById('D1');
	var D2 = document.getElementById('D2');
	var D3 = document.getElementById('D3');
	var D = document.getElementById('D4');
	var D = document.getElementById('D5');
	var D = document.getElementById('D6');
	var D = document.getElementById('D7');
	var D = document.getElementById('D8');
	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');

	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(QuoNo, "Please enter a valid numeric quotes  number  QUOTE No")){
			if(notEmpty(Summary, "Please enter a short summary")){
			if(notEmpty(TotAmt, "Please enter a valid float quotes total amount")){
		//	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				//if(madeSelection(mydropdownDC, "Please Choose a Customer")){
					if(lengthRestriction(QuoNo, 3, 5)){
					if(lengthRestriction(D1, 1, 53)){
					if(lengthRestriction(D2, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
					if(lengthRestriction(D3, 1, 53)){
							return true;
						}
					}
				}
			}
		}
	}//very important bracket part of isNumeric!!!!!
	}}}}}}
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
$query = "SELECT  MAX(QuoNo)  AS MAXNUM FROM quotes"; ///CORRECT!! DO NOT REMOVE!!!!
$result = $DBConnect->query($query);

/*while($row = mysqli_fetch_array($result)){
//	echo "The max no QuoNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}*/
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[0]);
$QuoNo = $row[0];
$QuoNo = $QuoNo+1;

//echo "The max no QuoNo in customer table is:  ". $row[0] . "&nbsp;";

/*
	$QuoDate = $_POST['Date1'];
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
//$QuoSQLDate = $D1[2]."-".$D1[1]."-".$D1[0];
$QuoSQLDateDD = date("d");
$QuoSQLDateMM = date("m");
$QuoSQLDateYY =  date("Y");

//echo "<br>QuoSQLdate: ".$QuoSQLDate." ___<br>";

$daNextNo = 1; //default when table is empty.
$queryM = "SELECT  MAX(QuoNo)  AS MAXNUM FROM quotes ";

//$result=mysql_queryM($queryM);
//echo "<br>".$result."<br>";
//echo "<br>".intval($result)."<br>";
//while($row=mysql_fetch_array($result))

//$result = mysqli_query($queryM) or die(mysql_error());
$result = $DBConnect->query($queryM);
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><br><font size = 5 color = red><b><b>insert or update NOT successfull!!!</b></b></font><br><br>";
//else
//echo "select success! <br>";

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no EventNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}
include 'monthtables.php';

echo "Suggested QuoNo: ";
echo $daNextNo;

echo " &nbsp; ".$queryM;

?>
<!--<form name="AddQuo" onsubmit="return formValidator()" action="addQuoprocess_lastC.php" method="post">-->
<form name="AddQuo" action="addQuoprocess_lastC.php" method="post">
<!--calls addQuoprocess_lastC.php<br>--->

<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invoice before we change him on the last form.


//echo "TBLrow: " .$TBLrow."</BR>";

//while ($TBLrow !=NULL) {
//echo "$Quono</br />";
//$Quono = strtok(";");
//}
//echo "QuonozERO: ";
//echo $Quono[0]."</br />";
//$QuoNo = intval($Quono[0]);

//echo "<br>QuoNo:".$QuoNo."</br />";

//$sql = "SELECT QuoNo,  FROM quotes WHERE QuoNo = $QuoNo" ;
//$query = "SELECT * FROM quotes WHERE QuoNo = $QuoNo" ;
//$sql = "DELETE FROM quotes WHERE QuoNo = $QuoNo" ;
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

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is to determine the MAX quotes number
  while ($row = @mysqli_fetch_assoc($result)) {

	if ($result2 = $DBConnect->query($query)) {
    while ($row2 = $result2->fetch_assoc()) {

 		echo "<dl><label>QuoteNo: </label>";
			echo "<input type='text' name='QuoNo' id='QuoNo' size  = '5' value=";
			//echo $QuoNo;
			echo $daNextNo;
			echo ">..{$row2['dotdot']}</dt></dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "Customer: ";

			//echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
	//		echo $row['CustLN'];
			//echo "<a href='addQuoprocessCsess.php'><font size = '3'>First Click here if you do not need to add descriptions</font>";
//echo "addQuoprocessCsessD.php</a><br>";

			echo "{$row2['CustNo']}&nbsp;";
echo $row2['CustFN']."&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
echo "{$row2['CustTel']}&nbsp;&nbsp;";
echo "{$row2['CustCell']}&nbsp;&nbsp;";
echo "{$row2['CustEmail']}&nbsp;&nbsp;";

echo "<input type='hidden' name='CustEmail' value=";
			echo $row2['CustEmail'];
			echo ">";

echo "<input type='hidden' name='L1' value=";
			echo $row2['L1'];
			echo ">";

echo "{$row2['CustAddr']}&nbsp;&nbsp;";
echo "{$row2['Distance']} km&nbsp;&nbsp;";
$Dist = $row2['Distance'];
$u1 = $row2['u1'];
$u2 = $row2['u2'];
$Important = $row2['Important'];
$Distance = "0";
$Distance = $row2['Distance'];
echo "{$row2['ABBR']}&nbsp;"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR']; //CASE SENSITIVE!!!

			   $result->close();

	//		echo "&nbsp;&nbsp;Account No: ";
	//		echo $row['CustNo'];

			// DO NOT DISABLE!!! addQuoprocess_lastC needs to know which customer got selected!!
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

		echo "</dl>";

 		echo "<dl><label>QDate:&nbsp;&nbsp;&nbsp;&nbsp;</label>";
			//     <!--<dd><input type="text" name="Quo_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='QuoSQLDateDD' size = '2' value=";
			echo $QuoSQLDateDD;
			echo "> ";

			echo "<input type='text' name='QuoSQLDateMM' size = '2' value=";
			echo $QuoSQLDateMM;
			echo "> ";

			echo "<input type='text' name='QuoSQLDateYY' size = '2' value=";
			echo $QuoSQLDateYY;
			//echo "201";
			echo "> ";

		echo"	DD/MM/YYYY ";

			echo "Today: ".$QuoSQLDateDD;
			echo "/";

			echo $QuoSQLDateMM;
			echo "/";

			echo $QuoSQLDateYY;
			echo " ";

			echo "<b>Last topup invoiced:<input type='text' name='topup' size = '40' value=";
			echo $row2['topup'];
			echo "></b> ";

		echo "</dd>";
		echo "</dl>";

 		echo "<dl>Summary: &nbsp;</label>";
			//     <!--<dd><input type="text" name="Quo_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='Summary' id='Summary' size='45'  value=";
			echo "";
			echo "> Short and sweet overview without spaces, no &.</dd>";
		echo "</dl>";

  		echo "<dl>Quo Sent or Paid? (InvPdStatus)</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvPdStatus' size = 5 value=";
			echo "_";
			echo "> &nbsp;&nbsp;&nbsp;&nbsp;";

  		echo "Travel:";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $Dist; q_mark>" /></dd>-->
			echo $Dist;
			echo "km		";
			echo $u1;
			echo $u2;

			echo "</dd>";

			  		echo "<dl>Important</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<font size = '5'><b><input type='text' name='Important' style='height:24px;font-size:14pt;' size = 100 value=";
			echo $Important;
			echo "> </font></b></dd></dl>";

			  		echo "<dl>Quote Notes</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<font size = '5'><b><textarea  id='QNotes'  name='QNotes' rows='14' cols='100'></textarea>";

			echo " </font></b></dd></dl>";

		echo "</dl> Watch <b>AJAX</B> in action:<br>";

echo"<TABLE WIDTH=10 BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=40*>		<COL WIDTH=57*>		<COL WIDTH=30*>";
echo"<TR>
		<TH WIDTH=52%><label>Description1 </label>
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

		echo "</TR>	";
		echo "<TR>		<TH>";

		echo "<input id='D1' type='text' name='D1' size='53'  value='{$row2['adslinv']}'><br/>";

		echo "</TH>
		<TH ><input type='text' name='Q1' id='Q1' size='5' value='0' onkeyup='calc()'>

		</TH>
		<TH >
			<input type='text' name='ex1' id='ex1' size='10' value='0' onkeyup='calc()'>{$row2['ae']}
		</TH>



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
echo $row2['CustPW'];

}
//echo "</table>";

	}

	?>

 For discounts use a negative value. size 53 recommended for printing
		</TR>
	<TR>
		<TH><input type='text' id='D2' name='D2' size='53'  value='0topup'>
		</TH>
		<TH ><input type='text' name='Q2'  size='5' value='0' id='Q2'  onkeyup='calc()'>

		</TH>
		<TH >
			<input type='text' name='ex2'  size='10' value='0' id='ex2'  onkeyup='calc()'>50> 43.86
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D3' name='D3' size='53'  value='0Travel <?php echo $Distance; ?> km'>
		</TH>
		<TH ><input type='text' name='Q3' size='5'  value='0' id='Q3'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex3'  size='10' value='0' id='ex3'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D4' name='D4' size='53'  value='0'>
		</TH>
		<TH ><input type='text' name='Q4' size='5' value='0' id='Q4'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex4'  size='10' value='0' id='ex4'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D5' name='D5' size='53'  value='0'>
		</TH>
		<TH ><input type='text' name='Q5'  size='5' value='0' id='Q5'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex5'  size='10' value='0' id='ex5'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D6' name='D6' size='53'  value='0'>
		</TH>
		<TH ><input type='text' name='Q6'  size='5' value='0' id='Q6'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex6'  size='10'   value='0' id='ex6'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D7' name='D7' size='53'  value='0'>
		</TH>
		<TH ><input type='text' name='Q7'  size='5' value='0' id='Q7'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex7'  size='10' value='0' id='ex7'  onkeyup='calc()'>
		</TH>
	</TR>

	<TR>
		<TH><input type='text'  id='D8' name='D8' size='53'  value='0'>
		</TH>
		<TH ><input type='text' name='Q8'  size='5' value='0' id='Q8'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex8' size='10'  value='0' id='ex8'  onkeyup='calc()'>
		</TH>
	</TR>




	</table>

	<span id="resp"></span>
	<?php
		echo "<dl>Total Amount incl VAT R</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' id='TotAmt' value=";
			echo "";
			echo "> <Do not put a 'R' here.</dd>";
		echo "</dl>";

	}
	}
	?>

<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit"  value="Submit/Save"
			onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the quotes total?')"/>
			<!-- sequence might be important! first onsubmit then action!-->
<!-- id in input name is used for javascript validation and name is used for POST I presume-->


			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>
<?php
//echo "test<br>";
include ("view_inv_prev_by_cust.php");
include ("edit_trans_CustProcessCinvFirst.php");
//echo "test<br>";
include ("view_event_by_cust.php");
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
echo "<tr><th>QuoNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "</tr>\n";

	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["QuoNo"];
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
    $result->close();

}
echo "</table>";

*/


















?>

</body>
</html>

