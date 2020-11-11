<?php
require_once 'inc_OnlineStoreDB.php';
	$queryS = "SELECT * FROM comment ORDER BY id DESC LIMIT 1";

	if ($result2 = mysqli_query($DBConnect, $queryS)) {
	  while ($row2 = mysqli_fetch_assoc($result2)) {
			$item1b = $row2["message"];
			$row_cnt = mysqli_num_rows($result2);
		}
	$result2->free();
	}
?>

<html>
   <head>

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
               });

       </script>
   </head>

 <body>
   <form name="daBigNote">
	<?php $rowsE = substr_count( $item1b, "\n" )+2;  ?>
	<textarea name="message" id="message" rows="<?php echo $rowsE; ?>" cols="70" ><?php echo $item1b; ?></textarea>
	<br/>
	<input type="button" value="Update Notes" id="button">
	<div id="info" />
   </form>
  </body>
</html>
