<div class="navbar-container">
    <nav class="navbar container">
        <div class="logo">
            <img src="./Gameimg/RetroGamesLogo02.png" alt="Logo" class="img-fluid">
        </div>
        <div class="search-bar d-flex">
            <input type="text" placeholder="Zoeken op retrogames.nl" class="form-control me-2">
            <button class="btn search-button">Zoeken</button>
        </div>
        <div class="login-button-container">
            <button class="btn login-button" data-toggle="modal" data-target="#loginModal"><a href="#loginModal">Log in</a></button>
            <button class="btn settings-button"><a href="#loginModal">&#9881;</a></button>
        </div>

        <!-- Login Modal -->
        <div class="modal" id="loginModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><a href="#">&times;</a></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" class="form-control" id="username" placeholder="Vul jouw gebruikersnaam in">
                            </div>
                            <div class="form-group">
                                <label for="password">Wachtwoord</label>
                                <input type="password" class="form-control" id="password" placeholder="Vul jouw wachtwoord in">
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- settings Modal -->
        <div class="modal" id="settingsModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Settings</h5>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><a href="#">&times;</a></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="username">Upload</label>
                                <input type="text" class="form-control" id="username" placeholder="Vul jouw gebruikersnaam in">
                            </div>
                            <div class="form-group">
                                <label for="password">Title</label>
                                <input type="password" class="form-control" id="password" placeholder="Vul jouw wachtwoord in">
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="category container">
    <div class="d-flex flex-wrap justify-content-center">
        <a href="#" class="category-item active" data-category="all">All</a>
        <a href="#" class="category-item" data-category="actie">ACTIE</a>
        <a href="#" class="category-item" data-category="avontuur">AVONTUUR</a>
        <a href="#" class="category-item" data-category="behendigheid">BEHENDIGHEID</a>
        <a href="#" class="category-item" data-category="puzzel">PUZZEL</a>
        <a href="#" class="category-item" data-category="meiden">MEIDEN</a>
        <a href="#" class="category-item" data-category="multiplayer">MULTIPLAYER</a>
        <a href="#" class="category-item" data-category="race">RACE</a>
        <a href="#" class="category-item" data-category="sport">SPORT</a>
        <a href="#" class="category-item" data-category="videos">VIDEOS</a>
    </div>
</div>

<div class="spacer container"></div>