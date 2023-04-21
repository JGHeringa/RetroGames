<?php
$titel = "Home";
require 'includes/config.php';
include 'includes/head.php';
?>

<body>
    
    <div>
        <form>
            <label for="gameTitle">Titel:</label><br>
            <input type="text" id="gameTitle" placeholder="MarioKart DubbleDash!!!" required><br>
            <label for="beschrijving">Beschrijving:</label><br>
            <textarea id="beschrijving" rows="4" cols="50"></textarea><br>
            <label for="prijs">Prijs:</label><br>
            <input type="number" id="prijs" step="0.01" required><br>
            <label for="platform">Platform:</label><br>
            <select id="platform">
                <option selected disabled>Selecteer</option>
                <option value="1">GameCube</option>
                <option value="2">Playstation4</option>
                <option value="3">Playstation3</option>
                <option value="4">Playstation2</option>
            </select><br>
            <label for="genre">Genre:</label><br>
            <select id="genre">
                <option selected disabled>Selecteer</option>
                <option value="1">Actie</option>
                <option value="2">Avontuur</option>
                <option value="3">kdsfjl</option>
                <option value="4">Playstation2</option>
            </select><br>
            <label for="pegi">PEGI:</label><br>
            <select id="pegi">
                <option selected disabled>Selecteer</option>
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select><br>
            <label for="gameTaal">Taal:</label><br>
            <select id="pegi" required>
                <option selected disabled>Selecteer</option>
                <option value="1">Engels</option>
                <option value="2">Nederlands</option>
                <option value="3">Duits</option>
                <option value="4">Frans</option>
                <option value="3">Deens</option>
                <option value="4">Zweeds</option>
                <option value="3">Noors</option>
                <option value="4">Spaans</option>
                <option value="3">Portugees</option>
                <option value="4">Italiaans</option>
                <option value="4">Japans</option>
                <option value="4">Chinees</option>
            </select><br>
            <label for="gameFoto">Foto:</label><br>
            <input type="text" id="gameFoto" required><br><br>
            <button id="newGameBtn" class="btn btn-primary">Uploaden</button>
        </form>
    </div>
    <h1>retrogames</h1>
    <p>This is a paragraph.</p>
    <div id="result">
    </div>
</body>
<?php
include 'includes/foot.php';
?>