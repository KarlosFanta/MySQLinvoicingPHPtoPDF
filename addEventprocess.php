
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add event</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<!--<script type="text/javascript"  src="calendar.js">  THIS ONE PReventED VALIDATION FROM WORKING-->
<script type="text/javascript">
//Javascript for Validation of user inputs
function formValidator(){
	// Make quick references to our fields
//	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var EventNo = document.getElementById('EventNo');
	var EDate = document.getElementById('EDate');
	var Destination = document.getElementById('Destination');
	var EDate = document.getElementById('EDate');
	var mydropdownDC = document.getElementById('mydropdownDC');
	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');

	// Check each input in the order that it appears in the form!
	//KEEP THE SEQUENCE CORRECT     KEEP THE SEQUENCE CORRECT                 KEEP THE SEQUENCE CORRECT
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(EventNo, "Please enter a valid numeric event number")){
	//if(madeSelection(mydropdownEC, "Please select Priority")){
	if(lengthRestriction(EDate, 10, 10)){
		if(notEmpty(Destination, "Please enter a _ if no destination")){
	if(madeSelection(mydropdownDC, "Please select a customer")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				if(madeSelection(mydropdownDC, "Please Choose a Customer")){
					//if(lengthRestriction(username, 6, 8)){
							return true;
		//				}
					}
				}
			}
		}

	}//very important bracket!!!!!

	return false;

}

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
</script>
</head>
<body>
<?php	//this is "addEventprocess.php"
 $page_title = "Add general event";
	require_once 'inc_OnlineStoreDB.php';//page567
	require_once 'header.php';
	echo "addEventprocess.php   calls addEventprocess_last2.php<br>";
    @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = @$_SESSION['CustNo'];
	if ($CustInt == "")
	$CustInt = 1;
	$CNN = $CustInt;

?>
<form name="addEventCustProcess2" onsubmit="return formValidator()"  action="addEventprocess_last2b.php" method="post">
<?php
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(EventNo)  AS MAXNUM FROM events";

//$result=mysql_query($query);
//echo "<br>".$result."<br>";
//echo "<br>".intval($result)."<br>";
//while($row=mysql_fetch_array($result))

$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
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
//	echo "Add 1 = ". $daNextNo;
?>

<!--<form name="Addevent" action="addEventprocess.php" onsubmit="return formValidator();" method="post">-->
<form action="addEventprocess.php" onsubmit='return formValidator()' method="post">
<table width='10' border='1'>
<?php
echo "<br>Add new events:<br>";

echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate DD/MM/YYYY</th>";
echo "<th>Priority</th>";
echo "<th>Destination</th>";
echo "<th>ENotes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* event AutoNumber: (!! Different for internet events!)</label>-->
			<th><input type="text" size="2"  id="EventNo" name="EventNo" value="<?php echo $daNextNo;?>" />
		</th>
		<!--<dt><label>* Customer:-->
<!--<select name="mydropdownDC" onclick="hi">-->
<?php
// Get records from database (table "name_list").
/*$list = mysql_query("SELECT * FROM customer where CustNo = $CustInt");

// Show records by while loop.
while($row_list=mysql_fetch_assoc($list)){
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row_list['CustNo'];
$CustFN =  $row_list['CustFN'];
$CustLN =  $row_list['CustLN'];

echo "<input type = 'text' value='$CustInt' >";
// if($CustNo == $select){
//echo "selected";

//echo $CustNo;
//echo "_ ";
echo $CustFN;
echo " ";
echo $CustLN;

//echo "</option>";
}
*/




?>

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo @$CustInt;?>";

</th>
<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
	$NewFormat = date("d/m/Y");
?>
	<!--<label>EDate:</label></dt>-->
	<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
	<input type="text" size="10" id="EDate"  name="EDate" value="<?php echo $NewFormat;?>" />
</th>
<th>
	<!--<select name="Priority" value="<?php $oldpri = "High"; echo $oldpri; ?>" >-->
	<select name="Priority" value="High">
        <option value="High">High</option>
        <option value="Low">Low</option>
        <option value="Med">Med</option>
        <option value=".">.</option>
    </select>
</th>
<th>
	<!--<label>&nbsp; Destination:</label></dt>-->
	<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
	<input type="text"  id="Destination" size="8"   name="Destination" value="" />
</th>
<th>
	<!--<label>&nbsp; ENotes:</label></dt>-->
	<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
	<input type="text"  size="100" id="ENotes"  name="ENotes" value="<?php echo date('g.i a', time()) ?>: in my office:" />
</th>


</tr>
</table>

