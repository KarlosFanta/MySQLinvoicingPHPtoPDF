
<?php

/*
    Disable the Backspace key (Go back one page) in Firefox:
	Open Mozilla Firefox
    In the Address bar �> Type �about:config� and press enter
    Press �I�ll be careful, I promise� button and press enter
    In the filter box type �browser.backspace_action�
    You will see a configuration in the display window below, with a value of �0�
    Change this to �1� in order to disable backspace in firefox.
*/
	$page_title = "Select a customer";
//	include('dalogin/index.php');
//	include('dalogin/USerSession.php');
	//include('dalogin/CheckLogin.php');

	
	
	  @session_start();
	  
	  date_default_timezone_set('Africa/Johannesburg');
	  
if(date("Hi") < "1000")
	{
		echo "do now<br><br><br><br><br><br>";
		echo date("Hi");
		echo "<a href= 'http://localhost/COOL/aframes1prc.html'>CHECK USAGE</a>";
		echo "do now<br><br><br><br><br><br>";
	}
	  
  
	  
	  
	if (@$_SESSION['INVACT'] == 'ACTIVE')
	{
		echo "ADSL invoicing active, click here to deactivate: <a href = 'deactivateADSLsess.php'>deactivate</a>";
		include "selectCustAdslInv.php";
		exit();
	}
		
	
	
	
	
	
	
	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
//include "calculator/index.php"; 
$item3b='';
?>	
<html>
<head>
<title>Select a customer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script src="jquery-1.10.1.min.js"></script><!--required to inserrt-->
	       <script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process2.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
                   $("#button2").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process2.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
                   $("#button3").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process2.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });


				});
//now the stuff to make things fancy:
//function changeTest ( form ) { form.echoText.value = form.origText.value; }
function changeTest ( form ) { 
//document.getElementById("button").style.background='#055300';
	document.getElementById("button").value="Save Note";
	document.getElementById("button2").value="Save Note";
	document.getElementById("button").disabled=false;
	document.getElementById("button2").disabled=false;


	window.onbeforeunload = function() {
    return "You have attempted to leave this page. "
           + "If you have made any changes to the fields without "
           + "clicking the Save button, your changes will be lost. "
           + "Are you sure you want to exit this page?";
};
 }
 			   //document.getElementById("button").style.background='#000000';
function reply_click(clicked_id)
{
    //alert(clicked_id);
	//document.getElementById("button").style.background='#00ff00';
	//document.getElementById("button").disabled=false;
	//document.getElementById("button").enabled=true;
	document.getElementById('message').focus(); 
document.getElementById("button").disabled=true;
document.getElementById("button2").disabled=true;


	//document.getElementById("button").style.background='#F0FFFF';
}	
	function disable()
{
//document.getElementById("message").focus();
document.getElementById("button").disabled=true;
document.getElementById("button2").disabled=true;

}
//don;t forget body onload below:
       </script>
   </head>
 
 <body onload="javascript:disable();">
	
<?php


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

	$CNN = @$_SESSION['CustNo'];
$queryS = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CNN";
//echo $queryS."<br>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  mb_substr($row2["CustLN"],  0, 13);
$item3b = mb_substr($row2["CustFN"],  0, 13);
/*print $item2b;
 echo "____".$CNN;
 print "_".$item1b;
print "_".substr($item3b,  0, 13);
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";
	}
mysqli_free_result($result2);
}



?>
<b><font size = "4" type="arial">Select A Customer into the session</b></font><font color = dark yellow> selectCust.php</font>

<?php 
if 
(@$_SESSION['CustNo'] != "")
{
	echo "";
//echo "SESSION['CustNo'] is: ".@$_SESSION['CustNo'];
}
?>

</br>





<form name="fadsluser" action="selectCustProcess.php">


<!--ADSL: <select name='mydropdownEC' onload='this.size=70;' onchange='this.form.submit()'>-->
<?php
echo" <select name='mydropdownEC' onload='this.size=70;' >";
//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
$item1 = $row2["u1"];
$item1b = $row2["CustNo"];
$ADSLTel = $row2["ADSLTel"];
$item2b =  mb_substr($row2["CustLN"],  0, 13);
$item3b = mb_substr($row2["CustFN"],  0, 13);
//print "<option value='$item1b'>$item2b";

echo "<option  value='";
//echo $item1."@ ";
echo $item1b;
echo "'>";
echo $item1."@ ";
echo mb_substr($item2b,  0, 13);

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".mb_substr($item3b,  0, 13);
//echo "_".$ADSLTel;
//$adsl = $row2["u1"];
/*
if ($adsl != "")
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
else
echo  " &nbsp;&nbsp;&nbsp;&nbsp;no adsl" ;


*/


print " </option>"; 
	}
