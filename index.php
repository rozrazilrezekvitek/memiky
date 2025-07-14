<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memíky </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="central-image-container">
        <img src="obrazky/gearsbulbstill.png">
    </div>
    <form id='nav-form' method='POST' action='sss.php'>
        <label for='filter-input'>Search Options:</label>
        <input type='text' id='filter-input' name="selected_option" placeholder='Type to filter...' aria-controls='filter-select' required autofocus />
        <label for='filter-select'>Choose an option:</label>
        <select id='filter-select' size="6">
            <?php
            $servername = "localhost";
            $username = "zmijucha";
            $password = "hnusnypocasipanove";
            $database = "mmm";
            if (!$_GET || $_GET["id"] == null) {
                $image_id = 129;
            } else {
                $image_id = $_GET["id"];
            }
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql_all_tags = "SELECT id, nazev FROM tagy";
            $tagy = $conn->query($sql_all_tags);
            //$row = $tagy->fetch_assoc();
            while ($row = $tagy->fetch_assoc()) {
                $tag_id = $row["id"];
                $tag_nazev = $row["nazev"];
                echo "<option value='" . $tag_id . "'>" . $tag_nazev . "</option>";
            }
            echo   /* <option value='about'>About</option>
            <option value='base'>Base</option>
            <option value='blog'>Blog</option>
            <option value='contact'>Contact</option>
            <option value='custom'>Custom</option>
            <option value='support'>Support</option>
            <option value='tools'>Tools</option>
            <option value='testing'>Testing</option>
            <option value='feedback'>Feedback</option>
            <option value='team'>Team</option>*/
            "</select>
        <button type='submit'>Boom</button> 
    </form>";
            $conn->close();
            ?>
            <script>
                document.getElementById("filter-input").value = "";
                const input = document.getElementById("filter-input");
                const select = document.getElementById("filter-select");

                input.addEventListener("input", (e) => {
                    const filter = input.value.toLowerCase();
                    isfocus = false;
                    number_visible = 0;
                    for (let i = 0; i < select.options.length; i++) {
                        option = select.options[i];
                        const text = option.text.toLowerCase();
                        if (text.includes(filter)) {
                            number_visible += 1;
                            option.hidden = false;
                            if (isfocus == false) {
                                isfocus = true;
                                select.value = option.value;
                            }
                        } else {
                            option.hidden = true;
                        }
                    };
                    if(number_visible ==1 && e.key != "Backspace"){
                        const selectedText = select.options[select.selectedIndex].text;
                        input.value = selectedText;
                        //input.focus();
                        //select.focus();
                    }
                    else{
                        input.focus();
                        //select.focus();
                    }
                });

                input.addEventListener("keydown", (e) => {
                    const key = e.key;
                    const arrowKeys = ["ArrowDown", "ArrowUp"];

                    if (arrowKeys.includes(key)) {
                        e.preventDefault(); // Prevent input cursor movement
                        select.focus(); // Let browser handle arrows from here
                    }
                     if (e.key === "Backspace") {
                            input.value = input.value.slice(0, -1);
                        }
                });

                select.addEventListener("keydown", (e) => {
                    const isTypingKey = e.key.length === 1 || e.key === "Backspace";

                    if (isTypingKey) {
                        e.preventDefault(); // Prevent the select from jumping to other options
                        input.focus();

                        // Append the key to input value manually (optional)
                        if (e.key === "Backspace") {
                            input.value = input.value.slice(0, -1);
                        } else {
                            input.value += e.key;
                        }

                        // Trigger filtering manually
                        input.dispatchEvent(new Event("input"));
                    }
                });

                select.addEventListener("change", (e) => {
                    const selectedText = select.options[select.selectedIndex].text;
                    if(e.key!="Backspace"){
                        input.value = selectedText;
                    }
                });
                select.addEventListener("keydown", (e) => {
                    // Handle Enter key while select is focused
                    if (e.key === "Enter") {
                        e.preventDefault();
                        const form = document.getElementById("nav-form");
                        form.requestSubmit();
                    }
                });
            </script>
</body>

</html>