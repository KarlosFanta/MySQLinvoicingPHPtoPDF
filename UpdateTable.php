
<?php
require_once 'inc_OnlineStoreDB.php';
//require_once 'header.php';
echo "<br>";
echo "<table>";
$query = "SELECT * FROM myusernames ORDER by id ASC";
if ($result = mysqli_query($DBConnect, $query)) {
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
	   //   printf ("%s (%s)\n", $row["id"], $row["first"], $row["last"]);
		  $id = $row["id"];
echo "<tr>";
			$pold = 'old'.$id;
			echo "<th>pold: ".$pold."</th>";
			  $in_old = $_POST[$pold];
				  echo "<th>$in_old</th> ";

			$pl = 'in_new'.$id;
			echo "<th>pl: ".$pl."</th>";
		  	  $in_new = $_POST[$pl];
		  	  //$in_new = $_POST['$pl'];
		  echo "<th></th> ";

			  echo "<th>$in_new</th> ";
		  echo "<th></th> ";
		echo "<th>";
		if ($in_new != $in_old)
		{
	$updquery = "UPDATE myusernames SET last='$in_new' WHERE id = $id";
	echo $updquery ;
		 $DBConnect->query("$updquery");
//printf("Affected rows (UPDATE): %d\n", $DBConnect->affected_rows);
	echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
	echo "<br><br><font size = 3 color = red><b><b>update NOT successfull!!!</b></b></font><br><br>";
else
	echo "&nbsp;&nbsp;&nbsp;update success! <br>";
}
else
	echo "input output the same";
	echo "</th>";

echo "</tr>";
    }
    // free result set
   // mysqli_free_result($result);
}
echo "</table>";

// close connection
mysqli_close($DBConnect);

include 'LoadArray.php';

?>

