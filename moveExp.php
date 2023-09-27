
<?php


	$page_title = "Select a transaction";
	require_once('header.php');	
//	require_once('db.php');	
	
	require_once('inc_OnlineStoreDB.php');	
	

$query = "select distinct SupCode from expenses";

?>
<br><br>
<a href = editExpQ.php>editExpQ.php</a>
<br><br>
<br><br>
<a href = 'viewExpHEandExpCust.php'>viewExpHEandExpCust</a> all expenses of Customer</br>
<br><br>
<br><br>
<b><font size = "4" type="arial">Move an expense from one table to another</b></font>
</br>
</br>

<form name="EditTrans" action="moveExp2.php" method="post">

<select name="dropdown" >
<option value='expenses'>expenses</option> 

<option value="_no_selection_">Select table where expense is currently</option>

<option value='expenses'>expenses</option> 
<option value='expensesH'>expensesH</option> 
<option value='expensesE'>expensese</option>


</select></p>  
<input type="submit" name="btn_submit" value="Select old table" /> 
	


















<?php
/*
echo "<br>2ndWhile:<br><br>";
echo "<br>";
while($row=mysql_fetch_assoc($result))
{
echo '<option value = "'.$row['TransNo'].'">'.$row['TransFN'].'</option>';
}

*/


//$num=mysql_numrows($result);
//mysql_close();
//$i=0;
/*while($i<$num) {
$zone=mysql_result($result,$i,"zone");
$spot_name=mysql_result($result,$i,"spot_name");

echo "<option value="$spot_name">$spot_name</option>";

$i++;
*/
//

//echo "<br>3rdWhile:<br><br>";

/*
while($row = mysql_fetch_array($result)){
	echo "The max no TransNo in transaction table is:  ". $row[0];
	echo "&nbps;";
//$daNextNo = intval($row[0])+1;
}
*/
?>

<?php
/*echo "<br>4thWhile:<br><br>";
while ($row = mysql_fetch_array($result))  
{  
//$var_term;
 foreach($row as $item)
   {
      print "<option value='$item'>$item";
  print " </option>"; 
 }
}
*/
?>
