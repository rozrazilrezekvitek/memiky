<?php
require_once "debug.php";
function get_tag_id($nazev, $conn): ?int
{
    $sql_get_tag_id = "SELECT id FROM tagy WHERE nazev='" . $nazev . "';";
    debug("**********************" . $sql_get_tag_id);
    $result = $conn->query($sql_get_tag_id);
    if ($result->num_rows == 0) {
        debug("000000000000000000000000000000000000000");
        return null;
    } else {
        $row = $result->fetch_assoc();
        debug("returning............. " . $row["id"]);
        return $row["id"];
    }
}

function add_tag_to_image($image_id, $tag_id, $conn): void
{
    $sql = "INSERT INTO obrazek_tag (img_id,tag_id) VALUES(" . $image_id . "," . $tag_id . ");";
    debug("------------------------------------> " . $sql);
    try {
        $result = $conn->query($sql);
    } catch (mysqli_sql_exception $e) {
        $conn->close();
        if ($e->getCode() == 1062) {
            // duplicate tag
            debug("================================> duplicate tag");
            header("Location: oneimage.php?id=" . $image_id . "&duplicate=1");
            exit();
        } else {
            throw $e;// in case it's any other error
        }
    }

}

function get_result_images_for_tagstring($tagstring, $conn): array
{
    if ($tagstring == "") {
        $sql = "SELECT * FROM obrazky";
    } else {
        $sql = "
      SELECT * FROM obrazky o WHERE
      NOT EXISTS(
          SELECT * FROM tagy t WHERE t.nazev IN (" . $tagstring . ") AND NOT EXISTS(
              SELECT * FROM obrazek_tag ot WHERE t.id=ot.tag_id AND o.id=ot.img_id
              
              )
          );";
    }
    debug("sql: " . $sql);
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    return $arr;


}

function compare_priority_desc($a, $b): int
{
    if ($a['priorita'] == $b['priorita'])
        return 0;
    if ($a['priorita'] < $b['priorita'])
        return 1;
    else
        return -1;
}
function get_result_images_for_tagstring_ordered($tagstring, $conn): array
{

    $res = get_result_images_for_tagstring($tagstring, $conn);
    $priorities_images = [];
    for ($i = 0; $i < sizeof($res); $i++) {
        $row = $res[$i];
        $img_id = $row["id"];
        $p = tagstring_priority($tagstring, $img_id, $conn);
        $priorities_images[$i] = ['priorita' => $p, 'row' => $row];
    }

    uasort($priorities_images, 'compare_priority_desc');
    $sorted_rows = [];
    foreach ($priorities_images as $entry) {
        $sorted_rows[] = $entry['row'];
    }

    return $sorted_rows;
}


function tagstring_priority($tagstring, $img_id, $conn): int
{
    $tag_array = explode(",", $tagstring);
    $val = 0;
    if ($tag_array[0] == "") {
        return 0;
    }
    for ($i = 0; $i < sizeof($tag_array); $i++) {
        $sql = "SELECT priorita FROM obrazek_tag ot 
                JOIN tagy t ON ot.tag_id = t.id 
                    WHERE ot.img_id = " . $img_id . " AND t.nazev =" . $tag_array[$i] . ";";

        $res = $conn->query($sql);
        $a_array = $res->fetch_assoc();
        $p = $a_array['priorita'];
        $val += $p;
        $val *= 10;
    }
    return $val;
}

function get_images_tags_for_tagstring($tagstring, $conn): mysqli_result
{
    if ($tagstring == "") {
        $sql = "SELECT * FROM obrazky o JOIN obrazek_tag ot ON o.id = ot.img_id";
    } else {
        $sql = "
      SELECT * FROM obrazky o JOIN obrazek_tag ot ON o.id = ot.img_id WHERE
      NOT EXISTS(
          SELECT * FROM tagy t WHERE t.nazev IN (" . $tagstring . ") AND NOT EXISTS(
              SELECT * FROM obrazek_tag ot WHERE t.id=ot.tag_id AND o.id=ot.img_id
              
              )
          );";
    }
    debug("sql: " . $sql);
    $result = $conn->query($sql);
    return $result;


}

function get_images_for_tagstring_ordered($tagstring, $conn): array
{
    $res = get_images_for_tagstring($tagstring, $conn);
    $images_priorities = [];
    for ($i = 0; $i < sizeof($res); $i++) {
        $p = tagstring_priority($tagstring, $res[$i], $conn);
        $images_priorities[$res[$i]] = $p;
    }
    arsort($images_priorities);
    return array_keys($images_priorities);
}

