
<?php
session_start();
	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$item3b='';
?>	
<html>
<head>
<title>customer TO session</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script src="jquery-1.10.1.min.js"></script>
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


$query = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY custLN";
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





<form name="fadsluser" action="selectCustProcessS.php">
<?php $queryNL = "select CustNo, CustFN, CustLN, u1 from customer where u1 <> '' order by u1";
//echo "queryNL:". $queryNL; ?>
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
if ($result = mysqli_query($DBConnect, $queryNL)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  mb_substr($row["CustLN"],  0, 13) ;
$item3 = mb_substr($row["CustFN"],  0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>$adsl _ $item2"; //all customers
print "_".$item1;
print "_".$item3;
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

<br>


</form>







</br>

<form name="Editcust" action="selectCustProcessS.php">
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




<form name="f2" action="select_CustProcessM22S.php">
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

<form name="f2" action="select_CustProcessM3S.php" >

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


<a href = "chkPricing.php">chkPricing</a>
<br><br>


<a href="view_cust_all3.php" >view_cust_all3.php</a> 
<a href="UnassignedCustStk.php" >UnassignedCustStk.php</a>
<br><br>
<font size = 4><b><a href="viewDraftInv.php" >viewDraftInv.php</a>
<br>

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

</body>

</html> 