<?php
require '../includes/config.php';
if (!empty($_POST["Vnaam"])         &&
    !empty($_POST["Anaam"])         &&
    !empty($_POST["email"])         &&
    !empty($_POST["wachtwoord1"])   &&
    !empty($_POST["wachtwoord2"])) {
    echo "alles is ingevuld";
} else {
    echo "niet alles is ingevuld!";
}