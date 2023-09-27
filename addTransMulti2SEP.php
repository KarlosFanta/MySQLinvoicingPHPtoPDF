<html>
<head>
<title>mutlti transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
</head>

<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$subjj2= '';
$subjj='';
$AP = '';
$AP = $_POST['AP'];
/*
if (isset($_POST["AP"])) 
{
  $user = $_POST["AP"];
  echo $user;
  echo " is your AP";
} 
else 
{
  $user = null;
  echo "no username supplied";
}
*/
//echo "AP: " .$AP."</BR>";
//echo "<input type = 'hidden' name= 'AP' value = '$AP'>";
$Flag = '';
$Flag = @$_POST['Flag'];


$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";

echo "CustNo: ".$CustNo;

$PayNotes= "";
$PayNotes = $_POST['PayNotes'];
$PayNotes = mysqli_real_escape_string($DBConnect, $PayNotes); 
$TransNo = 0;
$TransNo = $_POST['TransNo'];
$TransNo2 = 0;
$TransNo2 = $_POST['TransNo2'];
$TransNo3 = 0;
$TransNo3 = @$_POST['TransNo3'];
$TransNo4 = 0;
$TransNo4 = @$_POST['TransNo4'];
$TransNo5 = 0;
$TransNo5 = @$_POST['TransNo5'];
$TransNo6 = 0;
$TransNo6 = @$_POST['TransNo6'];
$TransNo7 = 0;
$TransNo7 = @$_POST['TransNo7'];
$TransNo8 = 0;
$TransNo8 = @$_POST['TransNo8'];

$Priority = '.';
$TransDate1 = '';
$TransDate2 = '';
$TransDate3 = '';
$TransDate4 = '';
$TransDate5 = '';
$TransDate6 = '';
$TransDate7 = '';
$TransDate8 = '';
$AmtPaid1 = '';
$AmtPaid1 = $_POST['AmtPaid1'];
$AmtPaid2 = '';
$AmtPaid2 = $_POST['AmtPaid2'];
$AmtPaid3 = '';
$AmtPaid3 = @$_POST['AmtPaid3'];
$AmtPaid4 = '';
$AmtPaid4 = @$_POST['AmtPaid4'];
$AmtPaid5 = '';
$AmtPaid5 = @$_POST['AmtPaid5'];
$AmtPaid6 = '';
$AmtPaid6 = @$_POST['AmtPaid6'];
$AmtPaid7 = '';
$AmtPaid7 = @$_POST['AmtPaid7'];
$AmtPaid8 = '';
$AmtPaid8 = @$_POST['AmtPaid8'];
$Notes = '';
$Notes = $_POST['Notes'];
$Notes2 = '';
$Notes2 = $_POST['Notes2'];
$Notes3 = '';
$Notes3 = $_POST['Notes3'];
$Notes4 = '';
$Notes4 = $_POST['Notes4'];
echo "N4:".$Notes4."<>";
$CustSDR1 ='';
$TMethod = '';
$TMethod = $_POST['TMethod'];
$TMethod2 = '';
$TMethod2 = $_POST['TMethod2'];
$TMethod3 = '';
$TMethod3 = @$_POST['TMethod3'];
$TMethod4 = '';
$TMethod4 = @$_POST['TMethod4'];
$TMethod5 = '';
$TMethod5 = @$_POST['TMethod5'];
$TMethod6 = '';
$TMethod6 = @$_POST['TMethod6'];
$TMethod7 = '';
$TMethod7 = @$_POST['TMethod7'];
$TMethod8 = '';
$TMethod8 = @$_POST['TMethod8'];
$ProofCustSDR = '';
$InvNoA = '';
$InvNoAincl = 0;
$InvNoA2 = '';
$InvNoA2incl = 0;
$InvNoA3 = '';
$InvNoA3incl = 0;
$InvNoA4 = '';
$InvNoA4incl = 0;
$InvNoA5 = '';
$InvNoA5incl = 0;
$InvNoA6 = '';
$InvNoA6incl = 0;
$InvNoA7 = '';
$InvNoA7incl = 0;
$InvNoA8 = '';
$InvNoA8incl = 0;






$InvNoB = 0;
$InvNoBincl = 0;
$InvNoC = 0;
$InvNoCincl = 0;
$InvNoD = 0;
$InvNoDincl = 0;
$InvNoE = 0;
$InvNoEincl = 0;
$InvNoF = 0;
$InvNoFincl = 0;
$InvNoG = 0;
$InvNoGincl = 0;
$InvNoH = 0;
$InvNoHincl = 0;
$InvNoA = @$_POST['InvNoA'];
$InvNoA2 = $_POST['InvNoA2'];
echo "InvNoA2: ".$InvNoA2."<>";
$InvNoA3 = $_POST['InvNoA3'];
$InvNoA4 = $_POST['InvNoA4'];
$InvNoA5 = @$_POST['InvNoA5'];
$InvNoA6 = @$_POST['InvNoA6'];
$InvNoA7 = @$_POST['InvNoA7'];
$InvNoA8 = @$_POST['InvNoA8'];
if ($InvNoA == '')
echo "<b>Please note: no invoice found in the transaction.<br> Transaction unidentified</b><br><br><br>";

