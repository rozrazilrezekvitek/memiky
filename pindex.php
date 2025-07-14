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
  const input = document.getElementById("filter-input");
  const select = document.getElementById("filter-select");
  const form = document.getElementById("nav-form");

  let isBackspacing = false;
  let isTyping = false;

  // Clear input on page load
  window.addEventListener("DOMContentLoaded", () => {
    input.value = "";
    filterOptions();
  });

  function focusInputAtEnd() {
    input.focus();
    const len = input.value.length;
    input.setSelectionRange(len, len);
  }

  function filterOptions() {
    const filter = input.value.toLowerCase();
    let visibleCount = 0;
    let firstVisibleOption = null;

    Array.from(select.options).forEach(option => {
      if (option.text.toLowerCase().includes(filter)) {
        option.hidden = false;
        if (!firstVisibleOption) firstVisibleOption = option;
        visibleCount++;
      } else {
        option.hidden = true;
      }
    });

    if (visibleCount === 1 && !isBackspacing) {
      select.value = firstVisibleOption.value;
      input.value = firstVisibleOption.text;
      focusInputAtEnd();
    } else {
      select.value = "";
    }

    // Reset typing/backspace state
    isTyping = false;
    isBackspacing = false;
  }

  // Input field: handle typing and arrow key nav to <select>
  input.addEventListener("keydown", e => {
    if (e.key === "Backspace") {
      isBackspacing = true;
    }

    if (["ArrowDown", "ArrowUp"].includes(e.key)) {
      e.preventDefault();
      select.focus();
    }
  });

  input.addEventListener("input", () => {
    filterOptions();
  });

  // Select box key handling
  select.addEventListener("keydown", e => {
    const key = e.key;

    if (key === "Enter") {
      e.preventDefault();
      form.requestSubmit();
      return;
    }

    if (key === "Escape") {
      e.preventDefault();
      focusInputAtEnd();
      return;
    }

    // Handle Backspace: redirect to input
    if (key === "Backspace") {
      e.preventDefault();
      isBackspacing = true;
      input.value = input.value.slice(0, -1);
      filterOptions();
      focusInputAtEnd();
      return;
    }

    // Handle typing (excluding arrow/control/meta keys)
    if (key.length === 1 && !e.ctrlKey && !e.metaKey) {
      e.preventDefault();
      input.value += key;
      isTyping = true;
      filterOptions();
      focusInputAtEnd();
    }

    // Arrow keys are handled normally here — don't change focus
  });

  // Select box: reflect selected option in input (via mouse or change)
  select.addEventListener("change", () => {
    const selected = select.options[select.selectedIndex];
    if (selected) {
      input.value = selected.text;
      //focusInputAtEnd();
    }
  });
</script>



</body>

</html>