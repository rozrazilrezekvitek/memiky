<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meme Machine</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="obrazky/gearicon.png">
</head>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get x from previous POST (or set default)
$tagstring = '';
$newest_tag = '';
// If form submitted with new input, handle it
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_option'])) {
  $newest_tag = $_POST['selected_option'];
  $tagstring = $_POST['tagstring'] ?? ''; // x in hidden input  - if nothing from previous input then x=''

  if (preg_match('/^[a-zA-Z0-9 _\-.!?]*$/', $newest_tag)) {

  } else {
    $newest_tag = '';
  }

  echo "Received user input: " . htmlspecialchars($newest_tag) . "<br>";
  echo "Value of tagstring passed along: " . htmlspecialchars($tagstring) . "<br>";

}

function get_images_for_tagstring($tagstring,$conn): array{
  $sql = "
      SELECT o.id FROM obrazky o WHERE
      NOT EXISTS(
          SELECT * FROM tagy t WHERE t.nazev IN (".$tagstring.") AND NOT EXISTS(
              SELECT * FROM obrazek_tag ot WHERE t.id=ot.tag_id AND o.id=ot.img_id
              
              )
          );";
  echo "------------------------------------> " . $sql;
  $result = $conn->query($sql);
  $img_array = [];
  if ($result->num_rows == 0) {
    echo "000000000000000000000000000000000000000";
    return $img_array;
  } else {
    while ($row = $result->fetch_assoc()) {
      $img_array[] = $row["id"];
      echo "returning............. " . $row["id"];
    }
    ;
    return $img_array;
  }

}
function get_images_for_tag($nazev, $conn): array
{
  $sql = "SELECT o.id
          FROM obrazky o
          JOIN obrazek_tag ot ON ot.img_id = o.id
          JOIN tagy t ON t.id = ot.tag_id
          WHERE t.nazev = '".$nazev."';";
  echo "------------------------------------> " . $sql;
  $result = $conn->query($sql);
  $img_array = [];
  if ($result->num_rows == 0) {
    echo "000000000000000000000000000000000000000";
    return $img_array;
  } else {
    while ($row = $result->fetch_assoc()) {
      $img_array[] = $row["id"];
      echo "returning............. " . $row["id"];
    }
    ;
    return $img_array;
  }

}

?>

