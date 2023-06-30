<?php
//start session
session_start();
//create constants to store non Repeating values
define('SITEURL','http://localhost/food_order_table/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_order_table');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$db_select = mysqli_select_db($conn, DB_NAME);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($conn));
}
?>