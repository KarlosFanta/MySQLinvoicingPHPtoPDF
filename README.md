MySQLinvoicingPHPtoPDF
======================

Create PDF invoices and manage transactions with a MySQL database using PDO or MySQLi.


The code is extremely basic so anybody can adjust it and add onto it. 
No framework except TCPDF to create PDF files and PHPmyEdit for userfriendly tables.
It comes with a handy installation manual.
The date format is DD/MM/YYYY (and my currency) but you can easily change the code to suit your needs. 
PHP MySQL with a touch of AJAX and Javascript. 
Unfortunately settings and your currency are hardcoded (but that means a lot less code).
(Make sure your mySQLi and PDO extensions are enabled in your PHP.ini configuration file.)
Unzip the zip file MySQLinvoicingPHPtoPDF-master into c:\wamp\www or C:\htdocs. or C:\xampp\htdocs
This is a localhost project. To put it online you will need to add a security password protection layer.
You will need some extra files from TCPDF to get the PDF creation to work fully: http://www.tcpdf.org/
please check my full installation manual:
https://github.com/KarlosFanta/MySQLinvoicingPHPtoPDF/blob/master/Installation.html

P.S. Advantage of this project: it is networkable. (Wampserver Control panel has a virtual host option for this)
You can also put it on the web (via CPanel or FTP) (for fun+AT OWN RISK), but preferably add password protection.
Contributions/Comments are welcome!

The DB stores date in American format: YYYY-MM-DD
             But my API displays it in DD/MM/YYYY (South African)

Oh and I stumbled on a similar project which is more up to date than mine: https://www.invoiceplane.com
