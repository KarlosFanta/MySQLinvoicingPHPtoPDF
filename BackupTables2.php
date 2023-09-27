
<b><br><font size = "4" type="arial">Backup Tables</b></font>
</br>
</br>

<form name="bkp" action="tableProcessSQL.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select Table</option>";
<?php
 
 require_once("inc_OnlineStoreDB.php");
 
 $query1 = "SHOW TABLES";
echo $query1;

 	$result = $DBConnect->query($query1);
    while ( $row = $result->fetch_row() ){
    $table = $row[0];
 echo '<h3>',$table,'</h3>';

//while ($row = mysql_fetch_assoc($result)) {
//if ($result = mysqli_query($DBConnect, $query1)) {
//  while ($row = mysqli_fetch_row($result)) {
print "<option value='$table'>$table";
//print "_".$table;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print "</option>"; 

			}
		// mysqli_free_result($result);
	//	}
//	mysqli_close($link);

?>
<input type="submit" name="btn_submit" value="select table" /> 
	
</select></p>  


 
 
 
 
<?php
  /*

 
 
 
 
 
 
 
 
	$result = $DBConnect->query("SHOW TABLES");
    while ( $row = $result->fetch_row() ){
    $table = $row[0];
 echo '<h3>',$table,'</h3>';
$result1 = $DBConnect->query("SELECT * FROM $table");
if($result1) {
    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    $column = $DBConnect->query("SHOW COLUMNS FROM $table");
echo '<tr>';
    while($row3 = $column->fetch_row() ) {
    echo '<th>'.$row3[0].'</th>';
}
echo '</tr>';
    while($row2 = $result1->fetch_row() ) {
      echo '<tr>';
      foreach($row2 as $key=>$value) {
        echo '<td>',$value,'</td>';
      }
      echo '</tr>';
    }
    echo '</table><br />';
  }
  }
$DBConnect->close();
*/
	?>