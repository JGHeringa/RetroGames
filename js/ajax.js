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
    $("#newGameBtn").click(function () {
        var gameTitle = $("#gameTitle").val();
        var gameBeschrijf = $("#beschrijving").val();
        var gamePrijs = $("#prijs").val();
        var gamePlatform = $("#platform").val();
        var gameGenre = $("#genre").val();
        var gamePegi = $("#pegi").val();
        var gameTaal = $("#gameTaal").val();
        var gameFoto = $("#gameFoto").val();
        $.ajax({
            url: "opslaan.php",
            method: "POST",
            data: {
                'title': gameTitle,
                'beschrijf': gameBeschrijf,
                'prijs': gamePrijs,
                'platform': gamePlatform,
                'genre': gameGenre,
                'pegi': gamePegi,
                'taal': gameTaal,
                'foto': gameFoto
            }
        })
            .done(function (data) {
                if (data == "OK") {
                    ophalen();
                    $("#gameTitle,#beschrijving,#prijs,#gameFoto").val("");
                    // $("#beschrijving").val("");
                    // $("#prijs").val("");
                    // $("#platform").val("");
                    // $("#genre").val("");
                    // $("#pegi").val("");
                    // $("#gameTaal").val("");
                    // $("#gameFoto").val("");
                } else {
                    $("#resultaat").text("Er ging iets fout!" + data);
                }
            });
    });
});