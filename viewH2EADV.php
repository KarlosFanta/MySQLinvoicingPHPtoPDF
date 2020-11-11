viewH2EADV.php<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>High Priority events with a destination</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

</head>
<body>
Printing advice: make sure all columns align.
still comes out quite tiny, maybe shorten too long text. Do a Print Preview Edit: <br><a href = "viewH2EADV.php">viewH2EADV.php</a>


<?php
require_once 'inc_OnlineStoreDB.php';//page567
$query = "SELECT * FROM H2EADV" ;

$result = mysqli_query($DBConnect, $query);

/* numeric array */
$row = mysqli_fetch_array($result, MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[1]);

echo "<a href = 'truncateH2EADV.php'>truncateH2EADV.php</a><br>"	;

echo "<table border='0'><tr> <th></th><th></th></tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row[0] . "</td>";
  echo "<td>" . $row[1] . "</td>";
  echo "<td>" . $row[2] . "</td>";
  echo "<td>" . $row[3] . "</td>";
  echo "<td>" . $row[4] . "</td>";
  echo "<td>" . $row[5] . "</td>";
  echo "<td>" . $row[6] . "</td>";
  echo "<td>" . $row[7] . "</td>";
  echo "<td>" . $row[8] . "</td>";
  echo "<td>" . $row[9] . "</td>";
  echo "<td>" . $row[10] . "</td>";
  echo "<td>" . $row[11] . "</td>";

  echo "</tr>";
}

echo "</table>";

mysqli_free_result($result);

echo "<a href = 'truncateH2EADV.php'>truncateH2EADV.php</a><br>"
//	mysqli_query($DBConnect, 'TRUNCATE TABLE H2E;');
//	echo "<br>table truncated";

/*

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




*/
?>