$InvNoAincl = $_POST['InvNoAincl'];
$InvNoA2incl = $_POST['InvNoA2incl'];
$InvNoA3incl = $_POST['InvNoA3incl'];
$InvNoA4incl = $_POST['InvNoA4incl'];
$InvNoA5incl = @$_POST['InvNoA5incl'];
$InvNoA6incl = @$_POST['InvNoA6incl'];
$InvNoA7incl = @$_POST['InvNoA7incl'];
$InvNoA8incl = @$_POST['InvNoA8incl'];

$InvNoB = @$_POST['InvNoB'];
$InvNoBincl = @$_POST['InvNoBincl'];
$InvNoC = @$_POST['InvNoC'];
$InvNoCincl = @$_POST['InvNoCincl'];
$InvNoD = @$_POST['InvNoD'];
$InvNoDincl = @$_POST['InvNoDincl'];
$InvNoE = @$_POST['InvNoE'];
$InvNoEincl = @$_POST['InvNoEincl'];
$InvNoF = @$_POST['InvNoF'];
$InvNoFincl = @$_POST['InvNoFincl'];
$InvNoG = @$_POST['InvNoG'];
$InvNoGincl = @$_POST['InvNoGincl'];
$InvNoH = @$_POST['InvNoH'];
$InvNoHincl = @$_POST['InvNoHincl'];
//$Priority = $_POST['Priority'];
$Priority = '.';
$ProofNo = '';
$ProofNo = @$_POST['ProofNo']; //sometimes a proof number is preselected.
echo "ProofNo:<input type='text' name='ProofNo' value= '$ProofNo'>";
if($AP == 'AddAProof' or $AP == 'AddAProofSAMEDATE')
{
	$subjj = ' and Proof';
	$subjj2 = ' and Proof ';
	$ProofDate = $_POST['ProofDate'];

$D2 = explode("/", $ProofDate);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$ProofDateSQL = $D2[2]."-".$D2[1]."-".$D2[0];
$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8
$ProofCustSDR = $_POST['ProofCustSDR'];
$ProofCustSDR = mysqli_real_escape_string($DBConnect, $ProofCustSDR); 
mb_convert_encoding($ProofCustSDR, "ISO-8859-1");
echo "CSR: $ProofCustSDR &nbsp;&nbsp;&nbsp;";
echo "CSR:special".htmlspecialchars($ProofCustSDR);
echo "&nbsp;&nbsp;CSR:htmlentities".htmlentities($ProofCustSDR);
//$ProofCustSDR = str_replace("\xC2","SPACE",$ProofCustSDR);
//$ProofCustSDR = str_replace(" ","SPACE",$ProofCustSDR);
//$ProofCustSDR = str_replace("&nbsp;","SPACE",$ProofCustSDR);
$ProofCustSDR = str_replace("\xC2","_",$ProofCustSDR);
$ProofCustSDR = str_replace(" ","_",$ProofCustSDR);
$ProofCustSDR = str_replace("&nbsp;","_",$ProofCustSDR);
echo "CSRProofCustSDR:htmlentities".htmlentities($ProofCustSDR);

	
	echo "<br><br>proof provided same time as transaction:<br>";
	echo "insert new proof<br>";
	$query="insert into aproof (ProofNo, CustNo, ProofDate, Amt, Notes, CustSDR, PMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority, TransNo )
VALUES
( '$ProofNo',  $CustNo, '$ProofDateSQL', $AmtPaid1, '$Notes', '$ProofCustSDR', '$TMethod', 
'$InvNoA', '$InvNoAincl' ,  '$InvNoB', '$InvNoBincl' ,  '$InvNoC', '$InvNoCincl' ,
'$InvNoD',  '$InvNoDincl' ,  '$InvNoE', '$InvNoEincl' ,  '$InvNoF', '$InvNoFincl' ,
'$InvNoG',  '$InvNoGincl' , '$InvNoH',  '$InvNoHincl' , '$Priority', '$TransNo') ";


//echo '</br>';


mysqli_query($DBConnect, $query);

 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";






















//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><font size = 5  color = red><b>insert into aproof NOT successfull!!!</b>!!</b></font><br>NB if duplicate error then ProofNos are missing: $ProofNo<br><textarea>$query</textarea><br>";
else
echo "<font size = 4>insert success! </font><br>";















//php to sql does not understand semicolon. remove the semicolon!!!


$SQLString = "SELECT * FROM aproof WHERE ProofNo = $ProofNo";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Added the proof:</b> </font>

</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ProofNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["ProofDate"];
$item4 = $row["Amt"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["PMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;
}
$result->free();

}
	

	
	
}
else
{
	echo " &nbsp;&nbsp;&nbsp;no AP: no proof provided except if preselected&nbsp;&nbsp;&nbsp;";
}


$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";









$CC = "SELECT * FROM customer WHERE CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $CC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustLN = $row["CustLN"];
$Abbr = $row['ABBR'];
$CustEmail = $row["CustEmail"];

}
mysqli_free_result($resultC);
}

