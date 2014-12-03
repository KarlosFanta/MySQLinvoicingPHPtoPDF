</head>
    <style>
        ul.cssMenu, ul.cssMenu ul
        {
        	list-style:none;
        	margin:0; padding:0;
        	position: relative;
        }
		
		/*Style for 1st level menu header*/
        ul.cssMenu li
        { 
        	position: relative; 
        	float: left; 
        	zoom: 1; /*Needed for IE*/
        	background: #DDDDDD; /*background color of menu header (1st level)*/
        }
        ul.cssMenu li:hover
        { 
        	background: #AAAAAA /*background color of menu header (1st level) on hover*/; 
        }
        ul.cssMenu li a
        {
			/*Menu link styles*/
        	display: block; 
        	padding: 5px; 
        	color:#000000;
        	font-family: Arial, Times New Roman, Tahoma;
        	font-size: 12px;
        }
        
        /* Building menu items - for 2nd and more level menu items*/
        ul.cssMenu ul 						
        { 
        	display:none; /*initially menu item is hidden*/
        	position: absolute; /*absolute positioning is important for menu to float*/
			width: 150px; 
			
			/*Formating of menu items*/
        	border:1px solid #AAAAAA;
        	padding:1px;
        	background:#FFFFFF;
			
			/*optional - to change position of 2nd level menu item*/
			top: 100%; 
        	left: 0; 
        }
        ul.cssMenu ul li
        { 
        	background: #F5F5F5; 
        	color: #000; 
			border-bottom: 1px solid #DDDDDD; 
			float: none; 
		}
									  
        ul.cssMenu ul li a
        { 
        	width: 100%; 
        	display: block; 
        	color:#000000;
        } 

        /* Menu item position for 3rd level and more */
        ul.cssMenu ul ul
        { 
        	left: 100%; 
        	top: 0; 
        }
        
        /* Hover effect for menu*/
        ul.cssMenu li:hover > ul 			
        { 
        	display:block;
        }
    </style>
	
	<script type="text/javascript">

function showSelectValue(e) {
if (e.target.id!= 'select') {
document.getElementById('test').innerHTML = e.target.value;
}
}

function attachTest() {
document.getElementById('select').addEventListener('mouseover',showSelectValue,false);
}

</script> 
</head>
<body onload="attachTest()">

<div id="test">Something Here</div>

<select id="select">
<option value="1">One</option>
<option value="2">Two</option>
<option value="3">Three</option>
<option value="4">Four</option>
</select> 
<form name="proof2" action="selectCustProof.php" method="post">

Or Select type of proof: (not confirmed payment)
	<div style="height:25px;">
    <ul class="cssMenu">
        <li>
            <a href="#">menu1</a>           
            <ul>
                <li><a href="#">ChequeToBeDeposited</a></li>
                <li><a href="#">ChequeDeliveredToMyBank</a></li>
                <li><a href="#">EFTEmailProof</a></li>
            </ul>
        </li>
 <!--       <li>
            <a href="#">menu2</a>
            <ul>
                <li><a href="#">item1</a></li>
                <li><a href="#">item2</a></li>
                <li><a href="#">item3</a></li>
            </ul>
        </li>
        <li>
            <a href="#">menu3</a>
            <ul>
                <li><a href="#">item1</a>
                    <ul>
                        <li><a href="#">item1</a></li>
                        <li><a href="#">item2</a></li>
                        <li><a href="#">item3</a></li>
                    </ul>
                </li>
                <li><a href="#">item2</a></li>
                <li><a href="#">item3</a></li>
            </ul>
        </li>-->
    </ul>
    </div>

<select  name="Prof"  onchange='this.form.submit()'>
    <option>Make a selection</option>
    <option>ChequeToBeDeposited</option>
    <option>ChequeDeliveredToMyBank</option>
    <option>EFTEmailProof</option>
</select>
<br>
<a href="view_cust_all3.php" >view_cust_all3.php</a></b><br />
<a href="view_inv_all.php" >view_inv_all.php</a></b><br />

<div id="showvalue"></div>
<select name="test">
<option value="1">One</option>
<option value="2">Two</option>
<option value="3">Three</option>
</select>

<?php
//include "OnSelect8.php";
?>

</form>




        <form  action="selectCustProof.php" method="post">
            <input type="submit" name="btnSubmit[]" value="Save" />
            <input type="submit" name="btnSubmit[]" value="Delete" />
        </form>









</body>

</html> 
