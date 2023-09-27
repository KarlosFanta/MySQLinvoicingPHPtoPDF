<?php	
	






echo "";

$body= "<b>DRAFT STATEMENT </b>&nbsp;&nbsp;This statement may be incomplete  &nbsp;&nbsp;&nbsp;  Date: '.date('j M Y G:i').' ";

$a0 = "";
$a1 = "";
$a2 = "Please view the above draft statement and kindly arrange for payment.";
$a3 = "Recommended statement payment description (DR): ".$Abbr. " stm";
$a4 = "Benficiary statement payment description (DR): ".$Abbr. " stm";
$a5 = "NB: For cash payments please make sure you have a receipt with my signature.";
$a6 = "(EFT) Banking details:";
$a7 = "Account holder: KARL";
$a8 = "Bank: Nedbank Limited(/Nedcor)";
$a9 = "Account Number: 1230583114";


$b1 =  "Branch No: 198765(universal)";
$b2 = "( Branch: Go Banking CT Gardens Centre(South Western Cape) )";
$b3 = "Type of Account: Current cheque account";
//$b4 = "Amount: R". $AmtPaid;
$b5 = "Proof of payment can be sent to: cyberkarl3@gmail.com ";
$b6 = "(other branch codes: 19876500,123009, 12300900 )";
$b7 = "VAT no 4390243923 as from 1.3.2008";
$b8 = "Thank you";
$b9 = "Karl";
$ba = "PC and Notebook Sales & Advanced I.T. Support";
$ba = "PC and Notebook Sales and Advanced I.T. Support";
$bb = "Karl's Fast Internet and Webhosting Solutions";
$bc = "www.kconnect.co.za";
$bd = "Email: cyberkarl3@gmail.com";

$be = "Fax: 0865492415";
$bf = "Skype: cyberkarl3";
$bg = "Sales terms: www.k-connect.co.za/terms";
//$bg = "Sales terms: www.k-connect.co.zaterms";
$bh = "Internet & Email Support: www.karl.co.za/support";
//$bh = "Internet and Email Support www.karl.co.zasupport";
$nl = "<br>";
//echo $body.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b4.$nl.$b5.$nl.$b6.$nl.$b7.$nl.$nl.$b8.$nl.$nl.$b9.$nl.$nl.$ba.$nl.$nl.$bb.$nl.$nl.$bc.$nl.$nl.$bd.$nl.$nl.$be.$nl.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh;

$nl = "%0D%0A"; //new line
$body = "";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=Statement&body=
<?php echo $body.$nl.$a1.$nl.$a2.$nl.$a3.$nl.$a4.$nl.$a5.$nl.$a6.$nl.$a7.$nl.$nl.$a8.
$nl.$a9.$nl.$b1.$nl.$b2.$nl.$b3.$nl.$b5.$nl.$b6.$nl.$b7.$nl.$nl.$b8.
$nl.$b9.$nl.$nl.$ba.$nl.$bb.$nl.$bc.$nl.$nl.$bd.$nl.$bf.$nl.$nl.$bg.$nl.$nl.$bh ?>">
Click to EMail  customer</a><br>
</font>
<br>