$CustEmail = str_replace(';', '; ', $CustEmail);

$TransDate1 = $_POST['TransDate1'];
$TransDate2 = $_POST['TransDate2'];
$TransDate3 = @$_POST['TransDate3'];
$TransDate4 = @$_POST['TransDate4'];
$TransDate5 = @$_POST['TransDate5'];
$TransDate6 = @$_POST['TransDate6'];
$TransDate7 = @$_POST['TransDate7'];
$TransDate8 = @$_POST['TransDate8'];

$Dt1 = explode("/", $TransDate1);
$TransDateDB1 = $Dt1[2]."-".$Dt1[1]."-".$Dt1[0];
$tmp = $Dt1[0];
$tmp = $tmp++;
echo "<br>TD: ".$TransDateDB1."<br>" ;
$TransDateNext = date('Y-m-d', strtotime($TransDateDB1 . ' +1 day'));
//echo "<br>TD: ".$TransDateNext."<br>" ;
$TTTDt1 = explode("-", $TransDateNext);
$TransDateNext = $TTTDt1[2]."/".$TTTDt1[1]."/".$TTTDt1[0];
//echo "<br>TD: ".$TransDateNext."<br>" ;

//echo $TransDateDB1;	 
//$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8


$Dt2 = explode("/", $TransDate2);
$TransDateDB2 = $Dt2[2]."-".$Dt2[1]."-".$Dt2[0];
echo "<br>TD2: ".$TransDateDB2."<br>" ;

$Dt3 = explode("/", $TransDate3);
$TransDateDB3 = $Dt3[2]."-".$Dt3[1]."-".$Dt3[0];
echo "<br>TD: ".$TransDateDB3."<br>" ;

$Dt4 = explode("/", $TransDate4);
$TransDateDB4 = $Dt4[2]."-".$Dt4[1]."-".$Dt4[0];
echo "<br>TD: ".$TransDateDB4."<br>" ;

$Dt5 = explode("/", $TransDate5);
@$TransDateDB5 = $Dt5[2]."-".$Dt5[1]."-".$Dt5[0];
echo "<br>TD: ".$TransDateDB5."<br>" ;

$Dt6 = explode("/", $TransDate6);
@$TransDateDB6 = $Dt6[2]."-".$Dt6[1]."-".$Dt6[0];
echo "<br>TD: ".$TransDateDB6."<br>" ;

$Dt7 = explode("/", $TransDate7);
@$TransDateDB7 = $Dt7[2]."-".$Dt7[1]."-".$Dt7[0];
echo "<br>TD: ".$TransDateDB7."<br>" ;

$Dt8 = explode("/", $TransDate8);
@$TransDateDB8 = $Dt8[2]."-".$Dt8[1]."-".$Dt8[0];
echo "<br>TD: ".$TransDateDB8."<br>" ;

//echo $TransDateDB2;	 
//$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8

$CustSDR1 = $_POST['CustSDR1'];
$CustSDR2 = $_POST['CustSDR2'];
$CustSDR3 = @$_POST['CustSDR3'];
$CustSDR4 = @$_POST['CustSDR4'];
$CustSDR5 = @$_POST['CustSDR5'];
$CustSDR6 = @$_POST['CustSDR6'];
$CustSDR7 = @$_POST['CustSDR7'];
$CustSDR8 = @$_POST['CustSDR8'];
echo "the character coding for CustSDR1: >"; //sometimes I copy directly from Online Banking HTML
echo mb_detect_encoding($CustSDR1). "< ";
//if copied from HTML then convert to UTF8
$CustSDR1 = iconv('ASCII', 'UTF-8//IGNORE', $CustSDR1);
$CustSDR1 = str_replace(" ","SPACE",$CustSDR1);
echo "the character coding for CustSDR2: >"; //sometimes I copy directly from Online Banking HTML
echo mb_detect_encoding($CustSDR2). "< ";
//if copied from HTML then convert to UTF8
$CustSDR2 = iconv('ASCII', 'UTF-8//IGNORE', $CustSDR2);
$CustSDR2 = str_replace(" ","SPACE",$CustSDR2);