<body>
  <h1>Meme Machine</h1>
  <div class="central-image-container">
    <img src="obrazky/gearsbulbstill.png">
  </div>
  <form class="myform" id='nav-form' method='POST' action='index.php'>
    <label for='filter-input'>Search Options:</label>
    <input type='text' id='filter-input' name="selected_option" autocomplete="off" placeholder='Type to filter...'
      aria-controls='filter-select' required autofocus />
    <label for='filter-select'>Choose an option:</label>
      <?php
      $servername = "localhost";
      $username = "zmijucha";
      $password = "hnusnypocasipanove";
      $database = "mmm";
      $max_tags = 4;
      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      if ($tagstring == '' && $newest_tag == '') {
        /* žádné zadané pokračuj bez filtrování tagů */
        echo"/* žádné zadané pokračuj bez filtrování tagů */";
        $sql_all_tags = "SELECT id, nazev FROM tagy;";
      }
      /* existuje pouze jeden (nejnovější) tag */ 
      elseif ($tagstring == '' && strlen($newest_tag) > 0) {
        echo"/* existuje pouze jeden (nejnovější) tag */ ";
        $images_array = get_images_for_tag($newest_tag, $conn);
        if (count($images_array) == 0) {
          /* tag je neplatný, pokračuj bez filtrování tagů a bez úpravy tagstringu*/
          $sql_all_tags = "SELECT id, nazev FROM tagy;";
        } elseif (count($images_array) == 1) {
          //konec
          header("Location: showimage.php?id=$images_array[0]");
          exit;
        } else {
          $tagstring = "'" . $newest_tag . "'";
          echo"\nnewest tag p5id8n do tagstringu>". $tagstring ."\n";
          // filtruj tagy aby tam zůstaly jen takové tagx, že existuje obrázek který má tagx a zároveň $newest_tag
          echo "// filtruj tagy aby tam zůstaly jen takové tagx, že existuje obrázek který má tagx a zároveň $newest_tag";
          // pokud takové nejsou --> konec (ale to by byl nějaký eror)
          $sql_all_tags = "
                          SELECT nazev FROM tagy t WHERE EXISTS(
                            SELECT * from obrazek_tag ot WHERE t.id = ot.tag_id AND EXISTS(
                              SELECT * from obrazek_tag ot2 WHERE 
                                ot2.img_id = ot.img_id AND ot2.tag_id IN (
                                  SELECT id FROM tagy tt WHERE  tt.nazev = '".$newest_tag."'))) 
                                  AND t.nazev NOT IN ('".$newest_tag."',".$tagstring.");";
        }
      }
      elseif (count(explode(",", $tagstring)) >= $max_tags) {
        echo "/* newest_tag je neprázdný a tagstring taky, tagstring >max */";
        /* newest_tag je neprázdný a tagstring taky, tagstring >max */
        //konec, vyber na základě předchozích
        $images_array = get_images_for_tagstring($tagstring, $conn);
        $img = $images_array[0]; //doladit - vybíráme poněkud náhodně
        header("Location: showimage.php?id=$img");//xxx dodelat
        exit;
      }
      else {
        /* newest_tag je neprázdný a tagstring taky, tagstring <max */ 
        echo"/* newest_tag je neprázdný a tagstring taky, tagstring <max */ ";
        $images_array = get_images_for_tag($newest_tag, $conn);
        if (count($images_array) == 0) {
          /* poslední tag je neplatný, --> konec (vyber na základě předchozích) xxx dodelat!!!!!*/
          echo"/* poslední tag je neplatný, --> konec (vyber obrazek na základě předchozích -tj. tagstringu -> header, exit) xxx dodelat!!!!!*/";

          $images_array = get_images_for_tagstring($tagstring, $conn);
          $img = $images_array[0]; //doladit - vybíráme poněkud náhodně

          header("Location: showimage.php?id=$img");
          exit;
        } elseif (count($images_array) == 1) {
          //konec
          header("Location: showimage.php?id=$images_array[0]");
          exit;
        } else {
          $tagstring = $tagstring . ",'" . $newest_tag . "'";
          // filtruj tagy aby tam zůstaly jen takové tagx, že existuje obrázek který má tagx a zároveň všechny z tagstringu s přidaným newest
          // xxx pozor aby tam nezustal newest !!!!!!!!!!!!!!
          // pokud takové nejsou --> konec
          $sql_all_tags = "
                SELECT nazev FROM tagy t WHERE t.nazev NOT IN ('".$newest_tag."',".$tagstring.") AND
                    EXISTS(
                        SELECT * FROM obrazky o WHERE
                            EXISTS(
                                SELECT * FROM obrazek_tag ot WHERE
                                    ot.tag_id = t.id AND ot.img_id = o.id AND
                                    NOT EXISTS(
                                        SELECT * FROM tagy tt WHERE
                                        tt.nazev IN (" . $tagstring . ") AND
                                        NOT EXISTS (SELECT * FROM obrazek_tag oott WHERE
                                        oott.tag_id = tt.id AND oott.img_id = o.id)
                                    )
                            )
                    );";

        }
      }
       echo"--tagstring---------->$tagstring<------------------";
        echo"--newest_tag---------->$newest_tag<------------------";

        /* do skrytého inputu si předáme tagstring */
      echo "<input type='hidden' name='tagstring' value='". htmlspecialchars($tagstring)."'>";


      echo"\nsql_all_tags ->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n$sql_all_tags";
      $tagy = $conn->query($sql_all_tags);

      /* a teď vyrobíme ten select a zabydlíme ho správnými tagy */
      echo"<select id='filter-select' size='6'>";
      while ($row = $tagy->fetch_assoc()) {
        $tag_id = $row["id"];
        $tag_nazev = $row["nazev"];
        echo "<option value='" . $tag_id . "'>" . $tag_nazev . "</option>"; //tady se ty tagy nasypou do UI selectu
      }
      echo "</select>
        <button type='submit'>Boom</button> 
    </form>";
      $conn->close();
      ?>
      <script>
        const input = document.getElementById("filter-input");
        const hidden_input = document.getElementById("tagstring");
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
            //hidden_input.value=$tagstring; nesmysl!!!!!! javascript $tagstring nevidi!!!!!!!!!!!!!!
            
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
            //focusInputAtEnd(); no weird focus jumping
          }
        });
      </script>


      
</body>

</html>