
<?php	
require_once("inc_OnlineStoreDB.php");

//this is "add_CustProcess.php"
 $page_title = "a customer registered";
	require_once('header.php');	
// Turn off all error reporting esp for fields that have been left blank.
//error_reporting(0);
$TransNo = $_POST['TransNo'];
$CustNo = $_POST['mydropdownDC'];
$InputDate = $_POST['Date1'];


$D1 = explode("/", $_POST['Date1']);
echo $D1[2]."____";

echo $D1[0]."____";
echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$TransDate = $D1[2]."-".$D1[1]."-".$D1[0];

echo "<br>Transdate: ".$TransDate." ___<br>";

$AmtPaid = $_POST['AmtPaid'];
$Notes = $_POST['Notes'];
$TMethod = $_POST['TMethod'];
$InvNoA = $_POST['InvNoA'];
$InvNoAincl = $_POST['InvNoAincl'];
$InvNoB = $_POST['InvNoB'];
$InvNoBincl = $_POST['InvNoBincl'];
$InvNoC = $_POST['InvNoC'];
$InvNoCincl = $_POST['InvNoCincl'];
$InvNoD = $_POST['InvNoD'];
$InvNoDincl = $_POST['InvNoDincl'];
$InvNoE = $_POST['InvNoE'];
$InvNoEincl = $_POST['InvNoEincl'];
$InvNoF = $_POST['InvNoF'];
$InvNoFincl = $_POST['InvNoFincl'];
$InvNoG = $_POST['InvNoG'];
$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];
//$Cust_PW = $_POST['CustPw2'];

//OK

//So now we got to double check if TransNo has been used.
/*$TransNo_Check = "rr__";

$query = "SELECT TransNo, CustNo FROM transaction WHERE TransNo = '$TransNo'";
//echo $query;
$result = $DBConnect->query($query);
$row = $result->fetch_array(MYSQLI_NUM); //this is object oriented and WORKS!!!
//printf ("%s (%s)\n", $row[0], $row[1]);
//echo "__r0: ".$row[0];
//echo "__r1: ".$row[1];


/*
if ($result = $DBConnect->query($query)) {

    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
		$TransNo_Check = $row[0];
		}

    
    $result->free();
}
*/

/*
$TransNo_Check = $row[0];

//echo "InvNoA:".$InvNoA;
//echo "TransNo_Check:".$TransNo_Check;
if ($TransNo_Check == $InvNoA)
{
	echo "Sorry, this transaction number is already used.";
	echo "<a href = 'view_trans_all.php'>view_trans_all.php</a><br>";
}
else
{
*/
echo "<b> ".$TransNo . " ".$CustNo." ".$TransDate ." ".$AmtPaid ."____ "  ;

$CustNoInt = intval($CustNo);
//$query="insert into customer values(:CustNoInt, '$TransDate', '$AmtPaid', '$Notes', '$TMethod', '$InvNoA', '$InvNoAincl', '$Priority')";
//$query="insert into customer (CustNo, CustFN, CustLN, CustTel, CustCell, InvNoAail, CustAddr, Distance, CustPW)values('$CustNo', '$TransDate', '$AmtPaid', '$Notes', '$TMethod', '$InvNoA', '$InvNoAincl', '$Priority', '$Cust_PW')";
$query="insert into transaction (TransNo, CustNo, TransDate, Amtpaid, Notes, TMethod, InvNoA, InvNoAincl, InvNoB, InvNoBincl, InvNoC, InvNoCincl, InvNoD, InvNoDincl, InvNoE, InvNoEincl, InvNoF, InvNoFincl, InvNoG, InvNoGincl, InvNoH, InvNoHincl, Priority)
values('$TransNo', '$CustNo', '$TransDate', $AmtPaid, '$Notes', '$TMethod', '$InvNoA', 
$InvNoAincl, '$InvNoB', $InvNoBincl, '$InvNoC', $InvNoCincl, '$InvNoD', $InvNoDincl, '$InvNoE', $InvNoEincl, '$InvNoF', $InvNoFincl, '$InvNoG', $InvNoGincl, '$InvNoH', $InvNoHincl, '$Priority')";

echo "<br>".$query."";
echo ";<br>";
echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";


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
//echo "CustNo in line 81:".$CustNo;
//require_once('FinalOrder.php'); 
//}
?>
<!--<p><a href='<?php //echo "FinalOrder.php?PHPSESSID=" . session_id() . "&operation=checkout"?>'>Click here to Confirm Your Order.</a></p>-->