$CustSDR1insert = str_replace("SPACE"," ",$CustSDR1);
$CustSDR2insert = str_replace("SPACE"," ",$CustSDR2);
$CustSDR3insert = str_replace("SPACE"," ",$CustSDR3);
$CustSDR4insert = str_replace("SPACE"," ",$CustSDR4);
$CustSDR5insert = str_replace("SPACE"," ",$CustSDR5);
$CustSDR6insert = str_replace("SPACE"," ",$CustSDR6);
$CustSDR7insert = str_replace("SPACE"," ",$CustSDR7);
$CustSDR8insert = str_replace("SPACE"," ",$CustSDR8);
$CustSDR1 = mysqli_real_escape_string($DBConnect, $CustSDR1); 
$CustSDR2 = mysqli_real_escape_string($DBConnect, $CustSDR2); 
$CustSDR3 = mysqli_real_escape_string($DBConnect, $CustSDR3); 
$CustSDR4 = mysqli_real_escape_string($DBConnect, $CustSDR4); 
$CustSDR5 = mysqli_real_escape_string($DBConnect, $CustSDR5); 
$CustSDR6 = mysqli_real_escape_string($DBConnect, $CustSDR6); 
$CustSDR7 = mysqli_real_escape_string($DBConnect, $CustSDR7); 
$CustSDR8 = mysqli_real_escape_string($DBConnect, $CustSDR8); 
//$CustSDR1 = mb_substr($CustSDR1,0,10,'utf-8');
/*mb_convert_encoding($CustSDR1, "ISO-8859-1");
echo "the character coding for CustSDR1: ";
echo mb_detect_encoding($CustSDR1). " ";

echo "CSR: $CustSDR1";
*/
/*echo "CSRspecial:".htmlspecialchars($CustSDR1);
echo "CSRhtmlentities:".htmlentities($CustSDR1);
$CustSDR1 = str_replace("\xC2","SPACE",$CustSDR1);
$CustSDR1 = str_replace(" ","SPACE",$CustSDR1);
$CustSDR1 = str_replace("&nbsp;","SPACE",$CustSDR1);
*///http://archive.oreilly.com/pub/post/turning_mysql_data_in_latin1_t.html
//ALOT HAPPEND IN addTMchk.php

//echo "CSRspecial:".htmlspecialchars($CustSDR1);
//echo "CSRhtmlentities:".htmlentities($CustSDR1); //why does this show blank this time

//$CustSDR1 = ereg_replace("[^A-Za-z0-9\w\ &nbsp;]", "", $CustSDR1); //Function ereg_replace() is deprecated  preg_replace() is alternative
//echo "SPCYCSR: $CustSDR1";

//$CustSDR1 = preg_replace("/[\s_]/", "-", $CustSDR1);

//mb_convert_encoding($CustSDR1, "UTF-8");
if ($Flag == 'Fast')
$CustSDR1 = str_replace("SPACE"," ",$CustSDR1); //for RAMCOPY to work
else
$CustSDR1 = str_replace("SPACE","%20",$CustSDR1); //for mailto to 
//echo " back to whitepace: $CustSDR1";

$CustSDR2 = str_replace("SPACE","%20",$CustSDR2); //for mailto to 
$CustSDR3 = str_replace("SPACE","%20",$CustSDR3); //for mailto to 
$CustSDR4 = str_replace("SPACE","%20",$CustSDR4); //for mailto to 
$CustSDR5 = str_replace("SPACE","%20",$CustSDR5); //for mailto to 
$CustSDR6 = str_replace("SPACE","%20",$CustSDR6); //for mailto to 
$CustSDR7 = str_replace("SPACE","%20",$CustSDR7); //for mailto to 
$CustSDR8 = str_replace("SPACE","%20",$CustSDR8); //for mailto to 


//echo " notes:".$Notes ;
//$str = htmlentities('$Notes'); //causes a blank!
//$Notes = htmlspecialchars($Notes);
$charset = mysqli_character_set_name($DBConnect);
printf ("%s\n",$charset);
//$Notes = htmlspecialchars("$Notes", ENT_QUOTES);

//header( "Content-Type: text/html; charset=utf-8" );
/*$body = "begrüßen zu dürfen";
$g = "ben zu fen";
echo htmlentities( $body );
echo htmlentities( $g );
*/

/*htmlXspecialchars($Notes);
htmlXentities($Notes);
htmlX_entity_decode($Notes);
*/
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$Notes2 = str_replace('"', '&quot;', $Notes2);  //for mailto: emails.
@$Notes3 = str_replace('"', '&quot;', $Notes3);  //for mailto: emails.
@$Notes4 = str_replace('"', '&quot;', $Notes4);  //for mailto: emails.
@$Notes5 = str_replace('"', '&quot;', $Notes5);  //for mailto: emails.
@$Notes6 = str_replace('"', '&quot;', $Notes6);  //for mailto: emails.
@$Notes7 = str_replace('"', '&quot;', $Notes7);  //for mailto: emails.
@$Notes8 = str_replace('"', '&quot;', $Notes8);  //for mailto: emails.
$EEmail = $Notes;  
echo "N4:q".$Notes4."<>";

