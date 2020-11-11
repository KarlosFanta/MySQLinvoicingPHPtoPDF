<!DOCTYPE html>
<html>
<head>

<?php


	//	require_once 'login_check.php';
	// -- Nothing Below this line requires editing --

	$page_title = "Customer";
	//require_once 'header.php';
	//require_once 'db.php';
	require_once 'inc_OnlineStoreDB.php';
	require_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Customers</title>
    <link href="dalogin/assets/css/bootstrap.css" rel="stylesheet">

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
&nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp; <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Customer First Name..."  autofocus />
        <div class="result"></div>
    </div>


<?php //require_once 'header.php'; ?>
<b><font size = "4" type="arial">View Customers</b></font>
</br><br><br><br><br><br>
<?php
?>
<!--<b><font size = "4" type="arial" color = "grey">Select A Customer into the session</b></font><font color = dark yellow> view_customers2.php</font>
-->
</br>
</br>

































<h4> View All Customers</h4>
<a href = "view_customers2.php">View All Customers </a></br></br></br>


<h4> Edit All Customers</h4>
<a href = "view_cust_all2.php">Edit All Customers </a></br></br></br>

<h4> Edit All Customers one big page</h4>
<a href = "view_cust_all3.php">Edit All Customers BIG PAGE </a></br></br></br>

		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="validate('Addcust');return false;" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>

	</div>
 </form>
