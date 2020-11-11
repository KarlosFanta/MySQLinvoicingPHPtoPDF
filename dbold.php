
<?php
//This is the database connection to the old mysql database:

/*$conn = mysql_connect('localhost','root','123456');
if (!$conn) {
	die('Could not connect to MySQL: ' . mysql_error());
}
echo 'Connection OK changed DB from kc to online_stores';
mysql_select_db("online_stores");
if (!mysql_select_db("online_stores")) {
    echo "Unable toselect mydbname: " . mysql_error();
    exit;
}
*/

echo "dbold.php";

$conn = mysql_connect("localhost", "root", "Itsmeagain007#");
//$conn = "DISABLED";

//$link = @mysqli_connect('localhost', 'root', 'oijn#', 'ohio');
//If your MySQL port is different from default one (3308), you need to give the port number as the fifth parameter.
//$link = mysqli_connect('localhost', 'robin', 'robin123', 'company_db', '3800');

/*if (mysqli_connect_error()) {
	$logMessage = 'MySQL Error: ' . mysqli_connect_error();
	// Call your logger here.
	die('Could not connect to the database');
}

// Rest of the code goes here


*/
if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("kc")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}




//mysqli_close($link);

?>
<body>
</html>
