<?php


	$page_title = "Select a customer";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a customer</title>
<script src="jquery-1.10.1.min.js">
</script>

<script>
$(document).ready(function(){
    alert("open the dropdownbox automatically onload");
    optionsSelect.focus();
    // Other statements
});
//window.onload=function
</script>
</head>

<form name="Editcust" action="select_CustProcess.php" method="post">
<input type="submit" name="btn_submit" value="Select the customer" /> <br>

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

<select name="DD" id="DD"  >
<option value="volvo">Audi</option>
<option value="saab">Fiat</option>
<option value="audi">Honda</option>
<option value="fiat">Mercedes</option>
<option value="audi">Saab</option>
<option value="audi">Volvo</option>
</select>
</form>

</form>


</body>

</html>