$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014
$Notes2 = htmlentities( $Notes2, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014
//@$Notes3 = htmlentities( $Notes, ENT_SUBSTITUTE3 ); 
//@$Notes4 = htmlentities( $Notes, ENT_SUBSTITUTE4 ); 
@$Notes5 = htmlentities( $Notes, ENT_SUBSTITUTE5 ); 
@$Notes6 = htmlentities( $Notes, ENT_SUBSTITUTE6 ); 
@$Notes7 = htmlentities( $Notes, ENT_SUBSTITUTE7 ); 
@$Notes8 = htmlentities( $Notes, ENT_SUBSTITUTE8 ); 

echo "N:h".$Notes."<>";
echo "N2:h".$Notes2."<>";
echo "N3:h".$Notes3."<>";
echo "N4:h".$Notes4."<>";


$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é","\xA0");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;","&nbsp;");
$Notes = str_replace($von, $zu, $Notes);  
$Notes2 = str_replace($von, $zu, $Notes2);  
$CustSDR1 = str_replace($von, $zu, $CustSDR1);  
$CustSDR2 = str_replace($von, $zu, $CustSDR2);  
//echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); 
$Notes2 = mysqli_real_escape_string($DBConnect, $Notes2); 
$CustSDR1 = mysqli_real_escape_string($DBConnect, $CustSDR1); 
$CustSDR2 = mysqli_real_escape_string($DBConnect, $CustSDR2); 
//dbl  backsl\and&hash# space (){}[]?//\\$%ö
//$Notes = preg_replace("/ö/","\xF6",$Notes); not working
//$Notes = preg_replace("/ö/","oe",$Notes); //WORKS!
$CustSDR1 = preg_replace("/ö/","oe",$CustSDR1); //WORKS!
$CustSDR2 = preg_replace("/ö/","oe",$CustSDR2); //WORKS!
//iconv("UTF-8", "ISO-8859-1", $Notes); 
//$Notes = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $Notes); //  not working
//$Notes = addslashes($_POST[$Notes]);

//$Notes = mb_convert_encoding($Notes, 'ISO-8859-15', 'UTF-8'); //causes question marks for umlaute!



/*$Notes = preg_replace("/'/","_",$Notes);
///////$Notes = preg_replace("/ /","_",$Notes);
$Notes = preg_replace("/&nbsp;/","_",$Notes);
$Notes = str_replace(' ', '_', $Notes);
*/
$CustSDR1 = preg_replace("/'/","_",$CustSDR1);
$CustSDR2 = preg_replace("/'/","_",$CustSDR2);
$AmtPaid1 = preg_replace("/,/","",$AmtPaid1);
$AmtPaid2 = preg_replace("/,/","",$AmtPaid2);
$CustSDR1 = preg_replace("/,/","",$CustSDR1);
$CustSDR2 = preg_replace("/,/","",$CustSDR2);
echo "pppProofNo:".$ProofNo;



if ($InvNoAincl == '') $InvNoAincl = 0;
if ($InvNoA2incl == '') $InvNoA2incl = 0;
if ($InvNoA3incl == '') $InvNoA3incl = 0;
if ($InvNoA4incl == '') $InvNoA4incl = 0;
/*if ($InvNoBincl == '') $InvNoBincl = 0;
if ($InvNoCincl == '') $InvNoCincl = 0;
if ($InvNoDincl == '') $InvNoDincl = 0;
if ($InvNoEincl == '') $InvNoEincl = 0;
if ($InvNoFincl == '') $InvNoFincl = 0;
if ($InvNoGincl == '') $InvNoGincl = 0;
if ($InvNoHincl == '') $InvNoHincl = 0;*/

//first query:
echo "<br>query 1:";
$query1="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod, 
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority )
VALUES
( $TransNo,  $CustNo, '$TransDateDB1', $AmtPaid1, '$Notes', '$CustSDR1insert', '$TMethod', 
'$InvNoA', '$InvNoAincl' ,  '', '0' ,  '', '0' ,
'',  '0' ,  '', '0' ,  '', '0' ,
'',  '0' , '',  '0' , '$Priority') ";
mysqli_query($DBConnect, $query1);
echo "<br><font size = 4 color = red>".mysqli_error($DBConnect)."<br></font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into transaction1 NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 2>insert success!  </font>$query1&nbsp;&nbsp;&nbsp;";

//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($TransNo);
echo "<b><font size = '2' type='arial'>You Added the transaction1:</b></font></br>";
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"]; $item2 =  $row["CustNo"]; $CustInt =  $row["CustNo"]; $item3 = $row["TransDate"];
$item4 = $row["AmtPaid"]; $item5 = $row["Notes"]; $item6 = $row["CustSDR"]; $item7 = $row["TMethod"]; $InvNoAm = $row["InvNoA"];
$item9 = $row["InvNoAincl"]; $item10 = $row["Priority"]; print "<font size = 6><b>TransNo $item1</b></font>";
print "  $item1"; print "_".$item2; print "_".$item3; print "_R".$item4; print "_".$item5; print "_".$item6;
print "_".$item7; print " <font size = 4> invNoA: ".$InvNoAm; print "</font>_".$item9; print "_".$item10; }
mysqli_free_result($result); }
$query = $query1; $file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");



echo "<br>query2: ";
$query2="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority)
VALUES
( $TransNo2,  $CustNo, '$TransDateDB2', $AmtPaid2, '$Notes2', '$CustSDR2insert', '$TMethod2', 
'$InvNoA2', '$InvNoA2incl','','0','','0','','0','','0','','0','','0','','0','$Priority') ";
mysqli_query($DBConnect, $query2);
echo "<br><font size = 4 color = red>".mysqli_error($DBConnect)."<br></font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into transaction2 NOT successful!!!</b>!!</b></font><br>$query2<br>";
else
echo "<font size = 2>insert2 success! $query2</font>&nbsp;&nbsp;&nbsp;";


$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransNo2";

