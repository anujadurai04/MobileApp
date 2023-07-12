<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$phonenumber = $_POST['phoneNumber'];

$sql = "SELECT `jdm_on_userid`,`jdm_on_id`,`order_amount`,`jdm_on_status`,`status_name` FROM `jdm_order_num` as a INNER JOIN jdm_order_status as b on a.jdm_on_status=b.id  WHERE `jdm_on_userid` = (SELECT user_id FROM `gdm_app_users` WHERE user_phone = '$phonenumber') order by `jdm_on_id` DESC";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch all rows
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    $returnData = array(
        'success' => 1,
        'status' => 200,
        'data' => $rows,
    );
} else {
    $returnData = array(
        'success' => 0,
        'status' => 404,
        'message' => "No data found.",
    );
}

echo json_encode($returnData);
// close database connection
mysqli_close($link);
