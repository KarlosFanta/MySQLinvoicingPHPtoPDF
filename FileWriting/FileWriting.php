<?php
$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><tr><th><b>Register:</b></th><th>" .$query . ";</th><br/>"); 
fwrite($open, "<th><b>Date & Time:</b>". date("d/m/Y"). "</th>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = '$file'>Check log file: [Add table and end /table HTML keywords to the file to view the table contents.]</a><br />";