echo "<b><font size = '2' type='arial'>You Added transaction2:</b></font></br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"]; $item2 =  $row["CustNo"]; $CustInt =  $row["CustNo"]; $item3 = $row["TransDate"];
$item4 = $row["AmtPaid"]; $item5 = $row["Notes"]; $item6 = $row["CustSDR"]; $item7 = $row["TMethod"]; $InvNoAm = $row["InvNoA"];
$item9 = $row["InvNoAincl"]; $item10 = $row["Priority"]; print "<font size = 6><b>TransNo $item1</b></font>";
print "  $item1"; print "_".$item2; print "_".$item3; print "_R".$item4; print "_".$item5; print "_".$item6;
print "_".$item7; print " <font size = 4> invNoA: ".$InvNoAm; print "</font>_".$item9; print "_".$item10; }
mysqli_free_result($result); }

$query = $query2; $file = "FileWriting/bkp.php";



echo "<br>query3: ";
$query3="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority)
VALUES
( $TransNo3,  $CustNo, '$TransDateDB3', $AmtPaid3, '$Notes3', '$CustSDR3insert', '$TMethod3', 
'$InvNoA3', '$InvNoA3incl','','0','','0','','0','','0','','0','','0','','0','$Priority') ";
mysqli_query($DBConnect, $query3);
echo "<br><font size = 4 color = red>".mysqli_error($DBConnect)."<br></font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into transaction3 NOT successful!!!</b>!!</b></font><br>$query3<br>";
else
echo "<font size = 2>insert2 success! $query3</font>&nbsp;&nbsp;&nbsp;";


$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransNo3";

echo "<b><font size = '2' type='arial'>You Added transaction3:</b></font></br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"]; $item2 =  $row["CustNo"]; $CustInt =  $row["CustNo"]; $item3 = $row["TransDate"];
$item4 = $row["AmtPaid"]; $item5 = $row["Notes"]; $item6 = $row["CustSDR"]; $item7 = $row["TMethod"]; $InvNoAm = $row["InvNoA"];
$item9 = $row["InvNoAincl"]; $item10 = $row["Priority"]; print "<font size = 6><b>TransNo $item1</b></font>";
print "  $item1"; print "_".$item2; print "_".$item3; print "_R".$item4; print "_".$item5; print "_".$item6;
print "_".$item7; print " <font size = 4> invNoA: ".$InvNoAm; print "</font>_".$item9; print "_".$item10; }
mysqli_free_result($result); }

$query = $query3; $file = "FileWriting/bkp.php";


echo "N4:".$Notes4;
echo "<br>query4: ";
$query4="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority)
VALUES
( $TransNo4,  $CustNo, '$TransDateDB4', $AmtPaid4, '$Notes4', '$CustSDR4insert', '$TMethod4', 
'$InvNoA4', '$InvNoA4incl','','0','','0','','0','','0','','0','','0','','0','$Priority') ";
mysqli_query($DBConnect, $query4);
echo "<br><font size = 4 color = red>".mysqli_error($DBConnect)."<br></font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into transaction4 NOT successful!!!</b>!!</b></font><br>$query4<br>";
else
echo "<font size = 2>insert2 success! $query4</font>&nbsp;&nbsp;&nbsp;";


$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransNo4";

echo "<b><font size = '2' type='arial'>You Added transaction4:</b></font></br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"]; $item2 =  $row["CustNo"]; $CustInt =  $row["CustNo"]; $item3 = $row["TransDate"];
$item4 = $row["AmtPaid"]; $item5 = $row["Notes"]; $item6 = $row["CustSDR"]; $item7 = $row["TMethod"]; $InvNoAm = $row["InvNoA"];
$item9 = $row["InvNoAincl"]; $item10 = $row["Priority"]; print "<font size = 6><b>TransNo $item1</b></font>";
print "  $item1"; print "_".$item2; print "_".$item3; print "_R".$item4; print "_".$item5; print "_".$item6;
print "_".$item7; print " <font size = 4> invNoA: ".$InvNoAm; print "</font>_".$item9; print "_".$item10; }
mysqli_free_result($result); }

$query = $query4; $file = "FileWriting/bkp.php";





?>



<form name="Editcust" action="addTrans.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid1" value="<?php echo $AmtPaid1 ?>">
<input type = "hidden" name="TransDate" value="<?php echo $TransDateDB1 ?>">
<input type = "hidden" name="AmtPaid2" value="<?php echo $AmtPaid2 ?>">
<input type = "hidden" name="PayNotes" value="<?php echo $PayNotes ?>">

	
	<!--<input type = "submit" value = "Click to add another transaction">-->
</form>


	

<?php
echo "<font size = 1>".$query1;
?>
</font><br><font size = 1>The transaction before was:
<?php
$TransIntprev = intval($TransInt)-1;
$SQLStringPrevv = "SELECT * FROM transaction WHERE TransNo = $TransIntprev";
?>

