<!DOCTYPE html>
<html lang="en">
<head>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    
<script>
 function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  var status = document.execCommand("copy");
  if(status){
   $("#output").text("worked")
  }else{
   $("#output").text("didn't work")
  }
  $temp.remove();
 }
</script> 
    
  </head>
<body onload="copyToClipboard('#p1')">
 <p id="p1">vvvv</p>
    <button onclick="copyToClipboard('#p1')">sfvsfv</button>
 <p id="output"></p>