<?php
	$page_title = "Select a customer";
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

?>	<html>
<head>
<title></title>
	<script type="text/javascript">
//Javascript for Validation of user inputs

</script>
</head>
<form name="Pro" action="viewExpmyeditbasicCat.php" method="post">
<?php
//include 'view_transLatest.php';

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

$query = "select * from expenses ORDER BY Category";
$query = "select DISTINCT Category, ExpNo, ExpDesc from expenses";
$query = "select DISTINCT Category  from expenses order by Category";
echo $query;
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();

?>
<b><font size = "4" type="arial">Select A Category </b></font>

</br>
</br>


<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php



if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["Category"];
//$item2 =  $row["ExpNo"];
//$item3 = $row["ExpDesc"];
print "<option value='$item1'>$item1"; //all customers
//print "_".$item2;
//print "_".$item3;

print " </option>";

	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option><br>";

//echo $item2;
?>

<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />
</select></p>
<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />


<b>
</form>

<br />






















<form name="Pro" action="viewExpmyeditbasicCatH.php" method="post">
<?php
//include 'view_transLatest.php';

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

$query = "select * from expensesH ORDER BY Category";
$query = "select DISTINCT Category, ExpNo, ExpDesc from expensesH";
$query = "select DISTINCT Category  from expensesH order by Category";
echo $query;
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();

?>
<b><font size = "4" type="arial">Select A Category </b></font>

</br>
</br>


<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php



if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["Category"];
//$item2 =  $row["ExpNo"];
//$item3 = $row["ExpDesc"];
print "<option value='$item1'>$item1"; //all customers
//print "_".$item2;
//print "_".$item3;

print " </option>";

	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option><br>";

//echo $item2;
?>

<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />
</select></p>
<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />


<b>
</form>

<br />





<form name="Pro" action="viewExpmyeditbasicCatE.php" method="post">
<?php
//include 'view_transLatest.php';

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

$query = "select * from expensesE ORDER BY Category";
$query = "select DISTINCT Category, ExpNo, ExpDesc from expensesE";
$query = "select DISTINCT Category  from expensesE order by Category";
echo $query;
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();

?>
<b><font size = "4" type="arial">Select A Category </b></font>

</br>
</br>


<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php



if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["Category"];
//$item2 =  $row["ExpNo"];
//$item3 = $row["ExpDesc"];
print "<option value='$item1'>$item1"; //all customers
//print "_".$item2;
//print "_".$item3;

print " </option>";

	}
$result->free();
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option><br>";

//echo $item2;
?>

<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />
</select></p>
<input type="submit" name="btn_submit" value="Select the Category" style="width:300px;height:30px" />


<b>
</form>

<br />




<a href="view_cust_all3.php" >view_cust_all3.php</a></b><br />
<a href="view_inv_all.php" >view_inv_all.php</a></b><br />




</body>

</html>
