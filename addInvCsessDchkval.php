<html>
<head>
  <meta charset="utf-8">
<title>Add Invoice ProcessC</title>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
</script>
</head>
<!--<body onload="noBack();" onpageshow="if(event.persisted)noBack();" onunload="">-->
<?php
	require_once("inc_OnlineStoreDB.php");
	require_once("header.php");//page567
	
$CustNUMMM = '';
// from addInvCsessDchk.php


$InvNo = 0;
$CustNo = '';
$CustNo = $_POST['CustNo']; //DO NOT REMOVE! DO NOT REMOVE!!!
$CustInt = $CustNo;
if ($CustNo == "")
echo "<b><font size = 4 color = red>error, no Customer Number!!!</font>";

$InvDate = '';
$StkInvNo ='';
$StkInvNo = $_POST['StkInvNo'];
//echo "StkInvNo: $StkInvNo";
$InvNo ='';
$InvNo = $_POST['InvNo'];
//echo "InvNo: $InvNo";



$DD1 = '';
$DD1 = $_POST['DD1'];
$DD2 = '';
$DD2 = $_POST['DD2'];
$DD3 = '';
$DD3 = $_POST['DD3'];
$DD4 = '';
$DD4 = $_POST['DD4'];
$DD5 = '';
$DD5 = $_POST['DD5'];
$DD6 = '';
$DD6 = $_POST['DD6'];
$DD7 = '';
$DD7 = $_POST['DD7'];
$DD8 = '';
$DD8 = $_POST['DD8'];



if ($StkInvNo == 'Y')
{
$clExpC ='';
$clExpC = $_POST['clExpC'];
echo "&nbsp;&nbsp;&nbsp; clExpC:".$clExpC;
$cl = explode('[', $clExpC );
//echo "<br>cl[0]:".$cl[0]."<br> ";
$clExpC = $cl[0];
str_replace(array("NOT", ""), "", $clExpC);
$unwanted = array("NOT", "ALLOCATED", ":", " ");
$clExpC = str_replace($unwanted, "", $clExpC);


//echo "str clExpC:".$clExpC."<"; //invoice number
$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $clExpC";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successfull check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";
}

