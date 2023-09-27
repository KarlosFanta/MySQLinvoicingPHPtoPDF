<?php
	require_once("inc_OnlineStoreDB.php");
			

//PROCEDURAL mysqli COUNT and mysqli_fetch_assoc
echo "<meta charset='UTF-8'>";
 

//$query = "SELECT ExpNo, Category FROM expenses ORDER by Category DESC LIMIT 50,5";
//$query = "SELECT COUNT(ExpNo) FROM expenses  where Category = 'laptop'";
$query = "SELECT ExpNo FROM expenses where Category = 'laptop'"; //the where clause is important

// also try $query = "SELECT ExpNo, Category FROM expenses"; //and see what happens
 
echo $query."<br>";
$myCounter = 0;
 
if ($resultC = mysqli_query($DBLINK, $query)) {
 
while ($row = mysqli_fetch_assoc($resultC)) {
 
$myCounter++;
//echo "myCounter: ".$myCounter;
 
//echo "<th>".$row["ExpNo"]."</th>";//ExpNo is case senSitiVe
//echo "<th>".$row["Category"]."</th>";//Category is case senSitiVe
echo "</tr>\n";
 
}
mysqli_free_result($resultC);
}
echo "Counted: ".$myCounter." expenses are laptops.";
 
?>