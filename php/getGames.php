<?php
require "../includes/config.php";
$sql = "SELECT `id`, `titel`, `omschrijving`, `foto` FROM `games`";
$result = $mysqli->query($sql);

$games = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $game = array(
            "id" => $row["id"],
            "titel" => $row["titel"],
            "omschrijving" => $row["omschrijving"],
            "foto" => $row["foto"]
        );
        array_push($games, $game);
    }
} else {
    echo "0 results";
}
echo json_encode($games);
?>