 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include 'header.php';
require_once 'inc_OnlineStoreDB.php';
?>


<?php
//$ProofNo = 0;
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';

//$CustNo"
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";

$CustNo = $_POST['CustNo'];

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";

$clExp = $_POST['clExp'];
echo "clExp:";
echo $clExp;
echo "<br><bR>";

$clExp2 = explode('::', $clExp);
echo "clExp2[1]:";
echo $clExp2[1];
echo "<br><bR>";
$clExp3= $clExp2[1];

$CustFN = $_POST['CustFN'];
$CustLN = $_POST['CustLN'];
$CustEmail = $_POST['CustEmail'];

$CustEmail = str_replace(';', '; ', $CustEmail);

//$ProofNo = $_POST['ProofNo'];

$Numb = "ProofNo1"; //default when table is empty.
//$query = "SELECT MAXNUM(ProofNo)  AS MAXNUM FROM aproof order by ProofNo";
//$query = "select ProofNo from aproof order by ProofNo desc limit 1"; // gives Proofno9 instead of Proofno11
//$query = "select ProofNo from aproof asc limit 1";
//$query = "select ProofNo from aproof order by SUBSTRING(ProofNo, 2) desc limit 1"; // gives Proofno9 instead
//$query = "select ProofNo from aproof order by ProofDate desc limit 1";
$query = "SELECT ProofNo,CONVERT(SUBSTRING_INDEX(ProofNo,'ProofNo',-1),UNSIGNED INTEGER) AS num
FROM aproof ORDER BY num desc limit 1;  ";
 //http://stackoverflow.com/questions/5960620/convert-text-into-number-in-mysql-query
//$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

/*while($row = mysqli_fetch_array($result)){
	echo "<br>The max no ProofNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = $row[0];
$Numb = substr($daNextNo, 7);
$Numb++;
}
echo "<br><br>";
$ProofNo = "ProofNo".$Numb;
*/
/*
$D1 = $_POST['ProofDate'];
$D2 = explode("/", $D1);
$ProofDate = $D2[2]."-".$D2[1]."-".$D2[0];
$CustSDR = $_POST['CustSDR'];
$Amt = $_POST['Amt'];
$Notes = $_POST['Notes'];
$EEmail = $Notes;
echo " notes:".$Notes ;
$charset = mysqli_character_set_name($DBConnect);
printf ("Current character set is %s\n",$charset);
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$EEmail = $Notes;
$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;");
$Notes = str_replace($von, $zu, $Notes);
echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); //Note, that if no connection is open, mysqli_real_escape_string() will return an empty string!
$CustSDR = preg_replace("/ö/","oe",$CustSDR); //WORKS!
*/
echo "Thank you for details: ".$CustNo ." ".$clExp ."."  ;

$query="update expenses set CustNo = '$CustNo'  where ExpNo = $clExp3";

/*(TransNo = $ProofNo, CustNo = $CustNo, ProofDate ='$ProofDate', Amt = $Amt, Notes = '$Notes', PMethod = '$PMethod',
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$ProofDate', Transtel = '$Amt', Transcell= '$Notes', Transemail = '$PMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :ProofNoInt";
echo '</br>';

mysqli_query($DBConnect, $query);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>insert or update NOT successfull!!!<br> $query</b>!!</b></font><br><br></b>";
else
echo "<font size = 4>insert success! </font><br>$query<br>";

//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");

//php to sql does not understand semicolon. remove the semicolon!!!
//$ProofInt = intval($ProofNoInt);

$SQLString = "SELECT * FROM expenses WHERE CustNo = $CustNo";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You updated the expense:</b></font>

</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ExpNo"];
//$item2 =  $row["CustNo"];
//$CustInt =  $row["CustNo"];
$item3 = $row["Category"];
$item4 = $row["ExpDesc"];
$item5 = $row["SerialNo"];
$item6 = $row["SupCode"];
$item7 = $row["ProdCostExVAT"];
$item8 = $row["Notes"];
$item9 = $row["CustNo"];
print "$item1";

print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
}
$result->free();
}



//$file = "FileWriting/bkp.php";
//include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

//$file = "logaddtrans.php";
/*$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add transcaction:</b> <br>" .$query. ";<br/><br/><br/>");
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = '$file.'><b>FILE WRITTEN </B>Check log file:</a> <br />";
*/
?>


<!--<form name="Editcust" action="addProofCustProcess2sess.php" method="post">-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form name="Editcust" action="addProof.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">
<input type = "hidden" name="ProofDate" value="<?php echo $ProofDate ?>">
<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">

<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>

	<!--<input type = "submit" value = "Click to add another transaction">-->




<?php
//echo $query;
$ttttt = 0;

echo "<br><br>";

?>
<a href='selectCustProof.php'>Click to add email proof for another customer</a> or <input type = "submit" value = "Click to add email proof for the same customer">
</font></b>





	<br><br>


	<br><br>




<br><br><br><br>
<?php








?>








