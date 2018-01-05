
<html>
<head>
<title>Backup selected table</title>
</head>
<body>
<?php	
	require_once("inc_OnlineStoreDB.php");//page567
	require_once('header.php');
?>
<form name="add_event" action="addEventprocess_lastMAIN.php" method="post">
<font size = 3><b>Write Table to sql file<br></b></font>
<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the eventomer for updating before we change him on the last form.

//$TBLrow = $_POST['mydropdownEC'];
//echo "TBLrow: " .$TBLrow."</BR>";
//$TableName = explode(';', $TBLrow );


$table = $_POST['mydropdownEC'];



/*while ($TBLrow !=NULL) {
echo "$EventNo</br />";
$EventNo = strtok(";");
}
echo "EventNozERO: ";
echo $EventNo[0]."</br />";*/
//$table = ($TableName[0]);

echo "<br>table:".$table."</br />";
/*
$SQLstring = "SELECT * FROM $table " ;
//echo $SQLstring;
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='90%' border='0'>\n";
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);
echo "{$row[0]} ";
echo "&nbsp;&nbsp;{$row[1]} ";
echo "&nbsp;&nbsp;{$row[2]} ";
echo "&nbsp;&nbsp;{$row[3]} ";
echo "&nbsp;&nbsp;{$row[4]} ";
echo "&nbsp;&nbsp;{$row[5]} ";
echo "&nbsp;&nbsp;{$row[6]} ";
echo "&nbsp;&nbsp;{$row[7]} ";
echo "&nbsp;&nbsp;{$row[8]} ";
echo "&nbsp;&nbsp;{$row[9]} ";
echo "&nbsp;&nbsp;{$row[13]} ";
echo "&nbsp;&nbsp;<br>Important: {$row[12]} ";
echo "</tr>\n";


		}
    $result->close();
	
}
echo "</table>";
*/

error_reporting(E_ALL);
echo "<pre>";


// DEMONSTRATE HOW TO EXPORT A TABLE IN CSV FORMAT


// SET YOUR TABLE NAME HERE - OR MAYBE USE THE URL "GET" ARGUMENT?
$table_name = $table;


// DATABASE CONNECTION AND SELECTION VARIABLES - GET THESE FROM YOUR HOSTING COMPANY
$db_host = "localhost"; // PROBABLY THIS IS OK
$db_name = "kc";
$db_user = "root";
$db_word = "Itsmeagain007#";

// OPEN A CONNECTION TO THE DATA BASE SERVER AND SELECT THE DB
$mysqli = new mysqli($db_host, $db_user, $db_word, $db_name);

// DID THE CONNECT/SELECT WORK OR FAIL?
if ($mysqli->connect_errno)
{
    $err
    = "CONNECT FAIL: "
    . $mysqli->connect_errno
    . ' '
    . $mysqli->connect_error
    ;
    trigger_error($err, E_USER_ERROR);
}


// OPEN THE CSV FILE - PUT YOUR FAVORITE NAME HERE
$csv = 'EXPORT_' . date('Ymdhis') . "_$table_name" . '.csv';
$fp  = fopen($csv, 'w');
if (!$fp) trigger_error("UNABLE TO OPEN $csv", E_USER_ERROR);


// GET THE COLUMN NAMES
$sql = "SHOW COLUMNS FROM $table_name";
if (!$res = $mysqli->query($sql))
{
    $err
    = 'QUERY FAILURE:'
    . ' ERRNO: '
    . $mysqli->errno
    . ' ERROR: '
    . $mysqli->error
    . ' QUERY: '
    . $sql
    ;
    trigger_error($err, E_USER_ERROR);
}
if ($res->num_rows == 0)
{
    trigger_error("WTF? $table_name HAS NO COLUMNS", E_USER_ERROR);
}
else
{
    while ($show_columns = $res->fetch_object())
    {
        $my_columns[] = $show_columns->Field;
    }
    // var_dump($my_columns);
}

// WRITE THE COLUMN NAMES TO THE CSV
if (!fputcsv($fp, $my_columns)) trigger_error("FAILURE IN WRITING COLUMN NAMES TO $csv", E_USER_ERROR);


// GET THE ROWS OF DATA
$sql = "SELECT * FROM $table_name";
if (!$res = $mysqli->query($sql))
{
    $err
    = 'QUERY FAILURE:'
    . ' ERRNO: '
    . $mysqli->errno
    . ' ERROR: '
    . $mysqli->error
    . ' QUERY: '
    . $sql
    ;
    trigger_error($err, E_USER_ERROR);
}

// ITERATE OVER THE DATA SET http://php.net/manual/en/mysqli-result.fetch-row.php
while ($row = $res->fetch_row())
{
    // WRITE THE COMMA-SEPARATED VALUES.
    if (!fputcsv($fp, $row)) trigger_error("FAILURE IN WRITING DATA TO $csv", E_USER_ERROR);
}

// ALL DONE
fclose($fp);


// SHOW THE CLIENT A LINK
echo "<p><a href=\"$csv\">$csv</a></p>" . PHP_EOL;






/*
backup_tables('localhost','root','Itsmeagain007#','kc');
// backup the db OR just a table 
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		@$return.= '- TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= '  INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}


/*
//seems to work but can;t find the file.
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Itsmeagain007#';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$table_name = "aproof";
$backup_file  = "../$table_name.sql";
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

mysql_select_db('kc');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not take data backup: ' . mysql_error());
}
echo "Backedup  data successfully\n";
mysql_close($conn);


*/



/*
$username = "root";
$password = "Itsmeagain007#";
$hostname = "localhost";
$database = "kc";
$username =escapeshellcmd($username);
$password =escapeshellcmd($password);
$hostname =escapeshellcmd($hostname);
$database =escapeshellcmd($database);
$backupFile='url'.date("Y-m-d-H-i-s").$database.'.sql';

 $command = "mysqldump -u$username -p$password -h$hostname $database wp_posts > $backupFile";
system($command, $result);
echo $result;
*/
?>

<?php
/*
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'rootpassword';

$backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';
$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ".
           "test_db | gzip > $backup_file";

system($command);
*/
?>