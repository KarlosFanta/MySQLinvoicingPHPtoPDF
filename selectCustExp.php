<html>
<head>
<title>Add expense</title>
</head>
<?php
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
?>	

<a href="viewExpall.php">viewExpall.php</a>
<?php
	require_once("inc_OnlineStoreDB.php");
?>

<?php
	//PROCEDURAL
	//$link = @mysqli_connect('localhost', 'root', 'Itsmeagain007#', 'kc');

$query = "select CustNo, CustFN, CustLN from customer ORDER BY custLN";
//echo $query;
/*$result = mysql_query($query) or die(mysql_error());

if (!$result) {
    echo "Could not successfully run query ($query) from DB: " . mysql_error();
    exit;
}
//echo "<br>result:<br>".$result."<br><br>";
echo "<br><br>";
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
*/
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus


@session_start();
	@$CNN = @$_SESSION['CustNo'];
//	echo @$CNN;
//echo "QS:".$queryS."<br>";

/*
if ($result = mysqli_query($DBConnect, $queryS)) {

   
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["CustNo"], $row["CustLN"]);
    }

     mysqli_free_result($result);
}
*/

/*
if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];



	}
mysqli_free_result($result2);
	}

*/

?>
<b><font size = "3" type="arial">For who is the expense:</b></font>

</br>
</br>

<form name="Editcust" action="addExp.php" method="post">
<!--<input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>
-->
<!--<select name="mydropdownEC"   onmouseover="window.open (this.href, 'child')>-->
<!--<select name="mydropdownEC"  onChange="alert('I\'m glad YOU can make choices!')" >-->
<!--<select name="mydropdownEC"  onload="this.size=10;">-->
<!--<select size="4" name="MySelect" multiple="multiple">
    <option>hello</option>
    <option>aoeu</option>
    <option>ieao</option>
    <option>.yao</option>
</select>
<script type="text/javascript">
    $(function(){
        $("option").bind("dblclick", function(){
            alert($(this).text());
        });
    });
</script>
<!--<select name="mydropdownEC"  onMouseOver="this.size=10;" length= "5">-->
<!--<select name="mydropdownEC"  onMouseOver="this.size=10;" ondblclick='this.form.submit()'>-->
<!--<select name="mydropdownEC" onMouseOut="this.size=1;" onMouseOver="this.size=20;">-->
<!--<select name="mydropdownEC" onchange='this.form.submit()'>-->
<!--<option value="_no_selection_">Select Customer</option>";-->



<!--<select name="mydropdownEC"  onMouseOver="this.size=70;" onclick='this.form.submit()'>-->
<select name="mydropdownEC"  onchange='this.form.submit()'>

<?php
	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";

$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";

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
//echo "kjbjkbkjb";
print "_".$item3b;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 
	}
mysqli_free_result($result2);
	}
}
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
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

print " </option><br>"; 

//echo $item3b;
?>

<input type="submit" name="btn_submit" value="Select the customer" style="width:200px;height:30px" /> 

</select></p>  
<input type="submit" name="btn_submit" value="Select the customer" style="width:400px;height:30px" /> 

<b>
</form>


<br><br>
        <!--<form  action="selectCustAddStk.php" method="post">-->
        <form  action="addExp.php" method="post">
		<input type = 'hidden' name="mydropdownEC" value = '300;9'>
            <input type="submit" name="btnSubmit" value="Add Stock incl CYB COZA domains & Antivirus & insurance" style="width:400px"  /><br>
			</form>
        <form  action="selectCustAssignStk.php" method="post">
            <input type="submit" name="btnSubmit" value="Assign Stock to a Customer" style="width:400px"  /><br>
        </form>
       <form  action="selectInvAssignStk.php" method="post">
            <input type="submit" name="btnSubmit" value="Assign Stock to a sent invoice " style="width:400px"  /><br>
        </form>
        <form  action="addExpH.php" method="post">
            <input type="submit" name="btnSubmit" 
			value="Add Other ExpensesH (NOT Cyb ANYMORE! SARSpayments
			Home Eskom Tel BankFees CellC Food   donation Private)" style="width:400px;height:100px;white-space: normal"  /><br>
			
			<!--strange to do word-wrap by just putting in "enter"-->
			
        </form>
<a href = "addExpH.php?SupCode=Ch&Category=food">Checkers</a>
<a href = "addExpEtype.php?item=ULPpetrol 10.07L @14.38&InVAT=100&Category=petrol&SupCode=CT">petrol</a>
       <form  action="addExpE.php" method="post">
            <input type="submit" name="btnSubmit" 
			value="Add Other ExpensesE (Accountant, petrol, CarRepairs, CarParts, Medical, Licence)" style="width:400px;height:100px;white-space: normal"  /><br>
			
			<!--strange to do word-wrap by just putting in "enter"-->
			
        </form>
		
		
		
		
        <form  action="addProf.php" method="post">
            <input type="submit" name="btnSubmit" value="Add Other Profits eg Bank Interest" style="width:400px"  /><br>
        </form>
        <form  action="chkExpCost.php" method="post">
            Check if expense already added with the amount of:<input type="text" name="in"   style="width: 74px" />
             <input type="submit" name="BB" value="Check " style="width:70px"  />
            <input type="submit" name="HH" value="Check H" style="width:70px"  />
           <input type="submit" name="EE" value="Check E" style="width:70px"  /><br>
        </form>


<?php
//include "viewExpLatest.php";
include "viewExpHEandExpLatest.php";

include "view_proofLatest.php";
include "view_invLatest.php";
mysqli_close($DBConnect);
?>

</body>

</html> 