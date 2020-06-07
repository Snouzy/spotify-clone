<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div id="inputContainer">
        <!-- Left section start -->
        <div class="left-section">
            <!-- Login start -->
            <div class="login">
                <form action="register.php" id="loginForm" method="POST">
                    <h2>Connectez-vous !</h2>

                    <div class="form-group">
                        <label for="loginUsername">Pseudo</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="snouzy" required>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Mot de passe</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Mot de passe" required>
                    </div>

                    <button type="submit" class="btn btn-login" id="loginBtn">Se connecter</button>
                    <span id="registerLink">Pas encore de compte ? Créez le votre <a href="">ici.</a></span>

                </form>
            </div>
            <!-- Login end -->

            <!-- Register start -->
            <div class="register">
                <form action="register.php" id="registerForm" method="POST">
                    <h2>Créez votre compte gratuitement !</h2>

                    <div class="form-group">
                        <label for="registerUsername">Pseudo : </label>
                        <input id="registerUsername" name="registerUsername" type="text" placeholder="snouzy" required>
                    </div>

                    <div class="form-group">
                        <label for="registerFirstName">Nom : </label>
                        <input id="registerFirstName" name="registerFirstName" type="text" placeholder="Bradiceanu" required>
                    </div>

                    <div class="form-group">
                        <label for="registerLastName">Prénom : </label>
                        <input id="registerLastName" name="registerLastName" type="text" placeholder="Mathias" required>
                    </div>

                    <div class="form-group">
                        <label for="registerEmail">Email : </label>
                        <input id="registerEmail" name="registerEmail" type="text" placeholder="mathiasnouzy@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input id="registerPassword" name="registerPassword" type="password" required>
                    </div>

                    <button class="btn btn-register" id="btnRegister" type="submit">S'enregistrer</button>
                </form>
            </div>
            <!-- Register end -->
        </div>
        <!-- Left section end -->
        <div class="separator"></div>
        <!-- Right section start -->
        <div class="right-section">
            <h1>Écoutez la musique, <br/> qui vous correspond.</h1>
            <p>Écoutez plus de 1000 morceaux gratuitement</p>

            <ul>
                <li>Découvrez de la musique</li>
                <li>Créez vos propres playlists</li>
                <li>Suivez des artistes pour être à jour</li>
            </ul>
        </div>
        <!-- Right section end -->
    </div>
    <!-- inputContainer end -->

    <script
src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>