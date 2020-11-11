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
/*function validate($input, $type, $len = null, $chars = null) {
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
*/
// example use:
//$phone = isset($_POST['phone']) && validate($_POST['phone'], 'numeric', 20, array('(',')','-')) ? $_POST['phone'] : null;
//$email_addr = isset($_POST['email_addr']) && validate($_POST['email_addr'], 'email', 255) ? $_POST['email_addr'] : null;
//$msg = isset($_POST['msg']) && validate($_POST['msg'], 'nofilter') ? $_POST['msg'] : null;

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
require_once 'header.php';
	@session_start();
	$CustNo = "";
	if (isset($_SESSION['CustNo']))
		{
	echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustNo = $_SESSION['CustNo'];
		}
	if ($CustNo == '')
		$CustNo = 1;
//$Prof = @$_POST['Prof'];

	?>


<!--<form name="Addcust" action="add_CustProcess.php" onsubmit="return validateForm()" method="post">
		<div>
</form>
-->

<h1> QuickEdit TransactionC</h1>

<a href = "edit_transCQ.php">QuickEdit TransactionC of selected customer</a></br></br></br>
<a href = "edit_proofsCQ.php">QuickEdit proofsC of selected customer</a></br></br></br>
<a href = "view_proof_all.php">QuickEdit proofs of ALL customers</a></br></br></br>


<h1> Edit Transaction</h1>
<a href = "edit_trans.php">Edit Any Transaction </a></br></br></br>

<h1> View Transactions of Selected Customer</h1>

<a href="./view_trans_cust.php">Customer Transactions?CustNo=<?php echo $CustNo; ?><br>to check if they are overpaid or underpaid

<a href="./view_trans_cust.php">Customer Transactions<br>
<a href="./view_trans_cust2.php">Customer Transactions2</a></br><a href="./viewProofCust.php">Customer's Proofs</a></br>
<a href="./viewProof.php">All Customers Proofs</a></br>

<form name="Pro" action="addProof.php" method="post">

<input type='hidden' size = 4  name='CustNo'  id='CustNo' value = '<?php echo $CustNo; ?>'>
<input type="submit" name="btn_submit" value="Add Proof of Payment" style="width:200px;height:20px" />
</form>



</br></br>
<a href="./view_trans_custALL.php"><b>Customer's Transactions and Invoices (STATEMENT)></b></a></br></br></br>


<h1> View All Transactions of ALL Customers</h1>
<a href="./view_trans.php">View All Transactions</a></br></br></br>

<a href="./view_trans.php">View All Transactions </a></br></br></br>

<h1> Edit All Transactions of ALL Customers</h1>
<a href="./view_trans_all.php">Edit All Transactions</a></br></br></br>

<h2> Edit All UNASSIGNED Transactions ALL Customers</h2>
<a href="./view_trans_allNoInvNoA.php">Edit All UNASSIGNED Transactions Missing InvNoA</a></br></br></br>


		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<!--<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="validate('Addcust');return false;" /> -->

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
		</dl>

	</div>
 </form>
