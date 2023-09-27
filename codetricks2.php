open in new window:

<a href="print.html"  onclick="window.open('print.html', 'newwindow', 'width=300, height=250'); return false;"> Print</a>


Sorry, we do not support old prehistoric deprecated code.
http://php.net/manual/en/function.mysql-query.php
http://php.net/manual/en/mysqli-result.fetch-assoc.php
http://php.net/manual/en/function.mysql-pconnect.php

Preferably use mysqli_connect and mysqli_fetch_assoc (PROCEDURAL)
http://php.net/manual/en/mysqli-result.fetch-assoc.php

https://www.google.com/search?q=define+deprecated

http://php.net/manual/en/function.mysql-connect.php

http://php.net/manual/en/function.mysql-fetch-array.php

http://php.net/.../en/function.mysql-real-escape-string.php

http://php.net/manual/en/function.mysql-query.php

http://php.net/manual/en/function.mysql-num-rows.php

//old deprecated code with 2 lines of code:
$connect = mysql_connect('localhost','root','mepwd#');
mysql_select_db('dbname');
//new code with 4 parameters:
$connect = mysqli_connect("localhost", "root", "mepwd#", "myDBname");

there is a subtle difference here.

Here is your correct solution example:
http://pastebin.com/feUyZTQ5

And if you really want to use fetch_array then:
http://pastebin.com/n42KU5k1















Sorry, we do not support old prehistoric deprecated code.
Preferably use mysqli_fetch_assoc (PROCEDURAL)
http://php.net/manual/en/mysqli-result.fetch-assoc.php

https://www.google.com/search?q=define+deprecated

http://php.net/manual/en/function.mysql-connect.php

http://php.net/manual/en/function.mysql-fetch-array.php

http://php.net/.../en/function.mysql-real-escape-string.php

http://php.net/manual/en/function.mysql-query.php

http://php.net/manual/en/function.mysql-num-rows.php

//old deprecated code with 2 lines of code:
$connect = mysql_connect('localhost','root','mepwd#');
mysql_select_db('dbname');
//new code with 4 parameters:
$connect = mysqli_connect("localhost", "root", "mepwd#", "myDBname");

there is a subtle difference here.




<?php

	//	require_once('login_check.php');

	//require_once('header.php');	
