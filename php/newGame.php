<?php
require "../includes/config.php";
$today = date("Y-m-d G-i-s");
$title = htmlentities($_POST["title"], ENT_QUOTES);
$beschrijf = htmlentities($_POST["beschrijf"], ENT_QUOTES);
$prijs = htmlentities($_POST["prijs"], ENT_QUOTES);
$platform = htmlentities($_POST["platform"], ENT_QUOTES);
$genre = htmlentities($_POST["genre"], ENT_QUOTES);
$pegi = htmlentities($_POST["pegi"], ENT_QUOTES);
$taal = htmlentities($_POST["taal"], ENT_QUOTES);
$foto = htmlentities($_POST["foto"], ENT_QUOTES);
do {
    $permitted_chars = '123456789';
    $ID = substr(str_shuffle($permitted_chars), 0, 8);
    $result = mysqli_query($mysqli, "SELECT id FROM `games` WHERE id = '$ID'");
    $rows = mysqli_num_rows($result);
}while($rows > 1);
$result = mysqli_query($mysqli, "INSERT INTO `games` (`id`, `titel`, `beschrijving`, `prijs`, `platform`, `genre`, `pegi`, `taal`, `foto`, `uploadDatum`, `userID`) VALUES ('$ID', '$title', '$beschrijf', '$prijs', '$platform', '$genre', '$pegi', '$taal', '$foto', '$today', '1')");
if($result){
    echo "OK";
} else {
    echo "FOUT";
}