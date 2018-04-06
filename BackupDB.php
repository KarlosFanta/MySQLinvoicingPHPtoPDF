Save the file into a folder that gets backed up onto an external drive.<br>
Or save directly to an external drive or backup server.

<br>
<br>
<a href = 'backupDb2.php?dadb=kc'>Backup now: KC database</a><br>
C:\Users\Alpha\Documents<br>
<br>
<br>
NB Unfortunately there is no ROLLBACK option!<br><br>


Don;t forget to backup your online databases!<br>
<br>

<br>
to backup online databases in CPAnel:
phpmyAdmin> Export > SQL/CSV

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Itsmeagain007#";
$sql="SHOW DATABASES";
$link = mysqli_connect($dbhost,$dbuser,$dbpass) or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');
$result=mysqli_query($link,$sql);
if (!mysqli_query($link, $sql)) {
        printf("Error: %s\n", mysqli_error($link));
    }
$row_getRS = mysqli_fetch_assoc($result);

while( $row = mysqli_fetch_row( $result ) ):
        if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
            echo "<a href = 'backupDb2get.php?dadb=".$row[0]."'>".$row[0].".</a>\r\n<br>";

        }
endwhile;
?>
