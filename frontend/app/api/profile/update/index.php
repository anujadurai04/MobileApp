<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$name = $_POST['name'];
$phoneNumber = $_POST['phone'];
$customerid = $_POST['customerid'];

// Check if the phone number is empty
if (!empty($phoneNumber)) {
    // Query the database to check if the entered phone number already exists
    $query = "SELECT * FROM `gdm_app_users` WHERE `user_phone` = '$phoneNumber' AND user_id NOT IN (SELECT `user_id` from `gdm_app_users` where `user_phone` <> '$phoneNumber')";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        // Phone number already exists, return status code 422
        $returnData = array(
            'success' => 0,
            'status' => 422,
            'message' => "Phone number already exists",
        );
    } else {
        // Phone number does not exist, update the database
        try {
            $sql_order = "UPDATE `gdm_app_users` SET `name`='$name',`user_phone`='$phoneNumber' WHERE `user_phone`='$customerid'";
            mysqli_query($link, $sql_order);

            $returnData = array(
                'success' => 1,
                'status' => 200,
                'message' => "Name and Phone Number updated successfully!",
                'phonenumber' => $phoneNumber
            );
        } catch (Exception $e) {
            $returnData = array(
                'success' => 0,
                'status' => 422,
                'message' => "Something Went wrong!",
            );
        }
    }
} else if (!empty($name)) {
    try {
        $sql_order = "UPDATE `gdm_app_users` SET `name`='$name' WHERE `user_phone`='$customerid'";
        mysqli_query($link, $sql_order);

        $returnData = array(
            'success' => 1,
            'status' => 201,
            'message' => "Name updated successfully!",
        );
    } catch (Exception $e) {
        $returnData = array(
            'success' => 0,
            'status' => 422,
            'message' => "Something Went wrong!",
        );
    }
} else {
    $returnData = array(
        'success' => 0,
        'status' => 422,
        'message' => "No valid input!",
    );
}
echo json_encode($returnData);

// close database connection
mysqli_close($link);
