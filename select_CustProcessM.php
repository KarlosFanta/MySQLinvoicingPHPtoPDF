<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a customer";
//if( ! @$_SESSION){
    session_start();
//}

	require_once 'header.php';
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the customer before we change him on the last form.


/*if (isset($_POST['btnSubmit'][0])) {
    switch (strtolower($_POST['btnSubmit'][0])) {
        case 'save':
            echo '<h1>Save button was clicked</h1>';
            break;
        case 'delete':
            echo '<h1>Delete button was clicked</h1>';
    }
    die();
}

*/

if (isset($_POST['mydropdownEC'][0])) {

            echo '<h1>mydropdownEC  was clicked</h1>';
     }
 if (isset($_POST['d1'][0])) {

            echo '<h1>d1  was clicked</h1>';
     }


 if (isset($_POST["mydropdownEC"]) && !empty($_POST["mydropdownEC"])) {
    echo "Yes, mydropdownEC is set";
}else{
    echo "N0, mydropdownEC is not set";
}


if (!empty($_POST["mydropdownEC"])) {
    echo "Yes, mydropdownEC is full";
}else{
    echo "N0, mydropdownEC is empty";
}



if (isset($_POST['drop'][0])) {

            echo '<h1>drop  was clicked</h1>';
     }
 if (isset($_POST['drop'][0])) {

            echo '<h1>drop  was clicked</h1>';
     }


 if (isset($_POST["drop"]) && !empty($_POST["drop"])) {
    echo "Yes, drop is set";
}else{
    echo "N0, drop is not set";
}


if (!empty($_POST["drop"])) {
    echo "Yes, drop is full";
}else{
    echo "N0, drop is empty";
}


if (!empty($_POST["drop2"])) {
    echo "Yes, drop is full";
}else{
    echo "N0, drop is empty";
}


/*
if (($_POST["drop2"])) {
    echo "Yes, drop is full";
}else{
    echo "N0, drop is empty";
}
*/











$TBLrow = "";
$d1 ="";
$d2= "";

$TBLrow = $_POST['mydropdownEC'];
echo "TBLrow: ";
echo $TBLrow;
if ( $TBLrow == "_no_selection_")
{
echo "<br>TBLrow: ";
$TBLrow =$_POST['drop'];
echo $TBLrow;
}
if ( $TBLrow == "_no_selection_")
{
echo "<br>TBLrow: ";
$TBLrow= $_POST['drop2'];
echo $TBLrow;
echo "<br>";
}



$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."<br />";

$_SESSION['CustNo'] = $CustInt;

echo "select_CustProcess: SESSION CustNo: ". $_SESSION['CustNo'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "SESSION sel: ". @$_SESSION['sel'] ."<br />";

if (@$_SESSION['sel'] == "addInvC")
include ("addInvCsessD.php");
else if (@$_SESSION['sel'] == "edit_invC")
include ("edit_invCsess.php");
else if (@$_SESSION['sel'] == "add_eventC")
include ("addEventCsess.php");
else if (@$_SESSION['sel'] == "edit_transC")
include ("edit_transCsess.php");
else if (@$_SESSION['sel'] == "editCust")
include ("editCustProcess.php");
else if (@$_SESSION['sel'] == "add_trans2")
include ("add_trans2sess.php");
else if (@	$_SESSION['sel'] = "select_C");
{
echo "you have selected the customer.<br>";

echo "<a href='editCustProcess.php'><font size = '3'>Click here to <b>edit the customer</b>:";
echo "editCustProcess.php</a><br>";

echo "<a href='selectCust.php'><font size = '3'>Click here to <b>select another  customer</b>:";
echo "selectCust.php</a><br>";

echo "<a href='addQuoCsess.php'><font size = '3'>Click here to add <b>quotes</b>:</font>";
echo "addQuoCsess.php</a><br>";

echo "<a href='addInvCsess.php'><font size = '3'>Click here to add <b>invoices</b>:</font>";
echo "addInvCsess.php</a><br>";

echo "<a href='add_trans2sess.php'><font size = '3'>Click here to add a <b>transaction</b>:</font>";
echo "add_trans2sess.php</a><br>";

echo "<a href='addEventCsess.php'><font size = '3'>Click here to add an <b>event</b>:</font>";
echo "add_eventCsess.php</a><br>";

echo "<a href='interrogate.php'><font size = '3'><b>Interrogate</b> his/her line</font>";
echo "interrogate.php</a><br>";

include ("edit_trans_CustProcessC.php");
}
//else
//include ("editCustProcess.php");

//Reset:
$_SESSION['sel'] = "none";
	$CustInt = $_SESSION['CustNo'];
//echo "CustInt:". $CustInt;
//include ("view_cust_by_cust.php");
//include ("view_trans_by_cust.php");
//include ("view_inv_by_cust.php");
//include ("view_event_by_cust.php");

//include ("view_trans_by_cust.php");

$indesc = 8;
$in = 8;
//include ("view_inv_by_cust.php");

/*
echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

echo "<font size = 4><b>Total Amount outstanding: R".($Invsummm - $yo)."</b></font><BR />";
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";
//include ("view_inv_by_custPD.php");
//include (".php");
*/
?>



