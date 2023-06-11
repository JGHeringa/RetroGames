function uitlees(category) {
  const colors = ["R", "LB", "A", "PI", "O", "G", "P", "B"];
  const Scolors = ["SR", "SLB", "SA", "SPI", "SO", "SG", "SP", "SB"];

  $.ajax({
    type: "GET",
    url: "./php/getGames.php",
    data: { category: category },
    dataType: "JSON",
    success: function (games) {
      let output = "";
      for (let i = 0; i < games.length; i++) {
        let maxLength = 150;
        let beschrijving = games[i].beschrijving.length > maxLength ? games[i].beschrijving.substring(0, maxLength) + "..." : games[i].beschrijving;

        let colorIndex = i % colors.length;
        let colorClass = colors[colorIndex];
        let ScolorIndex = i % Scolors.length;
        let ScolorClass = Scolors[ScolorIndex];
        
        if (i % 4 == 0) {
          output += '<div class="w-150"></div>';
        }
        output += `<div class="card-container col-sm-6 col-md-3 mb-4">
                        <div class="card card-container ${colorClass}">
                          <div class="card-header p-3"> 
                            <h5 class="text-white card-title mt-0">${games[i].titel}</h5>
                          </div>
                          <img src="${games[i].foto}" class="card-img-top rounded-0" style="object-fit: cover; max-height: 400px; min-height: 400px; max-width: 100%;">
                          <div class="card-body">
                            <p class="card-text card-p">${beschrijving}</p>
                            <a href="#" class="btn ${ScolorClass} white-text rounded-0 mb-0 w-100">meer</a>
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
  uitlees("all");

  $(".category-item").click(function (e) {
    e.preventDefault();
    $(".category-item").removeClass("active");
    $(this).addClass("active");
    const category = $(this).data("category");
    uitlees(category);
  });

  setInterval(function() {
    uitlees("all");
  }, 60000);
});
