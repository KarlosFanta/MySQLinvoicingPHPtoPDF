
<?php
require_once 'inc_OnlineStoreDB.php';

//this is "add_CustProcess.php"
 $page_title = "a customer registered";
	require_once 'header.php';
// Turn off all error reporting esp for fields that have been left blank.
//error_reporting(0);

$CNo = $_POST['CustNo'];
$Cust_FName = $_POST['CustFName'];
$Cust_LName = $_POST['CustLName'];
//$Cust_Tel = $_POST['CustTN'];
//$Cust_Cell = $_POST['CustCN'];
$Cust_Email = $_POST['CustEm'];
//$Cust_Addr = $_POST['CustPA'];
$Cust_Dist = $_POST['CustDi'];
//$Cust_PW = $_POST['CustPw2'];
$Abbr = $_POST['Abbr'];
  @session_start();
$_SESSION['CustNo'] = $CNo;
//OK
//So now we got to check if email address has been used by an existing customer.
$Email_Check = "rr__";

//$query = "SELECT CustEmail, CustCell FROM Customer WHERE CustEmail = '$Cust_Email'";
$query = "SELECT CustEmail, CustCell FROM customer WHERE CustNo = '$CNo'";
//echo $query.";<br>";
$result = $DBConnect->query($query);
$row = $result->fetch_array(MYSQLI_NUM); //this is object oriented and WORKS!!!
//printf ("%s (%s)\n", $row[0], $row[1]);
//echo "__r0: ".$row[0];
//echo "__r1: ".$row[1];

/*
if ($result = $DBConnect->query($query)) {

    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
		$Email_Check = $row[0];
		}


    $result->free();
}
*/


$Email_Check = $row[0];

//echo "Cust_Email:".$Cust_Email;
//echo "Email_Check:".$Email_Check;
/*if ($Email_Check == $Cust_Email)
{
	echo "Sorry, this email address is being used by another user, please try with another email address or click back twice to Log in.";
	echo "<a href = 'Register.php'>Add another customer Register.php</a><br>";
	echo "<a href = 'view_cust_all.php'>view_cust_all.php</a><br>";
	include ("view_cust_all.php");
}
else
{
*/
echo "<b><br>Welcome , ".$CNo." ".$Cust_FName ." ".$Cust_LName ." Thank you for registering."  ;

$CNoInt = intval($CNo);
//$query="insert into customer values(:CNoInt, '$Cust_FName', '$Cust_LName', '$Cust_Tel', '$Cust_Cell', '$Cust_Email', '$Cust_Addr', '$Cust_Dist')";
//$query="insert into customer (CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance, CustPW)values('$CNo', '$Cust_FName', '$Cust_LName', '$Cust_Tel', '$Cust_Cell', '$Cust_Email', '$Cust_Addr', '$Cust_Dist', '$Cust_PW')";
$query="insert into customer (CustNo, CustFN, CustLN, CustEmail, Distance, Important, ABBR,
u1, u2, Extra, invD3, ae3, invD4, ae4,  invD5, ae5,  invD6, ae6,  invD7, ae7,  invD8, ae8, Confid  )
values($CNo, '$Cust_FName', '$Cust_LName', '$Cust_Email', '$Cust_Dist', '', '$Abbr',
 '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

//echo "<br>added/deleted/updated_rows: ";

mysqli_query($DBConnect, $query);
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><br><font size = 5 color = red><b><b>insert or update NOT successfull!!!</b></b></font><br><br>";
else
echo "insert success! <br>";

//echo $query;

/*

echo mysqli_affected_rows($DBConnect)."(totally wrong!<br />";
if(mysqli_affected_rows($DBConnect) > 0){
  echo "Successfully inserted/updated/deleted data";
}else{
echo "<font size = 5  color = red><b><b>insert or update NOT successfull!!!</b>!!</b></font>";
  echo mysqli_error();
}
echo "<br><br>";
*/

/*if (mysqli_affected_rows($DBConnect) >)
echo "<font size = 5  color = red><b><b>insert or update NOT successfull!!!</b>!!</b></font><br><br>";
else
echo "insert success! not sure though <br>";
*/
echo "<br>".$query."";
echo ";<br><br><font size = '3'>";
	echo "<a href = 'Register.php'>Add another customer Register.php</a><br>";
echo "<br><br><font size = '3'>";
	echo "<a href = 'Register.php'>Add another customer Register.php</a><br>";
	echo "<font size = '2'><a href = 'view_cust_all.php'>view_cust_all.php</a><br>";
	//include ("view_customers2.php");

//php to sql does not understand semicolon. remove the semicolon!!!

$DBConnect->query($query); //$mysqli gets replaced by $DBConnect
//$result=mysql_query($query);

//$DBConnect->query($query);
/*while($row=mysql_fetch_array($result))
{
    if($row["username"]==$f_usr && $row["password"]==$f_pswd)
        echo"Welcome";
    else
       echo"Sorry";
}*/



//echo '<a href="view_cust_all.php" target=_blank>view all cust </a>';
//echo "CNo in line 81:".$CNo;
//require_once 'FinalOrder.php';
//}


$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';

//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
include 'editCust.php';
?>
<!--<p><a href='<?php //echo "FinalOrder.php?PHPSESSID=" . session_id() . "&operation=checkout"?>'>Click here to Confirm Your Order.</a></p>-->