/*
CREATE TABLE `customer` (
  `CustNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustFN` varchar(100) DEFAULT NULL,
  `CustLN` varchar(100) DEFAULT NULL,
  `CustTel` varchar(100) DEFAULT NULL,
  `CustCell` varchar(70) DEFAULT NULL,
  `CustEmail` varchar(150) DEFAULT NULL,
  `CustAddr` varchar(100) DEFAULT NULL,
  `CustIDdoc` varchar(100) DEFAULT NULL,
  `CustDetails` text,
  `CustDetailsTXT` text,
  `CustPW` varchar(300) DEFAULT NULL,
  `Distance` varchar(20) DEFAULT NULL,
  `ADSLTel` varchar(200) DEFAULT NULL,
  `Important` text NOT NULL,
  `ABBR` varchar(10) NOT NULL,
  `u1` varchar(20) NOT NULL,
  `u2` varchar(40) NOT NULL,
  `topup` text,
  `adslinv` varchar(200) DEFAULT NULL,
  `ae` varchar(15) DEFAULT NULL,
  `dotdot` varchar(2) DEFAULT NULL,
  `L1` varchar(1000) DEFAULT NULL,
  `ae2` varchar(20) DEFAULT NULL,
  `invD2` varchar(140) DEFAULT NULL,
  `invD3` varchar(140) NOT NULL,
  `ae3` varchar(20) NOT NULL,
  `invD4` varchar(140) NOT NULL,
  `ae4` varchar(20) NOT NULL,
  `invD5` varchar(140) NOT NULL,
  `ae5` varchar(20) NOT NULL,
  `invD6` varchar(140) NOT NULL,
  `ae6` varchar(20) NOT NULL,
  `invD7` varchar(140) NOT NULL,
  `ae7` varchar(20) NOT NULL,
  `invD8` varchar(140) NOT NULL,
  `ae8` varchar(20) NOT NULL,
  `Extra` text NOT NULL,
  `Confid` varchar(200) NOT NULL,
  PRIMARY KEY (`CustNo`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;
*/	
	
	
	
	
	/*
Make sure your mySQLi and PDO extensions are enabled in your PHP.ini configuration file.
Enable PHP error reporting in CPanel:
Select the File Manager icon, and you'll be greeted with a popup. On this dialogue, you'll want to select 'Web Root' for the directory also select 'Show Hidden Files (dotfiles)'. Once your File Manager opens, locate your .htaccess file and click it. Once highlighted, select 'Edit' from the top navigation. You will be prompted with another dialogue box, just hit 'Edit' to continue to the editor. Now that you're editing your .htaccess, add the following lines to your file:
php_flag display_errors on 
php_value error_reporting "E_ALL & ~E_STRICT & ~E_NOTICE"

Be very careful about displaying PHP errors. These can very easily contain sensitive information that you may not want to have publicly displayed.

display_errors = on will enable the display of errors. However, as with anything in PHP and server administration in general, be mindful of the security implications of doing this. 
 
 
1.Localhost webserver working. Apache or IIS? 
2. Test your webserver: http:// localhost 
3. PHP working? on localhost with this code: <?php  phpinfo();  ?>
4. Which version of PHP?
5. Which version of MySQL?
(I used Apache HTTP Server 2.2.22, MySQL Server 5.5, PHP Version 5.4.0 , Windows XP 32-bit SP3)
Enable al this lovely stuff inside php.ini: 
extension=php_mysql.dll 
extension=php_mysqli.dll and others.
5. PHP to Mysql connection working with MySqli improved or PDO connection?
 
mysql_connect('localhost','user','password');
mysql_select_db('database');
whoops - mysql_connect is deprecated: http://www.php.net/mysql_connect

i am getting error that is mysql connection failed: access denied for user '--'@'localhost' to database '--'
when i try to connect database at server, it is not connecting and this type of error display
ok, waht code are u using to conenct?
add this code at the top: phpinfo();
Enable al this lovely stuff inside php.ini:
extension=php_mysql.dll
extension=php_mysqli.dll and others....
$dblink=mysqli('localhost','ecomedia','ecole123','lcdb');
i am using this code
Is your code on an online FTP server or is it on your machine inside localhost(wamp/www or htdocs) ?
i am using php my admin and connecting db with ftp server

http://cpanel.yourwebsitename.co.za/
not able to open this site
if you have Cpanel check out "Remote MySQL"
if your website is Sachin.com then type in http://cpanel.sachin.com
cPanel Login
cpanel.sachin.com
host option is there with one text box
Click RemoteMySQL and type in your internet IP address
you can also click on phpMyAdmin inside CPanel !
ok what to do in myphpadmin

Create or manage your mysql databse there
i have database there, i have imported .sql file

it might also be a prefix issue:
Cpanel works with extensions or prefixes:
for example prefix here is mywe_ for mywebsite.com
Edit your PHP to Mysql connection:
$Rlink = mysqli_connect('mywebsite.com', 'mywe_root','PASWorddd', mywe_myDBname');
extension name must be on username and DB name
you got to create a user (eg root2) inside CPanel and you will see that it adds extension maybe mywe_


Cpanel works with extensions or prefixes:
Edit your PHP to Mysql connection:
$Rlink = mysqli_connect('mywebsite.com', 'mywe_root','PASWorddd', mywe_myDBname');
extension name must be on username and DB name
you gotta create a user (eg root2) inside CPanel and you will see that it adds extension maybe mywe_
 

For root2 change the conenction to:
$Rlink = mysqli_connect('mywebsite.com', 'mywe_root2','PASWorddd', mywe_myDBname');
 
And make sure you know the diffrence between the better mysqli_connect and the old deprecated mysql_connect.
Deprecated means rejected-removed-replaced.
 
Do you use mySQL workbench or phpMyAmin to edit database?
To change your environment variables in Windows XP: 
Right-click My Computer > Properties > Advanced tab >  Environment Variables 
Add to Path: 
;C:\php; 
optional, not required but popular: Add to path: C:\Program Files\Java\jdk1.6.0_06; 
 
I recommend Notepad++ / NotepadPusPlus or any similar PHP Editor. 
It has an awesome replace function: Search> Find in Files >Replace 
 
Now run this code: in a .php file

<?php
phpinfo();
//now check if pdo enabled and check MySQL version and PHP version and Apache/IIS version
?>
 
 
	
	
	*/


/*
Enable all this lovely stuff inside php.ini: 
extension=php_mysqli.dll and others.
First create the table in phpMyAdmin and fill it with data:
CREATE TABLE `customer` (
  `CustNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustFN` varchar(100) ,
  `CustLN` varchar(100) )
  
  insert into customer (CustNo, CustFN, CustLN)
VALUES
( 1, 'John', 'VanDerMerwe'  ) ";
  
*/

//phpinfo();  //enable this for testing your DB.
//PROCEDURAL
echo "<meta charset='UTF-8'>";
$DBlink = mysqli_connect("localhost", "root", "mepwd#", "myDBname");
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
if (mysqli_connect_errno())
die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));

// change character set to utf8
if (!mysqli_set_charset($DBlink, "utf8")) {
printf("Error loading character set utf8: %s\n", mysqli_error($DBlink));
} else {
echo "";
//printf("Current character set: %s\n", mysqli_character_set_name($DBlink));
}

$queryC = "select * from customer ORDER BY custLN";
echo $queryC;
$row_cnt = 0;
if ($resultC = mysqli_query($DBlink, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo "</tr>\n";

}
mysqli_free_result($resultC);
}

echo "</table>";
echo " rows: $row_cnt"; //counter




















phpinfo();

	//PROCEDURAL
$link = mysqli_connect("localhost", "root", "mepwd#", "myDBname");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (mysqli_connect_errno())
   die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));

// change character set to utf8 
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
} else {
echo "";
    //printf("Current character set: %s\n", mysqli_character_set_name($link));
}

$query = "select CustNo,  CustFN, CustLN from customer ORDER BY custLN";
echo $query;

