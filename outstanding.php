<?php	//this is "edit_trans_CustProcess.php"
 $page_title = "Outstanding payments of ALL customers";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';
$pr = "N";
//$pr = $_POST['pr']; //inv descriptions
$pm = "N";
//$pm = $_POST['pm']; //inv descriptions
$ev= "N";
$in= "N";
//$ev = $_POST['ev']; //inv descriptions
$DisplayInvPdStatus  = "N";
$Invsummm = 0;
?>

<a href = "outstanding3.php"> View only outstanding customers</a><br>
<form name="Edit_trans_process" action="edit_trans_process_last.php" method="post">


<?php

echo "<b>ALL CUSTOMERS</b>    Date: ".date("j M Y")." <BR />";

$SQLstring = "select * from customer";
if ($result = $DBConnect->query($SQLstring)) {
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>ID Doc/passport</th>";
echo "<th>Cust Details</th>";
echo "<th>Password</th>";
echo "<th>Distance</th>";
echo "<th>ADSL Tel</th>";
echo "<th>Important</th>";
echo "</tr>\n";
*/
   while ($row = $result->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);

//echo "<tr><th>{$row[0]}</th>";

$CustInt = $row[0];
/*echo "CUSTINT ". $CustInt ." ";
echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
/*echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[12]}</th>\n";
*/

/*
echo "{$row[1]}&nbsp;&nbsp;";
echo "{$row[2]}&nbsp;&nbsp;";
echo "r3:{$row[3]}&nbsp;&nbsp;";
echo "r12: {$row[12]}&nbsp;&nbsp;";
echo "r13: {$row[13]}&nbsp;&nbsp;";
echo "r11: {$row[11]}&nbsp;&nbsp;";
*/

include ("outstanding2.php");

//echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
//echo "</table>";

?>

I wrote this code to list all the files except directories

<a href="F:/work/" >Go to downloads page</a>
<a href="../" >Go to downloads page</a>

<a href="./downloads/folder_i_want_to_display/" >Go to downloads page</a>
