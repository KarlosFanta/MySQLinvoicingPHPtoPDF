<meta charset="UTF-8">
<?php

//I think all we need here is the database connection. That's all.

//You pass to the mysqli class host, user, password and DB arguments.
//instantiating a mysqli class object named $DBConnect using the mysqli() function:

//OBJECT ORIENTED:
// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");

//PROCEDURAL
 $DBConnect = mysqli_connect("localhost", "root", "Itsmeagain007#", "kc");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	if (mysqli_connect_errno())
  /* Of course, your error handling is nicer... */
  die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));

/* change character set to utf8 */
if (!mysqli_set_charset($DBConnect, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($DBConnect));
} else {
echo "";
    //printf("Current character set: %s\n", mysqli_character_set_name($DBConnect));
}

/*
/* Connection 1, connection bound SQL user variable, no SELECT thus run on master
if (!$DBConnect->query("SET @myrole='master'")) {
 printf("[%d] %s\n", $DBConnect->errno, $DBConnect->error);
}

/* //Connection 2, run on slave because SELECT, provoke connection error
if (!($res = $DBConnect->query("SELECT @myrole AS _role"))) {
 printf("[%d] %s\n", $DBConnect->errno, $DBConnect->error);
} else {
 $row = $res->fetch_assoc();
 $res->close();
printf("@myrole = '%s'\n", $row['_role']);
}

	*/

/*	if ($DBConnect->connect_error) {
    die('Connect Error (' . $DBConnect->connect_errno . ') '
            . $DBConnect->connect_error);
}


	// return name of current default database
	//object oriented:
if ($result = $DBConnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
   // printf("Default database is %s.\n", $row[0]);
    $result->close();
}
*/




//Define BD charset ut8 and table charset utf8, charset file html utf8.
//Use mysql_query('set names utf8'); before your main query




















/* change db to another db
$DBConnect->select_db("kc");

//return name of current default database
if ($result = $DBConnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}
*/




?>
