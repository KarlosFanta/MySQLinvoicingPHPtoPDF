
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>updated</title>

<?php	
require_once('logprog.php');
	require_once("inc_OnlineStoreDB.php");
	require_once("header.php");


$clExp3 = $_POST['clExp3'];
/*$TBLrow = $_POST['mydropdownEC'];


echo "TBLrow: " .$TBLrow."</BR>";
$Invno = explode('_', $TBLrow );
$InvNo2 = $Invno[0];

*/
//first check if selected expense is already assigned to an invoice:

$queryEC = "select * from expenses where ExpNo = $clExp3";
//echo $queryEC;

if ($resultEC = mysqli_query($DBConnect, $queryEC)) {
	while ($row = mysqli_fetch_assoc($resultEC)) {
	$InvNoCHK = $row["InvNo"];//case sensitive!
	
	if ($InvNoCHK != '')
		echo "<br><br><br><b>THIS EXPENSE WAS ASSIGNED TO INVNo $InvNoCHK</b><br><br><br><br><br><br><br><br><br>";
	else
		echo "error confirmed not yet assigned";
	}
	mysqli_free_result($resultEC);
}




//The selected invoice may already have other expenses:

$queryET = "select * from expenses where InvNo = $InvNo2";
echo $queryET;

if ($resultET = mysqli_query($DBConnect, $queryET)) {
	while ($row = mysqli_fetch_assoc($resultET)) {
	$InvNoCHK = $row["InvNo"];//case sensitive!
	
	if ($InvNoCHK != '')
	{
		echo "<br><b>THIS INVOICE ALREADY HAS THE FOLLOWING EXPENSES ASSIGNED TO InvNo $InvNoCHK</b><br><br>";
	echo $row["ExpNo"].' ';//case sensitive!
	echo $row["Category"].' ';//case sensitive!
	echo $row["ExpDesc"].' ';//case sensitive!
	echo $row["SerialNo"].' ';//case sensitive!
	echo $row["SupCode"].' ';//case sensitive!
	echo $row["PurchDate"].' ';//case sensitive!
	echo $row["ProdCostExVAT"].' ';//case sensitive!
	echo $row["Notes"].' ';//case sensitive!
	echo 'CustNo: '.$row["CustNo"].' ';//case sensitive!
	echo 'InvNo: '.$row["InvNo"].' ';//case sensitive!
		
	}
	else
		echo "confirmed not yet assigned";



	}
	mysqli_free_result($resultET);
}






$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $queryI."</BR>";

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$CustInt = $rowI["CustNo"];
echo "CustInt: ".$CustInt;

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table border='0'>\n";
echo "<tr>";
echo "<th>CustNo</th>";
echo "<th>CustFn</th>";
echo "<th>Surname</th>";
echo "</tr>\n";


    while ($row = mysqli_fetch_assoc($result)) {
 
echo "<tr>";
echo "<th>{$row['CustNo']}</th>";
echo "<th>{$row['CustLN']}</th>";
echo "<th>{$row['CustEmail']}</th>";//CustEmail
echo "</tr>\n";
}

    $result->close();
	
}
echo "</table>";


echo "The Invoice in question: <br>";
echo "InvNo: ";
echo $InvNo2; 
echo "&nbsp;";
echo " ".$rowI['Summary'];
$Summary = $rowI['Summary'];
echo "&nbsp;";
$Dt1 = explode("-", $rowI['InvDate']);

$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];

echo $TransDate;	
echo "&nbsp;";

$SDR = $rowI['SDR'];
echo "&nbsp;";
$TAmt = $rowI['TotAmt'];
 //$TAmt = number_format ($TAmt, 2, ".", "");
 echo $TAmt; 

$Inv_NoInt = intval($InvNo2);
$InvNo = $InvNo2;


echo " ".$rowI['D1'];
echo " ".$rowI['Q1'];
echo " ".$rowI['ex1'];
echo "<br> ".$rowI['D2'];
echo " ".$rowI['Q2'];
echo " ".$rowI['ex2'];
echo "<br> ".$rowI['D3'];
echo " ".$rowI['Q3'];
echo " ".$rowI['ex3'];
echo "<br> ".$rowI['D4'];
echo " ".$rowI['Q4'];
echo " ".$rowI['ex4'];
echo "<br> ".$rowI['D5'];
echo " ".$rowI['Q5'];
echo " ".$rowI['ex5'];
echo "<br> ".$rowI['D6'];
echo " ".$rowI['Q6'];
echo " ".$rowI['ex6'];
echo "<br> ".$rowI['D7'];
echo " ".$rowI['Q7'];
echo " ".$rowI['ex7'];
echo "<br> ".$rowI['D8'];
echo " ".$rowI['Q8'];
echo " ".$rowI['ex8'];



  }
   $resultI->close();
}

	//	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


?>
<!--<form name="PL" action="print_invoicePDF.php" method="post">-->
<form name="PL" action="PDF/tcpdf/examples/PDF.php" method="post">
<?php
//$queryFL = "SELECT L1, ABBR FROM customer WHERE CustNo = $CustInt" ;
//echo "queryFL:".$queryFL."<br>";





$querySDR = "UPDATE expenses SET CustNo = '300', InvNo = '' WHERE ExpNo = $clExp3";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {   

	echo '<br>successfully updated  '.$querySDR;
}
else 
{
	echo '<br>ERROR NOT updated '.$querySDR;
}	


echo "<br>";
?>
<font size = 5>
<a href = view_inv_by_custWITHexpenses.php target=_blank>view_inv_by_custWITHexpenses.php</a></font>


<?php

include "viewExpHEandExpBReakDown.php";
?>
