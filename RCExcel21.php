Put invoice amounts in:<br>
eg:<br>
424.60
635.4
334.05
67
25.56
55.3
Total amount paid: 880.95
<form name="Adddata"  onclick="return confirm('You forgot to multiply by 1.15!!!!');   onsubmit="return formValidator()" action="RandomCalc21.php" method="post">
<textarea  id="txtArea" name="txtArea" rows="20" cols="70"></textarea><br>
Total amount paid: <input  type="text" name="Tot"  cols="20" required>
<br>
<br>
optional:
<br><br>Total Unpaid invoices amount:<input  type="text"   id="text" name="unpaid" cols="70">
<input type="submit" value="submit import "  /> </th>

</form>