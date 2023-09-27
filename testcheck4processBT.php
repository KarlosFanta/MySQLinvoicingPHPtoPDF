<head><title>
imported
</title>
header("Content-type: text/html; charset=UTF-8");
<meta charset="utf-8">
</head>
<?php
require_once("inc_OnlineStoreDB.php");
$EventNo = 0;
$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(EventNo)  AS MAXNUM FROM eventsTB";

$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><br><font size = 5 color = red><b><b>select EventNo NO_T successfull!!!</b></b></font><br><br>";
while($row = mysqli_fetch_array($result)){
	echo "The max no EventNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}
$EventNo = $daNextNo;


$CustNo = '';
$EDate = '';
$txtArea ='';
$Priority = '_';
$Destination = '_';

$txtArea = $_POST['txtArea'];

function changeV($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
//$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);
$v1 = str_replace(' ', '_', $v1);

//$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = trim($v1, '()');
$v1 = str_replace(" ","_", $v1); //this baby works for txtArea
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";

$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.
//echo "loading function ChangeV";
//return $v2;
return $v1;
}

//$txtArea = changeV($txtArea); //i don;t think this is working Function removes the @ sign and the fullstop!

//$txtArea = str_ireplace("nightrider ", "fr@kconnect.net nightrider ", $txtArea);

//echo " txtArea after:".$txtArea."<br>" ;
//echo "TMeth:".$TMethod." ";

//echo "Thank you for adding the event's details: ".$EventNo." ".$CustNo ." ".$EDate ."."  ;
$CustNo = 0;
$EDate = '2111-01-01';

$EventNoInt = intval($EventNo);

/*
LF 	&#10; 	line feed
VT 	&#11; 	vertical tab
FF 	&#12; 	form feed
CR 	&#13; 	carriage return
*/

//$TA = $_POST['txtArea']; //ok, so this one bypassed the string replacements.- let's see if it works now
$TA = $txtArea; //
//\x0D carriage return (CR) &#13;
$string = $txtArea;
$string = $TA;
$array = preg_split ('/$\R?^/m', $string);

//depending on how many rows are in the txtArea:
echo "<br>A0: ".$array[0];
echo "<br>A1: ".$array[1];
echo "<br>A2: ".@$array[2];
//echo "<br>A3: ".@$array[3];



$string = $txtArea;

$Data = str_getcsv($txtArea, "\n"); //parse the rows
foreach($Data as &$Row) $Row = str_getcsv($Row, ";"); //parse the items in rows




while (($data = str_getcsv($txtArea, 20, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
}
		
		
echo "<br>exlplode1<br>";
//echo $Row[0];
echo "<br>";
//echo "ANSWERRR:".$Row[1];
echo "<br>";
//echo "<br>";
//echo "<br>";
//echo "<br>";
echo "<br>";



//$array2 = explode('&#13;', $string);
$array2 = explode('\n', $string);
//echo "<br>exlplode2<br>";
echo "array2_0:";
echo $array2[0];
echo "<br>";
echo "ARRAY2_1:".$array2[1];
echo "<br>";
echo "<br>";
//echo "<br>";
//echo "<br>";
echo 'txtArea'.$txtArea." end textarea<br><br>";
$txtArea = preg_replace('/[ ]{2,}|[\t]/', '_', trim($txtArea));
//$txtArea = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($txtArea));
////$txtArea = preg_replace("/carriage/","newline",$txtArea);

$csv_data   = $txtArea;
//converting tabular delimited data from a csv file.
$LA = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data);
$Cnt = 0;
$Cnt = (count($LA));
echo "csvdATA: ".$csv_data."<br>";
echo "LA0: ".$LA[0]."<br>";
echo "LA1: ".@$LA[1]."<br>";
//echo "LA2: ".@$LA[2]."<br>"; //not workjing
//echo "LA3: ".$LA[3]."<br>";

$thisyear = (Date("Y"));
//echo "thisyear:".$thisyear."<br>";

///Quantity	Description	Price	Total
//echo "<br><br>";

//$string = $txtArea;
//$array = explode('newline', $string);

//The array $array contains ALL the rows now.









$RowNumbr = 0;
$add = 0;
$bank = 0;
$inc = 0;
$exp = 0;
$nextbank = 0;
foreach($array as $key => $value)
{
  $u1 = "rEset";
  $RowNumbr++;
  echo "________________________________________________________________<br><font size = 4>$RowNumbr: NEWW RUN $EventNo</font>";
  echo "<br>Key: ".$key." has the values: <b>". $value;
  echo "</b>";
 
 
 

$arr2 = explode(' ',$value);

 // if (($value == "") or (strpos($value, 'BROUGHT') !== false) )
 // if (strpos($value, 'BROUGHT') !== false) 
  //if (($value == "") or (strpos($value, 'BROUGHT') !== false) )
 // if (($value == "") or (strpos($value, 'BROUGHT') !== false) )
	 echo "arr21:".@$arr2[1];
$arr21='';

	 $arr21 = @$arr2[1];
  if (( $arr21 == "") or  ($value == "") or (strpos($value, 'CARRIED') !== false) or (strpos($value, 'BROUGHT') !== false)  )
 {
	  echo "<br><br>skip due to blank arr2: $arr21";
	  echo "<br>or skip due to blank value: $value";
	  echo "<br>or skip due to find CARRIED/BROUGHT in value";
  }
  else
  {
  
  
  $mm = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $value);
$Cnt = 0;
$Cnt = (count($mm));
if ((float)$bank == (float)$nextbank)
	echo "<br><font color = green>yes  bank $bank is same as nextbank: $nextbank </font><br>";
else
	echo "<br><font color = red>no,&nbsp;&nbsp;   bank $bank is not the same as <br>nextbank: $nextbank </font><br>";

echo "da: ".$mm[0]."<br>";$da = $mm[0];
echo "st: ".$mm[1]."<br>";$st = $mm[1];
echo "exp: ".$mm[2]."<br>";$exp = $mm[2];
$exp = str_replace( ',', '', $exp );

echo "inc: ".$mm[3]."<br>";

$inc = $mm[3]; //but sometimes it comes to R1,450. remove komma seperator
$inc = str_replace( ',', '', $inc );


$nextbank = (float)$bank+(float)$inc+(float)$exp;
echo "add = bank $bank plus inc $inc minus exp $exp totls: ".$nextbank."<br>";


	
  
  echo "bank: ".$mm[4]."<br>";$bank = $mm[4];

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
//$string = "account Tel48201389 user@whatever.net dated 2013-07-01 in JHB installation on 2013-08-11 in PE";
  $trtyu = "reSet";
 if (preg_match_all("@\d{4}-\d{2}-\d{2}@", $value, $matches)) {
// if (preg_match_all("@\d{4}-\d{2}@", $value, $matches)) {
   //print_r($matches);
   echo "";
   echo "<br>";
//echo "matches[0]: ".$matches[0] . ", ";// . $matches[0][1] . "\n";
//echo "matches[0][0]: ".$matches[0][0] . ", ";// . $matches[0][1] . "\n";
     $trtyu = $matches[0][0] ;
	//echo "trtyu: ".$trtyu;
//echo $matches[1][0] . ", " . $matches[1][1] . "\n";

}

if ($trtyu == "reSet")
{
 if (preg_match_all("@\d{4}-\d{2}@", $value, $matches)) {
   //print_r($matches);
   echo "<br>";
   echo "";
//echo "matches[0]: ".$matches[0] . ", ";// . $matches[0][1] . "\n";
echo "matches[0][0]: ".$matches[0][0] . ", ";// . $matches[0][1] . "\n";
   echo "<br>";
   echo "";
   $trtyuagain = $matches[0][0] ;
	echo "trtyiagain: ".$trtyuagain;

//echo $matches[1][0] . ", " . $matches[1][1] . "\n";
}
}














    echo "<br>";
  }//from skip if blank input  
  
  if (!strpos($value, '2014')){       //StringOfSearch, $StringContains
   // Do something if not contains $StringContains
   
 /*  echo "import4SectionBT.php";
   //include "import4SectionBT.php"; //inside here insert or update NOT successful !unsuccessful !
   echo "END OF import4SectionBT.php";
  */
     
   
  
   }
else{
   // Do something if contains $StringContains
	//now we extract data from value and change the array: $array[$key] = $newvalue
	//we got to determine the CustNo of the username u1:
 

//echo " userr: ". $u1 . "<<<>>>";



if ($u1 === "")
{
//echo "testR:".$value."<br>";
//preg_match_all('/(\d{10})/', $value, $matches);
//return $matches;
//print $matches[0][0]." <br> ".$matches[0][1]."\n";
preg_match_all('/(\d{10})/', $value, $matchesT);

}


/*$fulldate = $matches[0][0];
echo " fulldate:".$fulldate." "; // prints @example.com
  echo " u1: <b>".$u1."</b> "  ;
  
  echo "udp__:".$CustNo." check import4Section.php"  ;
  
  if (strlen($fulldate)== 7)
  
  $fulldate = $fulldate.'-02';
  




  
  
  
  
  
  

  
  
  
  
  
  
echo '</br>';

mysqli_query($DBConnect, $queryI);
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<font size = 4 color = red><b><b>insert NOT successfull!! unsuccessfull!$value</b></b></font><br><br><a href = 'addEventCsess.php' target='_blank'>addEventCsess.php</a><br>";
echo "<br><font size = 4 color = red><b><b>/b></b></font><br><br><a href = 'addEventCustProcess_sessT.php' target='_blank'>addEventCsess.php</a><br>";
echo " for francis only: http://localhost/ACS/addEventCsess.php?link=h1";
echo "<br>";

echo "<a href = 'http://localhost/phpmyadmin/sql.php?db=kc&goto=db_structure.php&table=events'>php admin event</a><br><br>";
}

else
{
echo "<font color = 'green'>insert success! :-)<br></font>";
$EventNo++;
}
$CustNo = "resEt".$CustNo;
$value = "reseT";

echo $queryI;
*/}


echo ";<br><br>";

unset($value);



}



?>


