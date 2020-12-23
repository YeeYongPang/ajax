<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die ("Fatal Error");

$query = "SELECT * FROM catalogs";
$result = $conn->query($query);
$rows = $result->num_rows;


?>