mysqli_free_result($resultS);
	}
}
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
	
	$queryNL = "select CustNo, CustFN, CustLN, u1, u2, ADSLTel from customer where u1 <> '' order by u1";
echo "queryNL:". $queryNL; 
if ($result = mysqli_query($DBConnect, $queryNL)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  mb_substr($row["CustLN"],  0, 13) ;
$item3 = mb_substr($row["CustFN"],  0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>$adsl _ $item2"; //all customers
print "_".$item1;
print "_".$item3;
$ADSLTel = $row["ADSLTel"];

echo "_".$ADSLTel;

//print "_".$adsl;
/*if ($adsl != "")
{
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
include "NovChk.php"; //adsl done


}
*/
print " </option>"; 

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
mysqli_free_result($result);
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option>"; 

//echo mb_substr($item3b,  0, 13);
?>
</select>
<input type="submit" name="btn_submit" value="Select the customer" /> 
	<a href = "chkPricing.php">chkPricing</a>
<br>


</form>







</br>

<form name="Editcust" action="selectCustProcess.php">
<!--<input type="submit" name="btn_submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select the customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /> <br>-->

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
<!--<select name="mydropdownEC"  onMouseOver="this.size=70;" onclick='this.form.submit()'>-->
<!--Surname: <select name="mydropdownEC" onload="this.size=70;" onchange='this.form.submit()'>-->
<br><br>Surname: <select name="mydropdownEC" onload="this.size=70;" >

<?php
//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer by Surname</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option  value='";
echo $item1b;
echo "'>";
echo mb_substr($item2b,  0, 13);

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".mb_substr($item3b,  0, 13);

//$adsl = $row2["u1"];
//if ($adsl != "")
//echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;



print " </option>"; 
	}
mysqli_free_result($result2);
	}
}
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
	
$query = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY custLN";
//echo $query;
	
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  mb_substr($row["CustLN"],  0, 13);
$item3 = mb_substr($row["CustFN"],  0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".$item3;
/*if ($adsl != "")
{
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
//include "NovChk.php"; //done


}
*/
print " </option>"; 

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
	}
mysqli_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option>"; 



?>
</select>
<input type="submit" name="btn_submit" value="Select the customer" /> 
	<br><br>


</form>




<form name="f2" action="select_CustProcessM22.php">
<?php
$queryCN = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY CustNo desc";
@session_start();
$CNN = @$_SESSION['CustNo'];
//$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
	}
mysqli_free_result($result2);
	}
?>
<?php
//echo "CNumber: <select name='drop' onload='this.size=70;' onchange='this.form.submit()'>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>CNumber: <select name='drop' onload='this.size=70;' >";
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

echo "<option  value='";
echo $item1b;
echo "'>";
echo $item1b;

 echo "___".$CNN; //selected customer of current session
 print "_". mb_substr($item2b,  0, 13);
print "_".mb_substr($item3b,  0, 13);

print " </option>"; 
	}
mysqli_free_result($result2);
	}
}
if ($result = mysqli_query($DBConnect, $queryCN)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =   mb_substr($row["CustLN"], 0, 13);
$item3 = $row["CustFN"];
$adsl = $row["u1"];
print "<option value='$item1'>$item1"; //all customers
print "_".$item2;
print "_".mb_substr($item3, 0, 7);
/*
if ($adsl != "")
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
print " </option>"; 
*/
	}
mysqli_free_result($result);
}
print " </option>"; 


?>

</select><input type="submit" name="btn_submit" value="Select the customer" /> <br>  












</form>

<form name="f2" action="select_CustProcessM3.php" >

<?php
$queryCF = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY CustFN";
@session_start();
$CNN = @$_SESSION['CustNo'];
//$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =   mb_substr($row2["CustLN"],  0, 13);
$item3b =  mb_substr($row2['CustFN'],  0, 13);
	}
mysqli_free_result($result2);
	}

	
//echo "First: <select name='drop2' onload='this.size=70;' onchange='this.form.submit()'>";
echo "<br><bR>First name: <select name='drop2' onload='this.size=70;' >";
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

echo "<option  value='";
echo mb_substr($item3b,  0, 13);
echo "'>";
echo mb_substr($item3b,  0, 13);

 echo "___".$CNN; //selected customer of current session
 print "_". mb_substr($item2b,  0, 13);
print "_".$item1b;

print " </option>"; 
	}
mysqli_free_result($result2);
	}
}
if ($result = mysqli_query($DBConnect, $queryCF)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  mb_substr($row["CustLN"],  0, 13);
$item3 =  mb_substr($row["CustFN"],  0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>"; //all customers
echo mb_substr($item3, 0, 7);
print "_".$item2;
print "_".$item1;
/*if ($adsl != "")
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
*/
print " </option>"; 

	}
mysqli_free_result($result);
}
print " </option>"; 