<br>
<b>Customer: </b>
<?php
$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = 1";
//echo $queryS."<br>";
$query = "select CustNo, CustFN, CustLN from customer order by CustLN ";
//echo $query."<br>";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print $item2b;
// echo "____".$CNN;
/* print "_".$item1b;
print "_".$item3b;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

	}
$result2->free();
	}



?>



<select name="mydropdownEC">

<!--<option value="_no_selection_">Select Customer</option>";-->


<?php
if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
$CNN = 1;

echo "<option value='_no_selection_'>1</option>";
echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option value='";
echo $item1b;
echo "'>";
echo $item2b;

//KEEP THIS AS CNN becasue you can have this as a 2nd option.
echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".$item3b;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";
	}
$result2->free();
}

//print "<option value='$item'>$item";
  //print " </option>";
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".$item3;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option>";
echo $item3b;
?>

</select>


<br><br>
<input type="submit" value="Create event" onclick="return confirm('Are you sure about the date?');" />
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

</form>

<!--Set CustomerNumber to 1:-->
<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the eventomer for updating before we change him on the last form.

//$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
//$CustNo = explode(';', $TBLrow );
$CustNo = 1;
//while ($TBLrow !=NULL) {
//echo "$EventNo</br />";
//$EventNo = strtok(";");
//}
//echo "EventNozERO: ";
//echo $EventNo[0]."</br />";
//$CustInt = intval($CustNo[0]);
$CustInt=1;
//echo "<br>eventint:".$CustInt."</br />";

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt order by CustLN" ;
//echo $SQLstring;
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='90%' border='0'>\n";
/*echo "<tr><th>CustNo</th>";
echo "<th>CustFn</th>";
echo "<th>Surname</th>";
echo "<th>CustTel</th>";
echo "<th>CustCell</th>";
echo "<th>CustEmail</th>";
echo "<th>CustAddr</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>CustPW</th></tr>\n";
*/

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>CustNo: {$row[0]}</th>";
echo "<th>{$row[1]}</th>";
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>";
echo "<th>{$row[5]}</th>";
echo "<th>{$row[6]}</th>";
echo "<th>{$row[7]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[9]}</th></tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

$TBLrow = 1;

//echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Account No ".$TBLrow."</BR>"   ;
//echo "Account No ".$CustNo[0]."</BR>"   ;
//echo "Account No ".$CustNo[1]."</BR>"   ;
//echo "Account No ".$CustNo[2]."</BR>"   ;

echo "existing events :<br>";
$SQLstring = "SELECT * FROM events where Priority  = 'High' AND where CustNo = $CustInt ";
$SQLstring = "SELECT * FROM events where Priority  = 'High' AND CustNo = 1 ";
//$SQLstring = "SELECT * FROM events where CustNo = 1 ";
//$SQLstring = "SELECT * FROM events where Priority  = 'High'  ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {//FROM events table
echo "<table width='10' border='0'>\n";
echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate date DD/MM/YYYY<br></th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EENotes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Priority</th>";
echo "<th>Customer</th>";
echo "<th>Destination</th>";
echo "</tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {  //FROM events table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //EventNo FROM events table
//echo "<th>{$row[1]}</th>";       //CustNoFROM events table
$CN = $row[1];                  //CustNO FROM events table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO FROM events table






$D1 = explode("-", $row[2]);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];

echo "<th>";

echo $EDate;

echo "</th>";  //EDate FROM events table






echo "<th>{$row[3]}</th>";  //AmtPaid FROM events table
echo "<th>{$row[4]}</th>\n";  //EENotes FROM events table
/*echo "<th>{$row[5]}</th>\n";  //FROM events table
echo "<th>{$row[6]}</th>\n";  //FROM events table
echo "<th>{$row[7]}</th>\n";  //FROM events table
echo "<th>{$row[8]}</th>\n";  //FROM events table
*/echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

?>




<?php









?>


<!--<form name="Addevent" action="addEventprocess.php" method="post" target="_blank">

<!--<select name="mydropdownDC" onclick="hi">

<!--<option value="_no_selection_">Select Customer</option>";-->
<?php


// If submitted, check the value of "select". If its not blank value, get the value and put it into $select.
/*if(isset($select)&&$select!="")
{
$select = $_GET['select'];
}*/
?>



<?php //mysql_close($conn);?>
</p>


<form action="somewhere.php" method="post">
<?php
//get class into the page
require_once 'calendar/tc_calendar.php';

//instantiate class and set properties
$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(1, 1, 2000);

//output the calendar
$myCalendar->writeScript();
?>
</form>




