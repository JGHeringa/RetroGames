function uitlees() {
    $.ajax({
        type: "GET",
        url: "./php/getGames.php",
        dataType: "JSON",
        success: function (games) {
            let output = "";
            output += "<ul>";
            for (let i = 0; i < games.length; i++) {
                output += "<li>" + games[i].titel + " " + games[i].omschrijving +"</li>";
            }
            output += "</ul>";
            $("#result").html(output);
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}
$(document).ready(function () {
    uitlees();
});