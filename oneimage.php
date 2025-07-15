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
            $sql_all_tags = "SELECT id, nazev FROM tagy";
            $result = $conn->query($sql);
            $tagy = $conn->query($sql_all_tags);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo "<h1>".$row["id"]." ".$row["nazev"]."</h1>";
                echo    "<div class='image-container'> 
                            <div class= 'image-wrapper'>
                                <img src='obrazky/" . $row["nazev"] . "' alt='obrazek'> 
                           </div>". /*ID:" . $row["id"] . " : " . $row["nazev"] . "*/
                        "</div>
                        <form action='add_tag.php?imgid=".$image_id."' method='POST'>
                            <label for='tag'>Zadejte nebo vyberte tag:</label>
                            <input list='tagy' name='tag' id='tag' required/>
                                <datalist id='tagy'>";
                                   if ($tagy->num_rows>0){
                                      while ($row = $tagy->fetch_assoc()) {
                                        echo "
                                        <option value=".$row["nazev"].">";
                                      }
                                  }
                                    else{ echo "************** NIC  ********************";}
                                echo"
                                </datalist>
                               <button type='submit'>Add Tag</button> 
                        </form>

                ";


            } else {
                echo "0 results";
            }

            $conn->close();

            ?>
    </div>
</body>

</html>