<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
	require_once("header.php");
			

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Customers</title>
    <link href="dalogin/assets/css/bootstrap.css" rel="stylesheet">
  </head> 
<?php //require_once "header.php"; ?>
<b><font size = "4" type="arial">View Customers</b></font>
</br>
<?php
?>
<b><font size = "4" type="arial">Select A Customer into the session</b></font><font color = dark yellow> view_customers2.php</font>

</br>
</br>

<form name="selField" action="selectVC.php" method="post">
    <input type="submit" name="formSubmit" value="Submit" /><br>
	
	<select name="mydropdownEC">
	<option value='all'>all</option>
<?php

/*	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";
*/


$query = "select CustNo, CustFN, CustLN from customer ORDER BY custNo";


if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item1"; //all customers
print "_".$item2;
print "_".$item3;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option>"; 
echo @$item3b;
?>

<br><br>
<input type="submit" name="btn_submit" value="Select the customer" /> 
	
</select></p>  





<?php



$query="SELECT * from customer";
$Cnt = 0;
if ($result=mysqli_query($DBConnect,$query))
  {
  // Get field information for all fields
  while ($fieldinfo=mysqli_fetch_field($result))
    {
	$TableName = $fieldinfo->name;
	echo "<input type='checkbox' name='formDoor[]' value='$TableName' ";
	
	//echo "<br>input type = checkbox name= formDoor[] value='$TableName' ";
	
    if ($TableName == 'CustNo')
	echo "checked";
   if ($TableName == 'CustFN')
	echo "checked";
   if ($TableName == 'CustLN')
	echo "checked";
   if ($TableName == 'CustEmail')
	echo "checked";
   if ($TableName == 'CustDetails')
	echo "checked";
   if ($TableName == 'Important')
	echo "checked";
 
	
	echo " />";	
	echo $TableName;
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if ($Cnt == 6)
	{
	echo "<br>";
	$Cnt = 0;
	}
	$Cnt++;
	
    //printf("Table: %s\n",$fieldinfo->table);
    //printf("max. Len: %d\n",$fieldinfo->max_length);
    }
  // Free result set
  mysqli_free_result($result);
}
?>
<input type="submit" name="btn_submit" value="Select the table columns to view" /> 
</form>




































<?php

$SQLstring = "select * from customer order by CustLN";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='100%' border='1'>\n";
echo "<tr>";
echo "<th>CustLN Surname</th>";
echo "<th>CustFn</th>";
echo "<th>CustNo</th>";
echo "<th>CustTel</th>";
echo "<th>CustCell</th>";
echo "<th>CustEmail</th>";
echo "<th>CustAddr</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>CustPW</th>";
echo "</tr>\n";


    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr>";
echo "<th>{$row[2]}</th>";//surn
echo "<th><a href='editCust.php?mydropdownEC={$row[0]}'>{$row[0]}</a></th>";//Cno
echo "<th>{$row[1]}</th>";//FN
echo "<th>{$row[3]}</th>";//Tel
echo "<th>{$row[4]}</th>";
echo "<th>{$row[5]}</th>";
echo "<th>{$row[6]}</th>";
echo "<th>{$row[7]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[9]}</th>";
echo "</tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
    /* free result set */
    $result->close();
	
}
echo "</table>";



/*$result=mysql_query($query);
//echo "<br><br>result: ".$result; //the whole content of the table is now require_onced in a PHP array with the name $result.
$num=mysql_numrows($result);//counts the rows

mysql_close();

/*echo "<br><br>";

$i=0;
while ($i < $num) {

$cell1 = mysql_result($result,$i,"productID");
$cell2 = mysql_result($result,$i,"orderID");
$cell3 = mysql_result($result,$i,"quantity");

echo "<b>$cell1
$cell2</b><br>$cell3<br><hr><br>";

$i++;
}
*/

?>
<!--<br><br>
<table border="1" cellspacing="2" cellpadding="2">
<tr>
<td>Order No</td>
<td>ODate</td>
<td>CustNo</td>
</tr>
-->
<?php
/*$i=0;
while ($i < $num) {



$f1 = mysql_result($result,$i,"OrderNo");
$f2=mysql_result($result,$i,"ODate");
$f3=mysql_result($result,$i,"CustNo");
?>

<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
</tr>

<?php
$i++;
}









/*
echo "num: ".$num;

echo "<table><tr>";
$i = 0;
while($row = mysql_fetch_array($result)) {
  echo "<td>".$row['CustNo']."</td>";
  if (++$i % 5 == 0) {
    echo "</tr><tr>";
  }
}
echo "</tr></table>"
*/




/*$stid = oci_parse($c, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';
*/
 
?>
</table>
















<?php
//echo "<br><br><br/><br><br><br><br/><br><br><br><br/><br><br><br><br/><br>2-dimensional table example<br>";
/*$myarray = array("key1"=>array(1,2,3,4),
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
echo "</table>";


*/

?>

</body>
</html>





<?php
//	require_once('footer.php');		
?>