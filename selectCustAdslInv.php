<?php
//	include('dalogin/index.php');
//	include('dalogin/USerSession.php');
	//include('dalogin/CheckLogin.php');
	
	
	//include "NovChk2.php"; //adsl done
	
	
	
	
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");

$item3b='';
?>	
<html>
<head>
<title>Create ADSL invoice</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<?php

$query = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY custLN";
//echo $query;
@session_start();
//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

$CNN = @$_SESSION['CustNo'];
$queryS = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CNN";
//echo $queryS."<br>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b =  $row2["CustLN"];
$item3b = mb_substr($row2["CustFN"], 0, 13);
	}
mysqli_free_result($result2);
}

?>
<b><font size = "4" type="arial">Select A Customer into the session</b></font><b>NEW <font size = 5 color = green>ADSL</font> INVOICE</b><font color = dark yellow> selectCustAdslInv.php</font>

<?php 
if 
(@$_SESSION['CustNo'] != "")
echo "SESSION['CustNo'] is: ".@$_SESSION['CustNo'];
?>

</br>


<form name="fadsluser" action="selectCustProcessB.php" method="post">
<?php $queryNL = "select CustNo, CustFN, CustLN, u1 from customer where u1 <> '' order by u1";
//echo "queryNL:". $queryNL; ?>
<!--ADSLuser: <input type="submit" name="btn_submit" value="Select" /> <select name="mydropdownEC" onload="this.size=70;" >
<?php
$u1= '';
//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
$u1 = $row2["u1"];

$item1 = $row2["CustNo"];
//$item2b =  $row2["CustLN"];
$item2b = mb_substr($row2["CustLN"], 0, 13);
$item3b = mb_substr($row2["CustFN"], 0, 13);

//$item3b = $row2["CustFN"];
//print "<option value='$item1'>$item2b";

echo "<option  value='";
//echo $u1."@ ";

echo $item1;
echo "'>";
echo $u1."@ ";

echo $item2b;

 echo "____".$CNN; //selected customer of current session
 print "_".$item1;

//echo "kjbjkbkjb";
print "_".$item3b;
$adsl = $row2["u1"];

include "NovChk2.php"; //adsl done




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
$item2 = mb_substr($row["CustLN"], 0, 13);
$item3 = mb_substr(@$row2["CustFN"], 0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>$adsl _ $item2"; //all customers
print "_".$item1;
print "_".$item3;
//print "_".$adsl;
//if ($adsl != "")
//{

//echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
include "NovChk2.php"; //adsl done


//}



print " </option>"; 

	}
mysqli_free_result($result);
//mysql_free_result($result);

}
/* close connection */
//$mysqli->close();

print " </option><br>"; 

echo $item3b;


?>


<input type="submit" name="btn_submit" value="Select the customer" /> 

END<br>



-->

















ADSLuser: <input type="submit" name="btn_submit" value="Select" /> <select name="mydropdownEC" onload="this.size=70;" ><!--onchange='this.form.submit()'-->
<?php
$u1= '';
//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
$u1 = $row2["u1"];

$item1 = $row2["CustNo"];
//$item2b =  $row2["CustLN"];
$item2b = mb_substr($row2["CustLN"], 0, 13);
$item3b = mb_substr($row2["CustFN"], 0, 13);

//$item3b = $row2["CustFN"];
//print "<option value='$item1'>$item2b";

echo "<option  value='";
//echo $u1."@ ";

echo $item1;
echo "'>";
echo $u1."@ ";

echo $item2b;

 echo "____".$CNN; //selected customer of current session
 print "_".$item1;

//echo "kjbjkbkjb";
print "_".$item3b;
$adsl = $row2["u1"];

/*if ($adsl != "")


echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
else
echo  " &nbsp;&nbsp;&nbsp;&nbsp;no adsl" ;
*/

