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
$a7 = "Account holder: CompanyName";
$a8 = "Bank: BankName";
$a9 = "Account Number: BankAccNo";


$b1 =  "Branch No: BranchNo(universal)";
$b2 = "( BranchName: ";
$b3 = "Type of Account: AccountType";
//$b4 = "Amount: R". $AmtPaid;
$b5 = "Proof of payment can be sent to: ProofEmail";
$b6 = "(other branch codes: OtherBranchCodes )";
$b7 = "VAT no VATNo";
$b8 = "Thank you";
$b9 = "CompanyName";
$ba = "CompanyLogo1";
$ba = "CompanyLogo2";
$bb = "CompanyLogo3";
$bc = "CompanyWebsite";
$bd = "CompanyContact";
$be = "FaxNo";
$bf = "SkypeName";
$bg = "Sales terms: TermsWebpage";
$bh = "Support: SupportWebpage";
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
Click to EMail customer</a><br>
</font>
<br>




