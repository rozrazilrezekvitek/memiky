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

function get_result_images_for_tagstring($tagstring, $conn): mysqli_result
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
    return $result;


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

