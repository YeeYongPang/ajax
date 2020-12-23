<?php
// this will update the price of catalogs only
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die ("Fatal Error");

$isbn = $_GET['isbn'];
$price = $_GET['price'];

$query = "UPDATE catalogs SET price='$price' WHERE isbn='$isbn'";
$conn->query($query);
//echo $query;

?>