function uitlees() {
  $.ajax({
    type: "GET",
    url: "./php/getGames.php",
    dataType: "JSON",
    success: function (games) {
      let output = "";
      for (let i = 0; i < games.length; i++) {
        if (i % 4 == 0) {
          output += '<div class="w-100"></div>';
        }
        output += `<div class="col-sm-6 col-md-3 mb-4">
                        <div class="card bg-danger">
                          <h5 class="bg-primary p-3 text-white card-title mt-0">${games[i].titel}</h5>
                          <img src="${games[i].foto}" class="card-img-top rounded-0">
                          <div class="card-body">
                            <p class="card-text">${games[i].omschrijving}</p>
                            <a href="#" class="btn btn-dark rounded-0 mb-0 w-100">meer</a>
                          </div>
                        </div>
                      </div>`;
      }
      $("#result").html(output);
    },
    error: function (xhr, status, error) {
      console.log("Error: " + error);
    },
  });
}

$(document).ready(function () {
  uitlees();
});
