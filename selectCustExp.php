<?php


	$page_title = "Select a customer";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a customer</title>
	<script type="text/javascript">
//Javascript for Validation of user inputs

</script>
</head>

<a href="viewExpall.php">viewExpall.php</a>
<?php
	require_once 'inc_OnlineStoreDB.php';
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

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	@session_start();
	$CNN = @$_SESSION['CustNo'];
$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";
echo "QS:".$queryS."<br>";

if ($result = mysqli_query($DBConnect, $queryS)) {


    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["CustNo"], $row["CustLN"]);
    }

    /* free result set */
    mysqli_free_result($result);
}



if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {

$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
/*print $item2b;
 echo "____".$CNN;
 print "_".$item1b;
print "_".$item3b;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

	}
mysqli_free_result($result2);
	}



?>
<b><font size = "4" type="arial">Select A Customer into the session</b></font><font color = dark yellow> selectCust.php</font>

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

<input type="submit" name="btn_submit" value="Select the customer" style="width:400px;height:30px" />
<!--	<br><input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>
<br><br><br><br><br><br><br><br><br><br><br>
-->
</select></p>
<input type="submit" name="btn_submit" value="Select the customer" style="width:400px;height:30px" />



<?php
/*
echo "<br>2ndWhile:<br><br>";
echo "<br>";
while($row=mysql_fetch_assoc($result))
{
echo '<option value = "'.$row['CustNo'].'">'.$row['CustFN'].'</option>';
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
	echo "The max no CustNo in customer table is:  ". $row[0];
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
*/	//require_once 'view_cust.php';
//require_once 'view_cust_all3.php';
?><b>
</form>
<!--<a href="view_cust_all3.php" onmouseover="window.open (this.href, 'child')">view_cust_all3.php</a>-->


<!--<style type="text/css">

body {
font-family: arial, helvetica, serif;
}

#nav, #nav ul { /* all lists */
padding: 10;
margin: 0;
list-style: none;
line-height: 1;
}

#nav a {
display: block;
width: 15em;
}

#nav li { /* all list items */
float: left;
width: 15em; /* width needed or else Opera goes nuts */
}

#nav li ul { /* second-level lists */
position: absolute;
background: #B4AD91;
width: 15em;
left: -999em; /* using left instead of display to hide menus because display: none isn't read by screen readers */
}

#nav li:hover ul, #nav li.sfhover ul { /* lists nested under hovered list items */
left: auto;
font-family: "Segoe UI Light", "MS Sans Serif";
}

#content {
clear: left;
color: Black;
}

</style>

<script type="text/javascript"><!--//-->
<!--<![CDATA[//><!--

sfHover = function() {
var sfEls = document.getElementById("nav").getElementsByTagName("LI");
for (var i=0; i<sfEls.length; i++) {
sfEls[i].onmouseover=function() {
this.className+=" sfhover";
}
sfEls[i].onmouseout=function() {
this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
}
}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

//--><!]]></script>

<!--http://www.jqwidgets.com/jquery-widgets-demo/demos/jqxgrid/gridkeyvaluescolumnwitharray.htm?web
</head>

<body>-->
<!--
<div align="center"><img src="Titleimage.jpg" alt="" width="1400" height="86" />
</div>

<ul id="nav">

<li><a href="#"><img src="Paintings.jpg"></a>
<ul>
<li><a href="MainView01.html" target="MainView">Painting 1</a></li>
<li><a href="#">Painting 2</a></li>
<li><a href="#">Painting 3</a></li>
<li><a href="#">Painting 4</a></li>

</ul>
</li>

<li><a href="#"><img src="Sculptures.jpg"></a>
<ul>
<li><a href="#">Sculpture 1</a></li>
<li><a href="#">Sculpture 2</a></li>
<li><a href="#">Sculpture 3</a></li>
<li><a href="#">Sculpture 4</a></li>
<li><a href="#">Sculpture 5</a></li>

</ul>
</li>

<li><a href="#"><img src="Installations.jpg"></a>
<ul>
<li><a href="#">Installation 1</a></li>
<li><a href="#">Installation 2</a></li>
<li><a href="#">Installation 3</a></li>

</ul>
</li>

<li><a href="#"><img src="Drawings.jpg"></a>
<ul>
<li><a href="#">Drawing 1</a></li>
<li><a href="#">Drawing 2</a></li>
<li><a href="#">Drawing 3</a></li>
<li><a href="#">Drawing 4</a></li>

</ul>
</li>
</ul>

<button id="optionsButton" style="position:absolute;top:10px;left:10px;height:22px;width:100px;z-index:10" onclick="doClick()">OPTIONS</button>
<select id="optionsSelect" style="position:absolute;top:10px;left:10px;height:20px;width:100px;z-index:9">
    <option>ABC</option>
    <option>DEF</option>
    <option>GHI</option>
    <option>JKL</option>
</select>
<script type="text/javascript">
   function doClick() {
       optionsSelect.focus();
       var WshShell = new ActiveXObject("WScript.Shell");
       WshShell.SendKeys("%{DOWN}");
   }
</script>


-->



<?php
//include 'selectCustTransDropDown.php';
?>
<!--

<form name="proof2" action="selectCustProof.php" method="post">


<select  name="Prof"  onchange='this.form.submit()'>
    <option>Make a selection</option>
    <option>ChequeToBeDeposited</option>
    <option>ChequeDeliveredToMyBank</option>
    <option>EFTEmailProof</option>
</select>
<br>
<a href="view_cust_all3.php" >view_cust_all3.php</a></b><br />
<a href="view_inv_all.php" >view_inv_all.php</a></b><br />
-->


<?php
//include 'OnSelect8.php';
?>
<br><br>Or Select type of proof: (not confirmed payment):<br>
        <!--<form  action="selectCustAddStk.php" method="post">-->
        <form  action="addExp.php" method="post">

            <input type="submit" name="btnSubmit" value="Add Stock" style="width:400px"  /><br>
			</form>
        <form  action="selectCustAssignStk.php" method="post">
            <input type="submit" name="btnSubmit" value="Assign Stock to a Customer" style="width:400px"  /><br>
        </form>
        <form  action="addExpH.php" method="post">
            <input type="submit" name="btnSubmit" value="Add Other Expenses (eg Insurance, HomeExpenses)" style="width:400px"  /><br>
        </form>
        <form  action="addProf.php" method="post">
            <input type="submit" name="btnSubmit" value="WorkInProgress Add Other Profits eg Bank Interest" style="width:400px"  /><br>
        </form>


<?php
include 'viewExpLatest.php';

include 'view_proofLatest.php';
include 'view_invLatest.php';
mysqli_close($DBConnect);
?>

</body>

</html>
