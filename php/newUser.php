<?php
require '../includes/config.php';
session_start();
$today = date("Y-m-d h:i:s");
// checking if everything is filled
if (
    empty($_POST["Vnaam"])         ||
    empty($_POST["Anaam"])         ||
    empty($_POST["email"])         ||
    empty($_POST["wachtwoord1"])   ||
    empty($_POST["wachtwoord2"])   ||
    empty($_POST["csrfToken"])
) {
    die("niet alles is ingevuld!");
}
// is the token right
if (isset($_SESSION["token"]) && $_SESSION["token"] != $_POST["csrfToken"]) {
    die("token klopt niet!");
}
// is it a valid email format
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email is niet van een goed format!");
}
// getting the data of the form from the POST in a variable
$Vnaam          = $_POST['Vnaam'];
$Anaam          = $_POST['Anaam'];
$email          = $_POST['email'];
$wachtwoord1    = $_POST['wachtwoord1'];
$wachtwoord2    = $_POST['wachtwoord2'];
// are the two passwords asked the same
if ($wachtwoord1 != $wachtwoord2) {
    die("wachtwoorden zijn niet het zelfde ingevuld!");
}
// hash password
$wachtwoord = password_hash($wachtwoord1, PASSWORD_DEFAULT);
// filter with real_escape_string
$Vnaam = $mysqli->real_escape_string($Vnaam);
$Anaam = $mysqli->real_escape_string($Anaam);
$email = $mysqli->real_escape_string($email);
// email to lowercase, the names to lowercase and then the first letters to uppercase
$email = strtolower($email);
$Vnaam = ucwords(strtolower($Vnaam));
$Anaam = ucwords(strtolower($Anaam));
// cheching if email is already used in the table
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    die("email already in use");
}
// making an unique ID for the user
do {
    $permitted_chars = '123456789';
    $ID = substr(str_shuffle($permitted_chars), 0, 9);
    $result = mysqli_query($mysqli, "SELECT id FROM users WHERE id = '$ID'");
    $rows = mysqli_num_rows($result);
} while ($rows > 1);
// ID and hash for verifing
do {
    $permitted_chars = '123456789';
    $IDv = substr(str_shuffle($permitted_chars), 0, 9);
    $resultv = mysqli_query($mysqli, "SELECT ID FROM `verify` WHERE id = '$IDv'");
    $rowsv = mysqli_num_rows($resultv);
} while ($rowsv > 1);
$permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_~';
$hash = substr(str_shuffle($permitted_chars), 0, 40);
// inserting data into table
$sqlUser = "INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `password`) VALUES  (?, ?, ?, ?, ?)";
if ($stmt = $mysqli->prepare($sqlUser)) {
    $stmt->bind_param('issss', $ID, $Vnaam, $Anaam, $email, $wachtwoord);
    if ($stmt->execute()) {
?>
        <script>
            console.log("user added to table")
        </script>
    <?php
    } else {
        die("is mislukt");
    }
} else {
    die("zit een fout in de query: $mysqli->error");
}
$sqlVerify = "INSERT INTO `verify` (id ,userID, `hash`, `date`) VALUES  (?, ?, ?, ?)";
if ($stmtv = $mysqli->prepare($sqlVerify)) {
    $stmtv->bind_param('ssss', $IDv, $ID, $hash, $today);
    if ($stmtv->execute()) {
    ?> <script>
            console.log("verify added to table");
        </script> <?php
    } else {
        echo "is mislukt(verify)";
    }
} else {
    echo "zit een fout in de query: " . $mysqli->error;
}
$mysqli->close();
// email to user
$to = $email;
$subject = "Sign-UP - retrogames";
$message = '
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>
<h1>Verify email</h1>
<p>Mail na het aanmaken van een account met deze email onder de naam: ' . $Vnaam . ' ' . $Anaam . '</p>
<p>Klik op de link hier onder op uw account te activeren.</p>
<a href="https://retrogames.4260.eu/php/verify.php?IDu='.$ID.'&IDv='.$IDv.'&h='.$hash.'">Verify</a>
<p>Deze mail is als bevestiging dat uw account is aangemaakt. Ook om te kunnen bevestigen dat het uw email adres is.</p>
</body>
</html>
';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <noreply@4260.nl>' . "\r\n";
mail($to, $subject, $message, $headers);
?>
<table>
    <tr>
        <td>Naam:</td>
        <td><?= $Vnaam ?> <?= $Anaam ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?= $email ?></td>
    </tr>
</table>