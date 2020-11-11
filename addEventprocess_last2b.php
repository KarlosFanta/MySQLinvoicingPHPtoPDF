<?php	//this is "process_Trans.php"
 $page_title = "You added a event";
	include 'header.php';
//require_once 'db.php';//mysql connection and database selection
require_once 'inc_OnlineStoreDB.php';
echo "addEventprocess_last2.php<br>";
?>



<?php
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";

//$CustNo = $_POST['CustNo'];//this only works for sessions, you gootta use the droppbox instead.
//$CustFN = $_POST['CustFN'];
//$CustLN = $_POST['CustLN'];
//$CustEmail = $_POST['CustEmail'];

$EventNo = 0;
$CustNo = 1;
$EDate = '0000-00-00';
//$AmtPaid = '';
$ENotes ='_______';
$Priority = '_';
$Destination = '_';
//$InvNoA = 0;
//$InvNoAincl = 0;
$EventNo = $_POST['EventNo'];
//$CustNo = $_POST['CustNo'];//this only works for sessions, you gootta use the droppbox instead.
$TBLrow = $_POST['mydropdownEC'];

echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {   this while loop constantly runs!! DO NTO USE!!
//echo "t<br />";
//$Custno = strtok(";");
//}
echo "CustnozERO: ";
echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);
$CustNo = $CustInt;
if ($CustNo == '_no_selection_')
$CustNo = '1';
/*
$queryS = "select * from customer where CustNo = $CustInt";
//echo $queryS."<br>";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$CustFN = $row2["CustFN"];
$CustLN =  $row2["CustLN"];

//print $item2b;
// echo "____".$CustInt;
// print "_".$item1b;
//print "_".$item3b;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

	}
$result2->free();
	}



*/





$Priority = $_POST['Priority'];
$Destination = $_POST['Destination'];
$D1 = $_POST['EDate'];
$D2 = explode("/", $D1);
echo $D1[2]."____";

echo $D1[0]."____";
echo $D1[1]."____";
//$D2 = $_POST['D2'];
//$D3 = $_POST['D3'];

$EDate = $D2[2]."-".$D2[1]."-".$D2[0];

echo $EDate;

$ENotes = $_POST['ENotes'];
//I need to keep this lot enable becasue somehow the changeV function is not functioning
$ENotes = preg_replace("/'/","_",$ENotes);
$ENotes = preg_replace("/‘/","_",$ENotes);
$ENotes = preg_replace("/’/","_",$ENotes);
$ENotes = preg_replace("/&/","and",$ENotes);
$ENotes = preg_replace("/,/","+",$ENotes);

$ENotes = str_replace(' ', '_', $ENotes); //this baby works for ENotes

//$ENotes = preg_replace("/…/",".",$ENotes);
$ENotes = preg_replace("/ /","_",$ENotes); //this baby works for ENotes

function changeV($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
//$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);
$v1 = str_replace(' ', '_', $v1);

//$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_", $v1); //this baby works for ENotes
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";

$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.
//echo "loading function ChangeV";
//return $v2;
return $v1;
}

$Enotes = changeV($ENotes); //i don;t think this is working

echo " ENotes after:".$ENotes ;
//echo "TMeth:".$TMethod." ";

echo "Thank you for adding the event's details: ".$EventNo." ".$CustNo ." ".$EDate ."."  ;

$EventNoInt = intval($EventNo);
$query="insert into events (EventNo, CustNo, EDate, ENotes, Priority , Destination)
VALUES
( $EventNo,  '$CustNo', '$EDate', '$ENotes', '$Priority', '$Destination') ";

/*(EventNo = $EventNo, CustNo = $CustNo, EDate ='$EDate', AmtPaid = $AmtPaid, ENotes = '$ENotes', TMethod = '$TMethod',
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update events set Transfn = '$CustNo', Transln ='$EDate', Transtel = '$AmtPaid', Transcell= '$ENotes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where EventNo = :EventNoInt";
echo '</br></br></br>';

mysqli_query($DBConnect, $query);
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<br><font size = 5 color = red><b><b>insert or update NOT successfull!!!</b></b></font><br><br>";
echo "<a href = 'http://localhost/phpMyAdmin-3.5.2-english/sql.php?db=kc&goto=db_structure.php&table=event&pos=0'>php admin event</a><br><br>";
}

else
echo "insert success! <br>";

echo $query;

echo ";<br><br>";
//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");

echo '</br>';echo '</br>..';

$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

echo "edit_eventCQ.php<br>";
include 'edit_eventCQ.php';

?>