?>

</select><input type="submit" name="btn_submit" value="Select the customer" /> <br>  


</form>






<?php 
/*
echo "<form name='fadsl' action='selectCustProcess.php' method='post'>";
$queryNL = "select CustNo, CustFN, CustLN, u1 from customer where u1 <> '' order by CustLN ";
//echo "queryNL:". $queryNL; 
//echo "queryS:". $queryS."<br>"; ?>
Capped: <select name="mydropdownEC" onload="this.size=70;" onchange='this.form.submit()'>

<?php
//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = $row2["CustFN"];
//print "<option value='$item1b'>$item2b";

echo "<option  value='";
echo $item1b;
echo "'>";
echo mb_substr($item2b,  0, 13);

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".mb_substr($item3b,  0, 13);

print " </option>"; 
	}
mysqli_free_result($resultS);
	}
}
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $queryNL)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
$adsl = $row["u1"];
print "<option value='$item1'>$item2"; //all customers
print "_".$item1;
print "_".mb_substr($item3, 0, 7);;
print "_".$adsl;

print " </option>"; 

	}
mysqli_free_result($result);
//mysql_free_result($result);

}

print " </option>"; 

echo "</select><input type="submit" name="btn_submit" value="Select the customer" /> <br><br></form>";
*/

?>


	<a href = "chkPricing.php">chkPricing</a>
<br><br>












<form name="EditInv" action="edit_inv_process.php"">
<?php
$row_cnt = 7;
$query = "select InvNo, CustNo, InvDate, Summary,TotAmt,SDR  from invoice where Draft = 'Y'";
//echo $query;
$res = mysqli_query($DBConnect, $query);
$row_cnt = mysqli_num_rows($res);
//echo $row_cnt ;

if ($row_cnt  == 0)
echo "<br>No draft invoices require editing";
else
{
echo "<b>You have $row_cnt invoices that require editing and sending:</b><br><br>";

//echo "<select name='mydropdownEC' onchange='this.form.submit()'>";
echo "<select name='mydropdownEC' >";
echo "<option value='_no_selection_'>Select draft invoice to be updated</option>";

if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];

$queryC = "select CustNo, CustFN, CustLN from customer WHERE CustNo = '$item2'";
//echo "qC:".$queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =   mb_substr($rowC["CustFN"],  0, 10);
$item3C = $rowC["CustLN"];
print "_".$item1C;
print "_CNo: ".$item2C;
print "_".mb_substr($item3C, 0, 7);
//C." ";
}}



$item3 = $row["InvDate"];
$item4 = $row["Summary"];
$item5 = $row["TotAmt"];

print "_".$item2;
print "_".$item3;
print "_".$item4;
print "_R".$item5;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}
mysqli_free_result($resultC);
//mysql_free_result($result);

}




	echo $queryC;
/* close connection */
//$mysqli->close();
echo "<input type='submit' name='btn_submit' value='Update selected invoice' /> ";
}
//echo "<br><br>Notes: <br>";
//include "notes/index.php"; //this is AJAX notes  THIS INCLUDE DID NOT WORK PROPERLY
//echo "<br>";

?>
	
</select><br>  
	
	</form>






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
*/	//require_once('view_cust.php');	
//require_once('view_cust_all3.php');	
?>
</form><!--<font size = 4><b>-->


<!--<a href="view_cust_all3.php" onmouseover="window.open (this.href, 'child')">view_cust_all3.php</a>-->









<a href="view_cust_all3.php" >view_cust_all3.php</a> 
<a href="UnassignedCustStk.php" >UnassignedCustStk.php</a>
<br><br>
<font size = 4><b><a href="viewDraftInv.php" >viewDraftInv.php</a>
<br>
<!--
<style type="text/css">

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
-->
<script type="text/javascript"><!--//--><![CDATA[//><!--

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

<!--http://www.jqwidgets.com/jquery-widgets-demo/demos/jqxgrid/gridkeyvaluescolumnwitharray.htm?web-->
</head>

<body>
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


--></font>


<?php
	
?>

<!-- style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' -->
        
<!-- fanciness added:  onClick="reply_click(this.id); and  onkeypress="changeTest(this.form)"-->
   <form name="daBigNote">
	
	<?php //include "compareQ.php"; ?>
	<?php //include "compare2.php"; //THIS INLCUDE STAEMENT WAS CAUSING ISSUES in my next code!
	
	$queryS = "SELECT * FROM comment ORDER BY id DESC LIMIT 1";

	if ($result2 = mysqli_query($DBConnect, $queryS)) {
	  while ($row2 = mysqli_fetch_assoc($result2)) {
			$item1b = $row2["message"];
			$row_cnt = mysqli_num_rows($result2);
		}
mysqli_free_result($result2);
	}
