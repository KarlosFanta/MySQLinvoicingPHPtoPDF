<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>



<?php
$Trans_No = 0;
$CustNo = '';
$TransDate = '';
$AmtPaid = '';
$Notes ='';
$CustSDR ='';
$TMethod = '';
$InvNoA = 0;
$InvNoAincl = 0;
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

$Trans_No = $_POST['TransNo'];
$CustNo = $_POST['CustNo'];
$TransDate = $_POST['TransDate'];
$AmtPaid = $_POST['AmtPaid'];
$Notes = $_POST['Notes'];
$CustSDR = $_POST['CustSDR'];
$TMethod = $_POST['TMethod'];
$InvNoA = $_POST['InvNoA'];

if ($InvNoA == "")
$InvNoA = 0;
$InvNoAincl = $_POST['InvNoAincl'];
$InvNoB = $_POST['InvNoB'];
$InvNoBincl = $_POST['InvNoBincl'];
$InvNoC = $_POST['InvNoC'];
$InvNoCincl = $_POST['InvNoCincl'];
$InvNoD = $_POST['InvNoD'];
$InvNoDincl = $_POST['InvNoDincl'];
$InvNoE = $_POST['InvNoE'];
$InvNoEincl = $_POST['InvNoEincl'];
$InvNoF = $_POST['InvNoF'];
$InvNoFincl = $_POST['InvNoFincl'];
$InvNoG = $_POST['InvNoG'];
$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];

function changeV($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);
$v1 = str_replace(' ', '_', $v1);

$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";


$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.

return $v2;
}
$Notes = changeV($Notes);
$CustSDR = changeV($CustSDR);
$TMethod = changeV($TMethod);
$InvNoA = changeV($InvNoA);
$InvNoB = changeV($InvNoB);
$InvNoC = changeV($InvNoC);
$InvNoD = changeV($InvNoD);
$InvNoE = changeV($InvNoE);
$InvNoF = changeV($InvNoF);
$InvNoG = changeV($InvNoG);
$InvNoH = changeV($InvNoH);
$Priority = changeV($Priority);


echo "Thank you for changing the transaction's details: ".$Trans_No." ".$CustNo ." ".$TransDate ."."  ;

$Trans_NoInt = intval($Trans_No);
$query="update transaction set CustNo = '$CustNo', TransDate ='$TransDate', AmtPaid = '$AmtPaid', 
Notes = '$Notes', TMethod = '$TMethod', 
CustSDR = '$CustSDR', 
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority' 
where TransNo = $Trans_NoInt";
//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
//echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $query);
echo $query;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5'><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4>whoppeee SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";




echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited transaction:</b></font>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
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
}	echo "<br>";
//$mysqli->close();
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
?>
<form name="sdd" action="edit_trans_CustProcessC_2nd.php" method="post">


<input type="submit" name="btn_submit" value="Update next transaction" /> 
</form>
<!--
//$query="insert into transaction values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php
$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
?>

