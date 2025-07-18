            <?php
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";
            $image_id = $_GET["imgid"];
            $nazev = $_POST['tag'];
            require_once'functions.php';
           
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

