<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
			

?> 
<style type="text/css">
    table.form{width:100%}
    td.label{width:7px;white-space:nowrap;}
    td input{width:100%;}
</style>

<table border = 1 class="form">
    <tr>
        <td class="label">My label:</td>
        <td>yello</td>
    </tr>
</table>
<?php //require_once "header.php"; ?>
<b><br><font size = "4" type="arial">View Transactions</b></font>view_trans.php
</br>



<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
$SQLstring = "select * from transaction order by TransDate ";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {
echo "<table  class='form' width='100%' border='0'>\n";
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate&nbsp;</th>";
echo "<th></th>";
echo "<th align = left>&nbsp; </th>";
echo "<th>TotAmt</th>";
echo "<th align = left class='label'></th>\n";//Notes
echo "<th>TM</th>\n";
echo "<th>InvA</th>\n";
echo "<th>InvA_Amt</th>\n";
echo "<th>Notes</th>\n";
echo "<th>Notes</th>\n";
echo "<th>Notes</th>\n";
echo "</tr>\n";


    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);


	  $x = $row[0];
	  


	  echo "<tr><th>";
	  
 echo $x;






	  echo "</th>";
//echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select CustFN, CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);



$D1 = explode("-", $row[2]);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$EDate = $D1[2]."/".$D1[1]."/".$D1[0];
$DDD =  $D1[2];
$arr2 = str_split($DDD, 1);
//echo $EDate;	 

echo "<th>";
if ($EDate == "03/01/2012")
echo "<font size = 5 color = orange><b>";

$arr2 = str_split($DDD, 1);
if ($arr2[1]== '2')
{
//echo($arr2[1]);
echo "<font  color = green><b>";
}

if ($arr2[1]== '4')
echo "<font  color = purple><b>";

if ($arr2[1]== '6')
echo "<font  color = blue><b>";

if ($arr2[1]== '8')
echo "<font  color = orange><b>";

if ($arr2[1]== '0')
echo "<font  color = brown><b>";



echo "{$EDate}</b></th>";//TransDate 




   while ($row2 = $result2->fetch_row()) {

  $unshortenedLN = $row2[0];

   $shortened = substr($row2[0], 0, 7);
   
      $unshortenedFN = $row2[1];
   
      $shortenedFN = substr($row2[1], 0, 6);
   

  // echo "<th>{$row2[0]}</th>";//CustLN
   echo "<th align = left>{$shortenedFN}{$shortened}</th>";//CustLN



}
   $shortenedSDR = substr($row[23], 0, 7);

echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";//SDR
echo "<th align = right>{$row[3]}</th>";//TotAmt

   $shortenedNotes = substr($row[4], 0, 18);



echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes
echo "<th>{$row[6]}</th>\n";
//echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";
//echo "<th>{$row[9]}</th>\n";
echo "<th>{$row[10]}</th>\n";
//echo "<th>{$row[11]}</th>\n";
echo "<th>{$row[12]}</th>\n";
//echo "<th>{$row[13]}</th>\n";
echo "<th>{$row[14]}</th>\n";
echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[16]}</th>\n";
echo "<th>{$row[17]}</th>\n";
echo "<th>{$row[19]}</th>\n";
echo "<th>{$unshortenedLN} {$unshortenedFN}</th>\n";



echo "</tr>\n";
echo "<tr><th></th></tr>";
echo "<tr><th></th></tr>";
echo "<tr><th></th></tr>";
echo "<tr><th></th></tr>";
echo "<tr><th></th></tr></font>";
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
/*echo "<br><br><br/><br><br><br><br/><br><br><br><br/><br><br><br><br/><br>2-dimensional table example<br>";
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
echo "</table>";
*/



?>

</body>
</html>





<?php
//	require_once('footer.php');		
?>
