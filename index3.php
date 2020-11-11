<?php
// connect to database
include 'dbConnect.php'; //PDO

// retrieve list of users and put it in the select box
//$query = "SELECT CustNo, firstname, lastname, username FROM users";
$query = "select CustNo, CustFN, CustLN from customer order by CustLN";

$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

// make sure there are records on the database
if($num > 0){

// this will create selec box / dropdown list with user records
//echo "<select id='users'>";  //this one must stay id and also users
echo "<select name='mydropdownEC' id='mydropdownEC'>";

        // make a default selection
        echo "<option value='0'>Select da ooop ...</option>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "<option value='{$CustNo}'>{$CustLN} {$CustFN}</option>";
        }
echo "</select>";

}

// if no user records
else{
        echo "<div>No records found</div>";
}

// this is where the related info will be loaded
echo "<div id='userInfo'></div>";
echo $query;
?>

<script src="jquery-1.10.1.min.js" ></script>
<script>
$(document).ready(function(){
        $("#mydropdownEC").change(function(){

                // get the selected user's id
                var CustNo = $(this).find(":selected").val();

                // load it in the userInfo div above
                $('#userInfo').load('data2.php?id=' + CustNo);

        });
});
</script>

</body>
</html>
