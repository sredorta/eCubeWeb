<?php
include ("../constants/constants.general.php");


//Get the fields from the notification object
$myOrder = new Order();

if (isset($_POST['order_id'])) {
   $myOrder->order_id = $_POST['order_id'];
}     

//Open DB
$myDb = Database::instance();
$myDb->openDatabase(); // If there is an error a Json is sent with the error message



//Now that we have the id of the user we find the notifications of the user
$myOrder->locker = $myDb->getRow(DB_TABLE_ORDERS, "locker", "order_id = '" . $myOrder->order_id . "'")['locker'];

$json = new JsonResponseOrder();
$json->locker = $myOrder->locker;
$json->result = KEY_CODE_SUCCESS; 
$json->output();

