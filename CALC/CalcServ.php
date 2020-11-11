<?php
if ($_REQUEST['manipulator'] === 'multiply') {
    $value3 = $_REQUEST['value1'] * $_REQUEST['value2'];
    $sign = ' x ';
    $eq = ' = ';
} elseif ($_REQUEST['manipulator'] === 'divide') {
    $value3 = $_REQUEST['value1'] / $_REQUEST['value2'];
    $sign = ' / ';
    $eq = ' = ';
} elseif ($_REQUEST['manipulator'] === 'subtract') {
    $value3 = $_REQUEST['value1'] - $_REQUEST['value2'];
    $sign = ' - ';
    $eq = ' = ';
} elseif ($_REQUEST['manipulator'] === 'add') {
    $value3 = $_REQUEST['value1'] + $_REQUEST['value2'];
    $sign = ' + ';
    $eq = ' = ';
}

$response = $_REQUEST['value1'] . $sign . $_REQUEST['value2'] . $eq . $value3;
echo $response;
