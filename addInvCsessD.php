<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php 
    @session_start();
	@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<nbr />";
	if (@$CustInt == '')///this is from _GET from addInvCsessDexp.php
	$CustInt = $_SESSION['CustNo'];

	$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
	require_once("inc_OnlineStoreDB.php");//page567

	if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) {
$abbr =  $row['ABBR'];	  
 } 
 mysqli_free_result($result);
}
?>
<title>AddInv <?php echo $abbr; ?>ProcessC</title>
  <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<!--  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />-->
<script type="text/javascript">
/*function mouseOver()
{
    //autocomplete
    $(".auto").autocomplete({
        source: "search2.php",
        minLength: 0
    });                
 
}*/
function winClose()
{
 /*   if (confirm("Are you sure you want to navigate away from this page?"))
    {
         window.close();
    }

    return false;
*/
return "Write something clever here...";
	}

document.getElementsByClassName('eStore_buy_now_button')[0].onclick = function(){
    window.btn_clicked = true;
    alert("Item bought!");
};
window.onbeforeunload = function(){
    if(!window.btn_clicked){
        return 'You must click "Buy Now" to make payment and finish your order. If you leave now your order will be canceled.';
    }
};	

function formValidator(){
	// Make quick references to our fields
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
	
	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
	//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
	if(isNumeric(InvNo, "Please enter a valid numeric invoice  number  INVOICE No")){
		//if(notEmpty(Summary, "Please enter a short summary")){
			//if(Compare( Summary, TotAmt, TTTT,"Total amounts don't match")){
			//	if(isNumeric(CustCN, "Please enter a valid numeric cellophone number")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
			if(madeSelection(Draft, "Please choose Draft")){
				if(lengthRestriction(InvNo, 3, 5)){
					if(lengthRestriction(D1, 1, 53)){
					if(notEmpty(ex1, "Please enter amount")){
						//if(isBiggerThanZero(ex1, "Price is first product is zero")){
							return true;
		//				}
					}
				}
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

//newVAT: CalcServ.php
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
<!--<body onUnload="return winClose();; return false;">-->
 <body onbeforeunload="return winClose()">

<?php
	require_once("header.php");//page567

	//do not start a form here
	//first the form of draft invoices comes first
?>

<?php	
	
	
	include "addInvCsessDdraft.php"; //this is a form on its own


echo "<form name='Accc' action='acceptCustNo.php' method='post'  target='_blank'>";
echo "CustNo<input type = 'text' name='CustNo' value = '$CustInt' >";
echo "<input type = 'submit' value = 'Accept CustNo into session' >";

echo "</form>";
?>
	<!--WHy there are 2 forms here:  draft invoices get edited.
	<!--When a draft invoice is still to be worked on, then 
	<form name="AddInv" onsubmit="return formValidator()" action="addInvprocess_lastC.php" method="post">
<!--calls addInvprocess_lastC.php<br>--->
<!--<form name="EditInv" action="edit_inv_process.php" method="post">-->
<form name="AddInv" onsubmit="return formValidator()" action="addInvCsessDchk.php" method="post">

<input type='hidden' name='CustNo' value="<?php echo $CustInt; ?>">
	
<?php	
	
$daNextNoBB = '';
	

// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
//$result = mysql_query($query) or die(mysql_error());
$daNextNo = 1; //default if table is completely empty.
$queryMax = "SELECT  MAX(InvNo)  AS MAXNUM FROM invoice"; ///CORRECT!! DO NOT REMOVE!!!! //2QUERIES HERE!!
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


$daNextNo = $InvNo; //default when table is empty.

//if(file_exists('111confidential_inv.php'))
//	include '111confidential_inv.php'; //sgs moved to thsii file.  This code is not for the public.
		
//echo "Suggested InvNo: ";
//echo $daNextNo;


//echo " &nbsp; ".$queryM;
//echo " &nbsp; (PremierShoes ..61)";



$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {


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

			
	
//echo "First: ".$First."<br>";
		
@$Y = $First+1;		// Warning: A non-numeric value encountered
//	echo "Y: ".$Y."<br>";

$Important = $row2['Important'];
$Extra = $row2['Extra'];
$Confid = $row2['Confid'];


			  		echo "<!--<dl>-->Important</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<font size = '5'><b><textarea type='text' name='Important' style='height:24px;font-size:10pt;width:500px;font-family:arial;' size = 100 >";

			echo $Important;
			echo "</textarea> </font></b></dd></dl>";
			  		echo "<dl>Extra</label></dt>";
			echo "<textarea id='Extra' style='white-space:pre-wrap; height:20px;font-family:arial;width:550px;font-size: 9pt'  name='Extra'  >";
	echo $Extra;  echo "</textarea>";



echo "<br>InvoiceNo: ";
echo "<input type='text' name='InvNo' id='InvNo' size  = '5' value = '$daNextNo'  >"; //searchinvAdd.php
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
echo "<br><font size = 4 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}
$Abbr = $row2['ABBR']; //CASE SENSITIVE!!!
if ($Abbr == "")
echo "<b><br><font size = '4' color= 'red'><b>WARNING Abbr is empty this will affect the SDR and Summary combo!<br>First fix this!<br>
<a href = 'editCust.php'>editCust</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</font></b>";

//echo "<input type='text' name='L1' size = 35 value=";
			//echo $FL;
//			echo ">";
			//echo "<br>";
			$newfldr = $FL;
		
//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;
	//echo "<br><br> newfldr: ".." <br>";
echo "<a href= 'file:///".$newfldr."'  >$newfldr</a>&nbsp; &nbsp;    ";
echo "<a href='addInvprocessCsess.php'>Inv No descriptions</a> </font>";
echo "addInvCsessD.php addInvCsessDchk.php addInvprocess_lastC.php<br>";
		//echo "</dl>";
 	//	echo "<!--<dl>-->";
echo "Customer: <b><font size =4>";
echo " ";
echo "{$row2['CustNo']}&nbsp;";
echo $row2['CustFN']."&nbsp;";
echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
$FNLN = $row2['CustFN'].$row2['CustLN'];
echo "</b></font><input type = 'hidden' name = 'FNLN' value = $FNLN >";

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
$Distance = "0";
$Distance = $row2['Distance'];

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
		
			
			
		echo "</dd>";
	echo "</font></b></dd></dl>";
		
		echo "</dd>";
		echo "</dl>";


 		?>
        <br><label>SumMary:</label><input type='text' name='Summary' id='Summary' value='' size='36' required>
       <input type="submit"  value="Submit"   /> 
  	<?php
		echo "Travel: ";
			
			echo $Dist;
			echo "km ";	
		
			
			

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
	echo @(@$ae*1.15); 
	echo "inex";
			
			echo "</font></b></dd></dl>";
echo "<a href = 'TopupsOfCust.php?CustNo=$CustInt' target = _blank>TopupsOfCust.php</a>(open in new window!)<br>";
		//echo "<br>  &nbsp;&nbsp;&nbsp;	<br>";//chk CalcServ.php-->
	$date = date('Y-m-d',time()-(60*266400)); // 1 days ago
$queryE = "SELECT * FROM events WHERE CustNo = $CustInt and   EDate >= '$date' and ENotes LIKE '%top%' order by EDate desc" ;
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
		<TH WIDTH=52%><label>ExpNo</label>
		</TH>
		<TH WIDTH=52%><label>Description1 </label>
		<FONT size = '1'></b>(no apostrophees, no kommas)</font>		</TH>
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
		echo "<TR>

<TH><input type='text' name='DD1' id='DD1' size='5' >
</TH>



		<TH>";
		
		
		

		
		
		
		
		
		echo "<b><font size =4 color= dark orange align= left> {$row2['CustNo']}&nbsp; {$row2['CustLN']}&nbsp;<br>";
//echo "{$row2['CustLN']}&nbsp;&nbsp;&nbsp;";
		echo"<input id='D1' type='text' name='D1' size='53'  value='";

		//echo "".$b;
		//echo "First".$First;
		echo "{$row2['adslinv']}'><br/><a href='reset.php'>Reset fields</a>"; //if nothing shows well then this customer does not have a D1 suggestion.
		
		echo "</TH>
		<TH ><input type='text' name='Q1' id='Q1' size='5' value='1' onkeyup='calc()'>
	
		</TH>
		<TH >
			  <input type='text' name='ex1' id='ex1' size='10' class='exxx1' onkeyup='calc()'   >{$row2['ae']}
		</TH>


		
	";
echo $row2['invD2'];

//echo "</table>";


	?>


 
Don't forget TOPUP checkup!!!  For discounts use a negative value. size 53 recommended for printing 
		</TR>
	<TR>
	<TH><input type='text' name='DD2' id='DD2' size='5' >
</TH>
		<TH><input type='text' id='D2' name='D2' size='53'   value='<?php 
		echo $row2['invD2'];
		if ($row2['u2'] != 'kconnect.co.za' OR $row2['u2'] != '')
		echo "";		
		
		 ?>'>
		<br>
	<?php
	if ($row2['u2'] != 'kconnect.co.za' OR $row2['u2'] != '')
	{
	echo "<b>Last topup invoiced:";
			/*<input type='text' size = '5' value=";
			echo $row2['topup'];
			echo "></b> ";  textboxes don;t show spaces
	*/
		echo "<textarea id='topup' style='white-space:pre-wrap; height:18px;font-family:arial;width:200px;font-size: 10pt'  name='topup'  >";
	echo $row2['topup'];  echo "</textarea>";
	}
	$date = date('Y-m-d',time()-(120*86400)); // topups 200 days ago
$queryE = "SELECT ENotes FROM events WHERE CustNo = $CustInt and   EDate >= '$date'  and ENotes LIKE '%top%' order by EDate desc" ;
//echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	
	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
//echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;</th><th>";

echo "&nbsp;<b><font size= '2' color= 'purple'>{$rowE['ENotes']}</b></font>&nbsp;&nbsp;<br>";
	
}mysqli_free_result($resultE);
}
?>
	<a href = '../START/progress.html' target = _blank><b>Progress</b></a> 	</TH>
		<TH ><input type='text' name='Q2'  size='5' value='' id='Q2'  onkeyup='calc()'>
		
		</TH>
		<TH >
			<input type='text' name='ex2'  size='10' 
			value='<?php
			$jng = $row2['ae2']; 
			if ($jng == "")
				$jng = ''; //was zero  here previously
			echo $jng;
			?>' id='ex2'  onkeyup='calc()'><?php echo $row2['ae2']; ?>
		</TH>
	</TR>

	<TR>
	
		<TH><input type='text' name='DD3' id='DD1' size='5' ></TH>
		<TH><input type='text'  id='D3' name='D3' size='53'  value='<?php echo $row2['invD3'] ?>'>Travel <?php echo $Distance; ?> km 
		</TH>
		<TH ><input type='text' name='Q3' size='5'  value='' id='Q3'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex3'  size='10' id='ex3'  onkeyup='calc()' value='<?php echo $row2['ae3']?>'    >
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='DD4' id='DD4' size='5' ></TH>
		<TH><input type='text'  id='D4' name='D4' size='53'  value='<?php echo $row2['invD4']?>' >
		</TH>
		<TH ><input type='text' name='Q4' size='5' value='' id='Q4'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex4'  size='10' id='ex4'  onkeyup='calc()' value='<?php echo $row2['ae4']?>'    >
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='DD5' id='DD5' size='5' ></TH>
		<TH><input type='text'  id='D5' name='D5' size='53'  value='<?php echo $row2['invD5']?>' >
		</TH>
		<TH ><input type='text' name='Q5'  size='5' value='' id='Q5'  onkeyup='calc()'>
		</TH>
		<TH >
		<input type='text' name='ex5' size='10' id='ex5' onkeyup='calc()'  value='<?php echo $row2['ae5']?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='DD6' id='DD6' size='5' ></TH>
		<TH><input type='text'  id='D6' name='D6' size='53'  value='<?php echo $row2['invD6']?>' >

Check for parking: <a href = "parking.php" target=_blank>parking.php</a>

		</TH>
		<TH ><input type='text' name='Q6'  size='5' value='' id='Q6'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex6'  size='10' id='ex6'  onkeyup='calc()'  value='<?php echo $row2['ae6']?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='DD7' id='DD7' size='5' ></TH>
		<TH><input type='text'  id='D7' name='D7' size='53'  value='<?php echo $row2['invD7']?>' >
		</TH>
		<TH ><input type='text' name='Q7'  size='5' value='' id='Q7'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex7' size='10' id='ex7'  onkeyup='calc()'  value='<?php echo $row2['ae7']?>' >
		</TH>
	</TR>

	<TR>
		<TH><input type='text' name='DD8' id='DD8' size='5' ></TH>
		<TH><input type='text'  id='D8' name='D8' size='53'  value='<?php echo $row2['invD8']?>' >
		</TH>
		<TH ><input type='text' name='Q8'  size='5' value='' id='Q8'  onkeyup='calc()'>
		</TH>
		<TH >
			<input type='text' name='ex8' size='10'  id='ex8'  onkeyup='calc()'  value='<?php echo $row2['ae8']?>' >
		</TH>
	</TR>



	
	</table>
	
	<span id="resp"></span><!-- in here possibly AJAX invoice total CalcServ.php-->
	<?php
	/*	echo "Total Amount incl VAT R</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' id='TotAmt' value=";
			echo "";
			echo "> <Do not put a 'R' here.</dd>";
	echo "</dl>";
*/	
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
<option  value='ProofedJustNow'>Proof received JUST NOW</option>
<option  value='Proofed'>Proof received</option>

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
<a href = 'selectCustAssignStk.php' target=_blank>Assign any Stock to any Customer ('s invoice)</a></br>
<a href = 'assignStkInv.php' target=_blank>Assign customer's Stock to this Customer's invoice</a></br>
<a href = 'editExpCQ.php?CustNo=<?php echo $CustInt; ?>' target=_blank>Edit customer's expenses</a> &nbsp;&nbsp;
editExpCQ</br></br>

<br>
<input type='text' name='clExpC' id='clExpC' size  = '130' class='clExpC' value= 'Select a Product assigned to customer  class clExpC searchExpC.php  if no result then cust has no expenses or CustNo not in session'><br>



<br><br><!--searchExpC.php  SELECT * FROM expenses WHERE CustNo = '$CustInt'-->




<input type='text' name='clExp' id='clExp' size  = '130' class='clExp' value= 'Select a Product'>
<!--<form action='' method='post'>
        <br><label>Summary:</label><input type='text' name='summ' value='' class='auto'><br>
    </form>
-->


<BR><BR><a href = 'edit_invCQ.php' target='_blank'>edit_invCQ.php</a>view/Edit customer's invoices <a href = 'edit_transCQ.php' target='_blank'>edit_transCQ.php</a>view/Edit customer's transactions<br> 

<br><font size = 3>
Display all views in 1 go: <a href = "AllViewsCust.php?CustNo=<?php echo $CustInt; ?> " target = _blank>AllViews</a><br>


Display all views in 1 go: <a href = "view_inv_by_custADV3.php?CustNo=<?php echo $CustInt; ?> " target = _blank>view_inv_by_custADV3</a><br>
Display all views in 1 go: <a href = "view_inv_by_custLATESTnotadsl.php?CustNo=<?php echo $CustInt; ?> " target = _blank>view_inv_by_custLATESTnotadsl</a><br>
Display all views in 1 go: <a href = "view_trans_by_custUNDERorOVERPAID.php?CustNo=<?php echo $CustInt; ?> " target = _blank> target = _blankview_trans_by_custUNDERorOVERPAID</a><br>

<br>
Display all views in 1 go: <a href = "view_trans_by_cust.php?CustNo = <?php echo $CustInt; ?> " target = _blank>view_inv_by_custLATESTnotadsl</a><br>
Display all views in 1 go: <a href = "view_inv_by_cust.php?CustNo = <?php echo $CustInt; ?> " target = _blank>view_inv_by_custLATESTnotadsl</a></font><br>
<?php
//include "view_inv_by_custLATESTnotadsl.php";  //gives only totals

//echo "test<br>";
//include "view_trans_by_custUNDERorOVERPAID.php";

//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");




echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
echo "<br>";echo "<br>";
include ("view_inv_prev_by_cust.php");

include ("view_event_by_cust.php");



echo "<br>determine next inv number: this can only be done after view_inv.php <br>";
echo "<a href= 'view_inv.php'  target='_blank'>View everyone's invoices: view_inv.php</a>";

//echo "SELECT * FROM expenses WHERE CustNo = '$CustInt'";

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
		
				}).click(function() {
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
