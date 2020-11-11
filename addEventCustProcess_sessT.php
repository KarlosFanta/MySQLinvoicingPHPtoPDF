
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add event</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript"  src="calendar.js">
function formValidator(){
	// Make quick references to our fields
//	var CustFName = document.getElementById('CustFName');
	//var CustLName = document.getElementById('CustLName');
	var EventNo = document.getElementById('EventNo');
	var AmtPaid = document.getElementById('AmtPaid');
	var mydropdownDC = document.getElementById('mydropdownDC');
	//var username = document.getElementById('username');
	//var CustEm = document.getElementById('CustEm');
	//var CustDI = document.getElementById('CustDi');

	// Check each input in the order that it appears in the form!
	//if(isAlphabet(CustFName, "Please enter only letters for your first name")){
		//if(isAlphabet(CustLName, "Please enter only letters for your surname")){
		//if(isAlphanumeric(CustLName, "Numbers and Letters Only for Address")){
			if(isNumeric(EventNo, "Please enter a valid numeric event number")){
			if(notEmpty(AmtPaid, "Please enter a valid numeric amoutn Paid")){
			//			if(emailValidator(CustEm, "Please enter a valid email address")){
		//		if(isNumeric(CustDi, "Please enter a valid numeric number for the kilometers")){

				if(madeSelection(mydropdownDC, "Please Choose a Customer")){
					//if(lengthRestriction(username, 6, 8)){
							return true;
		//				}
	//				}
				}
			}
	//	}

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
<?php	//this is "add_tranc_CustProcess2.php"
 $page_title = "You seleted a Customer";
require_once 'inc_OnlineStoreDB.php';//page567
	require_once 'header.php';//page567
 echo "addEventCustProcess_sessT.php<br>";
    @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];

?>
<form name="addEventCustProcess2" action="addEventprocess_last2T.php" method="post">
<font size = 3><b>Add event/Work In Progress/Unconfirmed Order for Customer <br><br></b></font>
<?php


//$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
//$CustNo = explode(';', $TBLrow );

//while ($TBLrow !=NULL) {
//echo "$EventNo</br />";
//$EventNo = strtok(";");
//}
//echo "EventNozERO: ";
//echo $EventNo[0]."</br />";
//$CustInt = intval($CustNo[0]);

//echo "<br>eventint:".$CustInt."</br />";

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring;
if ($result = $DBConnect->query($SQLstring)) {
/*echo "<table width='90%' border='0'>\n";
echo "<tr><th>CustNo</th>";
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

/*echo "<tr><th>{$row[0]}</th>";
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

*/


echo "{$row[0]} ";
echo "&nbsp;&nbsp;{$row[1]} ";
echo "&nbsp;&nbsp;{$row[2]} ";
echo "&nbsp;&nbsp;{$row[3]} ";
echo "&nbsp;&nbsp;{$row[4]} ";
echo "&nbsp;&nbsp;{$row[5]} ";
echo "&nbsp;&nbsp;{$row[6]} ";
echo "&nbsp;&nbsp;{$row[7]} ";
echo "&nbsp;&nbsp;{$row[8]} ";
echo "&nbsp;&nbsp;{$row[9]} ";

		}
    // free result set
    $result->close();

}
//echo "</table>";

//echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF






$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(EventNo)  AS MAXNUM FROM events";

//$result=mysql_query($query);
//echo "<br>".$result."<br>";
//echo "<br>".intval($result)."<br>";
//while($row=mysql_fetch_array($result))


$result = $DBConnect->query($query);
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


<!--<form name="Addevent" action="addEventprocess.php" onsubmit="return formValidator();" method="post">-->
<form action="addEventprocess.php"  onsubmit='return formValidator()'  method="post" >
<table width='10' border='1'>
<?php
echo "<br>Add new events:<br>";

echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate YYYY-MM-DD<br>".Date("Y-m-d")."</th>";
echo "<th>Priority</th>";
echo "<th>Destination</th>";
echo "<th>Details</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* event AutoNumber: (!! Different for internet events!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="2"  id="EventNo"  name="EventNo" value="<?php echo $daNextNo;?>" />
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

<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustInt;?>";

</th>
		<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");
		?>
			<!--<label>EDate:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
			<input type="text" size="10" id="EDate"  name="EDate" value="<?php //echo $NewFormat;?>" />
		</th>


		<th>	<select name="Priority" value="<?php $oldpri = "."; echo $oldpri; ?>" >
                <option value=".">.</option>
                <option value="Low">Low</option>
                <option value="High">Medium</option>
                <option value="High">Urgent</option>
			</select>
		</th>
		<th>

			<input type="text"  size="8" id="Destination"  name="Destination" value="_" />
		</th>

		<th>
			<!--<label>&nbsp; ENotes:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="40" id="ENotes"  name="ENotes" value="__1GB_topup" />
		</th>




</th>
		</tr>
		</table>


<br><br>
<input type="submit" value="Create event" />
<!--<input type="submit" value="Create event" onclick="return confirm('Are you sure about the date?');" /> -->
<!--<input type="button" value="Submit" onclick="formValidator()" />-->

</form>



<?php
include ("view_event_by_cust.php");

//mysqli_close($DBConnect);
?>
</p>


<?php
/*echo "<form action='somewhere.php' method='post'>";
//get class into the page
require_once 'calendar/tc_calendar.php';

//instantiate class and set properties
$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(1, 1, 2000);

//output the calendar
$myCalendar->writeScript();

echo "</form>";

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

*/

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
$indesc = 20;
include ("view_inv_by_cust.php");
include ("view_trans_by_cust.php");
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



