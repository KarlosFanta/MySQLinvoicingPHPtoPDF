<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a customer";
	require_once 'header.php';
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection

?>
<!DOCTYPE html>
<html>
<head>
<title>EditCustProcess</title>
<meta charset="UTF-8">

<!--  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <script src="jquery-1.10.2.min.js" ></script>
<script type="text/javascript">
/*    function init() {
        label.button {
    padding: 0.2em 0.4em;
    -webkit-appearance: button;
}

#customize {
    display: none;
}

#customize + #submit {
    display: none;
}

#customize:checked + #submit {
    display: inline-block;
}
    }
    window.onload = init;
	*/
</script>
	<script type="text/javascript">
$('#clickMe').toggle(
            function(){
                $('#textBox').show();
                $('#clickMe').text('hide');
            },
            function(){
                $('#textBox').hide();
                $('#clickMe').text('show');
            });
</script>-->
</head>

<body>
<!--
<input type="button" width = 6 width="48" height="48" id="clickMe" value = "show/hide">

<div id="textBox" style="display: none">
    <textarea>Thoggled</textarea></div>

-->
<form name="Addcust" action="editCustProcess_lastCF.php" method="post">


<?php
    @session_start();
 	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$_SESSION['sel'] = "editCust";

	$CustInt = intval($_SESSION['CustNo'] );
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the customer before we change him on the last form.

/*$TBLrow = $_POST['mydropdownEC'];

echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";

$CustInt = intval($Custno[0]);
*/
//echo "<br>Custint:".$CustInt."</br />";

//$sql = "SELECT CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance FROM customer WHERE CustNo = $CustInt" ;
$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//$sql = "DELETE FROM customer WHERE CustNo = $CustInt" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt);
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
//echo $SQLstring."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Thank you for selecting ".$TBLrow." from your database. You may now change his/her details.</BR>"   ;

