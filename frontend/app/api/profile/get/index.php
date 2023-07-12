<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$phonenumber = $_POST['phoneNumber'];

$sql = "SELECT `name`,`profile_pic` FROM `gdm_app_users` where user_phone='$phonenumber'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    // phone number already exists
    $returnData = array(
        'success' => 1,
        'status' => 201, // conflict status code
        'data' => $row,
    );
} else {

    $returnData = array(
        'success' => 0,
        'status' => 422,
        'message' => "Failed",
    );
}
echo json_encode($returnData);
// close database connection
mysqli_close($link);
