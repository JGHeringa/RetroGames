<?php
require '../includes/config.php';
session_start();
date_default_timezone_set('Europe/Amsterdam');
$today = date("Y-m-d H:i:s");
$one = 1;
// get parameters from the GET
$userID = $_GET['IDu'];
$verifyID = $_GET['IDv'];
$hash = $_GET['h'];
// filter the parameters
$userID = $mysqli->real_escape_string($userID);
$verifyID = $mysqli->real_escape_string($verifyID);
$hash = $mysqli->real_escape_string($hash);
// look for a record that match the given parameters
$sql = "SELECT * FROM `verify` WHERE id=? AND userID=? AND `hash`=?"; // SQL with parameters
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iis", $verifyID, $userID, $hash);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result == NULL) {
    echo "is leeg";
}
$verify = $result->fetch_assoc(); // fetch data  
$ID = $verify["id"];
$userID = $verify["userID"];
$hash = $verify["hash"];
$date = $verify["date"];
$verified = $verify["verified"];
// check date
$datedate = date_create($date);
$datePlus = date_modify($datedate, "1 day");
$newDate = date('Y-m-d H:i:s', strtotime($date . ' + 2 days'));
// check if everything is filled
if (
    empty($verify["id"])        ||
    empty($verify["userID"])    ||
    empty($verify["hash"])      ||
    empty($verify["date"])
) {
    die("Link is niet goed");
}

if ($verified != 0) {
    die("account is al geactiveerd.");
}

if ($today > $newDate) {
    die("link is verlopen");
}

$sql = "UPDATE `verify` SET `dateVerified`=?,`verified`=? WHERE `id`=?"; // SQL with parameters
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sii", $today, $one, $ID);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

echo "<h1>U heeft uw email adres bevestig!</h1>";
