<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <div class="container">
        <h1>Všechny obrázky</h1>
        <div class="image-panel">
            <?php
            require_once "functions.php";
            require_once "debug.php";
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";
            $tagstring = "";
            $newest_tag = "";
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tag'])) {
                $newest_tag = htmlspecialchars($_POST['tag']);
                $tagstring = $_POST['tagstring'] ?? ''; // x in hidden input  - if nothing from previous input then x=''
                /*$tagstring = htmlspecialchars($_GET['tagstring']);*/
                if ($tagstring == '') {
                    debug('tagstring prazdny');
                    if ($newest_tag != '') {
                        $tagstring = "'$newest_tag'";
                        debug("tagstring:=tag");
                    }
                } else {
                    $tagstring = $tagstring . ",'" . $newest_tag . "'";
                    debug("tagstring=tagstring.newest_tag");
                }
            }
            $urlstring = urlencode($tagstring);
            debug("tagstring:  " . $tagstring);
            debug("newest_tag:  " . $newest_tag);
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            /*debug( "Connected successfully index!<br>\n");*/

            $sql_all_tags = "SELECT id, nazev FROM tagy ORDER BY nazev;";
            $tagy = $conn->query($sql_all_tags);
            /* <form class = 'addtagform' action='admin.php?tagstring=x".$urlstring."' method='POST'> */
            /* <form class = 'addtagform' action='admin.php' method='POST'> */
            echo "
            <form class = 'addtagform' action='admin.php?tagstring=x" . $urlstring . "' method='POST'>
            <!-- formulář na přidávání tagů -->
                            <label for='tag'>Zadejte nebo vyberte tag:</label>
                            <input list='tagy' name='tag' id='tag' required autocomplete='off'/>
                                <datalist id='tagy'>";

            /*nasypeme tagy do datalistu */
            if ($tagy->num_rows > 0) {
                while ($row = $tagy->fetch_assoc()) {
                    echo "
                                        <option value=" . $row["nazev"] . ">";
                }
            } else {
                debug("************** NIC  ********************");
            }
            echo "
                                </datalist>
                                <button type='submit'>Add Tag</button> 
                                <input type='hidden' name='tagstring' value=\"" . $tagstring . "\">
                                <a href='admin.php' class='home-button' aria-label='Return to homepage' autofocus>
                                    <img src='mmm/left_arrow_button.svg' alt='Home' /> </a>
                        </form>

                ";

            /* tady vybíráme VŠECHNY obrázky*/
            /*$sql = "SELECT id, nazev, prezdivka FROM obrazky";
            $result = $conn->query($sql);*/
            $result = get_result_images_for_tagstring($tagstring, $conn);

            $delete_string1 = "<a href=delete_task.php";
            $delete_string2 = ">delete</a>";
            // Output results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $img_id = $row["id"];
                    $image_tags = get_result_tags_for_image($row["id"], $conn);
                    echo "
                                <div class='image-container'> 
                                    <a href='oneimage.php?id=" . $row["id"] . "'>
                                        <div class= 'image-wrapper'>
                                            <img src='obrazky/" . $row["nazev"] . "' alt='obrazek'>
                                        </div> 
                                     </a>
                                    <div class=description>
                                        <div class = 'description-heading'><div>" . $row["id"] . "</div> <div> " . $row["prezdivka"] . "</div></div>";
                    while($tag_row = $image_tags->fetch_assoc()){
                        $tag_id = $tag_row["id"];
                        echo "
                                    <form class = 'tag-and-priority' id='tag-priority-form' method='POST' action='set_priority.php?img=$img_id&tag=$tag_id'>
                                            <div class = 'tag-name'>". $tag_row["nazev"] ."</div>"
                                            ."<input  name='priority' id='priority' required autocomplete='off' value =". $tag_row['priorita'].">"  
                                            ."<button type='submit'>Set</button>" 
                                    ."</form> <!-- end tag-and-priority -->";
                    }
                    echo"       </div><!-- end description -->        
                                </div><!-- end image-container -->
                            ";
                }
            } else {
                debug("0 results");
            }

            $conn->close();

            ?>

        </div>
    </div>
</body>

</html>