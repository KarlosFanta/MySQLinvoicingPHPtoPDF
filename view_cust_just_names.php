<?php


	//require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
require_once 'header.php';
		require_once 'inc_OnlineStoreDB.php';

?>
<?php //require_once 'header.php'; ?>
<b><font size = "4" type="arial">View Customers</b></font>
</br>
</br>


<?php

//$query = "select * from customer order by CustNo";
//echo $query."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $result.
$SQLstring = "select * from customer order by CustLN";
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";

echo "<th>Important</th>";
echo "</tr>\n";

   while ($row = $result->fetch_row()) {
   //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
echo "<th>{$row[2]}</th>";
echo "<th>{$row[12]}</th>\n";

echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

/*
$result = mysql_query($query);

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    printf(" %s.  %s _ ", $row[0], $row[1]);
}

mysql_free_result($result);
$result=mysql_query($query);
echo "<br><br>Resource result: ".$result; //the whole content of the table is now require_onced in a PHP array with the name $result.
$num=mysql_numrows($result);//counts the rows

mysql_close();

echo "<br><br>";

?>
<table border="1" cellspacing="2" cellpadding="2">
<tr>
<td>No</td>
<td>Name</td>
<td>Surname</td>
<td>Tel</td>
<td>Cell</td>
<td>Addr</td>
<td>Distance</td>
<td>LastLogin</td>
<td>CustPW</td>
</tr>
<?php
$i=0;
while ($i < $num) {
$f1 = mysql_result($result,$i,"CustNo");
$f2=mysql_result($result,$i,"CustFN");
$f3=mysql_result($result,$i,"CustLN");
$f4=mysql_result($result,$i,"CustTel");
$f5 = mysql_result($result,$i,"CustCell");
$f6 = mysql_result($result,$i,"CustEmail");
$f7 = mysql_result($result,$i,"CustAddr");
$f8 = mysql_result($result,$i,"Distance");
$f9 = mysql_result($result,$i,"LastLogin");
$f10 = mysql_result($result,$i,"CustPW");
?>
<tr>
<td>CustNo<?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
<td><?php echo $f6; ?></td>
<td><?php echo $f7; ?></td>
<td><?php echo $f8; ?></td>
<td><?php echo $f9; ?></td>
<td><?php echo $f10; ?></td>
</tr>
<?php
$i++;
}
echo "</table>";

echo "<br>2-dimensional table example<br>";
$myarray = array("key1"=>array(1,2,3,4),
                 "key2"=>array(2,3,"B",5),
                 "key3"=>array(3,4,5,6),
                 "key4"=>array("Z",5,6,"E")); //Having a key or not doesn't break it

echo "<table>";
foreach($myarray as $key => $element){
    echo "<tr>";
    foreach($element as $subkey => $subelement){
        echo "<td>$subelement</td>";
    }
    echo "</tr>";
}




?>
</table>


















<head>
<title>2D Array</title>
</head>
<body>
<h1>2D Array</h1>

<form action = multiArray.php>
<table border = 1>
<tr>
  <th>First city</th>
  <th>Second city</th>
<tr>

<!-- note each option value is a string -->

<tr>
  <td>
    <select name = "cityA">
      <option value = "Indianapolis">Indianapolis</option>
      <option value = "New York">New York</option>
      <option value = "Tokyo">Tokyo</option>
      <option value = "London">London</option>
     </select>
   </td>

  <td>
    <select name = "cityB">
      <option value = "Indianapolis">Indianapolis</option>
      <option value = "New York">New York</option>
      <option value = "Tokyo">Tokyo</option>
      <option value = "London">London</option>
     </select>
  </td>
</tr>

<tr>
  <td colspan = 2>
    <input type = "submit"
           value = "calculate distance">
  </td>
</tr>
</table>

</body>
</html>

The only difference between this HTML page and the last one is the value properties of the select objects. In this case, the distance array will be an associative array, so it will not have numeric indices. Since the indices can be text-based, I send the actual city name as the value for $cityA and $cityB.
Responding to the Query

The code for the associative response is interesting, because it spends a lot of effort to build the fancy associative array. Once the array is created, it's very easy to work with.

<?php
$i=0;
while ($i < $num) {

$cell1 = mysql_result($result,$i,"CustNo");
$cell2 = mysql_result($result,$i,"CustFN");
$cell3 = mysql_result($result,$i,"CustLN");
$cell4 = mysql_result($result,$i,"CustTel");
$cell5 = mysql_result($result,$i,"CustCell");
$cell5 = mysql_result($result,$i,"CustEmail");
$cell6 = mysql_result($result,$i,"CustAddr");
$cell7 = mysql_result($result,$i,"Distance");
$cell8 = mysql_result($result,$i,"LastLogin");
$cell9 = mysql_result($result,$i,"CustPW");

echo "<b>$cell1
$cell2</b><br>$cell3<br>$cell4<br>$cell5<hr><br>";

$i++;
}

?>


<h1>Distance Calculator</h1>

<?
//create arrays
$indy = array (
  "Indianapolis" => 0,
  "New York" => 648,
  "Tokyo" => 6476,
  "London" => 4000
  );
$ny = array (
  "Indianapolis" =>648,
  "New York" => 0,
  "Tokyo" => 6760,
  "London" => 3470
  );
$tokyo = array (
  "Indianapolis" => 6476,
  "New York" => 6760,
  "Tokyo" => 0,
  "London" => 5956
  );
$london = array (
  "Indianapolis" => 4000,
  "New York" => 3470,
  "Tokyo" => 5956,
  "London" => 0
  );

//set up master array
$distance = array (
  "Indianapolis" => $indy,
  "New York" => $ny,
  "Tokyo" => $tokyo,
  "London" => $london
  );

$result = $distance[$cityA][$cityB];
print "<h3>The distance between $cityA and $cityB is $result miles.</h3>";

?>

</body>
</html>

Building the Two-Dimensional Associative Array

The basic approach to building a two-dimensional array is the same whether it's a normal array or uses associative indexing. Essentially, you create each row as an array, and then build an array of the existing arrays. In the traditional array, the indices were automatically created. The development of an associative array is a little more complex, because you need to specify the key for each value. As an example, look at the code used to generate the $indy array:

$indy = array (
  "Indianapolis" => 0,
  "New York" => 648,
  "Tokyo" => 6476,
  "London" => 4000
  );

Inside the array, I used city names as indices. The value for each index refers to the distance from the current city (Indianapolis) to the particular destination. The distance from Indianapolis to Indianapolis is zero, and the distance from Indy to New York is 648, and so on.

I created an associative array for each city, and then put those associative arrays together in a kind of mega-associative array:

//set up master array
$distance = array (
  "Indianapolis" => $indy,
  "New York" => $ny,
  "Tokyo" => $tokyo,
  "London" => $london
  );

<?php
require_once 'footer.php';
	*/
?>