include "NovChk2.php"; //adsl done  DO_THIS_ONE DO THIS ONE




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
$item2 = mb_substr($row["CustLN"], 0, 13);
$item3 = mb_substr(@$row2["CustFN"], 0, 13);
$adsl = $row["u1"];
print "<option value='$item1'>$adsl _ $item2"; //all customers
print "_".$item1;
print "_".$item3;
//print "_".$adsl;
//if ($adsl != "")
//{

//echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
include "NovChk2.php"; //adsl done


//}



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

print " </option><br>"; 

echo $item3b;


?>


<input type="submit" name="btn_submit" value="Select the customer" /> 
</form>

END2








	<a href = "chkPricing.php">chkPricing</a> NovChk2.php is adsl done
<br><a href= 'CheckTopups.php' >Check Topups</a>

<a href='activateADSLsess.php' >Activate ADSL invoicing session</a> 
<a href='deactivateADSLsess.php' >Deactivate ADSL invoicing session</a>
</form>
<br>







</br>









<form name="Editcust" action="selectCustProcessB.php" method="post">



Surname: <select name="mydropdownEC" onload="this.size=70;" >

<?php

//dropdownbox:	
	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
echo "<option value='_no_selection_'>Select Customer</option>";
else
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$item2b = mb_substr($row2["CustLN"], 0, 13);
$item3b = mb_substr($row2["CustFN"], 0, 13);

//print "<option value='$item1b'>$item2b";

echo "<option  value='";
echo $item1b;
echo "'>";
echo mb_substr($item2b,  0, 13);

 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
print "_".$item3b;
$adsl = $row2["u1"];

if ($adsl != "")
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;


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
//print "_".$adsl;
if ($adsl != "")
{
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
include "NovChk2.php"; //done


}


print " </option>"; 





	}
mysqli_free_result($result);

}


print " </option><br>"; 
echo $item3b;
?>

<input type="submit" name="btn_submit" value="Select the customer" /> NovChk2.php >adsl done
	<br><br>
</form>

<?php 

echo "<form name='uncapped' action='selectCustProcessB.php' method='post'>";
$queryNL = "select CustNo, CustFN, CustLN, u1 from customer where u2 = 'kconnect.co.za' order by u2";
//echo "queryNL:". $queryNL; ?>
Uncapped: <select name="mydropdownEC" onload="this.size=70;" onchange='this.form.submit()'>


<?php
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
$item2b = mb_substr($row2["CustLN"], 0, 13);
$item3b = mb_substr($row2["CustFN"], 0, 13);

//print "<option value='$item1b'>$item2b";

echo "<option  value='";
//echo $item1."@ ";
echo $item1b;
echo "'>";
echo $item1."@ ";
echo $item2b;


 echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";

print "_".$item3b;
$adsl = $row2["u1"];


if ($adsl != "")
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;
else
echo  " &nbsp;&nbsp;&nbsp;&nbsp;no adsl" ;


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
$item2 = mb_substr(@$row2["CustLN"], 0, 13);
$item3 = mb_substr(@$row2["CustFN"], 0, 13);

$adsl = $row["u1"];
print "<option value='$item1'>$adsl _ $item2"; //all customers
print "_".$item1;


print "_".$item3;
//print "_".$adsl;
if ($adsl != "")
{
echo " &nbsp;&nbsp;&nbsp;&nbsp;adsl" ;



//now to check whether the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
include "NovChk2.php"; //done

}
print " </option>"; 

	}
mysqli_free_result($result);


}

print " </option><br>"; 

echo $item3b;

?>

<input type="submit" name="btn_submit" value="Select the customer" /> 
	<a href = "chkPricing.php">chkPricing</a>
<br><br>

</form>

<a href = 'chkinvAmts.php' target='_blank'>chkinvAmts.php</a>
<?php 
$date = date('Y-m-d',time()-(100*86400)); // topups 60 days ago

//>>>>>>>>>>>>>>>>>>>>>>
$queryEuser = "SELECT CustNo, ENotes FROM events WHERE  EDate >= '$date'  and ENotes LIKE '%top%' and ENotes LIKE '%$u1%' order by EDate desc" ;

