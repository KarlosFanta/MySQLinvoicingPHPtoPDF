<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">





<?php
// validate user input
// $input: variable to be validated
// $type: nofilter, alpha, numeric, alnum, email, url, ip
// $len: maximum length
// $chars: array of any non alpha-numeric characters to allow
function validate($input, $type, $len = null, $chars = null) {
    $tmp = str_replace(' ', '', $input);
    if(!empty($tmp)) {
        if(isset($len)) {
            if(strlen($input) > $len) {
                return FALSE;
            }
        }
        if(isset($chars)) {
            $input = str_replace($chars, '', $input);
        }
        $input = str_replace(' ', '', $input);

        switch($type) {
            case 'alpha':
                if(!ctype_alpha($input)) {
                    return FALSE;
                }
            break;

            case 'numeric':
                if(!ctype_digit($input)) {
                    return FALSE;
                }
            break;

            case 'alnum':
                if(!ctype_alnum($input)) {
                    return FALSE;
                }
            break;

            case 'email':
                if(!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                    return FALSE;
                }
            break;

            case 'url':
                if(!filter_var($input, FILTER_VALIDATE_URL)) {
                    return FALSE;
                }
            break;

            case 'ip':
                if(!filter_var($input, FILTER_VALIDATE_IP)) {
                    return FALSE;
                }
            break;

            case 'nofilter':
                return TRUE;
            break;
        }
        return TRUE;
    } else {
        return FALSE;
    }
}

// example use:
$phone = isset($_POST['phone']) && validate($_POST['phone'], 'numeric', 20, array('(',')','-')) ? $_POST['phone'] : null;
$email_addr = isset($_POST['email_addr']) && validate($_POST['email_addr'], 'email', 255) ? $_POST['email_addr'] : null;
$msg = isset($_POST['msg']) && validate($_POST['msg'], 'nofilter') ? $_POST['msg'] : null;


?>













/*

function validateForm()
{
var x=document.forms["Addcust"]["CustFName"].value;
var ln=document.forms["Addcust"]["CustLName"].value;
var tl=document.forms["Addcust"]["CustTN"].value;
var cl=document.forms["Addcust"]["CustCN"].value;
var em=document.forms["Addcust"]["CustEm"].value;
var pa=document.forms["Addcust"]["CustPA"].value;
var di=document.forms["Addcust"]["CustDi"].value;


if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
  if (ln==null || ln=="")
  {
  alert("Surname must be filled out");
  return false;
  }
 
if ( tl == null ||  tl == "")
  {
  alert(" Telephone number must be filled out");
  return false;
  }
if ( em == null || em == "")
  {
  alert("Email Address must be filled out");
  return false;
  }
if ( pa == null || pa == "")
  {
  alert("Postal ADdress must be filled out");
  return false;
  }
if ( di == null ||  == "")
  {
  alert(" must be filled out");
  return false;
  }

  var atpos=em.indexOf("@");
var dotpos=em.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

  
  
  
  
  
}*/
</script>
</head>

<body>
<?php	$page_title = "View a Customer";
	require_once('header.php');	
	   @session_start();
$CustNo='';
$CustNo = @$_SESSION['CustNo'] ;
?>


<form name="Addcust" action="add_CustProcess.php" onsubmit="return validateForm()" method="post">
		<div>
<h1> QuickEdit Invoice</h1>

<a href = "edit_invCQ.php">QuickEdit Invoice of selected customer</a></br></br></br>
<a href = "view_inv_by_custBasic.php?CustNo=<?php echo $CustNo; ?>">view_inv_by_custBasic.php CHOOSE WHICH FIELDS TO DISPLAY</a></br></br></br>
<a href = "view_inv_by_custWords.php?CustNo=<?php echo $CustNo; ?>">Looking for a word in all invoices of Customer</a></br></br></br>
<a href = "view_inv_by_cust_no_proof.php">view_inv_by_cust_no_proof.php</a></br></br></br>


<h1> PHPmyEdit All Customers</h1>
<a href = "view_inv_all.php">Edit All Invoices ALL CUSTOMERS</a></br></br></br>

<h1> View Customer's Invoices</h1>
<a href = "view_inv.php">View All Invoices </a></br></br></br>
<a href = "view_invD.php">View by Date </a></br></br></br>
<a href = "view_invDunpaid.php">View unpaid invoices</a></br></br></br>

<!--<h1> View All Customer's Invoices by Date</h1>
<a href = "view_invD.php">View All Invoices ALL CUSTOMERS by Date</a></br></br></br>

<h1> View All UNPAID INVOICES of all Customers b</h1>
<a href = "view_invDunpaid.php">View All unpaid Invoices ALL CUSTOMERS by Date</a></br></br></br>
->

<h1> Print Only</h1>
<a href = "select_inv.php">Print Only </a></br></br></br>

		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="validate('Addcust');return false;" /> 
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>

	</div>
 </form>
