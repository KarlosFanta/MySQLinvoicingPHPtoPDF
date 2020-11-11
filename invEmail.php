<?php
$AmtPd = 0;
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
if ($resultT = mysqli_query($DBConnect, $queryT)) {
  while ($rowI = mysqli_fetch_assoc($resultT)) {
$AmtPd = $rowI['AmtPaid'];
$InvNoA = $rowI['InvNoA'];
$InvNoB = $rowI['InvNoB'];
$InvNoC = $rowI['InvNoC'];
$InvNoD = $rowI['InvNoD'];
$InvNoE = $rowI['InvNoE'];
$InvNoF = $rowI['InvNoF'];
}}


if (($InvNoA == $InvNo) or ($InvNoB == $InvNo) or ($InvNoC == $InvNo))
@$Draft = 'Paid';
/*
 //$TAmt = number_format ($TAmt, 2, ".", "");
 echo "<br>";
 //echo "TAmt:".$TAmt."<br>";
$IT= (($rowI["Q1"]*$rowI["ex1"]+$rowI["Q2"]*$rowI["ex2"]+$rowI["Q3"]*$rowI["ex3"]+
			$rowI["Q4"]*$rowI["ex4"]+$rowI["Q5"]*$rowI["ex5"]+$rowI["Q6"]*$rowI["ex6"]+
			$rowI["Q7"]*$rowI["ex7"]+$rowI["Q8"]*$rowI["ex8"])*1.14);
			$IT = number_format ($IT, 2, ".", "");
			//echo " R".$IT;
//echo "<br>";echo "<br>";

$ITN = number_format($IT,1); //I removed the last cent here
$TAmtN = number_format($TAmt,1);  //I removed the last cent here
//echo "<br>TAmtN: ".$TAmtN;
//echo "<br>ITN: ".$ITN;
if ($TAmtN != $ITN)
echo "<font face = 'arial' size = 5 color= red><b>WARNING TAmt does not equal Total</FONT></b>";

*/







echo "";

$body= "Hi";
$aa = "Hi";
$nl = "%0D%0A"; //new line
//$a0 = "Please note that there is a possibility in a small price increase in adsl costs during the first months of 2014".$nl.$nl.
$a0 = "Thank you for your order.";
if (@$Draft == 'Paid')
$a1 = "Please view attached paid invoice.";
else
if  (@$Draft == 'Now')
$a1 = "Please view attached invoice.";
else
$a1 = "Please view attached invoice and kindly arrange for payment.";

if (@$Draft == 'Paid')
$a2 = "";
else
$a2 = "(Possible more invoices following)";

$a2b = "(Statements can be requested)";

//$a3 = "Recommended payment reference:          ".$Abbr. ",".$SDR .",".$SDR .",".$SDR ."I-K-r-ug,in-v-5-180,We-bs-ite";
$a3 = "Recommended payment reference: (DR)         ".$SDR;
$a4 = "Recommended beneficiary statement description (CR): ".$SDR;
$a5 = "";

$a6 = "Please send proof of payments to CompanyEmail@me.co.za";
$a7 = "Banking details:";
$a8 = "Account holder: CompanyName";
$a9 = "Bank: BankName";
$b1 = "Branch Code: BrCode";
$b2 = "(Other branch codes: )";
$b3 = "Account Number: AccNo";
$b4 = "(Branch: BrName)";
$b5 = "Type of Account: AccType";
$b6 = "NB: For cash payments please make sure you have a receipt with my signature.";

$b7 = "VAT no VatNo";
$b8 = "Thank you";
$b9 = "CompanyName";
$ba = "CompanyLogo1";
$ba = "CompanyLogo2";
$bb = "CompanyLogo3";
$bc = "Website";
$bd = "ContactNos";
$be = "Fax: FaxNo";
$bf = "Skype: SkyepName";
$bg = "Sales terms: SalesWebpage";
$bh = "Support: SupportWebpage";
$nl = "<br>";
//echo $body.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b4.$nl.$b5.$nl.$b6.$nl.$b7.$nl.$nl.$b8.$nl.$nl.$b9.$nl.$nl.$ba.$nl.$nl.$bb.$nl.$nl.$bc.$nl.$nl.$bd.$nl.$nl.$be.$nl.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh;

if (@$Draft == 'Paid')
{
$a3 = "Recommended reference: (DR)         ".$SDR;
$a4 = "";
$a5 = "";

$a6 = "";
$a7 = "";
$a8 = "";
$a9 = "";
$b1 = "";
$b2 = "";
$b3 = "";
$b4 = "";
$b5 = "";
$b6 = "";

$b7 = "";
$b8 = "Thank you";
$b9 = "CompName";
$ba = "CompanyLogo1";
$ba = "CompanyLogo2";
$bb = "Company3";
$bc = "Website";
$bd = "ContactNos";
$be = "Fax: FaxNo";
$bf = "Skype: SkypeName";
$bg = "Sales terms: TermsWebpage";
$bh = "Support: SupportWebpage";
$nl = "<br>";

}

$nl = "%0D%0A"; //new line
$body = "";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php if (@$Draft == 'Paid')
echo "PAID ";  ?>Invoice No <?php echo $InvNo; echo " ".$Summary?>&body=<?php echo $body.
$nl.$aa.$nl.$a1.$nl.$a2.$nl.$a2b.$nl.$nl.$a3.$nl.$a4.$nl.$a5.$nl.$a6.$nl.$a7.$nl.$nl.$a8.
$nl.$a9.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b5.$nl.$nl.$b6.$nl.$b7.$nl.$nl.$b8.
$nl.$b9.$nl.$nl.$ba.$nl.$bb.$nl.$bc.$nl.$nl.$bd.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh ?>">
Click to EMail customer</a><br>
</font>
<br>




