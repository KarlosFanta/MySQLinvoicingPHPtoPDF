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
    <title>Invoices of customer(s)</title>
 	<script type="text/javascript">
	
function formValidator(){
	var state = document.getElementById('mydropdownEC');
	if(madeSelection(state, "Please Choose a state")){
		
		return true;
		}
	return false;
}

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}


function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){ //it must say Please Choose in the dropbox otherwise it wont work
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}


</script>
  </head> 
<?php //require_once "header.php"; ?>
<b><font size = "4" type="arial">View Invoices</b></font>
</br>
<form name="selField" onsubmit="return formValidator()" action="selectVCinv.php" method="post">

<?php
$CustNo = '1';
//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";
if(isset($_GET["CustNo"])) echo "GET CustNo:".$CustNo."<br>";
	if (!empty($_POST["CustNo"])) {
    echo "Yes, CustNo is set";    
}else{  
    echo "No, CustNo is not set";
	@session_start();
	$CustNo = @$_SESSION['CustNo'];
echo $_SESSION['CustNo'];

	
}

$queryS = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CustNo";

$query = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY custLN";
?>
<b><font size = "4" type="arial">invoices</b></font></font>

</br>
</br>

<br><br>CustNo: 

<select id='mydropdownEC' name="mydropdownEC"  >
<option>Please Choose</option>
<option value='all'>Show selected details of all customers</option>
<?php
//dropdownbox:	

	if (@$_SESSION['CustNo'] != "")  //works if session was destroyed
{
//echo "<input type=text value='".$_SESSION['CustNo']."'>";
echo "<option value='$CustNo'>$CustNo</option>";
}

?>
</select>
	<br>n<br>





<?php



$query="SELECT * from invoice where CustNo = $CustNo";
$Cnt = 0;
if ($result=mysqli_query($DBConnect,$query))
  {
  // Get field information for all fields
  while ($fieldinfo=mysqli_fetch_field($result))
    {
	$TableName = $fieldinfo->name;
	echo "<input type='checkbox' name='formDoor[]' value='$TableName'  ";
	
	//echo "<br>input type = checkbox name= formDoor[] value='$TableName' ";
	  if ($TableName == 'InvNo')
	echo "checked";
   if ($TableName == 'InvDate')
	echo "checked";
   if ($TableName == 'Summary')
	echo "checked";
   if ($TableName == 'TotAmt')
	echo "checked";
   if ($TableName == 'SDR')
	echo "checked";
   if ($TableName == 'Draft')
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





	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "All invoices all customers";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
			

?> 
<?php //require_once "header.php"; ?>
<b><br><font size = "4" type="arial">View Invoices</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;view_inv.php
<a href= view_inv2.php>view_inv2.php</a>
<a href= view_invonlydetails.php>view_invonlydetails.php</a>
</br>



<?php

/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";
echo "<br><br>Exclude ADSL invoices:<br><br>";











$SQLstring = "select * from invoice where CustNo = $CustNo and  Summary not like '%adsl' order by InvDate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";

?>



</body>
</html>