echo " ".$queryEuser." <br>";
//$queryEuser = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	$GC = '';
	if ($resultEuser = mysqli_query($DBConnect, $queryEuser)) {
  while ($rowEuser = mysqli_fetch_assoc($resultEuser)) {
//echo "&nbsp;{$rowEuser['ENotes']}&nbsp;&nbsp;</th><th>";

echo "&nbsp;<b><font size= '2' color= 'blue'>{$rowEuser['ENotes']}</b></font>&nbsp;&nbsp; ";
//echo "&nbsp;<b><font size= '2' color= 'purple'>{$rowEuser['CustNo']}</b></font>&nbsp;&nbsp; ";
	$GC = $rowEuser['CustNo'];
$qW = "SELECT topup FROM customer WHERE  CustNo = $GC" ;
	
	
		if ($rqW = mysqli_query($DBConnect, $qW)) {
  while ($rowqW = mysqli_fetch_assoc($rqW)) {

echo "&nbsp;<b><font size= '2' color= 'green'>{$rowqW['topup']}</b></font>&nbsp;&nbsp;<br>";
//echo $qW;
}mysqli_free_result($rqW);
}

	
	
}mysqli_free_result($resultEuser);
}



echo "<br><br>";












//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>





//$queryE = "SELECT ENotes FROM events WHERE CustNo = $CNN and   EDate >= '$date'  and ENotes LIKE '%top%' order by EDate desc" ;

$queryE = "SELECT CustNo, ENotes FROM events WHERE  EDate >= '$date'  and ENotes LIKE '%top%' order by EDate desc" ;

//echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	$GC = '';
	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
//echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;</th><th>";
$Eve= $rowE['ENotes'];
$arr = explode(":", $Eve, 2);
$first = $arr[0];
$first = mb_substr($first, 0, 8);
$first = str_pad($first, 8, '_');
$rrr = @$arr[1]; //Notice: Undefined offset: 1
echo "&nbsp;<b><font size= '2' color= 'purple'>$first:$rrr</b></font>&nbsp;&nbsp; "; 
//echo "&nbsp;<b><font size= '2' color= 'purple'>{$rowE['CustNo']}</b></font>&nbsp;&nbsp; ";
	$GC = $rowE['CustNo'];
$qW = "SELECT topup FROM customer WHERE  CustNo = $GC" ;
	
	
		if ($rqW = mysqli_query($DBConnect, $qW)) {
  while ($rowqW = mysqli_fetch_assoc($rqW)) {

echo "&nbsp;<b><font size= '2' color= 'green'>{$rowqW['topup']}</b></font>&nbsp;&nbsp;<br>";
//echo $qW;
}mysqli_free_result($rqW);
}

	
	
}mysqli_free_result($resultE);
}

echo $queryChk;












/*$CustNo =  $row['CustNo'];
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];
$CustAddr =  $row['CustAddr'];
$CustIDdoc =  $row['CustIDdoc'];
$CustDetails =  $row['CustDetails'];
$ADSLTel =  $row['ADSLTel'];
$CustPW =  $row['CustPW'];
//$TopupURL =  $row['TopupURL'];
$Important =  $row['Important'];
*/
//$query =("SELECT * FROM customer where CustNo = $CustInt  where u1 <> '' order by u1");
//echo $query;
$queryC = "select * from customer where u1 <> '' ORDER BY custLN";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>ADSLTel</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
$CustNo = $row["CustNo"];
echo "<th>".$row["u1"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["ADSLTel"]."</th>";//CustNo is case senSitiVe
//echo "<th><a href='editCust.php?mydropdownEC={$CustNo}'  target='_blank'>{$CustNo}</a></th>";
echo "<th><a href='assignStkInv.php?CustNo={$CustNo}'  target='_blank'>{$CustNo}</a></th>";//Cno

echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";
echo "<th>".$row["CustLN"]."";
$row_cnt = mysqli_num_rows($resultC);
//echo " rows: $row_cnt</th>";
echo "</tr>\n";




}
mysqli_free_result($resultC);
}


echo "</table>";



?>




</body>

</html> 