<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>All Events</title>
<meta charset="UTF-8">

</head>
<body>


<?php
	require_once("inc_OnlineStoreDB.php");//page567
	require_once("header.php");//page567

$query = "SELECT * FROM events order by  EventNo desc" ;

//echo "Q:".$query;
//	  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

echo "<table width='10' border='1'>\n";

echo "<tr>";
echo "<th>EventNo</th>";
echo "<th>CustNo</th>";
echo "<th>EDate</th>";
echo "<th>ENotes</th>";
echo "<th>Priority</th>";

echo "</tr>\n";
if ($result2 = $DBConnect->query($query)) {

    while ($row2 = $result2->fetch_assoc()) {
       // printf ("%s (%s)\n", $row2['CustNo'], $row2['CustFN']);
	///	$TransNo_Check = $row[0];
		


			//echo "selected CustomerNo: ".$row2['CustNo']."<br>";
			//echo "selected CustomerLN: ".$row2['CustLN']."<br>";
	

echo "<tr><th>{$row2['EventNo']}</th>";
echo "<th>{$row2['CustNo']}</th>";
echo "<th>{$row2['EDate']}</th>";
echo "<th>{$row2['ENotes']}</th>";
echo "<th>{$row2['Priority']}</th>";
echo "</tr>"; 



	
    // free result set
 //   $result->close();
	
}
echo "</table>";
}
	



$query = "SELECT * FROM customer" ;

//echo "Q:".$query;
//	  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
echo "<table width='10' border='1'>\n";
echo "<tr><th>CustNo</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>Distance</th>";
echo "<th>ABBR</th>";
//echo "<th>LastLogin</th>";
echo "</tr>\n";

if ($result2 = $DBConnect->query($query)) {

    while ($row2 = $result2->fetch_assoc()) {
       // printf ("%s (%s)\n", $row2['CustNo'], $row2['CustFN']);
	///	$TransNo_Check = $row[0];
		





echo "<tr><th>{$row2['CustNo']}</th>";
echo "<th>{$row2['CustFN']}</th>";
echo "<th>{$row2['CustLN']}</th>";
echo "<th>{$row2['CustTel']}</th>";
echo "<th>{$row2['CustCell']}</th>";
echo "<th>{$row2['CustEmail']}</th>";
echo "<th>{$row2['CustAddr']}</th>";
echo "<th>{$row2['Distance']} km</th>";
echo "<th>{$row2['ABBR']}</th>"; //CASE SENSITIVE!!!
$Abbr = $row2['ABBR'];
//echo "<th>{$row2['LastLogin']}</th>";
//echo "<th>{$row2['CustPW']}</th></tr>\n";
//echo "<td>{$row[5]}</td>";
echo "</tr>\n";
		
    //free result set 
   // $result->close();
	
}
echo "</table>";
}
	




?>