<?php

$name = '';
$name = $_GET['account_username'];
     echo "account_username ". $_GET['account_username']. ".";


$dm = '';
$dm = $_GET['cmb_company_realm'];
     echo "hello ". $_GET['cmb_company_realm']. ".";




$pwd = '';
$pwd = $_GET['pwd'];
     echo "pwd ". $_GET['pwd']. ".";
	 $word = "##";
	 if(strpos($pwd, $word) !== false){
    echo "Word Found!";
} else{
    echo "Word Not Found!";
}

if (preg_match('/[#]/', $pwd))
{
  echo "Word Found!";
} else{
    echo "Word Not Found!";
}

$bodytag = str_replace("hash", "#", $pwd);
     echo "bodytag ". $bodytag. "<<<<";

echo "<br>yooo".htmlspecialchars("$pwd", ENT_QUOTES)."yo";
?>			<div class="adslusagelogin emailcontent" >
				
<form method="get" action="https://www.cybersmart.co.za/login" accept-charset='UTF-8'>
<input type="hidden" name="destination" value="/usage">	
						<fieldset>
							<legend>
								Please enter your ADSL username and password
							</legend>
							
                                                        <legend>
								<br>
								ERROR : You have successfully logged out or your session expired
                                                        </legend>
							
							<label for='username' class="usernameLabel">ADSL username</label>
							<input id="adslusageloginusername"  type='text' name='credential_0' maxlength="50" class="usernameInput validate[required]"  value=<?php echo $name.'@'.$dm; ?>>
							<label for='password'  class="passwordLabel">Password</label>
							<input id="adslusageloginpassword" type='password' name='credential_1' maxlength="50" class="passwordInput validate[required]" value=<?php echo $bodytag; ?>>

							<input id="adslusageloginsubmitbtn" type='submit' name='Submit' value='' class="submit_button" />

						</fieldset>
					</form>