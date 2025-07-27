<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Memiky Test </title>
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <?php 
    require_once "functions.php";
    require_once "debug.php";
    $servername = "localhost";
    $username = "zmijucha";
    $password = "hnusnypocasipanove";
    $database = "demo";
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $database
    );
    
    if ($conn->connect_error) {
        echo "zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz<br>";
        die("Connection failed: " . $conn->connect_error);
    }

    /* naplnit testovací databází - obrazky, tagy, obrazek_tag */


    /*debug( "Connected successfully index!<br>\n");*/
/*
    $sql_all_tags = "SELECT id, nazev FROM tagy ORDER BY nazev;";
    $tagy = $conn->query($sql_all_tags);
    while ($row = $tagy->fetch_assoc()) {
        echo $row['nazev']."<br>";
    }
*/
$tagstring = "'nature', 'sunset'";
$tagstring3 = "'sunset', 'nature'";
$tagstring2 = "'nature', 'sunset', 'abstract', 'macro'";
/*$r = get_images_for_tagstring($tagstring, $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]."<br>";
 }*/
/*
$tgp = tagstring_priority($tagstring, 1, $conn);
echo "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo". $tgp ."ooooooooooooooooooooooooooo<br>";

$tgp = tagstring_priority($tagstring2, 1, $conn);
echo "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo". $tgp ."ooooooooooooooooooooooooooo<br>";
*/


/*
 $r = get_images_for_tagstring_ordered($tagstring, $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]."<br>";
 }

$r = get_result_images_for_tagstring($tagstring, $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]['id']."<br>";
 }


 $r = get_images_for_tagstring_ordered($tagstring3, $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]."<br>";
 }

 $r = get_result_images_for_tagstring($tagstring3, $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]['id']."<br>";
 }


 $r = get_result_images_for_tagstring("", $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]["id"]."<br>";
 }

 echo"<br>-----------------------------------------<br>";

 $r = get_result_images_for_tagstring_ordered("", $conn);
 for ($i = 0; $i < count($r); $i++) {
    echo "$i  ". $r[$i]["id"]."<br>";
 }

*/

/*
$p = get_tag_image_priority('sunset',1,$conn);
echo $p;
*/
/*
$arr = get_images_for_tag('',$conn);
 for ($i = 0; $i < count($arr); $i++) {
    echo "$i  ". $arr[$i]."<br>";
 }
echo "ccccccccccccccccc".count($arr);
 echo"<br>-----------------------------------------<br>";

$arr = get_images_for_tag_ordered('',$conn);
 for ($i = 0; $i < count($arr); $i++) {
    echo "$i  ". $arr[$i]."<br>";
 }
echo "ccccccccccccccccc".count($arr);
*/
/* php při převodu na string udělá z false prázdný řetězec !!?! */
/*
$v = get_used_for_image(2,$conn);
echo "---------->".$v."<-----------------";
*/
/*
$arr = [1,2,3,4,5,6,7,8,9,10];
$arr2 = order_by_used($arr, $conn);
 for ($i = 0; $i < count($arr2); $i++) {
    echo "$i  ". $arr2[$i]."<br>";
 }
*/
/*$sql = "INSERT INTO log (img_id, tagstring, cas) VALUES (9, \"'nature','sunset'\", NOW());";
$result = $conn->query($sql);
echo"****************".$result."**********************";*/
/*
   $arr = get_images_for_tagstring_and_used($tagstring,$conn);
 for ($i = 0; $i < count($arr); $i++) {
    echo "$i  ". $arr[$i]."<br>";
 }
*/
/*
    $servername = "localhost";
    $username = "zmijucha";
    $password = "hnusnypocasipanove";
    $database = "mmm";   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $database
    );
   */
$tgs ="'cute','dog'";
show_image(1,$tgs,$conn);
    ?>
</body>

</html>