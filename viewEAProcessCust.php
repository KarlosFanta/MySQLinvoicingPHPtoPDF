<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
	require_once("header.php");
			
$yr = '';
$yr = $_GET['yr'];
     echo "yr ". $_GET['yr']. ".";
	 
$CustNo = '';
$CustNo = $_GET['CustNo'];
     echo "CustNo ". $_GET['CustNo']. ".";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Assigned Expenses</title>
    <link href="dalogin/assets/css/bootstrap.css" rel="stylesheet">
  </head> 
<?php //require_once "header.php"; ?>
<b><font size = "4" type="arial">These expenses have been invoiced</b></font>
</br></br>
or select a year:<br>
<form name="Editcust" action="viewEAProcessCust.php?" >
 <input type="text" name="yr" value ='<?php echo $yr; ?>'> 
 <input type="text" name="CustNo" value ='<?php echo @$CustNo; ?>'> 
<br>
<select  name="yr" onchange='this.form.submit()'>
<option value="%">Select A Year</option>";
<option value='2019'>2019</option> 
<option value='2018'>2018</option> 
<option value='2017'>2017</option> 
<option value='2016'>2016</option>
<option value='2015'>2015</option>
<option value='2014'>2014</option>
<option value='2013'>2013</option>
<option value='2012'>2012</option> 
<option value="BETWEEN '2015-01-01' AND '2017-12-31'">BETWEEN 2015 AND 2017</option>
<option value="BETWEEN '2017-01-01' AND '2018-12-31'">BETWEEN 2017 AND 2018</option>
<option value="BETWEEN '2016-01-01' AND '2018-12-31'">BETWEEN 2016 AND 2018</option>
<option value="BETWEEN '2015-01-01' AND '2018-12-31'">BETWEEN 2015 AND 2018</option>
<option value="BETWEEN '2014-01-01' AND '2016-12-31'">BETWEEN 2014 AND 2016</option>
<option value="BETWEEN '2005-01-01' AND '2013-12-31'">BETWEEN 2005 AND 2013</option>
<option value="BETWEEN '2016-01-01' AND '2016-01-31'">2016 JANUARY  not working</option>
<option value=" BETWEEN 2016-01-01 AND 2016-01-31 ">2016 JANUARY  not working</option>


</select>
<input type="submit" name="btn_submit" value="select year" /> 
</form>  

<br>

<form name="selField" action="selectVC.php" method="post">
  <!--  <input type="submit" name="formSubmit" value="Submit" /><br>-->
	

<?php

$SQLstring = "select * from customer where CustNo = $CustNo";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$queryC = "select * from customer where CustNo = $CustNo";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
$CustNo = $row["CustNo"];
//echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
//echo "<th><a href='editCust.php?mydropdownEC={$CustNo}'  target='_blank'>{$CustNo}</a></th>";
echo "<th><a href='assignStkInv.php?CustNo={$CustNo}'  target='_blank'>{$CustNo}</a></th>";//Cno
echo "<th><a href='viewEAProcessCust.php?CustNo={$CustNo}&yr={$yr}'  target='_blank'>{$CustNo}</a></th>";//Cno
//"<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";

echo "<th>".chunk_split($row["CustFN"], 15, "\n\r")."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";

echo "<th>".chunk_split($row["CustLN"], 15, "\n\r")."";
$row_cnt = mysqli_num_rows($resultC);
//echo " rows: $row_cnt</th>";
echo "</tr>\n";


/*echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
*/



$queryA = "select * from expenses where InvNo!='' and CustNo = $CustNo and PurchDate LIKE '$yr%'";

if ((substr($yr, 0, 7)) == 'BETWEEN')
$queryA = "select * from expenses where InvNo='' and CustNo = $CustNo and PurchDate $yr";

//$queryA = "select * from expenses where  PurchDate $yr";

//$queryA = "select * from expenses where PurchDate BETWEEN '2015-01-01' AND '2016-12-31' ORDER BY ExpNo ASC";

//echo $queryA; echo "<br>";
if ($resultA = mysqli_query($DBConnect, $queryA)) {
//echo "<th>ExpNo</th>";
//echo "<th>ExpDesc</th>";
//echo "<th>ProdExVAT</th>";
//echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultA)) {
echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>".$row["ExpNo"]."</th>";
echo "<th>".$row["ExpDesc"]."<a href = '{$row["ExpNo"]}?='{$row["ExpNo"]}'></a></th>";
echo "<th>".$row["PurchDate"]."";
echo "<th>".$row["ProdCostExVAT"]."";
$row_cnt = mysqli_num_rows($resultA);
//echo " rows: $row_cnt</th>";
//echo "</tr>\n";









echo "</tr>\n";

}
mysqli_free_result($resultA);
}




}
mysqli_free_result($resultC);
}


echo "</table>";


?>







</body>
</html>