//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['CUSTNO']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['CUSTFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['CUSTLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the customer has a surname entered!!!
    echo $row[3] . $row['CUSTTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['CUSTCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['CUSTEMAIL']"</br>";
    echo $row[6] . $row['CUSTADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";
 */
//while ($row = mysql_fetch_assoc($objResult)) {


if ($result = $DBConnect->query($SQLstring)) {


//if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!
 //while ($row = $result->fetch_row()) {

		$newfldr = "1";
			//$newfldr = "file:///".$row['L1'] ;
						//$newfldr = "file:///C:\_work\Customers";
			//echo "<br><br> newfldr: ".$newfldr." <br>";
			//echo "<br> <a href= '".$newfldr."'>OPen newfolder</a>   <br>";

			//echo "<b>Last topup invoiced:<input type='text' name='topup' size = '50' value=";

			//$rt = strtr($row['topup'], array(' ' => '_')) ;

		//	echo $rt;
		//	echo "></b> ";

//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			//echo "<br><br> newfldr: ".$newfldr." <br>";
//	echo "<br> <a href= '".$newfldr."' alt= 'Right-click in Ext App'>Open customer folder: ".$newfldr." </a> &nbsp;&nbsp; ";

			echo "<label>Suggested folder:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 43  name='L2' value=";
			//echo $row["L1"];
			//echo strtr($row['L1'], array('/' => '\\')) ;

			echo $row['CustLN'].$row['CustFN'];
//			$L1 = str_replace('\\', '/', $L1);

		//	echo $row[13];
			echo "> ";
		echo "<br> ";
		$Cust_LName = $row['CustLN'];
$FCLN = $Cust_LName[0];

		echo "will be created in the following folder:";
$L3 = "C:/_work/Customers/".$FCLN."";
echo $L3." <br>";

echo "MID1: <input type='text' size = 43  name='MID1' value='";
			//echo $row["L1"];
			echo $L3;
			echo "'><br>";

$L4 = $L3.'/'.$Cust_LName.$row['CustFN'];
echo $L3." <br>";

				$newfldr = "1";
			$newfldr = "file:///".$row['L1'] ;

//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			//echo "<br><br> newfldr: ".$newfldr." <br>";

	//echo "<br> <a href= 'file:///".$newfldr."'>Open customer folder: ".$newfldr." </a>  <br>";

//	echo "<br> <a href= 'file://".$newfldr."'>Open customer folder: ".$newfldr." </a>  <br>";
//	echo "<br> <a href= 'file://".$row['L1']."'>Open customer folder: file://".$row['L1']." </a>  <br>";
//	echo "<br> <a href= 'file:".$row['L1']."'>Open customer folder: ".$row['L1']." </a>  <br>";

			echo "<label>Folder Location LS:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 93  name='LS' value=";
			//echo $row["L1"];
			//echo strtr($row['L1'], array('/' => '\\')) ;
			echo $L4;

//			$L1 = str_replace('\\', '/', $L1);

		//	echo $row[13];
			echo "> ";
		echo "<br> ";

		echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='btn_submit' value='Submit/Save' /> ";

		//echo "file:///";
			//echo $row['L1'] ;
		echo "<br><br><br><br><br><br><br><br><br>";

 		echo "";
			echo "Customer AutoNumber:";
			echo "<input type='text' size = 4 name='CustNo' value=";
			//echo $row[0];
			echo $row['CustNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['CustNo'];
			echo "> editCustProcess.php calls editCustProcess_last.php";
		echo "<br>";

 		echo "";
			echo "* First Name, / VAT no:";

	/*		echo "<input type='text' size = 60 name='CustFName' value=";

			//echo $row['CustFN'];
			echo strtr($row['CustFN'], array(' ' => '&nbsp;')) ;
			//echo $row[1];
			echo "> replacing spaces with spaces does work";
		*/


echo "<textarea id='cust_fn' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustFName' >";
echo $row['CustFN'];
echo "</textarea>";

		echo "<br>";

 		echo "";
			echo "<label>* Surname:</label></dt>";
	/*		echo "<input type='text' size = 30 name='CustLName' value=";
			$CLN = strtr($row['CustLN'], array(' ' => '&nbsp;')) ;
			$CLNd = str_replace(';', ';_', $CLN);
			$CLNd = str_replace('&nbsp;', '_', $CLN);
			//echo strtr($row['CustLN'], array(' ' => '&nbsp;')) ;
			echo $CLNd;
			echo "> ";
	*/

echo "<textarea id='CustLName' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustLName' >";
echo $row['CustLN'];
echo "</textarea>";
				$RU1 = "_";
			$RU2 = "_";
			$RU1 = $row["u1"];
			$RU2 = $row["u2"];
			$CLN = "_";
			$CLN = $row['CustLN'];

			$ADSLTel = $row["ADSLTel"];

		echo "<br>";

 		echo "";
			echo "Telephone Number:";
/*			echo "<input type='text' name='CustTN' value=";
			echo $row['CustTel'];
			//echo $row[3];

			echo "> ";
			*/
			echo "<textarea id='CustTN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustTN' >";
echo $row['CustTel'];
echo "</textarea>";

		echo "<br>";

 		echo "";
			echo "<label>Cellphone Number:</label></dt>";
/*			echo "<input type='text' name='CustCN' value=";
			echo $row['CustCell'];
//			echo $row[4];

			echo "> ";
*/
			echo "<textarea id='CustCN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustCN' >";
echo $row['CustCell'];
echo "</textarea>";
		echo "<br>";
			$CE = strtr($row['CustEmail'], array(' ' => '&nbsp;')) ;
			$CEd = str_replace(';', ';&nbsp;', $CE);

 		echo "";
			echo "<label><a href = 'mailto:$CEd'>Email Address:</a></label></dt>";
			echo "<input type='text' size = 60 name='CustEm' value=";
			//echo $row['CustEmail'];

			echo $CE ; //or should this be $CEd ???
//			echo $row[5];

			echo "> <a href = 'mailto:";
			echo $CEd."'>email</a>";
		echo "<br>";

 		echo "";
			echo "<label>Postal Address:</label></dt>";
/*			echo "<input type='text' size = 70 name='CustPA' value=";
			//print $row['CustAddr'];
			echo strtr($row['CustAddr'], array(' ' => '&nbsp;')) ;
		//	echo $row[6];

			echo "> ";
*/
echo "<textarea id='CustPA' style='white-space:pre-wrap;font-family:arial;height:22px;width:700px;font-size: 10pt' name='CustPA' >";
echo $row['CustAddr'];
echo "</textarea>";
		echo "<br>";

 		echo "";
			echo "<label>ID/Passport Number:</label></dt>";
/*			echo "<input type='text'  size = 70 name='CustIDdoc' value=";
			echo strtr($row['CustIDdoc'], array(' ' => '&nbsp;')) ;
			//echo $row[7];

			echo "> ";
		//echo "<br> ";

*/
echo "<textarea id='CustIDdoc' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustIDdoc' >";
echo $row['CustIDdoc'];
echo "</textarea>";

 		echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='btn_submit' value='Submit/Save' /> ";
			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$DDD= $row["CustDetails"];
			//$DDD = $row[8];
			$FF = urlencode($DDD);
			//echo $FF;

//$str = strtr($DDD, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($DDD, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $DDD;
//echo "<br>";

//$DDD = str_replace("/_/","&nbsp;",$DDD);
//$DDD = preg_replace("/__/","&nbsp;&nbsp;",$DDD);
//why not simply use stripslashes?
$DDD = str_replace("SEMICOLONN", ";", $DDD);
$DDD = str_replace("COLONN", "'", $DDD);
$DDD = str_replace("CopyrightSign", "©", $DDD);
$DDD = str_replace("RegTrademark", "®", $DDD);
$DDD = str_replace("EuroCurrency", "€", $DDD);
$DDD = str_replace("YenCurrency", "¥", $DDD);
$DDD = str_replace("PoundCurrency", "£", $DDD);
$DDD = str_replace("centT", "¢", $DDD);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
echo "<br> ";echo "<textarea id='CustDetails' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 8pt' rows = '5' size = '80' name='CustDetails' >";
	//echo $row["CustDetails"];

	echo $DDD;echo "</textarea>";

			echo "<br>extra: <br>";
			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$EEE= $row["Extra"];
			//$EEE = $row[8];
			$FF = urlencode($EEE);
			//echo $FF;

//$str = strtr($EEE, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($EEE, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $EEE;
//echo "<br>";

//$EEE = str_replace("/_/","&nbsp;",$EEE);
//$EEE = preg_replace("/__/","&nbsp;&nbsp;",$EEE);
//why not simply use stripslashes?
$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
echo "<br> ";echo "<textarea id='Extra' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '5' size = '80' name='Extra' >";

	echo $EEE;echo "</textarea>";

//echo "<label class='button' for='customize'>Customize</label> <input type='checkbox' id='customize' />   <input id='submit' />";
?>
<!--
<input type="checkbox" class="hide" /><input type="text" value="Name" /><br>
<input type="checkbox" class="hide" /><input type="text" value="Email" /><br>
<input type="checkbox" class="hide" checked="checked" /><input type="text" value="Address" /><br>

<script type="text/javascript">
$(document).ready(function() {

$('.hide').click(function() {
$(this).next().toggle();
});
$('.hide:checked').next().hide();

});
</script>
-->
<br>
<style>
label.button {
    padding: 0.2em 0.4em;
    -webkit-appearance: button;
}

#customize {
    display: none;
}

#customize + #Confid {
    display: none;
}

#customize:checked + #Confid {
    display: inline-block;
}
</style>

	 <label class="button" for="customize">Confid</label><br>

    <input type="checkbox" id="customize" />
     <!--<input type="text" size = 1 id="submit" value= "lkkl"/>-->

<?php


			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$EEE= $row["Confid"];
			//$EEE = $row[8];
			$FF = urlencode($EEE);
			//echo $FF;

//$str = strtr($EEE, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($EEE, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $EEE;
//echo "<br>";

//$EEE = str_replace("/_/","&nbsp;",$EEE);
//$EEE = preg_replace("/__/","&nbsp;&nbsp;",$EEE);
//why not simply use stripslashes?
$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
//echo "<br> ";

// "<textarea id='Confid' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '1' size = '80' name='Confid' >";
echo "<textarea id='Confid'  style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '6' size = '80' name='Confid'>";

	echo $EEE;echo "</textarea>";

?>


 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" name="btn_submit" value="Submit/Save" /> <br>

<?php
echo "<br/> ";

	/*
echo "<textarea id='CustDetailsTXT' style='white-space:pre-wrap; height:100px;width:500px'  size = '80' name='CustDetailsTXT' >";
	echo $row["CustDetailsTXT"];

	echo "</textarea>";
echo "<br> ";

	*/








			echo "<label>Abbr</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = '10' name='Abbr' value=";
//echo $row["ABBR"];
//			echo $row[9];

			$ABBB = strtr($row['ABBR'], array(' ' => '_')) ;
			echo $ABBB;
			echo "> ";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

 		echo "";
			echo "<label>ADSL Password:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input style='font-size: 5pt' type='text'  size = 30  name='CustPW' value=";
			//echo $row["CustPW"];
	//echo $row[10];
			echo strtr($row['CustPW'], array(' ' => '&nbsp;')) ;

			echo "> ";
		echo "&nbsp;&nbsp;&nbsp;&nbsp; ";

 		echo "";
			echo "<label>Distance:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='CustDi' value=";
			echo $row["Distance"];
//			echo $row[11];

			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>ADSL Tel No:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = '20' name='ADSLTel' value=";
			echo $row["ADSLTel"];
	//echo $row[12];

			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>ADSL Username:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='u1' style='font-weight: bold;' value=";
			echo $row["u1"];
			echo ">@";

			echo "<input type='text' name='u2' style='font-weight: bold;'  value=";
			echo $row["u2"];
	//echo $row[12];

			echo "> &nbsp;&nbsp;";

			echo $row["u1"];
			echo "@";
			echo $row["u2"];
			echo "&nbsp;&nbsp;";

			echo $row['CustPW'];

		echo "<br> ";
	$II = $row['Important'];
$II = str_replace( "&nbsp;&nbsp;", "&nbsp;", $II );
	$II = preg_replace( "/&nbsp;/", " ", $II );

	$II = preg_replace( "/\s+/", " ", $II );

//$II = preg_replace( "&nbsp;&nbsp;", " ", $II );

preg_replace("/[[:blank:]]+/"," ",$II);

		 		echo "decode importat: ".html_entity_decode($II)."<br>";
			echo "<label><b><font color = red size = 3>Important for ".$ABBB.": </b></label></font></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->

					echo "<textarea id='Important' style='white-space:pre-wrap; height:20px;font-family:Times New Roman;width:650px;font-size: 10pt'  name='Important'  >";
	//echo $row["CustDetails"];

	echo $II; echo "</textarea>";

			/*

			echo "<input type='text' size = 35  name='Important' value=";
			//echo $row["Important"];
			echo strtr($row['Important'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";*/
		echo " ";

			echo "<label>adslinv:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 35  name='adslinv' value=";
			//echo $row["adslinv"];
			echo strtr($row['adslinv'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";
		echo "<br> ";

			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->

$ae1 = "j";
//echo " h ";
//echo strtr($row['ae'], array(' ' => '&nbsp;')) ;
//strtr($ae1, array(' ' => '&nbsp;')) ;

//$ae1 = strtr($row['ae'], array(' ' => '&nbsp;')) ;

$ae1 = $row['ae'];

//nl2br(preg_replace('#(\\]{1})(\\s?)\\n#Usi', ']', stripslashes($ae1)));
//echo " ae1__: ". $ae1;

		if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae1))
{
    echo " one or more of the 'special characters' found ";
}


		//	echo strtr($row['ae'], array(' ' => '&nbsp;')) ;
		//	echo $row['ae'];
		//echo $ae1;
	//	echo $row['ae'];
		$ae1 = strtr($row['ae'], array(' ' => '_')) ;
		$ae1 = strtr($ae1, array('_' => '&nbsp;')) ;

	//echo " ____spec: ";

		htmlspecialchars($ae1);
	//echo " ent: ";

		htmlentities($ae1);

	/*
			echo "<input type='text' size = 13   value=";

		//htmlspecialchars($ae1);
	//	echo trim($ae1);
//echo nl2br($ae1);
			echo $ae1;

			//echo $row["ae"];
/*			echo strtr($row['ae'], array('\xA0x' => '_')) ;
			echo strtr($row['ae'], array('\xA0582' => '_')) ;
			echo strtr($row['ae'], array('\xA0x\xA0582' => '_')) ;
			echo strtr($row['ae'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";

						 		echo "";
			echo "<label>ae:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 13   value=";
			//echo $row["ae"];
	//		echo strtr($row['ae'], array('\xA0x' => '_')) ;
	//		echo strtr($row['ae'], array('\xA0582' => '_')) ;
	//		echo strtr($row['ae'], array('\xA0x\xA0582' => '_')) ;
*/
/*
//echo $row['ae'];
			echo "> ";
		*/
if ($ae1 > 0.2)
{
		//echo "R".$ae1 * 1.14;
		$ae1 =  $ae1 * 1.14;

		 $ae1 = number_format ($ae1, 2, ".", "");
 //echo "<br>";
 echo "<b>R ".$ae1." inin VAT</b><br>";
//$ae1N = number_format($ae1,1);  //I removed the last cent here
//echo " ".$ae1N;

}

//echo "<br />";

echo "ae:R<input type='text'  size = 13  id='ae' name='ae' value = '";
	//echo $row["CustDetails"];
	echo $row['ae'];echo "'>";

echo "<br><label>invD2:</label></dt>";
echo "<input type='text' size = 35  name='invD2' value=";
echo strtr($row['invD2'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae2:</label></dt>";
$ae2 = "j";
$ae2 = $row['ae2'];
//echo " ae2__: ". $ae2;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae2))
{
    echo " one or more of the 'special characters' found ";
}
$ae2 = strtr($row['ae2'], array(' ' => '_')) ;
$ae2 = strtr($ae2, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae2);
//echo " ent: R";
htmlentities($ae2);
echo "<input type='text' size = 13  name='ae2' value=";
echo $ae2;
echo "> ";
if ($ae2 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae2 =  $ae2 * 1.14;
$ae2 = number_format ($ae2, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae2." inin VAT</b><br>";
//$ae2N = number_format($ae2,1);  //I removed the last cent here
//echo " ".$ae2N;
}


echo "<br><label>invD3:</label></dt>";
echo "<input type='text' size = 35  name='invD3' value=";
echo strtr($row['invD3'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae3:</label></dt>";
$ae3 = "j";
$ae3 = $row['ae3'];
//echo " ae3__: ". $ae3;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae3))
{
    echo " one or more of the 'special characters' found ";
}
$ae3 = strtr($row['ae3'], array(' ' => '_')) ;
$ae3 = strtr($ae3, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae3);
//echo " ent: R";
htmlentities($ae3);
echo "<input type='text' size = 13  name='ae3' value=";
echo $ae3;
echo "> ";
if ($ae3 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae3 =  $ae3 * 1.14;
$ae3 = number_format ($ae3, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae3." inin VAT</b><br>";
//$ae3N = number_format($ae3,1);  //I removed the last cent here
//echo " ".$ae3N;
}


echo "<br><label>invD4:</label></dt>";
echo "<input type='text' size = 35  name='invD4' value=";
echo strtr($row['invD4'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae4:</label></dt>";
$ae4 = "j";
$ae4 = $row['ae4'];
//echo " ae4__: ". $ae4;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae4))
{
    echo " one or more of the 'special characters' found ";
}
$ae4 = strtr($row['ae4'], array(' ' => '_')) ;
$ae4 = strtr($ae4, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae4);
//echo " ent: R";
htmlentities($ae4);
echo "<input type='text' size = 13  name='ae4' value=";
echo $ae4;
echo "> ";
if ($ae4 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae4 =  $ae4 * 1.14;
$ae4 = number_format ($ae4, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae4." inin VAT</b><br>";
//$ae4N = number_format($ae4,1);  //I removed the last cent here
//echo " ".$ae4N;
}






echo "<br><label>invD5:</label></dt>";
echo "<input type='text' size = 35  name='invD5' value=";
echo strtr($row['invD5'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae5:</label></dt>";
$ae5 = "j";
$ae5 = $row['ae5'];
//echo " ae5__: ". $ae5;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae5))
{
    echo " one or more of the 'special characters' found ";
}
$ae5 = strtr($row['ae5'], array(' ' => '_')) ;
$ae5 = strtr($ae5, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae5);
//echo " ent: R";
htmlentities($ae5);
echo "<input type='text' size = 13  name='ae5' value=";
echo $ae5;
echo "> ";
if ($ae5 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae5 =  $ae5 * 1.14;
$ae5 = number_format ($ae5, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae5." inin VAT</b><br>";
//$ae5N = number_format($ae5,1);  //I removed the last cent here
//echo " ".$ae5N;
}





echo "<br><label>invD6:</label></dt>";
echo "<input type='text' size = 35  name='invD6' value=";
echo strtr($row['invD6'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae6:</label></dt>";
$ae6 = "j";
$ae6 = $row['ae6'];
//echo " ae6__: ". $ae6;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae6))
{
    echo " one or more of the 'special characters' found ";
}
$ae6 = strtr($row['ae6'], array(' ' => '_')) ;
$ae6 = strtr($ae6, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae6);
//echo " ent: R";
htmlentities($ae6);
echo "<input type='text' size = 13  name='ae6' value=";
echo $ae6;
echo "> ";
if ($ae6 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae6 =  $ae6 * 1.14;
$ae6 = number_format ($ae6, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae6." inin VAT</b><br>";
//$ae6N = number_format($ae6,1);  //I removed the last cent here
//echo " ".$ae6N;
}






echo "<br><label>invD7:</label></dt>";
echo "<input type='text' size = 35  name='invD7' value=";
echo strtr($row['invD7'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae7:</label></dt>";
$ae7 = "j";
$ae7 = $row['ae7'];
//echo " ae7__: ". $ae7;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae7))
{
    echo " one or more of the 'special characters' found ";
}
$ae7 = strtr($row['ae7'], array(' ' => '_')) ;
$ae7 = strtr($ae7, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae7);
//echo " ent: R";
htmlentities($ae7);
echo "<input type='text' size = 13  name='ae7' value=";
echo $ae7;
echo "> ";
if ($ae7 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae7 =  $ae7 * 1.14;
$ae7 = number_format ($ae7, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae7." inin VAT</b><br>";
//$ae7N = number_format($ae7,1);  //I removed the last cent here
//echo " ".$ae7N;
}





echo "<br><label>invD8:</label></dt>";
echo "<input type='text' size = 35  name='invD8' value=";
echo strtr($row['invD8'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae8:</label></dt>";
$ae8 = "j";
$ae8 = $row['ae8'];
//echo " ae8__: ". $ae8;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae8))
{
    echo " one or more of the 'special characters' found ";
}
$ae8 = strtr($row['ae8'], array(' ' => '_')) ;
$ae8 = strtr($ae8, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae8);
//echo " ent: R";
htmlentities($ae8);
echo "<input type='text' size = 13  name='ae8' value=";
echo $ae8;
echo "> ";
if ($ae8 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae8 =  $ae8 * 1.14;
$ae8 = number_format ($ae8, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae8." inin VAT</b><br>";
//$ae8N = number_format($ae8,1);  //I removed the last cent here
//echo " ".$ae8N;
}






		echo "<br> ";

				 		echo "";
			echo "<label>dotdot:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 3  name='dotdot' value=";
			//echo $row["dotdot"];
			echo strtr($row['dotdot'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";
		echo "<br> ";

			echo "<b>Last topup invoiced:<textarea id='topup' style='white-space:pre-wrap; height:20px;width:350px;font-size: 10pt'  name='topup'  >";
	//echo $row["CustDetails"];

	echo $row['topup'];echo "</textarea>";

?>
<br />
<script>
function openfolder()
  {
  window.open('<?php echo $newfldr ?>');
  }
</script>
<!--<a href= "file:///C:/_work/Customers/A/Abel_Jutta">OPen folder</a> <br>-->

<!--<br>	<input type="button" value="open this location" onclick="openfolder()">&nbsp;&nbsp;&nbsp;	-->
<?php
	//	{
//    window.open('\\\\Server-1\\Folder-1\\Folder-2');
//}

//$objResult;
 }
}


//oracle: oci_free_statement($objParse);
//oci_free_statement($stid);
//oracle: oci_close($conn);

		/*
			<label>* First Name<?php //echo $this->lang->line('cust_fn'); ?>: </label></dt>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $this->mdl_custs->form_value('cust_name'); ?>" />-->
			<input type="text" name="CustFName" />
		<br>
*/
?>
<div>

			</dt>
			<!--<input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" />-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" />-->
		<br>
</div>
</form>






<?php
	include 'calculator/index.php';
//include 'edit_trans_CustProcessC2view.php';?>
<a href = "edit_trans_CustProcess.php" target= "_blank">All transactions and invoices </a><br>
<?php
$un= 'N';
$indesc = '1';
$in = '1';
//echo "indesc:".$indesc;
//include 'unreconciledProofs.php';
//fecho "<br><br>";
$indesc = 'd1';
/*include 'edit_trans_CustProcess.php';
echo "<br><br>";
include 'view_event_by_cust.php';
*?
$un= 'Y';

echo "<br>yo<br>";
//include 'edit_trans_CustProcess.php';

//echo "un:".$un;
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



</body>

</html>
