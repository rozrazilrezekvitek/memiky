<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accessible Searchable Dropdown</title>
    
</head>

<body>
   <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?> 



<?php
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";
            $image_id = $_GET["imgid"];
            $nazev = $_POST['tag'];
            
            function get_tag_id($nazev,$conn): ?int {
                $sql_get_tag_id = "SELECT id FROM tagy WHERE nazev='".$nazev."';";
                echo "**********************".$sql_get_tag_id;
                $result = $conn->query($sql_get_tag_id);
                if($result->num_rows == 0){
                    echo "000000000000000000000000000000000000000";
                    return null;
                }
                else{
                    $row = $result->fetch_assoc();
                    echo "returning............. ". $row["id"];
                    return $row["id"];
                }
            }

            function get_tag_ids($nazev_array, $conn): array {
                echo"";
            }

            function get_images_for_tag($tag_id, $conn): array{
                $sql = "SELECT img_id FROM obrazek_tag WHERE tag_id='".$tag_id."';";
                echo "------------------------------------> ".$sql;
                $result = $conn->query($sql);
                $img_array = [];
                if($result->num_rows == 0){
                    echo "000000000000000000000000000000000000000";
                    return $img_array;
                }
                else{
                    while ($row = $result->fetch_assoc()){
                        $img_array += $row["img_id"];
                        echo "returning............. ". $row["img_id"];
                    };
                    return $img_array;
                }

            }
            
            function get_images_for_tags($tag_id_array, $conn): ?array{
                $sql = "SELECT img_id FROM obrazek_tag WHERE tag_id='".$tag_id."';";
                echo "------------------------------------> ".$sql;
                $result = $conn->query($sql);
                if($result->num_rows == 0){
                    echo "000000000000000000000000000000000000000";
                    return null;
                }
                else{
                    $img_array = [];
                    while ($row = $result->fetch_assoc()){
                        $tag_array[] += $row["img_id"];
                        echo "returning............. ". $row["img_id"];
                    };
                    return $img_array;
                }

            }

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            /*echo "Connected successfully index!<br>\n";*/
            $tag_id = get_tag_id($nazev,$conn);
            if($tag_id == null){
                 echo "Máme problém Hjůstne ".$sql;
            }
            else{
                $img_id_array = get_image_ids_for_tag_id($tag_id, $conn);
                if($img_id_array==null || count($img_id_array) == 0){
                    echo "Další problém Hjůstne, no image for tag".$sql;
                }
                elseif(count($img_id_array)>1){
                    echo "Další problém Hjůstne, moc možností".$sql;
                }
                else{

                    echo "Něco by se mělo udělat".$sql;
                }

            }
            $conn->close();
//header("Location: oneimage.php?id=".$image_id);
exit();

