<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bigflex">
            <?php
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";
            if(!$_GET || $_GET["id"]==null){
                $image_id = 129;
            }
            else{
                $image_id = $_GET["id"];
            }
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            /*echo "Connected successfully index!<br>\n";*/
 
            $sql = "SELECT id, nazev FROM obrazky WHERE ID = " . $image_id;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();  
                echo    //"<div class='image-container'> 
                        //    <div class= 'image-wrapper'>
                                "<img src='obrazky/" . $row["nazev"] . "' alt='obrazek'> ";
                        //   </div>". /*ID:" . $row["id"] . " : " . $row["nazev"] . "*/
                        //"</div>";
            $conn->close();
            ?>
    </div>
</body>

</html>