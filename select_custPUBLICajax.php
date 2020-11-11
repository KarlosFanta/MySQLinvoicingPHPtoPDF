
<?php
	require_once 'inc_OnlineStoreDB.php';

?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NoteboardAJAXmySQL.php Noteboard with MySQL</title>
<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> this one casues issues-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	       <script type="text/javascript">




               $(document).ready(function(){
                    $("#button").click(function(){

                          var name=$("#name").val();
                          var message=$("#message").val();

                          $.ajax({
                              type:"post",
                              url:"process2.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }

                          });

                    });
					//button2:
                   $("#button2").click(function(){

                          var name=$("#name").val();
                          var message=$("#message").val();

                          $.ajax({
                              type:"post",
                              url:"process2.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }

                          });

                    });

               });
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
/*
window.onunload = function() {
    // Ending up here means that the user chose to leave
    try {
        JQObj.ajax({
            type: "POST",
            url: "http://your.url.goes/here",
            success: function() {}
        });
    } catch(ignored) {}
    console.log("AJAX request sent ! You can leave now...");
};
/*
document.getElementById("message")
        .addEventListener("click", function(evt) {
    location.href = location.href;
});
*/

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


document.getElementById("message").focus();

document.getElementById("button").disabled=true;
document.getElementById("button2").disabled=true;
}
//don;t forget body onload below:
       </script>
   </head>

 <body onload="javascript:disable();">
<?php
	$queryS = "SELECT * FROM comment ORDER BY id DESC LIMIT 1";

	if ($result2 = mysqli_query($DBConnect, $queryS)) {
	  while ($row2 = mysqli_fetch_assoc($result2)) {
			$item1b = $row2["message"];
			//$row_cnt = mysqli_num_rows($result2);
		}
	$result2->free();
	}
?>

   <form name="daBigNote">
	<?php $rowsE = substr_count( $item1b, "\n" )+2;  ?><input type="button" value="Update Note" id="button" onClick="reply_click(this.id);"><br>
	<textarea name="message" id="message"  style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows="<?php echo $rowsE; ?>" cols="110" onkeypress="changeTest(this.form)"><?php echo $item1b; ?></textarea>
	<br/>
	<input type="button" value="Update Note" id="button2" onClick="reply_click(this.id);">
	<div id="info" />
   </form>
  </body>
</html>

