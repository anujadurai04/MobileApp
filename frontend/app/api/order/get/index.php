<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$order_id = $_POST['order_id'];

$sql = "SELECT jdm_on_timestamp,jdm_on_id,order_amount FROM `jdm_order_num` where jdm_on_id='$order_id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
// close database connection
mysqli_close($link);
