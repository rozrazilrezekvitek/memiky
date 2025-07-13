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

            function add_tag_to_image($image_id, $tag_id, $conn): void{
                $sql = "INSERT INTO obrazek_tag (img_id,tag_id) VALUES(".$image_id.",".$tag_id .");";
                echo "------------------------------------> ".$sql;
                try{
                    $result = $conn->query($sql);
                }
                catch (mysqli_sql_exception $e) {
                    $conn->close();
                    if ($e->getCode() == 1062) {
                    // duplicate tag
                    echo "================================> duplicate tag";
                    header("Location: oneimage.php?id=".$image_id."&duplicate=1");
                    exit();
                    } else {
                        throw $e;// in case it's any other error
                    }
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
                //add tag to tagy
                $sql = "INSERT INTO tagy (nazev) VALUES('".$nazev."');";
                $result = $conn->query($sql);
                 echo "tttttttttttttttttttttttttttttttttttttttttttttttttt ".$sql;
                $tag_id = get_tag_id($nazev,$conn);
                add_tag_to_image($image_id, $tag_id, $conn);
            }
            else{
                add_tag_to_image($image_id, $tag_id, $conn);
            }
            $conn->close();
header("Location: oneimage.php?id=".$image_id);
exit();