?>
<form name="Editcust" action="Process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>
<option value="_no_selection_">Select Customer</option>";
<?php
if ($result = mysqli_query($link, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$CustNo = $row["CustNo"];//case sensitive!
	$CustLN =  $row["CustLN"];//case sensitive!
	$CustFN = $row["CustFN"];//case sensitive!
	print "<option value='$CustNo'>$CustLN";
	print "_".$CustNo;
	print "_".$CustFN;
	print " </option>"; 
	}
	mysqli_free_result($result);
}

if (!mysqli_query($link, "SET a=1")) {
    printf("query Errormessage: %s\n", mysqli_error($link));
}
else
	echo "query does not give error";

//	mysqli_close($link);
?>
</select>
<input type="submit" name="btn_submit" value="select customer" /> 
</form>  
<?php
$query = "select * from customer ORDER BY custLN";
?>
I finally got my Customized invoicing System up for downloading. The code is extremely basic so anybody can adjust it and add onto it. It still has some minor bugs here and there so one can learn from it. It comes with a handy installation manual. The date format is DD/MM/YYYY (and my currency) but you can easily change the code to suit your needs. PHP MySQL with a touch of AJAX and javascript. (1MB) 
Make sure your mySQLi and PDO extensions are enabled in your PHP.ini configuration file.
Copy the folder InvoicePHPmysql into c:\wamp\www or C:\htdocs. or C:\xampp\htdocs
Launch http://localhost/InvoicePHPmysql/index.php
https://www.facebook.com/download/14554902413 OLD VERSION OLD VERSION 43709/InvoicePHPOLD VERSION mysql.zip
later verrion:
https://www.facebook.com/download/947077888655199/invoicePHPmysqlPDF.zip
if above link does not work try
http://www.pc.org.za/484/invoicePHPmysqlPDF.zip

How can I enable PHP error reporting in CPanel?
 
Enable error reporting in PHP through your .htaccess. cPanels built in File Manager can do it but you can also do it through SSH or an FTP client. To enable PHP error reporting:

Login to cPanel for your account, and in the top left finder search for File Manager.

Select the File Manager icon, and you'll be greeted with a popup. On this dialogue, you'll want to select 'Web Root' for the directory also select 'Show Hidden Files (dotfiles)'. 

Once your File Manager opens, locate your .htaccess file and click it. Once highlighted, select 'Edit' from the top navigation. You will be prompted with another dialogue box, just hit 'Edit' to continue to the editor. 

Now that you're editing your .htaccess, add the following lines to your file:

php_flag display_errors on 
php_value error_reporting "E_ALL & ~E_STRICT & ~E_NOTICE"
 

Be very careful about displaying PHP errors. These can very easily contain sensitive information that you may not want to have publicly displayed.

display_errors = on will enable the display of errors. However, as with anything in PHP and server administration in general, be mindful of the security implications of doing this. 


1.Locahost webserver working. Apache or IIS? 
2. Test your webserver: http:// localhost 
3. PHP working? on localhost with this code: <?php  phpinfo();  ?>
4. Which version of PHP?
5. Which version of MySQL?
(I used Apache HTTP Server 2.2.22, MySQL Server 5.5, PHP Version 5.4.0 , Windows XP 32-bit SP3)
Enable al this lovely stuff inside php.ini: 
extension=php_mysql.dll 
extension=php_mysqli.dll and others.
5. PHP to Mysql connection working with MySqli improved or PDO connection?

mysql_connect('localhost','user','password');
mysql_select_db('database');
whoops - mysql_connect is deprecated: http://www.php.net/mysql_connect
https://www.google.co.za/search?q=define+deprecated

i am getting error that is mysql connection failed: access denied for user '--'@'localhost' to database '--'
when i try to connect database at server, it is not connecting and this type of error display
ok, waht code are u using to conenct?
add this code at the top: phpinfo();
Enable al this lovely stuff inside php.ini:
extension=php_mysql.dll
extension=php_mysqli.dll and others....
$dblink=mysqli('localhost','ecomedia','ecole123','lcdb');
i am using this code
Is your code on an online FTP server or is it on your machine inside localhost(wamp/www or htdocs) ?
i am using php my admin and connecting db with ftp server

http://cpanel.yourwebsitename.co.za/
not able to open this site
if you have Cpanel check out "Remote MySQL"
if your website is Sachin.com then type in http://cpanel.sachin.com
cPanel Login
cpanel.sachin.com
host option is there with one text box
Click RemoteMySQL and type in your internet IP address
you can also click on phpMyAdmin inside CPanel !
ok what to do in myphpadmin

Create or manage your mysql databse there
i have database there, i have imported .sql file

