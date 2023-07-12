<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$phone = $_POST['number'];
$verified = $_POST['verified'];

// search if phone number already exists
$sql = "SELECT * FROM `gdm_app_users` WHERE `user_phone` = '$phone'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // phone number already exists
  $returnData = array(
    'success' => 1,
    'status' => 201, // conflict status code
    'message' => "Phone number already exists",
  );
} else {
  // prepare insert query
  $sql = "INSERT INTO `gdm_app_users`(`user_phone`, `user_active`) VALUES ('$phone','$verified')";

  // execute insert query
  if (mysqli_query($link, $sql)) {
    $returnData = array(
      'success' => 1,
      'status' => 201,
      'message' => "Success",
    );
  } else {
    $returnData = array(
      'success' => 0,
      'status' => 422,
      'message' => "Failed",
    );
  }
}
echo json_encode($returnData);
// close database connection
mysqli_close($link);
