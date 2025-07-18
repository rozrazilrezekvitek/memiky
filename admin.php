<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Všechny obrázky</h1> 
        <div class = "image-panel">
            <?php
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            /*echo "Connected successfully index!<br>\n";*/

            $sql = "SELECT id, nazev, prezdivka FROM obrazky";
            $result = $conn->query($sql);
            $delete_string1 ="<a href=delete_task.php";
            $delete_string2 =">delete</a>";
            // Output results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo    "<a href='oneimage.php?id=".$row["id"]."'>
                                <div class='image-container'> 
                                    <div class= 'image-wrapper'>
                                        <img src='obrazky/".$row["nazev"]. "' alt='obrazek'> 
                                    </div> 
                                    <div class=description>
                                        <div>". $row["id"] . "</div> <div> " . $row["prezdivka"] ."</div>
                                    </div>
                                </div>
                            </a>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();

            ?>

        </div>
    </div>
</body>

</html>