

<?php	
//	require_once("inc_OnlineStoreDB.php");//page567
	//require_once('header.php');
 require_once("inc_OnlineStoreDB.php");

$table = $_POST['mydropdownEC'];
echo "<br>table:".$table."</br />";


$con=mysqli_connect("localhost","root","Itsmeagain007#","kc");
// Check connection

$sql="SELECT * FROM ".$table;

if ($result=mysqli_query($con,$sql))
  {
  // Get field information for all fields
  while ($fieldinfo=mysqli_fetch_field($result))
    {
    printf("Name: %s\n",$fieldinfo->name);
    //printf("Table: %s\n",$fieldinfo->table);
    //printf("max. Len: %d\n",$fieldinfo->max_length);
	echo "<br>";
    }
  // Free result set
  mysqli_free_result($result);
}

echo "<br><br>ooooo<br><br>";









$DBConnect = mysqli_connect("localhost", "root", "Itsmeagain007#", "kc");

  $query = "SELECT * from $table";
echo "<table>";
if ($result = $DBConnect->query($query)) {

    /* fetch object array */
    while ($row = $result->fetch_row()) {
//        echo $row[0], $row[1], $row[2], $row[4], $row[5];
//			echo "<br>";
			
			
echo "<th>".$row[0]."</th>";
echo "<th>".$row[1]."</th>";
echo "<th>".$row[2]."</th>";
echo "<th>".$row[3]."</th>";
echo "<th>".$row[4]."</th>";
echo "<th>".$row[5]."</th>";
echo "<th>".$row[6]."</th>";
echo "<th>".$row[7]."</th>";
echo "<th>".$row[8]."</th>";
echo "<th>".$row[9]."</th>";

echo "</tr>";

			
			
    }

    /* free result set */
    $result->close();
}
echo "</table>";
    $DBConnect->close();
	
	
	
	
	
	/*
$mysqli = new mysqli('localhost', 'root', 'Itsmeagain007#', 'kc');

$sql = "SHOW COLUMNS FROM ".$table;
echo $sql;
$res = $mysqli->query($sql);

while($row = $res->fetch_assoc()){
    $columns[] = $row['Field'];
}



 $first = true;

while($get_info = mysql_fetch_assoc($orderdetails)) {
    echo '<tr>';

    if($first) {
        $first = false;

        foreach(array_keys($get_info) as $columnName) {
            echo '<th>' . $columnName . '</th>';
        }

        echo '</tr><tr>';
    }

    foreach($get_info as $field) {
        echo '<td>' . $field . '</td>';
    }

    echo '</tr>';
}

*/
        // open the connection to the database - $host, $user, $password, $database should already be set

       // $mysqli = new mysqli($host, $user, $password, $database);

	?>