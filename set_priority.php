<?php
require_once "functions.php";
require_once "debug.php";

$servername = "localhost";
$username = "mmm";
$password = "krhanichuck";
$database = "mmm";
$image_id = $_GET["img"];
$tag_id = $_GET['tag'];
$new_priority = $_POST['priority'];
$sign  = $_POST['sign'];
$tagstring = $_POST['tagstring'];

debug('tagstring on priority page--->'.$tagstring);
echo 'tagstring on priority page--->'.$tagstring;


if($sign=='minus' && $new_priority>0){
    $new_priority -= 1;
} elseif($sign== 'plus' && $new_priority< 10){
    $new_priority += 1;
}

debug('sign:  '.$sign.' new_priority '.$new_priority.'');
echo 'sign:  '.$sign.' new_priority '.$new_priority;

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
/*header(header: "Location: admin.php");*/
/*exit();*/
echo "
        <form id='postRedirectForm' action='admin.php' method='POST' style='display: none;'>
            <input type='hidden' name='tagstring' value='".htmlspecialchars($tagstring,ENT_QUOTES)."'>
        </form>";
echo "  <script>
            document.getElementById('postRedirectForm').submit();
        </script>
        ";

}
else echo " neni cislo!!!!!!!!!!!!";

