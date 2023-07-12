<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
date_default_timezone_set("asia/kolkata");

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gdm');

$imageLink = "https://huminn.api.jstacktech.com/gdmAdmin/uploads/products/";
//$imageLink="http://localhost/gdmAdmin/uploads/products/";
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
