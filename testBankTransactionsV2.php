<html>
<head>
<title>TestBank check amounts adding up </title>
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>



<form name="Adddata"   action="testBankTransactionsRemoveCarriedForward.php" method="post">
<div>
<b><font size = "4" type="arial">Upload Excel Data</b></font>
<br/>testBankTransationsV2.php loads testcheck4processBTv3.php<br/>

		<dl>
			<dt><label>Copy complete tabular data without headings from Excel or below(HTML) into the textbox below:<br>
			
			<br> 


 <table>
  <tr>
    <td>27 Jan 2023</td>
    <td>Sold a keyboard</td>
    <td>264.5</td>
    <td>5571.29</td>
    <td>Tr4982</td>
    <td>inv10079JM</td>
  </tr>
  <tr>
    <td>5 Feb 2023</td>
    <td>Bought a wireless keyboard</td>
    <td>-366.98</td>
    <td>5204.31</td>
    <td>Exp4413</td>
    <td></td>
  <tr>
    <td>6 Feb 2023</td>
    <td>Bought a wireless mouse</td>
    <td>-346.00</td>
    <td>4858.31</td>
    <td>Exp4413</td>
    <td></td>
  <tr>
    <td>8 Feb 2023</td>
    <td>Sold a screen</td>
    <td>1264.5</td>
    <td>6122.81</td>
    <td>Exp4413</td>
    <td></td>
  </tr>
  <tr>
    <td>10 Feb 2023</td>
    <td>CARRIED FORWARD</td>
    <td></td>
    <td>6122.81</td>
    <td>Exp4413</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>10 Feb 2023</td>
    <td>BROUGHT FORWARD</td>
    <td></td>
    <td>6122.81</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>12 Feb 2023</td>
    <td>Bought antivirus</td>
    <td>300</td>
    <td>6122.81</td>
    <td>Exp4416</td>
    <td></td>
  </tr>
  <tr>
    <td>15 Feb 2023</td>
    <td>Sold a laptop</td>
    <td>31264.5</td>
    <td>6122.81</td>
    <td>Tr413</td>
    <td>Inv353</td>
  </tr>
</table> <br>


<!--<a href = "http://localhost/ACS/import4HTMLtoExcel.php">import4HTMLtoExcel.php</a><br>
<a href = "http://localhost/ACS/import4FACEBOOKHTMLandDelete4throws.php">import4FACEBOOKHTMLandDelete4throws.php</a><br>
<a href = "http://localhost/ACS/import4SerialToParallel.php">SerialToParallel select amount of columns</a><br>-->

		<br>
Copy above table contents into the textbox below: and submit<br>
or you can copy from Excel.<br>
<textarea  id="txtArea" name="txtArea" rows="20" cols="100"></textarea>

<br>
<input type="submit" value="Test bank acc">
<br><br><br>






</body>
</html>