/* vrací pole img_id pro daný tagstring zadaný jako řetězec 'tag1','tag2','tag3',
pokud žádné obrázky pro tagstring nejsou vrací [] */
function get_images_for_tagstring($tagstring, $conn): array
{
    $sql = "
      SELECT o.id FROM obrazky o WHERE
      NOT EXISTS(
          SELECT * FROM tagy t WHERE t.nazev IN (" . $tagstring . ") AND NOT EXISTS(
              SELECT * FROM obrazek_tag ot WHERE t.id=ot.tag_id AND o.id=ot.img_id
              
              )
          );";
    $result = $conn->query($sql);
    $result_array = [];
    if ($result->num_rows == 0) {
        return $result_array;
    } else {
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row["id"];
        }
        ;
        return $result_array;
    }

}


function get_used_for_image($img_id, $conn): bool
{
    $sql = "SELECT used FROM obrazky o WHERE o.id = $img_id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row["used"])
        return true;
    else
        return false;

}

function get_images_for_tagstring_and_used(string $tagstring, $conn): array
{
    $a = get_images_for_tagstring_ordered($tagstring, $conn);
    $b = order_by_used($a, $conn);
    return $b;
}

function get_images_for_tag_and_used($tag, $conn): array
{
    $a = get_images_for_tag_ordered($tag, $conn);
    $b = order_by_used($a, $conn);
    return $b;
}

function order_by_used($arr, $conn): array
{
    $unused = [];
    $used = [];
    $res = [];
    for ($i = 0; $i < count($arr); $i++) {
        $img = $arr[$i];
        $u = get_used_for_image($img, $conn);
        if ($u) {
            $used[] = $img;
        } else {
            $unused[] = $img;
        }
        $res = array_merge($unused, $used);
    }
    return $res;
}


function get_tag_image_priority($tag, $img, $conn): int
{
    $sql = "SELECT priorita FROM obrazek_tag ot 
                JOIN tagy t ON ot.tag_id = t.id 
                    WHERE ot.img_id = " . $img . " AND t.nazev ='" . $tag . "';";

    $res = $conn->query($sql);
    $a_array = $res->fetch_assoc();
    $p = $a_array['priorita'];
    return $p;
}
function get_images_for_tag_ordered($tag, $conn): array
{
    $res = get_images_for_tag($tag, $conn);
    $images_priorities = [];
    if (sizeof($res) == 0) {
        return $images_priorities;
    }
    for ($i = 0; $i < sizeof($res); $i++) {
        $p = get_tag_image_priority($tag, $res[$i], $conn);
        $images_priorities[$res[$i]] = $p;
    }
    arsort($images_priorities);
    return array_keys($images_priorities);
}

function get_images_for_tag($nazev, $conn): array
{
    $sql = "SELECT o.id
          FROM obrazky o
          JOIN obrazek_tag ot ON ot.img_id = o.id
          JOIN tagy t ON t.id = ot.tag_id
          WHERE t.nazev = '" . $nazev . "';";
    $result = $conn->query($sql);
    $result_array = [];
    if ($result->num_rows == 0) {
        return $result_array;
    } else {
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row["id"];
        }
        ;
        return $result_array;
    }

}

function get_tags_names_for_image($imgid, $conn): array
{
    $sql = "SELECT t.nazev 
            FROM tagy t JOIN obrazek_tag ot ON t.id = ot.tag_id
            WHERE ot.img_id = " . $imgid . ";";
    $result = $conn->query($sql);
    $result_array = [];
    if ($result->num_rows == 0) {
        return $result_array;
    } else {
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row["nazev"];
        }
        ;
        return $result_array;
    }
}


function get_tags_ids_for_image($imgid, $conn): array
{
    $sql = "SELECT t.id 
            FROM tagy t JOIN obrazek_tag ot ON t.id = ot.tag_id
            WHERE ot.img_id = " . $imgid . ";";
    $result = $conn->query($sql);
    $result_array = [];
    if ($result->num_rows == 0) {
        return $result_array;
    } else {
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row["id"];
        }
        ;
        return $result_array;
    }
}
function get_result_tags_for_image($imgid, $conn): mysqli_result
{
    $sql = "SELECT t.id, t.nazev, ot.priorita 
            FROM tagy t JOIN obrazek_tag ot ON t.id = ot.tag_id
            WHERE ot.img_id = " . $imgid . ";";
    $result = $conn->query($sql);
    return $result;

}



