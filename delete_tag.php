<?php
require_once "functions.php";
require_once "debug.php";
$servername = "localhost";
$username = "zmijucha";
$password = "hnusnypocasipanove";
$database = "mmm";
$image_id = $_GET["img_id"];
$tag_id = $_GET['id'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

delete_tag_from_obrazek($tag_id, $image_id, $conn);
delete_unused_tags($conn);
$conn->close();



header("Location: oneimage.php?id=" . $image_id);
exit();