$rowsE = substr_count( $item1b, "\n" )+2; 	
	//echo "<textarea name='message' id='message'  style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows='4' cols='110'  > $item1b </textarea>";
	
	
	
	
	
	
	?>
	&nbsp;&nbsp;&nbsp;
	
	<a href = 'http://karlos.co.za/79/m1.php' target = '_blank'>karlos.co.za/79/m1.php</a> 
	<a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=comment' target = '_blank'>phpMyadmin</a> 
	<!--<a href = 'compare2.php'>compare2</a><a href = 'compare3.php'>compare3</a>-->
	<a href = 'compare5.php'>compare5</a>
	<a href = 'http://localhost/1streetLights/import4HTMLtoExcel.php'>Streetlights</a><br>
		<input type="button" value="Update Notes" id="button"  onClick="reply_click(this.id);">

	
	
	<br>
	<textarea name="message" id="message"  style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows="<?php echo $rowsE; ?>" cols="94"  onkeypress="changeTest(this.form)"><?php echo $item1b; ?></textarea><input type="button" value="Update Notes" id="button2">
	<br/>
	<input type="button" value="Update the Notes" id="button3"   onClick="reply_click(this.id);">selectCust.php
	<div id="info" /> <!-- ajax happens in process2.php -->
   </form>
  </body>
</html>

<?php
 /*  if(isset($_POST['BtnSubmit']))
   {
   
   //   echo "</br>Your Name :{$_POST['Fullname']}";
	$message = $_POST['Fullname'] ; //unadulterad text we got via Post
  
	  
//  $newLineCode = "<br/>";
  $newLineCode = "BrR";
$modifiedTextAreaText = ereg_replace( "\n", $newLineCode, $message);
//echo "modifiedTextAreaText:" . $modifiedTextAreaText ;   
  //    echo "<br>";
	  $modifiedTextAreaText = chop($modifiedTextAreaText,'BrR');

//	  $var_str = var_export($text, true);
//$var = "<?php\n\n\$$text = $var_str;\n\n?>";
//file_put_contents('filename.php', $var);
	
$file = "daNote.html";	
$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><tr><th><b>Register:</b></th><th>" .$_POST['Fullname'] . ";</th><br/>"); 
fwrite($open, "" .$modifiedTextAreaText. "\n"); 
//fwrite($open, "<th><b>Date & Time:</b>". date("d/m/Y"). "</th>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br /><a href = '$file'>Check log file: [Add table and end /table HTML keywords to the file to view the table contents.]</a><br />";
   }


$file = file("daNote.html");
$lastline = $file[count($file) - 1]; 

$rows = "2";
$rows = substr_count($lastline, 'BrR');
$rows +=2;
$rowsE = $rows;

$searchReplace = array("BrR", "<br />");
$lastline = str_replace($searchReplace, "\n", $lastline);
*/


$queryCN = "select CustNo, CustFN, CustLN, u1 from customer  where u1 != ''";
//$queryS = "select CustNo, CustFN, CustLN from customer where CustNo = $CNN";
//echo $queryCN;

if ($result = mysqli_query($DBConnect, $queryCN)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustLN"];
$item3 = $row["CustFN"];
$adsl = $row["u1"];
//print "_".$adsl;
//if ($adsl != "")
//echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;




$queryChk2 = "select Summary from invoice where CustNo = $item1 AND (Summary LIKE '%Dec%' AND summary LIKE '%adsl%' AND summary LIKE '%2013%')";
echo " ";
//echo $queryChk2;
//	$CNN = @$_SESSION['CustNo'];
echo " ";

if ($resultChk = mysqli_query($DBConnect, $queryChk2)) {
  while ($rowChk2 = mysqli_fetch_assoc($resultChk)) {
$su = "_";
$su = $rowChk2["Summary"];
/*print $item2b;
 echo "____".$CNN;
 print "_".$item1b;
print "_".substr($item3b,  0, 13);
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//echo "da sumry: ".$rowChk2["Summary"];
if ($su == '_')
{
print "$item1"; //all customers
print "_".$item2;
print "_".mb_substr($item3, 0, 7);;
echo "<br>";
}

//$su = "_";



	}
mysqli_free_result($resultChk);
	}





	}
mysqli_free_result($result);
}
print " <br>"; 




?>






<!--
<form name="UserInformationForm" method="POST"> </font><br>   
	    <textarea name="Fullname"rows="<?php //echo $rowsE; ?>" cols="100" ><?php //echo $lastline; ?></textarea><br/><br/>
      <input name="BtnSubmit" type="submit" value="Update">

</form>
-->
</body>

</html> 