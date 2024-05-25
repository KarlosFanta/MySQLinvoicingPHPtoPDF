<?php	
/*$ymtPd = 0;
//now we got to check the transactions table whehter this invoice was paid or not.
$InvNoA = '';
$InvNoB = '';
$InvNoC = '';
$InvNoD = '';
$InvNoE = '';
$InvNoF = '';
$InvNoG = '';
$queryT = "SELECT * FROM transaction WHERE InvNoA = '$InvNo' or WHERE InvNoB = '$InvNo'  or  InvNoC = '$InvNo'  or  InvNoD = '$InvNo'  or  InvNoE = '$InvNo'  or  InvNoF = '$InvNo'  or  InvNoG = '$InvNo' " ;
$queryT = "SELECT * FROM transaction WHERE InvNoA = '$InvNo' ";
echo "<br>queryT: ". $queryT."<br>";
if ($resultT = mysqli_query($wBConnect, $queryT)) {
  while ($rowI = mysqli_fetch_assoc($resultT)) {
$ymtPd = $rowI['AmtPaid'];
$InvNoA = $rowI['InvNoA'];
$InvNoB = $rowI['InvNoB'];
$InvNoC = $rowI['InvNoC'];
$InvNoD = $rowI['InvNoD'];
$InvNoE = $rowI['InvNoE'];
$InvNoF = $rowI['InvNoF'];
}}


if (($InvNoA == $InvNo) or ($InvNoB == $InvNo) or ($InvNoC == $InvNo))
@$wraft = 'Paid';








echo "";
*/

$zody= "";
$xl = "%0D%0A"; //new line
//$y0 = "Please note that there is a possibility in a small price increase in adsl costs during the first months of 2014".$xl.$xl.
//$y0 = "Thank you for your order.";
$y1 = "Statement";

$y2 = "";

$y2b = "";
//$tarlySDR = $Abbr.',acc'.$CustNo.',inv'.$InvNo.','.$Summary;
$y3 = "Recommended payment reference:         ".$Abbr." statement";
//a4 = "Recommended beneficiary statement description (CR): ".$Abbr." statement";
$y4 = "";
$y5 = "";

$y6 = "Please send proof of payments to cyberkarl3@gmail.com";
$y7 = "Banking details:";
$y8 = "Account holder: KARL";
$y9 = "Bank: Nedbank Limited /Nedcor";
$z1 = "Branch Code: 198765 (Universal branch number)";
$z2 = "(Other branch codes: 19876500,123009, 12300900 )";
$z3 = "Account Number: 1230583114";
$z4 = "(Branch: Go Banking CT Gardens Centre, South Western Cape)";
$z5 = "Type of Account: Current cheque account";
$z6 = "NB: For cash payments please make sure you have a receipt with my signature.";



$z7 = "VAT no 4390243923 as from 1.3.2008";
$z8 = "Thank you";
$z9 = "Karl Lompa";
$za = "PC and Notebook Sales & Advanced I.T. Support";
$za = "PC and Notebook Sales and Advanced I.T. Support";
$zb = "Karl Lompa's Fast Internet and Webhosting Solutions";
//$zb = "Karl Lompa s Fast Internet and Webhosting Solutions";
$zc = "www.kconnect.co.za";
$zd = "Email: cyberkarl3@gmail.com";

$ze = "Fax: 0865492415";
$zf = "Skype: cyberkarl3";
$zg = "Sales terms: www.k-connect.co.za/terms";
//$zg = "Sales terms: www.k-connect.co.zaterms";
$zh = "Internet and Email Support: www.karl.co.za/support";
//$zh = "Internet and Email Support www.karl.co.zasupport";
$xl = "<br>";
//echo $zody.$xl.$z1.$xl.$z2.$xl.$z3.$xl.$z4.$xl.$z5.$xl.$z6.$xl.$z7.$xl.$xl.$z8.$xl.$xl.$z9.$xl.$xl.$za.$xl.$xl.$zb.$xl.$xl.$zc.$xl.$xl.$zd.$xl.$xl.$ze.$xl.$xl.$zf.$xl.$xl.$zg.$xl.$xl.$zh;


$xl = "%0D%0A"; //new line
$zody = "";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php if (@$wraft == 'Paid')
echo "PAID ";  ?>Statement&body=<?php echo $zody.
$xl.$xl.$y1.$xl.$y2.$xl.$y2b.$xl.$xl.$y3.$xl.$y4.$xl.$y5.$xl.$y6.$xl.$y7.$xl.$xl.$y8.
$xl.$y9.$xl.$z1.$xl.$z2.$xl.$z3.$xl.$z5.$xl.$xl.$z6.$xl.$z7.$xl.$xl.$z8.
$xl.$z9.$xl.$xl.$za.$xl.$zb.$xl.$zc.$xl.$xl.$zd.$xl.$zf.$xl.$xl.$zg.$xl.$xl.$zh ?>">
Click to EMail Statement to customer</a><br>
</font>
<br>




