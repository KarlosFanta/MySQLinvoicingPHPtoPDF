<!-- Table structure:  NB I Have to add primary key!
 
        CREATE TABLE IF NOT EXISTS `transactions2` (
  `TransNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `TransDate` date NOT NULL,
  `AmtPaid` float DEFAULT NULL,
  `Notes` varchar(500) DEFAULT NULL,
  `TMethod` varchar(30) DEFAULT NULL,
   PRIMARY KEY (`TransNo`),
  UNIQUE KEY `TransNo` (`TransNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 -->
Inserting from a _POST requires 2 files. one for inputting: and another for capturing the data.
<br>
Here we can later add different types of inputs such as buttons, dropdowns, radio buttons, HTML5 validation etc.<br>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action="webform2.php" method="post">
<table>
<?
echo "<tr><th>TransNo</th>";
echo "<th>CustNo</th>";
echo "<th>TransDate<br>DD/MM/YYYY</th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
                <tr>
                        <th><input type="text" size="2"  id="TransNo"  name="TransNo" value="1" required />
                </th>
                        <th><input type="text" size="2"  id="CustNo"  name="CustNo" value="3" required  />
                </th>
                <th>   
                        <input  id="TransDate" size="10" name="TransDate"  value="30/09/2019" required  >
                </th>
                <th>
                        $<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="1112.44" />
                </th>
                <th>
                        $<input type="text"  size="20" id="Notes" name="Notes" value="My favourite customer" />
                </th>
                <th>
                        <select name="TMethod"  id="TMethod"  >
                <option value="Please Choose">Please Choose</option>
                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option> 
          </select>
                       
                </th>
                </tr>
                </table><br>
 <input type="submit"  size="5" value="submit" />