</br>
<?php
if ($resultPrevv = mysqli_query($DBConnect, $SQLStringPrevv)) {
  while ($rowPrevv = mysqli_fetch_assoc($resultPrevv)) {
$Prevvitem1 = $rowPrevv["TransNo"]; $Prevvitem2 =  $rowPrevv["CustNo"]; $PrevvCustInt =  $rowPrevv["CustNo"];
$Prevvitem3 = $rowPrevv["TransDate"]; $Prevvitem4 = $rowPrevv["AmtPaid"]; $Prevvitem5 = $rowPrevv["Notes"];
$Prevvitem6 = $rowPrevv["CustSDR"]; $Prevvitem7 = $rowPrevv["TMethod"]; $PrevvInvNoAm = $rowPrevv["InvNoA"];
$Prevvitem9 = $rowPrevv["InvNoAincl"]; print "<b>previous TransNo $Prevvitem1</b></font>"; print "_".$Prevvitem2;
print "_".$Prevvitem3; print "_R".$Prevvitem4; print "_".$Prevvitem5; print "_".$Prevvitem6; print "_".$Prevvitem7; print "  invNoA: ".$PrevvInvNoAm;
print "</font>_".$Prevvitem9; }
mysqli_free_result($resultPrevv);}

$ttttt = 0;
include "view_transLatestC.php";

echo "<br>	</font>";
echo "Details: <br>";

echo "</b><table>";

//echo "<tr><th align = 'left' >.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "</th></tr>";




echo "</table>";
echo "Total: ".$ttttt."<br>";










$sptp = 'w';
//echo sptp;

































$nL = "%0D%0A"; //new line
$plural = ''; //for invoice or invoices
$b5 = "For Payment of: ".$Notes. " Invoice No ".$InvNoA." ";
$b5k = "";
if ($InvNoA2 != '')
{
$plural = 's';
$b5k = " , ".@$InvNoA2;
}
if ($InvNoA3 != '')
$b5k = $b5k." , ".@$InvNoA3;
if ($InvNoA4 != '')
$b5k = $b5k." , ".@$InvNoA4;
if ($InvNoA5 != '')
$b5k = $b5k." , ".@$InvNoA5;
if ($InvNoA6 != '')
$b5k = $b5k." , ".@$InvNoA6;
if ($InvNoG != '')
$b5k = $b5k." , ".@$InvNoG;
if ($InvNoH != '')
$b5k = $b5k." , ".@$InvNoH;
$NN = $EEmail;
if ($Notes == ".")
	{$NN = "";}
if ($Flag == 'Fast')
{
	$nL = '&#x00A;';
	echo "Flag is Fast";
}
	else 
	{
	$nL = '%0D%0A';
	echo "Flag is not Fast";
	
	}

	$NN3 = '';
$NN4 = '';
if ($Notes3 != '')
	$NN3 = 'Invoice No '.$InvNoA3.' '.$Notes3.$nL;
if ($Notes4 != '')
	$NN4 = 'Invoice No '.$InvNoA4.' '.$Notes4.$nL;

	
	
	
$body = "Thank you for payment ".$subjj2."of ".$nL." Invoice No ".$InvNoA." ".$NN.$nL." Invoice No ".$InvNoA2." ".$Notes2.$nL.$NN3.$NN4.$nL.$TMethod." Receipts (This email is the receipts, there are no attachments in this email)".$nL;
if ($Notes3 != '')
	$TransDate2 = $TransDate2.' and '.$TransDate3;
if ($Notes4 != '')
	$TransDate2  = $TransDate2.' and '.$TransDate4;
$b1 =  "Date: ".$TransDate1." and ".$TransDate2;


if ($Notes3 != '')
	$TransNo2 = $TransNo2.' and '.$TransNo3;
if ($Notes4 != '')
	$TransNo2  = $TransNo2.' and '.$TransNo4;




$b2 = "Transaction Numbers: ". $TransNo." and ".$TransNo2." respectively.";

//preg_replace( "/\r|\n/", "", $CustFN ); // removes new lines from textareas for javascript mailto to work
//preg_replace( "/\r|\n/", "", $CustLN );
$CustFN = str_replace(array("\r", "\n"), '', $CustFN);
$CustLN = str_replace(array("\r", "\n"), '', $CustLN);
$b3 = "Paid by: ". $CustLN.", ".$CustFN;
$AmtPaidTot = 0;
$AmtPaidTot = $AmtPaid1 + $AmtPaid2 + $AmtPaid3+ $AmtPaid4;

if ($Notes3 != '')
	$AmtPaid2 = $AmtPaid2.' and '.$AmtPaid3;
if ($Notes4 != '')
	$AmtPaid2  = $AmtPaid2.' and '.$AmtPaid4;
$b4 = "Amounts: R".$AmtPaid1." and R".$AmtPaid2." totals to R".$AmtPaidTot;

if ($Notes3 != '')
	$CustSDR2insert = $CustSDR2insert.' and '.$CustSDR3insert;
if ($Notes4 != '')
	$CustSDR2insert  = $CustSDR2insert.' and '.$CustSDR4insert;

$b5b = "Customer references: ".$CustSDR1insert." and ".$CustSDR2insert;
$b6 = "Received by: Karl ";
$b7 = "Payment methods: ". $TMethod ." ".$TMethod2 ;
echo "proofnno: >".$ProofNo. "< ";
if ($ProofNo == '')
{
$b7g = '';
echo "jjj";
}
else
{
$b7g = $nL."Proof No.: ". $ProofNo ;
echo "nnnnlll";
}