function get_tags_for_image($imgid, $conn): array
{
    $sql = "SELECT t.id, t.nazev, ot.priorita 
            FROM tagy t JOIN obrazek_tag ot ON t.id = ot.tag_id
            WHERE ot.img_id = " . $imgid . ";";
    $result = $conn->query($sql);
    $result_array = [];
    if ($result->num_rows == 0) {
        return $result_array;
    } else {
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row;
        }
        ;
        return $result_array;
    }
}

function rename_image($img_id, $jmeno, $conn): void
{
    $sql = "UPDATE obrazky SET prezdivka='" . $jmeno . "' WHERE id=" . $img_id . ";";
    $result = $conn->query($sql);
}


function delete_tag_from_obrazek($tag_id, $image_id, $conn): void
{
    $sql = " DELETE  FROM obrazek_tag WHERE tag_id = $tag_id AND img_id = $image_id;";
    debug("-----------------------------------obr--------$sql-----------------------");
    $result = $conn->query($sql);

}

function delete_unused_tags($conn): void
{
    $sql = "DELETE FROM tagy t WHERE NOT EXISTS (SELECT * FROM obrazek_tag ot WHERE  ot.tag_id = t.id);";
    debug("-----------------------------------unused---------$sql----------------------");
    $result = $conn->query($sql);
}
function set_used($img, $conn): void
{
    $sqlused = "UPDATE obrazky SET lasttime = NOW(), used = TRUE WHERE id=" . $img . ";";
    $result = $conn->query($sqlused);

}

function log_show($img, $tagstring, $conn): void
{

    $sql = "INSERT INTO log (img_id, tagstring, cas) VALUES (".$img.", \"".$tagstring."\", NOW());";
    $result = $conn->query($sql);
}

function archive_picture($img_id, $conn): void
{
    /* archivuj a smaž obrázek */
    $sql = "INSERT INTO obrazky_archive SELECT * FROM obrazky WHERE id = $img_id;";
    $conn->query($sql);
    $sql = "DELETE FROM obrazky WHERE id = $img_id;";
    $conn->query($sql);

    /* archivuj a smaž řádky obrazek_tag */
    $sql = "INSERT INTO obrazek_tag_archive SELECT * FROM obrazek_tag WHERE img_id = $img_id;";
    $conn->query($sql);
    $sql = "DELETE FROM obrazek_tag WHERE img_id = $img_id;";
    $conn->query($sql);

    /* archivuj a smaž všechny tagy, ke kterým neexistuje obrázek */
    $sql = "
        INSERT INTO tagy_archive
        SELECT t.* FROM tagy t
        WHERE NOT EXISTS (
            SELECT 1 FROM obrazek_tag ot WHERE ot.tag_id = t.id
        );
    ";
    $conn->query($sql);

    $sql = "
        DELETE FROM tagy
        WHERE NOT EXISTS (
            SELECT 1 FROM obrazek_tag ot WHERE ot.tag_id = tagy.id
        );
    ";
    $conn->query($sql);
}
function restore_all_from_archive($conn): void
{
    /* obnov všechny tagy (bez duplicit) */
    $sql = "
        INSERT INTO tagy
        SELECT * FROM tagy_archive ta
        WHERE NOT EXISTS (
            SELECT 1 FROM tagy t WHERE t.id = ta.id
        );
    ";
    $conn->query($sql);
    $conn->query("DELETE FROM tagy_archive;");

    /* obnov všechny obrázky (bez duplicit) */
    $sql = "
        INSERT INTO obrazky
        SELECT * FROM obrazky_archive oa
        WHERE NOT EXISTS (
            SELECT 1 FROM obrazky o WHERE o.id = oa.id
        );
    ";
    $conn->query($sql);
    $conn->query("DELETE FROM obrazky_archive;");

    /* obnov všechny řádky obrazek_tag (bez duplicit) */
    $sql = "
        INSERT INTO obrazek_tag
        SELECT * FROM obrazek_tag_archive ota
        WHERE NOT EXISTS (
            SELECT 1 FROM obrazek_tag ot
            WHERE ot.img_id = ota.img_id AND ot.tag_id = ota.tag_id
        );
    ";
    $conn->query($sql);
    $conn->query("DELETE FROM obrazek_tag_archive;");
}

function show_image($img, $tagstring, $conn)
{
    set_used($img, $conn);
    log_show($img, $tagstring, $conn);
    header("Location: showimage.php?id=$img&ts=$tagstring");
}