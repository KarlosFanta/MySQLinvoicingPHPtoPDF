<form >  
          
            <!-- Below input elements have attribute "required" -->
            <input type="checkbox" name="check" id="GFG"
                    value="1" required>Checked by default<br>  
                      
            <input type="checkbox" name="check" value="2"> 
                    Not checked by default<br>  
        </form> <br> 
          
        <button onclick="myGeeks()"> 
            Submit 
        </button> 
          
        <p id="sudo" style="color:green;font-size:30px;"></p> 
          
        <!-- Script to use required property -->
        <script> 
            function myGeeks() { 
                var g = document.getElementById("GFG").required; 
                document.getElementById("sudo").innerHTML = g; 
            } 
        </script> 
    </body>  
</html>                     