if (@$ProofToPay == '_')
$b77 = "Related Proof Of Payment: ". $ProofToPay . " &nbsp;&nbsp;[ ".$ProofInvA . " &nbsp;&nbsp; ".$ProofDate . " &nbsp;&nbsp; ".$ProofAmt. " &nbsp;&nbsp; ".$ProofNotes . " &nbsp;&nbsp; ".$ProofMethod . " &nbsp;&nbsp; ".$ProofCustSDR. " ]";
else
$b77 = "";

if ($ProofCustSDR != '')
$b77 = $b77.' ProofRef: '.$ProofCustSDR. ' ProofDate: '.$ProofDate;

$b8 = "Thank you";
$b9 = "Karl";
$ba = "PC and Notebook Sales and Advanced I.T. Support";
$bb = "Karl's Fast Internet and Webhosting Solutions";
$bc = "www.kconnect.co.za";

//$be = "Fax: 0865492415";
//$bf = "Skype: cyberkarl3";
$bg = "Sales terms: www.k-connect.co.za/terms";
$bh = "Internet and Email Support: www.karl.co.za/support";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipts&body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipts to customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br><!--RESTART THUNDERBIRD or OUTLOOK if email is incomplete--></font>

 
<font size= 2><b>
<a href='selectCustTrans.php'>Click to add transaction for another customer</a><br>
<a href='selectCustTrans.php?DA=<?php echo $TransDate1; ?>'>Click to add transaction for another customer but SAME DATE</a>
<br>
<a href='selectCustTrans.php?DA=<?php echo $TransDateNext; ?>'>Click to add transaction for another customer but NEXT DATE</a>
<br> or 
<form name="same" action="addTrans.php" method="post">
<input type = "submit" value = "Click to add transaction for the same customer">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
</form>
</font></b>








	<a href='edit_trans_CustProcessC2.php'>edit_trans_CustProcessC2.php</a><br>
<form name="EditTrans" action="edit_trans_CustProcessC2.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $TransNo ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid1" value="<?php echo $AmtPaid1 ?>">
<input type = "hidden" name="TransDate1" value="<?php echo $TransDateDB1 ?>">
<input type = "hidden" name="AmtPaid2" value="<?php echo $AmtPaid2 ?>">
<input type = "hidden" name="PayNotes" value="<?php echo $PayNotes ?>">

	
	<input type = "submit" value = "Click to edit this transaction">
</form>






	<br><br>

	</b>
	
<?php 

//$TMethod= "TyyESTT"; 
echo $TMethod; 
$N3 = '';
$N4 = '';
if ($Notes3 != '')
	$N3 = ' and '.$Notes3.'';
if ($Notes4 != '')
	$N4 = ' and '.$Notes4.'';
	
?>

<script type="text/javascript">
function myFunction()
{

location.href = "mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod; ?> Receipt <?php echo $subjj2."of ".$NN." and ".$Notes2.$N3.$N4." Invoices";

echo $subjj; ?>&body=<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL; ?>";

//if mailto is not loading is because of $b3 if it contains new lines in Name textarea 
}
</script>


<?php
if ($Flag != 'Fast')
echo "<body onload='javascript:myFunction()'>Running mailto javascript";
else
	echo "not running  mailto javascript";
include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes
include "view_Unpaid_inv_by_cust2.php"; //2b is the one with checkboxes

echo "<br><br>";



$queryTR="update customer set PayNotes = '$PayNotes' 
where CustNo = $CustNo";

mysqli_query($DBConnect, $queryTR);
echo $queryTR;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '2' color = 'red'><br><b>NOT successfull</b></FONT>";
echo " <a href = '../phpmyadmin/index.php?db=kc&table=invoice' target = _blank>open PHPmyAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoppeee update customer's PayNotes SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";








$queryAP="update aproof set TransNo= '$TransInt' 
where ProofNo = $ProofNo";

mysqli_query($DBConnect, $queryAP);
echo $queryAP;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '2' color = 'red'><br><b>NOT successfull  , maybe no proof submitted</b></FONT>";
echo " <a href = '../phpMyAdmin/index.php?db=kc&table=invoice' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoppeee update aproof's TransNo SUCCESS!!! :-)</font>";


echo ";<br>";
echo "<br><br>";

$file = 'Explastdate.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current = "$TransDate1";


// Write the contents back to the file
file_put_contents($file, $current); //identical to calling fopen(), fwrite() and fclose()



include "invEmailstatement.php";
echo "<br><br>";


$indesc = 0;
$ShowDraft = "Y";
include "view_Unpaid_inv_by_cust2.php";
echo "<br><br>";





//include "view_inv_by_custADVnoTransOVerPaidUnderPaid.php";

 echo "<br>";
echo "<a href = 'view_inv_PAIDinvoicesBOTH.php'>Click here to view only PAID invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust.php'>Click here to view customer's invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust2.php'>Click here to view customer's invoices </a>";
echo "<br><br>";


?>
<a href = "edit_trans_CustProcess.php" target=_blank>edit_trans_CustProcess.php</a>









