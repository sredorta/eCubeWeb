<?php
include ("../constants/constants.general.php");


$myNotif = new Notification();
 
if (isset($_POST['user_id'])) {
    $myNotif->user_id = $_POST['user_id'];
} 

if (isset($_POST['message'])) {
    $myNotif->message = $_POST['message'];
} 

if (isset($_POST['visited'])) {
    $myNotif->visited = $_POST['visited'];
} 

$myNotif->timestamp = time();



//Open DB
$myDb = Database::instance();
$myDb->openDatabase(); // If there is an error a Json is sent with the error message


$myDb->addElement(DB_TABLE_NOTIFICATIONS, '(' . $myNotif->getFields() . ')', $myNotif->getvalues());

$json = new JsonResponse();
$json->result = KEY_CODE_SUCCESS; 
$json->message = "id: " . $myNotif->user_id . " visited: " . $myNotif->visited . " message: " . $myNotif->message . " timestamp: " . $myNotif->timestamp . " from: " . $myNotif->from  ;
$json->output();

