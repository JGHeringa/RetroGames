<?php
session_start();
$titel = "Aanmelden";
require 'includes/config.php';
include 'includes/head.php';
$Token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $Token;
?>

<body>

    <h1>Aanmeld form</h1>
    <form action="php/newUser.php" method="post">
        <label for="Vnaam">Voornaam:</label><br>
        <input type="text" id="Vnaam" name="Vnaam" placeholder="Mees" required><br>
        <label for="Anaam">Achternaam:</label><br>
        <input type="text" id="Anaam" name="Anaam" placeholder="Jansen" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="voorbeeld@voorbeeld.nl" required><br>
        <label for="wachtwoord1">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord1" name="wachtwoord1" placeholder="••••••••••" required><br>
        <input type="hidden" name="csrfToken" value="<?= $Token ?>">
        <label for="wachtwoord2">Nog maals wachtwoord:</label><br>
        <input type="password" id="wachtwoord2" name="wachtwoord2" placeholder="••••••••••"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
<?php
include 'includes/foot.php';
?>