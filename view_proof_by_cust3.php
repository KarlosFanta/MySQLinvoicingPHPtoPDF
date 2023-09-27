<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	//require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
	
$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
$indesc = 8;
$yo = 0;
$loop = 0;
$in = 8;


if (@$_POST['in'] != "")
$in = @$_POST['in'];
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];

?> 
<?php //require_once "header.php"; 
echo "<BR />";
if (@$un == '')
$un = 'Y';
if ($un == 'Y')
echo "All past proofs:";
else
echo "Only Unreconciled proofs:";

if ($CustInt == '')
{

//echo "CustInt = 'BLANK!'";
//$CustInt = $_POST['mydropdownEC'];

//echo "<br>CustInt$CustInt<br>";

//echo "TBLrow: " .$TBLrow."</BR>";
//$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";


//$CustInt = intval($Custno[0]);


}
?>

<!--<b><font size = "3" type="arial">Your proofs History </font>-->
<?php 			//echo @$row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			//echo " ";
			//echo @$row['CustLN'];
?>
			</b></font> &nbsp; &nbsp;  <font color=#F0D500>view_proof_by_cust3.php   order by proofdate desc</font>
			<a href = "edit_proofCQ.php">edit_proofCQ.php</a>
			<a href = "../phpMyAdmin-3.5.2-english/index.php?db=kc&table=aproof">../phpMyAdmin-3.5.2-english/index.php?db=kc&table=aproof</a>
			../phpMyAdmin-3.5.2-english/index.php?db=kc&table=customer
