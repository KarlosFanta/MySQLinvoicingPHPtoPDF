<?php
	include('header.php');	
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
/*
$delimiter = ',';
$k = 0;
//$db = new mysqli('localhost', 'username', 'password', 'database');

if (($handle = fopen("import.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
	echo "go<br>";
		foreach($data as $i => $content) {
			$data[$i] = $DBConnect->real_escape_string($content);
		}
		echo "<br>";
		$DBConnect->query("INSERT INTO contacts VALUES('" . implode("','", $data) . "');");
		echo $data[$k];
		$k++;
		echo "<br>";
		
		echo $i;
	}
	fclose($handle);
}
*/

?>

 //$DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Record By CSV</title>
</head>

<body>
<p>form action="" method="post" enctype="multipart/form-data<br>
insert into contacts(ContNo, Qty,Descr, Price) values({$strTmp}, '_')<br>
<b>Upload 1.csv from c:\program files\Apache... \ACS<br></b>
<form id="form1" action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" size="100" />
<br/>
<input type="Submit" value="Upload" name="submitBtn">Do not Refresh the page, rather Upload again!
</form>
</p>
</body>
</html>


<?php
$daNextNo = 1; //default when table is empty.
//$query = "SELECT  MAX(CustNo)  AS MAXNUM FROM customer";
$query = "SELECT MAX(ContNo), Descr FROM contacts";
$result = $DBConnect->query($query);
/* numeric array */
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[1]);
//echo $row[0];
//echo $row[1];
//$CN = $row[1];

$daNextNo = 1; //forces a 1 if table is completely empty.
$daNextNo = intval($row[0])+1;








if (isset($_POST['submitBtn'])) { //read csv file
//$DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

//$cnx = mysql_connect("localhost","root","Itsmeagain007#") or die("Error!");
//mysql_select_db("kc",$cnx);

$num = 0;
$ContNo = $daNextNo;
if (trim($_FILES["file"]["name"]) == "") {
print "Please select file to upload.<br>";
} else { //read file
$fp = fopen($_FILES["file"]["tmp_name"], 'r') or die("can't open file");
$strTmp = "";
echo "opened file";
while ($csv_line = fgetcsv($fp, 1024)) {
print '<tr>';
echo "yo";
for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
//$strTmp .= "'".$csv_line[$i]."',";

$strTmp  = "'".$csv_line[0]."',";
$strTmp .= "'".$csv_line[1]."',";//Add another one:
$strTmp .= "'".$csv_line[2]."',";
//$strTmp .= "'".$csv_line[3]."'";


}
$strTmp = substr($strTmp,0,strlen($strTmp)-1); //remove last character (,)
$ContNo++;
echo "<br>strTmp: ".$strTmp."<br>";
$strTmp = $ContNo.",".$strTmp;

echo "<br>strTmp2: ".$strTmp."<br>";

$sql1 = "insert into contacts(ContNo, Qty,Descr, Price, u1) values( {$strTmp}, '_')"; //******/
//$result1 = mysql_query($sql1) or die("error! {$sql1}");
$result1 = mysqli_query($DBConnect, $sql1) or die("error! {$sql1}");

$num++;
$strTmp = "";
}
//truncate table `contacts` ;  to empty table
fclose($fp) or die("can't close file");
print "\n{$num} records created...";
}
}
?>
