<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$items = json_decode($_POST['items'], true);
$finalValue = $_POST['sumPrice'];

$OrderId = $_POST['OrderId'];
$phoneNumber = $_POST['phoneNumber'];

// Start a transaction
mysqli_begin_transaction($link);

$sql_order = "INSERT INTO `jdm_order_num`(`jdm_on_uniqid`, `jdm_on_userid`,`order_amount`) VALUES ('$OrderId',(SELECT `user_id` FROM `gdm_app_users` WHERE user_phone='$phoneNumber' ),'$finalValue')";
mysqli_query($link, $sql_order);

// Get the ID of the last inserted row
$order_id = mysqli_insert_id($link);

try {

  // Loop through each item to insert into database
  foreach ($items as $item) {
    $itemId = $item['itemId'];
    $itemName = $item['itemName'];
    $itemQuantity = $item['itemQuantity'];
    $itemPrice = $item['itemprice'];
    $itemOffer = $item['itemoffer'];
    $totPrice = $item['totPrice'];

    // prepare insert query
    $sql = "INSERT INTO `jdm_order`(`jdm_order_prod_id`, `jdm_order_qty`, `jdm_order_uniqid`, `jdm_order_userid`,`product_price`) VALUES ('$itemId','$itemQuantity','$OrderId',(SELECT `user_id` FROM `gdm_app_users` WHERE user_phone='$phoneNumber' ),'$totPrice')";

    mysqli_query($link, $sql);
  }

  // Commit the transaction
  mysqli_commit($link);

  $returnData = array(
    'success' => 1,
    'status' => 201,
    'message' => "Success",
    'data' => $order_id,
  );
} catch (Exception $e) {
  // Rollback the transaction if an exception occurred
  mysqli_rollback($link);

  $returnData = array(
    'success' => 0,
    'status' => 422,
    'message' => "Failed",
    'data' => $e->getMessage(),
  );
}

echo json_encode($returnData);

// close database connection
mysqli_close($link);
