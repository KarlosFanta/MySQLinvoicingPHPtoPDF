<?php

	
	//require_once("inc_OnlineStoreDB.php");//page567
	//require_once("header.php");//page567


	//$date = date("H:i dS F"); //Get the date and time.
	//echo $date;
	//$file = "logaddcust.php"; //Where the log will be saved.


?>
<html>
<head>
<title>COMPARE bank statement</title>
<script type="text/javascript">
</script>
</head>
<body>

<?php
//	require_once('header.php');	
?>

<form name="Adddata"  onclick="return confirm('You forgot to multiply by 1.15!!!!');   onsubmit="return formValidator()" action="comparecheck4processBT.php" method="post">
<div>
<b><font size = "4" type="arial">OK, so I determined that the comparison code will be too complex<br>
and that i should use the Compare funtion of Notepad++</b></font><br><br/>compareBankTransations.php loads comparecheck4processBT.php<br/>

		<dl>
			<dt><label>Copy complete tabular data without headings from HTML (or Excel) into here:
			<br>
<a href = "http://localhost/ACS/import4HTMLtoExcel.php">import4HTMLtoExcel.php</a><br>

<table width='10' border='1'>
<?php
echo "<br>Add new eventsTB:<br>";

echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate DD/MM/YYYY</th>";
echo "<th>ENotes</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* event AutoNumber: (!! Different for internet eventsTB!)</label>-->
			<th><input type="text" size="2"  id="EventNo" name="EventNo" value="<?php echo $daNextNo;?>" />
		</th>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo @$CustInt;?>";


</th>
<th><?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
	$NewFormat = date("d/m/Y");
?>
	<!--<label>EDate:</label></dt>-->
	<!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; ?>" />-->
	<input type="text" size="10" id="EDate"  name="EDate" value="<?php echo $NewFormat;?>" /> 
</th>
<th>
<input type="submit" value="COMPARE"  /> </th>

</tr>
</table>
<br>



<table>
  <tr>
    <th>title1</th>
    <th>title1</th>
  </tr>
  <tr>
    <td><textarea  id="txtArea" name="txtArea" rows="20" cols="70">2008-01-04	ABSA BANK JMindave inv10171 		2677	616980.16
2008-01-04	ABSA BANK JMindave inv10171 		2677	616980.16
13 Mar 23	ABSA BANK JMindave inv10171 		2677	616980.16
14 Mar 23	LaptopAcer	-8723.85		615256.31
15 Mar 23	RF Dis-Chem Online Refund		97.9	615354.21
23 Mar 23	CARRIED FORWARD			613048.73

24 Mar 23	   PROVISIONAL STATEMENT			
24 Mar 23	BROUGHT FORWARD			613048.73
24 Mar 23	FWSHOP -IVAN KRUG		276	613324.73</textarea>
</td>
<td><textarea id="txtArea2" name="txtArea2" rows="20" cols="70">13 Mar 23	ABSA BANK JMindave inv10171 		2677	616980.16
14 Mar 23	LaptopAcer	-8723.85		615256.31
15 Mar 23	RF Dis-Chem Online Refund		97.9	615354.21
23 Mar 23	CARRIED FORWARD			613048.73

24 Mar 23	   PROVISIONAL STATEMENT			
24 Mar 23	BROUGHT FORWARD			613048.73
24 Mar 23	FWSHOP -IVAN KRUG		276	613324.73</textarea>
	
	
	
	</textarea></td>
  </tr>
</table>


<br>
<input type="submit" value="COMPARE" onclick="return confirm('You forgot to multiply by 1.15!!!!');  /> 
<!--<input type="button" value="Submit" onclick="formValidator()" onclick="return confirm('Are you sure about the date?'); />--> 
<br><br><br>



</body>
</html>