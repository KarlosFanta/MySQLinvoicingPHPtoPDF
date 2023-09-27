<?php 
?>
This is an "exponential possibility problem" challenge.
Use example: <br>
A customer has 8 (or more) unpaid invoices.<br>
He now has paid a certain amount but I don't know for which of the 8 invoices 
and I don't know for how many invoices the amount covers.<br>
So our code will find out which invoices are covered by the amount.<br>
It could be 2 or 3 or 4 or more invoices that have been paid.<br>
The current code can also handle float values.<br>
I received a payment of €139 and I need to find out which invoices I need to combine to get the total value of €139.<br><br>
Invoices amounts: €10, €22, €14, €35, €82<br>
Correct result for €139 =  €22 + €35 + €82.<br><br>

<form name="Editcust" action="RCProcess.php" method="post">
Tot: <input type="text" id="Tot"  name="Tot" required ><br><br>
Amount of active inputs: <input type="text" id="in"  name="in" required ><br><br>
put Zeroes in unactive fields to prevent " Warning: A non-numeric value encountered "<br>
<input type="text" id="R1"  name="R1" value = "22" required><br><br>
<input type="text" id="R2"  name="R2" value = "35" required><br><br>
<input type="text" id="R3"  name="R3"  value = "82" required><br><br>
<input type="text" id="R4"  name="R4"  value = "0" required><br><br>
<input type="text" id="R5"  name="R5"  value = "0" required><br><br>
<input type="text" id="R6"  name="R6"  value = "200" required><br><br>
<input type="text" id="R7"  name="R7"  value = "0" required><br><br>
<input type="text" id="R8"  name="R8"  value = "0" required><br><br>
<input type="text" id="R9"  name="R9"  value = "0" required><br><br>
<input type="text" id="R10"  name="R10" value = "0" required><br><br>
<br><input type="submit" name="btn_submit" value="submit" /> 

</form>