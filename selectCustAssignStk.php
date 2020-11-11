<?php
	$page_title = "Select a customer";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
	<script type="text/javascript">
//Javascript for Validation of user inputs

</script>
</head>
<form name="Pro" action="assignStk.php" method="post">
<?php
include 'view_transLatest.php';

/*
if (isset($_POST['btnSubmit'][0])) {
    switch (strtolower($_POST['btnSubmit'][0])) {
        case 'save':
            echo '<h1>Save button was clicked</h1>';
            break;
        case 'delete':
            echo '<h1>Delete button was clicked</h1>';
    }
    die();
}
*/

//$btnSubmit = $_POST['btnSubmit'];
$Prof = $_POST['btnSubmit'];

echo "You selected: " .$Prof."</BR>";
echo " <input type='text' size = 4  name='Prof'  id='Prof' value = '$Prof'>";

$query = "select CustNo, CustFN, CustLN from customer ORDER BY custLN";
//echo $query;
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();
	$CNN = @$_SESSION['CustNo'];
$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";
//echo $queryS."<br>";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];

	}
$result2->free();
	}



?>
<b><font size = "4" type="arial">Select A Customer for: <?php echo $Prof; ?></b></font><font color = dark yellow> selectCust.php</font>

</br>
</br>


<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option value='";
echo $item1b;
echo "'>";
echo $item2b;

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
print "_".$item3b;

print " </option>";
	}
$result2->free();
	}
}
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".$item3;

print " </option>";

	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option><br>";

echo $item3b;
?>

<input type="submit" name="btn_submit" value="Select the customer" style="width:300px;height:30px" />
</select></p>
<input type="submit" name="btn_submit" value="Select the customer" style="width:300px;height:30px" />


<b>
</form>


<a href="view_cust_all3.php" >view_cust_all3.php</a></b><br />
<a href="view_inv_all.php" >view_inv_all.php</a></b><br />




</body>

</html>
