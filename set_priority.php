<?php
require_once "functions.php";
require_once "debug.php";

$servername = "localhost";
$username = "zmijucha";
$password = "hnusnypocasipanove";
$database = "mmm";
$image_id = $_GET["img"];
$tag_id = $_GET['tag'];
$new_priority = $_POST['priority'];
if(is_numeric($new_priority))
{

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE obrazek_tag SET priorita = '" . $new_priority . "' WHERE img_id =".$image_id." AND tag_id = '".$tag_id."';";
$result = $conn->query($sql);
echo "tttttttttttttttttttttttttttttttttttttttttttttttttt " . $sql;
$conn->close();
header("Location: admin.php");
exit();

}
else echo " neni cislo!!!!!!!!!!!!";