</br>
<?php
$SQLstring = "select * from aproof where CustNo = '$CustInt' order by proofdate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$summm = 0;
//if ($result = $DBConnect->query($SQLstring)) {
if ($result = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";

echo "<tr><th>ProofNo</th>";
//echo "<th>CustNo</th>";
echo "<th>ProofRecvd</th>";
echo "<th>AmtPaid</th>";
echo "<th length= '120'>Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustSDR&nbsp;&nbsp;</th>";
//echo "<th>PMethod&nbsp;</th>";
//echo "<th>InvNoA</th>";
if (@$in >0)
echo "<th>InvNoA</th>";
if (@$indesc >0)
echo "<th>InvNoA incl VAT</th>\n";
if ($in >1)
echo "<th>InvNoB</th>";
if ($indesc >1)
echo "<th>InvNoB incl VAT</th>\n";
if ($in >"2")
echo "<th>InvNoC</th>";
if ($indesc >2)
echo "<th>InvNoC incl VAT</th>\n";
if ($in >"3")
echo "<th>InvNoD</th>";
if ($indesc >3)
echo "<th>InvNoD incl VAT</th>\n";
if ($in >4)
echo "<th>InvNoE</th>";
if ($indesc >4)
echo "<th>InvNoE incl VAT</th>\n";
if ($in >5)
echo "<th>InvNoF</th>";
if ($indesc >5)
echo "<th>InvNoF incl VAT</th>\n";
if ($in > "6")
echo "<th>InvNoG</th>";
if ($indesc >6)
echo "<th>InvNoG incl VAT</th>\n";
if ($in >7)
echo "<th>InvNoH</th>";
if ($indesc >7)
echo "<th>InvNoH incl VAT</th>\n";
echo "<th>TMethod</th>";
//if ($indesc == "1")
echo "<th>Priority</th></tr>\n";

//    while ($row = $result->fetch_row()) {
 while ($row = mysqli_fetch_assoc($result)) {
 //  printf ("%s (%s)\n", $row[0], $row[1]);

/*   if ($un == 'Y')
			{ echo "<tr><th>un".$un."display all Proof</th><tr>";}
	else
				{ echo "<tr><th>".$un."N dont display Proof</th><tr>";}
*/
if ($un == 'N')
			{ 	
$mmm =  $row['PMethod'];
//echo "$mmm: ".$mmm;
if ($mmm == '0')
{
echo "<tr><th>";
if ($mmm == '0')
echo "<font color = orange>";

echo "{$row[0]}</font></th>";//ProofNo
//echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
*/
//echo "<th>{$row['ProofDate']}</th>";//Date
$date_array = explode("-",$row['ProofDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['Amt']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['Amt'];
echo "<th>{$row['Notes']}</th>\n";//notes
echo "<th>{$row['CustSDR']}</th>";//CustSDR

//echo "<th>24:{$row[24]}</th>";//ERROR

//echo "<th>R{$row[29]}</th>"; 
$summm = $summm + $row['Amt'];


//echo "<th align = 'left'>{$row['Notes']}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th><font color = green>{$row['PMethod']}</font></th>\n";//invNoA  //InvA  from aproof table
if ($indesc >0)
echo "<th>{$row['InvNoA']}</th>\n";  //InAincl  from aproof table

//echo "<th>{$loop}</th>\n";
$loop++;
//$PaidInvs[$loop]="$row['PMethod']";

if ($in >1)
echo "<th>{$row['InvNoB']}</th>";//InvNob
$loop++;
$ibb = $row['InvNoB'];
$PaidInvs[$loop] = $ibb;

if ($indesc >1)
echo "<th>{$row[9]}</th>"; //InNobincl





if ($in >2)
echo "<th>{$row['InvNoBincl']}</th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoBincl']";

if ($indesc >2)
echo "<th>{$row[11]}</th>";
 if ($in >3)
echo "<th>{$row['InvNoC']}</th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoC']";

if ($indesc >3)
echo "<th>{$row[13]}</th>";
 if ($in >4)
echo "<th>{$row['InvNoD']}</th>";

$loop++;
//$PaidInvs[$loop]="$row['InvNoD']";

if ($indesc >4)
echo "<th>{$row[15]}</th>";
 if ($in >5)
echo "<th>{$row['InvNoE']}</th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoE']";
if ($indesc >5)

echo "<th>{$row[17]}</th>";
 if ($in >6)
echo "<th>{$row['InvNoF']}</th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoF']";
if ($indesc >6)

echo "<th>{$row['InvNoGincl']}</th>";

 if ($in >7)
echo "<th>{$row['InvNoG']}</th>";

$loop++;
//$PaidInvs[$loop]="$row['InvNoG']";
if ($indesc >7)
echo "<th>{$row['InvNoHincl']}</th>";//InhHincl  Dont forget to enable invoice descriptions as well

//echo "<th>{$row['CustSDR']}</th>";//CustSDR
echo "<th>{$row['Notes']}</th>\n";//EFT TMethod
echo "<th>{$row['InvNoH']}</th>";//priority

echo "</tr>\n";
}
else
echo "";
//echo "<tr><th>nope</th></tr>";


{
				
echo "";//no row just put into memory.
$mmm =  $row['PMethod'];
//echo "$mmm: ".$mmm;
if ($mmm == '0')
//echo "<font color = orange>";
//echo "{$row[0]}</font></th>";//ProofNo
//echo "<th>{$row['ProofDate']}</th>";//Date
$date_array = explode("-",$row['ProofDate']);
$year = @$date_array[0];
$month = @$date_array[1];
$day = @$date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;
//echo "<th>".$day."/".$month."/".$year."</th>";//Date
//echo "<th>R{$row['Amt']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['Amt'];
//echo "<th>{$row['TransNo']}</th>\n";//notes
//echo "<th>{$row['CustSDR']}</th>";//CustSDR
//$summm = $summm + $row['Amt'];
//echo "<th align = 'left'>{$row['Notes']}</th>\n</font></p>";//Summary
if ($in >0)
echo "";
//echo "<th><font color = green>{$row['PMethod']}</font>\n";//invNoA  //InvA  from aproof table
if ($indesc >0)
echo "";
echo "<th>{$row['InvNoA']}\n";  //InAincl  from aproof table
//echo "<th>{$loop}\n";
$loop++;
////$PaidInvs[$loop]="$row['PMethod']";
if ($in >1)
echo "";
//echo "{$row['InvNoB']}";//InvNob
$loop++;
//$PaidInvs[$loop]="$row['InvNoB']";
$ibb = $row['InvNoB'];
$PaidInvs[$loop] = $ibb;

if ($indesc >1)
echo "{$row[9]}"; //InNobincl
if ($in >2)
echo "{$row['InvNoBincl']}";
$loop++;
//$PaidInvs[$loop]="$row['InvNoBincl']";
if ($indesc >2)
echo "{$row[11]}";
 if ($in >3)
echo "{$row['InvNoC']}";
$loop++;
//$PaidInvs[$loop]="$row['InvNoC']";
if ($indesc >3)
echo "{$row[13]}";
 if ($in >4)
echo "{$row['InvNoD']}";
$loop++;
//$PaidInvs[$loop]="$row['InvNoD']";

if ($indesc >4)
echo "{$row[15]}";
 if ($in >5)
echo "{$row['InvNoE']}";
$loop++;
//$PaidInvs[$loop]="$row['InvNoE']";
if ($indesc >5)

echo "{$row[17]}";
 if ($in >6)
echo "{$row['InvNoF']}";
$loop++;
//$PaidInvs[$loop]="$row['InvNoF']";
if ($indesc >6)

echo "{$row['InvNoGincl']}";

 if ($in >7)
echo "{$row['InvNoG']}";

$loop++;
//$PaidInvs[$loop]="$row['InvNoG']";
if ($indesc >7)
echo "{$row['InvNoHincl']}";//InhHincl  Dont forget to enable invoice descriptions as well

//echo "{$row['CustSDR']}";//CustSDR
//echo "{$row['Notes']}";//EFT TMethod
//echo "{$row['InvNoH']}";//priority

echo "";
}		


































}
	else
{
				
echo "<tr><th>";
$mmm =  $row['PMethod'];
//echo "$mmm: ".$mmm;
if ($mmm == '0')
echo "<font color = orange>";

echo "{$row['ProofNo']}</font></th>";//ProofNo
//echo "<th>{$row[1]}</th>";
/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
*/
//echo "<th>{$row['ProofDate']}</th>";//Date
$date_array = explode("-",$row['ProofDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['Amt']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['Amt'];
echo "<th>{$row['Notes']}</th>";//notes
echo "<th>{$row['CustSDR']}</th>";//CustSDR

//echo "<th>24:{$row[24]}</th>";//ERROR

//echo "<th>R{$row[29]}</th>"; 
$summm = $summm + $row['Amt'];


//echo "<th align = 'left'>{$row['Notes']}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th><font color = green>{$row['InvNoA']}</font></th>";//invNoA  //InvA  from aproof table
if ($indesc >0)
{echo "<th>";
if ($row['InvNoAincl'] >"0")
echo "R {$row['InvNoAincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}
//echo "<th>{$loop}</th>";
$loop++;
//$PaidInvs[$loop]="$row['PMethod']";

if ($in >1)
echo "<th><font color = green>{$row['InvNoB']}</font></th>";//InvNob
$loop++;
//$PaidInvs[$loop]="$row['InvNoB']";
$ibb = $row['InvNoB'];
$PaidInvs[$loop] = $ibb;

if ($indesc >1)
{
echo "<th>";
if ($row['InvNoBincl'] >"0")
echo "R {$row['InvNoBincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}





if ($in >2)
echo "<th><font color = green>{$row['InvNoC']}</font></th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoBincl']";

if ($indesc >2)
{
echo "<th>";
if ($row['InvNoCincl'] >"0")
echo "R {$row['InvNoCincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}





 if ($in >3)
echo "<th><font color = green>{$row['InvNoD']}</font></th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoC']";

if ($indesc >3)
{
echo "<th>";
if ($row['InvNoDincl'] >"0")
echo "R {$row['InvNoDincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}

 if ($in >4)
echo "<th><font color = green>{$row['InvNoE']}</font></th>";

$loop++;
//$PaidInvs[$loop]="$row['InvNoD']";

if ($indesc >4)
{
echo "<th>";
if ($row['InvNoEincl'] >"0")
echo "R {$row['InvNoEincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}



 if ($in >5)
echo "<th><font color = green>{$row['InvNoF']}</font></th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoE']";


if ($indesc >5)
{
echo "<th>";
if ($row['InvNoFincl'] >"0")
echo "R {$row['InvNoFincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}

 if ($in >6)
echo "<th><font color = green>{$row['InvNoG']}</th>";
$loop++;
//$PaidInvs[$loop]="$row['InvNoF']";
if ($indesc >6)
{
echo "<th>";
if ($row['InvNoGincl'] >"0")
echo "R {$row['InvNoGincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}


 if ($in >7)
echo "<th><font color = green>{$row['InvNoH']}</font></th>";

$loop++;
//$PaidInvs[$loop]="$row['InvNoG']";
if ($indesc >7)
//echo "<th>{$row['InvNoHincl']}</th>";//InhHincl  Dont forget to enable invoice descriptions as well
{
echo "<th>";
if ($row['InvNoHincl'] >"0")
echo "R {$row['InvNoHincl']}";
else
echo "&nbsp;";
echo "</th>";  //InAincl  from aproof table
}


//echo "<th>{$row['CustSDR']}</th>";//CustSDR
echo "<th>{$row['PMethod']}</th>";//EFT TMethod
echo "<th>{$row['Priority']}</th>";//priority

echo "</tr>";
}		}
    // free result set
    $result->close();
	
}
echo "</table>";


if ($un == 'Y')
echo "proofs Paid totals to: R ".$summm."<br />";
else
echo "Unreconciled proofs Paid totals to: R ".$summm."<br />";



/*$result=mysql_query($query);
//echo "<br><br>result: ".$result; //the whole content of the table is now require_onced in a PHP array with the name $result.
$num=mysql_numrows($result);//counts the rows

mysql_close();

/*echo "<br><br>";

$i=0;
while ($i < $num) {

$cell1 = mysql_result($result,$i,"productID");
$cell2 = mysql_result($result,$i,"orderID");
$cell3 = mysql_result($result,$i,"quantity");

echo "<b>$cell1
$cell2</b><br>$cell3<br><hr><br>";

$i++;
}
*/

/*$i=0;
while ($i < $num) {



$f1 = mysql_result($result,$i,"OrderNo");
$f2=mysql_result($result,$i,"ODate");
$f3=mysql_result($result,$i,"CustNo");
?>

<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
</tr>

<?php
$i++;
}









/*
echo "num: ".$num;

echo "<table><tr>";
$i = 0;
while($row = mysql_fetch_array($result)) {
  echo "<td>".$row['CustNo']."</td>";
  if (++$i % 5 == 0) {
    echo "</tr><tr>";
  }
}
echo "</tr></table>"
*/




/*$stid = oci_parse($c, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';
*/
 
?>
















<?php
/*echo "<br><br><br/><br><br><br><br/><br><br><br><br/><br><br><br><br/><br>2-dimensional table example<br>";
$myarray = array("key1"=>array(1,2,3,4),
                 "key2"=>array(2,3,"B",5),
                 "key3"=>array(3,4,5,6),
                 "key4"=>array("Z",5,6,"E")); //Having a key or not doesn't break it

echo "<table>";
foreach($myarray as $key => $element){
    echo "<tr>";
    foreach($element as $subkey => $subelement){
        echo "<td>$subelement</td>";
    }
    echo "</tr>";
}
echo "</table>";
*/



?>



<?php
//	require_once('footer.php');		
?>