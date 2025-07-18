<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bigflex-admin">
        <?php
        error_reporting(E_ALL);
ini_set('display_errors', 1);
        require_once "functions.php";
        $servername = "localhost";
        $username = "zmijucha";
        $password = "hnusnypocasipanove";
        $database = "mmm";
        if (!$_GET || $_GET["id"] == null) {
            $image_id = 129;
        } else {
            $image_id = $_GET["id"];
        }
        $next_image_id = $image_id+1;
        $prev_image_id = $image_id-1;
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        /*echo "Connected successfully index!<br>\n";*/

        $sql = "SELECT id, nazev, prezdivka FROM obrazky WHERE ID = " . $image_id;
        $sql_all_tags = "SELECT id, nazev FROM tagy";
        $result = $conn->query($sql);
        $tagy = $conn->query($sql_all_tags);
        $tagy_img = get_tags_for_image($image_id, $conn);
        $delete_string1 = "<a href=delete_tag.php?img_id=$image_id";
        $delete_string2 = ">delete</a>";
        $rename_string1 = "<a href=rename_image.php";
        $rename_string2 = ">rename</a>";
        if ($result->num_rows == 1) {
            echo "<ul>";
            $row = $result->fetch_assoc();
            echo "<li> jmeno: " . $row["prezdivka"] . " " . $rename_string1 . "?id=" . $row["id"] . $rename_string2 . "</li>";
            echo "</ul>";
            echo "<div class = 'imageandtags'><ul>";
            // vypis tagu
            foreach ($tagy_img as $t) {
                echo "<li>" . $t["nazev"] . " " . $delete_string1 . "&id=" . $t["id"] . $delete_string2 . "</li>";

            }
            echo "</ul>";

            echo "<div class='image-container'> 
                            <div class= 'image-wrapper'>
                                <img src='obrazky/" . $row["nazev"] . "' alt='obrazek'> 
                           </div>" . 
                "</div>
                        <form class = 'addtagform' action='add_tag.php?imgid=" . $image_id . "' method='POST'>
                            <label for='tag'>Zadejte nebo vyberte tag:</label>
                            <input list='tagy' name='tag' id='tag' required autocomplete='off'/>
                                <datalist id='tagy'>";
                                
            /*nasypeme tagy do datalistu */

/*
// Debug the tag list returned from database
echo "<pre>"; // makes output readable
var_dump($tagy->fetch_all());
echo "</pre>";

// reset pointer to use fetch_assoc() later
$tagy->data_seek(0);
*/
            if ($tagy->num_rows > 0) {
                while ($row = $tagy->fetch_assoc()) {
                    echo "
                                        <option value=" . $row["nazev"] . ">";
                }
            } else {
                echo "************** NIC  ********************";
            }
            echo "
                                </datalist>
                               <button type='submit'>Add Tag</button> 
                        </form>

                ";

            echo "<a href='admin.php' class='button'>Back to Main Page</a>";
            echo "</div>";
        } else {
            echo "0 results";
        }

        $conn->close();

        ?>
    </div>

<script>
document.addEventListener("keydown", function(e) {
    // Only act if no input/textarea is focused
    const tag = document.activeElement.tagName;
    if (e.key === "ArrowUp" && !["INPUT", "TEXTAREA"].includes(tag)) {
        e.preventDefault();
        window.location.href = "admin.php"; 
    }
    if (e.key === "ArrowLeft" && !["INPUT", "TEXTAREA"].includes(tag)) {
        e.preventDefault();
        window.location.href = "oneimage.php?id=<?php echo $prev_image_id; ?>"; 
    }
    if (e.key === "ArrowRight" && !["INPUT", "TEXTAREA"].includes(tag)) {
        e.preventDefault();
        window.location.href = "oneimage.php?id=<?php echo $next_image_id; ?>"; 
    }
});
</script>

</body>

</html>