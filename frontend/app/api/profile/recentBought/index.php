<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$customerid = $_POST['phoneNumber'];

$sql = "SELECT c.gdm_prod_id,c.gdm_prod_image FROM `jdm_order_num` as a INNER JOIN jdm_order as b on a.jdm_on_uniqid=b.jdm_order_uniqid INNER JOIN gdm_products as c on b.jdm_order_prod_id=c.gdm_prod_id where a.jdm_on_userid=(SELECT user_id from gdm_app_users where user_phone='$customerid') AND a.jdm_on_status='2' order by a.jdm_on_id desc limit 5";
$result = mysqli_query($link, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $returnData = array(
        'success' => 1,
        'status' => 201, // conflict status code
        'data' => $data,
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
