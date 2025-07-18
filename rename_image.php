<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once "functions.php";
    $img_id = $_GET["id"] ?? "";
    function form_rename_image($img_id)
    {
        $servername = "localhost";
        $username = "zmijucha";
        $password = "hnusnypocasipanove";
        $database = "mmm";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $jmeno = $_POST['jmeno'] ?? '';
        rename_image($img_id , $jmeno, $conn);  
        header("Location: oneimage.php?id=$img_id");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        form_rename_image($img_id);
    }

    echo "
<form action='rename_image.php?id=" . $img_id . "' method='POST'>
    <label for='nazev'>Zadejte nové jméno:</label>
    <input  name='jmeno' id='jmeno' autofocus required/>
    <button type='přejmenovat'>Přejmenovat</button> 
</form>
</body>
";
