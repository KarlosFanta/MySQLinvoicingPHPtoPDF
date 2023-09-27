<a href = "SelectedInvoicesAJAX.php?CustNo=1">SelectedInvoicesAJAX.php?CustNo=1</a>
<script>

</script>
<?php
$CustNo = "";
$CustNo = $_GET['CustNo'];
$txtfilename = "SelectedInvoicesAJAX.php?CustNo=$CustNo";
?>
or click: <a href = "<?php echo $txtfilename; ?>"><?php echo $txtfilename; ?></a>
<title>Selected Transactions and Invoices for Linking</title>
SelectedInvoicesTransactionsToLink.php<br><br>
<a href = 'SelInvsToLink.php?CustNo=<?php echo $CustNo; ?>'>NEXT: SelInvsToLink.php</a><br><br>
<a href = 'SelTransToLink.php?CustNo=<?php echo $CustNo; ?>'>NEXT: SelTransToLink.php</a><br><br>
<br>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
	  <form action="action.php" method="get">
           <br />  
		   
		   
           <div class="container" style="width:500px;">  
                <h3 class="text-center">Thank you for your payment of R2886 on the 7th Oct 2021. Please select the invoices that you want to assign to this payment then click on Query to verify the amount:</h3>  
				
 		   <br>Required: R2886<br><Br>
               <div class="checkbox">  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="287.5" />R287.5 <br />  
                     <input type="checkbox" class="get_value" value="402.5" />R402.5 <br />  
                     <input type="checkbox" class="get_value" value="150" />R150 <br />  
                     <input type="checkbox" class="get_value" value="850" />R850 <br />  
                     <input type="checkbox" class="get_value" value="161	" />R161 <br />  
                     <input type="checkbox" class="get_value" value="738" />R738 <br />  
                        
                </div>       
                <button type="button" name="submit" class="btn btn-info" id="submit">Query</button>  
                <br />  
                <div id="result"></div>  
           </div>  
		   
		   When you are happy with the selection, please click Submit:
		   
		        <button type="submit" name="submit" id="submit2">Submit</button>  
           
		   </form>
		   
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var languages = [];  
           $('.get_value').each(function(){  
                if($(this).is(":checked"))  
                {  
                     languages.push($(this).val());  
                }  
           });  
           languages = languages.toString();  
           $.ajax({  
                url:"insertAJAX.php",  
                method:"POST",  
                data:{languages:languages},  
                success:function(data){  
                     $('#result').html(data);  
                }  
           });  
      });  
 });  
 </script>  