<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

$searchText = mysqli_real_escape_string($link, $_POST['searchText']);

$imageLink="https://huminn.api.jstacktech.com/gdmAdmin/uploads/products/";

$sql = "SELECT gdm_prod_id as id, gdm_prod_name as name,gdm_prod_price as price, CONCAT(
    '$imageLink',
    COALESCE(NULLIF(TRIM(gdm_prod_image), ''), 'no-image.png')
) AS productimage,gdm_prod_offer as offer, gdm_prod_min_qty as minqty,gdm_prod_min_qty as quantity FROM gdm_products as a INNER JOIN jdm_category as b on a.gdm_prod_cat_id=b.jdm_cate_id INNER JOIN jdm_brand as c on a.gdm_prod_brand_id=c.jdm_brand_id WHERE gdm_prod_name LIKE '%$searchText%' OR b.jdm_cate_name LIKE '%$searchText%' OR c.jdm_brand_name LIKE '%$searchText%'";
$result = mysqli_query($link, $sql);

if ($result) {
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode([]);
}

// Close database connection
mysqli_close($link);
