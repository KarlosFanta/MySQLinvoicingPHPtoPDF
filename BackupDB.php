<?php
 
 try {

        // open the connection to the database - $host, $user, $password, $database should already be set

       // $mysqli = new mysqli($host, $user, $password, $database);
$DBConnect = mysqli_connect("localhost", "root", "Itsmeagain007#", "kc");


        // did it work?
/*
        if ($mysqli->connect_errno) {

            throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);

        }
*/


        header('Pragma: public');

        header('Expires: 0');

        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

        header('Content-Type: application/force-download');

        header('Content-Type: application/octet-stream');

        header('Content-Type: application/download');

        header('Content-Disposition: attachment;filename="backup_'.date('Y-m-d_h_i_s') . '.sql"');

        header('Content-Transfer-Encoding: binary');



        // start buffering output

        // it is not clear to me whether this needs to be done since the headers have already been set.

        // However in the PHP 'header' documentation (http://php.net/manual/en/function.header.php) it says that "Headers will only be accessible and output when a SAPI that supports them is in use."

        // rather than the possibility of falling through a real time window there seems to be no problem buffering the output anyway

        ob_start();

        $f_output = fopen("php://output", 'w');



        // put a few comments into the SQL file

        print("-- pjl SQL Dump\n");

        print("-- Server version:".$DBConnect->server_info."\n");

        print("-- Generated: ".date('Y-m-d h:i:s')."\n");

        print('-- Current PHP version: '.phpversion()."\n");

    //    print('-- Host: '.$host."\n");

     //   print('-- Database:'.$database."\n");



        //get a list of all the tables

        $aTables = array();

        $strSQL = 'SHOW TABLES';            // I put the SQL into a variable for debuggin purposes - better that "check syntax near '), "

        if (!$res_tables = $DBConnect->query($strSQL))

            throw new Exception("MySQL Error: " . $DBConnect->error . 'SQL: '.$strSQL);



        while($row = $res_tables->fetch_array()) {

            $aTables[] = $row[0];

        }



        // Don't really need to do this (unless there is loads of data) since PHP will tidy up for us but I think it is better not to be sloppy

        // I don't do this at the end in case there is an Exception

        $res_tables->free();



        //now go through all the tables in the database

        foreach($aTables as $table)

        {

            print("-- --------------------------------------------------------\n");

            print("-- Structure for '". $table."'\n");

            print("--\n\n");



            // remove the table if it exists

            print('DROP TABLE IF EXISTS '.$table.';');



            // ask MySQL how to create the table

            $strSQL = 'SHOW CREATE TABLE '.$table;

            if (!$res_create = $DBConnect->query($strSQL))

                throw new Exception("MySQL Error: " . $DBConnect->error . 'SQL: '.$strSQL);

            $row_create = $res_create->fetch_assoc();



            print("\n".$row_create['Create Table'].";\n");





            print("-- --------------------------------------------------------\n");

            print('-- Dump Data for `'. $table."`\n");

            print("--\n\n");

            $res_create->free();



            // get the data from the table

            $strSQL = 'SELECT * FROM '.$table;

            if (!$res_select = $DBConnect->query($strSQL))

                throw new Exception("MySQL Error: " . $DBConnect->error . 'SQL: '.$strSQL);



            // get information about the fields

            $fields_info = $res_select->fetch_fields();



            // now we can go through every field/value pair.

            // for each field/value we build a string strFields/strValues

            while ($values = $res_select->fetch_assoc()) {



                $strFields = '';

                $strValues = '';

                foreach ($fields_info as $field) {

                    if ($strFields != '') $strFields .= ',';

                    $strFields .= "`".$field->name."`";



                    // put quotes round everything - MYSQL will do type convertion (I hope) - also strip out any nasty characters

                    if ($strValues != '') $strValues .= ',';

                    $strValues .= '"'.preg_replace('/[^(\x20-\x7F)\x0A]*/','',$values[$field->name].'"');

                }



                // now we can put the values/fields into the insert command.

                print("INSERT INTO ".$table." (".$strFields.") VALUES (".$strValues.");\n");

            }

            print("\n\n\n");



            $res_select->free();



        }





    } catch (Exception $e) {

        print($e->getMessage());

    }





    fclose($f_output);

    print(ob_get_clean());

    $DBConnect->close();
	
	?>
