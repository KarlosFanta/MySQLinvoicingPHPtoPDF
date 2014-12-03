<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add proof</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script  type="text/javascript">

<script type='text/javascript'>


</script>
</head>
<body>

<form  action="addSTRprocessLast.php"   method="post">



<?php	//this is "addTransCustProcess2.php"
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
?>
	Hover your mouse over the textboxes for multiple street selections:<br>
	<?php include 'streetQuery.php' ?>		
	<input type="text"  size="13" id="InvNoA"  name="InvNoA"  class='clInvNoA' /><br><br><br><br><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  size="13" id="InvNoB"  name="InvNoB"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoC"  name="InvNoC"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoD"  name="InvNoD"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoE"  name="InvNoE"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoF"  name="InvNoF"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoG"  name="InvNoG"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoH"  name="InvNoH"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoI"  name="InvNoI"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoJ"  name="InvNoJ"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoK"  name="InvNoK"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoL"  name="InvNoL"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoM"  name="InvNoM"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoN"  name="InvNoN"  class='clInvNoA' /><br><br><br><br><br><br>
	<input type="text"  size="13" id="InvNoO"  name="InvNoO"  class='clInvNoA' /><br><br><br><br><br><br>
	
<input type='submit' value="Create proof"   style="width:300px;height:30px" /> 
</form>


 <select name="mydropdownEC" onload="this.size=70;" onchange='this.form.submit()'>
<?php
	$queryS = "SELECT name FROM streets order by name";

if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
//$item1 = $row2["id"];
$item1b = $row2["name"];
//print "<option value='$item1b'>$item2b";

echo "<option  value='";
//echo $item1."@ ";
echo $item1b;
echo "'>";
//echo $item1."@ ";
 print "_".$item1b;
//echo "kjbjkbkjb";


print " </option>"; 
	}
$resultS->free();
	}


?>

</body>
</html>
