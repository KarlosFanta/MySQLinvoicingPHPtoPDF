
<?php

/*
    Disable the Backspace key (Go back one page) in Firefox:
	Open Mozilla Firefox
    In the Address bar –> Type “about:config” and press enter
    Press “I’ll be careful, I promise” button and press enter
    In the filter box type “browser.backspace_action”
    You will see a configuration in the display window below, with a value of “0”
    Change this to “1” in order to disable backspace in firefox.
*/
	$page_title = "Select a customer";
//	include 'dalogin/index.php';
//	include 'dalogin/USerSession.php';
	//include 'dalogin/CheckLogin.php';

require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';
//include 'calculator/index.php';
$item3b='';
?>
<html>
<head>
<title>LedgerNotes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	       <script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){

                          var name=$("#name").val();
                          var message=$("#message").val();

                          $.ajax({
                              type:"post",
                              url:"processLedgerNotes.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }

                          });

                    });
                   $("#button2").click(function(){

                          var name=$("#name").val();
                          var message=$("#message").val();

                          $.ajax({
                              type:"post",
                              url:"processLedgerNotes.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }

                          });

                    });
                   $("#button3").click(function(){

                          var name=$("#name").val();
                          var message=$("#message").val();

                          $.ajax({
                              type:"post",
                              url:"processLedgerNotes.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }

                          });

                    });

				});

//now the stuff to make things fancy:
//function changeTest ( form ) { form.echoText.value = form.origText.value; }
function changeTest ( form ) {
//document.getElementById("button").style.background='#055300';
	document.getElementById("button").value="Save Note";
	document.getElementById("button2").value="Save Note";
	document.getElementById("button").disabled=false;
	document.getElementById("button2").disabled=false;

	window.onbeforeunload = function() {
    return "You have attempted to leave this page. "
           + "If you have made any changes to the fields without "
           + "clicking the Save button, your changes will be lost. "
           + "Are you sure you want to exit this page?";
};
 }
 			   //document.getElementById("button").style.background='#000000';
function reply_click(clicked_id)
{
    //alert(clicked_id);
	//document.getElementById("button").style.background='#00ff00';
	//document.getElementById("button").disabled=false;
	//document.getElementById("button").enabled=true;
	document.getElementById('message').focus();
document.getElementById("button").disabled=true;
document.getElementById("button2").disabled=true;

	//document.getElementById("button").style.background='#F0FFFF';
}
	function disable()
{
//document.getElementById("message").focus();
document.getElementById("button").disabled=true;
document.getElementById("button2").disabled=true;

}
//don;t forget body onload below:
       </script>
   </head>

 <body onload="javascript:disable();">


<br><br>
<b><a href="viewDraftInv.php" >viewDraftInv.php</a>
<br>
</font>

   <form name="daBigNote">

	<?php //include 'compare2.php'; //THIS INLCUDE STAEMENT WAS CAUSING ISSUES in my next code!

	$queryS = "SELECT * FROM LedgerNotes ORDER BY id DESC LIMIT 1";

	if ($result2 = mysqli_query($DBConnect, $queryS)) {
	  while ($row2 = mysqli_fetch_assoc($result2)) {
			$item1b = $row2["message"];
			$row_cnt = mysqli_num_rows($result2);
		}
mysqli_free_result($result2);
	}
$rowsE = substr_count( $item1b, "\n" )+2;

	?>
	&nbsp;&nbsp;&nbsp;

	<a href = 'http://karlos.co.za/79/m1.php' target = '_blank'>karlos.co.za/79/m1.php</a>
	<a href = 'http://localhost/phpmyadmin/index.php?db=kc&table=LedgerNotes' target = '_blank'>phpMyadmin</a>
	<!--<a href = 'compare2.php'>compare2</a><a href = 'compare3.php'>compare3</a>-->
	<a href = 'compare5.php'>compare5</a>
	<a href = 'http://localhost/1streetLights/import4HTMLtoExcel.php'  target = '_blank'>Streetlights</a><br>
		<input type="button" value="Update LedgerNotes" id="button"  onClick="reply_click(this.id);">



	<br>
	<textarea name="message" id="message"  style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows="<?php echo $rowsE; ?>" cols="94"  onkeypress="changeTest(this.form)"><?php echo $item1b; ?></textarea><input type="button" value="Update LedgerNotes" id="button2">
	<br/>
	<input type="button" value="Update the LedgerNotes" id="button3"   onClick="reply_click(this.id);">
	<div id="info" /> <!-- ajax happens in processLedgerNotes.php -->
   </form>
  </body>
</html>



</body>

</html>
