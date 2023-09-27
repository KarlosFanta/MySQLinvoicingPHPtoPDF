

<meta charset="UTF-8">





<?php
	//require_once("inc_OnlineStoreDB.php");//page567
	
	$mysqliDBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");
//phpinfo();  //enable this for testing your DB and PHP.
//OBJECT ORIENTED STYLE
//Ref: http://php.net/manual/en/mysqli.query.php
//Ref: https://www.php.net/manual/en/mysqli-result.fetch-array.php
//SCROLL DOWN TO THE BOTTOM FOR THE PREFERRED ASSOC METHOD: PREFERRED WAY: mysqli_fetch_assoc
 
echo "<meta charset='UTF-8'>";
$dbhost='localhost';
$dbuser='root';
$dbpass='Passwrdd';
$dbname='myDBname';
 
//$DBlink = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//$DBlink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//$DBlink = new mysqli("localhost", "root", "Passwrdd", "myDBname"); //if no password
//$DBlink = new mysqli("localhost", "root", "", "myDBname"); //if no password
 
if ($mysqliDBConnect->connect_errno) {
    die('Connect Error: ' . $mysqliDBConnect->connect_errno);
exit();
}

echo "yo";
if ($mysqliDBConnect->connect_errno)
die(sprintf("[%d] %s\n", $mysqliDBConnect->connect_errno, $mysqliDBConnect->connect_errno));
 
// change character set to utf8
if (!mysqli_set_charset($mysqliDBConnect, "utf8")) {
printf("Error loading character set utf8: %s\n", mysqli_error($mysqliDBConnect));
} else {
echo "";
//printf("Current character set: %s\n", mysqli_character_set_name($DBlink));
}
 
 
// check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 
$query = "SELECT * FROM customer";
echo $query;
 
//$result = mysqli_query($mysqliDBConnect, $query);
 $result = $mysqliDBConnect->query($query);
// associative array (not numerical)

$row = $result->fetch_array(MYSQLI_ASSOC);
echo "ok:";
printf ("%s (%s)\n", $row["CustFN"], $row["CustLN"]);
echo "ok2:";

echo "<br><br><br><br>";


while($row = $result->fetch_array(MYSQLI_ASSOC))
{
//printf ("%s (%s)\n", $row["CustFN"], $row["CustLN"]);
echo $row["CustNo"]." ";
echo $row["CustFN"]." ";
echo $row["CustLN"]."<br>";
}
 
$result->free();
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
// PREFERRED WAY: mysqli_fetch_assoc
 
if ($resultC = mysqli_query($DBlink, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";
 
while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["CustFN"]."</th>";//CustFN is case senSitiVe
echo "<th>".$row["CustLN"]."</th>";//CustLN is case senSitiVe
echo "</tr>\n";
 
}
mysqli_free_result($resultC);
}
 
//mysqli_close($DBlink);
echo "</table>";
 
?>
//$yo="";
?>