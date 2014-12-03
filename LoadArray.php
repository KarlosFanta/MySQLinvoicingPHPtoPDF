<?php
include ('inc_OnlineStoreDB.php'); //require_once won't work if we call this file again.
//$DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

$query = "SELECT * FROM myusernames ORDER by id ASC";

echo"<form name='Addcust'  action='UpdateTable.php' method='post'>";
echo "<table>";
echo "<tr>";
		  echo "<th>Old surname in table: </th> ";
		  echo "<th>Input new surname: </th> ";
echo "</tr>";
if ($result = mysqli_query($DBConnect, $query)) {
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
	   //   printf ("%s (%s)\n", $row["id"], $row["first"], $row["last"]);
		  $id = $row["id"];
echo "<tr>";
//this works only if all ids are unique.
echo "<th>old".$id.": ";
echo "<input type='text' name='old".$id."'   value = '{$row["last"]}'></th> ";
echo "<th>new".$id.": <input type='text' name= 'in_new".$id."' ></th> ";
echo "</tr>";
    }
   mysqli_free_result($result);
}
echo "</table>";
echo "<input type='submit' value='Update Now'/>";
mysqli_close($DBConnect);
?></form>