<?php
$myCalendar = new tc_calendar("date2");
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01', false);
	  $myCalendar->startMonday(true);
	  $myCalendar->disabledDay("Sat");
	  $myCalendar->disabledDay("sun");
	  $myCalendar->writeScript();

    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['EventNo']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['eventFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['eventLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the eventomer has a surname entered!!!
    echo $row[3] . $row['eventTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['eventCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['eventEMAIL']"</br>";
    echo $row[6] . $row['eventADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";

	if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl>";
			echo "<dt><label>* event Number:</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='EventNo' value=";
			//echo $row[0];
			echo $row['EventNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['EventNo'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>* CustNo:</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='CustNo' value=";
			echo $row['CustNo'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>EDate </label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='EDate' value=";
			echo $row['EDate'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Amount Paid</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='AmtPaid' value=";
			echo $row['AmtPaid'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>EENotes</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='EENotes' value=";
			echo $row['EENotes'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>eventfer Method</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='TMethod' value=";
			echo $row['TMethod'];
			echo "> ";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>InvNoA</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoA' value=";
			print $row['InvNoA'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoAincl</label></dt>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoAincl' value=";
			echo $row["InvNoAincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoB</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoB' value=";
			print $row['InvNoB'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoBincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoBincl' value=";
			echo $row["InvNoBincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoC</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoCincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoD</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoDincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoE</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoEincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoF</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoFincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoG</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoGincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> ";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoH</label></dt>";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> ";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoHincl</label></dt>";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> ";
		echo "</dl> ";

		//$objResult;
 }

}

//oracle: oci_free_statement($objParse);
//oci_free_statement($stid);
//oracle: oci_close($conn);

		/*<dl>
			<dt><label>* First Name<?php //echo $this->lang->line('event_fn'); ?>: </label></dt>
			<!--<input type="text" name="event_name" id="event_fn" value="<?php //echo $this->mdl_events->form_value('event_name'); ?>" />-->
			<input type="text" name="eventFName" />
		</dl>
*/
?>
<!--<div>
		<dl>
			<dt></dt>
			<!--<input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
<!--			<input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" />-->
<!--			<input type="reset" name="btn_reset" value="Cancel/Reset" />
		</dl>
</div>-->
</form>






<?php
echo "All existing events :<br>";
$SQLstring = "SELECT * FROM events where Priority  != 'High' AND where CustNo = $CustInt ";
$SQLstring = "SELECT * FROM events where Priority  != 'High' AND CustNo = 1 ";
//$SQLstring = "SELECT * FROM events where CustNo = 1 ";
//$SQLstring = "SELECT * FROM events where Priority  = 'High'  ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {//FROM events table
echo "<table width='10' border='0'>\n";
echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate date DD/MM/YYYY<br></th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EENotes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Priority</th>";
echo "<th>Customer</th>";
echo "<th>Destination</th>";

echo "</tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {  //FROM events table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //EventNo FROM events table
//echo "<th>{$row[1]}</th>";       //CustNoFROM events table
$CN = $row[1];                  //CustNO FROM events table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO FROM events table






$D1 = explode("-", $row[2]);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];

echo "<th>";

echo $EDate;

echo "</th>";  //EDate FROM events table





echo "<th>{$row[3]}</th>";  //AmtPaid FROM events table
echo "<th>{$row[4]}</th>\n";  //EENotes FROM events table
echo "<th>{$row[5]}</th>\n";  //FROM events table
/*echo "<th>{$row[6]}</th>\n";  //FROM events table
echo "<th>{$row[7]}</th>\n";  //FROM events table
echo "<th>{$row[8]}</th>\n";  //FROM events table*/
echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>existing events :<br>";
$SQLstring = "SELECT * FROM events where CustNo != 1 order by priority";
//$SQLstring = "SELECT * FROM events where CustNo = 1 ";
//$SQLstring = "SELECT * FROM events where Priority  = 'High'  ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {//FROM events table
echo "<table width='10' border='0'>\n";
echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate date DD/MM/YYYY<br></th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EENotes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Priority</th>";
echo "<th>Customer</th>";
echo "</tr>\n";

    /* fetch object array */
    while ($row = $result->fetch_row()) {  //FROM events table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //EventNo FROM events table
//echo "<th>{$row[1]}</th>";       //CustNoFROM events table
$CN = $row[1];                  //CustNO FROM events table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO FROM events table






$D1 = explode("-", $row[2]);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];

echo "<th>";

echo $EDate;

echo "</th>";  //EDate FROM events table





echo "<th>{$row[3]}</th>";  //AmtPaid FROM events table
echo "<th>{$row[4]}</th>\n";  //EENotes FROM events table
/*echo "<th>{$row[5]}</th>\n";  //FROM events table
echo "<th>{$row[6]}</th>\n";  //FROM events table
echo "<th>{$row[7]}</th>\n";  //FROM events table
echo "<th>{$row[8]}</th>\n";  //FROM events table
*/echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



