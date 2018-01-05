<?php	$page_title = "All tables";
	require_once('header.php');
require_once ('db.php')	
	
/*$conn = oci_connect('system', '1234', 'localhost/xe');

$query_term = "select custno||'; '||custfn||' '||custln from customer order by custno";
$stid_term = OCIParse($conn, $query_term); 
OCIExecute($stid_term,OCI_DEFAULT);
*/
?>

<b><font size = "4" type="arial">Tables</b></font>
</br>
</br>

<?php
$dbname = 'kc';


$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

mysql_free_result($result);
?>