if ($DD1 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD1";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE1 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successfull check inside addInvCsessDchkval.php, product maybe already assigned to another invoice :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}



if ($DD2 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD2";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE2 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successfull check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'http://localhost:8080/phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}

if ($DD3 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD3";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE3 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successfull check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}


if ($DD4 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD4";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE4 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successfull check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}



if ($DD5 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD5";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE5 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successful check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}


if ($DD6 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD6";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE6 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successful check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}


if ($DD7 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD7";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE7 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successful check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}


if ($DD8 !='')
{
	$query="update expenses set InvNo = '$InvNo', CustNo = '$CustNo' where ExpNo = $DD8";

mysqli_query($DBConnect, $query);
echo "<br>EXPENSE8 UPDATED:&nbsp;&nbsp;&nbsp;&nbsp; Q: ". $query;

//printf(";<br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("%s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {
	 echo "<br><FONT size = '5' color = red><b>NOT successful check inside addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=expenses&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php' target = _blank>open PHPAdmin</a>";
 }
 else
 echo "<font size = 1 color='green'>update successful</font>";

}








$InvSQLDateDD = '';
$InvSQLDateMM = '';
$InvSQLDateYY = '';
$InvPdStatus = '';
$Summary ='';
$CustEmail ='';

$D1 = '';
$Q1 = '';
$ex1 = '';
$D2 = '';
$Q2 = '';
$ex2 = '';
$D3 = '';
$Q3 = '';
$ex3 = '';
$D4 = '';
$Q4 = '';
$ex4 = '';
$D5 = '';
$Q5 = '';
$ex5 = '';
$D6 = '';
$Q6 = '';
$ex6 = '';
$D7 = '';
$Q7 = '';
$ex7 = '';
$D8 = '';
$Q8 = '';
$ex8 = '';
$SubjINVOICE = "Invoice";
$credit = "";
$credit = $_POST['credit'];
if ($credit == 'Y')
$SubjINVOICE = 'Credit Note';
$Topup = "";
$Topup = $_POST['topup'];
//$adslinv = "";
//$adslinv = $_POST['adslinv'];
$Confid = "";
$Confid = $_POST['Confid'];
$Important = "";
$Important = $_POST['Important'];
$Extra = "";
$Extra = $_POST['Extra'];
//$Extra = mysqli_real_escape_string($DBConnect, $Extra);

$InvNo = $_POST['InvNo'];
$CustEmail = @$_POST['CustEmail'];
$CustEmail2 = $CustEmail; //required for body tag after all the inc ludes 201 4
$Inv_NoInt = intval($InvNo); //required for insert statement


//$InvDate = $_POST['InvDate'];
$InvSQLDateDD = $_POST['InvSQLDateDD'];
$InvSQLDateMM = $_POST['InvSQLDateMM'];
$InvSQLDateYY = $_POST['InvSQLDateYY'];


$Da1 = explode("/", $InvDate);
//echo $Da1[2]."____";
//echo $Da1[0]."____";
//echo $Da1[1]."____";

//$InvSQLDate = $Da1[2]."-".$Da1[1]."-".$Da1[0];
$InvSQLDate = $InvSQLDateYY."-".$InvSQLDateMM."-".$InvSQLDateDD;
//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";
$Draft = '';
$Draft = $_POST['Draft'];//this is only if invoice is a draft tmeplate.
echo "Draft: ".$Draft;

//draft has nothing to do with InvPdStatus paid just now/ Y/ Paid

 $InvPdStatus2 = ''; //somehow not used yet.
$InvPdStatus = $_POST['InvPdStatus'];
if ($InvPdStatus == 'Paid')
   $InvPdStatus2  = 'Y';
if ($InvPdStatus == 'Now')
   $InvPdStatus2  = 'Y'; //this is for 'paid just now'
echo " InvPdStatus: ".$InvPdStatus;

$D1 = $_POST['D1'];
$Q1 = $_POST['Q1'];
$ex1 = $_POST['ex1'];
//$ex1= @number_format ($ex1, 4, ".", "");
//$ex1= floatval($ex1);
$D2 = $_POST['D2'];
$Q2 = $_POST['Q2'];
$ex2 = $_POST['ex2'];
//$ex2= @number_format ($ex2, 4, ".", "");
//$ex2= floatval($ex2);
$D3 = $_POST['D3'];
$Q3 = $_POST['Q3'];
$ex3 = $_POST['ex3'];
//if ($ex3== '')
//$ex3 = 0;

//$ex3= @number_format ($ex3, 4, ".", "");
//$ex3= floatval($ex3);
$D4 = $_POST['D4'];
$Q4 = $_POST['Q4'];
$ex4 = $_POST['ex4'];
//if ($ex4== '')
//$ex4 = 0;

//$ex4= number_format ($ex4, 4, ".", "");
//$ex4 = floatval($ex4);
$D5 = $_POST['D5'];
$Q5 = $_POST['Q5'];
$ex5 = $_POST['ex5'];
//if ($ex5== '')
//$ex5 = 0;
//$ex5= number_format ($ex5, 4, ".", "");
//$ex5= floatval($ex5);
$D6 = $_POST['D6'];
$Q6 = $_POST['Q6'];
$ex6 = $_POST['ex6'];
//if ($ex6== '')
//$ex6 = 0;
//$ex6= number_format ($ex6, 4, ".", "");
//$ex6= floatval($ex6);
$D7 = $_POST['D7'];
$Q7 = $_POST['Q7'];
$ex7 = $_POST['ex7'];
//if ($ex7== '')
//$ex7 = 0;
//$ex7= number_format ($ex7, 4, ".", "");
//$ex7= floatval($ex7);
$D8 = $_POST['D8'];
$Q8 = $_POST['Q8'];
$ex8 = $_POST['ex8'];
//if ($ex8== '')
//$ex8 = 0;

//$ex8= number_format ($ex8, 4, ".", "");
//$ex8= floatval($ex8);
$Abbr = $_POST['Abbr'];
if ($Abbr == "")
echo "<b><font size = '3' color= 'red'><b>WARNING Abbr is empty this will affect the SDR and Summary combo!</font></b>";
$Summary = $_POST['Summary'];

$TotAmt = '';
$TotAmt = $_POST['TotAmt'];


 echo "";
 //echo "TAmt:".$TAmt."<br>";
$IT1 = '';
@$IT1= (($Q1*$ex1+$Q2*$ex2+$Q3*$ex3+
			$Q4*$ex4 + $Q5*$ex5 + $Q6*$ex6+
			$Q7*$ex7 + $Q8*$ex8)*1.15); //newVAT
			$IT1 = number_format ($IT1, 2, ".", "");// //A non-numeric value encountered 
			//echo " R".$IT1;
//echo "<br>";echo "<br>";
// $TAmt = $Q1*$ex1+$W*$ex2+$W3*$ex3+$W4*$ex4+$W4*$ex4+$W5*$ex5+$W6*$ex6+$W7*$ex7+$W8*$ex8;

 $IT1 = number_format($IT1, 2, ".", "");
//$TotAmt = $IT1;


$IT2 = number_format($IT1,1); //I removed the last cent here
$TAmtN = number_format($TotAmt,1);  //I removed the last cent here
//echo "<br>TAmtN: ".$TAmtN;
//echo "<br>IT2: ".$IT2;
if ($TAmtN != $IT2)
{


echo "<font face = 'arial' size = 5 color= red><b>WARNING IT1 does not equal Total</FONT></b><br>";
echo "<font face = 'arial' size = 5 color= red><b>correct invoice below before submitting:!</FONT></b><br>";

echo "<font face = 'arial' size = 5 color= red><b>(don't click back)</FONT></b><br>";
include "addinvCsessDchk.php";
}
else
{
//echo "validated : TAmtN == IT2";
include "addInvprocess_lastC.php";
}

?>
