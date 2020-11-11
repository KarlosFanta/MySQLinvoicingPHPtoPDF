
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>updated</title>

<?php
require_once 'logprog.php';
require_once 'inc_OnlineStoreDB.php';
require_once 'header.php';

$clInv3 = $_POST['clInv3']; ///THIS IS NOW INV NUMBER
$TBLrow = $_POST['mydropdownEC'];/// THIS IS THE EXPENSE NUMBER


//echo "TBLrow: " .$TBLrow."</BR>";
$Expno = explode('_', $TBLrow );
$ExpNo2 = $Expno[0];

$queryET = "select * from expenses where InvNo = $clInv3";
//echo $queryET;
$cnt= 0;
if ($resultET = mysqli_query($DBConnect, $queryET)) {
	while ($row = mysqli_fetch_assoc($resultET)) {
	$InvNoCHK = $row["InvNo"];//case sensitive!

	if ($InvNoCHK != '')
	{
		if ($cnt == 0)
			echo "<b>NB InvNo $InvNoCHK ALREADY HAS THESE EXPENSE(S):</b>";

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
echo "<br>";
	$cnt++;
	++$cnt;
	}
	else
		echo "confirmed not yet assigned";

	}
	mysqli_free_result($resultET);
}






$queryI = "SELECT * FROM invoice WHERE InvNo = $clInv3" ;

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
echo $clInv3;
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

$Inv_NoInt = intval($clInv3);
$InvNo = $clInv3;

echo " d1:".$rowI['D1'];
if ($rowI['Q1'] != '0')
echo " q1:".$rowI['Q1'];
echo " ".$rowI['ex1'];
echo "<br> ".$rowI['D2'];
if ($rowI['Q2'] != '0')
echo " ".$rowI['Q2'];
echo " ".$rowI['ex2'];
echo "<br> ".$rowI['D3'];
if ($rowI['Q3'] != '0')
echo " ".$rowI['Q3'];
echo " ".$rowI['ex3'];
echo "<br> ".$rowI['D4'];
if ($rowI['Q4'] != '0')
echo " ".$rowI['Q4'];
echo " ".$rowI['ex4'];
echo "<br> ".$rowI['D5'];
if ($rowI['Q5'] != '0')
echo " ".$rowI['Q5'];
echo " ".$rowI['ex5'];
echo "<br> ".$rowI['D6'];
if ($rowI['Q6'] != '0')
echo " ".$rowI['Q6'];
echo " ".$rowI['ex6'];
echo "<br> ".$rowI['D7'];
if ($rowI['Q7'] != '0')
echo " ".$rowI['Q7'];
echo " ".$rowI['ex7'];
echo "<br>".$rowI['D8'];
if ($rowI['Q8'] != '0')
echo "q".$rowI['Q8'];
echo "".$rowI['ex8'];

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

$querySDR = "UPDATE expenses SET InvNo = '$clInv3' WHERE ExpNo = $ExpNo2";
//echo "<br>".$querySDR;
echo "<b><font size= 2>";
if (mysqli_query($DBConnect, $querySDR) === TRUE) {

	echo '<br>successfully assigned: '.$querySDR;
}
else
{
	echo '<br>ERROR NOT updated '.$querySDR;
}
echo "</b></font>";

echo "<br>";

$query = "select * from expenses where ExpNo = $ExpNo2";

echo "<br><br>";
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
	$ExpNo = $row["ExpNo"];//case sensitive!
	$InvNo = $row["InvNo"];//case sensitive!
	$Category =  $row["Category"];//case sensitive!
	$ExpDesc = $row["ExpDesc"];//case sensitive!
	$SerialNo = $row["SerialNo"];//case sensitive!
	$SupCode = $row["SupCode"];//case sensitive!
	$PurchDate = $row["PurchDate"];//case sensitive!
	$ProdCostExVAT = $row["ProdCostExVAT"];//case sensitive!
	$Notes = $row["Notes"];//case sensitive!
	$CustNoB = $row["CustNo"];//case sensitive!
	print "now assigned to <b>InvNo".$InvNo;
	//print "<br>".$Category;
	print "<br>".$ExpDesc;
	print "<br>".$SerialNo;
	//print "_".$SupCode;
	print "<br>".$PurchDate;
	print " R".$ProdCostExVAT;
	print "ex VAT </b><br>".$Notes."<br>";
  }


mysqli_free_result($result);

}


$SQLstring = "select * from invoice where InvNo = $clInv3  ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<br><br>InvNo ";

    // fetch object array
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];

	   echo $x;
echo "</FONT><br>";

echo "".$row["InvDate"]."<br>";
echo " ".substr($row["Summary"], 0, 18)."<br>";
echo " R".$row["TotAmt"]."<br>\n";
echo "".$row["Draft"]."<br>\n";
echo "";
echo "<table width='10' border='1'>\n";
echo "<tr><th>Description</th>";
echo "<th>ex1</th>";
echo "</tr><tr>";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";

echo "<th>R".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>R".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>R".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "</tr><tr>";
echo "</tr><tr>";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();

}
echo "</table>";
echo "<br><br>";

?>
<font size = 5>
<a href = view_inv_by_custWITHexpenses.php target=_blank>view_inv_by_custWITHexpenses.php</a></font>


<?php

//include 'viewExpHEandExpBReakDown.php';
?>