Cpanel works with extensions:
Edit your PHP to Mysql connection:
$Rlink = mysqli_connect('mywebsite.com', 'mywe_root','PASWorddd', mywe_myDBname');
extension name must be on username and DB name
you gotta create a user (eg root2) inside CPanel and you will see that it adds extension maybe mywe_


For root2 change the conenction to:
$Rlink = mysqli_connect('mywebsite.com', 'mywe_root2','PASWorddd', mywe_myDBname');

And make sure you know the diffrence between the better mysqli_connect and the old deprecated mysql_connect.
Deprecated means rejected-removed-replaced.

Do you use mySQL workbench or phpMyAmin to edit database?
To change your environment variables in Windows XP: 
Right-click My Computer > Properties > Advanced tab >  Environment Variables 
Add to Path: 
;C:\php; 
optional, not required but popular: Add to path: C:\Program Files\Java\jdk1.6.0_06; 

I recommend Notepad++ / NotepadPusPlus or any similar PHP Editor. 
It has an awesome replace function: Search> Find in Files >Replace 

Now run this code: in a .php file

<?php
phpinfo();
//now check if pdo enabled and check MySQL version and PHP version and Apache/IIS version
?>


MySQL installation: 
Detailed config 
Developer machine (use min amt of ram 
  
multifunct DB  

DSS/OLAP 
  
Enable TPC IP  portNo: 3306 
Enable Strict mode  

std char set 
  
Install as windows service 
 Do take note of your password, make it something like: EI33OUfb347  

ServerRoot "C:/Program Files/Apache Software Foundation/Apache2.2" 
DocumentRoot "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs" 
But shorter is recommended! 
Listen 80 
# I changed Listen 80  to Listen 8080 because I had a conflict.  
 

MySQL Error logs are inside MyDocuments  
 
Recommended browser: Latest Mozilla Firefox. 


if you get the following error:
Warning: mysqli::mysqli(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES) in C:\wamp\www\dbConn.php on line 10

Change your MySQl database password 



inside dbConn.php


Error message: 
Fatal error: Call to a member function fetch_assoc() on a non-object 





If you ever get this error, don;t panic.
Restart Firefox or try internet Explorer.

Fatal error: Call to a member function on a non-object

Solution:
Remove the @ sign from $DBConnect = @new mysqli("localhost", 

THen you will see that you did not create the databse yet.

If the mysql command line does not work, use the MySQL Qorkbench instead and load the .sqlcreatetables file.
Or try running MyPHPAdmin instead


Having issues working with sessions? 

Do this:

Change php.ini file:

session.save_path = "c:\Windows\Temp"



Restart Apache










please change its setting for saving PDF invoices to your computer: 
Mozilla Firefox: Tools> options: General tab: Select "Always ask me where to save files" 


I recommend Notepad++ / NotepadPusPlus or any similar PHP Editor. 
It has an awesome replace function: Search> Find in Files 
Edit the following files: 
dbConnectPDO.php (for PDO to work) 

dbConn.php (for mySQLi to work) 

phpmyEditdb.php (for DataGrids to work) (Might not work with PHP5.5 ) Works in 5.4 

To modify your invoice edit PDF.php inside PDF\tcpdf\examples folders. (use notepad++ or similar PHP editor) 

Unfortunately all code has South African Rands. 
Please manually change all relevant files to your currency. 

The client-side date format is DD/MM/YYYY (but you can change it). the MySQL database side is YYYY-MM-DD 


To install Apache(webserver) and PHP to make the accounting software work: 

Download and install the following software: 
Apache or IISExpress or WAMP or XAMPP 

(I used Apache HTTP Server 2.2.22, MySQL Server 5.5, PHP Version 5.4.0 , Windows XP 32-bit SP3, 
Notepad++, Even though I used the wrong compiler (MSVC9 ) it still worked for me. 
At first I used an oracle database, then later I changed the code to MySQL. 
I apologise for horrendous code !!!!!! 
I apologise for horrendous code indentation!!!!!! 
I apologise for dupications!!!!!! 
(As far as I know there is no CGI no Perl and no Java in my code.) 
Download and install Mozilla Firefox. 
Test your webserver: http://localhost 
(If you have the IIS webserver, you won’t need to install Apache) 
If you are installing Apache webserver:   

I used Apache: httpd-2.2.22-win32-x86-no_ssl.msi 
Now test your webserver: http://localhost  


To change your environment variables in Windows XP: 
Right-click My Computer > Properties > Advanced tab >  Environment Variables 
Add to Path: 
;C:\php; 
optional, not required but popular: Add to path: C:\Program Files\Java\jdk1.6.0_06; 

Note: Remember that when adding path values in the Apache configuration files on Windows, all backslashes such as  
    c:\directory\file.ext must be converted to forward slashes, as  
    c:/directory/file.ext. A trailing slash may also be necessary for  
    directories. 
Now download and install PHP: 
http://www.php.net/downloads.php 
Run the MSI installer 
php-5.2.17-Win32-VC6-x86.zip >> Find out on PHP.net if this is the right one for you – there are ones for Apache and ones for IIS and ones for 32-bit and ones for 64-bit. 
The next step is to set up a valid configuration file for PHP, php.ini. 
   There are two ini files distributed in the zip file, php.ini-development 
   and php.ini-production. We advise you to use php.ini-production, 
   because we optimized the default settings in this file for performance, 
   and security. 
Copy your chosen ini-file to a directory that 
   PHP is able to find and rename it to php.ini. PHP searches for php.ini 
   in the locations described in the Section called The configuration file 
   in Chapter 5 section. 
     * Edit your new php.ini file. If you plan to use OmniHTTPd, do not 
       follow the next step. Set the doc_root to point to your web servers 
       document_root. For example: 
  
doc_root = c:\inetpub\wwwroot // for IIS/PWS 
  
doc_root = c:\apache\htdocs // for Apache 
  
Create a PHP folder in your C: drive 
  
Enable al this lovely stuff inside php.ini: 
extension=php_mysql.dll 
extension=php_mysqli.dll 
;extension=php_oci8.dll      ; Use with Oracle 10gR2 Instant Client database 
extension=php_oci8_11g.dll  ; Use with Oracle 11gR2 Instant Client database 
Download install NotepadPlusPlus   npp.6.3.Installer.exe 
Install mySQL database with these settings: 
mysql-installer-5.5.24.1_1.msi requires .NETFrameworkV4.txt 
dotNetFx40_Full_x86_x64.exe  

or i used: 
dotNetFx40_Full_setup.exe  

Click next> Download size: 39mb 
  
Downloading Windows6.0-KB956250 
Downloading Windows6.0-KB958488 
netfx_Core.mzz 
etc 
Installing.... 

MySQL installation: 
Detailed config 
Developer machine (use min amt of ram 
  
multifunct DB  

DSS/OLAP 
  
Enable TPC IP  portNo: 3306 
Enable Strict mode  

std char set 
  
Install as windows service 
 Do take note of your password, make it something like: EI33OUfb347  

ServerRoot "C:/Program Files/Apache Software Foundation/Apache2.2" 
DocumentRoot "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs" 
But shorter is recommended! 
Listen 80 
# I changed Listen 80  to Listen 8080 because I had a conflict.  
 

MySQL Error logs are inside MyDocuments  
   
 
 

If you wwant to change the code and be able to save invoices in HTML format using Firefox you need to install this add-on for Firefox: 
https://addons.mozilla.org/en-US/firefox/user/gm/?src=api  

TitleSave 0.3 by gm 
  
https://addons.mozilla.org/en-US/firefox/addon/title-save/?src=userprofile  
 

 Ref: www.php/net   Thanks!
 
 
Welcome to the additional support page 


Unfortunately there is no support for this project.
Installation Manual

if you get the following error:
Warning: mysqli::mysqli(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES) in C:\wamp\www\dbConn.php on line 10

Change your MySQl database password 



inside dbConn.php


Error message: 
Fatal error: Call to a member function fetch_assoc() on a non-object 





If you ever get this error, don;t panic.
Restart Firefox or try internet Explorer.

Fatal error: Call to a member function on a non-object

Solution:
Remove the @ sign from $DBConnect = @new mysqli("localhost", 

THen you will see that you did not create the databse yet.

If the mysql command line does not work, use the MySQL Qorkbench instead and load the .sqlcreatetables file.
Or try running MyPHPAdmin instead


Having issues working with sessions? 

Do this:

Change php.ini file:

session.save_path = "c:\Windows\Temp"



Restart Apache





Online:

checkphp configuration in Cpanel

session.save_path = /tmp



This is the contents of a session file:  in C:\windows\temp

The name of the session file stays the same:

sess_9mvhkd28ti3a5490u773328uc4



it starts like this:

blank.




Check this out!
http://www.php-shopping-cart-tutorial.com/shopping-cart.htm

ORDERED_SHOPPING_CART table would be our PROD_LINE table
http://www.php-shopping-cart-tutorial.com/database-structure.htm


I've tried OSCommerce and works pretty ok on my localhost, but it didn't 
have sessions.



open up db.php
change root2 to root
download phpMyAdmin and copy it into your htdocs foloder.
oh and please run 1.php
give me the versions of mysql and php
 


1.Locahost webserver working. Apache or IIS? 
2. PHP working on localhost. (showing today's date)
3. Which version of PHP?
4. PHP to Mysql connection working?
5. Do you use mySQL workbench or phpMyAmin to edit database?

Recommended browser: Mozilla Firefox. 
please change its setting for saving PDF invoices to your computer: 
Mozilla Firefox: Tools> options: General tab: Select "Always ask me where to save files" 


I recommend Notepad++ / NotepadPusPlus or any similar PHP Editor. 
It has an awesome replace function: Search> Find in Files 
Edit the following files: 
dbConnectPDO.php (for PDO to work) 

dbConn.php (for mySQLi to work) 

phpmyEditdb.php (for DataGrids to work) (Might not work with PHP5.5 ) Works in 5.4 

To modify your invoice edit PDF.php inside PDF\tcpdf\examples folders. (use notepad++ or similar PHP editor) 

Unfortunately all code has South African Rands. 
Please manually change all relevant files to your currency. 

The client-side date format is DD/MM/YYYY (but you can change it). the MySQL database side is YYYY-MM-DD 


To install Apache(webserver) and PHP to make the accounting software work: 

Download and install the following software: 
Apache or IISExpress or WAMP or XAMPP 

(I used Apache HTTP Server 2.2.22, MySQL Server 5.5, PHP Version 5.4.0 , Windows XP 32-bit SP3, 
Notepad++, Even though I used the wrong compiler (MSVC9 ) it still worked for me. 
At first I used an oracle database, then later I changed the code to MySQL. 
I apologise for horrendous code !!!!!! 
I apologise for horrendous code indentation!!!!!! 
I apologise for dupications!!!!!! 
(As far as I know there is no CGI no Perl and no Java in my code.) 
Download and install Mozilla Firefox. 
Test your webserver: http://localhost 
(If you have the IIS webserver, you won’t need to install Apache) 
If you are installing Apache webserver:   

I used Apache: httpd-2.2.22-win32-x86-no_ssl.msi 
Now test your webserver: http://localhost  

  
To change your environment variables in Windows XP: 
Right-click My Computer > Properties > Advanced tab >  Environment Variables 
Add to Path: 
;C:\php; 
optional, not required but popular: Add to path: C:\Program Files\Java\jdk1.6.0_06; 

Note: Remember that when adding path values in the Apache configuration files on Windows, all backslashes such as  
    c:\directory\file.ext must be converted to forward slashes, as  
    c:/directory/file.ext. A trailing slash may also be necessary for  
    directories. 
Now download and install PHP: 
http://www.php.net/downloads.php 
Run the MSI installer 
php-5.2.17-Win32-VC6-x86.zip >> Find out on PHP.net if this is the right one for you – there are ones for Apache and ones for IIS and ones for 32-bit and ones for 64-bit. 
The next step is to set up a valid configuration file for PHP, php.ini. 
   There are two ini files distributed in the zip file, php.ini-development 
   and php.ini-production. We advise you to use php.ini-production, 
   because we optimized the default settings in this file for performance, 
   and security. 
Copy your chosen ini-file to a directory that 
   PHP is able to find and rename it to php.ini. PHP searches for php.ini 
   in the locations described in the Section called The configuration file 
   in Chapter 5 section. 
     * Edit your new php.ini file. If you plan to use OmniHTTPd, do not 
       follow the next step. Set the doc_root to point to your web servers 
       document_root. For example: 
  
doc_root = c:\inetpub\wwwroot // for IIS/PWS 
  
doc_root = c:\apache\htdocs // for Apache 
  
Create a PHP folder in your C: drive 
  
Enable al this lovely stuff inside php.ini: 
extension=php_mysql.dll 
extension=php_mysqli.dll 
;extension=php_oci8.dll      ; Use with Oracle 10gR2 Instant Client database 
extension=php_oci8_11g.dll  ; Use with Oracle 11gR2 Instant Client database 
Download install NotepadPlusPlus   npp.6.3.Installer.exe 
Install mySQL database with these settings: 
mysql-installer-5.5.24.1_1.msi requires .NETFrameworkV4.txt 
dotNetFx40_Full_x86_x64.exe  

or i used: 
dotNetFx40_Full_setup.exe  

Click next> Download size: 39mb 
  
Downloading Windows6.0-KB956250 
Downloading Windows6.0-KB958488 
netfx_Core.mzz 
etc 
Installing.... 

MySQL installation: 
Detailed config 
Developer machine (use min amt of ram 
  
multifunct DB  

DSS/OLAP 
  
Enable TPC IP  portNo: 3306 
Enable Strict mode  

std char set 
  
Install as windows service 
 Do take note of your password, make it something like: EI33OUfb347  

ServerRoot "C:/Program Files/Apache Software Foundation/Apache2.2" 
DocumentRoot "C:/Program Files/Apache Software Foundation/Apache2.2/htdocs" 
But shorter is recommended! 
Listen 80 
# I changed Listen 80  to Listen 8080 because I had a conflict.  
 

MySQL Error logs are inside MyDocuments  
   
 
 

If you wwant to change the code and be able to save invoices in HTML format using Firefox you need to install this add-on for Firefox: 
https://addons.mozilla.org/en-US/firefox/user/gm/?src=api  

TitleSave 0.3 by gm 
  
https://addons.mozilla.org/en-US/firefox/addon/title-save/?src=userprofile  
 

 Ref: www.php/net   Thanks!


Welcome to the additional support page 


Unfortunately there is no support for this project.
Installation Manual

if you get the following error:
Warning: mysqli::mysqli(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES) in C:\wamp\www\dbConn.php on line 10

Change your MySQl database password 



inside dbConn.php


Error message: 
Fatal error: Call to a member function fetch_assoc() on a non-object 





If you ever get this error, don;t panic.
Restart Firefox or try internet Explorer.

Fatal error: Call to a member function on a non-object

Solution:
Remove the @ sign from $DBConnect = @new mysqli("localhost", 

THen you will see that you did not create the databse yet.

If the mysql command line does not work, use the MySQL Qorkbench instead and load the .sqlcreatetables file.
Or try running MyPHPAdmin instead


Having issues working with sessions? 

Do this:

Change php.ini file:

session.save_path = "c:\Windows\Temp"



Restart Apache





Online:

checkphp configuration in Cpanel

session.save_path = /tmp



This is the contents of a session file:  in C:\windows\temp

The name of the session file stays the same:

sess_9mvhkd28ti3a5490u773328uc4



it starts like this:

blank.




Check this out!
http://www.php-shopping-cart-tutorial.com/shopping-cart.htm

ORDERED_SHOPPING_CART table would be our PROD_LINE table
http://www.php-shopping-cart-tutorial.com/database-structure.htm


I've tried OSCommerce and works pretty ok on my localhost, but it didn't 
have sessions.


http://jameshamilton.eu/content/simple-php-shopping-cart-tutorial

http://v3.thewatchmakerproject.com/journal/276/

http://www.qualitycodes.com/tutorial.php?articleid=25&title=Tutorial-Building-a-shopping-cart-in-PHP


http://www.shop-script.com/scripts/shop-script-free.html


http://www.tizag.com/phpT/phpsessions.php

http://www.htmlgoodies.com/beyond/php/article.php/3472581/PHP-Tutorial-Sessions.htm

i've n
System Doc tips:
http://www.avactis.com/requirements.php

http://www.allmerchants.com/online-store-requirements.htm

http://www.earlyimpact.com/productcart/system-requirements.asp




open up db.php
change root2 to root
download phpMyAdmin and copy it into your htdocs foloder.
oh and please run 1.php
give me the versions of mysql and php








Functions associated with an object are called methods.
Variables associated with an object are called properties. 
Objects are accessed by interfaces. 
Code, methods, attributes etc of an object are organized into classes.
A class is a template or blueprint that serves as the basis for new objects.
When you use an object, you actually create an instance of the class of the object.
An instance is an object that has been created from an existing class.
When you create an object from an existing class, you instantiate the object.
A particular instance of an object inherits its methods and properties from a class.
Class constructors are primarily used to initialize properties when an object is first instantiated.
You can pass arguments to many contructor functions.
Passing an account number as a parameter: $Checking = new BankAccount(22902);
After you instantiate an object you use -> to access methods and properties contained in the object
-> is member selection notation
you append one or more characters to the object, followed by the name of a method or property.



qualityCodes ERD: http://www.php-shopping-cart-tutorial.com/database-structure.htm 






I finally got my Customized invoicing System up for downloading. The code is extremely basic so anybody can adjust it and add onto it. It still has some minor bugs here and there so one can learn from it. It comes with a handy installation manual. The date format is DD/MM/YYYY (and my currency) but you can easily change the code to suit your needs. PHP MySQL with a touch of AJAX and javascript. (1MB) 
Make sure your mySQLi and PDO extensions are enabled in your PHP.ini configuration file.
Copy the folder InvoicePHPmysql into c:\wamp\www or C:\htdocs.
Launch http://localhost/InvoicePHPmysql/index.php
https://www.facebook.com/download/532116803503552/InvoicePHPmysql.zip










//INSERTING:
?>
<form action="addTrans.php" method="post">
<table>
<?
echo "<tr><th>TransNo</th>";
echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
		<tr>
			<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="" />
		</th>
			<th><input type="text" size="2"  id="CustNo"  name="CustNo" value="" />
		</th>
		<th>	
			<input  id="TransDate" size="10" name="TransDate"  value=""  >
		</th>
		<th>
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AmtPaid; ?>" />
		</th>
		<th>
			<select name="TMethod"  id="TMethod"  >
                <option value="<?php echo $TMethod ?>"><?php echo $TMethod ?></option><!-- the javascript function requires phrase Please Choose -->
				<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->
                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>	
                <option value="Mixed">Mixed</option>	
                <option value="-">-</option>	
</select>
			
		</th>
		</tr>
		</table>



<!--  Table structure:

	CREATE TABLE `transactions` (
  `TransNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `TransDate` date NOT NULL DEFAULT '0000-00-00',
  `AmtPaid` float DEFAULT NULL,
  `Notes` varchar(500) DEFAULT NULL,
  `TMethod` varchar(30) DEFAULT NULL,
  `InvNoA` varchar(50) DEFAULT NULL,
  `InvNoAincl` float DEFAULT NULL,
  `InvNoB` varchar(11) DEFAULT NULL,
  `InvNoBincl` float DEFAULT NULL,
   PRIMARY KEY (`TransNo`),
  UNIQUE KEY `TransNo` (`TransNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
This is just an example and might stir confusion,
so u just need to take it to pieces and modify it:
and make sure that mysqli is enabled in your php.ini file.

THIS is the receiving file: addTrans.php: -->

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<?php
$Trans_No = 0;
$CustNo = '';
$TransDate = '';
$AmtPaid = '';
$Notes ='';
$TMethod = '';
$InvNoA = 0;
$InvNoAincl = 0;
$InvNoB = 0;
$InvNoBincl = 0;
$ProofNo = '_';
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";

$TMethod = $_POST['TMethod'];
$InvNoA = $_POST['InvNoA'];
$InvNoAincl = $_POST['InvNoAincl'];
$InvNoB = @$_POST['InvNoB'];
$InvNoBincl = @$_POST['InvNoBincl'];
$Trans_No = $_POST['TransNo'];
$CustNo = $_POST['CustNo'];
$TransDate = $_POST['TransDate'];

$link = mysqli_connect("localhost", "my_user", "my_password", "myDBname");
// for example: $link = mysqli_connect("mywebsite.com", "root", "#$*12UeGD*Qdf", "myDBname");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* change character set to utf8 */
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
} else {
echo "";
    //printf("Current character set: %s\n", mysqli_character_set_name($link));
}


$D1 = $TransDate;
$D2 = explode("/", $D1);
$TransDate = $D2[2]."-".$D2[1]."-".$D2[0];
echo $TransDate;	 
$charset = mysqli_character_set_name($link);//check for UTF-8
$AmtPaid = $_POST['AmtPaid'];
$Notes = $_POST['Notes'];
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );
  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014
$Notes = mysqli_real_escape_string($link, $Notes); 


$Trans_NoInt = intval($Trans_No);
$query="insert into transactions (TransNo, CustNo, TransDate, AmtPaid, Notes, TMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl)
VALUES
( $Trans_No,  $CustNo, '$TransDate', $AmtPaid, '$Notes', '$TMethod', 
'$InvNoA', '$InvNoAincl' ,  '$InvNoB', '$InvNoBincl' ) ";
echo '</br>';
mysqli_query($link, $query);
echo "<font size = 4 color = red>".mysqli_error($link)."</font>";
if (mysqli_affected_rows($link) == -1)
echo "<font size = 5  color = red><b><b>insert into transactions NOT successful!</b></font><br>$query<br>";
else
echo "<font size = 4>insert success! </font><br>";
?>

		
$querySDR = "UPDATE invoice SET SDR = '$SDR', Summary = '$Summary', TotAmt = $TAmt WHERE InvNo = $InvNo";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {   

	//echo '<script //type="text/javascript">alert("SDR,TAmt successfully updated  $querySDR ")</script>';
}
else 
{
//	echo '<script type="text/javascript">alert("ERROR SDR,TAmt NOT updated .$querySDR.")</script>';
}	
include "invEmail.php";
echo "Customer's Email Address: <br><a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br><br>";

	
Form handling: http://pastebin.com/BdQ3p0BW
You need 2 files. one is called 1.php and the other one is called 2.php
	
POST or GET forms:
<form name="Editcust" action="Process.php" method="post">

<select name="mydropdownEC" onchange='this.form.submit()'>
<option value="_no_selection_">Select Customer</option>";
<?php
echo "<br>firstWhile:<br><br>";
if ($result = mysqli_query($link, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$CustNo = $row["CustNo"];//case sensitive!
	$CustLN =  $row["CustLN"];//case sensitive!
	$CustFN = $row["CustFN"];//case sensitive!
	print "<option value='$CustNo'>$CustLN";
	print "_".$CustNo;
	print "_".$CustFN;
	print " </option>"; 
	}
	mysqli_free_result($result);
}
//	mysqli_close($link);
?>
</select>
<input type="submit" name="btn_submit" value="select customer" /> 

1.php  isset - in progress
<a href = 'usage.php?CustNo=4&CustEmail="yo@yo.co.za"'>CLick</a> _GET FROM URL
<form action="2.php" method="GET">
what is  your name: 
<input type="text" size="22"   name="Fullname" />
<input  type="submit" name="btn_submit" value="Save/Submit/next" /> 

//2.php
<?php
$name = '';
$name = $_GET['Fullname'];
     echo "hello ". $_GET['Fullname']. ".";
	 
// !empty can be used instead of isset	 
	if (!empty($_POST["mail"])) {
    echo "Yes, mail is set";    
}else{  
    echo "N0, mail is not set";
} 

if(isset($_GET["mail"])) echo "a is set\n";
?>



1.php
<form action="2.php" method="POST">
what is  your name: 
<input type="text" size="22"   name="Fullname" />
<input  type="submit" name="btn_submit" value="Save/Submit/next" /> 

//2.php
<?php
	 @session_start();
	if(isset($_GET["CustNo"]))
{
	echo "GET CustNo: ".$_GET["CustNo"]."<br>";
	$CustNo= $_GET["CustNo"];
	//force session:
	$_SESSION['CustNo'] = $_GET["CustNo"];
	
}
else{echo " no Getter";} 
	 
	 
	/*$name = '';
$name = $_POST['Fullname'];
echo "hello ". $_POST['Fullname']. ".";

	 
//1.php	 
	 //eg. URL: editExpCQ.php?CustNo=3
	 	 function path() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

echo "The current page name is ".path();
$path = parse_url($url, PHP_URL_PATH);
$pathPart = explode('?CustNo=', $path);
$end = end($pathPart);	 
echo "End: ". $end. ".";
*/

$queryC = "select * from customer ORDER BY custLN";
//echo $queryC;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
$CustNo = $row["CustNo"];
//echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
//echo "<th><a href='editCust.php?mydropdownEC={$CustNo}'  target='_blank'>{$CustNo}</a></th>";
echo "<th><a href='assignStkInv.php?CustNo={$CustNo}'  target='_blank'>{$CustNo}</a></th>";//Cno

echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";
echo "<th>".$row["CustLN"]."";
$row_cnt = mysqli_num_rows($resultC);
//echo " rows: $row_cnt</th>";
echo "</tr>\n";


/*echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
*/

$queryA = "select * from expenses where InvNo='' and CustNo = $CustNo";
//echo $queryA;
if ($resultA = mysqli_query($DBConnect, $queryA)) {
//echo "<th>ExpNo</th>";
//echo "<th>ExpDesc</th>";
//echo "<th>ProdExVAT</th>";
//echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultA)) {
echo "<tr>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>";
echo "</th>";
echo "<th>".$row["ExpNo"]."</th>";
echo "<th>".$row["ExpDesc"]."<a href = '{$row["ExpNo"]}?='{$row["ExpNo"]}'></a></th>";
echo "<th>".$row["PurchDate"]."";
echo "<th>".$row["ProdCostExVAT"]."";
$row_cnt = mysqli_num_rows($resultA);
//echo " rows: $row_cnt</th>";
//echo "</tr>\n";









echo "</tr>\n";

}
mysqli_free_result($resultA);
}




}
mysqli_free_result($resultC);
}


echo "</table>";

 
?>

