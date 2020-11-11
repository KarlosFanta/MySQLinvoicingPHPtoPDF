
<?php
include 'header.php';
include 'Installation.html';
?>
//create the databse:
CREATE DATABASE myDB;
//SHOW DATABASES;
//activate the mysql databse:
USE myDB;

CREATE TABLE customer
(CustNo integer not null  AUTO_INCREMENT  primary key,
CustFN VARCHAR(140),
CustLN VARCHAR(140),
ABBR varchar(10),
);
<?php
include 'setts2.php';
?>

