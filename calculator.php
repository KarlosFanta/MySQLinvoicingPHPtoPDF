<script>

$(".calculate").live('click',function(){
var equation = encodeURIComponent($('#screen').html());
var sign = $('.lastClicked').attr('id');

$.ajax({
  type: 'POST',
  data: {func : sign, equate : equation},
  url: "/calculate.php",
  success: function(data) { 
  $('#screen').html(data.response);
  $('.posted').val("true");
        },
  error: function(jqXHR, textStatus, errorThrown) {
  },
  statusCode: {
    404: function() {
      alert("page not found");
    }},
dataType: "json"
    });
});

</script>
- See more at: http://func5studios.com/blog/php-ajax-calculator-0#sthash.rrLnumZZ.dpuf

<?php
/*function add($calculate) {  }

function subtract($calculate) {  }

function multiply($calculate) {  }

function divide($calculate) {  }
*/?> 

- See more at: http://func5studios.com/blog/php-ajax-calculator-0#sthash.rrLnumZZ.dpuf

<?php
/*
$calculate = urldecode($_POST['equate']);
$func = $_POST['func'];
if(isset($func)){
switch($func){
case "add":
$response = add($calculate);
        break;
case "subtract":
$response = subtract($calculate);
        break;
case "multiply":
$response = multiply($calculate);
        break;
case "divide":
$response = divide($calculate);
        break;
}
}

/*function add($calculate)
{
}

function subtract($calculate)
{
}

function multiply($calculate)
{
}

function divide($calculate)
{
}
*/
?> - See more at: http://func5studios.com/blog/php-ajax-calculator-0#sthash.rrLnumZZ.dpuf

<?php
$equate = "";
$calculate = urldecode($_POST['equate']);
$func = $_POST['func'];
if(isset($func)){
switch($func){
case "add":
$response = add($calculate);
return json_encode($response);
        break;
case "subtract":
$response = subtract($calculate);
return json_encode($response);
        break;
case "multiply":
$response = multiply($calculate);
return json_encode($response);
        break;
case "divide":
$response = divide($calculate);
return json_encode($response);
        break;
}
}

function add($calculate)
{
$addItems = $calculate;
$piece = explode(" ", $addItems);
foreach($piece as $pieces){
  if($pieces == "plus"){
  continue;
  }
$equation = $piece[0] + $piece[2];
}
$finalequation = "" . $equation . "";
$result = array('response' => $finalequation);
return $result;
}

function subtract($calculate)
{
$subtractItems = $calculate;
$piece = explode(" ", $subtractItems);
foreach($piece as $pieces){
  if($pieces == "minus"){
  continue;
  }
$equation =  $piece[0] - $piece[2];
}
$finalequation = "" . $equation . "";
$result = array('response' => $finalequation);
return $result;
}

function multiply($calculate)
{
$multiplyItems = $calculate;
$piece = explode(" ", $multiplyItems);
foreach($piece as $pieces){
  if($pieces == "times"){
  continue;
  }
$equation =  $piece[0] * $piece[2];
}
$finalequation = "" . $equation . "";
$result = array('response' => $finalequation);
return $result;
}

function divide($calculate)
{
$divideItems = $calculate;
$piece = explode(" ", $divideItems);
foreach($piece as $pieces){
  if($pieces == "times"){
  continue;
  }
$equation =  $piece[0] / $piece[2];
}
$finalequation = "" . $equation . "";
$result = array('response' => $finalequation);
return $result;
}

?>
- See more at: http://func5studios.com/blog/php-ajax-calculator-0#sthash.rrLnumZZ.dpuf
